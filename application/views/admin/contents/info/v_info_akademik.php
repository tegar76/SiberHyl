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
				<h3 class="page-title">Informasi Akademik</h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a class="text-muted">Settings Informasi</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Informasi Akademik</li>
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
						<h6 class="card-title">Data Informasi Akademik Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<div class="mt-4 activity">
							<table id="table-info-akademik" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:2%">No</th>
										<th style="width:12%;">Kelas</th>
										<th style="width:19%;">Judul</th>
										<th style="width:2%;">File</th>
										<th style="width:13%;">Dibuat</th>
										<th style="width:13%;">Diedit</th>
										<th style="width:8%;">Aksi</th>
									</tr>
								</thead>
								<?php if (!empty($info_akademik)) : ?>
									<tbody>
										<?php foreach ($info_akademik as $row => $value) : ?>
											<tr>
												<td><?= $value['nomor'] ?></td>
												<td>
													<?php if (is_array($value['kelas'])) : ?>
														<?php foreach ($value['kelas'] as $kelas) : ?>
															<?= $kelas . ", " ?>
														<?php endforeach ?>
													<?php else : ?>
														<?= $value['kelas'] ?>
													<?php endif; ?>
												</td>
												<td><?= $value['judul'] ?></td>
												<td><a target="_blank" href="<?= base_url('master/info/detail_info_akademik?file=' . $value['file']) ?>"><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a></td>
												<td><?= $value['create'] ?></td>
												<td><?= $value['update'] ?></td>
												<td>
													<a href="<?= base_url('master/info/update_info_akademik/' . $value['id']) ?>" class="btn btn-sm btn-success mr-2 ml-2"><i class="fa-solid fa-pen-to-square text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
													<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
													<a href="javascript:void(0)" class="btn btn-sm btn-danger delete-info-akademik" data-toggle="tooltip" info-id="<?= $value['id'] ?>" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								<?php else : ?>
									<tbody>
									</tbody>
								<?php endif; ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="floating-container">
			<a href="<?= base_url('master/info/tambah_info_akademik') ?>">
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
