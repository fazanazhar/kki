-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 03:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunkrisps`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'administrator', 'control all content'),
(2, 'qc', 'control qc panel'),
(3, 'production', 'control production panel'),
(4, 'warehouse', 'control warehouse panel');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 3),
(4, 1),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'rnd@suryasara.com', 1, '2022-09-05 21:26:50', 1),
(2, '::1', 'rnd@suryasara.com', 1, '2022-09-06 20:12:31', 1),
(3, '::1', 'rnd@suryasara.com', 1, '2022-09-06 23:08:19', 1),
(4, '::1', 'rnd@suryasara.com', 1, '2022-09-11 23:03:06', 1),
(5, '::1', 'rnd@suryasara.com', 1, '2022-09-12 20:32:50', 1),
(6, '::1', 'rnd@suryasara.com', 1, '2022-09-13 20:29:50', 1),
(7, '::1', 'rnd@suryasara.com', 1, '2022-09-14 20:19:14', 1),
(8, '::1', 'rnd@suryasara.com', 1, '2022-09-15 03:11:43', 1),
(9, '::1', 'rnd@suryasara.com', 1, '2022-09-15 06:42:32', 1),
(10, '::1', 'rnd@suryasara.com', 1, '2022-09-15 20:15:49', 1),
(11, '::1', 'rnd@suryasara.com', 1, '2022-09-15 22:47:34', 1),
(12, '::1', 'rnd@suryasara.com', 1, '2022-09-18 07:47:15', 1),
(13, '::1', 'rnd@suryasara.com', 1, '2022-09-20 22:47:43', 1),
(14, '::1', 'rnd@suryasara.com', 1, '2022-09-21 20:53:34', 1),
(15, '::1', 'rnd@suryasara.com', 1, '2022-09-22 21:20:38', 1),
(16, '::1', 'rnd@suryasara.com', 1, '2022-09-25 20:25:35', 1),
(17, '::1', 'rnd@suryasara.com', 1, '2022-09-26 20:28:07', 1),
(18, '::1', 'rnd@suryasara.com', 1, '2022-09-27 01:24:02', 1),
(19, '::1', 'rnd@suryasara.com', 1, '2022-09-27 20:28:18', 1),
(20, '::1', 'rnd@suryasara.com', 1, '2022-09-28 20:13:41', 1),
(21, '::1', 'rnd@suryasara.com', 1, '2022-09-28 22:22:16', 1),
(22, '::1', 'rnd@suryasara.com', 1, '2022-09-28 22:30:04', 1),
(23, '::1', 'rnd@suryasara.com', 1, '2022-09-29 01:48:22', 1),
(24, '::1', 'rnd@suryasara.com', 1, '2022-09-29 01:52:52', 1),
(25, '::1', 'rnd@suryasara.com', 1, '2022-09-29 02:00:46', 1),
(26, '::1', 'rnd@suryasara.com', 1, '2022-09-29 20:24:45', 1),
(27, '::1', 'rnd@suryasara.com', 1, '2022-09-30 01:42:13', 1),
(28, '::1', 'rnd@suryasara.com', 1, '2022-10-02 20:16:09', 1),
(29, '::1', 'rnd@suryasara.com', 1, '2022-10-03 01:38:59', 1),
(30, '::1', 'rnd@suryasara.com', 1, '2022-10-03 04:49:36', 1),
(31, '::1', 'rnd@suryasara.com', 1, '2022-10-04 20:15:49', 1),
(32, '::1', 'rnd@suryasara.com', 1, '2022-10-05 09:40:52', 1),
(33, '::1', 'rnd@suryasara.com', 1, '2022-10-05 20:13:52', 1),
(34, '::1', 'rnd@suryasara.com', 1, '2022-10-05 22:05:14', 1),
(35, '::1', 'rnd@suryasara.com', 1, '2022-10-05 22:13:47', 1),
(36, '::1', 'rnd@suryasara.com', 1, '2022-10-05 23:05:46', 1),
(37, '::1', 'rnd@suryasara.com', 1, '2022-10-05 23:16:08', 1),
(38, '::1', 'rnd@suryasara.com', 1, '2022-10-06 21:30:48', 1),
(39, '::1', 'rnd@suryasara.com', 1, '2022-10-06 22:24:21', 1),
(40, '::1', 'rnd@suryasara.com', 1, '2022-10-09 20:23:04', 1),
(41, '::1', 'rnd@suryasara.com', 1, '2022-10-10 08:33:32', 1),
(42, '::1', 'rnd@suryasara.com', 1, '2022-10-10 20:56:42', 1),
(43, '::1', 'rnd@suryasara.com', 1, '2022-10-11 20:31:43', 1),
(44, '::1', 'rnd@suryasara.com', 1, '2022-10-12 20:57:05', 1),
(45, '::1', 'rnd@suryasara.com', 1, '2022-10-13 21:50:02', 1),
(46, '::1', 'rnd@suryasara.com', 1, '2022-10-15 10:03:12', 1),
(47, '::1', 'rnd@suryasara.com', 1, '2022-10-16 20:26:03', 1),
(48, '::1', 'rnd@suryasara.com', 1, '2022-10-16 22:15:07', 1),
(49, '::1', 'rnd@suryasara.com', 1, '2022-10-17 01:49:30', 1),
(50, '::1', 'rnd@suryasara.com', 1, '2022-10-17 03:07:02', 1),
(51, '::1', 'rnd@suryasara.com', 1, '2022-10-17 03:09:45', 1),
(52, '::1', 'rnd@suryasara.com', 1, '2022-10-17 08:18:18', 1),
(53, '::1', 'rnd@suryasara.com', 1, '2022-10-17 20:09:15', 1),
(54, '::1', 'rnd@suryasara.com', 1, '2022-10-18 08:43:10', 1),
(55, '::1', 'rnd@suryasara.com', 1, '2022-10-18 20:39:26', 1),
(56, '::1', 'rnd@suryasara.com', 1, '2022-10-19 01:06:37', 1),
(57, '::1', 'rnd@suryasara.com', 1, '2022-10-19 03:04:04', 1),
(58, '::1', 'rnd@suryasara.com', 1, '2022-10-19 09:15:59', 1),
(59, '::1', 'rnd@suryasara.com', 1, '2022-10-19 09:43:20', 1),
(60, '::1', 'rnd@suryasara.com', 1, '2022-10-19 20:07:45', 1),
(61, '::1', 'rnd@suryasara.com', 1, '2022-10-19 22:56:08', 1),
(62, '::1', 'rnd@suryasara.com', 1, '2022-10-19 23:02:18', 1),
(63, '::1', 'rnd@suryasara.com', 1, '2022-10-20 20:13:42', 1),
(64, '::1', 'rnd@suryasara.com', 1, '2022-10-21 02:46:10', 1),
(65, '::1', 'rnd@suryasara.com', 1, '2022-10-22 19:30:35', 1),
(66, '::1', 'rnd@suryasara.com', 1, '2022-10-23 00:24:47', 1),
(67, '::1', 'rnd@suryasara.com', 1, '2022-10-23 06:44:33', 1),
(68, '::1', 'rnd@suryasara.com', 1, '2022-10-23 21:18:10', 1),
(69, '::1', 'rnd@suryasara.com', 1, '2022-10-25 06:12:50', 1),
(70, '::1', 'rnd@suryasara.com', 1, '2022-10-25 06:13:41', 1),
(71, '::1', 'rnd@suryasara.com', 1, '2022-10-25 08:37:07', 1),
(72, '::1', 'rnd@suryasara.com', 1, '2022-10-25 20:19:36', 1),
(73, '::1', 'rnd@suryasara.com', 1, '2022-10-26 09:08:51', 1),
(74, '::1', 'fauzan@suryasarana.com', 2, '2022-10-26 10:17:49', 1),
(75, '::1', 'produksi nama', NULL, '2022-10-26 10:21:20', 0),
(76, '::1', 'produksi nama', NULL, '2022-10-26 10:21:54', 0),
(77, '::1', 'rnd.ssdautomation@ssdautomation.com', 3, '2022-10-26 10:22:15', 1),
(78, '::1', 'rnd.ssdautomation@gmail.com', 4, '2022-10-26 10:27:10', 1),
(79, '::1', 'fauzan@suryasarana.com', 2, '2022-10-26 10:57:29', 1),
(80, '::1', 'rnd.ssdautomation@ssdautomation.com', 3, '2022-10-26 11:04:43', 1),
(81, '::1', 'fauzan@suryasarana.com', 2, '2022-10-26 11:28:26', 1),
(82, '::1', 'rnd@suryasara.com', 1, '2022-10-26 11:28:50', 1),
(83, '::1', 'fauzan@suryasarana.com', 2, '2022-10-26 11:30:09', 1),
(84, '::1', 'rnd@suryasara.com', 1, '2022-10-26 11:34:03', 1),
(85, '::1', 'rnd@suryasara.com', 1, '2022-10-26 20:16:25', 1),
(86, '::1', 'rnd@suryasara.com', 1, '2022-10-28 03:04:43', 1),
(87, '::1', 'rnd@suryasara.com', 1, '2022-10-28 03:05:24', 1),
(88, '::1', 'rnd@suryasara.com', 1, '2022-10-30 20:13:56', 1),
(89, '::1', 'rnd@suryasara.com', 1, '2022-10-31 20:34:06', 1),
(90, '::1', 'rnd@suryasara.com', 1, '2022-11-01 20:14:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'administrartor', 'control all content'),
(2, 'qc', 'control qc panel'),
(3, 'production', 'control production panel'),
(4, 'warehouse', 'control warehouse panel');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_dashboard`
--

CREATE TABLE `data_dashboard` (
  `das_id` int(255) NOT NULL,
  `das_name` varchar(255) NOT NULL,
  `1` int(255) NOT NULL,
  `2` int(255) NOT NULL,
  `3` int(255) NOT NULL,
  `4` int(255) NOT NULL,
  `5` int(255) NOT NULL,
  `6` int(255) NOT NULL,
  `7` int(255) NOT NULL,
  `8` int(255) NOT NULL,
  `9` int(255) NOT NULL,
  `10` int(255) NOT NULL,
  `11` int(255) NOT NULL,
  `12` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_holding_temp`
--

CREATE TABLE `data_holding_temp` (
  `H_No` int(11) NOT NULL,
  `H_PIC` varchar(255) NOT NULL,
  `H_Datetime` datetime DEFAULT NULL,
  `RQ1_KodeKontainer` int(255) NOT NULL,
  `H_KodeBatch` varchar(255) NOT NULL,
  `H_NamaProduk` varchar(255) NOT NULL,
  `H_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_packing`
--

CREATE TABLE `data_packing` (
  `K_No` int(11) NOT NULL,
  `K_PIC` varchar(255) NOT NULL,
  `K_Datetime` datetime DEFAULT NULL,
  `K_KodeDus` varchar(255) NOT NULL,
  `K_Kodebatch` varchar(255) NOT NULL,
  `K_NamaProduk` varchar(255) NOT NULL,
  `K_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_packing_holding`
--

CREATE TABLE `data_packing_holding` (
  `P2_No` int(11) NOT NULL,
  `P2_PIC` varchar(50) NOT NULL,
  `P2_Datetime` datetime DEFAULT NULL,
  `RQ1_KodeKontainer` varchar(50) NOT NULL,
  `P2_KodeKontainer` varchar(50) NOT NULL,
  `P2_KodeBatch` varchar(50) NOT NULL,
  `P2_NamaProduk` varchar(50) NOT NULL,
  `P2_QTY` int(50) NOT NULL,
  `P2_Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_packing_temp`
--

CREATE TABLE `data_packing_temp` (
  `K_No` int(11) NOT NULL,
  `K_PIC` varchar(50) NOT NULL,
  `K_Datetime` datetime DEFAULT NULL,
  `RQ2_KodeKontainer` varchar(50) NOT NULL,
  `K_KodeDus` varchar(50) NOT NULL,
  `K_Kodebatch` varchar(50) NOT NULL,
  `K_NamaProduk` varchar(50) NOT NULL,
  `K_QTY` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_produksi`
--

CREATE TABLE `data_produksi` (
  `P_No` int(11) NOT NULL,
  `P_PIC` varchar(100) NOT NULL,
  `P_Datetime` datetime DEFAULT NULL,
  `P_KodeKontainer` int(255) NOT NULL,
  `P_KodeBatch` varchar(100) DEFAULT NULL,
  `P_NamaProduk` varchar(100) NOT NULL,
  `P_QTY` int(10) NOT NULL,
  `P_Status` varchar(100) NOT NULL,
  `P_Report` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_produksi_panel`
--

CREATE TABLE `data_produksi_panel` (
  `P_No` int(255) NOT NULL,
  `P_PIC` varchar(255) NOT NULL,
  `P_Datetime` datetime NOT NULL,
  `P_KodeKontainer` int(255) NOT NULL,
  `P_KodeBatch` varchar(255) NOT NULL,
  `P_NamaProduk` varchar(255) NOT NULL,
  `P_QTY` int(255) NOT NULL,
  `P_Status` varchar(255) NOT NULL,
  `P_Report` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_produksi_repair`
--

CREATE TABLE `data_produksi_repair` (
  `P_No` int(11) NOT NULL,
  `P_PIC` varchar(255) NOT NULL,
  `P_Datetime` datetime NOT NULL,
  `P_KodeKontainer` int(255) NOT NULL,
  `P_KodeBatch` varchar(255) NOT NULL,
  `P_NamaProduk` varchar(255) NOT NULL,
  `P_QTY` int(255) NOT NULL,
  `P_Status` varchar(255) NOT NULL,
  `P_Report` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_produksi_repair_temp`
--

CREATE TABLE `data_produksi_repair_temp` (
  `P_No` int(11) NOT NULL,
  `P_PIC` varchar(255) NOT NULL,
  `P_Datetime` datetime NOT NULL,
  `P_KodeKontainer` varchar(255) NOT NULL,
  `P_KodeBatch` varchar(255) NOT NULL,
  `P_NamaProduk` varchar(255) NOT NULL,
  `P_QTY` int(255) NOT NULL,
  `P_Status` varchar(255) NOT NULL,
  `P_Report` varchar(255) NOT NULL,
  `P_QC_QTY` int(255) NOT NULL,
  `P_Reporter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_produksi_temp`
--

CREATE TABLE `data_produksi_temp` (
  `P_No` int(11) NOT NULL,
  `P_PIC` varchar(100) NOT NULL,
  `P_Datetime` datetime DEFAULT NULL,
  `P_KodeKontainer` varchar(100) NOT NULL,
  `P_KodeBatch` varchar(100) NOT NULL,
  `P_NamaProduk` varchar(100) NOT NULL,
  `P_QTY` int(50) NOT NULL,
  `P_Status` varchar(100) NOT NULL,
  `P_Report` varchar(100) DEFAULT NULL,
  `P_QC_QTY` int(10) NOT NULL,
  `P_Reporter` varchar(255) NOT NULL,
  `P_pass` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_qc_holding`
--

CREATE TABLE `data_qc_holding` (
  `Q2_No` int(11) NOT NULL,
  `Q2_PIC` varchar(50) NOT NULL,
  `Q2_Datetime` datetime DEFAULT NULL,
  `P2_KodeKontainer` varchar(50) NOT NULL,
  `Q2_KodeKontainer` varchar(50) NOT NULL,
  `Q2_KodeBatch` varchar(50) NOT NULL,
  `Q2_NamaProduk` varchar(50) NOT NULL,
  `Q2_QTY` int(50) NOT NULL,
  `Q2_Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_qc_packing`
--

CREATE TABLE `data_qc_packing` (
  `Q3_No` int(11) NOT NULL,
  `Q3_PIC` varchar(255) NOT NULL,
  `Q3_Datetime` datetime DEFAULT NULL,
  `K_KodeDus` varchar(255) NOT NULL,
  `Q3_KodeKontainer` varchar(255) NOT NULL,
  `Q3_KodeBatch` varchar(255) NOT NULL,
  `Q3_NamaProduk` varchar(255) NOT NULL,
  `Q3_QTY` int(255) NOT NULL,
  `Q3_Kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_qc_produksi`
--

CREATE TABLE `data_qc_produksi` (
  `Q1_No` int(11) NOT NULL,
  `Q1_PIC` varchar(50) NOT NULL,
  `Q1_Datetime` datetime DEFAULT NULL,
  `P_KodeKontainer` varchar(50) NOT NULL,
  `Q1_KodeKontainer` varchar(50) NOT NULL,
  `Q1_KodeBatch` varchar(50) NOT NULL,
  `Q1_NamaProduk` varchar(50) NOT NULL,
  `Q1_QTY` int(50) NOT NULL,
  `Q1_Kategori` varchar(50) NOT NULL,
  `P_Report` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_qc_repair`
--

CREATE TABLE `data_qc_repair` (
  `Q1T_No` int(11) NOT NULL,
  `Q1T_PIC` varchar(255) NOT NULL,
  `Q1T_Datetime` datetime DEFAULT NULL,
  `R_KodeKontainer` varchar(255) NOT NULL,
  `Q1T_KodeKontainer` varchar(255) NOT NULL,
  `Q1T_KodeBatch` varchar(255) NOT NULL,
  `Q1T_NamaProduk` varchar(255) NOT NULL,
  `Q1T_QTY` int(255) NOT NULL,
  `Q1T_Kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_rejectholding`
--

CREATE TABLE `data_rejectholding` (
  `RJT_No` int(11) NOT NULL,
  `RJT_PIC` varchar(255) NOT NULL,
  `RJT_Datetime` datetime DEFAULT NULL,
  `P2_KodeKontainer` int(255) NOT NULL,
  `RJT_KodeBatch` varchar(255) NOT NULL,
  `RJT_NamaProduk` varchar(255) NOT NULL,
  `RJT_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_repair_panel`
--

CREATE TABLE `data_repair_panel` (
  `P_No` int(255) NOT NULL,
  `P_PIC` varchar(255) NOT NULL,
  `P_Datetime` datetime NOT NULL,
  `P_KodeKontainer` varchar(255) NOT NULL,
  `P_KodeBatch` varchar(255) NOT NULL,
  `P_NamaProduk` varchar(255) NOT NULL,
  `P_QTY` int(255) NOT NULL,
  `P_Status` varchar(255) NOT NULL,
  `P_Report` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_repair_temp`
--

CREATE TABLE `data_repair_temp` (
  `RPR_No` int(11) NOT NULL,
  `RPR_PIC` varchar(225) NOT NULL,
  `RPR_Datetime` datetime DEFAULT NULL,
  `R_KodeKontainer` varchar(225) NOT NULL,
  `RPR_KodeBatch` varchar(225) NOT NULL,
  `RPR_NamaProduk` varchar(225) NOT NULL,
  `RPR_QTY` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_destroy`
--

CREATE TABLE `final_destroy` (
  `D_No` int(11) NOT NULL,
  `D_PIC` varchar(255) NOT NULL,
  `D_Datetime` datetime DEFAULT NULL,
  `D_KodeBatch` varchar(255) NOT NULL,
  `D_NamaProduk` varchar(255) NOT NULL,
  `D_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_detail_shippingbox`
--

CREATE TABLE `final_detail_shippingbox` (
  `FSHP_No` int(11) NOT NULL,
  `FSHP_PIC` varchar(255) NOT NULL,
  `FSHP_Datetime` datetime NOT NULL,
  `FSHP_KodeDus` varchar(255) NOT NULL,
  `FSHP_KodeBatch` varchar(255) NOT NULL,
  `FSHP_NamaProduk` varchar(255) NOT NULL,
  `FSHP_Kategori` varchar(255) NOT NULL,
  `FSHP_QTY` varchar(255) NOT NULL,
  `FSHP_Customer` varchar(255) NOT NULL,
  `FSHP_Expedition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_discmp`
--

CREATE TABLE `final_discmp` (
  `DMP_No` int(11) NOT NULL,
  `DMP_Datetime` datetime DEFAULT NULL,
  `DMP_Kontainer` int(255) NOT NULL,
  `DMP_PIC` varchar(255) NOT NULL,
  `DMP_KodeBatch` varchar(255) NOT NULL,
  `DMP_NamaProduk` varchar(255) NOT NULL,
  `DMP_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_marketplace`
--

CREATE TABLE `final_marketplace` (
  `M_No` int(11) NOT NULL,
  `M_PIC` varchar(255) NOT NULL,
  `M_Datetime` datetime DEFAULT NULL,
  `M_Kontainer` int(100) NOT NULL,
  `M_KodeBatch` varchar(255) NOT NULL,
  `M_NamaProduk` varchar(255) NOT NULL,
  `M_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_release`
--

CREATE TABLE `final_release` (
  `R_No` int(11) NOT NULL,
  `R_PIC` varchar(255) NOT NULL,
  `R_Datetime` datetime DEFAULT NULL,
  `R_Kontainer` int(11) NOT NULL,
  `R_KodeBatch` varchar(255) NOT NULL,
  `R_NamaProduk` varchar(255) NOT NULL,
  `R_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_retain`
--

CREATE TABLE `final_retain` (
  `RTN_No` int(11) NOT NULL,
  `RTN_PIC` varchar(255) NOT NULL,
  `RTN_Datetime` datetime DEFAULT NULL,
  `RTN_KodeBatch` int(255) NOT NULL,
  `RTN_NamaProduk` varchar(255) NOT NULL,
  `RTN_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_shipping`
--

CREATE TABLE `final_shipping` (
  `SHP_No` int(11) NOT NULL,
  `SHP_PIC` varchar(225) NOT NULL,
  `SHP_Datetime` datetime DEFAULT NULL,
  `SHP_KodeBatch` varchar(225) NOT NULL,
  `SHP_NamaProduk` varchar(225) NOT NULL,
  `SHP_Kategori` varchar(100) NOT NULL,
  `SHP_QTY` int(225) NOT NULL,
  `SHP_Customer` varchar(100) NOT NULL,
  `SHP_Expedition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_shipping_dus`
--

CREATE TABLE `final_shipping_dus` (
  `SHP_No` int(11) NOT NULL,
  `SHP_PIC` varchar(100) NOT NULL,
  `SHP_Datetime` datetime NOT NULL,
  `SHP_KodeDus` varchar(100) NOT NULL,
  `SHP_QTY` int(100) NOT NULL,
  `SHP_Customer` varchar(100) NOT NULL,
  `SHP_Expedition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_sunsan`
--

CREATE TABLE `final_sunsan` (
  `S_No` int(11) NOT NULL,
  `S_PIC` varchar(255) NOT NULL,
  `S_Datetime` datetime DEFAULT NULL,
  `S_Kontainer` int(255) NOT NULL,
  `S_KodeBatch` varchar(255) NOT NULL,
  `S_NamaProduk` varchar(255) NOT NULL,
  `S_QTY` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `mbr_id` int(11) NOT NULL,
  `mbr_kode` varchar(255) NOT NULL,
  `mbr_produk` varchar(255) NOT NULL,
  `mbr_nama` varchar(255) NOT NULL,
  `D1` int(255) NOT NULL,
  `D2` int(255) NOT NULL,
  `D3` int(255) NOT NULL,
  `D4` int(255) NOT NULL,
  `D5` int(255) NOT NULL,
  `D6` int(255) NOT NULL,
  `D7` int(255) NOT NULL,
  `D8` int(255) NOT NULL,
  `D9` int(255) NOT NULL,
  `D10` int(255) NOT NULL,
  `D11` int(255) NOT NULL,
  `D12` int(255) NOT NULL,
  `basecolor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`mbr_id`, `mbr_kode`, `mbr_produk`, `mbr_nama`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `D9`, `D10`, `D11`, `D12`, `basecolor`) VALUES
(1, '012', 'RCO', 'Rainbow Puff Choco Original', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '   rgb(137, 255, 180)'),
(2, '013', 'RCC', 'Rainbow Puff Choco Cheese', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'rgb(85, 216, 193)'),
(3, '019', 'RSO', 'Rainbow Stick Original', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ' rgb(105, 78, 78)'),
(4, '020', 'RSC', 'Rainbow Stick Cheese', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ' rgb(45, 70, 185)'),
(5, '031', 'RNC', 'Rainbow Noodle Cheese', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ' rgb(255, 38, 38)'),
(6, '032', 'RSOM', 'Mini Rainbow Stick Original', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ' rgb(55, 125, 113)'),
(7, '033', 'RSCM', 'Mini Rainbow Stick Cheese', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ' rgb(85, 73, 148)'),
(8, '034', 'SOCM', 'Mini Rainbow Stick - Cokelat', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ' rgb(0, 245, 255)'),
(9, '035', 'SOBM', 'Mini Rainbow Stick - Banana', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ' rgb(252, 231, 0)'),
(10, '036', 'SOSM', 'Mini Rainbow Stick - Strawberry', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'rgb(255, 109, 40)'),
(11, '037', 'SOMM', 'Mini Rainbow Stick - Cookies and Cream', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'rgb(234, 4, 126)');

-- --------------------------------------------------------

--
-- Table structure for table `master_box`
--

CREATE TABLE `master_box` (
  `mb_id` int(11) NOT NULL,
  `mb_kode` varchar(255) NOT NULL,
  `mb_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_box`
--

INSERT INTO `master_box` (`mb_id`, `mb_kode`, `mb_nama`) VALUES
(1, '1', 'Dus Sunkrisps ukuran 41 x 41 x 30 cm'),
(2, '2', 'Dus Sunkrisps ukuran 41 x 22 x 22 cm'),
(3, '3', 'Dus Sunkrisps ukuran 38 x 10 x 11 cm'),
(4, '4', 'Dus Sunkrisps ukuran 26 x 22.5 x 20 cm');

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `No` int(11) NOT NULL,
  `Tanggal_Produksi` varchar(50) DEFAULT NULL,
  `Kode_Produk` varchar(50) NOT NULL,
  `Batch` varchar(50) NOT NULL,
  `PD_FG_QTY` int(11) NOT NULL,
  `Tanggal_QC` varchar(50) DEFAULT NULL,
  `QC_FG_QTY` int(11) NOT NULL,
  `QC_Repack_QTY` int(11) NOT NULL,
  `QC_Sunsan_QTY` int(11) NOT NULL,
  `QC_Discmp_QTY` int(11) NOT NULL,
  `Holding_OP_QTY` int(11) NOT NULL,
  `Tanggal_Holding` varchar(50) DEFAULT NULL,
  `Holding_FG_QTY` int(11) NOT NULL,
  `Packing_FG_QTY` int(11) NOT NULL,
  `Tanggal_Packing` varchar(50) DEFAULT NULL,
  `Packing_Repack_QTY` int(11) NOT NULL,
  `Packing_Sunsan_QTY` int(11) NOT NULL,
  `Packing_Discmp_QTY` int(11) NOT NULL,
  `RTG_FG_QTY` int(11) NOT NULL,
  `Tanggal_RTG` varchar(50) DEFAULT NULL,
  `RTG_Repack_QTY` int(11) NOT NULL,
  `RTG_Sunsan_QTY` int(11) NOT NULL,
  `RTG_Discmp_QTY` int(11) NOT NULL,
  `QC_Status` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_ekspedisi`
--

CREATE TABLE `master_ekspedisi` (
  `me_id` int(11) NOT NULL,
  `me_kode` int(255) NOT NULL,
  `me_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_ekspedisi`
--

INSERT INTO `master_ekspedisi` (`me_id`, `me_kode`, `me_nama`) VALUES
(1, 1, 'Alfatrex'),
(2, 2, 'Anteraja Reguler'),
(3, 3, 'Anteraja Economy'),
(4, 4, 'Anteraja Cargo'),
(5, 5, 'Bluebird Kirim'),
(6, 6, 'Deliveree'),
(7, 7, 'GoSend Instant'),
(8, 8, 'GoSend Same Day'),
(9, 9, 'GrabExpress Instant'),
(10, 10, 'GrabExpress Same Day'),
(11, 11, 'ID Express'),
(12, 12, 'Indopaket'),
(13, 13, 'J&T Jemari'),
(14, 14, 'J&T Express'),
(15, 15, 'J&T Economy'),
(16, 16, 'J&T Cargo'),
(17, 17, 'JNE Reguler'),
(18, 18, 'JNE Trucking (JTR)'),
(19, 19, 'JNE YES'),
(20, 20, 'Ninja Xpress'),
(21, 21, 'Paxel'),
(22, 22, 'Pos Kilat Khusus (Cashless)'),
(23, 23, 'Sentral Cargo'),
(24, 24, 'Shopee Xpress Standard'),
(25, 25, 'Shopee Xpress Instant'),
(26, 26, 'Shopee Xpress Hemat'),
(27, 27, 'SiCepat Reg'),
(28, 28, 'SiCepat Halu'),
(29, 29, 'SiCepat Gokil'),
(30, 30, 'SiCepat Best'),
(31, 31, 'Tiki');

-- --------------------------------------------------------

--
-- Table structure for table `master_kontainer`
--

CREATE TABLE `master_kontainer` (
  `mk_id` int(11) NOT NULL,
  `mk_kode` int(255) NOT NULL,
  `mk_keterangan` varchar(255) NOT NULL,
  `mk_maxqty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_kontainer`
--

INSERT INTO `master_kontainer` (`mk_id`, `mk_kode`, `mk_keterangan`, `mk_maxqty`) VALUES
(1, 1, '1-A1', '56'),
(2, 2, '1-A2', '56'),
(3, 3, '1-A3', '56'),
(4, 4, '1-A4', '56'),
(5, 5, '1-A5', '56'),
(6, 6, '1-A6', '56'),
(7, 7, '1-B1', '56'),
(8, 8, '1-B2', '56'),
(9, 9, '1-B3', '56'),
(10, 10, '1-B4', '56'),
(11, 11, '1-B5', '56'),
(12, 12, '1-B6', '56'),
(13, 13, '1-C1', '56'),
(14, 14, '1-C2', '56'),
(15, 15, '1-C3', '56'),
(16, 16, '1-C4', '56'),
(17, 17, '1-C5', '56'),
(18, 18, '1-C6', '56'),
(19, 19, '1-D1', '56'),
(20, 20, '1-D2', '56'),
(21, 21, '1-D3', '56'),
(22, 22, '1-D4', '56'),
(23, 23, '1-D5', '56'),
(24, 24, '1-D6', '56'),
(25, 25, '2-A1', '56'),
(26, 26, '2-A2', '56'),
(27, 27, '2-A3', '56'),
(28, 28, '2-A4', '56'),
(29, 29, '2-A5', '56'),
(30, 30, '2-A6', '56'),
(31, 31, '2-B1', '56'),
(32, 32, '2-B2', '56'),
(33, 33, '2-B3', '56'),
(34, 34, '2-B4', '56'),
(35, 35, '2-B5', '56'),
(36, 36, '2-B6', '56'),
(37, 37, '2-C1', '56'),
(38, 38, '2-C2', '56'),
(39, 39, '2-C3', '56'),
(40, 40, '2-C4', '56'),
(41, 41, '2-C5', '56'),
(42, 42, '2-C6', '56'),
(43, 43, '2-D1', '56'),
(44, 44, '2-D2', '56'),
(45, 45, '2-D3', '56'),
(46, 46, '2-D4', '56'),
(47, 47, '2-D5', '56'),
(48, 48, '2-D6', '56'),
(49, 49, '2-E1', '56'),
(50, 50, '2-E2', '56'),
(51, 51, '2-E3', '56'),
(52, 52, '2-E4', '56'),
(53, 53, '2-E5', '56'),
(54, 54, '2-E6', '56'),
(55, 55, '2-F1', '56'),
(56, 56, '2-F2', '56'),
(57, 57, '2-F3', '56'),
(58, 58, '2-F4', '56'),
(59, 59, '2-F5', '56'),
(60, 60, '2-F6', '56'),
(61, 61, '2-G1', '56'),
(62, 62, '2-G2', '56'),
(63, 63, '2-G3', '56'),
(64, 64, '2-G4', '56'),
(65, 65, '2-G5', '56'),
(66, 66, '2-G6', '56'),
(67, 67, '2-H1', '56'),
(68, 68, '2-H2', '56'),
(69, 69, '2-H3', '56'),
(70, 70, '2-H4', '56'),
(71, 71, '2-H5', '56'),
(72, 72, '2-H6', '56'),
(73, 73, '3-A1', '56'),
(74, 74, '3-A2', '56'),
(75, 75, '3-A3', '56'),
(76, 76, '3-A4', '56'),
(77, 77, '3-A5', '56'),
(78, 78, '3-A6', '56'),
(79, 79, '3-A7', '56'),
(80, 80, '3-B1', '56'),
(81, 81, '3-B2', '56'),
(82, 82, '3-B3', '56'),
(83, 83, '3-B4', '56'),
(84, 84, '3-B5', '56'),
(85, 85, '3-B6', '56'),
(86, 86, '3-B7', '56'),
(87, 87, '3-C1', '56'),
(88, 88, '3-C2', '56'),
(89, 89, '3-C3', '56'),
(90, 90, '3-C4', '56'),
(91, 91, '3-C5', '56'),
(92, 92, '3-C6', '56'),
(93, 93, '3-C7', '56'),
(94, 94, '3-D1', '56'),
(95, 95, '3-D2', '56'),
(96, 96, '3-D3', '56'),
(97, 97, '3-D4', '56'),
(98, 98, '3-D5', '56'),
(99, 99, '3-D6', '56'),
(100, 100, '3-D7', '56'),
(101, 101, '3-E1', '56'),
(102, 102, '3-E2', '56'),
(103, 103, '3-E3', '56'),
(104, 104, '3-E4', '56'),
(105, 105, '3-E5', '56'),
(106, 106, '3-E6', '56'),
(107, 107, '3-E7', '56'),
(108, 108, '4-A1', '150'),
(109, 109, '4-A2', '150'),
(110, 110, '4-A3', '150'),
(111, 111, '4-A4', '150'),
(112, 112, '4-A5', '150'),
(113, 113, '4-B1', '150'),
(114, 114, '4-B2', '150'),
(115, 115, '4-B3', '150'),
(116, 116, '4-B4', '150'),
(117, 117, '4-B5', '150'),
(118, 118, '4-C1', '150'),
(119, 119, '4-C2', '150'),
(120, 120, '4-C3', '150'),
(121, 121, '4-C4', '150'),
(122, 122, '4-C5', '150'),
(123, 123, '5-A1', '56'),
(124, 124, '5-A2', '56'),
(125, 125, '5-A3', '56'),
(126, 126, '5-A4', '56'),
(127, 127, '5-A5', '56'),
(128, 128, '5-B1', '56'),
(129, 129, '5-B2', '56'),
(130, 130, '5-B3', '56'),
(131, 131, '5-B4', '56');

-- --------------------------------------------------------

--
-- Table structure for table `master_pelanggan`
--

CREATE TABLE `master_pelanggan` (
  `mp_id` int(11) NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `mp_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pelanggan`
--

INSERT INTO `master_pelanggan` (`mp_id`, `mp_nama`, `mp_kategori`) VALUES
(1, 'Website Sunkrisps.id', 'Marketplace'),
(2, 'Tokopedia', 'Marketplace'),
(3, 'Shopee Indonesia', 'Marketplace'),
(4, 'Blibli', 'Marketplace'),
(5, 'PT Bintang Kirana Sejahtera', 'Distributor'),
(6, 'PT Gempita Pangan Indonesia', 'Distributor'),
(7, 'Tummy Tiff', 'Agen'),
(8, 'Novita Babyshop', 'Agen'),
(9, 'Buchi Kids', 'Reseller'),
(10, 'Curate', 'Reseller'),
(11, 'Toko Sami Laris', 'Reseller'),
(12, 'Remix Mom And Baby', 'Reseller'),
(13, 'Cilukba Super Store', 'Reseller'),
(14, 'Bebimart Babyshop', 'Reseller'),
(15, 'Holajev', 'Reseller'),
(16, 'Toko Laris', 'Reseller'),
(17, 'Babylexx', 'Reseller'),
(18, 'Hai Baby', 'Reseller'),
(19, 'Picco', 'Reseller'),
(20, 'Bambino Babyshop', 'Reseller'),
(21, 'Toko Susu Mom n Kids', 'Reseller'),
(22, 'Kidu Baby', 'Reseller'),
(23, 'Twinkle', 'Reseller'),
(24, 'Bayi Online Shop', 'Reseller'),
(25, 'Ini Dya Baby Food', 'Reseller'),
(26, 'PT sehati pratama', 'Reseller'),
(27, 'Jumbo Baby', 'Reseller'),
(28, 'Claretta Baby Food', 'Reseller'),
(29, 'Hello Baby Purworejo', 'Reseller'),
(30, 'Kedai Organik', 'Reseller'),
(31, 'Boone Babystore', 'Reseller'),
(32, 'Si Kecil', 'Reseller'),
(33, 'Jessica Baby Shop', 'Reseller'),
(34, 'Mery Novira', 'Reseller'),
(35, 'Happy Baby Shop Bogor', 'Reseller'),
(36, 'Kin Kin Bayi', 'Reseller'),
(37, 'CV Boga Karya Siliwangi', 'Reseller'),
(38, 'Toko Sami Moomart', 'Reseller'),
(39, 'Toko Susu Bila', 'Reseller'),
(40, 'Nyam.an', 'Reseller'),
(41, 'Cleo Baby Palu', 'Reseller'),
(42, 'Twinnies Baby Shop', 'Reseller'),
(43, 'Bebibelle', 'Reseller'),
(44, 'Danish Daily Shop', 'Reseller'),
(45, 'Super Top Pare', 'Reseller'),
(46, 'Ceria Babyshop', 'Reseller'),
(47, 'Fit & Frey', 'Reseller'),
(48, 'Mamarentpump', 'Reseller'),
(49, 'A2 Freshday', 'Reseller'),
(50, 'Baba ABC', 'Reseller'),
(51, 'Maxco Baby Shop', 'Reseller'),
(52, 'Chiko Baby Shop', 'Reseller'),
(53, 'Made Good Market', 'Reseller'),
(54, 'Toko Baby Murah', 'Reseller'),
(55, 'BEBE Story', 'Reseller'),
(56, 'Lidya Mom & Baby', 'Reseller'),
(57, 'Wulandari', 'Reseller'),
(58, 'Green Baby', 'Reseller'),
(59, 'Selly Dermawan', 'Reseller'),
(60, 'Aneka Kids', 'Reseller'),
(61, 'Clemen', 'Reseller'),
(62, 'Adik Bayi Babyshop', 'Reseller'),
(63, 'CV Panca Sinergi Sukses', 'Reseller'),
(64, 'Greensmothie Distributor', 'Reseller'),
(65, 'Lovely Ambon', 'Reseller'),
(66, 'Hompimpa babyshop', 'Reseller'),
(67, 'Papamama Baby Shop', 'Reseller'),
(68, 'SNL.FOOD', 'Reseller'),
(69, 'Toko Kotty', 'Reseller'),
(70, 'Kata Mama Baby Shop', 'Reseller'),
(71, 'CV Weleri', 'Reseller'),
(72, 'Susan Baby N Gold', 'Reseller'),
(73, 'Toko Star Utama', 'Reseller'),
(74, 'Juwita', 'Reseller'),
(75, 'PT Citra Mndiri Distribusindo', 'Reseller'),
(76, 'Nova', 'Reseller'),
(77, 'Sangir Talaud Printis', 'Reseller'),
(78, 'Sayur Box', 'Reseller'),
(79, 'Hello Baby Kds', 'Reseller'),
(80, 'Toko Dunia Ibu Dan Anak', 'Reseller'),
(81, 'Syafa Baby Shop', 'Reseller'),
(82, 'Ninik Harayu', 'Reseller'),
(83, 'Sari Organik', 'Reseller'),
(84, 'Miri Organic', 'Reseller'),
(85, 'Toko Baby (Aurora Baby Care)', 'Reseller'),
(86, 'Yellowfields', 'Reseller'),
(87, 'Luna Baby Shop', 'Reseller'),
(88, 'Sumber Segar', 'Reseller'),
(89, 'CV Panca Sinergi Sukses', 'Reseller'),
(90, 'Toko Hello Baby Palu', 'Reseller'),
(91, 'Tisya Nyamnyam', 'Reseller'),
(92, 'Liz & Co Babyshop', 'Reseller'),
(93, 'Mekar Sari Baby Shop', 'Reseller'),
(94, 'Tyang Ayu', 'Reseller'),
(95, 'Saking Buana', 'Reseller'),
(96, 'Ade Mungil', 'Reseller'),
(97, 'Yolla (Nananina Babyshop)', 'Reseller'),
(98, 'Baby Town', 'Reseller'),
(99, 'Naturemart', 'Reseller'),
(100, 'Maya Safitri', 'Reseller'),
(101, 'Ayu Pusparini', 'Reseller'),
(102, 'Doremi Babyshop', 'Reseller'),
(103, 'Anindhita', 'Reseller'),
(104, 'Mba Tania', 'Reseller'),
(105, 'Storeganic', 'Reseller'),
(106, 'Bisa Connect Global', 'Reseller'),
(107, 'Nachuraru Store', 'Reseller'),
(108, 'Toko Buah Ranum', 'Reseller'),
(109, 'Kiki Dian', 'Reseller'),
(110, 'Wiwaro Babyshop', 'Reseller'),
(111, 'Feimi', 'Reseller'),
(112, 'Sekolah Alam', 'Reseller'),
(113, 'Nika Perwitasari', 'Reseller'),
(114, 'Ninda Arlita Sari', 'Reseller'),
(115, 'Hello Bebe', 'Reseller'),
(116, 'Wijaya Baby Pusat', 'Reseller'),
(117, 'Bebinutri', 'Reseller'),
(118, 'Combed Store', 'Reseller'),
(119, 'Babypapaya', 'Reseller');

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `ms_id` int(11) NOT NULL,
  `ms_kode` varchar(255) NOT NULL,
  `ms_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`ms_id`, `ms_kode`, `ms_nama`) VALUES
(1, '04', 'PT Dwijaya Grafika Mandiri'),
(2, '06', 'PT Golden Packindo Nusantara');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1662430854, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_packing`
--

CREATE TABLE `temp_packing` (
  `tpacking_id` int(255) NOT NULL,
  `tpacking_kodedus` varchar(255) NOT NULL,
  `tpacking_produkname` varchar(255) NOT NULL,
  `tpacking_batch` varchar(255) NOT NULL,
  `tpacking_tipebox` varchar(255) NOT NULL,
  `tpacking_qty` int(255) NOT NULL,
  `tpacking_pic` varchar(255) NOT NULL,
  `tpacking_datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `role`, `fullname`) VALUES
(1, 'rnd@suryasara.com', 'rnd', '$2y$10$w8zGuqHoOuL36YRqbBO2rODtetsJr8sluxbpWW7C2ee9EYMOHWzQy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, 'supervisor ', 'Research And Developer'),
(2, 'fauzan@suryasarana.com', 'qcnama', '$2y$10$nf3YpGyoBQw6w.iZikIL8OuithHiSK2Sh8StoMljlWBnrqAG3rzGC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-26 10:17:36', '2022-10-26 10:17:36', NULL, '', ''),
(3, 'rnd.ssdautomation@ssdautomation.com', 'production nama', '$2y$10$5yAMd73lJJcHDv4ZiVR9MeSEEglb91JE5ZSJJ2iAxu.Hp9BGkmtxS', NULL, NULL, NULL, '6b5bf3446c16d21404663431ba04800e', NULL, NULL, 1, 0, '2022-10-26 10:20:35', '2022-10-26 10:20:35', NULL, '', ''),
(4, 'rnd.ssdautomation@gmail.com', 'warehouse nama', '$2y$10$24XRhwmgVnZ2eFi6syGJNeOk47ValmZsI0IDTpEx6BP3hI/sXpw0.', NULL, NULL, NULL, '7ef653def17d4a1ce159e3758e7f4cf9', NULL, NULL, 1, 0, '2022-10-26 10:26:17', '2022-10-26 10:26:17', NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `data_holding_temp`
--
ALTER TABLE `data_holding_temp`
  ADD PRIMARY KEY (`H_No`);

--
-- Indexes for table `data_packing`
--
ALTER TABLE `data_packing`
  ADD PRIMARY KEY (`K_No`);

--
-- Indexes for table `data_packing_holding`
--
ALTER TABLE `data_packing_holding`
  ADD PRIMARY KEY (`P2_No`);

--
-- Indexes for table `data_packing_temp`
--
ALTER TABLE `data_packing_temp`
  ADD PRIMARY KEY (`K_No`);

--
-- Indexes for table `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `data_produksi_panel`
--
ALTER TABLE `data_produksi_panel`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `data_produksi_repair`
--
ALTER TABLE `data_produksi_repair`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `data_produksi_repair_temp`
--
ALTER TABLE `data_produksi_repair_temp`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `data_produksi_temp`
--
ALTER TABLE `data_produksi_temp`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `data_qc_holding`
--
ALTER TABLE `data_qc_holding`
  ADD PRIMARY KEY (`Q2_No`);

--
-- Indexes for table `data_qc_packing`
--
ALTER TABLE `data_qc_packing`
  ADD PRIMARY KEY (`Q3_No`);

--
-- Indexes for table `data_qc_produksi`
--
ALTER TABLE `data_qc_produksi`
  ADD PRIMARY KEY (`Q1_No`);

--
-- Indexes for table `data_qc_repair`
--
ALTER TABLE `data_qc_repair`
  ADD PRIMARY KEY (`Q1T_No`);

--
-- Indexes for table `data_rejectholding`
--
ALTER TABLE `data_rejectholding`
  ADD PRIMARY KEY (`RJT_No`);

--
-- Indexes for table `data_repair_panel`
--
ALTER TABLE `data_repair_panel`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `data_repair_temp`
--
ALTER TABLE `data_repair_temp`
  ADD PRIMARY KEY (`RPR_No`);

--
-- Indexes for table `final_destroy`
--
ALTER TABLE `final_destroy`
  ADD PRIMARY KEY (`D_No`);

--
-- Indexes for table `final_detail_shippingbox`
--
ALTER TABLE `final_detail_shippingbox`
  ADD PRIMARY KEY (`FSHP_No`);

--
-- Indexes for table `final_discmp`
--
ALTER TABLE `final_discmp`
  ADD PRIMARY KEY (`DMP_No`);

--
-- Indexes for table `final_marketplace`
--
ALTER TABLE `final_marketplace`
  ADD PRIMARY KEY (`M_No`);

--
-- Indexes for table `final_release`
--
ALTER TABLE `final_release`
  ADD PRIMARY KEY (`R_No`);

--
-- Indexes for table `final_retain`
--
ALTER TABLE `final_retain`
  ADD PRIMARY KEY (`RTN_No`);

--
-- Indexes for table `final_shipping`
--
ALTER TABLE `final_shipping`
  ADD PRIMARY KEY (`SHP_No`);

--
-- Indexes for table `final_shipping_dus`
--
ALTER TABLE `final_shipping_dus`
  ADD PRIMARY KEY (`SHP_No`);

--
-- Indexes for table `final_sunsan`
--
ALTER TABLE `final_sunsan`
  ADD PRIMARY KEY (`S_No`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`mbr_id`);

--
-- Indexes for table `master_box`
--
ALTER TABLE `master_box`
  ADD PRIMARY KEY (`mb_id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `master_ekspedisi`
--
ALTER TABLE `master_ekspedisi`
  ADD PRIMARY KEY (`me_id`);

--
-- Indexes for table `master_kontainer`
--
ALTER TABLE `master_kontainer`
  ADD PRIMARY KEY (`mk_id`);

--
-- Indexes for table `master_pelanggan`
--
ALTER TABLE `master_pelanggan`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_packing`
--
ALTER TABLE `temp_packing`
  ADD PRIMARY KEY (`tpacking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_holding_temp`
--
ALTER TABLE `data_holding_temp`
  MODIFY `H_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_packing`
--
ALTER TABLE `data_packing`
  MODIFY `K_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_packing_holding`
--
ALTER TABLE `data_packing_holding`
  MODIFY `P2_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_packing_temp`
--
ALTER TABLE `data_packing_temp`
  MODIFY `K_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_produksi`
--
ALTER TABLE `data_produksi`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_produksi_panel`
--
ALTER TABLE `data_produksi_panel`
  MODIFY `P_No` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_produksi_repair`
--
ALTER TABLE `data_produksi_repair`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_produksi_repair_temp`
--
ALTER TABLE `data_produksi_repair_temp`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_produksi_temp`
--
ALTER TABLE `data_produksi_temp`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_qc_holding`
--
ALTER TABLE `data_qc_holding`
  MODIFY `Q2_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_qc_packing`
--
ALTER TABLE `data_qc_packing`
  MODIFY `Q3_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_qc_produksi`
--
ALTER TABLE `data_qc_produksi`
  MODIFY `Q1_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_qc_repair`
--
ALTER TABLE `data_qc_repair`
  MODIFY `Q1T_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rejectholding`
--
ALTER TABLE `data_rejectholding`
  MODIFY `RJT_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_repair_panel`
--
ALTER TABLE `data_repair_panel`
  MODIFY `P_No` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_repair_temp`
--
ALTER TABLE `data_repair_temp`
  MODIFY `RPR_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_destroy`
--
ALTER TABLE `final_destroy`
  MODIFY `D_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_detail_shippingbox`
--
ALTER TABLE `final_detail_shippingbox`
  MODIFY `FSHP_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_discmp`
--
ALTER TABLE `final_discmp`
  MODIFY `DMP_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_marketplace`
--
ALTER TABLE `final_marketplace`
  MODIFY `M_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_release`
--
ALTER TABLE `final_release`
  MODIFY `R_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_retain`
--
ALTER TABLE `final_retain`
  MODIFY `RTN_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_shipping`
--
ALTER TABLE `final_shipping`
  MODIFY `SHP_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_shipping_dus`
--
ALTER TABLE `final_shipping_dus`
  MODIFY `SHP_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_sunsan`
--
ALTER TABLE `final_sunsan`
  MODIFY `S_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `mbr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master_box`
--
ALTER TABLE `master_box`
  MODIFY `mb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_ekspedisi`
--
ALTER TABLE `master_ekspedisi`
  MODIFY `me_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `master_kontainer`
--
ALTER TABLE `master_kontainer`
  MODIFY `mk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `master_pelanggan`
--
ALTER TABLE `master_pelanggan`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_packing`
--
ALTER TABLE `temp_packing`
  MODIFY `tpacking_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
