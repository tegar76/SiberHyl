<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">

	<?= form_open('siswa/diskusi/tambah_diskusi/' . $this->secure->encrypt_url($info->jadwal_id)) ?>
	<input type="hidden" name="jadwal_id" value="<?= $info->jadwal_id ?>">
	<input type="hidden" name="nama_siswa" value="<?= $siswa->siswa_nama ?>">
	<div class="title-form mb-1">
		Form Tambah Diskusi Baru
	</div>
	<div class="sub-title-form mb-3">
		<?= $info->nama_mapel . ' - ' . $info->nama_kelas ?>
	</div>
	<label for="judul_diskusi">Judul</label>
	<div class="input-group mb-3">
		<input type="text" name="judul_diskusi" id="judul_diskusi" class="form-control <?= (form_error('judul_diskusi')) ? 'is-invalid' : '' ?>" value="<?= set_value('judul_diskusi') ?>" placeholder="Masukan Judul Diskusi">
		<div id="judul_diskusiFeedback" class="invalid-feedback">
			<?= form_error('judul_diskusi', '<div class="text-danger">', '</div>') ?>
		</div>
	</div>
	<label for="deskripsi">Deskripsi</label>
	<div class="input-group mb-3">
		<textarea name="deskripsi" class="form-control <?= (form_error('deskripsi')) ? 'is-invalid' : '' ?>" placeholder="Masukan Deskripsi Pembahasan"><?= set_value('deskripsi') ?></textarea>
		<div id="deskripsiFeedback" class="invalid-feedback">
			<?= form_error('deskripsi', '<div class="text-danger">', '</div>') ?>
		</div>
	</div>
	<div class="btn-aksi mb-4">
		<button type="submit" class="btn btn-sm btn-info rounded px-4 py-1 mr-3">Simpan</button>
		<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
	</div>
	<?= form_close() ?>
