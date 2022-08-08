<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="sidebar-item <?= ($this->uri->segment(2) == "dashboard") ? 'selected' : '' ?>"> <a class="sidebar-link sidebar-link" href="<?= base_url('Kepala_sekolah/dashboard') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "master_data") ? 'selected' : '' ?>"> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('kepala_sekolah/master_data/kelas') ?>" class="sidebar-link"><span class="hide-menu"> Data Kelas</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('kepala_sekolah/master_data/mata_pelajaran') ?>" class="sidebar-link"><span class="hide-menu"> Data Mapel</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('kepala_sekolah/master_data/ruangan') ?>" class="sidebar-link"><span class="hide-menu"> Data Ruangan</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('kepala_sekolah/master_data/siswa') ?>" class="sidebar-link"><span class="hide-menu"> Data Siswa</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('kepala_sekolah/master_data/guru') ?>" class="sidebar-link"><span class="hide-menu"> Data Guru</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "materi") ? 'selected' : '' ?>"> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Materi Pelajaran </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<!-- <li class="sidebar-item">
							<a href="< base_url('kepala_sekolah/materi/dataMateriAdmin') ?>" class="sidebar-link"><span class="hide-menu"> Data Materi (Admin)</span></a>
						</li> -->
						<li class="sidebar-item">
							<a href="<?= base_url('kepala_sekolah/materi/data_materi') ?>" class="sidebar-link"><span class="hide-menu"> Data Materi (Guru)</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>">
					<a class="sidebar-link sidebar-link" href="<?= base_url('kepala_sekolah/info_akademik') ?>" aria-expanded="false">
						<i data-feather="info" class="feather-icon"></i>
						<span class="hide-menu">Info Akademik
							<!-- notif badge -->
							<span class="badge-info-ak"></span>
						</span>
					</a>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>">
					<a class="sidebar-link sidebar-link" href="<?= base_url('kepala_sekolah/super_visor') ?>" aria-expanded="false">
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
