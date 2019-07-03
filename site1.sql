-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 08:23 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site1`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '-',
  `username` varchar(255) NOT NULL DEFAULT '-',
  `type` varchar(255) NOT NULL,
  `bug_url` varchar(255) NOT NULL DEFAULT '-',
  `details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'unsolved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `username`, `type`, `bug_url`, `details`, `timestamp`, `status`) VALUES
(1, '-', '-', 'bug', 'https://rocker.ga', 'unknown', '2019-07-01 12:35:54', 'unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `uid` int(4) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `sem` int(2) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin` varchar(255) NOT NULL DEFAULT 'false',
  `ver_status` varchar(255) NOT NULL DEFAULT 'not_verified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`uid`, `roll_no`, `username`, `password`, `name`, `contact`, `email`, `dob`, `sem`, `created`, `modified`, `admin`, `ver_status`) VALUES
(1, 'B180037CS', 'rocker', '2904', 'Ankush Yadav', '9589203992', 'b180037@nitsikkim.ac.in', '2000-09-29', 2, '2019-06-15 12:58:41', '2019-07-03 12:56:32', 'true', 'verified'),
(2, 'B180091EC', 'gk', '0310', 'Gourav Kumar Prasad', '9563201212', 'b180091@nitsikkim.ac.in', '1998-10-03', 2, '2019-06-17 04:39:05', '2019-07-02 10:40:59', 'false', 'verified'),
(3, 'B180038CS', 'dimi', '0603', 'Divyanshu Gautam', '8377840227', 'b180038@nitsikkim.ac.in', '2001-03-06', 2, '2019-06-20 06:24:25', '2019-07-03 18:04:41', 'false', 'verified'),
(4, 'B180009CS', 'pokhi', '0503', 'Anupa Pokhariya', '9670728515', 'b180009@nitsikkim.ac.in', '2000-03-05', 3, '2019-06-20 06:25:54', '2019-07-02 08:14:02', 'false', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `roll_no` (`roll_no`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
