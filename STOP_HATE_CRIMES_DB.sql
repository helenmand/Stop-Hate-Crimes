-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2022 at 05:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `STOP_HATE_CRIMES_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `ARTICLES`
--

CREATE TABLE `ARTICLES` (
  `ID` int(10) UNSIGNED NOT NULL,
  `TITLE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CONTENT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `COMMENTS`
--

CREATE TABLE `COMMENTS` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMENT` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `COMPLAINTS`
--

CREATE TABLE `COMPLAINTS` (
  `ID` int(10) UNSIGNED NOT NULL,
  `TITLE` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CONTENT` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAIL` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USERNAME`, `PASSWORD`, `EMAIL`) VALUES
('admin', 'adminP', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ARTICLES`
--
ALTER TABLE `ARTICLES`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `COMMENTS`
--
ALTER TABLE `COMMENTS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `COMPLAINTS`
--
ALTER TABLE `COMPLAINTS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME` (`USERNAME`) USING HASH;

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ARTICLES`
--
ALTER TABLE `ARTICLES`
  ADD CONSTRAINT `ARTICLES_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `USERS` (`USERNAME`);

--
-- Constraints for table `COMMENTS`
--
ALTER TABLE `COMMENTS`
  ADD CONSTRAINT `COMMENTS_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `USERS` (`USERNAME`);

--
-- Constraints for table `COMPLAINTS`
--
ALTER TABLE `COMPLAINTS`
  ADD CONSTRAINT `COMPLAINTS_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `USERS` (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
