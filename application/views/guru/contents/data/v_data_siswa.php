<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Data Siswa</h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted ">Master Data</li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Data Siswa</li>
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
			<div class="form-group col-md-4">
				<div class="input-group mb-2">
					<select id="change-kelas" class="form-control">
						<option value="">Pilih Kelas</option>
						<option value="">XI TKR0 1</option>
						<option value="">XI MM 1</option>
					</select>
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-filter"></i></div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Data  Siswa  Semester Gasal Tahun Pelajaran 2021/2022   
						</h6>
						<div class="sub-title">
							<div class="info">
								<p>Kode Guru : <span class="ml-2">AZ</span></p>
								<p>Nama :  <span class="ml-2">Sulton Akbar Pamungkas, S. Pd.</span></p>
							</div>
						</div>
						<div class="mt-4 activity">
							<table id="data-siswa" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:8%;">NIS</th>
										<th style="width:10%;">NISN</th>
										<th style="width:22%;">Nama</th>
										<th style="width:12%;">Jenis Kelamin</th>
										<th style="width:10%;">Asal Kelas</th>
										<th style="width:10%;">Status</th>
										<th style="width:10%;">Keterangan</th>
										<th style="width:6%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>2010049</td>
										<td>0041944023</td>
										<td>ADIT PRAYITNO</td>
										<td>Laki - laki</td>
										<td>X TO 2</td>
										<td>Tidak Aktif</td>
										<td class="text-danger">Offline</td>
										<td>
											<a href="<?= base_url('Guru/Data/detailSiswa')?>" class="btn btn-sm btn-primary bg-blue border-0 rounded"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>2010049</td>
										<td>0041944023</td>
										<td>ADIT PRAYITNO</td>
										<td>Laki - laki</td>
										<td>X TO 2</td>
										<td>Aktif</td>
										<td class="text-success">Online</td>
										<td>
											<a href="<?= base_url('Guru/Data/detailSiswa')?>" class="btn btn-sm btn-primary bg-blue border-0  rounded"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
										</td>
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

	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
