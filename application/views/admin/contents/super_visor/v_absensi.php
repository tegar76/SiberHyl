<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/guru/css/import_style.php';?>

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
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/SuperVisor') ?>" class="text-muted">Super Visor</a></li>
							<!-- arahkan ke filter kelas sesuai yng diklik misal kelas XI TKRO 1 -->
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/SuperVisor') ?>" class="text-muted">XI TKRO 1</a></li>
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

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<a href="<?= base_url('Admin/SuperVisor/formCetakReportAbsensi')?>">
							<div class="card mb-3 py-1 px-2 card-reporting">
								<div class="container">
									<div class="row">
										<i class='bx bx-receipt bx-xs mr-1 text-white icon-reporting' ></i>
										<div class="table-title text-white">Reporting</div>
									</div>
								</div>
							</div>
						</a>
						<h6 class="card-title">
							Data Absensi Kelas XITKRO 1 Semester Gasal Tahun Pelajaran 2021/2022    
						</h6>
						<div class="mt-4 activity">
							<table id="absensi" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/Data-table/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:8%;">Hari</th>
										<th style="width:20%;">Mapel</th>
										<th style="width:12%;">Jam Pelajaran</th>
										<th style="width:12%;">Ruang</th>
										<th style="width:12%;">Pertemuan Ke-</th>
										<th style="width:10%;">Tanggal</th>
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
										<td>
											<a href="<?= base_url('Admin/SuperVisor/detailAbsensi')?>" class="btn btn-sm btn-success border-0 rounded"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
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
