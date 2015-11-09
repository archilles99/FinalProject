<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><u>ข้อมูลสั่งซื้อสินค้า</u></b></h3>
        </div>
        <br>

        <form action="updatecart_admin.php" method="post" class="form-inline" role="form">
            <div class="panel-body">
                <div class="form-group text-center">
                    <label for="SUP_ID" class="col-sm-5 control-label">ตัวแทนจำหน่าย</label>
                    <div class="col-sm-5">
                        <select id="SUP_ID" name="SUP_ID" class="form-control">
                            <option value="">------- เลือกตัวแทนจำหน่าย ------</option>
                            <?php
                            $sql = "SELECT * FROM supplier ";
                            $result = mysql_query($sql) or die(mysql_error());
                            if (mysql_num_rows($result)) {
                                while ($datast = mysql_fetch_assoc($result)) {
                                ?>
    <option value="<?php echo($datast['SUP_ID']) ?>"<?php echo ($datast['SUP_ID'] == $data['SUP_ID'] ? "selected" : ""); ?>><?php echo $datast['SUP_NAME']; ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br><br><br>
                <table class="table table-striped table-bordered  table-hover text-center vertmiddle">
                    <thead>               
                        <tr>
                            <th width="70">รูป</th>
                            <th Width="50">รหัส</th>
                            <th width="150">รุ่น</th>
                            <th width="70">ขนาด</th>
                            <th width="10">จำนวน</th>
                            <!--<th width="70">ราคา</th>-->
                            <th width="50">ลบรายการ</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $total_price = $num = $i = 0;
                        while ($meResults[$i]) {
                            $meResult = $meResults[$i++];
                            $key = array_search($meResult['PRO_ID'] . '|' . $itemsizes[$num], $_SESSION['cart']);
                            $total_price = $total_price + ($meResult['PRO_PRICE'] * $_SESSION['qty'][$key]);
                            ?>
                            <tr>
                                <td><img src="uploads/<?php echo $meResult['PRO_PIC']; ?>" width="90" border="0"></td>
                                <td><?php echo $meResult['PRO_ID']; ?></td>
                                <td><?php echo '<b>' . $meResult['BRAND_NAME'] . '</b><br>' . $meResult['GEN_NAME'] . '<br>' . '<mark>Color : ' . $meResult['PRO_COLOR'] . '</mark>'; ?></td>
                                <td><?php echo $meResult['size']; ?></td>
                                <td>
                                    <input type="text" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
                                    <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
                                </td>
                                <!--<td><?php //echo number_format($meResult['PRO_PRICE'], 2); ?></td>-->
                                <!--<td><?php //echo number_format(($meResult['PRO_PRICE'] * $_SESSION['qty'][$key]), 2); ?></td>-->
                                <td>
                                    <a class="btn btn-danger btn-sm" href="removecart_admin.php?itemId=<?php echo $meResult['PRO_ID'] . '|' . $meResult['size']; ?>" role="button">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        ลบทิ้ง</a>
                                </td>
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
                                
                                <a href="buy_product.php" type="button" class="btn btn-danger btn-lg">ย้อนกลับ</a>
                                <button type="submit" class="btn btn-info btn-lg">สั่งซื้อสินค้า</button>
                                <!--<a href="#" type="button" class="btn btn-primary btn-lg">สั่งซื้อสินค้า</a>-->
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </form>
    </div>
</div>