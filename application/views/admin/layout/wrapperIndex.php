<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/template/adminwrap/assets/images/favicon.png">
	<title><?= $judul ?></title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" rel="stylesheet">
	<!-- This page CSS -->
	<!-- chartist CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
	<!-- Vector CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!--c3 CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/main/css/style.css" rel="stylesheet">
	<!-- Dashboard 1 Page CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/main/css/pages/dashboard2.css" rel="stylesheet">
	<!-- You can change the theme colors from here -->
	<link href="<?= base_url() ?>assets/template/adminwrap/main/css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border">
	<!-- Memanggil file php di admin/layout/preloadderAdmin.php -->
	<?php require_once('preloadderAdmin.php') ?>
	<div id="main-wrapper">
		<!-- Memanggil file php di admin/layout/headerAdmin.php -->
		<?php require_once('headerAdmin.php') ?>
		<!-- Memanggil file php di admin/layout/sidebarAdmin.php -->
		<?php require_once('sidebarAdmin.php') ?>
		<!-- Memanggil file php di admin/layout/contentAdmin.php -->
		<?php require_once('contentAdmin.php') ?>
	</div>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
	<!-- Bootstrap popper Core JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
	<!--Wave Effects -->
	<script src="<?= base_url() ?>assets/template/adminwrap/main/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="<?= base_url() ?>assets/template/adminwrap/main/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/main/js/custom.min.js"></script>
	<!--sparkline JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
	<!--morris JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/raphael/raphael.min.js"></script>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/morrisjs/morris.min.js"></script>
	<!--c3 JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/d3/d3.min.js"></script>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/c3-master/c3.min.js"></script>
	<!-- Vector map JavaScript -->
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- Chart JS -->
	<script src="<?= base_url() ?>assets/template/adminwrap/main/js/dashboard2.js"></script>
	<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
