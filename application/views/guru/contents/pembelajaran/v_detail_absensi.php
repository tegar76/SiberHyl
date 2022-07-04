<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title .' Kelas XI TKRO 1'?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Pembelajaran</li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/mengajar') ?>" class="text-muted">Mengajar</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/absensi') ?>" class="text-muted">Absensi</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title?></li>
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

		<div class="card-group">
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2>0</h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Hadir</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-success px-2">
									H
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2>0</h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Alpa (Tanpa Keterangan)
							</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-danger px-2">
									A
								</div>
							</span>
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
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Izin</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-blue px-2">
									I
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2>0</h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Sakit</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-white">
								<div class="card bg-warning px-2">
									S
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<a href="<?= base_url('Guru/Pembelajaran/tambahJurnalMateri')?>" class="btn btn-primary bg-blue border-0 rounded mb-3">
					<i class="fa fa-plus"></i> Jurnal Materi
				</a>
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Settings Jam Absen 
						</h6>
						<div class="mt-4 activity">
							<table class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:8%;">Hari</th>
										<th style="width:20%;">Mapel</th>
										<th style="width:12%;">Jam Pelajaran</th>
										<th style="width:12%;">Ruang</th>
										<th style="width:12%;">Pertemuan Ke-</th>
										<th style="width:10%;">Tanggal</th>
										<th style="width:10%;">Mulai</th>
										<th style="width:10%;">Selesai</th>
										<th style="width:4%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Senin</td>
										<td>Panel Sasis dan Pemindahan Tenaga KR</td>
										<td>07.00 - 13.00</td>
										<td>MM 1</td>
										<td>1</td>
										<td>01 - 05 - 2022</td>
										<td>-</td>
										<td>-</td>
										<td>
											<a href="<?= base_url('Guru/Pembelajaran/editJamAbsen')?>" class="btn btn-sm btn-success border-0 rounded"><i class="fa fa-edit text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Data  Siswa  Semester Gasal Tahun Pelajaran 2021/2022    
						</h6>
						<div class="mt-4 activity">
							<table id="data_siswa" class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:8%;">NIS</th>
										<th style="width:20%;">Nama</th>
										<th style="width:12%;">Jenis Kelamin</th>
										<th style="width:12%;">Status Kesiswaan</th>
										<th style="width:12%;">Pembelajaran</th>
										<th style="width:10%;">Bukti</th>
										<th style="width:6%;">Status</th>
										<th style="width:4%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>2010049</td>
										<td>ADIT PRAYITNO</td>
										<td>Laki - laki</td>
										<td>Aktif</td>
										<td>-</td>
										<td>-</td>
										<td>A</td>
										<td>
											<a href="<?= base_url('Guru/Pembelajaran/editStatusAbsen')?>" class="btn btn-sm btn-success border-0 rounded"><i class="fa fa-edit text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
										</td>
									</tr>
									<!-- Tampil Semua Siswa -->
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
