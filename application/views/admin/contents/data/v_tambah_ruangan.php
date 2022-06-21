<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Tambah Ruangan</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/ruangan') ?>" class="text-muted">Data Ruangan</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Ruangan</li>
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
							<?= form_open('master/data/ruangan/tambah_ruangan') ?>
							<label for="kode_ruangan">Kode Ruangan</label>
							<div class="input-group mb-3">
								<input type="text" name="kode_ruangan" id="kode_ruangan" placeholder="Masukan Kode Ruangan" class="form-control <?= form_error('kode_ruangan') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_ruangan') ?>">
								<div class="invalid-feedback">
									<?= form_error('kode_ruangan', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<!-- <label for="nama_ruangan">Nama Ruangan</label>
							<div class="input-group mb-3">
								<input type="text" name="nama_ruangan" id="nama_ruangan" placeholder="Masukan Nama Ruangan" class="form-control // form_error('nama_ruangan') ? 'is-invalid' : '' ?>" value="// set_value('nama_ruangan') ?>">
								<div class="invalid-feedback">
									// form_error('nama_ruangan', '<div class="text-danger">', '</div>') ?>
								</div>
							</div> -->
							<label for="keterangan">Keterangan Ruangan</label>
							<div class="input-group mb-3">
								<textarea class="form-control <?= form_error('keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan" placeholder="keterangan ruangan (jika perlu)"><?= set_value('keterangan') ?></textarea>
								<div class="invalid-feedback">
									<?= form_error('keterangan', '<div class="text-danger">', '</div>') ?>
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
