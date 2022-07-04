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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/absensi') ?>" class="text-muted">Absensi</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/detailAbsensi') ?>" class="text-muted">Detail Absensi</a></li>
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
								<label for="">Status Absensi</label>
								<div class="form-group">
									<div class="input-group mb-1">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="status_absen" id="H">
											<label class="form-check-label" for="H">
												H (Hadir)
											</label>
										</div>
									</div>
									<div class="input-group mb-1">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="status_absen" id="A" checked>
											<label class="form-check-label" for="A">
												A (Alpa)
											</label>
										</div>
									</div>
									<div class="input-group mb-1">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="status_absen" id="S">
											<label class="form-check-label" for="S">
												S (Sakit)
											</label>
										</div>
									</div>
									<div class="input-group mb-1">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="status_absen" id="I">
											<label class="form-check-label" for="I">
												I (Izin)
											</label>
										</div>
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