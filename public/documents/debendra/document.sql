-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 02:23 PM
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
-- Database: `document`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `isDeleted`, `createdBy`, `modifiedBy`, `deletedBy`, `created_at`, `updated_at`) VALUES
(1, 'mobile', 'Neque porro quisquam est qui dolorem', 0, '', '', NULL, '2024-05-08 23:37:47', '2024-05-08 23:37:47'),
(2, 'FANn', 'Neque porro quisquam est qui dolorem', 0, '', '1', NULL, '2024-05-08 23:38:11', '2024-05-15 23:22:35'),
(3, 'Natepadd', 'Neque porro quisquam est qui dolorem', 0, '', '1', NULL, '2024-05-08 23:38:40', '2024-05-15 23:22:57'),
(4, 'Bottle', 'Neque porro quisquam est qui dolorem', 0, '', '', NULL, '2024-05-08 23:39:03', '2024-05-08 23:39:03'),
(5, 'ACC', 'Neque porro quisquam est qui dolorem', 0, '', '1', NULL, '2024-05-08 23:39:33', '2024-05-15 23:23:05'),
(6, 'IT', 'CSE', 0, '1', '', NULL, '2024-05-15 23:20:10', '2024-05-15 23:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

CREATE TABLE `communications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `communication` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communications`
--

INSERT INTO `communications` (`id`, `communication`, `created_at`, `updated_at`) VALUES
(1, 'hiii', '2024-07-08 00:06:20', '2024-07-08 00:06:20'),
(2, 'helo', '2024-07-08 00:06:27', '2024-07-08 00:06:27'),
(3, 'fgtfghgh', '2024-07-08 00:06:33', '2024-07-08 00:06:33'),
(4, 'ghghfg', '2024-07-08 00:06:37', '2024-07-08 00:06:37'),
(5, 'drfdrf', '2024-07-08 00:06:48', '2024-07-08 00:06:48'),
(6, 'jkhkt6yt', '2024-07-08 00:18:58', '2024-07-08 00:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `correspondences`
--

CREATE TABLE `correspondences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `deletedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `correspondences`
--

INSERT INTO `correspondences` (`id`, `file_id`, `receipt_id`, `created_at`, `updated_at`, `createdBy`, `modifyBy`, `deletedBy`) VALUES
(1, 7, 2, '2024-07-12 03:19:46', '2024-07-12 03:19:46', 1, 0, 0),
(2, 7, 3, '2024-07-12 03:19:46', '2024-07-12 03:19:46', 1, 0, 0),
(3, 6, 4, '2024-07-12 04:47:48', '2024-07-12 04:47:48', 1, 0, 0),
(4, 6, 4, '2024-07-12 05:42:03', '2024-07-12 05:42:03', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`) VALUES
(105, 'IN', 'India'),
(165, 'OT', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `deliverymodes`
--

CREATE TABLE `deliverymodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverymodes`
--

INSERT INTO `deliverymodes` (`id`, `mode`, `created_at`, `updated_at`) VALUES
(1, 'gvfgb', '2024-07-08 00:13:25', '2024-07-08 00:13:25'),
(2, 'fgbfgfg', '2024-07-08 00:13:30', '2024-07-08 00:13:30'),
(3, 'fgtfgtfgt', '2024-07-08 00:13:34', '2024-07-08 00:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HR', '2024-05-08 23:35:55', '2024-05-14 23:52:17'),
(2, 'Marketing', '2024-05-08 23:36:01', '2024-05-08 23:36:01'),
(3, 'BED', '2024-05-08 23:36:45', '2024-05-14 23:52:05'),
(4, 'SEO', '2024-05-08 23:36:53', '2024-05-08 23:36:53'),
(5, 'MCA', '2024-05-08 23:37:10', '2024-05-08 23:37:10'),
(6, 'MBA', '2024-05-08 23:37:16', '2024-05-08 23:37:16'),
(7, 'gfgfg', '2024-07-08 00:29:51', '2024-07-08 00:29:51'),
(8, 'gbfg', '2024-07-08 00:29:57', '2024-07-08 00:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dtype` varchar(100) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `meta_title` varchar(250) NOT NULL,
  `documentpath` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) NOT NULL,
  `modifyBy` varchar(255) NOT NULL,
  `deletedBy` varchar(255) NOT NULL,
  `deleted_at` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doc_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `file_id`, `file`, `dtype`, `file_name`, `meta_title`, `documentpath`, `description`, `createdBy`, `modifyBy`, `deletedBy`, `deleted_at`, `created_at`, `updated_at`, `doc_id`, `status`) VALUES
(5, '8', 'prince-15.3-win32.zip', '', '', '', '', NULL, '', '1', '', '', '2024-05-14 01:10:14', '2024-05-15 23:27:58', 0, 1),
(6, '5', 'laravel_documentation.sql', '', '', '', '', NULL, '', '', '', '', '2024-05-14 01:10:24', '2024-05-14 23:34:44', 0, 1),
(7, '4', 'document-main.zip', '', '', '', '', NULL, '', '1', '1', '2024-05-17 05:42:47', '2024-05-14 01:10:35', '2024-05-17 00:12:47', 0, 0),
(8, '3', 'subcategories.sql', '', '', '', '', NULL, '', '', '', '', '2024-05-14 04:06:02', '2024-05-14 04:06:02', 0, 1),
(9, '2', 'prince-15.3-win32.zip', '', '', '', '', NULL, '', '', '', '', '2024-05-14 23:33:53', '2024-05-14 23:33:53', 0, 1),
(10, '6', 'document-main.zip', '', '', '', '', NULL, '', '1', '', '', '2024-05-15 00:09:55', '2024-05-15 23:27:50', 0, 1),
(11, '1', 'Usermanage.zip', '', '', '', '', NULL, '', '', '1', '2024-05-17 05:39:51', '2024-05-15 00:10:21', '2024-05-17 00:09:51', 0, 0),
(13, '1', NULL, 'create', 'xyz', '', '', 'gftghh', '1', '', '', '', '2024-05-17 23:39:58', '2024-05-17 23:39:58', 0, 1),
(14, '2', NULL, 'create', 'abcd', '', '', 'dfgfhgh', '1', '', '', '', '2024-05-17 23:46:41', '2024-05-17 23:46:41', 0, 1),
(15, '2', NULL, 'create', 'abcd', '', '', 'dfgfhgh', '1', '', '', '', '2024-05-17 23:47:01', '2024-05-17 23:47:01', 0, 1),
(18, '5', 'subcategories.sql', 'upload', '', '', '', NULL, '1', '', '', '', '2024-05-17 23:56:19', '2024-05-17 23:56:19', 0, 1),
(19, '10', 'categories.sql', 'upload', '', '', '', NULL, '1', '', '', '', '2024-05-17 23:57:50', '2024-05-17 23:57:50', 0, 1),
(20, '1', NULL, 'create', 'gg', '', '', 'gfg', '1', '', '', '', '2024-05-18 01:31:41', '2024-05-18 01:31:41', 0, 1),
(21, '3', NULL, 'create', 'hfh', '', '', 'hfhfh', '1', '', '', '', '2024-05-18 01:45:33', '2024-05-18 01:45:33', 0, 1),
(22, '7', 'categories.sql', 'upload', '', '', '', NULL, '1', '', '', '', '2024-05-18 01:45:46', '2024-05-18 01:45:46', 0, 1),
(23, '1', NULL, 'create', 'yhygfh', '', '', 'tfyhfyh', '1', '', '', '', '2024-05-18 01:55:15', '2024-05-18 01:55:15', 0, 1),
(24, '4', 'documents/Eve Sweet/abcd.pdf', 'create', 'abcd', '', '', 'wsdwaeded', '1', '', '', '', '2024-05-19 23:44:44', '2024-05-19 23:44:44', 0, 1),
(25, '4', 'documents/Eve Sweet/abcd.pdf', 'create', 'abcd', '', '', 'wsdwaeded', '1', '', '', '', '2024-05-19 23:45:09', '2024-05-19 23:45:09', 0, 1),
(26, '11', 'categories.sql', 'upload', '', '', '', NULL, '1', '', '', '', '2024-05-19 23:47:44', '2024-05-19 23:47:44', 0, 1),
(27, '11', 'documents/debendra/test doc.pdf', 'create', 'test doc', '', '', 'hguhdurhdhgfhgf', '1', '', '', '', '2024-05-19 23:48:34', '2024-05-19 23:48:34', 0, 1),
(28, '5', NULL, 'create', 'qwer', '', 'documents/Jennifer Acevedo/qwer.pdf', 'fdgbfgthfgh', '1', '', '', '', '2024-05-20 00:24:29', '2024-05-20 00:24:29', 0, 1),
(29, '11', 'subcategories.sql', 'upload', '', '', 'documents/debendra/subcategories.sql', NULL, '1', '', '', '', '2024-05-20 00:26:15', '2024-05-20 00:26:15', 0, 1),
(30, '1', NULL, 'create', 'fyhgyh', '', 'documents/Ryan Markssss12/fyhgyh.pdf', 'huii', '1', '', '', '', '2024-05-20 00:58:26', '2024-05-20 00:58:26', 0, 1),
(31, '3', NULL, 'create', 'mithi', 'sdss', 'documents/Lillith Reynolds/mithi.pdf', 'dsdsdsdsds', '1', '', '', '', '2024-05-20 06:10:40', '2024-05-20 06:10:40', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `metatags` varchar(255) NOT NULL,
  `fileno` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcategory_id` varchar(255) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `modifiedBy` int(11) DEFAULT NULL,
  `deletedBy` tinyint(1) DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `metatags`, `fileno`, `description`, `category_id`, `subcategory_id`, `department_id`, `section_id`, `created_at`, `updated_at`, `createdBy`, `modifiedBy`, `deletedBy`, `status`, `deleted_at`) VALUES
(1, 'Ryan Markssss12', 'Quia perspiciatis i', '+1 (913) 875-8907', 'Eum consectetur exp', '4', '5', '1', '8', '2024-05-13 04:45:07', '2024-05-16 23:32:38', NULL, 1, 1, 0, '2024-05-16 23:32:38'),
(2, 'Hannah James', 'Quisquam rem molliti', '+1 (944) 325-9152', 'Est sit eaque dolor', '1', '7', '6', '7', '2024-05-13 04:45:15', '2024-05-13 04:45:15', NULL, NULL, NULL, 1, '2024-05-13 10:15:15'),
(3, 'Lillith Reynolds', 'Ut nihil aut atque s', '+1 (925) 835-7386', 'Sed duis tempora ut', '1', '5', '1', '5', '2024-05-13 04:45:41', '2024-05-13 04:45:41', NULL, NULL, NULL, 1, '2024-05-13 10:15:41'),
(4, 'Eve Sweet', 'Ut nisi dolores fugi', '+1 (674) 824-7725', 'Exercitationem adipi', '4', '6', '1', '7', '2024-05-13 04:46:23', '2024-05-13 04:46:23', NULL, NULL, NULL, 1, '2024-05-13 10:16:23'),
(5, 'Jennifer Acevedo', 'Sed repellendus Ven', '+1 (165) 173-2388', 'Culpa explicabo A c', '3', '8', '2', '6', '2024-05-13 04:46:51', '2024-05-13 04:46:51', NULL, NULL, NULL, 1, '2024-05-13 10:16:51'),
(6, 'Hollee Bowman', 'Rerum cum non nisi i', 'Voluptatem in doloru', 'Ad fugiat blanditiis', '5', '5', '1', '2', '2024-05-14 00:02:22', '2024-05-14 00:02:22', NULL, NULL, NULL, 1, '2024-05-14 05:32:22'),
(7, 'Eagan Harris', 'Est recusandae Magn', 'Ut labore eius conse', 'Est magni et culpa e', '1', '12', '1', '8', '2024-05-15 00:12:06', '2024-05-15 00:12:06', NULL, NULL, NULL, 1, '2024-05-15 05:42:06'),
(8, 'Xanthus Mccullough', 'Laborum Sit corpori', 'Dolor iure dolor non', 'Atque ratione qui no', '3', '6', '2', '6', '2024-05-15 00:12:38', '2024-05-15 00:12:38', NULL, NULL, NULL, 1, '2024-05-15 05:42:38'),
(10, 'Brooke Webster1234', 'Vitae aliquip offici', 'Dolor dolore non et', 'Explicabo Eius labo', '2', '10', '2', '3', '2024-05-15 23:42:33', '2024-05-15 23:44:07', 1, 1, NULL, 1, '2024-05-16 05:12:33'),
(11, 'debendra', 'hgfhfg', '1234', 'dfh', '3', '13', '2', '6', '2024-05-19 23:47:17', '2024-05-19 23:47:17', 1, NULL, 1, 1, '2024-05-20 05:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `fileshares`
--

CREATE TABLE `fileshares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` int(11) NOT NULL,
  `gnotes_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notifyby` varchar(255) DEFAULT NULL,
  `share_file_status` tinyint(4) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `duedate` varchar(255) DEFAULT NULL,
  `actiontype` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `createdBy` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fileshares`
--

INSERT INTO `fileshares` (`id`, `file_id`, `gnotes_id`, `department_id`, `section_id`, `user_id`, `notifyby`, `share_file_status`, `remarks`, `duedate`, `actiontype`, `priority`, `createdBy`, `created_at`, `updated_at`) VALUES
(5, 7, 19, 4, 5, 3, '0', 1, 'Reprehenderit omnis', '1972-03-14', 'view', 'Medium', '1', '2024-07-15 05:35:34', '2024-07-15 05:35:34'),
(6, 7, 19, 4, 5, 3, '0', 1, 'Reprehenderit omnis', '1972-03-14', 'view', 'Medium', '1', '2024-07-15 05:35:51', '2024-07-15 05:35:51'),
(7, 4, 18, 5, 14, 2, '0', 1, 'Adipisci eveniet to', '2022-09-04', 'edit', 'High', '1', '2024-07-15 05:37:06', '2024-07-15 05:37:06'),
(8, 4, 18, 4, 5, 3, 'sms', 1, 'Voluptas officiis ea', '2020-06-23', 'edit', 'Medium', '1', '2024-07-15 06:24:08', '2024-07-15 06:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `login_securities`
--

CREATE TABLE `login_securities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT 0,
  `google2fa_secret` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_19_054241_create_permission_tables', 1),
(5, '2021_06_21_083551_create_moduals_table', 1),
(6, '2021_06_22_094023_create_settings_table', 1),
(7, '2021_07_02_154516_create_login_securities_table', 1),
(8, '2022_05_23_172500_create_plants_table', 1),
(9, '2024_05_04_114239_category', 1),
(10, '2024_05_04_120405_subcategory', 1),
(11, '2024_05_07_055510_department', 1),
(12, '2024_05_08_110714_document', 2),
(13, '2024_05_09_054534_section', 3),
(14, '2024_05_09_091620_documents', 4),
(15, '2024_05_13_091335_document', 5),
(16, '2024_05_17_052518_add_column_name_to_document', 6),
(17, '2024_06_06_054854_share', 7),
(18, '2024_07_03_063538_deliverymode', 8),
(19, '2024_07_03_063951_vip', 9),
(20, '2024_07_03_064052_sender_type', 10),
(21, '2024_07_04_073208_communication', 11),
(22, '2024_07_04_102746_receipt', 12),
(23, '2024_07_09_073148_receiptshare', 13),
(24, '2024_07_10_051245_notes', 14),
(25, '2024_07_10_103035_yellownotes', 15),
(26, '2024_07_11_111026_correspondence', 16),
(27, '2024_07_12_111710_fileshare', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `moduals`
--

CREATE TABLE `moduals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moduals`
--

INSERT INTO `moduals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2024-05-08 04:54:09', '2024-05-08 04:54:09'),
(2, 'role', '2024-05-08 04:54:09', '2024-05-08 04:54:09'),
(3, 'module', '2024-05-08 04:54:09', '2024-05-08 04:54:09'),
(4, 'setting', '2024-05-08 04:54:09', '2024-05-08 04:54:09'),
(5, 'crud', '2024-05-08 04:54:09', '2024-05-08 04:54:09'),
(6, 'langauge', '2024-05-08 04:54:09', '2024-05-08 04:54:09'),
(7, 'permission', '2024-05-08 04:54:09', '2024-05-08 04:54:09'),
(8, 'inbox', '2024-07-08 02:58:45', '2024-07-08 02:58:45'),
(9, 'department', '2024-07-08 03:00:00', '2024-07-08 03:00:00'),
(10, 'section', '2024-07-08 03:00:16', '2024-07-08 03:00:16'),
(11, 'category', '2024-07-08 03:00:29', '2024-07-08 03:00:29'),
(12, 'subcategory', '2024-07-08 03:01:42', '2024-07-08 03:01:42'),
(13, 'file', '2024-07-08 03:01:58', '2024-07-08 03:01:58'),
(14, 'document', '2024-07-08 03:02:31', '2024-07-08 03:02:31'),
(15, 'receipt', '2024-07-09 06:41:27', '2024-07-09 06:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `description` varchar(250) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `modifyBy` int(11) NOT NULL,
  `deletedBy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `file_id`, `description`, `createdBy`, `modifyBy`, `deletedBy`, `created_at`, `updated_at`) VALUES
(14, 6, '<p>rgtrfgrg</p>', 1, 0, 0, '2024-07-15 03:54:47', '2024-07-15 03:54:47'),
(15, 11, '<p>tgtfhgfhb</p>', 1, 0, 0, '2024-07-15 03:55:01', '2024-07-15 03:55:01'),
(16, 10, '<p>hfgthfg</p>', 1, 0, 0, '2024-07-15 03:55:11', '2024-07-15 03:55:11'),
(17, 5, '<p>tgytghtfh</p>', 1, 0, 0, '2024-07-15 03:55:20', '2024-07-15 03:55:20'),
(18, 4, '<p>hyghyg</p>', 1, 0, 0, '2024-07-15 04:06:41', '2024-07-15 04:06:41'),
(19, 7, '<p>rtgtfghytfg</p>', 1, 0, 0, '2024-07-15 04:27:21', '2024-07-15 04:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage-permission', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(2, 'create-permission', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(3, 'edit-permission', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(4, 'delete-permission', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(5, 'manage-role', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(6, 'create-role', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(7, 'edit-role', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(8, 'delete-role', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(9, 'show-role', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(10, 'manage-user', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(11, 'create-user', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(12, 'edit-user', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(13, 'delete-user', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(14, 'show-user', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(15, 'manage-module', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(16, 'create-module', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(17, 'delete-module', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(18, 'show-module', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(19, 'edit-module', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(20, 'manage-setting', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(21, 'manage-crud', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(22, 'manage-langauge', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(23, 'create-langauge', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(24, 'delete-langauge', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(25, 'show-langauge', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(26, 'edit-langauge', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(27, 'index', 'web', '2024-07-08 01:57:01', '2024-07-08 01:57:01'),
(28, 'manage-inbox', 'web', NULL, NULL),
(29, 'create-inbox', 'web', NULL, NULL),
(30, 'delete-inbox', 'web', NULL, NULL),
(31, 'show-inbox', 'web', NULL, NULL),
(32, 'edit-inbox', 'web', NULL, NULL),
(33, 'manage-department', 'web', NULL, NULL),
(34, 'create-department', 'web', NULL, NULL),
(35, 'delete-department', 'web', NULL, NULL),
(36, 'show-department', 'web', NULL, NULL),
(37, 'edit-department', 'web', NULL, NULL),
(38, 'manage-section', 'web', NULL, NULL),
(39, 'create-section', 'web', NULL, NULL),
(40, 'delete-section', 'web', NULL, NULL),
(41, 'show-section', 'web', NULL, NULL),
(42, 'edit-section', 'web', NULL, NULL),
(43, 'manage-category', 'web', NULL, NULL),
(44, 'create-category', 'web', NULL, NULL),
(45, 'delete-category', 'web', NULL, NULL),
(46, 'show-category', 'web', NULL, NULL),
(47, 'edit-category', 'web', NULL, NULL),
(48, 'manage-subcategory', 'web', NULL, NULL),
(49, 'create-subcategory', 'web', NULL, NULL),
(50, 'delete-subcategory', 'web', NULL, NULL),
(51, 'show-subcategory', 'web', NULL, NULL),
(52, 'edit-subcategory', 'web', NULL, NULL),
(53, 'manage-file', 'web', NULL, NULL),
(54, 'create-file', 'web', NULL, NULL),
(55, 'delete-file', 'web', NULL, NULL),
(56, 'show-file', 'web', NULL, NULL),
(57, 'edit-file', 'web', NULL, NULL),
(58, 'manage-document', 'web', NULL, NULL),
(59, 'create-document', 'web', NULL, NULL),
(60, 'delete-document', 'web', NULL, NULL),
(61, 'show-document', 'web', NULL, NULL),
(62, 'edit-document', 'web', NULL, NULL),
(63, 'manage-receipt', 'web', NULL, NULL),
(64, 'create-receipt', 'web', NULL, NULL),
(65, 'delete-receipt', 'web', NULL, NULL),
(66, 'show-receipt', 'web', NULL, NULL),
(67, 'edit-receipt', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `name` varchar(255) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_status` varchar(255) NOT NULL,
  `receipt_file` varchar(255) NOT NULL,
  `dairy_date` varchar(255) NOT NULL,
  `form_of_communication` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `receved_date` varchar(255) NOT NULL,
  `letter_date` varchar(255) NOT NULL,
  `letter_ref_no` varchar(255) NOT NULL,
  `delivery_mode` varchar(255) NOT NULL,
  `mode_number` varchar(255) NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `vip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `organitation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `receipt_status`, `receipt_file`, `dairy_date`, `form_of_communication`, `language`, `receved_date`, `letter_date`, `letter_ref_no`, `delivery_mode`, `mode_number`, `sender_type`, `vip`, `name`, `department`, `designation`, `organitation`, `email`, `address`, `pin_code`, `phone_number`, `country`, `state`, `city`, `category`, `subcategory`, `subject`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 'physical', 'C:\\xampp\\tmp\\php7DA1.tmp', '1982-01-27', '1', '#', '1975-11-23', '1978-07-02', 'Dolore consequatur', '1', '272', '3', '2', 'Derek Wood', '4', 'In dignissimos esse', 'Autem explicabo Exp', 'xycofovoqa@mailinator.com', 'Accusamus asperiores', 'Optio debitis molli', '+1 (723) 358-4414', '105', '24', 'Et eum aliquam inven', '3', '15', 'Qui voluptas ducimus', 'Doloribus duis imped', '2024-07-08 01:18:23', '2024-07-08 01:18:23'),
(3, 'physical', 'C:\\xampp\\tmp\\php7744.tmp', '2000-07-26', '5', 'English', '2019-11-03', '2016-10-22', 'Perspiciatis sunt', '2', '982', '2', '1', 'Russell Maldonado', '6', 'Adipisci modi sequi', 'Similique qui dolor', 'liba@mailinator.com', 'Voluptatem aliqua Q', 'Cupiditate dolorem m', '+1 (425) 654-2626', '105', '6', 'Illum obcaecati rer', '1', '16', 'Et reiciendis minus', 'Qui ea omnis volupta', '2024-07-08 01:19:27', '2024-07-08 01:19:27'),
(4, 'electronic', 'C:\\xampp\\tmp\\phpCADD.tmp', '1998-07-15', '1', 'odia', '1984-05-31', '1971-04-14', 'Ipsa in sequi sint', '2', '213', '2', '1', 'Louis Collins', '3', 'Id totam autem reici', 'Sint repellendus Et', 'vepojup@mailinator.com', 'Sed in fugit quod d', 'A sit aperiam enim c', '+1 (574) 971-8434', '105', '23', 'Fugiat dolorem exer', '5', '6', 'Nisi aliquid laborum', 'Voluptatibus quibusd', '2024-07-09 06:03:13', '2024-07-09 06:03:13'),
(5, 'electronic', 'C:\\xampp\\tmp\\phpF3CE.tmp', '1971-09-15', '6', '#', '1988-02-16', '2016-08-16', 'Illo neque labore at', '1', '789', '2', '5', 'Ethan Duran', '2', 'Quo nostrum dolorem', 'Tempora molestias cu', 'hyrehilin@mailinator.com', 'Quod ad cupidatat na', 'Et eveniet repellen', '+1 (354) 425-4046', '105', '34', 'Fugit non doloribus', '3', '7', 'Eos sunt sed tempo', 'Aut ea ut dolor earu', '2024-07-09 06:04:29', '2024-07-09 06:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `receiptshares`
--

CREATE TABLE `receiptshares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_id` varchar(255) DEFAULT NULL,
  `sender_id` varchar(255) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `recever_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receiptshares`
--

INSERT INTO `receiptshares` (`id`, `receipt_id`, `sender_id`, `department_id`, `section_id`, `recever_id`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '4', '5', '3', '2024-07-09 04:46:51', '2024-07-09 04:46:51'),
(2, '3', '1', '5', '14', '2', '2024-07-09 05:03:15', '2024-07-09 05:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(2, 'user', 'web', '2024-05-08 04:54:08', '2024-05-08 04:54:08'),
(3, 'index', 'web', '2024-07-08 01:59:18', '2024-07-08 01:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(2, 'Administration', '1', '2024-05-09 00:49:03', '2024-05-14 23:42:28'),
(3, 'produc', '2', '2024-05-09 00:49:54', '2024-05-14 23:43:33'),
(4, 'Local SEO', '4', '2024-05-09 00:50:34', '2024-05-14 23:46:10'),
(5, 'Technical SEO', '4', '2024-05-09 01:05:59', '2024-05-14 23:46:25'),
(6, 'Technical marketing', '2', '2024-05-09 01:06:10', '2024-05-14 23:49:41'),
(7, 'HR Manager', '1', '2024-05-09 01:06:19', '2024-05-14 23:51:07'),
(8, 'Recruitment', '1', '2024-05-09 06:17:59', '2024-05-14 23:51:30'),
(9, 'business ethics', '3', '2024-05-15 00:05:50', '2024-05-15 00:05:50'),
(10, 'business analysis', '3', '2024-05-15 00:06:07', '2024-05-15 00:06:07'),
(11, 'Digital Marketing', '6', '2024-05-15 00:06:50', '2024-05-15 00:06:50'),
(12, 'Project Management', '6', '2024-05-15 00:07:08', '2024-05-15 00:07:08'),
(13, 'Definitions', '5', '2024-05-15 00:08:24', '2024-05-15 00:08:24'),
(14, 'Memorandum', '5', '2024-05-15 00:08:47', '2024-05-15 00:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `sendertypes`
--

CREATE TABLE `sendertypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sendertype` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sendertypes`
--

INSERT INTO `sendertypes` (`id`, `sendertype`, `created_at`, `updated_at`) VALUES
(2, 'fddf', '2024-07-08 00:18:40', '2024-07-08 00:18:40'),
(3, 'rfsdfgfgg', '2024-07-08 00:18:43', '2024-07-08 00:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `senderId` int(255) NOT NULL,
  `form_date` text NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `department_id` int(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `receverid` int(11) NOT NULL,
  `modifiedBy` varchar(255) NOT NULL,
  `deletedBy` varchar(255) NOT NULL,
  `deleted_at` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doc_id` int(11) NOT NULL,
  `sharetype` varchar(225) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `revert_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `name`, `role`, `file_id`, `senderId`, `form_date`, `to_date`, `department_id`, `section_id`, `receverid`, `modifiedBy`, `deletedBy`, `deleted_at`, `created_at`, `updated_at`, `doc_id`, `sharetype`, `status`, `revert_status`) VALUES
(1, NULL, '', '5', 1, '', '', 5, 14, 2, '', '', '', '2024-07-08 01:56:20', '2024-07-08 01:56:20', 28, 'user', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARAKHAND', 105),
(34, 'JHARKHAND', 105),
(35, 'CHHATTISGARH', 105),
(37, 'Telangana', 105);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'BlueStar', NULL, '5', '2024-05-08 23:56:41', '2024-05-14 23:39:12'),
(6, 'tablet.', NULL, '3', '2024-05-08 23:56:55', '2024-05-14 23:39:36'),
(7, 'pamphlet.', NULL, '3', '2024-05-08 23:57:08', '2024-05-14 23:39:51'),
(8, 'Decanter', NULL, '4', '2024-05-08 23:57:20', '2024-05-14 23:40:25'),
(9, 'redmi', NULL, '1', '2024-05-14 23:54:47', '2024-05-14 23:54:47'),
(10, 'Tower Fans', NULL, '2', '2024-05-14 23:55:31', '2024-05-14 23:55:31'),
(11, 'Floor Fans', NULL, '2', '2024-05-14 23:55:49', '2024-05-14 23:55:49'),
(12, 'vivo', NULL, '1', '2024-05-14 23:56:06', '2024-05-14 23:56:06'),
(13, 'paper', NULL, '3', '2024-05-14 23:58:29', '2024-05-14 23:58:29'),
(14, 'Plastic bottle', NULL, '4', '2024-05-14 23:59:51', '2024-05-14 23:59:51'),
(15, 'Water bottle', NULL, '4', '2024-05-15 00:00:37', '2024-05-15 00:00:37'),
(16, 'window air conditioners', NULL, '5', '2024-05-15 00:03:11', '2024-05-15 00:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `department_id`, `section_id`, `email_verified_at`, `password`, `type`, `lang`, `created_by`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@example.com', NULL, 0, NULL, '$2y$10$aS1iixFfzykR6alVGI8G5eHp.PCBRKLqzD6KaLvBhwA14Mzln2y7G', 'admin', 'en', 0, 'avatar.png', NULL, '2024-05-08 04:54:09', '2024-05-14 03:28:08'),
(2, 'anitasethi', 'anitasethi@gmail.com', 5, 14, NULL, '$2y$10$hfwp1/Occ00jskhKB8Jx7.fj5hZV87mu8GY.dgRq.8MFcUh/HUhO.', 'admin', '', 1, NULL, NULL, '2024-07-08 01:43:57', '2024-07-08 01:43:57'),
(3, 'Uttam kumar mohanta', 'uttamkumarmohanta43@gmail.com', 4, 5, NULL, '$2y$10$.n1mqAij.QW1G/t5gQsGJOJx.Djpj/HCd633stQiFknbxVgahwKL6', 'user', '', 1, NULL, NULL, '2024-07-08 02:55:54', '2024-07-08 02:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `vips`
--

CREATE TABLE `vips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vips`
--

INSERT INTO `vips` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tyhfthfh', '2024-07-08 00:17:11', '2024-07-08 00:17:11'),
(2, 'tyrgrtg', '2024-07-08 00:17:19', '2024-07-08 00:17:19'),
(3, 'thygtgtg', '2024-07-08 00:17:23', '2024-07-08 00:17:23'),
(4, 'rtgrtgzrf', '2024-07-08 00:17:28', '2024-07-08 00:17:28'),
(5, 'rtrt55', '2024-07-08 00:17:32', '2024-07-08 00:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `yellownotes`
--

CREATE TABLE `yellownotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `description` varchar(250) NOT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `modifyBy` int(11) DEFAULT NULL,
  `deletedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yellownotes`
--

INSERT INTO `yellownotes` (`id`, `file_id`, `description`, `createdBy`, `modifyBy`, `deletedBy`, `created_at`, `updated_at`) VALUES
(6, 7, '<p>kjhjhgju</p>', 1, NULL, NULL, '2024-07-12 04:31:29', '2024-07-12 04:31:29'),
(7, 6, '<p>sdsdasdsad</p>', 1, NULL, NULL, '2024-07-12 04:47:02', '2024-07-12 04:47:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communications`
--
ALTER TABLE `communications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `correspondences`
--
ALTER TABLE `correspondences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverymodes`
--
ALTER TABLE `deliverymodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileshares`
--
ALTER TABLE `fileshares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_securities`
--
ALTER TABLE `login_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `moduals`
--
ALTER TABLE `moduals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiptshares`
--
ALTER TABLE `receiptshares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sendertypes`
--
ALTER TABLE `sendertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vips`
--
ALTER TABLE `vips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yellownotes`
--
ALTER TABLE `yellownotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `communications`
--
ALTER TABLE `communications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `correspondences`
--
ALTER TABLE `correspondences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `deliverymodes`
--
ALTER TABLE `deliverymodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fileshares`
--
ALTER TABLE `fileshares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_securities`
--
ALTER TABLE `login_securities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `moduals`
--
ALTER TABLE `moduals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receiptshares`
--
ALTER TABLE `receiptshares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sendertypes`
--
ALTER TABLE `sendertypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vips`
--
ALTER TABLE `vips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yellownotes`
--
ALTER TABLE `yellownotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
