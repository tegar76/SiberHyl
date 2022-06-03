<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/js/data-table/main.js')?>"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table-custom/style.css')?>">
<!-- End Data Tables -->

<link rel="stylesheet" href="<?= base_url('assets/admin/css/jadwal/style.css') ?>">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Detail Guru</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Data Master</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Data/dataGuru')?>" class="text-muted">Data Guru</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Guru</li>
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
    <div class="container-fluid mt-n4">
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
                        <div class="mt-4 activity">
                        <div class="profile">
                            <div class="row">
                                <div class="col-md-3 text-center mb-3">
                                    <div class="card shadow py-4">
                                        <div class="img-photo justify-content-center">
                                                <img class="mx-auto d-block rounded-circle" src="<?= base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="Foto prifile siswa">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card shadow px-3">
                                        <table class="table">
                                            <tbody>
                                                <tr class="table-borderless">
                                                    <th scope="row" class="table-title">Profile</th>
                                                </tr>
                                                <tr class="table-borderless">
                                                    <th scope="row">Kode Guru</th>
                                                    <td class="col-md-3">AZ</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Nama</th>
                                                    <td>Sulton Akbar Pamungkas, S. Pd.</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Username</th>
                                                    <td>14190196</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Password</th>
                                                    <td>guru-2022</td>
                                                </tr>
                                                <tr class="table-borderless">
                                                    <th scope="row" class="table-title">Pembagian Tugas Mengajar Semester Gasal Tahun Pelajaran 2021/2022</th>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th scope="row">
                                                        <table class="table-responsive table-striped table-bordered"style="width:200%">
                                                            <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Mata pelajaran</th>
                                                                        <th>Kompetensi keahlian</th>
                                                                        <th>Jumlah Rom</th>
                                                                        <th>Jumlah Jam</th>
                                                                        <th>Jumlah</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Pemeliharaan Kelistrikan Kendaraan Ringan</td>
                                                                        <td>X TKRO 1</td>
                                                                        <td>1</td>
                                                                        <td>8</td>
                                                                        <td>9</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Pemel. Sasis dan Pemindah Tenaga KR</td>
                                                                        <td>XI TKRO 1 , XI TKRO 2 , XI TKRO3</td>
                                                                        <td>1</td>
                                                                        <td>8</td>
                                                                        <td>9</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="5" class="text-center">Total Jam Mengajar</th>
                                                                        <td>28</td>
                                                                    </tr>
                                                                </tfoot>
                                                        </table>
                                                    </th>
                                                    <td></td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                        <hr class="mt-n3">
                                        <div class="button-action d-flex mb-3 mt-2">
                                            <a href="<?= base_url('Admin/Data/dataGuru') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>