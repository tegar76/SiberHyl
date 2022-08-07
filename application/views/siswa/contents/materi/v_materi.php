<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">

	<ul class="nav nav-pills mb-n3 mt-n3 d-flex justify-content-center ml-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-materi-tab" data-toggle="pill" href="#pills-materi" role="tab" aria-controls="pills-materi" aria-selected="true">Materi</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-video-pembelajaran-tab" data-toggle="pill" href="#pills-video-pembelajaran" role="tab" aria-controls="pills-video-pembelajaran" aria-selected="false">Video Pembelajaran</a>
		</li>
	</ul>
	<div class="tab-content ml-4 mt-5 pb-5" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-materi" role="tabpanel" aria-labelledby="pills-materi-tab">
			<div class="materi ml-5 d-flex align-content-end">
				<div class="row">

					<?php foreach ($materi_pdf as $row) : ?>
						<!-- Looping Pdf -->
						<div class="pdf-file ml-n2 mr-4 mb-3">
							<a target="_blank" href="<?= base_url('siswa/materi/view_materi/' . $row->file) ?>">
								<div class="card shadow-sm card-pdf">
									<div class="container">
										<img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png') ?>" alt="file pdf">
										<hr class="w-50 mx-auto">
										<h6 class="text-center mt-n1"><?= $row->judul ?></h6>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="pills-video-pembelajaran" role="tabpanel" aria-labelledby="pills-video-pembelajaran-tab">
			<div class="video ml-5 d-flex align-content-end">
				<div class="row">
					<?php foreach ($materi_video as $val) : ?>
						<!-- Looping Video -->
						<div class="pdf-file ml-n2 mr-4 mb-3">
							<div class="card shadow-sm card-video">
								<div class="container">
									<iframe class="d-block mx-auto" src="<?= $val->file ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<h6 class="mt-1"><?= date('d-m-Y', strtotime($val->create)) ?></h6>
									<h6 class="mt-n1"><?= $val->judul ?></h6>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
