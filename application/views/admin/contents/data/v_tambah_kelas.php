<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Tambah Kelas</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Master Data</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Data/dataKelas')?>" class="text-muted">Data Kelas</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Kelas</li>
                </ol>
            </nav>
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
                    
                        <div class="card shadow mb-4">
                            <div class="container my-3"> 
                                <form action="">
                                    <label for="kelas">Kelas</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan kelas" class="form-control">
                                    </div>
                                    <label for="guru">Wali Kelas</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control" id="kelas">
                                            <option selected>Pilih Guru yang menjadi wali kelas</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="btn-aksi">
                                        <button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
                                        <button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset Form</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
     <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>