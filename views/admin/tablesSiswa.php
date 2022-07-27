<?php

// post data
if(isset($_POST['addsiswa'])) {
    $admin->addDataSiswa($_POST);
}

// edit data
if(isset($_POST['editsiswa'])) {
    $admin->editDataSiswa($_POST);
}


// get data
$datasiswa = $admin->getDataSiswa();
$dataspp = $admin->getDataSpp();
$datakelas = $admin->getDataKelas();





?>


    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Siswa SMKN 1 Denpasar</h1>
                    <p class="mb-4">Dibawah berisi data seluruh siswa SMKN 1 Depasar </p>

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Siswa</h6>
                        </div>
                        <div class="card-body">

                        <!-- btn popup modal post  -->
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addData" >Tambah Data Siswa</button>

                        <!-- end btn popup modal post  -->

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
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editData<?= $siswa['nisn'] ?>" >Edit</button>
                                                <span> | </span>
                                                <a href="?page=delete-siswa&nisn=<?= $siswa['nisn'] ?>&id_spp=<?= $siswa['id_spp'] ?>" onclick="return confirm('Apakah anda yakin ingin Menghapus data Siswa tersebut ?');" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>




                                         <!-- form popup edit  -->

                                         <div class="modal fade" id="editData<?= $siswa['nisn'] ?>">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4>Form Edit Data Siswa </h4>
                                                    </div>

                                                    <form action="" method="post">
                                                        
                                                        <div class="modal-body">
                                                            
                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="nisn">NISN :</label>
                                                                    <input type="number" class="form-control" value="<?= $siswa['nisn'] ?>" name="nisn" id="nisn" autocomplete="off" readonly required>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="nis">Nis :</label>
                                                                    <input type="number" class="form-control" value="<?= $siswa['nis'] ?>" name="nis" id="nis" autocomplete="off" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-9">
                                                                    <label for="nama">Nama :</label>
                                                                    <input type="text" class="form-control" value="<?= $siswa['nama'] ?>" name="nama" id="nama" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="id_kelas">Kelas :</label>
                                                                    <select class="form-control" name="id_kelas" id="id_kelas" autocomplete="off" required>
                                                                        <?php foreach($datakelas as $kelas): ?>
                                                                        <?php if($kelas['id_kelas'] == $siswa['id_kelas']): ?>
                                                                            <option selected value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                                                        <?php else:?>
                                                                            <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>

                                                                        <?php endif;?>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-8">
                                                                    <label for="alamat">Alamat :</label>
                                                                    <input type="text" class="form-control" value="<?= $siswa['alamat'] ?>" name="alamat" id="alamat" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label for="no_telp">NO Telpon :</label>
                                                                    <input type="number" class="form-control" value="<?= $siswa['no_telp'] ?>" name="no_telp" id="no_telp" autocomplete="off" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12">
                                                                <label for="id_spp">Tahun Angkatan :</label>
                                                                <input type="number" class="form-control" value="<?= $siswa['id_spp'] ?>" name="id_spp" id="id_spp" autocomplete="off" readonly required>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" name="editsiswa" class="btn btn-success"  >Simpan</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                        </div>

                                                        </form>

                                                    </div>

                                            </div>

                                        </div>

                                        <!-- end form popup edit  -->



                                    <?php endforeach; ?>




                                    <!-- form popup add  -->

                                        <div class="modal fade" id="addData">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4>Form Tambah Data Siswa </h4>
                                                    </div>

                                                    <form action="" method="post">
                                                        
                                                        <div class="modal-body">
                                                            
                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="nisn">NISN :</label>
                                                                    <input type="number" class="form-control" name="nisn" id="nisn" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="nis">Nis :</label>
                                                                    <input type="number" class="form-control" name="nis" id="nis" autocomplete="off" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-9">
                                                                    <label for="nama">Nama :</label>
                                                                    <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="id_kelas">Kelas :</label>
                                                                    <select class="form-control" name="id_kelas" id="id_kelas" autocomplete="off" required>
                                                                        <option value="" selected disabled>--pilih kelas--</option>
                                                                        <?php foreach($datakelas as $kelas): ?>
                                                                            <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-8">
                                                                    <label for="alamat">Alamat :</label>
                                                                    <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group col-lg-4">
                                                                    <label for="no_telp">NO Telpon :</label>
                                                                    <input type="number" class="form-control" name="no_telp" id="no_telp" autocomplete="off" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-12">
                                                                <label for="id_spp">Tahun Angkatan :</label>
                                                                <select class="form-control" name="id_spp" id="id_spp" autocomplete="off" required>
                                                                    <option value="" selected disabled>--pilih tahun--</option>
                                                                    <?php foreach($dataspp as $spp): ?>
                                                                        <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'] ?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" name="addsiswa" class="btn btn-success"  >Simpan</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                        </div>

                                                        </form>

                                                    </div>

                                            </div>

                                        </div>

                                    <!-- end form popup add  -->

                                       
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
