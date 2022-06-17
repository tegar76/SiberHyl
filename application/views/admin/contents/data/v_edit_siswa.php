<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Siswa</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/siswa') ?>" class="text-muted">Data Siswa</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Siswa</li>
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
							<?= form_open('master/data/siswa/update_siswa/' . $this->secure->encrypt_url($student->siswa_id)) ?>
							<input type="hidden" name="siswa_id" value="<?= $student->siswa_id ?>">
							<input type="hidden" name="kelas_id" value="<?= $student->kelas_id ?>">
							<label for="nis_edit">NIS</label>
							<div class="input-group mb-3">
								<input type="text" name="nis_edit" id="nis_edit" placeholder="Masukan NIS" class="form-control <?= form_error('nis_edit') ? 'is-invalid' : '' ?>" value="<?= $student->siswa_nis ?>">
								<div class="invalid-feedback">
									<?= form_error('nis_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="nisn_edit">NISN</label>
							<div class="input-group mb-3">
								<input type="text" name="nisn_edit" id="nisn_edit" placeholder="Masukan NISN" class="form-control <?= form_error('nisn_edit') ? 'is-invalid' : '' ?>" value="<?= $student->siswa_nisn ?>">
								<div class="invalid-feedback">
									<?= form_error('nisn_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="nama_siswa_edit">Nama</label>
							<div class=" input-group mb-3">
								<input type="text" name="nama_siswa_edit" id="nama_siswa_edit" placeholder="Masukan Nama Lengkap" class="form-control <?= form_error('nama_siswa_edit') ? 'is-invalid' : '' ?>" value="<?= $student->siswa_nama ?>">
								<div class="invalid-feedback">
									<?= form_error('nama_siswa_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="tempat_lahir_edit">Tempat Lahir</label>
									<div class="input-group mb-3">
										<input type="text" name="tempat_lahir_edit" id="tempat_lahir_edit" placeholder="Masukan Tempat Lahir" class="form-control <?= form_error('tempat_lahir_edit') ? 'is-invalid' : '' ?>" value="<?= $student->siswa_tempatlahir ?>">
										<div class="invalid-feedback">
											<?= form_error('tempat_lahir_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="tanggal_lahir_edit">Tanggal Lahir</label>
									<div class="input-group mb-3">
										<input type="date" name="tanggal_lahir_edit" id="tanggal_lahir_edit" placeholder="Masukan Tanggal Lahir" class="form-control <?= form_error('tanggal_lahir_edit') ? 'is-invalid' : '' ?>" value="<?= $student->siswa_tanggallahir ?>">
										<div class="invalid-feedback">
											<?= form_error('tanggal_lahir_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="jenis_kelamin_edit">Jenis Kelamin</label>
							<div class="input-group mb-3">
								<div class="form-check ml-3 mr-3">
									<input class="form-check-input" type="radio" name="jenis_kelamin_edit" id="jenis_kelaminL" value="Laki-laki" <?= ($student->siswa_kelamin == 'Laki-laki') ? 'checked' : '' ?>>
									<label class="form-check-label" for="jenis_kelaminL">
										Laki-laki
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="jenis_kelamin_edit" id="jenis_kelaminP" value="Perempuan" <?= ($student->siswa_kelamin == 'Perempuan') ? 'checked' : '' ?>>
									<label class="form-check-label" for="jenis_kelaminP">
										Perempuan
									</label>
								</div>
								<?= form_error('jenis_kelamin_edit', '<div class="text-danger">', '</div>') ?>
							</div>
							<div class="row">
								<div class="col">
									<label for="email_edit">Email</label>
									<div class="input-group mb-3">
										<input type="text" name="email_edit" id="email_edit" placeholder="Masukan Email" class="form-control <?= form_error('email_edit') ? 'is-invalid' : '' ?>" value="<?= $student->siswa_email ?>">
										<div class="invalid-feedback">
											<?= form_error('email_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="no_telp_edit">No. Handphone</label>
									<div class="input-group mb-3">
										<input type="text" name="no_telp_edit" id="no_telp_edit" placeholder="Masukan No. Handphone" class="form-control <?= form_error('no_telp_edit') ? 'is-invalid' : '' ?>" value="<?= $student->siswa_telp ?>">
										<div class="invalid-feedback">
											<?= form_error('no_telp_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="alamat_edit">Alamat</label>
							<div class="input-group mb-3">
								<textarea name="alamat_edit" id="alamat_edit" class="form-control <?= form_error('alamat_edit') ? 'is-invalid' : '' ?>"><?= $student->siswa_alamat ?></textarea>
								<div class="invalid-feedback">
									<?= form_error('alamat_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="kelas_siswa">Kelas</label>
							<div class=" input-group mb-3">
								<input type="text" name="kelas_siswa" id="kelas_siswa" placeholder="Masukan Nama Lengkap" class="form-control <?= form_error('kelas_siswa') ? 'is-invalid' : '' ?>" value="<?= $student->nama_kelas ?>" readonly>
								<div class="invalid-feedback">
									<?= form_error('kelas_siswa', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="pilih-jurusan-siswa">Update Jurusan</label>
							<div class="input-group mb-3">
								<select class="custom-select <?= form_error('jurusan_edit') ? 'is-invalid' : '' ?>" id="pilih-jurusan-siswa" name="jurusan_edit">
								</select>
								<div class="invalid-feedback">
									<?= form_error('jurusan_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="pilih-kelas-siswa">Update Kelas</label>
									<div class="input-group mb-3">
										<select class="custom-select <?= form_error('kelas_edit') ? 'is-invalid' : '' ?>" id="pilih-kelas-siswa" name="kelas_edit">
										</select>
										<div class="invalid-feedback">
											<?= form_error('kelas_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="asal-kelas-siswa">Asal Kelas</label>
									<div class="input-group mb-3">
										<input type="text" name="asal_kelas_edit" id="asal-kelas-siswa" placeholder="Masukan Asal Kelas" class="form-control <?= form_error('asal_kelas_edit') ? 'is-invalid' : '' ?>" value="<?= $student->asal_kelas ?>">
										<div class="invalid-feedback">
											<?= form_error('asal_kelas_edit', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="password">Password Baru</label>
									<div class="input-group mb-3">
										<input type="text" name="password" id="password" placeholder="Masukan Password (minimal 8 karakter)" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" value="<?= set_value('password') ?>">
										<div class="invalid-feedback">
											<?= form_error('password', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
								<div class="col">
									<label for="conf_pass">Konfirmasi Password</label>
									<div class="input-group mb-3">
										<input type="text" name="conf_pass" id="conf_pass" placeholder="Masukan Konfirmasi Password" class="form-control <?= form_error('conf_pass') ? 'is-invalid' : '' ?>" value="<?= set_value('conf_pass') ?>">
										<div class="invalid-feedback">
											<?= form_error('conf_pass', '<div class="text-danger">', '</div>') ?>
										</div>
									</div>
								</div>
							</div>
							<label for="status_siswa">Status</label>
							<div class="input-group mb-3">
								<div class="form-check ml-3 mr-3">
									<input class="form-check-input" type="radio" name="status_siswa" id="status_siswaA" value="Aktif" <?= ($student->status == 'Aktif') ? 'checked' : '' ?>>
									<label class="form-check-label" for="status_siswaA">
										Aktif
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status_siswa" id="status_siswaT" value="Tidak Aktif" <?= ($student->status == 'Tidak Aktif') ? 'checked' : '' ?>>
									<label class="form-check-label" for="status_siswaT">
										Tidak Aktif
									</label>
								</div>
							</div>
							<div class="btn-aksi">
								<button type="submit" class="btn btn-sm btn-success rounded px-4 py-2 mr-3">Update</button>
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
