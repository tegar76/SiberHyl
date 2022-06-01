<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

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
			<div class="activity">
				<div class="container my-3">
					<div class="title-form mt-3 mb-3">
						<h6>Kelas</h6>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<div class="input-group mb-2">
								<select id="id_kelas" class="form-control">
									<option selected value="">Pilih Kelas</option>
									<?php foreach ($classes as $cls) : ?>
										<option value="<?= $cls->kode_kelas ?>" <?= ($cls->kode_kelas == $this->uri->segment(4)) ? 'selected' : '' ?>><?= $cls->nama_kelas ?></option>
									<?php endforeach ?>
								</select>
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-filter"></i></div>
								</div>
							</div>
						</div>
						<div class="print col-md-2">
							<div class="card">
								<div class="row ml-1 mt-1 ml-2">
									<a href="" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa-solid fa-print mr-2 color-cyan"></i></a>
									<a href="" data-toggle="tooltip" data-placement="top" title="Print Pdf"><i class="fa-solid fa-file-pdf color-pink"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="card shadow">
						<div class="container py-3">
							<?php if (empty($this->uri->segment(4))) : ?>
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
															<div class="d-flex justify-content-lg-start">
															</div>
															<div class="ket-mapel mt-3">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php else : ?>
								<div class="title-pratinjau mb-4 mt-3">
									<h6>Dibuat : 01 - 05 - 2022 08 : 00 WIB, Diupdate : - </h6>
								</div>
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
												<?php
												$CI = &get_instance();
												$CI->load->model('JadwalModel', 'jadwal', true);
												$studying = $CI->jadwal->getJadwalHariIni([
													'hari' => $day,
													'jadwal.kelas_id' => $class->kelas_id
												])->result();
												?>
												<!-- Looping mapel Kedua -->
												<?php foreach ($studying as $study) : ?>
													<div class="jadwal mt-2">
														<div class="mapel">
															<div class="card shadow-sm p-2">
																<div class="d-flex justify-content-lg-start">
																	<img role="button" src="<?= ($study->guru_foto == 'default_profile.png') ? base_url('assets/siswa/img/perfil.png') : base_url('storage/guru/profile/' . $study->guru_foto) ?>" alt="" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="<?= $study->guru_nama ?>">
																	<div class="mapel w-100">
																		<center>
																			<p><?= $study->nama_mapel ?></p>
																		</center>
																	</div>
																</div>
																<div class="ket-mapel mt-3">
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
																		<p><?= $study->guru_kode ?></p>
																	</div>
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
																		<p><?= date('H:i', strtotime($study->jam_masuk)) . ' - ' . date('H:i', strtotime($study->jam_keluar)) ?></p>
																	</div>
																	<div class="d-flex justify-content-start">
																		<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
																		<p><?= $study->nama_ruang ?></p>
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
	<!-- *************************************************************** -->
	<!-- End Top Leader Table -->
	<!-- *************************************************************** -->
</div>

<script>
	$(document).ready(function() {
		$('#id_kelas').change(function() {
			var kelas = $('#id_kelas').val();
			window.location = "<?= base_url('master/jadwal/pratinjauJadwal') ?>/" + kelas;
		});
	});
</script>
