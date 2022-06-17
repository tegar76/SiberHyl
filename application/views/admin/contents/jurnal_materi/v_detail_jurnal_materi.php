<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Detail Jurnal Materi</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Dashboard</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/jurnal') ?>" class="text-muted">Jurnal Materi</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Detail Jurnal Materi</li>
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
	<div class="container-fluid mt-n4">
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
				<div class="mt-4 activity">
					<div class="card shadow px-3">
						<table class="table">
							<tbody>
								<tr class="table-borderless">
									<th scope="row">Tanggal</th>
									<td><?= $result->hari . ', ' . date('d-m-Y', strtotime($result->tanggal)) . ' ' . date('H:i', strtotime($result->absen_mulai)) . ' WIB' ?></td>
								</tr>
								<tr>
									<th scope="row">Kode Guru</th>
									<td><?= $result->guru_kode ?></td>
								</tr>
								<tr>
									<th scope="row">Mapel</th>
									<td><?= $result->nama_mapel ?></td>
								</tr>
								<tr>
									<th scope="row">Jam Pelajaran</th>
									<td><?= date('H:i', strtotime($result->jam_masuk)) . ' - ' . date('H:i', strtotime($result->jam_keluar)) . ' WIB' ?></td>
								</tr>
								<tr>
									<th scope="row">Kelas</th>
									<td><?= $result->nama_kelas ?></td>
								</tr>
								<tr>
									<th scope="row">Pertemuan Ke-</th>
									<td><?= $result->pert_ke ?></td>
								</tr>
								<tr>
									<th scope="row">Ruang Kelas</th>
									<td><?= $result->kode_ruang ?></td>
								</tr>
								<tr>
									<th scope="row">KD Materi</th>
									<td><?= $result->kd_materi ?></td>
								</tr>
								<tr>
									<th scope="row">Pembahasan</th>
									<td><?= $result->pembahasan ?></td>
								</tr>
								<tr>
									<th scope="row">Jumlah Siswa</th>
									<td><?= $result->jumlah_siswa ?></td>
								</tr>
								<tr>
									<th scope="row">hadir</th>
									<td><?= $result->jumlah_hadir ?></td>
								</tr>
								<tr>
									<th scope="row">Alpa</th>
									<td><?= $result->jumlah_alpha ?></td>
								</tr>
								<tr>
									<th scope="row">Izin</th>
									<td><?= $result->jumlah_izin ?></td>
								</tr>
								<tr>
									<th scope="row">Sakit</th>
									<td><?= $result->jumlah_sakit ?></td>
								</tr>
								<tr>
									<th scope="row">Catatan</th>
									<td><?= $result->catatan_kbm ?></td>
								</tr>
							</tbody>
						</table>
						<hr class="mt-n3">
						<div class="button-action d-flex mb-3 mt-2">
							<a href="<?= base_url('master/jurnal') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
