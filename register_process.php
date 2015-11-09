<?php
	session_start(); # จำเป็นต้องใช้
	include "dbconnection.php";
	include('function.php');
	include "header.php";
	//include "sidebar.php";

	// echo $_POST['username'] .' '. $_POST['password'] .' '. $_POST['Comfirm_password'] .' '. $_POST['title'] .' '. 
	// $_POST['fname'] .' '. $_POST['lname'] .' '. $_POST['birthday'] .' '. $_POST['gender'] .' '. $_POST['address'] .' '. 
	// $_POST['tel'] .' '. $_POST['email'];
	
	$q_username = $_POST['username'];
	$q_password = $_POST['password'];
	$q_confirm = $_POST['confirm_password'];
	$q_fname = $_POST['fname'];
	$q_lname = $_POST['lname'];
	$q_birthday = $_POST['birthday'];
	$q_gender = $_POST['gender'];
	$q_address = $_POST['address'];
	$q_tel = $_POST['tel'];
	$q_email = $_POST['email'];

	if ($q_username != "" && $q_password != "" && $q_confirm != "" && $q_fname != "" && 
		$q_lname != "" && $q_gender != "" && $q_birthday && $q_address != "" && $q_tel != "" && 
		$q_email != "")
	{
		# ครบ
		if ($q_password == $q_confirm)
		{
		# process 
			// echo "OK";
			# INSERT
			$prefix = 'u';  # ให้เ รันเลขเอง
			$sq0="SELECT RIGHT(USER_ID, 4) AS USER_ID from users WHERE LEFT(USER_ID, 1) = '$prefix' ORDER BY USER_ID DESC LIMIT 1";
			$query = mysql_query($sq0) or exit( mysql_error() ); 
			$data=mysql_fetch_assoc($query);
			$last_id = $data['USER_ID'];
			if( $last_id ){
				$new_id = $prefix.(substr('00000000'.++$last_id, -4) );
			}else{
				$new_id = $prefix.'0001';
			}



			$sql = "INSERT INTO users VALUES ('$new_id', '$q_username', '$q_password', 'customer' 
				,'$q_fname','$q_lname' ,'$q_gender' ,'$q_birthday' ,'$q_address' ,'$q_tel' ,'$q_email'  )";
			//echo $sql;
			$result = mysql_query($sql) or die(mysql_error());

	

			
			 //echo "สมัครสมาชิกเรียบร้อย";
			
			include "pages/home_register_success.php";
			
		}
		else
		{
			echo "รหัสผ่านไม่ตรงกัน";
			
			//include "pages/home_regc.php";
			

		}		
	}
	else
	{
		echo "กรุณากรอกให้ครบ";
	
		//include "pages/home_regf.php";
		
	}
	include "footer.php";