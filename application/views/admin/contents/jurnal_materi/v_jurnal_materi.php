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
				<h3 class="page-title">Jurnal Materi</h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Dashboard</li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Jurnal Materi</li>
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
							<a class="search-icon" href=""><i class="fa fa-magnifying-glass mr-2"></i></a>
							Jurnal Materi Semester <?= $semester = ($tahun_ajar['semester'] == 0 ) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="table-jurnal" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 6%;">No</th>
										<th style="width: 10%;">Hari</th>
										<th style="width: 12%;">Tanggal</th>
										<th style="width: 12%;">Kode Guru</th>
										<th style="width: 12%;">Mapel</th>
										<th style="width: 10%;">Kelas</th>
										<th style="width: 12%;">Pertemuan ke-</th>
										<th style="width: 20%;">Pembahasan</th>
										<th style="width: 14%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($jurnal as $row => $value) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->hari ?></td>
											<td><?= date('d - m - Y', strtotime($value->tanggal)) ?></td>
											<td><?= $value->guru_kode ?></td>
											<td><?= $value->nama_mapel ?></td>
											<td><?= $value->nama_kelas ?></td>
											<td><?= $value->pert_ke ?></td>
											<td><?= $value->pembahasan ?></td>
											<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
											<td><a id="id_bdt" href="#" class="btn btn-sm detail-jurnal <?= ($value->status == 0) ? 'btn-outline-danger text-danger' : 'btn-outline-success text-success' ?>   btn-rounded-sm " jurnal-id="<?= $this->secure->encrypt_url($value->jurnal_id) ?>" status="<?= $value->status ?>"><?= ($value->status == 0) ? 'Belum Dilihat' : 'Sudah Dilihat' ?></a></td>
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
