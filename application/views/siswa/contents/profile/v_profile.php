<link rel="stylesheet" href="<?= base_url('assets/siswa/css/profile/styles.css') ?>">

<section class="container section section__height mt-n5" id="about">
    <div class="profile">
        <div class="row">
            <div class="col-md-4 text-center mb-3">
                <div class="card shadow py-4">
                    <div class="img-photo justify-content-center">
                        <img class="mx-auto d-block" src="<?= base_url('assets/siswa/img/profile-default-siswa.png')?>" alt="Foto prifile siswa">
                    </div>
                    <div class="line">
                        <hr>
                    </div>
                    <div class="atribute">
                        <h6 class="text-uppercase">Adit Priatno</h6>
                        <p class="mb-n1">XI TKRO 1</p>
                        <p >Smk Kesatrian Purwokerto</p>
                    </div>
                    <div class="button-logout">
                        <a href="" id="btn-show-dialog" class="btn btn-sm btn-danger px-4">Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow px-3">
                    <table class="table">
                        <tbody>
                            <tr class="table-borderless">
                                <th scope="row">NIS</th>
                                <td>2010049</td>
                            </tr>
                            <tr>
                                <th scope="row">NISN</th>
                                <td>0041944023</td>
                            </tr>
                                <th scope="row">Tempat Tanggal Lahir</th>
                                <td>Banyumas, 01 - 02 -2004</td>
                            </tr>
                            </tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td>Laki - laki</td>
                            </tr>
                            </tr>
                                <th scope="row">Asal Kelas</th>
                                <td>X TO 2</td>
                            </tr>
                            </tr>
                                <th scope="row">Email</th>
                                <td>Dit456@gmail.com</td>
                            </tr>
                            </tr>
                                <th scope="row">No. Handphone</th>
                                <td>084587876654</td>
                            </tr>
                            </tr>
                                <th scope="row">Alamat</th>
                                <td>Kebasen Rt07 Rw 04 Purwokerto Utara</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="mt-n3">
                    <div class="button-action d-flex mb-3 mt-2">
                        <a href="<?= base_url('Siswa/Profile/editProfile')?>" class="btn btn-sm btn-outline-info mr-2 px-4" type="submit">Edit Profile</a>
                        <a href="" class="btn btn-sm btn-outline-info px-4" type="submit">Edit Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <center><p>&copy; 2022 Team Paradoks Technology</p></center>
    </footer>
</section>