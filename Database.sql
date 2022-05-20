-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2022 at 09:23 PM
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
-- Database: `Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `ARTICLES`
--

CREATE TABLE `ARTICLES` (
  `ID` int(10) UNSIGNED NOT NULL,
  `TITLE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CONTENT` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `COMPLAINS`
--

CREATE TABLE `COMPLAINS` (
  `ID` int(10) UNSIGNED NOT NULL,
  `TITLE` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CONTENT` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
-- Indexes for table `COMPLAINS`
--
ALTER TABLE `COMPLAINS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USERNAME` (`USERNAME`);

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
-- Constraints for table `COMPLAINS`
--
ALTER TABLE `COMPLAINS`
  ADD CONSTRAINT `COMPLAINS_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `USERS` (`USERNAME`);
COMMIT;


--Users of database

# Privileges for `LoginUsers`@`localhost`

GRANT USAGE ON *.* TO `LoginUsers`@`localhost` IDENTIFIED BY PASSWORD '*EDEBFEB00024A86B4D3DF62D4E5135628C259E0F';

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, REFERENCES, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON `Database`.* TO `LoginUsers`@`localhost`;


# Privileges for `NotLoginUsers`@`localhost`

GRANT USAGE ON *.* TO `NotLoginUsers`@`localhost` IDENTIFIED BY PASSWORD '*8CAE839D3D75AEC5A6D95ECF790C18242BC4D0D5';

GRANT SELECT ON `Database`.* TO `NotLoginUsers`@`localhost`;


# Privileges for `admin`@`%`

GRANT USAGE ON *.* TO `admin`@`%` IDENTIFIED BY PASSWORD '*9E682348F576B826307E1CF5FEA1257F09CCA860';

GRANT SELECT, INSERT, UPDATE, DELETE ON `Database`.* TO `admin`@`%`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
