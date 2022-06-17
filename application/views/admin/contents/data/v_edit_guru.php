<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Edit Guru</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/guru') ?>" class="text-muted">Data Guru</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Edit Guru</li>
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
							<?= form_open('master/data/guru/update_guru/' . $this->secure->encrypt_url($guru->guru_id)) ?>
							<input type="hidden" name="guru_id" value="<?= $guru->guru_id ?>">
							<label for="kode_guru_edit">Kode</label>
							<div class="input-group mb-3">
								<input type="text" name="kode_guru_edit" id="kode_guru_edit" placeholder="Masukan Kode Guru" class="form-control <?= form_error('kode_guru_edit') ? 'is-invalid' : '' ?>" value="<?= $guru->guru_kode ?>">
								<div class="invalid-feedback">
									<?= form_error('kode_guru_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="guru_nip_edit">NIP</label>
							<div class="input-group mb-3">
								<input type="text" name="guru_nip_edit" id="guru_nip_edit" placeholder="Masukan NIP" class="form-control <?= form_error('guru_nip_edit') ? 'is-invalid' : '' ?>" value="<?= $guru->guru_nip ?>">
								<div class="invalid-feedback">
									<?= form_error('guru_nip_edit', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="nama_guru_edit">Nama</label>
							<div class="input-group mb-3">
								<input type="text" name="nama_guru_edit" id="nama_guru_edit" placeholder="Masukan Nama Guru" class="form-control <?= form_error('nama_guru_edit') ? 'is-invalid' : '' ?>" value="<?= $guru->guru_nama ?>">
								<div class="invalid-feedback">
									<?= form_error('nama_guru_edit', '<div class="text-danger">', '</div>') ?>
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
