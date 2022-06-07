-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 04:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realstate`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL COMMENT 'User ID',
  `pics` text NOT NULL,
  `price` int(11) NOT NULL,
  `address` text NOT NULL,
  `type` int(11) NOT NULL COMMENT 'Villa, Apartment..',
  `furnished` tinyint(1) NOT NULL COMMENT 'furnished or not',
  `sale_type` int(11) NOT NULL COMMENT 'for sale or for rent',
  `rooms_num` int(11) NOT NULL COMMENT 'Number of rooms',
  `bathrooms_num` int(11) NOT NULL COMMENT 'Number of bathrooms',
  `area` int(11) NOT NULL COMMENT 'Area m2',
  `ad_dasc` text NOT NULL COMMENT 'Description',
  `contact_email` varchar(50) NOT NULL,
  `contact_phone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `contact_whatsapp` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Unit Ad';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
