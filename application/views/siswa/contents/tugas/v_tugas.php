<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/siswa/js/data-table/main.js')?>"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table-custom/style.css')?>">
<!-- End Data Tables -->
<link rel="stylesheet" href="<?= base_url('assets/siswa/css/tugas/style.css') ?>">

<!--=============== MAIN JS ===============-->
<script src="<?= base_url('assets/') ?>siswa/js/main.js"></script>

<section class="container section section__height px-0">

<div class="tr-job-posted section-padding">
	<div class="job-tab text-center">
		<ul class="nav nav-tabs justify-content-center" role="tablist">
			<li role="presentation" class="active">
				<a class="active show" href="#hot-jobs" aria-controls="hot-jobs" role="tab" data-toggle="tab" aria-selected="true">Tugas</a>
			</li>
			<li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Nilai Tugas</a></li>
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
										<!-- Looping Tugas -->
										<div class="card" id="headingTugas4">
											<div class="card-header mb-3" data-toggle="collapse" data-target="#collapseTugas4" aria-expanded="false" aria-controls="collapseTugas4">
												<div class="clearfix mb-0">
													<a class="btn btn-link" >
														<h4>Tugas 4 (Empat)</h4>
														<small> Dibuat : 03-05-2022, 08 : 00, Update : - </small>
														<i>Deadline : 10 - 05 -2022, 07 : 00</i>
													</a>									
												</div>
											</div>
											<div id="collapseTugas4" class="collapse mb-n3 mt-n3" aria-labelledby="headingTugas4" data-parent="#accordionExample">
												<div class="card-body">
													<div class="row">
														<div class="col-xs-6 col-sm-12">
															<div class="">
																<h5>
																	Silahkan Kerjakan Tugas 1 (Satu) dengan ketentuan sebagai berikut : 1.Kumpulkan tugas dalam bentuk foto 2. jika file foto yang dikumpulkan lebih dari 1 maka gabungkan terlebih dahulu file-file tersebut dalam bentuk pdf
																</h5>
															</div>
															<div class="d-flex justify-content-center m-3">
																	<a target="_blank" href="<?= base_url('Siswa/Tugas/soalTugaspdf')?>" class="btn btn-primary btn-sm mr-3 "><i class="fa-solid fa-magnifying-glass text-white mr-1"></i> Lihat Tugas </a>
																	<a role="button" class="btn btn-success btn-sm"data-toggle="popover" data-placement="bottom"><i class="fa-solid fa-upload text-white mr-1"></i> Kumpulkan </a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Looping Tugas -->
										<div class="card" id="headingTugas3">
											<div class="card-header mb-3" data-toggle="collapse" data-target="#collapseTugas3" aria-expanded="false" aria-controls="collapseTugas3">
												<div class="clearfix mb-0">
													<a class="btn btn-link" >
														<h4>Tugas 3 (Tiga)</h4>
														<small> Dibuat : 03-05-2022, 08 : 00, Update : - </small>
														<i>Deadline : 10 - 05 -2022, 07 : 00</i>
													</a>									
												</div>
											</div>
											<div id="collapseTugas3" class="collapse mb-n3 mt-n3" aria-labelledby="headingTugas3" data-parent="#accordionExample">
												<div class="card-body">
													<div class="row">
														<div class="col-xs-6 col-sm-12">
															<div class="">
																<h5>
																	Silahkan Kerjakan Tugas 1 (Satu) dengan ketentuan sebagai berikut : 1.Kumpulkan tugas dalam bentuk foto 2. jika file foto yang dikumpulkan lebih dari 1 maka gabungkan terlebih dahulu file-file tersebut dalam bentuk pdf
																</h5>
															</div>
															<div class="d-flex justify-content-center m-3">
																	<a target="_blank" href="<?= base_url('Siswa/Tugas/soalTugaspdf')?>" class="btn btn-primary btn-sm mr-3 "><i class="fa-solid fa-magnifying-glass text-white mr-1"></i> Lihat Tugas </a>
																	<a role="button" class="btn btn-success btn-sm"data-toggle="popover" data-placement="bottom"><i class="fa-solid fa-upload text-white mr-1"></i> Kumpulkan </a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Looping Tugas -->
										<div class="card" id="headingTugas2">
											<div class="card-header mb-3" data-toggle="collapse" data-target="#collapseTugas2" aria-expanded="false" aria-controls="collapseTugas2">
												<div class="clearfix mb-0">
													<a class="btn btn-link" >
														<h4>Tugas 2 (Dua)</h4>
														<small> Dibuat : 03-05-2022, 08 : 00, Update : - </small>
														<i>Deadline : 10 - 05 -2022, 07 : 00</i>
													</a>									
												</div>
											</div>
											<div id="collapseTugas2" class="collapse mb-n3 mt-n3" aria-labelledby="headingTugas2" data-parent="#accordionExample">
												<div class="card-body">
													<div class="row">
														<div class="col-xs-6 col-sm-12">
															<div class="">
																<h5>
																	Silahkan Kerjakan Tugas 1 (Satu) dengan ketentuan sebagai berikut : 1.Kumpulkan tugas dalam bentuk foto 2. jika file foto yang dikumpulkan lebih dari 1 maka gabungkan terlebih dahulu file-file tersebut dalam bentuk pdf
																</h5>
															</div>
															<div class="d-flex justify-content-center m-3">
																	<a target="_blank" href="<?= base_url('Siswa/Tugas/soalTugaspdf')?>" class="btn btn-primary btn-sm mr-3 "><i class="fa-solid fa-magnifying-glass text-white mr-1"></i> Lihat Tugas </a>
																	<a role="button" class="btn btn-success btn-sm"data-toggle="popover" data-placement="bottom"><i class="fa-solid fa-upload text-white mr-1"></i> Kumpulkan </a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Looping Tugas -->
										<div class="card" id="headingTugas1">
											<div class="card-header mb-3" data-toggle="collapse" data-target="#collapseTugas1" aria-expanded="false" aria-controls="collapseTugas1">
												<div class="clearfix mb-0">
													<a class="btn btn-link" >
														<h4>Tugas 1 (Satu)</h4>
														<small> Dibuat : 03-05-2022, 08 : 00, Update : - </small>
														<i>Deadline : 10 - 05 -2022, 07 : 00</i>
													</a>									
												</div>
											</div>
											<div id="collapseTugas1" class="collapse mb-n3 mt-n3" aria-labelledby="headingTugas1" data-parent="#accordionExample">
												<div class="card-body">
													<div class="row">
														<div class="col-xs-6 col-sm-12">
															<div class="">
																<h5>
																	Silahkan Kerjakan Tugas 1 (Satu) dengan ketentuan sebagai berikut : 1.Kumpulkan tugas dalam bentuk foto 2. jika file foto yang dikumpulkan lebih dari 1 maka gabungkan terlebih dahulu file-file tersebut dalam bentuk pdf
																</h5>
															</div>
															<div class="d-flex justify-content-center m-3">
																	<a target="_blank" href="<?= base_url('Siswa/Tugas/soalTugaspdf')?>" class="btn btn-primary btn-sm mr-3 "><i class="fa-solid fa-magnifying-glass text-white mr-1"></i> Lihat Tugas </a>
																	<a role="button" class="btn btn-success btn-sm"data-toggle="popover" data-placement="bottom"><i class="fa-solid fa-upload text-white mr-1"></i> Kumpulkan </a>
															</div>
														</div>
													</div>
												</div>
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
								<table id="nilai_tugas" class=" table-striped table-bordered">
								<!-- pemanggilan tabel id pesan ada di assets/siswa/js/data-table/main.js -->
									<thead>
										<tr>
											<th style="width: 2px;">No</th>
											<th style="width: 14px;">Keterangan</th>
											<th style="width: 40px;">Mata Pelajaran</th>
											<th style="width: 14px;">Tugas Pertemuan Ke-</th>
											<th style="width: 10px">Judul Tugas</th>
											<th style="width: 24px;">Tanggal Pengumpulan</th>
											<th style="width: 24px;">Metode Pengumpulan</th>
											<th style="width: 2px;">File Tugas</th>
											<th style="width: 14px;">Komentar Guru</th>
											<th style="width: 5px;">Nilai</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Tugas Belum Dikumpulkan</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>4</td>
											<td>Tugas 4 (Empat)</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>ijfnijf</td>
											<td>-</td>
										</tr>
										<tr>
											<td>2</td>
											<td><a href="<?= base_url('Siswa/Tugas/editTugas')?>" class="btn btn-sm btn-success text-white px-4 py-1">Edit</a></td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>4</td>
											<td>Tugas 4 (Empat)</td>
											<td>-</td>
											<td>-</td>
											<td><a target="_blank" href="<?= base_url('Siswa/Tugas/jawabanTugasPdf')?>"><img class="w-50" src="<?=base_url('assets/admin/icons/pdf-md.png')?>" alt=""></i></a></td>
											<td>ijfnijf</td>
											<td>-</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Menunggu Konfirmasi</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>4</td>
											<td>Tugas 4 (Empat)</td>
											<td>-</td>
											<td>Langsung</td>
											<td><a href="">-</td>
											<td>ijfnijf</td>
											<td>-</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Tugas Sudah Dinilai</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>4</td>
											<td>Tugas 4 (Empat)</td>
											<td>-</td>
											<td>Online</td>
											<td><a target="_blank" href="<?= base_url('Siswa/Tugas/jawabanTugasImg')?>"><img class="w-50" src="<?=base_url('assets/admin/icons/img-md.png')?>" alt=""></i></a></td>
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
        <h6 class="modal-title text-secondary" id="myModalLabel">Apakah tugas sudah di serahkan ke guru pengajar ?</h6>
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
			content : '<div class="media"><a href="<?= base_url('Siswa/Tugas/pengumpulanOnline')?>" class="btn btn-sm btn-outline-primary mr-3">Online</a><a role="button" class="btn-langsung btn btn-sm btn-outline-success" id="btn-confirm">Langsung</a></div>'
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
		$("#result").html('<div class="alert alert-success alert-dismissible h6"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Berhasil</strong> Silahkan cek pada tab <strong>nilai tugas !</strong></div>');
	}else{
		$("#result").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Dibatalkan </strong> Mohon serahkan pengerjaan tugas dahulu ke guru pengajar</div>');
	}
	});
</script>





