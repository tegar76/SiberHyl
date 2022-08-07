<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height mt-n3" id="about">
	<div class="edit-profile pb-5">
		<?= form_open_multipart('siswa/profile/editProfile') ?>
		<div class="row">
			<div class="col-md-4 text-center mb-3">
				<div class="card shadow py-4">
					<div class="img-photo justify-content-center">
						<img class="mx-auto d-block rounded-circle" src="<?= ($siswa->siswa_foto == 'default_foto.png') ? base_url('assets/siswa/img/profile-default-siswa.png') : base_url('storage/siswa/profile/' . $siswa->siswa_foto) ?>" width="150" id="imagePreview" alt="<?= ($siswa->siswa_foto == 'default_foto.png') ? 'Foto Profile Siswa' : $siswa->siswa_nama ?>">
					</div>
					<div class="line">
						<hr>
					</div>
					<div class="edit">
						<h6>Edit Foto Profile</h6>
						<!-- actual upload which is hidden -->
						<input type="file" id="imgInp" name="image" hidden />

						<label for="imgInp">Pilih File</label>
						<div class="max-file">
							<p>File Max 2MB</p>
						</div>
						<div class="file-dipilih mt-n3">
							<p>Nama File : <span id="file-chosen">Belum ada yang dipilih</span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card shadow px-3 pt-3">
					<div class="edit">
						<h6>Edit Profile</h6>
						<hr>
					</div>
					<div class="form-group">
						<label for="">NIS</label>
						<input type="text" class="form-control" value="<?= $siswa->siswa_nis ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">NISN</label>
						<input type="text" class="form-control" value="<?= $siswa->siswa_nisn ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir</label>
						<input type="text" class="form-control" value="<?= $siswa->siswa_tempatlahir ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir</label>
						<input type="text" class="form-control" value="<?= ($siswa->siswa_tanggallahir == '0000-00-00') ? '-' : date('d-m-Y', strtotime($siswa->siswa_tanggallahir)) ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Jenis Kelamin</label>
						<input type="text" class="form-control" value="<?= $siswa->siswa_kelamin ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Kelas</label>
						<input type="text" class="form-control" value="<?= $siswa->nama_kelas ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Asal Kelas</label>
						<input type="text" class="form-control" value="<?= $siswa->asal_kelas ?>" readonly>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" id="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" name="email" value="<?= $siswa->siswa_email ?>">
						<?= form_error('email', '<div class="text-danger">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="telepon">No Handphone</label>
						<input type="text" id="telepon" class="form-control <?= (form_error('telepon')) ? 'is-invalid' : '' ?>" name="telepon" value="<?= $siswa->siswa_telp ?>">
						<?= form_error('telepon', '<div class="text-danger">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea id="alamat" class="form-control <?= (form_error('alamat')) ? 'is-invalid' : '' ?>" name="alamat" value="<?= $siswa->siswa_alamat ?>"><?= form_error('alamat', '<div class="text-danger">', '</div>') ?></textarea>
					</div>
					<div class="button-action mb-3 mt-2">
						<button type="submit" name="update" class="btn btn-sm btn-success mr-2 px-4">Update</button>
						<button type="reset" class="btn btn-sm btn-secondary px-4">Reset</button>
					</div>
				</div>
			</div>
		</div>
		<?= form_close() ?>
	</div>

	<script>
		// js upload file foto
		const actualBtn = document.getElementById('imgInp');

		const fileChosen = document.getElementById('file-chosen');

		actualBtn.addEventListener('change', function() {
			fileChosen.textContent = this.files[0].name
		})
	</script>
