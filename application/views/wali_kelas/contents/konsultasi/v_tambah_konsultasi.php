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
                        <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('WaliKelas/Konsultasi') ?>" class="text-muted">Konsultasi</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?> </li>
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
        <!-- *************************************************************** -->
        <!-- End Location and Earnings Charts Section -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->

        <div class="row">
            <div class="col-12">
                <div class="activity">
                    <?= form_open_multipart('') ?>
                    <div class="card shadow mb-4">
                        <div class="container my-3">
                            <label for="">Kelas</label>
                            <div class="input-group mb-3">
                                <input type="text" name="" id="" class="form-control <?= (form_error('')) ? 'is-invalid' : '' ?>" value="XI TKRO 1" readonly>
                                <div id="" class="invalid-feedback">
                                    <?= form_error('', '<div class="text-danger">', '</div>') ?>
                                </div>
                            </div>
                            <label for="">Judul</label>
                            <div class="input-group mb-3">
                                <input type="text" name="" id="" class="form-control <?= (form_error('')) ? 'is-invalid' : '' ?>" value="" placeholder="Masukan Judul Konsultasi">
                                <div id="" class="invalid-feedback">
                                    <?= form_error('', '<div class="text-danger">', '</div>') ?>
                                </div>
                            </div>
                            <label for="">Deskripsi</label>
                            <div class="input-group mb-3">
                                <textarea name="" class="form-control <?= (form_error('')) ? 'is-invalid' : '' ?>" value="" placeholder="Masukan Deskripsi Pembahasan"></textarea>
                            </div>
                            <div class="btn-aksi mt-4 mb-2">
                                <button type="submit" class="btn btn-sm btn-primary bg-blue border-0 rounded px-4 py-2 mr-3">Simpan</button>
                                <button type="reset" class="btn btn-sm btn-secondary border-0 rounded px-4 py-2">Reset</button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <!-- *************************************************************** -->
            <!-- End Top Leader Table -->
            <!-- *************************************************************** -->
        </div>
