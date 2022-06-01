<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/js/data-table/mainnnn.js')?>"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table-custom/stylessss.css')?>">
<!-- End Data Tables -->

<link rel="stylesheet" href="<?= base_url('assets/admin/css/dashboard/style.css')?>">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Informasi Akademik</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a class="text-muted">Settings Informasi</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Informasi Akademik</li>
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
                        <h6 class="card-title">Data Informasi Akademik Semester Gasal Tahun Pelajaran 2021/2022</h6>
                        <div class="mt-4 activity">
                            <table id="data_jadwal" class="table-responsive table-striped table-bordered" style="width:100%">
                            <!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
                               <thead>
                                    <tr>
                                        <th style="width:2%">No</th>
                                        <th style="width:12%;">Kelas</th>
                                        <th style="width:19%;">Judul</th>
                                        <th style="width:2%;">File</th>
                                        <th style="width:13%;">Dibuat</th>
                                        <th style="width:13%;">Diedit</th>
                                        <th style="width:8%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>XI TKRO 1, XI MM 1</td>
                                        <td>The standard chunk of Lorem Ipsum used since the 1500s</td>
                                        <td><a target="_blank" href="<?= base_url('Admin/Info/infoAkademikPdf')?>"><img src="<?= base_url('assets/admin/icons/pdf.png')?>" alt=""></a></td>
                                        <td>01 - 05 - 2022 08 : 00 WIB</td>
                                        <TD>-</TD>
                                        <td>
                                            <a href="<?= base_url('Admin/Info/editInfoAkademik')?>" class="btn btn-sm btn-success mr-2 ml-2"><i class="fa-solid fa-pen-to-square text-white"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            <a href="<?= base_url('')?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Semua Kelas</td>
                                        <td>The standard chunk of Lorem Ipsum used since the 1500s</td>
                                        <td><a target="_blank" href="<?= base_url('Admin/Info/infoAkademikPdf')?>"><img src="<?= base_url('assets/admin/icons/pdf.png')?>" alt=""></a></td>
                                        <td>01 - 05 - 2022 08 : 00 WIB</td>
                                        <TD>-</TD>
                                        <td>
                                            <a href="<?= base_url('Admin/Info/editInfoAkademik')?>" class="btn btn-sm btn-success mr-2 ml-2"><i class="fa-solid fa-pen-to-square text-white"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            <a href="<?= base_url('')?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
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
            <a href="<?= base_url('Admin/Info/tambahInfoAkademik')?>">
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
