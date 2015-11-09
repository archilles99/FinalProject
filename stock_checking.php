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
                        <th>รหัสสินค้า</th>
                        <th>รายละเอียดสินค้า</th>
                        <th>ราคาทุนเดิม</th>
                        <th>จำนวนในคลัง (ชิ้น)</th>
                        <th>จำนวนที่รับจริง (ชิ้น)</th>
                        <th>ราคาวัตถุดิบใหม่</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
        </div>            
    </div>
</div>

