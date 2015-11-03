<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<?php
/*
 
 *连接数据库。数据库格式设置为utf-8
 
*/

//---------------------------------------------------------------------------------------
	$con = mysql_connect("localhost","root","root");        //连接mysql
	mysql_select_db("corpus");
	mysql_query("set names utf8");						//设置连接编码为utf8
//---------------------------------------------------------------------------------------
	

/*
 
 *清除test数据库
 
*/

//---------------------------------------------------------------------------------------	
	$sql = "truncate table test";
	mysql_query($sql) or die(mysql_error());
//---------------------------------------------------------------------------------------		
	
	
/*
 
 *Test:Economy
 
*/

//---------------------------------------------------------------------------------------	
	for($i=1;$i<=50;$i++){
		
		$filename = "library/test/Economy/$i.txt";
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
	
		$sql = "insert into test (Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Economy',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------

	
/*
 
 *Test:Education
 
*/

//---------------------------------------------------------------------------------------
	for($i=1;$i<=50;$i++){
		
		$filename = "library/test/Education/$i.txt";
	
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
		
		$sql = "insert into test (Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Education',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------

	
/*
 
 *Test:Entertainment
 
*/

//---------------------------------------------------------------------------------------	
	for($i=1;$i<=50;$i++){
		
		$filename = "library/test/Entertainment/$i.txt";
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
	
		$sql = "insert into test (Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Entertainment',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------

/*
 
 *连接数据库。数据库格式设置为utf-8
 
*/

//---------------------------------------------------------------------------------------	
	//---------------------------Test:Health-------------------------------------
	for($i=1;$i<=50;$i++){
    	$filename = "library/test/Health/$i.txt";
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
		$sql = "insert into test(Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Health','$i','$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------
	

/*
 
 *Test:Military
 
*/

//---------------------------------------------------------------------------------------	
	for($i=1;$i<=50;$i++){
		
		$filename = "library/test/Military/$i.txt";
	
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
		$sql = "insert into test (Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Military',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------
	
		
/*
 
 *Test:Sport
 
*/

//---------------------------------------------------------------------------------------
	for($i=1;$i<=50;$i++){
		
		$filename = "library/test/Sport/$i.txt";
	
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
		$sql = "insert into test (Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Sport',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------


/*
 
 *Test:Travel
 
*/

//---------------------------------------------------------------------------------------
	for($i=1;$i<=50;$i++){
		
		$filename = "library/test/Travel/$i.txt";
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
	
		$sql = "insert into test (Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Travel',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------

	
/*
 
 *Test:Technology
 
*/

//---------------------------------------------------------------------------------------
	for($i=1;$i<=50;$i++){
		
		$filename = "library/test/Technology/$i.txt";
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
	
		$sql = "insert into test (Test_Idnum,Test_Category,Test_Cg_Id,Test_Text) VALUES(NULL,'Technology',$i,'$contents')";
		mysql_query($sql) or die(mysql_error());
	}
//---------------------------------------------------------------------------------------
	
?>