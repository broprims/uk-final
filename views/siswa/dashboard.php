

<?php



?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>


                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Dashboard Wellcome</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h3 class="text-dark">Halo Siswa 🖐</h3>
                                    <hr>
                                    <h1 class="text-dark">Selamat Datang <?= $_SESSION['user_session']['nama']  ?> !</h1>
                                    
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Dashboard Video</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <video class="col-lg-12" autoplay loop muted src="../../assets/movies/video.mp4">
                                        Your browser is not supported with this type of video.
                                    </video>
                                </div>
                               
                            </div>
                        </div>

                    </div>

                      

                </div>
                <!-- /.container-fluid -->
