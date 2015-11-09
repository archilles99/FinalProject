<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><b><u>ข้อมูลตัวแทนจำหน่าย</u></b></h3>
		</div>
		<br>

<form action="" method="get" class="form-inline" role="form">
	<div class="form-group pull-right col-xs-12 col-sm-6 col-md-7 col-lg-7 pull-right">
		<input type="text" name="keyword" class="form-control" placeholder="Search">&nbsp;&nbsp;			
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
		<a  href="add_supplier.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่ม</a>
	</div>
</form>
		<br><br>
			<div class="panel-body">
				<table class="table table-striped table-bordered  table-hover text-center">
					<thead>
						<tr>
							<th width="50">รหัส</th>
							<th width="90">รายชื่อ</th>
							<th width="150">ที่อยู่</th>
							<th width="70">โทรศัพท์</th>
							<th width="50">แก้ไข</th>
						</tr>
					</thead>

					<tbody>
						<?php
						
							$q_keyword = $_GET['keyword'];

							$sql="SELECT *
							FROM supplier
							WHERE concat(SUP_ID, SUP_NAME, SUP_ADD, SUP_TEL) 
							LIKE '%$q_keyword%'
							ORDER BY SUP_ID";
							//echo $sql;
							$result=mysql_query($sql) or die(mysql_error());
							if (mysql_num_rows($result) > 0) {
								while ($data = mysql_fetch_assoc($result)) 
								{
									echo "<tr>"; ?> 
								<?php	echo" <td>$data[SUP_ID]</td>
										  	  <td>$data[SUP_NAME]</td>
										  	  <td>$data[SUP_ADD]</td>
										  	  <td>$data[SUP_TEL]</td> " ?>
										      <td><a href="edit_supplier.php?SUP_ID=<?php echo $data[SUP_ID];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"> </span></a> </td>
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