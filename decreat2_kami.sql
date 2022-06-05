-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2022 at 07:26 PM
-- Server version: 10.3.34-MariaDB-log-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `decreat2_kami`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `HPP` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `HPP`, `harga_barang`) VALUES
(1, 'Arsip Kantor', 3000, 5000),
(2, 'Kardus', 3000, 5000),
(3, 'HVS Bekas', 3000, 5000),
(4, 'Buku/Majalah', 3000, 5000),
(5, 'Botol Kaca', 3000, 5000),
(6, 'Botol Plastik', 3000, 5000),
(7, 'Kaleng', 3000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `img` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id_blog`, `judul`, `isi`, `img`, `created_at`) VALUES
(1, 'Buang atau Beruang?', 'Botol plastik yang sudah tidak ada isinya bisa jadi uang lhoh! Ingin tahu caranya?', 'assets/images/artikel/s1.jpg', '2022-03-26 10:13:55'),
(2, 'Stop Buang Popok Bayi', 'Ternyata popok bayi yang sudah terpakai bisa menghasilkan uang. Yuk simak pembahasannya!', 'assets/images/artikel/s2.jpg', '2022-03-26 10:13:55'),
(3, 'Daur Ulang Sampah', 'Daur ulang atau recycle adalah proses pembuatan barang bekas menjadi bahan baru.', 'assets/images/artikel/s3.jpg', '2022-03-26 10:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `kode_otp`
--

CREATE TABLE `kode_otp` (
  `id_kodeotp` int(11) NOT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `notelp_user` varchar(50) DEFAULT NULL,
  `kodeotp` varchar(10) NOT NULL,
  `active` char(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kode_otp`
--

INSERT INTO `kode_otp` (`id_kodeotp`, `email_user`, `notelp_user`, `kodeotp`, `active`, `created_at`, `expired`) VALUES
(1, 'annisasukmaputri@gmail.com', NULL, '4684', 'N', '2022-04-24 07:10:49', '0000-00-00 00:00:00'),
(86, 'nezastsanjaya1@gmail.com', NULL, '7754', 'Y', '2022-05-28 13:18:43', '0000-00-00 00:00:00'),
(87, 'ceamey@yahoo.co.id', NULL, '7781', 'N', '2022-05-30 18:28:09', '0000-00-00 00:00:00'),
(88, 'dc.decreative@gmail.com', NULL, '9653', 'N', '2022-05-30 20:58:44', '0000-00-00 00:00:00'),
(97, 'jatmiko@mail.com', NULL, '6125', 'Y', '2022-06-05 17:08:59', '0000-00-00 00:00:00'),
(98, 'nezastsanjaya.bisnis@gmail.com', NULL, '1481', 'N', '2022-06-05 18:40:23', '0000-00-00 00:00:00'),
(99, 'nezastsanjaya@gmail.com', NULL, '9579', 'N', '2022-06-05 19:11:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `level_users`
--

CREATE TABLE `level_users` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_users`
--

INSERT INTO `level_users` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'mitra'),
(3, 'pemasok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_api_accurate`
--

CREATE TABLE `tb_api_accurate` (
  `id` bigint(45) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `token_type` varchar(255) NOT NULL,
  `refresh_token` varchar(255) NOT NULL,
  `expires_in` int(45) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `referrer` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_api_accurate`
--

INSERT INTO `tb_api_accurate` (`id`, `access_token`, `token_type`, `refresh_token`, `expires_in`, `scope`, `referrer`, `name`, `email`) VALUES
(2, '', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_database_response_api`
--

CREATE TABLE `tb_database_response_api` (
  `access_token` varchar(255) NOT NULL,
  `dataVersion` varchar(255) NOT NULL,
  `licenseEnd` varchar(255) NOT NULL,
  `session_db` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `accessibleUntil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_database_response_api`
--

INSERT INTO `tb_database_response_api` (`access_token`, `dataVersion`, `licenseEnd`, `session_db`, `host`, `accessibleUntil`) VALUES
('', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `id` int(11) NOT NULL,
  `no_invoice` int(11) NOT NULL,
  `pemasok_id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `berat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `no_invoice` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `pemasok_id` int(11) NOT NULL,
  `total_berat` int(11) DEFAULT NULL,
  `harga` int(225) DEFAULT NULL,
  `alamat` text NOT NULL,
  `koordinat` text DEFAULT NULL,
  `tgl_transaksi` varchar(50) NOT NULL,
  `date_grafik` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(50) DEFAULT NULL,
  `userlevelid` int(1) NOT NULL DEFAULT 3,
  `active` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_activity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `avatar`, `nama_lengkap`, `alamat`, `notelp`, `userlevelid`, `active`, `created_at`, `updated_at`, `last_activity`) VALUES
(1, 'annisasukmaputri@gmail.com', NULL, 'Annisa Sukma Putri', '', '085735020915', 1, '1', '2022-04-24 07:10:48', '2022-04-24 07:10:48', '2022-06-05 18:45:25'),
(46, 'nezastsanjaya1@gmail.com', NULL, 'Agung Dwi Sahputra', '', '082110860615', 3, '1', '2022-05-28 13:18:43', '2022-05-28 13:18:43', '2022-06-05 17:13:50'),
(47, 'ceamey@yahoo.co.id', NULL, 'Kaza Devita Sari', '', '085732100010', 3, '1', '2022-05-30 18:28:09', '2022-05-30 18:28:09', NULL),
(48, 'dc.decreative@gmail.com', NULL, 'dehendrik', '', '08989787733', 2, '1', '2022-05-30 20:58:44', '2022-05-30 20:58:44', '2022-06-05 19:13:08'),
(50, 'dehendrik00@gmail.com', NULL, 'hendrik', '', '082347889998', 3, '1', '2022-06-01 01:50:57', '2022-06-01 01:50:57', NULL),
(56, 'jatmiko@mail.com', NULL, 'Jatmiko', '', '085741003753', 3, '0', '2022-06-05 17:29:18', '2022-06-05 17:29:18', NULL),
(57, 'nezastsanjaya.bisnis@gmail.com', NULL, 'Agung Dwi Sahputra', '', '082110860666', 3, '1', '2022-06-05 18:40:23', '2022-06-05 18:40:23', NULL),
(58, 'nezastsanjaya@gmail.com', NULL, 'Agung Dwi Sahputra', '', '082110860625', 3, '1', '2022-06-05 19:11:37', '2022-06-05 19:11:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `kode_otp`
--
ALTER TABLE `kode_otp`
  ADD PRIMARY KEY (`id_kodeotp`),
  ADD KEY `kode_otp_email_user_foreign` (`email_user`),
  ADD KEY `kode_otp_notelp_user_foreign` (`notelp_user`);

--
-- Indexes for table `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `nama_level` (`nama_level`);

--
-- Indexes for table `tb_api_accurate`
--
ALTER TABLE `tb_api_accurate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`no_invoice`),
  ADD KEY `ID USER` (`mitra_id`),
  ADD KEY `Id_pemasok` (`pemasok_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `notelp` (`notelp`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_userlevelid_foreign` (`userlevelid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kode_otp`
--
ALTER TABLE `kode_otp`
  MODIFY `id_kodeotp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_api_accurate`
--
ALTER TABLE `tb_api_accurate`
  MODIFY `id` bigint(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kode_otp`
--
ALTER TABLE `kode_otp`
  ADD CONSTRAINT `kode_otp_email_user_foreign` FOREIGN KEY (`email_user`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `kode_otp_notelp_user_foreign` FOREIGN KEY (`notelp_user`) REFERENCES `users` (`notelp`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_userlevelid_foreign` FOREIGN KEY (`userlevelid`) REFERENCES `level_users` (`id_level`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
