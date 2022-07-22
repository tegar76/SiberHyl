<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Pratinjau Jadwal</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Pratinjau Jadwal</li>
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
	<div class="container-fluid mt-n3">
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
			<div class="activity col-12 p-0">
				<div class="container my-3">
					<div class="card shadow">
						<h6 class="card-title opacity-7  ml-3 mt-3 mb-4">
							Jadwal Pelajaran Kelas <?= $wali->nama_kelas ?> Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="container py-2">
							<div class="row">
								<?php foreach ($study as $row => $value) : ?>
									<div class="content-card col-md-4">
										<div class="card shadow">
											<div class="hari mb-n4">
												<div class="card d-flex align-items-center">
													<p class="text-uppercase my-auto"><?= $value['hari'] ?></p>
												</div>
											</div>
											<!-- Looping mapel Kedua -->
											<?php foreach ($value['sch'] as $row) : ?>
												<div class="jadwal mt-2">
													<div class="mapel">
														<div class="card shadow-sm p-3" data-toggle="collapse" href="#sch-<?= $row['id'] ?>" role="button" aria-expanded="false" aria-controls="<?= $row['id'] ?>">
															<div class="d-flex justify-content-lg-start mt-1">
																<img role="button" src="<?= ($row['foto'] == 'default_profile.png') ? base_url('assets/siswa/img/profile.png') : base_url('storage/guru/profile/' . $row['foto']) ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="<?= $row['nama'] ?>">
																<div class="mapel w-100">
																	<center>
																		<p><?= $row['mapel'] ?></p>
																	</center>
																</div>
															</div>
															<div class="ket-mapel mt-3 ml-2">
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
																	<p><?= $row['kode'] ?></p>
																</div>
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
																	<p><?= $row['jam'] ?></p>
																</div>
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
																	<p><?= $row['ruang'] ?></p>
																</div>
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/kelas.png') ?>" alt="">
																	<p><?= $row['kelas'] ?></p>
																</div>
															</div>
														</div>
													</div>
												</div>
											<?php endforeach ?>
										</div>
									</div>
								<?php endforeach ?>
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
