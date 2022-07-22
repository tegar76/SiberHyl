<div class="preloader">
	<div class="lds-ripple">
		<div class="lds-pos"></div>
		<div class="lds-pos"></div>
	</div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
	<!-- ============================================================== -->
	<!-- Topbar header - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<header class="topbar" data-navbarbg="skin6">
		<nav class="navbar top-navbar navbar-expand-md">
			<div class="navbar-header" data-logobg="skin6">
				<!-- This is for the sidebar toggle which is visible on mobile only -->
				<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
				<!-- ============================================================== -->
				<!-- Logo -->
				<!-- ============================================================== -->
				<div class="navbar-brand">
					<!-- Logo icon -->
					<a href="index.html">
						<b class="logo-icon">
							<!-- Dark Logo icon -->
							<img src="<?= base_url('assets/') ?>logo/logo-big.png" alt="homepage" class="dark-logo w-75" />
							<!-- Light Logo icon -->
						</b>
						<!--End Logo icon -->
					</a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Toggle which is visible on mobile only -->
				<!-- ============================================================== -->
				<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
			</div>
			<!-- ============================================================== -->
			<!-- End Logo -->
			<!-- ============================================================== -->
			<div class="navbar-collapse collapse" id="navbarSupportedContent">
				<!-- ============================================================== -->
				<!-- toggle and nav items -->
				<!-- ============================================================== -->
				<ul class="navbar-nav float-left mr-auto ml-3 pl-1"></ul>
				<!-- ============================================================== -->
				<!-- Right side toggle and nav items -->
				<!-- ============================================================== -->
				<ul class="navbar-nav float-right">
					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ============================================================== -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

							<span class="ml-2 d-none d-lg-inline-block"><span>Selamat Datang,</span> <span class="text-dark mr-1"><?= $this->session->userdata('fullName') ?></span>
								<img src="<?= ($guru->guru_foto == 'default_profile.png') ? base_url('assets/siswa/img/profile.png') : base_url('storage/guru/profile/' . $guru->guru_foto) ?>" alt="user" class="rounded-circle" width="40">
						</a>
						<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
							<a class="dropdown-item" href="<?= base_url('wali-kelas/profile') ?>"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
								Profil</a>
							<a class="dropdown-item" href="<?= base_url('wali-kelas/profile/update_password') ?>"><i data-feather="key" class="svg-icon mr-2 ml-1"></i>
								Edit Password</a>
							<hr>
							<a class="dropdown-item" id="logout-wali-kelas" href="javascript:void(0)"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
								Logout</a>
					</li>
					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ============================================================== -->
				</ul>
			</div>
		</nav>
	</header>
