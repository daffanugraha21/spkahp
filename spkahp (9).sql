-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2025 at 02:13 AM
-- Server version: 9.1.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kriteria`
--

DROP TABLE IF EXISTS `bobot_kriteria`;
CREATE TABLE IF NOT EXISTS `bobot_kriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kriteria` int NOT NULL,
  `bobot` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id`, `id_kriteria`, `bobot`) VALUES
(1, 3, 1.00),
(2, 4, 0.20),
(3, 5, 0.15),
(4, 6, 0.25),
(5, 7, 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kursus`
--

DROP TABLE IF EXISTS `bobot_kursus`;
CREATE TABLE IF NOT EXISTS `bobot_kursus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kursus` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `bobot` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kursus` (`id_kursus`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bobot_kursus`
--

INSERT INTO `bobot_kursus` (`id`, `id_kursus`, `id_kriteria`, `bobot`) VALUES
(1, 3, 3, 0.3),
(2, 3, 4, 0.25),
(3, 3, 5, 0.2),
(4, 3, 6, 0.15),
(5, 3, 7, 0.1),
(6, 4, 3, 0.2),
(7, 4, 4, 0.25),
(8, 4, 5, 0.2),
(9, 4, 6, 0.2),
(10, 4, 7, 0.15),
(11, 5, 3, 0.3),
(12, 5, 4, 0.2),
(13, 5, 5, 0.2),
(14, 5, 6, 0.2),
(15, 5, 7, 0.1),
(16, 6, 3, 0.2),
(17, 6, 4, 0.15),
(18, 6, 5, 0.2),
(19, 6, 6, 0.2),
(20, 6, 7, 0.25),
(21, 7, 3, 0.2),
(22, 7, 4, 0.15),
(23, 7, 5, 0.2),
(24, 7, 6, 0.25),
(25, 7, 7, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `soal_id` int NOT NULL,
  `opsi_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jawaban`),
  KEY `user_id` (`user_id`),
  KEY `soal_id` (`soal_id`),
  KEY `opsi_id` (`opsi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_user`
--

DROP TABLE IF EXISTS `jawaban_user`;
CREATE TABLE IF NOT EXISTS `jawaban_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_soal` int NOT NULL,
  `id_opsi` int NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_soal` (`id_soal`),
  KEY `id_opsi` (`id_opsi`)
) ENGINE=MyISAM AUTO_INCREMENT=671 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jawaban_user`
--

INSERT INTO `jawaban_user` (`id`, `id_user`, `id_soal`, `id_opsi`, `nilai`, `created_at`) VALUES
(300, 3, 25, 122, 4, '2025-08-28 06:37:50'),
(299, 3, 24, 117, 4, '2025-08-28 06:37:50'),
(298, 3, 23, 113, 3, '2025-08-28 06:37:50'),
(297, 3, 22, 110, 1, '2025-08-28 06:37:50'),
(296, 3, 21, 105, 1, '2025-08-28 06:37:50'),
(295, 3, 20, 100, 1, '2025-08-28 06:37:50'),
(294, 3, 19, 94, 2, '2025-08-28 06:37:50'),
(293, 3, 18, 89, 2, '2025-08-28 06:37:50'),
(292, 3, 17, 83, 3, '2025-08-28 06:37:50'),
(291, 3, 16, 78, 3, '2025-08-28 06:37:50'),
(290, 3, 15, 73, 3, '2025-08-28 06:37:50'),
(289, 3, 14, 67, 4, '2025-08-28 06:37:50'),
(288, 3, 13, 62, 4, '2025-08-28 06:37:50'),
(287, 3, 12, 56, 5, '2025-08-28 06:37:50'),
(286, 3, 11, 51, 5, '2025-08-28 06:37:50'),
(285, 3, 10, 50, 1, '2025-08-28 06:37:50'),
(284, 3, 9, 45, 1, '2025-08-28 06:37:50'),
(283, 3, 8, 39, 2, '2025-08-28 06:37:50'),
(282, 3, 7, 34, 2, '2025-08-28 06:37:50'),
(281, 3, 6, 28, 3, '2025-08-28 06:37:50'),
(280, 3, 5, 23, 3, '2025-08-28 06:37:50'),
(279, 3, 4, 17, 4, '2025-08-28 06:37:50'),
(278, 3, 3, 12, 4, '2025-08-28 06:37:50'),
(277, 3, 2, 6, 5, '2025-08-28 06:37:50'),
(276, 3, 1, 1, 5, '2025-08-28 06:37:50'),
(225, 1, 25, 124, 2, '2025-08-27 22:36:36'),
(224, 1, 24, 120, 1, '2025-08-27 22:36:36'),
(223, 1, 23, 113, 3, '2025-08-27 22:36:36'),
(222, 1, 22, 107, 4, '2025-08-27 22:36:36'),
(221, 1, 21, 102, 4, '2025-08-27 22:36:36'),
(220, 1, 20, 98, 3, '2025-08-27 22:36:36'),
(219, 1, 19, 93, 3, '2025-08-27 22:36:36'),
(218, 1, 18, 86, 5, '2025-08-27 22:36:36'),
(217, 1, 17, 81, 5, '2025-08-27 22:36:36'),
(216, 1, 16, 80, 1, '2025-08-27 22:36:36'),
(215, 1, 15, 75, 1, '2025-08-27 22:36:36'),
(214, 1, 14, 69, 2, '2025-08-27 22:36:36'),
(213, 1, 13, 64, 2, '2025-08-27 22:36:36'),
(212, 1, 12, 57, 4, '2025-08-27 22:36:36'),
(211, 1, 11, 51, 5, '2025-08-27 22:36:36'),
(210, 1, 10, 50, 1, '2025-08-27 22:36:36'),
(209, 1, 9, 44, 2, '2025-08-27 22:36:36'),
(208, 1, 8, 38, 3, '2025-08-27 22:36:36'),
(207, 1, 7, 32, 4, '2025-08-27 22:36:36'),
(206, 1, 6, 26, 5, '2025-08-27 22:36:36'),
(205, 1, 5, 25, 1, '2025-08-27 22:36:36'),
(204, 1, 4, 19, 2, '2025-08-27 22:36:36'),
(203, 1, 3, 13, 3, '2025-08-27 22:36:36'),
(202, 1, 2, 7, 4, '2025-08-27 22:36:36'),
(201, 1, 1, 1, 5, '2025-08-27 22:36:36'),
(251, 2, 1, 1, 5, '2025-08-27 23:04:36'),
(252, 2, 2, 10, 1, '2025-08-27 23:04:36'),
(253, 2, 3, 15, 1, '2025-08-27 23:04:36'),
(254, 2, 4, 20, 1, '2025-08-27 23:04:36'),
(255, 2, 5, 21, 5, '2025-08-27 23:04:36'),
(256, 2, 6, 30, 1, '2025-08-27 23:04:36'),
(257, 2, 7, 35, 1, '2025-08-27 23:04:36'),
(258, 2, 8, 40, 1, '2025-08-27 23:04:36'),
(259, 2, 9, 45, 1, '2025-08-27 23:04:36'),
(260, 2, 10, 46, 5, '2025-08-27 23:04:36'),
(261, 2, 11, 55, 1, '2025-08-27 23:04:36'),
(262, 2, 12, 60, 1, '2025-08-27 23:04:36'),
(263, 2, 13, 65, 1, '2025-08-27 23:04:36'),
(264, 2, 14, 66, 5, '2025-08-27 23:04:36'),
(265, 2, 15, 75, 1, '2025-08-27 23:04:36'),
(266, 2, 16, 80, 1, '2025-08-27 23:04:36'),
(267, 2, 17, 85, 1, '2025-08-27 23:04:36'),
(268, 2, 18, 86, 5, '2025-08-27 23:04:36'),
(269, 2, 19, 95, 1, '2025-08-27 23:04:36'),
(270, 2, 20, 100, 1, '2025-08-27 23:04:36'),
(271, 2, 21, 105, 1, '2025-08-27 23:04:36'),
(272, 2, 22, 110, 1, '2025-08-27 23:04:36'),
(273, 2, 23, 115, 1, '2025-08-27 23:04:36'),
(274, 2, 24, 116, 5, '2025-08-27 23:04:36'),
(275, 2, 25, 125, 1, '2025-08-27 23:04:36'),
(545, 5, 24, 125, 1, '2025-09-17 04:51:05'),
(544, 5, 23, 120, 1, '2025-09-17 04:51:05'),
(543, 5, 22, 115, 1, '2025-09-17 04:51:05'),
(542, 5, 21, 110, 1, '2025-09-17 04:51:05'),
(541, 5, 20, 105, 1, '2025-09-17 04:51:05'),
(540, 5, 19, 5, 1, '2025-09-17 04:51:05'),
(539, 5, 18, 10, 1, '2025-09-17 04:51:05'),
(538, 5, 17, 11, 5, '2025-09-17 04:51:05'),
(537, 5, 16, 20, 1, '2025-09-17 04:51:05'),
(536, 5, 15, 25, 1, '2025-09-17 04:51:05'),
(535, 5, 14, 26, 5, '2025-09-17 04:51:05'),
(534, 5, 13, 35, 1, '2025-09-17 04:51:05'),
(533, 5, 12, 40, 1, '2025-09-17 04:51:05'),
(532, 5, 11, 45, 1, '2025-09-17 04:51:05'),
(531, 5, 10, 50, 1, '2025-09-17 04:51:05'),
(530, 5, 9, 51, 5, '2025-09-17 04:51:05'),
(529, 5, 8, 60, 1, '2025-09-17 04:51:05'),
(528, 5, 7, 65, 1, '2025-09-17 04:51:05'),
(527, 5, 6, 70, 1, '2025-09-17 04:51:05'),
(526, 5, 5, 71, 5, '2025-09-17 04:51:05'),
(525, 5, 4, 80, 1, '2025-09-17 04:51:05'),
(524, 5, 3, 85, 1, '2025-09-17 04:51:05'),
(523, 5, 2, 90, 1, '2025-09-17 04:51:05'),
(522, 5, 1, 91, 5, '2025-09-17 04:51:05'),
(521, 5, 0, 100, 1, '2025-09-17 04:51:05'),
(670, 6, 1, 1, 5, '2025-09-17 08:24:44'),
(669, 6, 3, 15, 1, '2025-09-17 08:24:44'),
(668, 6, 25, 125, 1, '2025-09-17 08:24:44'),
(667, 6, 2, 10, 1, '2025-09-17 08:24:44'),
(666, 6, 4, 20, 1, '2025-09-17 08:24:44'),
(665, 6, 9, 45, 1, '2025-09-17 08:24:44'),
(664, 6, 8, 40, 1, '2025-09-17 08:24:44'),
(663, 6, 7, 35, 1, '2025-09-17 08:24:44'),
(662, 6, 6, 30, 1, '2025-09-17 08:24:44'),
(661, 6, 5, 21, 5, '2025-09-17 08:24:44'),
(660, 6, 10, 46, 5, '2025-09-17 08:24:44'),
(659, 6, 11, 55, 1, '2025-09-17 08:24:44'),
(658, 6, 12, 60, 1, '2025-09-17 08:24:44'),
(657, 6, 13, 65, 1, '2025-09-17 08:24:44'),
(656, 6, 14, 66, 5, '2025-09-17 08:24:44'),
(655, 6, 15, 75, 1, '2025-09-17 08:24:44'),
(654, 6, 16, 80, 1, '2025-09-17 08:24:44'),
(653, 6, 17, 85, 1, '2025-09-17 08:24:44'),
(652, 6, 18, 86, 5, '2025-09-17 08:24:44'),
(651, 6, 19, 95, 1, '2025-09-17 08:24:44'),
(650, 6, 20, 100, 1, '2025-09-17 08:24:44'),
(649, 6, 22, 110, 1, '2025-09-17 08:24:44'),
(648, 6, 21, 105, 1, '2025-09-17 08:24:44'),
(647, 6, 23, 115, 1, '2025-09-17 08:24:44'),
(646, 6, 24, 116, 5, '2025-09-17 08:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int NOT NULL AUTO_INCREMENT,
  `nama_kriteria` text NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(3, 'Pengetahuan Dasar Mahasiswa'),
(4, 'Minat Mahasiswa Terhadap Materi'),
(5, 'Kesiapan Waktu dan Komitmen'),
(6, 'Tujuan Karir Mahasiswa'),
(7, 'Tingkat Kesulitan Materi Kursus');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

DROP TABLE IF EXISTS `kursus`;
CREATE TABLE IF NOT EXISTS `kursus` (
  `id_kursus` int NOT NULL AUTO_INCREMENT,
  `nama_kursus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `metode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kontak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_pemilih` int DEFAULT '0',
  `skor_ahp` decimal(10,6) DEFAULT '0.000000',
  `peringkat` int DEFAULT NULL,
  PRIMARY KEY (`id_kursus`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama_kursus`, `deskripsi`, `tujuan`, `metode`, `kontak`, `jumlah_pemilih`, `skor_ahp`, `peringkat`) VALUES
(7, 'LINUX FOR INTERMEDIATE', 'Sistem Operasi\r\n', 'Mengelola sistem Linux, konfigurasi jaringan, scripting otomatisasi, dan monitoring server.', 'lorem', '12345', 0, 0.000005, 5),
(3, 'SQL SERVER FOR INTERMEDIATE', 'Manajemen Database', 'Mengelola database dengan query lanjutan, stored procedure, trigger, dan optimisasi performa.', 'lorem', '12345', 0, 0.000001, 1),
(4, 'CISCO FOR INTERMEDIATE', 'Jaringan Komputer\r\n', 'Mengkonfigurasi dan memelihara jaringan LAN/WAN, routing, switching, VLAN, serta troubleshooting jaringan.', 'lorem', '12345', 0, 0.000002, 2),
(5, 'JAVA FOR INTERMEDIATE', 'Pemrograman Java\r\n', 'Mengembangkan aplikasi berorientasi objek dengan multithreading, collections, dan exception handling.', 'lorem', '12345', 0, 0.000003, 3),
(6, 'C# FOR INTERMEDIATE', 'Pemrograman C#\r\n', 'Membuat aplikasi .NET menggunakan OOP, LINQ, asynchronous programming, dan koneksi database.', 'lorem', '12345', 0, 0.000004, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int NOT NULL AUTO_INCREMENT,
  `nama_nilai` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bobot` int NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

DROP TABLE IF EXISTS `opsi`;
CREATE TABLE IF NOT EXISTS `opsi` (
  `id_opsi` int NOT NULL AUTO_INCREMENT,
  `soal_id` int NOT NULL,
  `teks_opsi` varchar(255) NOT NULL,
  `nilai` int NOT NULL,
  PRIMARY KEY (`id_opsi`),
  KEY `soal_id` (`soal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id_opsi`, `soal_id`, `teks_opsi`, `nilai`) VALUES
(116, 24, 'Sangat Baik', 5),
(115, 23, 'Sangat Buruk', 1),
(114, 23, 'Buruk', 2),
(113, 23, 'Cukup', 3),
(112, 23, 'Baik', 4),
(111, 23, 'Sangat Baik', 5),
(110, 22, 'Sangat Buruk', 1),
(109, 22, 'Buruk', 2),
(108, 22, 'Cukup', 3),
(107, 22, 'Baik', 4),
(106, 22, 'Sangat Baik', 5),
(105, 21, 'Sangat Buruk', 1),
(104, 21, 'Buruk', 2),
(103, 21, 'Cukup', 3),
(102, 21, 'Baik', 4),
(101, 21, 'Sangat Baik', 5),
(100, 20, 'Sangat Buruk', 1),
(99, 20, 'Buruk', 2),
(98, 20, 'Cukup', 3),
(97, 20, 'Baik', 4),
(96, 20, 'Sangat Baik', 5),
(95, 19, 'Sangat Buruk', 1),
(94, 19, 'Buruk', 2),
(93, 19, 'Cukup', 3),
(92, 19, 'Baik', 4),
(91, 19, 'Sangat Baik', 5),
(90, 18, 'Sangat Buruk', 1),
(89, 18, 'Buruk', 2),
(88, 18, 'Cukup', 3),
(87, 18, 'Baik', 4),
(85, 17, 'Sangat Buruk', 1),
(86, 18, 'Sangat Baik', 5),
(84, 17, 'Buruk', 2),
(83, 17, 'Cukup', 3),
(82, 17, 'Baik', 4),
(81, 17, 'Sangat Baik', 5),
(80, 16, 'Sangat Buruk', 1),
(79, 16, 'Buruk', 2),
(78, 16, 'Cukup', 3),
(77, 16, 'Baik', 4),
(76, 16, 'Sangat Baik', 5),
(75, 15, 'Sangat Buruk', 1),
(74, 15, 'Buruk', 2),
(73, 15, 'Cukup', 3),
(72, 15, 'Baik', 4),
(71, 15, 'Sangat Baik', 5),
(70, 14, 'Sangat Buruk', 1),
(69, 14, 'Buruk', 2),
(68, 14, 'Cukup', 3),
(67, 14, 'Baik', 4),
(66, 14, 'Sangat Baik', 5),
(65, 13, 'Sangat Buruk', 1),
(64, 13, 'Buruk', 2),
(63, 13, 'Cukup', 3),
(62, 13, 'Baik', 4),
(61, 13, 'Sangat Baik', 5),
(60, 12, 'Sangat Buruk', 1),
(59, 12, 'Buruk', 2),
(58, 12, 'Cukup', 3),
(57, 12, 'Baik', 4),
(56, 12, 'Sangat Baik', 5),
(55, 11, 'Sangat Buruk', 1),
(54, 11, 'Buruk', 2),
(53, 11, 'Cukup', 3),
(52, 11, 'Baik', 4),
(51, 11, 'Sangat Baik', 5),
(50, 10, 'Sangat Buruk', 1),
(49, 10, 'Buruk', 2),
(48, 10, 'Cukup', 3),
(47, 10, 'Baik', 4),
(46, 10, 'Sangat Baik', 5),
(45, 9, 'Sangat Buruk', 1),
(44, 9, 'Buruk', 2),
(43, 9, 'Cukup', 3),
(42, 9, 'Baik', 4),
(41, 9, 'Sangat Baik', 5),
(40, 8, 'Sangat Buruk', 1),
(39, 8, 'Buruk', 2),
(38, 8, 'Cukup', 3),
(37, 8, 'Baik', 4),
(36, 8, 'Sangat Baik', 5),
(35, 7, 'Sangat Buruk', 1),
(34, 7, 'Buruk', 2),
(33, 7, 'Cukup', 3),
(32, 7, 'Baik', 4),
(31, 7, 'Sangat Baik', 5),
(30, 6, 'Sangat Buruk', 1),
(29, 6, 'Buruk', 2),
(28, 6, 'Cukup', 3),
(27, 6, 'Baik', 4),
(26, 6, 'Sangat Baik', 5),
(25, 5, 'Sangat Buruk', 1),
(24, 5, 'Buruk', 2),
(23, 5, 'Cukup', 3),
(22, 5, 'Baik', 4),
(21, 5, 'Sangat Baik', 5),
(20, 4, 'Sangat Buruk', 1),
(19, 4, 'Buruk', 2),
(18, 4, 'Cukup', 3),
(17, 4, 'Baik', 4),
(16, 4, 'Sangat Baik', 5),
(15, 3, 'Sangat Buruk', 1),
(14, 3, 'Buruk', 2),
(13, 3, 'Cukup', 3),
(12, 3, 'Baik', 4),
(11, 3, 'Sangat Baik', 5),
(10, 2, 'Sangat Buruk', 1),
(9, 2, 'Buruk', 2),
(8, 2, 'Cukup', 3),
(7, 2, 'Baik', 4),
(6, 2, 'Sangat Baik', 5),
(5, 1, 'Sangat Buruk', 1),
(4, 1, 'Buruk', 2),
(3, 1, 'Cukup', 3),
(2, 1, 'Baik', 4),
(1, 1, 'Sangat Baik', 5),
(117, 24, 'Baik', 4),
(118, 24, 'Cukup', 3),
(119, 24, 'Buruk', 2),
(120, 24, 'Sangat Buruk', 1),
(121, 25, 'Sangat Baik', 5),
(122, 25, 'Baik', 4),
(123, 25, 'Cukup', 3),
(124, 25, 'Buruk', 2),
(125, 25, 'Sangat Buruk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

DROP TABLE IF EXISTS `perbandingan_alternatif`;
CREATE TABLE IF NOT EXISTS `perbandingan_alternatif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_id` int NOT NULL,
  `alternatif_1_id` int NOT NULL,
  `alternatif_2_id` int NOT NULL,
  `nilai` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kriteria_id` (`kriteria_id`),
  KEY `alternatif_1_id` (`alternatif_1_id`),
  KEY `alternatif_2_id` (`alternatif_2_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

DROP TABLE IF EXISTS `perbandingan_kriteria`;
CREATE TABLE IF NOT EXISTS `perbandingan_kriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_1_id` int NOT NULL,
  `kriteria_2_id` int NOT NULL,
  `nilai` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kriteria_1_id` (`kriteria_1_id`),
  KEY `kriteria_2_id` (`kriteria_2_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

DROP TABLE IF EXISTS `soal`;
CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `id_kriteria` int NOT NULL,
  `kriteria_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kursus` int DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `kriteria_id` (`kriteria_id`),
  KEY `fk_soal_kriteria` (`id_kriteria`),
  KEY `fk_soal_kursus` (`id_kursus`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `pertanyaan`, `id_kriteria`, `kriteria_id`, `created_at`, `id_kursus`) VALUES
(24, 'Seberapa baik dasar Anda dalam manajemen database untuk kursus SQL SERVER FOR INTERMEDIATE?', 0, 3, '2025-09-17 14:39:00', 3),
(23, 'Seberapa baik dasar Anda dalam sistem operasi untuk kursus LINUX FOR INTERMEDIATE?', 0, 3, '2025-09-17 14:39:00', 7),
(21, 'Menurut Anda, seberapa sulit materi C# intermediate bagi Anda?', 0, 7, '2025-09-17 14:39:00', 6),
(22, 'Menurut Anda, seberapa sulit materi Linux intermediate bagi Anda?', 0, 7, '2025-09-17 14:39:00', 7),
(20, 'Menurut Anda, seberapa sulit materi Java intermediate bagi Anda?', 0, 7, '2025-09-17 14:39:00', 5),
(19, 'Menurut Anda, seberapa sulit materi Cisco intermediate bagi Anda?', 0, 7, '2025-09-17 14:39:00', 4),
(18, 'Menurut Anda, seberapa sulit materi SQL Server intermediate bagi Anda?', 0, 7, '2025-09-17 14:39:00', 3),
(17, 'Apakah tujuan karir Anda lebih berfokus pada bidang System Administrator atau DevOps (Linux)?', 0, 6, '2025-09-17 14:39:00', 7),
(16, 'Apakah tujuan karir Anda lebih berfokus pada bidang Software Developer (Java/C#)?', 0, 6, '2025-09-17 14:39:00', 5),
(15, 'Apakah tujuan karir Anda lebih berfokus pada bidang Network Engineer atau Cybersecurity (Cisco)?', 0, 6, '2025-09-17 14:39:00', 4),
(14, 'Apakah tujuan karir Anda lebih berfokus pada bidang Database Administrator atau Data Engineer (SQL Server)?', 0, 6, '2025-09-17 14:39:00', 3),
(13, 'Seberapa siap Anda meluangkan waktu untuk kursus dengan materi sistem operasi open-source (Linux)?', 0, 5, '2025-09-17 14:39:00', 7),
(12, 'Seberapa siap Anda meluangkan waktu untuk kursus dengan materi pemrograman berorientasi objek (Java/C#)?', 0, 5, '2025-09-17 14:39:00', 5),
(11, 'Seberapa siap Anda meluangkan waktu untuk kursus dengan materi jaringan yang membutuhkan praktik langsung (Cisco)?', 0, 5, '2025-09-17 14:39:00', 4),
(10, 'Seberapa siap Anda meluangkan waktu untuk kursus dengan materi database tingkat menengah (SQL Server)?', 0, 5, '2025-09-17 14:39:00', 3),
(5, 'Seberapa besar minat Anda untuk memperdalam SQL Server dan pengelolaan database?', 0, 4, '2025-09-17 14:39:00', 3),
(6, 'Seberapa besar minat Anda dalam mempelajari jaringan komputer dan perangkat Cisco?', 0, 4, '2025-09-17 14:39:00', 4),
(7, 'Seberapa besar minat Anda untuk mengembangkan aplikasi menggunakan Java?', 0, 4, '2025-09-17 14:39:00', 5),
(8, 'Seberapa besar minat Anda untuk mengembangkan aplikasi menggunakan C#?', 0, 4, '2025-09-17 14:39:00', 6),
(9, 'Seberapa besar minat Anda untuk mempelajari administrasi sistem Linux?', 0, 4, '2025-09-17 14:39:00', 7),
(4, 'Seberapa baik dasar Anda dalam sistem operasi (Linux/Windows)?', 0, 3, '2025-09-17 14:39:00', 7),
(2, 'Seberapa baik dasar Anda dalam pemrograman berorientasi objek (Java/C#)?', 0, 3, '2025-09-17 14:39:00', 5),
(25, 'Seberapa baik dasar Anda dalam pemrograman Java untuk kursus JAVA FOR INTERMEDIATE?', 0, 3, '2025-09-17 14:39:00', 5),
(3, 'Seberapa baik dasar Anda dalam jaringan komputer & protokol (TCP/IP, subnetting, routing dasar)?', 0, 3, '2025-09-17 14:39:00', 4),
(1, 'Seberapa baik dasar Anda dalam basis data relasional (SQL, ERD, query)?', 0, 3, '2025-09-17 14:39:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

DROP TABLE IF EXISTS `subkriteria`;
CREATE TABLE IF NOT EXISTS `subkriteria` (
  `id_subkriteria` int NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kriteria` int NOT NULL,
  `tipe` enum('nilai','teks') COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_minimum` float DEFAULT NULL,
  `nilai_maksimum` float DEFAULT NULL,
  `op_min` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `op_max` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_nilai` int DEFAULT NULL,
  PRIMARY KEY (`id_subkriteria`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `id_nilai` (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `npm` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `npm` (`npm`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `npm`, `nama`, `email`, `jurusan`, `fakultas`, `password`, `created_at`) VALUES
(1, '11223344', 'adi jaya raya', 'adijaya@mail.com', 'sistem informasi', 'fikti', '$2y$10$fRXM9kj4JPNwlfpGJzj5JuH7XefHEVCc2uSnbraIKllnlorHBaskW', '2025-08-09 12:13:03'),
(2, '22334455', 'rio', 'rio@mail.com', 'sistem informasi', 'fikti', '$2y$10$.d6TVMW5doFTKaSDRczPbeDZSOi0T9AD8IRv.UcyJTyVeuYok2Dqy', '2025-08-15 03:03:01'),
(3, '33445566', 'toni', 'toni@mail.com', 'SI', 'FIKTI', '$2y$10$g3S2m9lMTrnYIxhbzbR.auXoauUBomW9kIxE.3hp8AJitkiuzkY6K', '2025-08-28 13:36:45'),
(5, '44556677', 'jaka', 'jaka@mail.com', 'SI', 'FIKTI', '$2y$10$e.dKuyCDOmsACfIZPwmp0.XtvzTdt35TR/uLiQflaoVJewTyxD6k2', '2025-09-14 04:22:48'),
(6, '99887766', 'komar', 'komar@mail.com', 'SI', 'FIKTI', '$2y$10$sngkC66WbHcy61i96qyq6.vh0h9hbuXTzwLnbPE8pPplr1KP3cZ5a', '2025-09-17 11:14:19');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `subkriteria_ibfk_2` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id_nilai`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
