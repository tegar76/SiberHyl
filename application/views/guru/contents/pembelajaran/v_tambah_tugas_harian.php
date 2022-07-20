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
					<li class="breadcrumb-item text-muted active">Pembelajaran</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran') ?>" class="text-muted">Mengajar</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/tugas_harian/' . $jadwal->jadwal_id) ?>" class="text-muted">Tugas Harian</a></li>
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
					<?= form_open_multipart('guru/pembelajaran/tambah_tugas_harian/' . $jadwal->jadwal_id) ?>
					<input type="hidden" name="jadwal_id" value="<?= $jadwal->jadwal_id ?>">
					<div class="card shadow mb-4">
						<div class="container my-3">
							<label for="kode_guru">Kode Guru</label>
							<div class="input-group mb-3">
								<input type="text" name="kode_guru" id="kode_guru" class="form-control" value="<?= $jadwal->guru_kode ?>" readonly>
							</div>
							<label for="kelas">Kelas</label>
							<div class="input-group mb-3">
								<input type="text" name="kelas" id="kelas" class="form-control" value="<?= $jadwal->nama_kelas ?>" readonly>
							</div>
							<label for="hari">Hari</label>
							<div class="input-group mb-3">
								<input type="text" name="hari" id="hari" class="form-control" value="<?= $jadwal->hari ?>" readonly>
							</div>
							<label for="mapel">Mapel</label>
							<div class="input-group mb-3">
								<input type="text" name="mapel" id="mapel" class="form-control" value="<?= $jadwal->nama_mapel ?>" readonly>
							</div>
							<div class="row">
								<div class="col">
									<label for="judul_tugas">Judul</label>
									<div class="input-group mb-3">
										<input type="text" name="judul_tugas" id="judul_tugas" class="form-control <?= (form_error('judul_tugas')) ? 'is-invalid' : '' ?>" placeholder="Masukan Judul Tugas" value="<?= set_value('judul_tugas') ?>">
									</div>
									<div id="judul_tugasFeedback" class="invalid-feedback">
										<?= form_error('', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col">
									<label for="pertemuan">Pertemuan Ke-</label>
									<div class="input-group mb-3">
										<select name="pertemuan" id="pertemuan" class="form-control <?= (form_error('pertemuan')) ? 'is-invalid' : '' ?>">
											<option value="">Pilih Pertemuan Ke-</option>
											<?php for ($i = 1; $i <= 10; $i++) : ?>
												<option value="<?= $i ?>" <?= (set_value('pertemuan') == $i) ? 'selected' : '' ?>>Pertemuan <?= $i ?></option>
											<?php endfor ?>
										</select>
										<div id="pertemuanFeedback" class="invalid-feedback">
											<?= form_error('pertemuan', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="deskripsi">Deskripsi Tugas</label>
							<div class="input-group mb-3">
								<textarea name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi Tugas" class="form-control <?= (form_error('deskripsi')) ? 'is-invalid' : '' ?>"><?= set_value('deskripsi') ?></textarea>
								<div id="deskripsiFeedback" class="invalid-feedback">
									<?= form_error('deskripsi', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="file_tugas">Unggah File Tugas</label>
							<div class="input-group mb-3">
								<input type="file" name="file_tugas" id="file_tugas" class="form-control <?= (form_error('file_tugas')) ? 'is-invalid' : '' ?>">
								<div id="file_tugasFeedback" class="invalid-feedback">
									<?= form_error('file_tugas', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-4">
								<p>*File max 2mb dengan format PDF</p>
							</div>
							<label for="">Settings Deadline Tugas</label>
							<div class="row">
								<div class="col">
									<label for="tanggal-deadline">Tanggal</label>
									<div class="input-group mb-3">
										<input type="date" name="tanggal" id="tanggal-deadline" class="form-control <?= (form_error('tanggal')) ? 'is-invalid' : '' ?>" value="<?= set_value('tanggal') ?>">
										<div id="tanggalFeedback" class="invalid-feedback">
											<?= form_error('tanggal', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="jam-deadline">Jam</label>
									<div class="input-group mb-3">
										<input type="text" name="jam" id="jam-deadline" class="form-control <?= (form_error('jam')) ? 'is-invalid' : '' ?>">
										<div id="jamFeedback" class="invalid-feedback">
											<?= form_error('jam', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-aksi mt-3 mb-2">
								<button type="submit" class="btn btn-sm btn-primary bg-blue border-0 rounded px-4 py-2 mr-3">Simpan</button>
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
				jQuery.datetimepicker.setLocale('id')
				$('#jam-deadline').datetimepicker({
					timepicker: true,
					datepicker: false,
					format: 'H:i',
					value: '<?= (set_value('jam')) ? set_value('jam') : '00:00' ?>',
					hours12: false,
					step: 5,
					lang: 'id',
				});
			});
		</script>
