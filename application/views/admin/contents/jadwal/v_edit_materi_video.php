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
					<div class="card shadow mb-4">
						<div class="container my-3">
							<?= form_open('master/materi/update_materi_video/' . $materi->materi_id) ?>
							<input type="hidden" name="materi_id" value="<?= $materi->materi_id ?>">
							<label for="judul_video_update">Judul Video Pembelajaran</label>
							<div class="input-group mb-3">
								<input type="text" name="judul_video_update" id="judul_video_update" placeholder="Masukan Judul Video Pembelajaran" class="form-control" value="<?= $materi->judul ?>">
							</div>
							<label for="link_video_update">Link</label>
							<div class="input-group mb-3">
								<input type="text" name="link_video_update" id="link_video_update" placeholder="Masukan Link Youtube" class="form-control" value="<?= $materi->file ?>">
							</div>
							<div class="input-group mb-3">
								<p>*Link Bersumber dari Youtube</p>
							</div>
							<div class="btn-aksi">
								<button type="submit" name="update_video" class="btn btn-sm btn-success rounded px-4 py-2 mr-3">Update</button>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
