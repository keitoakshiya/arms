-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 08:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `patient_id` int(11) NOT NULL,
  `guarantor_id` int(11) NOT NULL,
  `patient_type` int(11) NOT NULL,
  `hospital_bill` float(10,2) NOT NULL DEFAULT 0.00,
  `professional_bill` decimal(10,2) NOT NULL DEFAULT 0.00,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `patient_id`, `guarantor_id`, `patient_type`, `hospital_bill`, `professional_bill`, `deleted`) VALUES
(24, '2020-08-24', 41, 18, 1, 2000.00, '2000.00', 0),
(25, '2020-08-24', 42, 15, 1, 1000.00, '2000.00', 1),
(29, '2020-08-24', 46, 15, 2, 8000.00, '5000.00', 2),
(30, '2020-08-24', 47, 24, 1, 4000.00, '4000.00', 0),
(31, '2020-08-24', 48, 21, 1, 5000.00, '5000.00', 0),
(32, '2020-08-24', 49, 17, 1, 5000.00, '5000.00', 0),
(34, '2020-08-24', 51, 10, 2, 3000.00, '2000.00', 0),
(35, '2020-08-24', 52, 9, 1, 2000.00, '2000.00', 0),
(36, '2020-08-24', 53, 9, 1, 10000.00, '5000.00', 0),
(53, '2020-09-21', 71, 25, 1, 2000.00, '1000.00', 0),
(54, '2020-09-22', 72, 25, 2, 3000.00, '3000.00', 0),
(55, '2020-10-01', 73, 21, 1, 3000.00, '3000.00', 0),
(56, '2020-10-05', 74, 25, 1, 5000.00, '5000.00', 0),
(57, '2020-10-09', 75, 9, 2, 6000.00, '6000.00', 0),
(58, '2020-10-10', 76, 9, 3, 2000.00, '3000.00', 0),
(60, '2021-03-08', 78, 25, 3, 4000.00, '5000.00', 0),
(62, '2021-04-08', 80, 9, 1, 6000.00, '6000.00', 0),
(63, '2021-04-10', 82, 25, 3, 2200.00, '2200.00', 0),
(66, '2021-05-11', 85, 9, 2, 5000.00, '5000.00', 0),
(73, '2021-05-23', 92, 9, 1, 1000.00, '1000.00', 0),
(74, '2021-05-23', 93, 27, 1, 1300.00, '1300.00', 0),
(75, '2021-05-24', 94, 27, 1, 1600.00, '1600.00', 0),
(76, '2021-05-23', 95, 27, 1, 1900.00, '1900.00', 0),
(77, '2021-05-23', 96, 27, 2, 1100.00, '1100.00', 0),
(78, '2021-05-24', 97, 27, 1, 1000.00, '1000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

CREATE TABLE `guarantor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `address` varchar(60) NOT NULL,
  `contact_person` varchar(40) NOT NULL,
  `contact_number` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guarantor`
--

INSERT INTO `guarantor` (`id`, `name`, `type`, `deleted`, `address`, `contact_person`, `contact_number`) VALUES
(9, 'AMAPHIL', 1, 0, 'Unit 501, Aralco Building, 820 J.P Rizal', 'Jane Smith', 1234567),
(10, 'EAST WEST', 1, 0, 'Imus, Cavite', 'Anne Flores', 123456),
(13, 'HEALTHBRIDGE', 1, 0, 'A&N Building, 9694 Kamagong St, Cor Saint Paul Road, Makati', 'Tony Herez', 2345678),
(14, 'AVEGA MANAGED CARE INC', 1, 0, '1286 Sen. Gil J. Puyat Ave', 'Jakson Mike', 3456789),
(15, 'CAREWELL, INC', 1, 0, '#92 Anonas, cor K-6th, St, Quezon City', 'Sammy Doe', 98765432),
(16, 'AIM ONE', 3, 0, 'Unit 201, Executive Suites, 153 Doña Sol', 'John Smith', 98745630),
(17, 'AXA LIFE', 2, 0, 'Muntinlupa, Metro Manila', 'JJ Doe', 8745215),
(18, 'ANCHOR BANK', 2, 0, 'Makati, Metro Manila', 'JJ Smith', 8975641),
(19, 'AA INTERNATIONAL', 2, 0, 'Manila, Metro Manila', 'Janet Smike', 32564781),
(20, 'CUNNINGHAM LINDSEY PHILS INC', 2, 0, 'Manila, Metro Manila', 'Anne Shunshine', 8974130),
(21, 'DSWD', 3, 0, 'Muntinlupa, Metro Manila', 'Emil Flores', 46785120),
(22, 'PHILHEALTH', 3, 0, 'Dasmariñas, Cavite', 'Gil Stol', 9254875),
(23, 'EMPLOYEE\'S COMPENSATION  COMMISSION', 3, 0, '355 Sen. Gil J. Puyat Ave, Makati', 'Emil Snik', 6398541),
(24, 'PCSO', 3, 0, 'Imus, Cavite', 'Ken Perez', 6356821),
(25, 'Test', 1, 0, 'Sample Address', 'John Doe', 123132112),
(26, 'PHILCARE', 2, 0, 'Metro Manila', 'Emil Florer', 46785121),
(27, 'MEDICARD', 1, 0, 'Metro Manila', 'Emil Florer', 46785121);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `registry_no` int(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `suffix` varchar(3) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL DEFAULT 0,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `registry_no`, `first_name`, `last_name`, `middle_name`, `suffix`, `date_created`, `deleted`, `date_deleted`) VALUES
(41, 20200204, 'Alissa', 'Chet', 'M', '', '2020-08-24 03:46:16', 1, '2020-09-08 05:01:07'),
(42, 20200220, 'Angelo', 'Lumen', 'P', '', '2020-08-24 03:46:38', 1, '2021-03-07 13:58:45'),
(46, 20200526, 'Jeffrey', 'Macab', 'A', '', '2020-08-24 03:48:26', 2, '2021-03-07 14:10:20'),
(47, 20201212, 'Arianna', 'Torri', 'I', '', '2020-08-24 03:48:50', 0, '2020-08-24 05:08:53'),
(48, 20200504, 'Katherine', 'Wayne', 'L', '', '2020-08-24 03:49:20', 0, '2020-10-02 13:35:57'),
(49, 20200316, 'Angel', 'Furiscal', 'B', '', '2020-08-24 03:49:33', 0, NULL),
(51, 20200906, 'Bradly', 'Mondo', 'I', '', '2020-08-24 03:50:21', 0, NULL),
(52, 20210108, 'Finn', 'Stein', 'G', '', '2020-08-24 03:50:52', 0, NULL),
(53, 20210202, 'Alex', 'Reyes', 'M', '', '2020-08-24 05:12:24', 0, NULL),
(71, 20200810, 'Ace', 'Elly', 'J', '', '2020-09-20 16:00:00', 0, NULL),
(72, 20200816, 'Hammy', 'Lotty', 'S', '', '2020-09-21 16:00:00', 0, NULL),
(73, 20200816, 'Josh', 'Estrada', 'D', '', '2020-09-30 16:00:00', 0, NULL),
(74, 20200310, 'Nam', 'Era', 'S', 'Jr', '2020-10-04 16:00:00', 0, '2021-03-14 11:15:13'),
(75, 20200524, 'Hayley', 'Yams', 'W', '', '2020-10-08 16:00:00', 0, NULL),
(76, 20210112, 'Angel', 'Cailan', 'M', '', '2020-10-09 16:00:00', 0, NULL),
(78, 20210412, 'This', 'This', 'T', '', '2021-03-07 16:00:00', 0, '2021-03-14 11:17:56'),
(80, 20210504, 'Abril', 'Smith', '', '', '2021-04-07 16:00:00', 0, NULL),
(82, 20210404, 'Fivee', 'Twentyon', 'Ninee', 'Sr', '2021-04-09 16:00:00', 0, NULL),
(85, 20210512, 'Mark', 'Nneji', 'Urbiztondo', 'Jr', '2021-05-10 16:00:00', 0, NULL),
(92, 47483647, 'Ed', 'Joseph', '', 'Jr', '2021-05-22 16:00:00', 0, NULL),
(93, 34567833, 'Anny', 'Fu', 'Lee', 'Sr', '2021-05-22 16:00:00', 0, NULL),
(94, 1234567819, 'Franky', 'Lemms', '', 'Sr', '2021-05-23 16:00:00', 0, NULL),
(95, 1234567812, 'Henry', 'Gee', '', 'Jr', '2021-05-22 16:00:00', 0, NULL),
(96, 34567831, 'Shane', 'Cruz', '', '', '2021-05-22 16:00:00', 0, NULL),
(97, 12345678, 'Matt', 'Lewis', '', '', '2021-05-23 16:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) UNSIGNED NOT NULL,
  `company` int(11) NOT NULL,
  `or_date` date NOT NULL,
  `or_number` varchar(11) NOT NULL,
  `or_amount` decimal(10,2) NOT NULL,
  `is_void` int(2) NOT NULL DEFAULT 0,
  `distributed` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `company`, `or_date`, `or_number`, `or_amount`, `is_void`, `distributed`, `deleted`) VALUES
(15, 20, '2020-08-07', '20070034', '6000.00', 0, 0, 0),
(16, 20, '2020-08-10', '20030651', '3000.00', 0, 0, 0),
(17, 9, '2020-08-10', '20030904', '2000.00', 0, 1, 0),
(18, 25, '2020-08-13', '20074568', '1000.00', 0, 1, 0),
(19, 23, '2020-08-18', '20080904', '1000.00', 0, 0, 0),
(20, 9, '2020-08-24', '20050456', '2000.00', 0, 0, 0),
(21, 22, '2020-08-24', '20040281', '10000.00', 0, 0, 0),
(22, 9, '2020-09-08', '20100569', '8000.00', 0, 0, 0),
(24, 25, '2020-09-27', '20200906', '3000.00', 0, 1, 0),
(25, 21, '2020-10-01', '20190405', '3000.00', 0, 0, 0),
(26, 14, '2020-10-08', '20201009', '2000.00', 0, 0, 0),
(27, 25, '2020-10-06', '20200611', '3000.00', 0, 1, 0),
(28, 9, '2020-10-10', '20201010', '2000.00', 0, 1, 0),
(29, 25, '2020-10-17', '20201017', '4000.00', 0, 0, 0),
(30, 9, '2020-11-07', '20201107', '2000.00', 0, 0, 0),
(32, 9, '2020-11-07', '20201106', '3000.00', 0, 0, 0),
(33, 25, '2021-03-08', '20210308', '5000.00', 0, 0, 0),
(34, 13, '2021-04-08', '20210804', '3000.00', 0, 0, 0),
(35, 9, '2021-05-11', '20210511', '10000.00', 0, 0, 0),
(36, 27, '2021-05-24', '20210512', '4400.00', 0, 0, 0),
(37, 27, '2021-05-23', '30210511', '2000.00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `hospital_bill_payment` float(10,2) NOT NULL DEFAULT 0.00,
  `professional_bill_payment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `or_amount` float(10,2) NOT NULL DEFAULT 0.00,
  `or_number` int(25) NOT NULL,
  `or_date` datetime NOT NULL DEFAULT current_timestamp(),
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `patient_id`, `bill_id`, `receipt_id`, `hospital_bill_payment`, `professional_bill_payment`, `or_amount`, `or_number`, `or_date`, `date_created`, `deleted`) VALUES
(20, 47, 30, 0, 2000.00, '1500.00', 0.00, 0, '2020-08-26 12:17:41', '2020-08-24 12:17:41', 0),
(21, 46, 29, 0, 3000.00, '5000.00', 0.00, 0, '2020-08-24 12:21:49', '2020-08-24 12:21:49', 2),
(22, 51, 34, 0, 1000.00, '2000.00', 0.00, 0, '2020-08-24 12:22:09', '2020-08-24 12:22:09', 0),
(23, 48, 31, 0, 2000.00, '2500.00', 0.00, 0, '2020-08-24 12:22:26', '2020-08-24 12:22:26', 0),
(24, 49, 32, 0, 3000.00, '3000.00', 0.00, 0, '2020-08-24 12:22:40', '2020-08-24 12:22:40', 0),
(25, 41, 32, 0, 1000.00, '500.00', 0.00, 0, '2020-08-24 12:22:56', '2020-08-24 12:22:56', 0),
(28, 42, 25, 0, 500.00, '500.00', 0.00, 0, '2020-09-07 22:23:01', '2020-09-07 22:23:01', 1),
(29, 42, 25, 0, 500.00, '500.00', 0.00, 0, '2020-09-07 22:24:30', '2020-09-07 22:24:30', 1),
(43, 52, 35, 23, 1000.00, '1000.00', 0.00, 0, '2020-09-20 20:38:15', '2020-09-20 20:38:15', 0),
(44, 53, 36, 23, 1000.00, '1000.00', 0.00, 0, '2020-09-20 20:39:13', '2020-09-20 20:39:13', 0),
(45, 53, 36, 23, 1000.00, '1000.00', 0.00, 0, '2020-09-27 22:35:22', '2020-09-27 22:35:22', 0),
(47, 74, 56, 24, 1000.00, '1000.00', 0.00, 0, '2020-10-06 23:40:59', '2020-10-06 23:40:59', 0),
(48, 71, 53, 24, 500.00, '500.00', 0.00, 0, '2020-10-08 23:41:08', '2020-10-08 23:41:08', 0),
(49, 75, 57, 17, 1000.00, '1000.00', 0.00, 0, '2020-10-09 17:30:13', '2020-10-09 17:30:13', 0),
(53, 72, 54, 27, 1500.00, '1500.00', 0.00, 0, '2020-10-09 19:39:12', '2020-10-09 19:39:12', 0),
(54, 76, 58, 28, 1000.00, '1000.00', 0.00, 0, '2020-10-10 15:40:28', '2020-10-10 15:40:28', 0),
(67, 53, 36, 20, 500.00, '500.00', 0.00, 0, '2020-11-07 22:52:54', '2020-11-07 22:52:54', 0),
(68, 76, 58, 20, 500.00, '500.00', 0.00, 0, '2020-11-07 22:53:10', '2020-11-07 22:53:10', 0),
(73, 78, 60, 29, 1100.00, '300.00', 0.00, 2, '2021-03-08 15:25:09', '2021-03-08 15:25:09', 0),
(74, 78, 60, 29, 1400.00, '1200.00', 0.00, 2, '2021-03-08 16:03:17', '2021-03-08 16:03:17', 0),
(78, 80, 62, 32, 1500.00, '1500.00', 0.00, 0, '2021-04-08 14:33:21', '2021-04-08 14:33:21', 0),
(79, 80, 62, 30, 1000.00, '1000.00', 0.00, 0, '2021-04-09 13:44:14', '2021-04-09 13:44:14', 0),
(83, 85, 66, 35, 3000.00, '3000.00', 0.00, 0, '2021-05-11 13:35:48', '2021-05-11 13:35:48', 0),
(94, 76, 58, 35, 100.00, '100.00', 0.00, 0, '2021-05-15 23:24:42', '2021-05-15 23:24:42', 0),
(95, 76, 58, 35, 100.00, '100.00', 0.00, 0, '2021-05-15 23:44:16', '2021-05-15 23:44:16', 0),
(96, 96, 77, 37, 1000.00, '1000.00', 0.00, 0, '2021-05-23 23:36:00', '2021-05-23 23:36:00', 0),
(98, 95, 76, 36, 300.00, '300.00', 0.00, 0, '2021-05-24 02:15:46', '2021-05-24 02:15:46', 0),
(99, 94, 75, 36, 500.00, '500.00', 0.00, 0, '2021-05-24 02:16:36', '2021-05-24 02:16:36', 0),
(100, 93, 74, 36, 200.00, '200.00', 0.00, 0, '2021-05-24 02:20:19', '2021-05-24 02:20:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `view_data` tinyint(1) NOT NULL,
  `add_data` tinyint(1) NOT NULL,
  `edit_data` tinyint(1) NOT NULL,
  `delete_data` tinyint(1) NOT NULL,
  `view_dashboard` tinyint(1) NOT NULL DEFAULT 1,
  `add_patient` tinyint(1) NOT NULL DEFAULT 1,
  `view_patients` tinyint(1) NOT NULL DEFAULT 1,
  `edit_patients` tinyint(1) NOT NULL DEFAULT 1,
  `delete_patients` tinyint(1) NOT NULL DEFAULT 1,
  `view_accounts_receivable` tinyint(1) NOT NULL DEFAULT 1,
  `view_accounts_receivable2` tinyint(1) NOT NULL DEFAULT 1,
  `view_payment_summary` tinyint(1) NOT NULL DEFAULT 1,
  `view_payment_summary2` tinyint(1) NOT NULL DEFAULT 1,
  `view_remaining_balance` tinyint(1) NOT NULL DEFAULT 1,
  `view_remaining_balance2` tinyint(1) NOT NULL DEFAULT 1,
  `add_official_receipt` tinyint(1) NOT NULL DEFAULT 1,
  `view_official_receipt_list2` tinyint(1) NOT NULL DEFAULT 1,
  `delete_official_receipt` tinyint(1) NOT NULL DEFAULT 1,
  `view_company_list_official_receipt_list` tinyint(1) NOT NULL DEFAULT 1,
  `add_patient_to_receipt` tinyint(1) NOT NULL DEFAULT 1,
  `add_view_bill_by_patient` tinyint(1) NOT NULL DEFAULT 1,
  `view_list_company` tinyint(1) NOT NULL DEFAULT 1,
  `add_company` tinyint(1) NOT NULL DEFAULT 1,
  `view_archive` tinyint(1) NOT NULL DEFAULT 1,
  `delete_archive` tinyint(1) NOT NULL DEFAULT 1,
  `restore_archive` tinyint(1) NOT NULL DEFAULT 1,
  `add_account` tinyint(1) NOT NULL DEFAULT 1,
  `edit_roles` tinyint(1) NOT NULL DEFAULT 1,
  `delete_or` tinyint(1) NOT NULL DEFAULT 1,
  `permanently_delete` tinyint(1) NOT NULL DEFAULT 1,
  `view_payment_history` tinyint(1) NOT NULL DEFAULT 1,
  `edit_company` tinyint(1) NOT NULL DEFAULT 1,
  `view_or_list` tinyint(1) NOT NULL DEFAULT 1,
  `view_or_list_patient` tinyint(1) NOT NULL DEFAULT 1,
  `edit_official_receipt` tinyint(1) NOT NULL DEFAULT 1,
  `void_official_receipt` tinyint(1) NOT NULL DEFAULT 1,
  `unvoid_official_receipt` tinyint(1) NOT NULL DEFAULT 1,
  `permavoid_official_receipt` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `view_data`, `add_data`, `edit_data`, `delete_data`, `view_dashboard`, `add_patient`, `view_patients`, `edit_patients`, `delete_patients`, `view_accounts_receivable`, `view_accounts_receivable2`, `view_payment_summary`, `view_payment_summary2`, `view_remaining_balance`, `view_remaining_balance2`, `add_official_receipt`, `view_official_receipt_list2`, `delete_official_receipt`, `view_company_list_official_receipt_list`, `add_patient_to_receipt`, `add_view_bill_by_patient`, `view_list_company`, `add_company`, `view_archive`, `delete_archive`, `restore_archive`, `add_account`, `edit_roles`, `delete_or`, `permanently_delete`, `view_payment_history`, `edit_company`, `view_or_list`, `view_or_list_patient`, `edit_official_receipt`, `void_official_receipt`, `unvoid_official_receipt`, `permavoid_official_receipt`) VALUES
(1, 'admin', 'admin', 'sample@sample.com', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'user_1', 'user_1', 'sample@user1.com', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'mis_acc', 'Mis@sample0', 'mis@sample1.com', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(9, 'user8', 'user8', 'sample@sample8.com', 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `guarantor_id` (`guarantor_id`);

--
-- Indexes for table `guarantor`
--
ALTER TABLE `guarantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
