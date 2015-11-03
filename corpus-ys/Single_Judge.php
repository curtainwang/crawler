<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<?php
	require_once "CutWord.php";
/*

 *连接mysql
 
*/
//---------------------------------------------------------------------------------------------
	$con = mysql_connect("localhost","root","root");       
	mysql_select_db("corpus");
	mysql_query("set names UTF8");
//---------------------------------------------------------------------------------------------	
	
	
/*

  *休眠设定
  
*/
//---------------------------------------------------------------------------------------------
	ignore_user_abort();
	set_time_limit(0);
	$internval = 1 ;//每隔1秒运行
//---------------------------------------------------------------------------------------------	
	
	
/*

 *用于判断一个词是否属于
 *注释:$word:词
 
*/
//---------------------------------------------------------------------------------------------
	function Is_StopWord($word,$Stop_Word)//用于判断一个词是否属于停止词
	{
		if(in_array($word,$Stop_Word))$flags=true;
		else $flags=false;
		return $flags;
	}
//---------------------------------------------------------------------------------------------	
	
/*

 *将.txt中内容读取并存放到数组中
 
*/
//---------------------------------------------------------------------------------------------	
	function getFileContent($fileName)
	{
		$content = file_get_contents($fileName);
		$result = explode("\r\n", $content);
		return $result;
		
	}
//---------------------------------------------------------------------------------------------

/*

 *去停止词
 
*/	
//---------------------------------------------------------------------------------------------
	function Data_stopword($content,$stop_word)
	{
		$result = DealTwoStr($content);
		$result_count = count($result);
		for($k=1;$k<$result_count;$k++){
				//$result[$k][0] = str_replace(' ','',$result[$k][0]);//去除字符串中的空格
			if(preg_match("/^[\sa-zA-Z0-9.-]*$/", $result[$k][0])||Is_StopWord($result[$k][0], $stop_word))unset($result[$k]);
		}
			//$result[0][0] = str_replace(' ','',$result[0][0]);//去除字符串中的空格
		if(preg_match("/^[\sa-zA-Z0-9.-]*$/", $result[0][0])||Is_StopWord($result[0][0], $stop_word))unset($result[0]);
		$result = array_merge($result);
		return $result;
	}
//---------------------------------------------------------------------------------------------

/*

 *排序算法
 
*/
//---------------------------------------------------------------------------------------------
	function shell_sort($array)//降序
	{
		$dh=(int)(count($array)/2);
		while($dh>=1)
		{
			for($i=$dh;$i<count($array);$i++)
			{
				$temp=array($array[$i][0],$array[$i][1]);
				$j=$i-$dh;
				while($j>=0&&($array[$j][1]<$temp[1]))
				{
					$array[$j+$dh][1]=$array[$j][1];
					$array[$j+$dh][0]=$array[$j][0];
					$j-=$dh;
				}
				$array[$j+$dh][1]=$temp[1];
				$array[$j+$dh][0]=$temp[0];
			}
			$dh=(int)($dh/2);
		}
		return $array;
	}
//---------------------------------------------------------------------------------------------

	
/*

 *取同一类别的词频比较高的300个特征词
 
*/	
//---------------------------------------------------------------------------------------------
    function  Select_special_word($content,$stop_word)
	{
		$svm_word = Data_stopword($content,$num,$stop_word);
		$svm_word = shell_sort($svm_word) ; //对词频按从大到小排序
	
		$special_word = array(null);//存放排序后的部分特征词
	
		if(count($svm_word)<300)
		{
			$special_word = $svm_word;
		}else
		{
			for($i=0;$i<300;$i++)
			{
				$special_word[$i] = $svm_word[$i]  ;
			}
		}
		return $special_word;
	}
//---------------------------------------------------------------------------------------------
	
	
/*

 *同一类别的词频比较高的300个特征词的Get_Tf
 
*/

//---------------------------------------------------------------------------------------------
	function   Get_Tf($content,$stop_word)//表示一个特征词在一篇文中出现的频率
	{
		$svm_word = Data_stopword($content,$stop_word);
		$special_word = Select_special_word($content,$stop_word);//获得频率较高的特征词
		$number = 0;//总频数
		for($i=0;$i<count($svm_word);$i++)
		{
			$number += $svm_word[$i][1];
		}
		$tf = array(null);
		for($i=0;$i<count($special_word);$i++)
		{
			$tf[$i] = $special_word[$i][1] / $number ;
			
		}
		return $tf;	
	}
//---------------------------------------------------------------------------------------------
	
	
/*

 *SVM
 
*/
	
//---------------------------------------------------------------------------------------------	
	function SVM($content,$stop_word)
	{
		$special_word = Select_special_word($content,$stop_word);
	//	$tf_idf = TF_IDF($Test_Category,$num,$stop_word);
	    $tf = Get_Tf($content,$stop_word);
		$svm = array(null);
		for($i=0; $i<count($tf);$i++)
		{
			$svm[$i][0] = $special_word[$i][0];
			$svm[$i][1] = $tf[$i];
			//$svm[$i][1] = $tf_idf[$i];
		}
		return $svm;
	}
//---------------------------------------------------------------------------------------------	
	

/*

 *获取Train中数据
 *参数：$Train_Category[类别];$num[同一类别的数量]
 
*/
//---------------------------------------------------------------------------------------------
	function Get_Svm_Data($Svm_Category)
	{
		$sql= "select Svm_Text from svm where  Svm_Category='$Svm_Category'";
		$str=mysql_query($sql) or die(mysql_error()); 
		$result = mysql_fetch_array($str);
		//$result = explode("\r\n", $result);
		return $result;
	}
//---------------------------------------------------------------------------------------------

/*

 *匹配
 
*/

//---------------------------------------------------------------------------------------------
	
	function  Test($content,$stop_word,$all_svm)
	{
		$data = SVM($content,$stop_word);//获得测试文本的的向量模型
		$number = array(array(null,null));
		$array = array(Economy , Education ,Entertainment ,Health , Military , Sport , Technology , Travel);
		/*for($i=0;$i<count($all_svm);$i++)
		{
			$number[$i][0] = $array[$i];
			$number[$i][1] = 0;
		}*/
		$svm_test = array(array(null,null));
		//print_r(count($all_svm));
		for($i=0;$i<count($all_svm);$i++)
		{
			for($j=0;$j<count($all_svm[$i]);$j++)
			{
				$temp =0;
				for($k=0;$k<count($data);$k++)
				{
					if($all_svm[$i][$j][0]==$data[$k][0]){
						$temp = $data[$k][1];
						break;
					}
				}
				$svm_test[$i][$j]= $temp;
				//print_r($svm_test[$i][$j]."<br>");
			}
		}
	     $cos = array(null);
		for($i=0;$i<count($all_svm);$i++)
		{
			$cosup = 0;
			$cosleft = 0;
			$cosright = 0;

			for($j=0;$j<count($all_svm[$i]);$j++)
			{
				$cosup += $all_svm[$i][$j][1] * $svm_test[$i][$j];
				$cosleft += pow($all_svm[$i][$j][1],2);
				$cosright += pow($svm_test[$i][$j],2);
			}
			$cos[$i] = $cosup / (sqrt($cosleft) * sqrt($cosright) );
		}
		for($i=0;$i<count($array);$i++)
			{
				$category[$i][0] = $array[$i];
				$category[$i][1] = $cos[$i];
			}
		return $category;
	}
//---------------------------------------------------------------------------------------------

/*

 *Category：形成类别
 
*/
//---------------------------------------------------------------------------------------------		
	function Category($content)
	{
		
		$fileName="chinese_stopword.txt";
	 	$stop_word = getFileContent($fileName);//获得停止词
		$array = array(Economy , Education ,Entertainment ,Health , Military , Sport , Technology , Travel);
		$All_svm = array(null);
		for($i=0;$i<count($array);$i++)
		{
			$mid = Get_Svm_Data($array[$i]);
			$All_svm[$i] = unserialize($mid[0]);
		}
		$e=mb_detect_encoding($content, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $content=iconv("GB2312", "UTF-8", $content);  
				break;
		}
		$result = Test($content,$stop_word,$All_svm);
				
		$result = shell_sort($result);
				
		$temp = $result[0][0];
		return $temp;
	}
//---------------------------------------------------------------------------------------------
	
/*
	 $content = file_get_contents("library/train/Health/13.txt");
	 $result =Category($content);
	 print_r( $result);
*/	
?>