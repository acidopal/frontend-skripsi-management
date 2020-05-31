<?php 
    require './lib/mail/Mail.php';
    require 'pages/modul/user/User.php';
    require 'pages/modul/prodi/Prodi.php';

    $objProdi = new Prodi();
    $prodiList = $objProdi->allProdi();

    if (isset($_POST['btnSubmit'])) {
        $email = $_POST['email'];
        $objUser = new User();
        $objUser->validateEmail($email);

        if ($objUser->result) {
           echo "<script> alert('Email sudah terdaftar');</script>";
        }else{
            $objUser->nama = $_POST['nama'];
            $objUser->email =  $_POST['email'];
            $objUser->password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
            $objUser->role = 'Mahasiswa';
            $objUser->mahasiswa->nim = $_POST['nim'];
            $objUser->mahasiswa->kode_prodi = $_POST['kode_prodi'];
            $objUser->mahasiswa->angkatan = $_POST['angkatan'];
            $objUser->registerUser();

            if ($objUser->result) {
                $message = file_get_contents('./lib/mail/template_email.html');
                $header = 'Registrasi Berhasil!';

                $body = '
                <span style="font-familiy: Arial, Helvetios; sans-serif : 15px; color: #5769ye">
                Selamat <b>'.$objUser->nama.'</b>, anda telah bergabung pada Skripsi Management System ESQ Business School<br>
                Berikut ini informasi account anda : <br></span>

                <span style="font-familiy: Arial, Helvetios; sans-serif : 15px; color: #5769ye">
                    Nama : '.$objUser->nama.'<br>
                    NIM : '.$objUser->mahasiswa->nim.'<br>
                    Email : '.$objUser->email.'<br>
                </span>';

                $footer = 'Silahkan <a href="http://s.id/skrispiManagement" target="_blank" class="btn btn-danger block-center">Login</a> untuk mengakses sistem.';

                $message = str_replace("#header#", $header, $message);
                $message = str_replace("#body#", $body, $message);
                $message = str_replace("#footer#", $footer, $message);

                $objMail = new Mail();
                $objMail->SendMail($objUser->email, $objUser->email, 'Registrasi Berhasil', $message);

                if (!isset($_SESSION)) {
                session_start();
                }

                $_SESSION['id_user'] = $objUser->id_user;
                $_SESSION['nama'] = $objUser->nama;
                $_SESSION['email'] = $objUser->email;
                $_SESSION['role'] = $objUser->role;
                $_SESSION['nim'] = $objUser->mahasiswa->nim;
                $_SESSION['kode_prodi'] = $objUser->mahasiswa->kode_prodi;
                
                echo "<script> alert('Registrasi berhasil!');</script>";
                echo "<script> window.location = 'index.php?p=login';</script>";
                }
        }
    }
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Register - Skripsi Management System</title>
    <link rel="apple-touch-icon" href="assets/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/themes/semi-dark-layout.css">

    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="assets/app-assets/css/pages/authentication.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="./assets/app-assets/images/pages/register.jpg" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Register Account</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Isi form dibawah dengan lengkap untuk membuat akun baru.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form action="" method="POST">
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputNama" class="form-control" placeholder="Nama"  name="nama" required>
                                                        <label for="inputNama">Nama</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email"  name="email" required>
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                                                        <label for="iputPassword">Password</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="number" id="inputNIM" class="form-control" placeholder="NIM"  name="nim" required>
                                                        <label for="inputNIM">NIM</label>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for="inputNIM">Prodi</label>
                                                        <select name="kode_prodi" class="form-control">
                                                            <?php 
                                                                foreach ($prodiList as $prodi) {
                                                                    echo '<option value="'.$prodi->kode_prodi.'"">'.$prodi->nama_prodi.' ('.$prodi->kode_prodi.')'.'</option>';
                                                                }
                                                             ?>
                                                        </select>
                                                    </div>  
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputAngkatan" class="form-control" placeholder="Angkatan"  name="angkatan" required>
                                                        <label for="inputAngkatan">Angkatan</label>
                                                    </div>   
                                                    <a href="index.php?p=login" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50" name='btnSubmit'>Register</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/app-assets/vendors/js/vendors.min.js"></script>
    <script src="assets/app-assets/js/core/app-menu.js"></script>
    <script src="assets/app-assets/js/core/app.js"></script>
    <script src="assets/app-assets/js/scripts/components.js"></script>
</body>
</html>