<?php
session_start();
require "dbconnection.php";
include "function.php";

$new_id = newid('Receive_', 'RE_ID', 'receive_product');
$date = date("Y-m-d");
$sup_id = $_POST['sup_id'];

$sql = "INSERT INTO `receive_product` VALUES ('$new_id','$date','$sup_id','ยังไม่ได้รับ')";
mysql_query($sql);
//$re_id = mysql_insert_id();

foreach ($_SESSION['cart'] as $itemId) {
    $itemprdid = explode('|', $itemId);
    
    $itemId = $itemprdid[0];
    $itemSize = $itemprdid[1];
    $key = array_search($itemId . '|' . $itemSize, $_SESSION['cart']);
    $itemQty = $_SESSION['qty'][$key];
    
    $sql = "INSERT INTO `receive_detail` VALUES ('$new_id','$itemId','$itemSize','$itemQty','0')";
    mysql_query($sql) or die(mysql_error());
    //echo $sql;
    
    $i++;
}

// Clear cart
unset($_SESSION['cart']);
unset($_SESSION['qty']);

// ทำอะไรต่อก็ว่าไป
header('location: stock_payment.php?RE_ID=' . $new_id);