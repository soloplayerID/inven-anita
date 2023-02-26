-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 02:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Tambah KategoriMakanan', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-28 13:58:51', '2022-12-28 13:58:51'),
(2, 'default', 'Tambah Product Baksi', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-28 13:59:56', '2022-12-28 13:59:56'),
(3, 'default', 'Update Menu Bakso', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-28 14:00:04', '2022-12-28 14:00:04'),
(4, 'default', 'Tambah Transaksi INV2037901768', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-28 14:00:46', '2022-12-28 14:00:46'),
(5, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-28 14:06:08', '2022-12-28 14:06:08'),
(6, 'default', 'Menghapus Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-28 14:32:22', '2022-12-28 14:32:22'),
(7, 'default', 'Menghapus Transaksi INV2037901768', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-28 15:49:38', '2022-12-28 15:49:38'),
(8, 'default', 'KategoriBAHAN BANGUNAN di update menjadi BAHAN BANGUNAN', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 06:34:36', '2022-12-29 06:34:36'),
(9, 'default', 'KategoriBAHAN BANGUNAN Telah Di Hapus', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 06:44:17', '2022-12-29 06:44:17'),
(10, 'default', 'Tambah KategoriBahan Bangunan', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 06:44:32', '2022-12-29 06:44:32'),
(11, 'default', 'Tambah Product Pasir putih', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 06:45:51', '2022-12-29 06:45:51'),
(12, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 06:48:10', '2022-12-29 06:48:10'),
(13, 'default', 'Tambah Transaksi INV1864601607', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 06:55:17', '2022-12-29 06:55:17'),
(14, 'default', 'Tambah Product PRODUK AZ', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 08:50:50', '2022-12-29 08:50:50'),
(15, 'default', 'Tambah Transaksi INV214185736', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 08:51:28', '2022-12-29 08:51:28'),
(16, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 08:56:13', '2022-12-29 08:56:13'),
(17, 'default', 'Tambah Transaksi INV252917514', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 08:57:02', '2022-12-29 08:57:02'),
(18, 'default', 'Tambah Transaksi INV1578126645', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 08:57:27', '2022-12-29 08:57:27'),
(19, 'default', 'Tambah Transaksi INV758705338', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:00:55', '2022-12-29 09:00:55'),
(20, 'default', 'Tambah Transaksi INV1710654946', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:01:47', '2022-12-29 09:01:47'),
(21, 'default', 'Tambah Transaksi INV1960136301', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:06:09', '2022-12-29 09:06:09'),
(22, 'default', 'Tambah Transaksi INV1456470891', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:12:56', '2022-12-29 09:12:56'),
(23, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 09:13:40', '2022-12-29 09:13:40'),
(24, 'default', 'Tambah Transaksi INV1539063053', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:14:21', '2022-12-29 09:14:21'),
(25, 'default', 'Tambah Transaksi INV305686195', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:16:13', '2022-12-29 09:16:13'),
(26, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 09:16:38', '2022-12-29 09:16:38'),
(27, 'default', 'Tambah Transaksi INV1961592267', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:17:02', '2022-12-29 09:17:02'),
(28, 'default', 'Tambah Transaksi INV555708792', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:17:35', '2022-12-29 09:17:35'),
(29, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 09:20:48', '2022-12-29 09:20:48'),
(30, 'default', 'Tambah Transaksi INV274955783', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:21:31', '2022-12-29 09:21:31'),
(31, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 09:23:12', '2022-12-29 09:23:12'),
(32, 'default', 'Tambah Transaksi INV1429357247', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 09:23:40', '2022-12-29 09:23:40'),
(33, 'default', 'Tambah Product PAKU', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-29 10:02:43', '2022-12-29 10:02:43'),
(34, 'default', 'Tambah Transaksi INV1855192174', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-29 10:04:40', '2022-12-29 10:04:40'),
(35, 'default', 'Tambah Product semen', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 04:52:59', '2022-12-30 04:52:59'),
(36, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 04:57:16', '2022-12-30 04:57:16'),
(37, 'default', 'Tambah Transaksi INV1462584984', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-30 04:58:53', '2022-12-30 04:58:53'),
(38, 'default', 'Tambah Product Pasir', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:33:10', '2022-12-30 05:33:10'),
(39, 'default', 'Tambah Transaksi INV321679085', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-30 05:33:53', '2022-12-30 05:33:53'),
(40, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:34:39', '2022-12-30 05:34:39'),
(41, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:35:06', '2022-12-30 05:35:06'),
(42, 'default', 'Tambah Transaksi INV1820905988', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-30 05:35:42', '2022-12-30 05:35:42'),
(43, 'default', 'Tambah Product Produk Baru', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:48:33', '2022-12-30 05:48:33'),
(44, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:49:36', '2022-12-30 05:49:36'),
(45, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:52:35', '2022-12-30 05:52:35'),
(46, 'default', 'Tambah Transaksi INV282961466', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-30 05:53:15', '2022-12-30 05:53:15'),
(47, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:54:41', '2022-12-30 05:54:41'),
(48, 'default', 'Tambah Product Baci', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:56:22', '2022-12-30 05:56:22'),
(49, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:56:47', '2022-12-30 05:56:47'),
(50, 'default', 'Tambah Transaksi INV1398098213', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-30 05:57:42', '2022-12-30 05:57:42'),
(51, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 05:58:27', '2022-12-30 05:58:27'),
(52, 'default', 'Tambah Product Cat Tembok', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 06:29:06', '2022-12-30 06:29:06'),
(53, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 06:29:29', '2022-12-30 06:29:29'),
(54, 'default', 'Tambah Transaksi INV534530437', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-30 06:32:34', '2022-12-30 06:32:34'),
(55, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2022-12-30 06:50:47', '2022-12-30 06:50:47'),
(56, 'default', 'Tambah Transaksi INV1897852434', NULL, NULL, 'App\\Models\\User', 2, '[]', '2022-12-30 06:52:16', '2022-12-30 06:52:16'),
(57, 'default', 'Tambah Transaksi INV138503066', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 03:08:50', '2023-02-09 03:08:50'),
(58, 'default', 'Tambah Transaksi INV1631976976', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 03:10:00', '2023-02-09 03:10:00'),
(59, 'default', 'Tambah Transaksi INV151640898', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 03:10:46', '2023-02-09 03:10:46'),
(60, 'default', 'Tambah Transaksi INV394614126', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 06:05:55', '2023-02-09 06:05:55'),
(61, 'default', 'Tambah KategoriPASIR', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-09 06:10:18', '2023-02-09 06:10:18'),
(62, 'default', 'Tambah Product semen', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-09 06:11:24', '2023-02-09 06:11:24'),
(63, 'default', 'Tambah Product pasir abadi', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-09 06:24:09', '2023-02-09 06:24:09'),
(64, 'default', 'Tambah Transaksi INV124277407', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 06:27:11', '2023-02-09 06:27:11'),
(65, 'default', 'Tambah Transaksi INV1270043843', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 06:27:54', '2023-02-09 06:27:54'),
(66, 'default', 'Tambah Transaksi INV959839187', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 06:44:25', '2023-02-09 06:44:25'),
(67, 'default', 'Tambah Transaksi INV707950731', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 06:45:32', '2023-02-09 06:45:32'),
(68, 'default', 'Tambah Transaksi INV961862042', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 06:48:24', '2023-02-09 06:48:24'),
(69, 'default', 'Tambah Transaksi INV182196818', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 06:49:43', '2023-02-09 06:49:43'),
(70, 'default', 'Tambah Transaksi INV1791958944', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 07:02:59', '2023-02-09 07:02:59'),
(71, 'default', 'Tambah Transaksi INV550333824', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 07:04:35', '2023-02-09 07:04:35'),
(72, 'default', 'Tambah Transaksi INV1607689990', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-09 07:05:42', '2023-02-09 07:05:42'),
(73, 'default', 'Tambah Transaksi INV808739584', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 00:48:17', '2023-02-12 00:48:17'),
(74, 'default', 'Tambah Transaksi INV695983750', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 00:50:58', '2023-02-12 00:50:58'),
(75, 'default', 'Tambah Transaksi INV794083717', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:43:54', '2023-02-12 01:43:54'),
(76, 'default', 'Tambah Transaksi INV1707405410', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:48:27', '2023-02-12 01:48:27'),
(77, 'default', 'Tambah Transaksi INV917637692', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:52:55', '2023-02-12 01:52:55'),
(78, 'default', 'Tambah Transaksi INV205293706', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:53:50', '2023-02-12 01:53:50'),
(79, 'default', 'Tambah Transaksi INV1967189806', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:55:55', '2023-02-12 01:55:55'),
(80, 'default', 'Tambah Transaksi INV1967189806', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:55:55', '2023-02-12 01:55:55'),
(81, 'default', 'Tambah Transaksi INV380763398', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:58:05', '2023-02-12 01:58:05'),
(82, 'default', 'Tambah Transaksi INV380763398', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 01:58:05', '2023-02-12 01:58:05'),
(83, 'default', 'Update Menu pasir abadi', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-12 14:39:59', '2023-02-12 14:39:59'),
(84, 'default', 'Tambah KategoriCAT', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-12 14:41:23', '2023-02-12 14:41:23'),
(85, 'default', 'Tambah Product Cat Dulux', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-12 14:42:32', '2023-02-12 14:42:32'),
(86, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-12 14:43:40', '2023-02-12 14:43:40'),
(87, 'default', 'Tambah Transaksi INV197219859', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 14:50:47', '2023-02-12 14:50:47'),
(88, 'default', 'Tambah Transaksi INV197219859', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 14:50:47', '2023-02-12 14:50:47'),
(89, 'default', 'Tambah Transaksi INV137180279', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-12 23:11:35', '2023-02-12 23:11:35'),
(90, 'default', 'Tambah KategoriBESI', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-13 01:35:19', '2023-02-13 01:35:19'),
(91, 'default', 'Tambah Product BETON', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-13 01:36:16', '2023-02-13 01:36:16'),
(92, 'default', 'Restock Product', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-13 01:36:41', '2023-02-13 01:36:41'),
(93, 'default', 'Tambah Transaksi INV348068515', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-13 01:38:32', '2023-02-13 01:38:32'),
(94, 'default', 'Update Menu Paku', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-13 10:55:54', '2023-02-13 10:55:54'),
(95, 'default', 'Tambah KategoriBESI', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:07:26', '2023-02-19 03:07:26'),
(96, 'default', 'Tambah KategoriBAJA', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:08:06', '2023-02-19 03:08:06'),
(97, 'default', 'Tambah KategoriPASIR', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:10:18', '2023-02-19 03:10:18'),
(98, 'default', 'Tambah KategoriPASIR', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:10:43', '2023-02-19 03:10:43'),
(99, 'default', 'Tambah KategoriPERLENGKAPAN SANITARY', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:12:31', '2023-02-19 03:12:31'),
(100, 'default', 'KategoriPASIR Telah Di Hapus', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:14:22', '2023-02-19 03:14:22'),
(101, 'default', 'Tambah KategoriANORGANIK', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:15:12', '2023-02-19 03:15:12'),
(102, 'default', 'Tambah KategoriBAHAN BAKU', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 03:15:57', '2023-02-19 03:15:57'),
(103, 'default', 'Tambah Product Besi beton 6mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 04:08:53', '2023-02-19 04:08:53'),
(104, 'default', 'Update Menu Besi beton 6mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 04:12:58', '2023-02-19 04:12:58'),
(105, 'default', 'Tambah Product Besi beton 8mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 04:14:41', '2023-02-19 04:14:41'),
(106, 'default', 'Tambah Product Besi beton 10mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 04:17:12', '2023-02-19 04:17:12'),
(107, 'default', 'Tambah Product Besi beton 12mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 04:50:25', '2023-02-19 04:50:25'),
(108, 'default', 'Tambah KategoriCAT', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 09:27:27', '2023-02-19 09:27:27'),
(109, 'default', 'Tambah Product Cat romatex black 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 09:43:58', '2023-02-19 09:43:58'),
(110, 'default', 'Tambah Product Cat romatex white 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 09:45:56', '2023-02-19 09:45:56'),
(111, 'default', 'Update Menu Cat romatex white 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 09:48:34', '2023-02-19 09:48:34'),
(112, 'default', 'Tambah Product Cat romatex mari gold 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:05:37', '2023-02-19 10:05:37'),
(113, 'default', 'Tambah Product Cat romatex tropicana 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:11:42', '2023-02-19 10:11:42'),
(114, 'default', 'Tambah Product Cat romatex tropicana 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:16:14', '2023-02-19 10:16:14'),
(115, 'default', 'Tambah Product Cat romatex white 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:25:18', '2023-02-19 10:25:18'),
(116, 'default', 'Update Menu Cat romatex tropicana 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:26:15', '2023-02-19 10:26:15'),
(117, 'default', 'Update Menu Cat romatex white 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:28:19', '2023-02-19 10:28:19'),
(118, 'default', 'Update Menu Cat romatex tropicana 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:29:30', '2023-02-19 10:29:30'),
(119, 'default', 'Tambah Product Cat romatex cool blue 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:36:10', '2023-02-19 10:36:10'),
(120, 'default', 'Tambah Product Cat romatex ivory 1kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:52:29', '2023-02-19 10:52:29'),
(121, 'default', 'Tambah Product Cat romatex black 1kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 10:55:25', '2023-02-19 10:55:25'),
(122, 'default', 'Tambah Product Cat vinilex green gauze 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 11:00:34', '2023-02-19 11:00:34'),
(123, 'default', 'Tambah Product Cat vinilex orange 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 11:04:17', '2023-02-19 11:04:17'),
(124, 'default', 'Tambah Product Cat vinilex white 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 11:06:51', '2023-02-19 11:06:51'),
(125, 'default', 'Tambah Product Cat vinilex blue entry 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 14:40:41', '2023-02-19 14:40:41'),
(126, 'default', 'Tambah Product Cat vinilex dolphin grey 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 14:42:58', '2023-02-19 14:42:58'),
(127, 'default', 'Tambah Product Cat vinilex white 1kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 14:47:41', '2023-02-19 14:47:41'),
(128, 'default', 'Tambah Product Cat vinilex sashay red 1kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 14:54:32', '2023-02-19 14:54:32'),
(129, 'default', 'Tambah Product Cat metrolite cream 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 14:57:47', '2023-02-19 14:57:47'),
(130, 'default', 'Tambah Product Cat metrolite white 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:00:12', '2023-02-19 15:00:12'),
(131, 'default', 'Tambah Product Cat metrolite blue 5kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:02:59', '2023-02-19 15:02:59'),
(132, 'default', 'Tambah Product Cat metrolite white 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:07:08', '2023-02-19 15:07:08'),
(133, 'default', 'Tambah Product Cat metrolite cream 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:09:14', '2023-02-19 15:09:14'),
(134, 'default', 'Tambah Product Cat metrolite blue sea 25kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:12:08', '2023-02-19 15:12:08'),
(135, 'default', 'Tambah Product Cat metrolite yellow 1kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:14:55', '2023-02-19 15:14:55'),
(136, 'default', 'Tambah Product Cat metrolite green 1kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:16:31', '2023-02-19 15:16:31'),
(137, 'default', 'Tambah Product Paku beton seri 5-12cm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:20:52', '2023-02-19 15:20:52'),
(138, 'default', 'Tambah Product Paku beton 4cm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:23:09', '2023-02-19 15:23:09'),
(139, 'default', 'Tambah Product Paku beton 3cm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:25:37', '2023-02-19 15:25:37'),
(140, 'default', 'Tambah Product Paku seng payung 5-7cm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:29:57', '2023-02-19 15:29:57'),
(141, 'default', 'Tambah Product Pasir rangkas bitung 1 kubik', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:32:04', '2023-02-19 15:32:04'),
(142, 'default', 'Tambah Product Bata merah', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:33:53', '2023-02-19 15:33:53'),
(143, 'default', 'Tambah Product Semen tiga roda', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:40:23', '2023-02-19 15:40:23'),
(144, 'default', 'Tambah Product Semen tiga roda 40kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-19 15:42:39', '2023-02-19 15:42:39'),
(145, 'default', 'Tambah Product Hebel  7,5 cm (111 biji)', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 01:48:59', '2023-02-20 01:48:59'),
(146, 'default', 'Tambah Product Hebel 10cm (83 biji)', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 01:50:34', '2023-02-20 01:50:34'),
(147, 'default', 'Tambah Product Triplek 3mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 01:58:14', '2023-02-20 01:58:14'),
(148, 'default', 'Update Menu Triplek 3 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 01:59:16', '2023-02-20 01:59:16'),
(149, 'default', 'Tambah Product Triplek 4 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:00:36', '2023-02-20 02:00:36'),
(150, 'default', 'Tambah Product Triplek 6 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:02:30', '2023-02-20 02:02:30'),
(151, 'default', 'Tambah Product Triplek 9 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:03:46', '2023-02-20 02:03:46'),
(152, 'default', 'Tambah Product Triplek 12 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:05:14', '2023-02-20 02:05:14'),
(153, 'default', 'Tambah Product Triplek 15 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:06:24', '2023-02-20 02:06:24'),
(154, 'default', 'Tambah Product Triplek 18 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:07:39', '2023-02-20 02:07:39'),
(155, 'default', 'Tambah Product Pintu PVC Pink', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:16:43', '2023-02-20 02:16:43'),
(156, 'default', 'Tambah Product Pintu PVC Biru', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:18:46', '2023-02-20 02:18:46'),
(157, 'default', 'Tambah Product Pintu PVC Coklat', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:23:50', '2023-02-20 02:23:50'),
(158, 'default', 'Tambah Product Closet Jongkok INA', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:29:44', '2023-02-20 02:29:44'),
(159, 'default', 'Update Menu Pintu PVC Coklat', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:30:23', '2023-02-20 02:30:23'),
(160, 'default', 'Update Menu Pintu PVC Biru', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:35:09', '2023-02-20 02:35:09'),
(161, 'default', 'Update Menu Pintu PVC Pink', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:35:50', '2023-02-20 02:35:50'),
(162, 'default', 'Tambah Product Kran plastik Sanho', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:38:01', '2023-02-20 02:38:01'),
(163, 'default', 'Tambah Product Kran Soligen', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:41:12', '2023-02-20 02:41:12'),
(164, 'default', 'Tambah Product Kran Yuta', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:42:19', '2023-02-20 02:42:19'),
(165, 'default', 'Tambah Product Kran Mavis', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:45:10', '2023-02-20 02:45:10'),
(166, 'default', 'Tambah Product Bak Cuci Piring Edon  1 meter', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:51:20', '2023-02-20 02:51:20'),
(167, 'default', 'Tambah Product Bak Cuci Piring Edon 80 cm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:52:36', '2023-02-20 02:52:36'),
(168, 'default', 'Tambah Product Bak Cuci Piring edon tanpa meja 45 cm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 02:55:45', '2023-02-20 02:55:45'),
(169, 'default', 'Tambah Product Bak Cuci Piring 1 meter', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:01:14', '2023-02-20 03:01:14'),
(170, 'default', 'Tambah Product Bak Cuci Piring 80 cm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:02:19', '2023-02-20 03:02:19'),
(171, 'default', 'Tambah KategoriBAHAN BANGUNAN', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:09:01', '2023-02-20 03:09:01'),
(172, 'default', 'Tambah Product Asbes Djabesmen 1,5 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:14:18', '2023-02-20 03:14:18'),
(173, 'default', 'Tambah Product Asbes Djabesmen 1,8 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:15:39', '2023-02-20 03:15:39'),
(174, 'default', 'Tambah Product Asbes Djabesmen 2,1 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:16:54', '2023-02-20 03:16:54'),
(175, 'default', 'Tambah Product Asbes Djabesmen 2,4 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:17:56', '2023-02-20 03:17:56'),
(176, 'default', 'Tambah Product Asbes Djabesmen 2,7 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:19:21', '2023-02-20 03:19:21'),
(177, 'default', 'Update Menu Asbes Djabesmen 2,4 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:20:26', '2023-02-20 03:20:26'),
(178, 'default', 'Update Menu Asbes Djabesmen 1,5 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:20:57', '2023-02-20 03:20:57'),
(179, 'default', 'Tambah Product Asbes Djabesmen 3 m', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:22:27', '2023-02-20 03:22:27'),
(180, 'default', 'Tambah KategoriTHINNER', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:26:06', '2023-02-20 03:26:06'),
(181, 'default', 'Tambah KategoriKUAS', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:27:11', '2023-02-20 03:27:11'),
(182, 'default', 'Tambah Product Thinner Impala 1 Liter', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:30:56', '2023-02-20 03:30:56'),
(183, 'default', 'Update Menu Thinner Impala 1 Liter', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:34:10', '2023-02-20 03:34:10'),
(184, 'default', 'Tambah Product Thinner Bola 1 Liter', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:37:22', '2023-02-20 03:37:22'),
(185, 'default', 'Tambah Product Kawat Beton', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:42:48', '2023-02-20 03:42:48'),
(186, 'default', 'Tambah Product Kuas Eterna  1 inch', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:51:38', '2023-02-20 03:51:38'),
(187, 'default', 'Tambah Product Kuas Eterna 1,5 inch', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:53:39', '2023-02-20 03:53:39'),
(188, 'default', 'Tambah Product Kuas Eterna 2  inch', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:55:23', '2023-02-20 03:55:23'),
(189, 'default', 'Tambah Product Kuas Eterna 2,5 inch', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 03:57:19', '2023-02-20 03:57:19'),
(190, 'default', 'Tambah Product Kuas Eterna 3 inch', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:00:55', '2023-02-20 04:00:55'),
(191, 'default', 'Tambah Product Kuas Eterna 4 inch', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:03:38', '2023-02-20 04:03:38'),
(192, 'default', 'Tambah Product Gypsum yoshino 9 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:10:51', '2023-02-20 04:10:51'),
(193, 'default', 'Tambah Product Gypsum grc 99 mm', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:14:21', '2023-02-20 04:14:21'),
(194, 'default', 'KategoriCAT TEMBOK di update menjadi CAT TEMBOK', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:16:33', '2023-02-20 04:16:33'),
(195, 'default', 'Tambah KategoriCAT KAYU', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:23:27', '2023-02-20 04:23:27'),
(196, 'default', 'Tambah Product Cat Kayu besi Emco 1 kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:32:05', '2023-02-20 04:32:05'),
(197, 'default', 'Tambah Product Cat Kayu besi romatex 1 kg', NULL, NULL, 'App\\Models\\User', 5, '[]', '2023-02-20 04:37:05', '2023-02-20 04:37:05'),
(198, 'default', 'Tambah Transaksi INV934412847', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-20 13:44:55', '2023-02-20 13:44:55'),
(199, 'default', 'Tambah Transaksi INV934412847', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-20 13:44:55', '2023-02-20 13:44:55'),
(200, 'default', 'Tambah Transaksi INV1159184514', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-20 14:03:52', '2023-02-20 14:03:52'),
(201, 'default', 'Tambah Transaksi INV1663038947', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-20 23:56:31', '2023-02-20 23:56:31'),
(202, 'default', 'Tambah Transaksi INV1523745621', NULL, NULL, 'App\\Models\\User', 2, '[]', '2023-02-20 23:58:23', '2023-02-20 23:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` bigint(20) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `alamat`, `telepon`, `email`, `created_at`, `updated_at`) VALUES
(7, 'Pak Oman', NULL, NULL, NULL, '2023-02-20 13:44:55', '2023-02-20 13:44:55'),
(8, 'Pak Oman', NULL, NULL, NULL, '2023-02-20 13:44:55', '2023-02-20 13:44:55'),
(9, 'Pak Adit', NULL, NULL, NULL, '2023-02-20 14:03:52', '2023-02-20 14:03:52'),
(10, 'Pak Jamal', NULL, NULL, NULL, '2023-02-20 23:56:31', '2023-02-20 23:56:31'),
(11, 'Pak dadang', NULL, NULL, NULL, '2023-02-20 23:58:23', '2023-02-20 23:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'BESI', '2023-02-19 03:07:26', '2023-02-19 03:07:26'),
(7, 'BAJA', '2023-02-19 03:08:06', '2023-02-19 03:08:06'),
(8, 'PASIR', '2023-02-19 03:10:18', '2023-02-19 03:10:18'),
(10, 'PERLENGKAPAN SANITARY', '2023-02-19 03:12:31', '2023-02-19 03:12:31'),
(11, 'ANORGANIK', '2023-02-19 03:15:12', '2023-02-19 03:15:12'),
(12, 'BAHAN BAKU', '2023-02-19 03:15:57', '2023-02-19 03:15:57'),
(13, 'CAT TEMBOK', '2023-02-19 09:27:27', '2023-02-20 04:16:33'),
(14, 'BAHAN BANGUNAN', '2023-02-20 03:09:01', '2023-02-20 03:09:01'),
(15, 'THINNER', '2023-02-20 03:26:06', '2023-02-20 03:26:06'),
(16, 'KUAS', '2023-02-20 03:27:11', '2023-02-20 03:27:11'),
(17, 'CAT KAYU', '2023-02-20 04:23:27', '2023-02-20 04:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petugas_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` bigint(20) NOT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `harga` bigint(20) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `kategori_id`, `deskripsi`, `stock`, `stok_awal`, `satuan`, `harga`, `harga_beli`, `gambar`, `created_at`, `updated_at`) VALUES
(6, 'Besi beton 6mm', 6, 'Besi beton 6mm', 100, NULL, 'Perbatang', 37000, 29000, '1676779978_BESI BETON.jpg', '2023-02-19 04:08:53', '2023-02-19 04:12:58'),
(7, 'Besi beton 8mm', 6, 'Besi beton 8ml', 100, NULL, 'Perbatang', 57500, 40000, '1676780081_BESI BETON.jpg', '2023-02-19 04:14:41', '2023-02-19 04:14:41'),
(8, 'Besi beton 10mm', 6, 'Besi beton 10mm', 100, NULL, 'Perbatang', 90000, 79000, '1676780232_BESI BETON.jpg', '2023-02-19 04:17:12', '2023-02-19 04:17:12'),
(9, 'Besi beton 12mm', 6, 'Besi beton 12mm', 100, NULL, 'Perbatang', 130000, 117000, '1676782225_BESI BETON.jpg', '2023-02-19 04:50:25', '2023-02-19 04:50:25'),
(10, 'Cat romatex black 5kg', 13, 'Cat romatex 5kg', 20, NULL, 'Galon', 110000, 95000, '1676799838_CAT ROMATEX BLACK 5KG.jpg', '2023-02-19 09:43:58', '2023-02-19 09:43:58'),
(11, 'Cat romatex white 5kg', 13, 'romatex white 5kg', 20, NULL, 'Galon', 110000, 95000, '1676799956_ROMATEX 5KG WHITE.jpg', '2023-02-19 09:45:56', '2023-02-19 09:48:34'),
(12, 'Cat romatex mari gold 5kg', 13, 'romatex marigold', 20, NULL, 'Galon', 110000, 95000, '1676801137_ROMATEX 5KG MARI GOLD.jpg', '2023-02-19 10:05:37', '2023-02-19 10:05:37'),
(13, 'Cat romatex tropicana 5kg', 13, 'romatex tropicana 5kg', 20, NULL, 'Galon', 110000, 95000, '1676801502_romatex 5kg tropicana.jpg', '2023-02-19 10:11:42', '2023-02-19 10:11:42'),
(14, 'Cat romatex tropicana 25kg', 13, 'tropicana 25kg', 10, NULL, 'Pelt', 500000, 480000, '1676801774_romatex 25kg tropicana.jpg', '2023-02-19 10:16:14', '2023-02-19 10:29:30'),
(15, 'Cat romatex white 25kg', 13, 'romatex white 25kg', 15, NULL, 'Pelt', 500000, 480000, '1676802318_romatex 25kg white.jpg', '2023-02-19 10:25:18', '2023-02-19 10:28:19'),
(16, 'Cat romatex cool blue 25kg', 13, 'romatex cool blue 25kg', 10, NULL, 'Pelt', 500000, 480000, '1676802970_romatex coll blue 25kg.jpg', '2023-02-19 10:36:10', '2023-02-19 10:36:10'),
(17, 'Cat romatex ivory 1kg', 13, 'romatex ivory 1kg', 10, NULL, 'Kaleng', 52000, 40000, '1676803949_romatex 1kg ivory.jfif', '2023-02-19 10:52:29', '2023-02-19 10:52:29'),
(18, 'Cat romatex black 1kg', 13, 'romatex 1kg black', 10, NULL, 'Kaleng', 52000, 40000, '1676804125_black romatex 1kg.jpg', '2023-02-19 10:55:25', '2023-02-19 10:55:25'),
(19, 'Cat vinilex green gauze 5kg', 13, 'vinilex5kg green gauze', 10, NULL, 'Galon', 170000, 155000, '1676804434_vinilex 5kg green gauze.jfif', '2023-02-19 11:00:34', '2023-02-19 11:00:34'),
(20, 'Cat vinilex orange 5kg', 13, 'vinilex orange 5kg', 5, NULL, 'Galon', 170000, 155000, '1676804657_vinilex 5kg orange.jpg', '2023-02-19 11:04:17', '2023-02-19 11:04:17'),
(21, 'Cat vinilex white 5kg', 13, 'vinilex white 5kg', 10, NULL, 'Galon', 170000, 155000, '1676804811_vinilex white 5kg.jfif', '2023-02-19 11:06:51', '2023-02-19 11:06:51'),
(22, 'Cat vinilex blue entry 25kg', 13, 'vinilex 25kg blue entry', 15, NULL, 'Pelt', 800000, 759000, '1676817641_vinilex 25kg blue entry.jpg', '2023-02-19 14:40:41', '2023-02-19 14:40:41'),
(23, 'Cat vinilex dolphin grey 25kg', 13, 'vinilex 25kg dolphin grey', 10, NULL, 'Pelt', 800000, 759000, '1676817778_vinilex 25kg dolphin grey.jfif', '2023-02-19 14:42:58', '2023-02-19 14:42:58'),
(24, 'Cat vinilex white 1kg', 13, 'vinilex white 1kg', 10, NULL, 'Kaleng', 52000, 43000, '1676818061_vinilex 1kg white.jpg', '2023-02-19 14:47:41', '2023-02-19 14:47:41'),
(25, 'Cat vinilex sashay red 1kg', 13, 'vinilex 1kg red', 10, NULL, 'Kaleng', 52000, 43000, '1676818472_VINILEX RED 1KG.jfif', '2023-02-19 14:54:32', '2023-02-19 14:54:32'),
(26, 'Cat metrolite cream 5kg', 13, 'metrolite cream 5kg', 8, NULL, 'Galon', 150000, 135000, '1676818667_metrolite 25kg cream.jfif', '2023-02-19 14:57:47', '2023-02-19 14:57:47'),
(27, 'Cat metrolite white 5kg', 13, 'metrolite 5kg white', 10, NULL, 'Galon', 150000, 135000, '1676818812_metrolite 5kg white.jfif', '2023-02-19 15:00:12', '2023-02-19 15:00:12'),
(28, 'Cat metrolite blue 5kg', 13, 'metrolite 5kg blue', 5, NULL, 'Galon', 150000, 135000, '1676818979_metrolite 5kg blue.jfif', '2023-02-19 15:02:59', '2023-02-19 15:02:59'),
(29, 'Cat metrolite white 25kg', 13, 'metrolite white 25kg', 7, NULL, 'Pelt', 680000, 639000, '1676819228_metrolite 25kg white.jpg', '2023-02-19 15:07:08', '2023-02-19 15:07:08'),
(30, 'Cat metrolite cream 25kg', 13, 'metrolite 25kg cream', 9, NULL, 'Pelt', 680000, 639000, '1676819354_metrolite 25kg cream.jfif', '2023-02-19 15:09:14', '2023-02-19 15:09:14'),
(31, 'Cat metrolite blue sea 25kg', 13, 'metrolite blue sea 25kg', 8, NULL, 'Pelt', 680000, 639000, '1676819528_metrolite 25kg white.jpg', '2023-02-19 15:12:08', '2023-02-19 15:12:08'),
(32, 'Cat metrolite yellow 1kg', 13, 'metrolite yellow 1kg', 11, NULL, 'Kaleng', 40000, 28000, '1676819695_metrolite 1kg yellow.jpg', '2023-02-19 15:14:55', '2023-02-19 15:14:55'),
(33, 'Cat metrolite green 1kg', 13, 'metrolite green 1kg', 6, NULL, 'Kaleng', 40000, 28000, '1676819791_metrolite 1kg green.jpg', '2023-02-19 15:16:31', '2023-02-19 15:16:31'),
(34, 'Paku beton seri 5-12cm', 6, 'paku seri 5-12cm', 18, NULL, 'Kg', 21000, 14000, '1676820052_paku beton 5 12 cm.jpg', '2023-02-19 15:20:52', '2023-02-19 15:20:52'),
(35, 'Paku beton 4cm', 6, 'paku beton 4cm', 14, NULL, 'Kg', 24000, 15000, '1676820189_paku beton 4cm.jpg', '2023-02-19 15:23:09', '2023-02-19 15:23:09'),
(36, 'Paku beton 3cm', 6, 'paku beton 3cm', 18, NULL, 'Kg', 28000, 19000, '1676820337_paku 3cm.jfif', '2023-02-19 15:25:37', '2023-02-19 15:25:37'),
(37, 'Paku seng payung 5-7cm', 6, 'paku seng 5cm-7cm', 17, NULL, 'Kg', 35000, 28000, '1676820597_paku payung 7cm.jpg', '2023-02-19 15:29:57', '2023-02-19 15:29:57'),
(38, 'Pasir rangkas bitung 1 kubik', 8, 'pasir rangkas', 4, NULL, 'Colt', 310000, 285000, '1676820724_PASIR.jpg', '2023-02-19 15:32:04', '2023-02-20 13:44:55'),
(39, 'Bata merah', 12, 'bata merah', 10000, NULL, 'Biji', 500, 410, '1676820833_bata merah.jfif', '2023-02-19 15:33:53', '2023-02-19 15:33:53'),
(40, 'Semen tiga roda', 12, 'semen tiga roda', 40, NULL, 'Kg', 2000, 450, '1676821223_semen jual kg an.jfif', '2023-02-19 15:40:23', '2023-02-19 15:40:23'),
(41, 'Semen tiga roda 40kg', 12, 'semen 40kg', 19, NULL, 'Sak', 61000, 49000, '1676821359_semen 40kg.jpg', '2023-02-19 15:42:39', '2023-02-20 23:58:23'),
(42, 'Hebel  7,5 cm (111 biji)', 12, 'hebel  kubik', 5, NULL, 'Kubik', 570000, 530000, '1676857739_hebel 7,5 cm.jpg', '2023-02-20 01:48:59', '2023-02-20 01:48:59'),
(43, 'Hebel 10cm (83 biji)', 12, 'hebel 10cm kubik', 5, NULL, 'Kubik', 570000, 530000, '1676857834_hebel 10cm.jpg', '2023-02-20 01:50:34', '2023-02-20 01:50:34'),
(44, 'Triplek 3 mm', 11, 'triplek 3mm', 11, NULL, 'Lembar', 56000, 41000, '1676858294_triplek 3mm.jpg', '2023-02-20 01:58:14', '2023-02-20 01:59:16'),
(45, 'Triplek 4 mm', 11, 'triplek 4 mm', 13, NULL, 'Lembar', 67000, 52000, '1676858436_triplek 4mm.jpg', '2023-02-20 02:00:36', '2023-02-20 02:00:36'),
(46, 'Triplek 6 mm', 12, 'triplek 6 mm', 15, NULL, 'Lembar', 80000, 67000, '1676858550_triplek 6mm.jpg', '2023-02-20 02:02:30', '2023-02-20 02:02:30'),
(47, 'Triplek 9 mm', 11, 'triplek 9 mm', 15, NULL, 'Lembar', 115000, 86000, '1676858626_triplek 9mm.jpg', '2023-02-20 02:03:46', '2023-02-20 02:03:46'),
(48, 'Triplek 12 mm', 11, 'triplek 12 mm', 20, NULL, 'Lembar', 160000, 125000, '1676858714_triplek 12mm.jfif', '2023-02-20 02:05:14', '2023-02-20 02:05:14'),
(49, 'Triplek 15 mm', 11, 'triplek 15 mm', 14, NULL, 'Lembar', 210000, 175000, '1676858784_triplek 15mm.jpeg', '2023-02-20 02:06:24', '2023-02-20 02:06:24'),
(50, 'Triplek 18 mm', 11, 'triplek 18 mm', 16, NULL, 'Lembar', 230000, 205000, '1676858859_triplek 18mm.jpeg', '2023-02-20 02:07:39', '2023-02-20 02:07:39'),
(51, 'Pintu PVC Pink', 10, 'pintu kamar mandi', 10, NULL, 'Biji', 240000, 200000, '1676859403_pintu pvc pink.jfif', '2023-02-20 02:16:43', '2023-02-20 02:35:50'),
(52, 'Pintu PVC Biru', 10, 'pintu kamar mandi pvc biru', 9, NULL, 'Biji', 240000, 210000, '1676859526_pvc biru.jpg', '2023-02-20 02:18:46', '2023-02-20 02:35:09'),
(53, 'Pintu PVC Coklat', 10, 'pintu pvc coklat', 8, NULL, 'Biji', 250000, 210000, '1676859830_PVC COKLAT.jpg', '2023-02-20 02:23:50', '2023-02-20 02:30:23'),
(54, 'Closet Jongkok INA', 10, 'Closet jongkok ina', 8, NULL, 'Biji', 350000, 290000, '1676860184_closet ina.jfif', '2023-02-20 02:29:44', '2023-02-20 02:29:44'),
(55, 'Kran plastik Sanho', 10, 'kran plastik sanho', 10, NULL, 'Biji', 26000, 15000, '1676860681_Kran sanho plastik.jpg', '2023-02-20 02:38:01', '2023-02-20 02:38:01'),
(56, 'Kran Soligen', 10, 'kran soligen', 8, NULL, 'Biji', 25000, 15000, '1676860872_kran soligen.jfif', '2023-02-20 02:41:12', '2023-02-20 23:56:31'),
(57, 'Kran Yuta', 10, 'kran yuta', 10, NULL, 'Biji', 30000, 19000, '1676860939_kran yuta.jfif', '2023-02-20 02:42:19', '2023-02-20 02:42:19'),
(58, 'Kran Mavis', 10, 'kran mavis', 10, NULL, 'Biji', 45000, 34000, '1676861110_mavis.jpg', '2023-02-20 02:45:10', '2023-02-20 02:45:10'),
(59, 'Bak Cuci Piring Edon  1 meter', 10, 'Bak cuci piring EDON 1 meter', 8, NULL, 'Biji', 520000, 480000, '1676861480_bak cuci piring edon.jpg', '2023-02-20 02:51:20', '2023-02-20 02:51:20'),
(60, 'Bak Cuci Piring Edon 80 cm', 10, 'bak cuci piring 80cm', 10, NULL, 'Biji', 480000, 440000, '1676861556_bak cuci piring edon 80cm.jpg', '2023-02-20 02:52:36', '2023-02-20 02:52:36'),
(61, 'Bak Cuci Piring edon tanpa meja 45 cm', 10, 'cuci piring tanpa meja edon', 15, NULL, 'Biji', 430000, 385000, '1676861745_edon tanpa meja.jpg', '2023-02-20 02:55:45', '2023-02-20 02:55:45'),
(62, 'Bak Cuci Piring 1 meter', 10, 'bak cuci piring 1 meter', 10, NULL, 'Biji', 180000, 120000, '1676862074_CUCI PIRING BIASA.jpg', '2023-02-20 03:01:14', '2023-02-20 03:01:14'),
(63, 'Bak Cuci Piring 80 cm', 10, 'bak cuci piring tanpa merk', 9, NULL, 'Biji', 160000, 130000, '1676862139_CUCI PIRING BIASA 80CM.jpg', '2023-02-20 03:02:19', '2023-02-20 03:02:19'),
(64, 'Asbes Djabesmen 1,5 m', 14, 'asbes 1,5 m', 40, NULL, 'Lembar', 49000, 32000, '1676862858_djabesmen 1,5 m.jfif', '2023-02-20 03:14:18', '2023-02-20 03:20:57'),
(65, 'Asbes Djabesmen 1,8 m', 14, 'asbes 1,8 m', 30, NULL, 'Lembar', 58500, 40000, '1676862939_djabesmen 1,8 m.jpg', '2023-02-20 03:15:39', '2023-02-20 03:15:39'),
(66, 'Asbes Djabesmen 2,1 m', 14, 'asbes djabesmen 2,1 m', 30, NULL, 'Lembar', 68000, 45000, '1676863014_djabesmen 2,1 m.jfif', '2023-02-20 03:16:54', '2023-02-20 03:16:54'),
(67, 'Asbes Djabesmen 2,4 m', 14, 'asbes djabesmen 2,4 m', 50, NULL, 'Lembar', 78000, 50000, '1676863076_djabesmen 2,4 m.jfif', '2023-02-20 03:17:56', '2023-02-20 03:20:26'),
(68, 'Asbes Djabesmen 2,7 m', 14, 'asbes 2,7 m', 40, NULL, 'Lembar', 89000, 67000, '1676863161_djabesmen 2,7 m.jpg', '2023-02-20 03:19:21', '2023-02-20 03:19:21'),
(69, 'Asbes Djabesmen 3 m', 14, 'asbes 3 m', 50, NULL, 'Lembar', 101000, 89000, '1676863347_asbes djabesmen 3 m.jpg', '2023-02-20 03:22:27', '2023-02-20 03:22:27'),
(70, 'Thinner Impala 1 Liter', 15, 'thinner impala 1 liter', 30, NULL, 'Kaleng', 38000, 25000, '1676863856_thinner 1 liter impala.jpg', '2023-02-20 03:30:56', '2023-02-20 03:34:10'),
(71, 'Thinner Bola 1 Liter', 15, 'thinner bola 1 liter', 20, NULL, 'Kaleng', 20000, 12000, '1676864242_tinner bola 1 liter.jfif', '2023-02-20 03:37:22', '2023-02-20 03:37:22'),
(72, 'Kawat Beton', 7, 'kawat beton', 20, NULL, 'Kg', 23000, 14000, '1676864568_KAWAT BETON 1 KG.jpg', '2023-02-20 03:42:48', '2023-02-20 03:42:48'),
(73, 'Kuas Eterna  1 inch', 16, 'kuas 1 inch', 20, NULL, 'Biji', 8000, 4500, '1676865098_eterna 1 inch.jfif', '2023-02-20 03:51:38', '2023-02-20 03:51:38'),
(74, 'Kuas Eterna 1,5 inch', 16, 'kuas 1,5 inch', 20, NULL, 'Biji', 10000, 6000, '1676865219_kuas eterna 1,5 inch.jfif', '2023-02-20 03:53:39', '2023-02-20 03:53:39'),
(75, 'Kuas Eterna 2  inch', 16, 'kuas 2 inch', 15, NULL, 'Biji', 12000, 8500, '1676865323_eterna 2 inch.jfif', '2023-02-20 03:55:23', '2023-02-20 03:55:23'),
(76, 'Kuas Eterna 2,5 inch', 16, 'kuas 2,5', 20, NULL, 'Biji', 14000, 10000, '1676865439_eterna 2,5 inch.jfif', '2023-02-20 03:57:19', '2023-02-20 03:57:19'),
(77, 'Kuas Eterna 3 inch', 16, 'kuas  3 inch', 25, NULL, 'Biji', 15000, 11000, '1676865655_eterna 3 inch.jfif', '2023-02-20 04:00:55', '2023-02-20 04:00:55'),
(78, 'Kuas Eterna 4 inch', 16, 'kuas 4  inch', 20, NULL, 'Biji', 23000, 18000, '1676865818_kuas 4 inch.jpg', '2023-02-20 04:03:38', '2023-02-20 04:03:38'),
(79, 'Gypsum yoshino 9 mm', 14, 'gypsum yoshino 9 mm', 30, NULL, 'Lembar', 55000, 40000, '1676866251_gypsum yoshino 9 mm.jfif', '2023-02-20 04:10:51', '2023-02-20 04:10:51'),
(80, 'Gypsum grc 99 mm', 14, 'gypsum 9 mm grc', 30, NULL, 'Lembar', 65000, 51000, '1676866461_GRC GYPSUM.jpg', '2023-02-20 04:14:21', '2023-02-20 04:14:21'),
(81, 'Cat Kayu besi Emco 1 kg', 17, 'cat kayu', 25, NULL, 'Kaleng', 76000, 65000, '1676867525_cat emco kayu 1 kg.jfif', '2023-02-20 04:32:05', '2023-02-20 04:32:05'),
(82, 'Cat Kayu besi romatex 1 kg', 17, 'cat kayu romatex 1 kg', 30, NULL, 'Kaleng', 70000, 57000, '1676867825_cat romatex kayu 1 kg.jpg', '2023-02-20 04:37:05', '2023-02-20 04:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(141, '2014_10_12_000000_create_users_table', 1),
(142, '2014_10_12_100000_create_password_resets_table', 1),
(143, '2019_08_19_000000_create_failed_jobs_table', 1),
(144, '2022_03_08_032901_create_menus_table', 1),
(145, '2022_03_08_074136_create_restocks_table', 1),
(146, '2022_03_08_095549_create_activity_log_table', 1),
(147, '2022_03_10_031219_create_keranjangs_table', 1),
(148, '2022_03_10_072632_create_orders_table', 1),
(149, '2022_03_25_105529_create_notification_table', 1),
(150, '2022_05_22_204605_create_kategoris_table', 1),
(151, '2022_05_24_102142_create_customers_table', 1),
(152, '2022_05_24_191143_create_suppliers_table', 1),
(153, '2022_05_29_142909_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `tgl_mutasi` date NOT NULL,
  `stok_awal` int(11) NOT NULL DEFAULT 0,
  `barang_masuk` int(11) DEFAULT 0,
  `barang_keluar` int(11) NOT NULL DEFAULT 0,
  `produk_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `tgl_mutasi`, `stok_awal`, `barang_masuk`, `barang_keluar`, `produk_id`, `created_at`, `updated_at`) VALUES
(10, '2023-02-20', 5, 0, 1, 38, '2023-02-20 20:44:55', '2023-02-20 20:44:55'),
(11, '2023-02-20', 12, 0, 3, 56, '2023-02-20 20:44:55', '2023-02-20 21:03:52'),
(12, '2023-02-21', 9, 0, 1, 56, '2023-02-21 06:56:31', '2023-02-21 06:56:31'),
(13, '2023-02-21', 20, 0, 1, 41, '2023-02-21 06:58:23', '2023-02-21 06:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fraud_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_redirect_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petugas_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `jenis_pembayaran` int(11) NOT NULL,
  `code_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `jumlah_harga` bigint(20) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_midtrans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('WAITING','PENDING','CANCEL','SUCCESS') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `petugas_id`, `produk_id`, `customer_id`, `jenis_pembayaran`, `code_transaksi`, `order_id`, `quantity`, `harga_satuan`, `jumlah_harga`, `note`, `snap_token`, `url_midtrans`, `status`, `created_at`, `updated_at`) VALUES
(30, 2, 38, 7, 1, 'INV934412847', NULL, 1, 310000, 310000, 'kirim sore ya', NULL, NULL, 'SUCCESS', '2023-02-20 13:44:55', '2023-02-20 13:44:55'),
(31, 2, 56, 8, 1, 'INV934412847', NULL, 2, 25000, 50000, NULL, NULL, NULL, 'SUCCESS', '2023-02-20 13:44:55', '2023-02-20 13:44:55'),
(32, 2, 56, 9, 1, 'INV1159184514', NULL, 1, 25000, 25000, 'anter', NULL, NULL, 'SUCCESS', '2023-02-20 14:03:52', '2023-02-20 14:03:52'),
(33, 2, 56, 10, 1, 'INV1663038947', NULL, 1, 25000, 25000, 'kirim hari ini ya', NULL, NULL, 'SUCCESS', '2023-02-20 23:56:31', '2023-02-20 23:56:31'),
(34, 2, 41, 11, 1, 'INV1523745621', NULL, 1, 61000, 61000, 'segera siapkan', NULL, NULL, 'SUCCESS', '2023-02-20 23:58:23', '2023-02-20 23:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restocks`
--

CREATE TABLE `restocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga_beli_satuan` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_application` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Point-Of-Sale',
  `midtrans_merchat_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `midtrans_client_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `midtrans_server_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `name_application`, `midtrans_merchat_id`, `midtrans_client_key`, `midtrans_server_key`, `created_at`, `updated_at`) VALUES
(1, '1675927879_logoatamrumh-removebg-preview.png', 'Toko Material Ladang Karya', NULL, NULL, NULL, NULL, '2023-02-09 07:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `alamat`, `telepon`, `email`, `created_at`, `updated_at`) VALUES
(6, 'PT. Menara Baja', 'Jakarta Selatan', '0217261006', NULL, '2023-02-19 02:21:33', '2023-02-19 04:54:16'),
(7, 'CV. Mega Indah Jaya', 'Jakarta Barat', '216250840', NULL, '2023-02-19 02:25:24', '2023-02-19 02:25:24'),
(8, 'CV. Nipsea Paint', 'Jakarta Utara', '216900546', NULL, '2023-02-19 02:28:35', '2023-02-19 02:28:35'),
(9, 'PT. Subur Interprima Jaya', 'Bogor Jawa Barat', '0219442531', 'ptsubur@gmail.com', '2023-02-19 02:32:23', '2023-02-19 05:08:01'),
(10, 'Pak Koko Jaka', 'Rangkas bitung', '89522457603', NULL, '2023-02-19 02:34:02', '2023-02-19 02:38:51'),
(11, 'Pak Epong', 'Jakarta Utara', '87867935353', NULL, '2023-02-19 02:38:28', '2023-02-19 02:38:28'),
(12, 'PT. Inti Megah Mitra Sejahtera', 'Kuningan Jakarta Selatan', '02129329520', NULL, '2023-02-19 02:40:15', '2023-02-19 04:55:36'),
(13, 'PT. Gunung Jati', 'Tanah Abang Jakarta Pusat', '0215700505', NULL, '2023-02-19 02:42:09', '2023-02-19 04:56:24'),
(14, 'PT. Bahagia Jaya', 'Tegalrejo, Jogja', '081234578351', NULL, '2023-02-19 02:43:48', '2023-02-19 04:57:42'),
(15, 'Pak Uday', 'Sumur batu Kemayoran', '878993474888', NULL, '2023-02-19 02:44:56', '2023-02-19 02:44:56'),
(16, 'PT. MGM', 'Menteng Jakarta Pusat', '0213916990', NULL, '2023-02-19 02:46:03', '2023-02-19 04:53:57'),
(17, 'PT. Sinar Surya Cemerlang', 'Taman Sari Jakarta Barat', '02130063984', NULL, '2023-02-19 02:47:47', '2023-02-19 04:52:16'),
(18, 'Pak Alvin', 'Kuningan Jakarta Barat', '85672436459', NULL, '2023-02-19 02:50:04', '2023-02-19 02:50:04'),
(19, 'CV. Kurnia Jaya Bangunan', 'Tambun Bekasi', '0216775542', NULL, '2023-02-19 02:56:22', '2023-02-19 04:56:00'),
(20, 'PT. Miracle Graha Inti', 'Serpong Utara Tangsel', '02129047230', NULL, '2023-02-19 02:57:53', '2023-02-19 04:53:35'),
(21, 'PT. SatriaKarya Adiyudha', 'Tebet Jakarta Selatan', '02180625861', NULL, '2023-02-19 03:04:32', '2023-02-19 04:52:52'),
(22, 'CV. Sumber Makmur Sejati', 'Taman Sari Jakarta Barat', '216338248', NULL, '2023-02-19 03:06:05', '2023-02-19 03:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','manager','kasir') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '2022-05-29 13:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL, '2uKgZ2xtP9TqpvR5R12vqGaj8AijiUtTQ4mbO7jUosQbyB09uQLMuBBwqUOK', NULL, NULL),
(2, 'kasir', 'kasir@gmail.com', NULL, '$2y$10$TLmyFVMHUiW9E2i13HC3OOeRUxZsl6fJpXZaMlQM2/jsIcXoGzx.O', 'kasir', NULL, NULL, '2022-05-29 14:01:01', '2022-05-29 14:01:01'),
(5, 'manager', 'manager@gmail.com', NULL, '$2y$10$TLmyFVMHUiW9E2i13HC3OOeRUxZsl6fJpXZaMlQM2/jsIcXoGzx.O', 'manager', NULL, NULL, '2022-05-31 02:11:22', '2022-05-31 02:11:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `restocks`
--
ALTER TABLE `restocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `restocks`
--
ALTER TABLE `restocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
