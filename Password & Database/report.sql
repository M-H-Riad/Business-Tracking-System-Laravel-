-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 11:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `address`, `contact`, `phone`, `area`, `district`, `status`, `created_at`, `updated_at`) VALUES
(8, 'First Agency', '58/jha,West Razabazar,Farmgate', 'someone@example.com', 1701045486, 'Banani', 'Dhaka', NULL, '2019-07-18 04:28:04', '2019-08-05 23:59:39'),
(9, 'Second Agency', '58/jha,West Razabazar,Farmgate', 'other@example.com', 1701045486, 'Dhanmondi', 'Dhaka', NULL, '2019-07-18 04:28:29', '2019-07-25 03:37:32'),
(12, 'Third Agency', '58/jha,West Razabazar,Farmgate', 'some@example.com', 1701045486, 'Farmgate', 'Dhaka', NULL, '2019-07-22 23:45:41', '2019-07-22 23:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `agency` int(191) NOT NULL,
  `client` int(191) NOT NULL,
  `billNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(191) NOT NULL,
  `length` int(11) NOT NULL,
  `rate` double(8,3) NOT NULL,
  `totalBill` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `date`, `agency`, `client`, `billNo`, `type`, `length`, `rate`, `totalBill`, `note`, `created_at`, `updated_at`) VALUES
(1, '2019-08-03', 9, 6, '4', 3, 3, 2.000, 6, 'ok', '2019-08-20 05:34:52', '2019-08-20 05:34:52'),
(2, '2019-08-04', 8, 3, '1', 1, 7, 2.000, 14, 'gh', '2019-08-20 05:37:04', '2019-08-20 05:37:04'),
(3, '2019-08-10', 8, 3, '5', 4, 5, 5.000, 25, 'ok', '2019-08-22 03:37:16', '2019-08-22 03:37:16'),
(4, '2019-08-11', 8, 3, '1', 1, 6, 6.000, 36, 'h', '2019-08-22 03:38:03', '2019-08-22 03:38:03'),
(5, '2019-08-22', 8, 4, '5', 1, 5, 3.000, 15, 'hg', '2019-08-23 10:38:38', '2019-08-23 10:38:38'),
(6, '2019-08-16', 12, 7, '2', 4, 4, 2.000, 8, 'baki', '2019-08-23 23:40:50', '2019-08-23 23:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` int(191) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `company`, `address`, `contact`, `phone`, `area`, `district`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Client 2', 8, '58/jha,West Razabazar,Farmgate', 'other@example.com', 1701045486, 'Dhanmondi', 'Dhaka', 0, '2019-07-18 06:38:55', '2019-08-24 02:54:49'),
(4, 'Client 3', 8, '58/jha,West Razabazar,Farmgate', 'some@example.com', 1701045486, '', '', 1, '2019-07-18 06:39:15', '2019-07-18 06:39:15'),
(5, 'Client 44', 9, '58/jha,West Razabazar,Farmgate', 'other@example.com', 1701045486, 'Farmgate', 'Dhaka', 1, '2019-07-25 05:12:19', '2019-08-21 10:38:33'),
(6, 'Client 6', 9, '58/jha,West Razabazar,Farmgate', 'Contact Person', 1701045486, 'Dhanmondi', 'Dhaka', 1, '2019-08-05 05:07:16', '2019-08-24 00:20:13'),
(7, 'client 7', 12, '58/jha,West Razabazar,Farmgate', 'some@example.com', 1701045486, 'Dhanmondi', 'Dhaka', 1, '2019-08-20 03:57:17', '2019-08-24 00:47:27');

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
(1, '2019_07_16_150545_create_billings_table', 1),
(2, '2019_07_17_093938_create_agencies_table', 1),
(3, '2019_07_17_100212_create_clients_table', 1),
(4, '2019_07_17_120846_create_types_table', 1),
(5, '2019_08_07_061950_create_payments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `agency` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `agency`, `client`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(1, '2019-08-06', 9, 6, 4, 'bb', '2019-08-20 05:35:50', '2019-08-20 05:35:50'),
(2, '2019-08-09', 8, 3, 10, 'ok', '2019-08-20 05:49:38', '2019-08-20 05:49:38'),
(3, '2019-08-21', 8, 3, 25, 'ok', '2019-08-22 03:38:57', '2019-08-24 00:04:25'),
(4, '2019-08-24', 8, 4, 8, 'ok', '2019-08-23 10:39:13', '2019-08-23 10:39:13'),
(5, '2019-08-27', 12, 7, 5, 'ok', '2019-08-23 23:42:04', '2019-08-23 23:42:04'),
(6, '2019-08-22', 9, 6, 2, 'gh', '2019-08-23 23:44:37', '2019-08-24 00:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Type 1', NULL, '2019-07-18 05:16:49', '2019-07-18 05:16:49'),
(3, 'Type 3', NULL, '2019-07-18 05:17:05', '2019-07-18 05:17:05'),
(4, 'Type 4', NULL, '2019-07-18 05:17:12', '2019-07-18 05:17:12'),
(5, 'Type 5', NULL, '2019-08-24 00:06:05', '2019-08-24 00:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Meshkat Hasan Riad', 'meshkathasanriad@gmail.com', NULL, '$2y$10$TnEZUbTkXdxZzE6CSqzdvuTbjNeRLSE2.MvQ/dxbk9AqXTyziJFSS', NULL, '2019-07-16 08:48:26', '2019-08-24 00:42:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
