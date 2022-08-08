<!doctype html>
<html lang="en">

<head>

	<!--====== Required meta tags ======-->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--====== Title ======-->
	<title><?= $title ?></title>

	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>logo/logo-sm.png" type="image/png">

	<!--====== Bootstrap css ======-->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>home/css/bootstrap.min.css">

	<!--====== Line Icons css ======-->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>home/css/LineIcons.css">

	<!--====== Magnific Popup css ======-->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>home/css/magnific-popup.css">

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--====== Default css ======-->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>home/css/default.css">

	<!--====== Style css ======-->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>home/css/styles.css">

	<!-- SweetAlert 2 -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.min.css">
	<script src="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>

</head>

<body>
	<!--====== HEADER PART START ======-->

	<header class="header-area">
		<div class="navgition navgition-transparent">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg">
							<a class="navbar-brand" href="#">
								<img src="<?= base_url('assets/') ?>logo/logo-big.png" alt="Logo" class="w-75">
							</a>

							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
								<ul class="navbar-nav m-auto">
									<li class="nav-item active">
										<a class="page-scroll" href="#home">HOME</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="#service">TENTANG</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="#pricing">FITUR</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="#contact">KONTAK</a>
									</li>
								</ul>
							</div>


						</nav> <!-- navbar -->
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
		</div> <!-- navgition -->

		<div id="home" class="header-hero bg_cover" style="background-image:  url(assets/home/images/bg-head.png)">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-8 col-lg-10">
						<div class="header-content text-center">
							<div id="typing">
								<h3 class="header-title">Selamat Datang</h3>
							</div>
							<p class="text">Siswa dan Guru Pengajar <span>SMK Kesatrian Purwokerto Di SiberHyl</span>, Sebuah platform yang memudahan proses belajar-mengajar anda dengan konsep Hybrid Learning </p>
							<div class="header-btn mt-4">
								<a href="<?= base_url('login') ?>" class="main-btn btn-one">Masuk <i class="fa fa-caret-right" style="color: white;"></i></a>
							</div>
						</div> <!-- header content -->
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
			<div class="header-shape">
				<img src="<?= base_url('assets/') ?>home/images/header-shape.svg" alt="shape">
			</div>
		</div> <!-- header content -->
	</header>

	<!--====== HEADER PART ENDS ======-->

	<!--====== SERVICES PART START ======-->

	<section id="service" class="services-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="section-title pb-10">
						<h4 class="title">Tentang SiberHyl</h4>
						<p class="text">
							<span>SiberHyl</span> adalah sebuah platfrom LMS(Learning Management System) dengan menciptakan pembelajaran secara hybrid learning. Hybrid learning sendiri merupakan metode pembelajaran yang menggabungkan kegiatan belajar daring dan luring secara teratur dan efektif.
						</p>
					</div> <!-- section title -->
				</div>
			</div> <!-- row -->
			<div class="row">
				<div class="col-lg-7">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title mt-40 mb-20">
								<h4 class="sub-title">Tujuan Hybrid Learning</h4>
							</div>
							<div class="services-content d-sm-flex pb-15">
								<div class="services-icon">
									<img class="rotate90" src="<?= base_url('assets/') ?>home/images/favicon.png" alt="">
								</div>
								<div class="services-content media-body mt-n2">
									<p class="text">
										<span>Live event,</span> artinya pembelajaran langsung atau tatap muka yang dilakukan dengan waktu dan tempat yang sama. Bisa juga dilakukan dengan waktu yang sama pula tetapi dengan tempat yang berbeda
									</p>
								</div>
							</div> <!-- services content -->
							<div class="services-content d-sm-flex pb-15">
								<div class="services-icon">
									<img class="rotate90" src="<?= base_url('assets/') ?>home/images/favicon.png" alt="">
								</div>
								<div class="services-content media-body mt-n2">
									<p class="text">
										<span>Self-paced learning,</span> artinya mengkombinasikan dengan pembelajaran secara mandiri yang memungkinkan siswa belajar kapan saja dan dimana saja secara daring
									</p>
								</div>
							</div> <!-- services content -->
							<div class="services-content d-sm-flex pb-15">
								<div class="services-icon">
									<img class="rotate90" src="<?= base_url('assets/') ?>home/images/favicon.png" alt="">
								</div>
								<div class="services-content media-body mt-n2">
									<p class="text">
										<span>Collaboration,</span> artinya kolaborasi antara guru dan siswa, siswa dan siswa dalam kegiatan belajar mengajar
									</p>
								</div>
							</div> <!-- services content -->
							<div class="services-content d-sm-flex pb-15">
								<div class="services-icon">
									<img class="rotate90" src="<?= base_url('assets/') ?>home/images/favicon.png" alt="">
								</div>
								<div class="services-content media-body mt-n2">
									<p class="text">
										<span>Assesment,</span> artinya guru dapat mengkombinasikan penilaian daring ataupun luring. bentuknya seperti tugas harian dan ujian per-akhir bab
									</p>
								</div>
							</div> <!-- services content -->
							<div class="services-content d-sm-flex pb-15">
								<div class="services-icon">
									<img class="rotate90" src="<?= base_url('assets/') ?>home/images/favicon.png" alt="">
								</div>
								<div class="services-content media-body mt-n2">
									<p class="text">
										<span>Performa support materials,</span> artinya bahan ajar harus dapat tersedia dalam bentuk digital. harapannya agar bahan ajar tersebut dapat dengan mudah di akses oleh siswa, baik secara daring maupun luring
									</p>
								</div>
							</div> <!-- services content -->
						</div>
					</div> <!-- row -->
				</div> <!-- row -->
			</div> <!-- row -->
		</div> <!-- conteiner -->
		<div class="services-image d-lg-flex align-items-center">
			<div class="image">
				<img src="<?= base_url('assets/') ?>home/images/service-ilustration.png" alt="Services">
			</div>
		</div> <!-- services image -->
	</section>

	<!--====== SERVICES PART ENDS ======-->

	<!--====== PRICING PART START ======-->

	<section id="pricing" class="pricing-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title text-center pb-10">
						<h4 class="title">Fitur SiberHyl</h4>
						<p class="text">
							Dalam <span>SiberHyl</span> terdapat fitur-fitur utama untuk menunjang pembelajaran daring atau luring yang efektif dan efisien diantaranya :
						</p>
					</div> <!-- section title -->
				</div>
			</div> <!-- row -->
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-7 col-sm-9">
					<div class="single-pricing enterprise mt-40">
						<div class="pricing-flower">
							<img src="<?= base_url('assets/') ?>home/images/feature-siswa.png" alt="flower">
						</div>
						<div class="pricing-header text-right">
							<h5 class="price sub-title">Siswa</h5>
						</div>
						<div class="pricing-list">
							<ul>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Informasi Akademik</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Jadwal Pelajaran</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Absensi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Materi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Video Pembelajaran</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Tugas Harian</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Evaluasi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Diskusi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Pengajuan Surat</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Konsultasi dengan Wali Kelas </li>
							</ul>
						</div>
					</div> <!-- single pricing -->
				</div>

				<div class="col-lg-4 col-md-7 col-sm-9">
					<div class="single-pricing enterprise mt-40">
						<div class="pricing-flower">
							<img src="<?= base_url('assets/') ?>home/images/feature-guru.png" alt="guru">
						</div>
						<div class="pricing-header text-right">
							<h5 class="price sub-title">Guru</h5>
						</div>
						<div class="pricing-list">
							<ul>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Melihat Data Siswa Yang Diajar</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Menerima Pengajuan Surat</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Mengelola Data Absensi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Mengelola Jurnal Materi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Mengelola Data Materi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Mengelola Data Tugas Harian</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Mengelola Evaluasi</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Diskusi Antara Guru & Siswa</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Melihat Info Akademik</li>
							</ul>

						</div>
					</div> <!-- single pricing -->
				</div>

				<div class="col-lg-4 col-md-7 col-sm-9">
					<div class="single-pricing enterprise mt-40">
						<div class="pricing-flower">
							<img src="<?= base_url('assets/') ?>home/images/feature-wali-kelas.png" alt="wali kelas">
						</div>
						<div class="pricing-header text-right">
							<h5 class="price sub-title">Wali kelas</h5>
						</div>
						<div class="pricing-list">
							<ul>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Melihat Jadwal Kelas Yang Dibimbing</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Melihat Data Siswa Yang Dibimbing</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Melihat Jurnal Materi Dari Guru</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Ruang Diskusi Wali Kelas Dan Siswa</li>
								<li> <i class="fa fa-check-circle-o" aria-hidden="true"></i> Info Akademik</li>
							</ul>

						</div>
					</div> <!-- single pricing -->
				</div>
			</div> <!-- row -->
		</div> <!-- conteiner -->
	</section>

	<!--====== CONTACT PART START ======-->

	<section id="contact" class="contact-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title text-center pb-10">
						<h4 class="title">Hubungi Kami</h4>
						<p class="text">
							Kami Siap Membantu Anda Jika memiliki Kendala Login
							Dan Pengaksesan Fitur di <span>SiberHyl</span>
						</p>
					</div> <!-- section title -->
				</div>
			</div> <!-- row -->
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="contact-form">
						<?php $attr = array('id' => 'contact-form', 'data-toggle' => 'validator') ?>
						<?= form_open('/', $attr) ?>
						<div class="row">
							<div class="col-md-6">
								<div class="single-form form-group">
									<input type="text" name="nama_lengkap" placeholder="Nama Lengkap">
									<div class="help-block with-errors"></div>
									<?= form_error('nama_lengkap', '<div class="text-danger">', '</div>') ?>
								</div> <!-- single form -->
							</div>
							<div class="col-md-6">
								<div class="single-form form-group">
									<input type="text" name="email_user" placeholder="Email">
									<div class="help-block with-errors"></div>
									<?= form_error('email_user', '<div class="text-danger">', '</div>') ?>
								</div> <!-- single form -->
							</div>
							<div class="col-md-6">
								<div class="single-form form-group">
									<input type="text" name="subject" placeholder="Subjek">
									<div class="help-block with-errors"></div>
									<?= form_error('subject', '<div class="text-danger">', '</div>') ?>
								</div> <!-- single form -->
							</div>
							<div class="col-md-6">
								<div class="single-form form-group">
									<input type="text" name="no_phone" placeholder="No Hp">
									<div class="help-block with-errors"></div>
									<?= form_error('no_phone', '<div class="text-danger">', '</div>') ?>
								</div> <!-- single form -->
							</div>
							<div class="col-md-12">
								<div class="single-form form-group">
									<textarea placeholder="Pesan Anda ..." name="message"></textarea>
									<div class="help-block with-errors"></div>
									<?= form_error('message', '<div class="text-danger">', '</div>') ?>
								</div> <!-- single form -->
							</div>
							<p class="form-message"></p>
							<div class="col-md-12">
								<div class="single-form form-group text-center">
									<button type="submit" class="main-btn">Kirim</button>
								</div> <!-- single form -->
							</div>
						</div> <!-- row -->
						<?= form_close() ?>
					</div> <!-- row -->
				</div>
			</div> <!-- row -->
		</div> <!-- conteiner -->
	</section>

	<!--====== CONTACT PART ENDS ======-->

	<!--====== FOOTER PART START ======-->

	<footer id="footer" class="footer-area">
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-4 col-sm-6">
						<div class="footer-link">
							<h6 class="footer-title">Tentang Aplikasi</h6>
							<ul>
								<li><a href="#">➺ Sistem Informasi</a></li>
								<li><a href="#">➺ Hybrid Learning</a></li>
								<li><a href="#">➺ SiberHyl</a></li>
							</ul>
						</div> <!-- footer link -->
					</div>
					<div class="col-lg-5 col-md-4 col-sm-6">
						<div class="footer-link">
							<h6 class="footer-title">Sosial Media</h6>
							<ul class="py-3">
								<li><a href="#">➺ <i class="fa fa-instagram" aria-hidden="true"> </i> Instagram</a></li>
								<li><a href="#">➺ <i class="fa fa-facebook-square" aria-hidden="true"> </i> Facebook</a></li>
							</ul>
						</div> <!-- footer link -->
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6">
						<div class="footer-link">
							<h6 class="footer-title">Kontak Kami</h6>
							<ul>
								<li><a href="#">➺
										Jl.kyai badri, RT.07/03, Kec.Paguyangan, Kab. Brebes 52276
									</a></li>
							</ul>
						</div> <!-- footer link -->
					</div>

				</div> <!-- row -->
			</div> <!-- container -->
		</div> <!-- footer widget -->

		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="copyright text-center">
							<p class="text"><i class="fa fa-copyright" aria-hidden="true"> 2022 Team Paradoks Technology</i></p>
						</div>
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
		</div> <!-- footer copyright -->
	</footer>

	<!--====== FOOTER PART ENDS ======-->

	<!--====== BACK TO TOP PART START ======-->

	<a class="back-to-top" href="#"> <img class="rotate45" src="<?= base_url('assets/') ?>home/images/favicon.png" alt=""> </a>

	<!--====== BACK TO TOP PART ENDS ======-->

	<!--====== jquery js ======-->
	<script src="<?= base_url('assets/') ?>home/js/vendor/modernizr-3.6.0.min.js"></script>
	<script src="<?= base_url('assets/') ?>home/js/vendor/jquery-1.12.4.min.js"></script>

	<!--====== Bootstrap js ======-->
	<script src="<?= base_url('assets/') ?>home/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/') ?>home/js/popper.min.js"></script>

	<!--====== Scrolling Nav js ======-->
	<script src="<?= base_url('assets/') ?>home/js/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets/') ?>home/js/scrolling-nav.js"></script>

	<!--====== Magnific Popup js ======-->
	<script src="<?= base_url('assets/') ?>home/js/jquery.magnific-popup.min.js"></script>

	<!--====== Main js ======-->
	<script src="<?= base_url('assets/') ?>home/js/main.js"></script>

	<script>
		$(function() {
			var title = '<?= $this->session->flashdata("title") ?>';
			var text = '<?= $this->session->flashdata("text") ?>';
			var type = '<?= $this->session->flashdata("type") ?>';
			if (title) {
				swal.fire({
					icon: type,
					title: title,
					text: text,
					type: type,
					button: true,
				});
			};
		});
	</script>
</body>

</html>
