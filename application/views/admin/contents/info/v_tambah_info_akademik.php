<!-- Import multiple select -->
<?php include APPPATH . '../assets/MSelectDialogBox-master/import_multiple_select.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Tambah Info Akademik</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Info</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/info/info-akademik') ?>" class="text-muted">Info Akademik</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Info Akademik</li>
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
							<?= form_open_multipart('master/info/tambah_info_akademik') ?>
							<label for="index_kelas">Index Kelas</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('index_kelas')) ? 'is-invalid' : '' ?>" id="index_kelas" name="index_kelas" title="Pilih Index Kelas">
									<option value="" selected>Pilih Index Kelas</option>
									<option value="all">Semua Kelas</option>
									<option value="X" <?= (set_value('index_kelas') == "X") ? 'selected' : '' ?>>Kelas X</option>
									<option value="XI" <?= (set_value('index_kelas') == "XI") ? 'selected' : '' ?>>Kelas XI</option>
									<option value="XII" <?= (set_value('index_kelas') == "XII") ? 'selected' : '' ?>>Kelas XII</option>
								</select>
								<div class="invalid-feedback">
									<?= form_error('index_kelas', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="info-jurusan">Jurusan</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('jurusan')) ? 'is-invalid' : '' ?>" id="info-jurusan" name="jurusan" title="Pilih Jurusan">
									<option value="" selected>Pilih Jurusan Kelas</option>
									<option value="all">Semua Jurusan</option>
									<?php foreach ($jurusan as $row => $value) : ?>
										<option value="<?= $value->kode_jurusan ?>" <?= (set_value('jurusan') == $value->kode_jurusan) ? 'selected' : '' ?>><?= $value->kode_jurusan ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('jurusan', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="kelas_jurusan">Kelas</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('kelas_jurusan[]')) ? 'is-invalid' : '' ?>" id="kelas_jurusan" name="kelas_jurusan[]" title="Pilih Kelas" multiple="multiple">
								</select>
								<div class="invalid-feedback">
									<?= form_error('kelas_jurusan[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="judul_info">Judul</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_info" id="judul_info" placeholder="Masukan Judul" class="form-control <?= (form_error('judul_info')) ? 'is-invalid' : '' ?>" value="<?= set_value('judul_info') ?>">
								<div class="invalid-feedback">
									<?= form_error('judul_info', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="file_info">Upload File</label>
							<div class="input-group mb-3">
								<input type="file" name="file_info" id="file_info" class="form-control <?= (form_error('file_info')) ? 'is-invalid' : '' ?>">
								<div class="invalid-feedback">
									<?= form_error('file_info', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-5">
								<p>*File max 2 MB dengan format PDF</p>
							</div>
							<div class="btn-aksi">
								<button type="submit" name="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
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
