<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<?php

/*

 *连接mysql
 
*/

//----------------------------------------------------------------------------
	$con = mysql_connect("localhost","root","root");        
	mysql_select_db("corpus");
	mysql_query("set names UTF8");	
//----------------------------------------------------------------------------


/*

 *获取Train中数据
 *参数：$Train_Category[类别];$num[同一类别的数量]
 
*/	
	
//----------------------------------------------------------------------------
	function Get_Data($Train_Category,$num)
	{
		$Data=array();	
		for($i=1;$i<=$num;$i++)
		{
			$sql= "select Train_Text from train where Train_Cg_Id='$i' and Train_Category='$Train_Category'";
			$str=mysql_query($sql) or die(mysql_error()); 
			$result = mysql_fetch_array($str);
		/*	print_r($i);
			echo "<br>";
			print_r($result[0]);
			echo "<br>";
		*/
			array_push($Data,$result[0]);
			
		}
		return $Data;
	}
//----------------------------------------------------------------------------

/*
	$result = Get_Data(Environment,125);
	//print_r($result); 
*/ 
?>