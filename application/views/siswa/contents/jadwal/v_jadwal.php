<link rel="stylesheet" href="<?=base_url('assets/siswa/css/jadwal/styles.css')?>">

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
        <input  type="text" class="search-click" name="" placeholder="&#xf002 Cari ..." style="font-family: FontAwesome;"/>
    </div>

    <div class="section-title">
        Pembelajaran yang sedang berlangsung !! 
        <hr>
    </div>

    <div class="content-card">
        <div class="row">
            <!-- Looping Disini -->
            <div class="col-md-4 mb-3">
                <div class="card shadow p-2">
                    <div class="d-flex justify-content-lg-start">
                        <img role="button" src="<?=base_url('assets/siswa/img/perfil.png')?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                        <div class="mapel w-100">
                            <center><p>Panel Sasis Dan Pemindahan Tenaga KR</p></center>
                        </div>
                        <a href="">
                            <div class="d-block justify-content-center">
                                <div class="card bg-absen-open shadow-sm px-3 pt-3">
                                    <img src="<?=base_url()?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                    <p>Absen</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="ket-mapel">
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/guru.png')?>" alt="">
                            <p>AZ</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/waktu.png')?>" alt="">
                            <p>07.00 - 13.00</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/r-kelas.png')?>" alt="">
                            <p>MM 1</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow p-2">
                    <div class="d-flex justify-content-lg-start">
                        <img role="button" src="<?=base_url('assets/siswa/img/perfil.png')?>" alt="" class="rounded-circle mr-3"  data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                        <div class="mapel w-100">
                            <center><p>Bahasa Indonesia</p></center>
                        </div>
                        <a href="">
                            <div class="d-block justify-content-center">
                                <div class="card bg-absen-open shadow-sm px-3 pt-3">
                                    <img src="<?=base_url()?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                    <p>Absen</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="ket-mapel">
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/guru.png')?>" alt="">
                            <p>AZ</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/waktu.png')?>" alt="">
                            <p>07.00 - 13.00</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/r-kelas.png')?>" alt="">
                            <p>MM 1</p>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    <div class="section-title mt-3">
        Jadwal Pelajaran XI TKRO 1 !! 
        <hr>
    </div>

    <div class="content-card">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow p-2">
                    <div class="d-flex justify-content-lg-start">
                        <img role="button" src="<?=base_url('assets/siswa/img/perfil.png')?>" alt="" class="rounded-circle mr-3" data-toggle="tooltip" data-placement="top" title="Suripto Aji, S. Pd.">
                        <div class="mapel w-100">
                            <center><p>Panel Sasis Dan Pemindahan Tenaga KR</p></center>
                        </div>
                        <a href="">
                            <div class="d-block justify-content-center">
                                <div class="card bg-absen-close shadow-sm px-3 pt-3">
                                    <img src="<?=base_url()?>assets/siswa/icons/absen.png" alt="" class="mx-auto">
                                    <p>Absen</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="ket-mapel">
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/guru.png')?>" alt="">
                            <p>AZ</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/waktu.png')?>" alt="">
                            <p>07.00 - 13.00</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="<?=base_url('assets/siswa/icons/r-kelas.png')?>" alt="">
                            <p>MM 1</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  
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
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
