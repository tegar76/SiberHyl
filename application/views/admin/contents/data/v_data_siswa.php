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
                <h3 class="page-title">Data Siswa</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a class="text-muted">Master Data</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Data Siswa</li>
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
                        <h6 class="card-title">Data Siswa Semester Gasal Tahun Pelajaran 2021/2022 </h6> 
                        <p class="card-sub-title mb-1 mt-4">Kelas : <span>XI TKRO 1</span></p>
                        <p class="card-sub-title">Wali Kelas : <span>Sulton Akbar Pamungkas, S. Pd</span></p>
                        <div class="mt-4 activity">
                            <table id="data_jadwal" class="table-responsive table-striped table-bordered" style="width:100%">
                            <!-- pemanggilan tabel id ada di assets/DataTables/table_id_js/ (jika tidak ada perubahan rename file .jsnya lalu import kembali di /assets/DataTables/import/import.php) --> 
                               <thead>
                                    <tr>
                                        <th style="width:4%">No</th>
                                        <th style="width:8%;">NIS</th>
                                        <th style="width:10%;">NISN</th>
                                        <th style="width:22%;">Nama</th>
                                        <th style="width:12%;">Jenis Kelamin</th>
                                        <th style="width:10%;">Asal Kelas</th>
                                        <th style="width:10%;">Status</th>
                                        <th style="width:8%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2010049</td>
                                        <td>0041944023</td>
                                        <td>ADIT PRAYITNO</td>
                                        <td>Laki - laki</td>
                                        <td>X TO 2</td>
                                        <td>Tidak Aktif</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?= base_url('Admin/Data/detailSiswa')?>" class="btn btn-sm btn-primary mr-2"><i class="fa fa-search text-white"  data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
                                            <a href="<?= base_url('Admin/Data/editSiswa')?>" class="btn btn-sm btn-success mr-2"><i class="fa-solid fa-pen-to-square text-white"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            <a href="<?= base_url('')?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2010049</td>
                                        <td>0041944023</td>
                                        <td>ADIT PRAYITNO</td>
                                        <td>Laki - laki</td>
                                        <td>X TO 2</td>
                                        <td>Tidak Aktif</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="<?= base_url('Admin/Data/detailSiswa')?>" class="btn btn-sm btn-primary mr-2"><i class="fa fa-search text-white"  data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
                                            <a href="<?= base_url('Admin/Data/editSiswa')?>" class="btn btn-sm btn-success mr-2"><i class="fa-solid fa-pen-to-square text-white"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            <a href="<?= base_url('')?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
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
            <a href="<?= base_url('Admin/Data/tambahSiswa')?>">
                <div class="floating-button">+</div>
            </a>
        </div>
        

        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>

    <script>
	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
