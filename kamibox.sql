-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2022 pada 13.22
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamibox`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `HPP` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
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
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `judul`, `isi`, `created_at`) VALUES
(1, 'Buang atau Beruang?', 'Botol plastik yang sudah tidak ada isinya bisa jadi uang lhoh! Ingin tahu caranya?', '2022-03-26 10:13:55'),
(2, 'Stop Buang Popok Bayi', 'Ternyata popok bayi yang sudah terpakai bisa menghasilkan uang. Yuk simak pembahasannya!', '2022-03-26 10:13:55'),
(3, 'Daur Ulang Sampah', 'Daur ulang atau recycle adalah proses pembuatan barang bekas menjadi bahan baru.', '2022-03-26 10:13:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `no` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoice`
--

CREATE TABLE `detail_invoice` (
  `id` int(11) NOT NULL,
  `no_invoice` int(11) DEFAULT NULL,
  `subtotal` int(50) DEFAULT NULL,
  `bonus` int(50) DEFAULT NULL,
  `pajak` int(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `pajak_include` int(50) DEFAULT NULL,
  `lunas` int(50) DEFAULT NULL,
  `jumlah_tagihan` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_data`
--

CREATE TABLE `input_data` (
  `id_data` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `pemasok_id` int(11) NOT NULL,
  `tgl_beli` date DEFAULT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `input_data`
--

INSERT INTO `input_data` (`id_data`, `mitra_id`, `pemasok_id`, `tgl_beli`, `nama`, `alamat`, `notelp`, `email`, `time`) VALUES
(47, 1, 48, '2022-05-27', '', '', '', '', '2022-05-27 10:23:41'),
(48, 1, 48, '2022-05-27', '', '', '', '', '2022-05-27 11:14:22'),
(49, 1, 48, '2022-05-27', '', '', '', '', '2022-05-27 11:26:22'),
(50, 1, 48, '2022-05-27', '', '', '', '', '2022-05-27 12:33:25'),
(51, 1, 48, '2022-05-27', '', '', '', '', '2022-05-27 12:49:47'),
(52, 1, 48, '2022-05-28', '', '', '', '', '2022-05-27 22:22:36'),
(53, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 02:18:43'),
(54, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 03:57:49'),
(55, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 04:30:56'),
(56, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 04:37:20'),
(57, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 05:21:01'),
(58, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 06:32:04'),
(59, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 06:40:23'),
(60, 1, 48, '2022-05-28', '', '', '', '', '2022-05-28 07:07:49'),
(61, 1, 48, '2022-05-28', 'Annisa Sukma Putri', 'jl raya dringu', '085732100010', 'ceamey@yahoo.co.id', '2022-05-28 09:41:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_item`
--

CREATE TABLE `input_item` (
  `id_input_item` int(11) NOT NULL,
  `id_input_data` int(11) DEFAULT NULL,
  `barang` int(11) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `input_item`
--

INSERT INTO `input_item` (`id_input_item`, `id_input_data`, `barang`, `berat`) VALUES
(32, 48, 2, 0),
(33, 48, 2, 0),
(34, 49, 1, 0),
(35, 49, 1, 0),
(36, 50, 3, 0),
(37, 51, 1, 10),
(38, 51, 2, 20),
(39, 51, 3, 30),
(40, 51, 1, 40),
(41, 52, 5, 0),
(44, 55, 2, 0),
(45, 56, 2, 0),
(46, 57, 4, 0),
(47, 58, 2, 0),
(48, 59, 4, 0),
(49, 60, 3, 0),
(50, 60, 6, 0),
(51, 61, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_total_berat_barang`
--

CREATE TABLE `input_total_berat_barang` (
  `id_total_berat` int(11) NOT NULL,
  `barang` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `total_berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `no_invoice` int(11) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `jumlah_tagihan` int(50) DEFAULT NULL,
  `lokasi_penjemputan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_otp`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_users`
--

CREATE TABLE `level_users` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `level_users`
--

INSERT INTO `level_users` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'mitra'),
(3, 'pemasok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-03-16-011542', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1647393446, 1),
(2, '2022-03-16-011618', 'App\\Database\\Migrations\\CreateLevelUsersTable', 'default', 'App', 1647393446, 1),
(3, '2022-03-16-011921', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1647393612, 2),
(4, '2022-03-16-172148', 'App\\Database\\Migrations\\CreateOTPtable', 'default', 'App', 1647452933, 3),
(5, '2022-03-16-175041', 'App\\Database\\Migrations\\CreateOTPEmailtable', 'default', 'App', 1647453225, 4),
(6, '2022-03-16-175915', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1647453753, 5),
(7, '2022-03-16-180328', 'App\\Database\\Migrations\\CreateOTPtable', 'default', 'App', 1647453870, 6),
(8, '2022-03-16-180639', 'App\\Database\\Migrations\\CreateOTPtable', 'default', 'App', 1647454055, 7),
(9, '2022-03-26-020834', 'App\\Database\\Migrations\\CreateTabelBarang', 'default', 'App', 1648261072, 8),
(10, '2022-03-26-030201', 'App\\Database\\Migrations\\CreateTabelBlog', 'default', 'App', 1648263933, 9),
(11, '2022-03-26-031851', 'App\\Database\\Migrations\\CreateTabelAlamatUser', 'default', 'App', 1648265430, 10),
(12, '2022-03-26-063805', 'App\\Database\\Migrations\\CreateTabelInvoice', 'default', 'App', 1648296843, 11),
(13, '2022-03-26-121708', 'App\\Database\\Migrations\\CreateTabelDetailInvoice', 'default', 'App', 1648297473, 12),
(14, '2022-03-26-122646', 'App\\Database\\Migrations\\CreateTabelTransaksiPembelian', 'default', 'App', 1648297888, 13),
(15, '2022-03-26-123246', 'App\\Database\\Migrations\\CreateTabelEstimasiPendapatanPembelian', 'default', 'App', 1648298520, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan_pembelian`
--

CREATE TABLE `pendapatan_pembelian` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `no_invoice` int(11) DEFAULT NULL,
  `total_harga` text DEFAULT NULL,
  `biaya_admin` int(100) DEFAULT NULL,
  `pendapatan` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw_transaksi`
--

CREATE TABLE `rw_transaksi` (
  `id_rw` int(11) NOT NULL,
  `Tgl_tr` datetime NOT NULL,
  `nm` varchar(100) NOT NULL,
  `berat` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_invoice` varchar(11) NOT NULL,
  `total_tr` int(11) NOT NULL,
  `status_tr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id` int(11) NOT NULL,
  `no_invoice` int(11) DEFAULT NULL,
  `produk` text DEFAULT NULL,
  `berat` int(100) DEFAULT NULL,
  `harga` int(225) DEFAULT NULL,
  `pajak` int(225) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
  `last_activity` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `avatar`, `nama_lengkap`, `alamat`, `notelp`, `userlevelid`, `active`, `created_at`, `updated_at`, `last_activity`) VALUES
(1, 'annisasukmaputri@gmail.com', NULL, 'maya', '', '085735020915', 2, '1', '2022-04-24 07:10:48', '2022-04-24 07:10:48', '2022-05-28 05:46:39'),
(48, 'ceamey@yahoo.co.id', NULL, 'Annisa Sukma Putri', '', '085732100010', 3, '1', '2022-05-21 20:55:32', '2022-05-21 20:55:32', '2022-05-27 09:00:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_invoice_no_invoice_foreign` (`no_invoice`);

--
-- Indeks untuk tabel `input_data`
--
ALTER TABLE `input_data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `idx_pemasok_id` (`pemasok_id`),
  ADD KEY `idx_mitra_id` (`mitra_id`);

--
-- Indeks untuk tabel `input_item`
--
ALTER TABLE `input_item`
  ADD PRIMARY KEY (`id_input_item`),
  ADD KEY `idx_id_input_data` (`id_input_data`),
  ADD KEY `idx_barang` (`barang`);

--
-- Indeks untuk tabel `input_total_berat_barang`
--
ALTER TABLE `input_total_berat_barang`
  ADD PRIMARY KEY (`id_total_berat`),
  ADD KEY `idx_tt_brt-brg` (`barang`),
  ADD KEY `idx_ttb_dsa_d` (`id_data`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_invoice` (`no_invoice`),
  ADD KEY `invoice_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `kode_otp`
--
ALTER TABLE `kode_otp`
  ADD PRIMARY KEY (`id_kodeotp`),
  ADD KEY `kode_otp_email_user_foreign` (`email_user`),
  ADD KEY `kode_otp_notelp_user_foreign` (`notelp_user`);

--
-- Indeks untuk tabel `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `nama_level` (`nama_level`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendapatan_pembelian`
--
ALTER TABLE `pendapatan_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendapatan_pembelian_no_invoice_foreign` (`no_invoice`);

--
-- Indeks untuk tabel `rw_transaksi`
--
ALTER TABLE `rw_transaksi`
  ADD PRIMARY KEY (`id_rw`);

--
-- Indeks untuk tabel `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_pembelian_no_invoice_foreign` (`no_invoice`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `notelp` (`notelp`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_userlevelid_foreign` (`userlevelid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT untuk tabel `detail_invoice`
--
ALTER TABLE `detail_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `input_data`
--
ALTER TABLE `input_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `input_item`
--
ALTER TABLE `input_item`
  MODIFY `id_input_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `input_total_berat_barang`
--
ALTER TABLE `input_total_berat_barang`
  MODIFY `id_total_berat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kode_otp`
--
ALTER TABLE `kode_otp`
  MODIFY `id_kodeotp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pendapatan_pembelian`
--
ALTER TABLE `pendapatan_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rw_transaksi`
--
ALTER TABLE `rw_transaksi`
  MODIFY `id_rw` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD CONSTRAINT `detail_invoice_no_invoice_foreign` FOREIGN KEY (`no_invoice`) REFERENCES `invoice` (`no_invoice`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `input_data`
--
ALTER TABLE `input_data`
  ADD CONSTRAINT `input_data_ibfk_1` FOREIGN KEY (`pemasok_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `input_data_ibfk_2` FOREIGN KEY (`mitra_id`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `input_item`
--
ALTER TABLE `input_item`
  ADD CONSTRAINT `input_item_ibfk_1` FOREIGN KEY (`id_input_data`) REFERENCES `input_data` (`id_data`),
  ADD CONSTRAINT `input_item_ibfk_2` FOREIGN KEY (`barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `input_total_berat_barang`
--
ALTER TABLE `input_total_berat_barang`
  ADD CONSTRAINT `input_total_berat_barang_ibfk_1` FOREIGN KEY (`barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `input_total_berat_barang_ibfk_2` FOREIGN KEY (`id_data`) REFERENCES `input_data` (`id_data`);

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kode_otp`
--
ALTER TABLE `kode_otp`
  ADD CONSTRAINT `kode_otp_email_user_foreign` FOREIGN KEY (`email_user`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `kode_otp_notelp_user_foreign` FOREIGN KEY (`notelp_user`) REFERENCES `users` (`notelp`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendapatan_pembelian`
--
ALTER TABLE `pendapatan_pembelian`
  ADD CONSTRAINT `pendapatan_pembelian_no_invoice_foreign` FOREIGN KEY (`no_invoice`) REFERENCES `invoice` (`no_invoice`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD CONSTRAINT `transaksi_pembelian_no_invoice_foreign` FOREIGN KEY (`no_invoice`) REFERENCES `invoice` (`no_invoice`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_userlevelid_foreign` FOREIGN KEY (`userlevelid`) REFERENCES `level_users` (`id_level`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
