-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2022 pada 04.59
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
  `img` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `judul`, `isi`, `img`, `created_at`) VALUES
(1, 'Buang atau Beruang?', 'Botol plastik yang sudah tidak ada isinya bisa jadi uang lhoh! Ingin tahu caranya?', 'assets/images/artikel/s1.jpg', '2022-03-26 10:13:55'),
(2, 'Stop Buang Popok Bayi', 'Ternyata popok bayi yang sudah terpakai bisa menghasilkan uang. Yuk simak pembahasannya!', 'assets/images/artikel/s2.jpg', '2022-03-26 10:13:55'),
(3, 'Daur Ulang Sampah', 'Daur ulang atau recycle adalah proses pembuatan barang bekas menjadi bahan baru.', 'assets/images/artikel/s3.jpg', '2022-03-26 10:13:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_penjemputan`
--

CREATE TABLE `jadwal_penjemputan` (
  `id_penjemputan` int(11) NOT NULL,
  `no_invoice` int(11) NOT NULL,
  `tgl_penjemputan` varchar(50) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `id` int(11) NOT NULL,
  `no_invoice` int(11) NOT NULL,
  `pemasok_id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `berat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`id`, `no_invoice`, `pemasok_id`, `id_barang`, `berat`) VALUES
(1, 5174358, 48, 2, '11, 23'),
(2, 5174358, 48, 1, '22'),
(3, 5174358, 48, 5, '1'),
(4, 5181216, 52, 2, '22'),
(5, 5181216, 52, 1, '10'),
(6, 5181216, 52, 2, '8'),
(7, 5181216, 52, 2, '5'),
(8, 5181216, 52, 1, '10'),
(9, 5181216, 52, 3, '7'),
(10, 5181216, 52, 5, '4'),
(11, 5181216, 52, 5, ''),
(12, 5181216, 52, 6, ''),
(13, 5181216, 52, 6, ''),
(14, 5181216, 52, 7, ''),
(15, 5181216, 52, 4, ''),
(16, 5174357, 52, 1, '1'),
(17, 5174357, 52, 2, '2'),
(18, 5174357, 52, 3, '1'),
(19, 5174357, 52, 4, '2'),
(20, 5174357, 52, 5, '1'),
(21, 5174357, 52, 6, '2'),
(22, 5174357, 52, 7, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pembelian`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`no_invoice`, `mitra_id`, `pemasok_id`, `total_berat`, `harga`, `alamat`, `koordinat`, `tgl_transaksi`, `date_grafik`, `status_transaksi`) VALUES
(5174358, 1, 48, 57, 792000, 'Jl. Ahmad Yani no 12 Pahlawan Jakarta Timur', NULL, 'Selasa, 05-31-2022', '2022-05-30 10:08:42', '1'),
(5181216, 1, 52, 22, 286000, 'Jl. Dr Deandels no 21 Bringin Jakarta Timur', NULL, 'Selasa, 05-31-2022', '2022-06-01 10:17:45', '1'),
(5174357, 1, 52, 10, 50000, 'Jl Suyoso no 21 Prigen Jakarta Barat', NULL, 'Sabtu, 4 Juni 2022', '2022-06-04 02:26:11', '1');

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
  `valid_notelp` char(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_activity` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `avatar`, `nama_lengkap`, `alamat`, `notelp`, `userlevelid`, `active`, `valid_notelp`, `created_at`, `updated_at`, `last_activity`) VALUES
(1, 'annissukmaputri@gmail.com', NULL, 'Kazanuchi Basuki', 'Jl Raya Dringu no 48, Kec. Dringu, Kab. Probolinggo 64217 Provinsi Jawa Timur', '085735020916', 2, '1', '', '2022-04-24 07:10:48', '2022-04-24 07:10:48', '2022-05-28 14:20:44'),
(48, 'ceamey@yahoo.co.id', NULL, 'Mey Lisa Habibah', 'Jl Kyai Ageng no 5, Kec. Badas, Kab. Kediri 64217 Provinsi Jawa Timur', '085732100010', 3, '1', '', '2022-05-21 20:55:32', '2022-05-21 20:55:32', '2022-06-04 04:35:52'),
(52, 'annisasukmaputri@gmail.com', NULL, 'Annisa Sukma Putri', 'Jl Mayjend Hardianto no 32 Jakarta Barat', '085735020915', 3, '1', '', '2022-05-30 17:16:42', '2022-05-30 17:16:42', '2022-06-04 04:36:25');

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
-- Indeks untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `kode_otp`
--
ALTER TABLE `kode_otp`
  MODIFY `id_kodeotp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kode_otp`
--
ALTER TABLE `kode_otp`
  ADD CONSTRAINT `kode_otp_email_user_foreign` FOREIGN KEY (`email_user`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `kode_otp_notelp_user_foreign` FOREIGN KEY (`notelp_user`) REFERENCES `users` (`notelp`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_userlevelid_foreign` FOREIGN KEY (`userlevelid`) REFERENCES `level_users` (`id_level`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
