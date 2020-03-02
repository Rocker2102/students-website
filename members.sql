-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 09:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `uid` int(4) NOT NULL,
  `google_id` varchar(64) DEFAULT NULL,
  `google_email` varchar(64) DEFAULT NULL,
  `img_ext` varchar(256) DEFAULT NULL,
  `username` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `admin` int(2) NOT NULL DEFAULT 0,
  `admin_id` varchar(64) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `joined_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`uid`, `google_id`, `google_email`, `img_ext`, `username`, `password`, `admin`, `admin_id`, `name`, `joined_on`, `last_updated`) VALUES
(1, NULL, NULL, 'png', 'rocker', 'bcb1ac2aaaf1d367b9fd960eb0cee5709a3fd9d0c99a53b19795a32588353c3b', 3, NULL, 'Ankush Yadav', '2020-03-01 10:19:56', '2020-03-01 15:06:18'),
(2, NULL, NULL, NULL, 'anusha', '62c488bbaded8ff5903a5b55b345a49d74385768c7e5601aa5d0b6126dd694b5', 2, NULL, 'Anusha Dogra', '2020-03-02 08:13:44', '2020-03-02 08:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
