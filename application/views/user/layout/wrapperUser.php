<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $judul ?></title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/template/electro/css/bootstrap.min.css" />
	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/template/electro/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/template/electro/css/slick-theme.css" />
	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/template/electro/css/nouislider.min.css" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/template/electro/css/style.css" />
</head>

<body>
	<!-- tampilkan view di folder views/mainLayout/headerHome.php -->
	<!-- Header -->
	<?php $this->load->view('mainLayout/headerHome') ?>

	<!-- tampilkan view di folder views/mainLayout/navbarHome.php -->
	<!-- Navbar -->
	<?php $this->load->view('mainLayout/navbarHome') ?>

	<!-- tampilkan view di folder views/mainLayout/contentHome.php -->
	<!-- Content -->
	<?php $this->load->view('mainLayout/contentHome') ?>

	<!-- tampilkan view di folder views/mainLayout/footerHome.php -->
	<!-- footer -->
	<?php $this->load->view('mainLayout/footerHome') ?>

	<!-- jQuery Plugins -->
	<script src="<?= base_url() ?>assets/template/electro/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/template/electro/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/template/electro/js/slick.min.js"></script>
	<script src="<?= base_url() ?>assets/template/electro/js/nouislider.min.js"></script>
	<script src="<?= base_url() ?>assets/template/electro/js/jquery.zoom.min.js"></script>
	<script src="<?= base_url() ?>assets/template/electro/js/main.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

</body>

</html>
