-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2024 pada 04.40
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
-- Database: `multiuserlogin`
--

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
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departement` enum('Project Control','Piping','Sipil','Instrumen','Electrical','Proses') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id_karyawan`, `name`, `email`, `departement`, `created_at`, `updated_at`) VALUES
(1, 'Radit Handika', 'radit@ptre.co.id', 'Piping', '2024-07-19 00:41:48', '2024-07-19 00:41:48'),
(2, 'Kurniawan', 'kurni@ptre.co.id', 'Instrumen', '2024-07-19 00:41:48', '2024-07-19 00:41:48'),
(3, 'Zain', 'zain@ptre.co.id', 'Electrical', NULL, NULL),
(4, 'Farza Handika', 'farza@ptre.co.id', 'Sipil', NULL, NULL),
(5, 'Farhat', 'farhat@ptre.co.id', 'Project Control', NULL, NULL);

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
(5, '2024_07_10_064749_create_create_pemasukan_tables_table', 2),
(6, '2024_07_10_065101_create_create_pengeluaran_tables_table', 2),
(7, '2024_07_10_072602_create_pemasukans_table', 3),
(8, '2024_07_10_072610_create_pengeluarans_table', 3),
(9, '2024_07_11_063858_create_karyawans_table', 4),
(10, '2024_07_11_071329_create_karyawans_table', 5),
(70, '2024_07_15_060805_create_dokuments_table', 6),
(85, '2014_10_12_000000_create_users_table', 7),
(86, '2014_10_12_100000_create_password_reset_tokens_table', 7),
(87, '2019_08_19_000000_create_failed_jobs_table', 7),
(88, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(89, '2024_07_12_063508_create_pemasukans_table', 7),
(90, '2024_07_12_063520_create_pengeluarans_table', 7),
(91, '2024_07_12_063857_create_karyawans_table', 7);

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
-- Struktur dari tabel `pemasukans`
--

CREATE TABLE `pemasukans` (
  `id_pemasukan` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_pemasukan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemasukans`
--

INSERT INTO `pemasukans` (`id_pemasukan`, `file`, `nama_file`, `sumber`, `deskripsi`, `tgl_pemasukan`, `created_at`, `updated_at`) VALUES
(2, 'pemasukans/Iu124p0RWShMojl2wCqRq2TxywnO8B3Y1xk5oCVQ.pdf', 'tiketPesawat.pdf', 'testing', 'testiing', '2024-08-03', '2024-07-22 00:10:31', '2024-07-22 00:10:31'),
(3, 'pemasukans/bRwn2xovoscFGsPMgRJ4VSm1anlgaZPoiZUxrjr4.pdf', 'laporan-pengaduan (3).pdf', 'sa', 'Dana Bantuan', '2024-07-24', '2024-07-22 00:26:56', '2024-07-22 00:26:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id_pengeluaran` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengeluarans`
--

INSERT INTO `pengeluarans` (`id_pengeluaran`, `file`, `nama_file`, `kategori`, `deskripsi`, `tgl_pengeluaran`, `created_at`, `updated_at`) VALUES
(1, 'pengeluarans/FHaKjaOXI28MdYB1sHrhidIKdMPClmYv4rBoDf5y.pdf', 'laporan-pengeluaran.pdf', 'Jasa', 'sa', '2024-08-03', '2024-07-22 00:15:22', '2024-07-22 00:15:22');

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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `departement` enum('Admin','Project Control','Piping','Sipil','Instrumen','Electrical','Proses') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `departement`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Faidan', 'faidan@ptre.co.id', NULL, '$2y$10$ffEw2KOY/ZR/C61C6MPyDezQszrN7xBrjlWEIkChMTvrfOcMBWefS', 'Admin', NULL, '2024-07-19 00:41:49', '2024-07-19 00:41:49'),
(2, 'Reza Hartono', 'reza@ptre.co.id', NULL, '$2y$10$a3RYJdZvNOs2yd5uWzUq1eGtrzCC.aqrCvSPXABJ9fFXPLx.nlJO6', 'Project Control', NULL, '2024-07-19 00:41:49', '2024-07-19 00:41:49'),
(3, 'Kurniawan', 'kurni@ptre.co.id', NULL, '$2y$10$EnJr4Pelp3po1hk8RlClO.jNDsuS2ND3utCGCCEDHsBgU6UcYvlGC', 'Piping', NULL, '2024-07-19 00:41:49', '2024-07-19 00:41:49'),
(4, 'Zain', 'zain@ptre.co.id', NULL, '$2y$10$BWJflpi9KNuMxZkJhfbeXuTg8suC.BnJFagRfyn7voPO8Pv2VzHB2', 'Electrical', NULL, '2024-07-19 00:53:35', '2024-07-19 00:53:35'),
(5, 'Farza Handika', 'farza@ptre.co.id', NULL, '$2y$10$xF4AR5UyucAdYCI3irxULuYzdd7x9vvVseJABRN/7j1CvziErbupO', 'Sipil', NULL, '2024-07-21 20:08:36', '2024-07-21 20:08:36'),
(6, 'Farhat', 'farhat@ptre.co.id', NULL, '$2y$10$pW4d6zCiQhIBfSIQZzrKguFRgr.8WuQFYskVGmNRSE6LDcj2DDOdm', 'Project Control', NULL, '2024-07-22 18:59:45', '2024-07-22 18:59:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id_karyawan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  MODIFY `id_pemasukan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id_pengeluaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
