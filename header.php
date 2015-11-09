<!doctype html>
<html lang="en">
<head>
	<!--validation-->
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="menu_source/styles.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="/menu_source/styles.css" rel="stylesheet" type="text/css">	
	<script src="js/jquery.min.js" type="text/javascript"></script>	
	<!--<script src="js/jquery.validationEngine.js" type="text/javascript"></script>-->
	<script type='text/javascript' src='js/menu_jquery.js'></script>
	<script src="js/bootstrap.min.js"></script>
	<script type='text/javascript' src='js/menu_jquery_admin.js'></script>
        <script type='text/javascript' src='js/app.js'></script>
	<meta charset="UTF-8">
	<title>iFootball Studio</title>
</head>
<body>

	<!--<p>ร้านจำหน่ายรองเท้าฟุตบอล Online "iFootball Studio"</p>-->
	<div class="header hidden-print">
		<div class="container logo" style="width: 960px">
			<div class="row">
				<div class="col-md-5 col-md-offset-9">
					<div class="search">                  
						<form class="navbar-form pull-left" action="/search/" method="post">
							<label for="search">Search</label>
							<input type="text" name="keyword" id="search" class="search-query span2" placeholder="Search">
							<input type="submit" value="Search">
						</form>                                                                                                                                                
					</div>
				</div>
			</div>
		</div>
		<div class="sub-header">
			<div class="container" style="width: 960px">
				
				<div id='cssmenu'>
					<ul>
						<li class='active'><a href='index.php'><span>HOME</span></a></li>
						<li class='has-sub'><a href='#'><span>PRODUCTS</span></a>
							<ul>
								<?php
									$sql = "SELECT * FROM product_brand ";
									$rs = mysql_query($sql) or die(mysql_error());
									while ($menubrand = mysql_fetch_assoc($rs)) {
										echo "<li class=''><a href='product.php?brand_id=$menubrand[BRAND_ID]'>$menubrand[BRAND_NAME]</a></li>";
									}
								?>
							</ul>
						</li>
						<li><a href='#'><span>ABOUT</span></a></li>
						<li class='last'><a href='#'><span>CONTACT</span></a></li>						
					</ul>

	
					<?php if (!Checklogin()) { ?>
					<ul style="float:right">
						<li class="has-sub2"  style="float: right;">
							<a href="login.php"><span>LOG IN</span></a>
						</li>
						<li class="has-sub2"  style="float: right">
							<a href="register.php"><span>SIGN UP</span></a>
						</li>
					</ul>
					<?php } ?>
				</div>
			
		
		<?php
		if (Checklogin()) { ?>
		<ul class="nav navbar-nav navbar-right">
			<p class="navbar-text">
		<?php
			switch ($_SESSION['type']) {
				case 'admin':
					echo "ผู้ดูแลระบบ  :";
					break;
				case 'customer':
					echo "ลูกค้า  :";
					break;
				
				default:
					//echo "ไม่พบข้อมูล  :";
					break;
			}
		?>
	</p>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name'];?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#">แก้ไขข้อมูลส่วนตัว</a></li>
					<li class="divider"></li>
					<li><a href="logout.php">ออกจากระบบ</a></li>
				</ul>
			</li>
		</ul>
		<?php } ?>
	</div>

</div>
</div>
<div class="container" style="width: 960px">