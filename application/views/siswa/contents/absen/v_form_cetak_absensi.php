<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">

	<?= form_open('siswa/eksport/absensi/' . $this->secure->encrypt_url($result->jadwal_id)) ?>
	<input type="hidden" name="jadwal_id" value="<?= $result->jadwal_id ?>">
	<input type="hidden" name="siswa_nis" value="<?= $this->session->userdata('nis') ?>">
	<div class="title-form mb-3">
		Form Cetak Reporting Absensi Siswa
	</div>
	<label for="kode_guru">Kode Guru</label>
	<div class="input-group mb-3">
		<input type="text" name="kode_guru" id="kode_guru" class="form-control" value="<?= $result->guru_kode ?>" readonly>
	</div>
	<label for="kelas">Kelas</label>
	<div class="input-group mb-3">
		<input type="text" name="kelas" id="kelas" class="form-control" value="<?= $result->nama_kelas ?>" readonly>
	</div>
	<label for="mapel">Mapel</label>
	<div class="input-group mb-3">
		<input type="text" name="mapel" id="mapel" class="form-control" value="<?= $result->nama_mapel ?>" readonly>
	</div>
	<label for="format_print">Format</label>
	<div class="input-group mb-3">
		<input type="text" name="format_export" id="format_print" class="form-control" value="pdf" readonly>
	</div>
	<label for="pert_awal">Pertemuan Ke-</label>
	<div class="input-group mb-3">
		<select name="pert_awal" id="pert_awal" class="form-control custom-select <?= (form_error('pert_awal')) ? 'is-invalid' : '' ?>">
			<option value="" selected>Pilih Pertemuan Ke-</option>
			<?php for ($i = 1; $i <= $pertemuan; $i++) : ?>
				<option value="<?= $i ?>">Pertemuan <?= $i ?></option>
			<?php endfor ?>
		</select>
		<div id="pert_awal" class="invalid-feedback">
			<?= form_error('pert_awal', '<div class="text-danger">', '</div>') ?>
		</div>
	</div>
	<label for="pert_akhir">Sampai Pertemuan Ke-</label>
	<div class="input-group mb-3">
		<select name="pert_akhir" id="pert_akhir" class="form-control custom-select <?= (form_error('pert_akhir')) ? 'is-invalid' : '' ?>">
			<option value="" selected>Pilih Sampai Pertemuan Ke-</option>
			<?php for ($i = 1; $i <= $pertemuan; $i++) : ?>
				<option value="<?= $i ?>">Pertemuan <?= $i ?></option>
			<?php endfor ?>
		</select>
		<div id="pert_akhir" class="invalid-feedback">
			<?= form_error('pert_akhir', '<div class="text-danger">', '</div>') ?>
		</div>
	</div>
	<div class="btn-aksi mb-4">
		<button type="submit" name="print" class="btn btn-sm btn-primary rounded px-4 py-1 mr-3">Kirim</button>
		<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
	</div>
	<?= form_close() ?>
