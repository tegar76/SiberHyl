	<div class="page-wrapper">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="page-breadcrumb">
			<div class="row">
				<div class="col-7 align-self-center">
					<h3 class="page-title"><?= $title?></h3>
				</div>
			</div>
			<div class="d-flex align-items-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb m-0 p-0">
						<li class="breadcrumb-item text-muted active">Pembelajaran</li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/mengajar') ?>" class="text-muted">Mengajar</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/evaluasi') ?>" class="text-muted">Evaluasi</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/detailEvaluasi') ?>" class="text-muted">Detail Evaluasi</a></li>
						<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title?></li>
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
						<?= form_open_multipart('') ?>
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="">Mulai</label>
								<div class="input-group mb-3">
									<input type="time" name="" id="" class="form-control <?= (form_error('')) ? 'is-invalid' : '' ?>">
									<div id="" class="invalid-feedback">
										<?= form_error('', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="">Selesai</label>
								<div class="input-group mb-3">
									<input type="time" name="" id="" class="form-control <?= (form_error('')) ? 'is-invalid' : '' ?>">
									<div id="" class="invalid-feedback">
										<?= form_error('', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="">Batas Pengumpulan</label>
								<div class="input-group mb-3">
									<input type="time" name="" id="" class="form-control <?= (form_error('')) ? 'is-invalid' : '' ?>">
									<div id="" class="invalid-feedback">
										<?= form_error('', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="btn-aksi mt-4 mb-2">
									<button type="submit" class="btn btn-sm btn-success border-0 rounded px-4 py-2 mr-3">Update</button>
									<button type="reset" class="btn btn-sm btn-secondary border-0 rounded px-4 py-2">Reset</button>
								</div>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>
				<!-- *************************************************************** -->
				<!-- End Top Leader Table -->
				<!-- *************************************************************** -->
			</div>