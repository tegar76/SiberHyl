<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">
	<div class="col-md-12 mb-4 mt-2 p-0 pb-3">
		<div class="title">
			Diskusi
		</div>
		<div class="sub-title mb-4">
			<?= $info->nama_mapel . ' - ' . $info->nama_kelas ?>
		</div>
		<!-- looping komentar -->
		<?php if (empty($forum)) : ?>
			<!-- TRUE -->
		<?php else : ?>
			<?php foreach ($forum as $row => $value) : ?>
				<!-- looping komentar -->
				<div class="card shadow border-top border-left border-right border-bottom h-100 py-2 p-0 mb-3">
					<div class="card-body">
						<section>
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="row">
										<a href="<?= base_url('siswa/diskusi/forum_diskusi/' . $this->secure->encrypt_url($value['id'])) ?>" class="ml-3 mt-n2">
											<div class="card comment p-1 border border-custom-blue rounded">
												<div class="row no-gutters align-items-center">
													<div class="col">
														<div class="text-xs ml-2">
															Komentar
															<button class="border-0 rounded ml-1 mr-2 px-2"><?= $value['reply'] ?></button>
															<!-- <span class="badge-info-ds"></span> -->
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="subjek mt-3 mb-2"><?= $value['title'] ?></div>
									<div class="pesan"><?= $value['desc'] ?></div>
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
														<?= $value['author'] ?>
													</div>
												</div>
											</div>
										</div>
										<div class="card p-1 rounded mr-2 mb-2 border border-custom-blue">
											<div class="row no-gutters align-items-center">
												<div class="col">
													<div class="tanggal mx-2">
														<i class="fa fa-calendar mr-1"></i>
														<?= $value['create'] ?>
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
		<?php endif ?>

		<!-- <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Belum Ada Forum Diskusi</h4>
        <hr>
        <p class="mb-0">Silahkan buat forum diskusi baru dengan klik tombol tambah diskusi</p>
    </div> -->
	</div>

	<!-- floating add -->
	<div class="floating-container">
		<a href="<?= base_url('siswa/diskusi/tambah_diskusi/' . $this->secure->encrypt_url($info->jadwal_id)) ?>">
			<div class="floating-button">+</div>
		</a>
	</div>
