<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title ?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Master Data</li>
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
						<h6 class="card-title">Data Materi (Guru Pengajar) Semester Gasal Tahun Pelajaran 2021/2022 </h6>
						<div class="mt-4 activity">
							<table id="data-materi-guru" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:5%">No</th>
										<th style="width:20%;">Kelas</th>
										<th style="width:25%;">Mapel</th>
										<th style="width:18%;">Dibuat</th>
										<th style="width:10%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($materi as $row) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row->nama_kelas ?></td>
											<td><?= $row->nama_mapel ?></td>
											<td><?= date('d-m-Y H:i', strtotime($row->create_time)) ?> WIB</td>
											<td>
												<a href="<?= base_url('guru/data/detail_materi?user=guru&id=' . $row->materi_info_id) ?>" class="btn btn-sm btn-primary bg-blue border-0 rounded mr-1"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
												<a href="<?= base_url('guru/data/edit_materi/' . $row->materi_info_id) ?>" class="btn btn-sm btn-success border-0 rounded mr-1"><i class="fa-solid fa-pen-to-square text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
												<a href="javascript:void(0)" class="btn btn-sm btn-danger border-0 rounded delete-materi" materi-id="<?= $row->materi_info_id ?>"><i class="fa-solid fa-trash-can text-white" data-toggle="tooltip" data-placement="top" title="Hapus"></i></a>
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

		<div class="floating-container">
			<a href="<?= base_url('guru/data/tambah_materi') ?>">
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
