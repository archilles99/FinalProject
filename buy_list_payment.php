<?php

session_start();
//session_destroy();
include "dbconnection.php";
include "function.php";


$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty'])) {
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meItem) {
        $meQty = $meQty + $meItem;
    }
} else {
    $meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
    $i = 0;
    foreach ($_SESSION['cart'] as $itemId) {
        $itemprdid = explode('|', $itemId);

        $itemId = $itemprdid[0];
        $itemsizes[] = $itemprdid[1];

        $meSql = "SELECT * "
                . "FROM product p "
                . "LEFT JOIN product_brand pb ON (p.BRAND_ID = pb.BRAND_ID) "
                . "LEFT JOIN product_generation pg ON (p.GEN_ID = pg.GEN_ID) "
                . "WHERE PRO_ID = '{$itemId}'";
        $meQuery = mysql_query($meSql);
        $meResults[$i] = mysql_fetch_assoc($meQuery);
        $meResults[$i]['size'] = $itemprdid[1]; // Size

        $i++;
    }
    $meCount = $i;
} else {
    $meCount = 0;
}


include "header_admin.php";
include "admin/sidebar_admin.php";
include "pages/home_buy_stock_payment.php";
include "footer.php";
