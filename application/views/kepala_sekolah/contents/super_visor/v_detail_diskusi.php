<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/SuperVisor') ?>" class="text-muted">Super Visor</a></li>
							<!-- arahkan ke filter kelas sesuai yng diklik misal kelas XI TKRO 1 -->
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/SuperVisor') ?>" class="text-muted">XI TKRO 1</a></li>
							<!-- arahkan ke kelas sesuai yng diklik misal kelas XI TKRO 1 -->
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/SuperVisor/tugasHarian') ?>" class="text-muted">Diskusi</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title?></li>
						</ol>
					</nav>
				</div>
			</div>
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

		<div class="row">
			<div class="col-12 p-0">
            <div class="container">
                    <!-- looping komentar -->
                    <div class="card shadow border-top border-left border-right border-bottom h-100 py-2 p-0 mb-3">
                        <div class="card-body">
                            <section>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="row">
                                            <!-- <a href="<?= base_url('Siswa/Diskusi/detailDiskusi')?>" class="ml-3 mt-n2">
                                                <div class="card comment p-1 border border-custom-blue rounded">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col">
                                                            <div class="text-xs ml-2 mr-2">
                                                                Komentar
                                                                <button class="border-0 rounded ml-1 mr-1 px-2">1</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a> -->
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
                                        <div class="subjek mt-3 mb-2">Judul Diskusi</div>
                                        <div class="pesan mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, error!</div>
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
                                                            <div class="post-on mb-2">Posted on 05-01-2022 20.00 WIB</div>
                                                            <div class="komen">Baik pak, sementara ini belum ada pertanyaan</div>
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
				</div>
			</div>
		</div>

		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
