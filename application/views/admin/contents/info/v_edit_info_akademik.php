<!-- multiple select -->
<script src="<?= base_url('assets/MSelectDialogBox-master/dist/m-select-d-box.js') ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/MSelectDialogBox-master/examples/') ?>/js/examplee.js"></script>

<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Info Akademik</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Info</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/info/info-akademik') ?>" class="text-muted">Info Akademik</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Info Akademik</li>
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
	<div class="container-fluid">
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
				<div class="activity">
					<div class="card shadow mb-4">
						<div class="container my-3">
							<?= form_open_multipart('master/info/update_info_akademik/' . $this->secure->encrypt_url($infoakd->infoakd_id)) ?>
							<input type="hidden" name="infoakd_id" value="<?= $infoakd->infoakd_id ?>">
							<label for="kelas">Kelas</label>
							<div class="input-group mb-3">
								<?php if (is_array($kelas)) : ?>
									<input type="text" id="kelas" class="form-control" style="width:100%;" value="<?php foreach ($kelas as $kls) echo $kls . ", " ?>" readonly>
								<?php else : ?>
									<input type="text" id="kelas" class="form-control" style="width:100%;" value="<?= $kelas ?>" readonly>
								<?php endif; ?>
							</div>
							<label for="judul_info">Judul</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_info_update" id="judul_info" placeholder="Masukan Judul" class="form-control <?= (form_error('judul_info')) ? 'is-invalid' : '' ?>" value="<?= $infoakd->judul_info ?>">
								<div class="invalid-feedback">
									<?= form_error('judul_info_update', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="deskripsi_info">Deskripsi</label>
							<div class="input-group mb-3">
								<textarea type="text" name="deskripsi_info_update" id="deskripsi_info" placeholder="Masukan Deskripsi" class="form-control <?= (form_error('deskripsi_info')) ? 'is-invalid' : '' ?>"><?= $infoakd->deskripsi_info ?></textarea>
								<div class="invalid-feedback">
									<?= form_error('deskripsi_info_update', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="file_info">Upload File</label>
							<div class="input-group mb-3">
								<input type="file" name="file_info_update" id="file_info" class="form-control <?= (form_error('file_info')) ? 'is-invalid' : '' ?>">
								<div class="invalid-feedback">
									<?= form_error('file_info_update', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-5">
								<p>*File max 2 MB dengan format PDF</p>
							</div>
							<div class="btn-aksi">
								<button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
								<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset</button>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
