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
                <h3 class="page-title">Jadwal</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a class="text-muted">Setting Jadwal</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Jadwal</li>
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
                        <h6 class="card-title">Data Jadwal Pelajaran Semester Gasal Tahun Pelajaran 2021 /2022   </h6>
                        <div class="mt-4 activity">
                            <table id="data_jadwal" class="table-responsive table-striped table-bordered" style="width:100%">
                            <!-- pemanggilan tabel id ada di assets/DataTables/table_id_js/ (jika tidak ada perubahan rename file .jsnya lalu import kembali di /assets/DataTables/import/import.php) -->
                               <thead>
                                    <tr>
                                        <th style="width:6%">No</th>
                                        <th style="width:9%;">Kelas</th>
                                        <th style="width:9%;">Hari</th>
                                        <th style="width:9%;">Mapel</th>
                                        <th style="width:7%;">Kode Guru</th>
                                        <th style="width:9%;">Mulai</th>
                                        <th style="width:9%;">Selesai</th>
                                        <th style="width:9%;">Ruang</th>
                                        <th style="width:9%;">Dibuat</th>
                                        <th style="width:9%;">Diubah</th>
                                        <th style="width:14%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>XI TKRO 1</td>
                                        <td>Senin</td>
                                        <td>Panel Sasis Dan Pemindahan Tenaga KR</td>
                                        <td>AZ</td>
                                        <td>07:00</td>
                                        <td>13:00</td>
                                        <td>MM 1</td>
                                        <td>01 - 05 - 2022 08 : 00 WIB</td>
                                        <td>-</td>
                                        <td>
                                            <a href="<?= base_url('Admin/Jadwal/detailJadwal')?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search text-white"  data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
                                            <a href="<?= base_url('Admin/Jadwal/editJadwal')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
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
            <a href="<?= base_url('Admin/Jadwal/TambahJadwal')?>">
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
