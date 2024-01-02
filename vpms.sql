-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 04:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(50) NOT NULL,
  `o_age` int(11) NOT NULL,
  `o_gender` varchar(10) NOT NULL,
  `o_address` varchar(30) NOT NULL,
  `o_phone` varchar(10) NOT NULL,
  `o_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`o_id`, `o_name`, `o_age`, `o_gender`, `o_address`, `o_phone`, `o_email`) VALUES
(23, 'Prashant Bhandari', 23, 'Male', 'Birtamode', '9815939112', 'bhandarip337@gmail.com'),
(24, 'ram', 0, 'Male', 'jhapa', '9814002496', 'paskalbishal@gmail.com'),
(25, 'bikal', 34, 'Male', 'budhabare', '9852673199', 'paskalbishal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `parklog`
--

CREATE TABLE `parklog` (
  `p_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `p_checkin_date` date NOT NULL,
  `p_checkin_time` time NOT NULL,
  `p_checkout_date` date NOT NULL,
  `p_checkout_time` time NOT NULL,
  `p_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parklog`
--

INSERT INTO `parklog` (`p_id`, `v_id`, `s_id`, `p_checkin_date`, `p_checkin_time`, `p_checkout_date`, `p_checkout_time`, `p_status`) VALUES
(1, 36, 48, '2022-06-30', '16:21:02', '2022-06-30', '16:21:06', 'D'),
(2, 36, 48, '2022-06-30', '16:21:12', '0000-00-00', '00:00:00', 'P'),
(3, 37, 49, '2022-06-30', '16:50:20', '2022-06-30', '16:51:22', 'D'),
(4, 38, 49, '2022-06-30', '16:57:12', '0000-00-00', '00:00:00', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `s_id` int(11) NOT NULL,
  `s_title` varchar(50) NOT NULL,
  `s_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`s_id`, `s_title`, `s_status`) VALUES
(48, 'Slot 1', 'P'),
(49, 'slot2', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_password`) VALUES
(2, 'prashant', 'prashant@gmail.com', '$2y$10$U3vWYZBa/HIdD9Y2/KIp/OpG5lDWKnBbPYW./xaJG.0LcbknNjtZ6'),
(7, 'admin', 'admin@vpms.com', '$2y$10$qzCWrBGqC8JjaRRrAsmnKOpgoh3ZzVX8rvFPI/ZH4AUkSlB4yMb3S');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(11) NOT NULL,
  `vc_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `v_name` varchar(50) NOT NULL,
  `v_number` varchar(30) NOT NULL,
  `v_model` varchar(30) NOT NULL,
  `v_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `vc_id`, `o_id`, `v_name`, `v_number`, `v_model`, `v_status`) VALUES
(36, 54, 23, 'Farari', '3124', 'model-2009', 'P'),
(37, 55, 24, 'honda', '9824997177', 'v2', 'U'),
(38, 55, 23, 'kldjgf', 'asb', '', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecatagory`
--

CREATE TABLE `vehiclecatagory` (
  `vc_id` int(11) NOT NULL,
  `vc_title` varchar(20) NOT NULL,
  `vc_description` varchar(50) NOT NULL,
  `vc_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehiclecatagory`
--

INSERT INTO `vehiclecatagory` (`vc_id`, `vc_title`, `vc_description`, `vc_rate`) VALUES
(54, 'Car', '4 wheeler', 45),
(55, 'bike', '', 78);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `parklog`
--
ALTER TABLE `parklog`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_title` (`s_title`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `vc_id` (`vc_id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `vehiclecatagory`
--
ALTER TABLE `vehiclecatagory`
  ADD PRIMARY KEY (`vc_id`),
  ADD UNIQUE KEY `vc_title` (`vc_title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `parklog`
--
ALTER TABLE `parklog`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vehiclecatagory`
--
ALTER TABLE `vehiclecatagory`
  MODIFY `vc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parklog`
--
ALTER TABLE `parklog`
  ADD CONSTRAINT `parklog_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `slot` (`s_id`),
  ADD CONSTRAINT `parklog_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vehicle` (`v_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`vc_id`) REFERENCES `vehiclecatagory` (`vc_id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`o_id`) REFERENCES `owner` (`o_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
