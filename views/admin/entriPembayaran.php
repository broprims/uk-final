<?php

// post data
if(isset($_POST['addpembayaran'])) {
    $admin->addDataPembayaran($_POST);
}


// get data
if(isset($_POST['nisn']) && $_POST['nisn'] != '') {
    $nisn = $_POST['nisn'];
    $datasiswa = $admin->searchSiswaByNisn($nisn);
} else {
    $datasiswa = $admin->getDataSiswa();
}

$dataspp = $admin->getDataSpp();
$datakelas = $admin->getDataKelas();

$datapembayaran = $admin->getDataPembayaranId();





?>


    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Entri Pembayaran Siswa SMKN 1 Denpasar</h1>
                    <p class="mb-4">Dibawah merupakan form entri pembayaran spp siswa SMKN 1 Depasar </p>

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Siswa</h6>
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

                      
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NISN</th>
                                            <th>Nis</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>NO Telpon</th>
                                            <th>ID Spp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>

                                    <?php foreach($datasiswa as $siswa): ?>
                                        <tr>
                                            <td><?= $siswa['nisn'] ?></td>
                                            <td><?= $siswa['nis'] ?></td>
                                            <td><?= $siswa['nama'] ?></td>
                                            <td><?= $siswa['nama_kelas'] ?></td>
                                            <td><?= $siswa['alamat'] ?></td>
                                            <td><?= $siswa['no_telp'] ?></td>
                                            <td><?= $siswa['id_spp'] ?></td>
                                            <td>

                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoPembayaran<?= $siswa['nisn'] ?>" >Info</button>
                                                <span> | </span>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#entriPembayaran<?= $siswa['nisn'] ?>" >Bayar Spp</button>

                                            </td>
                                        </tr>




                                         <!-- form popup pembayaran  -->

                                         <?php foreach($dataspp as $spp): ?>
                                            <?php if($spp['id_spp'] == $siswa['id_spp']): ?>



                                                <?php

                                                    error_reporting(0);

                                                    $pembayaran = $admin->getDataPembayaranByNisn($siswa['nisn']);

                                                    $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


                                                    // var_dump($pembayaran);
                                                    $bulan_dibayar = array_column($pembayaran, 'bulan_dibayar');



                                                ?>


                                                
                                         <div class="modal fade" id="entriPembayaran<?= $siswa['nisn'] ?>">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4>Form Entri Pembayaran </h4>
                                                    </div>

                                                    <form action="" method="post">
                                                        
                                                        <div class="modal-body">


                                                        <div class="form-group">
                                                            <label for="">Data Pembayaran :</label>
                                                            <br>
                                                            <?php foreach($bulan as $bln): ?>
                                                                <label class="btn btn-<?= (in_array($bln, $bulan_dibayar) ? "success" : "danger") ?>"><?= $bln; ?></label>
                                                            <?php endforeach; ?>
                                                        </div>


                                                        <?php foreach($datapembayaran as $bayar): ?>
                                                        <?php $i = $bayar['id_pembayaran']; ?>
                                                        <?php $i = $i + 1; ?>


                                                            <div class="form-group col-lg-12 d-none">               
                                                                    <label for="id_pembayaran">ID Pembayaran :</label>
                                                                    <input type="number" class="form-control" value="<?= $i ?>" name="id_pembayaran" id="id_pembayaran" autocomplete="off" readonly required>
                                                            </div>


                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>

                                                            
                                                            <div class="form-group col-lg-12 d-flex">

                                                                <div class="form-group col-lg-6">
                                                                    <label for="id_petugas">ID Petugas :</label>
                                                                    <input type="number" class="form-control" value="<?= $_SESSION['id'] ?>" name="id_petugas" id="id_petugas" autocomplete="off" readonly required>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="nisn">NISN :</label>
                                                                    <input type="number" class="form-control" value="<?= $siswa['nisn'] ?>" name="nisn" id="nisn" autocomplete="off" readonly required>
                                                                </div>
                                                               
                                                            </div>

                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-4">
                                                                    <label for="tgl_bayar">Tgl Bayar :</label>
                                                                    <input type="text" class="form-control" value="<?= date('Y-m-d'); ?>" name="tgl_bayar" id="tgl_bayar" autocomplete="off" readonly required>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label for="bulan_dibayar">Bulan Dibayar :</label>
                                                                    <select class="form-control" name="bulan_dibayar" id="bulan_dibayar" autocomplete="off" required>
                                                                        <option value="" selected disabled>--pilih bulan--</option>
                                                                        <?php foreach($bulan as $bln): ?>
                                                                            <option value="<?= $bln ?>" class="d-<?= (in_array($bln, $bulan_dibayar) ? "none" : "block") ?>" ><?= $bln ?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label for="tahun_dibayar">Tahun Dibayar :</label>
                                                                    <input type="text" class="form-control" value="<?= date('Y'); ?>" name="tahun_dibayar" id="tahun_dibayar" autocomplete="off" readonly required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-8">
                                                                    <label for="id_spp">ID Spp :</label>
                                                                    <input type="number" class="form-control" value="<?= $spp['id_spp'] ?>" name="id_spp" id="id_spp" autocomplete="off" readonly required>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label for="jumlah_bayar">Jumlah Bayar :</label>
                                                                    <input type="number" class="form-control" value="<?= $spp['nominal'] ?>" name="jumlah_bayar" id="jumlah_bayar" autocomplete="off" readonly required>
                                                                </div>
                                                            </div>

                                                          
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" name="addpembayaran" class="btn btn-success"  >Simpan</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                        </div>

                                                        </form>

                                                    </div>

                                            </div>

                                            </div>

                                            <?php endif; ?>
                                         <?php endforeach; ?>


                                        <!-- end form popup pembayaran  -->


                                        <!-- info pembayaran -->
                                        <div class="modal fade" id="infoPembayaran<?= $siswa['nisn'] ?>">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4>Info Pembayaran </h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Data Pembayaran :</label>
                                                            <br>
                                                            <?php foreach($bulan as $bln): ?>
                                                                <label class="btn btn-<?= (in_array($bln, $bulan_dibayar) ? "success" : "danger") ?>"><?= $bln; ?></label>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                    </div>

                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!--end info pembayaran -->



                                    <?php endforeach; ?>



                                    </tbody>
                                </table>
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
