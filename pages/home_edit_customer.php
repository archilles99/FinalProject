<?php
	$q_id = $_GET['USER_ID'];
	$sql = "SELECT * FROM users WHERE USER_ID = '$q_id'";
	$result = mysql_query($sql);
	$data = mysql_fetch_assoc($result);
?>

<div class="col-md-9">
<form action="update_customer.php" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">แก้ไขข้อมูลสมาชิก</div>
          <div class="panel-body">
            <div class="row">
            <div class="col-md-10 col-md-offset-1">  
            <!--<form role="form">-->
            <div class="form-group">
                <label for="id" class="col-sm-5 control-label">รหัส</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="id" name="USER_ID" readonly value="<?php echo $data['USER_ID'];?>">
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="fname" class="col-sm-5 control-label">ชื่อ *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="fname" name="USER_FNAME" placeholder="" value="<?php echo $data['USER_FNAME'];?>" >
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="lname" class="col-sm-5 control-label">นามสกุล * </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="lname" name="USER_LNAME" placeholder="" value="<?php echo $data['USER_LNAME'];?>">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="gender" class="col-sm-5 control-label">เพศ</label>
                <div class="col-sm-4">
                    <select class="form-control" id="gender" name="USER_GENDER">
                        <option value="ชาย" <?php echo ($data['USER_GENDER'] == "ชาย"?"select":"");?>>ชาย</option>
                        <option value="หญิง" <?php echo ($data['USER_GENDER'] == "หญิง"?"select":"");?>>หญิง</option>
                    </select>
                <!--<input type="text" class="form-control" id="name" placeholder="Name">-->
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="born" class="col-sm-5 control-label">วันเดือนปี เกิด *</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="born" name="USER_BORN" placeholder="" value="<?php echo $data['USER_BORN'];?>">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="add" class="col-sm-5 control-label">ที่อยู่ *</label>
                <div class="col-sm-7">
                    <textarea type="text" class="form-control" id="add" name="USER_ADD" placeholder=""><?php echo $data['USER_ADD'];?></textarea>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="tel" class="col-sm-5 control-label">เบอร์โทรศัพท์ *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="tel" name="USER_TEL" placeholder="" maxlength="10" value="<?php echo $data['USER_TEL'];?>">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="email" class="col-sm-5 control-label">อีเมล์ *</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="USER_EMAIL" placeholder="" value="<?php echo $data['USER_EMAIL'];?>">
                </div>
            </div>
            <br><br><br>
            <div class="col-sm-12">
                <div class="col-sm-6 col-sm-offset-5">
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