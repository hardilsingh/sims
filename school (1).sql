-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 06:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_expense_certificates`
--

CREATE TABLE `annual_expense_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificates`
--

CREATE TABLE `birth_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2020-21',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birth_certificates`
--

INSERT INTO `birth_certificates` (`id`, `created_at`, `updated_at`, `name`, `father_name`, `mother_name`, `adm_no`, `class`, `dob`, `session`, `address`) VALUES
(12, '2020-02-06 20:36:58', '2020-02-06 20:36:58', 'Mansimar Singh', 'Kanwaljit singh', 'Raminder Kaur', '2', '102', '2020-12-31', '2020-2021', '662/7, gsp, gsp, gsp, 143521, Punjab');

-- --------------------------------------------------------

--
-- Table structure for table `castes`
--

CREATE TABLE `castes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `castes`
--

INSERT INTO `castes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', NULL, NULL),
(2, 'SC', NULL, NULL),
(3, 'OBC', NULL, NULL),
(4, 'ST', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `character_certificates`
--

CREATE TABLE `character_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `character_certificates`
--

INSERT INTO `character_certificates` (`id`, `name`, `father_name`, `mother_name`, `class`, `dob`, `adm_no`, `created_at`, `updated_at`) VALUES
(3, 'Hardil Singh', 'Kanwaljit singh', 'Raminder KAur', '2', '1999-07-13', '2272', '2019-12-20 09:32:14', '2019-12-20 09:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `concessions`
--

CREATE TABLE `concessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `monthly` int(11) NOT NULL DEFAULT '0',
  `computer` int(11) NOT NULL DEFAULT '0',
  `transport` int(11) NOT NULL DEFAULT '0',
  `id_card` int(11) NOT NULL DEFAULT '0',
  `examination` int(11) NOT NULL DEFAULT '0',
  `stationary` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concessions`
--

INSERT INTO `concessions` (`id`, `name`, `created_at`, `updated_at`, `monthly`, `computer`, `transport`, `id_card`, `examination`, `stationary`) VALUES
(2, '2nd child con', '2019-11-29 05:44:18', '2019-12-13 12:50:34', 0, 0, 0, 0, 0, 0),
(3, '3rd child con', '2019-12-13 12:50:53', '2019-12-13 12:50:53', 0, 0, 0, 0, 0, 0),
(4, 'vip con', '2019-12-13 12:51:10', '2019-12-13 12:51:10', 0, 0, 0, 0, 0, 0),
(5, 'staff con', '2019-12-13 12:52:14', '2019-12-13 12:52:14', 0, 0, 0, 0, 0, 0),
(6, 'Vip', '2019-12-26 11:28:35', '2019-12-26 11:28:35', 100, 100, 50, 100, 100, 0),
(7, 'Test', '2019-12-28 20:38:06', '2019-12-28 20:38:06', 25, 30, 50, 20, 58, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `7` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `8` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `9` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `10` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `11` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `12` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `session` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `session`, `student_id`, `concession`, `total`, `created_at`, `updated_at`) VALUES
(11, '4900', '4900', '4900', '-10000', '4900', '4900', '4900', '4900', '4900', '4900', '4900', '4900', '2020-2021', '9', '0', '48800', '2020-02-08 13:19:23', '2020-02-08 13:19:23'),
(12, '3200', '4400', '4400', '0', '4400', '4400', '100', '200', '200', '4400', '4400', '4400', '2020-2021', '10', '0', '51600', '2020-02-08 13:20:09', '2020-02-08 13:20:09'),
(13, '-12300', '-3900', '-3900', '300', '1200', '1200', '1300', '1200', '1200', '-300', '1000', '-2600', '2020-2021', '11', '0', '24600', '2020-02-08 18:47:59', '2020-02-10 05:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `explicit_cons`
--

CREATE TABLE `explicit_cons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explicit_cons`
--

INSERT INTO `explicit_cons` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cycle', NULL, NULL),
(2, 'Bike', NULL, NULL),
(3, 'Parents', NULL, NULL),
(4, 'Auto', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fathers`
--

CREATE TABLE `fathers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fathers`
--

INSERT INTO `fathers` (`id`, `name`, `student_id`, `occupation`, `UID`, `qual`, `created_at`, `updated_at`) VALUES
(1, 'KanwalJit Singh', 1, 'bussiness owner', '123456789012', '+12', '2019-10-30 19:46:24', '2019-10-31 08:51:15'),
(2, 'Kanwaljit singh', 2, 'bussiness', '123456789012', '+12', '2019-10-30 20:32:07', '2019-10-30 20:32:07'),
(3, 'Kanwaljit singh', 2, 'bussiness', '123456789012', '+12', '2019-10-31 13:22:30', '2019-10-31 13:22:30'),
(4, 'Kanwaljit singh', 3, 'bussiness', '123456789012', '+12', '2019-11-01 12:10:27', '2019-11-01 12:10:27'),
(5, 'Kanwaljit singh', 4, 'bussiness', '123456789012', '+12', '2019-11-01 12:27:39', '2019-11-01 12:27:39'),
(6, 'Kanwaljit singh', 5, 'bussiness', '123456789012', '+12', '2019-11-01 12:39:17', '2019-11-01 12:39:17'),
(7, 'Kanwaljit singh', 6, 'bussiness', '123456789012', '+12', '2019-11-01 13:03:39', '2019-11-01 13:03:39'),
(8, 'Kanwaljit singh', 7, 'bussiness', '123456789012', '+12', '2019-11-28 08:17:39', '2019-11-28 08:17:39'),
(9, 'Kanwaljit singh', 8, 'bussiness', '0', '+12', '2019-11-28 08:41:05', '2019-11-28 08:41:05'),
(10, 'Kanwaljit singh', 9, 'bussiness', '123456789012', '+12', '2019-11-28 08:43:10', '2019-11-28 08:43:10'),
(11, 'Kanwaljit singh', 10, 'bussiness', '123456789012', '+12', '2019-11-29 05:05:18', '2019-11-29 05:05:18'),
(12, 'Kanwaljit singh', 11, 'bussiness', '123456789012', '+12', '2019-11-29 05:06:29', '2019-11-29 05:06:29'),
(13, 'Kanwaljit singh', 12, 'bussiness', '123456789012', '+12', '2019-11-29 05:07:15', '2019-11-29 05:07:15'),
(14, 'Kanwaljit singh', 13, 'bussiness', '123456789012', '+12', '2019-11-29 05:08:28', '2019-11-29 05:08:28'),
(15, 'Kanwaljit singh', 14, 'bussiness', '123456789012', '+12', '2019-11-29 05:17:52', '2019-11-29 05:17:52'),
(16, 'Kanwaljit singh', 15, 'bussiness', '0', '+12', '2019-12-01 17:05:13', '2019-12-01 17:05:13'),
(17, 'Kanwaljit singh', 16, 'bussiness', '0', '+12', '2019-12-01 17:06:37', '2019-12-01 17:06:37'),
(18, 'Kanwaljit singh', 17, 'bussiness', '0', '+12', '2019-12-01 17:07:13', '2019-12-01 17:07:13'),
(19, 'Kanwaljit singh', 1, 'bussiness', '123456789012', '+12', '2019-12-13 11:10:02', '2019-12-13 11:10:02'),
(20, 'Kanwaljit SINGH', 1273, '0', '0', '0', '2019-12-29 13:09:47', '2019-12-29 13:09:47'),
(21, 'Kanwaljit SINGH', 1274, '0', '0', '0', '2019-12-29 13:13:13', '2019-12-29 13:13:13'),
(22, 'Hardil Singh', 1275, '0', '0', '0', '2019-12-29 13:26:01', '2019-12-29 13:26:01'),
(23, 'Kanwaljit SINGH', 1276, '0', '0', '0', '2019-12-30 06:07:10', '2019-12-30 06:07:10'),
(24, 'Kanwaljit singh', 1277, '0', '0', '0', '2019-12-30 06:54:05', '2019-12-30 06:54:05'),
(25, 'Kanwaljit singh', 1278, '0', '0', '0', '2019-12-30 06:56:28', '2019-12-30 06:56:28'),
(26, 'Kanwaljit singh', 1279, '0', '0', '0', '2019-12-30 07:01:20', '2019-12-30 07:01:20'),
(27, 'Kanwaljit singh', 1280, '0', '0', '0', '2019-12-30 07:01:20', '2019-12-30 07:01:20'),
(28, 'Kanwaljit singh', 1281, '0', '0', '0', '2019-12-30 07:03:51', '2019-12-30 07:03:51'),
(29, 'Kanwaljit singh', 1282, 'N/A', '0', '0', '2020-02-02 03:50:51', '2020-02-02 03:50:51'),
(30, 'Darshan Lal', 1283, 'N/A', '0', '0', '2020-02-02 07:25:17', '2020-02-02 07:25:17'),
(31, 'Darshan Lal', 1284, 'N/A', '0', '0', '2020-02-02 07:26:17', '2020-02-02 07:26:17'),
(32, 'Kanwaljit singh', 1285, 'N/A', '0', '0', '2020-02-02 08:57:30', '2020-02-02 08:57:30'),
(33, 'Kanwaljit singh', 1270, 'N/A', '0', '0', '2020-02-04 18:48:48', '2020-02-04 18:48:48'),
(34, 'Kanwaljit singh', 1271, 'N/A', '0', '0', '2020-02-04 18:56:43', '2020-02-04 18:56:43'),
(35, 'Kanwaljit singh', 1277, 'N/A', '0', '0', '2020-02-04 19:08:18', '2020-02-04 19:08:18'),
(36, 'Kanwaljit singh', 1278, 'N/A', '0', '0', '2020-02-04 19:09:20', '2020-02-04 19:09:20'),
(37, 'Kanwaljit singh', 1, 'N/A', '0', '0', '2020-02-06 05:03:29', '2020-02-06 05:03:29'),
(38, 'Kanwaljit singh', 2, 'N/A', '0', '0', '2020-02-06 05:23:02', '2020-02-06 05:23:02'),
(39, 'Kanwaljit singh', 3, 'N/A', '0', '0', '2020-02-06 05:24:21', '2020-02-06 05:24:21'),
(40, 'Kanwaljit singh', 4, 'N/A', '0', '0', '2020-02-06 05:25:00', '2020-02-06 05:25:00'),
(41, 'KANWALJIT SINGH', 5, 'N/A', '0', '0', '2020-02-06 08:32:23', '2020-02-06 08:32:23'),
(42, 'KANWALJIT SINGH', 6, 'N/A', '0', '0', '2020-02-06 08:35:00', '2020-02-06 08:35:00'),
(43, 'KANWALJIT SINGH', 7, 'N/A', '0', '0', '2020-02-06 08:38:25', '2020-02-06 08:38:25'),
(44, 'KANWALJIT SINGH', 9, 'N/A', '0', '0', '2020-02-08 13:19:23', '2020-02-08 13:19:23'),
(45, 'KANWALJIT SINGH', 10, 'N/A', '0', '0', '2020-02-08 13:20:09', '2020-02-08 13:20:09'),
(46, 'HARDIL SINGH', 11, 'N/A', '0', '0', '2020-02-08 18:47:59', '2020-02-08 18:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `jmf` int(11) NOT NULL DEFAULT '0',
  `jcf` int(11) NOT NULL DEFAULT '0',
  `jtf` int(11) NOT NULL DEFAULT '0',
  `jsf` int(11) NOT NULL DEFAULT '0',
  `fmf` int(11) NOT NULL DEFAULT '0',
  `fcf` int(11) NOT NULL DEFAULT '0',
  `ftf` int(11) NOT NULL DEFAULT '0',
  `fsf` int(11) NOT NULL DEFAULT '0',
  `mmf` int(11) NOT NULL DEFAULT '0',
  `mcf` int(11) NOT NULL DEFAULT '0',
  `mtf` int(11) NOT NULL DEFAULT '0',
  `msf` int(11) NOT NULL DEFAULT '0',
  `amf` int(11) NOT NULL DEFAULT '0',
  `acf` int(11) NOT NULL DEFAULT '0',
  `atf` int(11) NOT NULL DEFAULT '0',
  `asf` int(11) NOT NULL DEFAULT '0',
  `maymf` int(11) NOT NULL DEFAULT '0',
  `maycf` int(11) NOT NULL DEFAULT '0',
  `maytf` int(11) NOT NULL DEFAULT '0',
  `maysf` int(11) NOT NULL DEFAULT '0',
  `junemf` int(11) NOT NULL DEFAULT '0',
  `junecf` int(11) NOT NULL DEFAULT '0',
  `junetf` int(11) NOT NULL DEFAULT '0',
  `junesf` int(11) NOT NULL DEFAULT '0',
  `julymf` int(11) NOT NULL DEFAULT '0',
  `julycf` int(11) NOT NULL DEFAULT '0',
  `julytf` int(11) NOT NULL DEFAULT '0',
  `julysf` int(11) NOT NULL DEFAULT '0',
  `julyid_card_fee` int(11) NOT NULL DEFAULT '0',
  `augmf` int(11) NOT NULL DEFAULT '0',
  `augcf` int(11) NOT NULL DEFAULT '0',
  `augtf` int(11) NOT NULL DEFAULT '0',
  `augsf` int(11) NOT NULL DEFAULT '0',
  `septmf` int(11) NOT NULL DEFAULT '0',
  `septcf` int(11) NOT NULL DEFAULT '0',
  `septtf` int(11) NOT NULL DEFAULT '0',
  `septsf` int(11) NOT NULL DEFAULT '0',
  `octmf` int(11) NOT NULL DEFAULT '0',
  `octcf` int(11) NOT NULL DEFAULT '0',
  `octtf` int(11) NOT NULL DEFAULT '0',
  `octsf` int(11) NOT NULL DEFAULT '0',
  `octexamination_fee` int(11) NOT NULL DEFAULT '0',
  `novmf` int(11) NOT NULL DEFAULT '0',
  `novcf` int(11) NOT NULL DEFAULT '0',
  `novtf` int(11) NOT NULL DEFAULT '0',
  `novsf` int(11) NOT NULL DEFAULT '0',
  `decmf` int(11) NOT NULL DEFAULT '0',
  `deccf` int(11) NOT NULL DEFAULT '0',
  `dectf` int(11) NOT NULL DEFAULT '0',
  `decsf` int(11) NOT NULL DEFAULT '0',
  `prospectus` int(11) NOT NULL DEFAULT '0',
  `annual_charges` int(11) NOT NULL DEFAULT '0',
  `admission_fee` int(11) NOT NULL DEFAULT '0',
  `application` int(11) NOT NULL DEFAULT '0',
  `outstanding` int(11) NOT NULL DEFAULT '0',
  `concession` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `jmf`, `jcf`, `jtf`, `jsf`, `fmf`, `fcf`, `ftf`, `fsf`, `mmf`, `mcf`, `mtf`, `msf`, `amf`, `acf`, `atf`, `asf`, `maymf`, `maycf`, `maytf`, `maysf`, `junemf`, `junecf`, `junetf`, `junesf`, `julymf`, `julycf`, `julytf`, `julysf`, `julyid_card_fee`, `augmf`, `augcf`, `augtf`, `augsf`, `septmf`, `septcf`, `septtf`, `septsf`, `octmf`, `octcf`, `octtf`, `octsf`, `octexamination_fee`, `novmf`, `novcf`, `novtf`, `novsf`, `decmf`, `deccf`, `dectf`, `decsf`, `prospectus`, `annual_charges`, `admission_fee`, `application`, `outstanding`, `concession`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 23635, NULL, '2020-02-06 05:03:28', '2020-02-06 05:15:37'),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, NULL, '2020-02-06 05:23:02', '2020-02-06 10:08:51'),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-02-06 05:24:21', '2020-02-06 05:24:21'),
(4, 4, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, NULL, '2020-02-06 05:25:00', '2020-02-06 05:25:00'),
(5, 5, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, NULL, '2020-02-06 08:32:23', '2020-02-06 08:32:23'),
(6, 6, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, NULL, '2020-02-06 08:35:00', '2020-02-06 08:35:00'),
(7, 7, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, NULL, '2020-02-06 08:38:25', '2020-02-07 02:10:14'),
(8, 9, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, NULL, '2020-02-08 13:19:23', '2020-02-10 05:53:19'),
(9, 10, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, NULL, '2020-02-08 13:20:09', '2020-02-10 05:49:05'),
(10, 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, NULL, '2020-02-08 18:47:59', '2020-02-10 05:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `gate_passes`
--

CREATE TABLE `gate_passes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `with_whom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reasons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gate_passes`
--

INSERT INTO `gate_passes` (`id`, `with_whom`, `relation`, `reasons`, `name`, `created_at`, `updated_at`, `father_name`, `class`, `adm_no`) VALUES
(7, 'Raminder Kaur', 'Mother', 'sick', 'PRIYA SHARMA', '2019-12-29 20:50:14', '2019-12-29 20:50:14', 'SURINDER PAL', '5-A', '1184'),
(8, 'Raminder Kaur', 'Mother', 'sick', 'MANSIMAR SINGH', '2020-02-06 20:51:04', '2020-02-06 20:51:04', 'KANWALJIT SINGH', 'L.K.G-Lotus', '8');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `computer_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sports` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `stationary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `stationary_fee` int(11) NOT NULL DEFAULT '0',
  `admission` int(11) DEFAULT NULL,
  `annual` int(11) DEFAULT NULL,
  `prospectus` int(11) NOT NULL DEFAULT '200',
  `application` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `class`, `created_at`, `updated_at`, `fee`, `computer_fee`, `sports`, `stationary`, `stationary_fee`, `admission`, `annual`, `prospectus`, `application`) VALUES
(1, '1', '2019-12-16 19:21:25', '2020-02-02 05:44:25', '3500', '2500', '0', '0', 0, 5000, 3000, 200, 0),
(2, '2', '2019-12-16 19:21:33', '2020-02-02 05:45:29', '1000', '0', '0', '0', 0, 3000, 5000, 200, 0),
(3, '3', '2019-12-16 19:21:53', '2020-02-02 08:59:07', '900', '100', '100', '400', 0, 3000, 5000, 200, 0),
(4, '4', '2019-12-16 19:22:09', '2019-12-16 19:22:09', '4000', '400', '0', '0', 0, NULL, NULL, 200, 0),
(5, '5', '2019-12-16 19:22:22', '2019-12-16 19:22:22', '1000', '1000', '0', '0', 0, NULL, NULL, 200, 0),
(6, '6', '2019-12-16 19:22:30', '2019-12-16 19:22:30', '6000', '600', '0', '0', 0, NULL, NULL, 200, 0),
(7, '7', '2019-12-16 19:22:38', '2019-12-16 19:22:38', '1000', '10000', '0', '0', 0, NULL, NULL, 200, 0),
(8, '8', '2019-12-16 19:22:53', '2019-12-16 19:22:53', '8000', '800', '0', '0', 0, NULL, NULL, 200, 0),
(9, '9', '2019-12-16 19:23:00', '2019-12-16 19:23:00', '9000', '900', '0', '0', 0, NULL, NULL, 200, 0),
(10, '10', '2019-12-16 19:23:07', '2019-12-16 19:23:07', '1000', '10000', '0', '0', 0, NULL, NULL, 200, 0),
(11, '11', '2019-12-16 19:23:25', '2020-02-02 07:58:12', '1800', '0', '100', '400', 0, 3000, 7500, 200, 0),
(12, '12', '2019-12-16 19:23:33', '2019-12-16 19:23:33', '10000', '10000', '0', '0', 0, NULL, NULL, 200, 0),
(100, 'Pre-Nursery 1', '2019-12-16 19:21:17', '2019-12-20 11:16:00', '1000', '2000', '0', '500', 2500, NULL, NULL, 200, 0),
(101, 'L.K.G', NULL, '2020-02-04 18:47:18', '1000', '200', '100', '100', 100, 5000, 5000, 200, 0),
(102, 'U.K.G', NULL, '2020-02-04 19:09:04', '1000', '1000', '100', '100', 100, 10000, 10000, 100, 0);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_27_064800_create_students_table', 2),
(5, '2019_10_27_072108_create_grades_table', 3),
(6, '2019_10_27_072153_create_sections_table', 3),
(7, '2019_10_27_072215_create_streams_table', 3),
(8, '2019_10_27_072257_create_genders_table', 3),
(9, '2019_10_27_072328_create_fathers_table', 3),
(10, '2019_10_27_072337_create_mothers_table', 3),
(11, '2019_10_27_072405_create_stations_table', 3),
(12, '2019_10_27_072428_create_other_cons_table', 3),
(13, '2019_10_27_072442_create_castes_table', 3),
(14, '2019_10_27_072455_create_religions_table', 3),
(15, '2019_10_29_093610_create_transfer_certificates_table', 4),
(16, '2019_10_29_093709_create_birth_certificates_table', 4),
(17, '2019_10_29_093724_create_annual_expense_certificates_table', 4),
(18, '2019_10_29_093804_create_character_certificates_table', 4),
(19, '2019_10_29_093820_create_gate_passes_table', 4),
(20, '2019_10_29_144756_add_accomodation_to_class', 5),
(21, '2019_10_30_155715_create_employees_table', 6),
(22, '2019_10_30_161835_add_capacity_to_sections', 7),
(24, '2019_11_29_105515_create_concessions_table', 9),
(25, '2019_12_19_222327_create_explicit_cons_table', 10),
(26, '2019_12_28_210554_fees', 11),
(27, '2019_12_29_180632_create_reciepts_table', 12),
(28, '2020_02_04_233621_dues', 13),
(29, '2020_02_04_233705_create_dues_table', 14),
(30, '2020_02_06_172126_create_tcs_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `mothers`
--

CREATE TABLE `mothers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mothers`
--

INSERT INTO `mothers` (`id`, `student_id`, `name`, `occupation`, `UID`, `qual`, `created_at`, `updated_at`) VALUES
(1, 1, 'Raminder kaur', 'bussiness owner', '123456789012', '+12', '2019-10-30 19:46:24', '2019-10-31 08:51:15'),
(2, 2, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-10-30 20:32:07', '2019-10-30 20:32:07'),
(3, 2, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-10-31 13:22:30', '2019-10-31 13:22:30'),
(4, 3, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 12:10:27', '2019-11-01 12:10:27'),
(5, 4, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 12:27:39', '2019-11-01 12:27:39'),
(6, 5, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 12:39:17', '2019-11-01 12:39:17'),
(7, 6, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-01 13:03:39', '2019-11-01 13:03:39'),
(8, 7, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-28 08:17:39', '2019-11-28 08:17:39'),
(9, 8, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-28 08:41:05', '2019-11-28 08:41:05'),
(10, 9, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-28 08:43:10', '2019-11-28 08:43:10'),
(11, 10, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:05:18', '2019-11-29 05:05:18'),
(12, 11, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:06:29', '2019-11-29 05:06:29'),
(13, 12, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:07:15', '2019-11-29 05:07:15'),
(14, 13, 'Raminder KAur', 'bussiness', '0', '+12', '2019-11-29 05:08:28', '2019-11-29 05:08:28'),
(15, 14, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-11-29 05:17:52', '2019-11-29 05:17:52'),
(16, 15, 'Raminder KAur', 'bussiness', '0', '+12', '2019-12-01 17:05:13', '2019-12-01 17:05:13'),
(17, 16, 'Raminder KAur', 'bussiness', '0', '+12', '2019-12-01 17:06:37', '2019-12-01 17:06:37'),
(18, 17, 'Raminder KAur', 'bussiness', '0', '+12', '2019-12-01 17:07:13', '2019-12-01 17:07:13'),
(19, 1, 'Raminder KAur', 'bussiness', '123456789012', '+12', '2019-12-13 11:10:02', '2019-12-13 11:10:02'),
(20, 1272, 'Raminder KAur', 'N/A', '0', '0', '2019-12-29 13:08:51', '2019-12-29 13:08:51'),
(21, 1273, 'Raminder KAur', 'N/A', '0', '0', '2019-12-29 13:09:47', '2019-12-29 13:09:47'),
(22, 1274, 'Raminder Kaur', 'N/A', '0', '0', '2019-12-29 13:13:13', '2019-12-29 13:13:13'),
(23, 1275, 'Raminder KAur', 'N/A', '0', '0', '2019-12-29 13:26:01', '2019-12-29 13:26:01'),
(24, 1276, 'Raminder KAur', 'N/A', '0', '0', '2019-12-30 06:07:10', '2019-12-30 06:07:10'),
(25, 1277, 'Raminder KAur', 'N/A', '0', '0', '2019-12-30 06:54:05', '2019-12-30 06:54:05'),
(26, 1278, 'Raminder KAur', 'N/A', '0', '0', '2019-12-30 06:56:28', '2019-12-30 06:56:28'),
(27, 1279, 'Raminder KAur', 'N/A', '0', '0', '2019-12-30 07:01:20', '2019-12-30 07:01:20'),
(28, 1280, 'Raminder KAur', 'N/A', '0', '0', '2019-12-30 07:01:20', '2019-12-30 07:01:20'),
(29, 1281, 'Raminder KAur', 'N/A', '0', '0', '2019-12-30 07:03:51', '2019-12-30 07:03:51'),
(30, 1282, 'Raminder KAur', 'N/A', '0', '0', '2020-02-02 03:50:51', '2020-02-02 03:50:51'),
(31, 1283, 'Shiela', 'N/A', '0', '0', '2020-02-02 07:25:16', '2020-02-02 07:25:16'),
(32, 1284, 'Shiela', 'N/A', '0', '0', '2020-02-02 07:26:17', '2020-02-02 07:26:17'),
(33, 1285, 'Raminder KAur', 'N/A', '0', '0', '2020-02-02 08:57:30', '2020-02-02 08:57:30'),
(34, 1270, 'Raminder KAur', 'N/A', '0', '0', '2020-02-04 18:48:48', '2020-02-04 18:48:48'),
(35, 1271, 'Raminder KAur', 'N/A', '0', '0', '2020-02-04 18:56:43', '2020-02-04 18:56:43'),
(36, 1277, 'Raminder KAur', 'N/A', '0', '0', '2020-02-04 19:08:18', '2020-02-04 19:08:18'),
(37, 1278, 'Raminder KAur', 'N/A', '0', '0', '2020-02-04 19:09:20', '2020-02-04 19:09:20'),
(38, 1, 'Raminder Kaur', 'N/A', '0', '0', '2020-02-06 05:03:29', '2020-02-06 05:03:29'),
(39, 2, 'Raminder Kaur', 'N/A', '0', '0', '2020-02-06 05:23:02', '2020-02-06 05:23:02'),
(40, 3, 'Raminder Kaur', 'N/A', '0', '0', '2020-02-06 05:24:21', '2020-02-06 05:24:21'),
(41, 4, 'Raminder Kaur', 'N/A', '0', '0', '2020-02-06 05:25:00', '2020-02-06 05:25:00'),
(42, 5, 'RAMINDER KAUR', 'N/A', '0', '0', '2020-02-06 08:32:23', '2020-02-06 08:32:23'),
(43, 6, 'RAMINDER KAUR', 'N/A', '0', '0', '2020-02-06 08:35:00', '2020-02-06 08:35:00'),
(44, 7, 'RAMINDER KAUR', 'N/A', '0', '0', '2020-02-06 08:38:25', '2020-02-06 08:38:25'),
(45, 9, 'RAMINDER KAUR', 'N/A', '0', '0', '2020-02-08 13:19:23', '2020-02-08 13:19:23'),
(46, 10, 'RAMINDER KAUR', 'N/A', '0', '0', '2020-02-08 13:20:09', '2020-02-08 13:20:09'),
(47, 11, 'RAMINDER KAUR', 'N/A', '0', '0', '2020-02-08 18:47:59', '2020-02-08 18:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `other_cons`
--

CREATE TABLE `other_cons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `paid` int(11) DEFAULT NULL,
  `outstanding` int(11) DEFAULT NULL,
  `particulars` text COLLATE utf8mb4_unicode_ci,
  `fee` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Cash',
  `refrence` text COLLATE utf8mb4_unicode_ci,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2020-2021',
  `user_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reciepts`
--

INSERT INTO `reciepts` (`id`, `student_id`, `paid`, `outstanding`, `particulars`, `fee`, `created_at`, `updated_at`, `date`, `mode`, `refrence`, `session`, `user_id`) VALUES
(1, 9, 10000, 21800, 'a:2:{i:0;s:13:\"Admission Fee\";i:1;s:14:\"Annual Charges\";}', 'a:2:{i:0;s:4:\"5000\";i:1;s:4:\"5000\";}', '2020-02-10 05:53:19', '2020-02-10 05:53:19', '2020-02-10', 'Cash', NULL, '2020-2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hindu', NULL, NULL),
(2, 'Sikh', NULL, NULL),
(3, 'Jain', NULL, NULL),
(4, 'Muslim', NULL, NULL),
(5, 'Christian ', NULL, NULL),
(6, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bus` int(11) DEFAULT '0',
  `route` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `name`, `created_at`, `updated_at`, `fee`, `bus`, `route`) VALUES
(3, 'Gurdaspur', '2019-11-29 04:04:20', '2020-02-02 08:07:33', '500', 1, NULL),
(4, 'ਕਪਰਿੇਗੁਕਿਲਨ', '2019-12-13 12:00:38', '2019-12-13 12:00:38', '5800', 1, NULL),
(5, 'Ludhiana', '2019-12-20 09:03:14', '2019-12-20 09:03:14', '5000', 3, NULL),
(6, 'Purana Shalla', '2019-12-20 12:35:58', '2019-12-20 12:35:58', '5000', 2, NULL),
(7, 'Chandigarh', '2019-12-25 19:17:03', '2019-12-25 19:17:03', '2500', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'N/A', '2019-10-30 12:59:03', '2019-10-30 12:59:03'),
(5, 'Non Medical', '2020-02-02 07:22:07', '2020-02-02 07:22:07'),
(6, 'Medical', '2020-02-02 07:22:10', '2020-02-02 07:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `session` varchar(191) DEFAULT NULL,
  `previous_ad_number` varchar(191) DEFAULT NULL,
  `adm_type` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `section` varchar(191) DEFAULT NULL,
  `stream` int(11) DEFAULT NULL,
  `roll_number` varchar(191) DEFAULT NULL,
  `adm_no` varchar(191) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `DOB_certificate` int(11) DEFAULT NULL,
  `slc` int(11) DEFAULT NULL,
  `report_card` int(11) DEFAULT NULL,
  `aadhar_card` int(11) DEFAULT NULL,
  `tc` int(11) DEFAULT NULL,
  `document_verified` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `father` varchar(191) DEFAULT NULL,
  `mother` varchar(191) DEFAULT NULL,
  `tel1` varchar(191) DEFAULT NULL,
  `tel2` varchar(191) DEFAULT NULL,
  `addhar_number` varchar(191) DEFAULT NULL,
  `convinience_req` int(11) DEFAULT NULL,
  `station` int(11) DEFAULT '0',
  `other_con` int(11) DEFAULT NULL,
  `cast_category` int(11) DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `blood_group` varchar(191) DEFAULT NULL,
  `annual_income` varchar(191) DEFAULT NULL,
  `path` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `vill` text,
  `postoffice` text,
  `tehsil` text,
  `district` text,
  `pincode` text,
  `state` text,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `admission_date`, `session`, `previous_ad_number`, `adm_type`, `class`, `section`, `stream`, `roll_number`, `adm_no`, `gender`, `DOB_certificate`, `slc`, `report_card`, `aadhar_card`, `tc`, `document_verified`, `dob`, `father`, `mother`, `tel1`, `tel2`, `addhar_number`, `convinience_req`, `station`, `other_con`, `cast_category`, `religion`, `blood_group`, `annual_income`, `path`, `created_at`, `updated_at`, `status`, `vill`, `postoffice`, `tehsil`, `district`, `pincode`, `state`, `user_id`) VALUES
(9, 'MANSIMAR SINGH', '2020-02-08', '2020-2021', '0', 0, 101, 'Rose', 3, '3', '3', 0, 0, 0, 0, 0, 0, 1, '1999-07-13', 'KANWALJIT SINGH', 'RAMINDER KAUR', '7340910031', '7340910031', '123456789012', 1, 3, NULL, 1, 2, '0+', '150000', '1581167963.png', '2020-02-08', '2020-02-08', 1, 'GURDASPUR', 'GURDASPUR', 'GURDASPUR', 'GURDASPUR', '143521', 'PUNJAB', 1),
(10, 'HARDIL SINGH', '2020-02-08', '2020-2021', '0', 0, 101, 'Rose', 3, '5', '5', 0, 0, 0, 0, 0, 0, 1, '1999-07-13', 'KANWALJIT SINGH', 'RAMINDER KAUR', '7340910031', '7340910031', '123456789012', 0, 3, 1, 1, 2, '0+', '150000', '1581168009.png', '2020-02-08', '2020-02-08', 1, 'GURDASPUR', 'GURDASPUR', 'GURDASPUR', 'GURDASPUR', '143521', 'PUNJAB', 1),
(11, 'HARDIL SINGH', '2020-02-09', '2020-2021', '0', 0, 101, 'Lotus', 3, '4', '4', 0, 0, 0, 0, 0, 0, 0, '1999-07-13', 'HARDIL SINGH', 'RAMINDER KAUR', '7340910031', '7340910031', '123456789012', 0, 3, 2, 1, 1, '0+', '150000', '0', '2020-02-09', '2020-02-09', 1, 'GURDASPUR', 'TEHSIL', 'GURDASPUR', 'DRANCY', '143521', 'PUNJAB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tcs`
--

CREATE TABLE `tcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects` text COLLATE utf8mb4_unicode_ci,
  `tpd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scout` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dues` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `games` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conduct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tcs`
--

INSERT INTO `tcs` (`id`, `student_id`, `user_id`, `session`, `nationality`, `failed`, `subjects`, `tpd`, `twd`, `scout`, `dues`, `games`, `conduct`, `doa`, `created_at`, `updated_at`) VALUES
(3, 4, 1, '2020-2021', 'INDIAN', 'NO', 'a:4:{i:0;s:5:\"HINDI\";i:1;s:7:\"ENGLISH\";i:2;s:5:\"MATHS\";i:3;s:7:\"SCIENCE\";}', '199', '200', 'NO', 'MAY', 'NO', 'GOOD', '2020-02-07', '2020-02-06 18:34:49', '2020-02-06 18:34:49'),
(4, 7, 1, '2020-2021', 'INDIAN', 'NO', 'a:5:{i:0;s:5:\"HINDI\";i:1;s:7:\"ENGLISH\";i:2;s:5:\"MATHS\";i:3;s:7:\"SCIENCE\";i:4;s:7:\"PUNJABI\";}', '199', '200', 'NO', 'JUNE', 'NO', 'GOOD', '2020-02-07', '2020-02-06 19:46:47', '2020-02-06 19:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_certificates`
--

CREATE TABLE `transfer_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `failed` int(11) NOT NULL,
  `subjects` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualified` int(11) NOT NULL,
  `dues_paid_upto` date NOT NULL,
  `fee-cons` int(11) NOT NULL,
  `TPD` int(11) NOT NULL,
  `TWD` int(11) NOT NULL,
  `NCC_cadet` int(11) NOT NULL,
  `extra_caricullar` int(11) NOT NULL,
  `conduct` int(11) NOT NULL,
  `DAC` int(11) NOT NULL,
  `DIC` int(11) NOT NULL,
  `reasons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Rajiv', 'rajiv@admin.com', NULL, '$2y$10$EYS61cLpia1Thz0CBlPVWOhQK/TxgkqVLhMESZ5RvEiSKgfpZiXN2', NULL, '2019-10-26 05:43:40', '2019-10-26 05:43:40', 1),
(2, 'User', 'security@admin.com', NULL, '$2y$10$xRRWhEcAZNFW4gYqF/cXfe4UJ5caSs4IKrwPnlBWGU2PexmJXQPYu', NULL, '2019-12-20 10:38:24', '2019-12-20 10:38:24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_expense_certificates`
--
ALTER TABLE `annual_expense_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `castes`
--
ALTER TABLE `castes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_certificates`
--
ALTER TABLE `character_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concessions`
--
ALTER TABLE `concessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explicit_cons`
--
ALTER TABLE `explicit_cons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fathers`
--
ALTER TABLE `fathers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gate_passes`
--
ALTER TABLE `gate_passes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mothers`
--
ALTER TABLE `mothers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_cons`
--
ALTER TABLE `other_cons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tcs`
--
ALTER TABLE `tcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_certificates`
--
ALTER TABLE `transfer_certificates`
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
-- AUTO_INCREMENT for table `annual_expense_certificates`
--
ALTER TABLE `annual_expense_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `castes`
--
ALTER TABLE `castes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `character_certificates`
--
ALTER TABLE `character_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `concessions`
--
ALTER TABLE `concessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `explicit_cons`
--
ALTER TABLE `explicit_cons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fathers`
--
ALTER TABLE `fathers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gate_passes`
--
ALTER TABLE `gate_passes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mothers`
--
ALTER TABLE `mothers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `other_cons`
--
ALTER TABLE `other_cons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tcs`
--
ALTER TABLE `tcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfer_certificates`
--
ALTER TABLE `transfer_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
