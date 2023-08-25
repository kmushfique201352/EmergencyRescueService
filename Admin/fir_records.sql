-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 07:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_emergency`
--

-- --------------------------------------------------------

--
-- Table structure for table `fir_records`
--

CREATE TABLE `fir_records` (
  `id` int(11) NOT NULL,
  `incident_date` datetime DEFAULT NULL,
  `incident_location` varchar(255) DEFAULT NULL,
  `complainant_name` varchar(255) DEFAULT NULL,
  `complainant_contact` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `suspect_name` varchar(255) DEFAULT NULL,
  `witnesses` varchar(255) DEFAULT NULL,
  `officer_name` varchar(255) DEFAULT NULL,
  `badge_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fir_records`
--

INSERT INTO `fir_records` (`id`, `incident_date`, `incident_location`, `complainant_name`, `complainant_contact`, `description`, `suspect_name`, `witnesses`, `officer_name`, `badge_number`) VALUES
(5, '2023-08-15 18:30:00', 'Uttara', 'Saddy', '0189908766', 'Two criminal was trying to mugged me. They asked my all belongings. After handing over they ran away', 'I do not know', 'There are some people. But No one came to help', 'Jalal Uddin', '5678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fir_records`
--
ALTER TABLE `fir_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fir_records`
--
ALTER TABLE `fir_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
