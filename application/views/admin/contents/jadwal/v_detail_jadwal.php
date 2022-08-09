<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Detail Jadwal</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/jadwal') ?>" class="text-muted">Jadwal</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Detail Jadwal</li>
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
					<div class="profile">
						<div class="row">
							<div class="col-md-4 text-center mb-3">
								<div class="card shadow py-4">
									<div class="img-photo justify-content-center">
										<img class="mx-auto d-block rounded-circle" src="<?= ($jadwalDetail->profile != 'default_profile.png') ? base_url('storage/guru/profile/' . $jadwalDetail->profile) : base_url('assets/siswa/img/profile.png') ?>" width="150" height="150" alt="Foto Profile Guru">
									</div>
									<div class="line">
										<hr>
									</div>
									<div class="atribute">
										<h6><?= $jadwalDetail->guru_nama ?></h6>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="card shadow px-3">
									<table class="table">
										<tbody>
											<tr class="table-borderless">
												<th scope="row">Kelas</th>
												<td><?= $jadwalDetail->nama_kelas ?></td>
											</tr>
											<tr>
												<th scope="row">Hari</th>
												<td><?= $jadwalDetail->hari ?></td>
											</tr>
											<tr>
												<th scope="row">Mapel</th>
												<td><?= $jadwalDetail->nama_mapel ?></td>
											</tr>
											<tr>
												<th scope="row">Kode Guru</th>
												<td><?= $jadwalDetail->guru_kode ?></td>
											</tr>
											<tr>
												<th scope="row">Jam Mulai</th>
												<td><?= date('H:i', strtotime($jadwalDetail->jam_masuk)) ?> WIB</td>
											</tr>
											<tr>
												<th scope="row">Jam Selesai</th>
												<td><?= date('H:i', strtotime($jadwalDetail->jam_keluar)) ?> WIB</td>
											</tr>
											<tr>
												<th scope="row">Ruang Kelas</th>
												<td><?= $jadwalDetail->kode_ruang ?></td>
											</tr>
											<tr>
												<th scope="row">Jumlah Jam Mengajar</th>
												<td><?= $jadwalDetail->jumlah_jam ?> Jam</td>
											</tr>
										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<a href="<?= base_url('master/jadwal') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
