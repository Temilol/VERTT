-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2018 at 03:14 PM
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
(12346, 'Mary', 'Jane', 'Stone', 'mary.stone@famu.edu', 2012341234, 'NE 201, Berneker Building'),
(12347, 'Udochi', 'H', 'Maduakor', 'udochi1.maduakor@famu.edu', 1234230990, 'NE 201, Berneker Building');

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
(0, 'ENC1101', 'ENC1102', 'Freshman Communicative Skills II', 3),
(1, 'ACG2021', 'CIS3040', 'Information Systems In Organizations', 3),
(2, 'ENC1102', 'ENC3243', 'Technical Writing', 3),
(3, 'COP2532', 'COP3710', 'Database Management Systems', 3),
(4, 'CIS3040 ', 'CIS4301', 'Information Systems Design And Development', 3),
(5, 'COP2532', 'COP3060', 'Concepts in Advanced Application Development', 3),
(6, 'COP3710', 'COP3060', 'Concepts in Advanced Application Development', 3),
(7, 'MAC2233', 'STA2023', 'Introduction To Probability And Statistics I', 3),
(8, 'CIS4301', 'CIS4910', 'Information Systems Development Project', 3),
(9, 'COP3330', 'COP4365', 'Advanced C# Programming', 3);

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
  `studentID` int(10) NOT NULL,
  `courseCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scheduleID` int(10) NOT NULL,
  `advisorID` int(11) NOT NULL
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
(30012345, 'RaTeema', 'Ivy', 'Etienne', '1990-12-15', 'No 1, NW Avenue', 'Tallahassee', 'Florida', 32301, 'No 1, NW Avenue', 'Tallahassee', 'Florida', 32301, 2011234567, 2011234567, 'rateema1.stanley@famu.edu', 'rateema1.stanley@famu.edu', 12347, 1),
(30012346, 'Victory', 'Jonh', 'Ginger', '1998-01-02', 'No 45, SW Avenue', 'Tallahassee', 'Florida', 32302, 'No 45, SW Avenue', 'Tallahassee', 'Florida', 32302, 2001232345, 2001232345, 'victor1.odewale@famu.edu', 'victor1.odewale@famu.edu', 12345, 0),
(30012347, 'Temilola', 'Oliver', 'Aderibigbe', '2001-10-01', 'No SW Avenue', 'Tallahassee', 'Florida', 32301, 'No SW Avenue', 'Tallahassee', 'Florida', 32301, 2001232346, 2001232346, 'temilola1.aderibigbe@famu.edu', 'temilola1.aderibigbe@famu.edu', 12347, 1),
(30012348, 'Bertony', 'Tate', 'Bornelus', '1998-09-09', '1115 Jonh Ave', 'Tallahassee', 'Florida', 32301, '1115 Jonh Ave', 'Tallahassee', 'Florida', 32301, 1503340987, 1503340987, 'bertony1.bornelus@famu.edu', 'bertony1.bornelus@famu.edu', 12347, 1),
(30012349, 'Eleason', 'Jake', 'Williams ', '2000-05-12', '2045 W Tennessee St', 'Tallahassee', 'Florida', 32304, '2045 W Tennessee St', 'Tallahassee', 'Florida', 32304, 2141239989, 2141239989, 'eleason1.williams@famu.edu', 'eleason1.williams@famu.edu', 12346, 1);

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
(1, 30012346, 'Freshman Communicative Skills I', 'ENC1101', 3, 'A', 3.2, 'Summer2017'),
(2, 30012346, 'Introduction to Physical Science', 'PSC1121C', 4, 'B', 3.2, 'Summer2017'),
(3, 30012346, 'Business Calculus', 'MAC2233', 3, 'C', 3.2, 'Fall2017'),
(4, 30012346, 'Professional Development', 'CIS1920', 3, 'A', 3.2, 'Fall2017'),
(5, 30012346, 'Freshman Communicative Skills II', 'ENC1102', 3, 'A', 3.2, 'Fall2017'),
(6, 30012346, 'Fund Of Programming', 'COP3014C', 3, 'B', 3.2, 'Fall2017'),
(7, 30012346, 'Web Prog & Design', 'COP3828', 3, 'B', 3.2, 'Spring2018'),
(8, 30012346, 'The African Amer Exp', 'AFA3104', 3, 'B', 3.2, 'Spring2018'),
(9, 30012346, 'Mathematics For Computing', 'CTO2104', 3, 'C', 3.2, 'Spring2018'),
(10, 30012346, 'Public Speaking', 'SPC2608', 3, 'A', 3.2, 'Spring2018'),
(11, 30012347, 'Freshman Communicative Skills I', 'ENC1101', 3, 'B', 3.09, 'Fall2016'),
(12, 30012347, 'Introduction to Physical Science', 'PSC1121C', 4, 'C', 3.09, 'Fall2016'),
(13, 30012347, 'Business Calculus', 'MAC2233', 3, 'B', 3.09, 'Fall2016'),
(14, 30012347, 'Professional Development', 'CIS1920', 2, 'C', 3.09, 'Fall2016'),
(15, 30012347, 'Freshman Communicative Skills II', 'ENC1102', 3, 'A', 3.09, 'Spring2017'),
(16, 30012347, 'Fund Of Programming', 'COP3014C', 3, 'A', 3.09, 'Spring2017'),
(17, 30012347, 'Web Prog & Design', 'COP3828', 3, 'B', 3.09, 'Spring2017'),
(18, 30012347, 'The African Amer Exp\r\n', 'AFA3104', 3, 'B', 3.09, 'Spring2017'),
(19, 30012347, 'Introduction to African-American History', 'AMH2091', 3, 'A', 3.09, 'Fall2017'),
(20, 30012347, 'Principles Of Economics I', 'ECO2013', 3, 'B', 3.09, 'Fall2017'),
(21, 30012347, 'Mathematics For Computing', 'CTO2104', 3, 'B', 3.09, 'Fall2017'),
(22, 30012347, 'Public Speaking', 'SPC2608', 3, 'A', 3.09, 'Fall2017'),
(23, 30012347, 'Intro To Object Orient Program', 'COP3330', 3, 'A', 3.09, 'spring2018'),
(24, 30012347, 'Biological Science', 'BSC1005C', 3, 'C', 3.09, 'Spring2018'),
(25, 30012347, 'Computer Concepts and Organization', 'CDA3101C', 3, 'A', 3.09, 'Spring2018'),
(26, 30012347, 'Programming, Data Structures, and File Structures', 'COP3530', 3, 'B', 3.09, 'Spring2018'),
(27, 30012347, 'Principles Of Economics II', 'ECO3530', 3, 'B', 3.09, 'Spring2018'),
(28, 30012349, 'Freshman Communicative Skills I', 'ENC1101', 3, 'B', 1.75, 'Spring2018'),
(29, 30012349, 'Introduction to Physical Science', 'PSC1121C', 4, 'C', 1.75, 'Spring2018'),
(30, 30012349, 'Business Calculus', 'MAC2233', 3, 'F', 1.75, 'Spring2018'),
(31, 30012349, 'Professional Development', 'CIS1920', 2, 'C', 1.75, 'Spring2018');

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
(1, 'rateema1.stanley@famu.edu', '12345', 'student'),
(2, 'temilola1.aderibigbe@famu.edu', '12345', 'student'),
(3, 'victor1.odewale@famu.edu', '12345', 'student'),
(4, 'bertony1.bornelus@famu.edu', '12345', 'student'),
(5, 'eleason1.williams@famu.edu', '12345', 'student'),
(6, 'mary.stone@famu.edu', '12345', 'advisor'),
(7, 'udochi1.maduakor@famu.edu', '12345', 'advisor'),
(8, 'jerry.brake@famu.edu', '12345', 'advisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisorID`);

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
  ADD KEY `studentID` (`studentID`);

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
  ADD PRIMARY KEY (`scheduleID`);

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
-- AUTO_INCREMENT for table `proposalSchedule`
--
ALTER TABLE `proposalSchedule`
  MODIFY `proposalScheduleID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `questionID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transcript`
--
ALTER TABLE `transcript`
  MODIFY `transcriptID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12348;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `StudentProfile` (`studentID`);

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
