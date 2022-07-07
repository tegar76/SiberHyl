<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

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
	</div>
	<div class="container-fluid">

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

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Pembelajaran yang sedang Berlangsung						
						</h6>
						<div class="mt-4 activity">
							<table id="pembelajaran_berlangsung" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 4%;">No</th>
										<th style="width: 6%;">Hari</th>
										<th style="width: 8%;">Kode Guru</th>
										<th style="width: 17%;">Mapel</th>
										<th style="width: 10%;">Jam Pelajaran</th>
										<th style="width: 8%;">Kelas</th>
										<th style="width: 6%;">Ruang</th>
										<th style="width: 12%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td>1</td>
											<td>Senin</td>
											<td>AZ</td>
											<td>Bahasa Inggris</td>
											<td>07.00 - 09.00 WIB</td>
											<td>XI TKRO 1</td>
											<td>4</td>
											<!-- Redirect ke filter kelas yang dituju -->
											<td><a href="<?= base_url('KepalaSekolah/SuperVisor')?>" class="btn btn-sm btn-outline-primary text-cyan rounded w-100">Kunjungi Kelas</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Senin</td>
											<td>AZ</td>
											<td>Bahasa Inggris</td>
											<td>07.00 - 09.00 WIB</td>
											<td>XI TKRO 1</td>
											<td>4</td>
											<td><a  class="btn btn-sm btn-outline-warning text-warning rounded w-100">Sudah Dikunjungi</a></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

