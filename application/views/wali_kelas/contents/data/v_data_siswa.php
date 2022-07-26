<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

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
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Data Siswa Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<div class="sub-title">
							<div class="info">
								<p>Kelas : <span class="ml-2"><?= (!empty($wali->nama_kelas)) ? $wali->nama_kelas : '' ?></span></p>
								<p>Wali Kelas: <span class="ml-2"><?= (!empty($wali->guru_nama)) ? $wali->guru_nama : '' ?></span></p>
							</div>
						</div>
						<div class="mt-4 activity">
							<table id="table-data-siswa-wk" class="table-responsive table-striped table-bordered" style="width:100%">
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
									<?php foreach ($students as $row) : ?>
										<tr>
											<td><?= $row['nomor'] ?></td>
											<td><?= $row['nis'] ?></td>
											<td><?= $row['nisn'] ?></td>
											<td><?= $row['nama'] ?></td>
											<td><?= $row['jk'] ?></td>
											<td><?= $row['asal'] ?></td>
											<td><?= $row['status'] ?></td>
											<td><?= $row['online'] ?></td>
											<td>
												<a href="<?= base_url("wali-kelas/data/detail_siswa/?nis={$row['nis']}") ?>" class="btn btn-sm btn-primary bg-blue border-0 rounded"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
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
