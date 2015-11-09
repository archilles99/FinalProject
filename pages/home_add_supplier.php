<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<!-- หน้าแสดง   ข้อมูลลูกค้า    ในส่วน Admin  -->
			<h3 class="panel-title"><b><u>เพิ่มข้อมูลตัวแทนจำหน่าย</b></u></h3>
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
	
		<form class="" action="" method="post" role="form" enctype="multipart/form-data">
			 <div class="form-group">
                <label for="name" class="col-sm-4 control-label">ชื่อตัวแทนจำหน่าย</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" name="SUP_NAME" placeholder="" value="<?php echo $data['SUP_NAME'];?>">
                </div>
            </div>
            <br>
             <div class="form-group">
                <label for="add" class="col-sm-4 control-label">ที่อยู่ตัวแทนจำหน่าย</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="add" name="SUP_ADD" placeholder="" value="<?php echo $data['SUP_ADD'];?>">
                </div>
            </div>
            <br>
             <div class="form-group">
                <label for="tel" class="col-sm-4 control-label">เบอร์โทรศัพท์</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="tel" name="SUP_TEL" placeholder="" value="<?php echo $data['SUP_TEL'];?>">
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="submit" class="col-sm-4 control-label"></label>
                <div class="col-sm-3">
                    <button type="submit"class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่ม</button>
                </div>
            </div>
		</form>