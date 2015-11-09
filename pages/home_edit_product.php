<?php
$q_id = $_GET['PRO_ID'];
$sql = "SELECT *
FROM product p
LEFT JOIN product_brand pb ON (p.BRAND_ID = pb.BRAND_ID)
LEFT JOIN product_generation pg ON (p.GEN_ID = pg.GEN_ID)
WHERE PRO_ID = '$q_id'";
    //echo $sql;  
$result = mysql_query($sql) or die(mysql_error());
$data = mysql_fetch_assoc($result);
?>

<div class="col-md-9">
    <form action="update_product.php" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">แก้ไขข้อมูลสินค้า</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">  
                        <!--<form role="form">-->
                        <div class="form-group">
                            <label for="id" class="col-sm-3 control-label">รหัส</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="id" name="PRO_ID" readonly value="<?php echo $data['PRO_ID'];?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="BRAND_ID" class="col-sm-3 control-label">ยี่ห้อ (Brand)</label>
                            <div class="col-sm-4">
                                <select id="BRAND_ID" name="BRAND_ID" class="form-control">
                                    <option value="">-- เลือกยี่ห้อ --</option>
                                    <?php 
                                    $sql="SELECT * FROM product_brand ";
                                    $result = mysql_query($sql) or die(mysql_error());
                                    if(mysql_num_rows($result)){
                                        while($datast = mysql_fetch_assoc($result)){ ?>

                                        <option value="<?php echo($datast['BRAND_ID'])?>" <?php echo ($datast['BRAND_ID']==$data['BRAND_ID']?"selected":"");?>><?php echo $datast['BRAND_NAME'];?></option>

                                        <?php }} ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="GEN_ID" class="col-sm-3 control-label">รุ่น (Generation)</label>
                                <div class="col-sm-5">
                                    <select id="GEN_ID" name="GEN_ID" class="form-control">
                                        <option value="">-- เลือกรุ่น --</option>
                                        <?php 
                                        $sql="SELECT * FROM product_generation ";
                                        $result = mysql_query($sql) or die(mysql_error());
                                        if(mysql_num_rows($result)){
                                            while($datast = mysql_fetch_assoc($result)){ ?>

                                            <option value="<?php echo($datast['GEN_ID'])?>"<?php echo ($datast['GEN_ID']==$data['GEN_ID']?"selected":"");?>><?php echo $datast['GEN_NAME'];?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="picture">รูปภาพ (Image)</label>
                                    <div class="col-sm-8 ">
                                        <img src="uploads/<?php echo $data['PRO_PIC'];?>" width="240px">
                                        <br><br>
                                        <input name="PRO_PIC" type="file" id="picture" accept="image/*">
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">สี (Color)</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="color" name="PRO_COLOR" placeholder="" value="<?php echo $data['PRO_COLOR'];?>">
                                    </div>
                                </div>
                                <br>

                                <br>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <label for="size" class="col-sm-3 control-label">ขนาด (Size)</label>
                                    <div class="col-sm-8">
                                        <table>
                                            <tr style="text-align: center">
                                                <td>US 8.0</td><td>US 8.5</td><td>US 9.0</td><td>US 9.5</td><td>US 10.0</td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control" id="size" name="PROS_80" placeholder="" value="<?=$data['PROS_80']?>"></td>
                                                <td><input type="text" class="form-control" id="size" name="PROS_85" placeholder="" value="<?=$data['PROS_85']?>"></td>
                                                <td><input type="text" class="form-control" id="size" name="PROS_90" placeholder="" value="<?=$data['PROS_90']?>"></td>
                                                <td><input type="text" class="form-control" id="size" name="PROS_95" placeholder="" value="<?=$data['PROS_95']?>"></td>
                                                <td><input type="text" class="form-control" id="size" name="PROS_100" placeholder="" value="<?=$data['PROS_100']?>"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">จำนวน MAX</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="price" name="PRO_MAX" placeholder="" value="<?php echo $data['PRO_MAX'];?>">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">จำนวน MIN</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="price" name="PRO_MIN" placeholder="" value="<?php echo $data['PRO_MIN'];?>">
                                    </div>
                                </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <label for="price" class="col-sm-3 control-label">ราคาต้นทุน</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="price" name="PRO_PRICE" placeholder="" value="<?php echo $data['PRO_PRICE'];?>">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <label for="price" class="col-sm-3 control-label">ราคาขาย</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php echo $data['price'];?>">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-3 col-sm-offset-3">
                                                <br>
                                                <button type="submit" class="btn btn-success">ยืนยัน</button>   
                                            </div>
                                        </div>   
                                        <!--</form>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </body>
            </html>