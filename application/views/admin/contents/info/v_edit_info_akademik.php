<!-- Import multiple select -->
<?php include APPPATH.'../assets/MSelectDialogBox-master/import_multiple_select.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Edit Info Akademik</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Setting Info</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Info/infoAkademik')?>" class="text-muted">Info Akademik</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Edit Info Akademik</li>
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
                                        <input type="button" id="kelas" class="" style="width:100%;">
                                        <!-- value ada di ('assets/MSelectDialogBox-master/examples/')/js/example.js"> -->
                                    </div>
                                    <label for="kelas">Jurusan</label>
                                    <div class="input-group mb-3">
                                        <input type="button" id="jurusan" class="" style="width:100%;">
                                        <!-- value ada di ('assets/MSelectDialogBox-master/examples/')/js/example.js"> -->
                                    </div>
                                    <label for="">Judul</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan Judul" class="form-control">
                                    </div>
                                    <label for="">Upload File</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="" id="" class="form-control">
                                    </div>
                                    <div class="input-group mb-5">
                                        <p>*File max 2 MB dengan format PDF</p>
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

 