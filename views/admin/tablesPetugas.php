<?php

// post data
if(isset($_POST['addpetugas'])) {
    $admin->addDataPetugas($_POST);
}

// edit data
if(isset($_POST['editpetugas'])) {
    $admin->editDataPetugas($_POST);
}


// get data
$datapetugas = $admin->getDataPetugas();



?>


    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Petugas SMKN 1 Denpasar</h1>
                    <p class="mb-4">Dibawah berisi data seluruh Petugas SMKN 1 Depasar </p>

                    


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Petugas</h6>
                        </div>
                        <div class="card-body">

                        <!-- btn popup modal post  -->
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addData" >Tambah Data Petugas</button>

                        <!-- end btn popup modal post  -->

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Petugas</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Nama Petugas</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>

                                    <?php foreach($datapetugas as $petugas): ?>
                                        <tr>
                                            <td><?= $petugas['id_petugas'] ?></td>
                                            <td><?= $petugas['username'] ?></td>
                                            <td><?= $petugas['password'] ?></td>
                                            <td><?= $petugas['nama_petugas'] ?></td>
                                            <td><?= $petugas['level'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editData<?= $petugas['id_petugas'] ?>" >Edit</button>
                                                <span> | </span>
                                                <a href="?page=delete-petugas&id_petugas=<?= $petugas['id_petugas'] ?>" onclick="return confirm('Apakah anda yakin ingin Menghapus data Petugas tersebut ?');" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>




                                         <!-- form popup edit  -->

                                         <div class="modal fade" id="editData<?= $petugas['id_petugas'] ?>">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4>Form Edit Data Petugas </h4>
                                                    </div>

                                                    <form action="" method="post">
                                                        
                                                        <div class="modal-body">
                                                            <div class="form-group col-lg-12 d-none">
                                                                    <label for="id_petugas">ID Petugas :</label>
                                                                    <input type="number" class="form-control" value="<?= $petugas['id_petugas'] ?>" name="id_petugas" id="id_petugas" autocomplete="off" readonly required>
                                                            </div>

                                                            <div class="form-group col-lg-12 d-flex">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="username">Username :</label>
                                                                    <input type="text" class="form-control" value="<?= $petugas['username'] ?>"  name="username" id="username" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label for="password">Password :</label>
                                                                    <input type="password" class="form-control" value="<?= $petugas['password'] ?>" name="password" id="password" autocomplete="off" readonly required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <label for="nama_petugas">Nama Petugas :</label>
                                                                <input type="text" class="form-control" name="nama_petugas" value="<?= $petugas['nama_petugas'] ?>" id="nama_petugas" autocomplete="off" required>
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <label for="level">Level :</label>
                                                                <input type="teks" class="form-control" value="<?= $petugas['level'] ?>" name="level" id="level" autocomplete="off" readonly required>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" name="editpetugas" class="btn btn-success"  >Simpan</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                        </div>

                                                        </form>

                                                    </div>

                                            </div>

                                        </div>

                                        <!-- end form popup edit  -->

                                        

                                    <!-- form popup add  -->

                                    <?php $i = $petugas['id_petugas']  ?>
                                    <?php $i = $i + 1  ?>

                                    <div class="modal fade" id="addData">

                                        <div class="modal-dialog modal-dialog-centered modal-lg">

                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4>Form Tambah Data Petugas </h4>
                                                </div>

                                                <form action="" method="post">
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group col-lg-12 d-none">
                                                                <label for="id_petugas">ID Petugas :</label>
                                                                <input type="number" class="form-control" value="<?= $i ?>" name="id_petugas" id="id_petugas" autocomplete="off" readonly required>
                                                        </div>

                                                        <div class="form-group col-lg-12 d-flex">
                                                            <div class="form-group col-lg-6">
                                                                <label for="username">Username :</label>
                                                                <input type="text" class="form-control"  name="username" id="username" autocomplete="off" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="password">Password :</label>
                                                                <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label for="nama_petugas">Nama Petugas :</label>
                                                            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label for="level">Level :</label>
                                                            <input type="teks" class="form-control" value="petugas" name="level" id="level" autocomplete="off" readonly required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" name="addpetugas" class="btn btn-success"  >Simpan</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                    </div>

                                                    </form>

                                                </div>

                                        </div>

                                        </div>

                                        <?php $i++;  ?>


                                        <!-- end form popup add  -->




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
