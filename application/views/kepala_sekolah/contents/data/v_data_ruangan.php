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
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted ">Master Data</li>
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
						<h6 class="card-title">
							Data Ruang Kelas Semester Gasal Tahun Pelajaran 2021/2022     
						</h6>
						<div class="mt-4 activity">
							<table id="data-ruangan" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:2%">No</th>
										<th style="width:8%;">Kode Ruangan</th>
										<th style="width:20%;">Keterangan</th>
										<th style="width:12%;">Dibuat</th>
										<th style="width:12%;">Diedit</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>MM 1</td>
										<td>-</td>
										<td>01 - 05 - 2022 07 : 00 WIB </td>
										<td>01 - 05 - 2022 07 : 00 WIB </td>
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
