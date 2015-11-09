<?php
	session_start();
	include "dbconnection.php";
	include('function.php');	//include "header.php";
	//include "bandner.php";

	switch($_SESSION['type'])
	{
		case 'admin':
			include "header_admin.php";
			include "admin/sidebar_admin.php";
			include "pages/home_admin.php";
			break;

		case 'customer':
			//include "sidebar_customer.php";
			include "header.php";
			include "home.php";
			break;

		default:
			//include "sidebar.php";
			include "header.php";
			include "home.php";
			break;
	}

	include "footer.php";