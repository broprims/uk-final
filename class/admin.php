<?php 


require_once '../../config/database.php';

class Admin extends Database
{
    ////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////// = SEARCH DATA = /////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////

    // cari siswa
    public function searchSiswaByNisn($nisn) {
        // var_dump($nisn);
        $query = "SELECT siswa.*, kelas.nama_kelas FROM siswa INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE nisn=$nisn";

        $result = $this->query($query);

        return $result;
    }

    // cari pembayaran
    public function searchDataPembayaranByNisn($nisn) {
        // var_dump($nisn);
        $query = "SELECT * FROM pembayaran WHERE nisn=$nisn";

        $result = $this->query($query);

        return $result;
    }



    ////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////// = COUNT DATA = /////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////

    
    // get data siswa from procedure
    public function getProcedureDataSiswa() {
        $query = "CALL getDataSiswa";

        $result = $this->query($query);

        return $result;
    }

    // get count data petugas
    public function countDataPetugas() {
        $query = "SELECT * FROM petugas";

        $result = $this->query($query);

        return $result;
    }

    // get count data kelas
    public function countDataKelas() {
        $query = "SELECT * FROM kelas";

        $result = $this->query($query);

        return $result;
    }

    // get count data spp
    public function countDataSpp() {
        $query = "SELECT * FROM spp";

        $result = $this->query($query);

        return $result;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////// = GET DATA = /////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////


    // get data siswa 
    public function getDataSiswa() {
        $query = "SELECT siswa.*, kelas.nama_kelas FROM siswa INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas";

        $result = $this->query($query);

        return $result;
    }

    // get data petugas 
    public function getDataPetugas() {
        $query = "SELECT * FROM petugas ORDER BY id_petugas DESC";

        $result = $this->query($query);

        return $result;
    }

    // get data kelas 
    public function getDataKelas() {
        $query = "SELECT * FROM kelas ORDER BY id_kelas DESC";

        $result = $this->query($query);

        return $result;
    }

    // get data spp 
    public function getDataSpp() {
        $query = "SELECT * FROM spp ORDER BY id_spp DESC";

        $result = $this->query($query);

        return $result;
    }

    // get data pembayaran  id
    public function getDataPembayaranId() {
        $query = "SELECT * FROM pembayaran ORDER BY id_pembayaran DESC limit 1";

        $result = $this->query($query);

        return $result;
    }

    // get data pembayaran
    public function getDataPembayaran() {
        $query = "SELECT * FROM pembayaran ORDER BY id_pembayaran DESC";

        $result = $this->query($query);

        return $result;
    }

    // get data pembayaran by nisn
    public function getDataPembayaranByNisn($nisn) {
        // $koneksi = $this->koneksi;
        $query = "SELECT * FROM pembayaran WHERE nisn=$nisn ";

        $result = $this->query($query);

        // $result = mysqli_fetch_assoc($result);
        // $result []= $result;

        return $result;
    }










    ////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////// = POST DATA = /////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////

    // add siswa
    public function addDataSiswa($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $nisn = htmlspecialchars($data['nisn']);
        $nis = htmlspecialchars($data['nis']);
        $nama = htmlspecialchars($data['nama']);
        $id_kelas = htmlspecialchars($data['id_kelas']);
        $alamat = htmlspecialchars($data['alamat']);
        $no_telp = htmlspecialchars($data['no_telp']);
        $id_spp = htmlspecialchars($data['id_spp']);


        $ceknisnnis = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn=$nisn OR nis=$nis");
        $ceknisnnis = mysqli_fetch_row($ceknisnnis);

        if($ceknisnnis) {
            echo "<script>alert('Tambah Gagal, Maaf NISN atau Nis yang dimasukkan sudah ada!'); window.location.href='?page=table-siswa'; </script>";
        } else {

            $result = mysqli_query($koneksi, "INSERT INTO siswa VALUES('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp' )");

            if($result) {
                echo "<script>alert('Data Siswa Berhasil ditambah!'); window.location.href='?page=table-siswa'; </script>";
            } else {
                echo "<script>alert('Data Siswa Gagal ditambah!'); window.location.href='?page=table-siswa'; </script>";
            }

        }   
    }

    // add petugas
    public function addDataPetugas($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $id_petugas = htmlspecialchars($data['id_petugas']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $nama_petugas = htmlspecialchars($data['nama_petugas']);
        $level = htmlspecialchars($data['level']);
       

        $result = mysqli_query($koneksi, "INSERT INTO petugas VALUES('$id_petugas', '$username', '$password', '$nama_petugas', '$level')");

        if($result) {
            echo "<script>alert('Data Petugas Berhasil ditambah!'); window.location.href='?page=table-petugas'; </script>";
        } else {
            echo "<script>alert('Data Petugas Gagal ditambah!'); window.location.href='?page=table-petugas'; </script>";
        }
    }

    // add kelas
    public function addDataKelas($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $id_kelas = htmlspecialchars($data['id_kelas']);
        $nama_kelas = htmlspecialchars($data['nama_kelas']);
        $kompetensi_keahlian = htmlspecialchars($data['kompetensi_keahlian']);
        $nama_kelas = strtoupper($nama_kelas);
        $kompetensi_keahlian = ucwords($kompetensi_keahlian);

        $ceknamakelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nama_kelas = '".$nama_kelas."' ");
        $ceknamakelas = mysqli_fetch_row($ceknamakelas);

        if($ceknamakelas) {
            echo "<script>alert('Tambah Gagal, Maaf Nama Kelas yang dimasukkan sudah ada!'); window.location.href='?page=table-kelas'; </script>";
        } else {
            $result = mysqli_query($koneksi, "INSERT INTO kelas VALUES('$id_kelas', '$nama_kelas', '$kompetensi_keahlian' )");
            if($result) {
                echo "<script>alert('Data Kelas Berhasil ditambah!'); window.location.href='?page=table-kelas'; </script>";
            } else {
                echo "<script>alert('Data Kelas Gagal ditambah!'); window.location.href='?page=table-kelas'; </script>";
            }
        }
    }
    // add spp
    public function addDataSpp($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $id_spp = htmlspecialchars($data['id_spp']);
        $tahun = htmlspecialchars($data['tahun']);
        $nominal = htmlspecialchars($data['nominal']);
        
       
        $cekspp = mysqli_query($koneksi, "SELECT * FROM spp WHERE tahun=$tahun");
        $cekspp = mysqli_fetch_row($cekspp);

        if($cekspp) {
            echo "<script>alert('Tambah Gagal, Maaf Tahun yang dimasukkan sudah ada!'); window.location.href='?page=table-spp'; </script>";
        } else {

            $result = mysqli_query($koneksi, "INSERT INTO spp VALUES('$id_spp', '$tahun', '$nominal' )");

            if($result) {
                echo "<script>alert('Data Spp Berhasil ditambah!'); window.location.href='?page=table-spp'; </script>";
            } else {
                echo "<script>alert('Data Spp Gagal ditambah!'); window.location.href='?page=table-spp'; </script>";
            }

        }

    }


    // add pembayaran
    public function addDataPembayaran($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $id_pembayaran = htmlspecialchars($data['id_pembayaran']);
        $id_petugas = htmlspecialchars($data['id_petugas']);
        $nisn = htmlspecialchars($data['nisn']);
        $tgl_bayar = htmlspecialchars($data['tgl_bayar']);
        $bulan_dibayar = htmlspecialchars($data['bulan_dibayar']);
        $tahun_dibayar = htmlspecialchars($data['tahun_dibayar']);
        $id_spp = htmlspecialchars($data['id_spp']);
        $jumlah_bayar = htmlspecialchars($data['jumlah_bayar']);

        $result = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES('$id_pembayaran', '$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar' )");

        if($result) {
            echo "<script>alert('Data Pembayaran Berhasil ditambah!'); window.location.href='?page=entri-pembayaran'; </script>";
        } else {
            echo "<script>alert('Data Pembayaran Gagal ditambah!'); window.location.href='?page=entri-pembayaran'; </script>";
        }
    }










    ////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////// = EDIT DATA = /////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////

    // edit data siswa
    public function editDataSiswa($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $nisn = $data['nisn'];
        $nis = htmlspecialchars($data['nis']);
        $nama = htmlspecialchars($data['nama']);
        $id_kelas = htmlspecialchars($data['id_kelas']);
        $alamat = htmlspecialchars($data['alamat']);
        $no_telp = htmlspecialchars($data['no_telp']);
        $id_spp = htmlspecialchars($data['id_spp']);


        $ceknisn = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn=$nisn AND nis=$nis");
        $ceknisn = mysqli_fetch_row($ceknisn);

        if($ceknisn) {
            $ceknis = '';
        } else {
            $ceknis = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis=$nis");
            $ceknis = mysqli_fetch_row($ceknis);
        }

  

        if($ceknis) {
            echo "<script>alert('Edit Gagal, Maaf Nis yang dimasukkan sudah ada!'); window.location.href='?page=table-siswa'; </script>";
        } else {
            $result = mysqli_query($koneksi, "UPDATE siswa SET 
                                                nisn='$nisn', 
                                                nis = '$nis', 
                                                nama = '$nama', 
                                                id_kelas = '$id_kelas', 
                                                alamat = '$alamat', 
                                                no_telp = '$no_telp', 
                                                id_spp = '$id_spp'                               
                                                WHERE nisn=$nisn");
            if($result) {
                echo "<script>alert('Data Siswa Berhasil diubah!'); window.location.href='?page=table-siswa'; </script>";
            } else {
                echo "<script>alert('Data Siswa Gagal diubah!'); window.location.href='?page=table-siswa'; </script>";
            }
        }
    }

    // edit data petugas
    public function editDataPetugas($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $id_petugas = $data['id_petugas'];
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $nama_petugas = htmlspecialchars($data['nama_petugas']);
        $level = htmlspecialchars($data['level']);
      
        $result = mysqli_query($koneksi, "UPDATE petugas SET 
                                            id_petugas='$id_petugas', 
                                            username = '$username', 
                                            password = '$password', 
                                            nama_petugas = '$nama_petugas', 
                                            level = '$level'

                                            WHERE id_petugas=$id_petugas");

        if($result) {
            echo "<script>alert('Data Petugas Berhasil diubah!'); window.location.href='?page=table-petugas'; </script>";
        } else {
            echo "<script>alert('Data Petugas Gagal diubah!'); window.location.href='?page=table-petugas'; </script>";
        }
    }

    // edit data kelas
    public function editDataKelas($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $id_kelas = $data['id_kelas'];
        $nama_kelas = htmlspecialchars($data['nama_kelas']);
        $kompetensi_keahlian = htmlspecialchars($data['kompetensi_keahlian']);

        $nama_kelas = strtoupper($nama_kelas);
        $kompetensi_keahlian = ucwords($kompetensi_keahlian);

        $cekidkelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='".$id_kelas."' AND nama_kelas = '".$nama_kelas."' ");
        $cekidkelas = mysqli_fetch_row($cekidkelas);

        if($cekidkelas) {
            $ceknamakelas = '';
        } else {
            $ceknamakelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nama_kelas = '".$nama_kelas."' ");
            $ceknamakelas = mysqli_fetch_row($ceknamakelas);
            // var_dump($ceknamakelas);
        }

        if($ceknamakelas) {
            echo "<script>alert('Edit Gagal, Maaf Nama Kelas yang dimasukkan sudah ada!'); window.location.href='?page=table-kelas'; </script>";
        } else {
            $result = mysqli_query($koneksi, "UPDATE kelas SET 
                                                id_kelas='$id_kelas', 
                                                nama_kelas = '$nama_kelas', 
                                                kompetensi_keahlian = '$kompetensi_keahlian'                                            
                                                WHERE id_kelas=$id_kelas");

            if($result) {
                echo "<script>alert('Data Kelas Berhasil diubah!'); window.location.href='?page=table-kelas'; </script>";
            } else {
                echo "<script>alert('Data Kelas Gagal diubah!'); window.location.href='?page=table-kelas'; </script>";
            }

        }
    }

    // edit data spp
    public function editDataSpp($data) {
        // var_dump($data);
        $koneksi = $this->koneksi;

        $id_spp = $data['id_spp'];
        $tahun = htmlspecialchars($data['tahun']);
        $nominal = htmlspecialchars($data['nominal']);

        
        $cekidspp = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp=$id_spp AND tahun=$tahun");
        $cekidspp = mysqli_fetch_row($cekidspp);


        if($cekidspp) {
            $cektahun = '';
        } else {
            $cektahun = mysqli_query($koneksi, "SELECT * FROM spp WHERE tahun=$tahun");
            $cektahun = mysqli_fetch_row($cektahun);
        }

        if($cektahun) {
            echo "<script>alert('Edit Gagal, Maaf Tahun yang dimasukkan sudah ada!'); window.location.href='?page=table-spp'; </script>";
        } else {
      
            $result = mysqli_query($koneksi, "UPDATE spp SET 
                                                id_spp='$id_spp', 
                                                tahun = '$tahun', 
                                                nominal = '$nominal'
                                            
                                                WHERE id_spp=$id_spp");

            if($result) {
                echo "<script>alert('Data Spp Berhasil diubah!'); window.location.href='?page=table-spp'; </script>";
            } else {
                echo "<script>alert('Data Spp Gagal diubah!'); window.location.href='?page=table-spp'; </script>";
            }

        }

    }










    ////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////// = DELETE DATA = /////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////

    // delete siswa
    public function deleteSiswa($nisn, $id_spp) {
        // var_dump($nisn, $id_spp);

        $koneksi = $this->koneksi;

        $ceksiswapembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE nisn='".$nisn."' OR id_spp='".$id_spp."' ");
        $ceksiswapembayaran = mysqli_fetch_row($ceksiswapembayaran);


        if($ceksiswapembayaran) {
            echo "<script>alert('Gagal Delete, Maaf Data Siswa masih terkait dengan data lain!'); window.location.href='?page=table-siswa'; </script>";
        } else {
            $result = mysqli_query($koneksi, "DELETE FROM siswa WHERE  nisn='".$nisn."' ");

            if($result) {
                echo "<script>alert('Data Siswa Berhasil dihapus!'); window.location.href='?page=table-siswa'; </script>";
            } else {
                echo "<script>alert('Data Siswa Gagal dihapus!'); window.location.href='?page=table-siswa'; </script>";
            }
        }
        
    }

    // delete petugas
    public function deletePetugas($id_petugas) {
        // var_dump($id_petugas);

        $koneksi = $this->koneksi;

        $cekpetugaspembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_petugas='".$id_petugas."' ");
        $cekpetugaspembayaran = mysqli_fetch_row($cekpetugaspembayaran);


        if($cekpetugaspembayaran) {
            echo "<script>alert('Gagal Delete, Maaf Data Petugas masih terkait dengan data lain!'); window.location.href='?page=table-petugas'; </script>";
        } else {
            $result = mysqli_query($koneksi, "DELETE FROM petugas WHERE  id_petugas='".$id_petugas."' ");

            if($result) {
                echo "<script>alert('Data Petugas Berhasil dihapus!'); window.location.href='?page=table-petugas'; </script>";
            } else {
                echo "<script>alert('Data Petugas Gagal dihapus!'); window.location.href='?page=table-petugas'; </script>";
            }
        }
        
    }
    
    // delete kelas
    public function deleteKelas($id_kelas) {
        // var_dump($id_kelas);

        $koneksi = $this->koneksi;

        $cekkelassiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_kelas='".$id_kelas."' ");
        $cekkelassiswa = mysqli_fetch_row($cekkelassiswa);


        if($cekkelassiswa) {
            echo "<script>alert('Gagal Delete, Maaf Data Kelas masih terkait dengan data lain!'); window.location.href='?page=table-kelas'; </script>";
        } else {
            $result = mysqli_query($koneksi, "DELETE FROM kelas WHERE  id_kelas='".$id_kelas."' ");

            if($result) {
                echo "<script>alert('Data Kelas Berhasil dihapus!'); window.location.href='?page=table-kelas'; </script>";
            } else {
                echo "<script>alert('Data Kelas Gagal dihapus!'); window.location.href='?page=table-kelas'; </script>";
            }
        }
        
    }

    // delete spp
    public function deleteSpp($id_spp) {
        // var_dump($id_spp);

        $koneksi = $this->koneksi;

        $ceksppsiswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_spp='".$id_spp."' ");
        $ceksppsiswa = mysqli_fetch_row($ceksppsiswa);


        if($ceksppsiswa) {
            echo "<script>alert('Gagal Delete, Maaf Data Spp masih terkait dengan data lain!'); window.location.href='?page=table-spp'; </script>";
        } else {
            $result = mysqli_query($koneksi, "DELETE FROM spp WHERE  id_spp='".$id_spp."' ");

            if($result) {
                echo "<script>alert('Data Spp Berhasil dihapus!'); window.location.href='?page=table-spp'; </script>";
            } else {
                echo "<script>alert('Data Spp Gagal dihapus!'); window.location.href='?page=table-spp'; </script>";
            }
        }
        
    }


}