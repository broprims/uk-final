<?php 

if(empty($_GET)) {
    include 'dashboard.php';
}

if(isset($_GET['page'])) {
    if($_GET['page'] == "dashboard") {
        include 'dashboard.php';
    }
     elseif($_GET['page'] == "entri-pembayaran") {
        include 'entriPembayaran.php';
    } 
    
    elseif($_GET['page'] == "history-pembayaran") {
        include 'historyPembayaran.php';
    }

    


    // logout
    elseif($_GET['page'] == "logout") {
        session_destroy();
        echo "<script>window.location.href='../../index.php';</script>";
    }

}