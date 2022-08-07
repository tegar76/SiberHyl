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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/tugas_harian/' . $result['jadwal_id']) ?>" class="text-muted">Tugas Harian</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/detail_tugas_harian/' . $result['tugas_id']) ?>" class="text-muted">Detail Tugas Harian</a></li>
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
						<?= form_open('guru/pembelajaran/process_nilai') ?>
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="nis">NIS</label>
								<div class="input-group mb-3">
									<input type="text" name="nis" id="nis" class="form-control" value="<?= $result['nis'] ?>" readonly>
								</div>
								<label for="nama">Nama</label>
								<div class="input-group mb-3">
									<input type="text" name="nama" id="nama" class="form-control" value="<?= $result['nama'] ?>" readonly>
								</div>
								<label for="upload">Tanggal Pengumpulan</label>
								<div class="input-group mb-3">
									<input type="text" name="upload" id="upload" class="form-control" value="<?= $result['upload'] ?>" readonly>
								</div>
								<label for="metode">Metode Pengumpulan</label>
								<div class="input-group mb-3">
									<input type="text" name="metode" id="metode" class="form-control" value="<?= $result['metode'] ?>" readonly>
								</div>
								<label for="file">File Jawaban</label>
								<div class="input-group mb-3">
									<?php if ($result['metode'] == 'online') : ?>
										<?php if ($result['file_ext'] == '.pdf') : ?>
											<a target="_blank" href="<?= base_url('guru/pembelajaran/file_tugas_siswa/pdf/' . $result['file']) ?>"><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a>
										<?php else : ?>
											<a target="_blank" href="<?= base_url('guru/pembelajaran/file_tugas_siswa/img/' . $result['file']) ?>"><img src="<?= base_url('assets/admin/icons/img.png') ?>" alt=""></a>
										<?php endif ?>
									<?php elseif ($result['metode'] == 'langsung') : ?>
										<div class="h6 text-secondary opacity-7">Pengumpulan secara langsung</div>
									<?php elseif (empty($result['file'])) : ?>
										<div class="h6 text-secondary opacity-7">File Jawaban Kosong!!</div>
									<?php endif ?>
								</div>
								<label for="komentar">Komentar</label>
								<div class="input-group mb-3">
									<textarea name="komentar" id="komentar" placeholder="Masukan Komentar" class="form-control"><?= $result['komentar'] ?></textarea>
								</div>
								<label for="nilai">Nilai</label>
								<div class="input-group mb-3">
									<input type="number" name="nilai" id="nilai" class="form-control <?= (form_error('nilai')) ? 'is-invalid' : '' ?>" placeholder="Masukan Nilai Dengan Akumulasi 10 -100" value="<?= $result['nilai'] ?>">
									<div id="nilai" class="invalid-feedback">
										<?= form_error('nilai', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<input type="hidden" name="tugas_id" value="<?= $result['tugas_id'] ?>">
								<input type="hidden" name="tugas_siswa_id" value="<?= $result['id'] ?>">
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
