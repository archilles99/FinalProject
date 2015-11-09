<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once 'config.php';
/*
 * Function สำหรับการ Login
 */
function doLogin($user,$pass)
{
	# เรียกใช้งานตัวเชื่อมต่อ DB
	require_once('dbconnection.php');
	# สร้าง  SQL สำหรับเลือกข้อมูลจาก DB 
	$sql = "Select * From users Where USER_NAME ='$user' and USER_PASS='$pass';";
	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0) 
	{
		# เมื่อพบข้อมูล user pass ที่ต้องการ
		$data = mysql_fetch_assoc($result);
		/* นำข้อมูลจาก DB เข้าไปเก็บใน SESSION
		 * $data['...']  ... คือชื่อ Field ใน Table ที่เรียกข้อมูล
		 * เช่น  จะนำชื่อ user มา เก็บใน session โดย Table ในฐานข้อมูลมี Field ชื่อว่า username
		 * ให้เข้าถึงโดยใช้ $data['username']
		 */
		$_SESSION['id'] = $data['USER_ID']; # รหัสผู้ใช้
		$_SESSION['user'] = $data['USER_NAME']; # ชื่อจริงผู้ใช้
		$_SESSION['type'] = $data['USER_TYPE']; # สถานะผู้ใช้
		$_SESSION['name'] = $data['USER_FNAME'].' '.$data['USER_LNAME'];

		return true;
	}
	else return false;
}

function logout()
{
	session_destroy();
	header('location: index.php');
}

/*
 * Function สำหรับตรวจสอบการ Login
 */
function Checklogin()
{
	# ตรวจสอบว่ามีการสร้าง Session ชื่อว่า  user นี้ไว้
	# หากพบแล้วหมายความว่า Login แล้ว
	# * $_SESSION['user'] จะถูกกำหนดไว้ใน Function doLogin เรียบร้อยแล้ว
	if(isset($_SESSION['user']))
	{
		return true;
	}
	else return false;
}

function Checktel($tel)
{
	if(strlen($tel) == 10)
	{
		$group1 = substr($tel, 0 , 3);
		$group2 = substr($tel, 3 , 3);
		$group3 = substr($tel, 6 , 4);

		return $group1."-".$group2."-".$group3;
	}
	elseif(strlen($tel) == 9) 
	{
		$group1 = substr($tel, 0 , 2);
		$group2 = substr($tel, 2 , 3);
		$group3 = substr($tel, 5 , 4);

		return $group1."-".$group2."-".$group3;
	}
}

function getPicture($fieldName)
{
	# กำหนดหน่วยวัด
	define('KB', 1024);
	define('MB', 1048576);
	# กำหนดขนาดไฟล์สูงสุด
	$fileSize = 5*MB;

	# กำหนดโฟล์เดอร์สำหรับเก็บรูป
	$uploadFolder = "uploads/";

	# หากพบ error = 4 คือไม่มีไฟล์รูปเข้ามา
	# จะไม่ถือว่า error
	# และ return ไฟล์รูปเป็น String ว่าง
	if ($_FILES[$fieldName]["error"] == 4) return array(
		'error' => false, # บอกว่าไม่ error
		'filename' => "" # ให้ชื่อไฟล์เป็น String เปล่า
	);

	# กำหนดนามสกุลไฟล์ที่อนุญาต
	$allowedExts = array("gif", "jpeg", "jpg", "png");

	# หานามสกุลไฟล์ โดย explode
	# แยกชื่อไฟล์ด้วย  .  
	# เช่นชื่อไฟล์  foobar.jpg  จะได้ Array  [0]="foobar" ,[1]="jpg"
	$temp = explode(".", $_FILES[$fieldName]["name"]);
	# end(array) นำค่าสุดท้ายจาก array $temp  มาเป็นนามสกุล = "jpg"
	$extension = strtolower(end($temp));

	# ตั้งเงื่อนไขรูปแบบไฟล์จริง ๆ  ไม่ขึ้นกับนามสกุล
	# หากไม่อยู่ในเงื่อนไข จะ Error ออกมาที่ return
	if ((($_FILES[$fieldName]["type"] == "image/gif")
	|| ($_FILES[$fieldName]["type"] == "image/jpeg")
	|| ($_FILES[$fieldName]["type"] == "image/jpg")
	|| ($_FILES[$fieldName]["type"] == "image/pjpeg")
	|| ($_FILES[$fieldName]["type"] == "image/x-png")
	|| ($_FILES[$fieldName]["type"] == "image/png"))
	&& ($_FILES[$fieldName]["size"] < $fileSize)
	&& in_array($extension, $allowedExts)) {
		# กรณี ถูกเงื่อนไข

		# ตรวจสอบข้อผิดพลาด ที่อาจเกิดขึ้น
		if ($_FILES[$fieldName]["error"] > 0) {
			return array(
				'error' => true, # บอกว่า error
				'errno' => $_FILES[$fieldName]["error"], # บอกหมายเลข error
				'errmsg' => "Error upload file #".$_FILES[$fieldName]["error"] #ข้อความบอกว่า error
			);
		} else {
			# นำไฟล์รูปมาแปลงเป็น MD5 
			$fileMD5 = md5(date("YmdHis")); //md5_file($_FILES[$fieldName]["tmp_name"]);
			$fileNameMD5 = $fileMD5 . '.' . $extension; # เติมนามสกุลให้ชื่อไฟล์

			# ย้ายไฟล์เข้า Folder ที่กำหนด
			move_uploaded_file($_FILES[$fieldName]["tmp_name"], $uploadFolder . $fileNameMD5);
			return array(
				'error' => false, # ไม่ error
				'filename' => $fileNameMD5, # บอกชื่อไฟล์ที่อับโหลดแล้ว
				'path' => $uploadFolder . $fileNameMD5, # บอกที่อยู่ของไฟล์
				'size' => $_FILES[$fieldName]["size"] / 1024 # บอกขนาดของไฟล์
			);
		}
	} else {
		# กรณี ไม่ใช่ไฟล์รูปภาพ

		# ส่งค่ากลับว่า error
		return array(
			'error' => true,
			'errmsg' => "Invalid file"
		);
	}
}

function newid($prefix, $pk, $tablename, $numlen = 3) {
	//$prefix = 'rmat';
	$prefix_size = strlen($prefix);
	$sq0="SELECT RIGHT($pk, $numlen) AS $pk from $tablename WHERE LEFT($pk, $prefix_size) = '$prefix' 
	ORDER BY $pk DESC LIMIT 1";
	$query = mysql_query($sq0) or exit( mysql_error() ); 
	$data=mysql_fetch_assoc($query);
	$last_id = $data[$pk];
	if( $last_id ){
		$new_id = $prefix.(substr('00000000'.++$last_id, -$numlen) );
	}else{
		$new_id = $prefix.(substr('000000001', -$numlen) );
	}
	return $new_id;
}

/**
 * ฟังชั่น เปลี่ยนสีคำ
 * @param type $text ข้อความทั้งหมด
 * @param type $textFind ข้อความที่ต้องการให้เป็นสีเขียว
 * @return type ข้อความ HTML
 */
function textColor($text, $textFind) {
    $color = "";
    
    
    if ($text == $textFind) {
        $color = "text-success";
    } else {
        $color = "text-danger";
    }
    
    return "<span class='$color'>$text</span>";
}