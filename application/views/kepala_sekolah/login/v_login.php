<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>logo/logo-sm.png" type="image/png">

	<!-- Bootstrap Css -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/css/bootstrap.css">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<!-- style -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/styles.css') ?>">

	<!-- SweetAlert 2 -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.min.css">
	<script src="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
	<!-- style -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/styles.css') ?>">

	<title><?= $title ?></title>
</head>

<body>

	<body oncontextmenu='return false' class='snippet-body'>

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

		<div class="container">
			<div class="row">
				<div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
					<div class="panel border bg-white">
						<div class="panel-body p-3">
							<?= form_open('kepsek/login') ?>
							<div class="logo d-flex justify-content-center mb-3">
								<img src="<?= base_url('assets/logo/logo-big.png') ?>" alt="logo">
							</div>
							<hr>
							<div class="title-form text-center mb-2">Kepala Sekolah</div>

							<?php if ($this->session->flashdata('message')) : ?>
								<div class="alert alert-warning alert-login" role="alert">
									<?= $this->session->flashdata('message') ?>
								</div>
							<?php endif ?>
							<div class="form-group py-2">
								<div class="input-field"> <span class="far fa-user p-2 bg-cyan"></span> <input type="text" name="username" id="username" <?= (form_error('username')) ? 'is-invalid' : '' ?> value="<?= set_value('username') ?>" placeholder="Masukan Username"> </div>
							</div>
							<div id="usernameFeedback" class="invalid-feedback d-block mt-n3 mb-3">
								<?= form_error('username', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="form-group py-2">
								<div class="input-field"> <span class="fas fa-lock p-2 bg-cyan"></span><input type="password" name="password" class="mr-2 <?= (form_error('password')) ? 'is-invalid' : '' ?>" value="<?= set_value('password') ?>" placeholder="Masukan Password" autocomplete="current-password" id="id_password"><i class="far fa-eye fa-xs bg-eye ml-n4" id="togglePassword"></i></span> </div>
							</div>
							<div id="passwordFeedback" class="invalid-feedback d-block mt-n3 mb-4">
								<?= form_error('password', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="form-group">
								<button type="submit" name="login" class="btn btn-masuk ml-0">Masuk</button>
							</div>
							</form>

							<footer>
								<p class="d-flex justify-content-center">&copy; 2022 Team Paradoks Technology</p>
							</footer>
						</div>
					</div>

				</div>



			</div>
		</div>

		<script>
			// Show Toggle Password
			const togglePassword = document.querySelector('#togglePassword');
			const password = document.querySelector('#id_password');
			togglePassword.addEventListener('click', function(e) {
				// toggle the type attribute
				const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
				password.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});

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

		<!-- Bootstrap Js -->
		<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/jquery.js"></script>
		<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/popper.js"></script>
		<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/bootstrap.js"></script>
	</body>

</html>
