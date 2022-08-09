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
						<li class="breadcrumb-item text-muted active">Pembelajaran</li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran') ?>" class="text-muted">Mengajar</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/tugas_harian/' . $info->jadwal_id) ?>" class="text-muted">Tugas Harian</a></li>
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
						<?= form_open('guru/export/tugas_harian/' . $info->jadwal_id) ?>
						<input type="hidden" name="jadwal_id" value="<?= $info->jadwal_id ?>">
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="kode_guru">Kode Guru</label>
								<div class="input-group mb-3">
									<input type="text" name="kode_guru" id="kode_guru" class="form-control" value="<?= $info->guru_kode ?>" readonly>
								</div>
								<label for="kelas">Kelas</label>
								<div class="input-group mb-3">
									<input type="text" name="kelas" id="kelas" class="form-control" value="<?= $info->nama_kelas ?>" readonly>
								</div>
								<label for="mapel">Mapel</label>
								<div class="input-group mb-3">
									<input type="text" name="mapel" id="mapel" class="form-control" value="<?= $info->nama_mapel ?>" readonly>
								</div>
								<label for="format_export">Format</label>
								<div class="input-group mb-3">
									<input type="text" name="format_export" id="format_print" class="form-control" value="pdf" readonly>
								</div>
								<div class="row">
									<div class="col">
										<label for="pert_awal">Pertemuan Ke-</label>
										<div class="input-group mb-3">
											<select name="pert_awal" id="pert_awal" class="form-control custom-select <?= (form_error('pert_awal')) ? 'is-invalid' : '' ?>">
												<option value="" selected>Pilih Pertemuan Ke-</option>
												<?php for ($i = 1; $i <= $tugas; $i++) : ?>
													<option value="<?= $i ?>">Pertemuan <?= $i ?></option>
												<?php endfor ?>
											</select>
											<div id="pert_awalFeedback" class="invalid-feedback">
												<?= form_error('pert_awal', '<div class="text-danger">', '</div>') ?>
											</div>
										</div>
									</div>
									<div class="col">
										<label for="pert_akhir">Sampai Pertemuan Ke-</label>
										<div class="input-group mb-3">
											<select name="pert_akhir" id="pert_akhir" class="form-control custom-select <?= (form_error('pert_akhir')) ? 'is-invalid' : '' ?>">
												<option value="" selected>Pilih Sampai Pertemuan Ke-</option>
												<?php for ($i = 1; $i <= $tugas; $i++) : ?>
													<option value="<?= $i ?>">Pertemuan <?= $i ?></option>
												<?php endfor ?>
											</select>
											<div id="pert_akhirFeedback" class="invalid-feedback">
												<?= form_error('pert_akhir', '<div class="text-danger">', '</div>') ?>
											</div>
										</div>
									</div>
								</div>
								<div class="btn-aksi mt-4 mb-2">
									<button type="submit" class="btn btn-sm btn-primary bg-blue border-0 rounded px-4 py-2 mr-3">Cetak</button>
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
