<!-- multiple select -->
<script src="<?= base_url('assets/MSelectDialogBox-master/dist/m-select-d-box.js') ?>"></script>
<script type="application/javascript" src="<?= base_url('assets/MSelectDialogBox-master/examples/') ?>js/custom-appearr.js"></script>
<script type="application/javascript" src="<?= base_url('assets/MSelectDialogBox-master/examples/') ?>/js/example.js"></script>

<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

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
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/materi') ?>" class="text-muted">Materi</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
				</ol>
			</nav>
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
		<!-- *************************************************************** -->
		<!-- End Location and Earnings Charts Section -->
		<!-- *************************************************************** -->
		<!-- *************************************************************** -->
		<!-- Start Top Leader Table -->
		<!-- *************************************************************** -->
		<div class="row">
			<div class="col-12">
				<div class="activity">
					<!-- looping card -->
					<div class="card shadow mb-4">
						<div class="container my-3">
							<?= form_open_multipart('master/materi/update_materi/' . $materi->id) ?>
							<input type="hidden" name="materi_info_id" value="<?= $materi->id ?>">
							<input type="hidden" name="index_kelas" value="<?= $materi->kelas ?>">
							<input type="hidden" name="jurusan" value="<?= $materi->j_id ?>">
							<label for="kelas_edit">Kelas</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="kelas_edit" id="kelas_edit" value="<?= $materi->kelas ?>" readonly>
							</div>
							<label for="jurusan_edit">Jurusan</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="jurusan_edit" id="jurusan_edit" value="<?= (empty($materi->kode)) ? '-' : $materi->kode ?>" readonly>
							</div>
							<label for="mapel_edit">Mata Pelajaran</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="mapel_edit" id="mapel_edit" value="<?= $materi->mapel ?>" readonly>
							</div>
							<div class="input-group">
								<button type="button" class="btn btn-primary btn-sm btn-disabled mb-2 mt-2" id="btn-update-materi"><i class="fa fa-plus"></i> Materi</button>
							</div>
							<label for="judul_materi">Judul Materi ke-1</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_materi[]" id="judul_materi" class="form-control <?= (form_error('judul_materi[]')) ? 'is-invalid' : '' ?>" placeholder="Masukan Judul">
								<div id="judul_materiFeedback" class="invalid-feedback">
									<?= form_error('judul_materi[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="file_materi">Unggah Materi Pembelajaran ke-1</label>
							<div class="input-group mb-3">
								<input type="file" name="file_materi[]" id="file_materi" class="form-control <?= (form_error('file_materi[]')) ? 'is-invalid' : '' ?>">
								<div id="file_materiFeedback" class="invalid-feedback">
									<?= form_error('file_materi[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-3">
								<p>*File max 2mb dengan format PDF</p>
							</div>
							<input type="hidden" name="jumlah-materi" id="jumlah-materi-update" value="1">
							<div id="next-update-materi"></div>
							<div class="input-group">
								<button type="button" class="btn btn-primary btn-sm btn-disabled mb-2 mt-2" id="btn-update-video"><i class="fa fa-plus"></i> Video Pembelajaran</button>
							</div>
							<label for="judul_video">Judul Video Pembelajaran ke-1</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_video[]" id="judul_video" class="form-control <?= (form_error('judul_video[]')) ? 'is-invalid' : '' ?>" placeholder="Masukan Judul Video" value="<?= set_value('judul_video') ?>">
								<div id="judul_videoFeedback" class="invalid-feedback">
									<?= form_error('judul_video[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="link_video">Video Pembelajaran ke-1</label>
							<div class="input-group mb-3">
								<input type="text" name="link_video[]" id="link_video" class="form-control <?= (form_error('link_video[]')) ? 'is-invalid' : '' ?>" placeholder="Masukan Link Video" value="<?= set_value('link_video') ?>">
								<div id="link_videoFeedback" class="invalid-feedback">
									<?= form_error('link_video[]', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="input-group mb-3">
								<p>*Link bersumber dari youtube</p>
							</div>
							<input type="hidden" name="jumlah-video" id="jumlah-video-update" value="1">
							<div id="next-update-video"></div>
							<div class="btn-aksi mb-3">
								<button type="submit" name="update" class="btn btn-sm btn-success rounded px-4 py-2 mr-3">Update</button>
							</div>
							<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
							<?= form_close() ?>
							<hr>
							<label class="mb-4" for="">Materi Pembelajaran</label>
							<div class="input-group mb-3">
								<div class="item-pdf">
									<div class="row">
										<?php foreach ($pdf as $row => $value) : ?>
											<!-- looping item -->
											<div class="pdf-file ml-3">
												<div class="card d-flex flex-column card-pdf">
													<a target="_blank" href="<?= base_url('master/materi/view_materi/' . $value->materi_id . '/' . $value->file_materi) ?>">
														<img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png') ?>" alt="<?= $value->judul ?>">
													</a>
													<hr class="w-50 mx-auto">
													<h6 class="text-center mt-n1"><?= $value->judul ?></h6>
													<div class="row d-flex justify-content-center mb-3 mt-auto">
														<a href="<?= base_url('master/materi/update_file_materi/' . $value->materi_id) ?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
														<a href="javascript:void(0)" class="btn btn-sm btn-danger hapus-file-materi" materi-id="<?= $value->materi_id ?>" detail-materi-id="<?= $materi->id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<hr>
							<label class="mb-4" for="">Video Pembelajaran</label>
							<div class="input-group mb-3">
								<div class="item-video">
									<div class="row">
										<?php foreach ($video as $row => $value) : ?>
											<!-- Looping Video -->
											<div class="pdf-file ml-3">
												<div class="card shadow-sm d-flex flex-column card-video">
													<iframe class="d-block mx-auto" src="<?= $value->file_materi ?>" title="<?= $value->judul ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
													<h6 class="mt-1 ml-3"><?= date('Y-m-d', strtotime($value->create_time)) ?></h6>
													<h6 class="mt-n1 ml-3"><?= $value->judul ?></h6>
													<div class="row d-flex justify-content-center mb-3 mt-auto">
														<a href="<?= base_url('master/materi/update_materi_video/' . $value->materi_id) ?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
														<a href="javascript:void(0)" class="btn btn-sm btn-danger hapus-video-materi" materi-id="<?= $value->materi_id ?>" detail-materi-id="<?= $materi->id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
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
			<!-- *************************************************************** -->
			<!-- End Top Leader Table -->
			<!-- *************************************************************** -->
		</div>
	</div>
