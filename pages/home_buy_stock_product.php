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

<div class="col-md-9 text-right">
    <form action="updatecart_admin.php?itemId=<?php echo $data['PRO_ID'];?>" method="post" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading text-left"><b><u>สั่งซื้อสินค้า</u></b></div>
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
                                <input type="text" class="form-control" id="brand" name="BRAND_NAME" placeholder="" value="<?php echo $data['BRAND_NAME'];?>" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="GEN_ID" class="col-sm-3 control-label">รุ่น (Generation)</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="gen" name="GEN_NAME" placeholder="" value="<?php echo $data['GEN_NAME'];?>" disabled>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label" for="picture">รูปภาพ (Image)</label>
                                    <div class="col-sm-8 text-left">
                                        <img src="uploads/<?php echo $data['PRO_PIC'];?>" width="240px">
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">สี (Color)</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="color" name="PRO_COLOR" placeholder="" value="<?php echo $data['PRO_COLOR'];?>" disabled>
                                    </div>
                                </div>
                                <br>

                                <br>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <label for="size" class="col-sm-3 control-label">ขนาด (Size)</label>
                                    <div class="col-sm-8 text_center">
                                        <table class="table table-condensed">
                                            <tr style="text-align: center">
                                                <td>US 8.0</td><td>US 8.5</td><td>US 9.0</td><td>US 9.5</td><td>US 10.0</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group <?php if($data['PROS_80'] <= $data['PRO_MIN']) echo "has-error"; ?>">
                                                        <input type="text" class="form-control" id="size" name="size[PROS_80]" placeholder="" value="<?=$data['PROS_80']?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group <?php if($data['PROS_85'] <= $data['PRO_MIN']) echo "has-error"; ?>">
                                                        <input type="text" class="form-control" id="size" name="size[PROS_85]" placeholder="" value="<?=$data['PROS_85']?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group <?php if($data['PROS_90'] <= $data['PRO_MIN']) echo "has-error"; ?>">
                                                        <input type="text" class="form-control" id="size" name="size[PROS_90]" placeholder="" value="<?=$data['PROS_90']?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group <?php if($data['PROS_95'] <= $data['PRO_MIN']) echo "has-error"; ?>">
                                                        <input type="text" class="form-control" id="size" name="size[PROS_95]" placeholder="" value="<?=$data['PROS_95']?>" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group <?php if($data['PROS_100'] <= $data['PRO_MIN']) echo "has-error"; ?>">
                                                        <input type="text" class="form-control" id="size" name="size[PROS_100]" placeholder="" value="<?=$data['PROS_100']?>" disabled>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="text-align: center">
                                                <td>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" id="inlineCheckbox1" name="select[8.0 US]" value="1">
                                                    </label>
                                                </td>
                                                <td><label class="checkbox-inline">
                                                        <input type="checkbox" id="inlineCheckbox1" name="select[8.5 US]" value="1">
                                                    </label>
                                                </td>
                                                <td><label class="checkbox-inline">
                                                        <input type="checkbox" id="inlineCheckbox1" name="select[9.0 US]" value="1">
                                                    </label>
                                                </td>
                                                <td><label class="checkbox-inline">
                                                        <input type="checkbox" id="inlineCheckbox1" name="select[9.5 US]" value="1">
                                                    </label>
                                                </td>
                                                <td><label class="checkbox-inline">
                                                        <input type="checkbox" id="inlineCheckbox1" name="select[10.0 US]" value="1">
                                                    </label>
                                                </td>      
                                            </tr>
                                        </table>    
                                    </div>
                                </div>
                                <br><br><br><br>
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">จำนวน MAX</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="price" name="PRO_MAX" placeholder="" value="<?php echo $data['PRO_MAX'];?>" disabled>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">จำนวน MIN</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="price" name="PRO_MIN" placeholder="" value="<?php echo $data['PRO_MIN'];?>" disabled>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">ราคา (Price)</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="price" name="PRO_PRICE" placeholder="" value="<?php echo $data['PRO_PRICE'];?>" disabled>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-sm-11">
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <br>
                                        <button type="submit" class="btn btn-info">สั่งซื้อสินค้า</button>   
                                    </div>
                                </div>   
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </form>
</div>