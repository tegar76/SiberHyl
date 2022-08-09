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
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="info">
							<div class="row">
								<?php if ($infoAkademik) : ?>
									<!-- TRUE -->
									<?php foreach ($infoAkademik as $row => $value) : ?>
										<div class="col-md-12">
											<a target="blank" href="<?= base_url('wali-kelas/info_akademik/file_view/' . $value->slug) ?>">
												<div class="media mb-2">
													<i class='bx bx-info-square bx-md color-cyan mr-2'></i>
													<div class="row">
														<div class="col">
															<div class="tanggal"><?= date('d-m-Y H:i', strtotime($value->create)) ?> WIB</div>
															<div class="judul"><?= $value->judul ?></div>
														</div>
													</div>
												</div>
											</a>
											<hr class="mx-1">
										</div>
									<?php endforeach ?>
								<?php else : ?>
									<!-- FALSE -->
									<div class="col-md-12">
										<div class="alert alert-info" role="alert">
											<h6 class="alert-heading">Belum Ada Informasi Akademik</h6>
											<p class="mb-0">Informasi akademik belum tersedia untuk saat ini</p>
										</div>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
