<!-- multiple select -->
<script src="<?= base_url('assets/MSelectDialogBox-master/dist/m-select-d-box.js') ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/MSelectDialogBox-master/examples/') ?>js/custom-appearr.js"></script>
<script type="application/javascript" src="<?= base_url('assets/MSelectDialogBox-master/examples/') ?>/js/example.js"></script>

<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Materi</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/materi') ?>" class="text-muted">Materi</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Materi</li>
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
					<form action="">
						<!-- looping card -->
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="kelas">Kelas</label>
								<div class="input-group mb-3">
									<input type="button" id="msdb-0" class="" style="width:100%;">
									<!-- value ada di ('assets/MSelectDialogBox-master/examples/')/js/example.js"> -->
								</div>
								<label for="kelas">Mata Pelajaran</label>
								<div class="input-group mb-3">
									<select class="custom-select" id="kelas">
										<option selected>Pilih Mata Pelajaran</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
								<div class="input-group">
									<button type="button" class="btn btn-success btn-sm btn-disabled mb-2 mt-2"><i class="fa fa-plus"></i> Materi</button>
								</div>
								<label for="kelas">Judul Materi ke- 1</label>
								<div class="input-group mb-3">
									<input type="text" name="" id="" class="form-control" placeholder="Masukan Judul">
								</div>
								<label for="kelas">Unggah Materi Pembelajaran ke -1</label>
								<div class="input-group mb-3">
									<input type="file" name="" id="" class="form-control">
								</div>
								<div class="input-group mb-3">
									<p>*File max 2mb dengan format PDF</p>
								</div>
								<div class="input-group">
									<button type="button" class="btn btn-success btn-sm btn-disabled mb-2 mt-2"><i class="fa fa-plus"></i> Video Pembelajaran</button>
								</div>
								<label for="kelas">Judul Video Pembelajaran ke- 1</label>
								<div class="input-group mb-3">
									<input type="text" name="" id="" class="form-control" placeholder="Masukan Judul Video">
								</div>
								<label for="kelas">Video Pembelajaran ke- 1</label>
								<div class="input-group mb-3">
									<input type="text" name="" id="" class="form-control" placeholder="Masukan Link Video">
								</div>
								<div class="btn-aksi">
									<button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
									<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset Form</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
