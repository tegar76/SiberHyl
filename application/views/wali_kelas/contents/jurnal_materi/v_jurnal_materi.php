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
				<h3 class="page-title"><?= $title?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Dashboard</li>
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
							<span><a href=""><i class="fa fa-search mr-2"></i></a></span>
							Jurnal Materi  Semester Gasal Tahun Pelajaran 2021/2022  
						</h6>
						<div class="mt-4 activity">
							<table id="jurnal-materi" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:2%">No</th>
										<th style="width: 13%;">Hari, tanggal</th>
										<th style="width:8%;">Kode Guru</th>
										<th style="width:15%;">Mapel</th>
										<th style="width:8%;">Kelas</th>
										<th style="width:10%;">Pertemuan Ke- </th>
										<th style="width:20%;">Pembahasan</th>
										<th style="width:12%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Senin, 22 - 05 -2022</td>
										<td>AZ</td>
										<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
										<td>XI TKRO 1</td>
										<td>1</td>
										<td>now use Lorem Ipsum default  a search for ipsum' will uncover  their infancy</td>
										<td><a id="id_bdt" href="<?= base_url('WaliKelas/JurnalMateri/detailJurnalMateri')?>"  class="btn btn-sm detail-jurnal btn-outline-danger text-danger btn-rounded-sm">Belum Dilihat</a></td>
									</tr>
									<tr>
										<td>1</td>
										<td>Senin, 22 - 05 -2022</td>
										<td>AZ</td>
										<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
										<td>XI TKRO 1</td>
										<td>1</td>
										<td>now use Lorem Ipsum default  a search for ipsum' will uncover  their infancy</td>
										<td><a id="id_bdt" href="<?= base_url('WaliKelas/JurnalMateri/detailJurnalMateri')?>"  class="btn btn-sm detail-jurnal btn-outline-success text-success btn-rounded-sm">Sudah Dilihat</a></td>
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
