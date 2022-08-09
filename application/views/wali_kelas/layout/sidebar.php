<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="sidebar-item <?= ($this->uri->segment(2) == "dashboard") ? 'selected' : '' ?>"> <a class="sidebar-link sidebar-link" href="<?= base_url('wali-kelas/dashboard') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "data") ? 'selected' : '' ?>""> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('wali-kelas/data/data_siswa') ?>" class="sidebar-link"><span class="hide-menu"> Data Siswa</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('wali-kelas/data/jadwal_pelajaran') ?>" class="sidebar-link"><span class="hide-menu"> Data Jadwal</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>">
					<a class="sidebar-link sidebar-link" href="<?= base_url('wali-kelas/jurnal_materi') ?>" aria-expanded="false">
						<i data-feather="book" class="feather-icon"></i>
						<span class="hide-menu">Jurnal Materi</span>
					</a>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>">
					<a class="sidebar-link sidebar-link" href="<?= base_url('wali-kelas/konsultasi') ?>" aria-expanded="false">
						<i data-feather="message-square" class="feather-icon"></i>
						<span class="hide-menu">Konsultasi
							<!-- notif badge -->
							<span class="badge-info-ak"></span>
						</span>
					</a>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>">
					<a class="sidebar-link sidebar-link" href="<?= base_url('wali-kelas/info_akademik') ?>" aria-expanded="false">
						<i data-feather="info" class="feather-icon"></i>
						<span class="hide-menu">Info Akademik
							<!-- notif badge -->
							<span class="badge-info-ak"></span>
						</span>
					</a>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item"><a class="sidebar-link sidebar-link" href="javascript:void(0)" id="logout-wali-kelas" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
				<li class="list-divider"></li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
