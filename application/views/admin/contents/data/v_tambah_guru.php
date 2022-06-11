<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Tambah Guru</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Master Data</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Data/dataGuru')?>" class="text-muted">Data Guru</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Guru</li>
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
                                    <label for="">Kode</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan Kode Guru" class="form-control">
                                    </div>
                                    <label for="">Nama</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan Nama Guru" class="form-control">
                                    </div>
                                    <label for="">Username</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan Username" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <p>*Gunakan angka 6 digit pertama dari NIP / NUPTK </p>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Password</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="" id="jam_mulai" placeholder="Masukan Password (minimal 8 karakter)">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="">Konfirmasi Password</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="" id="jam_selesai" placeholder="Masukan Konfirmasi Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-aksi">
                                        <button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
                                        <button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset</button>
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