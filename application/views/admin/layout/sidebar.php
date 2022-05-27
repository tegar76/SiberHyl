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
						<li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span class="hide-menu"> Data Kelas
								</span></a>
						</li>
						<li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span class="hide-menu"> Data Mapel
								</span></a>
						</li>
						<li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span class="hide-menu"> Data Ruangan
								</span></a>
						</li>
						<li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span class="hide-menu"> Data Siswa
								</span></a>
						</li>
						<li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span class="hide-menu"> Data Guru
								</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "jadwal") ? 'selected' : '' ?>"> <a class="sidebar-link has-arrow <?= ($this->uri->segment(2) == "jadwal") ? 'active' : '' ?>" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Settings Jadwal </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line <?= ($this->uri->segment(2) == "Jadwal") ? 'in' : '' ?>"><a href="<?= base_url('master/jadwal') ?>">
							<li class="sidebar-item <?= ($this->uri->segment(2) == "jadwal") ? 'active' : '' ?>">
								<a href="<?= base_url('master/jadwal') ?>" class="sidebar-link <?= ($this->uri->segment(2) == "jadwal") ? 'active' : '' ?>"><span class="hide-menu"> Jadwal</span></a>
							</li>
							<li class="sidebar-item">
								<a href="table-dark-basic.html" class="sidebar-link"><span class="hide-menu"> Pratinjau</span></a>
							</li>
							<li class="sidebar-item">
								<a href="table-dark-basic.html" class="sidebar-link"><span class="hide-menu"> Materi</span></a>
							</li>
					</ul>
				</li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "SettingInfo") ? 'selected' : '' ?>"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Settings Info </span></a>
					<ul aria-expanded="false" class="collapse  first-level base-level-line">
						<li class="sidebar-item">
							<a href="chart-morris.html" class="sidebar-link"><span class="hide-menu"> Informasi Akademik</span></a>
						</li>
						<li class="sidebar-item">
							<a href="chart-chart-js.html" class="sidebar-link"><span class="hide-menu"> Tahun Pembelajaran</span></a>
						</li>
					</ul>
				</li>
				<li class="list-divider"></li>
				<li class="sidebar-item <?= ($this->uri->segment(2) == "JurnalMateri") ? 'selected' : '' ?>"> <a class="sidebar-link sidebar-link" href="../../docs/docs.html" aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span class="hide-menu">Jurnal Materi</span></a></li>
				<li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
