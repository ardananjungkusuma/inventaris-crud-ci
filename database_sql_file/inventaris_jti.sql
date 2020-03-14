-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 03:09 PM
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
(1, 'Keyboard', 'Logitech', 23),
(3, 'Access Point', 'TP-Link', 48),
(4, 'Printer', 'Canon 201', 50),
(5, 'Mouse', 'Votre', 119),
(6, 'Projector', 'BenQ', 51),
(8, 'Keyboard', 'Votre', 120),
(10, 'Mouse', 'Acer', 48),
(11, 'Kabel LAN 5 M', 'Belden', 20),
(12, 'Obeng', 'None', 29),
(13, 'Mikrotik', 'RB750', 29),
(14, 'Headphone', 'Votre', 50);

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
(9, 'Silvi Indah Novita', '1841720012', '628512358969', 'Jl. Benowo 12 Malang'),
(10, 'Irfan Rafif', '1841720069', '085123587123', 'Jl. Mawar 15 Malang');

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
(6, 4, 1, '2020-02-27', '2020-02-28', '2020-03-01', 'Dikembalikan Terlambat'),
(7, 6, 6, '2020-02-27', '2020-02-28', 'None', 'Belum Dikembalikan'),
(8, 1, 5, '2020-02-27', '2020-02-28', 'None', 'Belum Dikembalikan'),
(9, 6, 4, '2020-03-02', '2020-03-03', '2020-03-03', 'Sudah Dikembalikan'),
(10, 10, 10, '2020-03-04', '2020-03-05', 'None', 'Belum Dikembalikan'),
(11, 10, 10, '2020-03-14', '2020-03-15', 'None', 'Belum Dikembalikan'),
(12, 9, 13, '2020-03-14', '2020-03-15', 'None', 'Belum Dikembalikan'),
(13, 1, 12, '2020-03-14', '2020-03-15', 'None', 'Belum Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `level`, `status`) VALUES
(1, 'Administrator 1', 'admin', 'admin.ardan@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 'Aktif'),
(2, 'Sugeng Prastiyo', 'sugengprastiyo', 'sugengprastiyo@gmail.com', '6c62460ad1e6a9a106a8debb80e2f07e', 'admin', 'Aktif'),
(3, 'Livia Yurike', 'livia', 'livia@gmail.com', '3fb4b2291f7bf8c4835b8a11f1cf199f', 'user', 'Aktif'),
(4, 'Putranda Bagus C.L', 'putranda', 'putranda@gmail.com', 'c5d6f92171f09fdd81984453930ec018', 'user', 'Aktif'),
(5, 'Dina Risky Alin Saputri', 'dinarisky', 'dinarisky04@gmail.com', 'f093c0fed979519fbc43d772b76f5c86', 'user', 'Aktif'),
(6, 'Riza Zulfahnur', 'riza', 'rizazull@gmail.com', '41a44352a6f3cd3b45282acbce50927c', 'user', 'Aktif'),
(7, 'Denny Nur Ramadhan', 'dennynur', 'dennynur@gmail.com', '7ad51e4d05511768c2224e7a80c0092f', 'user', 'Aktif'),
(8, 'Ardan Anjung Kusuma', 'ardan', 'ardananjungkusuma@gmail.com', 'd2219d75098abd01493908d2f7f4d13d', 'user', 'Aktif'),
(11, 'Agit Ari', 'agit', 'agitari@gmail.com', 'a505c964caa2a7a9f158378df55462f9', 'kalab', 'Aktif'),
(12, 'Mashabi Arya', 'mashabi', 'mashabi12@gmail.com', '57937930d29d3913ac3929d4204657ee', 'kalab', 'Aktif');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi_inventaris`
--
ALTER TABLE `transaksi_inventaris`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
