<?php
	session_start(); # จำเป็นต้องใช้    ต้องแก้ไขอีก
	
	$q_id= $_POST['PRO_ID'];
	$q_brand = $_POST['BRAND_ID'];
	$q_gen = $_POST['GEN_ID'];
	$q_color = $_POST['PRO_COLOR'];
	$q_s80 = $_POST['PROS_80'];
	$q_s85 = $_POST['PROS_85'];
	$q_s90 = $_POST['PROS_90'];
	$q_s95 = $_POST['PROS_95'];
	$q_s10 = $_POST['PROS_100'];
	$q_price = $_POST['PRO_PRICE'];
	$q_max = $_POST['PRO_MAX'];
	$q_min = $_POST['PRO_MIN'];

	include "dbconnection.php";
	include('function.php');
	$picture = getPicture("PRO_PIC");
					$pictureName = "";
					if ($picture['error'])
					{
						header('location: admin.php?p=product_add&error='. $picture['errmsg']);
						break;
					}
					else
					{
						$pictureName = $picture['filename'];
						// $sql = "SELECT prd_pic FROM product WHERE prd_id = '$q_id'";
						// $result = mysql_query($sql);
						// $pictureOld = mysql_fetch_assoc($result);
						// $pictureOld = $pictureOld['prd_pic'];
						// unlink("uploads/". $pictureOld);
					}
				
			$sql = "UPDATE product SET  BRAND_ID  ='$q_brand'   , 
										GEN_ID    ='$q_gen'		,
									  	PROS_80   ='$q_s80'		,
									  	PROS_85   ='$q_s85'		,
									  	PROS_90   ='$q_s90'		,
									  	PROS_95   ='$q_s95'		,
									  	PROS_100  ='$q_s10'		,
									  	PRO_MAX   ='$q_max' 	,
									  	PRO_MIN   ='$q_min'		,
									  	PRO_PRICE ='$q_price'" .   
									  	(($pictureName != "")?" , PRO_PIC = '$pictureName' ":"").
											  	"where PRO_ID ='$q_id'";
			$result = mysql_query($sql) or die(mysql_error());
	
header('location: product_admin.php');

?>