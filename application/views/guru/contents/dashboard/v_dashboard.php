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
						<h6 class="card-title">Pembagian Tugas Mengajar Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<div class="sub-title">
							<div class="info">
								<p>Kode Guru : <span class="ml-2"><?= $guru->guru_kode ?></span></p>
								<p>Nama : <span class="ml-2"><?= $guru->guru_nama ?></span></p>
							</div>
						</div>
						<div class="mt-4 activity">
							<table class="table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width: 6%;">No</th>
										<th style="width: 25%;">Mata pelajaran</th>
										<th style="width: 20%;">Kompetensi keahlian</th>
										<th style="width: 10%;">Jumlah Rombel</th>
										<th style="width: 10%;">Jumlah Jam</th>
										<th style="width: 10%;">Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php $total = 0;
									foreach ($jadwal as $row => $value) : ?>
										<tr>
											<td><?= $value['nomor'] ?></td>
											<td><?= $value['mapel'] ?></td>
											<td>
												<?php $kelas = $this->jadwal->getKelasJadwal($value['mapel_id'], $value['guru_nip']);
												foreach ($kelas as $row) {
													echo $row->nama_kelas . '<br>';
												} ?>
											</td>
											<td><?= $value['jumlah_rombel'] ?></td>
											<td><?= $value['jumlah_jam'] ?></td>
											<td><?= $value['total_jam'] ?></td>
										</tr>
										<?php $total += $value['total_jam']; ?>
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5" class="text-right">Total Jam Mengajar</th>
										<td><?= $total ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							<a class="search-icon" href=""><i class="fa fa-magnifying-glass mr-2"></i></a>
							Pengajuan Surat Dari Siswa Semester Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="table-pengajuan-surat" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 4%;">No</th>
										<th style="width: 15%;">Hari, tanggal</th>
										<th style="width: 8%;">NIS</th>
										<th style="width: 17%;">Nama</th>
										<th style="width: 8%;">Kelas</th>
										<th style="width: 20%;">Jenis Surat</th>
										<th style="width: 4%;">File</th>
										<th style="width: 12%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php $no = 1;
									foreach ($surat as $row) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $row->hari . ', ' . date('d-m-Y', strtotime($row->tanggal)) ?></td>
											<td><?= $row->nis ?></td>
											<td><?= $row->nama ?></td>
											<td><?= $row->kelas ?></td>
											<td><?= $row->jenis ?></td>
											<td>
												<a target="_blank" href="<?= base_url('guru/pembelajaran/view_surat?file=' . $row->file) ?>"><img src="<?= base_url('assets/admin/icons/img.png') ?>" alt=""></a>
											</td>
											<td>
												<?php if ($row->status > 0) {
													$status = 'Sudah Dilihat';
													$class = "btn-outline-success text-success";
												} else {
													$status = 'Belum Dilihat';
													$class = "btn-outline-danger text-danger";
												} ?>
												<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
												<a id="view-surat" class="btn btn-sm detail-surat <?= $class ?> btn-rounded-sm" status="<?= $row->status ?>" id-pen="<?= $row->idPen ?>"><?= $status ?></a>
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
	</div>
