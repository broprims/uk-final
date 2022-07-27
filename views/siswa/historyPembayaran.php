<?php
// get data
$datasiswa = $admin->getDataSiswaByNisn($_SESSION['nisn']);
$datapetugas = $admin->getDataPetugas();
$datakelas = $admin->getDataKelas();
$datapembayaran = $admin->getDataPembayaranByNisn($_SESSION['nisn']);

?>

    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">Tabel Data History Pembayaran Spp</h4>

                        </div>
                        <div class="card-body">

                        <hr>
                        <h1 class="text-center text-dark">History Pembayaran Siswa</h1>
                        <hr>

                        <!-- data siswa  -->
                        <?php foreach($datasiswa as $siswa): ?>
                           <span class="font-weight-bold text-dark">NISN</span> : <span><?= $siswa['nisn'] ?></span> <br>
                           <span class="font-weight-bold text-dark">Nis</span> : <span><?= $siswa['nis'] ?></span> <br>
                           <span class="font-weight-bold text-dark">Nama</span> : <span><?= $siswa['nama'] ?></span> <br>
                           <?php foreach($datakelas as $kelas): ?>
                                <?php if($kelas['id_kelas'] == $siswa['id_kelas']): ?>
                                    <span class="font-weight-bold text-dark">Kelas</span> : <span><?= $kelas['nama_kelas'] ?></span> <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <!-- data siswa  -->

                        <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan & Jumlah Dibayar</th>
                                            <th>Tahun Dibayar</th>
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
