<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

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
			<div class="activity col-12">
				<div class="container my-3">
					<div class="title-form mt-3 mb-3">
						<h6>Kelas</h6>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<div class="input-group mb-2">
								<select id="pratinjau-kelas-id" class="form-control">
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
					</div>
					<div class="card shadow">
						<div class="container py-3">
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
									<!-- Jadwal Harian Looping Disini -->
									<?php foreach ($schedule as $value) : ?>
										<div class="content-card col-md-4 mb-3">
											<div class="card shadow">
												<div class="hari mb-n4">
													<div class="card d-flex align-items-center">
														<p class="text-uppercase my-auto"><?= $value['hari'] ?></p>
													</div>
												</div>
												<?php foreach ($value['sch'] as $study) : ?>
													<div class="jadwal mt-2">
														<div class="mapel">
															<div class="card shadow-sm p-2">
																<div class="d-flex justify-content-lg-start">
																	<img role="button" src="<?= ($study['foto'] == 'default_profile.png') ? base_url('assets/siswa/img/profile.png') : base_url('storage/guru/profile/' . $study['foto']) ?>" alt="" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="<?= $study['nama'] ?>">
																	<div class="mapel w-100">
																		<center>
																			<p><?= $study['mapel'] ?></p>
																		</center>
																	</div>
																</div>
																<div class="ket-mapel mt-3">
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
																		<p><?= $study['kode'] ?></p>
																	</div>
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
																		<p><?= $study['jam'] ?></p>
																	</div>
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
																		<p><?= $study['ruang'] ?></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif ?>
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
