<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	<link rel="stylesheet" href="<?= base_url('assets/plugin/datetimepicker/jquery.datetimepicker.min.css') ?>">
	<script src="<?= base_url('assets/plugin/datetimepicker/jquery.datetimepicker.full.js') ?>"></script>
	<title>Hello, world!</title>
</head>

<body>

	<div class="container">
		<div class="card mt-4">
			<div class="card-body">
				<h3>Form Tambah Jadwal</h3>
				<button class="btn btn-sm btn-success" id="btn-tambah-form">tambah form</button>
				<button class="btn btn-sm btn-danger" id="btn-reset-form">reset form</button>
				<?= validation_errors() ?>
				<?= form_open('Admin/Dashboard/add_jadwal') ?>
				<div class="card mt-2">
					<div class="card-body">
						<h4>Data Jadwal Ke-1</h4>
						<div class="form-group">
							<label for="kelas">Pilih Kelas</label>
							<select class="form-control custom-select select-class <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="select-class" name="kelas[]" data-live-search="true" title="Pilih Kelas">
							</select>
							<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>
						</div>
						<div class="form-group">
							<label for="hari">Hari</label>
							<select class="form-control custom-select select-day <?= (form_error('hari[]')) ? 'is-invalid' : '' ?>" id="select-day" name="hari[]" data-live-search="true" title="Pilih Hari">
							</select>
							<div class="invalid-feedback" id="hariFeedback"><?= form_error('hari[]') ?></div>
						</div>
						<div class="form-group">
							<label for="mapel">Mata Pelajaran</label>
							<select class="form-control custom-select select-lesson <?= (form_error('mapel[]')) ? 'is-invalid' : '' ?>" id="select-lesson" name="mapel[]" data-live-search="true" title="Pilih Mata Pelajaran">
							</select>
							<div class="invalid-feedback" id="mapelFeedback"><?= form_error('mapel[]') ?></div>
						</div>
						<div class="form-group">
							<label for="guru">Guru Pengajar</label>
							<select class="form-control custom-select select-teacher <?= (form_error('guru[]')) ? 'is-invalid' : '' ?>" id="select-teacher" name="guru[]" data-live-search="true" title="Pilih Kode Guru">
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
							<select class="form-control custom-select select-room <?= (form_error('ruangan[]')) ? 'is-invalid' : '' ?>" id="select-room" name="ruangan[]" data-live-search="true" title="Pilih Ruangan">
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
				<input type="hidden" name="jumlah_form" id="jumlah-form" value="1">
				<button type="submit" class="btn btn-success mt-4">simpan</button>
				<?= form_close() ?>
			</div>
		</div>
	</div>


	<script>
		$(document).ready(function() {


			load_select_data('class');
			load_select_data('days');
			load_select_data('lesson');
			load_select_data('teacher');
			load_select_data('room');
			load_datetimepicker();

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

			function load_select_data(type, nextForm = null) {
				if (type === 'class') {
					$.ajax({
						url: "<?= base_url('Admin/Dashboard/get_data?type=') ?>" + type,
						method: "GET",
						dataType: "json",
						success: function(data) {
							var html = "";
							for (var count = 0; count < data.length; count++) {
								html += '<option value="' + data[count].kelas_id + '">' + data[count].kelas + '</option>'
							}
							if (nextForm == null) {
								$('#select-class').html(html);
								$('#select-class').selectpicker('refresh');
							} else {
								const newClass = $("select#select-class").addClass("select-class" + nextForm);
								newClass.html(html);
								newClass.selectpicker('refresh');
							}
						}
					});
				} else if (type === 'days') {
					$.ajax({
						url: "<?= base_url('Admin/Dashboard/get_data?type=') ?>" + type,
						method: "GET",
						dataType: "json",
						success: function(data) {
							var html = "";
							for (var count = 0; count < data.length; count++) {
								html += '<option value="' + data[count].day + '">' + data[count].day + '</option>'
							}
							if (nextForm == null) {
								$('#select-day').html(html);
								$('#select-day').selectpicker('refresh');
							} else {
								const newClass = $("select#select-day").addClass("select-day" + nextForm);
								newClass.html(html);
								newClass.selectpicker('refresh');
							}
						}
					});
				} else if (type === 'lesson') {
					$.ajax({
						url: "<?= base_url('Admin/Dashboard/get_data?type=') ?>" + type,
						method: "GET",
						dataType: "json",
						success: function(data) {
							var html = "";
							for (var count = 0; count < data.length; count++) {
								html += '<option value="' + data[count].mapel_id + '">' + data[count].mapel + '</option>'
							}
							if (nextForm == null) {
								$('#select-lesson').html(html);
								$('#select-lesson').selectpicker('refresh');
							} else {
								const newClass = $("select#select-lesson").addClass("select-lesson" + nextForm);
								newClass.html(html);
								newClass.selectpicker('refresh');
							}
						}
					});
				} else if (type === 'teacher') {
					$.ajax({
						url: "<?= base_url('Admin/Dashboard/get_data?type=') ?>" + type,
						method: "GET",
						dataType: "json",
						success: function(data) {
							var html = "";
							for (var count = 0; count < data.length; count++) {
								html += '<option value="' + data[count].kode_guru + '">' + data[count].kode_guru + '</option>'
							}
							if (nextForm == null) {
								$('#select-teacher').html(html);
								$('#select-teacher').selectpicker('refresh');
							} else {
								const newClass = $("select#select-teacher").addClass("select-teacher" + nextForm);
								newClass.html(html);
								newClass.selectpicker('refresh');
							}
						}
					});
				} else if (type === 'room') {
					$.ajax({
						url: "<?= base_url('Admin/Dashboard/get_data?type=') ?>" + type,
						method: "GET",
						dataType: "json",
						success: function(data) {
							var html = "";
							for (var count = 0; count < data.length; count++) {
								html += '<option value="' + data[count].ruang_id + '">' + data[count].ruangan + '</option>'
							}
							if (nextForm == null) {
								$('#select-room').html(html);
								$('#select-room').selectpicker('refresh');
							} else {
								const newClass = $("select#select-room").addClass("select-room" + nextForm);
								newClass.html(html);
								newClass.selectpicker('refresh');
							}
						}
					});
				}
			}

			$("#btn-tambah-form").click(function() {
				var jumlah = parseInt($("#jumlah-form").val());
				var nextform = jumlah + 1;
				var form = '';

				$("#next-form").append('<div class="card mt-2">' +
					'<div class="card-body">' +
					'<h4>Data Jadwal Ke-' + nextform + '</h4>' +
					'<div class="form-group">' +
					'<label for="kelas">Pilih Kelas</label>' +
					'<select class="form-control custom-select select-class <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="select-class" name="kelas[]" data-live-search="true" title="Pilih Kelas"> ' +
					'</select>' +
					'<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>' +
					'</div>' +
					'<div class="form-group>"' +
					'<label for="hari">Hari</label>' +
					'<select class="form-control custom-select select-day <?= (form_error('hari[]')) ? 'is-invalid' : '' ?>" id="select-day" name="hari[]" data-live-search="true" title="Pilih Hari">' +
					'</select>' +
					'<div class="invalid-feedback" id="hariFeedback"><?= form_error('hari[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="mapel">Mata Pelajaran</label>' +
					'<select class="form-control custom-select select-lesson <?= (form_error('mapel[]')) ? 'is-invalid' : '' ?>" id="select-lesson" name="mapel[]" data-live-search="true" title="Pilih Mata Pelajaran">' +
					'</select>' +
					'<div class="invalid-feedback" id="mapelFeedback"><?= form_error('mapel[]') ?></div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="guru">Guru Pengajar</label>' +
					'<select class="form-control custom-select select-teacher <?= (form_error('guru[]')) ? 'is-invalid' : '' ?>" id="select-teacher" name="guru[]" data-live-search="true" title="Pilih Kode Guru">' +
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
					'<select class="form-control custom-select select-room <?= (form_error('ruangan[]')) ? 'is-invalid' : '' ?>" id="select-room" name="ruangan[]" data-live-search="true" title="Pilih Ruangan">' +
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
				load_datetimepicker();
			});

			$("#btn-reset-form").click(function() {
				$("#next-form").html(""); // Kita kosongkan isi dari div insert-form
				$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
			});

		});
	</script>

</body>

</html>
