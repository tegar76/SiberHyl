<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title?></h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Pembelajaran</li>
					<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title?></li>
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
			<!-- Pembelajaran berlangsung -->
			<div class="activity col-md-12 p-0">
				<div class="container">
					<div class="title mb-3">Pembelajaran Yang Sedang Berlangsung!!</div>
					<div class="row">
						<!-- Jadwal Harian Looping Disini -->
						<div class="content-card col-md-4 mb-1">
							<!-- Looping mapel Kedua -->
							<div class="jadwal mt-2">
								<div class="mapel">
									<div class="card shadow-sm p-3" data-toggle="collapse" href="#pembelajaran-sekarang" role="button" aria-expanded="false" aria-controls="pembelajaran-sekarang">
										<div class="d-flex justify-content-lg-start mt-1">
											<img role="button" src="<?= base_url('assets/siswa/img/profile.png') ?>" alt="" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="Sulton Akbar Pamungkas, S.Pd">
											<div class="mapel w-100">
												<center>
													<p>Panel Sasis Dan Pemindahan Tenaga KR</p>
												</center>
											</div>
										</div>
										<div class="ket-mapel mt-3 ml-2">
											<div class="d-flex justify-content-start">
												<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
												<p>AZ</p>
											</div>
											<div class="d-flex justify-content-start">
												<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
												<p>07.00 : 13.00</p>
											</div>
											<div class="d-flex justify-content-start">
												<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
												<p>MM 1</p>
											</div>
											<div class="d-flex justify-content-start">
												<img src="<?= base_url('assets/siswa/icons/kelas.png') ?>" alt="">
												<p>XI TKRO 1</p>
											</div>
										</div>
									</div>
								</div>
								<div class="features-menu collapse multi-collapse" id="pembelajaran-sekarang">
									<div class="card px-3 mt-n5">
										<div class="row ml-2">
											<div class="section-menu mr-3">
												<a href="<?= base_url('Guru/Pembelajaran/absensi')?>">
													<div class="menu">
														<div class="card  py-1 mt-2 d-flex align-items-center mb-1" style="width: 55px;">
															<img src="<?= base_url('assets/siswa/icons/cek-absen.png') ?>" alt="">
															<p class=" my-auto pt-1">Absensi</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu mr-3">
												<a href="<?= base_url('Guru/Pembelajaran/tugasHarian')?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
															<img src="<?= base_url('assets/siswa/icons/tugas.png') ?>" alt="">
															<p class="my-auto pt-1">Tugas</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu mr-3">
												<a href="<?= base_url('Siswa/Evaluasi')?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
															<img src="<?= base_url('assets/siswa/icons/evaluasi.png') ?>" alt="">
															<p class="my-auto pt-1">Evaluasi</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu mr-3">
												<a href="<?= base_url('Siswa/Diskusi')?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
															<span class="badge-info-ds"> </span>
															<img src="<?= base_url('assets/siswa/icons/diskusi.png') ?>" alt="">
															<p class="my-auto pt-1">Diskusi</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu mr-3">
												<a href="<?= base_url('Siswa/Materi')?>">
													<div class="menu">
														<div class="card  py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
															<img src="<?= base_url('assets/siswa/icons/jurnal.png') ?>" alt="">
															<p class=" my-auto pt-1">Jurnal</p>
														</div>
													</div>
												</a>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- Pembagian tugas mengajar -->
			<div class="activity col-md-12 p-0">
				<div class="container mt-4">
					<div class="title mb-3">Pembagian Tugas Mengajar Semester Gasal  Tahun Pelajaran 2021/2022 </div>
						<div class="row">
							<!-- Jadwal Harian Looping Disini -->
								<div class="content-card col-md-4 mb-1">
									<div class="card shadow">
										<div class="hari mb-n4">
											<div class="card d-flex align-items-center">
												<p class="text-uppercase my-auto">Senin</p>
											</div>
										</div>
										<!-- Looping mapel Kedua -->
											<div class="jadwal mt-2">
												<div class="mapel">
													<div class="card shadow-sm p-3" data-toggle="collapse" href="#senin" role="button" aria-expanded="false" aria-controls="senin">
														<div class="d-flex justify-content-lg-start mt-1">
															<img role="button" src="<?= base_url('assets/siswa/img/profile.png') ?>" alt="" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="Sulton Akbar Pamungkas, S.Pd">
															<div class="mapel w-100">
																<center>
																	<p>Panel Sasis Dan Pemindahan Tenaga KR</p>
																</center>
															</div>
														</div>
														<div class="ket-mapel mt-3 ml-2">
															<div class="d-flex justify-content-start">
																<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
																<p>AZ</p>
															</div>
															<div class="d-flex justify-content-start">
																<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
																<p>07.00 : 13.00</p>
															</div>
															<div class="d-flex justify-content-start">
																<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
																<p>MM 1</p>
															</div>
															<div class="d-flex justify-content-start">
																<img src="<?= base_url('assets/siswa/icons/kelas.png') ?>" alt="">
																<p>XI TKRO 1</p>
															</div>
														</div>
													</div>
												</div>
												<div class="features-menu collapse multi-collapse" id="senin">
													<div class="card px-2 mt-n5">
														<div class="row ml-1">
															<div class="section-menu mr-3">
																<a href="<?= base_url('Guru/Pembelajaran/absensi')?>">
																	<div class="menu">
																		<div class="card  py-1 mt-2 d-flex align-items-center mb-1" style="width: 55px;">
																			<img src="<?= base_url('assets/siswa/icons/cek-absen.png') ?>" alt="">
																			<p class=" my-auto pt-1">Absensi</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('Guru/Pembelajaran/tugasHarian')?>">
																	<div class="menu">
																		<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																			<img src="<?= base_url('assets/siswa/icons/tugas.png') ?>" alt="">
																			<p class="my-auto pt-1">Tugas</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('Siswa/Evaluasi')?>">
																	<div class="menu">
																		<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																			<img src="<?= base_url('assets/siswa/icons/evaluasi.png') ?>" alt="">
																			<p class="my-auto pt-1">Evaluasi</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('Siswa/Diskusi')?>">
																	<div class="menu">
																		<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																			<span class="badge-info-ds"> </span>
																			<img src="<?= base_url('assets/siswa/icons/diskusi.png') ?>" alt="">
																			<p class="my-auto pt-1">Diskusi</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('Siswa/Materi')?>">
																	<div class="menu">
																		<div class="card  py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																			<img src="<?= base_url('assets/siswa/icons/jurnal.png') ?>" alt="">
																			<p class=" my-auto pt-1">Jurnal</p>
																		</div>
																	</div>
																</a>
															</div>
														</div>

													</div>
												</div>
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