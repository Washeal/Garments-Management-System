<?php session_start();

if(!isset($_SESSION["uid"])) header("location:index.php");

//database
require_once("db_config.php");

//user class and his foren key
 require_once("lib/components.php");
 require_once("lib/role.class.php");
 require_once("lib/user.class.php");

 //empolyee class and his foren key
 require_once("lib/empoly_class.php");
 require_once("lib/designation_class.php");
 require_once("lib/depertment_class.php");
 require_once("lib/attendance_class.php");

 require_once("lib/sample_class.php");
 require_once("lib/registrations.php");

 require_once("lib/order_class.php");

 require_once("lib/status_class.php");
 require_once("lib/order_detail.class.php");
 require_once("lib/saplayer.class.php");
 require_once("lib/purchase.class.php");
 require_once("lib/purc_detail.class.php");
 

 




?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/>
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
	<script src="assets/js/jquery.min.js"></script>
	<title>Garments Management System</title>
	<style>
	     .card-body{
			 background-color:;
		 }
	</style>
</head>

<body onload="info_noti()">
	<!--wrapper-->
	<div class="wrapper">
	 <!--start header wrapper-->	
	  <div class="header-wrapper">
		<!--start header -->
		<?php
            //start header 
             include("header.php");

			
             //navigation
             include("navebar.php");
			 include("page_wrapper.php");
			 include("footer.php");
			 include("switch.php");
			 
                  
        ?>
	   </div>
	  
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
	<script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<!--notification js -->
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>