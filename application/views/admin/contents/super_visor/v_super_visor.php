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
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Dashboard</li>
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

		<div class="row">
			<div class="form-group col-md-4">
				<label for="">Kelas</label>
				<div class="input-group mb-2">
					<select id="change-kelas-visor" class="form-control">
						<option selected value="">Pilih Kelas</option>
						<?php foreach ($classes as $cls) : ?>
							<?php if (isset($_GET['kelas']) && $cls->kode_kelas == $_GET['kelas']) : ?>
								<?php $selected = 'selected' ?>
							<?php else : ?>
								<?php $selected = '' ?>
							<?php endif ?>
							<option value="<?= $cls->kode_kelas ?>" <?= $selected ?>><?= $cls->nama_kelas ?></option>
						<?php endforeach ?>
					</select>
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-filter"></i></div>
					</div>
				</div>
			</div>
			<!-- Pembelajaran berlangsung -->
			<div class="col-md-12 p-0">
				<div class="container">
					<div class="h5 mb-3 ">Pembelajaran Yang Sedang Berlangsung!!</div>
					<?php if (!empty($studying)) : ?>
						<div class="row">
							<!-- Jadwal Harian Looping Disini -->
							<div class="content-card col-md-4 mb-1">
								<!-- Looping mapel Kedua -->
								<div class="jadwal mt-2">
									<div class="mapel">
										<summary class="card shadow-sm p-3" data-toggle="collapse" href="#pembelajaran-sekarang" role="button" aria-expanded="false" aria-controls="pembelajaran-sekarang">
											<div class="d-flex justify-content-lg-start mt-1">
												<img role="button" src="<?= ($studying->profile == 'default_profile.png') ? base_url('assets/siswa/img/profile.png') : base_url('storage/guru/profile/' . $studying->profile) ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="<?= $studying->guru_nama ?>" style="width:60px; height:45px;">
												<div class="mapel w-100">
													<center>
														<p><?= $studying->nama_mapel ?></p>
													</center>
												</div>
											</div>
											<div class="ket-mapel mt-3 ml-2">
												<div class="d-flex justify-content-start">
													<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
													<p><?= $studying->guru_kode ?></p>
												</div>
												<div class="d-flex justify-content-start">
													<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
													<p><?= date('H:i', strtotime($studying->jam_masuk)) . ' - ' . date('H:i', strtotime($studying->jam_keluar)) ?></p>
												</div>
												<div class="d-flex justify-content-start">
													<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
													<p><?= ($studying->kode_ruang) ? $studying->kode_ruang : '-' ?></p>
												</div>
											</div>
										</summary>
									</div>
									<div class="features-menu collapse multi-collapse" id="pembelajaran-sekarang">
										<div class="card px-3 mt-n5">
											<div class="row ml-2">
												<div class="section-menu mr-3">
													<a href="<?= base_url('master/super-visor/absensi/' . $studying->jadwal_id) ?>">
														<div class="menu">
															<div class="card  py-1 mt-2 d-flex align-items-center mb-1" style="width: 55px;">
																<img src="<?= base_url('assets/siswa/icons/cek-absen.png') ?>" alt="">
																<p class=" my-auto pt-1">Absensi</p>
															</div>
														</div>
													</a>
												</div>
												<div class="section-menu mr-3">
													<a href="<?= base_url('master/super-visor/tugas_harian/' . $studying->jadwal_id) ?>">
														<div class="menu">
															<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																<img src="<?= base_url('assets/siswa/icons/tugas.png') ?>" alt="">
																<p class="my-auto pt-1">Tugas</p>
															</div>
														</div>
													</a>
												</div>
												<div class="section-menu mr-3">
													<a href="<?= base_url('master/super-visor/evaluasi/' . $studying->jadwal_id) ?>">
														<div class="menu">
															<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																<img src="<?= base_url('assets/siswa/icons/evaluasi.png') ?>" alt="">
																<p class="my-auto pt-1">Evaluasi</p>
															</div>
														</div>
													</a>
												</div>
												<div class="section-menu mr-3">
													<a href="<?= base_url('master/super-visor/diskusi/'  . $studying->jadwal_id) ?>">
														<div class="menu">
															<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																<!-- <span class="badge-info-ds"> </span> -->
																<img src="<?= base_url('assets/siswa/icons/diskusi.png') ?>" alt="">
																<p class="my-auto pt-1">Diskusi</p>
															</div>
														</div>
													</a>
												</div>
												<div class="section-menu mr-3">
													<a href="<?= base_url('master/super-visor/jurnal/' . $studying->jadwal_id) ?>">
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
					<?php else : ?>
						<div class="row">
							<div class="col-md-12 mb-3">
								<div class="alert-pembelajaran alert border-blue-black" role="alert">
									Tidak ada pembelajaran yang sedang berlangsung !!
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
			<!-- Jadwal Pembelajaran -->
			<div class="col-md-12 p-0">
				<div class="container mt-4">
					<div class="h5 mb-3">Jadwal Pembelajaran Kelas <?= ($kelas) ? $kelas->nama_kelas : '-' ?> Semester Gasal Tahun Pelajaran 2021/2022 </div>
					<?php if (!isset($_GET['kelas']) || empty($schedule)) : ?>
						<div class="row">
							<!-- Jadwal Harian Looping Disini -->
							<?php foreach ($days as $day) : ?>
								<div class="content-card col-md-4 mb-3">
									<div class="card shadow">
										<div class="hari mb-n4">
											<div class="card d-flex align-items-center">
												<p class="text-uppercase my-auto"><?= $day ?></p>
											</div>
										</div>
										<div class="jadwal mt-2">
											<div class="mapel">
												<div class="card shadow-sm p-2">
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php else : ?>
						<div class="row">
							<?php foreach ($schedule as $row => $value) : ?>
								<!-- Jadwal Harian Looping Disini -->
								<div class="content-card col-md-4 mb-1">
									<div class="card shadow">
										<div class="hari mb-n4">
											<div class="card d-flex align-items-center">
												<p class="text-uppercase my-auto"><?= $value['hari'] ?></p>
											</div>
										</div>
										<?php foreach ($value['sch'] as $row) : ?>
											<div class="jadwal mt-2">
												<div class="mapel">
													<summary class="card shadow-sm p-3" data-toggle="collapse" href="#sch-<?= $row['id'] ?>" role="button" aria-expanded="false" aria-controls="<?= $row['id'] ?>">
														<div class="d-flex justify-content-lg-start mt-1">
															<img role="button" src="<?= ($row['foto'] == 'default_profile.png') ? base_url('assets/siswa/img/profile.png') : base_url('storage/guru/profile/' . $row['foto']) ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="<?= $row['nama'] ?>" style="width:60px; height:45px;">
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
														</div>
													</summary>
												</div>
												<div class="features-menu collapse multi-collapse" id="sch-<?= $row['id'] ?>">
													<div class="card px-2 mt-n5">
														<div class="row ml-1">
															<div class="section-menu mr-3">
																<a href="<?= base_url('master/super-visor/absensi/' . $row['id']) ?>">
																	<div class="menu">
																		<div class="card  py-1 mt-2 d-flex align-items-center mb-1" style="width: 55px;">
																			<img src="<?= base_url('assets/siswa/icons/cek-absen.png') ?>" alt="">
																			<p class=" my-auto pt-1">Absensi</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('master/super-visor/tugas_harian/' . $row['id']) ?>">
																	<div class="menu">
																		<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																			<img src="<?= base_url('assets/siswa/icons/tugas.png') ?>" alt="">
																			<p class="my-auto pt-1">Tugas</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('master/super-visor/evaluasi/' . $row['id']) ?>">
																	<div class="menu">
																		<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																			<img src="<?= base_url('assets/siswa/icons/evaluasi.png') ?>" alt="">
																			<p class="my-auto pt-1">Evaluasi</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('master/super-visor/diskusi/' . $row['id']) ?>">
																	<div class="menu">
																		<div class="card py-1 mt-2 d-flex align-items-center mb-1" style="width:55px">
																			<!-- <span class="badge-info-ds"> </span> -->
																			<img src="<?= base_url('assets/siswa/icons/diskusi.png') ?>" alt="">
																			<p class="my-auto pt-1">Diskusi</p>
																		</div>
																	</div>
																</a>
															</div>
															<div class="section-menu mr-3">
																<a href="<?= base_url('master/super-visor/jurnal/' . $row['id']) ?>">
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
										<?php endforeach; ?>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>

		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
