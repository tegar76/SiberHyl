<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>logo/logo-sm.png" type="image/png">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/css/bootstrap.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- style -->
    <link rel="stylesheet" href="<?= base_url('assets/login/css/style.css') ?>">

    <title>Login</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card mt-5">
            <div class="form-content">
                <div class="logo d-flex justify-content-center mb-3">
                    <img src="<?= base_url('assets/logo/logo-big.png') ?>" alt="logo">
                </div>

                <hr>
                <div class="title text-center mb-4">
                    <h6>
                        Mengelola Proses Belajar-Mengajar Anda Pada Satu sistem Dengan Konsep Hibrid Learning
                    </h6>
                </div>

                <form action="<?= base_url('C_siswa/siswa') ?>" method="post">
                    <div class="row justify-content-center">
                        <div class="row mb-3">
                            <div class="form-group d-flex justify-content-between">
                                <img src="<?= base_url('assets/login/icons/user.png') ?>" alt="user" class="mr-3">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username">
                                <img src="<?= base_url('assets/login/icons/info.png') ?>" alt="" class="ml-3">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-group d-flex justify-content-between">
                                <img src="<?= base_url('assets/login/icons/pass.png') ?>" alt="user" class="mr-3">
                                <input type="text" name="password" id="password" class="form-control" placeholder="Masukan Password">
                                <img src="<?= base_url('assets/login/icons/info.png') ?>" alt="" class="ml-3">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Masuk Sebagai..?</option>
                                <option>Siswa</option>
                                <option>Guru</option>
                                <option>Wali Kelas</option>
                            </select>
                        </div>

                        <div class="form-group mt-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-masuk px-4">Masuk</button>
                            <a href="" class="ml-3">Lupa Password ?</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap Js -->
    <script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/jquery.js"></script>
    <script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/popper.js"></script>
    <script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/bootstrap.js"></script>
</body>

</html>