
<?php

session_start();

if(isset($_SESSION['id'])) {
    if($_SESSION['user_session']['level'] == "admin") {
     header('location: views/admin/index.php');
    } elseif($_SESSION['user_session']['level'] == "petugas") {
        header('location: views/petugas/index.php');
    }
} elseif(isset($_SESSION['nisn'])) {
    header('location: views/siswa/index.php');
}

require_once 'class/login.php';

$login = new Login;

if(isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // var_dump($username, $password);

    $siswa = $login->cekLoginSiswa($username, $password);
    $petugas = $login->cekLoginPetugas($username, $password);


    if($siswa) {
        // var_dump('dapat siswa');
        $_SESSION['nisn'] = $siswa[0]['nisn'];
        $_SESSION['user_session'] = [
            "login" => true,
            "nama" => $siswa[0]['nama']
        ]; 
        header('location: views/siswa/index.php');
        exit;
    } elseif($petugas) {
        if($petugas[0]['level'] == "admin") {
            // var_dump('dapat admin');
            $_SESSION['id'] = $petugas[0]['id_petugas'];
            $_SESSION['user_session'] = [
                "login" => true,
                "nama" => $petugas[0]['nama_petugas'],
                "level" => $petugas[0]['level'],
            ];
            header('location: views/admin/index.php');
            exit;
        } elseif($petugas[0]['level'] == "petugas") {
            // var_dump('dapat petugas');
            $_SESSION['id'] = $petugas[0]['id_petugas'];
            $_SESSION['user_session'] = [
                "login" => true,
                "nama" => $petugas[0]['nama_petugas'],
                "level" => $petugas[0]['level'],
            ];
            header('location: views/petugas/index.php');
            exit;
        }
    } else {
        echo "<script>alert('Maaf, Username atau Password Salah!');</script>";
    }

}


?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img class="img-fluid h-100 mx-5" src="assets/img/undraw_posting_photo.svg" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halo Users!</h1>
                                        <hr>
                                        <h1 class=" text-gray-900 mb-4">Selamat Datang di Web Pembayaran Spp SMKN 1 Denpasar!</h1>
                                        <hr>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="username" aria-describedby="emailHelp"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group d-flex">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">

                                            <div onclick="showPassword()" style="position: absolute; right:5rem; padding-top:10px; cursor:pointer;">
                                                <a id="hide" style="display: none;  text-decoration:underline; color:red;">hide</a>
                                                <a id="show" style="text-decoration:underline; color:green;">show</a>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                
                                      
                                    </form>
                                    <hr>
                                   
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>


    <!-- javascript fungsi untuk show password  -->
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("show");
            var z = document.getElementById("hide");

            if( x.type === 'password') {
                x.type = "text";
                y.style.display = "none";
                z.style.display = "block";
            } else {
                x.type = "password";
                y.style.display = "block";
                z.style.display = "none";
            }
        }
    </script>

</body>

</html>