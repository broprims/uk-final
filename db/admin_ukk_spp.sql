-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 06:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_ukk_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getDataSiswa` ()  BEGIN

SELECT * FROM siswa;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'RPL', 'Rekayasa Perangkat Lunak'),
(2, 'MM', 'Multi Media'),
(3, 'TKJ', 'Teknik Komputer Jaringan'),
(4, 'TP', 'Teknik Pendingin'),
(5, 'TKRO', 'Teknik Kendaraan Ringan Otomotif'),
(6, 'TL', 'Teknik Listrik'),
(7, 'BKP', 'Bisnis Konstruksi Properti');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(9) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(1, 2, '1111111111', '2022-04-25', 'Januari', '2022', 1, 150000),
(2, 1, '1111111111', '2022-04-25', 'Februari', '2022', 1, 150000),
(3, 1, '4444444444', '2022-04-25', 'Mei', '2022', 1, 150000),
(4, 1, '1111111111', '2022-04-25', 'Maret', '2022', 1, 150000),
(5, 1, '4444444444', '2022-04-25', 'Januari', '2022', 1, 150000),
(6, 1, '1111111111', '2022-04-25', 'September', '2022', 1, 150000),
(7, 1, '4444444444', '2022-04-25', 'Februari', '2022', 1, 150000),
(8, 1, '2222222222', '2022-04-26', 'Januari', '2022', 1, 150000),
(9, 2, '1111111111', '2022-04-26', 'April', '2022', 1, 150000),
(10, 1, '4444444444', '2022-04-26', 'Maret', '2022', 1, 150000),
(11, 1, '4444444444', '2022-04-26', 'April', '2022', 1, 150000),
(12, 2, '1111111111', '2022-04-26', 'Mei', '2022', 1, 150000),
(13, 2, '2222222222', '2022-04-26', 'Februari', '2022', 1, 150000),
(14, 2, '4444444444', '2022-04-27', 'Juni', '2022', 1, 150000),
(15, 2, '2222222222', '2022-04-27', 'Maret', '2022', 1, 150000),
(16, 1, '4444444444', '2022-04-27', 'Juli', '2022', 1, 150000),
(17, 1, '1111111111', '2022-04-27', 'Juni', '2022', 1, 150000),
(18, 1, '1111111111', '2022-04-27', 'Juli', '2022', 1, 150000),
(19, 1, '5555555555', '2022-04-27', 'Januari', '2022', 1, 150000),
(20, 1, '2222222222', '2022-04-27', 'April', '2022', 1, 150000),
(21, 1, '2222222222', '2022-04-27', 'Mei', '2022', 1, 150000),
(22, 2, '1111111111', '2022-04-27', 'Agustus', '2022', 1, 150000),
(23, 2, '2222222222', '2022-04-27', 'Juni', '2022', 1, 150000),
(24, 1, '6666666666', '2022-04-27', 'Januari', '2022', 1, 150000),
(25, 1, '5555555555', '2022-04-27', 'Februari', '2022', 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'putri', '12345678', 'Putri Ayu', 'admin'),
(2, 'budi', '12345678', 'Budi Dharmawan', 'petugas'),
(3, 'dimas', '12345678', 'Wawan Hendrawan', 'petugas'),
(4, 'dayu', '12345678', 'Dayu Novi', 'petugas'),
(5, 'bima', '12345678', 'Bima Agastiya', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('1111111111', '28011', 'Satria Prima Wijaya', 1, 'Jl.Kartini No.97', '081999777555', 1),
('2222222222', '28022', 'Riyan Maulana', 2, 'Jl.Maruti No.59', '081999555629', 1),
('3333333333', '28033', 'Rangga Sastrawan', 5, 'jl.nangka utara no.24', '081666777828', 1),
('4444444444', '28044', 'Satria Kantra Wibawa', 1, 'Jl.durian no.54', '081999444777', 1),
('5555555555', '28055', 'Aldo Wira', 3, 'jl.patih nambi no.32', '081735888333', 1),
('6666666666', '28066', 'Novelius Vigo', 2, 'jl.ayani urtara no.82', '081111827444', 1),
('7777777777', '28077', 'Agus Mahendra', 1, 'jl.nanas no.76', '081888777666', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2019, 150000),
(2, 2020, 200000),
(3, 2021, 200000),
(4, 2023, 200000),
(5, 2024, 300000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `jumlah_bayar` (`jumlah_bayar`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `nominal` (`nominal`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
