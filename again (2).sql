-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 02:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `again`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(10, 'BR001', 12, 'kalung anak', 'xuping', '10000', '20000', 'Gram', '797', '26 July 2024, 12:01', NULL),
(13, 'BR002', 26, 'gelang koye', 'yaxiya', '10000', '20000', 'Gram', '896', '27 July 2024, 23:42', NULL),
(18, 'BR007', 33, 'Anting Jepit', 'Xuping', '10000', '20000', 'Gram', '516', '2 August 2024, 11:03', NULL),
(19, 'BR008', 33, 'Anting Bulat', 'Yaxiya', '10000', '20000', 'Gram', '243', '2 August 2024, 11:04', NULL),
(20, 'BR009', 33, 'Anting Jurai', 'Yaxiya', '10000', '20000', 'Gram', '610', '2 August 2024, 11:04', NULL),
(21, 'BR010', 33, 'Giwang', 'Yaxiya', '10000', '20000', 'Gram', '504', '2 August 2024, 11:04', NULL),
(24, 'BR011', 26, 'Gelang Kerincing', 'xuping', '10000', '20000', 'Gram', '124', '7 August 2024, 12:22', '12 August 2024, 5:41'),
(25, 'BR012', 37, 'Lionting Bunga', 'yaxiya', '10000', '20000', 'Gram', '101', '7 August 2024, 13:09', '7 August 2024, 13:16'),
(26, 'BR013', 37, 'Liontin Angsa', 'mely', '10000', '20000', 'Gram', '84', '7 August 2024, 13:13', '12 August 2024, 5:42'),
(28, 'BR014', 39, 'Cincin Mata', 'xuping', '10000', '20000', 'Gram', '676', '12 August 2024, 8:14', NULL),
(29, 'BR015', 25, 'Gelang Keroncong', 'xuping', '10000', '20000', 'Gram', '3066', '13 August 2024, 3:35', NULL),
(30, 'BR016', 26, 'Gelang polos', 'yaxiya', '10000', '20000', 'Gram', '206', '13 August 2024, 3:40', NULL),
(31, 'BR017', 33, 'Anting Juntai', 'mely', '10000', '20000', 'Gram', '5600', '13 August 2024, 3:40', NULL),
(32, 'BR018', 34, 'Gelang rantai polos', 'mely', '10000', '20000', 'Gram', '6890', '13 August 2024, 3:41', NULL),
(33, 'BR019', 38, 'Kalung bunga', 'mely', '10000', '20000', 'Gram', '861', '13 August 2024, 3:42', NULL),
(34, 'BR020', 38, 'Kalung rupiah', 'xuping', '10000', '20000', 'Gram', '2880', '13 August 2024, 3:42', NULL),
(35, 'BR021', 25, 'Gelang koin', 'yaxiya', '10000', '20000', 'Gram', '7897', '13 August 2024, 3:43', NULL),
(36, 'BR022', 45, 'Cincin mata satu', 'xuping', '10000', '20000', 'Gram', '10938', '13 August 2024, 3:43', NULL),
(37, 'BR023', 45, 'Cincin rupiah', 'yaxiya', '10000', '20000', 'Gram', '20989', '13 August 2024, 3:44', NULL),
(38, 'BR024', 45, 'Cincin berlian putih', 'mely', '10000', '20000', 'Gram', '23', '13 August 2024, 3:44', '21 August 2024, 6:54'),
(39, 'BR025', 36, 'Cincin berlian merah', 'xuping', '10000', '20000', 'Gram', '8193', '13 August 2024, 3:45', NULL),
(40, 'BR026', 36, 'Cincin Berlian Hijau', 'xuping', '10000', '20000', 'Gram', '90', '13 August 2024, 3:45', '21 August 2024, 6:51');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(255) NOT NULL,
  `nama_karyawan` text NOT NULL,
  `level` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_karyawan`, `nama_karyawan`, `level`, `alamat`, `no_hp`) VALUES
(1, 'KR001', 'Angelique', 'Kasir', 'Jl Sisingamangaraja', '08163677'),
(2, 'KR002', 'Siti Aisyah', 'Admin', 'Jl. maniseeh', '019048497'),
(3, 'KR003', 'Nurul Irma', 'Admin', 'Jl. maniseeh', '019048497'),
(4, 'KR004', 'Angeliiii', 'Admin', 'jl rowosari', '098655'),
(5, 'KR005', 'dhajk', 'Admin', 'ajhjh', '9010990');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(12, 'Kalung Anak-Anak', '22 July 2024, 16:27'),
(25, 'Gelang Dewasa', '27 July 2024, 17:42'),
(26, 'Gelang Anak', '27 July 2024, 17:43'),
(33, 'Anting-Anting', '1 August 2024, 22:36'),
(34, 'Gelang Kaki ', '1 August 2024, 22:36'),
(35, 'Cincin Anak', '1 August 2024, 22:36'),
(36, 'Cincin Dewasa', '1 August 2024, 22:36'),
(37, 'Liontin', '1 August 2024, 22:37'),
(38, 'Kalung Silver', '1 August 2024, 22:37'),
(39, 'Cincin Silver', '1 August 2024, 22:37'),
(40, 'Gelang Silver', '1 August 2024, 22:37'),
(41, 'Liontin Silver', '1 August 2024, 22:37'),
(43, 'gelang kaki silver', '7 August 2024, 14:49'),
(45, 'Cincin Silver', '7 August 2024, 14:58');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_stok`
--

CREATE TABLE `konfigurasi_stok` (
  `id` int(11) NOT NULL,
  `minimal_stok` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi_stok`
--

INSERT INTO `konfigurasi_stok` (`id`, `minimal_stok`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(5, 'admin', '202cb962ac59075b964b07152d234b70', 2),
(9, 'admin', '35862fcf105f1aaa0b4f29ca71b96236', 11),
(11, 'kasir', 'd645710ed9e8cfacb6e25d480ea8ccea', 13),
(12, 'owner', 'f4f068e71e0d87bf0ad51e6214ab84e9', 14);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text DEFAULT NULL,
  `NIK` text DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`, `level`) VALUES
(1, 'Siti Aisyah', 'Jalan harapan', '111', '', '66b3254c107cd.png', '', 'Admin'),
(2, 'Putri', 'Jl Garusa Sakti', '08430834', '', '66b3257343844.jpg', NULL, 'Kasir'),
(11, 'dila', 'Jl Kenanga no 9', '77777', '', 'ttd angel.jpg', NULL, 'Admin'),
(13, 'Mery', 'Jl Sumut', '092768', '', 'WhatsApp Image 2024-01-20 at 17.49.15_616a0592.jpg', NULL, 'Kasir'),
(14, 'angel', 'jl dhh', '00999', '', 'WhatsApp Image 2024-01-20 at 17.49.15_fa80728f.jpg', NULL, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(20, 'BR001', 1, '1', '20000', '18 July 2024, 21:25', '07-2024'),
(21, 'BR001', 1, '1', '20000', '18 July 2024, 21:26', '07-2024'),
(22, 'BR001', 1, '1', '20000', '18 July 2024, 21:27', '07-2024'),
(23, 'BR001', 1, '3', '60000', '18 July 2024, 23:22', '07-2024'),
(24, 'BR001', 1, '3', '60000', '22 July 2024, 0:56', '07-2024'),
(25, 'BR001', 1, '2', '40000', '26 July 2024, 12:02', '07-2024'),
(26, 'BR002', 1, '5', '100000', '27 July 2024, 17:16', '07-2024'),
(27, 'BR001', 1, '1', '20000', '27 July 2024, 17:48', '07-2024'),
(28, 'BR003', 1, '1', '20000', '27 July 2024, 18:13', '07-2024'),
(29, 'BR001', 1, '2', '40000', '27 July 2024, 18:14', '07-2024'),
(30, 'BR002', 1, '3', '60000', '27 July 2024, 18:15', '07-2024'),
(31, 'BR002', 1, '3', '60000', '27 July 2024, 18:15', '07-2024'),
(32, 'BR001', 1, '1', '20000', '27 July 2024, 18:22', '07-2024'),
(33, 'BR001', 1, '1', '20000', '27 July 2024, 18:22', '07-2024'),
(34, 'BR002', 1, '2', '40000', '27 July 2024, 23:48', '07-2024'),
(35, 'BR002', 1, '2', '40000', '27 July 2024, 23:48', '07-2024'),
(36, 'BR001', 1, '2', '40000', '28 July 2024, 2:26', '07-2024'),
(37, 'BR001', 1, '2', '40000', '28 July 2024, 2:26', '07-2024'),
(38, 'BR002', 1, '1', '20000', '28 July 2024, 2:40', '07-2024'),
(39, 'BR001', 1, '2', '40000', '28 July 2024, 2:26', '07-2024'),
(40, 'BR002', 1, '1', '20000', '28 July 2024, 2:40', '07-2024'),
(41, 'BR002', 1, '2', '40000', '28 July 2024, 2:53', '07-2024'),
(42, 'BR002', 1, '1', '20000', '28 July 2024, 2:53', '07-2024'),
(43, 'BR002', 1, '2', '40000', '28 July 2024, 2:53', '07-2024'),
(44, 'BR002', 1, '1', '20000', '28 July 2024, 2:53', '07-2024'),
(45, 'BR002', 1, '1', '20000', '28 July 2024, 2:53', '07-2024'),
(46, 'BR001', 1, '1', '20000', '28 July 2024, 3:08', '07-2024'),
(47, 'BR001', 1, '3', '60000', '28 July 2024, 3:08', '07-2024'),
(48, 'BR001', 1, '1', '20000', '28 July 2024, 3:08', '07-2024'),
(49, 'BR003', 1, '1', '20000', '28 July 2024, 20:08', '07-2024'),
(50, 'BR003', 1, '1', '20000', '28 July 2024, 20:14', '07-2024'),
(51, 'BR003', 1, '1', '20000', '28 July 2024, 20:14', '07-2024'),
(52, 'BR002', 1, '1', '20000', '28 July 2024, 20:14', '07-2024'),
(53, 'BR003', 1, '1', '20000', '28 July 2024, 20:17', '07-2024'),
(54, 'BR001', 1, '1', '20000', '28 July 2024, 20:25', '07-2024'),
(55, 'BR001', 1, '2', '40000', '28 July 2024, 20:25', '07-2024'),
(56, 'BR003', 1, '1', '20000', '28 July 2024, 20:57', '07-2024'),
(57, 'BR003', 1, '1', '20000', '28 July 2024, 20:57', '07-2024'),
(58, 'BR001', 1, '2', '40000', '30 July 2024, 8:38', '07-2024'),
(59, 'BR003', 1, '1', '20000', '28 July 2024, 20:57', '07-2024'),
(60, 'BR001', 1, '2', '40000', '30 July 2024, 8:38', '07-2024'),
(61, 'BR002', 1, '1', '20000', '30 July 2024, 8:58', '07-2024'),
(62, 'BR003', 1, '1', '20000', '28 July 2024, 20:57', '07-2024'),
(63, 'BR001', 1, '3', '60000', '30 July 2024, 8:38', '07-2024'),
(64, 'BR002', 1, '1', '20000', '30 July 2024, 8:58', '07-2024'),
(65, 'BR001', 1, '1', '20000', '2 August 2024, 11:00', '08-2024'),
(66, 'BR001', 1, '2', '40000', '2 August 2024, 11:00', '08-2024'),
(67, 'BR011', 1, '1', '20000', '2 August 2024, 15:04', '08-2024'),
(68, 'BR001', 1, '2', '40000', '2 August 2024, 11:00', '08-2024'),
(69, 'BR011', 1, '2', '40000', '2 August 2024, 15:04', '08-2024'),
(70, 'BR001', 1, '2', '40000', '2 August 2024, 11:00', '08-2024'),
(71, 'BR001', 1, '1', '20000', '7 August 2024, 12:06', '08-2024'),
(72, 'BR001', 1, '4', '80000', '7 August 2024, 12:06', '08-2024'),
(73, 'BR013', 1, '18', '360000', '7 August 2024, 15:19', '08-2024'),
(74, 'BR013', 1, '18', '360000', '7 August 2024, 15:19', '08-2024'),
(75, 'BR001', 1, '1', '20000', '7 August 2024, 15:24', '08-2024'),
(76, 'BR013', 1, '2', '40000', '8 August 2024, 5:24', '08-2024'),
(77, 'BR013', 1, '3', '60000', '8 August 2024, 5:24', '08-2024'),
(78, 'BR013', 1, '1', '20000', '8 August 2024, 5:24', '08-2024'),
(79, 'BR013', 1, '2', '40000', '8 August 2024, 5:24', '08-2024'),
(80, 'BR013', 1, '6', '120000', '8 August 2024, 5:24', '08-2024'),
(81, 'BR013', 1, '1', '20000', '8 August 2024, 5:24', '08-2024'),
(82, 'BR013', 1, '1', '20000', '8 August 2024, 5:38', '08-2024'),
(83, 'BR013', 1, '2', '40000', '8 August 2024, 5:43', '08-2024'),
(84, 'BR013', 1, '1', '20000', '8 August 2024, 5:51', '08-2024'),
(85, 'BR013', 1, '1', '10000.00', '2024-08-08 06:02:29', '08-2024'),
(86, 'BR013', 1, '4', '40000.00', '2024-08-08 06:04:36', '08-2024'),
(87, 'BR001', 1, '1', '20000', '10 August 2024, 0:26', '08-2024'),
(88, 'BR001', 1, '1', '20000', '10 August 2024, 0:26', '08-2024'),
(89, 'BR012', 1, '1', '20000', '10 August 2024, 20:29', '08-2024'),
(90, 'BR001', 1, '1', '20000', '10 August 2024, 0:26', '08-2024'),
(91, 'BR012', 1, '1', '20000', '10 August 2024, 20:29', '08-2024'),
(92, 'BR001', 1, '1', '20000', '11 August 2024, 4:12', '08-2024'),
(93, 'BR012', 1, '7', '140000', '11 August 2024, 4:13', '08-2024'),
(94, 'BR012', 1, '1', '20000', '11 August 2024, 4:17', '08-2024'),
(95, 'BR013', 1, '4', '80000', '11 August 2024, 17:31', '08-2024'),
(96, 'BR026', 1, '8', '160000', '13 August 2024, 3:47', '08-2024'),
(97, 'BR026', 13, '2', '40000', '16 August 2024, 7:50', '08-2024'),
(98, 'BR001', 13, '5', '100000', '16 August 2024, 7:52', '08-2024'),
(99, 'BR010', 13, '1', '20000', '16 August 2024, 8:01', '08-2024'),
(100, 'BR025', 13, '8', '160000', '19 August 2024, 2:29', '08-2024'),
(101, 'BR014', 13, '1', '20000', '19 August 2024, 2:30', '08-2024'),
(102, 'BR014', 13, '1', '20000', '19 August 2024, 2:30', '08-2024'),
(103, 'BR001', 13, '5', '100000', '19 August 2024, 2:40', '08-2024'),
(104, 'BR001', 13, '5', '100000', '19 August 2024, 2:40', '08-2024'),
(105, 'BR010', 13, '9', '180000', '19 August 2024, 2:52', '08-2024');

-- --------------------------------------------------------

--
-- Table structure for table `nota_beli`
--

CREATE TABLE `nota_beli` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_input` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `periode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_beli`
--

INSERT INTO `nota_beli` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(8, 'BR013', 1, '1', '10000', '12 July 2024, 1:16', '07-2024'),
(9, 'BR005', 1, '2', '20000', '12 August 2024, 1:29', '08-2024'),
(10, 'BR007', 1, '5', '50000', '20 July 2024, 1:31', '07-2024'),
(11, 'BR007', 1, '1', '10000', '12 August 2024, 3:56', '08-2024'),
(12, 'BR015', 1, '20', '200000', '13 August 2024, 3:36', '08-2024'),
(13, 'BR026', 1, '5', '50000', '13 August 2024, 3:47', '08-2024'),
(14, 'BR026', 1, '5', '50000', '13 August 2024, 3:47', '08-2024'),
(15, 'BR015', 1, '13', '130000', '13 August 2024, 3:53', '08-2024'),
(16, 'BR021', 1, '5', '50000', '23 July 2024, 3:54', '07-2024'),
(17, 'BR023', 1, '1', '10000', '13 August 2024, 3:54', '08-2024'),
(18, 'BR024', 1, '17', '170000', '13 August 2024, 3:54', '08-2024'),
(19, 'BR015', 1, '1', '10000', '13 August 2024, 3:55', '08-2024'),
(20, 'BR026', 1, '10', '100000', '13 August 2024, 3:55', '08-2024'),
(21, 'BR007', 1, '1', '10000', '06 August 2024, 3:56', '08-2024'),
(22, 'BR008', 11, '1', '10000', '13 August 2024, 3:57', '08-2024'),
(23, 'BR009', 11, '8', '80000', '13 August 2024, 3:58', '08-2024'),
(24, 'BR019', 11, '1', '10000', '18 July 2024, 3:58', '07-2024'),
(25, 'BR010', 13, '2', '20000', '16 August 2024, 8:12', '08-2024');

-- --------------------------------------------------------

--
-- Table structure for table `nota_stok`
--

CREATE TABLE `nota_stok` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `periode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_stok`
--

INSERT INTO `nota_stok` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(6, 'BR001', 11, '1', '10000.00', '2024-07-12 00:00:00', '07-2024'),
(7, 'BR012', 11, '10', '100000.00', '2024-08-02 00:00:00', '08-2024'),
(8, 'BR010', 11, '80', '800000.00', '2024-08-03 04:49:40', '08-2024'),
(9, 'BR001', 1, '1', '10000.00', '2024-07-11 04:50:10', '07-2024'),
(10, 'BR001', 1, '3', '30000.00', '2024-08-08 04:51:17', '08-2024'),
(16, 'BR010', 1, '1', '10000.00', '2024-07-19 04:51:04', '07-2024'),
(18, 'BR012', 1, '1', '10000', '2024-08-12 01:17:11', '08-2024'),
(27, 'BR026', 1, '5', '50000', '2024-07-16 04:51:32', '07-2024'),
(28, 'BR019', 11, '80', '800000', '2024-08-11 04:51:53', '08-2024'),
(29, 'BR007', 11, '200', '2000000', '2024-07-10 04:52:11', '07-2024'),
(30, 'BR017', 11, '500', '5000000', '2024-08-06 04:52:22', '08-2024'),
(31, 'BR010', 11, '9', '90000', '2024-08-08 04:52:36', '08-2024'),
(36, 'BR017', 1, '1', '10000', '2024-08-15 22:11:36', '08-2024'),
(37, 'BR017', 1, '1', '10000', '2024-08-15 22:11:36', '08-2024'),
(38, 'BR010', 1, '5', '50000', '2024-08-15 22:14:30', '08-2024'),
(39, 'BR025', 1, '10', '100000', '2024-08-15 22:15:17', '08-2024'),
(40, 'BR007', 1, '8', '80000', '2024-08-15 22:15:46', '08-2024'),
(41, 'BR025', 1, '1', '10000', '2024-08-15 22:15:54', '08-2024');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` text NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(255) NOT NULL,
  `kesukaan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `kesukaan`) VALUES
(1, 'PL001', 'Nita Alawiyah', 'jalan sisingamangaraja', '64198989', 'Warna gold dan simple (tidak banyak permata dan bentuk)'),
(2, 'PL002', 'Mila Sari', 'Jl Kenanga no 9', '213678599', 'Warna Silver motif bunga'),
(6, 'PL003', 'Mirnaaa', 'Jl rowosari No 2', '018378', 'Gelang Gold'),
(7, 'PL004', 'Nada Marlinai', 'Jl Srikandi', '097777', 'Cincin silver mata satu'),
(8, 'PL005', 'Ardelia Suryani', 'Jl Kamboja', '03778889', 'Gelang rantai dan keroncong'),
(9, 'PL006', 'Irna wardiana', 'Jl Sumatera no 7', '0367188', 'Cincin mata satu'),
(10, 'PL007', 'Gladys Olivia', 'Jl Berdikari', '09377844', 'Koye dewasa dan cincin rotan'),
(11, 'PL008', 'Geby Pane', 'Jl Harapan Raya', '029888', '-'),
(12, 'PL009', 'Maranatha', 'Jl Durian', '0918747', 'cincin rotan dan cincin berlian'),
(13, 'PL010', 'Nadia ', 'Jl Kamboja', '0910707', 'Gelang rantai dan keroncong'),
(15, 'PL011', 'Gisella Anatasya', 'Jl Durian Runtuh no 76', '09278329817', 'Gelang keroncong'),
(16, 'PL012', 'Mei', 'Jl pembangunan', '0273881648', 'Liontin kecil mata satu'),
(17, 'PL013', 'Evelyn Cedore', 'Jl Serta mulia', '0173783991', 'Kalung koye permata'),
(18, 'PL014', 'Nindya', 'Jl Indonesia Merdeka', '0919837687', 'Gelang rantai kecil'),
(19, 'PL015', 'lyly', 'Jl Kamboja', '0194481940', 'Warna Silver motif bunga'),
(20, 'PL016', 'Sandy', 'Jl Harapan Raya', '091749146', 'Cincin rotan emas');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelianstok`
--

CREATE TABLE `pembelianstok` (
  `id_pembelianstok` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelianstok`
--

INSERT INTO `pembelianstok` (`id_pembelianstok`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `id_supplier`) VALUES
(40, 'BR007', 1, '8', '80000', '2024-08-15 22:15:46', 0),
(41, 'BR025', 1, '1', '10000', '2024-08-15 22:15:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `id_supplier` varchar(255) NOT NULL,
  `nama_supplier` text NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `id_supplier`, `nama_supplier`, `alamat`, `no_hp`) VALUES
(2, 'SP002', 'dina', 'Cina', '2000025'),
(3, 'SP003', 'Melani', 'Cina', '9817409'),
(4, 'SP004', 'siti', 'Malaysia', '5266'),
(7, 'SP005', 'Rio', 'Rohiiil', '000000001');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'Toko Diamond Jewellery', 'Jl. Iskandar Muda No. 15 Pajak Gambir, Tebing Tinggi, Sumatera Utara', '089618173609', 'Siti Aisyah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi_stok`
--
ALTER TABLE `konfigurasi_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `nota_beli`
--
ALTER TABLE `nota_beli`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `nota_stok`
--
ALTER TABLE `nota_stok`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelianstok`
--
ALTER TABLE `pembelianstok`
  ADD PRIMARY KEY (`id_pembelianstok`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `konfigurasi_stok`
--
ALTER TABLE `konfigurasi_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `nota_beli`
--
ALTER TABLE `nota_beli`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nota_stok`
--
ALTER TABLE `nota_stok`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pembelianstok`
--
ALTER TABLE `pembelianstok`
  MODIFY `id_pembelianstok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
