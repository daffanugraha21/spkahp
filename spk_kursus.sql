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
-- Database: `spk_kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_alternatif` int NOT NULL AUTO_INCREMENT,
  `id_kursus` int DEFAULT NULL,
  `status` enum('daftar','unggulan','belum unggulan') NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id_alternatif`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_kursus`, `status`, `total`) VALUES
(39, 2, 'unggulan', 0),
(40, 1, 'unggulan', 4),
(41, 3, 'unggulan', 3),
(42, 4, 'unggulan', 2),
(52, 5, 'unggulan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_nilai`
--

DROP TABLE IF EXISTS `alternatif_nilai`;
CREATE TABLE IF NOT EXISTS `alternatif_nilai` (
  `id_alternatif_nilai` int NOT NULL AUTO_INCREMENT,
  `id_alternatif` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `id_subkriteria` int NOT NULL,
  `id_nilai` int NOT NULL,
  PRIMARY KEY (`id_alternatif_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif_nilai`
--

INSERT INTO `alternatif_nilai` (`id_alternatif_nilai`, `id_alternatif`, `id_kriteria`, `id_subkriteria`, `id_nilai`) VALUES
(196, 39, 13, 45, 45),
(197, 39, 14, 50, 50),
(198, 39, 16, 60, 60),
(199, 39, 17, 65, 65),
(200, 39, 20, 80, 80),
(201, 40, 13, 46, 46),
(202, 40, 14, 51, 51),
(203, 40, 16, 61, 61),
(204, 40, 17, 66, 66),
(205, 40, 20, 81, 81),
(206, 41, 13, 47, 47),
(207, 41, 14, 52, 52),
(208, 41, 16, 62, 62),
(209, 41, 17, 67, 67),
(210, 41, 20, 82, 82),
(211, 42, 13, 48, 48),
(212, 42, 14, 53, 53),
(213, 42, 16, 63, 63),
(214, 42, 17, 68, 68),
(215, 42, 20, 83, 83),
(226, 51, 13, 46, 46),
(227, 51, 14, 51, 51),
(228, 51, 16, 60, 60),
(229, 51, 17, 66, 66),
(230, 51, 20, 82, 82),
(231, 52, 13, 49, 49),
(232, 52, 14, 54, 54),
(233, 52, 16, 64, 64),
(234, 52, 17, 69, 69),
(235, 52, 20, 84, 84);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int NOT NULL AUTO_INCREMENT,
  `id_tujuan` int NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

DROP TABLE IF EXISTS `hasil`;
CREATE TABLE IF NOT EXISTS `hasil` (
  `id_hasil` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int UNSIGNED NOT NULL,
  `id_kursus` int NOT NULL,
  `nilai_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hasil`),
  KEY `fk_user` (`id_user`),
  KEY `fk_kursus` (`id_kursus`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_user`, `id_kursus`, `nilai_total`, `created_at`) VALUES
(1, 1, 1, 0.95, '2025-08-03 11:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int NOT NULL AUTO_INCREMENT,
  `nama_kriteria` text NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(21, 'Pengetahuan Dasar Mahasiswa'),
(22, 'Minat Mahasiswa terhadap Materi'),
(23, 'Kesiapan Waktu dan Komitmen'),
(24, 'Tujuan Karir Mahasiswa'),
(25, 'Tingkat Kesulitan Materi Kursus');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

DROP TABLE IF EXISTS `kriteria_nilai`;
CREATE TABLE IF NOT EXISTS `kriteria_nilai` (
  `id_kriteria_nilai` int NOT NULL AUTO_INCREMENT,
  `kriteria_id_dari` int NOT NULL,
  `kriteria_id_tujuan` int NOT NULL,
  `nilai` int NOT NULL,
  PRIMARY KEY (`id_kriteria_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=651 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id_kriteria_nilai`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(641, 21, 22, 4),
(642, 21, 23, 5),
(643, 21, 24, 5),
(644, 21, 25, 7),
(645, 22, 23, 1),
(646, 22, 24, 3),
(647, 22, 25, 5),
(648, 23, 24, 4),
(649, 23, 25, 4),
(650, 24, 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

DROP TABLE IF EXISTS `kursus`;
CREATE TABLE IF NOT EXISTS `kursus` (
  `id_kursus` int NOT NULL AUTO_INCREMENT,
  `nama_kursus` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_general_ci NOT NULL,
  `metode` text COLLATE utf8mb4_general_ci NOT NULL,
  `kontak` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_pemilih` int DEFAULT '0',
  `skor_ahp` decimal(10,6) DEFAULT '0.000000',
  `peringkat` int DEFAULT NULL,
  PRIMARY KEY (`id_kursus`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama_kursus`, `deskripsi`, `tujuan`, `metode`, `kontak`, `jumlah_pemilih`, `skor_ahp`, `peringkat`) VALUES
(1, 'ORACLE FOR INTERMEDIATE', 'Pelatihan Oracle tingkat menengah', 'Menguasai Oracle Database', 'Online', '081234567891', 0, 0.000000, NULL),
(2, 'SQL SERVER FOR INTERMEDIATE', 'Pelatihan SQL Server tingkat menengah', 'Menguasai SQL Server', 'Online', '081234567892', 0, 0.000000, NULL),
(4, 'CISCO FOR INTERMEDIATE', 'Pelatihan Jaringan Cisco tingkat menengah', 'Menguasai routing Cisco', 'Offline', '081234567894', 0, 0.000000, NULL),
(5, 'LINUX FOR INTERMEDIATE', 'Pelatihan Linux tingkat menengah', 'Menguasai Linux Server', 'Online', '081234567895', 0, 0.000000, NULL),
(6, 'C# FOR INTERMEDIATE', 'Pelatihan C# tingkat menengah', 'Menguasai pemrograman C#', 'Online', '081234567896', 0, 0.000000, NULL),
(7, 'VB.NET FOR INTERMEDIATE', 'Pelatihan VB.NET tingkat menengah', 'Menguasai aplikasi VB.NET', 'Online', '081234567897', 0, 0.000000, NULL),
(8, 'JAVA FOR INTERMEDIATE', 'Pelatihan Java tingkat menengah', 'Menguasai Java OOP', 'Online', '081234567898', 0, 0.000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nama_nilai`, `bobot`) VALUES
(1, 'Sama penting (1)', 1),
(2, 'Antara 1 dan 3 (2)', 2),
(3, 'Sedikit lebih penting (3)', 3),
(4, 'Antara 3 dan 5 (4)', 4),
(5, 'Jelas lebih penting (5)', 5),
(6, 'Antara 5 dan 7 (6)', 6),
(7, 'Sangat jelas lebih penting (7)', 7),
(8, 'Antara 7 dan 9 (8)', 8),
(9, 'Mutlak lebih penting (9)', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kategori`
--

DROP TABLE IF EXISTS `nilai_kategori`;
CREATE TABLE IF NOT EXISTS `nilai_kategori` (
  `id_nilai` int NOT NULL AUTO_INCREMENT,
  `nama_nilai` varchar(30) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`id_nilai`, `nama_nilai`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang'),
(5, 'Sangat Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `id_kriteria`, `tipe`, `nilai_minimum`, `nilai_maksimum`, `op_min`, `op_max`, `id_nilai`) VALUES
(2, '81 - 90', 21, 'nilai', 81, 90, '>=', '<=', 2),
(3, '71 - 80', 21, 'nilai', 71, 80, '>=', '<=', 3),
(4, '61 - 70', 21, 'nilai', 61, 70, '>=', '<=', 4),
(5, '0 - 60', 21, 'nilai', 0, 60, '>=', '<=', 5),
(7, 'Berminat', 22, 'teks', NULL, NULL, NULL, NULL, 2),
(8, 'Cukup Berminat', 22, 'teks', NULL, NULL, NULL, NULL, 3),
(9, 'Kurang Berminat', 22, 'teks', NULL, NULL, NULL, NULL, 4),
(10, 'Tidak Berminat', 22, 'teks', NULL, NULL, NULL, NULL, 5),
(11, 'Sangat Siap', 23, 'teks', NULL, NULL, NULL, NULL, 1),
(12, 'Siap', 23, 'teks', NULL, NULL, NULL, NULL, 2),
(13, 'Cukup Siap', 23, 'teks', NULL, NULL, NULL, NULL, 3),
(14, 'Kurang Siap', 23, 'teks', NULL, NULL, NULL, NULL, 4),
(15, 'Tidak Siap', 23, 'teks', NULL, NULL, NULL, NULL, 5),
(16, 'Sangat Relevan', 24, 'teks', NULL, NULL, NULL, NULL, 1),
(17, 'Relevan', 24, 'teks', NULL, NULL, NULL, NULL, 2),
(18, 'Cukup Relevan', 24, 'teks', NULL, NULL, NULL, NULL, 3),
(19, 'Kurang Relevan', 24, 'teks', NULL, NULL, NULL, NULL, 4),
(20, 'Tidak Relevan', 24, 'teks', NULL, NULL, NULL, NULL, 5),
(21, 'Mudah', 25, 'teks', NULL, NULL, NULL, NULL, 1),
(22, 'Agak Mudah', 25, 'teks', NULL, NULL, NULL, NULL, 2),
(23, 'Sedang', 25, 'teks', NULL, NULL, NULL, NULL, 3),
(24, 'Sulit', 25, 'teks', NULL, NULL, NULL, NULL, 4),
(25, 'Sangat Sulit', 25, 'teks', NULL, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_hasil`
--

DROP TABLE IF EXISTS `subkriteria_hasil`;
CREATE TABLE IF NOT EXISTS `subkriteria_hasil` (
  `id_subkriteria_hasil` int NOT NULL AUTO_INCREMENT,
  `id_subkriteria` int NOT NULL,
  `prioritas` double NOT NULL,
  PRIMARY KEY (`id_subkriteria_hasil`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`id_subkriteria_hasil`, `id_subkriteria`, `prioritas`) VALUES
(83, 45, 1),
(84, 46, 0.5296070795769015),
(85, 47, 0.1515404539051346),
(86, 48, 0.1282407399951657),
(87, 49, 0.11669121673644427),
(88, 50, 1),
(89, 51, 0.21178188314887259),
(90, 52, 0.18580955091954202),
(91, 53, 0.174678551392686),
(92, 54, 0.1684946627666549),
(93, 60, 1),
(94, 61, 0.21178188314887259),
(95, 62, 0.18580955091954202),
(96, 63, 0.174678551392686),
(97, 64, 0.1684946627666549),
(98, 65, 1),
(99, 66, 0.21178188314887259),
(100, 67, 0.18580955091954202),
(101, 68, 0.174678551392686),
(102, 69, 0.1684946627666549),
(103, 80, 1),
(104, 81, 0.21178188314887259),
(105, 82, 0.18580955091954202),
(106, 83, 0.174678551392686),
(107, 84, 0.1684946627666549),
(108, 1, 1),
(109, 2, 0.5821441353497567),
(110, 3, 0.28355469726212496),
(111, 4, 0.19743136010927934),
(112, 5, 0.10790364030261236);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_nilai`
--

DROP TABLE IF EXISTS `subkriteria_nilai`;
CREATE TABLE IF NOT EXISTS `subkriteria_nilai` (
  `id_subkriteria_nilai` int NOT NULL AUTO_INCREMENT,
  `id_kriteria` int NOT NULL,
  `subkriteria_id_dari` int NOT NULL,
  `subkriteria_id_tujuan` int NOT NULL,
  `nilai` int NOT NULL,
  PRIMARY KEY (`id_subkriteria_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=625 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`id_subkriteria_nilai`, `id_kriteria`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(565, 13, 45, 46, 3),
(566, 13, 45, 47, 5),
(567, 13, 45, 48, 7),
(568, 13, 45, 49, 9),
(569, 13, 46, 47, 3),
(570, 13, 46, 48, 5),
(571, 13, 46, 49, 7),
(572, 13, 47, 48, 1),
(573, 13, 47, 49, 1),
(574, 13, 48, 49, 1),
(575, 14, 50, 51, 3),
(576, 14, 50, 52, 5),
(577, 14, 50, 53, 7),
(578, 14, 50, 54, 9),
(579, 14, 51, 52, 1),
(580, 14, 51, 53, 1),
(581, 14, 51, 54, 1),
(582, 14, 52, 53, 1),
(583, 14, 52, 54, 1),
(584, 14, 53, 54, 1),
(585, 16, 60, 61, 3),
(586, 16, 60, 62, 5),
(587, 16, 60, 63, 7),
(588, 16, 60, 64, 9),
(589, 16, 61, 62, 1),
(590, 16, 61, 63, 1),
(591, 16, 61, 64, 1),
(592, 16, 62, 63, 1),
(593, 16, 62, 64, 1),
(594, 16, 63, 64, 1),
(595, 17, 65, 66, 3),
(596, 17, 65, 67, 5),
(597, 17, 65, 68, 7),
(598, 17, 65, 69, 9),
(599, 17, 66, 67, 1),
(600, 17, 66, 68, 1),
(601, 17, 66, 69, 1),
(602, 17, 67, 68, 1),
(603, 17, 67, 69, 1),
(604, 17, 68, 69, 1),
(605, 20, 80, 81, 3),
(606, 20, 80, 82, 5),
(607, 20, 80, 83, 7),
(608, 20, 80, 84, 9),
(609, 20, 81, 82, 1),
(610, 20, 81, 83, 1),
(611, 20, 81, 84, 1),
(612, 20, 82, 83, 1),
(613, 20, 82, 84, 1),
(614, 20, 83, 84, 1),
(615, 21, 1, 2, 4),
(616, 21, 1, 3, 5),
(617, 21, 1, 4, 4),
(618, 21, 1, 5, 5),
(619, 21, 2, 3, 4),
(620, 21, 2, 4, 4),
(621, 21, 2, 5, 6),
(622, 21, 3, 4, 3),
(623, 21, 3, 5, 3),
(624, 21, 4, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `npm` varchar(20) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `npm`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, NULL, NULL, '127.0.0.1', 'administrator', '$2y$08$VZKFsyoUsERuOaAPxGtcP.8edrxJ9SWSeVBiIlLKlyRuroFzdplCq', '', 'mutiarani615@gmail.com', '', 'T2vRiVXinJ5Hzqh-kOfH4.1539e1fa867a495ba4', 1754651186, 'AGW6SyQ2ui37eD9Ce36Kae', 1268889823, 1755326983, 1, 'Mutiarani', 'Wahyudin', 'admin', '0'),
(5, NULL, NULL, '::1', 'adrian@gmail.com', '$2y$08$/SmD8HqFVhm4bb1e0YVlD.HFekgSxZPyVQQU4JaNTmVm3OoANdIJ.', NULL, 'adrian@gmail.com', NULL, NULL, NULL, NULL, 1754555921, NULL, 1, 'Adrian', 'naufal', 'Gunadarma University', '08888493590');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(19, 1, 1),
(17, 5, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `fk_kursus` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `subkriteria_ibfk_2` FOREIGN KEY (`id_nilai`) REFERENCES `nilai_kategori` (`id_nilai`) ON DELETE SET NULL;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
