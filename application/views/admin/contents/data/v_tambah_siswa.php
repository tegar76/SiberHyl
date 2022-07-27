<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Tambah Siswa</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/siswa') ?>" class="text-muted">Data Siswa</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Siswa</li>
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
							<?= form_open('master/data/siswa/tambah_siswa') ?>
							<label for="nis">NIS</label>
							<div class="input-group mb-3">
								<input type="text" name="nis" id="nis" placeholder="Masukan NIS" class="form-control <?= form_error('nis') ? 'is-invalid' : '' ?>" value="<?= set_value('nis') ?>">
								<div class="invalid-feedback">
									<?= form_error('nis', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="nisn">NISN</label>
							<div class="input-group mb-3">
								<input type="text" name="nisn" id="nisn" placeholder="Masukan NISN" class="form-control <?= form_error('nisn') ? 'is-invalid' : '' ?>" value="<?= set_value('nisn') ?>">
								<div class="invalid-feedback">
									<?= form_error('nisn', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="nama_siswa">Nama</label>
							<div class=" input-group mb-3">
								<input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukan Nama Lengkap" class="form-control <?= form_error('nama_siswa') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_siswa') ?>">
								<div class="invalid-feedback">
									<?= form_error('nama_siswa', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="tempat_lahir">Tempat Lahir</label>
									<div class="input-group mb-3">
										<input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control <?= form_error('tempat_lahir') ? 'is-invalid' : '' ?>" value="<?= set_value('tempat_lahir') ?>" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31">
										<div class="invalid-feedback">
											<?= form_error('tempat_lahir', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="tanggal_lahir">Tanggal Lahir</label>
									<div class="input-group mb-3">
										<input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" class="form-control <?= form_error('tanggal_lahir') ? 'is-invalid' : '' ?>" value="<?= set_value('tanggal_lahir') ?>">
										<div class="invalid-feedback">
											<?= form_error('tanggal_lahir', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="jenis_kelamin">Jenis Kelamin</label>
							<div class="input-group mb-3">
								<div class="form-check ml-3 mr-3">
									<input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelaminL" value="Laki-laki" checked>
									<label class="form-check-label" for="jenis_kelaminL">
										Laki-laki
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelaminP" value="Perempuan">
									<label class="form-check-label" for="jenis_kelaminP">
										Perempuan
									</label>
								</div>
								<?= form_error('jenis_kelamin', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="row">
								<div class="col">
									<label for="email">Email</label>
									<div class="input-group mb-3">
										<input type="text" name="email" id="email" placeholder="Masukan Email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" value="<?= set_value('email') ?>">
										<div class="invalid-feedback">
											<?= form_error('email', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="no_telp">No. Handphone</label>
									<div class="input-group mb-3">
										<input type="text" name="no_telp" id="no_telp" placeholder="Masukan No. Handphone" class="form-control <?= form_error('no_telp') ? 'is-invalid' : '' ?>" value="<?= set_value('no_telp') ?>">
										<div class="invalid-feedback">
											<?= form_error('no_telp', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="alamat">Alamat</label>
							<div class="input-group mb-3">
								<textarea name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>"><?= set_value('alamat') ?></textarea>
								<div class="invalid-feedback">
									<?= form_error('alamat', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="pilih-jurusan-siswa">Jurusan</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= form_error('jurusan') ? 'is-invalid' : '' ?>" id="pilih-jurusan-siswa" name="jurusan">
								</select>
								<div class="invalid-feedback">
									<?= form_error('kelas', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="pilih-kelas-siswa">Kelas</label>
									<div class="input-group mb-3">
										<select class="custom-select <?= form_error('kelas') ? 'is-invalid' : '' ?>" id="pilih-kelas-siswa" name="kelas">
										</select>
										<div class="invalid-feedback">
											<?= form_error('kelas', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="asal_kelas">Asal Kelas</label>
									<div class="input-group mb-3">
										<input type="text" name="asal_kelas" id="asal_kelas" placeholder="Masukan Asal Kelas" class="form-control <?= form_error('asal_kelas') ? 'is-invalid' : '' ?>" value="<?= set_value('asal_kelas') ?>">
										<div class="invalid-feedback">
											<?= form_error('asal_kelas', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-aksi">
								<button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
								<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset</button>
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