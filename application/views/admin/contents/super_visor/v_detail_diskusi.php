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
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor') ?>" class="text-muted">Super Visor</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor?kelas=' . $jadwal->kode_kelas) ?>" class="text-muted"><?= $jadwal->nama_kelas ?></a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/super-visor/diskusi/' . $jadwal->jadwal_id) ?>" class="text-muted">Diskusi</a></li>
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
			<div class="col-12 p-0">
				<div class="container">
					<!-- looping komentar -->
					<div class="card shadow border-top border-left border-right border-bottom h-100 py-2 p-0 mb-3">
						<div class="card-body">
							<section>
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="row">
											<div class="card p-1 rounded mr-2 mb-2 ml-3 mt-n2 border border-custom-blue">
												<div class="row no-gutters align-items-center">
													<div class="col">
														<div class="nama-big mx-2">
															<i class="fa fa-user mr-1"></i>
															<?= $diskusi->pembuat ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="subjek mt-3 mb-2"><?= $diskusi->judul ?></div>
										<div class="pesan mb-3"><?= $diskusi->deskripsi ?></div>
										<hr class="mt-4">
										<input type="hidden" name="id_forum" id="id_forum" value="<?= $diskusi->forum_id ?>">
										<div class="jml-komen mt-3 mb-2">
											Komentar <span><?= count($reply) ?></span>
										</div>
										<div id="display_forum">

										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
