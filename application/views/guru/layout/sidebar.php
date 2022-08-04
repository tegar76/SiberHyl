<aside class="left-sidebar" data-sidebarbg="skin6">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="sidebar-item <?= ($this->uri->segment(2) == "dashboard") ? 'selected' : '' ?>"> <a class="sidebar-link sidebar-link" href="<?= base_url('guru/dashboard') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "data") ? 'selected' : '' ?>""> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('guru/data/data_siswa') ?>" class="sidebar-link"><span class="hide-menu"> Data Siswa</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('guru/data/data_materi?user=guru') ?>" class="sidebar-link"><span class="hide-menu"> Data Materi (Guru)</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('guru/data/data_materi?user=admin') ?>" class="sidebar-link"><span class="hide-menu"> Data Materi (Admin)</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span class="hide-menu">Pembelajaran</span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="<?= base_url('guru/pembelajaran') ?>" class="sidebar-link"><span class="hide-menu">Mengajar</span></a>
						</li>
						<li class="sidebar-item">
							<a href="<?= base_url('guru/pembelajaran/surat') ?>" class="sidebar-link"><span class="hide-menu">Surat-surat</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "") ? 'selected' : '' ?>">
					<a class="sidebar-link sidebar-link" href="<?= base_url('guru/info_akademik') ?>" aria-expanded="false">
						<i data-feather="info" class="feather-icon"></i>
						<span class="hide-menu">Info Akademik
							<!-- notif badge -->
							<!--  $notif ?> -->
						</span>
					</a>
				</li>
				<li class="list-divider"></li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
