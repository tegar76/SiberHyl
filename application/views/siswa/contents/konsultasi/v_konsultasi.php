<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">
	<div class="col-md-12 mb-4 mt-2 p-0 pb-3">
		<div class="title">
			Konsultasi
		</div>
		<div class="sub-title mb-3">
			Diskusi 2 (dua) arah antara siswa dengan Wali kelas maupun wali kelas dengan siswa
		</div>
		<div class="atribute">
			<h6>Info Wali Kelas Dari Kelas <?= $wali->kelas ?></h6>
			<p class="mt-n1">Kode : <?= $wali->kode ?></p>
			<p class="mt-n3">Nama : <?= $wali->wali ?></p>
		</div>
		<?php if ($forum) : ?>
			<!-- TRUE -->
			<?php foreach ($forum as $row) : ?>
				<!-- looping komentar -->
				<div class="card shadow border-top border-left border-right border-bottom h-100 py-2 p-0 mb-3">
					<div class="card-body">
						<section>
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="row">
										<a href="<?= base_url('siswa/konsultasi/detail_konsultasi/' . $this->secure->encrypt_url($row['id'])) ?>" class="ml-3 mt-n2">
											<div class="card comment p-1 border border-custom-blue rounded">
												<div class="row no-gutters align-items-center">
													<div class="col">
														<div class="text-xs ml-2">
															Komentar
															<button class="border-0 rounded ml-1 mr-2 px-2"><?= $row['reply'] ?></button>
															<!-- <span class="badge-info-ds"></span> -->
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="subjek mt-3 mb-2"><?= $row['title'] ?></div>
									<div class="pesan"><?= $row['desc'] ?></div>
								</div>
							</div>
						</section>
						<section class="mt-3">
							<div class="row no-gutters align-items-center">
								<div class="col-md-12 mr-2 ml-3">
									<div class="row" id="btnInfo">
										<div class="card p-1 rounded mr-2 mb-2 border border-custom-blue">
											<div class="row no-gutters align-items-center">
												<div class="col">
													<div class="nama mx-2">
														<i class="fa fa-user mr-1"></i>
														<?= $row['author'] ?>
													</div>
												</div>
											</div>
										</div>
										<div class="card p-1 rounded mr-2 mb-2 border border-custom-blue">
											<div class="row no-gutters align-items-center">
												<div class="col">
													<div class="tanggal mx-2">
														<i class="fa fa-calendar mr-1"></i>
														<?= date('d-m-Y H:i', strtotime($row['create'])) . " WIB" ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			<?php endforeach ?>
		<?php else : ?>
			<!-- FALSE -->
			<div class="alert alert-info" role="alert">
				<h6 class="alert-heading">Belum Ada Forum Konsultasi</h6>
				<hr>
				<p class="mb-0">Silahkan buat forum konsultasi baru dengan klik tombol tambah konsultasi</p>
			</div>
		<?php endif ?>
	</div>

	<!-- floating add -->
	<div class="floating-container">
		<a href="<?= base_url('siswa/konsultasi/konsultasi_baru') ?>">
			<div class="floating-button">+</div>
		</a>
	</div>
