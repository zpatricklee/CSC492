-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2020 at 12:23 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advising_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adviser_notes`
--

CREATE TABLE `adviser_notes` (
  `ID` int(11) NOT NULL,
  `STUDENT_ID` varchar(9) DEFAULT NULL,
  `NOTE` varchar(2000) DEFAULT NULL,
  `UPDATED` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adviser_notes`
--

INSERT INTO `adviser_notes` (`ID`, `STUDENT_ID`, `NOTE`, `UPDATED`) VALUES
(1, '000000000', 'Merry Christmas and Happy New Year! You\'re the best!', '2020-12-10 08:18:30'),
(2, '111111111', 'Happy New Year!', '2020-12-10 08:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `a_session`
--

CREATE TABLE `a_session` (
  `SESSION_ID` int(11) NOT NULL,
  `adviser_id` int(11) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `mi` varchar(1) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `SID_REQUEST` varchar(9) DEFAULT NULL,
  `VIEW_TERM` varchar(8) DEFAULT NULL,
  `VIEW_YEAR` int(4) DEFAULT NULL,
  `VIEW_MODE` int(1) DEFAULT '0',
  `session_status` varchar(1) DEFAULT NULL,
  `session_date` varchar(30) DEFAULT NULL,
  `session_start` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a_session`
--

INSERT INTO `a_session` (`SESSION_ID`, `adviser_id`, `title`, `first_name`, `mi`, `last_name`, `suffix`, `email`, `SID_REQUEST`, `VIEW_TERM`, `VIEW_YEAR`, `VIEW_MODE`, `session_status`, `session_date`, `session_start`) VALUES
(1, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-05', '2020-11-05 02:41:36'),
(2, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-05', '2020-11-05 05:16:41'),
(3, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-05', '2020-11-05 05:17:52'),
(4, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-05', '2020-11-05 05:18:33'),
(5, 3, NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', NULL, NULL, NULL, NULL, NULL, '2020-11-06', '2020-11-06 00:15:34'),
(6, 3, NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', NULL, NULL, NULL, NULL, NULL, '2020-11-06', '2020-11-06 00:44:46'),
(7, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-06', '2020-11-06 02:48:45'),
(8, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-11-06', '2020-11-06 07:42:20'),
(9, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', NULL, NULL, NULL, NULL, '2020-11-06', '2020-11-06 08:01:59'),
(10, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', NULL, NULL, NULL, NULL, '2020-11-06', '2020-11-06 09:12:59'),
(11, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', NULL, NULL, NULL, NULL, '2020-11-17', '2020-11-17 21:12:49'),
(12, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', NULL, NULL, NULL, NULL, '2020-11-17', '2020-11-17 21:22:34'),
(13, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', NULL, NULL, NULL, NULL, '2020-11-19', '2020-11-19 04:24:34'),
(14, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', NULL, NULL, NULL, NULL, '2020-11-24', '2020-11-24 07:08:06'),
(15, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', NULL, NULL, NULL, NULL, '2020-12-04', '2020-12-04 07:33:28'),
(16, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', NULL, NULL, NULL, NULL, '2020-12-06', '2020-12-06 01:54:29'),
(17, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', 'SPRING', 2021, NULL, NULL, '2020-12-06', '2020-12-06 21:00:22'),
(18, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', 'FALL', 2020, 0, NULL, '2020-12-07', '2020-12-07 01:29:13'),
(19, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', 'FALL', 2020, 0, NULL, '2020-12-07', '2020-12-07 06:17:41'),
(20, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', 'SPRING', 2021, 0, NULL, '2020-12-09', '2020-12-09 04:06:08'),
(21, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', 'FALL', 2020, 0, NULL, '2020-12-09', '2020-12-09 08:23:53'),
(22, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', 'WINTER', 2021, 0, NULL, '2020-12-09', '2020-12-09 08:43:20'),
(23, 4, 'Mr.', 'Patrick', NULL, 'Lee', NULL, 'plee94@toromail.csudh.edu', '111111111', 'FALL', 2020, 0, NULL, '2020-12-09', '2020-12-09 22:02:24'),
(24, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', 'FALL', 2020, 0, NULL, '2020-12-09', '2020-12-09 23:24:02'),
(25, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '111111111', 'FALL', 2020, 0, NULL, '2020-12-10', '2020-12-10 00:02:28'),
(26, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', 'FALL', 2020, 0, NULL, '2020-12-10', '2020-12-10 00:14:30'),
(27, 2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', '000000000', 'SPRING', 2021, 0, NULL, '2020-12-10', '2020-12-10 00:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `completed_courses`
--

CREATE TABLE `completed_courses` (
  `COMPLETED_COURSES_ID` int(11) NOT NULL,
  `STUDENT_ID` varchar(9) DEFAULT NULL,
  `COURSE_ABBR` varchar(6) DEFAULT NULL,
  `COURSE_NAME` varchar(50) DEFAULT NULL,
  `TERM` varchar(15) DEFAULT NULL,
  `TERM_ID` varchar(1) DEFAULT NULL,
  `YEAR` int(4) DEFAULT NULL,
  `MARKED_COMPLETE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `completed_courses`
--

INSERT INTO `completed_courses` (`COMPLETED_COURSES_ID`, `STUDENT_ID`, `COURSE_ABBR`, `COURSE_NAME`, `TERM`, `TERM_ID`, `YEAR`, `MARKED_COMPLETE`) VALUES
(1, '123456789', 'CSC121', 'Intro to CS & Programming I', 'SUMMER', '3', 2020, '2020-11-19 01:49:18'),
(2, '123456789', 'CSC123', 'Intro to CS & Programming II', 'SUMMER', '3', 2020, '2020-11-19 02:43:38'),
(3, '123456789', 'CSC221', 'Assem. Lang. & Intro to Comp. Org.', 'FALL', '4', 2020, '2020-11-19 03:21:14'),
(4, '111111111', 'CSC121', 'Intro to CS & Programming I', 'FALL', '4', 2020, '2020-12-03 06:38:35'),
(5, '111111111', 'PHY130', 'General Physics I', 'FALL', '4', 2020, '2020-12-09 14:16:22'),
(6, '111111111', 'MAT271', 'Foundations of Higher Mathematics', 'SPRING', '2', 2021, '2020-12-09 14:19:19'),
(7, '000000000', 'CSC121', 'Intro to CS & Programming I', 'FALL', '4', 2020, '2020-12-09 17:39:24'),
(8, '000000000', 'MAT191', 'Calculus I', 'FALL', '4', 2020, '2020-12-09 17:39:24'),
(9, '000000000', 'PHY130', 'General Physics I', 'FALL', '4', 2020, '2020-12-09 17:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_ABBR` varchar(6) DEFAULT NULL,
  `COURSE_NAME` varchar(50) DEFAULT NULL,
  `TERM` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE_ID`, `COURSE_ABBR`, `COURSE_NAME`, `TERM`) VALUES
(1, 'CSC121', 'Intro to CS & Programming I', 'FALL 2020'),
(4, 'CSC123', 'Intro to CS & Programming II', 'SPRING 2020'),
(5, 'CSC221', 'Assem. Lang. & Intro to Comp. Org.', 'SPRING 2020'),
(6, 'MAT191', 'Calculus I', 'FALL 2020'),
(7, 'MAT193', 'Calculus II', 'SPRING 2020'),
(8, 'MAT271', 'Foundations of Higher Mathematics', 'SPRING 2020'),
(9, 'PHY130', 'General Physics I', 'SPRING 2020'),
(10, 'PHY132', 'General Physics II', 'SPRING 2020'),
(11, 'CSC311', 'Data Structures', 'SPRING 2020'),
(12, 'CSC321', 'Programming Languages', 'SPRING 2020'),
(13, 'CSC331', 'Computer Organization', 'SPRING 2020'),
(14, 'CSC342', 'Operating Systems', 'SPRING 2020'),
(15, 'CSC301', 'Computers And Society', 'SPRING 2020'),
(16, 'CSC401', 'Analysis Of Algorithms', 'SPRING 2020'),
(17, 'CSC481', 'Software Engineering', 'SPRING 2020'),
(18, 'CSC492', 'Senior Design', 'SPRING 2020'),
(19, 'MAT321', 'Probability and Statistics', 'SPRING 2020'),
(20, 'CSC411', 'Artificial Intelligence', 'SPRING 2020'),
(21, 'CSC421', 'Advanced Programming Languages', 'SPRING 2020'),
(22, 'CSC431', 'Advanced Computer Organization', 'SPRING 2020'),
(23, 'CSC441', 'Advanced Operating Systems', 'SPRING 2020'),
(24, 'CSC451', 'Computer Networks', 'SPRING 2020'),
(25, 'CSC453', 'Data Management', 'SPRING 2020'),
(26, 'CSC455', 'WWW Design and Management', 'SPRING 2020'),
(27, 'CSC459', 'Security Engineering', 'SPRING 2020'),
(28, 'CSC461', 'Computer Graphics I', 'SPRING 2020'),
(29, 'CSC463', 'Computer Graphics II', 'SPRING 2020'),
(30, 'CSC471', 'Compiler Construction I', 'SPRING 2020'),
(31, 'CSC490', 'Senior Seminar', 'SPRING 2020'),
(32, 'MAT367', 'Numerical Analysis I', 'SPRING 2020'),
(33, 'MAT369', 'Numerical Analysis II', 'SPRING 2020');

-- --------------------------------------------------------

--
-- Table structure for table `selected_course`
--

CREATE TABLE `selected_course` (
  `SELECTED_COURSE_ID` int(11) NOT NULL,
  `STUDENT_ID` varchar(9) DEFAULT NULL,
  `COURSE_ABBR` varchar(6) DEFAULT NULL,
  `COURSE_NAME` varchar(50) DEFAULT NULL,
  `TERM` varchar(15) DEFAULT NULL,
  `TERM_ID` int(1) DEFAULT NULL,
  `YEAR` int(4) DEFAULT NULL,
  `ADDED_AT` timestamp NULL DEFAULT NULL,
  `APPROVED_AT` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selected_course`
--

INSERT INTO `selected_course` (`SELECTED_COURSE_ID`, `STUDENT_ID`, `COURSE_ABBR`, `COURSE_NAME`, `TERM`, `TERM_ID`, `YEAR`, `ADDED_AT`, `APPROVED_AT`) VALUES
(35, '111111111', 'MAT193', 'Calculus II', 'SPRING', 2, 2021, '2020-12-03 11:16:43', NULL),
(37, '111111111', 'CSC123', 'Intro to CS & Programming II', 'WINTER', 1, 2021, '2020-12-10 06:43:30', '2020-12-09 17:33:27'),
(39, '111111111', 'CSC311', 'Data Structures', 'SUMMER', 3, 2021, '2020-12-03 11:33:56', NULL),
(45, '000000000', 'MAT193', 'Calculus II', 'WINTER', 1, 2021, '2020-12-09 17:43:02', '2020-12-09 17:43:16'),
(46, '000000000', 'CSC123', 'Intro to CS & Programming II', 'WINTER', 1, 2021, '2020-12-09 17:43:02', '2020-12-09 17:43:16'),
(47, '000000000', 'CSC221', 'Assem. Lang. & Intro to Comp. Org.', 'WINTER', 1, 2021, '2020-12-09 17:43:02', '2020-12-09 17:43:16'),
(48, '111111111', 'MAT191', 'Calculus I', 'FALL', 4, 2020, '2020-12-10 06:16:56', NULL),
(52, '111111111', 'PHY132', 'General Physics II', 'FALL', 4, 2021, '2020-12-10 07:13:28', NULL),
(53, '111111111', 'CSC221', 'Assem. Lang. & Intro to Comp. Org.', 'FALL', 4, 2021, '2020-12-10 07:13:28', NULL),
(54, '111111111', 'CSC321', 'Programming Languages', 'FALL', 4, 2021, '2020-12-10 07:13:28', NULL),
(55, '111111111', 'CSC331', 'Computer Organization', 'FALL', 4, 2021, '2020-12-10 07:13:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s_session`
--

CREATE TABLE `s_session` (
  `SESSION_ID` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `mi` varchar(1) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `session_status` varchar(1) DEFAULT NULL,
  `session_date` varchar(30) DEFAULT NULL,
  `session_start` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_session`
--

INSERT INTO `s_session` (`SESSION_ID`, `student_id`, `title`, `first_name`, `mi`, `last_name`, `suffix`, `email`, `session_status`, `session_date`, `session_start`) VALUES
(31, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'plee94@toromail.csudh.edu', NULL, '2020-11-18', '2020-11-18 01:31:22'),
(32, 123456789, NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', NULL, '2020-11-18', '2020-11-18 20:38:11'),
(33, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'plee94@toromail.csudh.edu', NULL, '2020-11-19', '2020-11-19 04:55:36'),
(34, 123456789, NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', NULL, '2020-11-19', '2020-11-19 04:58:56'),
(35, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'plee94@toromail.csudh.edu', NULL, '2020-11-19', '2020-11-19 05:07:39'),
(36, 123456789, NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', NULL, '2020-11-19', '2020-11-19 05:26:58'),
(37, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'plee94@toromail.csudh.edu', NULL, '2020-11-23', '2020-11-23 20:10:42'),
(38, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'plee94@toromail.csudh.edu', NULL, '2020-12-03', '2020-12-03 01:33:51'),
(39, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'plee94@toromail.csudh.edu', NULL, '2020-12-04', '2020-12-04 00:11:47'),
(40, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'patrick@toromail.csudh.edu', NULL, '2020-12-09', '2020-12-09 22:13:53'),
(41, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'patrick@toromail.csudh.edu', NULL, '2020-12-09', '2020-12-09 23:12:47'),
(42, 111111111, NULL, 'Patrick', 'Z', 'Lee', NULL, 'patrick@toromail.csudh.edu', NULL, '2020-12-09', '2020-12-09 23:39:24'),
(43, 0, 'Mr.', 'Donald', NULL, 'Trump', NULL, 'donald@trump.com', NULL, '2020-12-10', '2020-12-10 00:13:50'),
(44, 0, 'Mr.', 'Donald', NULL, 'Trump', NULL, 'donald@trump.com', NULL, '2020-12-10', '2020-12-10 00:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `ID` int(11) NOT NULL,
  `TERM_NAME` varchar(8) NOT NULL,
  `TERM_VALUE` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`ID`, `TERM_NAME`, `TERM_VALUE`) VALUES
(1, 'WINTER', 1),
(3, 'SPRING', 2),
(4, 'SUMMER', 3),
(5, 'FALL', 4);

-- --------------------------------------------------------

--
-- Table structure for table `unverified_adviser`
--

CREATE TABLE `unverified_adviser` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(10) DEFAULT NULL,
  `FIRST_NAME` varchar(20) DEFAULT NULL,
  `MI` varchar(1) DEFAULT NULL,
  `LAST_NAME` varchar(20) DEFAULT NULL,
  `SUFFIX` varchar(7) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `DEPARTMENT` varchar(30) DEFAULT NULL,
  `OFFICE` varchar(30) DEFAULT NULL,
  `HASH_PW` varchar(60) DEFAULT NULL,
  `EMAIL_VERIFIED` timestamp NULL DEFAULT NULL,
  `CREATED` timestamp NULL DEFAULT NULL,
  `UPDATED` timestamp NULL DEFAULT NULL,
  `VERIFICATION_TOKEN` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unverified_adviser`
--

INSERT INTO `unverified_adviser` (`ID`, `TITLE`, `FIRST_NAME`, `MI`, `LAST_NAME`, `SUFFIX`, `EMAIL`, `DEPARTMENT`, `OFFICE`, `HASH_PW`, `EMAIL_VERIFIED`, `CREATED`, `UPDATED`, `VERIFICATION_TOKEN`) VALUES
(6, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', 'Computer Science', 'WH-A100', '$2y$10$vOjeTSaWP.8U/eoVl0k/h.fmxlOD8iQRUkJJSfljp90lOIH8gaJ4m', '2020-10-24 03:20:52', '2020-10-24 03:20:44', '2020-10-24 03:20:44', '50gJN5GxWaJmuhjAMnZBBth5Qha2Iyqjbi7hfDNb'),
(7, 'Dr.', 'You', NULL, 'Me', NULL, 'you@me.com', 'Computer Science', 'WH-A100', '$2y$10$6Tq5DUJJY6KToRsN9Astoex4WWM42SZkkLPHRMfdVfdKDO47FpTHC', NULL, '2020-11-05 09:06:20', '2020-11-05 09:06:20', 'zme3AZeW2s3HMC039Lv9rtptfLabwOi2WpE1HQlt'),
(8, NULL, 'Me', NULL, 'You', NULL, 'me@you.com', 'fdjsl', 'fdasjl', '$2y$10$DKkVKNXodHRCbX2g/0R.S.KA1uxYgQdtF0/tnuSYkRtUM.Hkr.XwG', NULL, '2020-11-05 13:22:50', '2020-11-05 13:22:50', '5Wyvf3Pcx1ut7p8i5HsEGR5ORwGBdVBfgTXWtvZq'),
(11, NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', 'fdsjkl', 'fdjskl', '$2y$10$yCK7SEX7/Q3rGoaDakHWGuUOGI/XkoBuye4YnK7vfV3revsM3YhU.', '2020-11-06 08:15:27', '2020-11-06 08:14:22', '2020-11-06 08:14:22', 'MwGxwQimJGKmRhTjAAXdWtz7i995tDKoBmXmMnPv'),
(14, 'Mr.', 'Patrick', NULL, 'Lee', NULL, 'plee94@toromail.csudh.edu', 'Computer Science', 'WH-A100', '$2y$10$iyyaOZy6Ragyx7N9BfXgNe6zFi6WkO1uRblhSNaNuSe9amLDJ5Cf.', '2020-12-10 06:02:07', '2020-12-10 05:58:57', '2020-12-10 05:58:57', 'GqjJNamBATKF5mBZKxiZ51OSV3v8akzikT4zzXSy');

-- --------------------------------------------------------

--
-- Table structure for table `unverified_student`
--

CREATE TABLE `unverified_student` (
  `ID` int(11) NOT NULL,
  `SID` varchar(9) DEFAULT NULL,
  `TITLE` varchar(10) DEFAULT NULL,
  `FIRST_NAME` varchar(20) DEFAULT NULL,
  `MI` varchar(1) DEFAULT NULL,
  `LAST_NAME` varchar(20) DEFAULT NULL,
  `SUFFIX` varchar(7) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `EMAIL_VERIFIED` timestamp NULL DEFAULT NULL,
  `HASH_PW` varchar(60) DEFAULT NULL,
  `CREATED` timestamp NULL DEFAULT NULL,
  `UPDATED` timestamp NULL DEFAULT NULL,
  `VERIFICATION_TOKEN` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unverified_student`
--

INSERT INTO `unverified_student` (`ID`, `SID`, `TITLE`, `FIRST_NAME`, `MI`, `LAST_NAME`, `SUFFIX`, `EMAIL`, `EMAIL_VERIFIED`, `HASH_PW`, `CREATED`, `UPDATED`, `VERIFICATION_TOKEN`) VALUES
(665, NULL, NULL, 'JOSE', 'M', 'GONZALEZ', 'MR.', 'WHO.JOSE.GONZALEAZ@GMAIL.COM', NULL, NULL, NULL, NULL, '0'),
(687, '111111111', NULL, 'Patrick', 'Z', 'Lee', NULL, 'patrick@toromail.csudh.edu', '2020-10-16 15:27:20', '$2y$10$Cvsnph/SNPc9roJIxIMgA.EQ6j.StotM.0U3.WxUqO2/UjOyRRKNW', '2020-10-16 15:27:10', '2020-10-16 15:27:10', 'LbaPC8VPcrkQMk49uZbIgrnX2oRt5jFgJ7u1FxrS'),
(689, NULL, NULL, 'John', NULL, 'Doe', NULL, 'johndoe@gmail.com', NULL, '$2y$10$3J7zEIoHOnCRY1UZHGiGFejBWZsfqYk0QRLW/yZ2bgMDbqQfWLDHu', '2020-10-22 09:08:23', '2020-10-22 09:08:23', 'se98m7hWemcaev86uXb4Afrg0tBS2ATUqTyDSuOU'),
(690, NULL, NULL, 'student', NULL, 'name', NULL, 'student@gmail.com', NULL, '$2y$10$U64Y/1kEDpMXYmq/HlsJFOH58u0ANmas5Be5YnfUZQYyDWwnVpOeK', '2020-10-22 10:29:00', '2020-10-22 10:29:00', 'lGobyU1XcSywWVL9sSC6ZgCIgJSN5E58I28XkYJy'),
(691, NULL, NULL, 'john', NULL, 'smith', NULL, 'smith@jfgdkal.com', NULL, '$2y$10$JeOlMzwD4eZgGZIWkAmZN..uT5HHY4T5cW9uyZiB4koG2EUdWtj9O', '2020-10-22 10:29:48', '2020-10-22 10:29:48', 'LGyForkbBVoJp2aUCPkKRkep7Z7Js8Vo0YYcybpl'),
(692, NULL, NULL, 'luna', NULL, 'lovegood', NULL, '1@g.com', '2020-10-22 10:38:35', '$2y$10$KzNdBAkN71EngG0qmH/ecuJD7eR2QTu9HMLDFEVSmX4EgYhDoBXly', '2020-10-22 10:38:29', '2020-10-22 10:38:29', 'MN0jb2sNXWB8CTEytax7ToftGpsle7QrxXpkniMI'),
(713, NULL, NULL, 'Angie', 'K', 'Jho', 'III', 'angjho123@gmail.com', '2020-10-24 03:42:26', '$2y$10$pm1pn.eZVYehEOXwTZtt0ebFAGsHkfFuGDQrCieJLNPDSupAUGxG2', '2020-10-24 03:40:59', '2020-10-24 03:40:59', 'GD16pAnQrMf2lzuiRHYtdlWmyus0cZ91uneanyFt'),
(714, NULL, NULL, 'Baby', NULL, 'BJ', NULL, 'baby@bj.com', NULL, '$2y$10$UeugcGP3rie4WTkbp2PhruQw1gSYzHlZun02hgZ/oD2tF6IUOXtz6', '2020-11-04 13:41:03', '2020-11-04 13:41:03', 's9R5lQHWGtAG7xMRITqmW1lJDxLzlhmad9pgqXGP'),
(715, NULL, NULL, 'Larry', NULL, 'Yao', NULL, 'yaowzers@gmail.com', '2020-11-05 08:46:35', '$2y$10$jn7Dyz7eg6an07TPVm76mux88B8heGPaIgfNPVnNIIGtoQA7i/orW', '2020-11-05 08:45:36', '2020-11-05 08:45:36', 'HIcaAgQtlzEDvMJSb5bji0NpQp8M4DE5OrSEN9eG'),
(716, NULL, NULL, 'blah', NULL, 'blah', NULL, 'blah@gmail.com', NULL, '$2y$10$qOt62dFg1U504FveKvhzQeL7yxpusZvZ8qEy/RH86plvQiH3g0bBG', '2020-11-05 13:23:22', '2020-11-05 13:23:22', 'eZqyknn10Riy2aQLJB3OoXpRFiXGXp3RvO29jFC4'),
(719, '000000000', 'Mr.', 'Donald', NULL, 'Trump', NULL, 'donald@trump.com', '2020-11-06 17:12:27', '$2y$10$Ng/6gG9LTo5uFuuf5jN5YuRuuramJ6LDWuqbnFzCGvHlXypM8GjsC', '2020-11-06 17:10:20', '2020-11-06 17:10:20', 'bu4yE1h2JYvZkmqSXMLPz4GMvPBGjc1HAa3DlCPP'),
(720, '123456789', NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', '2020-11-19 04:37:12', '$2y$10$wF.uTx/8h0gTO6.4G5M7D.cBNWwYpK7M8vgebjmiKnwaznPxp0Xdm', '2020-11-19 04:36:56', '2020-11-19 04:36:56', 'fKtiMiR30N0YajfNQ75wuijUhiYhfA3Rc3PK8E4K');

-- --------------------------------------------------------

--
-- Table structure for table `verified_adviser`
--

CREATE TABLE `verified_adviser` (
  `ADVISER_ID` int(11) NOT NULL,
  `TITLE` varchar(10) DEFAULT NULL,
  `FIRST_NAME` varchar(20) DEFAULT NULL,
  `MI` varchar(1) DEFAULT NULL,
  `LAST_NAME` varchar(20) DEFAULT NULL,
  `SUFFIX` varchar(5) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `DEPARTMENT` varchar(50) DEFAULT NULL,
  `OFFICE` varchar(50) DEFAULT NULL,
  `CREATED` timestamp NULL DEFAULT NULL,
  `UPDATED` timestamp NULL DEFAULT NULL,
  `HASH_PW` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verified_adviser`
--

INSERT INTO `verified_adviser` (`ADVISER_ID`, `TITLE`, `FIRST_NAME`, `MI`, `LAST_NAME`, `SUFFIX`, `EMAIL`, `DEPARTMENT`, `OFFICE`, `CREATED`, `UPDATED`, `HASH_PW`) VALUES
(2, 'Prof.', 'Patrick', 'Z', 'Lee', NULL, 'zpatricklee@gmail.com', 'Computer Science', 'WH-A100', '2020-10-24 03:20:52', '2020-10-24 03:20:52', '$2y$10$vOjeTSaWP.8U/eoVl0k/h.fmxlOD8iQRUkJJSfljp90lOIH8gaJ4m'),
(3, NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', 'fdsjkl', 'fdjskl', '2020-11-06 08:15:27', '2020-11-06 08:15:27', '$2y$10$yCK7SEX7/Q3rGoaDakHWGuUOGI/XkoBuye4YnK7vfV3revsM3YhU.');

-- --------------------------------------------------------

--
-- Table structure for table `verified_student`
--

CREATE TABLE `verified_student` (
  `STUDENT_ID` int(11) NOT NULL,
  `SID` varchar(9) DEFAULT NULL,
  `TITLE` varchar(10) DEFAULT NULL,
  `FIRST_NAME` varchar(20) DEFAULT NULL,
  `MI` varchar(1) DEFAULT NULL,
  `LAST_NAME` varchar(20) DEFAULT NULL,
  `SUFFIX` varchar(7) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ADVISER` varchar(50) DEFAULT NULL,
  `REMOVE_HOLD_FOR` varchar(12) DEFAULT NULL,
  `LAST_MEETING` timestamp NULL DEFAULT NULL,
  `CREATED` timestamp NULL DEFAULT NULL,
  `UPDATED` timestamp NULL DEFAULT NULL,
  `HASH_PW` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verified_student`
--

INSERT INTO `verified_student` (`STUDENT_ID`, `SID`, `TITLE`, `FIRST_NAME`, `MI`, `LAST_NAME`, `SUFFIX`, `EMAIL`, `ADVISER`, `REMOVE_HOLD_FOR`, `LAST_MEETING`, `CREATED`, `UPDATED`, `HASH_PW`) VALUES
(665555555, NULL, '', 'JOSE M GONZALEZ', NULL, NULL, NULL, 'WHO.JOSE.GONZALEZ@GMAIL.COM', 'DR. MOHSEN BEHESHTI', NULL, NULL, NULL, NULL, '123456'),
(665555556, '111111111', NULL, 'Patrick', 'Z', 'Lee', NULL, 'patrick@toromail.csudh.edu', NULL, 'FALL 2020', '2020-12-10 08:04:14', '2020-10-16 15:27:20', '2020-10-16 15:27:20', '$2y$10$Cvsnph/SNPc9roJIxIMgA.EQ6j.StotM.0U3.WxUqO2/UjOyRRKNW'),
(665555557, NULL, NULL, 'luna', NULL, 'lovegood', NULL, '1@g.com', NULL, NULL, NULL, '2020-10-22 10:38:35', '2020-10-22 10:38:35', '$2y$10$KzNdBAkN71EngG0qmH/ecuJD7eR2QTu9HMLDFEVSmX4EgYhDoBXly'),
(665555563, '000000000', 'Mr.', 'Donald', NULL, 'Trump', NULL, 'donald@trump.com', NULL, 'WINTER 2021', '2020-12-09 17:43:22', '2020-11-06 17:12:27', '2020-11-06 17:12:27', '$2y$10$Ng/6gG9LTo5uFuuf5jN5YuRuuramJ6LDWuqbnFzCGvHlXypM8GjsC'),
(665555564, '123456789', NULL, 'Luna', NULL, 'Cat', NULL, 'luna@cat.com', NULL, NULL, NULL, '2020-11-19 04:37:12', '2020-11-19 04:37:12', '$2y$10$wF.uTx/8h0gTO6.4G5M7D.cBNWwYpK7M8vgebjmiKnwaznPxp0Xdm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adviser_notes`
--
ALTER TABLE `adviser_notes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `a_session`
--
ALTER TABLE `a_session`
  ADD PRIMARY KEY (`SESSION_ID`);

--
-- Indexes for table `completed_courses`
--
ALTER TABLE `completed_courses`
  ADD PRIMARY KEY (`COMPLETED_COURSES_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `selected_course`
--
ALTER TABLE `selected_course`
  ADD PRIMARY KEY (`SELECTED_COURSE_ID`);

--
-- Indexes for table `s_session`
--
ALTER TABLE `s_session`
  ADD PRIMARY KEY (`SESSION_ID`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `unverified_adviser`
--
ALTER TABLE `unverified_adviser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `unverified_student`
--
ALTER TABLE `unverified_student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `verified_adviser`
--
ALTER TABLE `verified_adviser`
  ADD PRIMARY KEY (`ADVISER_ID`);

--
-- Indexes for table `verified_student`
--
ALTER TABLE `verified_student`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adviser_notes`
--
ALTER TABLE `adviser_notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `a_session`
--
ALTER TABLE `a_session`
  MODIFY `SESSION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `completed_courses`
--
ALTER TABLE `completed_courses`
  MODIFY `COMPLETED_COURSES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `selected_course`
--
ALTER TABLE `selected_course`
  MODIFY `SELECTED_COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `s_session`
--
ALTER TABLE `s_session`
  MODIFY `SESSION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unverified_adviser`
--
ALTER TABLE `unverified_adviser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unverified_student`
--
ALTER TABLE `unverified_student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT for table `verified_adviser`
--
ALTER TABLE `verified_adviser`
  MODIFY `ADVISER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verified_student`
--
ALTER TABLE `verified_student`
  MODIFY `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665555565;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
