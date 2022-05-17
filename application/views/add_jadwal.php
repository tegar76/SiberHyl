<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

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
				<?= form_open_multipart('Admin/Dashboard/add_jadwal') ?>
				<div class="card mt-2">
					<div class="card-body">
						<h4>Data Ke 1</h4>
						<div class="form-group">
							<label for="kelas">Pilih Kelas</label>
							<select class="form-control custom-select <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="kelas" name="kelas[]">
								<option value="">Pilih Kelas</option>
								<?php foreach ($kelas as $k) : ?>
									<option value="<?= $k['kelas_id'] ?>"><?= $k['nama_kelas'] ?></option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>
						</div>
						<div class="form-group">
							<label for="hari">Hari</label>
							<select class="form-control" id="hari" name="hari[]">
								<option value="">Pilih Kelas</option>
								<?php foreach ($hari as $h) : ?>
									<option value="<?= $h ?>"><?= $h ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="mapel">Mata Pelajaran</label>
							<select class="form-control" id="mapel" name="mapel[]">
								<option value="">Pilih Mata Pelajaran</option>
								<?php foreach ($mapel as $mp) : ?>
									<option value="<?= $mp['mapel_id'] ?>"><?= $mp['nama_mapel'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="guru">Guru Pengajar</label>
							<select class="form-control" id="guru" name="guru[]">
								<option value="">Pilih Guru Pengajar</option>
								<?php foreach ($guru as $g) : ?>
									<option value="<?= $g['guru_nip'] ?>"><?= $g['guru_nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="jam_masuk">Jam Masuk</label>
								<input type="text" class="form-control" id="jam_masuk" name="jam_masuk[]">
							</div>
							<div class="form-group col-md-6">
								<label for="jam_selesai">Jam Selesai</label>
								<input type="text" class="form-control" id="jam_selesai" name="jam_selesai[]">
							</div>
						</div>
						<div class="form-group">
							<label for="ruangan">Ruangan</label>
							<select class="form-control" id="ruangan" name="ruangan[]">
								<option value="">Pilih Ruangan</option>
								<?php foreach ($ruangan as $r) : ?>
									<option value="<?= $r['ruang_id'] ?>"><?= $r['nama_ruang'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<a class="btn btn-sm btn-success" id="btn-tambah-materi">+materi</a>
						<input type="hidden" name="jumlah_form" id="jumlah-form-materi" value="1">
						<div class="card mt-2">
							<div class="card-body">
								<h5>Materi Ke 1</h5>
								<div class="form-group">
									<label for="judul_materi">Judul</label>
									<input type="text" class="form-control" id="judul_materi" name="judul_materi[]">
								</div>
								<label for="judul_materi">File</label>
								<div class="custom-file mb-3">
									<input type="file" class="custom-file-input" id="file_materi" name="file_materi[]">
									<label class="custom-file-label" for="file_materi">Choose file...</label>
								</div>
								<div id="insert-materi"></div>
							</div>
						</div>
						<a href="" class="btn btn-sm btn-success mt-4">+video</a>
						<div class="card mt-2">
							<div class="card-body">
								<h5>Video Ke</h5>
								<div class="form-group">
									<label for="judul_video">Judul Video</label>
									<input type="text" class="form-control" id="judul_video" name="judul_video[]">
								</div>
								<div class="form-group">
									<label for="link_video">Link Video</label>
									<input type="text" class="form-control" id="link_video" name="link_video[]">
								</div>
								<div id="insert-video"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="card mt-2">
					<div class="card-body">
						<h4>Data Ke 1</h4>
						<div class="form-group">
							<label for="kelas">Pilih Kelas</label>
							<select class="form-control custom-select <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="kelas" name="kelas[]">
								<option value="">Pilih Kelas</option>
								<?php foreach ($kelas as $k) : ?>
									<option value="<?= $k['kelas_id'] ?>"><?= $k['nama_kelas'] ?></option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>
						</div>
						<div class="form-group">
							<label for="hari">Hari</label>
							<select class="form-control" id="hari" name="hari[]">
								<option value="">Pilih Kelas</option>
								<?php foreach ($hari as $h) : ?>
									<option value="<?= $h ?>"><?= $h ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="mapel">Mata Pelajaran</label>
							<select class="form-control" id="mapel" name="mapel[]">
								<option value="">Pilih Mata Pelajaran</option>
								<?php foreach ($mapel as $mp) : ?>
									<option value="<?= $mp['mapel_id'] ?>"><?= $mp['nama_mapel'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="guru">Guru Pengajar</label>
							<select class="form-control" id="guru" name="guru[]">
								<option value="">Pilih Guru Pengajar</option>
								<?php foreach ($guru as $g) : ?>
									<option value="<?= $g['guru_nip'] ?>"><?= $g['guru_nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="jam_masuk">Jam Masuk</label>
								<input type="text" class="form-control" id="jam_masuk" name="jam_masuk[]">
							</div>
							<div class="form-group col-md-6">
								<label for="jam_selesai">Jam Selesai</label>
								<input type="text" class="form-control" id="jam_selesai" name="jam_selesai[]">
							</div>
						</div>
						<div class="form-group">
							<label for="ruangan">Ruangan</label>
							<select class="form-control" id="ruangan" name="ruangan[]">
								<option value="">Pilih Ruangan</option>
								<?php foreach ($ruangan as $r) : ?>
									<option value="<?= $r['ruang_id'] ?>"><?= $r['nama_ruang'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<a class="btn btn-sm btn-success" id="btn-tambah-materi">+materi</a>
						<input type="hidden" name="jumlah_form" id="jumlah-form-materi" value="1">
						<div class="card mt-2">
							<div class="card-body">
								<h5>Materi Ke 1</h5>
								<div class="form-group">
									<label for="judul_materi">Judul</label>
									<input type="text" class="form-control" id="judul_materi" name="judul_materi[]">
								</div>
								<label for="judul_materi">File</label>
								<div class="custom-file mb-3">
									<input type="file" class="custom-file-input" id="file_materi" name="file_materi[]">
									<label class="custom-file-label" for="file_materi">Choose file...</label>
								</div>
								<div id="insert-materi"></div>
							</div>
						</div>
						<a href="" class="btn btn-sm btn-success mt-4">+video</a>
						<div class="card mt-2">
							<div class="card-body">
								<h5>Video Ke</h5>
								<div class="form-group">
									<label for="judul_video">Judul Video</label>
									<input type="text" class="form-control" id="judul_video" name="judul_video[]">
								</div>
								<div class="form-group">
									<label for="link_video">Link Video</label>
									<input type="text" class="form-control" id="link_video" name="link_video[]">
								</div>
								<div id="insert-video"></div>
							</div>
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


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


	<script>
		$(document).ready(function() {
			$("#btn-tambah-form").click(function() {
				var jumlah = parseInt($("#jumlah-form").val());
				var nextform = jumlah + 1;
				var form = '<div class="card mt-2">' +
					'<div class="card-body">' +
					'<h4>Data Ke' + nextform + '</h4>' +
					'<div class="form-group">' +
					'<label for="kelas">Pilih Kelas</label>' +
					'<select class="form-control custom-select <?= (form_error('kelas[]')) ? 'is-invalid' : '' ?>" id="kelas" name="kelas[]">' +
					'<option value="">Pilih Kelas</option>' +
					'<?php foreach ($kelas as $k) : ?>' +
					'<option value="<?= $k['kelas_id'] ?>"><?= $k['nama_kelas'] ?></option>' +
					'<?php endforeach; ?>' +
					'</select>' +
					'<div class="invalid-feedback" id="kelasFeedback"><?= form_error('kelas[]') ?></div>' +
					'</div>' +
					'</div>'
				'</div>';

				$(form).insertBefore("#next-form");
				$('#jumlah-form').val(nextform);
			});

			$("#btn-tambah-materi").click(function() {
				var jumlah = parseInt($("#jumlah-form-materi").val());
				var nextForm = jumlah + 1;
				console.log(nextForm);
				var form = '<h5>Materi Ke ' + nextForm + '</h5>' +
					'<div class="form-group">' +
					'<label for="judul_materi">Judul</label>' +
					'<input type="text" class="form-control" id="judul_materi" name="judul_materi[]">' +
					'</div>' +
					'<label for="judul_materi">File</label>' +
					'<div class="custom-file mb-3">' +
					'<input type="file" class="custom-file-input" id="file_materi" name="file_materi[]">' +
					'<label class="custom-file-label" for="file_materi">Choose file...</label>' +
					'</div>';

				$("#insert-materi").append(form);
				$("#jumlah-form-materi").val(nexForm);
			});
		});
	</script>

</body>

</html>
