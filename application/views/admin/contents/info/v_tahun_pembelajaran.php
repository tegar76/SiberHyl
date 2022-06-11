<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Tahun Pembelajaran</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a class="text-muted">Settings Info</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Tahun Pembelajaran</li>
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
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                        <h6 class="card-title">Data Mata Pelajaran Semester Gasal Tahun Pelajaran 2021/2022</h6>
                        <div class="mt-4 activity">
                            <table id="data_jadwal" class="table-responsive table-striped table-bordered" style="width:100%">
                            <!-- pemanggilan tabel id ada di assets/DataTables/table_id_js/ (jika tidak ada perubahan rename file .jsnya lalu import kembali di /assets/DataTables/import/import.php) -->
                                <thead>
                                    <tr>
                                        <th style="width:4%">No</th>
                                        <th style="width:20%;">Tahun Pembelajaran</th>
                                        <th style="width:13%;">Semester</th>
                                        <th style="width:13%;">Dibuat</th>
                                        <th style="width:13%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2021/2022</td>
                                        <td>Gasal</td>
                                        <TD>01 - 05 - 2022 08 : 00 WIB</TD>
                                        <td class="d-flex justify-content-center">
                                            <div class="custom-control custom-switch">
                                                <label for="customSwitch1" class="mr-5 ml-n5">Non Aktif</label>
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Aktif</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="floating-container">
            <a href="<?= base_url('Admin/Info/tambahTahunPembelajaran')?>">
                <div class="floating-button">+</div>
            </a>
        </div>
        

        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>

