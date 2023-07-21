-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 06:02 PM
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
-- Database: `prom_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `USERID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` int(10) NOT NULL,
  `SEX` varchar(7) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`USERID`, `NAME`, `EMAIL`, `PHONE`, `SEX`, `PASSWORD`) VALUES
(1, 'Abheek Bhowmik', 'b23301@astra.xlri.ac.in', 2147483647, 'Male', 'abc'),
(2, 'Abheek Bhowmik', 'b23301@astra.xlri.ac.in', 2147483647, 'Female', 'abc'),
(3, 'Abheek Bhowmsdjifbsj', 'fkjwbfjkwbnf@kjnfvklvn', 2147483647, 'Female', 'qwdd'),
(4, 'Abgergeheek Bhowmsdjifbsj', 'fkjwbfjkwbnfgrge@kjnfvklvn', 2147483647, 'Others', 'erge'),
(5, 'Bhowmsdjifbsj', 'fkfghhdgrge@kjnfvklvn', 99323656, 'Male', 'dsasda'),
(6, 'Bhowmsdjifbsj', 'fkfghhdgrge@kjnfvklvn', 99323656, 'Male', 'rterg'),
(7, 'Bhowmsdjifbsj', 'fkfghhdgrge@kjnfvklvn', 99323656, 'Male', '688hgjhg'),
(8, 'Abheek Bhowmiker', 'b23301@astra.xlri.ac.iner', 2147483647, 'Others', 'fdsrg'),
(9, 'Abheexk Bhowmiker', 'b23301@astra.xlri.axc.iner', 2147483647, 'Male', 'xzxcz'),
(10, 'fgAbheexk Bhowmiker', 'b23301@astrha.xlri.axc.iner', 2147483647, 'Male', 'fhdhfd'),
(11, 'fgAfdfhbsdfbexk Bhowmiker', 'b23301@astrha.xlri.axc.iner', 2147483647, 'Male', 'asdsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
