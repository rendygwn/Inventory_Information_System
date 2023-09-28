-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Feb 2022 pada 16.54
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robonesia_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(5) UNSIGNED NOT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jenis_paket_brg` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawansupply`
--

CREATE TABLE `karyawansupply` (
  `id_karyawan` bigint(5) UNSIGNED NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `karyawansupply`
--

INSERT INTO `karyawansupply` (`id_karyawan`, `nip`, `nama`, `no_telepon`, `email`, `alamat`) VALUES
(1, '10118131', 'Rendi Gunawan', '081278451', 'Helloword@gmail.com', 'Jl. Suka-Suka No.210');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` bigint(5) UNSIGNED NOT NULL,
  `kd_konsumen` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `kd_konsumen`, `nama`, `no_telepon`, `email`, `alamat`) VALUES
(3, 'KN001', 'Yuli', '09832973', 'Hai@gmail.com', 'Jl. Sama - sama');

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
(1, '2022-01-26-182449', 'App\\Database\\Migrations\\Karyawansupply', 'default', 'App', 1643348888, 1),
(2, '2022-01-26-201117', 'App\\Database\\Migrations\\Supplier', 'default', 'App', 1643348888, 1),
(8, '2022-01-26-210040', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1643781756, 2),
(9, '2022-02-02-123238', 'App\\Database\\Migrations\\Satuanbarang', 'default', 'App', 1643805309, 3),
(10, '2022-02-02-154017', 'App\\Database\\Migrations\\Konsumen', 'default', 'App', 1643816614, 4),
(15, '2022-02-02-193143', 'App\\Database\\Migrations\\User', 'default', 'App', 1643831217, 5),
(21, '2022-02-02-230859', 'App\\Database\\Migrations\\CreatePesanan', 'default', 'App', 1643861921, 6),
(22, '2022-02-03-042304', 'App\\Database\\Migrations\\CreatePesanan', 'default', 'App', 1643862195, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` bigint(5) UNSIGNED NOT NULL,
  `kd_pesan` varchar(5) NOT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `qty` varchar(50) NOT NULL,
  `id_konsumen` bigint(5) UNSIGNED NOT NULL,
  `kd_konsumen` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_barang` bigint(5) UNSIGNED NOT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuanbarang`
--

CREATE TABLE `satuanbarang` (
  `id_satuan_brg` bigint(5) UNSIGNED NOT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(100) NOT NULL,
  `satuan_brg` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `satuanbarang`
--

INSERT INTO `satuanbarang` (`id_satuan_brg`, `kd_barang`, `gambar`, `nama_brg`, `jenis_brg`, `satuan_brg`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'SB001', 'busniness-management-1.jpg', 'dummy', 'dummy', 'dummy', 'dummy', '2022-02-03 01:30:05', '2022-02-03 01:30:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` bigint(5) UNSIGNED NOT NULL,
  `kd_supplier` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kd_supplier`, `nama`, `nama_toko`, `no_telepon`, `email`, `alamat`) VALUES
(1, 'SP001', 'Adi', 'Toko Maju Jaya', '09878675645', 'Tokomaju@gmail.com', 'Jl. santai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` bigint(5) UNSIGNED NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(150) NOT NULL,
  `info` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `info`, `created_at`) VALUES
(1, 'Admin', 'haiadmin@gmail.com', '$2y$10$/V4gsyRDdh8r0QSxpqE7KuQB1epoltGsW6BRv1fhDKvfwUCsBSr2e', '', '2022-02-02 19:47:20'),
(2, 'Rendy Gwn', 'dev.helloword@gmail.com', '$2y$10$3R3j1FRAFdz8okbZFln0Z.bZgBHnWRXdxsDm5lAmIPvEZat7.ZSxG', '-', '2022-02-03 15:50:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `karyawansupply`
--
ALTER TABLE `karyawansupply`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD UNIQUE KEY `id_konsumen` (`id_konsumen`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `satuanbarang`
--
ALTER TABLE `satuanbarang`
  ADD PRIMARY KEY (`id_satuan_brg`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nama_user` (`nama_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `karyawansupply`
--
ALTER TABLE `karyawansupply`
  MODIFY `id_karyawan` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuanbarang`
--
ALTER TABLE `satuanbarang`
  MODIFY `id_satuan_brg` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
