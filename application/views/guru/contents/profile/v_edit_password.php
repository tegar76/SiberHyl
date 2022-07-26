<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title ?></h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active"><a href="<?= base_url($this->session->userdata('level') . '/dashboard') ?>" class="text-muted">Dashboard</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Password</li>
				</ol>
			</nav>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid mt-n4">
		<!-- *************************************************************** -->
		<!-- Start First Cards -->
		<!-- *************************************************************** -->
		<!-- *************************************************************** -->
		<!-- End Location and Earnings Charts Section -->
		<!-- *************************************************************** -->
		<!-- *************************************************************** -->
		<!-- Start Top Leader Table -->
		<!-- *************************************************************** -->

		<div class="row">
			<div class="col-12">
				<div class="mt-4 activity">
					<div class="profile">
						<div class="row">
							<div class="col-md-12">
								<div class="card shadow px-3 pt-3">
									<?= form_open($this->session->userdata('level') . '/profile/update_password') ?>
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" id="username" name="username" class="form-control" value="<?= $guru->guru_username ?>" readonly>
									</div>
									<div class="form-group">
										<label for="id_password_lama">Password Lama</label>
										<div class="d-flex justify-content-beetween">
											<input type="password" class="form-control <?= (form_error('old_pass')) ? 'is-invalid' : '' ?>" name="old_pass" value="<?= set_value('old_pass') ?>" id="id_password_lama">
											<i class="icon-show-pw far fa-eye fa-xs" id="toggle_id_password_lama"></i>
										</div>
										<?= form_error('old_pass', '<small class="text-danger">', '</small>') ?>
									</div>
									<div class="form-group">
										<label for="id_password_baru">Password Baru</label>
										<div class="d-flex justify-content-beetween">
											<input type="password" class="form-control <?= (form_error('new_pass')) ? 'is-invalid' : '' ?>" name="new_pass" value="<?= set_value('new_pass') ?>" id="id_password_baru">
											<i class="icon-show-pw far fa-eye fa-xs" id="toggle_id_password_baru"></i>
										</div>
										<?= form_error('new_pass', '<small class="text-danger">', '</small>') ?>
									</div>
									<div class="form-group">
										<label for="id_password_baru_konfirmasi">Konfirmasi Password Baru</label>
										<div class="d-flex justify-content-beetween">
											<input type="password" class="form-control <?= (form_error('conf_pass')) ? 'is-invalid' : '' ?>" name="conf_pass" id="id_password_baru_konfirmasi">
											<i class="icon-show-pw far fa-eye fa-xs" id="toggle_id_password_baru_konfirmasi"></i>
										</div>
										<?= form_error('conf_pass', '<small class="text-danger">', '</s>') ?>
									</div>
									<div class="button-action d-flex mb-3 mt-2">
										<button type="submit" class="btn btn-sm btn-success rounder mr-2 px-4">Update</button>
										<button type="reset" class="btn btn-sm btn-secondary rounder px-4">Reset</button>
									</div>
									<?= form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>



	<script>
		// Show Toggle Password Lama
		const togglePasswordLama = document.querySelector('#toggle_id_password_lama');
		const passwordLama = document.querySelector('#id_password_lama');
		togglePasswordLama.addEventListener('click', function(e) {
			// toggle the type attribute
			const typeLama = passwordLama.getAttribute('type') === 'password' ? 'text' : 'password';
			passwordLama.setAttribute('type', typeLama);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});

		// Show Toggle Password Baru
		const togglePasswordBaru = document.querySelector('#toggle_id_password_baru');
		const passwordBaru = document.querySelector('#id_password_baru');
		togglePasswordBaru.addEventListener('click', function(e) {
			// toggle the type attribute
			const typeBaru = passwordBaru.getAttribute('type') === 'password' ? 'text' : 'password';
			passwordBaru.setAttribute('type', typeBaru);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});

		// Show Toggle Password Baru
		const togglePasswordBaruKonfirmasi = document.querySelector('#toggle_id_password_baru_konfirmasi');
		const passwordBaruKonfirmasi = document.querySelector('#id_password_baru_konfirmasi');
		togglePasswordBaruKonfirmasi.addEventListener('click', function(e) {
			// toggle the type attribute
			const typeBaruKonfirmasi = passwordBaruKonfirmasi.getAttribute('type') === 'password' ? 'text' : 'password';
			passwordBaruKonfirmasi.setAttribute('type', typeBaruKonfirmasi);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
		});
	</script>
