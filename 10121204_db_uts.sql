-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 07:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `10121204_db_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id_barang`, `id_user`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aqua 600 ml', 5000, '2023-12-09 05:52:47', '2023-12-09 05:52:47'),
(2, 1, 'Indomie Rasa Ayam Bawang', 2500, '2023-12-09 05:52:56', '2023-12-09 05:52:56'),
(3, 1, 'Sabun Mandi Lifebuoy', 7000, '2023-12-09 05:53:05', '2023-12-09 05:53:05'),
(4, 1, 'Rinso Deterjen Cair 800 ml', 15000, '2023-12-09 05:53:23', '2023-12-09 05:53:23'),
(5, 2, 'Teh Botol Sosro 500 ml', 6000, '2023-12-09 05:53:55', '2023-12-09 05:53:55'),
(6, 2, 'Gula Pasir 1 kg', 10000, '2023-12-09 05:54:03', '2023-12-09 05:54:03'),
(7, 2, 'Kopi ABC Susu 3 in 1', 8000, '2023-12-09 05:54:14', '2023-12-09 05:54:14'),
(8, 3, 'Telur Ayam Kampung', 25000, '2023-12-09 05:54:43', '2023-12-09 05:54:43'),
(9, 3, 'Pepsodent Pasta Gigi', 10000, '2023-12-09 05:54:56', '2023-12-09 05:54:56'),
(10, 3, 'Tisu Makan Cap Tangan', 8000, '2023-12-09 05:55:04', '2023-12-09 05:55:04'),
(11, 4, 'Rinso Molto Fresh 800 ml', 18000, '2023-12-09 05:55:35', '2023-12-09 05:55:35'),
(12, 4, 'Minyak Goreng Bimoli 1 liter', 20000, '2023-12-09 05:55:47', '2023-12-09 05:55:47'),
(13, 4, 'Sarden ABC Kaleng', 10000, '2023-12-09 05:55:57', '2023-12-09 05:55:57'),
(14, 5, 'Keju Kraft Slice', 15000, '2023-12-09 05:56:21', '2023-12-09 05:56:21'),
(15, 5, 'Snickers Coklat', 5000, '2023-12-09 05:56:32', '2023-12-09 05:56:32'),
(16, 5, 'Coca-Cola Botol 1.5 liter', 10000, '2023-12-09 05:56:44', '2023-12-09 05:56:44'),
(17, 5, 'Tepung Segitiga Biru', 8000, '2023-12-09 05:56:54', '2023-12-09 05:56:54'),
(18, 5, 'Sabun Cuci Piring Sunlight', 7000, '2023-12-09 05:57:06', '2023-12-09 05:57:06'),
(19, 5, 'Beng-Beng Coklat', 3000, '2023-12-09 05:57:16', '2023-12-09 05:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_11_29_072147_create_barangs_table', 1),
(4, '2023_11_30_012136_create_transaksis_table', 1),
(5, '2023_12_03_004405_create_tugas_table', 1),
(6, '2023_12_04_070336_create_riwayat_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksis`
--

CREATE TABLE `riwayat_transaksis` (
  `id_riwayat` bigint(20) UNSIGNED NOT NULL,
  `no_riwayat` bigint(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `totalharga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_transaksis`
--

INSERT INTO `riwayat_transaksis` (`id_riwayat`, `no_riwayat`, `nama_barang`, `nama_karyawan`, `jumlah`, `subtotal`, `totalharga`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beng-Beng Coklat', 'Irfan Hakim', 2, 6000, 90000, '2023-12-09 05:57:34', '2023-12-09 05:57:34'),
(2, 1, 'Rinso Deterjen Cair 800 ml', 'Irfan Hakim', 2, 30000, 90000, '2023-12-09 05:57:34', '2023-12-09 05:57:34'),
(3, 1, 'Rinso Molto Fresh 800 ml', 'Irfan Hakim', 3, 54000, 90000, '2023-12-09 05:57:34', '2023-12-09 05:57:34'),
(4, 2, 'Keju Kraft Slice', 'Irfan Hakim', 3, 45000, 55000, '2023-12-09 05:57:46', '2023-12-09 05:57:46'),
(5, 2, 'Coca-Cola Botol 1.5 liter', 'Irfan Hakim', 1, 10000, 55000, '2023-12-09 05:57:46', '2023-12-09 05:57:46'),
(6, 3, 'Indomie Rasa Ayam Bawang', 'Irfan Hakim', 3, 7500, 17500, '2023-12-09 05:58:02', '2023-12-09 05:58:02'),
(7, 3, 'Aqua 600 ml', 'Irfan Hakim', 2, 10000, 17500, '2023-12-09 05:58:02', '2023-12-09 05:58:02'),
(8, 4, 'Sarden ABC Kaleng', 'Irfan Hakim', 2, 20000, 34000, '2023-12-09 05:58:16', '2023-12-09 05:58:16'),
(9, 4, 'Sabun Mandi Lifebuoy', 'Irfan Hakim', 2, 14000, 34000, '2023-12-09 05:58:16', '2023-12-09 05:58:16'),
(10, 5, 'Gula Pasir 1 kg', 'Maya Wulandari', 1, 10000, 100000, '2023-12-09 05:59:38', '2023-12-09 05:59:38'),
(11, 5, 'Minyak Goreng Bimoli 1 liter', 'Maya Wulandari', 2, 40000, 100000, '2023-12-09 05:59:38', '2023-12-09 05:59:38'),
(12, 5, 'Telur Ayam Kampung', 'Maya Wulandari', 2, 50000, 100000, '2023-12-09 05:59:38', '2023-12-09 05:59:38'),
(13, 6, 'Aqua 600 ml', 'Maya Wulandari', 1, 5000, 30000, '2023-12-09 05:59:48', '2023-12-09 05:59:48'),
(14, 6, 'Indomie Rasa Ayam Bawang', 'Maya Wulandari', 2, 5000, 30000, '2023-12-09 05:59:49', '2023-12-09 05:59:49'),
(15, 6, 'Pepsodent Pasta Gigi', 'Maya Wulandari', 2, 20000, 30000, '2023-12-09 05:59:49', '2023-12-09 05:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tugas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('karyawan','admin') NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` bigint(20) DEFAULT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `verify_key` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `email`, `alamat`, `nohp`, `profil`, `verify_key`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Rizki', '$2y$10$KqA5/VkypEXH7g.yNab3QewCIOJi2.F/xgj/Gm3AaEZY3gBLLcdma', 'karyawan', 'ahmadrizki@gmail.com', 'Jl. Cendrawasih No. 123, Jakarta', 81234567890, 'face1.jpg', NULL, 1, '2023-12-09 05:49:35', '2023-12-09 05:49:35'),
(2, 'Siti Nurul Hidayah', '$2y$10$H8sUd909e651p1KhJJUSz.gpzgFofCSDRrCZ7gxFuR7rFjsYDcpFK', 'karyawan', 'sitinurulhidayah@gmail.com', 'Jl. Mawar 5, Bandung', 87654321098, 'face2.jpg', NULL, 1, '2023-12-09 05:50:16', '2023-12-09 05:50:18'),
(3, 'Budi Santoso', '$2y$10$LSe3sO.NiwmJUIRtzhF0ledZiRanh20jl1thtRlYd5aYoi5xpc5bu', 'karyawan', 'budisantoso@gmail.com', 'Jl. Kenanga 8, Surabaya', 89876543210, 'face3.jpg', NULL, 1, '2023-12-09 05:50:59', '2023-12-09 05:50:59'),
(4, 'Maya Wulandari', '$2y$10$MHFtEmZatpLV2D9ip5gGCe60Y14oh2TTob2b5facMor6bltUNWMt.', 'karyawan', 'mayawulandari@gmail.com', 'Jl. Melati 2A, Yogyakarta', 81112223344, 'face5.jpg', NULL, 1, '2023-12-09 05:51:43', '2023-12-09 05:51:43'),
(5, 'Irfan Hakim', '$2y$10$4mLIy6cl0G8tT6BROx5s1e4XsGRkkhhT7dbnu4mvQza1gY4ci7VDu', 'karyawan', 'irfanhakim@gmail.com', 'Jl. Dahlia 17, Semarang', 82334455667, 'face4.jpg', NULL, 1, '2023-12-09 05:52:23', '2023-12-09 05:52:23'),
(6, 'Admin', '$2y$10$GVBCuBD0ybgl.Gz8TScIAOpIQPfeXKz75WrjBhOSVjKQRyZs4PjY2', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, 1, '2023-12-09 05:58:39', '2023-12-09 05:58:39'),
(7, 'Dian Pratiwi', '$2y$10$sfUdeIC5.GDnzSJx3FeiVOBQUiJF1N4NzegNmJYw0tKqVSTijVUg2', 'karyawan', 'dianpratiwi@gmail.com', 'Jl. Anggrek 9, Medan', 81998877665, 'face6.jpg', NULL, 1, '2023-12-09 06:05:41', '2023-12-09 06:05:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `tugas_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  MODIFY `id_riwayat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
