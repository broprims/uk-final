<?php 
require_once '../../config/database.php';

class AdminSiswa extends Database
{
    ////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////// = GET DATA = /////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////

    // get data siswa 
    public function getDataSiswaByNisn($nisn) {
        $query = "SELECT * FROM siswa WHERE nisn=$nisn";

        $result = $this->query($query);

        return $result;
    }

    // get data petugas 
    public function getDataPetugas() {
        $query = "SELECT * FROM petugas ";

        $result = $this->query($query);

        return $result;
    }

    // get data kelas 
    public function getDataKelas() {
        $query = "SELECT * FROM kelas ";

        $result = $this->query($query);

        return $result;
    }

    public function getDataPembayaranByNisn($nisn) {
        // $koneksi = $this->koneksi;
        $query = "SELECT * FROM pembayaran WHERE nisn=$nisn ";

        $result = $this->query($query);

        // $result = mysqli_fetch_assoc($result);
        // $result []= $result;

        return $result;
    }

}