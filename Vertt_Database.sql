-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2018 at 01:37 AM
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

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisorID`, `firstName`, `middleName`, `lastName`, `advisorEmail`, `advisorNumber`, `advisorLocation`) VALUES
(12345, 'Jerry', 'Justin', 'Brake', 'jerry.brake@famu.edu', 2021341234, 'NE 200, Bernneker BUilding'),
(12346, 'Mary', 'Jane', 'Stone', 'mary.stone@famu.edu', 2012341234, 'NE 201, Berneker Building');

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

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`collegeID`, `universityID`, `collegeName`, `collegeLocation`) VALUES
(1, 1, 'College of Science and Technology', 'Benjamin Banneker'),
(2, 1, 'School of Business and Industry', 'Gamble Street'),
(3, 1, 'College of Social Sciences, Arts, and Humanities', '515 Orr Drive'),
(4, 1, 'School of Journalism and Graphic Communication', 'Gamble Street');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(10) NOT NULL,
  `courseCode` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `courseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collegeID` int(10) NOT NULL,
  `courseUnit` int(10) NOT NULL,
  `springSem` tinyint(1) NOT NULL,
  `fallSem` tinyint(1) NOT NULL,
  `summerSem` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseCode`, `courseName`, `collegeID`, `courseUnit`, `springSem`, `fallSem`, `summerSem`) VALUES
(1, 'ENC1101', 'Freshman Communicative Skills I', 3, 3, 1, 1, 1),
(2, 'PSC1121C', 'Introduction to Physical Science', 1, 4, 1, 1, 0),
(3, 'AMH2091', 'Introduction to African-American History', 3, 3, 1, 1, 1),
(4, 'MAC2233', 'Business Calculus', 2, 3, 1, 1, 1),
(5, 'CIS1920', 'Professional Development', 2, 2, 1, 1, 1),
(6, 'ENC1102', 'Freshman Communicative Skills II', 3, 3, 1, 1, 1),
(7, 'COP3828', 'Web Prog and Design', 1, 3, 1, 1, 1),
(8, 'AFA3104', 'The African Amer Exp', 3, 3, 1, 1, 0),
(9, 'SPC2608', 'Public Speaking', 3, 3, 1, 1, 1),
(10, 'COP3330', 'Intro to Object Oriented Programming', 1, 3, 1, 1, 1),
(11, 'CDA3101C', 'Computer Concepts and Organization', 1, 3, 1, 1, 1),
(12, 'ACG2021', 'Financial Accounting Principles', 2, 3, 1, 0, 0),
(13, 'CIS3040', 'Information Systems In Organizations ', 1, 3, 1, 1, 1),
(14, 'ENC3243', ' Technical Writing', 4, 3, 1, 0, 0),
(15, 'MAR3023', ' Principles Of Marketing ', 2, 3, 1, 1, 0),
(16, 'COP3530', 'Programming and Data Structures', 1, 3, 1, 1, 0),
(17, 'COP3014C', 'Fund Of Programming', 1, 3, 1, 1, 0),
(18, 'CIS4250', 'Computer Ethic & Prof Respons', 1, 3, 1, 0, 0),
(19, 'ACG2071', 'Managerial Accounting Principles ', 2, 3, 0, 1, 0),
(20, 'COP3710', 'Database Management Systems ', 1, 3, 0, 1, 0),
(21, 'CNT4504', 'Data Comm & Organizational Networks ', 1, 3, 0, 1, 0),
(22, 'CIS4301', 'Information Systems Design And Development ', 1, 3, 1, 0, 0),
(23, 'COP3060', 'Concepts in Advanced Application Development', 1, 3, 1, 0, 0),
(24, 'COP3353', 'Intro to Unix', 1, 3, 1, 1, 0),
(25, 'COP3366', 'Intro To C# Programming', 1, 3, 1, 0, 1),
(26, 'C0P3610', 'Operating Systems', 1, 3, 0, 1, 0),
(27, 'COP4020', 'Programming Languages', 1, 3, 0, 1, 0),
(28, 'COP4365', 'Advanced C# Programming', 1, 3, 1, 0, 0),
(29, 'CIS4910', 'Information Systems Development Project ', 1, 3, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

CREATE TABLE `prerequisites` (
  `id` int(11) NOT NULL,
  `prerequisiteID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courseID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coursesTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courseHours` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`id`, `prerequisiteID`, `courseID`, `coursesTitle`, `courseHours`) VALUES
(1, 'ACG2021', 'CIS3040', 'Information Systems In Organizations', 3),
(2, 'ENC1102', 'ENC3243', 'Technical Writing', 3),
(3, 'COP2532', 'COP3710', 'Database Management Systems', 3),
(4, 'CIS3040 ', 'CIS4301', 'Information Systems Design And Development', 3),
(5, 'COP2532', 'COP3060', 'Concepts in Advanced Application Development', 3),
(6, 'COP3710', 'COP3060', 'Concepts in Advanced Application Development', 3),
(7, 'MAC1105', 'STA2023', 'Introduction To Probability And Statistics I', 3),
(8, 'CIS4301', 'CIS4910', 'Information Systems Development Project', 3),
(9, 'COP3330', 'COP4365', 'Advanced C# Programming', 3),
(10, 'MAC1105', 'MAC2233', 'Business Calculus ', 3),
(11, 'MAC1105', 'COP3014C', 'Fundamentals of Programming ', 3);

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

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `questionID` bigint(255) NOT NULL,
  `studentID` int(10) NOT NULL,
  `concentration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `studyHour` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `currentlyWorking` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `workingHours` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `planningChildren` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `numberOfChildren` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ageOfLastChild` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `helpWithChildren` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expectedGraduationDate` date NOT NULL,
  `selfMotivated` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `needToImproveGPA` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `athlete` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `extracurricular` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `totalScore` int(255) NOT NULL
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
  `studentDOB` date NOT NULL,
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
  `advisorID` int(10) NOT NULL,
  `firstTime` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `StudentProfile`
--

INSERT INTO `StudentProfile` (`studentID`, `firstName`, `middleName`, `lastName`, `studentDOB`, `physicalAddress`, `physicalCity`, `pState`, `physicalZip`, `mailingAddress`, `mailingCity`, `mState`, `mailingZip`, `personalPhone`, `cellPhone`, `campusEmail`, `personalEmail`, `advisorID`, `firstTime`) VALUES
(30012345, 'John', 'William', 'Doe', '1999-01-01', 'No 1, NW Avenue', 'Tallahassee', 'Florida', 32301, 'No 1, NW Avenue', 'Tallahassee', 'Florida', 32301, 2011234567, 2011234567, 'john1.doe@famu.edu', 'john.doe@gmail.com', 12345, 1),
(30012346, 'Sydney', 'Mitchell', 'Oscar', '1998-01-02', 'No 45, SW Avenue', 'Tallahassee', 'Florida', 32302, 'No 45, SW Avenue', 'Tallahassee', 'Florida', 32302, 2001232345, 2001232345, 'sydney1.oscar@famu.edu', 'sydney.oscar@gmail.com', 12345, 0),
(30012347, 'Jean', 'Beef', 'Pung', '2001-10-01', 'No SW Avenue', 'Tallahassee', 'Florida', 32301, 'No SW Avenue', 'Tallahassee', 'Florida', 32301, 2001232346, 2001232346, 'jean1.pung@famu.edu', 'jean.pung@gmail.com', 12346, 1);

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
  `studentGPA` float NOT NULL,
  `Semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transcript`
--

INSERT INTO `transcript` (`transcriptID`, `studentID`, `courseName`, `courseCode`, `courseUnit`, `courseGrade`, `studentGPA`, `Semester`) VALUES
(1, 30012347, 'Freshman Communicative Skills I', 'ENC1101', 3, 'A', 4, 'Fall 2017'),
(2, 30012347, 'Introduction to Physical Science', 'PSC1121C', 3, 'A', 4, 'Fall 2017'),
(3, 30012347, 'Intro To C# Programming', 'COP3366', 3, 'A', 4, 'Spring 2018'),
(4, 30012347, 'Intro to Unix', 'COP3353', 3, 'A', 4, 'Spring 2018'),
(5, 30012345, 'Freshman Communicative Skills I', 'ENC1101', 3, 'B', 3, 'Fall 2017'),
(6, 30012345, 'Intro To C# Programming', 'COP3366', 3, 'B', 3, 'Fall 2017'),
(7, 30012345, 'Programming Languages', 'COP4020', 3, 'B', 2.6, 'Spring 2018'),
(8, 30012345, 'Intro to Object Oriented Programming', 'COP3330', 3, 'B', 2.6, 'Spring 2018'),
(9, 30012345, 'Programming and Data Structures', 'COP3530', 3, 'C', 2.6, 'Spring 2018'),
(10, 30012346, 'Web Prog and Design', 'COP3828', 3, 'B', 2.2, 'Fall 2017'),
(11, 30012346, 'Programming Languages', 'COP4020', 3, 'C', 2.2, 'Fall 2017'),
(12, 30012346, 'Intro To C# Programming', 'COP3366', 3, 'F', 2.2, 'Fall 2017'),
(13, 30012346, 'Intro To C# Programming', 'COP3366', 3, 'D', 2.3, 'Spring 2018'),
(14, 30012346, 'Intro to Object Oriented Programming', 'COP3330', 3, 'B', 2.3, 'Spring 2018'),
(15, 30012346, 'Freshman Communicative Skills I', 'ENC1101', 3, 'B', 2.3, 'Spring 2018');

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

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`universityID`, `universityName`, `universityAddress`, `universityCity`, `universityState`, `universityZip`, `universityPhone`, `universityEmail`) VALUES
(1, 'Florida A&M University', 'Wahnish Way', 'Tallahassee', 'FL', 32310, 850412000, 'helpdesk@famu.edu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` bigint(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userType` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `userType`) VALUES
(1, 'john1.doe@famu.edu', '12345', 'student'),
(2, 'jean1.pung@famu.edu', '12345', 'student'),
(3, 'sydney1.oscar@famu.edu', '12345', 'student'),
(5, 'jerry.brake@famu.edu', '12345', 'advisor'),
(6, 'mary.stone@famu.edu', '12345', 'advisor');

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
-- Indexes for table `prerequisites`
--
ALTER TABLE `prerequisites`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `questionID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transcript`
--
ALTER TABLE `transcript`
  MODIFY `transcriptID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `proposalSchedule_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);

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
