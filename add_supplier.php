<?php
	session_start(); # จำเป็นต้องใช้    ต้องแก้ไขอีก
	include "dbconnection.php";
	include "function.php";


	if ($_POST)
	{
		# add
		$q_id= $_POST['SUP_ID'];
		$q_name = $_POST['SUP_NAME'];
		$q_add = $_POST['SUP_ADD'];
		$q_tel = $_POST['SUP_TEL'];

		$prefix = 'sup';  # ให้เ รันเลขเอง
		$sq0="SELECT RIGHT(SUP_ID, 4) AS SUP_ID from supplier WHERE LEFT(SUP_ID, 3) = '$prefix' ORDER BY SUP_ID DESC LIMIT 1";
		$query = mysql_query($sq0) or exit( mysql_error() ); 
				$data=mysql_fetch_assoc($query);
				//die(var_dump($data));
				$last_id = $data['SUP_ID'];
				if( $last_id ){
					$new_id = $prefix.(substr('00000000'.++$last_id, -4) );
				}else{
					$new_id = $prefix.'001';
				}



		$sql = "INSERT INTO supplier VALUES ('$new_id' 	,
											'$q_name'	,
											'$q_add' 	,
											'$q_tel')";
		//die($sql);
		if (mysql_query($sql))
		{
			# completed
			$_SESSION['msginfo'] = "เพิ่มตัวแทนจำหน่าย เรียบร้อยแล้ว ";header('location: supplier.php');
		}
		else
		{
			$_SESSION['msgerror'] = 'ERROR !! : ' . mysql_error();header('location: '.$_SERVER['PHP_SELF']);
		}
		
	} else {
	include "header_admin.php";
	include "admin/sidebar_admin.php";
	include "pages/home_add_supplier.php";
	include "footer.php";
	}