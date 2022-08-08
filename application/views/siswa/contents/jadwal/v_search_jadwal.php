<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_jadwal.php'; ?>

<!-- style btn scroll to top -->
<style>
	#btn-back-to-top {
		position: fixed;
		bottom: 80px;
		right: 20px;
		display: none;
		background-color: white;
		border: 1px solid #2989A8;
		border-radius: 50%;
		width: 40px;
		height: 40px;

	}

	#btn-back-to-top:hover {
		background-color: darkcyan;
	}
</style>

<!-- Jquery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<section class="container section section__height">

	<div class="search-box d-flex justify-content-end">
		<form action="<?= site_url('siswa/jadwal') ?>" method="get">
			<input type="text" id="cari_jadwal" name="search" class="search-click" name="" placeholder="🔍 Cari ..." />
		</form>
	</div>
	<div class="jadwal-pelajaran">
		<div class="row">
			<?php if ($jadwal) : ?>
				<!-- TRUE -->
				<?php foreach ($jadwal as $row) : ?>
					<div class="col-md-4 mb-3">
						<div class="card shadow p-3" id="jadwalPel">
							<div class="hari">
								<div class="card d-flex align-items-center">
									<p class="text-uppercase p-3 my-auto"><?= $row->hari ?></p>
								</div>
							</div>
							<div class="jadwal">
								<div class="mapel mt-3" data-toggle="collapse" href="#collapse-<?= $row->jadwal_id ?>" role="button" aria-expanded="false" aria-controls="collapse-<?= $row->jadwal_id ?>">
									<div class="card shadow p-2">
										<div class="d-flex justify-content-lg-start">
											<img role="button" src="<?= ($row->profile == 'default_profile.png') ? base_url('assets/siswa/img/profile.png') : base_url('storage/guru/profile/' . $row->profile) ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="<?= $row->guru_nama ?>">
											<div class="mapel w-100">
												<center>
													<p id="mapel"><?= $row->nama_mapel ?></p>
												</center>
											</div>
											<?php if (
												$row->hari == $today &&
												strtotime(date('H:i')) >= strtotime($row->jam_masuk) &&
												strtotime(date('H:i')) <= strtotime($row->jam_keluar)
											) {
												$absenOpen = 'bg-absen-open';
											} else {
												$absenOpen = 'bg-absen-close';
											} ?>
											<a href="<?= base_url('siswa/absensi/ruang_absensi/' . $this->secure->encrypt_url($row->jadwal_id)) ?>">
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
												<p><?= $row->guru_kode ?></p>
											</div>
											<div class="d-flex justify-content-start">
												<img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
												<p><?= date('H:i', strtotime($row->jam_masuk)) . ' - ' . date('H:i', strtotime($row->jam_keluar)) ?>
												</p>
											</div>
											<div class="d-flex justify-content-start">
												<img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
												<p><?= $row->kode_ruang ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="features-menu collapse multi-collapse" id="collapse-<?= $row->jadwal_id ?>">
									<div class="card px-3 pt-3">
										<div class="row">
											<div class="section-menu col">
												<a href="<?= base_url('siswa/materi/ruang_materi/' . $this->secure->encrypt_url($row->jadwal_id)) ?>">
													<div class="menu">
														<div class="card  py-1 mt-2 d-flex align-items-center mb-3">
															<img src="<?= base_url('assets/siswa/icons/materi-pem.png') ?>" alt="">
															<p class="my-auto pt-1">Materi</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu col">
												<a href="<?= base_url('siswa/ruang_tugas/tugas_harian/' . $this->secure->encrypt_url($row->jadwal_id)) ?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-3">
															<img src="<?= base_url('assets/siswa/icons/tugas.png') ?>" alt="">
															<p class="my-auto pt-1">Tugas</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu col">
												<a href="<?= base_url('siswa/evaluasi/' . $this->secure->encrypt_url($row->jadwal_id)) ?>">
													<div class="menu">
														<div class="card py-1 mt-2 d-flex align-items-center mb-3">
															<img src="<?= base_url('assets/siswa/icons/evaluasi.png') ?>" alt="">
															<p class="my-auto pt-1">Evaluasi</p>
														</div>
													</div>
												</a>
											</div>
											<div class="section-menu col">
												<a href="<?= base_url('siswa/diskusi/ruang_diskusi/' . $this->secure->encrypt_url($row->jadwal_id)) ?>">
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
						</div>
					</div>
				<?php endforeach ?>
			<?php else : ?>
				<!-- FALSE -->
				<div class="row">
					<div class="col-md-12 mb-3">
						<div class="alert-pembelajaran alert border-blue-black" role="alert">
							Mata Pelajaran tidak ditemukan!
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
</section>
