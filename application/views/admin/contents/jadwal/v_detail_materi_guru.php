<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title ?></h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<?php if ($this->session->userdata('level') == 'admin') : ?>
						<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/materi/materi_guru') ?>" class="text-muted">Materi</a></li>
						<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
					<?php elseif ($this->session->userdata('level') == 'kepsek') : ?>
						<li class="breadcrumb-item text-muted active">Materi Pelajaran</li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('kepala_sekolah/materi/materi_guru') ?>" class="text-muted">Data Materi (Guru)</a></li>
						<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
					<?php endif ?>
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
												<th scope="row">Kode Guru</th>
												<td><?= $materi->kode_g ?></td>
											</tr>
											<tr>
												<th scope="row" class="col-sm-8">Nama Guru</th>
												<td><?= $materi->guru ?></td>
											</tr>
											<tr>
												<th scope="row" class="col-sm-8">Kelas</th>
												<td><?= $materi->kelas ?></td>
											</tr>
											<tr>
												<th scope="row">Jurusan</th>
												<td><?= $materi->jurusan ?></td>
											</tr>
											<tr>
												<th scope="row">Mata Pelajaran</th>
												<td><?= $materi->mapel ?></td>
											</tr>
											<tr>
												<th scope="row">Dibuat</th>
												<td><?= date('d-m-Y H:i', strtotime($materi->create)) . " WIB" ?></td>
											</tr>
											<tr>
												<th scope="row">Diedit</th>
												<td><?= ($materi->create != $materi->update) ? date('d-m-Y H:i', strtotime($materi->update)) . " WIB" : '-' ?></td>
											</tr>
											<tr>
												<th scope="row">Materi Pembelajaran</th>
												<td></td>
											</tr>
											<tr class="table-borderless">
												<td class="item-pdf row">
													<?php foreach ($pdf as $val) : ?>
														<!-- looping item -->
														<div class="pdf-file ml-3">
															<?php if ($this->session->userdata('level') == 'admin') : ?>
																<a target="_blank" href="<?= base_url('master/materi/view_materi_guru/' . $val->file_materi) ?>">
																<?php elseif ($this->session->userdata('level') == 'kepsek') : ?>
																	<a target="_blank" href="<?= base_url('kepala_sekolah/materi/view_materi_guru/' . $val->file_materi) ?>">
																	<?php endif ?>
																	<div class="card card-pdf">
																		<div class="container">
																			<img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png') ?>" alt="file pdf">
																			<hr class="w-50 mx-auto">
																			<h6 class="text-center mt-n1"><?= $val->judul ?></h6>
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
													<?php foreach ($video as $row) : ?>
														<!-- looping item -->
														<div class="pdf-file ml-3">
															<div class="card card-video">
																<div class="container">
																	<iframe class="d-block mx-auto" src="<?= $row->file_materi ?>" title="<?= $row->judul ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
																	<h6 class="mt-1"><?= date('Y-m-d', strtotime($row->create_time)) ?></h6>
																	<h6 class="mt-n1"><?= $row->judul ?></h6>
																</div>
															</div>
														</div>
														<!-- looping item -->
													<?php endforeach; ?>
												</td>
											</tr>
										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<?php if ($this->session->userdata('level') == 'admin') : ?>
											<a href="<?= base_url('master/materi/materi_guru') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
										<?php elseif ($this->session->userdata('level') == 'kepsek') : ?>
											<a href="<?= base_url('kepala_sekolah/materi/materi_guru') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
										<?php endif ?>
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
