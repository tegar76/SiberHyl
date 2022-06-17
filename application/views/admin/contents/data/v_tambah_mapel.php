<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Tambah Mapel</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/mata-pelajaran') ?>" class="text-muted">Data Mapel</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Mapel</li>
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
					<?= ($this->session->flashdata('check_mapel')) ? '<small class="text-danger mt-2">' . $this->session->flashdata('check_mapel') . '</small>' : '' ?>
					<div class="card shadow mb-4">
						<div class="container my-3">
							<?= form_open('master/data/mata-pelajaran/tambah_mapel') ?>
							<label for="nama_mapel">Mata Pelajaran</label>
							<div class="input-group mb-3">
								<input type="text" name="nama_mapel" id="nama_mapel" placeholder="Masukan Mata Pelajaran" class="form-control <?= (form_error('nama_mapel')) ? 'is-invalid' : '' ?>" value="<?= set_value('nama_mapel') ?>">
								<div class="invalid-feedback">
									<?= form_error('nama_mapel', '<div class="text-danger">', '</div>') ?>
								</div>
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
