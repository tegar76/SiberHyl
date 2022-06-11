<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Detail Siswa</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Data Master</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Data/dataSiswa')?>" class="text-muted">Data Siswa</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Detail Siswal</li>
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
                                <div class="col-md-4 text-center mb-3">
                                    <div class="card shadow py-4">
                                        <div class="img-photo justify-content-center">
                                                <img class="mx-auto d-block rounded-circle" src="<?= base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="Foto prifile siswa">
                                        </div>
                                        <div class="line">
                                            <hr>
                                        </div>
                                        <div class="atribute px-3">
                                            <h6>Sulton Akbar Pamungkas, S. Pd.</h6>
                                            <p>XI TKRO 1</p>
                                            <div class="info text-left ml-2">
                                                <p>Dibuat : &ensp;<span>01 - 05 - 2022 07 : 00 WIB</span> </p>
                                                <p class="mt-n1 mb-n1">Diubah : &ensp;<span>-</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card shadow px-3">
                                        <table class="table">
                                            <tbody>
                                                <tr class="table-borderless">
                                                    <th scope="row">NIS</th>
                                                    <td>2010049</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">NISN</th>
                                                    <td>0041944023</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tempat,Tanggal Lahir</th>
                                                    <td>Banyumas, 01 - 02 -2004</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Jenis Kelamin</th>
                                                    <td>Laki - laki</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td>Dit456@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">No Handphone</th>
                                                    <td>084587876654</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Alamat</th>
                                                    <td>Kebasen Rt07 Rw 04 Purwokerto Utara</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Asal Kelas</th>
                                                    <td>XO TO 2</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Password</th>
                                                    <td>siswa-2022</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Status Kesiswaan</th>
                                                    <td>Aktif</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr class="mt-n3">
                                        <div class="button-action d-flex mb-3 mt-2">
                                            <a href="<?= base_url('Admin/Data/dataSiswa') ?>" class="btn btn-sm btn-primary rounded ml-3 px-3">Kembali</a>
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