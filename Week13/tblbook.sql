-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 04:27 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tblbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `PosterLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`BookID`, `Title`, `Publisher`, `Year`, `Author`, `PosterLink`) VALUES
(2, 'Test', 'Silver Spoon', '2005', 'Horse', 'gambar-kuda-png-31.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`BookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
