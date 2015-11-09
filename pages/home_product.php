<form action="" method="get" class="form-inline" role="form">
	<!--<div class="form-group pull-right col-xs-12 col-sm-6 col-md-7 col-lg-7 pull-right">
		<input type="text" name="keyword" class="form-control" placeholder="Search">&nbsp;&nbsp;			
		<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span>&nbsp;ค้นหา</button>
		<a  href="add_product.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่ม</a>
	</div>-->
</form>
	<br><br>
		<div class="panel-body" style="width: 1024px">
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
						echo <<<HTML
						  <div class="col-sm-5 col-md-3">
						    <div class="thumbnail">
						      <img src="uploads/$data[PRO_PIC]" alt="...">
						      <div class="caption" style="text-align:center">
						        <h5><font color='#000'><b>$data[BRAND_NAME]</b><br>$data[GEN_NAME]<br><h6>($data[PRO_COLOR])</h6></h5>
						        <!--<p></p>-->
						        <br>
						        <p>ราคา <font color='red'><b>$data[PRO_PRICE]</b></font color> บาท</p>
						        <p><a href="#" class="btn btn-success" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> สั่งซื้อ </a> <a href="#" class="btn btn-default" role="button">รายละเอียด</a></p>
						      </div>
						    </div>
						  </div>
HTML;
					}
				}
				?>
		</div>
	</div>
</div>

<?php
	include "footer.php";
?>