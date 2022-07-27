<?php 


session_start();

require_once '../../class/admin.php';


$admin = new Admin;

// get data
$datapetugas = $admin->getDataPetugas();;

$datasiswa = $admin->searchSiswaByNisn($_GET['nisn']);
$datapembayaran = $admin->searchDataPembayaranByNisn($_GET['nisn']);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

 <div class="wrapper">
    
    <!-- history siswa  -->
    <?php
                                              
        foreach($datasiswa as $siswa):
    ?>
        <hr>
        <h1 class="font-weight-bold text-dark text-center">Profil Siswa</h1>
        <hr>
        <span class="font-weight-bold text-dark">NISN</span> : <span><?= $siswa['nisn'] ?></span> <br>
        <span class="font-weight-bold text-dark">Nis</span> : <span><?= $siswa['nis'] ?></span> <br>
        <span class="font-weight-bold text-dark">Nama</span> : <span><?= $siswa['nama'] ?></span> <br>
        <hr>
        <h1 class="font-weight-bold text-dark text-center">History Pembayaran</h1>
        <hr>
    <?php

        endforeach; 
    ?>
    <!-- history siswa  -->
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan & Jumlah Dibayar</th>
                <th>Tahun</th>
                <th>Tgl Bayar</th>
                <th>Petugas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

        <?php $i = 1; ?>
        <?php foreach($datapembayaran as $bayar): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $bayar['bulan_dibayar'] ?> | <?= $bayar['jumlah_bayar'] ?></td>
                <td><?= $bayar['tahun_dibayar'] ?></td>
                <td><?= $bayar['tgl_bayar'] ?></td>
                <?php foreach($datapetugas as $petugas): ?>
                    <?php if($petugas['id_petugas'] == $bayar['id_petugas']): ?>
                        <td><?= $petugas['nama_petugas'] ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <td><span class="text-success font-weight-bold">Lunas</span></td>
            
            </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

        </tbody>
    </table>
    </div>

 </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../assets/js/demo/chart-area-demo.js"></script>
    <script src="../../assets/js/demo/chart-pie-demo.js"></script>

    <script>
        window.print();
    </script>

</body>

</html>