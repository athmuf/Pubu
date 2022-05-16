-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 02:56 PM
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
  `donatur_id` int(11) NOT NULL,
  `judul_buku` varchar(60) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(60) NOT NULL,
  `kategori` int(20) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `donatur_id`, `judul_buku`, `pengarang`, `penerbit`, `kategori`, `deskripsi`, `gambar`) VALUES
(1, 1, 'Cepat & Mudah Memahami Hukum Pidana', 'Ismu Gunadi & Jonaedi Efendi', 'Prenadamedia Grup', 6, 'Referensi hukum ini dimaksudkan untuk membantu masyarakat awam yang tidak mengerti hukum, namun penting untuk diketahui.', 'memahamihukum.jpg'),
(2, 2, 'Algoritma Genetika', 'Zainudin Zukhri', 'Andi', 4, 'Algoritma Genetika Tujuan jamak tengah menjadi perbincangan baik di dunia akademisi maupun di kalangan praktisi.', 'algoritma.jpg'),
(51, 5, 'Ekonomi moneter', 'Lestari Ambarini', 'IN MEDIA', 2, 'Buku secara khusus mempelajari pengaruh uang terhadap aktivitas perekonomian sebuah negara.', 'ekonomi.jpg'),
(52, 6, 'Potret Buram Politik Indonesia', 'Bambang Astianto', 'MITRA WACANA', 9, 'Desain pembangunan sistem politik era reformasi memiliki potensi yang tanpa disadari  menghancurkan kehidupan Bangsa dan Negara Indonesia.', 'politik.jpg'),
(53, 3, 'Biografi Gus Dur', 'Greg Barton', 'LKiS', 1, 'Persoalan hubungan sipil-militer selama masa reformasi menjadi fokus kajian yang penting, apalagi pada masa Presiden Abdurrahman Wahid.', 'biografi.jpg'),
(54, 11, 'Runtuhnya Kerajaan Hindu Jawa', 'Slamet Muljana', 'LKiS', 8, 'Buku ini memaparkan tentang proses runtuhnya kerajaan Majapahit.', 'sejarah.jpg'),
(55, 9, 'Black Showman Dan Pembunuhan Di Kota Tak Bernama', 'Keigo Higashino', 'Gramedia Pustaka Utama', 3, 'Pembunuhan bisa terjadi di mana saja, termasuk di sebuah kota kecil, terpencil, dan nyaris terlupakan di tengah pandemi Covid-19.', 'fiksi.jpg'),
(56, 7, 'Orang-Orang Biasa', 'Andrea Hirata', 'Bentang Pustaka', 7, 'Orang-Orang Biasa antara karena kekecewaan yang besar akan kegagalannya memperjuangkan seorang anak miskin yang pintar untuk masuk Fakultas Kedokteran Universitas Bengkulu.', 'novel.jpg'),
(57, 10, 'Seni berbicara', 'Larry king', 'Gramedia', 10, 'Setelah membaca buku ini, Anda akan mampu mengikuti segala percakapan dengan penuh keyakinan, dan Anda akan tahu cara menyampaikan pesan dengan efektif, dalam situasi apa pun.', 'umum.jpg'),
(58, 8, 'Teknik Dasar Vidiografi	', 'Sarwo Nugroho, S.Kom, M.Kom', 'Andi Offset', 5, 'Perkembangan film dalam pertelevision maupun layar lebar semakin pesat belakangan ini. Kebutuhan akan kamera yang baik sebagai alat pendukung utama dalam pembuatan film semakin meningkat.', 'hobi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(4) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `kategori`) VALUES
(1, 'Biografi'),
(2, 'Bisnis & Keuangan'),
(3, 'Fiksi'),
(4, 'Komputer & Internet'),
(5, 'Hobi & Keterampilan'),
(6, 'Hukum'),
(7, 'Novel & Sastra'),
(8, 'Sejarah'),
(9, 'Sosial & Politik'),
(10, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `resi` varchar(12) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_donatur` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `jasa_kirim` varchar(20) NOT NULL,
  `tgl_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `no_hp`, `alamat`) VALUES
(1, 'ajil', '12345', 'Azriel', 622345678, 'Dramaga, Bogor'),
(2, 'adri01', '12345', 'Adri', 623456789, 'Bubulak, Bogor'),
(3, 'adyee', '12345', 'ayda', 623306020, 'Depok, Jawa barat'),
(4, 'senda', '12345', 'Sendy', 622866168, 'Makasar, Sulawesi Selatan'),
(5, 'moona', '12345', 'Mona', 628702393, 'mondstadt, Teyvat'),
(6, 'keqinguwu', '12345', 'Keqing', 622195508, 'Liyue, Teyvat'),
(7, 'lista1', '12345', 'Lista R', 628708151, 'Bekasi, Jawa Barat'),
(8, 'raacea', '12345', 'Rei', 622824701, 'Jakarta, Jawa Barat'),
(9, 'downa', '12345', 'Doni', 623471260, 'Sleman, Yogjakarta'),
(10, 'somey99', '12345', 'Somad', 621432330, 'Tegal, Jawa Tengah'),
(11, 'budyman', '12345', 'Budi', 621906304, 'Jambi, Sumatra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `donatur_id` (`donatur_id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`resi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_donatur` (`id_donatur`),
  ADD KEY `id_penerima` (`id_penerima`);

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
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`donatur_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `kategori_buku` (`id_kategori`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_donatur`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
