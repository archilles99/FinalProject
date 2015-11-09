<?php
$q_id = $_GET['SUP_ID'];
$sql = "SELECT SUP_ID, SUP_NAME, SUP_ADD, SUP_TEL
FROM supplier
WHERE SUP_ID = '$q_id'";
    //echo $sql;  
$result = mysql_query($sql) or die(mysql_error());
$data = mysql_fetch_assoc($result);
?>

		<div class="col-md-9">
			<form action="update_supplier.php?SUP_ID=<?= $q_id ?>" method="post" role="form" enctype="multipart/form-data">
				 <div class="panel panel-default">
            		<div class="panel-heading">แก้ไขข้อมูลตัวแทนจำหน่าย</div>
            			<div class="panel-body">
                			<div class="row">
								<div class="form-group">
							        <label for="SUP_NAME" class="col-sm-4 control-label">ชื่อตัวแทนจำหน่าย</label>
							        <div class="col-sm-7">
							            <input type="text" class="form-control" id="SUP_NAME" name="SUP_NAME" placeholder="" value="<?php echo $data['SUP_NAME'];?>">
							        </div>
							    </div>
							    <br>
							     <div class="form-group">
							        <label for="SUP_ADD" class="col-sm-4 control-label">ที่อยู่ตัวแทนจำหน่าย</label>
							        <div class="col-sm-7">
							            <input type="text" class="form-control" id="SUP_ADD" name="SUP_ADD" placeholder="" value="<?php echo $data['SUP_ADD'];?>">
							        </div>
							    </div>
							    <br>
							     <div class="form-group">
							        <label for="SUP_TEL" class="col-sm-4 control-label">เบอร์โทรศัพท์</label>
							        <div class="col-sm-3">
							            <input type="text" class="form-control" id="SUP_TEL" name="SUP_TEL" placeholder="" value="<?php echo $data['SUP_TEL'];?>">
							        </div>
							    </div>
							    <br>
							    <div class="col-sm-12">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <br>
                                        <button type="submit" class="btn btn-success">ยืนยัน</button>   
                                    </div>
                                </div>   
							</div>
						</div>
					</div>
				</form>
			</div>
		</body>
	</html>