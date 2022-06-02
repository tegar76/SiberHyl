<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('Admin/Dashboard') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                <li class="sidebar-item"> <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Master Data </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Data/dataKelas')?>" class="sidebar-link"><span class="hide-menu"> Data Kelas
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Data/dataMapel')?>" class="sidebar-link"><span class="hide-menu"> Data Mapel
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Data/dataRuangan')?>" class="sidebar-link"><span class="hide-menu"> Data Ruangan
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Data/dataSiswa')?>" class="sidebar-link"><span class="hide-menu"> Data Siswa
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Data/dataGuru')?>" class="sidebar-link"><span class="hide-menu"> Data Guru
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="list-divider"></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Settings Jadwal </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line"><a href="<?= base_url('Admin/Jadwal') ?>">
                        <li class="sidebar-item <?= ($this->uri->segment(2) == "Jadwal") ? 'active' : '' ?>"><a href="<?= base_url('Admin/Jadwal') ?>" class="sidebar-link"><span class="hide-menu"> Jadwal
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Jadwal/pratinjauJadwal')?>" class="sidebar-link"><span class="hide-menu"> Pratinjau
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Jadwal/materi')?>" class="sidebar-link"><span class="hide-menu"> Materi
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span class="hide-menu">Settings Info </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Info/infoAkademik')?>" class="sidebar-link"><span class="hide-menu"> Informasi Akademik
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="<?= base_url('Admin/Info/tahunPembelajaran')?>" class="sidebar-link"><span class="hide-menu"> Tahun Pembelajaran
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="list-divider"></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('Admin/JurnalMateri')?>" aria-expanded="false"><i data-feather="book-open" class="feather-icon"></i><span class="hide-menu">Jurnal Materi</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication-login1.html" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>