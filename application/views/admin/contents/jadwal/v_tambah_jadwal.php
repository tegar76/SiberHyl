<!-- Select with search -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Tambah Jadwal</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Setting Jadwal</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Jadwal')?>" class="text-muted">Jadwal</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Jadwal</li>
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
                    <form action="">
                        <!-- looping card -->
                        <div class="card shadow mb-4">
                            <div class="container my-3"> 
                                <div class="title-form mt-3 mb-3">
                                    <h6>Data Ke- 1</h6>
                                </div>
                                <label for="kelas">Kelas</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="kelas">
                                        <option selected>Pilih Kelas</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <label for="kelas">Hari</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="kelas">
                                        <option selected>Pilih Hari</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <label for="kelas">Mata Pelajaran</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="mapel">
                                        <option selected>Pilih Mata Pelajaran</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <label for="kelas">Kode Guru</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="kode_guru">
                                        <option selected>Pilih Kode Guru</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Jam Mulai</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="" id="jam_mulai">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Jam Selesai</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="" id="jam_selesai">
                                        </div>
                                    </div>
                                </div>
                                <label for="kelas">Ruang Kelas</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="kelas">
                                        <option selected>Pilih Ruang Kelas</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <label for="">Jam Mengajar</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="" id="" placeholder="Masukan Jumlah Jam Mengajar" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="btn-aksi">
                            <button type="submit" class="btn btn-sm btn-primary rounded px-4 py-2 mr-3">Simpan</button>
                            <button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-2">Reset Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>

<!-- button floating tambah -->
<div class="floating-container">
    <a href="<?= base_url('Admin/Jadwal/TambahJadwal')?>">
        <div class="floating-button">+</div>
    </a>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kelas').select2();
    });
    $(document).ready(function() {
        $('#mapel').select2();
    });
    $(document).ready(function() {
        $('#kode_guru').select2();
    });
</script>