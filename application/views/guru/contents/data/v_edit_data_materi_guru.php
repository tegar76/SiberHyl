<!-- multiple select -->
<?php include APPPATH . '../assets/MSelectDialogBox-master/import_multiple_select.php'; ?>

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
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/data/data_materi?user=guru') ?>" class="text-muted">Data Materi (Guru)</a></li>
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
							<?= form_open_multipart('guru/data/edit_materi/' . $detailMateri->id) ?>
							<input type="hidden" name="detailmateri_id" value="<?= $detailMateri->id ?>">
							<label for="kelas_edit">Kelas</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="kelas_edit" id="kelas_edit" value="<?= $detailMateri->kelas ?>" readonly>
							</div>
							<label for="mapel_edit">Mata Pelajaran</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="mapel_edit" id="mapel_edit" value="<?= $detailMateri->mapel ?>" readonly>
							</div>
							<div class="input-group">
								<button type="button" class="btn btn-primary bg-blue border-0 btn-sm btn-disabled mb-2 mt-2" id="btn-update-materi" data-toggle="tooltip" data-placement="top" title="+ Form Materi"><i class="fa fa-plus"></i> Materi</button>
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
								<button type="button" class="btn btn-primary bg-blue border-0  btn-sm btn-disabled mb-2 mt-2" id="btn-update-video" data-toggle="tooltip" data-placement="top" title="+ Form Video"><i class="fa fa-plus"></i> Video Pembelajaran</button>
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
								<button type="submit" name="update" class="btn btn-sm btn-success border-0 rounded px-4 py-2 mr-3">Update</button>
							</div>
							<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
							<?= form_close() ?>
							<hr>
							<label class="mb-4" for="">Materi Pembelajaran</label>
							<div class="input-group mb-3">
								<div class="item-pdf">
									<div class="row">
										<?php foreach ($bahanMateri as $materi) : ?>
											<!-- looping item -->
											<div class="pdf-file ml-3">
												<div class="card d-flex flex-column card-pdf">
													<a target="_blank" href="<?= base_url('guru/data/view_materi_guru/' . $materi->file_materi) ?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png') ?>" alt="file pdf"></a>
													<hr class="w-50 mx-auto">
													<h6 class="text-center mt-n1"><?= $materi->judul ?></h6>
													<div class="row d-flex justify-content-center mb-3 mt-auto">
														<a href="<?= base_url('guru/data/update_bahan_materi?type=pdf&id=' . $materi->materi_id) ?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
														<a href="javascript:void(0)" class="btn btn-sm btn-danger hapus-materi-pdf" materi-id="<?= $materi->materi_id ?>" materi-info-id="<?= $materi->detailmateri_id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
							<hr>
							<label class="mb-4" for="">Video Pembelajaran</label>
							<div class="input-group mb-3">
								<div class="item-video">
									<div class="row">
										<!-- Looping Video -->
										<?php foreach ($videoMateri as $row => $value) : ?>
											<!-- Looping Video -->
											<div class="pdf-file ml-3">
												<div class="card shadow-sm d-flex flex-column card-video">
													<iframe class="d-block mx-auto" src="<?= $value->file_materi ?>" title="<?= $value->judul ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
													<h6 class="mt-1 ml-3"><?= date('Y-m-d', strtotime($value->create_time)) ?></h6>
													<h6 class="mt-n1 ml-3"><?= $value->judul ?></h6>
													<div class="row d-flex justify-content-center mb-3 mt-auto">
														<a href="<?= base_url('guru/data/update_bahan_materi?type=video&id=' . $value->materi_id) ?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
														<a href="javascript:void(0)" class="btn btn-sm btn-danger hapus-materi-video" materi-id="<?= $value->materi_id ?>" materi-info-id="<?= $value->detailmateri_id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
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
