<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/styless.css') ?>">

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
								<select class="form-control select2 select-day <?= (form_error('hari[]')) ? 'is-invalid' : '' ?>" id="select-day" name="hari[]" title="Pilih Hari">
									<option value="">Pilih Hari</option>
								</select>
								<div class="invalid-feedback" id="hariFeedback"><?= form_error('hari[]') ?></div>
							</div>
							<div class="form-group">
								<label for="mapel">Mata Pelajaran</label>
								<select class="form-control custom-select select-lesson <?= (form_error('mapel[]')) ? 'is-invalid' : '' ?>" id="select-lesson" name="mapel[]" title="Pilih Mata Pelajaran">
									<option value="">Pilih Mata Pelajaran</option>
								</select>
								<div class="invalid-feedback" id="mapelFeedback"><?= form_error('mapel[]') ?></div>
							</div>
							<div class="form-group">
								<label for="guru">Guru Pengajar</label>
								<select class="form-control custom-select select-teacher <?= (form_error('guru[]')) ? 'is-invalid' : '' ?>" id="select-teacher" name="guru[]" title="Pilih Kode Guru">
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
								<select class="form-control custom-select select-room <?= (form_error('ruangan[]')) ? 'is-invalid' : '' ?>" id="select-room" name="ruangan[]" title="Pilih Ruangan">
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
		$(function() {
			$('.select-class').select2({
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

			$('.select-lesson').select2({
				placeholder: 'Pilih Kelas',
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

		});

		function load_select_data(type, nextForm = null) {
			if (type === 'days') {
				$.ajax({
					url: "<?= base_url('master/jadwal/get_data?type=') ?>" + type,
					method: "GET",
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Pilih Hari</option>';
						for (var count = 0; count < data.length; count++) {
							html += '<option value="' + data[count].day + '">' + data[count].day + '</option>'
						}
						if (nextForm == null) {
							$('#select-day').html(html);
							$('#select-day').select2();
						} else {
							const newClass = $("select#select-day").addClass("select-day" + nextForm);
							newClass.html(html);
							newClass.select2();
						}
					}
				});
			} else if (type === 'teacher') {
				$.ajax({
					url: "<?= base_url('master/jadwal/get_data?type=') ?>" + type,
					method: "GET",
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Pilih Kode Guru</option>';
						for (var count = 0; count < data.length; count++) {
							html += '<option value="' + data[count].kode_guru + '">' + data[count].kode_guru + '</option>'
						}
						if (nextForm == null) {
							$('#select-teacher').html(html);
							$('#select-teacher').select2();
						} else {
							const newClass = $("select#select-teacher").addClass("select-teacher" + nextForm);
							newClass.html(html);
							newClass.select2();
						}
					}
				});
			} else if (type === 'room') {
				$.ajax({
					url: "<?= base_url('master/jadwal/get_data?type=') ?>" + type,
					method: "GET",
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Pilih Ruangan</option>';
						for (var count = 0; count < data.length; count++) {
							html += '<option value="' + data[count].ruang_id + '">' + data[count].ruangan + '</option>'
						}
						if (nextForm == null) {
							$('#select-room').html(html);
							$('#select-room').select2();
						} else {
							const newClass = $("select#select-room").addClass("select-room" + nextForm);
							newClass.html(html);
							newClass.select2();
						}
					}
				});
			}
		}

		$(document).ready(function() {
			load_select_data('class');
			load_select_data('days');
			load_select_data('lesson');
			load_select_data('teacher');
			load_select_data('room');

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
					'<select class="form-control custom-select select-class <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="select-class" name="kelas[]" title="Pilih Kelas"> ' +
					'</select>' +
					'<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>' +
					'</div>' +
					'<div class="form-group>"' +
					'<label for="hari">Hari</label>' +
					'<select class="form-control custom-select select-day <?= (form_error('hari[]')) ? 'is-invalid' : '' ?>" id="select-day" name="hari[]" title="Pilih Hari">' +
					'</select>' +
					'<div class="invalid-feedback" id="hariFeedback"><?= form_error('hari[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="mapel">Mata Pelajaran</label>' +
					'<select class="form-control custom-select select-lesson <?= (form_error('mapel[]')) ? 'is-invalid' : '' ?>" id="select-lesson" name="mapel[]" title="Pilih Mata Pelajaran">' +
					'</select>' +
					'<div class="invalid-feedback" id="mapelFeedback"><?= form_error('mapel[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="guru">Guru Pengajar</label>' +
					'<select class="form-control custom-select select-teacher <?= (form_error('guru[]')) ? 'is-invalid' : '' ?>" id="select-teacher" name="guru[]" title="Pilih Kode Guru">' +
					'</select>' +
					'<div class="invalid-feedback" id="guruFeedback"><?= form_error('guru[]') ?></div>' +
					'</div>' +
					'<div class="form-row">' +
					'<div class="form-group col-md-6">' +
					'<label for="jam_mulai">Jam Masuk</label>' +
					'<input type="text" class="form-control jam_mulai <?= (form_error('jam_mulai[]')) ? 'is-invalid' : '' ?>" id="jam_mulai" name="jam_mulai[]">' +
					'<div class="invalid-feedback" id="jam_mulaiFeedback"><?= form_error('jam_mulai[]') ?></div>' +
					'</div>' +
					'<div class="form-group col-md-6">' +
					'<label for="jam_selesai">Jam Selesai</label>' +
					'<input type="text" class="form-control jam_selesai <?= (form_error('jam_selesai[]')) ? 'is-invalid' : '' ?>" id="jam_selesai" name="jam_selesai[]">' +
					'<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('jam_selesai[]') ?></div>' +
					'</div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="ruangan">Ruangan</label>' +
					'<select class="form-control custom-select select-room <?= (form_error('ruangan[]')) ? 'is-invalid' : '' ?>" id="select-room" name="ruangan[]" title="Pilih Ruangan">' +
					'</select>' +
					'<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('ruangan[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="jumlah_jam">Jumlah Jam</label>' +
					'<input type="text" class="form-control <?= (form_error('jumlah_jam[]')) ? 'is-invalid' : '' ?>" id="jumlah_jam" name="jumlah_jam[]">' +
					'<div class="invalid-feedback" id="jam_selesaiFeedback"><?= form_error('jumlah_jam[]') ?></div>' +
					'</div>' +
					'</div>' +
					'</div>'
				);
				$('#jumlah-form').val(nextform);
				load_select_data('class', nextform);
				load_select_data('days', nextform);
				load_select_data('lesson', nextform);
				load_select_data('teacher', nextform);
				load_select_data('room', nextform);
			});

			$("#btn-reset-form").click(function() {
				$("#next-form").html(""); // Kita kosongkan isi dari div insert-form
				$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
			});
		});
	</script>
