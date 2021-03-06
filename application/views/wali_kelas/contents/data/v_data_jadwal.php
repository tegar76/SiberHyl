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
                            Jadwal Pelajaran Kelas XI TKRO 1 Semester Gasal Tahun Pelajaran 2021/2022     
						</h6>
						<div class="container py-2">
								<div class="row">
								<div class="content-card col-md-4">
										<div class="card shadow">
											<div class="hari mb-n4">
												<div class="card d-flex align-items-center">
													<p class="text-uppercase my-auto">Senin</p>
												</div>
											</div>
											<!-- Looping mapel Kedua -->
												<div class="jadwal mt-2">
													<div class="mapel">
														<div class="card shadow-sm p-2">
															<div class="d-flex justify-content-lg-start">
																<img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="Jason S.Pd">
																<div class="mapel w-100">
																	<center>
																		<p>Panel Sasis Dan Pemindahan Tenaga KR</p>
																	</center>
																</div>
															</div>
															<div class="ket-mapel mt-3">
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
																	<p>AZ</p>
																</div>
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
																	<p>05-10-2022</p>
																</div>
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
																	<p>MM 1</p>
																</div>
															</div>
														</div>
													</div>
												</div>
										</div>
									</div>
									<!-- Jadwal Harian Looping Disini -->
                                    <?php for($i = 1; $i < 6; $i++) :?>
										<div class="content-card col-md-4">
											<div class="card shadow">
												<div class="hari mb-n4">
													<div class="card d-flex align-items-center">
														<p class="text-uppercase my-auto">Senin</p>
													</div>
												</div>
												<!-- Looping mapel Kedua -->
                                                    <?php for($j = 1; $j < 3; $j++) :?>
													<div class="jadwal mt-2">
														<div class="mapel">
															<div class="card shadow-sm p-2">
																<div class="d-flex justify-content-lg-start">
																	<img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="Jason S.Pd">
																	<div class="mapel w-100">
																		<center>
																			<p>Panel Sasis Dan Pemindahan Tenaga KR</p>
																		</center>
																	</div>
																</div>
																<div class="ket-mapel mt-3">
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
																		<p>AZ</p>
																	</div>
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
																		<p>05-10-2022</p>
																	</div>
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
																		<p>MM 1</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
                                                    <?php endfor?>
											</div>
										</div>
                                    <?php endfor?>
                                    <div class="content-card col-md-4">
										<div class="card shadow">
											<div class="hari mb-n4">
												<div class="card d-flex align-items-center">
													<p class="text-uppercase my-auto">Senin</p>
												</div>
											</div>
											<!-- Looping mapel Kedua -->
												<div class="jadwal mt-2">
													<div class="mapel">
														<div class="card shadow-sm p-2">
															<div class="d-flex justify-content-lg-start">
																<img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="Jason S.Pd">
																<div class="mapel w-100">
																	<center>
																		<p>Panel Sasis Dan Pemindahan Tenaga KR</p>
																	</center>
																</div>
															</div>
															<div class="ket-mapel mt-3">
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
																	<p>AZ</p>
																</div>
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
																	<p>05-10-2022</p>
																</div>
																<div class="d-flex justify-content-start">
																	<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
																	<p>MM 1</p>
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
			</div>
		</div>
	</div>
	<!-- *************************************************************** -->
	<!-- End Top Leader Table -->
	<!-- *************************************************************** -->
</div>
