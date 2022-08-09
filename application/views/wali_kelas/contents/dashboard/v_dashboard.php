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
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Pembagian Tugas Wali Kelas Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table class="table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 4%;">No</th>
										<th style="width: 6%;">Kode Guru</th>
										<th style="width: 18%;">Nama</th>
										<th style="width: 6%;">Kelas</th>
										<th style="width: 10%;">Dibuat</th>
										<th style="width: 10%;">Diedit</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td><?= $wali->guru_kode ?></td>
										<td><?= $wali->guru_nama ?></td>
										<td><?= $wali->nama_kelas ?></td>
										<td><?= date('d-m-Y H:i', strtotime($wali->create_time)) ?></td>
										<td><?= ($wali->create_time != $wali->update_time) ? date('d-m-Y H:i', strtotime($wali->update_time)) : '-' ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							<a class="search-icon" href="<?= base_url('wali-kelas/jurnal_materi') ?>"><i class="fa fa-magnifying-glass mr-2"></i></a>
							Jurnal Materi Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="table-jurnal-materi-wk" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 4%;">No</th>
										<th style="width: 15%;">Hari, tanggal</th>
										<th style="width: 8%;">Kode Guru</th>
										<th style="width: 17%;">Mapel</th>
										<th style="width: 8%;">Kelas</th>
										<th style="width: 10%;">Pertemuan Ke-</th>
										<th style="width: 20%;">Pembahasan</th>
										<th style="width: 12%;">Aksi</th>
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
	</div>
