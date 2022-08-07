<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height mt-3" id="about">
	<div class="info pb-5">
		<div class="row">
			<?php if ($info) : ?>
				<?php foreach ($info as $row => $value) : ?>
					<div class="col-md-12">
						<a target="blank" href="<?= base_url('siswa/info/info_akademik/' . $value['file']) ?>">
							<div class="media mb-2">
								<i class='bx bx-info-square bx-md color-cyan mr-2'></i>
								<div class="row">
									<div class="col">
										<div class="tanggal"><?= $value['create'] ?></div>
										<div class="judul"><?= $value['judul'] ?></div>
									</div>
								</div>
							</div>
						</a>
						<hr class="mx-1">
					</div>
				<?php endforeach ?>
			<?php else : ?>
				<div class="col-md-12">
					<div class="alert alert-info" role="alert">
						<h6 class="alert-heading">Belum Ada Informasi Akademik</h6>
						<p class="mb-0">Informasi akademik belum tersedia untuk saat ini</p>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
