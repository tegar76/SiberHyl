<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Detail Siswa</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Data Master</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/siswa?kelas=' . $siswa->kode_kelas) ?>" class="text-muted">Data Siswa</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Detail Siswa</li>
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
										<img class="mx-auto d-block rounded-circle" src="<?= ($siswa->siswa_foto != 'default_foto.png') ? base_url('storage/siswa/profile/' . $siswa->siswa_foto) : base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="<?= $siswa->siswa_nama ?>">
									</div>
									<div class="line">
										<hr>
									</div>
									<div class="atribute px-3">
										<h6><?= $siswa->siswa_nama ?></h6>
										<p><?= $siswa->nama_kelas ?></p>
										<div class="info text-left ml-2">
											<p>Dibuat : &ensp;<span> <?= date('d-m-Y H:i', strtotime($siswa->create_time)) . " WIB" ?></span> </p>
											<p class="mt-n1 mb-n1">Diubah : &ensp;<span><?= ($siswa->create_time == $siswa->update_time) ? '-' : date('d-m-Y H:i', strtotime($siswa->update_time)) . " WIB" ?></span></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="card shadow px-3">
									<table class="table">
										<tbody>
											<tr class="table-borderless">
												<th scope="row">NIS</th>
												<td><?= $siswa->siswa_nis ?></td>
											</tr>
											<tr>
												<th scope="row">NISN</th>
												<td><?= $siswa->siswa_nisn ?></td>
											</tr>
											<tr>
												<th scope="row">Tempat,Tanggal Lahir</th>
												<td><?= (!empty($siswa->siswa_tempatlahir)) ? $siswa->siswa_tempatlahir : '-' ?>, <?= ($siswa->siswa_tanggallahir == '0000-00-00') ? '-' : date('d - m - Y', strtotime($siswa->siswa_tanggallahir)) ?></td>
											</tr>
											<tr>
												<th scope="row">Jenis Kelamin</th>
												<td><?= (!empty($siswa->siswa_kelamin)) ? $siswa->siswa_kelamin : '-' ?></td>
											</tr>
											<tr>
												<th scope="row">Email</th>
												<td><?= (!empty($siswa->siswa_email)) ? $siswa->siswa_email : '-' ?></td>
											</tr>
											<tr>
												<th scope="row">No Handphone</th>
												<td><?= (!empty($siswa->siswa_telp)) ? $siswa->siswa_telp : ' - ' ?></td>
											</tr>
											<tr>
												<th scope="row">Alamat</th>
												<td><?= (!empty($siswa->siswa_alamat)) ? $siswa->siswa_alamat : '-' ?></td>
											</tr>
											<tr>
												<th scope="row">Asal Kelas</th>
												<td><?= ($siswa->asal_kelas) ? $siswa->asal_kelas : '-' ?></td>
											</tr>
											<tr>
												<th scope="row">Status Kesiswaan</th>
												<td><?= $siswa->status ?></td>
											</tr>
										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<a href="<?= base_url('master/data/siswa?kelas=' . $siswa->kode_kelas) ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
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