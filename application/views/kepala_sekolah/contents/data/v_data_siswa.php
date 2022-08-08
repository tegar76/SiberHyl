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
			<div class="form-group col-md-4">
				<div class="input-group mb-2">
					<select id="change-kelas-kepsek" class="form-control">
						<?php foreach ($classes as $row => $value) : ?>
							<?php if (isset($_GET['kelas']) && $value->kode_kelas == $_GET['kelas']) : ?>
								<?php $selected = 'selected' ?>
							<?php else : ?>
								<?php $selected = '' ?>
							<?php endif ?>
							<option value="<?= $value->kode_kelas ?>" <?= $selected ?>><?= $value->nama_kelas ?></option>
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
						<h6 class="card-title">Data Siswa Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<div class="sub-title">
							<div class="info">
								<p>Kode Guru : <span class="ml-2"><?= (empty($walikelas)) ? '-' : $walikelas->nama_kelas ?></span></p>
								<p>Nama : <span class="ml-2"><?= (empty($walikelas)) ? '-' : $walikelas->guru_nama ?></span></p>
							</div>
						</div>
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
										<th style="width:10%;">Keterangan</th>
										<th style="width:6%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($students)) : ?>
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
												<td><?= ($value->status_online == 'online') ? '<p class="text-success">Online</p>' : '<p class="text-danger">Offline</p>' ?></td>
												<td class="d-flex justify-content-center">
													<a href="<?= base_url('kepala_sekolah/master_data/detail_siswa?nis=' . $value->siswa_nis) ?>" class="btn btn-sm btn-primary mr-2"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
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

		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
