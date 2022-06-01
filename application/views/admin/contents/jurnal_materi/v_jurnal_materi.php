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
                <h3 class="page-title">Jurnal Materi</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active">Dashboard</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Jurnal Materi</li>
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
                        <h6 class="card-title">
                            <a class="search-icon" href=""><i class="fa fa-magnifying-glass mr-2"></i></a>
                            Jurnal Materi Tahun Pelajaran 2021/2022 </h6>
                        <div class="mt-4 activity">
                            <table id="jurnal" class="table-striped table-bordered" style="width:100%">
                            <!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
                               <thead>
                                    <tr>
                                        <th style="width: 6%;">No</th>
                                        <th style="width: 10%;">Hari</th>
                                        <th style="width: 12%;">Tanggal</th>
                                        <th style="width: 12%;">Kode Guru</th>
                                        <th style="width: 12%;">Mapel</th>
                                        <th style="width: 10%;">Kelas</th>
                                        <th style="width: 12%;">Pertemuan ke-</th>
                                        <th style="width: 20%;">Pembahasan</th>
                                        <th style="width: 14%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Senin</td>
                                        <td>10 - 05 - 2022 08 : 50 WIB</td>
                                        <td>AB</td>
                                        <td>Bahasa Inggris</td>
                                        <td>XI TKRO 1</td>
                                        <td>1</td>
                                        <td>now use Lorem Ipsum as their default   a search for 'lorem ipsum' will uncover  still in their infancy Various versions  </td>
                                        <td><a id="id_bdt" href="<?= base_url('Admin/JurnalMateri/detailJurnalMateri')?>" class="btn btn-sm btn-outline-danger btn-rounded-sm text-danger">Belum Dilihat</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Selasa</td>
                                        <td>09 - 05 - 2022 12 : 50 WIB </td>
                                        <td>AZ</td>
                                        <td>Panel Sasis Dan Pemindahan Tenaga KR</td>
                                        <td>XI TKRO 1</td>
                                        <td>1</td>
                                        <td>now use Lorem Ipsum as their default   a search for 'lorem ipsum' will uncover  still in their infancy Various versions  </td>
                                        <td><a target="_blank" id="id_sdt" href="<?= base_url('Admin/JurnalMateri/detailJurnalMateri')?>" class="btn btn-sm btn-outline-success text-success">Sudah dilihat</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>