-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 10:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grand_obelisk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` varchar(255) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `durasi_menginap` int(11) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `nama_pemesan`, `jenis_kelamin`, `no_identitas`, `id_tipe_kamar`, `tanggal_pesan`, `durasi_menginap`, `breakfast`, `created_at`, `updated_at`) VALUES
('63341260bdddda90fb00fe0f766a9f3d', 'Muhammad Bintang Firdaus', 1, '3674022705010005', 1, '2023-08-24', 2, 1, '2023-08-25 20:23:20', '2023-08-25 20:23:20'),
('f677d7c64194be1e592a38f0d6e3362b', 'Isyana', 0, '3674212144124421', 3, '2023-09-08', 4, 0, '2023-08-25 20:43:16', '2023-08-25 20:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_kamar`
--

CREATE TABLE `tb_tipe_kamar` (
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_tipe_kamar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tipe_kamar`
--

INSERT INTO `tb_tipe_kamar` (`id_tipe_kamar`, `nama_tipe_kamar`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 750000, 'https://www.satoriahotel.com/wp-content/uploads/2022/04/E.-Deluxe-Room-1-scaled-e1651111459463.jpg', '2023-08-25 18:43:30', '2023-08-25 18:43:30'),
(2, 'Deluxe', 1200000, 'https://palmy-exclusive-hotel-tanjung-redep.hotelmix.id/data/Photos/OriginalPhoto/5384/538414/538414551/Palmy-Exclusive-Hotel-Berau-Exterior.JPEG', '2023-08-25 18:43:30', '2023-08-25 18:43:30'),
(3, 'Executive', 2500000, 'https://media.cnn.com/api/v1/images/stellar/prod/140127103345-peninsula-shanghai-deluxe-mock-up.jpg', '2023-08-25 18:52:19', '2023-08-25 18:52:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_tipe_kamar` (`id_tipe_kamar`);

--
-- Indexes for table `tb_tipe_kamar`
--
ALTER TABLE `tb_tipe_kamar`
  ADD PRIMARY KEY (`id_tipe_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tipe_kamar`
--
ALTER TABLE `tb_tipe_kamar`
  MODIFY `id_tipe_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
