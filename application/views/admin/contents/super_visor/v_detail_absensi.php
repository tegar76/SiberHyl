<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/guru/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title . ' Kelas XI ' . $setting_abs->nama_kelas ?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor') ?>" class="text-muted">Super Visor</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor?kelas=' . $setting_abs->kode_kelas) ?>" class="text-muted"><?= $setting_abs->nama_kelas ?></a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor/absensi/' . $setting_abs->jadwal_id) ?>" class="text-muted">Absensi</a></li>
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
										<th style="width:14%;">Pertemuan Ke-</th>
										<th style="width:13%;">Tanggal</th>
										<th style="width:10%;">Mulai</th>
										<th style="width:10%;">Selesai</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td><?= $setting_abs->hari ?></td>
										<td><?= $setting_abs->nama_mapel ?></td>
										<td><?= date('H:i', strtotime($setting_abs->jam_masuk)) . ' - ' . date('H:i', strtotime($setting_abs->jam_keluar)) ?></td>
										<td><?= $setting_abs->kode_ruang ?></td>
										<td><?= $setting_abs->pertemuan ?></td>
										<td><?= date('d-m-Y', strtotime($setting_abs->tanggal)) ?></td>
										<td><?= ($setting_abs->absen_mulai) ? date('H:i', strtotime($setting_abs->absen_mulai)) . " WIB" : '-' ?></td>
										<td><?= ($setting_abs->absen_selesai) ? date('H:i', strtotime($setting_abs->absen_selesai)) . " WIB" : '-' ?></td>
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
							<table id="tabel-absensi-siswa-admin" class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:6%;">NIS</th>
										<th style="width:16%;">Nama</th>
										<th style="width:8%;">Jenis Kelamin</th>
										<th style="width:12%;">Status Kesiswaan</th>
										<th style="width:12%;">Pembelajaran</th>
										<th style="width:10%;">Bukti</th>
										<th style="width:4%;">Status</th>
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
											</tr>
										<?php endforeach; ?>
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
