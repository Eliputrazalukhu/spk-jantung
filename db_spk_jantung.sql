-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 07:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_jantung`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataset_jantung`
--

CREATE TABLE `dataset_jantung` (
  `id` int(11) NOT NULL,
  `usia` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tekanan_darah` varchar(20) DEFAULT NULL,
  `kolesterol` varchar(20) DEFAULT NULL,
  `gula_darah` varchar(20) DEFAULT NULL,
  `nyeri_dada` varchar(20) DEFAULT NULL,
  `detak_jantung` varchar(20) DEFAULT NULL,
  `hasil` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataset_jantung`
--

INSERT INTO `dataset_jantung` (`id`, `usia`, `jenis_kelamin`, `tekanan_darah`, `kolesterol`, `gula_darah`, `nyeri_dada`, `detak_jantung`, `hasil`) VALUES
(1, 45, 'Laki-laki', 'Tinggi', 'Tinggi', 'Tinggi', 'Ya', 'Cepat', 'Berisiko'),
(2, 30, 'Perempuan', 'Normal', 'Normal', 'Normal', 'Tidak', 'Normal', 'Tidak Berisiko'),
(3, 55, 'Laki-laki', 'Tinggi', 'Tinggi', 'Tinggi', 'Ya', 'Cepat', 'Berisiko'),
(4, 40, 'Perempuan', 'Normal', 'Sedang', 'Normal', 'Tidak', 'Normal', 'Tidak Berisiko'),
(5, 60, 'Laki-laki', 'Tinggi', 'Tinggi', 'Tinggi', 'Ya', 'Cepat', 'Berisiko'),
(6, 76, 'Laki-laki', 'Tinggi', 'Tinggi', 'Tinggi', 'Ya', 'Cepat', 'Berisiko');

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE `data_training` (
  `id` int(11) NOT NULL,
  `usia` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tekanan_darah` varchar(20) DEFAULT NULL,
  `kolesterol` varchar(20) DEFAULT NULL,
  `nyeri_dada` varchar(20) DEFAULT NULL,
  `hasil` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_training`
--

INSERT INTO `data_training` (`id`, `usia`, `jenis_kelamin`, `tekanan_darah`, `kolesterol`, `nyeri_dada`, `hasil`) VALUES
(1, '45', 'Laki-laki', 'Tinggi', 'Tinggi', 'Ya', 'Berisiko'),
(2, '30', 'Perempuan', 'Normal', 'Normal', 'Tidak', 'Tidak Berisiko'),
(3, '55', 'Laki-laki', 'Tinggi', 'Tinggi', 'Ya', 'Berisiko'),
(4, '40', 'Perempuan', 'Normal', 'Sedang', 'Tidak', 'Tidak Berisiko'),
(5, '60', 'Laki-laki', 'Tinggi', 'Tinggi', 'Ya', 'Berisiko'),
(6, '76', 'Laki-laki', 'Tinggi', 'Tinggi', 'Ya', 'Berisiko');

-- --------------------------------------------------------

--
-- Table structure for table `decision_tree`
--

CREATE TABLE `decision_tree` (
  `id` int(11) NOT NULL,
  `atribut` varchar(50) DEFAULT NULL,
  `nilai` varchar(50) DEFAULT NULL,
  `keputusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decision_tree`
--

INSERT INTO `decision_tree` (`id`, `atribut`, `nilai`, `keputusan`) VALUES
(1, 'Nyeri Dada', 'Ya', 'Berisiko'),
(2, 'Kolesterol', 'Tinggi', 'Berisiko'),
(3, 'Tekanan Darah', 'Tinggi', 'Berisiko'),
(4, 'Nyeri Dada', 'Tidak', 'Tidak Berisiko');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_analisis`
--

CREATE TABLE `hasil_analisis` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tekanan_darah` varchar(20) DEFAULT NULL,
  `kolesterol` varchar(20) DEFAULT NULL,
  `nyeri_dada` varchar(20) DEFAULT NULL,
  `prob_berisiko` double DEFAULT NULL,
  `prob_tidak` double DEFAULT NULL,
  `keputusan` varchar(50) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_analisis`
--

INSERT INTO `hasil_analisis` (`id`, `nama_pasien`, `usia`, `jenis_kelamin`, `tekanan_darah`, `kolesterol`, `nyeri_dada`, `prob_berisiko`, `prob_tidak`, `keputusan`, `tanggal`) VALUES
(1, 'eli', 100, 'Laki-laki', 'Tinggi', 'Tinggi', 'Ya', 0.3858024691358, 0.0052083333333333, 'Berisiko', '2026-06-21 05:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `hasil_nb` varchar(50) DEFAULT NULL,
  `hasil_tree` varchar(50) DEFAULT NULL,
  `kesimpulan` varchar(50) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataset_jantung`
--
ALTER TABLE `dataset_jantung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decision_tree`
--
ALTER TABLE `decision_tree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_analisis`
--
ALTER TABLE `hasil_analisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataset_jantung`
--
ALTER TABLE `dataset_jantung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `decision_tree`
--
ALTER TABLE `decision_tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil_analisis`
--
ALTER TABLE `hasil_analisis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
