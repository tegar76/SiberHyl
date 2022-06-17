<!-- import style -->
<?php include APPPATH.'../assets/siswa/css/import_style_content.php';?>

<section class="container section section__height mt-n3" id="about">
	<div class="profile pb-5">
		<div class="row">
			<div class="col-md-4 text-center mb-3">
				<div class="card shadow py-4">
					<div class="img-photo justify-content-center">
						<?php if ($siswa->siswa_foto == 'default_foto.png') : ?>
							<img class="mx-auto d-block rounded-circle" src="<?= base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="Foto prifile siswa">
						<?php else : ?>
							<img class="mx-auto d-block rounded-circle" src="<?= base_url('storage/siswa/profile/' . $siswa->siswa_foto) ?>" width="150" alt="<?= $siswa->siswa_nama ?>">
						<?php endif ?>
					</div>
					<div class="line">
						<hr>
					</div>
					<div class="atribute">
						<h6 class="text-uppercase"><?= $siswa->siswa_nama ?></h6>
						<p class="mb-n1"><?= $siswa->nama_kelas ?></p>
						<p>Smk Kesatrian Purwokerto</p>
					</div>
					<div class="button-logout">
						<input type="hidden" id="crsf_name" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
						<a href="#" id="logout" class="btn btn-sm btn-danger px-4 logout">Logout</a>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card shadow px-3">
					<table class="table">
						<tbody>
							<tr class="table-borderless">
								<th scope="row">NIS</th>
								<td><?= $siswa->siswa_nis ?></td>
							</tr>
							<tr>
								<th scope="row">NISN</th>
								<td><?= $siswa->siswa_nisn ?></td>
							</tr>
							<th scope="row">Tempat Tanggal Lahir</th>
							<td>
								<?= ($siswa->siswa_tempatlahir) ? $siswa->siswa_tempatlahir . ", " : '-'  ?>
								<?= (!empty($siswa->siswa_tanggallahir)) ? date('d-m-Y', strtotime($siswa->siswa_tanggallahir)) : '00-00-0000' ?>
							</td>
							</tr>
							</tr>
							<th scope="row">Jenis Kelamin</th>
							<td><?= $siswa->siswa_kelamin ?></td>
							</tr>
							</tr>
							<th scope="row">Asal Kelas</th>
							<td><?= (!empty($siswa->asal_kelas)) ? $siswa->asal_kelas : ' - ' ?></td>
							</tr>
							</tr>
							<th scope="row">Email</th>
							<td><?= $siswa->siswa_email ?></td>
							</tr>
							</tr>
							<th scope="row">No. Handphone</th>
							<td><?= $siswa->siswa_telp ?></td>
							</tr>
							</tr>
							<th scope="row">Alamat</th>
							<td><?= $siswa->siswa_alamat ?></td>
							</tr>
							<th scope="row">Status Kesiswaan</th>
							<td>null</td>
							</tr>
						</tbody>
					</table>
					<hr class="mt-n3">
					<div class="button-action d-flex mb-3 mt-2">
						<a href="<?= base_url('siswa/profile/editProfile') ?>" class="btn btn-sm btn-outline-info text-info mr-2 px-4" type="submit">Edit Profile</a>
						<a href="<?= base_url('siswa/profile/editPassword') ?>" class="btn btn-sm btn-outline-info text-info px-4" type="submit">Edit Password</a>
					</div>
				</div>
			</div>
		</div>
	</div>
