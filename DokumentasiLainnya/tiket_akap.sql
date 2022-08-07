-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 08:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_akap`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `kursi` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `fasilitas` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `gambar`, `harga`, `kursi`, `tanggal`, `jam`, `asal`, `tujuan`, `kelas`, `fasilitas`) VALUES
(1, 'ASLI PRIMA INTI KARYA', 'ekonomi.jpg', '30000', 20, '2022-08-06', '14:00:00', 'Labuan', 'Kali Deres', 'ekonomi', 'AC;\r\n'),
(2, 'PO HANDOYO', 'bisnis.jpg', '200000', 25, '2022-08-07', '10:00:00', 'Surabaya', 'Bandung', 'Bisnis', 'AC 2-2;\r\nMakan;\r\nSelimut;\r\nBantal;\r\nToilet;'),
(3, 'PO SINAR JAYA', 'eksekutif.jpg', '250000', 20, '2022-08-06', '14:00:00', 'Jakarta', 'Surabaya', 'Eksekutif', 'AC 2-2;\r\nMakan;\r\nSelimut;\r\nBantal;\r\nToilet;\r\nWIFI;\r\nTol;'),
(4, 'PO 27 TRANS', 'eks_pres.jpg', '500000', 10, '2022-08-09', '10:00:00', 'Jakarta', 'Surabaya', 'Eksekutif President', 'Full AC;\r\nTV;\r\nDVD Player;\r\nKaraoke;\r\nReclining Seat 3-2 atau 2-2;\r\nHand Rest;\r\nTerminal Listrik;\r\nCool Box;\r\nDispenser;\r\nSmoking Room;\r\nToilet;\r\nBantal Selimut;\r\nWiFi;\r\nMakan;\r\nSnack;'),
(5, 'PO SINAR JAYA', 'eksekutif.jpg', '250000', 11, '2022-08-07', '14:00:00', 'Jakarta', 'Surabaya', 'Eksekutif', 'AC 2-2;\r\nMakan;\r\nSelimut;\r\nBantal;\r\nToilet;\r\nWIFI;'),
(6, 'PO HANDOYO', 'bisnis.jpg', '200000', 22, '2022-08-09', '14:00:00', 'Surabaya', 'Bandung', 'Bisnis', 'AC 2-2;\r\nMakan;\r\nSelimut;\r\nBantal;\r\nToilet;'),
(7, 'ASLI PRIMA INTI KARYA', 'ekonomi.jpg', '70000', 24, '2022-08-09', '14:00:00', 'Serang', 'Cirebon', 'ekonomi', 'AC'),
(8, 'PO HANDOYO', 'bisnis.jpg', '300000', 25, '2022-08-07', '10:00:00', 'Jakarta', 'Surabaya', 'Bisnis', 'AC 2-2;\r\nMakan;\r\nSelimut;\r\nBantal;\r\nToilet;'),
(9, 'PO HANDOYO', 'bisnis.jpg', '200000', 25, '2022-08-09', '22:00:00', 'Jakarta', 'Surabaya', 'Bisnis', 'AC 2-2;\r\nMakan;\r\nSelimut;\r\nBantal;\r\nToilet;\r\n'),
(10, 'PO HANDOYO', 'bisnis.jpg', '200000', 25, '2022-08-09', '08:00:00', 'Jakarta', 'Surabaya', 'Bisnis', 'AC 2-2;\r\nMakan;\r\nSelimut;\r\nBantal;\r\nToilet;'),
(11, 'MAJU MAKMUR', 'ekonomi.jpg', '30000', 30, '2022-08-09', '14:00:00', 'Semarang', 'Purwokerto', 'ekonomi', 'AC;'),
(12, 'PO Eka/Mira', 'patas.jpg', '150000', 18, '2022-08-06', '18:00:00', 'Temanggung', 'Surabaya', 'Patas', 'AC 2-2;\r\nMakan;\r\nToilet;');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `hp` varchar(15) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `jumlah_penumpang_lansia` int(11) NOT NULL,
  `harga_tiket` decimal(10,0) NOT NULL,
  `total_bayar` decimal(10,0) NOT NULL,
  `pemesan` varchar(50) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`hp`, `kelas`, `tanggal`, `jumlah_penumpang`, `jumlah_penumpang_lansia`, `harga_tiket`, `total_bayar`, `pemesan`, `nik`, `id`) VALUES
('  083821082460', '7', '2022-08-09', 1, 2, '70000', '196000', 'Naily Khairiya', '  33230745080100', 1),
(' 083821082222', '1', '2022-08-06', 3, 1, '30000', '117000', 'Sidrotul Munawaroh', ' 332307450801000', 2),
(' 083821082139', '5', '2022-08-07', 1, 8, '250000', '2050000', 'SURYA ABDILLAH', ' 332307450801001', 3),
(' 088821682139', '1', '2022-08-06', 2, 0, '30000', '60000', 'Rycahaya Sri Hutomo', ' 338307450001000', 4),
(' 082648082239', '1', '2022-08-17', 1, 0, '30000', '30000', 'Agnesfia Anggraeni', ' 332307235801028', 5),
(' 082673982482', '1', '2022-08-06', 1, 0, '30000', '30000', 'Lia Kharisma', '3313847592748304', 6),
(' 085284729472', '6', '2022-08-09', 3, 0, '200000', '600000', 'Sugiman', ' 332307150801830', 7),
('085975426806', '12', '2022-08-06', 7, 0, '150000', '1050000', 'Akyas David', '3323074863010749', 8),
('085284729472', '7', '2022-08-07', 1, 2, '70000', '196000', 'Zainil Mubarok', '3323074508010001', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
