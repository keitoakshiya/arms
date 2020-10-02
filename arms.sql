-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 10:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `patient_id`, `guarantor_id`, `patient_type`, `hospital_bill`, `professional_bill`, `deleted`) VALUES
(24, '2020-08-24', 41, 18, 1, 2000.00, '2000.00', 0),
(25, '2020-08-24', 42, 15, 1, 1000.00, '2000.00', 0),
(29, '2020-08-24', 46, 15, 2, 8000.00, '5000.00', 0),
(30, '2020-08-24', 47, 24, 1, 4000.00, '4000.00', 0),
(31, '2020-08-24', 48, 21, 1, 5000.00, '5000.00', 0),
(32, '2020-08-24', 49, 17, 1, 5000.00, '5000.00', 0),
(34, '2020-08-24', 51, 10, 2, 3000.00, '2000.00', 0),
(35, '2020-08-24', 52, 9, 1, 2000.00, '2000.00', 0),
(36, '2020-08-24', 53, 9, 1, 10000.00, '5000.00', 0),
(53, '2020-09-21', 71, 25, 1, 2000.00, '1000.00', 0),
(54, '2020-09-22', 72, 25, 2, 3000.00, '3000.00', 0),
(55, '2020-10-01', 73, 21, 1, 3000.00, '3000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

CREATE TABLE `guarantor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(40) NOT NULL,
  `contact_person` varchar(40) NOT NULL,
  `contact_number` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guarantor`
--

INSERT INTO `guarantor` (`id`, `name`, `type`, `deleted`, `address`, `contact_person`, `contact_number`) VALUES
(9, 'AMAPHIL', 1, 0, '', '', 0),
(10, 'EAST WEST', 1, 0, '', '', 0),
(13, 'HEALTHBRIDGE', 1, 0, '', '', 0),
(14, 'AVEGA MANAGED CARE INC', 1, 0, '', '', 0),
(15, 'CAREWELL, INC', 1, 0, '', '', 0),
(16, 'AIM ONE', 2, 0, '', '', 0),
(17, 'AXA LIFE', 2, 0, '', '', 0),
(18, 'ANCHOR BANK', 2, 0, '', '', 0),
(19, 'AA INTERNATIONAL', 2, 0, '', '', 0),
(20, 'CUNNINGHAM LINDSEY PHILS INC', 2, 0, '', '', 0),
(21, 'DSWD', 3, 0, '', '', 0),
(22, 'PHILHEALTH', 3, 0, '', '', 0),
(23, 'EMPLOYEE\'S COMPENSATION  COMMISSION', 3, 0, '', '', 0),
(24, 'PCSO', 3, 0, '', '', 0),
(25, 'Test', 1, 0, 'Sample Address', 'John Doe', 1231321);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `first_name`, `last_name`, `middle_name`, `date_created`, `deleted`, `date_deleted`) VALUES
(41, 'Alissa', 'Chet', 'M', '2020-08-24 03:46:16', 1, '2020-09-08 05:01:07'),
(42, 'Angelo', 'Reyes', 'L', '2020-08-24 03:46:38', 0, '2020-10-02 06:42:15'),
(46, 'Jeffrey', 'Macab', 'A', '2020-08-24 03:48:26', 0, NULL),
(47, 'Arianna', 'Torri', 'H', '2020-08-24 03:48:50', 0, '2020-08-24 05:08:53'),
(48, 'Katherine', 'Wayne', 'O', '2020-08-24 03:49:20', 0, NULL),
(49, 'Angel', 'Furiscal', 'B', '2020-08-24 03:49:33', 0, NULL),
(51, 'Bradly', 'Mondo', 'I', '2020-08-24 03:50:21', 0, NULL),
(52, 'Finn', 'Stein', 'G', '2020-08-24 03:50:52', 0, NULL),
(53, 'Alex', 'Reyes', 'M', '2020-08-24 05:12:24', 0, NULL),
(71, 'Ace', 'Elly', 'J', '2020-09-20 16:00:00', 0, NULL),
(72, 'Hammy', 'Lotty', 'S', '2020-09-21 16:00:00', 0, NULL),
(73, 'Josh', 'Estrada', 'A', '2020-09-30 16:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) UNSIGNED NOT NULL,
  `company` int(11) NOT NULL,
  `or_date` date NOT NULL,
  `or_number` varchar(11) NOT NULL,
  `or_amount` decimal(10,0) NOT NULL,
  `distributed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `company`, `or_date`, `or_number`, `or_amount`, `distributed`) VALUES
(1, 1, '0000-00-00', '20150493', '8', 0),
(2, 7, '0000-00-00', '20130565', '6', 0),
(3, 6, '0000-00-00', '20160674', '2', 0),
(4, 5, '0000-00-00', '20110453', '3', 0),
(5, 7, '0000-00-00', '20170523', '99000', 0),
(6, 1, '0000-00-00', '20180456', '23', 0),
(7, 1, '0000-00-00', '20150489', '5645', 0),
(8, 5, '0000-00-00', '20150349', '456', 0),
(9, 5, '0000-00-00', '20150320', '234', 0),
(10, 2, '0000-00-00', '20094562', '234234', 0),
(11, 2, '0000-00-00', '20120189', '0', 0),
(12, 2, '0000-00-00', '20190428', '0', 0),
(13, 2, '0000-00-00', '20200021', '0', 0),
(14, 2, '2020-07-08', '20160987', '0', 0),
(15, 4, '2020-08-07', '20070034', '324', 0),
(16, 4, '2020-08-10', '20030651', '2311', 0),
(17, 4, '2020-08-10', '20030904', '3244', 0),
(18, 4, '2020-08-13', '20074568', '2134', 0),
(19, 4, '2020-08-18', '20080904', '10000', 0),
(20, 9, '2020-08-24', '20050456', '123', 0),
(21, 10, '2020-08-24', '20040081', '10000', 0),
(22, 9, '2020-09-08', '20100569', '2000', 0),
(23, 9, '2020-09-20', '94056', '4000', 0),
(24, 25, '2020-09-27', '12', '3000', 0),
(25, 21, '2020-10-01', '2020', '3000', 1);

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
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `patient_id`, `bill_id`, `receipt_id`, `hospital_bill_payment`, `professional_bill_payment`, `or_amount`, `or_number`, `or_date`, `date_created`, `deleted`) VALUES
(20, 47, 30, 0, 2000.00, '1500.00', 0.00, 0, '2020-08-24 12:17:41', '2020-08-24 12:17:41', 0),
(21, 46, 29, 0, 3000.00, '5000.00', 0.00, 0, '2020-08-24 12:21:49', '2020-08-24 12:21:49', 0),
(22, 51, 34, 0, 1000.00, '2000.00', 0.00, 0, '2020-08-24 12:22:09', '2020-08-24 12:22:09', 0),
(23, 48, 31, 0, 2000.00, '2500.00', 0.00, 0, '2020-08-24 12:22:26', '2020-08-24 12:22:26', 0),
(24, 49, 32, 0, 3000.00, '3000.00', 0.00, 0, '2020-08-24 12:22:40', '2020-08-24 12:22:40', 0),
(25, 41, 32, 0, 1000.00, '500.00', 0.00, 0, '2020-08-24 12:22:56', '2020-08-24 12:22:56', 0),
(28, 42, 25, 0, 500.00, '500.00', 0.00, 0, '2020-09-07 22:23:01', '2020-09-07 22:23:01', 0),
(29, 42, 25, 0, 500.00, '500.00', 0.00, 0, '2020-09-07 22:24:30', '2020-09-07 22:24:30', 0),
(43, 52, 35, 23, 1000.00, '1000.00', 0.00, 0, '2020-09-20 20:38:15', '2020-09-20 20:38:15', 0),
(44, 53, 36, 23, 1000.00, '1000.00', 0.00, 0, '2020-09-20 20:39:13', '2020-09-20 20:39:13', 0),
(45, 53, 36, 23, 1000.00, '1000.00', 0.00, 0, '2020-09-27 22:35:22', '2020-09-27 22:35:22', 0),
(46, 73, 55, 25, 1500.00, '1500.00', 0.00, 0, '2020-10-02 14:25:12', '2020-10-02 14:25:12', 0);

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
  `delete_data` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `view_data`, `add_data`, `edit_data`, `delete_data`) VALUES
(1, 'admin', 'admin', 'sample@sample.com', 1, 1, 1, 1),
(2, 'user1', 'user1', '', 1, 1, 1, 1),
(3, 'user2', 'user2', '', 1, 1, 1, 1),
(4, 'user5', 'user5', 'sample@sample5.com', 1, 1, 1, 0),
(5, 'user6', 'user6', 'sample6@sample.com', 0, 0, 0, 0),
(6, 'user7', 'user7', 'sample7@sample.com', 0, 0, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
