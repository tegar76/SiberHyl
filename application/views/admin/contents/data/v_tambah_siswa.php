<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Tambah Siswa</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Master Data</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Data/dataSiswa')?>" class="text-muted">Data Siswa</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Siswa</li>
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
                                    <label for="">NIS</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan NIS" class="form-control">
                                    </div>
                                    <label for="">NISN</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan NISN" class="form-control">
                                    </div>
                                    <label for="">Nama</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="" placeholder="Masukan Nama Lengkap" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Tempat Lahir</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="" id="jam_mulai" placeholder="Masukan Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="">Tanggal Lahir</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" name="" id="jam_selesai" placeholder="Masukan Tanggal Lahir">
                                            </div>
                                        </div>
                                    </div>
                                    <label for="">Jenis Kelamin</label>
                                    <div class="input-group mb-3">
                                        <div class="form-check ml-3 mr-3">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="l" value="option1" checked>
                                            <label class="form-check-label" for="l">
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="p" value="option2">
                                            <label class="form-check-label" for="p">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <label for="">Email</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="" id="" placeholder="Masukan Email" class="form-control">
                                        </div>
                                        </div>
                                        <div class="col">
                                            <label for="">No. Handphone</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="" id="jam_selesai" placeholder="Masukan No. Handphone">
                                            </div>
                                        </div>
                                    </div>
                                    <label for="">Alamat</label>
                                    <div class="input-group mb-3">
                                        <textarea name="" id="" class="form-control" placeholder="Masukan Alamat Lengkap"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Kelas</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="">
                                                    <option selected>Pilih Kelas</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="">Asal Kelas</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="">
                                                    <option selected>Pilih Asal Kelas</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
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