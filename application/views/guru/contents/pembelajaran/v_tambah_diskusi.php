<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title . ' Kelas ' . $jadwal->nama_kelas ?></h3>
				<h5 class="page-title opacity-7"><?= $jadwal->nama_mapel ?></h5>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Pembelajaran</li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran') ?>" class="text-muted">Mengajar</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/diskusi/' . $jadwal->jadwal_id) ?>" class="text-muted">Diskusi</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?> </li>
						</ol>
					</nav>
				</div>
			</div>
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
					<?= form_open('guru/pembelajaran/tambah_forum_diskusi/' . $jadwal->jadwal_id) ?>
					<input type="hidden" name="jadwal_id" value="<?= $jadwal->jadwal_id ?>">
					<input type="hidden" name="nama_guru" value="<?= $guru->guru_nama ?>">
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
							<label for="judul_diskusi">Judul</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_diskusi" id="judul_diskusi" class="form-control <?= (form_error('judul_diskusi')) ? 'is-invalid' : '' ?>" value="<?= set_value('judul_diskusi') ?>" placeholder="Masukan Judul Diskusi">
								<div id="judul_diskusiFeedback" class="invalid-feedback">
									<?= form_error('judul_diskusi', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="deskripsi">Deskripsi</label>
							<div class="input-group mb-3">
								<textarea name="deskripsi" class="form-control <?= (form_error('deskripsi')) ? 'is-invalid' : '' ?>" placeholder="Masukan Deskripsi Pembahasan"><?= set_value('deskripsi') ?></textarea>
								<div id="deskripsiFeedback" class="invalid-feedback">
									<?= form_error('deskripsi', '<div class="text-danger">', '</div>') ?>
								</div>
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
