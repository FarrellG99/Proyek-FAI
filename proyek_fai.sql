-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 12:51 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_fai`
--
CREATE DATABASE IF NOT EXISTS `proyek_fai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyek_fai`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `platnomor` varchar(50) DEFAULT NULL,
  `awal` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `hargamobil` int(10) NOT NULL DEFAULT 0,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `tanggal`, `username`, `platnomor`, `awal`, `akhir`, `hargamobil`, `status`) VALUES
(1, '2020-12-27', 'aaaa', 'L1018PM', '2020-12-27', '2020-12-30', 120000, 'Aktif'),
(2, '2020-12-29', 'aaaa', 'K 3030 AB', '2020-12-01', '2020-12-05', 120000, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '2014_10_12_000000_create_users_table', 1),
(46, '2014_10_12_100000_create_password_resets_table', 1),
(47, '2019_08_19_000000_create_failed_jobs_table', 1),
(48, '2020_11_27_045715_create_mobils_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobils`
--

CREATE TABLE `mobils` (
  `platnomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namamobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahunmobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargamobil` int(9) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobils`
--

INSERT INTO `mobils` (`platnomor`, `namamobil`, `warna`, `tahunmobil`, `status`, `foto`, `hargamobil`, `created_at`, `updated_at`) VALUES
('K 3030 AB', 'TOYOTA FORTUNER', 'RED', '2020', 'NonAktif', 'fortuner.jpg', 120000, '2020-12-28 03:25:37', '2020-12-29 04:41:20'),
('L1018PM', 'Daihatsu Ayla', 'Merah', '2019', 'Aktif', 'ayla.jpg', 120000, '2020-12-27 12:55:06', '2020-12-30 12:55:06'),
('L2019DOD', 'Kijang Inova VVTI', 'Putih', '2019', 'Aktif', 'kijang.jpg', 120000, '2020-12-13 11:18:02', '2020-12-15 09:04:52'),
('L2019LAS', 'Daihatsu Xenia', 'Hitam', '2018', 'Aktif', 'xenia.jpg', 120000, '2020-12-13 11:18:51', '2020-12-15 09:06:51'),
('L2020BEB', 'Toyota Avanza Veloz', 'Putih', '2020', 'Aktif', 'veloz.jpg', 120000, NULL, '2020-12-15 09:06:53'),
('L5430BB', 'Toyota Fortuner', 'Putih', '2018', 'Aktif', 'fortuner.jpg', 120000, '2020-12-26 12:49:59', '2020-12-28 12:49:59'),
('L7201BG', 'Toyoto Agya', 'Kuning', '2019', 'Aktif', 'agya.jpg', 120000, '2020-12-25 12:57:15', '2020-12-28 12:57:15'),
('L8790LQ', 'Daihatsu Terios', 'Ungu', '2019', 'Aktif', 'terios.jpg', 120000, '2020-12-23 12:59:41', '2020-12-26 12:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `email`, `alamat`, `kota`, `password`, `nohp`, `status`, `created_at`, `updated_at`) VALUES
('aaaa', 'aaaa', 'aaa@gmail.com', 'Ngagel Jaya', 'Surabaya', '$2y$10$gG7Gq6QVvp8t6UbnYhu.AeCRMpTD.w.N.giI4zUC45iFl24FoAahu', 123456, 'NonAktif', '2020-12-27 03:25:32', '2020-12-29 04:48:57'),
('admin', 'Admin', 'Admin@gmail.com', NULL, NULL, '$2y$10$Lx97qzkuPz/d7EUD6HxWjuUgJaFTphzHwINX2tLc7PYl3IZ.aogAe', 8111, 'Aktif', '2020-12-09 17:25:05', '2020-12-09 17:25:05'),
('bbbb', 'bbbb', 'bbb@gmail.com', NULL, NULL, '$2y$10$UlV7a2FldEl4bUt9l3UbzOdz6gC0vJn8M4butdywNcQJR1pZDs9AG', 98129, 'Aktif', '2020-12-29 04:09:11', '2020-12-29 04:09:11'),
('cccc', 'cccc', 'ccc@gmail.com', NULL, NULL, '$2y$10$fh1CD6Uu2QZHjm64sxsUROX6wbhYJv2HUOJ6qG0v/6zXsPtQWFmKu', 91828, 'Aktif', '2020-12-29 04:09:56', '2020-12-29 04:09:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobils`
--
ALTER TABLE `mobils`
  ADD PRIMARY KEY (`platnomor`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
