<!-- Data Tables -->
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
							<li class="breadcrumb-item text-muted active">Dashboard</li>
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
						<h6 class="card-title">
							<span><a href=""><i class="fa fa-search mr-2"></i></a></span>
							Jurnal Materi Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="table-jurnal-materi-wk" class="table-responsive table-striped table-bordered" style="width:100%">
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
									<?php foreach ($jurnal as $row => $value) : ?>
										<tr>
											<td><?= $value['nomor'] ?></td>
											<td><?= $value['hari'] . ', ' . $value['tanggal'] ?></td>
											<td><?= $value['guru'] ?></td>
											<td><?= $value['mapel'] ?></td>
											<td><?= $value['kelas'] ?></td>
											<td><?= $value['pert'] ?></td>
											<td><?= $value['pembahasan'] ?></td>
											<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
											<td><a id="id_bdt" href="javascript:void(0)" class="btn btn-sm detail-jurnal <?= $value['status']['bg'] ?> btn-rounded-sm " jurnal-id="<?= $value['id'] ?>" status="<?= $value['status']['s'] ?>"><?= $value['status']['st']; ?></a></td>
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
