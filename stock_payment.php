<?php

session_start();
require 'dbconnection.php';
include "function.php";

include "header_admin.php";

/**
 * Input data
 */
$RE_ID = $_GET['RE_ID'];


/**
 * Query
 */
# Receive
$sql = "SELECT RP.RE_ID, RE_DATE, S.SUP_ID, SUP_NAME, SUP_ADD, SUP_TEL 
FROM receive_product RP
LEFT JOIN supplier S ON RP.SUP_ID = S.SUP_ID 
WHERE RP.RE_ID = '$RE_ID' ";
 
$rs = mysql_query($sql) or printf(mysql_error());
$headerData = mysql_fetch_assoc($rs);
//$headerData['RE_DATE'] = "8 / JUL / 2015";
# Detail

$sql = "SELECT rd.RE_ID,rd.PRO_ID,pb.BRAND_NAME,pg.GEN_NAME ,rp.RE_DATE,PRO_SIZE,PRO_PRICE,PRO_QTY,NEW_COST
        FROM receive_detail rd
        LEFT JOIN product p ON (p.PRO_ID = rd.PRO_ID)
        LEFT JOIN product_brand pb ON (p.BRAND_ID=pb.BRAND_ID)
        LEFT JOIN product_generation pg ON (p.GEN_ID = pg.GEN_ID)
        LEFT JOIN receive_product rp on (rp.RE_ID = rd.RE_ID)
        WHERE rd.RE_ID = '$RE_ID' ";
$rs = mysql_query($sql) or die(mysql_error());
$detailData = [];
while ($data = mysql_fetch_assoc($rs)) {
    $detailData[] = $data;
}

include "pages/payment_receipt.php";
include "footer.php";
