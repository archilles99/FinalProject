<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><u>ข้อมูลสินค้าคงคลัง</u></b></h3>
        </div>
        <br>

        <form action="" method="get" class="form-inline" role="form">
            <div class="panel-body">
                <table class="table table-striped table-bordered  table-hover text-center">
                    <thead>
                        <tr>
                            <th width="50">รหัส</th>
                            <th Width="80">สินค้า</th>
                            <th width="90">รายละเอียดสินค้า</th>
                            <th width="150">สถานะ</th>
                            <th width="70">สั่งซื้อ</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $q_keyword = $_GET['keyword'];

                        $sql = "SELECT *
							FROM product p
							LEFT JOIN product_brand pb ON (p.BRAND_ID = pb.BRAND_ID)
							LEFT JOIN product_generation pg ON (p.GEN_ID = pg.GEN_ID)
							WHERE concat(PRO_ID, PRO_PIC, BRAND_NAME, GEN_NAME, PRO_COLOR, PRO_PRICE) 
							LIKE '%$q_keyword%'
							ORDER BY PRO_ID";
                        //echo $sql;
                        $result = mysql_query($sql) or die(mysql_error());
                        if (mysql_num_rows($result) > 0) {
                            while ($data = mysql_fetch_assoc($result)) {
                                echo "<tr>";
                                ?>
                            <td><a href="zoom_product.php?PRO_ID=<?php echo $data[PRO_ID]; ?>"><?php echo $data[PRO_ID]; ?> </a></td> 
                            <td><img src="uploads/<?php echo $data[PRO_PIC]; ?>" alt="..." width="100"></td>
                            <?php
                            echo"
                            <td><b>$data[BRAND_NAME]</b> <br> $data[GEN_NAME] <br> <mark>Color : ($data[PRO_COLOR])</mark></td>
                            <td>";

                            $min = "สินค้าต่ำกว่ากำหนด";
                            $max = "สินค้าพร้อมจำหน่าย";

                            if ($data['PROS_80'] <= $data['PRO_MIN']) {
                                echo "<font color='red'><br><b>$min</b>";
                            } else if ($data['PROS_85'] <= $data['PRO_MIN']) {
                                echo "<font color='red'><br><b>$min</b>";
                            } else if ($data['PROS_90'] <= $data['PRO_MIN']) {
                                echo "<font color='red'><br><b>$min</b>";
                            } else if ($data['PROS_95'] <= $data['PRO_MIN']) {
                                echo "<font color='red'><br><b>$min</b>";
                            } else if ($data['PROS_100'] <= $data['PRO_MIN']) {
                                echo "<font color='red'><br><b>$min</b>";
                            } else {
                                echo "<br><font color='green'><b>$max</b>";
                            }

                            echo "</td>"
                            ?>
                            <td><br><a href="buy_stock_product.php?PRO_ID=<?php echo $data[PRO_ID]; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"> </span></a> </td>
                            <?php
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10' class='text-center'> ไม่พบข้อมูล <span class='label label-danger'>\"$q_keyword\" !</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>	
    </div>
</div>
</form>
                        <?php
                        include "footer.php";
                        ?>