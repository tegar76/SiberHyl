<!-- Import multiple select -->
<?php include APPPATH.'../assets/MSelectDialogBox-master/import_multiple_select.php';?>

<!-- import select search -->
<?php include APPPATH.'../assets/select-with-search/import_select_with_search.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

	<div class="page-wrapper">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="page-breadcrumb">
			<div class="row">
				<div class="col-7 align-self-center">
					<h3 class="page-title">Tambah Materi</h3>
				</div>
			</div>
			<div class="d-flex align-items-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb m-0 p-0">
						<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/materi') ?>" class="text-muted">Materi</a></li>
						<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Materi</li>
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
						<?= form_open_multipart('master/materi/tambahMateri') ?>
						<!-- looping card -->
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="index_kelas">Kelas</label>
								<div class="input-group mb-3">
									<select class="custom-select <?= (form_error('index_kelas')) ? 'is-invalid' : '' ?>" id="index_kelas" name="index_kelas">
										<option selected>Pilih Index Kelas</option>
										<option value="X">Kelas X </option>
										<option value="XI">Kelas XI</option>
										<option value="XII">Kelas XII</option>
									</select>
									<div id="index_kelasFeedback" class="invalid-feedback">
										<?= form_error('index_kelas', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="jurusan">Jurusan Kelas</label>
								<div class="input-group mb-3">
									<select class="custom-select <?= (form_error('jurusan')) ? 'is-invalid' : '' ?>" id="jurusan" name="jurusan">
									</select>
									<div id="jurusanFeedback" class="invalid-feedback">
										<?= form_error('jurusan', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="mapel">Mata Pelajaran</label>
								<div class="input-group mb-3">
									<select class="custom-select <?= (form_error('mapel')) ? 'is-invalid' : '' ?>" name="mapel" id="mapel">
									</select>
									<div id="mapelFeedback" class="invalid-feedback">
										<?= form_error('mapel', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="input-group">
									<button type="button" class="btn btn-success btn-sm btn-disabled mb-2 mt-2" id="btn-tambah-materi"><i class="fa fa-plus"></i> Materi</button>
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
									<button type="button" class="btn btn-success btn-sm btn-disabled mb-2 mt-2" id="btn-tambah-video"><i class="fa fa-plus"></i> Video Pembelajaran</button>
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
								<input type="hidden" name="jumlah-video" id="jumlah-video" value="1">
								<div id="next-video"></div>
								<div class="btn-aksi">
									<button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
									<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset Form</button>
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

			<script type="text/javascript">
				$(document).ready(function() {
					$('#mapel').select2({
						placeholder: 'Pilih Mata Pelajaran',
						ajax: {
							dataType: 'json',
							url: '<?= base_url('master/jadwal/get_data?type=lesson') ?>',
							delay: 800,
							data: function(params) {
								return {
									search: params.term,
								}
							},
							processResults: function(response) {
								return {
									results: response
								};
							},
							cache: true
						},
					});

					$('#jurusan').select2({
						placeholder: 'Pilih Jurusan',
						ajax: {
							dataType: 'json',
							url: '<?= base_url('master/jadwal/get_data?type=jurusan') ?>',
							delay: 800,
							data: function(params) {
								return {
									search: params.term,
								}
							},
							processResults: function(response) {
								return {
									results: response
								};
							},
							cache: true
						},
					});

					$("#btn-tambah-materi").click(function() {
						var jumlah = parseInt($("#jumlah-materi").val());
						var nextMateri = jumlah + 1;
						$("#next-materi").append('<label for="judul_materi">Judul Materi ke- ' + nextMateri + '</label>' +
							'<div class="input-group mb-3">' +
							'<input type="text" name="judul_materi[]" id="judul_materi" class="form-control" placeholder="Masukan Judul">' +
							'</div>' +
							'<label for="file_materi">Unggah Materi Pembelajaran ke- ' + nextMateri + '</label>' +
							'<div class="input-group mb-3">' +
							'<input type="file" name="file_materi[]" id="file_materi" class="form-control">' +
							'</div>' +
							'<div class="input-group mb-3">' +
							'<p>*File max 2mb dengan format PDF</p>' +
							'</div>');
						$('#jumlah-materi').val(nextMateri);
					});

					$("#btn-tambah-video").click(function() {
						var jumlah = parseInt($("#jumlah-video").val());
						var nextVideo = jumlah + 1;
						$("#next-video").append(
							'<label for = "judul_video" > Judul Video Pembelajaran ke - ' + nextVideo + ' </label>' +
							'<div class="input-group mb-3">' +
							'<input type="text" name="judul_video[]" id="judul_video" class="form-control" placeholder="Masukan Judul Video">' +
							'</div>' +
							'<label for="link_video">Video Pembelajaran ke- ' + nextVideo + '</label>' +
							'<div class="input-group mb-3">' +
							'<input type="text" name="link_video[]" id="link_video" class="form-control" placeholder="Masukan Link Video">' +
							'</div>'
						);
						$('#jumlah-video').val(nextVideo);
					});

				});
			</script>
