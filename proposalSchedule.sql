-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2018 at 10:38 PM
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
  `proposedSchedule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recommendedCourses` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studentDecision` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advisorDecision` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  ADD PRIMARY KEY (`proposalScheduleID`),
  ADD KEY `studentID` (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  MODIFY `proposalScheduleID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  ADD CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
