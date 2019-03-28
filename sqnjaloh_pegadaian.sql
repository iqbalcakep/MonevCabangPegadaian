-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2019 at 07:59 AM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqnjaloh_pegadaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `inisial` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama`, `inisial`) VALUES
(10, 'CP Blitar', 'BLT'),
(9, 'CP Kepanjen', 'KPJ'),
(8, 'CP Singosari', 'SGS'),
(7, 'CP Tlogomas', 'TLG'),
(6, 'CPS Landungsari', 'LDS'),
(5, 'CP Turen', 'TUR'),
(4, 'CP Rampal', 'RPL'),
(3, 'CP Kotalama', 'KTL'),
(2, 'CP Blimbing', 'BLI'),
(1, 'CP Malang', 'MLG');

-- --------------------------------------------------------

--
-- Table structure for table `mikro`
--

CREATE TABLE `mikro` (
  `id_mikro` int(11) NOT NULL,
  `rekening` bigint(16) NOT NULL,
  `nama_nasabah` varchar(500) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `uang_pinjaman` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_pinjaman` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `rekening` bigint(16) NOT NULL,
  `nama_nasabah` varchar(255) NOT NULL,
  `tanggal_closing` date NOT NULL,
  `jumlah_keping` int(11) NOT NULL,
  `jumlah_gram` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nilai_pembiayaan` int(11) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `rekening`, `nama_nasabah`, `tanggal_closing`, `jumlah_keping`, `jumlah_gram`, `total`, `nilai_pembiayaan`, `jangka_waktu`, `id_user`) VALUES
(1, 3000000000000001, 'Astri Warih Anjarwi, SE', '2019-02-19', 1, 5, 5, 3290350, 6, 50),
(2, 1000000000000001, 'RR Endah Harjoety', '2019-02-20', 2, 5, 10, 6540000, 19, 24),
(3, 3000000000000002, 'Nuhfi Fadhliana', '2019-02-20', 1, 5, 5, 3071000, 12, 50),
(4, 2000000000000001, 'Muhammad Tohir', '2019-02-20', 5, 1, 5, 2805850, 12, 56),
(5, 4000000000000001, 'Martina Kurniawati', '2019-02-27', 5, 1, 5, 2959000, 12, 65),
(6, 2000000000000002, 'Yuda dwi permatasari', '2019-02-22', 5, 1, 5, 2822850, 12, 56),
(7, 3000000000000003, 'Ika Wahyuningtyas', '2019-02-07', 1, 10, 10, 5515650, 12, 67),
(8, 1000000000000002, 'Yohana Ike Crystanti', '2019-02-20', 5, 1, 5, 3546150, 12, 53),
(10, 3000000000000004, 'Suwarti', '2019-02-21', 1, 10, 10, 5585350, 3, 67),
(11, 4000000000000002, 'Sisilia Ira Novita', '2019-02-27', 5, 5, 25, 15047000, 12, 65),
(12, 3000000000000005, 'Erna Nur Aida', '2019-02-26', 1, 5, 5, 2814350, 12, 67),
(13, 1000000000000003, 'Hery Gendro Irianingsih', '2019-02-21', 5, 1, 5, 3569150, 12, 53),
(14, 4000000000000003, 'Sri Andayani', '2019-02-27', 2, 5, 10, 6040000, 12, 65),
(15, 3000000000000006, 'Suhartami', '2019-02-04', 1, 10, 10, 6019000, 12, 67),
(16, 1000000000000004, 'Intan Perwita Sari', '2019-02-22', 5, 1, 5, 3569150, 12, 53),
(17, 3000000000000007, 'M. Jamah', '2019-02-04', 10, 1, 10, 6019000, 12, 67),
(18, 2000000000000004, 'Dini Ariyanti', '2019-02-20', 1, 5, 5, 2805800, 24, 71),
(19, 4000000000000004, 'Puji Astutik', '2019-02-26', 5, 1, 5, 2814350, 36, 65),
(20, 1000000000000005, 'Dedik Sudrajad', '2019-02-22', 5, 1, 5, 3321000, 24, 36),
(21, 2000000000000005, 'Anik tri wahyuni', '2019-02-26', 1, 10, 10, 7032500, 12, 71),
(22, 4000000000000005, 'Reka Catur Febriana', '2019-02-26', 2, 5, 10, 6050000, 12, 65),
(23, 4000000000000006, 'mujilah', '2019-02-25', 2, 5, 10, 5567500, 36, 65),
(24, 3000000000000008, 'Nurul Huda', '2019-02-25', 11, 1, 11, 6157192, 6, 20),
(25, 2000000000000003, 'Solekah', '2019-02-26', 2, 1, 2, 1185690, 3, 61),
(26, 4000000000000007, 'Muji Astutik', '2019-02-21', 2, 5, 10, 16071000, 12, 65),
(27, 4000000000000008, 'Epri Wahyudi', '2019-02-20', 5, 5, 25, 3790116, 12, 65),
(28, 2000000000000006, 'Sri Windarti', '2019-02-20', 1, 5, 5, 2997810, 6, 31),
(29, 1000000000000006, 'Sumarmi Piah', '2019-02-21', 3, 5, 15, 9892000, 12, 70);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET macce NOT NULL,
  `akses` enum('admin','user','cabang') NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `akses`, `id_cabang`) VALUES
(13, 'CP Malang', 'malang', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 1),
(14, 'Sukun', 'sukun', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1),
(16, 'Dieng', 'dieng', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1),
(17, 'MOG', 'mog', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1),
(18, 'CP Blimbing', 'blimbing', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 2),
(19, 'Tumpang', 'tumpang', 'e10adc3949ba59abbe56e057f20f883e', 'user', 2),
(20, 'LA Sucipto', 'lasucipto', 'e10adc3949ba59abbe56e057f20f883e', 'user', 2),
(21, 'Pakis', 'pakis', 'e10adc3949ba59abbe56e057f20f883e', 'user', 2),
(22, 'Piranha/Yani', 'piranhayani', 'e10adc3949ba59abbe56e057f20f883e', 'user', 2),
(23, 'Candi Panggung', 'pangung', 'e10adc3949ba59abbe56e057f20f883e', 'user', 2),
(24, 'CP Kotalama', 'kotalama', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 3),
(25, 'Kebonagung', 'kebonagung', 'e10adc3949ba59abbe56e057f20f883e', 'user', 3),
(26, 'Kebalen', 'kebalen', 'e10adc3949ba59abbe56e057f20f883e', 'user', 3),
(27, 'Matos', 'matos', 'e10adc3949ba59abbe56e057f20f883e', 'user', 3),
(28, 'CP Rampal', 'rampal', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 4),
(29, 'Tawangmangu', 'tawangmangu', 'e10adc3949ba59abbe56e057f20f883e', 'user', 4),
(30, 'Sulfat', 'sulfat', 'e10adc3949ba59abbe56e057f20f883e', 'user', 4),
(31, 'Sawojajar', 'sawojajar', 'e10adc3949ba59abbe56e057f20f883e', 'user', 4),
(32, 'Pasar Sawojajar', 'pssawojajar', 'e10adc3949ba59abbe56e057f20f883e', 'user', 4),
(33, 'Danau Toba', 'toba', 'e10adc3949ba59abbe56e057f20f883e', 'user', 4),
(34, 'CP Turen', 'turen', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 5),
(35, 'Wajak', 'wajak', 'e10adc3949ba59abbe56e057f20f883e', 'user', 5),
(36, 'Dampit', 'dampit', 'e10adc3949ba59abbe56e057f20f883e', 'user', 5),
(37, 'Sumawe', 'sumawe', 'e10adc3949ba59abbe56e057f20f883e', 'user', 5),
(38, 'Ampel Gading', 'ampelgading', 'e10adc3949ba59abbe56e057f20f883e', 'user', 5),
(39, 'CPS Landungsari', 'landungsari', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 6),
(40, 'Bunul', 'bunul', 'e10adc3949ba59abbe56e057f20f883e', 'user', 6),
(41, 'Kauman', 'kauman', 'e10adc3949ba59abbe56e057f20f883e', 'user', 6),
(42, 'Gadang', 'gadang', 'e10adc3949ba59abbe56e057f20f883e', 'user', 6),
(43, 'CP Tlogomas', 'tlogomas', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 7),
(44, 'Pujon', 'pujon', 'e10adc3949ba59abbe56e057f20f883e', 'user', 7),
(45, 'Batu', 'batu', 'e10adc3949ba59abbe56e057f20f883e', 'user', 7),
(46, 'Temas', 'temas', 'e10adc3949ba59abbe56e057f20f883e', 'user', 7),
(47, 'Punten', 'punten', 'e10adc3949ba59abbe56e057f20f883e', 'user', 7),
(48, 'Sengkaling', 'sengkaling', 'e10adc3949ba59abbe56e057f20f883e', 'user', 7),
(49, 'Bendungan Sutami', 'sutami', 'e10adc3949ba59abbe56e057f20f883e', 'user', 7),
(50, 'Suhat', 'suhat', 'e10adc3949ba59abbe56e057f20f883e', 'user', 7),
(51, 'CP Singosari', 'singosari', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 8),
(52, 'Karangploso', 'karangploso', 'e10adc3949ba59abbe56e057f20f883e', 'user', 8),
(53, 'Lawang', 'lawang', 'e10adc3949ba59abbe56e057f20f883e', 'user', 8),
(54, 'Pasar Lawang', 'pslawang', 'e10adc3949ba59abbe56e057f20f883e', 'user', 8),
(55, 'Purwosari', 'purwosari', 'e10adc3949ba59abbe56e057f20f883e', 'user', 8),
(56, 'CP Kepanjen', 'kepanjen', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 9),
(57, 'Pagak', 'pagak', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(58, 'Pasar Pakisaji', 'pspakisaji', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(59, 'Sumberpucung', 'sumberpucung', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(60, 'Donomulyo', 'donomulyo', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(61, 'Pasar Kepanjen', 'pskepanjen', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(62, 'Gondang Legi', 'gondanglegi', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(63, 'Bululawang', 'bululawang', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(64, 'Bantur', 'bantur', 'e10adc3949ba59abbe56e057f20f883e', 'user', 9),
(65, 'CP Blitar', 'blitar', 'e10adc3949ba59abbe56e057f20f883e', 'cabang', 10),
(66, 'Kademangan', 'kademangan', 'e10adc3949ba59abbe56e057f20f883e', 'user', 10),
(67, 'Srengat', 'srengat', 'e10adc3949ba59abbe56e057f20f883e', 'user', 10),
(68, 'Lodoyo', 'lodoyo', 'e10adc3949ba59abbe56e057f20f883e', 'user', 10),
(69, 'Nglegok', 'nglegok', 'e10adc3949ba59abbe56e057f20f883e', 'user', 10),
(70, 'Wlingi', 'wlingi', 'e10adc3949ba59abbe56e057f20f883e', 'user', 10),
(71, 'Kesamben', 'kesamben', 'e10adc3949ba59abbe56e057f20f883e', 'user', 10),
(72, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `mikro`
--
ALTER TABLE `mikro`
  ADD PRIMARY KEY (`id_mikro`),
  ADD UNIQUE KEY `rekening` (`rekening`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `rekening` (`rekening`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `mikro`
--
ALTER TABLE `mikro`
  MODIFY `id_mikro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
