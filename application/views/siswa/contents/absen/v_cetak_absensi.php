<!DOCTYPE html>
<html lang="en">

<body>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!--====== Favicon Icon ======-->
		<link rel="shortcut icon" href="<?= base_url('assets/') ?>logo/logo-sm.png" type="image/png">

		<!-- Bootstrap Css -->
		<link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/css/bootstrap.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

		<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

		<!-- style -->
		<link rel="stylesheet" href="<?= base_url('assets/siswa/css/print/styles.css') ?>">

		<title><?= $title ?></title>

	</head>

	<body>

		<div class="container">
			<a href="<?= base_url('siswa/absensi/cetak_riwayat_absensi/') ?>" role="button" class="btn btn-success btn-sm text-white ml-4 mt-3 mb-n4" data-toggle="popover" data-placement="bottom"><i class="fa-solid fa-download text-white ml-1"></i> Unduh</a>
			<div class="main-page">
				<div class="sub-page text-center">
					<div class="title mb-1">LAPORAN HASIL HASIL ABSENSI SISWA</div>
					<div class="sub-title mb-1">Semester Genap Tahun Pelajaran 2021/2022</div>
					<div class="sub-title mb-4">SMK Kesatrian Purwokerto</div>
					<div class="date text-right mb-3">Tanggal Cetak : <?= $print['tanggal_cetak'] ?></div>
					<div class="row atribute text-left">
						<div class="col-sm-3">
							<p>Kode Guru</p>
						</div>
						<div class="col">
							<p><span> : </span><?= $print['kode_guru'] ?></p>
						</div>
					</div>
					<div class="row atribute text-left">
						<div class="col-sm-3">
							<p>Kelas</p>
						</div>
						<div class="col">
							<p><span> : </span><?= $print['kelas'] ?></p>
						</div>
					</div>
					<div class="row atribute text-left">
						<div class="col-sm-3">
							<p>Mapel</p>
						</div>
						<div class="col">
							<p><span> : </span><?= $print['mapel'] ?></p>
						</div>
					</div>
					<div class="row atribute text-left mb-4">
						<div class="col-sm-3">
							<p>Pertemuan Ke-</p>
						</div>
						<div class="col">
							<p><span> : </span><?= $print['pertemuan'] ?></p>
						</div>
					</div>
					<div class="content">
						<table border="1" cellpadding="10">
							<tr>
								<th rowspan="2">No</th>
								<th rowspan="2">NIS</th>
								<th rowspan="2">Nama</th>
								<th colspan="<?= count($print['rekap_absen']) ?>">Pertemuan Ke-</th>
								<th colspan="4">Total</th>
							</tr>
							<tr>
								<!-- <td>1</td>
                            <td>2010049</td>
                            <td>ADIT PRAYITNO</td> -->
								<?php foreach ($print['rekap_absen'] as $row) : ?>
									<th><?= $row->pert_ke ?></th>
								<?php endforeach; ?>
								<th>H</th>
								<th>A</th>
								<th>S</th>
								<th>I</th>
							</tr>
							<tr>
								<td>1</td>
								<td><?= $print['siswa_nis'] ?></td>
								<td><?= $print['siswa_nama'] ?></td>
								<?php foreach ($print['rekap_absen'] as $row) : ?>
									<th><?= $row->status ?></th>
								<?php endforeach; ?>
								<td>5</td>
								<td>0</td>
								<td>2</td>
								<td>0</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<footer>
			<center>
				<p>&copy; 2022 Team Paradoks Technology</p>
			</center>
		</footer>

		<!-- Bootstrap Js -->
		<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/jquery.js"></script>
		<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/popper.js"></script>
		<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/bootstrap.js"></script>

	</body>

</html>
