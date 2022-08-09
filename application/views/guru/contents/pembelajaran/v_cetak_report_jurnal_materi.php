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

	</head>

	<body>

		<div class="container">
			<br>
			<a role="button" href="" class="button">Unduh</a>
			<div class="main-page">
				<div class="sub-page">
					<div class="title-page">
						<div class="title">LAPORAN JURNAL MATERI</div>
						<div class="sub-title">Semester Genap Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></div>
						<div class="sub-title">SMK Kesatrian Purwokerto</div>
					</div>
					<div class="date">
						<p>Tanggal Cetak : <?= $dateExport ?></p>
					</div>
					<div class="atribute">
						<p>Kode Guru <span>: <?= $teacherCode ?></span></p>
						<p>Kelas <span>: <?= $className ?></span></p>
						<p>Mapel <span>: <?= $lessonName ?></span></p>
					</div>

					<div class="content text-left">
						<table cellpadding="14">
							<thead>
								<tr>
									<th style="width: 2%;">No</th>
									<th style="width: 10%;">Tanggal</th>
									<th style="width: 10%;">Pertemuan Ke-</th>
									<th style="width: 10%;">Kompetensi Dasar</th>
									<th style="width: 10%;">Pembahasan</th>
									<th style="width: 10%;">Catatan</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jurnal as $row => $value) : ?>
									<tr>
										<td><?= $value['nomor'] ?></td>
										<td><?= $value['tanggal'] ?></td>
										<td><?= $value['pertemuan'] ?></td>
										<td><?= $value['kd_materi'] ?></td>
										<td><?= $value['pembahasan'] ?></td>
										<td><?= $value['catatan_kbm'] ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<!-- Tampilkan Seluruh data -->
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
