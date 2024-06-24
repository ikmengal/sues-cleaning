-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 12:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dotverge_suescleaning`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=De-active',
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `slug`, `email`, `phone_number`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Royal Inn Hotel', 'royal-inn-hotel-gsj', 'royal@gmail.com', '2344', 1, NULL, '2023-07-12 18:24:10', '2023-07-12 18:29:20'),
(2, 'Avari Towers', 'avari-towers-9xi', 'avari@gmail.com', '3454545', 1, NULL, '2023-07-12 18:33:14', '2023-07-12 18:33:54'),
(3, 'Movenpick Hotel', 'movenpick-hotel-tlz', 'movenpick@gmail.com', '4454545', 1, NULL, '2023-07-12 18:33:43', '2023-07-12 18:33:43'),
(4, 'Pearl Continental Hotel', 'pearl-continental-hotel-qti', 'pearl@gmail.com', '454545455455', 1, NULL, '2023-07-12 18:34:23', '2023-07-12 21:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `facility_rooms`
--

CREATE TABLE `facility_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=>de-active, 1=>active',
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facility_rooms`
--

INSERT INTO `facility_rooms` (`id`, `facility_id`, `name`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 'Room 1', 'room-1-c1s', NULL, 1, NULL, '2023-07-18 20:19:43', '2023-07-18 20:20:01'),
(2, 4, 'Room 2', 'room-2-00e', NULL, 1, NULL, '2023-07-18 20:42:27', '2023-07-18 20:42:27'),
(3, 4, 'Room 3', 'room-3-iar', NULL, 1, NULL, '2023-07-18 20:42:36', '2023-07-18 20:42:36'),
(4, 4, 'Room 4', 'room-4-ktm', NULL, 1, NULL, '2023-07-18 20:42:46', '2023-07-18 20:42:46'),
(5, 3, 'Room 01', 'room-01-8ai', NULL, 1, NULL, '2023-08-08 03:01:23', '2023-08-08 03:01:23'),
(6, 3, 'Room 02', 'room-02-ps5', NULL, 1, NULL, '2023-08-08 03:01:36', '2023-08-08 03:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `facility_services`
--

CREATE TABLE `facility_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `parent_service_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facility_services`
--

INSERT INTO `facility_services` (`id`, `facility_id`, `room_id`, `parent_service_id`, `service_id`, `status`, `created_at`, `updated_at`) VALUES
(95, 4, 4, 2, 6, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(96, 4, 4, 2, 7, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(97, 4, 4, 2, 8, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(98, 4, 4, 2, 9, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(99, 4, 4, 2, 10, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(100, 4, 4, 2, 11, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(101, 4, 4, 2, 12, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(102, 4, 4, 2, 13, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(103, 4, 4, 5, 28, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(104, 4, 4, 5, 29, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(105, 4, 4, 5, 30, 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(106, 4, 3, 5, 28, 1, '2023-07-18 20:56:38', '2023-07-18 20:56:38'),
(107, 4, 3, 5, 29, 1, '2023-07-18 20:56:38', '2023-07-18 20:56:38'),
(108, 4, 3, 5, 30, 1, '2023-07-18 20:56:38', '2023-07-18 20:56:38'),
(109, 4, 1, 2, 6, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(110, 4, 1, 2, 7, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(111, 4, 1, 2, 8, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(112, 4, 1, 2, 9, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(113, 4, 1, 2, 10, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(114, 4, 1, 2, 11, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(115, 4, 1, 2, 12, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(116, 4, 1, 2, 13, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(117, 4, 1, 3, 14, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(118, 4, 1, 3, 15, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(119, 4, 1, 3, 16, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(120, 4, 1, 3, 17, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(121, 4, 1, 3, 18, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(122, 4, 1, 3, 19, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(123, 4, 1, 3, 20, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(124, 4, 1, 3, 21, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(125, 4, 1, 3, 22, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(126, 4, 1, 5, 28, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(127, 4, 1, 5, 29, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(128, 4, 1, 5, 30, 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(149, 3, 5, 2, 6, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(150, 3, 5, 2, 7, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(151, 3, 5, 2, 8, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(152, 3, 5, 2, 9, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(153, 3, 5, 2, 10, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(154, 3, 5, 2, 11, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(155, 3, 5, 2, 12, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(156, 3, 5, 2, 13, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(157, 3, 5, 3, 14, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(158, 3, 5, 3, 15, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(159, 3, 5, 3, 16, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(160, 3, 5, 3, 17, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(161, 3, 5, 3, 18, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(162, 3, 5, 3, 19, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(163, 3, 5, 3, 20, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(164, 3, 5, 3, 21, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(165, 3, 5, 3, 22, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(166, 3, 5, 5, 28, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(167, 3, 5, 5, 29, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(168, 3, 5, 5, 30, 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(169, 3, 6, 2, 6, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(170, 3, 6, 2, 7, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(171, 3, 6, 2, 8, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(172, 3, 6, 2, 9, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(173, 3, 6, 2, 10, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(174, 3, 6, 2, 11, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(175, 3, 6, 2, 12, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(176, 3, 6, 2, 13, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(177, 3, 6, 3, 14, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(178, 3, 6, 3, 15, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(179, 3, 6, 3, 16, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(180, 3, 6, 3, 17, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(181, 3, 6, 3, 18, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(182, 3, 6, 3, 19, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(183, 3, 6, 3, 20, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(184, 3, 6, 3, 21, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(185, 3, 6, 3, 22, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(186, 3, 6, 4, 23, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(187, 3, 6, 4, 24, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(188, 3, 6, 4, 25, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(189, 3, 6, 4, 26, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(190, 3, 6, 4, 27, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(191, 3, 6, 5, 28, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(192, 3, 6, 5, 29, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(193, 3, 6, 5, 30, 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `agent` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Profile Updated', 'http://localhost/hr_portal/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:13:40', '2023-05-23 17:13:40'),
(2, 'Setting details added', 'http://localhost/hr_portal/settings', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:14:11', '2023-05-23 17:14:11'),
(3, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(4, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(5, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(6, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(7, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(8, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(9, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(10, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(11, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(12, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(13, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(14, 'New Role Added', 'http://localhost/hr_portal/roles', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:52:23', '2023-05-23 17:52:23'),
(15, 'New Role Added', 'http://localhost/hr_portal/roles', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:52:43', '2023-05-23 17:52:43'),
(16, 'New Role Added', 'http://localhost/hr_portal/roles', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:53:02', '2023-05-23 17:53:02'),
(17, 'Role Updated', 'http://localhost/hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:53:19', '2023-05-23 17:53:19'),
(18, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:27', '2023-05-23 17:54:27'),
(19, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:37', '2023-05-23 17:54:37'),
(20, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:47', '2023-05-23 17:54:47'),
(21, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:55', '2023-05-23 17:54:55'),
(22, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:03', '2023-05-23 17:55:03'),
(23, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:11', '2023-05-23 17:55:11'),
(24, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:19', '2023-05-23 17:55:19'),
(25, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:27', '2023-05-23 17:55:27'),
(26, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:34', '2023-05-23 17:55:34'),
(27, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:42', '2023-05-23 17:55:42'),
(28, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:50', '2023-05-23 17:55:50'),
(29, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:57', '2023-05-23 17:55:57'),
(30, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:05', '2023-05-23 17:56:05'),
(31, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:16', '2023-05-23 17:56:16'),
(32, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:24', '2023-05-23 17:56:24'),
(33, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:31', '2023-05-23 17:56:31'),
(34, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:39', '2023-05-23 17:56:39'),
(35, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:47', '2023-05-23 17:56:47'),
(36, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:54', '2023-05-23 17:56:54'),
(37, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:02', '2023-05-23 17:57:02'),
(38, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:11', '2023-05-23 17:57:11'),
(39, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:18', '2023-05-23 17:57:18'),
(40, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:30', '2023-05-23 17:57:30'),
(41, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:38', '2023-05-23 17:57:38'),
(42, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:45', '2023-05-23 17:57:45'),
(43, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:56', '2023-05-23 17:57:56'),
(44, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:04', '2023-05-23 17:58:04'),
(45, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:11', '2023-05-23 17:58:11'),
(46, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:19', '2023-05-23 17:58:19'),
(47, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:26', '2023-05-23 17:58:26'),
(48, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:35', '2023-05-23 17:58:35'),
(49, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:59:48', '2023-05-23 17:59:48'),
(50, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:00', '2023-05-23 18:00:00'),
(51, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:10', '2023-05-23 18:00:10'),
(52, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:19', '2023-05-23 18:00:19'),
(53, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:27', '2023-05-23 18:00:27'),
(54, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:35', '2023-05-23 18:00:35'),
(55, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:43', '2023-05-23 18:00:43'),
(56, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:51', '2023-05-23 18:00:51'),
(57, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:11:16', '2023-05-23 18:11:16'),
(58, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:18:51', '2023-05-23 18:18:51'),
(59, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:04', '2023-05-23 18:19:04'),
(60, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:13', '2023-05-23 18:19:13'),
(61, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:21', '2023-05-23 18:19:21'),
(62, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:29', '2023-05-23 18:19:29'),
(63, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:36', '2023-05-23 18:19:36'),
(64, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:44', '2023-05-23 18:19:44'),
(65, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:52', '2023-05-23 18:19:52'),
(66, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:10', '2023-05-23 18:20:10'),
(67, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:20', '2023-05-23 18:20:20'),
(68, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:27', '2023-05-23 18:20:27'),
(69, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:35', '2023-05-23 18:20:35'),
(70, 'New Employment Status Added', 'http://localhost/hr_portal/employment_status', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:41:53', '2023-05-23 18:41:53'),
(71, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:25:09', '2023-05-23 19:25:09'),
(72, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:25:29', '2023-05-23 19:25:29'),
(73, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:25:51', '2023-05-23 19:25:51'),
(74, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:26:28', '2023-05-23 19:26:28'),
(75, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:26:44', '2023-05-23 19:26:44'),
(76, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:26:56', '2023-05-23 19:26:56'),
(77, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:08', '2023-05-23 19:27:08'),
(78, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:17', '2023-05-23 19:27:17'),
(79, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:27', '2023-05-23 19:27:27'),
(80, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:37', '2023-05-23 19:27:37'),
(81, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:59', '2023-05-23 19:27:59'),
(82, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:28:20', '2023-05-23 19:28:20'),
(83, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:28:39', '2023-05-23 19:28:39'),
(84, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:03', '2023-05-23 19:29:03'),
(85, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:15', '2023-05-23 19:29:15'),
(86, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:30', '2023-05-23 19:29:30'),
(87, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:44', '2023-05-23 19:29:44'),
(88, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:59', '2023-05-23 19:29:59'),
(89, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:11', '2023-05-23 19:30:11'),
(90, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:21', '2023-05-23 19:30:21'),
(91, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:37', '2023-05-23 19:30:37'),
(92, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:55', '2023-05-23 19:30:55'),
(93, 'Employee added', 'http://localhost/hr_portal/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 12:44:19', '2023-05-24 12:44:19'),
(94, 'Department Updated', 'http://localhost/hr_portal/departments/24', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 13:18:04', '2023-05-24 13:18:04'),
(95, 'Employee added', 'http://localhost/hr_portal/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 13:22:48', '2023-05-24 13:22:48'),
(96, 'Employee added', 'http://localhost/hr_portal/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 13:24:31', '2023-05-24 13:24:31'),
(97, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:30:44', '2023-05-24 18:30:44'),
(98, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:32:20', '2023-05-24 18:32:20'),
(99, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:33:47', '2023-05-24 18:33:47'),
(100, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:34:43', '2023-05-24 18:34:43'),
(101, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:35:33', '2023-05-24 18:35:33'),
(102, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:37:40', '2023-05-24 18:37:40'),
(103, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:38:11', '2023-05-24 18:38:11'),
(104, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:38:43', '2023-05-24 18:38:43'),
(105, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:39:27', '2023-05-24 18:39:27'),
(106, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:40:06', '2023-05-24 18:40:06'),
(107, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:41:06', '2023-05-24 18:41:06'),
(108, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:41:49', '2023-05-24 18:41:49'),
(109, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:43:28', '2023-05-24 18:43:28'),
(110, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:43:58', '2023-05-24 18:43:58'),
(111, 'Role Updated', 'http://localhost/hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:49:13', '2023-05-24 18:49:13'),
(112, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 18:57:36', '2023-05-24 18:57:36'),
(113, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:04:11', '2023-05-24 19:04:11'),
(114, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:04:32', '2023-05-24 19:04:32'),
(115, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:04:47', '2023-05-24 19:04:47'),
(116, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:05:03', '2023-05-24 19:05:03'),
(117, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:07:39', '2023-05-24 19:07:39'),
(118, 'Role Updated', 'http://localhost/hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:16:42', '2023-05-24 19:16:42'),
(119, 'New Permission Added', 'http://localhost/hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:19:51', '2023-05-24 19:19:51'),
(120, 'Role Updated', 'http://localhost/hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 19:20:57', '2023-05-24 19:20:57'),
(121, 'Role Updated', 'http://localhost/hr_portal/roles/3', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 12:17:33', '2023-05-25 12:17:33'),
(122, 'Bank Account Added', 'http://localhost/hr_portal/bank_accounts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-25 15:53:31', '2023-05-25 15:53:31'),
(123, 'Bank Account Added', 'http://localhost/hr_portal/bank_accounts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-25 15:54:29', '2023-05-25 15:54:29'),
(124, 'Bank Account Details Updated', 'http://localhost/hr_portal/bank_accounts/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 3, '2023-05-25 18:30:42', '2023-05-25 18:30:42'),
(125, 'Bank Account Details Updated', 'http://localhost/hr_portal/bank_accounts/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 3, '2023-05-25 18:31:02', '2023-05-25 18:31:02'),
(126, 'Bank Account Details Updated', 'http://localhost/hr_portal/bank_accounts/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 3, '2023-05-25 18:31:18', '2023-05-25 18:31:18'),
(127, 'New Leave Type Added', 'http://localhost/hr_portal/leave_types', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 19:28:12', '2023-05-25 19:28:12'),
(128, 'New Leave Type Added', 'http://localhost/hr_portal/leave_types', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 19:28:29', '2023-05-25 19:28:29'),
(129, 'New Leave Type Added', 'http://localhost/hr_portal/leave_types', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 19:28:44', '2023-05-25 19:28:44'),
(130, 'New Leave Type Added', 'http://localhost/hr_portal/leave_types', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 19:28:58', '2023-05-25 19:28:58'),
(131, 'New Leave Type Added', 'http://localhost/hr_portal/leave_types', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 19:29:14', '2023-05-25 19:29:14'),
(132, 'New Leave Type Added', 'http://localhost/hr_portal/leave_types', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 19:29:29', '2023-05-25 19:29:29'),
(133, 'New Leave Type Added', 'http://localhost/hr_portal/leave_types', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-25 19:29:42', '2023-05-25 19:29:42'),
(134, 'New Cover Image Added', 'http://localhost/hr_portal/profile_cover_images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:05:47', '2023-05-26 13:05:47'),
(135, 'New Cover Image Added', 'http://localhost/hr_portal/profile_cover_images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:05:56', '2023-05-26 13:05:56'),
(136, 'New Cover Image Added', 'http://localhost/hr_portal/profile_cover_images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:06:11', '2023-05-26 13:06:11'),
(137, 'New Cover Image Added', 'http://localhost/hr_portal/profile_cover_images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:06:21', '2023-05-26 13:06:21'),
(138, 'Profile Updated', 'http://localhost/hr_portal/profile/update/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 3, '2023-05-26 13:06:58', '2023-05-26 13:06:58'),
(139, 'Profile Updated', 'http://localhost/hr_portal/profile/update/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 3, '2023-05-26 13:07:44', '2023-05-26 13:07:44'),
(140, 'Profile Updated', 'http://localhost/hr_portal/profile/update/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 3, '2023-05-26 13:10:22', '2023-05-26 13:10:22'),
(141, 'Profile Updated', 'http://localhost/hr_portal/profile/update/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 3, '2023-05-26 13:16:42', '2023-05-26 13:16:42'),
(142, 'Profile Updated', 'http://localhost/hr_portal/profile/update/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-26 13:17:25', '2023-05-26 13:17:25'),
(143, 'New Announcement Added', 'http://localhost/hr_portal/announcements', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:19:12', '2023-05-26 13:19:12'),
(144, 'New Announcement Added', 'http://localhost/hr_portal/announcements', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:19:45', '2023-05-26 13:19:45'),
(145, 'New Announcement Added', 'http://localhost/hr_portal/announcements', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:20:04', '2023-05-26 13:20:04'),
(146, 'Role Updated', 'http://localhost/hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:48:51', '2023-05-26 13:48:51'),
(147, 'Role Updated', 'http://localhost/hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:51:04', '2023-05-26 13:51:04'),
(148, 'Role Updated', 'http://localhost/hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:52:07', '2023-05-26 13:52:07'),
(149, 'Role Updated', 'http://localhost/hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 13:53:13', '2023-05-26 13:53:13'),
(150, 'Profile Updated', 'http://localhost/hr_portal/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-26 19:42:00', '2023-05-26 19:42:00'),
(151, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 11:50:47', '2023-05-27 11:50:47'),
(152, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:16:16', '2023-05-27 12:16:16'),
(153, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:38:54', '2023-05-27 12:38:54'),
(154, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:40:29', '2023-05-27 12:40:29'),
(155, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:45:34', '2023-05-27 12:45:34'),
(156, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:47:23', '2023-05-27 12:47:23'),
(157, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:49:03', '2023-05-27 12:49:03'),
(158, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:49:27', '2023-05-27 12:49:27'),
(159, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:50:22', '2023-05-27 12:50:22'),
(160, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:51:01', '2023-05-27 12:51:01'),
(161, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:51:23', '2023-05-27 12:51:23'),
(162, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:52:14', '2023-05-27 12:52:14'),
(163, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:52:50', '2023-05-27 12:52:50'),
(164, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:53:00', '2023-05-27 12:53:00'),
(165, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 12:54:23', '2023-05-27 12:54:23'),
(166, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:07:54', '2023-05-27 13:07:54'),
(167, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:13:27', '2023-05-27 13:13:27'),
(168, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:13:41', '2023-05-27 13:13:41'),
(169, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:14:00', '2023-05-27 13:14:00'),
(170, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:14:14', '2023-05-27 13:14:14'),
(171, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:14:38', '2023-05-27 13:14:38'),
(172, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:17:42', '2023-05-27 13:17:42'),
(173, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(174, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:28:02', '2023-05-27 13:28:02'),
(175, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:28:20', '2023-05-27 13:28:20'),
(176, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:28:52', '2023-05-27 13:28:52'),
(177, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:29:28', '2023-05-27 13:29:28'),
(178, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:29:44', '2023-05-27 13:29:44'),
(179, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:30:02', '2023-05-27 13:30:02'),
(180, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:30:17', '2023-05-27 13:30:17'),
(181, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:30:49', '2023-05-27 13:30:49'),
(182, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:31:43', '2023-05-27 13:31:43'),
(183, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:32:41', '2023-05-27 13:32:41'),
(184, 'Role Updated', 'http://localhost/new_hr_portal/roles/3', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:37:56', '2023-05-27 13:37:56'),
(185, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:40:51', '2023-05-27 13:40:51'),
(186, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:42:34', '2023-05-27 13:42:34'),
(187, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:42:54', '2023-05-27 13:42:54'),
(188, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:43:29', '2023-05-27 13:43:29'),
(189, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:44:03', '2023-05-27 13:44:03'),
(190, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:44:48', '2023-05-27 13:44:48'),
(191, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:45:10', '2023-05-27 13:45:10'),
(192, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:45:36', '2023-05-27 13:45:36'),
(193, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:46:51', '2023-05-27 13:46:51'),
(194, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:47:11', '2023-05-27 13:47:11'),
(195, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:48:04', '2023-05-27 13:48:04'),
(196, 'Role Updated', 'http://localhost/new_hr_portal/roles/3', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:48:52', '2023-05-27 13:48:52'),
(197, 'Role Updated', 'http://localhost/hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-29 11:28:58', '2023-05-29 11:28:58'),
(198, 'User contact added successfully', 'http://localhost/hr_portal/user_contacts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-29 20:17:27', '2023-05-29 20:17:27'),
(199, 'User contact added successfully', 'http://localhost/hr_portal/user_contacts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-29 20:17:40', '2023-05-29 20:17:40'),
(200, 'User contact added successfully', 'http://localhost/hr_portal/user_contacts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:11:24', '2023-05-30 11:11:24'),
(201, 'User contact updated successfully', 'http://localhost/new_hr_portal/user_contacts/2', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:15:15', '2023-05-30 11:15:15'),
(202, 'User contact updated successfully', 'http://localhost/new_hr_portal/user_contacts/2', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:15:34', '2023-05-30 11:15:34'),
(203, 'User contact added successfully', 'http://localhost/new_hr_portal/user_contacts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:16:02', '2023-05-30 11:16:02'),
(204, 'User contact updated successfully', 'http://localhost/new_hr_portal/user_contacts/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:16:23', '2023-05-30 11:16:23'),
(205, 'Profile Updated', 'http://localhost/new_hr_portal/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:17:23', '2023-05-30 11:17:23'),
(206, 'Profile Updated', 'http://localhost/new_hr_portal/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:17:28', '2023-05-30 11:17:28'),
(207, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:22:17', '2023-05-30 11:22:17'),
(208, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:22:30', '2023-05-30 11:22:30');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(209, 'User contact added successfully', 'http://localhost/new_hr_portal/user_contacts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-30 11:35:15', '2023-05-30 11:35:15'),
(210, 'User contact updated successfully', 'http://localhost/new_hr_portal/user_contacts/5', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-30 11:35:33', '2023-05-30 11:35:33'),
(211, 'User contact added successfully', 'http://localhost/new_hr_portal/user_contacts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-30 11:35:45', '2023-05-30 11:35:45'),
(212, 'User contact updated successfully', 'http://localhost/new_hr_portal/user_contacts/6', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-30 11:36:04', '2023-05-30 11:36:04'),
(213, 'User contact added successfully', 'http://localhost/new_hr_portal/user_contacts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-30 11:36:24', '2023-05-30 11:36:24'),
(214, 'User contact updated successfully', 'http://localhost/new_hr_portal/user_contacts/7', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 2, '2023-05-30 11:36:42', '2023-05-30 11:36:42'),
(215, 'Role Updated', 'http://localhost/new_hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-30 11:40:30', '2023-05-30 11:40:30'),
(216, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-12 19:53:09', '2023-06-12 19:53:09'),
(217, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-12 19:53:28', '2023-06-12 19:53:28'),
(218, 'Setting details updated', 'http://localhost/new_hr_portal/settings/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-12 20:03:00', '2023-06-12 20:03:00'),
(219, 'Setting details updated', 'http://localhost/new_hr_portal/settings/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-12 20:03:09', '2023-06-12 20:03:09'),
(220, 'New Permission Added', 'http://localhost/new_hr_portal/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-13 19:01:51', '2023-06-13 19:01:51'),
(221, 'Role Updated', 'http://localhost/new_hr_portal/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-13 19:02:06', '2023-06-13 19:02:06'),
(222, 'Employee updated', 'https://portal.cyberonix.co/employees/muhmmad-9l7Vx', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-14 21:33:38', '2023-06-14 21:33:38'),
(223, 'Employee updated', 'https://portal.cyberonix.co/employees/amar-8HtQX', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-14 21:35:41', '2023-06-14 21:35:41'),
(224, 'Employee updated', 'https://portal.cyberonix.co/employees/amar-8HtQX', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-14 21:37:41', '2023-06-14 21:37:41'),
(225, 'Employee added', 'https://portal.cyberonix.co/employees', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-14 23:23:38', '2023-06-14 23:23:38'),
(226, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/muhmmad-9l7Vx', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-17 04:04:56', '2023-06-17 04:04:56'),
(228, 'Employee updated', 'https://portal.cyberonix.co/employees/Neesam-n1Qyt', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 03:27:33', '2023-06-20 03:27:33'),
(229, 'New Position Inserted', 'https://portal.cyberonix.co/positions', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 03:48:20', '2023-06-20 03:48:20'),
(230, 'Position Updated', 'https://portal.cyberonix.co/positions/40', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 03:48:32', '2023-06-20 03:48:32'),
(231, 'Position Updated', 'https://portal.cyberonix.co/positions/40', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 03:49:02', '2023-06-20 03:49:02'),
(232, 'New Work shift Added', 'https://portal.cyberonix.co/work_shifts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 03:54:26', '2023-06-20 03:54:26'),
(233, 'New Department Added', 'https://portal.cyberonix.co/departments', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:00:53', '2023-06-20 04:00:53'),
(234, 'Department Updated', 'https://portal.cyberonix.co/departments/25', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:01:44', '2023-06-20 04:01:44'),
(235, 'New Department Added', 'https://portal.cyberonix.co/departments', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:03:04', '2023-06-20 04:03:04'),
(236, 'Department Updated', 'https://portal.cyberonix.co/departments/26', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:04:24', '2023-06-20 04:04:24'),
(237, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:05:57', '2023-06-20 04:05:57'),
(239, 'New Leave Type Added', 'https://portal.cyberonix.co/leave_types', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:11:32', '2023-06-20 04:11:32'),
(240, 'Leave Type Updated', 'https://portal.cyberonix.co/leave_types/8', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:11:47', '2023-06-20 04:11:47'),
(241, 'Leave Type Updated', 'https://portal.cyberonix.co/leave_types/8', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:11:58', '2023-06-20 04:11:58'),
(242, 'Leave Type Updated', 'https://portal.cyberonix.co/leave_types/8', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:12:58', '2023-06-20 04:12:58'),
(243, 'Position Updated', 'https://portal.cyberonix.co/positions/40', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:14:39', '2023-06-20 04:14:39'),
(244, 'Position Updated', 'https://portal.cyberonix.co/positions/40', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:15:00', '2023-06-20 04:15:00'),
(245, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:18:19', '2023-06-20 04:18:19'),
(246, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/13', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:20:24', '2023-06-20 04:20:24'),
(247, 'New Employment Status Added', 'https://portal.cyberonix.co/employment_status', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:20:33', '2023-06-20 04:20:33'),
(248, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/13', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:22:09', '2023-06-20 04:22:09'),
(249, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/13', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:23:07', '2023-06-20 04:23:07'),
(250, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/13', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:23:53', '2023-06-20 04:23:53'),
(251, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/13', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:35:07', '2023-06-20 04:35:07'),
(253, 'New Cover Image Added', 'https://portal.cyberonix.co/profile_cover_images', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:43:01', '2023-06-20 04:43:01'),
(254, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:43:53', '2023-06-20 04:43:53'),
(255, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:44:07', '2023-06-20 04:44:07'),
(256, 'New Department Added', 'https://portal.cyberonix.co/departments', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:53:43', '2023-06-20 04:53:43'),
(257, 'Department Updated', 'https://portal.cyberonix.co/departments/27', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 04:58:22', '2023-06-20 04:58:22'),
(258, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:00:15', '2023-06-20 05:00:15'),
(259, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/5', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:00:47', '2023-06-20 05:00:47'),
(260, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/5', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:01:05', '2023-06-20 05:01:05'),
(261, 'New Cover Image Added', 'https://portal.cyberonix.co/profile_cover_images', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:01:39', '2023-06-20 05:01:39'),
(262, 'New Employment Status Added', 'https://portal.cyberonix.co/employment_status', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:02:35', '2023-06-20 05:02:35'),
(263, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/5', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:03:03', '2023-06-20 05:03:03'),
(264, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/5', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:04:23', '2023-06-20 05:04:23'),
(265, 'New Employment Status Added', 'https://portal.cyberonix.co/employment_status', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:04:55', '2023-06-20 05:04:55'),
(266, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/6', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:05:08', '2023-06-20 05:05:08'),
(267, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/6', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:11:01', '2023-06-20 05:11:01'),
(268, 'New Employment Status Added', 'https://portal.cyberonix.co/employment_status', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:11:15', '2023-06-20 05:11:15'),
(269, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/6', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:20:44', '2023-06-20 05:20:44'),
(270, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/6', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:20:55', '2023-06-20 05:20:55'),
(271, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/13', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:25:04', '2023-06-20 05:25:04'),
(272, 'New Department Added', 'https://portal.cyberonix.co/departments', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:27:14', '2023-06-20 05:27:14'),
(273, 'Department Updated', 'https://portal.cyberonix.co/departments/28', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:27:49', '2023-06-20 05:27:49'),
(274, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:28:27', '2023-06-20 05:28:27'),
(275, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/6', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:29:00', '2023-06-20 05:29:00'),
(276, 'New Leave Type Added', 'https://portal.cyberonix.co/leave_types', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:31:53', '2023-06-20 05:31:53'),
(277, 'Leave Type Updated', 'https://portal.cyberonix.co/leave_types/9', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:32:16', '2023-06-20 05:32:16'),
(278, 'Leave Type Updated', 'https://portal.cyberonix.co/leave_types/9', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-20 05:32:31', '2023-06-20 05:32:31'),
(279, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/muhmmad-9l7Vx', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 01:18:06', '2023-06-22 01:18:06'),
(280, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/muhmmad-9l7Vx', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 01:19:13', '2023-06-22 01:19:13'),
(281, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/muhmmad-9l7Vx', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 01:23:01', '2023-06-22 01:23:01'),
(282, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/muhmmad-9l7Vx', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 01:46:09', '2023-06-22 01:46:09'),
(283, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/muhmmad-9l7Vx', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 01:46:23', '2023-06-22 01:46:23'),
(284, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/2', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 2, '2023-06-22 01:51:16', '2023-06-22 01:51:16'),
(285, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:02:12', '2023-06-22 02:02:12'),
(286, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:02:46', '2023-06-22 02:02:46'),
(287, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:05:30', '2023-06-22 02:05:30'),
(288, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:06:10', '2023-06-22 02:06:10'),
(289, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:06:18', '2023-06-22 02:06:18'),
(290, 'Bank Account Added', 'https://portal.cyberonix.co/bank_accounts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:09:01', '2023-06-22 02:09:01'),
(291, 'User contact updated successfully', 'https://portal.cyberonix.co/user_contacts/8', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:10:21', '2023-06-22 02:10:21'),
(292, 'Department Updated', 'https://portal.cyberonix.co/departments/22', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:14:11', '2023-06-22 02:14:11'),
(293, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:14:13', '2023-06-22 02:14:13'),
(294, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 02:14:42', '2023-06-22 02:14:42'),
(295, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:33:43', '2023-06-22 02:33:43'),
(296, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:37:41', '2023-06-22 02:37:41'),
(297, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:37:55', '2023-06-22 02:37:55'),
(298, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:37:55', '2023-06-22 02:37:55'),
(299, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:38:16', '2023-06-22 02:38:16'),
(300, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/2', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:38:50', '2023-06-22 02:38:50'),
(301, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:39:16', '2023-06-22 02:39:16'),
(302, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:46:15', '2023-06-22 02:46:15'),
(303, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 02:46:25', '2023-06-22 02:46:25'),
(304, 'Role Updated', 'https://portal.cyberonix.co/roles/4', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:07:26', '2023-06-22 03:07:26'),
(305, 'Role Updated', 'https://portal.cyberonix.co/roles/4', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:17:43', '2023-06-22 03:17:43'),
(306, 'Position Updated', 'https://portal.cyberonix.co/positions/39', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:18:58', '2023-06-22 03:18:58'),
(307, 'Position Updated', 'https://portal.cyberonix.co/positions/39', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:19:14', '2023-06-22 03:19:14'),
(308, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/12', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:20:20', '2023-06-22 03:20:20'),
(309, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/12', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:21:08', '2023-06-22 03:21:08'),
(310, 'New Department Added', 'https://portal.cyberonix.co/departments', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:23:35', '2023-06-22 03:23:35'),
(311, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:33:57', '2023-06-22 03:33:57'),
(312, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/7', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:35:00', '2023-06-22 03:35:00'),
(313, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/7', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:36:19', '2023-06-22 03:36:19'),
(314, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/7', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:36:33', '2023-06-22 03:36:33'),
(315, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/7', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:36:59', '2023-06-22 03:36:59'),
(316, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/7', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:37:43', '2023-06-22 03:37:43'),
(317, 'New Cover Image Added', 'https://portal.cyberonix.co/profile_cover_images', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:39:29', '2023-06-22 03:39:29'),
(318, 'New Cover Image Added', 'https://portal.cyberonix.co/profile_cover_images', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 03:40:13', '2023-06-22 03:40:13'),
(319, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 03:40:49', '2023-06-22 03:40:49'),
(320, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 03:45:42', '2023-06-22 03:45:42'),
(321, 'New Cover Image Added', 'https://portal.cyberonix.co/profile_cover_images', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 05:16:22', '2023-06-22 05:16:22'),
(322, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 05:16:49', '2023-06-22 05:16:49'),
(323, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-06-22 05:47:13', '2023-06-22 05:47:13'),
(324, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 05:51:42', '2023-06-22 05:51:42'),
(325, 'Designation Updated', 'https://portal.cyberonix.co/designations/16', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-22 05:54:08', '2023-06-22 05:54:08'),
(326, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-22 23:28:21', '2023-06-22 23:28:21'),
(327, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-22 23:32:36', '2023-06-22 23:32:36'),
(328, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-22 23:38:39', '2023-06-22 23:38:39'),
(329, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-22 23:39:39', '2023-06-22 23:39:39'),
(330, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:11:27', '2023-06-23 00:11:27'),
(331, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:11:49', '2023-06-23 00:11:49'),
(332, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:26:31', '2023-06-23 00:26:31'),
(333, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:27:02', '2023-06-23 00:27:02'),
(334, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:41:21', '2023-06-23 00:41:21'),
(335, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:41:32', '2023-06-23 00:41:32'),
(336, 'User contact updated successfully', 'https://portal.cyberonix.co/user_contacts/19', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:41:45', '2023-06-23 00:41:45'),
(337, 'User contact updated successfully', 'https://portal.cyberonix.co/user_contacts/20', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:41:57', '2023-06-23 00:41:57'),
(338, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:42:11', '2023-06-23 00:42:11'),
(339, 'User contact updated successfully', 'https://portal.cyberonix.co/user_contacts/21', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 3, '2023-06-23 00:42:24', '2023-06-23 00:42:24'),
(340, 'Profile Updated', 'http://portal.cyberonix.co/profile/update/1', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 21:41:22', '2023-06-23 21:41:22'),
(341, 'User contact added successfully', 'http://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 21:42:33', '2023-06-23 21:42:33'),
(342, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 21:50:09', '2023-06-23 21:50:09'),
(343, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 21:51:39', '2023-06-23 21:51:39'),
(344, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 21:57:52', '2023-06-23 21:57:52'),
(345, 'Bank Account Added', 'http://portal.cyberonix.co/bank_accounts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 21:57:55', '2023-06-23 21:57:55'),
(346, 'Bank Account Details Updated', 'http://portal.cyberonix.co/bank_accounts/3', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 21:59:43', '2023-06-23 21:59:43'),
(347, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 22:00:18', '2023-06-23 22:00:18'),
(348, 'User contact added successfully', 'https://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 22:01:45', '2023-06-23 22:01:45'),
(349, 'User contact added successfully', 'http://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 22:02:18', '2023-06-23 22:02:18'),
(350, 'User contact updated successfully', 'http://portal.cyberonix.co/user_contacts/28', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 22:02:34', '2023-06-23 22:02:34'),
(351, 'User contact added successfully', 'http://portal.cyberonix.co/user_contacts', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 22:02:55', '2023-06-23 22:02:55'),
(352, 'User contact updated successfully', 'http://portal.cyberonix.co/user_contacts/29', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-23 22:03:21', '2023-06-23 22:03:21'),
(353, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 00:27:55', '2023-06-24 00:27:55'),
(354, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 00:28:20', '2023-06-24 00:28:20'),
(355, 'Employee updated', 'https://portal.cyberonix.co/employees/muhmmad-9l7Vx', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:07:20', '2023-06-24 02:07:20'),
(356, 'Employee updated', 'https://portal.cyberonix.co/employees/Sajjad-enfWi', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:14:26', '2023-06-24 02:14:26'),
(357, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:15:00', '2023-06-24 02:15:00'),
(358, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:15:13', '2023-06-24 02:15:13'),
(359, 'Employee updated', 'https://portal.cyberonix.co/employees/Muzammil-qWjvB', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:15:37', '2023-06-24 02:15:37'),
(360, 'Employee updated', 'https://portal.cyberonix.co/employees/Muzammil-qWjvB', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:15:53', '2023-06-24 02:15:53'),
(361, 'Employee updated', 'https://portal.cyberonix.co/employees/Muzammil-qWjvB', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:16:23', '2023-06-24 02:16:23'),
(362, 'Employee updated', 'https://portal.cyberonix.co/employees/Muzammil-qWjvB', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:16:40', '2023-06-24 02:16:40'),
(363, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:16:49', '2023-06-24 02:16:49'),
(364, 'Employee updated', 'https://portal.cyberonix.co/employees/Muzammil-qWjvB', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:18:09', '2023-06-24 02:18:09'),
(365, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:19:35', '2023-06-24 02:19:35'),
(366, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:21:51', '2023-06-24 02:21:51'),
(367, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:26:42', '2023-06-24 02:26:42'),
(368, 'Employee updated', 'https://portal.cyberonix.co/employees/Arbaz-LzE2z', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:27:05', '2023-06-24 02:27:05'),
(369, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:35:24', '2023-06-24 02:35:24'),
(370, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:35:31', '2023-06-24 02:35:31'),
(371, 'Salary added', 'https://portal.cyberonix.co/employees/add_salary', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:37:12', '2023-06-24 02:37:12'),
(372, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:45:21', '2023-06-24 02:45:21'),
(373, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:45:37', '2023-06-24 02:45:37'),
(374, 'Status updated', 'https://portal.cyberonix.co/employees/status/2', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:48:39', '2023-06-24 02:48:39'),
(375, 'Terminated employee', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:49:46', '2023-06-24 02:49:46'),
(376, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:51:22', '2023-06-24 02:51:22'),
(377, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:55:15', '2023-06-24 02:55:15'),
(378, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:57:18', '2023-06-24 02:57:18'),
(379, 'Status updated', 'https://portal.cyberonix.co/employees/status/37', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 02:58:16', '2023-06-24 02:58:16'),
(380, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/James-hju5O', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:03:22', '2023-06-24 03:03:22'),
(381, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/James-hju5O', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:09:42', '2023-06-24 03:09:42'),
(382, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:20:55', '2023-06-24 03:20:55'),
(383, 'Designation Updated', 'https://portal.cyberonix.co/designations/18', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:22:35', '2023-06-24 03:22:35'),
(384, 'New Employment Status Added', 'https://portal.cyberonix.co/employment_status', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:25:29', '2023-06-24 03:25:29'),
(385, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:25:49', '2023-06-24 03:25:49'),
(386, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/3', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:26:06', '2023-06-24 03:26:06'),
(387, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/2', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:26:16', '2023-06-24 03:26:16'),
(388, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:33:28', '2023-06-24 03:33:28'),
(389, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:35:42', '2023-06-24 03:35:42'),
(390, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:36:50', '2023-06-24 03:36:50'),
(391, 'Designation Updated', 'https://portal.cyberonix.co/designations/19', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:38:15', '2023-06-24 03:38:15'),
(392, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:40:20', '2023-06-24 03:40:20'),
(393, 'Designation Updated', 'https://portal.cyberonix.co/designations/19', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:40:34', '2023-06-24 03:40:34'),
(394, 'Designation Updated', 'https://portal.cyberonix.co/designations/17', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:41:45', '2023-06-24 03:41:45'),
(395, 'Designation Updated', 'https://portal.cyberonix.co/designations/15', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:42:14', '2023-06-24 03:42:14'),
(396, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/8', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 03:53:46', '2023-06-24 03:53:46'),
(397, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:14:32', '2023-06-24 16:14:32'),
(398, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:15:22', '2023-06-24 16:15:22'),
(399, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:16:58', '2023-06-24 16:16:58'),
(400, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:17:24', '2023-06-24 16:17:24'),
(401, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:17:58', '2023-06-24 16:17:58'),
(402, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:19:55', '2023-06-24 16:19:55'),
(403, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:20:28', '2023-06-24 16:20:28'),
(404, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:22:30', '2023-06-24 16:22:30');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(405, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:23:07', '2023-06-24 16:23:07'),
(406, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:23:35', '2023-06-24 16:23:35'),
(407, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:23:58', '2023-06-24 16:23:58'),
(408, 'New Permission Added', 'https://portal.cyberonix.co/permissions', 'POST', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:25:01', '2023-06-24 16:25:01'),
(409, 'Role Updated', 'https://portal.cyberonix.co/roles/1', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:31:45', '2023-06-24 16:31:45'),
(410, 'Role Updated', 'https://portal.cyberonix.co/roles/3', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:34:01', '2023-06-24 16:34:01'),
(411, 'Role Updated', 'https://portal.cyberonix.co/roles/4', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:35:29', '2023-06-24 16:35:29'),
(412, 'Role Updated', 'https://portal.cyberonix.co/roles/3', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 16:37:28', '2023-06-24 16:37:28'),
(413, 'Role Updated', 'https://portal.cyberonix.co/roles/4', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 17:38:26', '2023-06-24 17:38:26'),
(414, 'Role Updated', 'https://portal.cyberonix.co/roles/1', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-24 18:13:05', '2023-06-24 18:13:05'),
(415, 'Role Updated', 'https://portal.cyberonix.co/roles/1', 'PUT', '61.5.158.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-25 19:10:42', '2023-06-25 19:10:42'),
(416, 'Role Updated', 'https://portal.cyberonix.co/roles/3', 'PUT', '61.5.158.99', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-25 19:11:35', '2023-06-25 19:11:35'),
(417, 'Profile Updated', 'https://portal.cyberonix.co/profile/update/2', 'PATCH', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 2, '2023-06-25 19:26:19', '2023-06-25 19:26:19'),
(418, 'Employee updated', 'https://portal.cyberonix.co/employees/Neesam-n1Qyt', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-25 21:41:16', '2023-06-25 21:41:16'),
(419, 'Employee updated', 'https://portal.cyberonix.co/employees/Neesam-n1Qyt', 'PUT', '203.101.164.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-06-25 21:41:39', '2023-06-25 21:41:39'),
(420, 'Bank Account Details Updated', 'http://portal.cyberonix.co/bank_accounts/3', 'PATCH', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 03:34:44', '2023-07-06 03:34:44'),
(421, 'Direct Permission assigned', 'https://portal.cyberonix.co/user-direct/permission/update/muhmmad-9l7Vx', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:49:48', '2023-07-06 04:49:48'),
(422, 'Salary added', 'https://portal.cyberonix.co/employees/add_salary', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:53:15', '2023-07-06 04:53:15'),
(423, 'Status updated', 'https://portal.cyberonix.co/employees/status/38', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:53:42', '2023-07-06 04:53:42'),
(424, 'Status updated', 'https://portal.cyberonix.co/employees/status/38', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:53:51', '2023-07-06 04:53:51'),
(425, 'Terminated employee', 'https://portal.cyberonix.co/employees/status/38', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:54:01', '2023-07-06 04:54:01'),
(426, 'Status updated', 'https://portal.cyberonix.co/employees/status/38', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:54:12', '2023-07-06 04:54:12'),
(427, 'Removed from list', 'https://portal.cyberonix.co/employees/status/38', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:54:20', '2023-07-06 04:54:20'),
(428, 'Designation Updated', 'https://portal.cyberonix.co/designations/17', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:55:27', '2023-07-06 04:55:27'),
(429, 'Designation Updated', 'https://portal.cyberonix.co/designations/14', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:56:35', '2023-07-06 04:56:35'),
(430, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/1', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:57:14', '2023-07-06 04:57:14'),
(431, 'New Employment Status Added', 'https://portal.cyberonix.co/employment_status', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:58:34', '2023-07-06 04:58:34'),
(432, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/9', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:58:47', '2023-07-06 04:58:47'),
(433, 'Employment Status Updated', 'https://portal.cyberonix.co/employment_status/9', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 04:59:05', '2023-07-06 04:59:05'),
(434, 'Bank Account Details Updated', 'http://portal.cyberonix.co/bank_accounts/3', 'PATCH', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 21:53:42', '2023-07-06 21:53:42'),
(435, 'User contact updated successfully', 'http://portal.cyberonix.co/user_contacts/22', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 22:00:49', '2023-07-06 22:00:49'),
(436, 'User contact updated successfully', 'http://portal.cyberonix.co/user_contacts/2', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 22:01:09', '2023-07-06 22:01:09'),
(437, 'User contact added successfully', 'http://portal.cyberonix.co/user_contacts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 22:02:45', '2023-07-06 22:02:45'),
(438, 'User contact added successfully', 'http://portal.cyberonix.co/user_contacts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 22:04:44', '2023-07-06 22:04:44'),
(439, 'User contact added successfully', 'http://portal.cyberonix.co/user_contacts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 22:05:23', '2023-07-06 22:05:23'),
(440, 'New Leave Type Added', 'http://portal.cyberonix.co/leave_types', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 23:46:01', '2023-07-06 23:46:01'),
(441, 'Leave Type Updated', 'http://portal.cyberonix.co/leave_types/10', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 23:46:12', '2023-07-06 23:46:12'),
(442, 'New Cover Image Added', 'http://portal.cyberonix.co/profile_cover_images', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 23:50:02', '2023-07-06 23:50:02'),
(443, 'Profile Updated', 'http://portal.cyberonix.co/profile/update/1', 'PATCH', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 23:50:35', '2023-07-06 23:50:35'),
(444, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 23:56:59', '2023-07-06 23:56:59'),
(445, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-06 23:59:54', '2023-07-06 23:59:54'),
(446, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 00:46:31', '2023-07-07 00:46:31'),
(447, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 00:51:45', '2023-07-07 00:51:45'),
(448, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 00:54:23', '2023-07-07 00:54:23'),
(449, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 00:57:18', '2023-07-07 00:57:18'),
(450, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 00:58:53', '2023-07-07 00:58:53'),
(451, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 01:05:47', '2023-07-07 01:05:47'),
(452, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 01:06:35', '2023-07-07 01:06:35'),
(453, 'New Announcement Added', 'https://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 01:08:26', '2023-07-07 01:08:26'),
(454, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 01:10:09', '2023-07-07 01:10:09'),
(455, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 01:10:51', '2023-07-07 01:10:51'),
(456, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/21', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 01:28:07', '2023-07-07 01:28:07'),
(457, 'Announcement Updated', 'https://portal.cyberonix.co/announcements/21', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 01:28:26', '2023-07-07 01:28:26'),
(458, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 02:24:02', '2023-07-07 02:24:02'),
(459, 'New Announcement Added', 'http://portal.cyberonix.co/announcements', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 02:30:23', '2023-07-07 02:30:23'),
(460, 'New Department Added', 'http://portal.cyberonix.co/departments', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 02:35:47', '2023-07-07 02:35:47'),
(461, 'Department Updated', 'http://portal.cyberonix.co/departments/30', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 02:38:56', '2023-07-07 02:38:56'),
(465, 'New Work shift Added', 'http://portal.cyberonix.co/work_shifts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:03:19', '2023-07-07 03:03:19'),
(466, 'Work shift Updated', 'http://portal.cyberonix.co/work_shifts/19', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:08:12', '2023-07-07 03:08:12'),
(467, 'Work shift Updated', 'http://portal.cyberonix.co/work_shifts/19', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:11:54', '2023-07-07 03:11:54'),
(468, 'Work shift Updated', 'http://portal.cyberonix.co/work_shifts/19', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:13:25', '2023-07-07 03:13:25'),
(469, 'Work shift Updated', 'http://portal.cyberonix.co/work_shifts/19', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:14:57', '2023-07-07 03:14:57'),
(470, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/19', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:21:25', '2023-07-07 03:21:25'),
(471, 'New Work shift Added', 'https://portal.cyberonix.co/work_shifts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:21:57', '2023-07-07 03:21:57'),
(472, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/20', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:22:30', '2023-07-07 03:22:30'),
(473, 'New Work shift Added', 'http://portal.cyberonix.co/work_shifts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:23:27', '2023-07-07 03:23:27'),
(474, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/21', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:38:06', '2023-07-07 03:38:06'),
(475, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/21', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:39:07', '2023-07-07 03:39:07'),
(476, 'Work shift Updated', 'https://portal.cyberonix.co/work_shifts/21', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:39:16', '2023-07-07 03:39:16'),
(477, 'New Work shift Added', 'http://portal.cyberonix.co/work_shifts', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:40:10', '2023-07-07 03:40:10'),
(478, 'Work shift Updated', 'http://portal.cyberonix.co/work_shifts/22', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:40:32', '2023-07-07 03:40:32'),
(479, 'New Position Inserted', 'http://portal.cyberonix.co/positions', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:42:25', '2023-07-07 03:42:25'),
(480, 'Position Updated', 'http://portal.cyberonix.co/positions/41', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:42:43', '2023-07-07 03:42:43'),
(481, 'Position Updated', 'http://portal.cyberonix.co/positions/41', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:44:38', '2023-07-07 03:44:38'),
(482, 'Position Updated', 'http://portal.cyberonix.co/positions/41', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:45:18', '2023-07-07 03:45:18'),
(483, 'New Position Inserted', 'http://portal.cyberonix.co/positions', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:45:41', '2023-07-07 03:45:41'),
(484, 'Position Updated', 'http://portal.cyberonix.co/positions/42', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:46:32', '2023-07-07 03:46:32'),
(485, 'Status updated', 'http://portal.cyberonix.co/employees/status/39', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:55:24', '2023-07-07 03:55:24'),
(486, 'Status updated', 'http://portal.cyberonix.co/employees/status/39', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 03:58:33', '2023-07-07 03:58:33'),
(487, 'New Employment Status Added', 'http://portal.cyberonix.co/employment_status', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 04:07:54', '2023-07-07 04:07:54'),
(488, 'Employment Status Updated', 'http://portal.cyberonix.co/employment_status/10', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-07 04:08:52', '2023-07-07 04:08:52'),
(489, 'Designation Updated', 'https://portal.cyberonix.co/designations/17', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-08 01:42:58', '2023-07-08 01:42:58'),
(490, 'New Designation Added', 'https://portal.cyberonix.co/designations', 'POST', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-08 01:43:17', '2023-07-08 01:43:17'),
(491, 'Designation Updated', 'https://portal.cyberonix.co/designations/23', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-08 01:47:04', '2023-07-08 01:47:04'),
(492, 'Designation Updated', 'https://portal.cyberonix.co/designations/23', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-08 01:47:17', '2023-07-08 01:47:17'),
(493, 'Announcement Updated', 'http://portal.cyberonix.co/announcements/3', 'PUT', '202.143.122.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.', 1, '2023-07-08 07:17:56', '2023-07-08 07:17:56'),
(494, 'Work shift Updated', 'http://portal.cyberonix.co/work_shifts/2', 'PUT', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-08 08:57:41', '2023-07-08 08:57:41'),
(495, 'Profile Updated', 'http://portal.cyberonix.co/profile/update/4', 'PATCH', '175.107.200.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 4, '2023-07-08 10:14:05', '2023-07-08 10:14:05'),
(496, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-11 22:36:11', '2023-07-11 22:36:11'),
(497, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-11 22:36:55', '2023-07-11 22:36:55'),
(498, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-11 22:40:02', '2023-07-11 22:40:02'),
(499, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-11 22:44:29', '2023-07-11 22:44:29'),
(500, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-11 22:49:00', '2023-07-11 22:49:00'),
(501, 'Employee updated', 'http://localhost/sues-cleaning/employees/Stephen-pYp2d', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-11 22:49:19', '2023-07-11 22:49:19'),
(502, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-11 23:52:38', '2023-07-11 23:52:38'),
(503, 'New Permission Added', 'http://localhost/sues-cleaning/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 00:57:52', '2023-07-12 00:57:52'),
(504, 'New Permission Added', 'http://localhost/sues-cleaning/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 00:58:07', '2023-07-12 00:58:07'),
(505, 'Role Updated', 'http://localhost/sues-cleaning/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 01:01:59', '2023-07-12 01:01:59'),
(506, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 16:52:12', '2023-07-12 16:52:12'),
(507, 'Service updated', 'http://localhost/sues-cleaning/services/Bathroom-nho', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 16:58:50', '2023-07-12 16:58:50'),
(508, 'Service updated', 'http://localhost/sues-cleaning/services/Bathroom%20updated-bh2', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 16:59:02', '2023-07-12 16:59:02'),
(509, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:00:30', '2023-07-12 17:00:30'),
(510, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:01:04', '2023-07-12 17:01:04'),
(511, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:01:35', '2023-07-12 17:01:35'),
(512, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:03:41', '2023-07-12 17:03:41'),
(513, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:04:45', '2023-07-12 17:04:45'),
(514, 'Service updated', 'http://localhost/sues-cleaning/services/Clean%20tub,%20shower%20and%20sink-Xjc', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:34:57', '2023-07-12 17:34:57'),
(515, 'Service updated', 'http://localhost/sues-cleaning/services/Vacuum-d9f', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:35:14', '2023-07-12 17:35:14'),
(516, 'Service updated', 'http://localhost/sues-cleaning/services/Furniture%20&%20Fixture%20Cleaning-DYX', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:35:21', '2023-07-12 17:35:21'),
(517, 'Service updated', 'http://localhost/sues-cleaning/services/Bathroom-AQE', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:35:27', '2023-07-12 17:35:27'),
(518, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:37:41', '2023-07-12 17:37:41'),
(519, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:39:55', '2023-07-12 17:39:55'),
(520, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:40:23', '2023-07-12 17:40:23'),
(521, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:40:50', '2023-07-12 17:40:50'),
(522, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:41:23', '2023-07-12 17:41:23'),
(523, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:42:01', '2023-07-12 17:42:01'),
(524, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:42:27', '2023-07-12 17:42:27'),
(525, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:43:06', '2023-07-12 17:43:06'),
(526, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:44:11', '2023-07-12 17:44:11'),
(527, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:44:36', '2023-07-12 17:44:36'),
(528, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:45:08', '2023-07-12 17:45:08'),
(529, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:45:39', '2023-07-12 17:45:39'),
(530, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:46:26', '2023-07-12 17:46:26'),
(531, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:46:45', '2023-07-12 17:46:45'),
(532, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:47:26', '2023-07-12 17:47:26'),
(533, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:48:05', '2023-07-12 17:48:05'),
(534, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:50:47', '2023-07-12 17:50:47'),
(535, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:51:22', '2023-07-12 17:51:22'),
(536, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:51:56', '2023-07-12 17:51:56'),
(537, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:52:16', '2023-07-12 17:52:16'),
(538, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:52:50', '2023-07-12 17:52:50'),
(539, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:53:45', '2023-07-12 17:53:45'),
(540, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:54:00', '2023-07-12 17:54:00'),
(541, 'Service added', 'http://localhost/sues-cleaning/services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 17:54:13', '2023-07-12 17:54:13'),
(542, 'Facility added', 'http://localhost/sues-cleaning/facilities', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:24:10', '2023-07-12 18:24:10'),
(543, 'Status updated', 'http://localhost/sues-cleaning/facilities/status/royal-inn-hotel-gsj', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:29:14', '2023-07-12 18:29:14'),
(544, 'Status updated', 'http://localhost/sues-cleaning/facilities/status/royal-inn-hotel-gsj', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:29:20', '2023-07-12 18:29:20'),
(545, 'Facility added', 'http://localhost/sues-cleaning/facilities', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:33:14', '2023-07-12 18:33:14'),
(546, 'Facility added', 'http://localhost/sues-cleaning/facilities', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:33:43', '2023-07-12 18:33:43'),
(547, 'Facility updated', 'http://localhost/sues-cleaning/facilities/avari-towers-karachi-kbs', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:33:54', '2023-07-12 18:33:54'),
(548, 'Facility added', 'http://localhost/sues-cleaning/facilities', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:34:23', '2023-07-12 18:34:23'),
(549, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:35:32', '2023-07-12 18:35:32'),
(550, 'Employee updated', 'http://localhost/sues-cleaning/employees/Yousuf-DPqvh', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:37:36', '2023-07-12 18:37:36'),
(551, 'Employee updated', 'http://localhost/sues-cleaning/employees/Yousuf-DPqvh', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:37:58', '2023-07-12 18:37:58'),
(552, 'Employee updated', 'http://localhost/sues-cleaning/employees/Yousuf-DPqvh', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 18:44:05', '2023-07-12 18:44:05'),
(553, 'Employee updated', 'http://localhost/sues-cleaning/employees/Yousuf-DPqvh', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 19:00:55', '2023-07-12 19:00:55'),
(554, 'Employee added', 'http://localhost/sues-cleaning/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 19:01:58', '2023-07-12 19:01:58'),
(555, 'Employee updated', 'http://localhost/sues-cleaning/employees/Oliver-WraDn', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 20:51:00', '2023-07-12 20:51:00'),
(556, 'Employee updated', 'http://localhost/sues-cleaning/employees/Jack-NUe58', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 20:53:01', '2023-07-12 20:53:01'),
(557, 'Employee updated', 'http://localhost/sues-cleaning/employees/Oliver-WraDn', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 20:55:42', '2023-07-12 20:55:42'),
(558, 'Employee updated', 'http://localhost/sues-cleaning/employees/Oliver-WraDn', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 20:57:31', '2023-07-12 20:57:31'),
(559, 'Employee updated', 'http://localhost/sues-cleaning/employees/Jack-NUe58', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 20:57:45', '2023-07-12 20:57:45'),
(560, 'Employee updated', 'http://localhost/sues-cleaning/employees/Oliver-WraDn', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 21:24:30', '2023-07-12 21:24:30'),
(561, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:35:16', '2023-07-12 23:35:16'),
(562, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:35:49', '2023-07-12 23:35:49'),
(563, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:36:17', '2023-07-12 23:36:17'),
(564, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:51:26', '2023-07-12 23:51:26'),
(565, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:51:33', '2023-07-12 23:51:33'),
(566, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:51:53', '2023-07-12 23:51:53'),
(567, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:52:07', '2023-07-12 23:52:07'),
(568, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-12 23:52:57', '2023-07-12 23:52:57'),
(569, 'New Permission Added', 'http://localhost/sues-cleaning/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 00:35:22', '2023-07-13 00:35:22'),
(570, 'Role Updated', 'http://localhost/sues-cleaning/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 00:35:35', '2023-07-13 00:35:35'),
(573, 'Task Assigned', 'http://localhost/sues-cleaning/tasks', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 18:30:41', '2023-07-13 18:30:41'),
(574, 'Task Assigned', 'http://localhost/sues-cleaning/tasks', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 18:47:42', '2023-07-13 18:47:42'),
(575, 'Task Assigned', 'http://localhost/sues-cleaning/tasks', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 18:56:00', '2023-07-13 18:56:00'),
(576, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:22:54', '2023-07-13 21:22:54'),
(577, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:23:27', '2023-07-13 21:23:27'),
(578, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:24:22', '2023-07-13 21:24:22'),
(579, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:25:06', '2023-07-13 21:25:06'),
(580, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:27:40', '2023-07-13 21:27:40'),
(581, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:27:50', '2023-07-13 21:27:50'),
(582, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:28:17', '2023-07-13 21:28:17'),
(583, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:29:45', '2023-07-13 21:29:45'),
(584, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:29:56', '2023-07-13 21:29:56'),
(585, 'Task Updated', 'http://localhost/sues-cleaning/tasks/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:30:27', '2023-07-13 21:30:27'),
(586, 'Profile Updated', 'http://localhost/sues-cleaning/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:53:31', '2023-07-13 21:53:31'),
(587, 'Profile Updated', 'http://localhost/sues-cleaning/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:53:41', '2023-07-13 21:53:41'),
(588, 'Profile Updated', 'http://localhost/sues-cleaning/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:58:24', '2023-07-13 21:58:24'),
(589, 'Profile Updated', 'http://localhost/sues-cleaning/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:59:06', '2023-07-13 21:59:06'),
(590, 'Profile Updated', 'http://localhost/sues-cleaning/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:59:13', '2023-07-13 21:59:13'),
(591, 'Profile Updated', 'http://localhost/sues-cleaning/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-13 21:59:22', '2023-07-13 21:59:22'),
(592, 'New Permission Added', 'http://localhost/sues-cleaning/permissions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 19:28:27', '2023-07-18 19:28:27'),
(593, 'Role Updated', 'http://localhost/sues-cleaning/roles/1', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 19:29:04', '2023-07-18 19:29:04'),
(594, 'Facility room added', 'http://localhost/sues-cleaning/facility_rooms', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:06:26', '2023-07-18 20:06:26'),
(595, 'Facility room added', 'http://localhost/sues-cleaning/facility_rooms', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:11:28', '2023-07-18 20:11:28'),
(596, 'Status updated', 'http://localhost/sues-cleaning/facility_rooms/status/room-1-p6x', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:11:52', '2023-07-18 20:11:52'),
(597, 'Status updated', 'http://localhost/sues-cleaning/facility_rooms/status/room-1-p6x', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:11:58', '2023-07-18 20:11:58'),
(598, 'Facility room updated', 'http://localhost/sues-cleaning/facility_rooms/room-1-p6x', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:14:51', '2023-07-18 20:14:51'),
(599, 'Facility room added', 'http://localhost/sues-cleaning/facility_rooms', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:19:43', '2023-07-18 20:19:43'),
(600, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:32:57', '2023-07-18 20:32:57'),
(601, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:38:41', '2023-07-18 20:38:41'),
(602, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:39:13', '2023-07-18 20:39:13'),
(603, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:39:24', '2023-07-18 20:39:24'),
(604, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:39:38', '2023-07-18 20:39:38'),
(605, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:39:55', '2023-07-18 20:39:55'),
(606, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:41:11', '2023-07-18 20:41:11'),
(607, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:41:19', '2023-07-18 20:41:19'),
(608, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:41:30', '2023-07-18 20:41:30'),
(609, 'Facility room added', 'http://localhost/sues-cleaning/facility_rooms', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:42:27', '2023-07-18 20:42:27'),
(610, 'Facility room added', 'http://localhost/sues-cleaning/facility_rooms', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:42:36', '2023-07-18 20:42:36'),
(611, 'Facility room added', 'http://localhost/sues-cleaning/facility_rooms', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:42:46', '2023-07-18 20:42:46');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(612, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:45:54', '2023-07-18 20:45:54'),
(613, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:46:40', '2023-07-18 20:46:40'),
(614, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:47:02', '2023-07-18 20:47:02'),
(615, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:48:43', '2023-07-18 20:48:43'),
(616, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:49:01', '2023-07-18 20:49:01'),
(617, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 20:56:38', '2023-07-18 20:56:38'),
(618, 'Facility Service Added', 'http://localhost/sues-cleaning/facility_services', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 21:11:10', '2023-07-18 21:11:10'),
(619, 'Task Assigned', 'http://localhost/sues-cleaning/tasks', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 22:58:32', '2023-07-18 22:58:32'),
(620, 'Task Assigned', 'http://localhost/sues-cleaning/tasks', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 23:35:10', '2023-07-18 23:35:10'),
(621, 'Task Assigned', 'http://localhost/sues-cleaning/tasks', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-18 23:48:48', '2023-07-18 23:48:48'),
(622, 'Task Assigned', 'http://localhost/sues-cleaning/tasks', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-19 00:00:18', '2023-07-19 00:00:18'),
(623, 'Task Updated', 'http://localhost/sues-cleaning/tasks/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(624, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(625, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(626, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(627, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', 1, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(628, 'Employee added', 'http://suescleaning.dotverge.com/employees', 'POST', '202.143.122.225', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome', 1, '2023-07-21 23:58:41', '2023-07-21 23:58:41'),
(629, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(630, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(631, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(632, 'Facility room added', 'http://suescleaning.dotverge.com/facility_rooms', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:01:23', '2023-08-08 03:01:23'),
(633, 'Facility room added', 'http://suescleaning.dotverge.com/facility_rooms', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:01:36', '2023-08-08 03:01:36'),
(634, 'Facility Service Added', 'http://suescleaning.dotverge.com/facility_services', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:01:54', '2023-08-08 03:01:54'),
(635, 'Facility Service Added', 'http://suescleaning.dotverge.com/facility_services', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:02:16', '2023-08-08 03:02:16'),
(636, 'Facility Service Added', 'http://suescleaning.dotverge.com/facility_services', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:02:47', '2023-08-08 03:02:47'),
(637, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(638, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(639, 'Task Assigned', 'http://suescleaning.dotverge.com/tasks', 'POST', '202.143.122.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Sa', 1, '2023-08-08 03:14:07', '2023-08-08 03:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(100) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_03_005317_create_permission_tables', 1),
(6, '2023_05_03_185209_create_profiles_table', 1),
(16, '2023_05_05_210039_create_log_activities_table', 1),
(25, '2023_05_18_004538_create_settings_table', 1),
(44, '2023_07_12_054614_create_facility_services_table', 6),
(45, '2023_07_12_054151_create_services_table', 7),
(46, '2023_07_12_053611_create_facilities_table', 8),
(51, '2023_07_19_000711_create_facility_rooms_table', 11),
(52, '2023_07_13_050318_create_tasks_table', 12),
(53, '2023_07_13_050515_create_task_details_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(100) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(100) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 41),
(4, 'App\\Models\\User', 42),
(4, 'App\\Models\\User', 43),
(4, 'App\\Models\\User', 44),
(4, 'App\\Models\\User', 45),
(4, 'App\\Models\\User', 46),
(4, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 49),
(4, 'App\\Models\\User', 52);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guard_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `label`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(126, 'permissions', 'permissions-list', 'web', '2023-05-27 12:52:50', '2023-05-27 12:52:50'),
(127, 'permissions', 'permissions-create', 'web', '2023-05-27 12:52:50', '2023-05-27 12:52:50'),
(128, 'permissions', 'permissions-edit', 'web', '2023-05-27 12:52:50', '2023-05-27 12:52:50'),
(129, 'permissions', 'permissions-delete', 'web', '2023-05-27 12:52:50', '2023-05-27 12:52:50'),
(130, 'permissions', 'permissions-status', 'web', '2023-05-27 12:52:50', '2023-05-27 12:52:50'),
(131, 'roles', 'roles-list', 'web', '2023-05-27 12:52:59', '2023-05-27 12:52:59'),
(132, 'roles', 'roles-create', 'web', '2023-05-27 12:52:59', '2023-05-27 12:52:59'),
(133, 'roles', 'roles-edit', 'web', '2023-05-27 12:52:59', '2023-05-27 12:52:59'),
(134, 'roles', 'roles-delete', 'web', '2023-05-27 12:53:00', '2023-05-27 12:53:00'),
(135, 'roles', 'roles-status', 'web', '2023-05-27 12:53:00', '2023-05-27 12:53:00'),
(143, 'employees', 'employees-list', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(144, 'employees', 'employees-create', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(145, 'employees', 'employees-edit', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(146, 'employees', 'employees-delete', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(147, 'employees', 'employees-status', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(204, 'setting', 'setting-create', 'web', '2023-06-12 19:53:09', '2023-06-12 19:53:09'),
(205, 'setting', 'setting-edit', 'web', '2023-06-12 19:53:09', '2023-06-12 19:53:09'),
(258, 'facility', 'facility-list', 'web', '2023-07-12 00:57:52', '2023-07-12 00:57:52'),
(259, 'facility', 'facility-create', 'web', '2023-07-12 00:57:52', '2023-07-12 00:57:52'),
(260, 'facility', 'facility-edit', 'web', '2023-07-12 00:57:52', '2023-07-12 00:57:52'),
(261, 'facility', 'facility-delete', 'web', '2023-07-12 00:57:52', '2023-07-12 00:57:52'),
(262, 'facility', 'facility-status', 'web', '2023-07-12 00:57:52', '2023-07-12 00:57:52'),
(263, 'service', 'service-list', 'web', '2023-07-12 00:58:07', '2023-07-12 00:58:07'),
(264, 'service', 'service-create', 'web', '2023-07-12 00:58:07', '2023-07-12 00:58:07'),
(265, 'service', 'service-edit', 'web', '2023-07-12 00:58:07', '2023-07-12 00:58:07'),
(266, 'service', 'service-delete', 'web', '2023-07-12 00:58:07', '2023-07-12 00:58:07'),
(267, 'service', 'service-status', 'web', '2023-07-12 00:58:07', '2023-07-12 00:58:07'),
(268, 'task', 'task-list', 'web', '2023-07-13 00:35:22', '2023-07-13 00:35:22'),
(269, 'task', 'task-create', 'web', '2023-07-13 00:35:22', '2023-07-13 00:35:22'),
(270, 'task', 'task-edit', 'web', '2023-07-13 00:35:22', '2023-07-13 00:35:22'),
(271, 'task', 'task-delete', 'web', '2023-07-13 00:35:22', '2023-07-13 00:35:22'),
(272, 'task', 'task-status', 'web', '2023-07-13 00:35:22', '2023-07-13 00:35:22'),
(273, 'room', 'room-list', 'web', '2023-07-18 19:28:27', '2023-07-18 19:28:27'),
(274, 'room', 'room-create', 'web', '2023-07-18 19:28:27', '2023-07-18 19:28:27'),
(275, 'room', 'room-edit', 'web', '2023-07-18 19:28:27', '2023-07-18 19:28:27'),
(276, 'room', 'room-delete', 'web', '2023-07-18 19:28:27', '2023-07-18 19:28:27'),
(277, 'room', 'room-status', 'web', '2023-07-18 19:28:27', '2023-07-18 19:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(100) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 44, 'MyApp', '2a8ae2470d58f7d459eee079f58155c77e19876d5ca9a17e8c08b70c4581cd76', '[\"*\"]', NULL, NULL, '2023-07-20 03:06:30', '2023-07-20 03:06:30'),
(2, 'App\\Models\\User', 44, 'MyApp', '47a04b8da8a2aaff6565431b349b4545c5d4f175a56ff1ca7ce54f0b5e995b39', '[\"*\"]', NULL, NULL, '2023-07-20 04:26:21', '2023-07-20 04:26:21'),
(3, 'App\\Models\\User', 44, 'MyApp', '48162cc8d0e03e25fcdc0843ab0d43dfae8cad1fe241d1886deacb9ffea4069d', '[\"*\"]', NULL, NULL, '2023-07-20 04:28:00', '2023-07-20 04:28:00'),
(4, 'App\\Models\\User', 44, 'MyApp', '24a8346bd092a50a94b6dd9d655e858a1ac412d46ad45b06ed043f910f09487c', '[\"*\"]', NULL, NULL, '2023-07-20 04:29:55', '2023-07-20 04:29:55'),
(5, 'App\\Models\\User', 44, 'MyApp', 'ca61b29e445db5a1185d6f46aac07f5fb4d112a922103be185e6c9e17bfe2145', '[\"*\"]', NULL, NULL, '2023-07-20 04:31:50', '2023-07-20 04:31:50'),
(6, 'App\\Models\\User', 44, 'MyApp', '70a221354bca8b994a093dfec961c9ba0f47c6d30c41f380abceee2e39c2423f', '[\"*\"]', NULL, NULL, '2023-07-20 04:33:01', '2023-07-20 04:33:01'),
(7, 'App\\Models\\User', 44, 'MyApp', 'c86eaa48f2d5da2038c5e511ae9e381725299d1215e2057797da2423babde70a', '[\"*\"]', NULL, NULL, '2023-07-20 21:28:25', '2023-07-20 21:28:25'),
(8, 'App\\Models\\User', 52, 'MyApp', '57df0d52409f03903a93c7c97a67553f36cd858c07c784b2c31937ea85f0ea18', '[\"*\"]', NULL, NULL, '2023-07-22 00:08:11', '2023-07-22 00:08:11'),
(9, 'App\\Models\\User', 52, 'MyApp', '48d21a546cdc80e6b85bce8b7ede9b4ab9a501716405c85750f796ff49732ae9', '[\"*\"]', NULL, NULL, '2023-07-22 01:54:33', '2023-07-22 01:54:33'),
(10, 'App\\Models\\User', 52, 'MyApp', '2811edccf3f548e0ccd8f57e7cbd241cdc2bf174a3c7ebf5d0ec7ad060106c8c', '[\"*\"]', NULL, NULL, '2023-07-22 01:54:56', '2023-07-22 01:54:56'),
(11, 'App\\Models\\User', 52, 'MyApp', 'dd979272994d55b2d094ac03709fb0757f9f4784372901bc9430f656a0e4c28d', '[\"*\"]', NULL, NULL, '2023-07-22 01:55:54', '2023-07-22 01:55:54'),
(12, 'App\\Models\\User', 52, 'MyApp', 'd3dc4ad420b6d86c60d31bff4f6ac696ef707757bf75344f50267d5778e0e102', '[\"*\"]', NULL, NULL, '2023-07-22 01:57:32', '2023-07-22 01:57:32'),
(13, 'App\\Models\\User', 52, 'MyApp', '968adbe5d1cf3fd50ff4a1f9eea05dadceeb1d0d6b8a0772f8b9cc40de6d42de', '[\"*\"]', NULL, NULL, '2023-07-22 01:58:57', '2023-07-22 01:58:57'),
(14, 'App\\Models\\User', 52, 'MyApp', 'ff1d84970f19337a273a6d8ffa1c5b9d26fea406266abeea41d0fe5d56eda05a', '[\"*\"]', NULL, NULL, '2023-07-22 01:59:06', '2023-07-22 01:59:06'),
(15, 'App\\Models\\User', 52, 'MyApp', '4460a25ca485067b4a9072d991a5b99fec50bd059cc5834c657cbf9a18cb7c8a', '[\"*\"]', NULL, NULL, '2023-07-22 01:59:06', '2023-07-22 01:59:06'),
(16, 'App\\Models\\User', 52, 'MyApp', 'bc5b87c2eacb494764b6d04111335dd5259da26cfd7e697619252e57d8e66daf', '[\"*\"]', NULL, NULL, '2023-07-22 02:02:46', '2023-07-22 02:02:46'),
(17, 'App\\Models\\User', 52, 'MyApp', '7a595487aa0122bbb4e7e49c6874038580fcb02a2558a105a5ff223c381a1496', '[\"*\"]', NULL, NULL, '2023-07-22 02:02:50', '2023-07-22 02:02:50'),
(18, 'App\\Models\\User', 52, 'MyApp', 'ada9bb08b5d9568780560e5e025dbd09e53ee2b07e47f64a4596d43f9c1d5d2e', '[\"*\"]', NULL, NULL, '2023-07-22 02:02:51', '2023-07-22 02:02:51'),
(19, 'App\\Models\\User', 52, 'MyApp', '836cfa0e2621d054e0a86b4173c49aedc87546d427c918b3de2cfe1ef4848ff6', '[\"*\"]', NULL, NULL, '2023-07-22 02:03:00', '2023-07-22 02:03:00'),
(20, 'App\\Models\\User', 52, 'MyApp', '4db43bd6d6d671fca3059fc468152dc624d950daf370d03e2ac21ab237a22989', '[\"*\"]', NULL, NULL, '2023-07-22 02:03:03', '2023-07-22 02:03:03'),
(21, 'App\\Models\\User', 52, 'MyApp', 'edf94f45fe5aea1f8f19a463730665c5ba273749dbcdde664ba4831cdc1f908c', '[\"*\"]', NULL, NULL, '2023-07-22 02:03:58', '2023-07-22 02:03:58'),
(22, 'App\\Models\\User', 52, 'MyApp', '17c2dd69a3d95ef73490519d8b7fd872da5fab844317da5649a32c14acca3183', '[\"*\"]', NULL, NULL, '2023-07-22 02:04:13', '2023-07-22 02:04:13'),
(23, 'App\\Models\\User', 52, 'MyApp', '9519639f9d6ddc9bd8e4e46b611089e3f5d3602022187f66e3e268188cb4240a', '[\"*\"]', NULL, NULL, '2023-07-22 02:41:12', '2023-07-22 02:41:12'),
(24, 'App\\Models\\User', 52, 'MyApp', '5dd8c9c395de5d319503183d81655f683ca6c7f181becf1f9f784d02c0f92bc3', '[\"*\"]', NULL, NULL, '2023-07-22 02:41:53', '2023-07-22 02:41:53'),
(25, 'App\\Models\\User', 52, 'MyApp', '4172fb49305d8941a099251d78fa4e935db1f2a7142a6401d0a02e02a025990f', '[\"*\"]', NULL, NULL, '2023-07-22 02:49:26', '2023-07-22 02:49:26'),
(26, 'App\\Models\\User', 52, 'MyApp', '03d55f0c716eb25f08076f590021209ce4aece9cf0570c974fd6928154c902c2', '[\"*\"]', NULL, NULL, '2023-07-22 03:44:12', '2023-07-22 03:44:12'),
(27, 'App\\Models\\User', 52, 'MyApp', '47b2227d494cbdfb8216316f0f1a2323d1a012eb287637d08db14b65ac53de54', '[\"*\"]', NULL, NULL, '2023-07-22 03:45:22', '2023-07-22 03:45:22'),
(28, 'App\\Models\\User', 52, 'MyApp', 'f9b1e0004e143ef4a582490387173f7419007665c1be9c32facd36c3ffd17e00', '[\"*\"]', NULL, NULL, '2023-07-22 03:59:46', '2023-07-22 03:59:46'),
(29, 'App\\Models\\User', 52, 'MyApp', 'b331e49e2aee1491ba3ee4f8c7f628fb7592e6423bde8ad6687122e22b73875f', '[\"*\"]', NULL, NULL, '2023-07-22 04:24:25', '2023-07-22 04:24:25'),
(30, 'App\\Models\\User', 52, 'MyApp', 'd1a88a26ac58ef320ed5abeb7c47174aac99c7ac9a4d59afc88dc4ea8c4987b3', '[\"*\"]', NULL, NULL, '2023-07-22 04:24:58', '2023-07-22 04:24:58'),
(31, 'App\\Models\\User', 52, 'MyApp', 'b42aef7fe32a818a2343eea204b4f638255afc6fbecb404e8e591b06f4545efa', '[\"*\"]', NULL, NULL, '2023-07-22 06:22:08', '2023-07-22 06:22:08'),
(32, 'App\\Models\\User', 52, 'MyApp', '67f18d88c6cd0e551c6e33c8d75a456fd1cdfaa348a2fa68650136494354979a', '[\"*\"]', NULL, NULL, '2023-08-03 00:49:41', '2023-08-03 00:49:41'),
(33, 'App\\Models\\User', 52, 'MyApp', 'f0547220a3599628ce4260f7fd682a0d0cce13b7dd20610a99f97e6d50fe794c', '[\"*\"]', NULL, NULL, '2023-08-03 00:49:56', '2023-08-03 00:49:56'),
(34, 'App\\Models\\User', 52, 'MyApp', '9081005917cf821e51225ff121187c8a30b2cda000d252030e27a0343232f774', '[\"*\"]', NULL, NULL, '2023-08-03 01:39:58', '2023-08-03 01:39:58'),
(35, 'App\\Models\\User', 52, 'MyApp', '9e2844a7206f7a1d89df679d805ca78eda1ab08761995529f8c2d717dec455d7', '[\"*\"]', NULL, NULL, '2023-08-03 01:41:31', '2023-08-03 01:41:31'),
(36, 'App\\Models\\User', 52, 'MyApp', '93fc6d891ebd89e7adf7b82d5c7cc454bfcc852015951cf11d914ea67e1c140b', '[\"*\"]', NULL, NULL, '2023-08-03 01:41:49', '2023-08-03 01:41:49'),
(37, 'App\\Models\\User', 52, 'MyApp', 'caa725238a11a114fcc456f1979a87b67c558846f35daa3f1c2f5333df3b8515', '[\"*\"]', NULL, NULL, '2023-08-03 01:41:57', '2023-08-03 01:41:57'),
(38, 'App\\Models\\User', 52, 'MyApp', '7839e4e0cda0a97dcb269d4a5f4e2abead0f3dd74d40fbda10cdc0e856bec065', '[\"*\"]', NULL, NULL, '2023-08-03 01:43:57', '2023-08-03 01:43:57'),
(39, 'App\\Models\\User', 52, 'MyApp', 'eedc14de2b29b96acb0b2eaba86180af937ecc9d4987abe76f56361a51266aab', '[\"*\"]', NULL, NULL, '2023-08-03 01:57:52', '2023-08-03 01:57:52'),
(40, 'App\\Models\\User', 52, 'MyApp', 'e284260b26f647ee140e9b09e6fee96973d40d3a3938c172be90e83852aaa4cb', '[\"*\"]', NULL, NULL, '2023-08-03 03:24:00', '2023-08-03 03:24:00'),
(41, 'App\\Models\\User', 52, 'MyApp', '31e9f28f0f537e47aa2f57562ff0f84e6ca92181bb58e6364b3d1865d6e8ac0f', '[\"*\"]', NULL, NULL, '2023-08-03 04:58:11', '2023-08-03 04:58:11'),
(42, 'App\\Models\\User', 52, 'MyApp', 'c8da5cf7e99d5e7de608b7a617962a8e1f5247dc74ee8d66d857800666cb53f3', '[\"*\"]', NULL, NULL, '2023-08-03 04:59:16', '2023-08-03 04:59:16'),
(43, 'App\\Models\\User', 52, 'MyApp', '3c2526fd05d19dc4666f6a33ccd5a9890e55173ef999b88cbf26e997e13f1eee', '[\"*\"]', NULL, NULL, '2023-08-03 05:39:07', '2023-08-03 05:39:07'),
(44, 'App\\Models\\User', 52, 'MyApp', 'b12ef025cd433b6f8ca4bfc5659c7f901ed72d4f6ca1a8ff812b1282399f91e0', '[\"*\"]', NULL, NULL, '2023-08-03 05:40:00', '2023-08-03 05:40:00'),
(45, 'App\\Models\\User', 52, 'MyApp', '078ea8c2d5a8f13bf33877e61315dc7c21d3f9de94fb12560b56f5abc8d3420b', '[\"*\"]', NULL, NULL, '2023-08-03 05:40:54', '2023-08-03 05:40:54'),
(46, 'App\\Models\\User', 52, 'MyApp', '119579eca7d862b3926c2bec92b00a2f7e0c215a85a4923bb4f9da6d5423e6e2', '[\"*\"]', NULL, NULL, '2023-08-03 05:40:55', '2023-08-03 05:40:55'),
(47, 'App\\Models\\User', 52, 'MyApp', 'c5adae52f511f9581a331b6edf1892bb8b8e7e776e15f519f7fc83283be9b26f', '[\"*\"]', NULL, NULL, '2023-08-03 05:44:00', '2023-08-03 05:44:00'),
(48, 'App\\Models\\User', 52, 'MyApp', '7b0c3a7911c5588cc8d42dec733e6c97c3b0684b596eb8c530152a3c5ad649be', '[\"*\"]', NULL, NULL, '2023-08-03 05:44:56', '2023-08-03 05:44:56'),
(49, 'App\\Models\\User', 52, 'MyApp', '35eee53c29e6683fcc6bda9f64fab2b4c6644821d6a45e25e9fca1da69444456', '[\"*\"]', NULL, NULL, '2023-08-03 05:46:27', '2023-08-03 05:46:27'),
(50, 'App\\Models\\User', 52, 'MyApp', '93950fe9089b5e19a16c8c5ac72b2c4497e3c30dee779e2ca629c5969c836317', '[\"*\"]', NULL, NULL, '2023-08-03 05:49:26', '2023-08-03 05:49:26'),
(51, 'App\\Models\\User', 52, 'MyApp', '60f9e24ce27d8008f7205ed56e40d8ff62241c5f4d9a847e03ca93e5731e16ff', '[\"*\"]', NULL, NULL, '2023-08-03 05:49:45', '2023-08-03 05:49:45'),
(52, 'App\\Models\\User', 52, 'MyApp', 'bf7f076e78d952533a062d3c7c2167b9d49e8e0ef07a49641614769f5bc924ab', '[\"*\"]', NULL, NULL, '2023-08-03 05:50:42', '2023-08-03 05:50:42'),
(53, 'App\\Models\\User', 52, 'MyApp', '495fe5bed5cb1dd27df66a5a046568c000ce1b5b273642f3f5265979238f6ffb', '[\"*\"]', NULL, NULL, '2023-08-03 06:02:44', '2023-08-03 06:02:44'),
(54, 'App\\Models\\User', 52, 'MyApp', '0e3b553d45ff16e0c85a1a5912b2f6c6a39150be06439258eb48ff7db0cb2204', '[\"*\"]', NULL, NULL, '2023-08-03 06:04:52', '2023-08-03 06:04:52'),
(55, 'App\\Models\\User', 52, 'MyApp', '5176f3bd4820e30f73a3e5618fcc9bb935bb916220690580d34d3003f2c18e39', '[\"*\"]', NULL, NULL, '2023-08-03 06:05:39', '2023-08-03 06:05:39'),
(56, 'App\\Models\\User', 52, 'MyApp', '9526d935402b72244f998c6b0fca7bbf53da7e9aa62330d23fbba9c29fb56018', '[\"*\"]', NULL, NULL, '2023-08-03 06:11:50', '2023-08-03 06:11:50'),
(57, 'App\\Models\\User', 52, 'MyApp', 'b47e77f25372206f3e55c572132b743ea9bdf61eff846b7c292d8d28bfd00a3c', '[\"*\"]', NULL, NULL, '2023-08-03 06:12:44', '2023-08-03 06:12:44'),
(58, 'App\\Models\\User', 52, 'MyApp', 'f9b365e3bb0492a0b289f2b0378f419181786d597f57139005ad1181c7458f1e', '[\"*\"]', NULL, NULL, '2023-08-03 06:13:15', '2023-08-03 06:13:15'),
(59, 'App\\Models\\User', 52, 'MyApp', 'b78a9aefdcfaed78f313764ba92e4cb919fafae84abbab6b012dce8a0c4918da', '[\"*\"]', NULL, NULL, '2023-08-03 06:24:37', '2023-08-03 06:24:37'),
(60, 'App\\Models\\User', 52, 'MyApp', 'b9d949310718383a2de4b72490a97169d504b5ffb9609223804dda11dda9eb4c', '[\"*\"]', NULL, NULL, '2023-08-03 06:25:17', '2023-08-03 06:25:17'),
(61, 'App\\Models\\User', 52, 'MyApp', 'a5d093ac26a5159230f6bdf7a1d9cf63858cbb39139e639580dd90e63615bf94', '[\"*\"]', NULL, NULL, '2023-08-03 07:08:52', '2023-08-03 07:08:52'),
(62, 'App\\Models\\User', 52, 'MyApp', 'da2ad87933d324a142d52b3883efab531462106d3f849b5c724c5b981cc73ef4', '[\"*\"]', NULL, NULL, '2023-08-03 21:32:59', '2023-08-03 21:32:59'),
(63, 'App\\Models\\User', 52, 'MyApp', 'ea4f3e1273775fe8d27aba7d99c10d08ba567652e7f63468e2687b24d021f03a', '[\"*\"]', NULL, NULL, '2023-08-07 22:36:00', '2023-08-07 22:36:00'),
(64, 'App\\Models\\User', 52, 'MyApp', '5518bc64d8defb1bbcf47acdf46d0f9e6d46065f00a67eec60e0c217b8528bca', '[\"*\"]', NULL, NULL, '2023-08-07 22:40:56', '2023-08-07 22:40:56'),
(65, 'App\\Models\\User', 52, 'MyApp', 'ff1bca328b97c864aff0fe720f50952b8a271a3463f2c2e4376520b5920f2c38', '[\"*\"]', NULL, NULL, '2023-08-07 23:25:03', '2023-08-07 23:25:03'),
(66, 'App\\Models\\User', 52, 'MyApp', '97e546d9c8f3732f46f0bb13a07656b5c0b7ba14258f74faada0a9396187856b', '[\"*\"]', NULL, NULL, '2023-08-08 00:34:05', '2023-08-08 00:34:05'),
(67, 'App\\Models\\User', 52, 'MyApp', '005b944f967165a30a72dc8963891c3f2e15ad703ef80e96048c7e4fca89eb6c', '[\"*\"]', NULL, NULL, '2023-08-08 00:34:42', '2023-08-08 00:34:42'),
(68, 'App\\Models\\User', 52, 'MyApp', 'f155fda007f989ae265121db544a434e220542c613f57dab8ab3b8722e2e608d', '[\"*\"]', NULL, NULL, '2023-08-08 02:19:56', '2023-08-08 02:19:56'),
(69, 'App\\Models\\User', 52, 'MyApp', '94a423a98de7ea50f8602a1360c35228e31b819007a9025130d753f64b62caff', '[\"*\"]', NULL, NULL, '2023-08-08 02:27:44', '2023-08-08 02:27:44'),
(70, 'App\\Models\\User', 52, 'MyApp', '8d0547372f5b692c9fbb6cb9929888db5d81b20c83598ae12bcafb3673e5b03d', '[\"*\"]', NULL, NULL, '2023-08-08 04:32:37', '2023-08-08 04:32:37'),
(71, 'App\\Models\\User', 52, 'MyApp', 'dc50befa6d5be04ce335e03af55075f018f64723d6594337c173f04672ea2512', '[\"*\"]', NULL, NULL, '2023-08-08 22:30:41', '2023-08-08 22:30:41'),
(72, 'App\\Models\\User', 52, 'MyApp', '35f1a6bff686be194fb2e008e4229346199f1ddea05ea86bdf90c9b0e048b94f', '[\"*\"]', NULL, NULL, '2023-08-08 22:35:37', '2023-08-08 22:35:37'),
(73, 'App\\Models\\User', 52, 'MyApp', 'e1f8e6eee3ad32e7833670547f7aa94b270063ba89409a34f96351ea0aa70d89', '[\"*\"]', NULL, NULL, '2023-08-08 22:39:01', '2023-08-08 22:39:01'),
(74, 'App\\Models\\User', 52, 'MyApp', 'a6e9daf54c0efc0e7f624e6002df2248d0e3a1fecbaed39478da00aaeee73a82', '[\"*\"]', NULL, NULL, '2023-08-08 22:40:35', '2023-08-08 22:40:35'),
(75, 'App\\Models\\User', 52, 'MyApp', '5230cc0853bda430c2e35433afd2f46a29fdfcfe1603022da41f215df2bdad7c', '[\"*\"]', NULL, NULL, '2023-08-08 23:55:46', '2023-08-08 23:55:46'),
(76, 'App\\Models\\User', 52, 'MyApp', '4bae30129c110bc6fafbc9dbb7115ee27aa445967b4deb6f7625b47d899a32aa', '[\"*\"]', NULL, NULL, '2023-08-08 23:56:00', '2023-08-08 23:56:00'),
(77, 'App\\Models\\User', 52, 'MyApp', 'aeeb768fa54d7ebc1fc837584b89fe4f37cfcaeafd492f2d85f7a85cb0764c97', '[\"*\"]', NULL, NULL, '2023-08-09 00:36:24', '2023-08-09 00:36:24'),
(78, 'App\\Models\\User', 52, 'MyApp', 'e32cd9e5b3e03237a8d55bc11cc7ba9a7facd14c1dd08a534d4c4d101879a1e2', '[\"*\"]', NULL, NULL, '2023-08-09 00:51:21', '2023-08-09 00:51:21'),
(79, 'App\\Models\\User', 52, 'MyApp', 'a80d222bfc949520e3e3411651ee4e48b426653cbbf324b9adc489e9795511fa', '[\"*\"]', NULL, NULL, '2023-08-09 01:33:38', '2023-08-09 01:33:38'),
(80, 'App\\Models\\User', 52, 'MyApp', 'b0be992b93a3676e8557ed1fc59e37d7d9cd7d5eea7f18e41832dacf2bcf72db', '[\"*\"]', NULL, NULL, '2023-08-09 05:12:59', '2023-08-09 05:12:59'),
(81, 'App\\Models\\User', 52, 'MyApp', '03dbbdf980be1d335321407a07c8c128ca7252fbe78cabe95f484418816ef576', '[\"*\"]', NULL, NULL, '2023-08-09 05:43:19', '2023-08-09 05:43:19'),
(82, 'App\\Models\\User', 52, 'MyApp', '3067dd90cbd3b85cc6ec7198173f3114cf920c8bcb5324877f44ea1c6f48fa37', '[\"*\"]', NULL, NULL, '2023-08-09 05:46:34', '2023-08-09 05:46:34'),
(83, 'App\\Models\\User', 52, 'MyApp', '9b929ba2a5cb01aea092955e5fb4ebdde7de944dba08a88d84d66688716ecfdb', '[\"*\"]', NULL, NULL, '2023-08-09 22:39:28', '2023-08-09 22:39:28'),
(84, 'App\\Models\\User', 52, 'MyApp', '5fcf036398dee1a5550f5a53a1fc881b23b0adf0f3eee40bd86ba206b0fa6ab8', '[\"*\"]', NULL, NULL, '2023-08-10 05:53:39', '2023-08-10 05:53:39'),
(85, 'App\\Models\\User', 52, 'MyApp', '1cbe43e902be6ace4a3ec619619bf803172f8bb8901edda383dba296f3a35533', '[\"*\"]', NULL, NULL, '2023-08-10 06:00:58', '2023-08-10 06:00:58'),
(86, 'App\\Models\\User', 52, 'MyApp', '4cbf6eb337726cf23d23ef5fabcddc710a269911fc246eb6acfb314cfe8b3fed', '[\"*\"]', NULL, NULL, '2023-08-10 09:08:50', '2023-08-10 09:08:50'),
(87, 'App\\Models\\User', 52, 'MyApp', '549eaaac22f3c2f1ee124cebb579efd5cc757e75feefcce743965d829a8a4555', '[\"*\"]', NULL, NULL, '2023-08-11 07:28:50', '2023-08-11 07:28:50'),
(88, 'App\\Models\\User', 52, 'MyApp', 'cda2259f128904197bfc96ab247cc17c4bb221397a60072edd965b5e9676a70a', '[\"*\"]', NULL, NULL, '2023-08-12 10:54:24', '2023-08-12 10:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `employment_id` bigint(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `employment_id`, `date_of_birth`, `phone_number`, `city`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1, 1145, '2023-05-06', '1234567800', 'New Yark', '1689285221.png', '2023-05-23 16:53:05', '2023-07-13 21:59:13'),
(32, 44, 1690, '2023-07-12', '45454545', NULL, NULL, '2023-07-11 22:44:29', '2023-07-11 22:44:29'),
(33, 45, 1548, '2023-07-10', '4644545', NULL, NULL, '2023-07-11 22:49:00', '2023-07-11 22:49:19'),
(34, 46, 1090, '2023-07-18', '45454', 'NewYark', NULL, '2023-07-11 23:52:38', '2023-07-12 19:00:55'),
(35, 47, 4908, '2023-07-14', '23434343', 'New Yark', NULL, '2023-07-12 18:35:29', '2023-07-12 20:57:45'),
(36, 49, 7887, '2023-07-15', '545454554', 'New City', NULL, '2023-07-12 19:01:55', '2023-07-12 21:24:30'),
(39, 52, 6354, '2023-09-07', '12345678923', 'California', 'profile.png', '2023-07-21 23:58:41', '2023-08-09 05:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `guard_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(4, 'Employee', 'web', '2023-05-23 17:53:02', '2023-05-23 17:53:02');

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
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(204, 1),
(205, 1),
(258, 1),
(259, 1),
(260, 1),
(261, 1),
(262, 1),
(263, 1),
(264, 1),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(269, 1),
(270, 1),
(271, 1),
(272, 1),
(273, 1),
(274, 1),
(275, 1),
(276, 1),
(277, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_service_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `parent_service_id`, `name`, `slug`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Bathroom', 'bathroom-9uz', 1, NULL, '2023-07-12 17:00:30', '2023-07-12 17:35:27'),
(3, NULL, 'Kitchen', 'Kitchen-JzE', 1, NULL, '2023-07-12 17:01:04', '2023-07-12 17:01:04'),
(4, NULL, 'Furniture & Fixture Cleaning', 'furniture-fixture-cleaning-1jr', 1, NULL, '2023-07-12 17:01:35', '2023-07-12 17:35:21'),
(5, NULL, 'Vacuum', 'vacuum-yu7', 1, NULL, '2023-07-12 17:03:41', '2023-07-12 17:35:14'),
(6, 2, 'Clean tub, shower and sink', 'clean-tub-shower-and-sink-6xr', 1, NULL, '2023-07-12 17:04:45', '2023-07-12 17:34:57'),
(7, 2, 'Clean outside/inside cabinet', 'clean-outsideinside-cabinet-vrq', 1, NULL, '2023-07-12 17:37:41', '2023-07-12 17:37:41'),
(8, 2, 'Clean outside/inside of medicine cabinet', 'clean-outsideinside-of-medicine-cabinet-ili', 1, NULL, '2023-07-12 17:39:55', '2023-07-12 17:39:55'),
(9, 2, 'Wipe down mirrors and covers', 'wipe-down-mirrors-and-covers-iyf', 1, NULL, '2023-07-12 17:40:23', '2023-07-12 17:40:23'),
(10, 2, 'Sweep and mop floor', 'sweep-and-mop-floor-l3t', 1, NULL, '2023-07-12 17:40:50', '2023-07-12 17:40:50'),
(11, 2, 'Clean lights and see if they are working', 'clean-lights-and-see-if-they-are-working-kfr', 1, NULL, '2023-07-12 17:41:23', '2023-07-12 17:41:23'),
(12, 2, 'Wipe down all towel bars and TP holder', 'wipe-down-all-towel-bars-and-tp-holder-p8k', 1, NULL, '2023-07-12 17:42:01', '2023-07-12 17:42:01'),
(13, 2, 'Spray freshener', 'spray-freshener-rte', 1, NULL, '2023-07-12 17:42:27', '2023-07-12 17:42:27'),
(14, 3, 'Clean refrigerator inside/outside', 'clean-refrigerator-insideoutside-hvs', 1, NULL, '2023-07-12 17:43:06', '2023-07-12 17:43:06'),
(15, 3, 'Dust cabinets', 'dust-cabinets-te1', 1, NULL, '2023-07-12 17:44:11', '2023-07-12 17:44:11'),
(16, 3, 'Wipe down countertops', 'wipe-down-countertops-e3z', 1, NULL, '2023-07-12 17:44:36', '2023-07-12 17:44:36'),
(17, 3, 'Clean oven and stove (if applicable)', 'clean-oven-and-stove-if-applicable-1p8', 1, NULL, '2023-07-12 17:45:08', '2023-07-12 17:45:08'),
(18, 3, 'Clean inside/outside of cabinet', 'clean-insideoutside-of-cabinet-fqp', 1, NULL, '2023-07-12 17:45:39', '2023-07-12 17:45:39'),
(19, 3, 'Wipe down sink', 'wipe-down-sink-orp', 1, NULL, '2023-07-12 17:46:26', '2023-07-12 17:46:26'),
(20, 3, 'Sweep and mop floor', 'sweep-and-mop-floor-5wl', 1, NULL, '2023-07-12 17:46:45', '2023-07-12 17:46:45'),
(21, 3, 'Check appliances for working condition', 'check-appliances-for-working-condition-oap', 1, NULL, '2023-07-12 17:47:26', '2023-07-12 17:47:26'),
(22, 3, 'Wipe walls behind sink and by trash', 'wipe-walls-behind-sink-and-by-trash-1ra', 1, NULL, '2023-07-12 17:48:05', '2023-07-12 17:48:05'),
(23, 4, 'Dust lamp shades/light fixtures/pictures', 'dust-lamp-shadeslight-fixturespictures-bdk', 1, NULL, '2023-07-12 17:50:47', '2023-07-12 17:50:47'),
(24, 4, 'Dust furniture top/sides front', 'dust-furniture-topsides-front-y0s', 1, NULL, '2023-07-12 17:51:22', '2023-07-12 17:51:22'),
(25, 4, 'Wipe down door knobs', 'wipe-down-door-knobs-0xp', 1, NULL, '2023-07-12 17:51:56', '2023-07-12 17:51:56'),
(26, 4, 'Wipe window sills', 'wipe-window-sills-1bw', 1, NULL, '2023-07-12 17:52:16', '2023-07-12 17:52:16'),
(27, 4, 'Clean closet mirrors and other glass', 'clean-closet-mirrors-and-other-glass-rsx', 1, NULL, '2023-07-12 17:52:50', '2023-07-12 17:52:50'),
(28, 5, 'Bedroom', 'bedroom-nv8', 1, NULL, '2023-07-12 17:53:45', '2023-07-12 17:53:45'),
(29, 5, 'Living room', 'living-room-hpl', 1, NULL, '2023-07-12 17:54:00', '2023-07-12 17:54:00'),
(30, 5, 'Entry', 'entry-qs7', 1, NULL, '2023-07-12 17:54:13', '2023-07-12 17:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `max_discrepancies` int(11) DEFAULT NULL,
  `max_leaves` int(11) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `currency_symbol` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `favicon`, `banner`, `language`, `max_discrepancies`, `max_leaves`, `country`, `area`, `city`, `state`, `zip_code`, `address`, `currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'Cyberonix Consulting Limited', '1684880051.png', '1684880051.png', '1684880051.png', 'English', 6, 6, 'pakistan', NULL, NULL, NULL, NULL, NULL, 'PKR', '2023-05-23 17:14:11', '2023-06-12 20:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `facility_id` bigint(20) NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `comment` text DEFAULT NULL,
  `extra_hours` time DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=completed, 2=rejected',
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `employee_id`, `facility_id`, `room_id`, `date`, `comment`, `extra_hours`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 46, 4, 1, '2023-07-20', NULL, NULL, 0, NULL, '2023-07-19 00:00:18', '2023-07-19 00:01:50'),
(2, 44, 4, 1, '2023-07-21', 'Lorem ipsum', NULL, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(3, 44, 4, 2, '2023-07-21', 'Test User: Done my task User: Done my task User: Done my task', '01:00:00', 0, NULL, '2023-07-20 04:50:41', '2023-08-04 01:29:40'),
(4, 52, 4, 1, '2023-08-08', NULL, NULL, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(5, 52, 4, 2, '2023-08-08', NULL, NULL, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(6, 52, 4, 3, '2023-08-08', NULL, NULL, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(7, 52, 3, 5, '2023-08-08', NULL, NULL, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(8, 52, 3, 6, '2023-08-08', NULL, NULL, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(9, 52, 4, 1, '2023-08-09', NULL, NULL, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

CREATE TABLE `task_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) NOT NULL,
  `parent_service_id` bigint(20) NOT NULL,
  `sub_service_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=completed, 2=rejected',
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_details`
--

INSERT INTO `task_details` (`id`, `task_id`, `parent_service_id`, `sub_service_id`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(9, 1, 2, 6, 1, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(10, 1, 2, 7, 1, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(11, 1, 2, 8, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(12, 1, 2, 9, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(13, 1, 2, 10, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(14, 1, 2, 11, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(15, 1, 2, 12, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(16, 1, 2, 13, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(17, 1, 5, 28, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(18, 1, 5, 29, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(19, 1, 5, 30, 0, NULL, '2023-07-19 00:01:22', '2023-07-19 00:01:22'),
(20, 2, 2, 6, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(21, 2, 2, 7, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(22, 2, 2, 8, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(23, 2, 2, 9, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(24, 2, 2, 10, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(25, 2, 2, 11, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(26, 2, 2, 12, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(27, 2, 2, 13, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(28, 2, 4, 23, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(29, 2, 4, 24, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(30, 2, 4, 25, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(31, 2, 4, 26, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(32, 2, 4, 27, 0, NULL, '2023-07-20 04:47:08', '2023-07-20 04:47:08'),
(33, 2, 2, 6, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(34, 2, 2, 7, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(35, 2, 2, 8, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(36, 2, 2, 9, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(37, 2, 2, 10, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(38, 2, 2, 11, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(39, 2, 2, 12, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(40, 2, 2, 13, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(41, 2, 5, 28, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(42, 2, 5, 29, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(43, 2, 5, 30, 0, NULL, '2023-07-20 04:47:32', '2023-07-20 04:47:32'),
(44, 2, 2, 6, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(45, 2, 2, 7, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(46, 2, 2, 8, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(47, 2, 2, 9, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(48, 2, 2, 10, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(49, 2, 2, 11, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(50, 2, 2, 12, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(51, 2, 2, 13, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(52, 2, 5, 28, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(53, 2, 5, 29, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(54, 2, 5, 30, 0, NULL, '2023-07-20 04:48:17', '2023-07-20 04:48:17'),
(55, 3, 2, 6, 1, NULL, '2023-07-20 04:50:41', '2023-07-20 23:02:48'),
(56, 3, 2, 7, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(57, 3, 2, 8, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(58, 3, 2, 9, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(59, 3, 2, 10, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(60, 3, 2, 11, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(61, 3, 2, 12, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(62, 3, 2, 13, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(63, 3, 5, 28, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(64, 3, 5, 29, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(65, 3, 5, 30, 0, NULL, '2023-07-20 04:50:41', '2023-07-20 04:50:41'),
(66, 4, 2, 6, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(67, 4, 2, 7, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(68, 4, 2, 8, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(69, 4, 2, 9, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(70, 4, 2, 10, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(71, 4, 2, 11, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(72, 4, 2, 12, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(73, 4, 2, 13, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(74, 4, 3, 14, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(75, 4, 3, 15, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(76, 4, 3, 16, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(77, 4, 3, 17, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(78, 4, 3, 18, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(79, 4, 3, 19, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(80, 4, 3, 20, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(81, 4, 3, 21, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(82, 4, 3, 22, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(83, 4, 4, 23, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(84, 4, 4, 24, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(85, 4, 4, 25, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(86, 4, 4, 26, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(87, 4, 4, 27, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(88, 4, 5, 28, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(89, 4, 5, 29, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(90, 4, 5, 30, 0, NULL, '2023-08-08 00:32:22', '2023-08-08 00:32:22'),
(91, 5, 4, 23, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(92, 5, 4, 24, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(93, 5, 4, 25, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(94, 5, 4, 26, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(95, 5, 4, 27, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(96, 5, 5, 28, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(97, 5, 5, 29, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(98, 5, 5, 30, 0, NULL, '2023-08-08 00:32:53', '2023-08-08 00:32:53'),
(99, 6, 2, 6, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(100, 6, 2, 7, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(101, 6, 2, 8, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(102, 6, 2, 9, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(103, 6, 2, 10, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(104, 6, 2, 11, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(105, 6, 2, 12, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(106, 6, 2, 13, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(107, 6, 3, 14, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(108, 6, 3, 15, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(109, 6, 3, 16, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(110, 6, 3, 17, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(111, 6, 3, 18, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(112, 6, 3, 19, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(113, 6, 3, 20, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(114, 6, 3, 21, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(115, 6, 3, 22, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(116, 6, 4, 23, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(117, 6, 4, 24, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(118, 6, 4, 25, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(119, 6, 4, 26, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(120, 6, 4, 27, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(121, 6, 5, 28, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(122, 6, 5, 29, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(123, 6, 5, 30, 0, NULL, '2023-08-08 00:33:38', '2023-08-08 00:33:38'),
(124, 7, 2, 6, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(125, 7, 2, 7, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(126, 7, 2, 8, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(127, 7, 2, 9, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(128, 7, 2, 10, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(129, 7, 2, 11, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(130, 7, 2, 12, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(131, 7, 2, 13, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(132, 7, 3, 14, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(133, 7, 3, 15, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(134, 7, 3, 16, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(135, 7, 3, 17, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(136, 7, 3, 18, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(137, 7, 3, 19, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(138, 7, 3, 20, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(139, 7, 3, 21, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(140, 7, 3, 22, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(141, 7, 4, 23, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(142, 7, 4, 24, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(143, 7, 4, 25, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(144, 7, 4, 26, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(145, 7, 4, 27, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(146, 7, 5, 28, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(147, 7, 5, 29, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(148, 7, 5, 30, 0, NULL, '2023-08-08 03:03:28', '2023-08-08 03:03:28'),
(149, 8, 2, 6, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(150, 8, 2, 7, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(151, 8, 2, 8, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(152, 8, 2, 9, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(153, 8, 2, 10, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(154, 8, 2, 11, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(155, 8, 2, 12, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(156, 8, 2, 13, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(157, 8, 3, 14, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(158, 8, 3, 15, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(159, 8, 3, 16, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(160, 8, 3, 17, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(161, 8, 3, 18, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(162, 8, 3, 19, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(163, 8, 3, 20, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(164, 8, 3, 21, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(165, 8, 3, 22, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(166, 8, 4, 23, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(167, 8, 4, 24, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(168, 8, 4, 25, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(169, 8, 4, 26, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(170, 8, 4, 27, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(171, 8, 5, 28, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(172, 8, 5, 29, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(173, 8, 5, 30, 0, NULL, '2023-08-08 03:03:58', '2023-08-08 03:03:58'),
(174, 9, 2, 6, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(175, 9, 2, 7, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(176, 9, 2, 8, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(177, 9, 2, 9, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(178, 9, 2, 10, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(179, 9, 2, 11, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(180, 9, 2, 12, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(181, 9, 2, 13, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(182, 9, 3, 14, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(183, 9, 3, 15, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(184, 9, 3, 16, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(185, 9, 3, 17, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(186, 9, 3, 18, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(187, 9, 3, 19, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(188, 9, 3, 20, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(189, 9, 3, 21, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(190, 9, 3, 22, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(191, 9, 4, 23, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(192, 9, 4, 24, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(193, 9, 4, 25, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(194, 9, 4, 26, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(195, 9, 4, 27, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(196, 9, 5, 28, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(197, 9, 5, 29, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07'),
(198, 9, 5, 30, 0, NULL, '2023-08-08 03:14:07', '2023-08-08 03:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `task_pictures`
--

CREATE TABLE `task_pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_pictures`
--

INSERT INTO `task_pictures` (`id`, `task_id`, `picture`, `created_at`, `updated_at`) VALUES
(2, 3, '1689876337_8.png', '2023-07-20 23:05:37', '2023-07-20 23:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(191) DEFAULT NULL,
  `is_employee` tinyint(1) NOT NULL DEFAULT 1,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `verify_token` varchar(191) DEFAULT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_by`, `status`, `slug`, `is_employee`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `verify_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'admin-dmLRI', 0, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, NULL, '2023-05-23 16:53:05', '2023-07-13 21:59:22'),
(44, 1, 1, 'John-CfyrE', 1, 'John', 'Doe', 'john.doe@gmail.com', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, NULL, '2023-07-11 22:44:29', '2023-07-11 22:44:29'),
(45, 1, 1, 'Stephen-pYp2d', 1, 'Stephen', 'Joe', 'stephen@gmail.com', NULL, '$2y$10$nTfs35HDM0UotFzGa6tdqerwQrme.gvEY4mWVoyphRr49hgfOZn.u', NULL, NULL, '2023-07-12 04:59:56', '2023-07-11 22:49:00', '2023-07-11 23:59:56'),
(46, 1, 1, 'Yousuf-DPqvh', 1, 'Henry', 'Henry', 'henry@gmail.com', NULL, '$2y$10$/A1AeQZo7bHbfAu9lHZGVeDWAgn2n6eGdzU/Jhpf/0k2UqtgSmDFy', NULL, NULL, NULL, '2023-07-11 23:52:38', '2023-07-12 18:37:58'),
(47, 1, 1, 'Jack-NUe58', 1, 'Jack', 'Benjamin', 'jack@gmail.com', NULL, '$2y$10$h9MErBP1/xBVqdIDgeNDNeJNRPDkGofZH6F67iRUmlg3bCCRWs14W', NULL, NULL, NULL, '2023-07-12 18:35:29', '2023-07-12 18:35:29'),
(49, 1, 1, 'Oliver-WraDn', 1, 'Oliver', 'Oliver', 'oliver@gmail.com', NULL, '$2y$10$2Zdsd/5AuwFy//vzWSbcze/l8T2Gbub3sAkF.5U.z45JS7/YBPYW6', NULL, NULL, NULL, '2023-07-12 19:01:55', '2023-07-12 19:01:55'),
(52, 1, 1, 'moon-pTPFd', 1, 'Moon', 'David', 'moon@gmail.com', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, NULL, '2023-07-21 23:58:41', '2023-08-09 05:36:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_rooms`
--
ALTER TABLE `facility_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_services`
--
ALTER TABLE `facility_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_details`
--
ALTER TABLE `task_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_pictures`
--
ALTER TABLE `task_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facility_rooms`
--
ALTER TABLE `facility_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facility_services`
--
ALTER TABLE `facility_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `task_details`
--
ALTER TABLE `task_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `task_pictures`
--
ALTER TABLE `task_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
