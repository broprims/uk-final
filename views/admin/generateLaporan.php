<?php 


session_start();

require_once '../../class/admin.php';


$admin = new Admin;

// get data
$datasiswa = $admin->getDataSiswa();
$datapetugas = $admin->getDataPetugas();
$datapembayaran = $admin->getDataPembayaran();


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

 <hr>
    <h1 align="center" class="text-center text-dark">Data Pembayaran Spp</h1>
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Bulan & Jumlah Dibayar</th>
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
                            <td><?= $bayar['nisn'] ?></td>
                            <?php foreach($datasiswa as $siswa): ?>
                                <?php if($siswa['nisn'] == $bayar['nisn']): ?>
                                    <td><?= $siswa['nama'] ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td><?= $bayar['bulan_dibayar'] ?> | <?= $bayar['jumlah_bayar'] ?></td>
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