<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="sidebar-item <?= ($this->uri->segment(2) == "dashboard") ? 'selected' : '' ?>"> <a class="sidebar-link sidebar-link" href="<?= base_url('KepalaSekolah/Dashboard') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "MasterData") ? 'selected' : '' ?>"> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('KepalaSekolah/Data/dataKelas') ?>" class="sidebar-link"><span class="hide-menu"> Data Kelas</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('KepalaSekolah/Data/dataMapel') ?>" class="sidebar-link"><span class="hide-menu"> Data Mapel</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('KepalaSekolah/Data/dataRuangan') ?>" class="sidebar-link"><span class="hide-menu"> Data Ruangan</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('KepalaSekolah/Data/dataSiswa') ?>" class="sidebar-link"><span class="hide-menu"> Data Siswa</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('KepalaSekolah/Data/dataGuru') ?>" class="sidebar-link"><span class="hide-menu"> Data Guru</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "MasterData") ? 'selected' : '' ?>"> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Materi Pelajaran </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('KepalaSekolah/MateriPelajaran/dataMateriAdmin') ?>" class="sidebar-link"><span class="hide-menu"> Data Materi (Admin)</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('KepalaSekolah/MateriPelajaran/dataMateriGuru') ?>" class="sidebar-link"><span class="hide-menu"> Data Materi (Guru)</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>"> 
					<a class="sidebar-link sidebar-link" href="<?= base_url('KepalaSekolah/InfoAkademik') ?>" aria-expanded="false">
						<i data-feather="info" class="feather-icon"></i>
						<span class="hide-menu">Info Akademik
							<!-- notif badge -->
							<span class="badge-info-ak"></span>
						</span>
					</a>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>"> 
					<a class="sidebar-link sidebar-link" href="<?= base_url('KepalaSekolah/SuperVisor') ?>" aria-expanded="false">
						<i data-feather="airplay" class="feather-icon"></i>
						<span class="hide-menu">Super Visor
						</span>
					</a>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="#" id="logout" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
				<li class="list-divider"></li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
