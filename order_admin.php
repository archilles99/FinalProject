<?php
session_start();
require 'dbconnection.php';
include "function.php";

include "header_admin.php";
include "admin/sidebar_admin.php";

$action = isset($_GET['a']) ? $_GET['a'] : "";
$sup_id = $_SESSION['sup_id'];
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());
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
                . " WHERE PRO_ID = '{$itemId}'";
        $meQuery = mysql_query($meSql);
        $meResults[$i] = mysql_fetch_assoc($meQuery);
        $meResults[$i]['size'] = $itemprdid[1]; // Size

        $i++;
    }
    $meCount = $i;
} else {
    $meCount = 0;
}
?>
<form action="insert_product.php" method="post">
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><u>ข้อมูลการสั่งซื้อสินค้า</u></b></h3>
        </div>
        <br>

        <?php
        if ($action == 'removed') {
            echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
        }

        if ($meCount == 0) {
            echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
        } else {
            ?>
            <?php
            $sql = "SELECT * FROM supplier WHERE SUP_ID = '$sup_id'";
            $result = mysql_query($sql) or die(mysql_error());
            $datast = mysql_fetch_assoc($result);
            ?>
            <div class="form-group">
                <label for="SUP_ID" class="col-sm-3 control-label">ตัวแทนจำหน่าย :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="color" name="PRO_COLOR" placeholder="" value="<?php echo $datast['SUP_NAME']; ?>" disabled>
                    <input type="hidden" name="sup_id" value="<?php echo $datast['SUP_ID']; ?>" />
                </div>
            </div>
        <br>
            <div class="form-group">
                <label for="SUP_ADD" class="col-sm-3 control-label">ที่อยู่ :</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="color" name="PRO_COLOR" placeholder="" value="<?php echo $datast['SUP_ADD']; ?>" disabled>
                </div>
            </div>
        <br>
            <div class="form-group">
                <label for="SUP_TEL" class="col-sm-3 control-label">โทรศัพท์ :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="color" name="PRO_COLOR" placeholder="" value="<?php echo $datast['SUP_TEL']; ?>" disabled>
                </div>
            </div>
        <br><br>
            <table class="table table-bordered text-center vertmiddle">
                <thead>
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ขนาด</th>
                        <th>จำนวน</th>
                        <!--<th>ราคาต่อหน่วย</th>
                        <th>จำนวนเงิน</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = $num = $i = 0;
                    while ($meResults[$i]) {
                        $meResult = $meResults[$i++];
                        $key = array_search($meResult['PRO_ID'] . '|' . $meResult['size'], $_SESSION['cart']);
                        $total_price = $total_price + ($meResult['PRO_PRICE'] * $_SESSION['qty'][$key]);
                        ?>
                        <tr>
                            <td><?php echo $meResult['PRO_ID']; ?></td>
                            <td><?php echo '<b>' . $meResult['BRAND_NAME'] . '</b><br>' . $meResult['GEN_NAME'] . '<br>' . '<mark>Color : ' . $meResult['PRO_COLOR'] . '</mark>'; ?></td>
                            <td><?php echo $meResult['size']; ?></td>
                            <td>
                                <?php echo $_SESSION['qty'][$key]; ?>
                                <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                                <input type="hidden" name="product_id[]" value="<?php echo $meResult['PRO_ID']; ?>" />
                                <!--<input  type="hidden" name="product_price[]" value="<?php echo $meResult['PRO_PRICE']; ?>" />
                            </td>
                            <td><?php echo number_format($meResult['PRO_PRICE'], 2); ?></td>
                            <td><?php echo number_format($meResult['PRO_PRICE'] * $_SESSION['qty'][$key]); ?></td>-->
                        </tr>
                        <?php
                        $num++;
                    }
                    ?>
                <!--<tr>
                    <td colspan="8" style="text-align: right;">
                        <h4>จำนวนเงินรวมทั้งหมด <?php echo number_format($total_price, 2); ?> บาท</h4>
                    </td>
                </tr>-->
                    <tr>
                        <td colspan="8" style="text-align: right;">
                            <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                            <a href="buy_list_payment.php" type="button" class="btn btn-danger btn-lg">ย้อนกลับ</a>
                            <button type="submit" class="btn btn-primary btn-lg">บันทึกการสั่งซื้อสินค้า</button>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>

            </form>
            <?php
        }
        include "footer.php";
        