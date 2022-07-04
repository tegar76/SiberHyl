<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title?></h3>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
		<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Pembagian Tugas Wali Kelas Semester Gasal  Tahun Pelajaran 2021/2022 						
						</h6>
						<div class="mt-4 activity">
							<table class="table-bordered" style="width:100%">
							<thead>
								<tr>
									<th style="width: 4%;">No</th>
									<th style="width: 6%;">Kode Guru</th>
									<th style="width: 18%;">Nama</th>
									<th style="width: 6%;">Kelas</th>
									<th style="width: 10%;">Dibuat</th>
									<th style="width: 10%;">Diedit</th>
								</tr>
							</thead>
								<tbody>
										<tr>
											<td>1</td>
											<td>AZ</td>
											<td>Sulton Akbar Pamungkas, S. Pd.</td>
											<td>X TKRO 1</td>
											<td>01 - 05 - 2022 07 : 00 WIB </td>
											<td>-</td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							<a class="search-icon" href="<?= base_url('WaliKelas/JurnalMateri')?>"><i class="fa fa-magnifying-glass mr-2"></i></a>
							Jurnal Materi  Semester Gasal Tahun Pelajaran 2021/2022 						
						</h6>
						<div class="mt-4 activity">
							<table id="pengajuan_surat" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 4%;">No</th>
										<th style="width: 15%;">Hari, tanggal</th>
										<th style="width: 8%;">Kode Guru</th>
										<th style="width: 17%;">Mapel</th>
										<th style="width: 8%;">Kelas</th>
										<th style="width: 10%;">Pertemuan Ke-</th>
										<th style="width: 20%;">Pembahasan</th>
										<th style="width: 12%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td>1</td>
											<td>Senin, 22 - 05 -2022</td>
											<td>AZ</td>
											<td>Bahasa Inggris</td>
											<td>XI TKRO 1</td>
											<td>1</td>
											<td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur, omnis. Corporis numquam aperiam soluta quae.</td>
											<td><a id="id_bdt" href="<?= base_url('WaliKelas/JurnalMateri/detailJurnalMateri')?>"  class="btn btn-sm detail-jurnal btn-outline-danger text-danger btn-rounded-sm">Belum Dilihat</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Senin, 22 - 05 -2022</td>
											<td>AZ</td>
											<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											<td>XI TKRO 1</td>
											<td>1</td>
											<td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, in.</td>
											<td><a id="id_bdt" href="<?= base_url('WaliKelas/JurnalMateri/detailJurnalMateri')?>" class="btn btn-sm btn-outline-success text-success btn-rounded-sm">Sudah Dilihat</a></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

