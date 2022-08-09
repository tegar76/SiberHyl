<!DOCTYPE html>
<html lang="en">

<body>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- style -->
		<style>
			* {
				box-sizing: border-box;
				-moz-box-sizing: border-box;
			}

			.main-page {
				margin: 10mm auto;
				background: white;
				box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
			}

			.sub-page {
				padding-left: 2cm;
				padding-right: 2cm;
				padding-top: 1cm;
				padding-bottom: 1cm;
			
			}

			@page {
				size: A4;
				margin: 0;
			}

			@media print {
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
				font: 16px;
				color: #444444;
				padding-bottom: 8px;
			}

			.date {
				font-size: 14px;
				color: #6b6b6b;
				text-align: right;
			}

			.atribute {
				font-size: 15px;
				color: #4b4b4b;
			}

			.atribute p span {
				color: #6b6b6b;
				margin-left: 10px;
			}

			table {
				width: 100%;
			}

			table,
			th,
			td {
				border: 1px solid;
				border-collapse: collapse;
				font-size: 14px;
				color: #4b4b4b;
				margin-top: 20px;
			}
		</style>

		<title><?= $title ?></title>

	</head>

	<body>

		<div class="container">
			<div class="main-page">
				<div class="sub-page">
					<div class="title-page">
						<div class="title"><?= $title; ?></div>
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
						<p>Tugas Pertemuan Ke- <span>: <?= $pertKe ?></span></p>
					</div>

					<div class="content text-left">
						<table cellpadding="14">
							<thead>
								<tr>
									<th rowspan="2">No</th>
									<th rowspan="2">NIS</th>
									<th rowspan="2">Nama</th>
									<th colspan="<?= count($tugas) ?>">Tugas Pertemuan Ke-</th>
									<th rowspan="2">Total</th>
									<th rowspan="2">Rata-rata</th>
								</tr>
								<tr>
									<?php
									foreach ($tugas as $row) {
										echo '<th>' . $row->pertemuan . '</th>';
									} ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rekapTugas as $value) : ?>
									<tr>
										<td><?= $value['nomor'] ?></td>
										<td><?= $value['nis'] ?></td>
										<td><?= $value['nama'] ?></td>
										<?php
										foreach ($tugas	as $val) {
											$tgs = $this->guru->getNilaiTugas($val->tugas_id, $value['nis']);
											if ($tgs) {
												echo '<td>' . $tgs->nilai . '</td>';
											} else {
												echo '<td>-</td>';
											}
										}
										?>
										<td><?= ($value['sum']) ? $value['sum'] : '-' ?></td>
										<td><?= ($value['avg']) ? $value['avg'] : '-' ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<!-- Tampilkan Seluruh data -->
						</table>
					</div>
				</div>
			</div>
		</div>

	</body>

</html>
