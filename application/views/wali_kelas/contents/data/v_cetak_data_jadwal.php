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
            background: rgb(204,204,204); 
            font-family: Arial, Helvetica, sans-serif;
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

        .button {
            background-color: #4CAF50; /* Green */
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


        /* Float four columns side by side */
        .column {
        float: left;
        width: 33%;
        padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding in columns */
        .row {margin: 0 -5px;}

        /* Clear floats after the columns */
        .row:after {
        content: "";
        display: table;
        clear: both;
        }

        /* Style the counter cards */
        .card {
        padding: 10px;
        text-align: center;
        background-color: #ffffff;
        border: 1px solid #b8b8b8;
        border-radius: 7px;
        }

        .card .content {
            height: 160px;
        }

        .card .content .day {
            color: #000000;
            font-size: 20px;
        }

        .card .content .mapel {
            color: #3b3b3b;
            font-size: 16px;
            line-height: 25px;
            height: 65px;
        }

        .card-day {
            background: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 1), rgba(196, 221, 229, 1), rgba(41, 137, 168, 1));
            border: solid 1px;
            border-color: #b8b8b8;
            width: 100%;
        }

        .attribute {
            color: #3b3b3b;
            font-size: 14px;
            font-weight: 300;
            text-align: left;
        }

        .attribute img {
        width: 18px;
        height: 18px;
        }

        .mb-15 {
            margin-bottom: 15px;
        }

        .mb-25 {
            margin-bottom: 25px;
        }

        .ml-15 {
            margin-left: 15px;
        }

        .mt-15 {
            margin-top: 15px;
        }

        .mt-10 {
            margin-top: 10px;
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
                    <div class="title">JADWAL PELAJARAN KELAS XI TKRO 1</div>
                    <div class="sub-title">Semester Genap Tahun Pelajaran 2021/2022</div>
                    <div class="sub-title">SMK Kesatrian Purwokerto</div>
                </div>
                <div class="date mb-25">
                    <p>Tanggal Cetak : 12 - 06 -2022</p>
                </div>     

                <div class="row">
                    <!-- looping jadwal -->
                    <div class="column mt-15">
                        <div class="card">
                            <div class="card card-day">
                                <div class="day">SENIN</div>
                            </div>
                            <!-- looping mapel -->
                            <div class="card mt-10">
                                <div class="content">
                                    <div class="mapel">Panel Sasis Dan Pemindahan Tenaga KR</div>
                                    <div class="attribute ml-10">
                                        <div class=""><img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt=""><span class="ml-15">AZ</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt=""><span class="ml-15">07.00 : 13.00</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt=""><span class="ml-15">MM 1</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- looping jadwal -->
                      <div class="column mt-15">
                        <div class="card">
                            <div class="card card-day">
                                <div class="day">SELASA</div>
                            </div>
                            <!-- looping mapel -->
                            <div class="card mt-10">
                                <div class="content">
                                    <div class="mapel">Bahasa Inggis</div>
                                    <div class="attribute ml-10">
                                        <div class=""><img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt=""><span class="ml-15">AZ</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt=""><span class="ml-15">07.00 : 13.00</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt=""><span class="ml-15">MM 1</span></div>
                                    </div>
                                </div>
                            </div>
                            <!-- looping mapel -->
                            <div class="card mt-10">
                                <div class="content">
                                    <div class="mapel">Pemeliharaan Kendaraan Ringan</div>
                                    <div class="attribute ml-10">
                                        <div class=""><img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt=""><span class="ml-15">AZ</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt=""><span class="ml-15">07.00 : 13.00</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt=""><span class="ml-15">MM 1</span></div>
                                    </div>
                                </div>
                            </div>
                             <!-- looping mapel -->
                             <div class="card mt-10">
                                <div class="content">
                                    <div class="mapel">Matematika</div>
                                    <div class="attribute ml-10">
                                        <div class=""><img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt=""><span class="ml-15">AZ</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt=""><span class="ml-15">07.00 : 13.00</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt=""><span class="ml-15">MM 1</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- looping jadwal -->
                     <div class="column mt-15">
                        <div class="card">
                            <div class="card card-day">
                                <div class="day">SENIN</div>
                            </div>
                            <!-- looping mapel -->
                            <div class="card mt-10">
                                <div class="content">
                                    <div class="mapel">Panel Sasis Dan Pemindahan Tenaga KR</div>
                                    <div class="attribute ml-10">
                                        <div class=""><img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt=""><span class="ml-15">AZ</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt=""><span class="ml-15">07.00 : 13.00</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt=""><span class="ml-15">MM 1</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- looping jadwal -->
                    <div class="column mt-15">
                        <div class="card">
                            <div class="card card-day">
                                <div class="day">SENIN</div>
                            </div>
                            <!-- looping mapel -->
                            <div class="card mt-10">
                                <div class="content">
                                    <div class="mapel">Panel Sasis Dan Pemindahan Tenaga KR</div>
                                    <div class="attribute ml-10">
                                        <div class=""><img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt=""><span class="ml-15">AZ</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt=""><span class="ml-15">07.00 : 13.00</span></div>
                                        <div class="mt-10"><img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt=""><span class="ml-15">MM 1</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                  
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


