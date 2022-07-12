<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Dashboard</h3>
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
		<div class="card-group">
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $teacherRow ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Guru</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-person-chalkboard fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $classRow ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Wali Kelas
							</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-chalkboard-user fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $studentRow ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Siswa</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-graduation-cap fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $classRow ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Kelas</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-door-open fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Start Location and Earnings Charts Section -->
		<!-- *************************************************************** -->
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							<a class="search-icon" href="<?= base_url('master/info/info-akademik') ?>"><i class="fa fa-magnifying-glass mr-2"></i></a>
							Info Akademik Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="table-info-akademik" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id info ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 10%">No</th>
										<th style="width: 25%">Tanggal</th>
										<th style="width: 55%">Judul</th>
										<th style="width: 10%">File</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($info_akademik as $info ) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= date('d-m-Y H:i', strtotime($info->create_time)) ?></td>
											<td><?= $info->judul_info ?></td>
											<td><a target="_blank" href="<?= base_url('master/info/detail_info_akademik/' . $info->file_info) ?>"><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Pesan Aduan</h6>
						<div class="mt-4 activity">
							<div class="table-responsive">
								<table id="table-pesan-aduan" class=" table-striped table-bordered" style="width: 100%;">
									<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
									<thead>
										<tr>
											<th style="width: 20px;">No</th>
											<th style="width: 70px;">Nama</th>
											<th style="width: 100px;">Subjek</th>
											<th style="width: 70px;">Email</th>
											<th style="width: 100px;">No Hp</th>
											<th style="width: 150px;">Pesan</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($pesan as $row => $value) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->full_name ?></td>
												<td><?= $value->subject ?></td>
												<td><?= $value->email ?></td>
												<td><?= $value->phone ?></td>
												<td><?= $value->message ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Location and Earnings Charts Section -->
		<!-- *************************************************************** -->
		<!-- *************************************************************** -->
		<!-- Start Top Leader Table -->
		<!-- *************************************************************** -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							<a class="search-icon" href="<?= base_url('master/jurnal') ?>"><i class="fa fa-magnifying-glass mr-2"></i></a>
							Pembelajaran Yang Sedang Berlangsung
						</h6>
						<div class="mt-4 activity">
							<table id="table-jurnal" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 4%;">No</th>
										<th style="width: 6%;">Hari</th>
										<th style="width: 8%;">Kode Guru</th>
										<th style="width: 16%;">Mapel</th>
										<th style="width: 12%;">Jam Pelajaran</th>
										<th style="width: 6%;">Kelas</th>
										<th style="width: 6%;">Ruang</th>
										<th style="width: 12%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td>1</td>
											<td>Senin</td>
											<td>AB</td>
											<td>Bahasa Inggris</td>
											<td>07.00 - 09.00 WIB</td>
											<td>XI TKRO 2</td>
											<td>MM 1</td>
											<td><a href="" class="d-block btn btn-sm btn-outline-primary border-blue rounded mx-auto">Kunjungi Kelas</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Senin</td>
											<td>AB</td>
											<td>Bahasa Inggris</td>
											<td>07.00 - 09.00 WIB</td>
											<td>XI TKRO 2</td>
											<td>MM 1</td>
											<td><a href="" class="d-block btn btn-sm btn-outline-warning border-yellow rounded mx-auto">Sudah Dikunjungi</a></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>

