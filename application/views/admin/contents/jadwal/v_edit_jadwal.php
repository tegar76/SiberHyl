<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Jadwal</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/jadwal') ?>" class="text-muted">Jadwal</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Jadwal</li>
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
					<?= form_open('master/jadwal/editJadwal/' . $jadwalDetail->kode_jadwal) ?>
					<!-- looping card -->
					<div class="card shadow mb-4">
						<div class="container my-3">
							<label for="kelas_edit">Kelas</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= (form_error('kelas_edit')) ? 'is-invalid' : 'is-valid' ?>" id="kelas_edit" name="kelas_edit">
									<option value="">Pilih Kelas</option>
									<?php foreach ($classes as $class) : ?>
										<option value="<?= $class->kelas_id ?>" <?= ($jadwalDetail->kelas_id == $class->kelas_id) ? 'selected' : '' ?>><?= $class->nama_kelas ?></option>
									<?php endforeach ?>
								</select>
								<div id="kelas_editFeedback" class="invalid-feedback">
									<?= form_error('kelas_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="hari_edit">Hari</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= (form_error('hari_edit')) ? 'is-invalid' : 'is-valid' ?>" id="hari_edit" name="hari_edit">
									<option value="">Pilih Hari</option>
									<?php foreach ($days as $day) : ?>
										<option value="<?= $day ?>" <?= ($jadwalDetail->hari == $day) ? 'selected' : '' ?>><?= $day ?></option>
									<?php endforeach ?>
								</select>
								<div id="hari_editFeedback" class="invalid-feedback">
									<?= form_error('hari_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="mapel_edit">Mata Pelajaran</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= (form_error('mapel_edit')) ? 'is-invalid' : 'is-valid' ?>" id="mapel_edit" name="mapel_edit">
									<option value="">Pilih Mata Pelajaran</option>
									<?php foreach ($lessons as $lesson) : ?>
										<option value="<?= $lesson->mapel_id ?>" <?= ($jadwalDetail->nama_mapel == $lesson->nama_mapel) ? 'selected' : '' ?>><?= $lesson->nama_mapel ?></option>
									<?php endforeach ?>
								</select>
								<div id="mapel_editFeedback" class="invalid-feedback">
									<?= form_error('mapel_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="guru_edit">Kode Guru</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= (form_error('guru_edit')) ? 'is-invalid' : 'is-valid' ?>" id="guru_edit" name="guru_edit">
									<option value="">Pilih Kode Guru</option>
									<?php foreach ($teachers as $teacher) : ?>
										<option value="<?= $teacher->guru_kode ?>" <?= ($jadwalDetail->guru_kode == $teacher->guru_kode) ? 'selected' : '' ?>><?= $teacher->guru_kode ?></option>
									<?php endforeach ?>
								</select>
								<div id="guru_editFeedback" class="invalid-feedback">
									<?= form_error('guru_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="jam_masuk_edit">Jam Mulai</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control <?= (form_error('jam_masuk_edit')) ? 'is-invalid' : 'is-valid' ?>" name="jam_masuk_edit" id="jam_masuk_edit" value="<?= date('H:i', strtotime($jadwalDetail->jam_masuk)) ?>">
										<div id="jam_masuk_editFeedback" class="invalid-feedback">
											<?= form_error('jam_masuk_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="jam_keluar_edit">Jam Selesai</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control <?= (form_error('jam_keluar_edit')) ? 'is-invalid' : 'is-valid' ?>" name="jam_keluar_edit" id="jam_keluar_edit" value="<?= date('H:i', strtotime($jadwalDetail->jam_keluar)) ?>">
										<div id="jam_keluar_editFeedback" class="invalid-feedback">
											<?= form_error('jam_keluar_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="ruangan_edit">Ruang Kelas</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= (form_error('ruangan_edit')) ? 'is-invalid' : 'is-valid' ?>" id="ruangan_edit" name="ruangan_edit">
									<option value="">Pilih Ruangan Kelas</option>
									<?php foreach ($rooms as $room) : ?>
										<option value="<?= $room->ruang_id ?>" <?= ($jadwalDetail->nama_ruang == $room->nama_ruang) ? 'selected' : '' ?>><?= $room->nama_ruang ?></option>
									<?php endforeach ?>
								</select>
								<div id="ruangan_editFeedback" class="invalid-feedback">
									<?= form_error('ruangan_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="jam_mengajar_edit">Jam Mengajar</label>
							<div class="input-group mb-3">
								<input type="text" name="jam_mengajar_edit" id="jam_mengajar_edit" placeholder="Masukan Jumlah Jam Mengajar" class="form-control  <?= (form_error('jam_mengajar_edit')) ? 'is-invalid' : 'is-valid' ?>" value="<?= $jadwalDetail->jumlah_jam ?>">
								<div id="jam_mengajar_editFeedback" class="invalid-feedback">
									<?= form_error('jam_mengajar_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden" name="kode_jadwal" value="<?= $jadwalDetail->kode_jadwal ?>">
					<div class="btn-aksi">
						<button type="submit" class="btn btn-sm btn-success rounded px-4 py-2 mr-3">Update</button>
						<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset Form</button>
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
		jQuery.datetimepicker.setLocale("id");
		$("#jam_masuk_edit, #jam_keluar_edit").datetimepicker({
			timepicker: true,
			datepicker: false,
			format: "H:i",
			hours12: false,
			step: 5,
			lang: "id",
		});
	</script>
