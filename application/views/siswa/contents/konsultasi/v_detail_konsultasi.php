<!-- import style -->
<?php include APPPATH.'../assets/siswa/css/import_style_content.php';?>

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
                                                Sulton Akbar Pamungkas, S.Pd.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subjek mt-3 mb-2">Judul Konsultasi</div>
                            <div class="pesan mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, error!</div>
							<form action="">
								<textarea name="text-area-pesan" placeholder="Masukan Pesan" class="form-control mb-3" id="text-area-pesan"></textarea>
								<button type="submit" class="btn btn-sm btn-info rounded px-4 py-1 mr-3">Kirim</button>
							</form>
							<hr class="mt-4">
							<div class="jml-komen mt-3 mb-2">
								Komentar <span>3</span>
							</div>
							<div id="display_forum">
								<div class="media mb-2">
									<img src="http://localhost/WiyataV1/storage/siswa/profile/IMG_.png" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px;">
									<div class="media-body">
										<div class="row">
											<div class="col-sm-10">
												<div class="nama-small">Siswa 1</div>
												<div class="post-on mb-2">Posted on</div>
												<div class="komen">Baik pak, sementara ini belum ada pertanyaan</div>
												<div class="balas"><a href="#" onclick="fokus()">Balas</a></div>
											</div>
										</div>
									</div>
								</div> 
								<hr>
								<div class="media mb-2" style="margin-left:48px">
									<img src="http://localhost/WiyataV1/storage/siswa/profile/IMG_.png" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px;">
									<div class="media-body">
										<div class="row">
											<div class="col-sm-10">
												<div class="nama-small">Sulton Akbar Pamungkas, S. Pd.</div>
												<div class="post-on mb-2">Posted on</div>
												<div class="komen">Baik pak, sementara ini belum ada pertanyaan</div>
												<div class="balas"><a href="#" onclick="fokus()">Balas</a></div>
											</div>
										</div>
									</div>
								</div>
								<hr>		
								<div class="media mb-2">
									<img src="http://localhost/WiyataV1/storage/siswa/profile/IMG_.png" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px;">
									<div class="media-body">
										<div class="row">
											<div class="col-sm-10">
												<div class="nama-small">Siswa 2</div>
												<div class="post-on mb-2">Posted on</div>
												<div class="komen">Baik pak, sementara ini belum ada pertanyaan</div>
												<div class="balas"><a href="#" onclick="fokus()">Balas</a></div>
											</div>
										</div>
									</div>
								</div> 
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