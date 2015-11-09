<?php
	session_start(); # จำเป็นต้องใช้    ต้องแก้ไขอีก

	$q_id= $_GET['SUP_ID'];
	$q_name = $_POST['SUP_NAME'];
	$q_add = $_POST['SUP_ADD'];
	$q_tel = $_POST['SUP_TEL'];

	include "dbconnection.php";
	include('function.php');

	$sql = "UPDATE supplier SET SUP_NAME ='$q_name'	,
								SUP_ADD  ='$q_add'  , 
								SUP_TEL  ='$q_tel'	
							WHERE SUP_ID ='$q_id'";

	$result = mysql_query($sql) or die(mysql_error());
		
	header('location: supplier.php');

?>