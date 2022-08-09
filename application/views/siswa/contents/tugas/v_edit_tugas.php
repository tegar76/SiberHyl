<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">

	<?= form_open_multipart('siswa/ruang_tugas/edit_tugas/' . $this->secure->encrypt_url($tugas->tugas_siswa_id)) ?>
	<input type="hidden" name="tugas_siswa_id" value="<?= $tugas->tugas_siswa_id ?>">
	<div class="title-form mb-1">
		Form Edit Tugas (Online)
	</div>
	<div class="sub-title-form mb-3">
		<?= $tugas->nama_mapel ?> - Tugas <?= $tugas->pertemuan . ' (' . $tugas->judul_tugas . ')' ?>
	</div>
	<label for="nama">Nama</label>
	<div class="input-group mb-3">
		<input type="text" name="nama" id="nama" class="form-control" value="<?= $siswa->siswa_nama ?>" readonly>
	</div>
	<label for="kelas">Kelas</label>
	<div class="input-group mb-3">
		<input type="text" name="kelas" id="kelas" class="form-control" value="<?= $siswa->nama_kelas ?>" readonly>
	</div>
	<label for="update_tugas">Upload File</label>
	<div class="input-group mb-3">
		<input type="file" name="update_tugas" id="update_tugas" class="form-control <?= (form_error('update_tugas')) ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
			<?= form_error('update_tugas', '<div class="text-danger">', '</div>') ?>
		</div>
	</div>
	<div class="input-group mb-4">
		<p>* Upload Tugas dengan ukuran File max 2mb</p>
	</div>
	<div class="btn-aksi mb-4">
		<button type="submit" class="btn btn-sm btn-success rounded px-4 py-1 mr-3">Update</button>
		<button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
	</div>
	<div class="ketentuan pb-4">
		<h6>Ketentuan :</h6>
		<p>Tugas dikumpulkan bisa dalam bentuk PDF, PNG, JPG, JPEG. Jika penulisan tugas dengan metode tulis tangan dan jawabannya lebih 1 (satu) lembar. Maka untuk pengumpulan tugas di <span class="app-name">SiberHyl</span> dianjurkan untuk menggabungkan jawaban-jawaban tersebut menajadi 1 (satu) file terlebih dahulu. <span class="panduan"><a target="_blank" href="<?= base_url('siswa/ruang_tugas/panduan_pengumpulan_tugas') ?>">Berikut Panduannya</a></span></p>
	</div>
	<?= form_close() ?>
