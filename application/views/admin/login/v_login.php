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
	<title>Login Admin</title>
</head>

<body>

	<div class="container d-flex justify-content-center">
		<div class="card mt-5">
			<div class="form-content">
				<div class="logo d-flex justify-content-center mb-3">
					<h2>Admin</h2>
				</div>
				<hr class="mt-n3 w-50"> <br>

				<?= form_open('authadmin') ?>
				<div class="row justify-content-center">
					<?php if ($this->session->flashdata('message')) : ?>
						<div class="alert alert-warning" role="alert">
							<?= $this->session->flashdata('message') ?>
						</div>
					<?php endif ?>
					<div class="row mb-3">
						<div class="form-group d-flex justify-content-between">
							<label for="username">
								<img src="<?= base_url('assets/login/icons/user.png') ?>" alt="user" class="mr-3">
							</label>
							<input type="text" name="username" id="username" class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>" value="<?= set_value('username', 'username') ?>" placeholder="Masukan Username">

						</div>

					</div>

					<div id="usernameFeedback" class="invalid-feedback d-block mt-n4 mb-4" style="margin-left: 57px">
						<?= form_error('username', '<div class="text-danger">', '</div>') ?>
					</div>

					<div class="row">
						<div class="form-group d-flex justify-content-between ml-0">
							<label for="password">
								<img src="<?= base_url('assets/login/icons/pass.png') ?>" alt="user" class="mr-3">
							</label>
							<input type="password" name="password" class="form-control mr-2 <?= (form_error('password')) ? 'is-invalid' : '' ?>" value="<?= set_value('password') ?>" placeholder="Masukan Password" autocomplete="current-password" id="id_password">
							<i class="far fa-eye fa-xs ml-n4" id="togglePassword"></i>
						</div>

					</div>
				</div>

				<div id="passwordFeedback" class="invalid-feedback d-block mt-n2 mb-1" style="margin-left: 40px">
					<?= form_error('password', '<div class="text-danger">', '</div>') ?>
				</div>

				<div class="btn-submit row mt-n3">
					<button type="submit" class="btn btn-masuk px-4">Masuk</button>
				</div>

				</form>
			</div>
		</div>
	</div>

	<footer>
		<center>
			<p>&copy; 2022 Team Paradoks Technology</p>
		</center>
	</footer>

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
