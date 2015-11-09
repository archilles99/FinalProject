<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
			<!-- หน้าแสดง   ข้อมูลลูกค้า    ในส่วน Admin  -->
			<h3 class="panel-title"><b><u>เพิ่มข้อมูลสินค้า</b></u></h3>
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
			<div class="panel-body ">
				<div class="form-group">
					<label for="BRAND_ID" class="col-sm-3 control-label">ยี่ห้อ (Brand)</label>
						<div class="col-sm-3">
							<select id="BRAND_ID" name="BRAND_ID" class="form-control">
							<option value="">-- เลือกยี่ห้อ --</option>
							<?php 
							$sql="SELECT * FROM product_brand ";
							$result = mysql_query($sql) or die(mysql_error());
							if(mysql_num_rows($result)){
							while($datast = mysql_fetch_assoc($result)){ ?>
					
							<option value="<?php echo($datast['BRAND_ID'])?>"<?php echo ($datast['BRAND_ID']==$data['BRAND_ID']?"selected":"");?>><?php echo $datast['BRAND_NAME'];?></option>
							<?php }} ?>
						</select>
						</div>
				</div>
				<br>
				<div class="form-group">
					<label for="GEN_ID" class="col-sm-3 control-label">รุ่น (Generation)</label>
						<div class="col-sm-5">
							<select id="GEN_ID" name="GEN_ID" class="form-control">
							<option value="">-------------- เลือกรุ่น --------------</option>
							<?php 
							$sql="SELECT * FROM product_generation ";
							$result = mysql_query($sql) or die(mysql_error());
							if(mysql_num_rows($result)){
							while($datast = mysql_fetch_assoc($result)){ ?>
					
							<option value="<?php echo($datast['GEN_ID'])?>"<?php echo ($datast['GEN_ID']==$data['GEN_ID']?"selected":"");?>><?php echo $datast['GEN_NAME'];?></option>
							<?php }} ?>
						</select>
						</div>
				</div>
				<br>
				
        	<div class="form-group">
			<label class="col-sm-3 control-label" for="picture">รูปภาพ (Image)</label>
				<div class="col-sm-2">
						<input name="PRO_PIC" type="file" id="picture" accept="image/*">
				</div>
			</div>
			<br> 
			<div class="form-group">
                <label for="color" class="col-sm-3 control-label">สี (Color)</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="color" name="PRO_COLOR" placeholder="" value="">
                </div>
            </div>
            <br>
            <div class="clearfix"></div>
            <div class="form-group">
                <label for="size" class="col-sm-3 control-label">ขนาด (Size)</label>
                <div class="col-sm-6">
			<table>
				<tr>
					<td>US 8.0</td><td>US 8.5</td><td>US 9.0</td><td>US 9.5</td><td>US 10.0</td>
				</tr>
                <tr>
                    <td><input type="text" class="form-control" id="size" name="PROS_80" placeholder="" value=""></td>
                    <td><input type="text" class="form-control" id="size" name="PROS_85" placeholder="" value=""></td>
                    <td><input type="text" class="form-control" id="size" name="PROS_90" placeholder="" value=""></td>
                    <td><input type="text" class="form-control" id="size" name="PROS_95" placeholder="" value=""></td>
                    <td><input type="text" class="form-control" id="size" name="PROS_100" placeholder="" value=""></td>
                </tr>
            </table></div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="price" class="col-sm-3 control-label">จำนวน MAX</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="price" name="PRO_MAX" placeholder="" value="<?php echo $data['PRO_MAX'];?>">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="price" class="col-sm-3 control-label">จำนวน MIN</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="price" name="PRO_MIN" placeholder="" value="<?php echo $data['PRO_MIN'];?>">
                </div>
            </div>
            <br>
            <div class="clearfix"></div>
			<div class="form-group">
                <label for="price" class="col-sm-3 control-label">ราคา (Price)</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="price" name="PRO_PRICE" placeholder="" value="<?php echo $data['PRO_PRICE'];?>">
                </div>
            </div>
            <br><br>
            <div class="form-group">
                <label for="qty" class="col-sm-3 control-label"></label>
                <div class="col-sm-3">
                    <button type="submit"class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;เพิ่ม</button>
                </div>
            </div>
			</div>
		</form>