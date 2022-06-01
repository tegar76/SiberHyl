<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/js/data-table/mainnnn.js') ?>"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table-custom/stylessss.css') ?>">
<!-- End Data Tables -->

<link rel="stylesheet" href="<?= base_url('assets/admin/css/dashboard/style.css') ?>">


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
							<a class="search-icon" href=""><i class="fa fa-magnifying-glass mr-2"></i></a>
							Info Akademik Tahun Pelajaran 2021/2022
						</h6>
						<div class="mt-4 activity">
							<table id="info" class="table-striped table-bordered" style="width:100%">
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
									<tr>
										<td>1</td>
										<td>06 - 05 -2022 13:25 WIB</td>
										<td>Lorem Ipsum is simply dummy text of the printing </td>
										<td><a href=""><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a></td>
									</tr>
									<tr>
										<td>2</td>
										<td>06 - 05 -2022 13:25 WIB</td>
										<td>Lorem Ipsum is simply dummy text of the printing </td>
										<td><a href=""><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a></td>
									</tr>
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
								<table id="pesan" class=" table-striped table-bordered" style="width: 100%;">
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
										<tr>
											<td>1</td>
											<td>Jason</td>
											<td>lorem20</td>
											<td>jason@gmail.com</td>
											<td>082456726256</td>
											<td>pariatur veritatis cum sunt excepturi nam?</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Amir</td>
											<td>Saran</td>
											<td>mir32@gmail.com</td>
											<td>082456726256</td>
											<td>pariatur veritatis cum sunt excepturi nam?</td>
										</tr>
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
							<a class="search-icon" href=""><i class="fa fa-magnifying-glass mr-2"></i></a>
							Jurnal Materi Tahun Pelajaran 2021/2022
						</h6>
						<div class="mt-4 activity">
							<table id="jurnal" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 6%;">No</th>
										<th style="width: 10%;">Hari</th>
										<th style="width: 12%;">Tanggal</th>
										<th style="width: 12%;">Kode Guru</th>
										<th style="width: 12%;">Mapel</th>
										<th style="width: 10%;">Kelas</th>
										<th style="width: 12%;">Pertemuan ke-</th>
										<th style="width: 20%;">Pembahasan</th>
										<th style="width: 14%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Senin</td>
										<td>10 - 05 - 2022 08 : 50 WIB</td>
										<td>AB</td>
										<td>Bahasa Inggris</td>
										<td>XI TKRO 1</td>
										<td>1</td>
										<td>now use Lorem Ipsum as their default a search for 'lorem ipsum' will uncover still in their infancy Various versions </td>
										<td><a id="id_bdt" href="" class="btn btn-sm btn-outline-danger btn-rounded-sm text-danger">Belum Dilihat</a></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Selasa</td>
										<td>09 - 05 - 2022 12 : 50 WIB </td>
										<td>AZ</td>
										<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
										<td>XI TKRO 1</td>
										<td>1</td>
										<td>now use Lorem Ipsum as their default a search for 'lorem ipsum' will uncover still in their infancy Various versions </td>
										<td><a id="id_sdt" href="" class="btn btn-sm btn-outline-success text-success">Sudah dilihat</a></td>
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
	=======
	<link rel="stylesheet" href="<?= base_url('assets/admin/css/dashboard/style.css') ?>">

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
									<h2>0</h2>
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
								<h2>0</h2>
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
									<h2>0</h2>
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
								<h2>0</h2>
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
								<a class="search-icon" href="<?= base_url('Admin/Info/infoAkademik') ?>"><i class="fa fa-magnifying-glass mr-2"></i></a>
								Info Akademik Tahun Pelajaran 2021/2022
							</h6>
							<div class="mt-4 activity">
								<table id="info" class="table-striped table-bordered" style="width:100%">
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
										<tr>
											<td>1</td>
											<td>06 - 05 -2022 13:25 WIB</td>
											<td>Lorem Ipsum is simply dummy text of the printing </td>
											<td><a target="_blank" href="<?= base_url('Admin/Info/infoAkademikPdf') ?>"><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>06 - 05 -2022 13:25 WIB</td>
											<td>Lorem Ipsum is simply dummy text of the printing </td>
											<td><a target="_blank" href="<?= base_url('Admin/Info/infoAkademikPdf') ?>"><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a></td>
										</tr>
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
									<table id="pesan" class=" table-striped table-bordered" style="width: 100%;">
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
											<tr>
												<td>1</td>
												<td>Jason</td>
												<td>lorem20</td>
												<td>jason@gmail.com</td>
												<td>082456726256</td>
												<td>pariatur veritatis cum sunt excepturi nam?</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Amir</td>
												<td>Saran</td>
												<td>mir32@gmail.com</td>
												<td>082456726256</td>
												<td>pariatur veritatis cum sunt excepturi nam?</td>
											</tr>
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
								<a class="search-icon" href="<?= base_url('Admin/JurnalMateri') ?>"><i class="fa fa-magnifying-glass mr-2"></i></a>
								Jurnal Materi Tahun Pelajaran 2021/2022
							</h6>
							<div class="mt-4 activity">
								<table id="jurnal" class="table-striped table-bordered" style="width:100%">
									<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
									<thead>
										<tr>
											<th style="width: 6%;">No</th>
											<th style="width: 10%;">Hari</th>
											<th style="width: 12%;">Tanggal</th>
											<th style="width: 12%;">Kode Guru</th>
											<th style="width: 12%;">Mapel</th>
											<th style="width: 10%;">Kelas</th>
											<th style="width: 12%;">Pertemuan ke-</th>
											<th style="width: 20%;">Pembahasan</th>
											<th style="width: 14%;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Senin</td>
											<td>10 - 05 - 2022 08 : 50 WIB</td>
											<td>AB</td>
											<td>Bahasa Inggris</td>
											<td>XI TKRO 1</td>
											<td>1</td>
											<td>now use Lorem Ipsum as their default a search for 'lorem ipsum' will uncover still in their infancy Various versions </td>
											<td><a id="id_bdt" href="<?= base_url('Admin/JurnalMateri/detailJurnalMateri') ?>" class="btn btn-sm btn-outline-danger btn-rounded-sm text-danger">Belum Dilihat</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Selasa</td>
											<td>09 - 05 - 2022 12 : 50 WIB </td>
											<td>AZ</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>XI TKRO 1</td>
											<td>1</td>
											<td>now use Lorem Ipsum as their default a search for 'lorem ipsum' will uncover still in their infancy Various versions </td>
											<td><a id="id_sdt" href="<?= base_url('Admin/JurnalMateri/detailJurnalMateri') ?>" class="btn btn-sm btn-outline-success text-success">Sudah dilihat</a></td>
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
		>>>>>>> origin/master
