<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

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
							<li class="breadcrumb-item"><a class="text-muted">Master Data</a></li>
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
			<div class="form-group col-md-4">
				<div class="input-group mb-2">
					<select id="change-kelas" class="form-control">
						<option value="">Pilih Kelas</option>
						<?php foreach ($classes as $row => $value) : ?>
							<option value="<?= $value->kode_kelas ?>" <?= ($value->kode_kelas == $this->uri->segment(5)) ? 'selected' : '' ?>><?= $value->nama_kelas ?></option>
						<?php endforeach ?>
					</select>
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-filter"></i></div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Data Siswa Semester <?= $semester = ($tahun_ajar['semester'] == 0 ) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<p class="card-sub-title mb-1 mt-4">Kelas : <span><?= (empty($walikelas)) ? '-' : $walikelas->nama_kelas ?></span></p>
						<p class="card-sub-title">Wali Kelas : <span><?= (empty($walikelas)) ? '-' : $walikelas->guru_nama ?></span></p>
						<div class="mt-4 activity">
							<table id="data-siswa" class="table-responsive table-striped table-bordered" style="width:100%">
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
										<th style="width:8%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (is_array($students)) : ?>
										<?php $no = 1;
										foreach ($students as $row => $value) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->siswa_nis ?></td>
												<td><?= $value->siswa_nisn ?></td>
												<td><?= $value->siswa_nama ?></td>
												<td><?= $value->siswa_kelamin ?></td>
												<td><?= $value->asal_kelas ?></td>
												<td><?= $value->status ?></td>
												<td class="d-flex justify-content-center">
													<a href="<?= base_url('master/data/siswa/detail_siswa/' . $this->secure->encrypt_url($value->siswa_id)) ?>" class="btn btn-sm btn-primary mr-2"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
													<a href="<?= base_url('master/data/siswa/update_siswa/' . $this->secure->encrypt_url($value->siswa_id)) ?>" class="btn btn-sm btn-success mr-2"><i class="fa-solid fa-pen-to-square text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
													<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
													<a href="#" class="btn btn-sm btn-danger delete-siswa" kode-kelas="<?= $value->kode_kelas ?>" siswa-id="<?= $this->secure->encrypt_url($value->siswa_id) ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
												</td>
											</tr>
										<?php endforeach ?>
									<?php elseif (is_object($students)) : ?>
										<tr>
											<td><?= 1 ?></td>
											<td><?= $students->siswa_nis ?></td>
											<td><?= $students->siswa_nisn ?></td>
											<td><?= $students->siswa_nama ?></td>
											<td><?= $students->siswa_kelamin ?></td>
											<td><?= $students->asal_kelas ?></td>
											<td><?= $students->status ?></td>
											<td class="d-flex justify-content-center">
												<a href="<?= base_url('master/data/siswa/detail_siswa/' . $this->secure->encrypt_url($students->siswa_id)) ?>" class="btn btn-sm btn-primary mr-2"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
												<a href="<?= base_url('master/data/siswa/update_siswa/' . $this->secure->encrypt_url($students->siswa_id)) ?>" class="btn btn-sm btn-success mr-2"><i class="fa-solid fa-pen-to-square text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
												<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
												<a href="#" class="btn btn-sm btn-danger delete-siswa" kode-kelas="<?= $students->kode_kelas ?>" siswa-id="<?= $this->secure->encrypt_url($students->siswa_id) ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
											</td>
										</tr>
									<?php endif ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="floating-container">
			<a href="<?= base_url('master/data/siswa/tambah_siswa') ?>">
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
