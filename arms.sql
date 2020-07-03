-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 01:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

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
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `patient_id`, `guarantor_id`, `patient_type`, `hospital_bill`, `professional_bill`, `deleted`) VALUES
(1, '2020-06-06', 9, 0, 0, 4000.00, '0.00', 0),
(2, '2020-06-06', 18, 0, 0, 1.50, '1.60', 0),
(3, '2020-06-06', 19, 0, 0, 3000.00, '5000.00', 0),
(6, '2020-06-07', 20, 0, 0, 4000.00, '5000.00', 0),
(7, '2020-06-07', 21, 0, 0, 300.00, '500.00', 0),
(8, '2020-06-07', 25, 0, 0, 500.00, '600.00', 0),
(9, '2020-06-07', 26, 0, 0, 400.00, '500.00', 0),
(10, '2020-06-07', 27, 0, 0, 0.00, '0.00', 0),
(11, '2020-06-07', 28, 0, 0, 0.00, '0.00', 0),
(12, '2020-06-07', 29, 0, 0, 0.00, '0.00', 0),
(13, '2020-06-07', 30, 0, 0, 0.00, '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guarantor`
--

CREATE TABLE `guarantor` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `type` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guarantor`
--

INSERT INTO `guarantor` (`id`, `name`, `type`, `deleted`) VALUES
(2, 'DSWD', 2, 0),
(3, 'Philhealth', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `first_name`, `last_name`, `middle_name`, `date_created`, `deleted`) VALUES
(1, '$firstname', '$lastname', '$middlename', '2020-06-02 00:00:00', 0),
(2, 'Ed', 'Shaman', 'L.', '2020-07-03 00:00:00', 0),
(3, 'Fe', 'LoSha', 'M', '2020-06-03 00:00:00', 0),
(4, 'Sarah', 'Gerillo', 'M.', '2020-06-04 00:00:00', 0),
(5, 'Sarah', 'Gerillo', 'M.', '2020-06-05 00:00:00', 0),
(6, 'Armel', 'Gamore', 'L.', '2020-06-06 00:00:00', 0),
(7, 'Edward', 'Elric', 'S', '2020-06-06 00:00:00', 0),
(8, 'Tudor', 'Ponce', 'S', '2020-06-06 00:00:00', 0),
(9, 'Tudor', 'Ponce', 'S', '2020-06-06 00:00:00', 0),
(10, 'Kyron', '', 'Watkins', '2020-06-06 00:00:00', 0),
(11, 'Trixie ', 'Delaney', '', '0000-00-00 00:00:00', 0),
(12, 'Jillian ', '', 'Nicholson', '0000-00-00 00:00:00', 0),
(13, 'Alberto ', 'Rosario', '', '2020-06-06 22:00:21', 0),
(14, 'asd', 'asd', 'asd', '2020-06-06 22:09:28', 0),
(15, 'Aadil ', 'Greig', '', '2020-06-06 22:11:26', 0),
(16, 'Branden', 'Ireland', '', '2020-06-06 22:36:07', 0),
(17, 'Onur ', 'Haas', '', '2020-06-06 22:37:44', 0),
(18, 'Onur ', 'Haas', '', '2020-06-06 22:37:51', 0),
(19, 'Arham ', 'Burke', '', '2020-06-06 22:38:26', 0),
(20, 'Keanu', 'Ferreira', '', '2020-06-07 00:10:25', 0),
(21, 'Ramzes', 'Yeet', '', '2020-06-07 21:13:19', 0),
(22, 'Steve', 'Montana', '', '2020-06-07 21:19:10', 0),
(23, 'Steve', 'Montana', '', '2020-06-07 21:20:03', 0),
(24, 'Meerab', 'Barton', '', '2020-06-07 21:20:13', 0),
(25, 'Lucia ', ' Davies', '', '2020-06-07 21:22:03', 0),
(26, 'Hafsah', 'Wade', '', '2020-06-07 21:22:53', 0),
(27, 'Cora ', 'Fenton', '', '2020-06-07 21:44:10', 0),
(28, 'Sanna', 'Hutchinson', '', '2020-06-07 21:44:15', 0),
(29, 'Alfie ', 'Odling', '', '2020-06-07 21:45:13', 0),
(30, 'Corban ', 'Dudley', '', '2020-06-07 21:46:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `hospital_bill_payment` float(10,2) NOT NULL DEFAULT 0.00,
  `professional_bill_payment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `or_amount` float(10,2) NOT NULL DEFAULT 0.00,
  `or_number` int(25) NOT NULL,
  `or_date` datetime NOT NULL DEFAULT current_timestamp(),
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'sample@sample.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
