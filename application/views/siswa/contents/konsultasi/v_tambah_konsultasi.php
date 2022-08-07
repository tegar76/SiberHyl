<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">

	<?= form_open('siswa/konsultasi/konsultasi_baru') ?>
	<input type="hidden" name="kelas_id" value="<?= $siswa->kelas_id ?>">
	<div class="title-form mb-3">
		Form Tambah Konsultasi Baru
	</div>
	<label for="nis">NIS</label>
	<div class="input-group mb-3">
		<input type="text" name="nis" id="nis" class="form-control" value="<?= $siswa->siswa_nis ?>" readonly>
	</div>
	<label for="nama_siswa">Nama</label>
	<div class="input-group mb-3">
		<input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= $siswa->siswa_nama ?>" readonly>
	</div>
	<label for="judul">Judul</label>
	<div class="input-group mb-3">
		<input type="text" name="judul" id="judul" class="form-control <?= (form_error('judul')) ? 'is-invalid' : '' ?>" placeholder="Masukan Judul Pembahasan" value="<?= set_value('judul') ?>">
		<div class="invalid-feedback">
			<?= form_error('judul', '<div class="text-danger">', '</div>') ?>
		</div>
	</div>
	<label for="deskripsi">Deskripsi Pembahasan</label>
	<div class="input-group mb-3">
		<textarea class="form-control <?= (form_error('deskripsi')) ? 'is-invalid' : '' ?>" name="deskripsi" placeholder="Masukan Deskripsi Pembahasan"><?= set_value('deskripsi') ?></textarea>
		<div class="invalid-feedback">
			<?= form_error('deskripsi', '<div class="text-danger">', '</div>') ?>
		</div>
	</div>
	<div class="btn-aksi mb-4">
		<button type="submit" name="send" class="btn btn-sm btn-info rounded px-4 py-1 mr-3">Simpan</button>
		<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
	</div>
	<?= form_close() ?>
