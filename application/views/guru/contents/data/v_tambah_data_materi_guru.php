<!-- Import multiple select -->
<?php include APPPATH . '../assets/MSelectDialogBox-master/import_multiple_select.php'; ?>

<!-- import select search -->
<?php include APPPATH . '../assets/select-with-search/import_select_with_search.php'; ?>

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
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/data/data_materi?user=guru') ?>" class="text-muted">Data materi (Guru)</a></li>
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
					<?= form_open_multipart('guru/data/tambah_materi') ?>
					<!-- looping card -->
					<div class="card shadow mb-4">
						<div class="container my-3">
							<label for="kelas">Kelas</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= (form_error('kelas')) ? 'is-invalid' : '' ?>" name="kelas" id="pilih-kelas-materi">
									<option value="" selected>Pilih Kelas</option>
									<?php foreach ($kelas as $kls) : ?>
										<option value="<?= $kls->id ?>"><?= $kls->nama ?></option>
									<?php endforeach ?>
								</select>
								<div id="kelasFeedback" class="invalid-feedback">
									<?= form_error('kelas', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="mapel">Mata Pelajaran</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= (form_error('mapel')) ? 'is-invalid' : '' ?>" name="mapel" id="pilih-mapel-materi">
									<option value="" selected>Pilih Mata Pelajaran</option>
									<?php foreach ($mapel as $mp) : ?>
										<option value="<?= $mp->id ?>"><?= $mp->nama ?></option>
									<?php endforeach ?>
								</select>
								<div id="mapelFeedback" class="invalid-feedback">
									<?= form_error('mapel', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group">
								<button type="button" class="btn btn-success btn-sm btn-disabled mb-2 mt-2" id="btn-tambah-materi" data-toggle="tooltip" data-placement="top" title="+ Form Materi"><i class="fa fa-plus"></i> Materi</button>
							</div>
							<label for="judul_materi">Judul Materi ke-1</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_materi[]" id="judul_materi" class="form-control <?= (form_error('judul_materi[]')) ? 'is-invalid' : '' ?>" placeholder="Masukan Judul">
								<div id="judul_materiFeedback" class="invalid-feedback">
									<?= form_error('judul_materi[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="file_materi">Unggah Materi Pembelajaran ke-1</label>
							<div class="input-group mb-3">
								<input type="file" name="file_materi[]" id="file_materi" class="form-control <?= (form_error('file_materi[]')) ? 'is-invalid' : '' ?>">
								<div id="file_materiFeedback" class="invalid-feedback">
									<?= form_error('file_materi[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-3">
								<p>*File max 2mb dengan format PDF</p>
							</div>
							<input type="hidden" name="jumlah-materi" id="jumlah-materi" value="1">
							<div id="next-materi"></div>
							<div class="input-group">
								<button type="button" class="btn btn-success btn-sm btn-disabled mb-2 mt-2" id="btn-tambah-video" data-toggle="tooltip" data-placement="top" title="+ Form Video"><i class="fa fa-plus"></i> Video Pembelajaran</button>
							</div>
							<label for="judul_video">Judul Video Pembelajaran ke-1</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_video[]" id="judul_video" class="form-control <?= (form_error('judul_video[]')) ? 'is-invalid' : '' ?>" placeholder="Masukan Judul Video">
								<div id="judul_videoFeedback" class="invalid-feedback">
									<?= form_error('judul_video[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="link_video">Video Pembelajaran ke-1</label>
							<div class="input-group mb-3">
								<input type="text" name="link_video[]" id="link_video" class="form-control <?= (form_error('link_video[]')) ? 'is-invalid' : '' ?>" placeholder="Masukan Link Video">
								<div id="link_videoFeedback" class="invalid-feedback">
									<?= form_error('link_video[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-4">
								<p>*Link bersumber dari youtube</p>
							</div>
							<input type="hidden" name="jumlah-video" id="jumlah-video" value="1">
							<div id="next-video"></div>
							<div class="btn-aksi">
								<button type="submit" name="submit" class="btn btn-sm btn-primary bg-blue border-0 rounded px-4 py-2 mr-3">Simpan</button>
								<button type="reset" class="btn btn-sm btn-secondary border-0 rounded px-4 py-2">Reset</button>
							</div>
						</div>
						<?= form_close() ?>
					</div>
				</div>
			</div>
			<!-- *************************************************************** -->
			<!-- End Top Leader Table -->
			<!-- *************************************************************** -->
		</div>

		<script>
			$(document).ready(function() {
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
