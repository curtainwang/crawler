<meta charset="utf-8">
<?php
require_once 'phpanalysis2.0/phpanalysis.class.php';

/*

 *中文分词
 *array[的]=>123
 
*/

//---------------------------------------------------------------------------
function CutWord($sourceStr)
{
	$pa = new PhpAnalysis();
    $pa->setSource($sourceStr);
	$pa->resultType = 2;    //字典词汇及单个中日韩简繁字符
	$pa->differMax = true;  //使用最大切分模式对二元词进行消除歧义
	$pa->StartAnalysis();
	$arrIndex=$pa->GetFinallyIndex();
	return $arrIndex;
	
}
//---------------------------------------------------------------------------


/*

 *中文分词再处理
 *array(array[0]=>的 [1]=>123)
 
*/

//---------------------------------------------------------------------------
function DealTwoStr($sourceStr)
{ 

    $midStr=CutWord($sourceStr);
	$data=array(array(null,null));
	$keys=array(null);
	$keys=array_keys($midStr);
	$value=array(null);
	$value=array_values($midStr);
	//print_r(count($midStr));
	//print_r($keys);
	//print_r($value);
	$data[0][0]=$keys[0];
	$data[0][1]=$value[0];
	//echo "count:";
	//print_r(count($midStr);
	
	for($i=1;$i<count($midStr);$i++)
	{
		array_push($data,array($keys[$i],$value[$i]));
	}
	return $data;
	
}
//---------------------------------------------------------------------------


/*

 *写到.txt中

 
*/

//---------------------------------------------------------------------------
function ReadToTxt($filepath,$filename,$midStr)
{
	$filename=$filepath.$filename;
	//$filename = "CutWord_One/Train/Environment/1";
	$fp=fopen($filename.'.txt','wb');
	foreach($midStr as $d)
	{
		fwrite($fp,$d[0]."\t".$d[1]."\r\n");
	}
	fclose($fp);
}
//---------------------------------------------------------------------------
?>