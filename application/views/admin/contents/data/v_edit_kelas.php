<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Kelas</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/kelas') ?>" class="text-muted">Data Kelas</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Kelas</li>
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
					<?= ($this->session->flashdata('wali_kelas')) ? '<small class="text-danger mt-2">' . $this->session->flashdata('wali_kelas') . '</small>' : '' ?>
					<div class="card shadow mb-4">
						<div class="container my-3">
							<?= form_open('master/data/kelas/update_kelas/' . $kelas->kode_kelas) ?>
							<label for="kode_kelas">Kode Kelas</label>
							<div class="input-group mb-3">
								<input type="text" name="kode_kelas" id="kode_kelas" value="<?= $kelas->kode_kelas ?>" readonly class="form-control">
							</div>
							<label for="nama_kelas">Kelas</label>
							<div class="input-group mb-3">
								<input type="text" name="nama_kelas" id="nama_kelas" value="<?= $kelas->nama_kelas ?>" readonly class="form-control">
							</div>
							<label for="wali_kelas_edit">Wali Kelas</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('wali_kelas_edit')) ? 'is-invalid' : '' ?>" id="wali_kelas_edit" name="wali_kelas_edit" title="Pilih Wali Kelas">
									<?php foreach ($guru as $row => $value) : ?>
										<option value="<?= $value->guru_kode ?>" <?= ($kelas->guru_kode === $value->guru_kode) ? 'selected' : '' ?>><?= $value->guru_nama ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('wali_kelas_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="btn-aksi">
								<button type="submit" class="btn btn-sm btn-success rounded px-4 py-2 mr-3">Update</button>
								<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset Form</button>
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
