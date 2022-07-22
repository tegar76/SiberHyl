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
					<li class="breadcrumb-item text-muted active"><a href="<?= base_url($this->session->userdata('level') . '/profile') ?>" class="text-muted">Profile</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Profile</li>
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
						<?= form_open_multipart($this->session->userdata('level') . '/profile/process_update_profile') ?>
						<div class="row">
							<div class="col-md-4 text-center mb-3">
								<div class="card shadow py-4">
									<div class="img-photo justify-content-center">
										<?php if ($guru->guru_foto == 'default_profile.png') : ?>
											<img class="mx-auto d-block rounded-circle" src="<?= base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="Foto Profile guru">
										<?php else : ?>
											<img class="mx-auto d-block rounded-circle" src="<?= base_url('storage/guru/profile/' . $guru->guru_foto) ?>" width="150" alt="<?= $guru->guru_nama ?>">
										<?php endif ?>
									</div>
									<div class="line">
										<hr>
									</div>
									<div class="edit">
										<h6>Edit Foto Profile</h6>
										<!-- actual upload which is hidden -->
										<input type="file" id="imgInp" name="image_teacher" hidden />

										<label for="imgInp">Pilih File</label>
										<div class="max-file">
											<p>File Max 2MB</p>
										</div>
										<div class="file-dipilih mt-n3">
											<p>Nama File : <span id="file-chosen">Belum ada yang dipilih</span></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="card shadow px-3 pt-3">
									<div class="form-group">
										<label for="kode_guru">Kode Guru</label>
										<input name="kode_guru" id="kode_guru" type="text" class="form-control" value="<?= $guru->guru_kode ?>" readonly>
									</div>
									<div class="form-group">
										<label for="nama_guru">Nama</label>
										<input name="nama_guru" id="nama_guru" type="text" class="form-control" value="<?= $guru->guru_nama ?>" readonly>
									</div>
									<div class="form-group">
										<label for="nip_guru">NIP/NUPTK</label>
										<input name="nip_guru" id="nip_guru" type="text" class="form-control" value="<?= $guru->guru_nip ?>" readonly>
									</div>
									<div class="button-action mb-5 mt-2">
										<button type="submit" class="btn btn-sm btn-success rounded mr-2 px-4">Update</button>
										<button type="reset" class="btn btn-sm btn-secondary rounded px-4">Reset</button>
									</div>
								</div>
							</div>
						</div>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>


	<script>
		// js upload file foto
		const actualBtn = document.getElementById('imgInp');

		const fileChosen = document.getElementById('file-chosen');

		actualBtn.addEventListener('change', function() {
			fileChosen.textContent = this.files[0].name
		})
	</script>
