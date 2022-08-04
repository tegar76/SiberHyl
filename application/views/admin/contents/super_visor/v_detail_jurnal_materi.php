	<!-- import style -->
	<?php include APPPATH . '../assets/guru/css/import_style.php'; ?>

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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor') ?>" class="text-muted">Super Visor</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor?kelas=' . $jurnal->kode_kelas) ?>" class="text-muted"><?= $jurnal->nama_kelas ?></a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor/jurnal/' . $jurnal->jadwal_id) ?>" class="text-muted">Jurnal Materi</a></li>
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
				<div class="col-12 p-0">
					<div class="mt-4 activity">
						<div class="col-md-12">
							<div class="card shadow px-3">
								<table class="table">
									<tbody>
										<tr class="table-borderless">
											<th scope="row" class="col-md-4">Hari, tanggal</th>
											<td><?= $jurnal->hari . ', ' . date('d-m-Y', strtotime($jurnal->tanggal)) ?></td>
										</tr>
										<tr>
											<th scope="row">Kode Guru</th>
											<td><?= $jurnal->guru_kode ?></td>
										</tr>
										<tr>
											<th scope="row">Mapel</th>
											<td><?= $jurnal->nama_mapel ?></td>
										</tr>
										<tr>
											<th scope="row">Jam Pelajaran</th>
											<td><?= date('H:i', strtotime($jurnal->jam_masuk)) . ' - ' .  date('H:i', strtotime($jurnal->jam_keluar)) . " WIB" ?></td>
										</tr>
										<tr>
											<th scope="row">Kelas</th>
											<td><?= $jurnal->nama_kelas ?>.</td>
										</tr>
										<tr>
											<th scope="row">Pertemuan Ke-</th>
											<td><?= $jurnal->pertemuan ?></td>
										</tr>
										<tr>
											<th scope="row">Ruang Kelas</th>
											<td><?= $jurnal->kode_ruang ?></td>
										</tr>
										<tr>
											<th scope="row">KD Materi</th>
											<td><?= $jurnal->kd_materi ?></td>
										</tr>
										<tr>
											<th scope="row">Pembahasan</th>
											<td><?= $jurnal->pembahasan ?></td>
										</tr>
										<tr>
											<th scope="row">Jumlah Siswa</th>
											<td><?= ($jurnal->jumlah_siswa) ? $jurnal->jumlah_siswa : '0' ?></td>
										</tr>
										<tr>
											<th scope="row">Hadir</th>
											<td><?= ($jurnal->hadir) ? $jurnal->hadir : '0' ?></td>
										</tr>
										<tr>
											<th scope="row">Alpa</th>
											<td><?= ($jurnal->alpha) ? $jurnal->alpha : '0' ?></td>
										</tr>
										<tr>
											<th scope="row">Izin</th>
											<td><?= ($jurnal->izin) ? $jurnal->izin : '0' ?></td>
										</tr>
										<tr>
											<th scope="row">Sakit</th>
											<td><?= ($jurnal->sakit) ? $jurnal->sakit : '0' ?></td>
										</tr>
										<tr>
											<th scope="row">Catatan</th>
											<td><?= ($jurnal->catatan_kbm) ? $jurnal->catatan_kbm : '-' ?></td>
										</tr>
									</tbody>
								</table>
								<hr class="mt-n3">
								<div class="button-action d-flex mb-3 mt-2">
									<a href="<?= base_url('master/super-visor/jurnal/' . $jurnal->jadwal_id) ?>" class="btn btn-sm btn-primary bg-blue border-0 rounded ml-3 px-3">Kembali</a>
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