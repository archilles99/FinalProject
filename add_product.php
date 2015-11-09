<?php
	session_start(); # จำเป็นต้องใช้    ต้องแก้ไขอีก
	include "dbconnection.php";
	include "function.php";


	if ($_POST)
	{
		# add
		$q_id= $_POST['PRO_ID'];
		$q_brand = $_POST['BRAND_ID'];
		$q_gen = $_POST['GEN_ID'];
		$q_color = $_POST['PRO_COLOR'];
		$q_s80 = $_POST['PROS_80'];
		$q_s85 = $_POST['PROS_85'];
		$q_s90 = $_POST['PROS_90'];
		$q_s95 = $_POST['PROS_95'];
		$q_s10 = $_POST['PROS_100'];
		$q_max = $_POST['PRO_MAX'];
		$q_min = $_POST['PRO_MIN'];
		$q_price = $_POST['PRO_PRICE'];

		$picture = getPicture("PRO_PIC");
		//var_dump($picture);die();
		$pictureName = "";
			if ($picture['error'])
			{
				header('location: admin.php?p=product_add&error='. $picture['errmsg']);
				break;
			}
			else
			{
				$pictureName = $picture['filename'];
			}


		$prefix = 'p';  # ให้เ รันเลขเอง
		$sq0="SELECT RIGHT(PRO_ID, 3) AS PRO_ID from product WHERE LEFT(PRO_ID, 1) = '$prefix' ORDER BY PRO_ID DESC LIMIT 1";
		$query = mysql_query($sq0) or exit( mysql_error() ); 
				$data=mysql_fetch_assoc($query);
				//die(var_dump($data));
				$last_id = $data['PRO_ID'];
				if( $last_id ){
					$new_id = $prefix.(substr('00000000'.++$last_id, -3) );
				}else{
					$new_id = $prefix.'001';
				}



		$sql = "INSERT INTO product VALUES ('$new_id' ,
											'$q_brand',
											'$q_gen' ,
											'$pictureName',
											'$q_color',
											'$q_s80',
											'$q_s85',
											'$q_s90',
											'$q_s95',
											'$q_s10', 
											'$q_max',
											'$q_min',
											'$q_price')";
		//die($sql);
		if (mysql_query($sql))
		{
			# completed
			$_SESSION['msginfo'] = "เพิ่มสินค้า เรียบร้อยแล้ว ";header('location: product.php');
		}
		else
		{
			$_SESSION['msgerror'] = 'ERROR !! : ' . mysql_error();header('location: '.$_SERVER['PHP_SELF']);
		}
		
	} else {
	include "header_admin.php";
	include "admin/sidebar_admin.php";
	include "pages/home_add_product.php";
	include "footer.php";
	}