<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<?php

/*
 
 *包含的文件

*/

//-------------------------------------------------------------------------------------------	
	require_once "CutWord.php";
	require_once "Get_db_Train_Data.php";
//-------------------------------------------------------------------------------------------		


	
/*
 
 *休眠设置

*/

//-------------------------------------------------------------------------------------------	
	ignore_user_abort();
	set_time_limit(0);
	$internval = 1 ;//每隔1秒运行
//-------------------------------------------------------------------------------------------		


/*
 
 *将.txt中内容读取并存放到数组中

*/

//-------------------------------------------------------------------------------------------	
	function getFileContent($fileName)
	{
		$content = file_get_contents($fileName);
		$result = explode("\r\n", $content);
		return $result;
		
	}
//-------------------------------------------------------------------------------------------	
	
	
/*
 
 *用于判断一个词是否属于停止词
 *注释:$word:词

*/

//-------------------------------------------------------------------------------------------		
	function Is_StopWord($word,$Stop_Word)//用于判断一个词是否属于停止词
	{
		if(in_array($word,$Stop_Word))$flags=true;
		else $flags=false;
		return $flags;
	}
//-------------------------------------------------------------------------------------------	
	
	
/*
 
 *去停止词

*/

//-------------------------------------------------------------------------------------------		
	function Data_stopword($num,$array,$stop_word)
	{
		
		$Data = Get_Data($array[$num][0],$array[$num][1]);
		$data_result[0]=null;//存放结果集,下标从1开始
		for($j=0;$j<$array[$num][1];$j++){	
			$result = DealTwoStr($Data[$j]);
			$result_num = count($result);
			for($k=1;$k<$result_num;$k++){
				//$result[$k][0] = str_replace(' ','',$result[$k][0]);//去除字符串中的空格
				if(preg_match("/^[\sa-zA-Z0-9.-]*$/", $result[$k][0])||Is_StopWord($result[$k][0], $stop_word))unset($result[$k]);
			}
			//$result[0][0] = str_replace(' ','',$result[0][0]);//去除字符串中的空格
			if(preg_match("/^[\sa-zA-Z0-9.-]*$/", $result[0][0])||Is_StopWord($result[0][0], $stop_word))unset($result[0]);

			$result = array_merge($result);
			//ReadToTxt("CutWord_Two/Train/".$data_array[$num][0]."/",$j+1,$result);
			
			array_push($data_result,$result);
			
			//sleep(0.01);
			$internval = 1;
			if(($j+1)%50==0)sleep($internval);
		}
		return $data_result;
		//array_push($All_Data,$data_result);
		//sleep(0.5);
	}
//-------------------------------------------------------------------------------------------	


/*
 
 *同一类别的特征词存放到一起
 *注释:$source为$All_Data[?]

*/

//-------------------------------------------------------------------------------------------		
	function  Deal_to_all($source)
	{
		$data_result = $source;
		$svm_word[0][0]=null;
		$svm_word[0][1]=null;
		for($i=1;$i<count($data_result);$i++)
		{
			if(count($data_result[$i])<30)//每篇文章提取30个特征值
			{
				$every_artical_num  = count($data_result[$i]);
			}else{
				$every_artical_num = 30;
			}
			for($k=0;$k<$every_artical_num;$k++)
			{
				$flags = false ;//用于判断该特征词是否已经在$svm_word中存在
				for($j=0;$j<count($svm_word);$j++)
				{
					if($data_result[$i][$k][0]==$svm_word[$j][0])//已经存在
					{
						$svm_word[$j][1] += $data_result[$i][$k][1];
						$flags = true;
						break;
					}
				}
				if($flags==false)//不存在，存入
				{
					array_push($svm_word,array($data_result[$i][$k][0],$data_result[$i][$k][1]));
				}
			}
		}
		return $svm_word;
	}
//-------------------------------------------------------------------------------------------	


/*
 
 *排序算法

*/

//-------------------------------------------------------------------------------------------	
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
//-------------------------------------------------------------------------------------------	
	
	
/*
 
 *取同一类别的词频比较高的300个特征词

*/

//-------------------------------------------------------------------------------------------		
    function  Select_special_word($source)
	{
		$svm_word = Deal_to_all($source);
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
//-------------------------------------------------------------------------------------------	
	
	
/*
 
 *同一类别的词频比较高的300个特征词在文章中出现的次数

*/

//-------------------------------------------------------------------------------------------	
	function  Special_Word_Num($source)
	{
		$special_word = Select_special_word($source);
		$num_special=array(array(null,null));
		for($i=0;$i<count($special_word);$i++)//特征词计数初始化
		{
			$num_special[$i][0] = $special_word[$i][0];
			$num_special[$i][1] = 0;
		}
		for($j=0;$j<count($special_word);$j++)
		{
			for($i=0;$i<count($source);$i++)
			{
				if(count($source[$i])>30)//判断每篇文章是否含有30个特征词
				{
					$number = 30;
				}else
				{
					$number = count($source[$i]);
				}
				//for($k=0;$k<$number;$k++)//不确定 到底是提取的30个特征词还是一篇文章所有的特征词
				for($k=0;$k<count($source[$i]);$k++)
				{
					if($special_word[$j][0]==$source[$i][$k][0]) 
					{
						$num_special[$j][1]++;
						break;
					}
				}
			}
		}
		
		return $num_special;
	}
//-------------------------------------------------------------------------------------------	


/*
 
 *同一类别的词频比较高的300个特征词的词频

*/

//-------------------------------------------------------------------------------------------		
	function   Get_Tf($source)//表示一个特征词在一篇文中出现的频率
	{
		$svm_word = Deal_to_all($source);
		$special_word = Select_special_word($source);//获得频率较高的特征词
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
//-------------------------------------------------------------------------------------------	

	
/*
 
 *同一类别的词频比较高的300个特征词逆文档频率

*/

//-------------------------------------------------------------------------------------------		
	function Get_Idf($source)
	{
		$num_special = Special_Word_Num($source);
		$idf = array(null);
		for($i=0;$i<count($num_special);$i++)
		{
			$num = count($source) / ($num_special[$i][1]+1);
			$idf[$i] = log($num );
		}
		return $idf;
		
	}
//-------------------------------------------------------------------------------------------	

	
	
/*
 
 *同一类别的词频比较高的300个特征词在文档中的权重值

*/

//-------------------------------------------------------------------------------------------		
	function TF_IDF($source)
	{
		$tf = Get_Tf($source);
		$idf = Get_Idf($source);
		$w = array(null);
		for($i=0;$i<count($tf);$i++)
		{
			$w[$i] = $tf[$i] * $idf[$i] ;
		}
		
		return $w;
	}
//-------------------------------------------------------------------------------------------	

	
	
/*
 
 *SVM

*/

//-------------------------------------------------------------------------------------------		
	
	function SVM($source)
	{
		$special_word = Select_special_word($source);
		$tf_idf = TF_IDF($source);
		$svm = array(null);
		for($i=0; $i<count($tf_idf);$i++)
		{
			$svm[$i][0] = $special_word[$i][0];
			$svm[$i][1] = $tf_idf[$i];
		}
		return $svm;
	}
	
	
	$array = array(Economy , Education ,Entertainment ,Health , Military  , Sport , Technology , Travel);
	
	$data_array=array(array(null,null));//存放类别以及同一类别的数目
	$data_array=array(array(Economy , 150),array(Education , 150),
	array(Entertainment , 150),array(Health , 150),array(Military , 150),
	array(Sport , 150),array(Technology, 150),array(Travel, 150));
	
	$fileName="chinese_stopword.txt";
	$stop_word = getFileContent($fileName);//获得停止词
	
	
	
	for($i=0;$i<8;$i++)
	//for($i=0;$i<count($data_array);$i++)
	{
		$All_Data= Data_stopword($i,$data_array,$stop_word);
		$svm = SVM($All_Data);
		ReadToTxt("SVM/",$array[$i],$svm);
		$svm = serialize($svm);
		
		$svm_category = $data_array[$i][0];
		$sql= "select Svm_Text from svm where Svm_Category='$svm_category'";
		$str=mysql_query($sql) or die(mysql_error()); 
		$result = mysql_fetch_array($str);
		
		if(count($result[0])>0)//如果一个类别svm已经存在就替换
		{
			$sql  = "update svm set Svm_Text = '$svm' where Svm_Category='$svm_category'";
			mysql_query($sql)or die(mysql_error());
		}else //如果这个类别的svm不存在就插入
		{
			$sql = "insert into svm (Svm_id,Svm_Category,Svm_Text) VALUES(NULL,'$array[$i]','$svm')";
			mysql_query($sql) or die(mysql_error());
		}
	}
//-------------------------------------------------------------------------------------------	
?>