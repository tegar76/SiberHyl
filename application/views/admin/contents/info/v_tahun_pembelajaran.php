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
				<h3 class="page-title">Tahun Pembelajaran</h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a class="text-muted">Settings Info</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Tahun Pembelajaran</li>
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
							<table id="table-tahun-akademik" class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:20%;">Tahun Pembelajaran</th>
										<th style="width:13%;">Semester</th>
										<th style="width:13%;">Dibuat</th>
										<th style="width:13%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1 ?>
									<?php foreach ($tahun_akademik as $row => $value) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->tahun ?></td>
											<td><?= ($value->semester % 2 == 0) ? 'Genap' : 'Gasal' ?></td>
											<TD><?= date('d-m-Y H:i', strtotime($value->create_time)) . " WIB" ?></TD>
											<td class="d-flex justify-content-center">
												<div class="custom-control custom-switch">
													<label for="customSwitch<?= $value->tahun_id ?>" class="mr-5 ml-n5">Non Aktif</label>
													<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
													<input type="checkbox" class="custom-control-input change-tahun-akademik" id="customSwitch<?= $value->tahun_id ?>" value="<?= $value->status ?>" <?= ($value->status == 1) ? 'checked' : '' ?> tahun-akademik-id="<?= $value->tahun_id ?>">
													<label class="custom-control-label" for="customSwitch<?= $value->tahun_id ?>">Aktif</label>
												</div>
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
			<a href="<?= base_url('master/info/tambah_tahun_akademik') ?>">
				<div class="floating-button">+</div>
			</a>
		</div>


		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
