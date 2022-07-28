<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Materi Pelajaran</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/materi') ?>" class="text-muted">Materi</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Materi Pelajaran</li>
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
							<?= form_open_multipart('master/materi/update_file_materi/' .  $materi->materi_id) ?>
							<input type="hidden" name="materi_id" value="<?= $materi->materi_id ?>">
							<label for="judul_materi_update">Judul Materi</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_materi_update" id="judul_materi_update" value="<?= $materi->judul ?>" placeholder="Masukan Judul Materi" class="form-control <?= (form_error('judul_materi_update')) ? 'is-invalid' : '' ?>">
								<div id="judul_materi_updateFeedback" class="invalid-feedback">
									<?= form_error('judul_materi_update', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="file_materi_update">File</label>
							<div class="input-group mb-3">
								<input type="file" name="file_materi_update" id="file_materi_update" placeholder="Masukan Judul Materi" class="form-control">
							</div>
							<div class="input-group mb-3">
								<p>*File max 2mb dengan format PDF</p>
							</div>
							<div class="btn-aksi">
								<button type="submit" name="update_file" class="btn btn-sm btn-success rounded px-4 py-2 mr-3">Update</button>
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
