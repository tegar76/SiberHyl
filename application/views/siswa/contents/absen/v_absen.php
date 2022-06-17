<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/siswa/css/import_style_content.php';?>

<section class="container section section__height">

        <ul class="nav nav-pills mb-n3 mt-n3 d-flex justify-content-center ml-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-absen-tab" data-toggle="pill" href="#pills-absen" role="tab" aria-controls="pills-absen" aria-selected="true">Absen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-riwayat-absen-tab" data-toggle="pill" href="#pills-riwayat-absensi" role="tab" aria-controls="pills-riwayat-absensi" aria-selected="false">Riwayat Absensi</a>
            </li>
        </ul>
        <div class="tab-content ml-4 mt-5 pb-3" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-absen" role="tabpanel" aria-labelledby="pills-absen-tab">
                <div class="absen ml-2 d-flex align-content-end">
                   <div class="row">
                        <!-- Looping absen -->
                        <div class="mr-3 mb-3">
                                <div class="card shadow-sm card-absen">
                                    <div class="container">
                                        <div class="card mt-3 border-teal-blue px-3">
                                            <h6 class="text-center mt-3">ABSENSI XI TKRO 1</h6>
                                            <p class="text-center mt-n1">Panel Sasis Dan Pemindahan Tenaga KR</p>
                                        </div>
                                        <div class="card px-2 py-3 mt-3 mb-3">
                                            <div class="row">
                                                <div class="field col-sm-6 mb-1">Tanggal :</div>
                                                <div class="value col-sm-6 mb-3">05-06-2022</div>
                                                <div class="field col-sm-6 mb-1">Absensi Dibuka :</div>
                                                <div class="value col-sm-6 mb-3">07 : 10</div>
                                                <div class="field col-sm-6 mb-1">Absen Ditutup :</div>
                                                <div class="value col-sm-6 mb-3">09 : 00</div>
                                                <div class="field col-sm-6 mb-1">Pertemuan Ke-  :</div>
                                                <div class="value col-sm-6 mb-3"> 1 (Satu)</div>
                                                <div class="field col-sm-6 mb-1">Status Absen :</div>
                                                <!-- <div class="value col-sm-6 mb-3">:  <span class="text-danger">Belum Dimulai</span></div> -->
                                                <!-- <div class="value col-sm-6 mb-3">:  <span class="text-success">Sudah Absen</span></div> -->
                                                <div class="value col-sm-6 mb-3">  <span class="text-warning">Belum Absen</span></div>
                                            </div>
                                            <hr>
                                            <form action="">
                                                <div class="field text-center mb-2">Pilih Pembelajaran :</div>
                                                <select name="pembelajaran" id="pembelajaran" class="form-control mb-3">
                                                    <option value="">Pembelajaran</option>
                                                    <option value="">Tatap Muka</option>
                                                    <option value="">Online</option>
                                                </select>
                                                <!-- pembelajaran == online -->
                                                <!-- <input type="file" name="bukti" id="bukti">
                                                <div class="form-info mt-1">Upload bukti mengikuti kelas online, File max 2mb</div> -->
                                                <button class="btn btn-sm btn-success mt-3 px-3 py-1 d-flex mx-auto mb-2">Absen</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                        
                   </div>
                </div>          
            </div>
            <div class="tab-pane fade" id="pills-riwayat-absensi" role="tabpanel" aria-labelledby="pills-riwayat-absen-tab">
            <div class="riwayat-absen">
                   <div class="row">
                        <div class="col-xs-6 col-sm-12">
						<div class="card shadow mb-4">
							<div class="card-body">
								<a href="<?= base_url('Siswa/Absen/formCetakAbsensi')?>">
									<div class="card mb-3 py-1 px-2 card-reporting">
										<div class="container">
											<div class="row">
												<i class='bx bx-receipt bx-xs mr-1 text-white icon-reporting' ></i>
												<div class="table-title text-white">Reporting</div>
											</div>
										</div>
									</div>
								</a>
								<div class="table-responsive">
								<table id="riwayat_absensi" class=" table-striped table-bordered">
								<!-- pemanggilan tabel id riwayat_absensi ada di assets/siswa/js/data-table/main.js -->
									<thead>
										<tr>
											<th style="width: 1px;">No</th>
											<th style="width: 1px;">Status</th>
											<th style="width: 10px;">Pembelajaran</th>
											<th style="width: 12px;">Tanggal</th>
											<th style="width: 34px;">Mapel</th>
											<th style="width: 10px;">Pertemuan Ke-</th>
											<th style="width: 60px;">Pembahasan</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>A</td>
											<td>Online</td>
											<td>05-12-2022</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>1</td>
											<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, sequi!</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</div>
						<div class="ket-absen mt-4">
							<h6>Keterangan Status  Absen :</h6>
							<div class="ket ml-3 mb-4">
								<p>H : Hadir</p>
								<p>A : Alpa (Tidak Hadir Tanpa Keterangan)</p>
								<p>S : Sakit</p>
								<p>I : Izin</p>
							</div>
						</div>
					</div>
                   </div>
                </div>    
            </div>
        </div>
	
