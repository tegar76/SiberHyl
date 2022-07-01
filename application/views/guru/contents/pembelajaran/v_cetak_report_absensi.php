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
    <style>
        body {
            width: 230mm;
            height: 100%;
            margin: 0 auto;
            padding: 0;
            font-size: 12pt;
            background: rgb(204,204,204); 
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
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
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
            html, body {
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

        .title {
            font-size: 18px;
            color: #333333;
        }

        .sub-title {
            font: 15px;
            color: #333333;
        }

        .date {
            font-size: 14px;
            color: #6b6b6b;
        }

        .atribute {
            font-size: 14px;
            color: #4b4b4b;
        }

        .content table {
            font-size: 14px;
            color: #4b4b4b;
        }
    </style>
    
    <title><?= $title ?></title>

  </head>

  <body>
   
    <div class="container">
    <a role="button" class="btn btn-success btn-sm text-white ml-4 mt-3 mb-n4" data-toggle="popover" data-placement="bottom"><i class="fa-solid fa-download text-white ml-1"></i> Unduh</a>
        <div class="main-page">
            <div class="sub-page text-center">
                <div class="title mb-1">LAPORAN HASIL ABSENSI SISWA</div>
                <div class="sub-title mb-1">Semester Genap Tahun Pelajaran 2021/2022</div>
                <div class="sub-title mb-4">SMK Kesatrian Purwokerto</div>
                <div class="date text-right mb-3">Tanggal Cetak : 12 - 06 -2022</div>
                <div class="row atribute text-left">
                    <div class="col-sm-2"><p>Kode Guru</p></div>
                    <div class="col"><p><span> : </span>AZ</p></div>
                </div>
                <div class="row atribute text-left">
                    <div class="col-sm-2"><p>Kelas</p></div>
                    <div class="col"><p><span> : </span>XI TKRO 1</p></div>
                </div>
                <div class="row atribute text-left">
                    <div class="col-sm-2"><p>Mapel</p></div>
                    <div class="col"><p><span> : </span>Panel Sasis Dan Pemindahan Tenaga KR</p></div>
                </div>
                <div class="row atribute text-left mb-4">
                    <div class="col-sm-2"><p>Pertemuan Ke-</p></div>
                    <div class="col"><p><span> : </span>1 s/d 7</p></div>
                </div>
                <div class="content text-left">
                    <table border="1" cellpadding="15">
                       <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">NIS</th>
                                <th rowspan="2">Nama</th>
                                <th colspan="7">Pertemuan Ke-</th>
                                <th colspan="4">Total</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>H</th>
                                <th>A</th>
                                <th>S</th>
                                <th>I</th>
                            </tr>
                       </thead>
                      <tbody>
                            <tr>
                                <td>1</td>
                                <td>2010049</td>
                                <td>ADIT PRAYITNO</td>
                                <td>h</td>
                                <td>h</td>
                                <td>h</td>
                                <td>h</td>
                                <td>h</td>
                                <td>s</td>
                                <td>s</td>
                                <td>5</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2010049</td>
                                <td>ADZKA AZZAM FIKRI</td>
                                <td>h</td>
                                <td>h</td>
                                <td>h</td>
                                <td>h</td>
                                <td>h</td>
                                <td>s</td>
                                <td>s</td>
                                <td>5</td>
                                <td>0</td>
                                <td>2</td>
                                <td>0</td>
                            </tr>
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

	<!-- Bootstrap Js -->
	<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/jquery.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/popper.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/bootstrap.js"></script>

    </body>

</html>


