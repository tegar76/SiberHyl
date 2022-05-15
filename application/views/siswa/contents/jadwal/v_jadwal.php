<link rel="stylesheet" href="<?= base_url('assets/siswa/css/jadwal/styless.css') ?>">

<!-- Jquery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!--=============== HOME ===============-->
<!-- <section class="container section section__height" id="home">
    <h2 class="section__title">Home</h2>
</section> -->

<!--=============== ABOUT ===============-->
<!-- <section class="container section section__height" id="about">
    <h2 class="section__title">About</h2>
</section> -->

<!--=============== SKILLS ===============-->
<section class="container section section__height" id="skills">

    <div class="search-box d-flex justify-content-end">
        <input type="text" class="search-click" name="" placeholder="&#xf002 Cari ..." style="font-family: FontAwesome;" />
    </div>

    <div class="now-studying">
        <div class="section-title">
            Pembelajaran yang sedang berlangsung !!
            <hr>
        </div>

        <div class="row">
            <!--Pembelajaran Berlangsung -->
            <div class="mapel col-md-4 mb-3">
                <div class="card shadow p-3"  data-toggle="collapse" href="#pembelajaran-sekarang" role="button"     aria-expanded="false" aria-controls="pembelajaran-sekarang">
                    <div class="jadwal">
                        <div class="mapel">
                            
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Panel Sasis Dan Pemindahan Tenaga KR</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-open shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>AZ</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                           
                        </div>
                        <div class="features-menu collapse multi-collapse" id="pembelajaran-sekarang">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

    <div class="jadwal-pelajaran">
        <div class="section-title mt-3">
            Jadwal Pelajaran XI TKRO 1 !!
            <hr>
        </div>

        <div class="row">
            <!-- Jadwal Harian Looping Disini -->
            <!-- senin -->
            <div class="col-md-4 mb-3">
                <div class="card shadow p-3">
                    <div class="hari">
                        <div class="card d-flex align-items-center">
                            <p class="text-uppercase p-3 my-auto">Senin</p>
                        </div>
                    </div>
                    <!-- Mapel -->
                    <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-panel-sasis" role="button" aria-expanded="false" aria-controls="collapse-panel-sasis">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Panel Sasis Dan Pemindahan Tenaga KR</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>AZ</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 : 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-panel-sasis">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>      
                    <!-- end mapel  -->
                </div>
            </div>
            <!-- end senin -->

            <!-- Selasa -->
            <div class="col-md-4 mb-3">
                <div class="card shadow p-3">
                    <div class="hari">
                        <div class="card d-flex align-items-center">
                            <p class="text-uppercase p-3 my-auto">Selasa</p>
                        </div>
                    </div>
                    <!-- mapel -->
                    <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-bahasa-inggris" role="button" aria-expanded="false" aria-controls="collapse-bahasa-inggris">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Bahasa Inggris</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>AB</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>-- : --</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>4</p>
                                    </div>
                                </div>

                            </div>
                        </div>                       
                        <div class="features-menu collapse multi-collapse" id="collapse-bahasa-inggris">
                            <div class="card shadow px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                     <!-- end mapel -->
                     <!-- mapel -->
                    <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-matematika" role="button" aria-expanded="false" aria-controls="collapse-matematika">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Matematika</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>T</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>-- : --</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>4</p>
                                    </div>
                                </div>

                            </div>
                        </div>                       
                        <div class="features-menu collapse multi-collapse" id="collapse-matematika">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                    <!-- end mapel -->
                      <!-- mapel -->
                      <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-baca-tulis-alquran" role="button" aria-expanded="false" aria-controls="collapse-baca-tulis-alquran">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Baca Tulis Al-Quran</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>F</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>-- : --</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>4</p>
                                    </div>
                                </div>

                            </div>
                        </div>                       
                        <div class="features-menu collapse multi-collapse" id="collapse-baca-tulis-alquran">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                    <!-- end mapel -->
                      <!-- mapel -->
                      <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-pemeliharaan-mesin-kendaraan-ringan" role="button" aria-expanded="false" aria-controls="collapse-pemeliharaan-mesin-kendaraan-ringan">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Pemeliharaan Mesin Kendaraan Ringan</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>AY</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>-- : --</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>4</p>
                                    </div>
                                </div>

                            </div>
                        </div>                       
                        <div class="features-menu collapse multi-collapse" id="collapse-pemeliharaan-mesin-kendaraan-ringan">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                    <!-- end mapel -->
                </div>
            </div>
            <!-- end selasa -->

            <!-- rabu -->
            <div class="col-md-4 mb-3">
                <div class="card shadow p-3">
                    <div class="hari">
                        <div class="card d-flex align-items-center">
                            <p class="text-uppercase p-3 my-auto">Rabu</p>
                        </div>
                    </div>
                    <!-- mapel -->
                    <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-pendidikan-pancasila" role="button" aria-expanded="false" aria-controls="collapse-pendidikan-pancasila">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Pendidikan Pancasila dan Kewarganegaraan</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>K</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-pendidikan-pancasila">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>  
                    <!-- end mapel -->
                     <!-- mapel -->
                     <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-produk-kreatif" role="button" aria-expanded="false" aria-controls="collapse-produk-kreatif">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Produk Kreatif dan Kewirausahaan</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>BA</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-produk-kreatif">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>  
                    <!-- end mapel -->
                </div>
            </div>
            <!-- end rabu -->

            <!-- Kamis -->
            <div class="col-md-4 mb-3">
                <div class="card shadow p-3">
                    <div class="hari">
                        <div class="card d-flex align-items-center">
                            <p class="text-uppercase p-3 my-auto">Kamis</p>
                        </div>
                    </div>
                    <!-- mapel -->
                    <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-bahasa-indonesia" role="button" aria-expanded="false" aria-controls="collapse-bahasa-indonesia">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Bahasa Indonesia</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>R</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-bahasa-indonesia">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                    <!-- end mapel -->
                      <!-- mapel -->
                      <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-pendidikan-jasmani" role="button" aria-expanded="false" aria-controls="collapse-pendidikan-jasmani">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Pendidikan Jasmani & OR Kesehatan</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>AF</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-pendidikan-jasmani">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                    <!-- end mapel -->
                      <!-- mapel -->
                      <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-matematika" role="button" aria-expanded="false" aria-controls="collapse-matematika">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Matematika</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>T</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-matematika">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                    <!-- end mapel -->
                      <!-- mapel -->
                      <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-pendidikan-agama-islam" role="button" aria-expanded="false" aria-controls="collapse-pendidikan-agama-islam">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Pendidikan Agama Islam</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>H</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-pendidikan-agama-islam">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">materi-pem</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                    <!-- end mapel -->
                </div>
            </div>
            <!-- end kamis -->
            
            <!-- Jumat -->
            <div class="col-md-4 mb-3">
                <div class="card shadow p-3">
                    <div class="hari">
                        <div class="card d-flex align-items-center">
                            <p class="text-uppercase p-3 my-auto">Jumat</p>
                        </div>
                    </div>
                    <!-- mapel -->
                    <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-pemeliharaan-mesin" role="button" aria-expanded="false" aria-controls="collapse-pemeliharaan-mesin">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Pemeliharaan Mesin Kendaraan Ringan</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>AY</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>TKRO 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features-menu collapse multi-collapse" id="collapse-pemeliharaan-mesin">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">materi-pem</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>            
                    <!-- end mapel -->
                </div>
            </div>
            <!-- end jumat -->

            <!-- sabtu -->
            <div class="col-md-4 mb-3">
                <div class="card shadow p-3">
                    <div class="hari">
                        <div class="card d-flex align-items-center">
                            <p class="text-uppercase p-3 my-auto">Sabtu</p>
                        </div>
                    </div>
                    <div class="jadwal">
                        <div class="mapel mt-3" data-toggle="collapse" href="#collapse-pemeliharaan-kendaraan-ringan" role="button" aria-expanded="false" aria-controls="collapse-pemeliharaan-kendaraan-ringan">
                            <div class="card shadow p-2">
                                <div class="d-flex justify-content-lg-start">
                                    <img role="button" src="<?= base_url('assets/siswa/img/perfil.png') ?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                                    <div class="mapel w-100">
                                        <center>
                                            <p>Pemeliharaan Kendaraan Ringan</p>
                                        </center>
                                    </div>
                                    <a href="">
                                        <div class="absen d-block justify-content-center">
                                            <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                                <img src="<?= base_url() ?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                                <p>Absen</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="ket-mapel">
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/guru.png') ?>" alt="">
                                        <p>AY</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/waktu.png') ?>" alt="">
                                        <p>07.00 - 13.00</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <img src="<?= base_url('assets/siswa/icons/r-kelas.png') ?>" alt="">
                                        <p>MM 1</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Sabtu -->
                        
                        <div class="features-menu collapse multi-collapse" id="collapse-pemeliharaan-kendaraan-ringan">
                            <div class="card px-3 pt-3">
                            <div class="row">
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card  py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/materi-pem.png')?>" alt="">
                                                    <p class=" my-auto pt-1">Materi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/tugas.png')?>" alt="">
                                                    <p class="my-auto pt-1">Tugas</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/evaluasi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Evaluasi</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="section-menu col">
                                        <a href="">
                                            <div class="menu">
                                                <div class="card py-1 mt-2 d-flex align-items-center mb-3">
                                                    <img  src="<?=base_url('assets/siswa/icons/diskusi.png')?>" alt="">
                                                    <p class="my-auto pt-1">Diskusi</p>
                                                </div>
                                            </div>
                                        </a>
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
        <center><p>&copy; 2022 Team Paradoks Technology</p></center>
    </footer>

</section>

<!--=============== PORTFOLIO ===============-->
<!-- <section class="container section section__height" id="portfolio">
    <h2 class="section__title">Portfolio</h2>
</section> -->

<!--=============== CONTACTME ===============-->
<!-- <section class="container section section__height" id="contactme">
    <h2 class="section__title">Contactme</h2>
</section> -->

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>