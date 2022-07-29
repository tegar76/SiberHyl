<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Data Mapel</h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a class="text-muted">Master Data</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Data Mapel</li>
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
						<h6 class="card-title">Data Mata Pelajaran Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<div class="mt-4 activity">
							<table id="data-mapel" class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:31%;">Mata Pelajaran</th>
										<th style="width:13%;">Dibuat</th>
										<th style="width:13%;">Diedit</th>
										<th style="width:6%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($mapel as $row => $value) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nama_mapel ?></td>
											<td><?= date('d-m-Y H:i', strtotime($value->create_time)) . " WIB" ?></td>
											<td><?= ($value->create_time == $value->update_time) ? '-' : date('d-m-Y H:i', strtotime($value->update_time)) . " WIB" ?></td>
											<td class="d-flex justify-content-center">
												<a href="<?= base_url('master/data/mata-pelajaran/update_mapel/' . $value->slug_mapel) ?>" class="btn btn-sm btn-success mr-2"><i class="fa-solid fa-pen-to-square text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
												<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
												<a href="javascript:void(0)" class="btn btn-sm btn-danger delete-mapel" mapel-id="<?= $value->mapel_id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
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

		<div class="floating-container">
			<a href="<?= base_url('master/data/mata-pelajaran/tambah_mapel') ?>">
				<div class="floating-button">+</div>
			</a>
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
