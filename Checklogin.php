<?php
session_start(); # จำเป็นต้องใช้
include('function.php');

	# รับค่า user และ pass
	$user = $_POST["username"];
	$pass = $_POST["password"];

	# ส่งเข้าไปใน function
	if(doLogin($user,$pass))
	{
		# ถ้า Login สำเร็จ
		header('Location: index.php'); # เปลี่ยนไปหน้าที่ต้องการ
		//echo '<script>parent.window.location.href="indextc.html";</script>'; # กรณีใช้ iFrame ให้ใช้คำสั่งนี้
	} else {
		# ไม่สำเร็จ
		header('Location: login.php?err'); # เปลี่ยนไปยังหน้าที่ต้องการ
	}
	
	
?>
