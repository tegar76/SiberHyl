<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_jadwal.php'; ?>

<!-- Jquery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<section class="container section section__height">

	<div class="search-box d-flex justify-content-end">
		<input type="text" class="search-click" name="" placeholder="🔍 Cari ..." />
	</div>

	<div class="now-studying">
		<div class="section-title">
			Pembelajaran yang sedang berlangsung !!
			<hr>
		</div>
		<?php if (!empty($nowStudying)) : ?>
			<div class="row">
				<!--Pembelajaran Berlangsung -->
				<div class="mapel col-md-4 mb-3">
					<div class="card shadow p-3" data-toggle="collapse" href="#pembelajaran-sekarang" role="button" aria-expanded="false" aria-controls="pembelajaran-sekarang">
						<div class="jadwal">
							<div class="mapel">
								<div class="d-flex justify-content-lg-start">
									<img role="button" src="<?= ($nowStudying->guru_foto == 'default_profile.png') ? base_url('assets/siswa/img/perfil.png') : base_url('storage/guru/profile/' . $nowStudying->guru_foto) ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="<?= $nowStudying->guru_nama ?>">
									<div class="mapel w-100">
										<center>
											<p><?= $nowStudying->nama_mapel ?></p>
										</center>
									</div>
									<a href="<?= base_url('siswa/absensi/ruang_absensi/' . $this->secure->encrypt_url($nowStudying->jadwal_id)) ?>">
										<div class="absen d-block justify-content-center">
											<div class="card bg-absen-open shadow-sm px-3 pt-3">
												<img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
												<p>Absen</p>
											</div>
										</div>
									</a>
								</div>
								<div class="ket-mapel">
									<div class="d-flex justify-content-start">
										<img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
										<p><?= $nowStudying->guru_kode ?></p>
									</div>
									<div class="d-flex justify-content-start">
										<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
										<p><?= date('H:i', strtotime($nowStudying->jam_masuk)) . ' - ' . date('H:i', strtotime($nowStudying->jam_keluar)) ?></p>
									</div>
									<div class="d-flex justify-content-start">
										<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
										<p><?= $nowStudying->kode_ruang ?></p>
									</div>
								</div>
							</div>
							<div class="features-menu collapse multi-collapse" id="pembelajaran-sekarang">
								<div class="card px-3 pt-3">
									<div class="row">
										<div class="section-menu col">
											<a href="<?= base_url('Siswa/Materi') ?>">
												<div class="menu">
													<div class="card  py-1 mt-2 d-flex align-items-center mb-3">
														<img src="<?= base_url('assets/siswa/icons/materi-pem.png') ?>" alt="">
														<p class=" my-auto pt-1">Materi</p>
													</div>
												</div>
											</a>
										</div>
										<div class="section-menu col">
											<a href="<?= base_url('Siswa/tugas') ?>">
												<div class="menu">
													<div class="card py-1 mt-2 d-flex align-items-center mb-3">
														<img src="<?= base_url('assets/siswa/icons/tugas.png') ?>" alt="">
														<p class="my-auto pt-1">Tugas</p>
													</div>
												</div>
											</a>
										</div>
										<div class="section-menu col">
											<a href="<?= base_url('Siswa/Evaluasi') ?>">
												<div class="menu">
													<div class="card py-1 mt-2 d-flex align-items-center mb-3">
														<img src="<?= base_url('assets/siswa/icons/evaluasi.png') ?>" alt="">
														<p class="my-auto pt-1">Evaluasi</p>
													</div>
												</div>
											</a>
										</div>
										<div class="section-menu col">
											<a href="<?= base_url('Siswa/Diskusi') ?>">
												<div class="menu">
													<div class="card py-1 mt-2 d-flex align-items-center mb-3">
														<span class="badge-info-ds"> </span>
														<img src="<?= base_url('assets/siswa/icons/diskusi.png') ?>" alt="">
														<p class="my-auto pt-1">Diskusi</p>
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
		<?php else : ?>
			<div class="row">
				<div class="col-md-4 mb-3">
					<div class="alert-pembelajaran alert border-blue-black" role="alert">
						Tidak ada pembelajaran yang sedang berlangsung !!
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>

	<div class="jadwal-pelajaran">
		<div class="section-title mt-3">
			Jadwal Pelajaran Kelas XI TKRO 1 Semester Genap Tahun Pelajaran 2021/2022
			<hr>
		</div>

		<div class="row">
			<!-- Jadwal Harian Looping Disini -->
			<?php foreach ($days as $day) : ?>
				<div class="col-md-4 mb-3">
					<div class="card shadow p-3">
						<div class="hari">
							<div class="card d-flex align-items-center">
								<p class="text-uppercase p-3 my-auto"><?= $day ?></p>
							</div>
						</div>
						<?php $CI = &get_instance();
						$CI->load->model('JadwalModel', 'jadwal', true);
						$studying = $CI->jadwal->getJadwalHariIni([
							'hari' => $day,
							'jadwal.kelas_id' => $siswa->kelas_id
						])->result();
						?>
						<?php foreach ($studying as $study) : ?>
							<!-- Mapel -->
							<div class="jadwal">
								<div class="mapel mt-3" data-toggle="collapse" href="#collapse-<?= $study->jadwal_id ?>" role="button" aria-expanded="false" aria-controls="collapse-<?= $study->jadwal_id ?>">
									<div class="card shadow p-2">
										<div class="d-flex justify-content-lg-start">
											<img role="button" src="<?= ($study->guru_foto == 'default_profile.png') ? base_url('assets/siswa/img/perfil.png') : base_url('storage/guru/profile/' . $study->guru_foto) ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="<?= $study->guru_nama ?>">
											<div class="mapel w-100">
												<center>
													<p><?= $study->nama_mapel ?></p>
												</center>
											</div>
											<?php if (
												$study->hari == $today &&
												strtotime(date('H:i')) >= strtotime($study->jam_masuk) &&
												strtotime(date('H:i')) <= strtotime($study->jam_keluar)
											) {
												$absenOpen = 'bg-absen-open';
											} else {
												$absenOpen = 'bg-absen-close';
											} ?>
											<a href="<?= base_url('siswa/absensi/ruang_absensi/' . $this->secure->encrypt_url($study->jadwal_id)) ?>">
												<div class="absen d-block justify-content-center">
													<div class="card <?= $absenOpen ?> shadow-sm px-3 pt-3">
														<img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
														<p>Absen</p>
													</div>
												</div>
											</a>
										</div>
										<div class="ket-mapel">
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
												<p><?= $study->kode_ruang ?></p>
											</div>
										</div>

									</div>
								</div>
								<div class="features-menu collapse multi-collapse" id="collapse-<?= $study->jadwal_id ?>">
									<div class="card px-3 pt-3">
										<div class="row">
											<div class="section-menu col">
												<a href="<?= base_url('siswa/materi/ruang_materi/' . $study->kode_jadwal) ?>">
													<div class="menu">
														<div class="card  py-1 mt-2 d-flex align-items-center mb-3">
															<img src="<?= base_url('assets/siswa/icons/materi-pem.png') ?>" alt="">
															<p class="my-auto pt-1">Materi</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu col">
												<a href="<?= base_url('Siswa/tugas') ?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-3">
															<img src="<?= base_url('assets/siswa/icons/tugas.png') ?>" alt="">
															<p class="my-auto pt-1">Tugas</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu col">
												<a href="<?= base_url('Siswa/Evaluasi') ?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-3">
															<img src="<?= base_url('assets/siswa/icons/evaluasi.png') ?>" alt="">
															<p class="my-auto pt-1">Evaluasi</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu col">
												<a href="<?= base_url('Siswa/Diskusi') ?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-3">
															<span class="badge-info-ds"> </span>
															<img src="<?= base_url('assets/siswa/icons/diskusi.png') ?>" alt="">
															<p class="my-auto pt-1">Diskusi </p>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end mapel  -->
						<?php endforeach ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>

	<!--=============== PORTFOLIO ===============-->
	<!-- <section class="container section section__height" id="portfolio">
    <h2 class="section__title">Portfolio</h2>
</section> -->

	<!--=============== CONTACTME ===============-->
	<!-- <section class="container section section__height" id="contactme">
    <h2 class="section__title">Contactme</h2>
</section> -->

	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
