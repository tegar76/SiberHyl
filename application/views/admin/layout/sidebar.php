<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="sidebar-item <?= ($this->uri->segment(2) == "dashboard") ? 'selected' : '' ?>"> <a class="sidebar-link sidebar-link" href="<?= base_url('master/dashboard') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "MasterData") ? 'selected' : '' ?>""> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('master/data/kelas') ?>" class="sidebar-link"><span class="hide-menu"> Data Kelas</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('master/data/mata-pelajaran') ?>" class="sidebar-link"><span class="hide-menu"> Data Mapel</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('master/data/ruangan') ?>" class="sidebar-link"><span class="hide-menu"> Data Ruangan</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('master/data/siswa') ?>" class="sidebar-link"><span class="hide-menu"> Data Siswa</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('master/data/guru') ?>" class="sidebar-link"><span class="hide-menu"> Data Guru</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item "> <a class="sidebar-link has-arrow <?= ($this->uri->segment(2) == "jadwal") ? 'active' : '' ?>" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Settings Jadwal </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line <?= ($this->uri->segment(2) == "Jadwal") ? 'in' : '' ?>"><a href="<?= base_url('master/jadwal') ?>">
							<li class="sidebar-item <?= ($this->uri->segment(2) == "jadwal") ? 'active' : '' ?>">
								<a href="<?= base_url('master/jadwal') ?>" class="sidebar-link <?= ($this->uri->segment(2) == "jadwal/") ? 'active' : '' ?>"><span class="hide-menu"> Jadwal</span></a>
							</li>
							<li class="sidebar-item">
								<a href="<?= base_url('master/jadwal/pratinjauJadwal') ?>" class="sidebar-link <?= ($this->uri->segment(3) == "pratinjauJadwal") ? 'active' : '' ?>"><span class="hide-menu"> Pratinjau</span></a>
							</li>
							<li class="sidebar-item">
								<a href="<?= base_url('master/materi') ?>" class="sidebar-link <?= ($this->uri->segment(2) == "materi/") ? 'active' : '' ?>"><span class="hide-menu"> Materi</span></a>
							</li>
					</ul>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Settings Info </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('master/info/info-akademik') ?>" class="sidebar-link"><span class="hide-menu"> Informasi Akademik</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('master/info/tahun-ajar') ?>" class="sidebar-link"><span class="hide-menu"> Tahun Pembelajaran</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "jurnal") ? 'selected' : '' ?>"> <a class="sidebar-link sidebar-link" href="<?= base_url('master/jurnal') ?>" aria-expanded="false"><i data-feather="book" class="feather-icon"></i><span class="hide-menu">Jurnal Materi</span></a></li>
				<li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="#" id="logout" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
