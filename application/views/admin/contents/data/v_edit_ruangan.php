<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Ruangan</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/ruangan') ?>" class="text-muted">Data Mapel</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Ruangan</li>
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
							<?= form_open('master/data/ruangan/update_ruangan/' . $ruangan->kode_ruang) ?>
							<input type="hidden" name="ruang_id" value="<?= $ruangan->ruang_id ?>">
							<label for="kode_ruang_edit">Kode Ruangan</label>
							<div class="input-group mb-3">
								<input type="text" name="kode_ruang_edit" id="kode_ruang_edit" placeholder="Masukan Kode Ruangan" class="form-control <?= form_error('kode_ruang_edit') ? 'is-invalid' : '' ?>" value="<?= $ruangan->kode_ruang ?>">
								<div class="invalid-feedback">
									<?= form_error('kode_ruang_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<!-- <label for="nama_ruang_edit">Nama Ruangan</label>
							<div class="input-group mb-3">
								<input type="text" name="nama_ruang_edit" id="nama_ruang_edit" placeholder="Masukan Nama Ruangan" class="form-control < form_error('nama_ruang_edit') ? 'is-invalid' : '' ?>" value="< $ruangan->nama_ruang ?>">
								<div class="invalid-feedback">
									<form_error('nama_ruang_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div> -->
							<label for="keterangan_edit">Keterangan</label>
							<div class="input-group mb-3">
								<textarea class="form-control <?= form_error('keterangan_edit') ? 'is-invalid' : '' ?>" name="keterangan_edit" id="keterangan_edit" placeholder="keterangan ruangan (jika perlu)"><?= $ruangan->keterangan ?></textarea>
								<div class="invalid-feedback">
									<?= form_error('keterangan_edit', '<div class="text-danger">', '</div>') ?>
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
