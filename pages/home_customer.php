<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><b><u>ข้อมูลสมาชิก</u></b></h3>
		</div>
		<br>

<form action="" method="get" class="form-inline" role="form">
	<div class="form-group pull-right col-xs-12 col-sm-7 col-md-6 col-lg-6">
		<input type="text" name="keyword" class="form-control" placeholder="Search">&nbsp;&nbsp;			
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
	</div>
</form>
		<br><br>
			<div class="panel-body">
				<table class="table table-striped table-bordered  table-hover text-center">
					<thead>
						<tr>
							<th width="50">รหัส</th>
							<th width="100">ชื่อ-นามสกุล</th>
							<th width="100">ที่อยู่</th>
							<th width="100">เบอร์โทร</th>
							<th width="50">แก้ไข</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							$q_keyword = $_GET['keyword'];

							$sql="SELECT users.USER_ID,USER_FNAME,USER_LNAME,USER_GENDER,USER_ADD,USER_TEL
							FROM users 
							WHERE concat(USER_ID,USER_FNAME,USER_LNAME,USER_GENDER,USER_ADD,USER_TEL) 
							LIKE '%$q_keyword%' AND USER_TYPE = 'customer' ";
							// echo $sql;
							$result=mysql_query($sql) or die(mysql_error());
							if (mysql_num_rows($result) > 0) {
								while ($data = mysql_fetch_assoc($result)) 
								{
									echo "<tr>";
									echo "<td>$data[USER_ID]</td> <td>$data[USER_FNAME]&nbsp;$data[USER_LNAME]</td> 
										  <td>$data[USER_ADD]</td>
										  <td>".Checktel($data[USER_TEL])."</td>";?>
										  <td><a href="edit_customer.php?USER_ID=<?php echo $data['USER_ID'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"> </span></a> </td>
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
<?php
	include "footer.php";
?>