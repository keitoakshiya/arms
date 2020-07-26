-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 02:01 PM
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
(1, '2020-06-06', 9, 1, 1, 4000.00, '0.00', 0),
(2, '2020-06-06', 18, 3, 2, 1.50, '1.60', 0),
(3, '2020-06-06', 19, 2, 2, 3000.00, '5000.00', 0),
(6, '2020-06-07', 20, 5, 3, 4000.00, '5000.00', 0),
(7, '2020-06-07', 21, 4, 3, 300.00, '500.00', 0),
(8, '2020-06-07', 25, 5, 3, 500.00, '600.00', 0),
(9, '2020-06-07', 26, 5, 2, 400.00, '500.00', 0),
(14, '2020-07-19', 31, 4, 2, 1.00, '1.00', 0),
(15, '2020-07-19', 32, 3, 2, 6000.00, '7000.00', 0),
(16, '2020-07-19', 33, 2, 2, 9000.00, '9000.00', 0),
(17, '2020-07-19', 34, 2, 1, 0.00, '0.00', 0);

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
(1, 'Intellicare', 2, 0),
(2, 'DSWD', 2, 0),
(3, 'Philhealth', 2, 0),
(4, 'MediCard', 1, 0),
(5, 'St. Peter', 0, 0);

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
(9, 'Tudor', 'Ponce', 'S', '2020-06-06 00:00:00', 1),
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
(30, 'Corban ', 'Dudley', '', '2020-06-07 21:46:48', 0),
(31, 'Jose', 'Bony', '', '2020-07-19 14:52:31', 0),
(32, 'Keith', 'Ramirez', '', '2020-07-19 15:38:53', 0),
(33, 'Katherine', 'Razon', '', '2020-07-19 15:48:11', 0),
(34, 'Kiko', 'Arthuro', '', '2020-07-19 15:48:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) UNSIGNED NOT NULL,
  `company` int(11) NOT NULL,
  `or_date` date NOT NULL,
  `or_number` int(11) NOT NULL,
  `or_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `company`, `or_date`, `or_number`, `or_amount`) VALUES
(1, 0, '0000-00-00', 9, '8'),
(2, 0, '0000-00-00', 6, '6'),
(3, 0, '0000-00-00', 1, '2'),
(4, 0, '0000-00-00', 4, '3'),
(5, 0, '0000-00-00', 34, '99000'),
(6, 0, '0000-00-00', 23, '23'),
(7, 0, '0000-00-00', 23, '5645'),
(8, 0, '0000-00-00', 6456, '456'),
(9, 0, '0000-00-00', 234, '234');

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

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `patient_id`, `bill_id`, `hospital_bill_payment`, `professional_bill_payment`, `or_amount`, `or_number`, `or_date`, `date_created`, `deleted`) VALUES
(1, 9, 1, 1000.00, '1078.00', 0.00, 0, '2020-07-19 19:45:25', '2020-07-19 19:45:25', 0),
(2, 9, 1, 500.00, '400.00', 0.00, 0, '2020-07-19 19:47:45', '2020-07-19 19:47:45', 0),
(3, 9, 1, 500.00, '400.00', 0.00, 0, '2020-07-19 19:48:33', '2020-07-19 19:48:33', 0),
(4, 9, 1, 500.00, '400.00', 0.00, 0, '2020-07-19 19:48:41', '2020-07-19 19:48:41', 0);

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
(3, 'user2', 'user2', '', 1, 1, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guarantor`
--
ALTER TABLE `guarantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
