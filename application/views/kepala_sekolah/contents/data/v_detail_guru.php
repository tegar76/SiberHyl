<!-- import style -->

<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title?></h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Data Master</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/Data/dataGuru') ?>" class="text-muted">Data Guru</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title?></li>
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
							<div class="col-md-3 text-center mb-3">
								<div class="card shadow py-4">
									<div class="img-photo justify-content-center">
										<img class="mx-auto d-block rounded-circle" src="<?= base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<div class="card shadow px-3">
									<table class="table">
										<tbody>
											<tr class="table-borderless">
												<th scope="row" class="table-title">Profile</th>
											</tr>
											<tr class="table-borderless">
												<th scope="row">Kode Guru</th>
												<td class="col-md-3">AZ</td>
											</tr>
											<tr>
												<th scope="row">NIP/NUPTK</th>
												<td>567345637432358431</td>
											</tr>
											<tr>
												<th scope="row">Nama</th>
												<td>Sulton Akbar Pamungkas, S. Pd.</td>
											</tr>
											<tr>
												<th scope="row">Username</th>
												<td>Loremip</td>
											</tr>

											<tr class="table-borderless">
												<th scope="row" class="table-title">Pembagian Tugas Mengajar Semester </th>
												<!-- <td></td> -->
											</tr>
											<tr>
												<th scope="row">
													<table class="table-responsive table-bordered" style="width:200%">
														<thead>
															<tr>
																<th>No</th>
																<th>Mata pelajaran</th>
																<th>Kompetensi keahlian</th>
																<th>Jumlah Rom</th>
																<th>Jumlah Jam</th>
																<th>Jumlah</th>
															</tr>
														</thead>
															<tbody>
																<tr>
																	<td>1</td>
																	<td>Pemeliharaan Kelistrikan Kendaraan Ringan</td>
																	<td>
																		XI TKRO 1
																	</td>
																	<td>4</td>
																	<td>5</td>
																	<td>7</td>
																</tr>			

															</tbody>
															<tfoot>
																<tr>
																	<th colspan="5" class="text-center">Total Jam Mengajar</th>
																	<td></td>
																</tr>
															</tfoot>
													</table>
												</th>
												<td></td>
											</tr>

										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<a href="<?= base_url('KepalaSekolah/Data/dataGuru') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3 text-white">Kembali</a>
									</div>
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
