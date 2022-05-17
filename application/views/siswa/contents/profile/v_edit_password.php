<!-- Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<link rel="stylesheet" href="<?= base_url('assets/siswa/css/profile/stylesss.css') ?>">

<section class="container section section__height mt-n3" id="about">
    <div class="edit-profile">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow px-3 pt-3">
                        <div class="edit-password">
                            <h6>Edit Password</h6>
                            <hr>
                        </div>
                        <form action="">
                            <div class="form-group">
                                <label for="">NIS</label>
                                <input type="text" class="form-control" value="2010049" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Password lama</label>
                                <div class="d-flex justify-content-beetween">
                                    <input type="password" class="form-control" name="password" value="siswa-2022" id="id_password_lama">
                                    <i class="far fa-eye fa-xs" id="toggle_id_password_lama"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <div class="d-flex justify-content-beetween">
                                    <input type="password" class="form-control" name="password" id="id_password_baru">
                                    <i class="far fa-eye fa-xs" id="toggle_id_password_baru"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Konfirmasi Password Baru</label>
                                <div class="d-flex justify-content-beetween">
                                    <input type="password" class="form-control" name="password" id="id_password_baru_konfirmasi">
                                    <i class="far fa-eye fa-xs" id="toggle_id_password_baru_konfirmasi"></i>
                                </div>
                            </div>
                            <div class="button-action d-flex mb-3 mt-2">
                                <button type="submit" class="btn btn-sm btn-primary mr-2 px-4" type="submit">Simpan</button>
                                <button type="reset" class="btn btn-sm btn-secondary px-4" type="submit">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <footer>
        <center><p>&copy; 2022 Team Paradoks Technology</p></center>
    </footer>
</section>

<script>

    // Show Toggle Password Lama
    const togglePasswordLama = document.querySelector('#toggle_id_password_lama');
    const passwordLama = document.querySelector('#id_password_lama');
    togglePasswordLama.addEventListener('click', function(e) {
    // toggle the type attribute
    const typeLama = passwordLama.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordLama.setAttribute('type', typeLama);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
    });
    
    // Show Toggle Password Baru
    const togglePasswordBaru = document.querySelector('#toggle_id_password_baru');
    const passwordBaru = document.querySelector('#id_password_baru');
    togglePasswordBaru.addEventListener('click', function(e) {
    // toggle the type attribute
    const typeBaru = passwordBaru.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordBaru.setAttribute('type', typeBaru);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
    });

     // Show Toggle Password Baru
     const togglePasswordBaruKonfirmasi = document.querySelector('#toggle_id_password_baru_konfirmasi');
    const passwordBaruKonfirmasi = document.querySelector('#id_password_baru_konfirmasi');
    togglePasswordBaruKonfirmasi.addEventListener('click', function(e) {
    // toggle the type attribute
    const typeBaruKonfirmasi = passwordBaruKonfirmasi.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordBaruKonfirmasi.setAttribute('type', typeBaruKonfirmasi);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
    });


   

    

</script>

