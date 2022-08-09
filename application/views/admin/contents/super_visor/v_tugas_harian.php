<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/guru/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title . ' Kelas ' . $jadwal->nama_kelas ?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url($level . '/super-visor') ?>" class="text-muted">Super Visor</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url($level . '/super-visor?kelas=' . $jadwal->kode_kelas) ?>" class="text-muted"><?= $jadwal->nama_kelas ?></a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
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
						<!-- <a href="<?= base_url('Admin/SuperVisor/formCetakReportTugasHarian') ?>">
							<div class="card mb-3 py-1 px-2 card-reporting">
								<div class="container">
									<div class="row">
										<i class='bx bx-receipt bx-xs mr-1 text-white icon-reporting'></i>
										<div class="table-title text-white">Reporting</div>
									</div>
								</div>
							</div>
						</a> -->
						<h6 class="card-title">
							Data Tugas Harian Kelas <?= $jadwal->nama_kelas ?> Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="tabel-tugas-admin" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/Data-table/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:2%">No</th>
										<th style="width:18%;">Mapel</th>
										<th style="width:12%;">Judul</th>
										<th style="width:12%;">Pertemuan Ke-</th>
										<th style="width:12%;">Dibuat</th>
										<th style="width:12%;">Diedit</th>
										<th style="width:2%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tugas as $row) : ?>
										<tr>
											<td><?= $row['nomor'] ?></td>
											<td><?= $row['mapel'] ?></td>
											<td><?= $row['judul'] ?></td>
											<td><?= $row['pert'] ?></td>
											<td><?= $row['create'] ?></td>
											<td><?= $row['update'] ?></td>
											<td>
												<a href="<?= base_url($level . '/super-visor/detail_tugas_harian/' . $row['idTugas']) ?>" class="btn btn-sm btn-success border-0 rounded"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
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
