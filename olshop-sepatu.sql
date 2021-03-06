-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 21.31
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop-sepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamats`
--

CREATE TABLE `alamats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamats`
--

INSERT INTO `alamats` (`id`, `user_id`, `address`, `kota`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 4, 'Jalan Surabaya No 4 Lowokwaru', 'Malang', '45623', NULL, '2021-10-11 14:58:25')

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanjas`
--

CREATE TABLE `belanjas` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `kurir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum ditambahkan',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `belanjas`
--

INSERT INTO `belanjas` (`id`, `user_id`, `produk_id`, `total_harga`, `kurir`, `status`, `created_at`, `updated_at`) VALUES
(16915667, 4, 13, 2215000, 'Citra Van Titipan Kilat (TIKI)', 3, '2021-10-22 07:45:04', '2021-10-26 01:02:02'),
(32289748, 13, 9, 1900000, 'Belum ditambahkan', 0, '2021-10-26 18:14:53', '2021-10-26 18:14:53'),
(37779957, 4, 17, 2880000, 'Jalur Nugraha Ekakurir (JNE)', 3, '2021-10-19 16:02:52', '2021-10-26 01:21:37'),
(55713474, 13, 13, 2200000, 'Belum ditambahkan', 0, '2021-10-12 06:04:20', '2021-10-12 06:04:20'),
(63899458, 13, 11, 2200000, 'Belum ditambahkan', 0, '2021-10-12 06:05:28', '2021-10-12 06:05:28'),
(85244284, 13, 14, 2823000, 'Jalur Nugraha Ekakurir (JNE)', 2, '2021-10-12 05:27:52', '2021-10-26 18:25:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `belanja_id` int(11) NOT NULL,
  `va_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `resi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Tersedia',
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `checkouts`
--

INSERT INTO `checkouts` (`id`, `belanja_id`, `va_number`, `bank`, `total_harga`, `status`, `kurir`, `resi`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 37779957, '39126213270', 'BCA', 2880000, 'SETTLEMENT', 'Jalur Nugraha Ekakurir (JNE)', 'JP24815812', '2021-10-20', '2021-10-19 16:03:47', '2021-10-26 16:56:53'),
(2, 16915667, '39126606544', 'BCA', 2215000, 'EXPIRE', '', 'Belum ditambahkan', '2021-10-23', '2021-10-22 07:46:10', '2021-10-26 01:00:17'),
(3, 85244284, '39126361514', 'BCA', 2823000, 'PENDING', 'Jalur Nugraha Ekakurir (JNE)', 'Belum Tersedia', '2021-10-28', '2021-10-26 18:27:50', '2021-10-26 18:27:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_29_173339_create_belanjas_table', 1),
(6, '2021_09_29_174041_create_produks_table', 1),
(7, '2021_10_09_181119_create_alamats_table', 2),
(8, '2021_10_19_225042_create_checkouts_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `stock` int(100) DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama`, `gambar`, `harga`, `berat`, `stock`, `created_at`, `updated_at`) VALUES
(4, 'ADIDAS SUPERSTAR BLACK', '9afa77fc033a0ba9998cf8d5c2c6e7be.jpg', 2200000, 1000, 12, '2021-10-04 14:07:49', '2021-10-05 21:48:05'),
(6, 'ADIDAS FORUM LOW', 'b06a3fac775919f3f34ad9612d78c4c7.jpg', 1500000, 1000, 10, '2021-10-04 16:23:26', '2021-10-19 16:11:05'),
(9, 'ADIDAS DAME 7 EXTPLY SHOES', '9d5ea18b3624a297e7e45d3728580608.jpg', 1900000, 1000, 4, '2021-10-05 06:02:52', '2021-10-26 18:14:53'),
(11, 'ADIDAS SUPERSTAR RUN-DMC SHOES', '69b73745eb726fd58950056a1fcf93d0.jpg', 2200000, 1000, 17, '2021-10-05 21:27:52', '2021-10-26 18:37:14'),
(13, 'ADIDAS ADIZERO BOSTON 10', '8cbda58f0085ed41d530d93723034f40.jpg', 2200000, 1000, 5, '2021-10-07 04:14:56', '2021-10-22 07:45:12'),
(14, 'ADIDAS ADIDAS 4DFWD PULSE', '9733b495690845ccc7e25c1efb19c8bf.jpg', 2800000, 1000, 5, '2021-10-07 04:22:03', '2021-10-12 05:27:52'),
(15, 'ADIDAS HUMANRACE SICHONA', '78cd4bf327c86389bc52ce99b9cd0a52.jpg', 2800000, 1000, 21, '2021-10-07 04:24:05', '2021-10-26 18:42:37'),
(17, 'ADIDAS DONOVAN MITCHELL D.O.N ISSUE 3', 'acdb2b03248af8c2848ba40d5f14724e.jpg', 2850000, 1000, 15, '2021-10-12 06:43:39', '2021-10-22 07:44:55'),
(18, 'ADIDAS D ROSE 11 BLACK', '60c7874e5bf74ba0e61f417a1f9413a0.jpg', 1750000, 1000, 8, '2021-10-12 06:44:29', '2021-10-12 06:44:29'),
(19, 'ADIDAS ADIZERO ADIOS 5 TOKYO', 'd7c6e2b81d372f1811ed393f55db30be.jpg', 2350000, 1000, 4, '2021-10-12 06:45:55', '2021-10-12 06:45:55'),
(20, 'ADIDAS JEREMY SCOTT FORUM DIPPED LOW', '3c3800acb1c216505098bf5f5919a244.jpg', 2500000, 1000, 14, '2021-10-26 18:44:40', '2021-10-26 18:44:40'),
(21, 'ADIDAS GAMEMODE KNIT IN', '7b8a29188b26e762fee68a11b798232f.jpg', 1200000, 1000, 11, '2021-10-26 18:46:21', '2021-10-26 18:46:21'),
(22, 'ADIDAS SPECIAL 21', 'b285c0e41c1c3db5da1e8d61d4c4e2fb.jpg', 1600000, 1000, 15, '2021-10-26 18:49:10', '2021-10-26 18:49:10'),
(23, 'NIKE DUNK HIGH 1985 SP', '59d29ae9957ee6bb9f48a16a244eb941.jpg', 1979000, 1000, 11, '2021-10-26 18:52:03', '2021-10-26 18:52:03'),
(24, 'NIKE SB BLZR COURT DVDL', 'cd21621b45e712b0e8174f08ef4beaaf.jpg', 878000, 1000, 19, '2021-10-26 18:52:54', '2021-10-26 18:52:54'),
(25, 'JORDAN SERIES .03 \'DEAR \'90S\'', 'af2b9453761db248fb5a8a31127a2b7c.jpg', 1099000, 1000, 8, '2021-10-26 18:53:54', '2021-10-26 18:53:54'),
(26, 'JORDAN \'WHY NOT?\' ZER0.4 PF', '7f2bc13bc0979c554720aa4384ee30dd.jpg', 1578000, 1000, 31, '2021-10-26 18:55:11', '2021-10-26 18:55:11'),
(27, 'NIKE AIR MAX 95', '4114d9a5a7a2d7e576f96db30a2c4bec.jpg', 2389000, 1000, 18, '2021-10-26 18:56:06', '2021-10-26 18:56:06'),
(28, 'NIKE PHANTOM GT ELITE DYNAMIC FIT 3D FG', 'c88c745b9253574184ae7eaf3a731040.jpg', 3178000, 1000, 14, '2021-10-26 18:57:32', '2021-10-26 18:57:32'),
(29, 'LEBRON 18 \'BEST 10???18\'', '357bb3afed7e0f7b7916de992a5f435d.jpg', 2938000, 1000, 18, '2021-10-26 18:58:24', '2021-10-26 18:58:24'),
(30, 'NEW BALANCE FC REBELV2 MEN\'S RUNNING SHOES', 'e94a72395e837eea4610c7b22a7e97bf.jpg', 1999000, 1000, 9, '2021-10-26 19:00:14', '2021-10-26 19:00:14'),
(31, 'NEW BALANCE FUELCELL RC ELITE V2 MEN\'S RUNNING SHOES', 'e965893b7214b78e285613aba87cc272.jpg', 3599000, 1000, 15, '2021-10-26 19:01:18', '2021-10-26 19:01:18'),
(32, 'NEW BALANCE XC72 MEN\'S SNEAKERS', 'f3380a23e4cdf7d1ab2f0abb438a4af3.jpg', 1799000, 1000, 83, '2021-10-26 19:02:37', '2021-10-26 19:02:37'),
(33, 'NEW BALANCE 327 GRADIENT MEN\'S SNEAKER SHOES', '8952f13558be8f1d54ed183c79c89642.jpg', 1599000, 1000, 54, '2021-10-26 19:22:12', '2021-10-26 19:22:12'),
(34, 'NEW BALANCE JADEN SMITH\'S VISION RACER VIBRANT TRIPPY SUMMER MEN\'S SNEAKER SHOES', '890cd5be1f5cdad1f8eda32e8b38549e.jpg', 2999000, 1000, 63, '2021-10-26 19:23:10', '2021-10-26 19:23:10'),
(35, 'NEW BALANCE 574 CLASSIC MEN\'S SHOES', '448c3a14af0546ab3416f38e02467ef2.jpg', 1039200, 1000, 82, '2021-10-26 19:25:33', '2021-10-26 19:25:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belakang',
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '08126376234',
  `level` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_status` int(10) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `level`, `email`, `email_verified_at`, `password`, `alamat_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'maul', 'belakang', '08126376234', 0, 'maul@mail.com', NULL, '$2y$10$UCdioYqnoUwRhFmJonpVfO6pL0SGZvrVVW5pCcT43w3zj/35RlSha', 0, NULL, '2021-09-29 10:51:15', '2021-09-29 10:51:15'),
(2, 'admin', 'belakang', '08126376234', 1, 'superadmin@admin.com', '2021-10-06 12:31:33', '$2y$10$gfcb7/Tuya2.aAfT.OJ/quLw.uSjMz93Uf4fBH6S2BBjMd.Fr1jWq', 0, NULL, '2021-09-30 17:18:13', '2021-09-30 17:18:13'),
(4, 'user', 'belakang', '08126376234', 0, 'user@domain.com', '2021-10-06 12:31:33', '$2y$10$1pARn3VqshUBwOaynB7O2e.QXBkZQAf3yoqzjh13SKshwgSI/YTCq', 1, NULL, '2021-10-03 20:24:23', '2021-10-03 20:24:23')

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `belanjas`
--
ALTER TABLE `belanjas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
