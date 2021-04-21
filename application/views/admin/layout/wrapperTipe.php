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
    <!-- Datatables -->
    <link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/template/adminwrap/main/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() ?>assets/template/adminwrap/main/css/colors/default.css" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="fix-header card-no-border fix-sidebar">
    <?php require_once('preloadderAdmin.php') ?>
    <div id="main-wrapper">
        <?php require_once('headerAdmin.php') ?>
        <?php require_once('sidebarAdmin.php') ?>
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
    <!-- This is data table -->
    <script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>