-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 10:58 PM
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
-- Database: `emergencyrescueservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `fir_id` int(11) NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `incident_description` text NOT NULL,
  `incident_date` date NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `bloodType` varchar(5) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `phn1` varchar(20) DEFAULT NULL,
  `phn2` varchar(20) DEFAULT NULL,
  `phn3` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phoneNumber`, `password_hash`, `bloodType`, `height`, `weight`, `location`, `photo`, `gender`, `phn1`, `phn2`, `phn3`) VALUES
(1, 'Khaled9913', 'kmushfique201352@bscse.uiu.ac.bd', '01400249477', '$2y$10$3AA77q3y464IvAtt6giGQOXu6slBC/hL5MMBDOKArVGK4szmdDBOm', 'A+', 183.00, 79.00, 'Latitude: 23.7272, Longitude: 90.4093', '../images/img.jpg', 'Male', '01400249477', '01707887504', '01938887504');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD PRIMARY KEY (`fir_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fir`
--
ALTER TABLE `fir`
  MODIFY `fir_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
