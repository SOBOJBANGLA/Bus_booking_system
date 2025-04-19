-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 05:41 AM
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
-- Database: `ef_travel_new1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$g4EZtuMzDn0bW9APUOB8aO2hlqFd9a72fT.2mX63.nqC25zaIBWcq', NULL, NULL, '2025-04-11 21:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `schedule_id`, `user_name`, `user_phone`, `seat_number`, `payment_status`, `created_at`, `updated_at`) VALUES
(19, 129, 'Yasin', '0123456897', 1, 'confirmed', '2025-04-18 21:39:47', '2025-04-18 21:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `bus_category_id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bus_number` varchar(255) DEFAULT NULL,
  `driver_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_name`, `bus_category_id`, `destination_id`, `created_at`, `updated_at`, `bus_number`, `driver_phone`) VALUES
(38, 'Asia line', 3, 20, '2025-04-16 04:54:03', '2025-04-16 04:54:03', 'v-12347', '0123657803'),
(39, 'Asia line Return', 3, 21, '2025-04-16 04:54:03', '2025-04-16 04:54:03', 'v-12347-RT', '0123657803');

-- --------------------------------------------------------

--
-- Table structure for table `bus_categories`
--

CREATE TABLE `bus_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_categories`
--

INSERT INTO `bus_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'A/C Bus', '2025-04-11 22:28:40', '2025-04-11 22:28:40'),
(3, 'Non A/C Bus', '2025-04-11 22:28:58', '2025-04-11 22:28:58'),
(5, 'Sleeper Bus', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(6, 'Semi-Sleeper Bus', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(7, 'Seater Bus', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(8, 'Luxury Bus', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(9, 'Volvo Bus / Scania / Mercedes', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(10, 'Mini Bus', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(11, 'Local / Ordinary Bus', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(12, 'Express Bus', '2025-04-12 07:18:42', '2025-04-12 07:18:42'),
(13, 'Deluxe Bus', '2025-04-12 07:18:43', '2025-04-12 07:18:43'),
(14, 'AC Sleeper Bus', '2025-04-12 07:18:43', '2025-04-12 07:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `from`, `to`, `created_at`, `updated_at`) VALUES
(20, 'Dhaka', 'Cumilla', '2025-04-14 10:57:43', '2025-04-14 10:57:43'),
(21, 'Cumilla', 'Dhaka', '2025-04-14 10:57:44', '2025-04-14 10:57:44');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_11_083004_create_bookings_table', 2),
(5, '2025_04_11_112651_create_admins_table', 3),
(7, '2025_04_11_115634_create_personal_access_tokens_table', 4),
(8, '2025_04_11_145332_create_bus_categories_table', 5),
(9, '2025_04_11_145635_create_destinations_table', 5),
(10, '2025_04_11_145705_create_buses_table', 5),
(11, '2025_04_11_145856_create_schedules_table', 5),
(12, '2025_04_11_145925_create_ticket_prices_table', 5),
(13, '2025_04_11_150241_update_bookings_table_add_schedule_payment_fields', 5),
(14, '2025_04_11_151603_create_bookings_table', 6),
(15, '2025_04_12_060125_update_ticket_prices_table_change_bus_to_destination', 7),
(16, '2025_04_12_113922_add_bus_number_and_driver_phone_to_buses_table', 8),
(17, '2025_04_13_071607_create_seats_table', 9),
(18, '2025_04_13_073203_create_seats_table', 10),
(19, '2025_04_14_114644_add_vat_to_ticket_prices_table', 11),
(20, '2025_04_14_164147_add_vat_fields_to_ticket_prices_table', 12),
(21, '2025_04_14_164518_add_destination_id_to_ticket_prices_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `bus_id`, `date`, `departure_time`, `arrival_time`, `created_at`, `updated_at`) VALUES
(123, 38, '2025-04-16', '16:53:00', '19:53:00', '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(124, 39, '2025-04-16', '23:53:00', '02:53:00', '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(125, 38, '2025-04-17', '16:53:00', '19:53:00', '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(126, 39, '2025-04-17', '23:53:00', '02:53:00', '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(127, 38, '2025-04-18', '16:53:00', '19:53:00', '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(128, 39, '2025-04-18', '23:53:00', '02:53:00', '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(129, 38, '2025-04-19', '16:53:00', '19:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09'),
(130, 39, '2025-04-19', '23:53:00', '02:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09'),
(131, 38, '2025-04-20', '16:53:00', '19:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09'),
(132, 39, '2025-04-20', '23:53:00', '02:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09'),
(133, 38, '2025-04-21', '16:53:00', '19:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09'),
(134, 39, '2025-04-21', '23:53:00', '02:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09'),
(135, 38, '2025-04-22', '16:53:00', '19:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09'),
(136, 39, '2025-04-22', '23:53:00', '02:53:00', '2025-04-16 04:54:09', '2025-04-16 04:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `seat_number` int(11) NOT NULL,
  `status` enum('empty','reserved','full') NOT NULL DEFAULT 'empty',
  `row` int(11) DEFAULT NULL,
  `column` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bus_id`, `seat_number`, `status`, `row`, `column`, `created_at`, `updated_at`) VALUES
(1193, 38, 1, 'full', NULL, NULL, '2025-04-16 04:54:03', '2025-04-18 21:39:47'),
(1194, 38, 2, 'empty', NULL, NULL, '2025-04-16 04:54:03', '2025-04-16 04:54:03'),
(1195, 38, 3, 'empty', NULL, NULL, '2025-04-16 04:54:03', '2025-04-16 04:54:03'),
(1196, 38, 4, 'empty', NULL, NULL, '2025-04-16 04:54:03', '2025-04-16 04:54:03'),
(1197, 38, 5, 'empty', NULL, NULL, '2025-04-16 04:54:03', '2025-04-16 04:54:03'),
(1198, 38, 6, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1199, 38, 7, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1200, 38, 8, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1201, 38, 9, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1202, 38, 10, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1203, 38, 11, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1204, 38, 12, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1205, 38, 13, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1206, 38, 14, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1207, 38, 15, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1208, 38, 16, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1209, 38, 17, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1210, 38, 18, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1211, 38, 19, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1212, 38, 20, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1213, 38, 21, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1214, 38, 22, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1215, 38, 23, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1216, 38, 24, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1217, 38, 25, 'empty', NULL, NULL, '2025-04-16 04:54:04', '2025-04-16 04:54:04'),
(1218, 38, 26, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1219, 38, 27, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1220, 38, 28, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1221, 38, 29, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1222, 38, 30, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1223, 38, 31, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1224, 38, 32, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1225, 38, 33, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1226, 38, 34, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1227, 38, 35, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1228, 38, 36, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1229, 38, 37, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1230, 38, 38, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1231, 38, 39, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1232, 38, 40, 'empty', NULL, NULL, '2025-04-16 04:54:05', '2025-04-16 04:54:05'),
(1233, 39, 1, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1234, 39, 2, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1235, 39, 3, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1236, 39, 4, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1237, 39, 5, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1238, 39, 6, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1239, 39, 7, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1240, 39, 8, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1241, 39, 9, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1242, 39, 10, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1243, 39, 11, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1244, 39, 12, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1245, 39, 13, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1246, 39, 14, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1247, 39, 15, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1248, 39, 16, 'empty', NULL, NULL, '2025-04-16 04:54:06', '2025-04-16 04:54:06'),
(1249, 39, 17, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1250, 39, 18, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1251, 39, 19, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1252, 39, 20, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1253, 39, 21, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1254, 39, 22, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1255, 39, 23, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1256, 39, 24, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1257, 39, 25, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1258, 39, 26, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1259, 39, 27, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1260, 39, 28, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1261, 39, 29, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1262, 39, 30, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1263, 39, 31, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1264, 39, 32, 'empty', NULL, NULL, '2025-04-16 04:54:07', '2025-04-16 04:54:07'),
(1265, 39, 33, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(1266, 39, 34, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(1267, 39, 35, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(1268, 39, 36, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(1269, 39, 37, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(1270, 39, 38, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(1271, 39, 39, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08'),
(1272, 39, 40, 'empty', NULL, NULL, '2025-04-16 04:54:08', '2025-04-16 04:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1JUAHSuWWfjWFaqEFf7itQqR0kJtKxaiJ2O8gM4h', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEFFR1JsbGRTem1mYWdpVjZ2Smh3eHh0V0o0ZWl1aW94OW5KcDBrciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ibG9nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745033810),
('aDtKVbYrfRnFE2tmNkPqdsN7RO4OTJ904ulS7Aqi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTWExN1cxeGJ0Nm1Fd0ExVjhIVU11aEZ0OXhQYmxUelA0MTk1QVJoTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1745033726),
('FfyRvGD7pigvJBGmjru1i8EswhDmjnxMScaHUmbi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmZOWW9UMGxlZUhEQVNxYjZ2RDlNOVhNSzdabVlQM0hxZ0hOTUxZSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fX0=', 1745034015);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_prices`
--

CREATE TABLE `ticket_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `vat_percentage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_prices`
--

INSERT INTO `ticket_prices` (`id`, `bus_id`, `price`, `created_at`, `updated_at`, `destination_id`, `vat_percentage`, `total_price`) VALUES
(38, 38, 300.00, '2025-04-16 04:54:09', '2025-04-16 04:54:09', 20, 5.00, 315.00),
(39, 39, 300.00, '2025-04-16 04:54:09', '2025-04-16 04:54:09', 21, 5.00, 315.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mamunm', 'mamun@gmail.com', NULL, '$2y$12$zHpi0tzvU9vvmkqGxBgb0.uYmOHG0EhcK.3vsepVA6UqC1P8vrrVm', NULL, '2025-04-11 00:13:07', '2025-04-11 00:13:07'),
(2, 'Test User', 'test@example.com', '2025-04-12 07:18:41', '$2y$12$QAo6z1IAOclkpLFptICo1.y/R2VFedlKeSordWmDS.p/PPKke4zVm', 'T7VBZlXedT', '2025-04-12 07:18:41', '2025-04-12 07:18:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_schedule_id_foreign` (`schedule_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buses_bus_category_id_foreign` (`bus_category_id`),
  ADD KEY `buses_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `bus_categories`
--
ALTER TABLE `bus_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seats_bus_id_seat_number_unique` (`bus_id`,`seat_number`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_prices_bus_id_foreign` (`bus_id`),
  ADD KEY `ticket_prices_destination_id_foreign` (`destination_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bus_categories`
--
ALTER TABLE `bus_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1273;

--
-- AUTO_INCREMENT for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`);

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_bus_category_id_foreign` FOREIGN KEY (`bus_category_id`) REFERENCES `bus_categories` (`id`),
  ADD CONSTRAINT `buses_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_prices`
--
ALTER TABLE `ticket_prices`
  ADD CONSTRAINT `ticket_prices_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`),
  ADD CONSTRAINT `ticket_prices_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
