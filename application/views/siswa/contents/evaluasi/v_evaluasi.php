<!-- import data table -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/siswa/css/import_style_content.php';?>

<section class="container section section__height px-0">

<div class="tr-job-posted section-padding">
	<div class="job-tab text-center">
		<ul class="nav nav-tabs justify-content-center" role="tablist">
			<li role="presentation" class="active">
				<a class="active show" href="#hot-jobs" aria-controls="hot-jobs" role="tab" data-toggle="tab" aria-selected="true">Evaluasi</a>
			</li>
			<li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Nilai Evaluasi</a></li>
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
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="evaluasi" class=" table-striped table-bordered">
                                                <!-- pemanggilan tabel id pesan ada di assets/siswa/js/data-table/main.js -->
													<div class="table-title mb-2">
														Evaluasi XI TKRO 1 
													</div>
													<div id="result"></div>
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 2px;">No</th>
                                                            <th style="width: 40px;">Mata Pelajaran</th>
															<th style="width: 14px;">Evaluasi Ke-</th>
                                                            <th style="width: 24px;">Judul Evaluasi</th>
                                                            <th style="width: 10px">Tanggal</th>
                                                            <th style="width: 10px;">Dibuka</th>
                                                            <th style="width: 10px;">Ditutup</th>
                                                            <th style="width: 2px;">Jenis Soal</th>
                                                            <th style="width: 18px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Panel Sasis Dan Pemindahan Tenaga KR</td>
                                                            <td>3</td>
                                                            <td>Evalasui BAB 3</td>
                                                            <td>25-05-2022</td>
                                                            <td>07:00 WIB</td>
                                                            <td>08:00 WIB</td>
                                                            <td>Essay</td>
                                                            <td>
																<a target="_blank" href="<?= base_url('Siswa/Evaluasi/soalEvaluasiPdf')?>" class="btn btn-success text-white mx-auto d-block mb-3">Mulai</a>
																<a class="btn btn-primary text-white mx-auto d-block" role="button" data-toggle="popover" data-placement="bottom">Kumpulkan</a>
															</td>
                                                        </tr>
														<tr>
                                                            <td>2</td>
                                                            <td>Panel Sasis Dan Pemindahan Tenaga KR</td>
                                                            <td>2</td>
                                                            <td>Evalasui BAB 2</td>
                                                            <td>25-05-2022</td>
                                                            <td>07:00 WIB</td>
                                                            <td>08:00 WIB</td>
                                                            <td>Pilgan</td>
                                                            <td>
																<a role="button" class="btn btn-outline-danger text-danger mx-auto d-block mb-3">Waktu Sudah Lewat</a>
															</td>
                                                        </tr>
														<tr>
                                                            <td>3</td>
                                                            <td>Panel Sasis Dan Pemindahan Tenaga KR</td>
                                                            <td>1</td>
                                                            <td>Evalasui BAB 1</td>
                                                            <td>25-05-2022</td>
                                                            <td>07:00 WIB</td>
                                                            <td>08:00 WIB</td>
                                                            <td>Essay</td>
                                                            <td>
																<a role="button" class="btn btn-outline-success text-success mx-auto d-block mb-3">Sudah Mengerjakan</a>
															</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
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
								<table id="nilai_evaluasi" class=" table-striped table-bordered">
								<!-- pemanggilan tabel id pesan ada di assets/siswa/js/data-table/main.js -->
								<div id="result"></div>
									<thead>
										<tr>
											<th style="width: 2px;">No</th>
											<th style="width: 14px;">Keterangan</th>
											<th style="width: 40px;">Mata Pelajaran</th>
											<th style="width: 14px;">Evaluasi Ke-</th>
											<th style="width: 10px">Judul Evaluasi</th>
											<th style="width: 24px;">Tanggal Pengumpulan</th>
											<th style="width: 24px;">Metode Pengumpulan</th>
											<th style="width: 2px;">File</th>
											<th style="width: 14px;">Komentar</th>
											<th style="width: 5px;">Nilai</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Belum Mengerjakan</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>3</td>
											<td>Evaluasi Bab 3</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Belum Mengerjakan</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>3</td>
											<td>Evaluasi Bab 2</td>
											<td>10-05-2022 07:50 WIB</td>
											<td>Online</td>
											<td><a target="_blank" href="<?= base_url('Siswa/Evaluasi/jawabanEvaluasiPdf')?>"><img class="w-50" src="<?=base_url('assets/admin/icons/pdf-md.png')?>" alt=""></i></a></td>
											<td>Bagus</td>
											<td>95</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Sudah Dinilai</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>1</td>
											<td>Evaluasi Bab 1</td>
											<td>10-05-2022 07:50 WIB</td>
											<td>Online</td>
											<td><a target="_blank" href="<?= base_url('Siswa/Evaluasi/jawabanEvaluasiImg')?>"><img class="w-50" src="<?=base_url('assets/admin/icons/img-md.png')?>" alt=""></i></a></td>
											<td>Bagus</td>
											<td>95</td>
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

<!-- Modals Confirm button -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close ml-n2 mr-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h6 class="modal-title text-secondary" id="myModalLabel">Apakah evaluasi sudah di serahkan ke guru pengajar ?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="modal-btn-sudah">Sudah</button>
        <button type="button" class="btn btn-secondary" id="modal-btn-belum">Belum</button>
      </div>
    </div>
  </div>
</div>

<script>
	// Popover
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({
			placement : 'bottom',
			html : true,
			title : '<span class="title-popover mr-3">Metode Pengumpulan</span> <a href="#" class="close" data-dismiss="alert">&times;</a>',
			content : '<div class="media"><a href="<?= base_url('Siswa/Evaluasi/pengumpulanOnline')?>" class="btn btn-sm btn-outline-primary mr-3">Online</a><a role="button" class="btn-langsung btn btn-sm btn-outline-success" id="btn-confirm">Langsung</a></div>'
		});
		$(document).on("click", ".popover .close" , function(){
			$(this).parents(".popover").popover('hide');
		});

		$(document).on("click", ".popover .btn-langsung" , function(){
			$("#confirm-modal").modal('show');
		});
	});

	// Modal Confirm
	var modalConfirm = function(callback){
  
	$(".btn-langsung").on("click", function(){
		$("#confirm-modal").modal('show');
	});

	$("#modal-btn-sudah").on("click", function(){
		callback(true);
		$("#confirm-modal").modal('hide');
	});
	
	$("#modal-btn-belum").on("click", function(){
		callback(false);
		$("#confirm-modal").modal('hide');
	});
	};

	modalConfirm(function(confirm){
		if(confirm){
			$("#result").html('<div class="alert alert-success alert-dismissible h6"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil,</strong> Silahkan cek pada tab <strong>nilai evaluasi !</strong></div>');
		}else{
			$("#result").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Dibatalkan,</strong> Mohon serahkan pengerjaan evaluasi dahulu ke guru pengajar</div>');
		}
	});
</script>





