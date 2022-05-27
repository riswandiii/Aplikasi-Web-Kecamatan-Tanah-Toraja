-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 10:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelurahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_panggilan` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_handphone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_panggilan`, `nama_lengkap`, `email`, `no_handphone`, `password`, `admin`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '085464574353', '$2y$10$WCTtjuoKxk3QPtmySUZy7ODy6GyoJ5Og0V0yMAAYkOysAicyQRAFy', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id_kelurahan`, `nama_kelurahan`) VALUES
(7, 'Kelurahan 1'),
(8, 'Kelurahan 2'),
(9, 'Kelurahan 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Nelayan'),
(2, 'Guru'),
(3, 'Buruh Bangunan'),
(4, 'Pengusaha'),
(5, 'Ibu Rumah Tangga (RT)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(12, 'SD'),
(13, 'SMP'),
(14, 'SMA'),
(16, 'KULIAH');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nik` int(100) NOT NULL,
  `no_kartu_keluarga` int(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tangal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_pendidikan` int(20) NOT NULL,
  `id_pekerjaan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id_penduduk`, `id_kelurahan`, `nik`, `no_kartu_keluarga`, `nama_lengkap`, `tempat_lahir`, `tangal_lahir`, `alamat`, `jenis_kelamin`, `agama`, `status`, `id_pendidikan`, `id_pekerjaan`) VALUES
(1, 7, 2147483647, 2147483647, 'Agus Salim', 'Tamaklaklang', '2022-06-17', 'Galesong Selatan', 'Laki-laki', 'Kristen', 'Sudah Menikah', 13, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD KEY `id_kelurahan` (`id_kelurahan`),
  ADD KEY `id_kelurahan_2` (`id_kelurahan`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`),
  ADD KEY `id_pendidikan_2` (`id_pendidikan`),
  ADD KEY `id_pendidikan_3` (`id_pendidikan`),
  ADD KEY `pendidikan_id` (`id_pendidikan`),
  ADD KEY `pendidikan_id_2` (`id_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD CONSTRAINT `tb_penduduk_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `tb_kelurahan` (`id_kelurahan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_penduduk_ibfk_2` FOREIGN KEY (`id_pendidikan`) REFERENCES `tb_pendidikan` (`id_pendidikan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_penduduk_ibfk_3` FOREIGN KEY (`id_pekerjaan`) REFERENCES `tb_pekerjaan` (`id_pekerjaan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
