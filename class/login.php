<?php

require_once '../uk-final/config/database.php';

class Login extends Database 
{

    public function cekLoginPetugas($username, $password) {
        $query = "SELECT * FROM petugas WHERE username='".$username."' AND password='".$password."' ";

        $result = $this->query($query);

        return $result;
    }

    public function cekLoginSiswa($username, $password) {
        $query = "SELECT * FROM siswa WHERE nis='".$username."' AND nisn='".$password."' ";

        $result = $this->query($query);

        return $result;
    }

}