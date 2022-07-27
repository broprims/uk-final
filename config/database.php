<?php


class Database 
{

    private $host = "localhost";
    private $user = "root";
    private $pass = "rootuser";
    private $dbname = "admin_ukk_spp";

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
    }

    public function query($query) {
        $result = mysqli_query($this->koneksi, $query);

        $row = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return isset($rows) ? $rows : '';
        // return $rows;

    }

}