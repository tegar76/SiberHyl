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
						<li class="breadcrumb-item text-muted active">Pembelajaran</li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/mengajar') ?>" class="text-muted">Mengajar</a></li>
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
			<div class="form-group col-md-8">
				<div class="input-group mb-2">
					<select id="change-kelas" class="form-control">
						<option value="">Pilih Kelas</option>
						<option value="">XI TKR0 1</option>
						<option value="">XI MM 1</option>
					</select>
					<div class="input-group-prepend mr-3">
						<div class="input-group-text"><i class="fas fa-filter"></i></div>
					</div>

					<select id="change-kelas" class="form-control">
						<option value="">Pilih Mapel</option>
						<option value="">Panel Sasis</option>
						<option value="">Wirausaha</option>
					</select>
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-filter"></i></div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<a href="<?= base_url('Guru/Pembelajaran/formCetakReportJurnalMateri')?>">
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
							<span><a href=""><i class="fa fa-search mr-2"></i></a></span>
							Jurnal Materi  Semester Gasal Tahun Pelajaran 2021/2022  
						</h6>
						<div class="mt-4 activity">
							<table id="jurnal-materi" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:2%">No</th>
										<th style="width:8%;">Hari</th>
										<th style="width:10%;">Tanggal</th>
										<th style="width:10%;">Kode Guru</th>
										<th style="width:15%;">Mapel</th>
										<th style="width:8%;">Kelas</th>
										<th style="width:13%;">Pertemuan Ke- </th>
										<th style="width:18%;">Pembahasan</th>
										<th style="width:2%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Senin</td>
										<td>01 - 05 - 2022  </td>
										<td>AZ</td>
										<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
										<td>XI TKRO 1</td>
										<td>1</td>
										<td>now use Lorem Ipsum default  a search for ipsum' will uncover  their infancy</td>
										<td>
											<a href="<?= base_url('Guru/Pembelajaran/detailJurnalMateri')?>" class="btn btn-sm btn-primary bg-blue border-0 rounded"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
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
