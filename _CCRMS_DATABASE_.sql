-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 09:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ccrms`
--
CREATE DATABASE IF NOT EXISTS `ccrms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ccrms`;

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE IF NOT EXISTS `case` (
`case_ref` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `criminal_id` int(11) NOT NULL,
  `crime_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`case_ref`, `status`, `criminal_id`, `crime_id`, `reporter_id`) VALUES
(10, 'Pending Review', 54, 70, 57),
(11, 'Pending Review', 55, 71, 58),
(12, 'Pending Review', 56, 72, 59),
(13, 'Pending Review', 57, 73, 60),
(14, 'Pending Review', 58, 74, 61),
(15, 'Pending Review', 59, 75, 62),
(16, 'Pending Review', 60, 76, 63),
(17, 'Pending Review', 61, 77, 64),
(18, 'Pending Review', 62, 78, 65),
(19, 'Pending Review', 63, 80, 67),
(20, 'Pending Review', 64, 81, 68),
(22, 'Suspended', 66, 83, 70),
(24, 'Jailed', 68, 85, 72),
(25, 'Most Wanted', 69, 86, 73),
(26, 'Pending Review', 70, 87, 74),
(27, 'Convicted', 71, 88, 75),
(28, 'Under Investigation', 72, 89, 76),
(29, 'Most Wanted', 73, 90, 77),
(30, 'Under Investigation', 74, 91, 78),
(31, 'Pending Review', 75, 92, 79),
(33, 'Convicted', 77, 94, 81),
(34, 'Suspended', 78, 95, 82),
(35, 'Wanted', 79, 96, 83),
(67, 'Pending Trial', 76, 93, 80),
(76, 'Convicted', 65, 82, 69),
(89, 'Dismissed', 67, 84, 71);

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE IF NOT EXISTS `crime` (
`crime_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `description` longtext NOT NULL,
  `occurrence_location` varchar(200) NOT NULL,
  `occurrence_date` varchar(20) NOT NULL,
  `report_date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`crime_id`, `type`, `description`, `occurrence_location`, `occurrence_date`, `report_date`) VALUES
(81, 'Rape', 'what it is and where to get help. How we compile the crime table. In light of professional advice, the data presented is of the crimes most relevant to students: robbery, burglary, and violence and sexual crimes.', 'Nc4 Ground 2nd toilet', ' 2019 11 03', 'Monday-11-Nov-2019'),
(82, 'Corruption', '', 'Student Union Building', '2019-11-01 ', 'Monday-11-Nov-2019'),
(83, 'Rape', '', 'Nc2', '2019-11-02 ', 'Monday-11-Nov-2019'),
(84, 'Theft', '', 'nc4 ', '2019-10-18 ', 'Monday-11-Nov-2019'),
(85, 'Theft', 'My roommate stole all of my food and pocket money', 'Nc3 F43', '2019-09-12 ', 'Monday-11-Nov-2019'),
(86, 'Drug Abuse', 'A heated Argument resulted in the exchange of blows. ', 'pavilion', '2019-10-31 ', 'Monday-11-Nov-2019'),
(87, 'Fighting', 'Two students fought in the foyer over elections campaign', 'Nc4', '2019-10-13 ', 'Monday-11-Nov-2019'),
(88, 'Theft', 'Stole roommate''s food and sold it								\r\n							', 'nc1', '2019-09-30 ', 'Monday-11-Nov-2019'),
(89, 'Burglary', '', 'Diamond car park', '2019-10-25 ', 'Monday-11-Nov-2019'),
(90, 'Arson', 'No further details available								\r\n							', 'Chapel grounds', '2019-10-06 ', 'Monday-11-Nov-2019'),
(91, 'Corruption', '', 'Faculty of commerce bulding', '2019-11-07 ', 'Monday-11-Nov-2019'),
(92, 'Theft', 'I stole my phone and sold it														\r\n							', 'Library', '2019-09-18 ', 'Monday-11-Nov-2019'),
(93, 'Fighting', 'Two students were fighting against one student over a misunderstanding on lan ports', 'Compuer science ', '2019-11-07 ', 'Monday-11-Nov-2019'),
(94, 'Theft', 'Test Sithole stole a LAN cable in the Computer Science software lab and slided it into his setchel.\r\nHe also disconnected a Mouse from the local Host and put it in setchel again. I believe this is not the first time he has done this', 'Computer Science SL', '2019-09-27 ', 'Sunday-17-Nov-2019'),
(95, 'Theft', 'Oscar was caught with 9 Laptops and 17 mobile phones in his room. The Manfred Hodson Warden suspected Oscar after seeing him with carrying 3 Laptops heading to his room. ', 'Manfred Hodson', '2019-10-18', 'Sunday-17-Nov-2019'),
(96, 'Theft', 'Oscar was caught with 9 Laptops and 17 mobile phones in his room. The Manfred Hodson Warden suspected Oscar after seeing him with carrying 3 Laptops heading to his room. The Warden followed Oscar to his room and knocked but he didnt open, but from knowing that he was in there, he kept knocking until he opened the door. He got inside and saw a pile of Laptops in his closet. The warden immediately called the Janitor on duty, but Oscar got rid of the Warden''s hand and fled								\r\n							', 'Manfred Hodson', '2019-10-18', 'Sunday-17-Nov-2019');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE IF NOT EXISTS `criminal` (
`criminal_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `gender` text NOT NULL,
  `postraiture` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`criminal_id`, `name`, `position`, `gender`, `postraiture`, `picture`) VALUES
(61, 'Rich', 'student', 'Female', 'If you are a college student who has been charged with a crime, whether a misdemeanor or a felony, the stakes are high. Your future, including continued attendance at your school and employment and graduate school opportunities, is hanging in the balance.\r\nAuthor: Pat W.', ''),
(62, 'John Doe', 'student', 'Male', 'School Crime and Safety - National Center for Education ...\r\nhttps://nces.ed.gov/programs/coe/indicator_cld.asp\r\n\r\nIn 2016, students ages 12–18 reported 749,000 nonfatal victimizations at school 1 and 601,000 nonfatal victimizations away from school. Nonfatal victimizations include theft and all violent crime. Violent crime includes serious violent crime (rape, sexual assault, robbery', ''),
(63, 'Mark', 'student', 'Male', 'Because crime can leave a profound mark on our students, campus safety has become an emotional issue that has shot to the forefront of the nation and local public sentiment. The goal is to increase the number of tips coming out of schools, colleges and universities.', ''),
(64, 'Serial Raper', 'works personnel', 'Male', 'Raped two students in the female toilets, pretending to be fixing leaking pipes', ''),
(65, 'Queen Bee', 'admin personnel', 'Male', 'what it is and where to get help. How we compile the crime table. In light of professional advice, the data presented is of the crimes most relevant to students: robbery, burglary, and violence and sexual crimes.', ''),
(66, 'Louis Jena', 'student', 'Male', 'Short, dark with hair locks', ''),
(67, 'Essnigga', 'student', 'Female', 'R185577S \r\nvet science', ''),
(68, 'Platinum Prince', 'student', 'Male', 'His reg number - R196372X\r\nProgram - Hacco\r\n', ''),
(69, 'Prosper', 'student', 'Female', 'R172748K', ''),
(70, 'Wesley Mlambo', 'student', 'Male', 'UnNamed part contesting President', ''),
(71, 'Prosper Mahuni', 'lecturer', 'Male', 'R165789V', ''),
(72, 'Murwisi', 'lecturer', 'Female', 'Radio graphics lecturer \r\n', ''),
(73, 'Paul Nyoka', 'other', 'Male', 'Anglican guest speaker', ''),
(74, 'Mr Munyanyi', 'lecturer', 'Male', 'Tall black guys. He drive honda fit to campus with registration number AEF 3788', ''),
(75, 'Tinotenda Mabayo', 'other', 'Male', 'Tall and light', ''),
(76, 'James and john', 'dacs personnel', 'Male', '', ''),
(77, 'Test Sithole', 'student', 'Male', 'The criminal is a 3.1Hbsctc student', ''),
(78, 'Oscar Tinaye Mhizha', 'student', 'Male', 'Sociology student\r\npart final\r\nreg Number R178882M', ''),
(79, 'Oscar Tinaye Mhizha', 'student', 'Male', 'Sociology student\r\npart final\r\nreg Number R178882M', '');

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE IF NOT EXISTS `evidence` (
  `crime_id` int(11) NOT NULL,
  `evidence_1` mediumblob NOT NULL,
  `evidence_2` mediumblob NOT NULL,
  `evidence_3` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evidence`
--

INSERT INTO `evidence` (`crime_id`, `evidence_1`, `evidence_2`, `evidence_3`) VALUES
(0, '', '', ''),
(0, '', '', ''),
(0, '', '', ''),
(0, '', '', ''),
(0, '', '', ''),
(0, '', '', ''),
(0, '', '', ''),
(0, '', '', ''),
(0, '', '', ''),
(24, '', '', ''),
(25, '', '', ''),
(26, '', '', ''),
(27, '', '', ''),
(28, '', '', ''),
(29, '', '', ''),
(30, '', '', ''),
(31, '', '', ''),
(32, '', '', ''),
(33, '', '', ''),
(34, '', '', ''),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, '', '', ''),
(45, '', '', ''),
(46, '', '', ''),
(51, '', '', ''),
(52, '', '', ''),
(53, '', '', ''),
(54, '', '', ''),
(55, '', '', ''),
(56, '', '', ''),
(57, '', '', ''),
(58, '', '', ''),
(59, '', '', ''),
(60, '', '', ''),
(61, '', '', ''),
(62, '', '', ''),
(63, '', '', ''),
(64, '', '', ''),
(65, '', '', ''),
(66, '', '', ''),
(67, '', '', ''),
(68, '', '', ''),
(69, '', '', ''),
(70, '', '', ''),
(71, '', '', ''),
(72, '', '', ''),
(73, '', '', ''),
(74, '', '', ''),
(75, '', '', ''),
(76, '', '', ''),
(77, '', '', ''),
(78, '', '', ''),
(80, '', '', ''),
(81, '', '', ''),
(82, '', '', ''),
(83, '', '', ''),
(84, '', '', ''),
(85, '', '', ''),
(86, '', '', ''),
(87, '', '', ''),
(88, '', '', ''),
(89, '', '', ''),
(90, '', '', ''),
(91, '', '', ''),
(92, '', '', ''),
(93, '', '', ''),
(94, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(255) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `position` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `surname`, `position`, `username`, `email`, `password`, `user_type`) VALUES
(5, 'Nimrod', 'Moyo', 'student', 'R18', 'nimrodjarimani@gmail.com', '25bbdcd06c32d477f7fa', ''),
(6, 'sec', 'sec', 'student', 'sec', 'sec@gmail.com', '74459ca3cf85a81df90d', ''),
(7, 'hhhhh', 'NNNN', 'student', 'red', 'Ghhzbxxbbshsjs@gmail.com', '4a7d1ed414474e4033ac', ''),
(8, 'sec', 'sec', 'student', 'sec', 'sec@sec.com', '74459ca3cf85a81df90d', ''),
(9, 's', 's', 'student', 's', 'sec@sec.com', '03c7c0ace395d80182db', ''),
(10, 's', 's', 'student', 's', 'sec@sec.com', '03c7c0ace395d80182db', ''),
(11, 'mm', 'mm', 'student', 'mm', 'mm@gmail.com', 'b3cd915d758008bd19d0', ''),
(12, 'ss', 'ss', 'student', 'sas', 'mm@gmail.com', '1a1dc91c907325c69271', ''),
(13, 'yy', 'yx', 'student', 'xzx', 'mm@gmail.com', '1a1dc91c907325c69271', ''),
(14, 'zsa', 's', 'student', 'sas', 'dfoslfd@hhhf', 's', ''),
(15, 'qq', 'qq', 'student', 'qq', 'dfolfdlfd@hhhf', 'qq', ''),
(16, 'wwwwwww', 'ro', 'student', 'hehj', 'dkkdsksk@efe.fe', 'ro', ''),
(17, 'tt', 'tt', 'student', 'trtrr', 'dfolfdlfd@hhhf', '822050d9ae3c47f54bee', ''),
(18, 'r', 'f', 'student', 'ff', 'mm@gmail.com', 'f', ''),
(19, 'exit', '00', 'student', 'R201', 'dkkdsksk@efe.fe', '00', ''),
(20, 'exit', 'tt', 'staff', 'Rexit', 'exit@gmail.com', 'tt', ''),
(21, 'fr', '00', 'staff', 'R12', 'exit@gmail.com', '00', ''),
(22, 'hg', '00', 'staff', 'yg,kbhf', 'dkkdsksk@efe.fe', '00', ''),
(23, 'hg', '00', 'staff', 'yg,kbhf', 'dkkdsksk@efe.fe', '00', ''),
(24, 'exit', 'pp', 'Security', 'op', 'sec@sec.com', 'pp', ''),
(25, 'ec', 'e', 'Security', 'uoij', 'newEntry@gmail.com', 'e', ''),
(26, 'ec', 'e', 'Security', 'uoij', 'newEntry@gmail.com', 'e', ''),
(27, 'juew', 'p', 'student', 'sas', 'exit@gmail.com', 'p', ''),
(28, 'a', 'a', 'Security', 'hjjh', 'Ghhzbxxbbshsjs@gmail.com', 'a', ''),
(29, 'afterloginsuccess', 'moyo', 'student', 'R2019H', 'success@gmail.com', '0000', ''),
(30, 'md5', 'encryption', 'Security', 'R2020H', 'sec@sec.com', '4a7d1ed414474e4033ac', ''),
(31, 'mm', 'mm', 'staff', 'mm', 'mm@gmail.com', 'b3cd915d758008bd19d0', ''),
(32, 'g', 'g', 'Security', 'g', 'exit@gmail.com', 'b2f5ff47436671b6e533', ''),
(33, 'uhj', 'fg', 'Security', 'dfk', 'exit@gmail.com', 'b2f5ff47436671b6e533', ''),
(34, 'qq', 'qq', 'staff', 'qq', 'Ghhzbxxbbshsjs@gmail.com', '099b3b060154898840f0', ''),
(35, 'aa', 'aa', 'staff', 'aa', 'exit@gmail.com', 'e0c9035898dd52fc65c4', ''),
(36, 'nimrod', 'Moyo', 'student', 'R2019', 'nimrodjarimani@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 'admin'),
(37, 'R2019', 'sfs', 'staff', 'R2019', 'dkkdsksk@efe.fe', '1aabac6d068eef6a7bad3fdf50a05cc8', ''),
(38, 'hhhhh', 'ds', 'Security', 'sfd', 'exit@gmail.com', '8277e0910d750195b448797616e091ad', ''),
(39, 'ssdd', 'dnmaa', 'staff', 'R18', 'dkkdsksk@efe.fe', '0cc175b9c0f1b6a831c399e269772661', 'user'),
(42, 'mukomana', 'donn', 'Security', 'security', 'donn@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'security'),
(43, 'under', 'classman', 'staff', 'uknown', 'under@joy.com', '4a7d1ed414474e4033ac29ccb8653d9b', ''),
(44, 'Mazvita', 'Makaka', 'student', 'R198454C', 'mazvitachiedza@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', ''),
(45, 'User', 'Example', 'staff', 'user', 'userclone@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'user'),
(46, 'Baba', 'Moyo', 'staff', 'baba', 'baba@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'user'),
(47, 'Android', 'Android', 'staff', 'android', 'android@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'user'),
(48, 'moyo', 'nimrod', 'student', 'R182000H', 'moyo@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'user'),
(50, 'tinotenda ', 'chingono', 'student', 'r183703b', 'tynoepee@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'user'),
(52, '', '', '', 'created', 'create@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'user_type'),
(53, '', '', '', 'creatore', 'create@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'security'),
(54, 'Tanyaradzwa Nobuhle', 'Mukwashi', 'student', 'R182759Z', 'tannymunchie@gmail.com', '06797763aae3cd3836c348b5adbbf397', 'user'),
(55, 'Tinotenda ', 'Chingono', 'student', 'R183703X', 'tynoepee@gmail', 'da88574880da0ce5ead74f5b2299887b', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `reporter`
--

CREATE TABLE IF NOT EXISTS `reporter` (
`reporter_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `position` text NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reporter`
--

INSERT INTO `reporter` (`reporter_id`, `name`, `position`, `gender`, `email`, `phone`) VALUES
(26, '', 'Student', 'Male', '', ''),
(27, '', 'Student', '', '', ''),
(28, '', 'Student', '', '', ''),
(29, '', 'Student', 'Male', '', ''),
(30, '', 'Student', 'Male', '', ''),
(31, '', 'Student', 'Male', '', ''),
(32, '', 'Student', '', '', ''),
(33, '', 'Student', '', '', ''),
(34, '', 'Student', '', '', ''),
(35, '', 'Student', '', '', ''),
(36, '', 'Student', '', '', ''),
(37, '', 'Student', '', '', ''),
(38, '', 'Student', '', '', ''),
(39, '', 'Student', '', '', ''),
(40, '', 'Student', '', '', ''),
(41, '', 'Student', '', '', ''),
(42, '', 'Student', '', '', ''),
(43, '', 'Student', '', '', ''),
(44, '', 'Student', '', '', ''),
(45, '', 'Student', '', '', ''),
(46, '', 'Student', '', '', ''),
(47, '', 'Student', '', '', ''),
(48, '', 'Student', '', '', ''),
(49, '', 'Student', '', '', ''),
(50, '', 'Student', '', '', ''),
(51, '', 'Student', '', '', ''),
(52, '', 'Student', '', '', ''),
(53, '', 'Student', '', '', ''),
(54, '', 'Student', '', '', ''),
(55, '', 'Student', '', '', ''),
(56, '', 'Student', '', '', ''),
(57, '', 'Student', '', '', ''),
(58, '', 'Student', 'Female', 'b@doop.com', '00987'),
(59, '', 'Student', '', '', ''),
(60, '', 'Student', '', '', ''),
(61, '', 'Student', '', '', ''),
(62, '', 'Student', '', '', ''),
(63, '', 'Student', '', '', ''),
(64, '', 'Student', '', '', ''),
(65, '', 'Student', '', '', ''),
(66, '', 'Student', '', '', ''),
(67, '', 'Student', '', '', ''),
(68, 'No Names', 'Student', 'Female', 'noName@gmail.com', '0771765476'),
(69, 'Secret Photographer', 'Student', 'Female', 'uzsecrets@photos.com', '0716665638'),
(70, 'Joseph Mafa', 'Student', 'Male', 'mafa@gmail.com', '07716547343'),
(71, 'Munchie', 'Student', 'Female', 'tannymunchie@gmail.com', '0718694785'),
(72, 'Wilson Banda', 'Student', 'Male', 'bwilson@gmail.com', '0776523541'),
(73, 'Munchie', 'Student', 'Male', 'tanny@gmail.com', '0719654870'),
(74, 'Nc4 PRO', 'Student', 'Female', 'publicrelationsofficer@nc4.com', '07765342182'),
(75, 'Mandy', 'Student', 'Female', 'mandy@gmail.com', '0782517712'),
(76, 'Alan Walker', 'Works Personnel', 'Male', 'walker@saints.com', '0775623455'),
(77, 'Angeline Munyeki', 'Student', 'Female', 'amunyeki@gmail.com', '0782345655'),
(78, '', 'Student', '', '', ''),
(79, 'Tinotenda Chingono', 'Other', 'Female', 'tino@gmail.com', '0786502232'),
(80, 'Rutendo MAtyanga', 'Student', 'Female', 'tino@gmail.com', '0785602232'),
(81, 'Not Releasing', 'Other', 'Female', 'underhover@gmail.com', '0775325612'),
(82, 'warden Manfred', 'Admin Personnel', 'Male', 'Lmatambo@manfred.com', '077828981'),
(83, 'warden Manfred', 'Admin Personnel', 'Male', 'Lmatambo@manfred.com', '077828981');

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE IF NOT EXISTS `victim` (
  `crime_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`crime_id`, `name`, `phone`) VALUES
(0, 'Vuln Moyo', 213131),
(0, 'Vuln Moyo', 213131),
(0, 'Vuln Moyo', 213131),
(0, 'Vuln Moyo', 213131),
(0, 'Vuln Moyo', 213131),
(0, 'Vuln Moyo', 213131),
(0, '', 0),
(0, 'bool neet', 345678),
(0, '', 0),
(24, '', 0),
(25, 'Vuln Moyo', 987898765),
(26, '', 0),
(27, '', 0),
(28, '', 0),
(29, '', 0),
(30, '', 0),
(31, '', 0),
(32, '', 0),
(33, '', 0),
(34, '', 0),
(35, '', 0),
(36, '', 0),
(37, '', 0),
(38, '', 0),
(39, '', 0),
(40, '', 0),
(41, '', 0),
(42, '', 0),
(43, '', 0),
(44, '', 0),
(45, '', 0),
(46, '', 0),
(50, '', 0),
(51, '', 0),
(52, '', 0),
(53, '', 0),
(54, '', 0),
(55, '', 0),
(56, '', 0),
(57, '', 0),
(58, '', 0),
(59, '', 0),
(60, '', 0),
(61, '', 0),
(62, '', 0),
(63, '', 0),
(64, '', 0),
(65, '', 0),
(66, '', 0),
(67, '', 0),
(68, '', 0),
(69, '', 0),
(70, '', 0),
(71, 'pool broopl', 76543234),
(72, '', 0),
(73, '', 0),
(74, '', 0),
(75, '', 0),
(76, '', 0),
(77, '', 0),
(78, '', 0),
(80, '', 0),
(81, 'Vulnerable Chikasha', 775876927),
(82, 'Joyful Muparuri', 774326635),
(83, 'Guy Mubaiwa', 775463762),
(84, 'Jewel Moyo', 775478968),
(85, 'Aslam Mberikwazvo', 772456321),
(86, 'Monalisa', 782687957),
(87, 'Polite Ruka', 723554563),
(88, 'Stella ', 779223663),
(89, 'Goodwill Mambo', 771345657),
(90, 'George Mufuzhe', 785624552),
(91, 'My classmames', 0),
(92, 'Tinotenda CHingono', 785602232),
(93, '', 0),
(94, 'Computer Science department', 6232),
(95, '', 0),
(96, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vs_support`
--

CREATE TABLE IF NOT EXISTS `vs_support` (
`id` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `position` text NOT NULL,
  `gender` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `vs_problem` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vs_support`
--

INSERT INTO `vs_support` (`id`, `name`, `surname`, `position`, `gender`, `phone`, `email`, `vs_problem`) VALUES
(1, '', '', 'Student', '', '', '', 'Finally, its Functional\r\nyeeeeeee\r\niloveJESUS\r\nso Much\r\n'),
(2, 'mukomana', 'donn', 'Security', '', '077536', 'donn@gmail.com', 'Mukomana aint feeling well today\r\nyou have Paracetamol?'),
(3, 'newVictim', 'ungwo', 'DACs Personnel', 'Male', '098888', '', 'Sadza riri kunetsa kubika iri\r\nplease maGB akangomira ayo \r\nngavauye tishande'),
(4, '', '', 'Student', '', '', '', 'idgsd'),
(5, '', '', 'Student', '', '00000', '', 'hhhhhhhh'),
(6, '', '', 'Student', '', '62387', '', 'hgjjhsidios\r\n'),
(7, 'jk', '', 'Student', '', '38883', '', 'hjkdol;dkkdls'),
(8, 's', '', 'Student', '', '999', '', 'gaugyysab'),
(9, 'Baba', 'Moyo', 'staff', 'Male', '077777777', 'baba@gmail.com', 'im baba\r\nplease i need fees for my children \r\nimmediate assistence needed'),
(10, 'moyo', 'nimrod', 'student', 'Male', '0771', 'moyo@gmail.com', 'android submission test sample\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

CREATE TABLE IF NOT EXISTS `witness` (
  `crime_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `witness`
--

INSERT INTO `witness` (`crime_id`, `name`, `phone`) VALUES
(0, '', ''),
(0, '', ''),
(0, '', ''),
(0, '', ''),
(0, 'Vuln Moyo', ''),
(0, 'Munchie', '03339891'),
(0, 'good boy', ''),
(0, 'Munchie', '03339891'),
(0, 'good boy', ''),
(0, 'Munchie', '03339891'),
(0, 'good boy', ''),
(0, 'Munchie', '120090'),
(0, 'good boy', '03339891'),
(0, 'Munchie', '120090'),
(0, 'good boy', '03339891'),
(0, 'Munchie', '120090'),
(0, 'good boy', '03339891'),
(0, '', ''),
(0, '', ''),
(0, 'mellse', '567678909'),
(0, 'lucy more', '45678'),
(0, '', ''),
(0, '', ''),
(24, '', ''),
(24, '', ''),
(25, 'mellse', '8765767'),
(25, 'lucy more', '0987654578'),
(26, '', ''),
(26, '', ''),
(27, '', ''),
(27, '', ''),
(28, '', ''),
(28, '', ''),
(29, '', ''),
(29, '', ''),
(30, '', ''),
(30, '', ''),
(31, '', ''),
(31, '', ''),
(32, '', ''),
(32, '', ''),
(33, '', ''),
(33, '', ''),
(34, '', ''),
(34, '', ''),
(35, '', ''),
(35, '', ''),
(36, '', ''),
(36, '', ''),
(37, '', ''),
(37, '', ''),
(38, '', ''),
(38, '', ''),
(39, '', ''),
(39, '', ''),
(40, '', ''),
(40, '', ''),
(41, '', ''),
(41, '', ''),
(42, '', ''),
(42, '', ''),
(43, '', ''),
(43, '', ''),
(44, '', ''),
(44, '', ''),
(45, '', ''),
(45, '', ''),
(46, '', ''),
(46, '', ''),
(52, '', ''),
(52, '', ''),
(53, '', ''),
(53, '', ''),
(54, '', ''),
(54, '', ''),
(55, '', ''),
(55, '', ''),
(56, '', ''),
(56, '', ''),
(57, '', ''),
(57, '', ''),
(58, '', ''),
(58, '', ''),
(59, '', ''),
(59, '', ''),
(60, '', ''),
(60, '', ''),
(61, '', ''),
(61, '', ''),
(62, '', ''),
(62, '', ''),
(63, '', ''),
(63, '', ''),
(64, '', ''),
(64, '', ''),
(65, '', ''),
(65, '', ''),
(66, '', ''),
(66, '', ''),
(67, '', ''),
(67, '', ''),
(68, '', ''),
(68, '', ''),
(69, '', ''),
(69, '', ''),
(70, '', ''),
(70, '', ''),
(71, 'cloe nuty', '67122354'),
(71, 'boo vert', '12345678'),
(72, '', ''),
(72, '', ''),
(73, '', ''),
(73, '', ''),
(74, '', ''),
(74, '', ''),
(75, '', ''),
(75, '', ''),
(76, '', ''),
(76, '', ''),
(77, '', ''),
(77, '', ''),
(78, '', ''),
(78, '', ''),
(80, '', ''),
(80, '', ''),
(81, 'elsa', '071987877'),
(81, 'Fred', '0773567784'),
(82, 'Prosper Nengomashi', '078657622'),
(82, 'Mukudzei Mukombe', '0774526762'),
(83, 'peter', '0775647824'),
(83, 'Alfred G', '0712674857'),
(84, 'Jarimani', '0718694355'),
(84, 'Sekani', '0779635478'),
(85, 'Nc2 janitor', '07853246512'),
(85, 'Jack Kombe', '0779213564'),
(86, 'Benjamin', '0716947856'),
(86, 'Kundai', '0774698357'),
(87, 'Nc4 janitor Mlambo', '0774358155'),
(87, 'Alice Dube', '0713584251'),
(88, 'Tania', '0786957358'),
(88, 'Farai', '0782698478'),
(89, 'Paul Washer', '0715658452'),
(89, 'Samuel Etto', '077213554'),
(90, 'Souel Mafamba', '0753254553'),
(90, '', '075358428'),
(91, 'Nimrod', '0785332663'),
(91, '', ''),
(92, 'Cheryl', '0714223358'),
(92, '', ''),
(93, 'Mellisa banda', '0789650864'),
(93, 'Tasimbiswa mazuru', '0789508784'),
(94, 'Monty Python', '0753254563'),
(94, 'Richard Piper', '0772563984'),
(95, 'Janitor Singo', '072781233'),
(95, 'Edgar Tekere', '0778267821'),
(96, 'Janitor Singo', '072781233'),
(96, 'Edgar Tekere', '0778267821');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case`
--
ALTER TABLE `case`
 ADD PRIMARY KEY (`case_ref`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
 ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
 ADD PRIMARY KEY (`criminal_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporter`
--
ALTER TABLE `reporter`
 ADD PRIMARY KEY (`reporter_id`);

--
-- Indexes for table `vs_support`
--
ALTER TABLE `vs_support`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
MODIFY `case_ref` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
MODIFY `crime_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
MODIFY `criminal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `reporter`
--
ALTER TABLE `reporter`
MODIFY `reporter_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `vs_support`
--
ALTER TABLE `vs_support`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
