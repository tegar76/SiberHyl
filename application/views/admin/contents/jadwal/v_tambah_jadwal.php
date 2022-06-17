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
				<h3 class="page-title">Tambah Jadwal</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/jadwal') ?>" class="text-muted">Jadwal</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Jadwal</li>
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
					<?= form_open('master/jadwal/tambahJadwal') ?>
					<!-- looping card -->
					<div class="card shadow mb-4">
						<div class="container my-3">
							<div class="title-form mt-3 mb-3">
								<h6>Data Ke-1</h6>
							</div>
							<div class="form-group">
								<label for="kelas">Pilih Kelas</label>
								<select class="form-control select-class <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="select-class" name="kelas[]" title="Pilih Kelas">
								</select>
								<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>
							</div>
							<div class="form-group">
								<label for="hari">Hari</label>
								<select class="form-control select-day <?= (form_error('hari[]')) ? 'is-invalid' : '' ?>" id="select-day" name="hari[]" title="Pilih Hari">
									<option value="">Pilih Hari</option>
								</select>
								<div class="invalid-feedback" id="hariFeedback"><?= form_error('hari[]') ?></div>
							</div>
							<div class="form-group">
								<label for="mapel">Mata Pelajaran</label>
								<select class="form-control select-lesson <?= (form_error('mapel[]')) ? 'is-invalid' : '' ?>" id="select-lesson" name="mapel[]" title="Pilih Mata Pelajaran">
									<option value="">Pilih Mata Pelajaran</option>
								</select>
								<div class="invalid-feedback" id="mapelFeedback"><?= form_error('mapel[]') ?></div>
							</div>
							<div class="form-group">
								<label for="guru">Guru Pengajar</label>
								<select class="form-control select-teacher <?= (form_error('guru[]')) ? 'is-invalid' : '' ?>" id="select-teacher" name="guru[]" title="Pilih Kode Guru">
									<option value="">Kode Guru</option>
								</select>
								<div class="invalid-feedback" id="guruFeedback"><?= form_error('guru[]') ?></div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="jam_mulai">Jam Masuk</label>
									<input type="text" class="form-control jam_mulai <?= (form_error('jam_mulai[]')) ? 'is-invalid' : '' ?>" id="jam_mulai" name="jam_mulai[]">
									<div class="invalid-feedback" id="jam_mulaiFeedback"><?= form_error('jam_mulai[]') ?></div>
								</div>
								<div class="form-group col-md-6">
									<label for="jam_selesai">Jam Selesai</label>
									<input type="text" class="form-control jam_selesai <?= (form_error('jam_selesai[]')) ? 'is-invalid' : '' ?>" id="jam_selesai" name="jam_selesai[]">
									<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('jam_selesai[]') ?></div>
								</div>
							</div>
							<div class="form-group">
								<label for="ruangan">Ruangan</label>
								<select class="form-control select-room <?= (form_error('ruangan[]')) ? 'is-invalid' : '' ?>" id="select-room" name="ruangan[]" title="Pilih Ruangan">
									<option value="">Pilih Ruangan</option>
								</select>
								<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('ruangan[]') ?></div>
							</div>
							<div class="form-group">
								<label for="jumlah_jam">Jumlah Jam</label>
								<input type="text" class="form-control <?= (form_error('jumlah_jam[]')) ? 'is-invalid' : '' ?>" id="jumlah_jam" name="jumlah_jam[]">
								<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('jumlah_jam[]') ?></div>
							</div>
						</div>
					</div>
					<div id="next-form"></div>
					<input type="hidden" id="jumlah-form"" name=" jumlah_form" value="1">
					<div class="btn-aksi">
						<button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
						<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2" id="btn-reset-form">Reset Form</button>
					</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>

	<!-- button floating tambah -->
	<div class="floating-container">
		<a href="#">
			<div class="floating-button" id="btn-tambah-form">+</div>
		</a>
	</div>

	<script>
		function load_select(type = null) {
			if (type == 'class') {
				$('#select-class').select2({
					placeholder: 'Pilih Kelas',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=') ?>' + type,
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
			} else if (type == 'lesson') {
				$('#select-lesson').select2({
					placeholder: 'Pilih Mata Pelajaran',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=') ?>' + type,
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
			} else if (type == 'days') {
				$('#select-day').select2({
					placeholder: 'Pilih Hari',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=') ?>' + type,
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
			} else if (type == 'teacher') {
				$('#select-teacher').select2({
					placeholder: 'Pilih Kode Guru',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=') ?>' + type,
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
			} else if (type == 'room') {
				$('#select-room').select2({
					placeholder: 'Pilih Ruangan',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=') ?>' + type,
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
			}
		}

		function load_datetimepicker() {
			jQuery.datetimepicker.setLocale('id')
			$('.jam_mulai, .jam_selesai').datetimepicker({
				timepicker: true,
				datepicker: false,
				format: 'H:i',
				value: '00:00',
				hours12: false,
				step: 5,
				lang: 'id',
			});
		}

		$(document).ready(function() {
			load_select('class');
			load_select('days');
			load_select('lesson');
			load_select('teacher');
			load_select('room');
			load_datetimepicker();
			$("#btn-tambah-form").click(function() {
				var jumlah = parseInt($("#jumlah-form").val());
				var nextform = jumlah + 1;
				$("#next-form").append('<div class="card shadow mb-4">' +
					'<div class="container my-3">' +
					'<div class="title-form mt-3 mb-3">' +
					'<h6>Data Ke-' + nextform + '</h6>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="kelas">Pilih Kelas</label>' +
					'<select class="form-control select-class <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="select-class-' + nextform + '" name="kelas[]" title="Pilih Kelas"> ' +
					'</select>' +
					'<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>' +
					'</div>' +
					'<div class="form-group>"' +
					'<label for="hari">Hari</label>' +
					'<select class="form-control select-day <?= (form_error('hari[]')) ? 'is-invalid' : '' ?>" id="select-day-' + nextform + '" name="hari[]" title="Pilih Hari">' +
					'</select>' +
					'<div class="invalid-feedback" id="hariFeedback"><?= form_error('hari[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="mapel">Mata Pelajaran</label>' +
					'<select class="form-control select-lesson <?= (form_error('mapel[]')) ? 'is-invalid' : '' ?>" id="select-lesson-' + nextform + '" name="mapel[]" title="Pilih Mata Pelajaran">' +
					'</select>' +
					'<div class="invalid-feedback" id="mapelFeedback"><?= form_error('mapel[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="guru">Guru Pengajar</label>' +
					'<select class="form-control select-teacher <?= (form_error('guru[]')) ? 'is-invalid' : '' ?>" id="select-teacher-' + nextform + '" name="guru[]" title="Pilih Kode Guru">' +
					'</select>' +
					'<div class="invalid-feedback" id="guruFeedback"><?= form_error('guru[]') ?></div>' +
					'</div>' +
					'<div class="form-row">' +
					'<div class="form-group col-md-6">' +
					'<label for="jam_mulai">Jam Masuk</label>' +
					'<input type="text" class="form-control jam_mulai <?= (form_error('jam_mulai[]')) ? 'is-invalid' : '' ?>" id="jam_mulai-' + nextform + '" name="jam_mulai[]">' +
					'<div class="invalid-feedback" id="jam_mulaiFeedback"><?= form_error('jam_mulai[]') ?></div>' +
					'</div>' +
					'<div class="form-group col-md-6">' +
					'<label for="jam_selesai">Jam Selesai</label>' +
					'<input type="text" class="form-control jam_selesai <?= (form_error('jam_selesai[]')) ? 'is-invalid' : '' ?>" id="jam_selesai-' + nextform + '" name="jam_selesai[]">' +
					'<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('jam_selesai[]') ?></div>' +
					'</div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="ruangan">Ruangan</label>' +
					'<select class="form-control select-room <?= (form_error('ruangan[]')) ? 'is-invalid' : '' ?>" id="select-room-' + nextform + '" name="ruangan[]" title="Pilih Ruangan">' +
					'</select>' +
					'<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('ruangan[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="jumlah_jam">Jumlah Jam</label>' +
					'<input type="text" class="form-control <?= (form_error('jumlah_jam[]')) ? 'is-invalid' : '' ?>" id="jumlah_jam-' + nextform + '" name="jumlah_jam[]">' +
					'<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('jumlah_jam[]') ?></div>' +
					'</div>' +
					'</div>' +
					'</div>'
				);
				$('#jumlah-form').val(nextform);

				// select kelas
				$("#select-class-" + nextform).select2({
					placeholder: 'Pilih Kelas',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=class') ?>',
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
				// select hari
				$("#select-day-" + nextform).select2({
					placeholder: 'Pilih Hari',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=days') ?>',
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
				// select mata pelajaran
				$("#select-lesson-" + nextform).select2({
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
				// select guru pengajar
				$("#select-teacher-" + nextform).select2({
					placeholder: 'Pilih Kode Guru',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=teacher') ?>',
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
				// select ruangan
				$("#select-room-" + nextform).select2({
					placeholder: 'Pilih Ruangan',
					ajax: {
						dataType: 'json',
						url: '<?= base_url('master/jadwal/get_data?type=room') ?>',
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

				jQuery.datetimepicker.setLocale('id')
				$('#jam_mulai-' + nextform + ', #jam_selesai-' + nextform).datetimepicker({
					timepicker: true,
					datepicker: false,
					format: 'H:i',
					value: '00:00',
					hours12: false,
					step: 5,
					lang: 'id',
				});
			});

			$("#btn-reset-form").click(function() {
				$("#next-form").html(""); // Kita kosongkan isi dari div insert-form
				$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
			});
		});
	</script>
