<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<!-- import style -->
<?php include APPPATH.'../assets/guru/css/import_style.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Dashboard</h3>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
		<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Pembagian Tugas Mengajar Semester Gasal  Tahun Pelajaran 2021/2022 						
						</h6>
						<div class="sub-title">
							<div class="info">
								<p>Kode Guru : <span class="ml-2">AZ</span></p>
								<p>Nama :  <span class="ml-2">Sulton Akbar Pamungkas, S. Pd.</span></p>
							</div>
						</div>
						<div class="mt-4 activity">
							<table class="table-bordered" style="width:100%">
							<thead>
								<tr>
									<th style="width: 6%;">No</th>
									<th style="width: 25%;">Mata pelajaran</th>
									<th style="width: 20%;">Kompetensi keahlian</th>
									<th style="width: 10%;">Jumlah Rom</th>
									<th style="width: 10%;">Jumlah Jam</th>
									<th style="width: 10%;">Jumlah</th>
								</tr>
							</thead>
								<tbody>
										<tr>
											<td>1</td>
											<td>Pemeliharaan Kelistrikan Kendaraan Ringan</td>
											<td>X TKRO 1</td>
											<td>1</td>
											<td>8</td>
											<td>8</td>
										</tr>
								</tbody>
								<tbody>
										<tr>
											<td>2</td>
											<td>Pemel. Sasis dan Pemindah Tenaga KR</td>
											<td>XI TKRO 4 , XI TKRO 5 </td>
											<td>1</td>
											<td>8</td>
											<td>8</td>
										</tr>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5" class="text-right">Total Jam Mengajar</th>
										<td>21</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							<a class="search-icon" href=""><i class="fa fa-magnifying-glass mr-2"></i></a>
							Pengajuan Surat Dari Siswa  Semester Gasal Tahun Pelajaran 2021/2022						
						</h6>
						<div class="mt-4 activity">
							<table id="pengajuan_surat" class="table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width: 6%;">No</th>
										<th style="width: 23%;">Tanggal</th>
										<th style="width: 8%;">NIS</th>
										<th style="width: 17%;">Nama</th>
										<th style="width: 12%;">Kelas</th>
										<th style="width: 20%;">Jenis Surat</th>
										<th style="width: 8%;">File</th>
										<th style="width: 14%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<td>1</td>
											<td>Senin, 22 - 05 -2022</td>
											<td>2010049</td>
											<td>Jason</td>
											<td>XI TKRO 1</td>
											<td>Surat Izin Mengikuti Kegiatan</td>
											<td>
												<a target="_blank" href="<?= base_url('Guru/Pembelajaran/lihatFileSurat') ?>"><img src="<?= base_url('assets/admin/icons/img.png') ?>" alt=""></a>
											</td>
											<td><a id="id_bdt"  class="btn btn-sm detail-jurnal btn-outline-danger text-danger btn-rounded-sm">Belum Dilihat</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Senin, 22 - 05 -2022</td>
											<td>2010050</td>
											<td>Mikael</td>
											<td>XI TKRO 1</td>
											<td>Surat Izin Sakit</td>
											<td>
												<a target="_blank" href="<?= base_url('Guru/Pembelajaran/lihatFileSurat') ?>"><img src="<?= base_url('assets/admin/icons/img.png') ?>" alt=""></a>
											</td>
											<td><a id="id_bdt" class="btn btn-sm btn-outline-success text-success btn-rounded-sm">Sudah Dilihat</a></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

