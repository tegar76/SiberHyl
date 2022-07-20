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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/absensi/' . $jurnal->jadwal_id) ?>" class="text-muted">Absensi</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/detail_absensi/' . $jurnal->jurnal_id) ?>" class="text-muted">Detail Absensi</a></li>
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
						<?= form_open('guru/pembelajaran/tambah_jurnal_materi/' . $jurnal->jurnal_id) ?>
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="kode_guru">Kode Guru</label>
								<div class="input-group mb-3">
									<input type="text" name="kode_guru" id="kode_guru" class="form-control" value="<?= $jurnal->guru_kode ?>" readonly>
								</div>
								<label for="nama_kelas">Kelas</label>
								<div class="input-group mb-3">
									<input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="<?= $jurnal->nama_kelas ?>" readonly>
								</div>
								<label for="hari">Hari</label>
								<div class="input-group mb-3">
									<input type="text" name="hari" id="hari" class="form-control" value="<?= $jurnal->hari ?>" readonly>
								</div>
								<label for="nama_mapel">Mapel</label>
								<div class="input-group mb-3">
									<input type="text" name="nama_mapel" id="nama_mapel" class="form-control" value="<?= $jurnal->nama_mapel ?>" readonly>
								</div>
								<label for="nama_ruang">Ruang Kelas</label>
								<div class="input-group mb-3">
									<input type="text" name="nama_ruang" id="nama_ruang" class="form-control" value="<?= $jurnal->nama_ruang ?>" readonly>
								</div>
								<div class="row">
									<div class="col">
										<label for="tanggal">Tanggal</label>
										<div class="input-group mb-3">
											<input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= date('d-m-Y', strtotime($jurnal->tanggal)) ?>" readonly>
										</div>
									</div>
									<div class="col">
										<label for="pertemuan_ke">Pertemuan Ke-</label>
										<div class="input-group mb-3">
											<input type="number" name="pertemuan_ke" id="pertemuan_ke" class="form-control" value="<?= $jurnal->pert_ke ?>" readonly>
										</div>
									</div>
								</div>
								<label for="jumlah_siswa">Jumlah Siswa</label>
								<div class="input-group mb-3">
									<input type="number" name="jumlah_siswa" id="jumlah_siswa" class="form-control" value="<?= $students ?>" readonly>
								</div>
								<div class="row">
									<div class="col">
										<label for="jumlah_hadir">Hadir</label>
										<div class="input-group mb-3">
											<input type="number" name="jumlah_hadir" id="jumlah_hadir" class="form-control" value="<?= $H ?>" readonly>
										</div>
									</div>
									<div class="col">
										<label for="jumlah_alpha">Alpa</label>
										<div class="input-group mb-3">
											<input type="number" name="jumlah_alpha" id="jumlah_alpha" class="form-control" value="<?= $A ?>" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<label for="jumlah_izin">Izin</label>
										<div class="input-group mb-3">
											<input type="number" name="jumlah_izin" id="jumlah_izin" class="form-control" value="<?= $I ?>" readonly>
										</div>
									</div>
									<div class="col">
										<label for="jumlah_sakit">Sakit</label>
										<div class="input-group mb-3">
											<input type="text" name="jumlah_sakit" id="jumlah_sakit" class="form-control" value="<?= $S ?>" readonly>
										</div>
									</div>
								</div>
								<label for="kd_materi">KD Materi</label>
								<div class="input-group mb-3">
									<input type="text" name="kd_materi" id="kd_materi" class="form-control <?= (form_error('kd_materi')) ? 'is-invalid' : '' ?>" placeholder="Input KD Materi" value="<?= set_value('kd_materi') ?>">
									<div id="kd_materiFeedback" class="invalid-feedback">
										<?= form_error('kd_materi', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="pembahasan">Pembahasan</label>
								<div class="input-group mb-3">
									<textarea name="pembahasan" id="pembahasan" class="form-control <?= (form_error('pembahasan')) ? 'is-invalid' : '' ?>" placeholder="Input Pembahasan Materi"><?= set_value('pembahasan') ?></textarea>
									<div id="pembahasanFeedback" class="invalid-feedback">
										<?= form_error('pembahasan', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="catatan_kbm">Catatan</label>
								<div class="input-group mb-3">
									<textarea name="catatan_kbm" id="catatan_kbm" class="form-control <?= (form_error('catatan_kbm')) ? 'is-invalid' : '' ?>" placeholder="Input Catatan Yang Berhubungan Dengan Absensi atau Jalannya Pembelajaran"><?= set_value('catatan_kbm') ?></textarea>
									<div id="catatan_kbmFeedback" class="invalid-feedback">
										<?= form_error('catatan_kbm', '<div class="text-danger">', '</div>') ?>
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
