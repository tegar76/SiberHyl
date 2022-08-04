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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/absensi/' . $id_jadwal) ?>" class="text-muted">Absensi</a></li>
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
						<?= form_open('guru/pembelajaran/tambah_pertemuan/' . $id_jadwal) ?>
						<input type="hidden" name="jadwal_id" value="<?= $id_jadwal ?>">
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="kode_guru">Kode Guru</label>
								<div class="input-group mb-3">
									<input type="text" name="kode_guru" id="kode_guru" class="form-control <?= (form_error('kode_guru')) ? 'is-invalid' : '' ?>" value="<?= $jadwal->guru_kode ?>" readonly>
									<div id="kode_guruFeedback" class="invalid-feedback">
										<?= form_error('kode_guru', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="nama_kelas">Kelas</label>
								<div class="input-group mb-3">
									<input type="text" name="nama_kelas" id="nama_kelas" class="form-control <?= (form_error('nama_kelas')) ? 'is-invalid' : '' ?>" value="<?= $jadwal->nama_kelas ?>" readonly>
									<div id="nama_kelasFeedback" class="invalid-feedback">
										<?= form_error('nama_kelas', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="hari">Hari</label>
								<div class="input-group mb-3">
									<input type="text" name="hari" id="hari" class="form-control <?= (form_error('hari')) ? 'is-invalid' : '' ?>" value="<?= $jadwal->hari ?>" readonly>
									<div id="hariFeedback" class="invalid-feedback">
										<?= form_error('hari', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="nama_mapel">Mapel</label>
								<div class="input-group mb-3">
									<input type="text" name="nama_mapel" id="nama_mapel" class="form-control <?= (form_error('nama_mapel')) ? 'is-invalid' : '' ?>" value="<?= $jadwal->nama_mapel ?>" readonly>
									<div id="nama_mapelFeedback" class="invalid-feedback">
										<?= form_error('nama_mapel', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="kode_ruang">Ruang Kelas</label>
								<div class="input-group mb-3">
									<input type="text" name="kode_ruang" id="kode_ruang" class="form-control <?= (form_error('kode_ruang')) ? 'is-invalid' : '' ?>" value="<?= $jadwal->kode_ruang ?>" readonly>
									<div id="kode_ruangFeedback" class="invalid-feedback">
										<?= form_error('kode_ruang', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<label for="tanggal_pertemuan">Tanggal</label>
										<div class="input-group mb-3">
											<input type="date" name="tanggal_pertemuan" id="tanggal_pertemuan" class="form-control <?= (form_error('tanggal_pertemuan')) ? 'is-invalid' : '' ?>">
											<div id="tanggal_pertemuanFeedback" class="invalid-feedback">
												<?= form_error('tanggal_pertemuan', '<div class="text-danger">', '</div>') ?>
											</div>
										</div>
									</div>
									<div class="col">
										<label for="pertemuan_ke">Pertemuan Ke-</label>
										<div class="input-group mb-3">
											<select name="pertemuan_ke" id="pertemuan_ke" class="form-control <?= (form_error('pertemuan_ke')) ? 'is-invalid' : '' ?>">
												<option value="">Pilih Pertemuan Ke-</option>
												<?php for ($i = 1; $i <= 10; $i++) : ?>
													<option value="<?= $i ?>">Pertemuan <?= $i ?></option>
												<?php endfor ?>
											</select>
											<div id="pertemuan_keFeedback" class="invalid-feedback">
												<?= form_error('pertemuan_ke', '<div class="text-danger">', '</div>') ?>
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
