<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Tambah Kelas</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Master Data</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('master/data/kelas') ?>" class="text-muted">Data Kelas</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Kelas</li>
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
					<?= ($this->session->flashdata('kode_kelas')) ? '<small class="text-danger mt-2">' . $this->session->flashdata('kode_kelas') . '</small>' : '' ?>
					<div class="card shadow mb-4">
						<div class="container my-3">
							<?= form_open('master/data/kelas/tambah_kelas') ?>
							<label for="index_kelas">Index Kelas</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('index_kelas')) ? 'is-invalid' : '' ?>" id="index_kelas" name="index_kelas" title="Pilih Index Kelas">
									<option value="" selected>Pilih Index Kelas</option>
									<option value="X" <?= (set_value('index_kelas') == "X") ? 'selected' : '' ?>>Kelas X</option>
									<option value="XI" <?= (set_value('index_kelas') == "XI") ? 'selected' : '' ?>>Kelas XI</option>
									<option value="XII" <?= (set_value('index_kelas') == "XII") ? 'selected' : '' ?>>Kelas XII</option>
								</select>
								<div class="invalid-feedback">
									<?= form_error('index_kelas', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="kode_jurusan">Jurusan</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('kode_jurusan')) ? 'is-invalid' : '' ?>" id="kode_jurusan" name="kode_jurusan" title="Pilih Jurusan">
									<option value="" selected>Pilih Jurusan Kelas</option>
									<?php foreach ($jurusan as $row => $value) : ?>
										<option value="<?= $value->kode_jurusan ?>" <?= (set_value('kode_jurusan') == $value->kode_jurusan) ? 'selected' : '' ?>><?= $value->kode_jurusan ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('kode_jurusan', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="kelas_ke">Kelas ke</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control custom-select <?= (form_error('kelas_ke')) ? 'is-invalid' : '' ?>" id="kelas_ke" name="kelas_ke" placeholder="kelas ke" value="<?= set_value('kelas_ke') ?>">
								<div class="invalid-feedback">
									<?= form_error('kelas_ke', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<label for="kode_guru">Wali Kelas</label>
							<div class="input-group mb-3">
								<select class="form-control custom-select <?= (form_error('kode_guru')) ? 'is-invalid' : '' ?>" id="kode_guru" name="kode_guru" title="Pilih Kode Guru">
									<option value="" selected>Pilih Guru yang menjadi wali kelas</option>
									<?php foreach ($guru as $row => $value) : ?>
										<option value="<?= $value->guru_nip ?>" <?= (set_value('kode_guru') == $value->guru_kode) ? 'selected' : '' ?>><?= $value->guru_nama ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?= form_error('kode_guru', '<div class="text-danger">', '</div>') ?>
								</div>
							</div>
							<div class="btn-aksi">
								<button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
								<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset Form</button>
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
