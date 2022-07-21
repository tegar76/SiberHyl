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
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/evaluasi/' . $jadwal->jadwal_id) ?>" class="text-muted">Evaluasi</a></li>
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
					<?= form_open_multipart('guru/pembelajaran/tambah_evaluasi/' . $jadwal->jadwal_id) ?>
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
									<label for="judul">Judul</label>
									<div class="input-group mb-3">
										<input type="text" name="judul" id="judul" class="form-control <?= (form_error('judul')) ? 'is-invalid' : '' ?>" placeholder="Masukan Judul Evaluaasi" value="<?= set_value('judul') ?>">
									</div>
									<div id="judulFeedback" class="invalid-feedback">
										<?= form_error('', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col">
									<label for="jenis">Jenis Soal</label>
									<div class="input-group mb-3">
										<select name="jenis" id="jenis" class="form-control <?= (form_error('jenis')) ? 'is-invalid' : '' ?>">
											<option value="">Pilih Jenis Soal</option>
											<option value="pilgan" <?= (set_value('jenis') == 'pilgan') ? 'selected' : '' ?>>Pilgan</option>
											<option value="essay" <?= (set_value('jenis') == 'essay') ? 'selected' : '' ?>>Essay</option>
										</select>
										<div id="judulFeedback" class="invalid-feedback">
											<?= form_error('', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
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
									<label for="evaluasi_ke">Evaluasi Ke-</label>
									<div class="input-group mb-3">
										<select name="evaluasi_ke" id="evaluasi_ke" class="form-control <?= (form_error('evaluasi_ke')) ? 'is-invalid' : '' ?>">
											<option value="">Pilih Evaluasi Ke-</option>
											<?php for ($i = 1; $i <= 10; $i++) : ?>
												<option value="<?= $i ?>" <?= (set_value('evaluasi_ke') == $i) ? 'selected' : '' ?>>Evaluasi <?= $i ?></option>
											<?php endfor ?>
										</select>
										<div id="evaluasi_keFeedback" class="invalid-feedback">
											<?= form_error('evaluasi_ke', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="file_evaluasi">Unggah File Evaluasi</label>
							<div class="input-group mb-3">
								<input type="file" name="file_evaluasi" id="file_evaluasi" class="form-control <?= (form_error('file_evaluasi')) ? 'is-invalid' : '' ?>">
								<div id="file_evaluasiFeedback" class="invalid-feedback">
									<?= form_error('file_evaluasi', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-4">
								<p>*File max 2mb dengan format PDF</p>
							</div>
							<div class="btn-aksi mt-4 mb-2">
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
