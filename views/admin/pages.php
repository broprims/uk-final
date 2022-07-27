<?php 

if(empty($_GET)) {
    include 'dashboard.php';
}

if(isset($_GET['page'])) {
    if($_GET['page'] == "dashboard") {
        include 'dashboard.php';
    } elseif($_GET['page'] == "table-siswa") {
        include 'tablesSiswa.php';
    
    } elseif($_GET['page'] == "table-petugas") {
        include 'tablesPetugas.php';
    
    } elseif($_GET['page'] == "table-kelas") {
        include 'tablesKelas.php';
    
    } elseif($_GET['page'] == "table-spp") {
        include 'tablesSpp.php';
    }
    
     elseif($_GET['page'] == "entri-pembayaran") {
        include 'entriPembayaran.php';
    } 
    
    elseif($_GET['page'] == "history-pembayaran") {
        include 'historyPembayaran.php';
    }

    
    // delete data
    elseif($_GET['page'] == "delete-siswa") {
        $admin->deleteSiswa($_GET['nisn'], $_GET['id_spp']);
    }
    elseif($_GET['page'] == "delete-petugas") {
        $admin->deletePetugas($_GET['id_petugas']);
    }
    elseif($_GET['page'] == "delete-kelas") {
        $admin->deleteKelas($_GET['id_kelas']);
    }
    elseif($_GET['page'] == "delete-spp") {
        $admin->deleteSpp($_GET['id_spp']);
    }



    // logout
    elseif($_GET['page'] == "logout") {
        session_destroy();
        echo "<script>window.location.href='../../index.php';</script>";
    }

}