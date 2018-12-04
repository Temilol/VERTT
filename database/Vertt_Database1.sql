-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2018 at 05:05 PM
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
CREATE DATABASE IF NOT EXISTS `id6870583_vertt` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id6870583_vertt`;

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisorID` int(10) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advisorEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advisorNumber` int(10) NOT NULL,
  `advisorLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advisorStudent`
--

CREATE TABLE `advisorStudent` (
  `advisorStudentID` int(10) NOT NULL,
  `advisorID` int(10) NOT NULL,
  `studentID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `collegeID` int(10) NOT NULL,
  `universityID` int(10) NOT NULL,
  `collegeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collegeLocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(10) NOT NULL,
  `courseCode` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `courseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collegeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposalSchedule`
--

CREATE TABLE `proposalSchedule` (
  `proposalScheduleID` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `scheduleID` int(10) NOT NULL,
  `courseID` int(10) NOT NULL,
  `advisorID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `questionID` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `prerequisitesCompleted` tinyint(1) NOT NULL,
  `concentration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currentlyWorking` tinyint(1) NOT NULL,
  `lessThanTwentyHours` tinyint(1) NOT NULL,
  `moreThanTwentyHours` tinyint(1) NOT NULL,
  `studyAtWork` tinyint(1) NOT NULL,
  `planningChildren` tinyint(1) NOT NULL,
  `numberOfChildren` int(3) NOT NULL,
  `ageRangeOfChildren` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `helpWithChildren` tinyint(1) NOT NULL,
  `takenMoreThanTwelveHours` tinyint(1) NOT NULL,
  `expectedGraduation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `morningPerson` tinyint(1) NOT NULL,
  `selfMotivated` tinyint(1) NOT NULL,
  `code` tinyint(1) NOT NULL,
  `needToImproveGPA` tinyint(1) NOT NULL,
  `athlete` tinyint(1) NOT NULL,
  `extracurricular` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleID` int(10) NOT NULL,
  `courseCode` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `courseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courseID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `StudentProfile`
--

CREATE TABLE `StudentProfile` (
  `studentID` int(15) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studentDOB` int(10) NOT NULL,
  `physicalAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `physicalCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pState` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `physicalZip` int(10) NOT NULL,
  `mailingAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mailingCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mState` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mailingZip` int(10) NOT NULL,
  `personalPhone` int(10) NOT NULL,
  `cellPhone` int(10) NOT NULL,
  `campusEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personalEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advisorID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transcript`
--

CREATE TABLE `transcript` (
  `transcriptID` int(10) NOT NULL,
  `studentID` int(10) NOT NULL,
  `courseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courseCode` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `courseUnit` int(10) NOT NULL,
  `courseGrade` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `studentGPA` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `universityID` int(10) NOT NULL,
  `universityName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `universityAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `universityCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `universityState` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `universityZip` int(10) NOT NULL,
  `universityPhone` int(10) NOT NULL,
  `universityEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisorID`);

--
-- Indexes for table `advisorStudent`
--
ALTER TABLE `advisorStudent`
  ADD PRIMARY KEY (`advisorStudentID`),
  ADD KEY `advisorID` (`advisorID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`collegeID`),
  ADD KEY `universityID` (`universityID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `collegeID` (`collegeID`);

--
-- Indexes for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  ADD PRIMARY KEY (`proposalScheduleID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `scheduleID` (`scheduleID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `StudentProfile`
--
ALTER TABLE `StudentProfile`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- Indexes for table `transcript`
--
ALTER TABLE `transcript`
  ADD PRIMARY KEY (`transcriptID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`universityID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisorStudent`
--
ALTER TABLE `advisorStudent`
  ADD CONSTRAINT `advisorStudent_ibfk_1` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`),
  ADD CONSTRAINT `advisorStudent_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_ibfk_1` FOREIGN KEY (`universityID`) REFERENCES `university` (`universityID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `colleges` (`collegeID`);

--
-- Constraints for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  ADD CONSTRAINT `proposalSchedule_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`),
  ADD CONSTRAINT `proposalSchedule_ibfk_2` FOREIGN KEY (`scheduleID`) REFERENCES `schedule` (`scheduleID`),
  ADD CONSTRAINT `proposalSchedule_ibfk_3` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `proposalSchedule_ibfk_4` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`);

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `StudentProfile`
--
ALTER TABLE `StudentProfile`
  ADD CONSTRAINT `StudentProfile_ibfk_1` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`);

--
-- Constraints for table `transcript`
--
ALTER TABLE `transcript`
  ADD CONSTRAINT `transcript_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
