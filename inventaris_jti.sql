-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 12:50 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_jti`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `merk` varchar(250) NOT NULL,
  `jumlah_barang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `merk`, `jumlah_barang`) VALUES
(1, 'Keyboard', 'Logitech', 22),
(3, 'Access Point', 'TP-Link', 48),
(4, 'Printer', 'Canon 201', 50),
(5, 'Mouse', 'Votre', 119),
(6, 'Projector', 'BenQ', 51),
(8, 'Keyboard', 'Votre', 120);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `nim`, `no_hp`, `alamat`) VALUES
(1, 'Ardan Anjung Kusuma', '1841720041', '6285258967800', 'Jl. Sersan Kusman No 27 Bojonegoro\r\n'),
(2, 'Sugeng Prastiyo', '1841720069', '6285213287256', 'Jl. Grogol 21 Blitar'),
(3, 'Martin Amanu Khusna', '1841720081', '62823512378521', 'Jl. Trucukan 12 Magelang'),
(4, 'Hunayn Risatayn', '1841720061', '628528123872', 'Sidoarjo\r\n'),
(6, 'Agit Ari Irawan', '1841720110', '6285812383', 'Jl. Sukun 15 Malang'),
(7, 'Osa Mahanani', '1841720061', '62857123857', 'Jl. Timor 12 Blitar'),
(9, 'Silvi Indah Novita', '1841720012', '628512358969', 'Jl. Benowo 12 Malang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_inventaris`
--

CREATE TABLE `transaksi_inventaris` (
  `id_transaksi` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL,
  `tanggal_dikembalikan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_inventaris`
--

INSERT INTO `transaksi_inventaris` (`id_transaksi`, `id_mahasiswa`, `id_barang`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`, `status`) VALUES
(1, 1, 1, '2020-02-26', '2020-02-27', '2020-02-27', 'Sudah Dikembalikan'),
(3, 3, 3, '2020-02-26', '2020-02-27', '2020-02-27', 'Sudah Dikembalikan'),
(5, 7, 8, '2020-02-27', '2020-02-28', '2020-02-29', 'Dikembalikan Terlambat'),
(6, 4, 1, '2020-02-27', '2020-02-28', 'None', 'Belum Dikembalikan'),
(7, 6, 6, '2020-02-27', '2020-02-28', 'None', 'Belum Dikembalikan'),
(8, 1, 5, '2020-02-27', '2020-02-28', 'None', 'Belum Dikembalikan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `transaksi_inventaris`
--
ALTER TABLE `transaksi_inventaris`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi_inventaris`
--
ALTER TABLE `transaksi_inventaris`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_inventaris`
--
ALTER TABLE `transaksi_inventaris`
  ADD CONSTRAINT `transaksi_inventaris_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_inventaris_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
