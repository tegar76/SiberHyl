<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title . ' Kelas ' . $info->nama_kelas ?></h3>
				<h5 class="page-title opacity-7">Panel Sasis Dan Pemindahan Tenaga KR</h5>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Pembelajaran</li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran') ?>" class="text-muted">Mengajar</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?> </li>
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
					<?php if (empty($forum)) : ?>
						<!-- TRUE -->
					<?php else : ?>
						<?php foreach ($forum as $row => $value) : ?>
							<div class="card shadow border-top border-left border-right border-bottom h-100 py-2 p-0 mb-3">
								<div class="card-body">
									<section>
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="row">
													<a href="<?= base_url('guru/pembelajaran/forum_diskusi/' . $value['id']) ?>" class="ml-3 mt-n2">
														<div class="card comment p-1 border border-custom-blue rounded">
															<div class="row no-gutters align-items-center">
																<div class="col">
																	<div class="text-xs ml-2">
																		Komentar
																		<button class="border-0 rounded ml-1 mr-2 px-2 bg-blue"><?= $value['reply'] ?></button>
																		<!-- <span class="badge-info-ds-content"></span> -->
																	</div>
																</div>
															</div>
														</div>
													</a>
												</div>
												<div class="subjek mt-n2 mb-2"><?= $value['title'] ?></div>
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
				</div>
			</div>
		</div>

		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>


	<div class="floating-container">
		<a href="<?= base_url('guru/pembelajaran/tambah_forum_diskusi/' . $info->jadwal_id) ?>">
			<div class="floating-button">+</div>
		</a>
	</div>
