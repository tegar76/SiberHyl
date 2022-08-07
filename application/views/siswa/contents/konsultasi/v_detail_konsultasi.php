<!-- import style -->
<?php include APPPATH . '../assets/siswa/css/import_style_content.php'; ?>

<section class="container section section__height">
	<div class="col-md-12 mb-4 mt-2 p-0 pb-3">
		<!-- looping komentar -->
		<div class="card shadow border-top border-left border-right border-bottom h-100 py-2 p-0 mb-3">
			<div class="card-body">
				<section>
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="row">
								<div class="card p-1 rounded mr-2 mb-2 ml-3 mt-n2 border border-custom-blue">
									<div class="row no-gutters align-items-center">
										<div class="col">
											<div class="nama-big mx-2">
												<i class="fa fa-user mr-1"></i>
												<?= $detail->pembuat ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="subjek mt-3 mb-2"><?= $detail->judul ?></div>
							<div class="pesan mb-3"><?= $detail->deskripsi ?></div>
							<?= form_open('#', ['id' => 'submit-konsultasi']) ?>
							<textarea name="message" placeholder="Masukan Pesan" class="form-control mb-3" id="text-message-konsultasi"></textarea>
							<input type="hidden" name="forum_diskusi_id" id="id_forum" value="<?= $detail->forum_id ?>">
							<input type="hidden" name="user_id" value="<?= $siswa->siswa_nis ?>">
							<input type="hidden" name="parent_diskusi_id" id="konsultasi_id" value="0" />
							<button type="submit" class="btn btn-sm btn-primary bg-blue border-0 rounded px-4 py-1 mr-3">Kirim</button>
							<?= form_close() ?>
							<hr class="mt-4">
							<div class="jml-komen mt-3 mb-2">
								Komentar <span><?= count($reply) ?></span>
							</div>
							<div id="display_konsultasi">
								<!-- isi diskusi akan tampil disini -->
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<!-- <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Belum Ada Forum Diskusi</h4>
        <hr>
        <p class="mb-0">Silahkan buat forum diskusi baru dengan klik tombol tambah diskusi</p>
    </div> -->
	</div>

	<script>
		var input = document.getElementById('text-area-pesan');

		function fokus() {
			input.focus();
		}
	</script>
