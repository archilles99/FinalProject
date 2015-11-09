<?php
    session_start();
    include "dbconnection.php";
    include "function.php";

    include "header_admin.php";
    include "admin/sidebar_admin.php";

    $q_id = $_GET['PRO_ID'];
    $sql = "SELECT *
            FROM product p
            LEFT JOIN product_brand pb ON (p.BRAND_ID = pb.BRAND_ID)
            LEFT JOIN product_generation pg ON (p.GEN_ID = pg.GEN_ID)
            WHERE PRO_ID = '$q_id'";
    //echo $sql;
    $result = mysql_query($sql) or die(mysql_error());
    $data = mysql_fetch_assoc($result) or die(mysql_error());
?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <!-- หน้าแสดง   ข้อมูลลูกค้า    ในส่วน Admin  -->
            <h3 class="panel-title"><b><u>ข้อมูลสินค้า</b></u></h3>
        </div>
        <?php
            if ($_SESSION['msgerror'] != "")
    {
        echo '
        <div class="alert alert-danger">
            '.$_SESSION['msgerror'].'
        </div>
        ';
        $_SESSION['msgerror'] = "";
    } ?>
    <div class="panel-body ">
        <div class="form-group">
            <label class="col-sm-3 control-label">ยี่ห้อ (Brand)</label>
            <div class="col-sm-3">
               <input type="text" class="form-control" id="brand" name="BRAND_NAME" placeholder="" value="<?php echo $data['BRAND_NAME'];?>" disabled>
           </div>
       </div>
       <br>
       <div class="form-group">
        <label class="col-sm-3 control-label">รุ่น (Generation)</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="gen" name="GEN_NAME" placeholder="" value="<?php echo $data['GEN_NAME'];?>" disabled>
      </div>
  </div>
  <br>

  <div class="form-group">
    <label class="col-sm-3 control-label" for="picture">รูปภาพ (Image)</label>
    <img src="uploads/<?=$data['PRO_PIC']?>" class="img-thumbnail" style="width: 260px">
</div>
<br> 
<div class="form-group">
    <label for="color" class="col-sm-3 control-label">สี (Color)</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="color" name="PRO_COLOR" placeholder="" value="<?php echo $data['PRO_COLOR'];?>" disabled>
    </div>
</div>
<br>
<div class="clearfix"></div>
<div class="form-group">
    <label for="size" class="col-sm-3 control-label">ขนาด (Size)<br>จำนวน</label>
    <div class="col-sm-6">
        <table>
            <tr>
                <td>US 8.0</td><td>US 8.5</td><td>US 9.0</td><td>US 9.5</td><td>US 10.0</td>
            </tr>
            <tr>
                <td><input type="text" class="form-control" id="size" name="PROS_80" placeholder="" value="<?=$data['PROS_80']?>" disabled></td>
                <td><input type="text" class="form-control" id="size" name="PROS_85" placeholder="" value="<?=$data['PROS_85']?>" disabled></td>
                <td><input type="text" class="form-control" id="size" name="PROS_90" placeholder="" value="<?=$data['PROS_90']?>" disabled></td>
                <td><input type="text" class="form-control" id="size" name="PROS_95" placeholder="" value="<?=$data['PROS_95']?>" disabled></td>
                <td><input type="text" class="form-control" id="size" name="PROS_100" placeholder="" value="<?=$data['PROS_100']?>" disabled></td>
            </tr>
        </table>                </div>
    </div>
    <br><br>
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
    <br>
    <div class="form-group">
        <label for="price" class="col-sm-3 control-label">ราคา (Price)</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="price" name="PRO_PRICE" placeholder="" value="<?php echo $data['PRO_PRICE'];?>" disabled>
        </div>
    </div>
    <br><br>
</div>
</form>
</div>
<?php
    include "footer.php";
?>
</body>
</html>
