<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/logo/logo-sm.png') ?>">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!--=============== BOXICONS ===============-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

	<!-- Jquery -->
	<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/jquery.js"></script>

	<script src="<?= base_url('assets/admin-mart/assets/') ?>libs/popper.js/dist/umd/popper.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/assets/') ?>libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- apps -->
	<!-- apps -->
	<script src="<?= base_url('assets/admin-mart/dist/') ?>js/app-style-switcher.js"></script>
	<script src="<?= base_url('assets/admin-mart/dist/') ?>js/feather.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/assets/') ?>libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/dist/') ?>js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="<?= base_url('assets/admin-mart/dist/') ?>js/custom.min.js"></script>
	<!--This page JavaScript -->
	<script src="<?= base_url('assets/admin-mart/assets/') ?>extra-libs/c3/d3.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/assets/') ?>extra-libs/c3/c3.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/assets/') ?>libs/chartist/dist/chartist.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/assets/') ?>libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/assets/') ?>extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?= base_url('assets/admin-mart/assets/') ?>extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?= base_url('assets/admin-mart/dist/') ?>js/pages/dashboards/dashboard1.min.js"></script>

	<title><?= $title ?></title>
	<!-- Custom CSS -->
	<link href="<?= base_url('assets/admin-mart/assets/') ?>extra-libs/c3/c3.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/admin-mart/assets/') ?>libs/chartist/dist/chartist.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/admin-mart/assets/') ?>extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

	<!-- Custom CSS -->
	<link href="<?= base_url('assets/admin-mart/dist/') ?>css/style.min.css" rel="stylesheet">

	<!-- import style -->
	<?php include APPPATH . '../assets/guru/css/import_style.php'; ?>


	<!-- SweetAlert 2 -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.min.css">
	<script src="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>

	<!-- Datetimepicker -->
	<link rel="stylesheet" href="<?= base_url('assets/plugin/datetimepicker/jquery.datetimepicker.min.css') ?>">
	<script src="<?= base_url('assets/plugin/datetimepicker/jquery.datetimepicker.full.js') ?>"></script>
	<!-- Select 2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

	<!-- import script -->
	<?php include APPPATH . '../assets/guru/js/import_script.php' ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<script>
		$(function() {
			var title = '<?= $this->session->flashdata("title") ?>';
			var text = '<?= $this->session->flashdata("text") ?>';
			var type = '<?= $this->session->flashdata("type") ?>';
			if (title) {
				swal.fire({
					icon: type,
					title: title,
					text: text,
					type: type,
					button: true,
				});
			};
		});
	</script>
	<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>
