<?php

// post data
if(isset($_POST['addkelas'])) {
    $admin->addDataKelas($_POST);
}

// edit data
if(isset($_POST['editkelas'])) {
    $admin->editDataKelas($_POST);
}


// get data
$datakelas = $admin->getDataKelas();



?>


    <!-- Page Wrapper -->
    <div id="wrapper">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Kelas SMKN 1 Denpasar</h1>
                    <p class="mb-4">Dibawah berisi data seluruh Kelas SMKN 1 Depasar </p>

                    
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kelas</h6>
                        </div>
                        <div class="card-body">

                        <!-- btn popup modal post  -->
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addData" >Tambah Data Kelas</button>

                        <!-- end btn popup modal post  -->

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Kelas</th>
                                            <th>Nama Kelas</th>
                                            <th>Kompetensi Keahlian</th>
                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                               
                                    <tbody>

                                    <?php foreach($datakelas as $kelas): ?>
                                        <tr>
                                            <td><?= $kelas['id_kelas'] ?></td>
                                            <td><?= $kelas['nama_kelas'] ?></td>
                                            <td><?= $kelas['kompetensi_keahlian'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editData<?= $kelas['id_kelas'] ?>" >Edit</button>
                                                <span> | </span>
                                                <a href="?page=delete-kelas&id_kelas=<?= $kelas['id_kelas'] ?>"onclick="return confirm('Apakah anda yakin ingin Menghapus data Kelas tersebut ?');" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>




                                         <!-- form popup edit  -->

                                         <div class="modal fade" id="editData<?= $kelas['id_kelas'] ?>">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4>Form Edit Data Kelas </h4>
                                                    </div>

                                                    <form action="" method="post">
                                                            
                                                        <div class="modal-body">
                                                        
                                                            <div class="form-group col-lg-12 d-none">
                                                                <label for="id_kelas">ID Kelas :</label>
                                                                <input type="number" class="form-control" value="<?= $kelas['id_kelas'] ?>" name="id_kelas" id="id_kelas" autocomplete="off" readonly required>
                                                            </div>

                                                            <div class="form-group col-lg-12">
                                                                <label for="nama_kelas">Nama Kelas :</label>
                                                                <input type="text" class="form-control text-uppercase" value="<?= $kelas['nama_kelas'] ?>" name="nama_kelas" id="nama_kelas" autocomplete="off" required>
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <label for="kompetensi_keahlian">Kompetensi Keahlian :</label>
                                                                <input type="text" class="form-control text-capitalize" value="<?= $kelas['kompetensi_keahlian'] ?>" name="kompetensi_keahlian" id="kompetensi_keahlian" autocomplete="off" required>
                                                            </div>
                                                            

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" name="editkelas" class="btn btn-success"  >Simpan</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                        </div>

                                                        </form>

                                                    </div>

                                            </div>

                                        </div>

                                        <!-- end form popup edit  -->

                                        

                                    <!-- form popup add  -->

                                    <?php $i = $kelas['id_kelas']; ?>
                                    <?php $i = $i + 1; ?>

                                    <div class="modal fade" id="addData">

                                        <div class="modal-dialog modal-dialog-centered modal-lg">

                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4>Form Tambah Data Kelas </h4>
                                                </div>

                                                <form action="" method="post">
                                                    
                                                    <div class="modal-body">
                                                    
                                                        <div class="form-group col-lg-12 d-none">
                                                            <label for="id_kelas">ID Kelas :</label>
                                                            <input type="number" class="form-control" value="<?= $i ?>" name="id_kelas" id="id_kelas" autocomplete="off" readonly required>
                                                        </div>

                                                        <div class="form-group col-lg-12">
                                                            <label for="nama_kelas">Nama Kelas :</label>
                                                            <input type="text" class="form-control text-uppercase" name="nama_kelas" id="nama_kelas" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label for="kompetensi_keahlian">Kompetensi Keahlian :</label>
                                                            <input type="text" class="form-control text-capitalize" name="kompetensi_keahlian" id="kompetensi_keahlian" autocomplete="off" required>
                                                        </div>
                                                        

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" name="addkelas" class="btn btn-success"  >Simpan</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                                    </div>

                                                    </form>

                                                </div>

                                        </div>

                                        </div>

                                        <?php $i++; ?>


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
