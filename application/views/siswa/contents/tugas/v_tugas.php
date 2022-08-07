<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height px-0">

	<div class="tr-job-posted section-padding pb-3">
		<div class="job-tab text-center">
			<ul class="nav nav-tabs justify-content-center" role="tablist">
				<li role="presentation" class="active">
					<a class="active show" href="#tugas-harian" aria-controls="tugas-harian" role="tab" data-toggle="tab" aria-selected="true">Tugas</a>
				</li>
				<li role="presentation"><a href="#nilai-tugas" aria-controls="nilai-tugas" role="tab" data-toggle="tab" class="" aria-selected="false">Nilai Tugas</a></li>
			</ul>
			<div class="tab-content text-left">
				<div role="tabpanel" class="tab-pane fade active show" id="tugas-harian">
					<div class="container">
						<div class="row">
							<div class="col-xs-6 col-sm-12">

								<div class="card shadow mb-4">
									<div class="row ml-1 mr-1 mt-3">
										<div class="col-lg-12">
											<div class="accordion" id="accordionExample">
												<div id="result"></div>
												<!-- Looping Tugas -->
												<?php foreach ($tugas as $row => $value) : ?>
													<div class="card" id="<?= $value['id_'] ?>">
														<div class="card-header mb-3" data-toggle="collapse" data-target="#Tugas<?= $value['id_'] ?>" aria-expanded="false" aria-controls="Tugas<?= $value['id_'] ?>">
															<div class="clearfix mb-0">
																<a class="btn btn-link">
																	<h4><?= $value['title'] ?></h4>
																	<small> Dibuat : <?= $value['create'] ?>, Update : <?= $value['update'] ?> </small>
																	<i>Deadline : <?= $value['deadline'] ?></i>
																</a>
															</div>
														</div>
														<div id="Tugas<?= $value['id_'] ?>" class="collapse mb-n3 mt-n3" aria-labelledby="<?= $value['id_'] ?>" data-parent="#accordionExample">
															<div class="card-body">
																<div class="row">
																	<div class="col-xs-6 col-sm-12">
																		<div class="">
																			<h5>
																				<?= $value['desc'] ?>
																			</h5>
																		</div>
																		<div class="d-flex justify-content-center m-3">
																			<a target="_blank" href="<?= $value['file'] ?>" class="btn btn-primary btn-sm mr-3 text-white"><i class="fa-solid fa-magnifying-glass text-white mr-1"></i> Lihat Tugas </a>
																			<?php if ($value['status'] == 0) : ?>
																				<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
																				<input type="hidden" name="jadwal_id" class="jadwal-id" value="<?= $this->secure->encrypt_url($value['jadwalid']) ?>">
																				<a role="button" class="btn btn-success btn-sm text-white submit-assignment" data-toggle="popover" data-placement="bottom" tugas-id="<?= $this->secure->encrypt_url($value['id_']) ?>"><i class="fa-solid fa-upload text-white mr-1"></i> Kumpulkan </a>
																			<?php else : ?>
																				<!-- FALSE -->
																			<?php endif ?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<?php endforeach ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.tab-pane -->

			<div role="tabpanel" class="tab-pane fade in px-3" id="nilai-tugas">
				<div class="row">
					<div class="col-xs-6 col-sm-12">
						<div class="card shadow mb-4">
							<div class="card-body">
								<div class="table-responsive">
									<table id="nilai_tugas" class="table-striped table-bordered">
										<!-- pemanggilan tabel id pesan ada di assets/siswa/js/data-table/main.js -->
										<thead>
											<tr>
												<th style="width: 2px;">No</th>
												<th style="width: 14px;">Keterangan</th>
												<th style="width: 40px;">Mata Pelajaran</th>
												<th style="width: 14px;">Tugas Pertemuan Ke-</th>
												<th style="width: 10px">Judul Tugas</th>
												<th style="width: 24px;">Tanggal Pengumpulan</th>
												<th style="width: 24px;">Metode Pengumpulan</th>
												<th style="width: 2px;">File Tugas</th>
												<th style="width: 14px;">Komentar Guru</th>
												<th style="width: 5px;">Nilai</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($nilai as $row) : ?>
												<tr>
													<td><?= $row['nomor'] ?></td>
													<td><?= $row['ket'] ?></td>
													<td><?= $row['mapel'] ?></td>
													<td><?= $row['pert'] ?></td>
													<td><?= $row['judul'] ?></td>
													<td><?= $row['upload'] ?></td>
													<td><?= $row['metode'] ?></td>
													<?php if ($row['metode'] != 'langsung' && $row['metode'] != '-') : ?>
														<td><a target="_blank" href="<?= $row['file'] ?>"><img class="w-50" src="<?= $row['icon'] ?>" alt=""></i></a></td>
													<?php else : ?>
														<td>-</td>
													<?php endif ?>
													<td><?= $row['komentar'] ?></td>
													<td><?= $row['nilai'] ?></td>
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



	<script>
		// Modal Confirm
		var modalConfirm = function(callback) {

			$(".btn-langsung").on("click", function() {
				$("#confirm-modal").modal('show');
			});

			$("#modal-btn-sudah").on("click", function() {
				callback(true);
				$("#confirm-modal").modal('hide');
			});

			$("#modal-btn-belum").on("click", function() {
				callback(false);
				$("#confirm-modal").modal('hide');
			});
		};

		modalConfirm(function(confirm) {
			if (confirm) {
				$("#result").html('<div class="alert alert-success alert-dismissible h6"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil,</strong> Silahkan cek pada tab <strong>nilai tugas !</strong></div>');
			} else {
				$("#result").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Dibatalkan,</strong> Mohon serahkan pengerjaan tugas dahulu ke guru pengajar</div>');
			}
		});
	</script>
