<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- Import multiple select -->
<?php include APPPATH.'../assets/MSelectDialogBox-master/import_multiple_select.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/siswa/css/import_style_content.php';?>

<section class="container section section__height px-0">

<div class="tr-job-posted section-padding pb-3">
	<div class="job-tab text-center">
		<ul class="nav nav-tabs justify-content-center" role="tablist">
			<li role="presentation" class="active">
				<a class="active show" href="#hot-jobs" aria-controls="hot-jobs" role="tab" data-toggle="tab" aria-selected="true">Pengajuan</a>
			</li>
			<li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Riwayat</a></li>
		</ul>
		<div class="tab-content text-left">
			<div role="tabpanel" class="tab-pane fade active show" id="hot-jobs">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-12">

							<div class="card shadow mb-4">
								<div class="row ml-1 mr-1 mt-3">
								<div class="col-lg-12">
									<div class="accordion" id="accordionExample">
										<div id="result"></div>
                                        <form action="">
                                            <div class="sub-title-form mb-3">
                                            Selamat Datang di <span>Ruang Pengajuan Surat</span>, Fitur ini berfungsi untuk pengajuan surat sakit, pengajuan surat izin yang ditujukan kepada guru pengajar terkait. 
                                            </div>
                                            <label for="">NIS</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="" id="" class="form-control" value="AZ" readonly>
                                            </div>
                                            <label for="">Nama</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="" id="" class="form-control" value="XI TKRO 1" readonly>
                                            </div>
                                            <label for="">Kelas</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="" id="" class="form-control" value="Panel Sasis Dan Pemindahan Tenaga KR" readonly>
                                            </div>
                                            <label for="">Hari</label>
                                            <div class="input-group mb-3">
                                                <select name="" id="" class="form-control">
                                                    <option value="" selected>Pilih Hari</option>
                                                    <option value="">Senin</option>
                                                    <option value="">Selasa</option>
                                                    <option value="">Rabu</option>
                                                </select>
                                            </div>
                                            <label for="">Tanggal</label>
                                            <div class="input-group mb-3">
                                                <input type="date" name="" id="" class="form-control">
                                            </div>
                                            <label for="">Jenis Pengajuan Surat</label>
                                            <div class="input-group mb-4">
                                                <select name="" id="" class="form-control">
                                                    <option value="" selected>Pilih Jenis Pengajuan Surat</option>
                                                    <option value="">Surat Sakit</option>
                                                    <option value="">Surat Izin</option>
                                                </select>
                                            </div>
                                            <label for="">Upload Surat</label>
                                            <div class="input-group mb-1">
                                                <input type="file" name="" id="" class="form-control">
                                            </div>
											<div class="form-info mb-3">
												Upload Surat dengan format PNG,JPEG,JPG dan dengan ukuran File max 2mb
											</div>
                                            <label for="">Guru Pengajar</label> 
                                            <div class="input-group mb-3">
												<!-- Form multiple select berdasarkan nama guru bukan kode guru -->
                                                <input type="button" id="guruPengajar" class="" style="width:100%;">
                                                <!-- value ada di ('assets/MSelectDialogBox-master/examples/')/js/example.js"> -->
                                            </div>
                                            <div class="btn-aksi mb-4">
                                                <button type="submit" class="btn btn-sm btn-primary rounded px-4 py-1 mr-3">Kirim</button>
                                                <button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
                                            </div>
                                        </form>
									</div>								
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div><!-- /.tab-pane -->

			<div role="tabpanel" class="tab-pane fade in px-3" id="recent-jobs">
				<div class="row">
					<div class="col-xs-6 col-sm-12">
						<div class="card shadow mb-4">
							<div class="card-body">
								<div class="table-responsive">
								<table id="riwayat_pengajuan_surat" class=" table-striped table-bordered">
								<!-- pemanggilan tabel id ada di assets/DataTables/table_id_js/main.js -->
									<thead>
										<tr>
											<th style="width: 1px;">No</th>
											<th style="width: 2px;">Hari</th>
											<th style="width: 12px;">Tanggal</th>
											<th style="width: 24px;">Nama</th>
											<th style="width: 12px;">Kelas</th>
											<th style="width: 12px;">Jenis Surat</th>
											<th style="width: 2px;">File</th>
											<th style="width: 45px;">Dikirim Kepada</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Senin</td>
											<td>01-01-2023</td>
											<td>ADIT PRAYITNO</td>
											<td>XI TKRO 1</td>
											<td>Surat Sakit</td>
											<td><a target="_blank" href="<?= base_url('Siswa/Surat/fileSuratImg')?>"><img src="<?=base_url('assets/admin/icons/img-md.png')?>" alt="" style="width: 30px;"></i></a></td>
											<td>Sulton Akbar Pamungkas, S. Pd. ,Khaerul Sobar, S.Pd.</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.tab-pane -->
			
		</div>				
	</div><!-- /.job-tab -->			
</div>