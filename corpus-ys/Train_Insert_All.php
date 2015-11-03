<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<?php
/*

 *数据库连接，数据库格式设置为utf-8
 
*/
//----------------------------------------------------------------------------------------
	$con = mysql_connect("localhost","root","root");        //连接mysql
	mysql_select_db("corpus");
	mysql_query("set names utf8");						//设置连接编码为GNK
//----------------------------------------------------------------------------------------


/*

 *清除数据库train
 
*/
//----------------------------------------------------------------------------------------
	
	$sql ="truncate table train";
	mysql_query($sql) or die(mysql_error());
	
	ignore_user_abort();
	set_time_limit(0);
	$internval = 2 ;//每隔2秒运行
	$data_array=array(array(null,null));//存放类别以及同一类别的数目
	$data_array=array(array(Economy , 150),array(Education , 150),
	array(Entertainment , 150),array(Health , 150),array(Military , 130),
	array(Sport , 150),array(Technology, 150),array(Travel, 49));
//----------------------------------------------------------------------------------------


/*

 *Train：Economy
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
    	$filename = "library/train/Economy/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
          //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
        $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Economy','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
	sleep($internal);
//----------------------------------------------------------------------------------------


/*

 *Train：Education
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
    	$filename = "library/train/Education/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
          //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
         $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Education','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
	sleep($internal);
//----------------------------------------------------------------------------------------


/*

 *Train：Entertainment
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
    	$filename = "library/train/Entertainment/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
          //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
        $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Entertainment','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
		sleep($internal);	
//----------------------------------------------------------------------------------------


/*

 *Train：Health
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
    	$filename = "library/train/Health/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
          //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
         $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Health','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
	sleep($internal);	
//----------------------------------------------------------------------------------------


/*

 *Train：Military
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
		$filename = "library/train/Military/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
		//通过filesize获得文件大小，将整个文件一下子读到一个字符串中
		$contents = fread($handle, filesize ($filename));
		 $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Military',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
	sleep($internal);
//----------------------------------------------------------------------------------------


/*

 *Train：Sport
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
    	$filename = "library/train/Sport/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
          //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
         $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Sport','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
	sleep($internal);
//----------------------------------------------------------------------------------------


/*

 *Train：Technology
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
    	$filename = "library/train/Technology/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
          //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
        $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Technology','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
	sleep($internal);	
//----------------------------------------------------------------------------------------


/*

 *Train：Travel
 
*/
//----------------------------------------------------------------------------------------
	for($i=1;$i<=150;$i++){
    	$filename = "library/train/Travel/$i.txt";
		$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
          //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
        $e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
		fclose($handle);
		$sql = "insert into train (Train_Idnum,Train_Category,Train_Cg_Id,Train_Text) VALUES(NULL,'Travel','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//----------------------------------------------------------------------------------------
?>