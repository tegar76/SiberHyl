<link rel="stylesheet" href="<?= base_url('assets/siswa/css/profile/stylesss.css') ?>">

<section class="container section section__height mt-n3" id="about">
	<div class="edit-profile">
		<?= form_open_multipart('siswa/profile/editProfile') ?>
		<div class="row">
			<div class="col-md-4 text-center mb-3">
				<div class="card shadow py-4">
					<div class="img-photo justify-content-center">
						<img class="mx-auto d-block rounded-circle" src="<?= ($siswa['siswa_foto'] == 'default_foto.png') ? base_url('assets/siswa/img/profile-default-siswa.png') : base_url('storage/siswa/profile/' . $siswa['siswa_foto']) ?>" width="150" id="imagePreview" alt="<?= ($siswa['siswa_foto'] == 'default_foto.png') ? 'Foto Profile Siswa' : $siswa['siswa_nama'] ?>">
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
						<input type="text" class="form-control" value="<?= $siswa['siswa_nis'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">NISN</label>
						<input type="text" class="form-control" value="<?= $siswa['siswa_nisn'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Tempat Lahir</label>
						<input type="text" class="form-control" value="<?= $siswa['siswa_tempatlahir'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Tanggal Lahir</label>
						<input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($siswa['siswa_tanggallahir'])) ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Jenis Kelamin</label>
						<input type="text" class="form-control" value="<?= $siswa['siswa_kelamin'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Kelas</label>
						<input type="text" class="form-control" value="<?= $siswa['nama_kelas'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Asal Kelas</label>
						<input type="text" class="form-control" value="<?= $siswa['asal_kelas'] ?>" readonly>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" id="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" name="email" value="<?= $siswa['siswa_email'] ?>">
						<?= form_error('email', '<div class="text-danger">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="telepon">No Handphone</label>
						<input type="text" id="telepon" class="form-control <?= (form_error('telepon')) ? 'is-invalid' : '' ?>" name="telepon" value="<?= $siswa['siswa_telp'] ?>">
						<?= form_error('telepon', '<div class="text-danger">', '</div>') ?>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" id="alamat" class="form-control <?= (form_error('alamat')) ? 'is-invalid' : '' ?>" name="alamat" value="<?= $siswa['siswa_alamat'] ?>">
						<?= form_error('alamat', '<div class="text-danger">', '</div>') ?>
					</div>
					<div class="button-action d-flex mb-3 mt-2">
						<button type="submit" class="btn btn-sm btn-primary mr-2 px-4" type="submit">Simpan</button>
						<button type="reset" class="btn btn-sm btn-secondary px-4" type="submit">Reset</button>
					</div>
				</div>
			</div>
		</div>
		<?= form_close() ?>
	</div>

	<footer>
		<center>
			<p>&copy; 2022 Team Paradoks Technology</p>
		</center>
	</footer>
</section>

<script>
	// js upload file foto
	const actualBtn = document.getElementById('actual-btn');

	const fileChosen = document.getElementById('file-chosen');

	actualBtn.addEventListener('change', function() {
		fileChosen.textContent = this.files[0].name
	})

	$(function() {
		$("#imgInp").on("change", function() {
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) {
				$("#imagePreview").css("background", "transparent");
			}; // no file selected, or no FileReader support
			if (/^image/.test(files[0].type)) { // only image file
				var reader = new FileReader(); // instance of the FileReader
				reader.readAsDataURL(files[0]); // read the local file

				reader.onloadend = function() { // set image data as background of div
					$("#imagePreview").css({
						"background-image": "url(" + this.result + ")",
						"background-size": "cover",
						"background-position": "center center"
					});
				}
			}
		});
	});
</script>