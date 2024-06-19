-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2024 at 07:15 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsuaracapres`
--
CREATE DATABASE IF NOT EXISTS `dbsuaracapres` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbsuaracapres`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suara_capres`
--

CREATE TABLE `tbl_suara_capres` (
  `id_suara` int NOT NULL,
  `provinsi` varchar(125) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_suara` int NOT NULL,
  `capres1` int NOT NULL,
  `capres2` int NOT NULL,
  `capres3` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_suara_capres`
--

INSERT INTO `tbl_suara_capres` (`id_suara`, `provinsi`, `jumlah_suara`, `capres1`, `capres2`, `capres3`) VALUES
(1, 'Jawa Timur', 63102127, 10415830, 40109494, 10470508),
(7, 'Jawa Tengah', 56378742, 6874094, 28830522, 19043882),
(8, 'Banten', 7422507, 2451383, 4035052, 720275),
(9, 'DIY Yogyakarta', 2567394, 496280, 1269265, 741220),
(10, 'DKI Jakarta', 6558734, 2653762, 2692011, 1115138),
(11, 'Jawa Barat', 49335428, 14868183, 28632531, 4593346);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_suara_capres`
--
ALTER TABLE `tbl_suara_capres`
  ADD PRIMARY KEY (`id_suara`),
  ADD UNIQUE KEY `provinsi` (`provinsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_suara_capres`
--
ALTER TABLE `tbl_suara_capres`
  MODIFY `id_suara` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
