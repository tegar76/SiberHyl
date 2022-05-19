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
    
	<title>Login</title>
</head>

<body>

	<div class="container d-flex justify-content-center">
		<div class="card mt-5">
			<div class="form-content">
				<div class="logo d-flex justify-content-center mb-3">
					<img src="<?= base_url('assets/logo/logo-big.png') ?>" alt="logo">
				</div>

				<hr>
				<div class="title text-center mb-4">
					Mengelola Proses Belajar - Mengajar Anda Pada Satu Sistem dengan Konsep Hybrid Learning
				</div>

				<?= form_open('login') ?>
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
							<img src="<?= base_url('assets/login/icons/info.png') ?>" alt="" class="ml-3" onclick="alertInfoLoginUsername()">
							
						</div>
						
					</div>

					<div id="usernameFeedback" class="invalid-feedback d-block mt-n4 mb-4" style="margin-left: 57px">
						<?= form_error('username', '<div class="text-danger">', '</div>') ?>
					</div>
					<div class="form-group mt-n3 mb-n1 d-flex justify-content-center">
						<p id="alertInfoLoginUsername"></p>
					</div>

					<div class="row">
						<div class="form-group d-flex justify-content-between ml-0">
							<label for="password">
								<img src="<?= base_url('assets/login/icons/pass.png') ?>" alt="user" class="mr-3">
							</label>
							<input type="password" name="password" class="form-control mr-2 <?= (form_error('password')) ? 'is-invalid' : '' ?>" value="<?= set_value('password') ?>" placeholder="Masukan Password" autocomplete="current-password" id="id_password">
							<i class="far fa-eye fa-xs ml-n5" id="togglePassword"></i>
							<img src="<?= base_url('assets/login/icons/info.png') ?>" alt="" onclick="alertInfoLoginPassword()" style="margin-left: 42px;"> 
							
						</div>
						
					</div>
				</div>

				<div id="passwordFeedback" class="invalid-feedback d-block mt-n2 mb-1" style="margin-left: 40px">
					<?= form_error('password', '<div class="text-danger">', '</div>') ?>
				</div>
				<div class="form-group d-flex justify-content-center">
					<p class="alert-login" id="alertInfoLoginPassword"></p>
				</div>


				<div class="row d-flex justify-content-center mt-n3">
					<div class="form-group">
						<select class="form-control <?= (form_error('hak_akses')) ? 'is-invalid' : '' ?>" id="hak_akses" name="hak_akses">
							<option selected value="">Masuk Sebagai..?</option>
							<option value="siswa">Siswa</option>
							<option value="guru">Guru Pengajar</option>
							<option value="wali-kelas">Wali Kelas</option>
						</select>
						<div id="hak_aksesFeedback" class="invalid-feedback">
							<?= form_error('hak_akses', '<div class="text-danger">', '</div>') ?>
						</div>
					</div>

					<div class="form-group mt-3 d-flex justify-content-between">
						<button type="submit" class="btn btn-masuk px-4">Masuk</button>
						<a href="" class="ml-3">Lupa Password ?</a>
					</div>
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
		// <!-- Alert info login Username -->
		function alertInfoLoginUsername() {
			document.getElementById("alertInfoLoginUsername").innerHTML =
				'<div class="alert alert-white border-gray alert-dismissible fade show" role="alert"><span>Catatan : </span><br> <span> Siswa </span>dalam mengisi Username menggunakan <span>NIS (masing-masing)</span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

		// Alert info login Password

		function alertInfoLoginPassword() {
			document.getElementById("alertInfoLoginPassword").innerHTML =
				'<div class="alert alert-white border-gray alert-dismissible fade show" role="alert"><span>Catatan : </span><br> <span>Siswa</span> dalam menginput Password menggunakan Password default <span>siswa-2022</span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
		}

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
