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
	<link href="<?= base_url() ?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Page CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/main/css/pages/contact-app-page.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/template/adminwrap/main/css/style.css" rel="stylesheet">
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
	<!-- Bootstrap tether Core JavaScript -->
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
</body>

</html>
