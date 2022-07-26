<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<!-- Import multiple select -->
<?php include APPPATH . '../assets/MSelectDialogBox-master/import_multiple_select.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height px-0">

	<div class="tr-job-posted section-padding pb-3">
		<div class="job-tab text-center">
			<ul class="nav nav-tabs justify-content-center" role="tablist">
				<li role="presentation" class="active">
					<a class="active show" href="#form-pengajuan-surat" aria-controls="form-pengajuan-surat" role="tab" data-toggle="tab" aria-selected="true">Pengajuan</a>
				</li>
				<li role="presentation"><a href="#riwayat-surat" aria-controls="riwayat-surat" role="tab" data-toggle="tab" class="" aria-selected="false">Riwayat</a></li>
			</ul>
			<div class="tab-content text-left">
				<div role="tabpanel" class="tab-pane fade active show" id="form-pengajuan-surat">
					<div class="container">
						<div class="row">
							<div class="col-xs-6 col-sm-12">

								<div class="card shadow mb-4">
									<div class="row ml-1 mr-1 mt-3">
										<div class="col-lg-12">
											<div class="accordion" id="accordionExample">
												<div id="result"></div>
												<?= form_open_multipart('siswa/surat') ?>
												<div class="sub-title-form mb-3">
													Selamat Datang di <span>Ruang Pengajuan Surat</span>, Fitur ini berfungsi untuk pengajuan surat sakit, pengajuan surat izin yang ditujukan kepada guru pengajar terkait.
												</div>
												<label for="nis">NIS</label>
												<div class="input-group mb-3">
													<input type="text" name="nis" id="nis" class="form-control" value="<?= $siswa->siswa_nis ?>" readonly>
												</div>
												<label for="nama">Nama</label>
												<div class="input-group mb-3">
													<input type="text" name="nama" id="nama" class="form-control" value="<?= $siswa->nama_kelas ?>" readonly>
												</div>
												<label for="kelas">Kelas</label>
												<div class="input-group mb-3">
													<input type="text" name="kelas" id="kelas" class="form-control" value="<?= $siswa->siswa_nama ?>" readonly>
												</div>
												<label for="hari">Hari</label>
												<div class="input-group mb-3">
													<select name="hari" id="hari" class="form-control <?= form_error('hari') ? 'is-invalid' : '' ?>">
														<option value="" selected>Pilih Hari</option>
														<?php foreach ($days as $day) : ?>
															<option value="<?= $day ?>" <?= (set_value('hari') == $day) ? 'selected' : '' ?>><?= $day ?></option>
														<?php endforeach ?>
													</select>
													<div id="hariFeedback" class="invalid-feedback">
														<?= form_error('hari', '<div class="text-danger">', '</div>') ?>
													</div>
												</div>
												<label for="tanggal">Tanggal</label>
												<div class="input-group mb-3">
													<input type="date" name="tanggal" id="tanggal" class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" value="<?= set_value('tanggal') ?>">
													<div id="tanggalFeedback" class="invalid-feedback">
														<?= form_error('tanggal', '<div class="text-danger">', '</div>') ?>
													</div>
												</div>
												<label for="jenis_surat">Jenis Pengajuan Surat</label>
												<div class="input-group mb-4">
													<select name="jenis_surat" id="jenis_surat" class="form-control <?= form_error('jenis_surat') ? 'is-invalid' : '' ?>">
														<option value="" selected>Pilih Jenis Pengajuan Surat</option>
														<option value="sakit" <?= (set_value('jenis_surat') == 'sakit') ? 'selected' : '' ?>>Surat Sakit</option>
														<option value="izin" <?= (set_value('jenis_surat') == 'izin') ? 'selected' : '' ?>>Surat Izin</option>
													</select>
													<div id="jenis_suratFeedback" class="invalid-feedback">
														<?= form_error('jenis_surat', '<div class="text-danger">', '</div>') ?>
													</div>
												</div>
												<label for="files">Upload Surat</label>
												<div class="input-group mb-1">
													<input type="file" name="files" id="files" class="form-control <?= form_error('files') ? 'is-invalid' : '' ?>">
													<div id="filesFeedback" class="invalid-feedback">
														<?= form_error('files', '<div class="text-danger">', '</div>') ?>
													</div>
												</div>
												<div class="form-info mb-3">
													Upload Surat dengan format PNG,JPEG,JPG dan dengan ukuran File max 2mb
												</div>
												<label for="guru_pengajar">Guru Pengajar</label>
												<div class="input-group mb-3">
													<select name="guru_pengajar[]" id="guru_pengajar" class="form-control <?= form_error('guru_pengajar[]') ? 'is-invalid' : '' ?>" multiple>
														<?php foreach ($guru->result() as $gr) : ?>
															<option value="<?= $gr->guru_nip ?>"><?= $gr->guru_nama ?></option>
														<?php endforeach ?>
													</select>
													<div id="guru_pengajarFeedback" class="invalid-feedback">
														<?= form_error('guru_pengajar[]', '<div class="text-danger">', '</div>') ?>
													</div>
												</div>
												<div class="btn-aksi mb-4">
													<button type="submit" name="send" class="btn btn-sm btn-primary rounded px-4 py-1 mr-3">Kirim</button>
													<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
												</div>
												<?= form_close() ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.tab-pane -->

				<div role="tabpanel" class="tab-pane fade in px-3" id="riwayat-surat">
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<div class="card shadow mb-4">
								<div class="card-body">
									<div class="table-responsive">
										<table id="riwayat_pengajuan_surat" class=" table-striped table-bordered">
											<!-- pemanggilan tabel id ada di assets/DataTables/table_id_js/main.js -->
											<thead>
												<tr>
													<th style="width: 1px;">No</th>
													<th style="width: 2px;">Hari</th>
													<th style="width: 12px;">Tanggal</th>
													<th style="width: 24px;">Nama</th>
													<th style="width: 12px;">Kelas</th>
													<th style="width: 12px;">Jenis Surat</th>
													<th style="width: 2px;">File</th>
													<th style="width: 45px;">Dikirim Kepada</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($riwayat as $row) : ?>
													<tr>
														<td><?= $row['nomor'] ?></td>
														<td><?= $row['hari'] ?></td>
														<td><?= $row['tanggal'] ?></td>
														<td><?= $row['nama'] ?></td>
														<td><?= $row['kelas'] ?></td>
														<td><?= $row['jenis'] ?></td>
														<td><a target="_blank" href="<?= base_url('siswa/surat/file_surat?file=' . $row['file']) ?>"><img src="<?= base_url('assets/admin/icons/img-md.png') ?>" alt="" style="width: 30px;"></i></a></td>
														<td>
															<?php
															$guru = $this->siswa->recive_surat($row['id']);
															foreach ($guru as $g) {
																echo $g->guru_nama . '<br>';
															}
															?>
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
				</div><!-- /.tab-pane -->

			</div>
		</div><!-- /.job-tab -->
	</div>
