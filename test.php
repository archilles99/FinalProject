<?php
	session_start(); # จำเป็นต้องใช้
	include "dbconnection.php";
	include('function.php');

	echo Checktel("0854030464").'<br>';

	$phone = "0899999999";
	echo Checktel($phone);