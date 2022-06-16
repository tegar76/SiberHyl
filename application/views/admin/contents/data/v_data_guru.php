<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/js/data-table/main.js') ?>"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table-custom/style.css') ?>">
<!-- End Data Tables -->

<link rel="stylesheet" href="<?= base_url('assets/admin/css/dashboard/style.css') ?>">

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Data Guru</h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a class="text-muted">Master Data</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Data Guru</li>
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
						<h6 class="card-title">Data Guru Semester <?= $semester = ($tahun_ajar['semester'] == 0 ) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<div class="mt-4 activity">
							<table id="data-guru" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:4%;">Kode</th>
										<th style="width:24%;">Nama Guru</th>
										<th style="width:17%;">Dibuat</th>
										<th style="width:17%;">Diedit</th>
										<th style="width:8%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if($guru) : ?>
										<?php $no = 1;
										foreach ($guru as $row => $value) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->guru_kode ?></td>
												<td><?= $value->guru_nama ?></td>
												<td><?= date('d-m-Y H:i', strtotime($value->create_time)) . " WIB" ?></td>
												<td><?= ($value->create_time == $value->update_time) ? '-' : date('d-m-Y H:i', strtotime($value->update_time)) . " WIB" ?></td>
												<td class="d-flex justify-content-center">
													<a href="<?= base_url('master/data/guru/detail_guru/' . $this->secure->encrypt_url($value->guru_id)) ?>" class="btn btn-sm btn-primary mr-2"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
													<a href="<?= base_url('master/data/guru/update_guru/' . $this->secure->encrypt_url($value->guru_id)) ?>" class="btn btn-sm btn-success mr-2"><i class="fa-solid fa-pen-to-square text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
													<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
													<a href="#" class="btn btn-sm btn-danger delete-guru" guru-nip="<?= $value->guru_nip ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
												</td>
											</tr>
										<?php endforeach ?>
									<?php endif ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="floating-container">
			<a href="<?= base_url('master/data/guru/tambah_guru') ?>">
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
