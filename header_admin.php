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
		</div>
		<div class="sub-header">
			<div class="container" style="width: 960px">
				
				<div id='cssmenu'>
					<ul>
						<li class='active'><a href='index.php'><span>HOME</span></a></li>
						<li class='has-sub'><a href='#'><span>PRODUCTS</span></a>
							<ul>
								<li class='has-sub'><a href='#'><span>Adidas</span></a></li>
								<li class='has-sub'><a href='#'><span>Nike</span></a></li>
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