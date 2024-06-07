-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2024 pada 11.19
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_lapangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_olahraga`
--

CREATE TABLE `booking_olahraga` (
  `id_booking_olahraga` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_katlapangan` int(11) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `waktu_mulai_booking` time NOT NULL,
  `waktu_selesai_booking` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `booking_olahraga`
--

INSERT INTO `booking_olahraga` (`id_booking_olahraga`, `id_user`, `id_katlapangan`, `tanggal_booking`, `waktu_mulai_booking`, `waktu_selesai_booking`, `status`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 8, 5, '2024-05-22', '20:23:00', '21:23:00', 'Approved', '8', '3', '2024-05-22 01:23:36', '2024-05-22 01:51:01'),
(2, 7, 3, '2024-05-23', '21:29:00', '22:29:00', 'Approved', '7', '2', '2024-05-22 01:29:38', '2024-05-22 01:33:06'),
(3, 8, 5, '2024-05-23', '19:50:00', '21:50:00', 'waiting', '8', '8', '2024-05-22 01:50:18', '2024-05-22 01:50:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_lapangan`
--

CREATE TABLE `kategori_lapangan` (
  `id_katlapangan` int(10) UNSIGNED NOT NULL,
  `nama_katlapangan` varchar(255) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `harga_katlapangan` int(11) NOT NULL DEFAULT 55000,
  `file_katlapangan` varchar(255) DEFAULT NULL,
  `waktu_buka` time NOT NULL,
  `waktu_tutup` time NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_lapangan`
--

INSERT INTO `kategori_lapangan` (`id_katlapangan`, `nama_katlapangan`, `id_lokasi`, `harga_katlapangan`, `file_katlapangan`, `waktu_buka`, `waktu_tutup`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(2, 'Lapangan 1', 3, 55000, 'futsall7.jpeg', '18:00:00', '22:00:00', '2', '2', '2024-05-22 01:08:21', '2024-05-22 02:05:55'),
(3, 'Lapangan 2', 3, 55000, 'futsall2.jpeg', '18:12:00', '21:12:00', '2', '2', '2024-05-22 01:12:43', '2024-05-22 01:12:43'),
(4, 'Lapangan 3', 3, 55000, 'futsall3.jpeg', '17:12:00', '19:13:00', '2', '2', '2024-05-22 01:13:18', '2024-05-22 01:13:18'),
(5, 'Lapangan Sisingamangaraja', 4, 55000, 'futsall3.jpeg', '18:17:00', '12:17:00', '3', '3', '2024-05-22 01:17:50', '2024-05-22 01:17:50'),
(6, 'Lapangan DanCo', 4, 55000, 'futsall1.jpeg', '19:18:00', '18:18:00', '3', '3', '2024-05-22 01:18:25', '2024-05-22 01:18:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(10) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `status`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(3, 'Parparean', 1, '1', '1', '2024-05-22 00:54:17', '2024-05-22 00:59:02'),
(4, 'Kisaran', 1, '1', '1', '2024-05-22 00:54:25', '2024-05-22 00:59:46'),
(5, 'Ajibata', 1, '1', '1', '2024-05-22 00:54:32', '2024-05-22 01:00:25'),
(6, 'Soposurung', 1, '1', '1', '2024-05-22 00:57:42', '2024-05-22 01:01:41'),
(7, 'Silindung', 1, '1', '1', '2024-05-22 00:58:06', '2024-05-22 01:02:13'),
(8, 'Muara', 1, '1', '1', '2024-05-22 01:02:50', '2024-05-22 01:48:37'),
(9, 'Parparean', 0, '1', '1', '2024-05-22 01:03:04', '2024-05-22 01:03:04'),
(10, 'Sipiongot', 0, '1', '1', '2024-05-22 01:03:52', '2024-05-22 01:03:52'),
(11, 'Pangururan', 0, '1', '1', '2024-05-22 01:49:00', '2024-05-22 01:49:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_02_011831_create_user_olahraga_table', 1),
(7, '2024_03_02_012154_create_produk_olahraga_table', 1),
(8, '2024_03_02_013613_create_kategori_lapangan_table', 1),
(9, '2024_03_02_014344_create_booking_olahraga_table', 1),
(10, '2024_03_02_014738_create_transaksi_olahraga_table', 1),
(11, '2024_03_02_014931_create_pengumuman_olahraga_table', 1),
(12, '2024_03_20_034344_create_pesan_produk_table', 1),
(13, '2024_05_19_053228_create_lokasi_table', 1),
(14, '2024_05_22_074323_create_report_lapangan_table', 1),
(15, '2024_05_22_074922_create_role_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman_olahraga`
--

CREATE TABLE `pengumuman_olahraga` (
  `id_pengumuman` int(10) UNSIGNED NOT NULL,
  `nama_pengumuman` varchar(255) NOT NULL,
  `isi_pengumuman` varchar(255) NOT NULL,
  `file_pengumuman` varchar(255) NOT NULL,
  `waktu_aktif_pengumuman` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_produk`
--

CREATE TABLE `pesan_produk` (
  `id_pesan_produk` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produkolahraga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_olahraga`
--

CREATE TABLE `produk_olahraga` (
  `id_produkolahraga` int(10) UNSIGNED NOT NULL,
  `nama_produkolahraga` varchar(255) NOT NULL,
  `harga_produkolahraga` int(11) NOT NULL,
  `file_olahraga` varchar(255) DEFAULT NULL,
  `stok_produkolahraga` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_lapangan`
--

CREATE TABLE `report_lapangan` (
  `id_report_lapangan` int(10) UNSIGNED NOT NULL,
  `id_katlapangan` int(11) NOT NULL,
  `id_booking_olahraga` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(10) UNSIGNED NOT NULL,
  `role_name` int(11) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_olahraga`
--

CREATE TABLE `transaksi_olahraga` (
  `id_transaksi_olahraga` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produkolahraga` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `id_lokasi`, `remember_token`, `role`, `created_by`, `update_by`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Andika Parlinggoman Tampubolon', 'andikatampubolon72@gmail.com', NULL, '$2y$10$BV3hdHlHkhYByjXYkdp65Oj.yi/BFIZsDQhVqJQRpTTe8gW5bHtki', 0, NULL, 'admin', NULL, NULL, NULL, NULL, NULL),
(2, 'Yudha Aritonang', 'yudha@gmail.com', NULL, '$2y$12$TigznNQfqCQ2tdG9qShUlu5zM0cm/jH3AN1Dk/YJNtm5x9Zeu4ce2', 3, NULL, 'Pengelola', '1', '1', NULL, '2024-05-22 00:59:02', '2024-05-22 01:45:50'),
(3, 'Togar Parningotan Sitinjak', 'togar@gmail.com', NULL, '$2y$12$1mtFJA/Lxsy79S/19fxiTucXDOMNBMU9rYz5sgnBluGkRkZkXQpYS', 4, NULL, 'Pengelola', '1', '1', NULL, '2024-05-22 00:59:46', '2024-05-22 00:59:46'),
(4, 'Agus Marpaung', 'agus@gmail.com', NULL, '$2y$12$OP4YGzkzeHRnVDmGid1dz.Vgl43Sp6wjjAVf4cTwCQcu0X2B4eGuO', 5, NULL, 'Pengelola', '1', '1', NULL, '2024-05-22 01:00:24', '2024-05-22 01:00:24'),
(5, 'Guntur Sijabat', 'guntur@gmail.com', NULL, '$2y$12$HDFQdBj0AYK1fUHvEjE0fuS8R/sLfZezKK62QUXl0Upq4oXZP6gt6', 6, NULL, 'Pengelola', '1', '1', NULL, '2024-05-22 01:01:41', '2024-05-22 01:01:41'),
(7, 'Anto', 'anto@gmail.com', NULL, '$2y$12$w0pXRGTCbtp292Tdjs4VNuNU7djD/wTHSGVZACOps0elAHxZVv1jK', 3, NULL, 'player', '2', '2', NULL, '2024-05-22 01:13:49', '2024-05-22 01:13:49'),
(8, 'Rizal', 'rizal@gmail.com', NULL, '$2y$12$RmVwuBS.FbjgNuHYDtnmEe8QlsnudIShdIBSe5YBDs17HqFgcZqqO', 4, NULL, 'player', '3', '3', NULL, '2024-05-22 01:18:51', '2024-05-22 01:18:51'),
(9, 'Rejeki Lumbantoruan', 'rejeki@gmail.com', NULL, '$2y$12$KrqOdawPCt/Rsu/ppdq.nOcovfIefqhQF.SmgKM9jJ/JS5Rot5Sle', 8, NULL, 'Pengelola', '1', '1', NULL, '2024-05-22 01:48:37', '2024-05-22 01:48:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_olahraga`
--

CREATE TABLE `user_olahraga` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking_olahraga`
--
ALTER TABLE `booking_olahraga`
  ADD PRIMARY KEY (`id_booking_olahraga`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori_lapangan`
--
ALTER TABLE `kategori_lapangan`
  ADD PRIMARY KEY (`id_katlapangan`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengumuman_olahraga`
--
ALTER TABLE `pengumuman_olahraga`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesan_produk`
--
ALTER TABLE `pesan_produk`
  ADD PRIMARY KEY (`id_pesan_produk`);

--
-- Indeks untuk tabel `produk_olahraga`
--
ALTER TABLE `produk_olahraga`
  ADD PRIMARY KEY (`id_produkolahraga`);

--
-- Indeks untuk tabel `report_lapangan`
--
ALTER TABLE `report_lapangan`
  ADD PRIMARY KEY (`id_report_lapangan`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `transaksi_olahraga`
--
ALTER TABLE `transaksi_olahraga`
  ADD PRIMARY KEY (`id_transaksi_olahraga`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `user_olahraga`
--
ALTER TABLE `user_olahraga`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_olahraga_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking_olahraga`
--
ALTER TABLE `booking_olahraga`
  MODIFY `id_booking_olahraga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_lapangan`
--
ALTER TABLE `kategori_lapangan`
  MODIFY `id_katlapangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_olahraga`
--
ALTER TABLE `pengumuman_olahraga`
  MODIFY `id_pengumuman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan_produk`
--
ALTER TABLE `pesan_produk`
  MODIFY `id_pesan_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk_olahraga`
--
ALTER TABLE `produk_olahraga`
  MODIFY `id_produkolahraga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `report_lapangan`
--
ALTER TABLE `report_lapangan`
  MODIFY `id_report_lapangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_olahraga`
--
ALTER TABLE `transaksi_olahraga`
  MODIFY `id_transaksi_olahraga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_olahraga`
--
ALTER TABLE `user_olahraga`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
