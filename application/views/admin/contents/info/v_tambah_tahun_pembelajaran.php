<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Tambah Tahun Pembelajaran</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/Info/tahun-ajar') ?>" class="text-muted">Tahun Pembelajaran</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Tahun Pembelajaran</li>
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
							<?= form_open('master/info/tambah_tahunajar') ?>
							<label for="tahun_ajar">Tahun Pembelajaran</label>
							<div class="input-group mb-3">
								<input type="text" name="tahun_ajar" id="tahun_ajar" placeholder="Masukan Tahun Pembelajaran" class="form-control <?= (form_error('tahun_ajar')) ? 'is-invalid' : '' ?>" value="<?= set_value('tahun_ajar') ?>">
								<div class="invalid-feedback">
									<?= form_error('tahun_ajar', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="semester">Semester</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('semester')) ? 'is-invalid' : '' ?>" id="semester" name="semester">
									<option value="" selected>Pilih Semester</option>
									<option value="1">Semester 1</option>
									<option value="2">Semester 2</option>
									<option value="3">Semester 3</option>
									<option value="4">Semester 4</option>
									<option value="5">Semester 5</option>
									<option value="6">Semester 6</option>
								</select>
								<div class="invalid-feedback">
									<?= form_error('semester', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="btn-aksi">
								<button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
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
