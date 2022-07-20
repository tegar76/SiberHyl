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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/tugasHarian') ?>" class="text-muted">Tugas Harian</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Guru/Pembelajaran/detailTugasHarian') ?>" class="text-muted">Detail Tugas Harian</a></li>
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
								<div class="row">
									<div class="col">
										<label for="">Judul</label>
										<div class="input-group mb-3">
											<input type="text" name="" id="" class="form-control" value="Tugas Pertemuan 1" readonly>
										</div>
									</div>
									<div class="col">
										<label for="">Pertemuan Ke-</label>
										<div class="input-group mb-3">
											<input type="text" name="" id="" class="form-control" value="1" readonly>
										</div>
									</div>
								</div>
								<label for="">Deskripsi Tugas</label>
								<div class="input-group mb-3">
									<textarea name="" class="form-control" placeholder="Masukan Desripsi Tugas">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, minus.</textarea>
								</div>
								<label for="">Setting Deadline Tugas</label>
								<div class="row">
									<div class="col">
										<label for="">Tanggal</label>
										<div class="input-group mb-3">
											<input type="date" name="" id="" class="form-control" value="2018-07-22">
										</div>
									</div>
									<div class="col">
										<label for="">Jam</label>
										<div class="input-group mb-3">
											<input type="time" name="" id="" class="form-control" value="08:00">
										</div>
									</div>
								</div>
								<div class="btn-aksi mt-3 mb-2">
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