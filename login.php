<?php
	session_start();
	include "dbconnection.php";
	include "function.php";
	include "header.php";	
?>
<!-- Form สำหรับรับข้อมูลการ Login -->
<div class="container" style="width: 460px">
<div class="panel panel-default">
  	<div class="panel-heading">ลงชื่อเข้าสู่ระบบ</div>
	  	<div class="panel-body">
	  		<div class="row">
			<div class="col-md-12">
			<form class="form-horizontal" role="form" action="Checklogin.php" method="POST">
				<div class="form-group">
					<label for="inputUser1" class="col-sm-4 control-label">Username :</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="username" name="username" placeholder="username">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Password :</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-4 col-sm-10">
					<?php if(isset($_GET['err'])) echo "**Username หรือ Password ไม่ถูกต้อง!!"; ?>
					<br>
					<button type="submit" class="btn btn-default">LOGIN</button>
					
				</div>
				</div>
			</form>
			</div>
			</div>
		</div>
</div>
</div>
</body>
</html>