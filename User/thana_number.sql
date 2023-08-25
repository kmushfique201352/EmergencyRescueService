-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 07:56 PM
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
-- Table structure for table `thana_number`
--

CREATE TABLE `thana_number` (
  `LoacationName` varchar(100) NOT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `FireService` varchar(11) DEFAULT NULL,
  `Ambulance` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana_number`
--

INSERT INTO `thana_number` (`LoacationName`, `PhoneNumber`, `FireService`, `Ambulance`) VALUES
('Badda', '01747597187', '028833000', '01911125156'),
('Dhanmondi', '0258616086', '01730002227', '01911125126'),
('Gulshan', '029895826', '028833000', '01911125156'),
('Mohammadpur', '01769691745', '01730002227', '01744241332'),
('Uttara', '01713373161', '01730082230', '01778713649');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thana_number`
--
ALTER TABLE `thana_number`
  ADD PRIMARY KEY (`LoacationName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
