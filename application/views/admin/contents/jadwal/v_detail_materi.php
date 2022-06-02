<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Detail Jadwal</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/materi') ?>" class="text-muted">Jadwal</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Detail Jadwal</li>
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
	<div class="container-fluid mt-n4">
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
			<div class="col-12">
				<div class="mt-4 activity">
					<div class="profile">
						<div class="row">
							<div class="col-md-12">
								<div class="card shadow px-3">
									<table class="table">
										<tbody>
											<tr class="table-borderless">
												<th scope="row" class="col-sm-8">Kelas</th>
												<td><?= $detailMateri->index_kelas ?></td>
											</tr>
											<tr>
												<th scope="row">Jurusan</th>
												<td><?= (!empty($detailMateri->nama_jurusan)) ? $detailMateri->nama_jurusan : '-' ?></td>
											</tr>
											<tr>
												<th scope="row">Mata Pelajaran</th>
												<td><?= $detailMateri->nama_mapel ?></td>
											</tr>
											<tr>
												<th scope="row">Dibuat</th>
												<td><?= date('Y-m-d H:i:s', strtotime($detailMateri->create_time)) . " WIB" ?></td>
											</tr>
											<tr>
												<th scope="row">Diedit</th>
												<td><?= ($detailMateri->create_time == $detailMateri->update_time) ? '-' : date('Y-m-d H:i:s', strtotime($detailMateri->update_time)) . " WIB" ?></td>
											</tr>
											<tr>
												<th scope="row">Materi Pembelajaran</th>
												<td></td>
											</tr>
											<tr class="table-borderless">
												<td class="item-pdf row">
													<?php foreach ($bahanMateri as $materi) : ?>
														<!-- looping item -->
														<div class="pdf-file ml-3">
															<a href="">
																<div class="card card-pdf">
																	<div class="container">
																		<img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png') ?>" alt="file pdf">
																		<hr class="w-50 mx-auto">
																		<h6 class="text-center mt-n1"><?= $materi->judul ?></h6>
																	</div>
																</div>
															</a>
														</div>
														<!-- looping item -->
													<?php endforeach ?>
												</td>
											</tr>
											<tr>
												<th scope="row">Video Pembelajaran</th>
												<td></td>
											</tr>
											<tr class="table-borderless">
												<td class="item-video row">
													<!-- looping item -->
													<?php foreach ($videoMateri as $video) : ?>
														<div class="pdf-file ml-3">
															<div class="card card-video">
																<div class="container">
																	<iframe class="d-block mx-auto" src="<?= $video->materi ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
																	<h6 class="mt-1"><?= date('Y-m-d', strtotime($detailMateri->create_time)) ?></h6>
																	<h6 class="mt-n1"><?= $video->judul ?></h6>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
												</td>
											</tr>
										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<a href="<?= base_url('Admin/Jadwal/Materi') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
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
