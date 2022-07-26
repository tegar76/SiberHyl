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
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/data/data_materi?user=guru') ?>" class="text-muted">Data Materi (Guru)</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/data/edit_materi/' . $materi->materi_info_id) ?>" class="text-muted">Edit Data Materi (Guru)</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
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
							<?= form_open_multipart('guru/data/process_update_pdf') ?>
							<input type="hidden" name="materi_id" value="<?= $materi->materi_id ?>">
							<label for="judul_materi">Judul Materi Pembelajaran</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_materi" id="judul_materi" placeholder="Masukan Judul Materi Pembelajaran" class="form-control <?= form_error('judul_materi') ? 'is-invalid' : '' ?>" value="<?= $materi->judul ?>">
								<div class="invalid-feedback">
									<?= form_error('judul_materi', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="file_materi_update">File Materi</label>
							<div class="input-group mb-3">
								<input type="file" name="file_materi_update" id="file_materi_update" class="form-control">
							</div>
							<div class="input-group mb-3">
								<p>*File max 2mb dengan format PDF</p>
							</div>
							<div class="btn-aksi">
								<button type="submit" class="btn btn-sm btn-success border-0 rounded px-4 py-2 mr-3">Update</button>
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
