<?php

// // post data
// if(isset($_POST['addsiswa'])) {
//     $admin->addDataSiswa($_POST);
// }

// // edit data
// if(isset($_POST['editsiswa'])) {
//     $admin->editDataSiswa($_POST);
// }


// get data

if(isset($_POST['nisn']) && $_POST['nisn'] != '') {
    $nisn = $_POST['nisn'];
    $datasiswa = $admin->searchSiswaByNisn($nisn);
    $datapembayaran = $admin->searchDataPembayaranByNisn($nisn);

} else {
    $datasiswa = $admin->getDataSiswa();
    $datapembayaran = $admin->getDataPembayaran();

}

$datapetugas = $admin->getDataPetugas();





?>


    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data History Pembayaran Spp SMKN 1 Denpasar</h1>
                    <p class="mb-4">Dibawah berisi data seluruh History Pembayaran Spp SMKN 1 Depasar </p>

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">Tabel Data History Pembayaran Spp</h4>

                         
                        </div>
                        <div class="card-body">

                                 <!-- search engine  -->
                                
                                <div>
                                    <form action="" method="post">
                                        <div class="form-group col-lg-12 d-flex">
                                            <input type="search" name="nisn" <?php if(isset($_POST['nisn']) && $_POST['nisn'] != '') {  foreach($datasiswa as $siswa): ?>
                                                                                    value="<?= $siswa['nisn'] ?>"
                                                                                <?php endforeach; } ?> placeholder="Nisn..." class="form-control">
                                            <button type="submit" name="cariSiswa" class="btn btn-info ml-3">Cari</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>

                                <!-- search engine  -->


                                <!-- history siswa  -->
                                <?php
                                
                                
                                if(isset($_POST['nisn']) && $_POST['nisn'] != '') {
                                    foreach($datasiswa as $siswa):
                                ?>

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
                                
                                } 
                                
                                
                                ?>
                                <!-- history siswa  -->


                            <div class="table-responsive">

                                    <?php
                                    if(isset($_POST['nisn']) && $_POST['nisn'] != '') {
                                    ?>

                                            
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
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
                                    <?php
                                    } else {
                                    ?>

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
                                    <?php }?>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->

    <!-- Logout Modal-->
    <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> -->
