<?php
    session_start();
    include "dbconnection.php";
    include "function.php";
    include "header.php"; 
?>
<div class="container" style="width: 590px">
<form action="register_process.php" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">สมัครสมาชิก</div>
          <div class="panel-body">
            <div class="row">
            <div class="col-md-10 col-md-offset-1">  
            <!--<form role="form">-->
            <div class="form-group">
                <label for="exampleInputEmail1" class="col-sm-5 control-label">Username*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1" class="col-sm-5 control-label">Password *</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleconfirmPassword1" class="col-sm-5 control-label">Confirm Password *</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="confirm_password" placeholder="Confirm Password">
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="exampleFirstname1" class="col-sm-5 control-label">ชื่อ *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="fname" placeholder="ชื่อ">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleLastname1" class="col-sm-5 control-label">นามสกุล * </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="lname" placeholder="นามสกุล">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="examplegender1" class="col-sm-5 control-label">เพศ</label>
                <div class="col-sm-3">
                    <select class="form-control" name="gender">
                        <option>ชาย</option>
                        <option>หญิง</option>
                    </select>
                <!--<input type="text" class="form-control" id="name" placeholder="Name">-->
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleborn1" class="col-sm-5 control-label">วันเดือนปี เกิด *</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="name" name="birthday" placeholder="1999-09-19">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleaddress1" class="col-sm-5 control-label">ที่อยู่ *</label>
                <div class="col-sm-7">
                    <textarea type="text" class="form-control" id="name" name="address" placeholder="ที่อยู่"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="examplephone1" class="col-sm-5 control-label">เบอร์โทรศัพท์ *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="tel" placeholder="0812345678" maxlength="10">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleemail1" class="col-sm-5 control-label">อีเมล์ *</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" id="name" name="email" placeholder="ifootball.studio@gmail.com">
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