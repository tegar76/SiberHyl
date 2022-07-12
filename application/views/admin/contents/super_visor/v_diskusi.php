<!-- import style -->
<?php include APPPATH.'../assets/guru/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title .' Kelas XI TKRO 1'?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/SuperVisor') ?>" class="text-muted">Super Visor</a></li>
							<!-- arahkan ke filter kelas sesuai yng diklik misal kelas XI TKRO 1 -->
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/SuperVisor') ?>" class="text-muted">XI TKRO 1</a></li>
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
                                            <a href="<?= base_url('Admin/SuperVisor/detailDiskusi')?>" class="ml-3 mt-n2">
                                                <div class="card comment p-1 border border-custom-blue rounded">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col">
                                                            <div class="text-xs ml-2">
                                                                Komentar
                                                                <button class="border-0 rounded ml-1 mr-2 px-2 bg-blue">0</button>
                                                                <!-- <span class="badge-info-ds-content"></span> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="subjek mt-n2 mb-2">Judul Diskusi</div>
                                        <div class="pesan">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore, error!</div>
                                    </div>
                                </div>
                            </section>
                            <section class="mt-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-12 mr-2 ml-3">
                                        <div class="row" id="btnInfo">
                                            <div class="card p-1 rounded mr-2 mb-2 border border-custom-blue">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col">
                                                        <div class="nama mx-2">
                                                            <i class="fa fa-user mr-1"></i>
                                                            ADIT PRAYITNO
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card p-1 rounded mr-2 mb-2 border border-custom-blue">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col">
                                                        <div class="tanggal mx-2">
                                                            <i class="fa fa-calendar mr-1"></i> 
                                                            05 - 05 - 2022 07 : 30 WIB
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

                    <!-- looping komentar -->
                    <div class="card shadow border-top border-left border-right border-bottom h-100 py-2 p-0 mb-3">
                        <div class="card-body">
                            <section>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="row">
                                            <a href="<?= base_url('Admin/SuperVisor/detailDiskusi')?>" class="ml-3 mt-n2">
                                                <div class="card comment p-1 border border-custom-blue rounded">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col">
                                                            <div class="text-xs ml-2">
                                                                Komentar
                                                                <button class="border-0 rounded ml-1 mr-2 px-2 bg-blue">3</button>
                                                                <!-- <span class="badge-info-ds-content"></span> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="subjek mt-n2 mb-2">Judul Diskusi</div>
                                        <div class="pesan">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa qui itaque laborum modi delectus repellat nemo! Ullam fugit qui optio, voluptatem sequi accusantium labore consequatur, necessitatibus dolores beatae eligendi asperiores!</div>
                                    </div>
                                </div>
                            </section>
                            <section class="mt-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-12 mr-2 ml-3">
                                        <div class="row" id="btnInfo">
                                            <div class="card p-1 rounded mr-2 mb-2 border border-custom-blue">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col">
                                                        <div class="nama mx-2">
                                                            <i class="fa fa-user mr-1"></i>
                                                            Sulton Akbar Pamungkas, S. Pd.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card p-1 rounded mr-2 mb-2 border border-custom-blue">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col">
                                                        <div class="tanggal mx-2">
                                                            <i class="fa fa-calendar mr-1"></i> 
                                                            05 - 05 - 2022 07 : 30 WIB
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
