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

	<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>

	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

	<!-- style -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/styless.css') ?>">

	<title>Login</title>
</head>

<body oncontextmenu='return false' class='snippet-body'>

	<div class="container">
		<div class="row">
			<div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
				<div class="panel border bg-white">
					<div class="panel-body p-3">
						<?= form_open('login') ?>
						<div class="logo d-flex justify-content-center mb-3">
							<img src="<?= base_url('assets/logo/logo-big.png') ?>" alt="logo" style="width: 120px;">
						</div>

						<hr>
						<div class="title text-center mb-4">
							Mengelola Proses Belajar - Mengajar Anda Pada Satu Sistem dengan Konsep Hybrid Learning
						</div>
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
						<div class="form-group py-1 pb-2">
							<div class="input-field"> <span class="fas fa-lock px-2 bg-cyan"></span><input type="password" name="password" <?= (form_error('password')) ? 'is-invalid' : '' ?> value="<?= set_value('password') ?>" placeholder="Masukan Password" autocomplete="current-password" id="id_password"> <span style="cursor: pointer; "><i class="far fa-eye fa-xs bg-eye ml-n4" id="togglePassword"></i></span> </div>
						</div>
						<div id="passwordFeedback" class="invalid-feedback d-block mt-n3 mb-3">
							<?= form_error('password', '<div class="text-danger">', '</div>') ?>
						</div>
						<div class="form-group py-1 pb-2">
							<div class="input-field">
								<select class="custom-select <?= (form_error('hak_akses')) ? 'is-invalid' : '' ?>" id="hak_akses" name="hak_akses">
									<option selected value="">Masuk Sebagai..?</option>
									<option value="siswa">Siswa</option>
									<option value="guru">Guru Pengajar</option>
									<option value="wali-kelas">Wali Kelas</option>
								</select>
							</div>
						</div>
						<div id="hak_aksesFeedback" class="invalid-feedback d-block mt-n3 mb-3">
							<?= form_error('hak_akses', '<div class="text-danger">', '</div>') ?>
						</div>
						<div class="form-group btn-submit mt-4 d-flex justify-content-between">
							<button type="submit" class="btn btn-masuk mx-auto">Masuk</button>
							<a href="" class="mx-auto">Lupa Password ?</a>
						</div>
						<div class="catatan">
							<h6>Catatan : </h6>
							<p> <span>Siswa</span> dalam menginput Username menggunakan <span>NIS (masing-masing)</span></p>
							<p><span>Siswa</span> dalam menginput Password menggunakan Password default <span>siswa-2022</span></p>
						</div>
						</form>
					</div>
				</div>
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
	</script>

	<!-- Bootstrap Js -->
	<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/jquery.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/popper.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/bootstrap.js"></script>
</body>

</html>
