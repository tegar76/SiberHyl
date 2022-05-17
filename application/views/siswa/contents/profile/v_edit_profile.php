<link rel="stylesheet" href="<?= base_url('assets/siswa/css/profile/stylesss.css') ?>">

<section class="container section section__height mt-n3" id="about">
    <div class="edit-profile">
        <form action="">
            <div class="row">
                <div class="col-md-4 text-center mb-3">
                    <div class="card shadow py-4">
                        <div class="img-photo justify-content-center">
                            <img class="mx-auto d-block" src="<?= base_url('assets/siswa/img/profile-default-siswa.png')?>" alt="Foto prifile siswa">
                        </div>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="edit">
                            <h6>Edit Foto Profile</h6>
                            <!-- actual upload which is hidden -->
                            <input type="file" id="actual-btn" hidden/>

                            <label for="actual-btn">Pilih File</label>
                            <div class="max-file">
                                <p>File Max 2MB</p>
                            </div>
                            <div class="file-dipilih mt-n3">
                                <p>Nama File : <span id="file-chosen">Belum ada yang dipilih</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow px-3 pt-3">
                        <div class="edit">
                            <h6>Edit Profile</h6>
                            <hr>
                        </div>
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="text" class="form-control" value="2010049" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="text" class="form-control" value="0041944023" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control" value="Banyumas" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="01 -02 - 2004" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="Laki - laki" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="01 -02 - 2004" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="text" class="form-control" value="XI TKRO 1" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Asal Kelas</label>
                            <input type="text" class="form-control" value="X TO 2" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="juhsdiuhsd@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="">No Handphone</label>
                            <input type="text" class="form-control" value="08165273846">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" value="Kebasen, Rt 07/Rw 04, Purwokerto Utara">
                        </div>
                        <div class="button-action d-flex mb-3 mt-2">
                            <button type="submit" class="btn btn-sm btn-primary mr-2 px-4" type="submit">Simpan</button>
                            <button type="reset" class="btn btn-sm btn-secondary px-4" type="submit">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <center><p>&copy; 2022 Team Paradoks Technology</p></center>
    </footer>
</section>

<script>
    // js upload file foto
    const actualBtn = document.getElementById('actual-btn');

    const fileChosen = document.getElementById('file-chosen');

    actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
    })

</script>
