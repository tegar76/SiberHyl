<!DOCTYPE html>
<html lang="en">

<body>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- style -->
		<style>
			body {
				width: 230mm;
				height: 100%;
				margin: 0 auto;
				padding: 0;
				font-size: 12pt;
				background: rgb(204, 204, 204);
			}

			* {
				box-sizing: border-box;
				-moz-box-sizing: border-box;
			}

			.main-page {
				width: 210mm;
				min-height: 297mm;
				margin: 10mm auto;
				background: white;
				box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
			}

			.sub-page {
				padding: 1cm;
				height: 297mm;
			}

			@page {
				size: A4;
				margin: 0;
			}

			@media print {

				html,
				body {
					width: 210mm;
					height: 297mm;
				}

				.main-page {
					margin: 0;
					border: initial;
					border-radius: initial;
					width: initial;
					min-height: initial;
					box-shadow: initial;
					background: initial;
					page-break-after: always;
				}
			}

			.title-page {
				text-align: center;
			}

			.title {
				font-size: 18px;
				color: #333333;
				padding-bottom: 10px;
			}

			.sub-title {
				font: 15px;
				color: #444444;
				padding-bottom: 10px;
			}

			.date {
				font-size: 14px;
				color: #6b6b6b;
				text-align: right;
			}

			.atribute {
				font-size: 14px;
				color: #4b4b4b;
			}

			.atribute p span {
				color: #6b6b6b;
				margin-left: 10px;
			}

			.button {
				background-color: #4CAF50;
				/* Green */
				border: none;
				color: white;
				padding: 10px;
				text-align: center;
				text-decoration: none;
				font-size: 15px;
				border-radius: 5px;
				margin-left: 40px;
				margin-top: 40px;
			}

			table,
			th,
			td {
				border: 1px solid;
				border-collapse: collapse;
				font-size: 14px;
				color: #4b4b4b;
				margin-top: 40px;
			}
		</style>

		<title><?= $title ?></title>

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

	</body>

</html>
