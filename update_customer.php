<?php
	session_start(); # จำเป็นต้องใช้    ต้องแก้ไขอีก
	
	$q_id = $_POST['USER_ID'];
	$q_name = $_POST['USER_FNAME'];
	$q_lname = $_POST['USER_LNAME'];
	$q_born = $_POST['USER_BORN'];
	$q_gender = $_POST['USER_GENDER'];
	$q_address = $_POST['USER_ADD'];
	$q_tel = $_POST['USER_TEL'];
	$q_email = $_POST['USER_EMAIL'];
	include "dbconnection.php";
	include('function.php');

				
			$sql = "UPDATE users SET  USER_FNAME  ='$q_name'	,
									  USER_LNAME  ='$q_lname'   , 
									  USER_BORN  ='$q_born' 	,
									  USER_GENDER  ='$q_gender' , 
									  USER_ADD  ='$q_address' 	,
									  USER_TEL  ='$q_tel'       , 
									  USER_EMAIL  ='$q_email'       where USER_ID ='$q_id'";
			$result = mysql_query($sql) or die(mysql_error());
	
header('location: customer.php');