-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 05:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_escmcabe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(5) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `username`, `password`, `status`, `level`) VALUES
(1, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Aktif', 'Manager'),
(2, 'adminproduksi', '0192023a7bbd73250516f069df18b500', 'Aktif', 'Admin Produksi'),
(3, 'admindistribusi', '0192023a7bbd73250516f069df18b500', 'Aktif', 'Admin Distribusi'),
(4, 'supplier', '49375313ae9e075247b1dada362090c5', 'Aktif', 'Supplier'),
(5, 'pasar', '0b4f7c4bc08d792c683d497fb2412e2d', 'Aktif', 'Pasar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
