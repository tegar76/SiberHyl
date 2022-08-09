<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<div class="page-wrapper">
	<?= $this->session->userdata('level') ?>
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title ?></h3>
			</div>
		</div>
	</div>
	<div class="container-fluid">

		<div class="card-group">
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $teacherRow; ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Guru</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-person-chalkboard fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $classRow; ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Wali Kelas
							</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-chalkboard-user fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $studentRow; ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Siswa</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-graduation-cap fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $classRow; ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Kelas</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-door-open fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Pembelajaran yang sedang Berlangsung
						</h6>
						<div class="mt-4 activity">
							<table id="table-jadwal-berlangsung" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 4%;">No</th>
										<th style="width: 6%;">Hari</th>
										<th style="width: 8%;">Kode Guru</th>
										<th style="width: 17%;">Mapel</th>
										<th style="width: 10%;">Jam Pelajaran</th>
										<th style="width: 8%;">Kelas</th>
										<th style="width: 6%;">Ruang</th>
										<th style="width: 12%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($study) : ?>
										<?php $no = 1;
										foreach ($study as $val) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $val->hari ?></td>
												<td><?= $val->guru ?></td>
												<td><?= $val->mapel ?></td>
												<td><?= date('H:i', strtotime($val->jam_masuk)) . ' - ' . date('H:i', strtotime($val->jam_keluar)) . " WIB" ?></td>
												<td><?= $val->kelas ?></td>
												<td><?= $val->ruang ?></td>
												<td><a href="<?= base_url('master/super-visor?kelas=' . $val->kd_kelas) ?>" class="d-block btn btn-sm btn-outline-primary border-blue rounded mx-auto">Kunjungi Kelas</a></td>
												<!-- <td><a href="" class="d-block btn btn-sm btn-outline-warning border-yellow rounded mx-auto">Sudah Dikunjungi</a></td> -->
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
	</div>
