<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">

	<ul class="nav nav-pills mb-n3 mt-n3 d-flex justify-content-center ml-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-absen-tab" data-toggle="pill" href="#pills-absen" role="tab" aria-controls="pills-absen" aria-selected="true">Absen</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-riwayat-absen-tab" data-toggle="pill" href="#pills-riwayat-absensi" role="tab" aria-controls="pills-riwayat-absensi" aria-selected="false">Riwayat Absensi</a>
		</li>
	</ul>
	<div class="tab-content ml-4 mt-5 pb-3" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-absen" role="tabpanel" aria-labelledby="pills-absen-tab">
			<div class="absen ml-2 d-flex align-content-end">
				<div class="row">
					<!-- Looping absen -->
					<div class="mr-3 mb-3">
						<div class="card shadow-sm card-absen">
							<div class="container">
								<div class="card mt-3 border-teal-blue px-3">
									<h6 class="text-center mt-3">ABSENSI <?= $absensi['kelas'] ?></h6>
									<p class="text-center mt-n1"><?= $absensi['mapel'] ?></p>
								</div>
								<div class="card px-2 py-3 mt-3 mb-3">
									<div class="row">
										<div class="field col-sm-6 mb-1">Tanggal</div>
										<div class="value col-sm-6 mb-3"><?= $absensi['tanggal'] ?></div>
										<div class="field col-sm-6 mb-1">Absensi Dibuka</div>
										<div class="value col-sm-6 mb-3"><?= $absensi['dibuka'] ?></div>
										<div class="field col-sm-6 mb-1">Absen Ditutup</div>
										<div class="value col-sm-6 mb-3"><?= $absensi['ditutup'] ?></div>
										<div class="field col-sm-6 mb-1">Pertemuan Ke-</div>
										<div class="value col-sm-6 mb-3"><?= $absensi['pertemuan'] ?></div>
										<div class="field col-sm-6 mb-1">Status Absen</div>
										<!-- <div class="value col-sm-6 mb-3">:  <span class="text-danger">Belum Dimulai</span></div> -->
										<!-- <div class="value col-sm-6 mb-3">:  <span class="text-success">Sudah Absen</span></div> -->
										<div class="value col-sm-6 mb-3"><?= $absensi['status'] ?></div>
									</div>

									<?php if ($is_absen == true) : ?>
										<!-- sudah melakukan absen -->
									<?php else : ?>
										<?php if ($timeout_absen) : ?>
											<!-- waktu abseni telah habis dan absen ditutup -->
										<?php else : ?>
											<hr>
											<?= form_open_multipart('#', ['id' => 'submit_absen'])  ?>
											<!-- <form action=""> -->
											<input type="hidden" name="jurnal_id" id="jurnal-id" value="<?= $absensi['jurnalID'] ?>">
											<input type="hidden" name="jadwal_id" id="jadwal-id" value="<?= $this->secure->encrypt_url($absensi['jadwalID']) ?>">
											<div class="field text-center mb-2">Pilih Pembelajaran :</div>
											<select name="metode_absen" id="metode_absen" class="form-control mb-3">
												<option value="offline">Tatap Muka</option>
												<option value="online">Online</option>
											</select>
											<div id="next-form-absen"></div>
											<!-- pembelajaran == online -->
											<!-- <input type="file" name="bukti" id="bukti">
                                                <div class="form-info mt-1">Upload bukti mengikuti kelas online, File max 2mb</div> -->
											<button class="btn btn-sm btn-success mt-3 px-3 py-1 d-flex mx-auto mb-2">Absen</button>
											<!-- </form> -->
											<?= form_close() ?>
										<?php endif ?>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="pills-riwayat-absensi" role="tabpanel" aria-labelledby="pills-riwayat-absen-tab">
			<div class="riwayat-absen">
				<div class="row">
					<div class="col-xs-6 col-sm-12">
						<div class="card shadow mb-4">
							<div class="card-body">
								<a href="<?= base_url('siswa/absensi/cetak_absensi/' . $this->secure->encrypt_url($absensi['jadwalID'])) ?>">
									<div class="card mb-3 py-1 px-2 card-reporting">
										<div class="container">
											<div class="row">
												<i class='bx bx-receipt bx-xs mr-1 text-white icon-reporting'></i>
												<div class="table-title text-white">Reporting</div>
											</div>
										</div>
									</div>
								</a>
								<div class="table-responsive">
									<table id="riwayat_absensi" class=" table-striped table-bordered">
										<!-- pemanggilan tabel id riwayat_absensi ada di assets/siswa/js/data-table/main.js -->
										<thead>
											<tr>
												<th style="width: 1px;">No</th>
												<th style="width: 1px;">Status</th>
												<th style="width: 10px;">Pembelajaran</th>
												<th style="width: 12px;">Tanggal</th>
												<th style="width: 34px;">Mapel</th>
												<th style="width: 10px;">Pertemuan Ke-</th>
												<th style="width: 60px;">Pembahasan</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($riwayat as $row) : ?>
												<tr>
													<td><?= $row['nomor'] ?></td>
													<td><?= $row['status'] ?></td>
													<td><?= $row['pembelajaran'] ?></td>
													<td><?= $row['tanggal'] ?></td>
													<td><?= $row['mapel'] ?></td>
													<td><?= $row['pertemuan'] ?></td>
													<td><?= $row['pembahasan'] ?></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="ket-absen mt-4">
							<h6>Keterangan Status Absen :</h6>
							<div class="ket ml-3 mb-4">
								<p>H : Hadir</p>
								<p>A : Alpa (Tidak Hadir Tanpa Keterangan)</p>
								<p>S : Sakit</p>
								<p>I : Izin</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
