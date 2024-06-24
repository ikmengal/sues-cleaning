-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2023 at 06:55 PM
-- Server version: 8.0.27
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_hr_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by` bigint NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `created_by`, `title`, `description`, `start_date`, `end_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dear Employees,', '<p>As part of our efforts to streamline our payment processes, we would like to request that all employees provide their IBAN # through the form provided below.</p>\n\n<p>&nbsp;</p>\n\n<p>Please take a few moments to fill out the form with your accurate and complete IBAN information. This will ensure that your salaries, arrears, and reimbursements, are processed efficiently and without delay.</p>\n\n<p>&nbsp;</p>\n\n<p><a href=\"https://hr.cyberonix.co/bank-detail\" target=\"_blank\">https://hr.cyberonix.co/bank-detail</a></p>\n\n<p>&nbsp;</p>\n\n<p>If you encounter any issues or have any questions, please reach out to Sameer at +92 336 1227503. Thank you for your cooperation in this matter.</p>\n\n<p>&nbsp;</p>\n\n<p>Management,</p>\n\n<p>Cyberonix Consulting</p>', '2023-05-26', NULL, 1, NULL, '2023-05-26 13:19:12', '2023-05-26 13:19:12'),
(2, 1, 'Eid Mubarak,', '<p>On this Eid, let&#39;s pause and express our gratitude for our achievements as a team, and count our blessings. Cyberonix Consulting extends warm wishes to all our employees for a joyful and delightful Eid, filled with family time and a scrumptious feast. We deeply appreciate the dedication and commitment of each team member towards our organization, and applaud your commendable hard work and involvement. May Allah bestow His blessings upon you and your loved ones during this auspicious occasion.</p>\n\n<p>We have reached new heights, which would not have been possible without your contributions, and we congratulate ourselves as a team. Thank you once again, and have a very happy Eid Mubarak.</p>', '2023-05-01', NULL, 1, NULL, '2023-05-26 13:19:44', '2023-05-26 13:19:44'),
(3, 1, 'Welcome to Cyberonix Consulting', '<p>Use this portal to view your attendance, apply for leaves, adding discrepancies, and setting up your professional profile.</p>\n\n<p>The portal is under construction,and so,new features are on their way. In case you face any trouble, contact your reporting authority.</p>', '2023-05-01', NULL, 1, NULL, '2023-05-26 13:20:04', '2023-05-26 13:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_departments`
--

DROP TABLE IF EXISTS `announcement_departments`;
CREATE TABLE IF NOT EXISTS `announcement_departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `announcement_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcement_departments_announcement_id_foreign` (`announcement_id`),
  KEY `announcement_departments_department_id_foreign` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcement_departments`
--

INSERT INTO `announcement_departments` (`id`, `announcement_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 1, 24, '2023-05-26 13:19:12', '2023-05-26 13:19:12'),
(2, 2, 24, '2023-05-26 13:19:44', '2023-05-26 13:19:44'),
(3, 3, 24, '2023-05-26 13:20:04', '2023-05-26 13:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_id` bigint DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `work_shift_id` bigint UNSIGNED NOT NULL,
  `in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'check in date time',
  `behavior` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'O=>out, I=In',
  `status_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_user_id_foreign` (`user_id`),
  KEY `attendances_work_shift_id_foreign` (`work_shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `log_id`, `user_id`, `work_shift_id`, `in_date`, `behavior`, `status_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 1, '2023-05-23 08:25:52', 'I', NULL, '2023-05-26 19:11:18', '2023-05-26 19:11:18'),
(2, NULL, 3, 1, '2023-05-25 08:25:52', 'I', NULL, '2023-05-26 19:11:18', '2023-05-26 19:11:18'),
(3, NULL, 3, 1, '2023-05-25 08:25:52', 'I', NULL, '2023-05-26 19:13:29', '2023-05-26 19:13:29'),
(4, NULL, 3, 1, '2023-05-25 08:56:18', 'O', NULL, '2023-05-26 19:13:59', '2023-05-26 19:13:59'),
(5, NULL, 3, 1, '2023-05-25 08:56:18', 'O', NULL, '2023-05-26 19:14:40', '2023-05-26 19:14:40'),
(6, NULL, 3, 1, '2023-05-25 08:56:18', 'O', NULL, '2023-05-26 19:14:40', '2023-05-26 19:14:40'),
(7, NULL, 3, 1, '2023-05-25 09:07:40', 'I', NULL, '2023-05-26 19:15:39', '2023-05-26 19:15:39'),
(8, NULL, 3, 1, '2023-05-25 09:07:40', 'I', NULL, '2023-05-26 19:15:55', '2023-05-26 19:15:55'),
(9, NULL, 3, 1, '2023-05-25 09:07:40', 'I', NULL, '2023-05-26 19:16:18', '2023-05-26 19:16:18'),
(10, NULL, 3, 1, '2023-05-27 04:10:57', 'I', NULL, '2023-05-26 23:50:57', '2023-05-26 23:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

DROP TABLE IF EXISTS `bank_accounts`;
CREATE TABLE IF NOT EXISTS `bank_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_holder_id` bigint DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iban` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_employer_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_salary` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active, 0=in-active',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_accounts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `account_holder_id`, `user_id`, `bank_name`, `branch_code`, `iban`, `account`, `title`, `education`, `last_employer_name`, `last_salary`, `last_designation`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 'Bank Al Habib', '12345', '345678900', '09876645333', 'Amar Chand', 'BSCS', 'Assistant Manager', '1234', 'Assistant Manager', 1, NULL, '2023-05-26 20:17:27', '2023-05-26 20:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `manager_id` bigint DEFAULT NULL,
  `parent_department_id` bigint DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `manager_id`, `parent_department_id`, `name`, `description`, `location`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Main Department', NULL, NULL, 1, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, NULL, NULL, 'N/A', NULL, NULL, 1, NULL, '2023-05-24 00:17:06', '2023-05-24 00:17:06'),
(3, NULL, 1, 'Software Development', '<p>Software Development</p>', NULL, 1, NULL, '2023-05-23 19:25:09', '2023-05-23 19:25:09'),
(4, NULL, 1, 'Accounts & Finance', '<p>Accounts &amp; Finance</p>', NULL, 1, NULL, '2023-05-23 19:25:29', '2023-05-23 19:25:29'),
(5, NULL, 1, 'Sales', '<p>Sales</p>', NULL, 1, NULL, '2023-05-23 19:25:51', '2023-05-23 19:25:51'),
(6, NULL, 1, 'Creative Writing', '<p>Creative Writing</p>', NULL, 1, NULL, '2023-05-23 19:26:28', '2023-05-23 19:26:28'),
(7, NULL, 1, 'Brand Management', '<p>Brand Management</p>', NULL, 1, NULL, '2023-05-23 19:26:44', '2023-05-23 19:26:44'),
(8, NULL, 1, 'SEO Department', NULL, NULL, 1, NULL, '2023-05-23 19:26:56', '2023-05-23 19:26:56'),
(9, NULL, 1, 'Digital Marketing', NULL, NULL, 1, NULL, '2023-05-23 19:27:08', '2023-05-23 19:27:08'),
(10, NULL, 1, 'Quality Assurance', NULL, NULL, 1, NULL, '2023-05-23 19:27:17', '2023-05-23 19:27:17'),
(11, NULL, 1, 'Business Development', NULL, NULL, 1, NULL, '2023-05-23 19:27:27', '2023-05-23 19:27:27'),
(12, NULL, 1, 'Customer Support Unit-1', NULL, NULL, 1, NULL, '2023-05-23 19:27:37', '2023-05-23 19:27:37'),
(13, NULL, 1, 'Creative Design', '<p>Creative Design</p>', NULL, 1, NULL, '2023-05-23 19:27:59', '2023-05-23 19:27:59'),
(14, NULL, 1, 'Video Animation', '<p>Video Animation</p>', NULL, 1, NULL, '2023-05-23 19:28:20', '2023-05-23 19:28:20'),
(15, NULL, 1, 'Management Committee', '<p>Management Committee</p>', NULL, 1, NULL, '2023-05-23 19:28:39', '2023-05-23 19:28:39'),
(16, NULL, 1, 'Upwork', '<p>Upwork</p>', NULL, 1, NULL, '2023-05-23 19:29:03', '2023-05-23 19:29:03'),
(17, NULL, 1, 'Customer Support Unit 2', '<p>Customer Support Unit 2</p>', NULL, 1, NULL, '2023-05-23 19:29:15', '2023-05-23 19:29:15'),
(18, NULL, 1, 'PPC Unit 1', '<p>PPC Unit 1</p>', NULL, 1, NULL, '2023-05-23 19:29:30', '2023-05-23 19:29:30'),
(19, NULL, 1, 'Production Unit', '<p>Production Unit</p>', NULL, 1, NULL, '2023-05-23 19:29:44', '2023-05-23 19:29:44'),
(20, NULL, 1, 'Design Unit', '<p>Design Unit</p>', NULL, 1, NULL, '2023-05-23 19:29:59', '2023-05-23 19:29:59'),
(21, NULL, 1, 'Animation Unit', '<p>Animation Unit</p>', NULL, 1, NULL, '2023-05-23 19:30:11', '2023-05-23 19:30:11'),
(22, NULL, 1, 'Website Unit', '<p>Website Unit</p>', NULL, 1, NULL, '2023-05-23 19:30:21', '2023-05-23 19:30:21'),
(23, NULL, 1, 'Support Team 3', '<p>Support Team 3</p>', NULL, 1, NULL, '2023-05-23 19:30:37', '2023-05-23 19:30:37'),
(24, 2, 1, 'App Unit', '<p>App Unit</p>', NULL, 1, NULL, '2023-05-23 19:30:55', '2023-05-24 13:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `department_users`
--

DROP TABLE IF EXISTS `department_users`;
CREATE TABLE IF NOT EXISTS `department_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_users_department_id_foreign` (`department_id`),
  KEY `department_users_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_users`
--

INSERT INTO `department_users` (`id`, `department_id`, `user_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 24, 2, '0000-00-00', NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19'),
(3, 24, 3, '0000-00-00', NULL, '2023-05-24 13:22:48', '2023-05-24 13:22:48'),
(4, 24, 4, '0000-00-00', NULL, '2023-05-24 13:24:31', '2023-05-24 13:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `department_work_shifts`
--

DROP TABLE IF EXISTS `department_work_shifts`;
CREATE TABLE IF NOT EXISTS `department_work_shifts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` bigint UNSIGNED NOT NULL,
  `work_shift_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_work_shifts_department_id_foreign` (`department_id`),
  KEY `department_work_shifts_work_shift_id_foreign` (`work_shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_work_shifts`
--

INSERT INTO `department_work_shifts` (`id`, `department_id`, `work_shift_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2023-05-23 19:25:51', '2023-05-23 19:25:51'),
(2, 6, 1, '2023-05-23 19:26:28', '2023-05-23 19:26:28'),
(3, 7, 1, '2023-05-23 19:26:44', '2023-05-23 19:26:44'),
(4, 13, 1, '2023-05-23 19:27:59', '2023-05-23 19:27:59'),
(5, 15, 1, '2023-05-23 19:28:39', '2023-05-23 19:28:39'),
(6, 19, 1, '2023-05-23 19:29:44', '2023-05-23 19:29:44'),
(7, 20, 1, '2023-05-23 19:29:59', '2023-05-23 19:29:59'),
(8, 23, 1, '2023-05-23 19:30:37', '2023-05-23 19:30:37'),
(10, 24, 1, '2023-05-24 13:18:04', '2023-05-24 13:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Vice President - Business Unit Head', NULL, 1, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Director', '<p>Director</p>', 1, NULL, '2023-05-23 18:11:16', '2023-05-23 18:11:16'),
(3, 'N/A', '<p>N/A</p>', 1, NULL, '2023-05-23 18:18:51', '2023-05-23 18:18:51'),
(4, 'Manager - Account & Finance', '<p>Manager - Account &amp; Finance</p>', 1, NULL, '2023-05-23 18:19:04', '2023-05-23 18:19:04'),
(5, 'CEO', '<p>CEO</p>', 1, NULL, '2023-05-23 18:19:13', '2023-05-23 18:19:13'),
(6, 'Senior Vice President (SVP) - Management Committee', '<p>Senior Vice President (SVP) - Management Committee</p>', 1, NULL, '2023-05-23 18:19:21', '2023-05-23 18:19:21'),
(7, 'Manager - Business Development', '<p>Manager - Business Development</p>', 1, NULL, '2023-05-23 18:19:29', '2023-05-23 18:19:29'),
(8, 'Assistant Executive - Customer Support', '<p>Assistant Executive - Customer Support</p>', 1, NULL, '2023-05-23 18:19:36', '2023-05-23 18:19:36'),
(9, 'Senior Manager - Business Development', '<p>Senior Manager - Business Development</p>', 1, NULL, '2023-05-23 18:19:44', '2023-05-23 18:19:44'),
(10, 'Senior Manager - Customer Support', '<p>Senior Manager - Customer Support</p>', 1, NULL, '2023-05-23 18:19:52', '2023-05-23 18:19:52'),
(11, '3D Animator', '<p>3D Animator</p>', 1, NULL, '2023-05-23 18:20:10', '2023-05-23 18:20:10'),
(12, 'Sr. Executive Vice President - SEVP', '<p>Sr. Executive Vice President - SEVP</p>', 1, NULL, '2023-05-23 18:20:20', '2023-05-23 18:20:20'),
(13, 'Assistant Vice President - Customer Support', '<p>Assistant Vice President - Customer Support</p>', 1, NULL, '2023-05-23 18:20:27', '2023-05-23 18:20:27'),
(14, 'Sr.Manager', '<p>Sr.Manager</p>', 1, NULL, '2023-05-23 18:20:35', '2023-05-23 18:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `discrepancies`
--

DROP TABLE IF EXISTS `discrepancies`;
CREATE TABLE IF NOT EXISTS `discrepancies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `approved_by` bigint DEFAULT NULL COMMENT 'Approved by',
  `user_id` bigint UNSIGNED NOT NULL,
  `attendance_id` bigint UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'late or early',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=pending, 1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discrepancies_user_id_foreign` (`user_id`),
  KEY `discrepancies_attendance_id_foreign` (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discrepancies`
--

INSERT INTO `discrepancies` (`id`, `approved_by`, `user_id`, `attendance_id`, `date`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 1, '2023-05-23 13:25:52', 'late', 'please approve', 0, '2023-05-26 19:32:04', '2023-05-26 19:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_statuses`
--

DROP TABLE IF EXISTS `employment_statuses`;
CREATE TABLE IF NOT EXISTS `employment_statuses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '1',
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_statuses`
--

INSERT INTO `employment_statuses` (`id`, `name`, `class`, `description`, `is_default`, `alias`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Probation', 'warning', NULL, 1, 'Probation', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Permanent', 'primary', NULL, 0, 'Permanent', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 'Terminated', 'danger', NULL, 1, NULL, NULL, '2023-05-23 18:41:53', '2023-05-23 18:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_histories`
--

DROP TABLE IF EXISTS `job_histories`;
CREATE TABLE IF NOT EXISTS `job_histories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `parent_designation_id` bigint DEFAULT NULL,
  `designation_id` bigint DEFAULT NULL,
  `parent_position_id` bigint DEFAULT NULL,
  `position_id` bigint DEFAULT NULL,
  `employment_status_id` bigint NOT NULL,
  `joining_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_histories`
--

INSERT INTO `job_histories` (`id`, `created_by`, `user_id`, `parent_designation_id`, `designation_id`, `parent_position_id`, `position_id`, `employment_status_id`, `joining_date`, `end_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, 1, '2023-05-23', '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 1, 1, NULL, 1, NULL, NULL, 2, '2023-05-23', NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 1, 2, NULL, 3, NULL, NULL, 2, '2023-01-01', NULL, NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19'),
(4, 1, 3, NULL, 3, NULL, NULL, 2, '2023-01-01', NULL, NULL, '2023-05-24 13:22:48', '2023-05-24 13:22:48'),
(5, 1, 4, NULL, 3, NULL, NULL, 2, '2023-01-01', NULL, NULL, '2023-05-24 13:24:31', '2023-05-24 13:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Paid or unpaid',
  `amount` double(8,2) DEFAULT NULL COMMENT 'Amount of leaves of this type of leave.',
  `spacial_percentage` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `slug`, `type`, `amount`, `spacial_percentage`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Casual', '', 'paid', 2.00, NULL, 1, NULL, '2023-05-25 19:28:12', '2023-05-25 19:28:12'),
(2, 'Medical', '', 'paid', 2.00, NULL, 1, NULL, '2023-05-25 19:28:29', '2023-05-25 19:28:29'),
(3, 'Annual', '', 'paid', 2.00, NULL, 1, NULL, '2023-05-25 19:28:44', '2023-05-25 19:28:44'),
(4, 'Half-Day', '', 'paid', 2.00, NULL, 1, NULL, '2023-05-25 19:28:58', '2023-05-25 19:28:58'),
(5, 'Other', '', 'paid', 2.00, NULL, 1, NULL, '2023-05-25 19:29:14', '2023-05-25 19:29:14'),
(6, 'Marriage', '', 'paid', 2.00, NULL, 1, NULL, '2023-05-25 19:29:29', '2023-05-25 19:29:29'),
(7, 'Miscellaneous', '', 'paid', 2.00, NULL, 1, NULL, '2023-05-25 19:29:42', '2023-05-25 19:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
CREATE TABLE IF NOT EXISTS `log_activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(196, 'Role Updated', 'http://localhost/new_hr_portal/roles/3', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-27 13:48:52', '2023-05-27 13:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2023_05_03_200801_create_designations_table', 1),
(8, '2023_05_03_200843_create_positions_table', 1),
(9, '2023_05_03_200908_create_work_shifts_table', 1),
(10, '2023_05_03_200924_create_departments_table', 1),
(11, '2023_05_03_200939_create_announcements_table', 1),
(12, '2023_05_04_193435_create_employment_statuses_table', 1),
(13, '2023_05_04_224452_create_job_histories_table', 1),
(14, '2023_05_04_230534_create_salary_histories_table', 1),
(15, '2023_05_04_231506_create_statuses_table', 1),
(16, '2023_05_05_210039_create_log_activities_table', 1),
(17, '2023_05_08_211133_create_work_shift_details_table', 1),
(18, '2023_05_09_201743_create_department_work_shifts_table', 1),
(19, '2023_05_09_211150_create_department_users_table', 1),
(20, '2023_05_09_235844_create_announcement_departments_table', 1),
(21, '2023_05_11_180532_create_profile_cover_images_table', 1),
(22, '2023_05_12_233009_create_user_employment_statuses_table', 1),
(24, '2023_05_16_191325_create_user_contacts_table', 1),
(25, '2023_05_18_004538_create_settings_table', 1),
(26, '2023_05_19_001216_create_leave_types_table', 1),
(27, '2023_05_22_221454_create_documents_table', 1),
(31, '2023_05_23_205031_create_working_shift_users_table', 1),
(34, '2023_05_25_185727_create_bank_accounts_table', 2),
(36, '2023_05_22_223417_create_user_leaves_table', 3),
(37, '2023_05_23_192846_create_attendances_table', 4),
(39, '2023_05_23_192149_create_discrepancies_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `label`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(104, 'employee salary details', 'employee_salary_details-list', 'web', '2023-05-27 12:38:54', '2023-05-27 12:38:54'),
(107, 'employee bank account', 'employee_bank_account-create', 'web', '2023-05-27 12:45:34', '2023-05-27 12:45:34'),
(108, 'employee bank account', 'employee_bank_account-edit', 'web', '2023-05-27 12:45:34', '2023-05-27 12:45:34'),
(113, 'employee leave requests', 'employee_leave_requests-list', 'web', '2023-05-27 12:49:03', '2023-05-27 12:49:03'),
(114, 'employee leave requests', 'employee_leave_requests-create', 'web', '2023-05-27 12:49:03', '2023-05-27 12:49:03'),
(115, 'employee leave requests', 'employee_leave_requests-edit', 'web', '2023-05-27 12:49:03', '2023-05-27 12:49:03'),
(116, 'employee leave requests', 'employee_leave_requests-delete', 'web', '2023-05-27 12:49:03', '2023-05-27 12:49:03'),
(117, 'employee leave report', 'employee_leave_report-list', 'web', '2023-05-27 12:49:27', '2023-05-27 12:49:27'),
(118, 'employee attendance daily log', 'employee_attendance_daily_log-list', 'web', '2023-05-27 12:50:22', '2023-05-27 12:50:22'),
(119, 'employee discrepancies', 'employee_discrepancies-list', 'web', '2023-05-27 12:51:01', '2023-05-27 12:51:01'),
(120, 'employee summary', 'employee_summary-list', 'web', '2023-05-27 12:51:23', '2023-05-27 12:51:23'),
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
(136, 'employee attendance filter', 'employee_attendance_filter-list', 'web', '2023-05-27 13:07:54', '2023-05-27 13:07:54'),
(138, 'salary menu', 'salary_menu-list', 'web', '2023-05-27 13:13:27', '2023-05-27 13:13:27'),
(139, 'leaves menu', 'leaves_menu-list', 'web', '2023-05-27 13:13:41', '2023-05-27 13:13:41'),
(140, 'administration menu', 'administration_menu-list', 'web', '2023-05-27 13:14:00', '2023-05-27 13:14:00'),
(141, 'attendance menu', 'attendance_menu-list', 'web', '2023-05-27 13:14:14', '2023-05-27 13:14:14'),
(142, 'team menu', 'team_menu-list', 'web', '2023-05-27 13:14:37', '2023-05-27 13:14:37'),
(143, 'employees', 'employees-list', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(144, 'employees', 'employees-create', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(145, 'employees', 'employees-edit', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(146, 'employees', 'employees-delete', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(147, 'employees', 'employees-status', 'web', '2023-05-27 13:27:04', '2023-05-27 13:27:04'),
(148, 'designations', 'designations-list', 'web', '2023-05-27 13:28:01', '2023-05-27 13:28:01'),
(149, 'designations', 'designations-create', 'web', '2023-05-27 13:28:01', '2023-05-27 13:28:01'),
(150, 'designations', 'designations-edit', 'web', '2023-05-27 13:28:01', '2023-05-27 13:28:01'),
(151, 'designations', 'designations-delete', 'web', '2023-05-27 13:28:02', '2023-05-27 13:28:02'),
(152, 'designations', 'designations-status', 'web', '2023-05-27 13:28:02', '2023-05-27 13:28:02'),
(153, 'employment status', 'employment_status-list', 'web', '2023-05-27 13:28:20', '2023-05-27 13:28:20'),
(154, 'employment status', 'employment_status-create', 'web', '2023-05-27 13:28:20', '2023-05-27 13:28:20'),
(155, 'employment status', 'employment_status-edit', 'web', '2023-05-27 13:28:20', '2023-05-27 13:28:20'),
(156, 'employment status', 'employment_status-delete', 'web', '2023-05-27 13:28:20', '2023-05-27 13:28:20'),
(157, 'employment status', 'employment_status-status', 'web', '2023-05-27 13:28:20', '2023-05-27 13:28:20'),
(158, 'positions', 'positions-list', 'web', '2023-05-27 13:29:28', '2023-05-27 13:29:28'),
(159, 'positions', 'positions-create', 'web', '2023-05-27 13:29:28', '2023-05-27 13:29:28'),
(160, 'positions', 'positions-edit', 'web', '2023-05-27 13:29:28', '2023-05-27 13:29:28'),
(161, 'positions', 'positions-delete', 'web', '2023-05-27 13:29:28', '2023-05-27 13:29:28'),
(162, 'positions', 'positions-status', 'web', '2023-05-27 13:29:28', '2023-05-27 13:29:28'),
(163, 'work shifts', 'work_shifts-list', 'web', '2023-05-27 13:29:44', '2023-05-27 13:29:44'),
(164, 'work shifts', 'work_shifts-create', 'web', '2023-05-27 13:29:44', '2023-05-27 13:29:44'),
(165, 'work shifts', 'work_shifts-edit', 'web', '2023-05-27 13:29:44', '2023-05-27 13:29:44'),
(166, 'work shifts', 'work_shifts-delete', 'web', '2023-05-27 13:29:44', '2023-05-27 13:29:44'),
(167, 'work shifts', 'work_shifts-status', 'web', '2023-05-27 13:29:44', '2023-05-27 13:29:44'),
(168, 'departments', 'departments-list', 'web', '2023-05-27 13:30:01', '2023-05-27 13:30:01'),
(169, 'departments', 'departments-create', 'web', '2023-05-27 13:30:01', '2023-05-27 13:30:01'),
(170, 'departments', 'departments-edit', 'web', '2023-05-27 13:30:01', '2023-05-27 13:30:01'),
(171, 'departments', 'departments-delete', 'web', '2023-05-27 13:30:02', '2023-05-27 13:30:02'),
(172, 'departments', 'departments-status', 'web', '2023-05-27 13:30:02', '2023-05-27 13:30:02'),
(173, 'announcements', 'announcements-list', 'web', '2023-05-27 13:30:16', '2023-05-27 13:30:16'),
(174, 'announcements', 'announcements-create', 'web', '2023-05-27 13:30:16', '2023-05-27 13:30:16'),
(175, 'announcements', 'announcements-edit', 'web', '2023-05-27 13:30:17', '2023-05-27 13:30:17'),
(176, 'announcements', 'announcements-delete', 'web', '2023-05-27 13:30:17', '2023-05-27 13:30:17'),
(177, 'announcements', 'announcements-status', 'web', '2023-05-27 13:30:17', '2023-05-27 13:30:17'),
(178, 'profile cover images', 'profile_cover_images-list', 'web', '2023-05-27 13:30:49', '2023-05-27 13:30:49'),
(179, 'profile cover images', 'profile_cover_images-create', 'web', '2023-05-27 13:30:49', '2023-05-27 13:30:49'),
(180, 'profile cover images', 'profile_cover_images-edit', 'web', '2023-05-27 13:30:49', '2023-05-27 13:30:49'),
(181, 'profile cover images', 'profile_cover_images-delete', 'web', '2023-05-27 13:30:49', '2023-05-27 13:30:49'),
(182, 'profile cover images', 'profile_cover_images-status', 'web', '2023-05-27 13:30:49', '2023-05-27 13:30:49'),
(183, 'leave types', 'leave_types-list', 'web', '2023-05-27 13:31:42', '2023-05-27 13:31:42'),
(184, 'leave types', 'leave_types-create', 'web', '2023-05-27 13:31:42', '2023-05-27 13:31:42'),
(185, 'leave types', 'leave_types-edit', 'web', '2023-05-27 13:31:42', '2023-05-27 13:31:42'),
(186, 'leave types', 'leave_types-delete', 'web', '2023-05-27 13:31:42', '2023-05-27 13:31:42'),
(187, 'leave types', 'leave_types-status', 'web', '2023-05-27 13:31:43', '2023-05-27 13:31:43'),
(188, 'bank accounts', 'bank_accounts-list', 'web', '2023-05-27 13:40:50', '2023-05-27 13:40:50'),
(189, 'bank accounts', 'bank_accounts-create', 'web', '2023-05-27 13:40:51', '2023-05-27 13:40:51'),
(190, 'bank accounts', 'bank_accounts-edit', 'web', '2023-05-27 13:40:51', '2023-05-27 13:40:51'),
(191, 'bank accounts', 'bank_accounts-delete', 'web', '2023-05-27 13:40:51', '2023-05-27 13:40:51'),
(192, 'bank accounts', 'bank_accounts-status', 'web', '2023-05-27 13:40:51', '2023-05-27 13:40:51'),
(193, 'team members', 'team_members-list', 'web', '2023-05-27 13:42:34', '2023-05-27 13:42:34'),
(194, 'team leaves menu', 'team_leaves_menu-list', 'web', '2023-05-27 13:42:54', '2023-05-27 13:42:54'),
(195, 'team leave requests', 'team_leave_requests-list', 'web', '2023-05-27 13:43:29', '2023-05-27 13:43:29'),
(196, 'team leave requests', 'team_leave_requests-status', 'web', '2023-05-27 13:43:29', '2023-05-27 13:43:29'),
(197, 'team leave reports', 'team_leave_reports-list', 'web', '2023-05-27 13:44:03', '2023-05-27 13:44:03'),
(198, 'team attendance menu', 'team_attendance_menu-list', 'web', '2023-05-27 13:44:48', '2023-05-27 13:44:48'),
(199, 'team daily log', 'team_daily_log-list', 'web', '2023-05-27 13:45:10', '2023-05-27 13:45:10'),
(200, 'team discrepancies', 'team_discrepancies-list', 'web', '2023-05-27 13:45:36', '2023-05-27 13:45:36'),
(201, 'team summary', 'team_summary-list', 'web', '2023-05-27 13:46:51', '2023-05-27 13:46:51'),
(202, 'team attendance filter', 'team_attendance_filter-list', 'web', '2023-05-27 13:47:11', '2023-05-27 13:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Business Development - Mobile Apps', '<p>Business Development - Mobile Apps</p>', 1, NULL, '2023-05-23 17:54:27', '2023-05-23 17:54:27'),
(2, 'Creative Content Writers', '<p>Creative Content Writers</p>', 1, NULL, '2023-05-23 17:54:37', '2023-05-23 17:54:37'),
(3, 'Creative Graphic Designer', '<p>Creative Graphic Designer</p>', 1, NULL, '2023-05-23 17:54:47', '2023-05-23 17:54:47'),
(4, 'iOS App Developer', '<p>iOS App Developer</p>', 1, NULL, '2023-05-23 17:54:55', '2023-05-23 17:54:55'),
(5, 'Sr. Software Engineer', '<p>Sr. Software Engineer</p>', 1, NULL, '2023-05-23 17:55:03', '2023-05-23 17:55:03'),
(6, 'Storyboard Artist', '<p>Storyboard Artist</p>', 1, NULL, '2023-05-23 17:55:11', '2023-05-23 17:55:11'),
(7, 'Editor & Proofreader', '<p>Editor &amp; Proofreader</p>', 1, NULL, '2023-05-23 17:55:19', '2023-05-23 17:55:19'),
(8, 'UI/UX Designer-Mobile Apps', '<p>UI/UX Designer-Mobile Apps</p>', 1, NULL, '2023-05-23 17:55:27', '2023-05-23 17:55:27'),
(9, 'Unity 2D/3D Mobile App. Game Developer', '<p>Unity 2D/3D Mobile App. Game Developer</p>', 1, NULL, '2023-05-23 17:55:34', '2023-05-23 17:55:34'),
(10, 'Technical Support Executive', '<p>Technical Support Executive</p>', 1, NULL, '2023-05-23 17:55:42', '2023-05-23 17:55:42'),
(11, 'Business Analyst', '<p>Business Analyst</p>', 1, NULL, '2023-05-23 17:55:50', '2023-05-23 17:55:50'),
(12, 'Solution Architect', '<p>Solution Architect</p>', 1, NULL, '2023-05-23 17:55:57', '2023-05-23 17:55:57'),
(13, 'Project Manager', '<p>Project Manager</p>', 1, NULL, '2023-05-23 17:56:05', '2023-05-23 17:56:05'),
(14, 'Digital - Brand Manager', '<p>Digital - Brand Manager</p>', 1, NULL, '2023-05-23 17:56:16', '2023-05-23 17:56:16'),
(15, 'Social Media Executive', '<p>Social Media Executive</p>', 1, NULL, '2023-05-23 17:56:24', '2023-05-23 17:56:24'),
(16, 'Accountant', '<p>Accountant</p>', 1, NULL, '2023-05-23 17:56:31', '2023-05-23 17:56:31'),
(17, 'Sales', '<p>Sales</p>', 1, NULL, '2023-05-23 17:56:39', '2023-05-23 17:56:39'),
(18, 'Customer Support', '<p>Customer Support</p>', 1, NULL, '2023-05-23 17:56:47', '2023-05-23 17:56:47'),
(19, 'SEO', '<p>SEO</p>', 1, NULL, '2023-05-23 17:56:54', '2023-05-23 17:56:54'),
(20, 'PPC', '<p>PPC</p>', 1, NULL, '2023-05-23 17:57:02', '2023-05-23 17:57:02'),
(21, 'Supply Chain/Logistics', '<p>Supply Chain/Logistics</p>', 1, NULL, '2023-05-23 17:57:11', '2023-05-23 17:57:11'),
(22, 'Business Development Executive', '<p>Business Development Executive</p>', 1, NULL, '2023-05-23 17:57:18', '2023-05-23 17:57:18'),
(23, 'Marketing', '<p>Marketing</p>', 1, NULL, '2023-05-23 17:57:30', '2023-05-23 17:57:30'),
(24, 'Quality Assurance', '<p>Quality Assurance</p>', 1, NULL, '2023-05-23 17:57:38', '2023-05-23 17:57:38'),
(25, 'IT', '<p>IT</p>', 1, NULL, '2023-05-23 17:57:45', '2023-05-23 17:57:45'),
(26, 'HR', '<p>HR</p>', 1, NULL, '2023-05-23 17:57:56', '2023-05-23 17:57:56'),
(27, 'Web Designer', '<p>Web Designer</p>', 1, NULL, '2023-05-23 17:58:04', '2023-05-23 17:58:04'),
(28, 'BPO', '<p>BPO</p>', 1, NULL, '2023-05-23 17:58:11', '2023-05-23 17:58:11'),
(29, 'Account Manager - Mobile Applications', '<p>Account Manager - Mobile Applications</p>', 1, NULL, '2023-05-23 17:58:19', '2023-05-23 17:58:19'),
(30, 'React Native Developer', '<p>React Native Developer</p>', 1, NULL, '2023-05-23 17:58:26', '2023-05-23 17:58:26'),
(31, 'Full Stack Developer', '<p>Full Stack Developer</p>', 1, NULL, '2023-05-23 17:58:35', '2023-05-23 17:58:35'),
(32, 'Quality Assurance - Mobile Applications', '<p>Quality Assurance - Mobile Applications</p>', 1, NULL, '2023-05-23 17:59:48', '2023-05-23 17:59:48'),
(33, 'Chef', '<p>Chef</p>', 1, NULL, '2023-05-23 18:00:00', '2023-05-23 18:00:00'),
(34, 'Chinese Sales Consultant', '<p>Chinese Sales Consultant</p>', 1, NULL, '2023-05-23 18:00:10', '2023-05-23 18:00:10'),
(35, '2D Video Animator', '<p>2D Video Animator</p>', 1, NULL, '2023-05-23 18:00:19', '2023-05-23 18:00:19'),
(36, 'Senior PHP Developer', '<p>Senior PHP Developer</p>', 1, NULL, '2023-05-23 18:00:27', '2023-05-23 18:00:27'),
(37, 'Android Developer', '<p>Android Developer</p>', 1, NULL, '2023-05-23 18:00:35', '2023-05-23 18:00:35'),
(38, 'Web Developer', '<p>Web Developer</p>', 1, NULL, '2023-05-23 18:00:43', '2023-05-23 18:00:43'),
(39, 'Frontend UI/UX Developer', '<p>Frontend UI/UX Developer</p>', 1, NULL, '2023-05-23 18:00:51', '2023-05-23 18:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `employment_id` bigint DEFAULT NULL,
  `cover_image_id` bigint DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=married, 0=single',
  `fathers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_security_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `employment_id`, `cover_image_id`, `joining_date`, `date_of_birth`, `gender`, `marital_status`, `fathers_name`, `mothers_name`, `social_security_number`, `phone_number`, `about_me`, `address`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1, 1145, 3, '2023-05-23', '2023-05-01', 'male', 0, NULL, NULL, NULL, '12345', NULL, NULL, '1684880020.jpg', '2023-05-23 16:53:05', '2023-05-26 19:42:00'),
(2, 2, 4937, 4, '2023-01-01', NULL, 'male', 0, NULL, NULL, NULL, '12345', NULL, NULL, '1685125045.png', '2023-05-24 12:44:19', '2023-05-26 13:17:25'),
(3, 3, 4956, 3, '2023-01-01', NULL, 'male', 0, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1685124464.png', '2023-05-24 13:22:48', '2023-05-26 13:16:42'),
(4, 4, 4966, NULL, '2023-01-01', NULL, 'male', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-24 13:24:31', '2023-05-24 13:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `profile_cover_images`
--

DROP TABLE IF EXISTS `profile_cover_images`;
CREATE TABLE IF NOT EXISTS `profile_cover_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by` bigint UNSIGNED NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_cover_images_created_by_foreign` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_cover_images`
--

INSERT INTO `profile_cover_images` (`id`, `created_by`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1685124347.png', 1, NULL, '2023-05-26 13:05:47', '2023-05-26 13:05:47'),
(2, 1, '1685124356.jpeg', 1, NULL, '2023-05-26 13:05:56', '2023-05-26 13:05:56'),
(3, 1, '1685124371.jpg', 1, NULL, '2023-05-26 13:06:11', '2023-05-26 13:06:11'),
(4, 1, '1685124381.jpg', 1, NULL, '2023-05-26 13:06:21', '2023-05-26 13:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Manager', 'web', '2023-05-23 17:52:23', '2023-05-23 17:52:23'),
(3, 'Department Manager', 'web', '2023-05-23 17:52:43', '2023-05-23 17:52:43'),
(4, 'Employee', 'web', '2023-05-23 17:53:02', '2023-05-23 17:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(104, 1),
(107, 1),
(108, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
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
(136, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(104, 3),
(107, 3),
(108, 3),
(113, 3),
(114, 3),
(115, 3),
(116, 3),
(117, 3),
(118, 3),
(119, 3),
(120, 3),
(136, 3),
(138, 3),
(139, 3),
(141, 3),
(142, 3),
(188, 3),
(191, 3),
(192, 3),
(193, 3),
(194, 3),
(195, 3),
(196, 3),
(197, 3),
(198, 3),
(199, 3),
(200, 3),
(201, 3),
(202, 3);

-- --------------------------------------------------------

--
-- Table structure for table `salary_histories`
--

DROP TABLE IF EXISTS `salary_histories`;
CREATE TABLE IF NOT EXISTS `salary_histories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `job_history_id` bigint NOT NULL,
  `salary` bigint DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_histories`
--

INSERT INTO `salary_histories` (`id`, `created_by`, `user_id`, `job_history_id`, `salary`, `effective_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 13000, NULL, NULL, 1, '2023-05-24 12:44:19', '2023-05-24 12:44:19'),
(2, 1, 3, 4, 5000, NULL, NULL, 1, '2023-05-24 13:22:48', '2023-05-24 13:22:48'),
(3, 1, 4, 5, 5000, NULL, NULL, 1, '2023-05-24 13:24:31', '2023-05-24 13:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `currency_symbol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `favicon`, `banner`, `language`, `country`, `area`, `city`, `state`, `zip_code`, `address`, `currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'Cyberonix Consulting Limited', '1684880051.png', '1684880051.png', '1684880051.png', 'English', 'pakistan', NULL, NULL, NULL, NULL, NULL, 'PKR', '2023-05-23 17:14:11', '2023-05-23 17:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_employee` tinyint(1) NOT NULL DEFAULT '1',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_created_by_foreign` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_by`, `status`, `is_employee`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 0, 'Admin', 'App', 'admin@gmail.com', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 17:13:40'),
(2, 1, 1, 1, 'Muhmmad Umar', 'Khan', 'muhammad.umer@cyberonix.org', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19'),
(3, 1, 1, 1, 'Amar', 'Chand', 'amar.chand@cyberonix.org', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, '2023-05-24 13:22:48', '2023-05-24 13:22:48'),
(4, 1, 1, 1, 'Muhammad', 'Yousuf', 'muhammad.yousuf@cyberonix.org', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, '2023-05-24 13:24:31', '2023-05-24 13:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

DROP TABLE IF EXISTS `user_contacts`;
CREATE TABLE IF NOT EXISTS `user_contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_contacts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_employment_statuses`
--

DROP TABLE IF EXISTS `user_employment_statuses`;
CREATE TABLE IF NOT EXISTS `user_employment_statuses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `employment_status_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_employment_statuses_user_id_foreign` (`user_id`),
  KEY `user_employment_statuses_employment_status_id_foreign` (`employment_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_employment_statuses`
--

INSERT INTO `user_employment_statuses` (`id`, `user_id`, `employment_status_id`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-23', '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 1, 2, '2023-05-23', NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 2, 2, '2023-01-01', NULL, NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19'),
(4, 3, 2, '2023-01-01', NULL, NULL, '2023-05-24 13:22:48', '2023-05-24 13:22:48'),
(5, 4, 2, '2023-01-01', NULL, NULL, '2023-05-24 13:24:31', '2023-05-24 13:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_leaves`
--

DROP TABLE IF EXISTS `user_leaves`;
CREATE TABLE IF NOT EXISTS `user_leaves` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `leave_type_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0=pending, 1=approved, 2=rejected',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `duration` int DEFAULT NULL COMMENT 'Number of days',
  `behavior_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'e.g first_half, last_half, single',
  `reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_leaves_approved_by_foreign` (`approved_by`),
  KEY `user_leaves_department_id_foreign` (`department_id`),
  KEY `user_leaves_leave_type_id_foreign` (`leave_type_id`),
  KEY `user_leaves_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_leaves`
--

INSERT INTO `user_leaves` (`id`, `approved_by`, `department_id`, `leave_type_id`, `user_id`, `status`, `start_date`, `end_date`, `duration`, `behavior_type`, `reason`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 24, 3, 3, 1, '2023-05-24', '2023-05-28', 2, 'Full Day', NULL, NULL, '2023-05-26 00:41:13', '2023-05-26 12:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `working_shift_users`
--

DROP TABLE IF EXISTS `working_shift_users`;
CREATE TABLE IF NOT EXISTS `working_shift_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `working_shift_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_shift_users`
--

INSERT INTO `working_shift_users` (`id`, `working_shift_id`, `user_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `work_shifts`
--

DROP TABLE IF EXISTS `work_shifts`;
CREATE TABLE IF NOT EXISTS `work_shifts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` enum('regular','scheduled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'regular',
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_default` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_shifts`
--

INSERT INTO `work_shifts` (`id`, `name`, `start_date`, `end_date`, `type`, `description`, `is_default`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Night Shift (9 to 6)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Night Shift (10 to 7)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(3, 'Night Shift (11 to 8)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(4, 'Night Shift (12 to 9)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(5, 'Night Shift (1 to 10)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(6, 'Night Shift (2 to 11)', '2023-01-24', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(7, 'Night Shift (7 to 4)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(8, 'Night Shift (6 to 3)', '2023-01-24', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(9, 'Night Shift (5 to 2)', '2023-01-24', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(10, 'Flexable Shift Night', '2023-01-01', NULL, 'scheduled', NULL, 1, 1, NULL, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(11, 'Flexable Shift Morning', '2023-01-01', NULL, 'scheduled', NULL, 1, 1, NULL, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(12, 'Flexable Shift Evening', '2023-01-01', NULL, 'scheduled', NULL, 1, 1, NULL, '2023-05-23 17:51:38', '2023-05-23 17:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `work_shift_details`
--

DROP TABLE IF EXISTS `work_shift_details`;
CREATE TABLE IF NOT EXISTS `work_shift_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `working_shift_id` bigint NOT NULL,
  `weekday_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekday` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_weekend` tinyint(1) NOT NULL DEFAULT '0',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_shift_details`
--

INSERT INTO `work_shift_details` (`id`, `working_shift_id`, `weekday_key`, `weekday`, `is_weekend`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mon', 'Monday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 1, 'Tue', 'Tuesday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 1, 'Wed', 'Wednesday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(4, 1, 'Thu', 'Thursday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(5, 1, 'Fri', 'Friday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(6, 1, 'Sat', 'Saturday', 1, NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(7, 1, 'Sun', 'Sunday', 1, NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(8, 2, 'mon', 'Monday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(9, 2, 'tue', 'Tuesday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(10, 2, 'wed', 'Wednesday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(11, 2, 'thu', 'Thursday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(12, 2, 'fri', 'Friday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(13, 2, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(14, 2, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(15, 3, 'mon', 'Monday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(16, 3, 'tue', 'Tuesday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(17, 3, 'wed', 'Wednesday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(18, 3, 'thu', 'Thursday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(19, 3, 'fri', 'Friday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(20, 3, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(21, 3, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(22, 4, 'mon', 'Monday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(23, 4, 'tue', 'Tuesday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(24, 4, 'wed', 'Wednesday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(25, 4, 'thu', 'Thursday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(26, 4, 'fri', 'Friday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(27, 4, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(28, 4, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(29, 5, 'mon', 'Monday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(30, 5, 'tue', 'Tuesday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(31, 5, 'wed', 'Wednesday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(32, 5, 'thu', 'Thursday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(33, 5, 'fri', 'Friday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(34, 5, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(35, 5, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(36, 6, 'mon', 'Monday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(37, 6, 'tue', 'Tuesday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(38, 6, 'wed', 'Wednesday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(39, 6, 'thu', 'Thursday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(40, 6, 'fri', 'Friday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(41, 6, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(42, 6, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(43, 7, 'mon', 'Monday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(44, 7, 'tue', 'Tuesday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(45, 7, 'wed', 'Wednesday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(46, 7, 'thu', 'Thursday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(47, 7, 'fri', 'Friday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(48, 7, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(49, 7, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(50, 8, 'mon', 'Monday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(51, 8, 'tue', 'Tuesday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(52, 8, 'wed', 'Wednesday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(53, 8, 'thu', 'Thursday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(54, 8, 'fri', 'Friday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(55, 8, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(56, 8, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(57, 9, 'mon', 'Monday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(58, 9, 'tue', 'Tuesday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(59, 9, 'wed', 'Wednesday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(60, 9, 'thu', 'Thursday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(61, 9, 'fri', 'Friday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(62, 9, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(63, 9, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(64, 10, 'mon', 'Monday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(65, 10, 'tue', 'Tuesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(66, 10, 'wed', 'Wednesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(67, 10, 'thu', 'Thursday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(68, 10, 'fri', 'Friday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(69, 10, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(70, 10, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(71, 11, 'mon', 'Monday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(72, 11, 'tue', 'Tuesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(73, 11, 'wed', 'Wednesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(74, 11, 'thu', 'Thursday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(75, 11, 'fri', 'Friday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(76, 11, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(77, 11, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(78, 12, 'mon', 'Monday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(79, 12, 'tue', 'Tuesday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(80, 12, 'wed', 'Wednesday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(81, 12, 'thu', 'Thursday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(82, 12, 'fri', 'Friday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(83, 12, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(84, 12, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:51:38', '2023-05-23 17:51:38');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_departments`
--
ALTER TABLE `announcement_departments`
  ADD CONSTRAINT `announcement_departments_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcement_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_work_shift_id_foreign` FOREIGN KEY (`work_shift_id`) REFERENCES `work_shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD CONSTRAINT `bank_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_users`
--
ALTER TABLE `department_users`
  ADD CONSTRAINT `department_users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_work_shifts`
--
ALTER TABLE `department_work_shifts`
  ADD CONSTRAINT `department_work_shifts_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_work_shifts_work_shift_id_foreign` FOREIGN KEY (`work_shift_id`) REFERENCES `work_shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discrepancies`
--
ALTER TABLE `discrepancies`
  ADD CONSTRAINT `discrepancies_attendance_id_foreign` FOREIGN KEY (`attendance_id`) REFERENCES `attendances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discrepancies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `profile_cover_images`
--
ALTER TABLE `profile_cover_images`
  ADD CONSTRAINT `profile_cover_images_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD CONSTRAINT `user_contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_employment_statuses`
--
ALTER TABLE `user_employment_statuses`
  ADD CONSTRAINT `user_employment_statuses_employment_status_id_foreign` FOREIGN KEY (`employment_status_id`) REFERENCES `employment_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_employment_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_leaves`
--
ALTER TABLE `user_leaves`
  ADD CONSTRAINT `user_leaves_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_leaves_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_leaves_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
