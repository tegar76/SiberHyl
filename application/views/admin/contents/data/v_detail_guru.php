<!-- import style -->

<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Detail Guru</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Data Master</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/guru') ?>" class="text-muted">Data Guru</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Detail Guru</li>
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
							<div class="col-md-3 text-center mb-3">
								<div class="card shadow py-4">
									<div class="img-photo justify-content-center">
										<img class="mx-auto d-block rounded-circle" src="<?= ($guru->guru_foto != 'default_profile.png') ? base_url('storage/guru/profile/' . $guru->guru_foto) : base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="<?= $guru->guru_nama ?>">
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<div class="card shadow px-3">
									<table class="table">
										<tbody>
											<tr class="table-borderless">
												<th scope="row" class="table-title">Profile</th>
											</tr>
											<tr class="table-borderless">
												<th scope="row">Kode Guru</th>
												<td class="col-md-3"><?= $guru->guru_kode ?></td>
											</tr>
											<tr>
												<th scope="row">Nama</th>
												<td><?= $guru->guru_nama ?></td>
											</tr>
											<tr>
												<th scope="row">Username</th>
												<td><?= $guru->guru_username ?></td>
											</tr>

											<tr class="table-borderless">
												<th scope="row" class="table-title">Pembagian Tugas Mengajar Semester <?= $semester = ($tahun_ajar['semester'] == 0 ) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></th>
												<!-- <td></td> -->
											</tr>
											<tr>
												<th scope="row">
													<table class="table-responsive table-striped table-bordered" style="width:200%">
														<thead>
															<tr>
																<th>No</th>
																<th>Mata pelajaran</th>
																<th>Kompetensi keahlian</th>
																<th>Jumlah Rom</th>
																<th>Jumlah Jam</th>
																<th>Jumlah</th>
															</tr>
														</thead>
														<?php if (empty($jadwal)) : ?>
															<tbody>
															</tbody>
														<?php else : ?>
															<tbody>
																<?php $total = 0;
																foreach ($jadwal as $row => $value) : ?>
																	<tr>
																		<td><?= $value['nomor'] ?></td>
																		<td><?= $value['mapel'] ?></td>
																		<td>
																			<?php $kelas = $this->jadwal->getKelasJadwal($value['mapel_id']);
																			foreach ($kelas as $row) {
																				echo $row->nama_kelas . '<br>';
																			} ?>
																		</td>
																		<td><?= $value['jumlah_rombel'] ?></td>
																		<td><?= $value['jumlah_jam'] ?></td>
																		<td><?= $value['total_jam'] ?></td>
																	</tr>
																	<?php $total += $value['total_jam']; ?>
																<?php endforeach; ?>
															</tbody>
															<tfoot>
																<tr>
																	<th colspan="5" class="text-center">Total Jam Mengajar</th>
																	<td><?= $total ?></td>
																</tr>
															</tfoot>
														<?php endif; ?>
													</table>
												</th>
												<td></td>
											</tr>

										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<a href="<?= base_url('master/data/guru') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
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
