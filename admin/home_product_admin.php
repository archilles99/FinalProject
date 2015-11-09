<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><b><u>ข้อมูลสินค้า</u></b></h3>
		</div>
		<br>

<form action="" method="get" class="form-inline" role="form">
	<div class="form-group pull-right col-xs-12 col-sm-6 col-md-7 col-lg-7 pull-right">
		<input type="text" name="keyword" class="form-control" placeholder="Search">&nbsp;&nbsp;			
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
		<a  href="add_product.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่ม</a>
	</div>
</form>
		<br><br>
			<div class="panel-body">
				<table class="table table-striped table-bordered  table-hover text-center">
					<thead>
						<tr>
							<th width="50">รหัส</th>
							<th width="90">สินค้า</th>
							<th width="150">รายละเอียดสินค้า</th>
							<th width="70">ราคา</th>
							<th width="50">แก้ไข</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
						
							$q_keyword = $_GET['keyword'];

							$sql="SELECT PRO_ID, PRO_PIC, BRAND_NAME, GEN_NAME, PRO_COLOR, PRO_PRICE
							FROM product p
							LEFT JOIN product_brand pb ON (p.BRAND_ID = pb.BRAND_ID)
							LEFT JOIN product_generation pg ON (p.GEN_ID = pg.GEN_ID)
							WHERE concat(PRO_ID, PRO_PIC, BRAND_NAME, GEN_NAME, PRO_COLOR, PRO_PRICE) 
							LIKE '%$q_keyword%' ";
							if ($brand_id != "") $sql .= "AND p.BRAND_ID = '$brand_id' ";
							$sql .= "ORDER BY PRO_ID";
							//echo $sql;
							$result=mysql_query($sql) or die(mysql_error());
							if (mysql_num_rows($result) > 0) {
								while ($data = mysql_fetch_assoc($result)) 
								{
									echo "<tr>"; ?>
										  <td><a href="zoom_product.php?PRO_ID=<?php echo $data[PRO_ID];?>"><?php echo $data[PRO_ID] ;?> </a></td>
										  <td><img src="uploads/<?php echo $data[PRO_PIC];?>" alt="..." width="100"></td> 
								<?php	echo"
										  	<td><b>$data[BRAND_NAME]</b> <br> $data[GEN_NAME] <br> <mark>Color : ($data[PRO_COLOR])</mark></td>
                                            <td>$data[PRO_PRICE]</td> " ?>
										  <td><a href="edit_product.php?PRO_ID=<?php echo $data[PRO_ID];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"> </span></a> </td>
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