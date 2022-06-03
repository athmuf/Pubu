-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 04:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pubu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `donatur_id` int(11) DEFAULT NULL,
  `judul_buku` varchar(60) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(60) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama` varchar(220) NOT NULL,
  `kontak` varchar(200) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `donatur_id`, `judul_buku`, `pengarang`, `penerbit`, `kategori`, `deskripsi`, `gambar`, `nama`, `kontak`, `alamat`) VALUES
(62, 0, 'Black Showman Dan Pembunuhan Di Kota Tak Bernama', 'Keigo Higashino', 'Gramedia Pustaka Utama', 'Novel', 'Pembunuhan bisa terjadi di mana saja, termasuk di sebuah kota kecil, terpencil, dan nyaris terlupakan di tengah pandemi Covid-19.', 'black.jpg', 'Adri', '081234', 'Bogor'),
(65, 0, 'Kita Pergi Hari Ini', 'Ziggy Zezsyazeoviennazabrizkie', 'Gramedia Pustaka Utama', 'Novel', 'Mi dan Ma dan Mo tidak pernah melihat kucing seperti Nona Gigi. Tentu saja, mereka sudah pernah melihat kucing biasa. Tapi Nona Gigi adalah Kucing Luar Biasa.', 'kita.jpg', 'Azriel', '081234', 'Dramaga, Bogor'),
(66, 0, 'Technical Analysis For Mega Profit (Hc)', 'Edianto Ong', 'Gramedia Pustaka Utama', 'Bisnis', 'Saya kira sudah lama para investor Indonesia membutuhkan buku berkualitas seperti ini. Penyajiannya sangat terstruktur, lengkap, dan jelas. Ini adalah buku wajib bagi setiap investor dan trader.', 'technical.jpg', 'Mona', '0812938', 'Mondstadt, Teyvat');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `nama_kategori`) VALUES
(1, 'Realigi', 'realigi'),
(2, 'Bisnis', 'bisnis'),
(3, 'Sains', 'sains'),
(4, 'Komik', 'komik'),
(5, 'Novel', 'novel'),
(6, 'Realigi', 'realigi');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(12) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `penerima` varchar(260) NOT NULL,
  `kontak_penerima` varchar(20) NOT NULL,
  `alamat_kirim` varchar(250) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `resi` varchar(100) DEFAULT NULL,
  `jasa_kirim` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_buku`, `penerima`, `kontak_penerima`, `alamat_kirim`, `tgl_kirim`, `resi`, `jasa_kirim`) VALUES
(1, 62, 'aa', 'aa', 'aa', '2022-06-02', '', ''),
(2, 62, 'aa', 'aa', 'aa', '2022-06-02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `no_hp`, `alamat`) VALUES
(18, 'aa', '$2y$10$tdtRA/S/5iokrLpKUU9SieOnI0t6bfJwl1p/EarSaHWcz6WPYNojC', NULL, NULL, NULL),
(19, 'ajil', '$2y$10$HL2I5NbBEMJOu0FXAB36N.81gXOpRZLLvcymcdfmUaJJVd2Z1PGHC', NULL, NULL, NULL),
(20, 'adri01', '$2y$10$PYvF6vh6Yx1f7SwJJIxOcuQLWjvpyVwML7p6umZDjgfZe5edT3DwC', NULL, NULL, NULL),
(21, 'dheaa', '$2y$10$BrRmPbxSO9oris8VWOLQwOnRDqmTrKjctaG4XKkvh8/NYEanCBH7O', NULL, NULL, NULL),
(22, 'adyee', '$2y$10$VgI.uQ/CohKF3iIFzT.xaeSRVIrQ8PKrPwheh9wOD4TAYodJjg2Xu', NULL, NULL, NULL),
(23, 'senda', '$2y$10$gFWzQfDTBEdnPimVOOFsuOjDb6ViSHBuV9eXdrlXJUmlyXora88hC', NULL, NULL, NULL),
(24, 'moona', '$2y$10$j1o5eYAXIHbi0qPcuoy/suQFYrlsI7CMGijd8weOALMuI5MgV2VqK', NULL, NULL, NULL),
(25, 'keqinguwu', '$2y$10$mNw9nH3iQMDJ64T4XWtAd.I4vvOzGDuq/NyBWxNJRAckJRbbBYNEy', NULL, NULL, NULL),
(26, 'lista1', '$2y$10$71YBU1pGGc.p1XAS1ibHNO7c71Wd2yRT98szL6BQFijZF3OeSi8WC', NULL, NULL, NULL),
(27, 'raacea', '$2y$10$ZDuQ3UAwzpzz2DpwJjxjfu9IpFWt2Gzy7uIPXPIPbtOeBTOMo0A3S', NULL, NULL, NULL),
(28, 'downa', '$2y$10$OosKk0SATp6SdjDS/7n9juHR94f/TX6tnt1wewc9AFe5m1sn/Mkx6', NULL, NULL, NULL),
(29, 'somey99', '$2y$10$5cuGR3XLok2fgmKQB6l4OeO9cupUj7.CLpxQa8qHHRf5bdVGSvBPW', NULL, NULL, NULL),
(30, 'budyman', '$2y$10$e2/pT92TcqSeK9UoR4jKqu4Xpeft0UaszTKuOz2rmG0Hnm1NYokam', NULL, NULL, NULL),
(31, '', '$2y$10$3zq/zyqUadnNQszoCTcNu.X.C7peb8Qc863IteQ7K4Ja4uI/pKoTG', NULL, NULL, NULL),
(32, 'athifah', '$2y$10$dC1TblrZXB1yrFU2lvqpt.EIXeQ0ycNIxxruQMFIZJDbh.eqnvGD2', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `kategori_buku` (`id_kategori`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
