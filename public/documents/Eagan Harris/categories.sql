-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 11:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_documentation`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `modifiedBy` varchar(255) NOT NULL,
  `deletedBy` varchar(255) DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `isDeleted`, `createdBy`, `modifiedBy`, `deletedBy`, `createdDate`, `modifiedDate`, `deleted_at`, `updated_at`, `created_at`) VALUES
(5, 'mobilee', 'hi', 0, '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2024-05-07 06:12:57', '2024-05-07 11:42:57'),
(6, 'TV', 'rdgrtfgyfghytgh', 0, '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2024-05-06 06:42:13', '2024-05-06 06:42:13'),
(7, 'Laptop', 'dsygseydgfsytegdfsed', 0, '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2024-05-06 06:42:50', '2024-05-06 06:42:50'),
(8, 'computer', 'sgdyusegduysgedys', 0, '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '2024-05-06 06:43:06', '2024-05-06 06:43:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
