<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title . ' Kelas ' . $setting_abs->nama_kelas ?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Pembelajaran</li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran') ?>" class="text-muted">Mengajar</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/absensi/' . $setting_abs->jadwal_id) ?>" class="text-muted">Absensi</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
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

		<div class="card-group">
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $H ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Hadir</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-success px-2">
									H
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $A ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Alpa (Tanpa Keterangan)
							</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-danger px-2">
									A
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $I ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Izin</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-blue px-2">
									I
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $S ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Sakit</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-warning px-2">
									S
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<a href="<?= base_url('guru/pembelajaran/tambah_jurnal_materi/' . $setting_abs->jurnal_id) ?>" class="btn btn-primary bg-blue border-0 rounded mb-3">
					<i class="fa fa-plus"></i> Jurnal Materi
				</a>
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Settings Jam Absen
						</h6>
						<div class="mt-4 activity">
							<table class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:8%;">Hari</th>
										<th style="width:20%;">Mapel</th>
										<th style="width:12%;">Jam Pelajaran</th>
										<th style="width:12%;">Ruang</th>
										<th style="width:12%;">Pertemuan Ke-</th>
										<th style="width:10%;">Tanggal</th>
										<th style="width:10%;">Mulai</th>
										<th style="width:10%;">Selesai</th>
										<th style="width:4%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td><?= $setting_abs->hari ?></td>
										<td><?= $setting_abs->nama_mapel ?></td>
										<td><?= date('H:i', strtotime($setting_abs->jam_masuk)) . ' - ' . date('H:i', strtotime($setting_abs->jam_keluar)) ?></td>
										<td><?= $setting_abs->nama_ruang ?></td>
										<td><?= $setting_abs->pert_ke ?></td>
										<td><?= date('d-m-Y', strtotime($setting_abs->tanggal)) ?></td>
										<td><?= ($setting_abs->absen_mulai) ? date('H:i', strtotime($setting_abs->absen_mulai)) . " WIB" : '-' ?></td>
										<td><?= ($setting_abs->absen_selesai) ? date('H:i', strtotime($setting_abs->absen_selesai)) . " WIB" : '-' ?></td>
										<td>
											<a href="<?= base_url('guru/pembelajaran/set_waktu_absensi/' . $setting_abs->jurnal_id) ?>" class="btn btn-sm btn-success border-0 rounded"><i class="fa fa-edit text-white" data-toggle="tooltip" data-placement="bottom" title="Edit"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Data Siswa Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="data-absensi-siswa" class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:8%;">NIS</th>
										<th style="width:20%;">Nama</th>
										<th style="width:12%;">Jenis Kelamin</th>
										<th style="width:12%;">Status Kesiswaan</th>
										<th style="width:12%;">Pembelajaran</th>
										<th style="width:10%;">Bukti</th>
										<th style="width:6%;">Status</th>
										<th style="width:10%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($rekap_absen) : ?>
										<?php foreach ($rekap_absen as $absensi) : ?>
											<tr>
												<td><?= $absensi['nomor'] ?></td>
												<td><?= $absensi['nis'] ?></td>
												<td><?= $absensi['nama'] ?></td>
												<td><?= $absensi['jk'] ?></td>
												<td><?= $absensi['status'] ?></td>
												<td><?= $absensi['pembelajaran'] ?></td>
												<td><?= $absensi['bukti'] ?></td>
												<td><?= $absensi['status_absen'] ?></td>
												<td>
													<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
													<div class="form-check">
														<input class="form-check-input action-absens-siswa" type="checkbox" name="status_absen" id="H<?= $absensi['nis'] ?>" <?= ($absensi['status_absen'] === 'H') ? 'checked' : '' ?> value="H" nis="<?= $absensi['nis'] ?>" jurnal="<?= $absensi['jurnal_id'] ?>" absensi="<?= $absensi['absensi_id'] ?>">
														<label class="form-check-label" for="H<?= $absensi['nis'] ?>">H (Hadir)</label>
													</div>
													<div class="form-check">
														<input class="form-check-input action-absens-siswa" type="checkbox" name="status_absen" id="A<?= $absensi['nis'] ?>" <?= ($absensi['status_absen'] === 'A') ? 'checked' : '' ?> value="A" nis="<?= $absensi['nis'] ?>" jurnal="<?= $absensi['jurnal_id'] ?>" absensi="<?= $absensi['absensi_id'] ?>">
														<label class="form-check-label" for="A<?= $absensi['nis'] ?>">A (Alpa)</label>
													</div>
													<div class="form-check">
														<input class="form-check-input action-absens-siswa" type="checkbox" name="status_absen" id="I<?= $absensi['nis'] ?>" <?= ($absensi['status_absen'] === 'I') ? 'checked' : '' ?> value="I" nis="<?= $absensi['nis'] ?>" jurnal="<?= $absensi['jurnal_id'] ?>" absensi="<?= $absensi['absensi_id'] ?>">
														<label class="form-check-label" for="I<?= $absensi['nis'] ?>">I (Izin)</label>
													</div>
													<div class="form-check">
														<input class="form-check-input action-absens-siswa" type="checkbox" name="status_absen" id="S<?= $absensi['nis'] ?>" <?= ($absensi['status_absen'] === 'S') ? 'checked' : '' ?> value="S" nis="<?= $absensi['nis'] ?>" jurnal="<?= $absensi['jurnal_id'] ?>" absensi="<?= $absensi['absensi_id'] ?>">
														<label class="form-check-label" for="S<?= $absensi['nis'] ?>">S (Sakit)</label>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
									<?php endif; ?>
									<!-- Tampil Semua Siswa -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>

	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
