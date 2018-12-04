-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2018 at 02:01 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6870583_vertt`
--

-- --------------------------------------------------------

--
-- Table structure for table `proposalSchedule`
--

CREATE TABLE `proposalSchedule` (
  `proposalScheduleID` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `scheduleID` int(10) NOT NULL,
  `courseID` int(10) NOT NULL,
  `courseID1` int(100) NOT NULL,
  `courseID2` int(100) NOT NULL,
  `courseID3` int(100) NOT NULL,
  `courseID4` int(100) NOT NULL,
  `courseID5` int(100) NOT NULL,
  `courseID6` int(100) NOT NULL,
  `advisorID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  ADD PRIMARY KEY (`proposalScheduleID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `scheduleID` (`scheduleID`),
  ADD KEY `advisorID` (`advisorID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `courseID1` (`courseID1`),
  ADD KEY `courseID2` (`courseID2`),
  ADD KEY `courseID3` (`courseID3`),
  ADD KEY `courseID4` (`courseID4`),
  ADD KEY `courseID5` (`courseID5`),
  ADD KEY `courseID6` (`courseID6`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  ADD CONSTRAINT `proposalSchedule_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
