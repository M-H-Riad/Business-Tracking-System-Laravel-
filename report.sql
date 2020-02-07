-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 07:35 PM
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
(1, 'Star light Broadband', 'Dhanmondi Dhaka', 'MD. Milon Mia', 1777777777, 'Dhanmondi', 'Dhaka', NULL, '2019-12-11 11:24:56', '2019-12-11 11:24:56'),
(2, 'Sky Line Dish', 'Farmgate', 'Sobuj sheikh', 1999999999, 'Farmgate', 'Dhaka', NULL, '2019-12-11 11:26:06', '2019-12-11 11:26:06');

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
(1, '2019-12-11', 1, 1, '0457', 1, 500, 4.500, 2250, 'Next week.', '2019-12-11 11:35:02', '2019-12-11 11:35:02'),
(2, '2019-12-02', 1, 1, '0452', 2, 750, 5.000, 3750, 'This week', '2019-12-11 11:35:35', '2019-12-11 11:35:35'),
(3, '2019-12-03', 1, 2, '04526', 1, 450, 6.500, 2925, 'Ok', '2019-12-11 11:36:06', '2019-12-11 11:36:06'),
(4, '2019-12-06', 1, 2, '0457', 5, 500, 4.500, 2250, 'Next month', '2019-12-11 11:36:41', '2019-12-11 11:36:41'),
(5, '2019-12-10', 1, 3, '0459', 3, 450, 5.500, 2475, 'next week', '2019-12-11 11:37:18', '2019-12-11 11:37:18'),
(6, '2019-12-12', 1, 3, '0455', 3, 650, 2.500, 1625, 'clear', '2019-12-11 11:37:53', '2019-12-11 11:37:53'),
(7, '2019-12-01', 2, 4, '011', 1, 1200, 6.700, 8040, 'next week', '2019-12-11 11:38:33', '2019-12-13 12:32:35'),
(8, '2019-12-06', 2, 4, '012', 3, 1500, 6.000, 9000, 'clear withinin next month', '2019-12-11 11:39:17', '2019-12-11 11:39:17'),
(9, '2019-12-11', 2, 5, '013', 3, 1250, 5.500, 6875, 'clear withinin next month', '2019-12-11 11:39:41', '2019-12-11 11:39:41'),
(10, '2019-12-10', 2, 5, '014', 1, 500, 6.500, 3250, 'clear within next month', '2019-12-11 11:40:11', '2019-12-11 11:40:11'),
(11, '2019-12-12', 2, 5, '015', 4, 750, 5.500, 4125, 'clear within next month', '2019-12-11 11:40:41', '2019-12-11 11:40:41'),
(12, '2019-12-13', 2, 6, '016', 3, 1200, 12.000, 14400, 'clear within next month', '2019-12-11 11:41:13', '2019-12-11 11:41:13'),
(13, '2019-12-13', 2, 6, '017', 5, 1500, 15.000, 22500, 'clear within next month', '2019-12-11 11:41:35', '2019-12-11 11:41:35');

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
(1, 'Blue rain internet', 1, 'Farmgate', 'Mr. Rabby', 1478542147, 'Farmgate', 'Dhaka', 1, '2019-12-11 11:28:00', '2019-12-11 11:28:00'),
(2, 'Mazeda broadband', 1, 'Mohakhali', 'Mr. shoyon', 177777777, 'Mohakhali', 'Dhaka', 1, '2019-12-11 11:29:15', '2019-12-11 11:29:15'),
(3, 'Lady be internet', 1, 'Farmgate', 'Sobuj sheikh', 1457845125, 'Farmgate', 'Dhaka', 1, '2019-12-11 11:29:48', '2019-12-11 11:29:48'),
(4, 'Lion tv', 2, 'Farmgate', 'Ripon sheikh', 1457845125, 'Farmgate', 'Dhaka', 1, '2019-12-11 11:30:37', '2019-12-11 11:30:37'),
(5, 'Royal dish tv', 2, 'Dhanmondi Dhaka', 'Mr. Rabby', 1457845125, 'Dhanmondi', 'Dhaka', 1, '2019-12-11 11:31:32', '2019-12-11 11:31:32'),
(6, 'Pixel dish tv', 2, 'Mohakhali', 'Mr. shoyon', 1457845216, 'Mohakhali', 'Dhaka', 1, '2019-12-11 11:33:44', '2019-12-11 11:33:44');

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
(5, '2019_08_07_061950_create_payments_table', 2),
(6, '2019_08_29_195840_create_surveys_table', 3);

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
(1, '2019-11-20', 1, 1, 2000, 'ok', '2019-12-11 11:43:33', '2019-12-11 11:43:33'),
(2, '2019-12-11', 1, 1, 3000, 'clear', '2019-12-11 11:43:59', '2019-12-11 11:43:59'),
(3, '2019-12-07', 1, 2, 2200, 'clear within next month', '2019-12-11 11:44:40', '2019-12-11 11:44:40'),
(4, '2019-12-12', 1, 2, 1500, 'clear within next month', '2019-12-11 11:45:05', '2019-12-11 11:45:05'),
(5, '2019-12-09', 1, 3, 1500, 'clear within next month', '2019-12-11 11:45:48', '2019-12-11 11:45:48'),
(6, '2019-12-12', 1, 3, 2000, 'clear within next month', '2019-12-11 11:46:11', '2019-12-11 11:46:11'),
(7, '2019-12-12', 2, 4, 7000, 'clear within next week', '2019-12-11 11:47:12', '2019-12-11 11:47:12'),
(8, '2019-12-13', 2, 4, 8500, 'clear within next day', '2019-12-11 11:47:38', '2019-12-11 11:47:38'),
(9, '2019-12-14', 2, 5, 10000, 'clear within next week', '2019-12-11 11:48:23', '2019-12-11 11:48:23'),
(10, '2019-12-12', 2, 6, 32500, 'clear within next week', '2019-12-11 11:50:01', '2019-12-11 11:50:01');

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
(1, '1F cable', NULL, '2019-12-11 11:20:41', '2019-12-11 11:20:41'),
(2, '2F cable', NULL, '2019-12-11 11:20:50', '2019-12-11 11:20:50'),
(3, '4F cable', NULL, '2019-12-11 11:20:59', '2019-12-11 11:20:59'),
(4, '4.5F cable', NULL, '2019-12-11 11:21:12', '2019-12-11 11:21:12'),
(5, '5F cable', NULL, '2019-12-11 11:21:19', '2019-12-11 11:21:19');

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
(1, 'Jon Doe', 'admin@gmail.com', NULL, '$2y$10$TnEZUbTkXdxZzE6CSqzdvuTbjNeRLSE2.MvQ/dxbk9AqXTyziJFSS', NULL, '2019-07-16 08:48:26', '2019-08-24 00:42:05');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
