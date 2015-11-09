<?php
	include "bandner.php";
?>
<br>
<div class="row">
<?php

	$sql="SELECT *
	FROM product p
	LEFT JOIN product_brand pb ON (p.BRAND_ID = pb.BRAND_ID)
	LEFT JOIN product_generation pg ON (p.GEN_ID = pg.GEN_ID)
	ORDER BY PRO_ID";
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