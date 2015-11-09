<?php
session_start();
require "dbconnection.php";
include "function.php";

include "header_admin.php";
include "admin/sidebar_admin.php";
?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><u>รับสินค้าที่สั่งซื้อ</u></b></h3>
        </div>
        <br>

            <div class="panel-body">
                <table class="table table-striped table-bordered  table-hover text-center vertmiddle">
                    <thead>               
                        <tr>
                            <th>รหัสใบสั่งซื้อ</th>
                            <th>วันที่สั่งซื้อ</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT RE_ID, RE_DATE, RE_STATUS FROM receive_product";
                        $result = mysql_query($sql) or die(mysql_error());
                        while ($data = mysql_fetch_assoc($result)) {
                            ?>
                            <tr href="stock_checking.php">
                                <td><?= $data['RE_ID'] ?></td>
                                <td><?= $data['RE_DATE'] ?></td>
                                <td><?= textColor($data['RE_STATUS'], 'ได้รับแล้ว') ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        
