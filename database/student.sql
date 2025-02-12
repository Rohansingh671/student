-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2024 at 08:53 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `addfeesgroup`
--

DROP TABLE IF EXISTS `addfeesgroup`;
CREATE TABLE IF NOT EXISTS `addfeesgroup` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `feesGroupID` varchar(30) NOT NULL,
  `feesGroup` varchar(30) NOT NULL,
  `feesGroupAmount` varchar(15) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `feesGroupStatus` varchar(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addfeesgroup`
--

INSERT INTO `addfeesgroup` (`ID`, `feesGroupID`, `feesGroup`, `feesGroupAmount`, `remark`, `feesGroupStatus`) VALUES
(25, 'FGID3', 'मुख्य सचिव(निजामती सेवा)', 'Rs  5000', 'The money you pay matters!!!!', 'Active'),
(24, 'FGID2', 'सचिव(निजामती सेवा)', 'Rs  4600', 'The money you pay matters!!!', 'Active'),
(23, 'FGID1', 'सहसचिव(निजामती सेवा)', 'Rs  4000', 'The money you pay to be taught!!!', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `addstudent`
--

DROP TABLE IF EXISTS `addstudent`;
CREATE TABLE IF NOT EXISTS `addstudent` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `imageOfStudent` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `academicYear` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admissionNumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admissionDate` date NOT NULL,
  `rollNumber` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `studentStatus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fnameOfStudent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lnameOfStudent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `section` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `bloodGroup` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `house` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `feesGroup` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `caste` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `primaryContact` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailOfstudent` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `motherTongue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `languageKnown` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imageOfFather` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fatherName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailOfFather` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fatherContact` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fatherProfession` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imageOfMother` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `motherName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailOfMother` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `motherContact` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `motherProfession` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardianName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardianRelation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardianContact` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardianEmail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guardianOccupation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `guardianAddress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imageOfGuardian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currentAddressOfStudent` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permanentAddressOfStudent` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `districtOfStudent` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provinceOfStudent` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transportRoute` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vehicleNumber` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pickUpPoint` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hostel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hostelRoomNumber` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `documentOfBirthCertificate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `documentOfTransferCertificate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `allergiesOfStudent` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `medicationOfStudent` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `previousSchoolName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `previousSchoolAddress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bankName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `branchOfBank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ifscNumber` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otherInfo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addsubject`
--

DROP TABLE IF EXISTS `addsubject`;
CREATE TABLE IF NOT EXISTS `addsubject` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` int NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addsubject`
--

INSERT INTO `addsubject` (`ID`, `subject_id`, `name`, `code`, `type`, `status`) VALUES
(21, 'SUBID3', 'सहसचिव(निजामती सेवा)', 103, 'Theory', 'Active'),
(20, 'SUBID2', 'सचिव(निजामती सेवा)', 102, 'Theory', 'Active'),
(19, 'SUBID1', 'मुख्य सचिव(निजामती सेवा)', 102, 'Theory', 'Active'),
(22, 'SUBID4', 'उपसचिव(निजामती सेवा)', 102, 'Theory', 'Active'),
(23, 'SUBID5', 'शाखा अधिकृत(निजामती सेवा)', 103, 'Theory', 'Active'),
(24, 'SUBID6', 'नायब सुब्बा(निजामती सेवा)', 104, 'Theory', 'Active'),
(25, 'SUBID7', 'खरिदार(निजामती सेवा)', 104, 'Theory', 'Active'),
(26, 'SUBID8', 'प्राथमिक तह(शिक्षक सेवा आयोग)', 101, 'Theory', 'Active'),
(27, 'SUBID9', 'निम्न माध्यमिक तह(शिक्षक सेवा आयोग)', 103, 'Theory', 'Active'),
(28, 'SUBID10', 'माध्यमिक तह(शिक्षक सेवा आयोग)', 102, 'Theory', 'Active'),
(32, 'SUBID11', 'English', 102, 'Theory', 'Active'),
(33, 'SUBID12', 'English', 102, 'Theory', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `addteacher`
--

DROP TABLE IF EXISTS `addteacher`;
CREATE TABLE IF NOT EXISTS `addteacher` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(15) NOT NULL,
  `teacher_image` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `primary_contact_number` varchar(10) NOT NULL,
  `qualification` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `work_experience` varchar(30) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `permanent_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `pan_number` varchar(10) NOT NULL,
  `class` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `date_of_joining` date NOT NULL,
  `language_known` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status_of_teacher` varchar(30) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `epf_no` varchar(20) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `contract_type` varchar(30) NOT NULL,
  `date_of_leaving` date NOT NULL,
  `work_shift` varchar(50) NOT NULL,
  `work_location` varchar(100) NOT NULL,
  `medical_leaves` int NOT NULL,
  `casual_leaves` int NOT NULL,
  `maternity_leaves` int NOT NULL,
  `sick_leaves` int NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `route` varchar(100) DEFAULT NULL,
  `vehicle_number` varchar(20) DEFAULT NULL,
  `pickup_point` varchar(100) DEFAULT NULL,
  `hostel` varchar(100) DEFAULT NULL,
  `room_number` varchar(10) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `joining_letter` varchar(255) DEFAULT NULL,
  `previous_school_name` varchar(100) NOT NULL,
  `previous_school_address` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `previous_school_contact_number` varchar(12) NOT NULL,
  `other_info` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addteacher`
--

INSERT INTO `addteacher` (`ID`, `teacher_id`, `teacher_image`, `first_name`, `last_name`, `gender`, `email_address`, `primary_contact_number`, `qualification`, `work_experience`, `address`, `permanent_address`, `date_of_birth`, `pan_number`, `class`, `subject`, `date_of_joining`, `language_known`, `status_of_teacher`, `marital_status`, `blood_group`, `father_name`, `mother_name`, `epf_no`, `basic_salary`, `contract_type`, `date_of_leaving`, `work_shift`, `work_location`, `medical_leaves`, `casual_leaves`, `maternity_leaves`, `sick_leaves`, `account_name`, `account_number`, `ifsc_code`, `bank_name`, `branch_name`, `route`, `vehicle_number`, `pickup_point`, `hostel`, `room_number`, `facebook`, `instagram`, `linkedin`, `twitter_url`, `youtube`, `resume`, `joining_letter`, `previous_school_name`, `previous_school_address`, `previous_school_contact_number`, `other_info`) VALUES
(11, 'TID01', 'avatar-01.jpg', 'Siddhanth', 'Sharma', 'Male', 'haitomns@gmail.com', '9825252525', 'Computer Experience', 'Typing Master', 'Pipara-14', 'Bariyarpur', '2024-12-17', '0021365489', 'Prahari Sewa', 'computer operator', '2024-12-18', 'English, Spanish', 'Active', 'Single', 'O +ve', 'Harishankar kurmi', 'Laxmi Devi', '895264', 520000.00, 'Permanent', '2024-12-19', 'Morning', 'Select', 20, 20, 20, 20, 'Harishanakar Prasad kurmi', '0012236548956', '12036648952', 'Sidhharth', 'Sidhhatrth', 'Denver', 'AM 54548', 'Cincinatti', 'Tranquil Haven', '20', 'www.facebook.com', 'www.instagram.com', 'www.linkedIn.com', 'www.twitter.com', 'www.youtube.com', 'boyle\'s_law_and_charle\'s_law_(1)_8633d4464ed0af57.pdf', 'daiton\'s_law,_grahams_law_cb2a5aca1d5212e3 (1).pdf', 'Shree Nrisingh', 'pipara', '9865656565', 'hello Teachers');

-- --------------------------------------------------------

--
-- Table structure for table `classdata`
--

DROP TABLE IF EXISTS `classdata`;
CREATE TABLE IF NOT EXISTS `classdata` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `classID` varchar(10) NOT NULL,
  `className` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `classStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classdata`
--

INSERT INTO `classdata` (`ID`, `classID`, `className`, `classStatus`) VALUES
(31, 'CID3', 'बैंक तथा वित्तिय सेवा', 'Active'),
(29, 'CID1', 'निजामती सेवा', 'Active'),
(30, 'CID2', 'शिक्षक सेवा आयोग', 'Inactive'),
(32, 'CID4', 'संस्थान सेवा', 'Active'),
(33, 'CID5', 'अन्य सेवाहरु', 'Active'),
(34, 'CID6', 'प्रहरी सेवा', 'Active'),
(35, 'CID7', 'Computer Operator', 'Active'),
(36, 'CID8', 'Public Service', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feescollection`
--

DROP TABLE IF EXISTS `feescollection`;
CREATE TABLE IF NOT EXISTS `feescollection` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `monthOf` varchar(20) NOT NULL,
  `StudentID` int NOT NULL,
  `AmountPaid` varchar(512) NOT NULL,
  `discount` varchar(40) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `PaidDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `StudentIDRef` (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smslogindata`
--

DROP TABLE IF EXISTS `smslogindata`;
CREATE TABLE IF NOT EXISTS `smslogindata` (
  `usersLoginID` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(320) NOT NULL,
  `userUsername` varchar(256) NOT NULL,
  `userPassword` varchar(256) NOT NULL,
  `userType` int NOT NULL,
  `userLastLogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usersLoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `smslogindata`
--

INSERT INTO `smslogindata` (`usersLoginID`, `userEmail`, `userUsername`, `userPassword`, `userType`, `userLastLogin`) VALUES
(7, 'haitomnsrohan2024@gmail.com', 'Haitomnsrohan', '$2y$10$d1kNlD4byLrUtVAu53kSpe2RevTS0QGFlULPMqGOTa/KX2ycWqtiW', 3, '2024-10-25 23:45:20'),
(8, 'haitomrohan2024@gmail.com', 'Haito', '$2y$10$wJWA5eY2wLKmBaPg0dTrI.tKE1eSsC/cw0W6F1AjrwnUc2tqc3iG2', 3, '2024-10-27 12:22:16'),
(9, 'haitorohan2024@gmail.com', 'Hait', '$2y$10$GU3ecntnOGlmf4hBs6UBjOOzTYKx3Q6jQ/bYEgXdoQ4Xp0daw7bZG', 3, '2024-10-27 12:22:36'),
(10, 'sankar@gmail.com', 'Rohan', '$2y$10$./kSAyhwAbfDsp0PmxvJPeqHqVBngnop/rrc/IpSWtQTSZWQhpZ5C', 3, '2024-10-27 12:33:32'),
(11, 'ram@gmail.com', 'Rambabu', '$2y$10$ZJsjcHt10b3YAHxXdP9/Neq.ZS17/1pSM8VGEV2Pi1LpNjnzkqs8q', 3, '2024-10-27 12:46:10'),
(12, 'sankar12@gmail.com', 'Haitomns', '$2y$10$9raxru8cS/XV9a/pK2Rh9unu1SaRdPw6ofnwiQC7dTYSCBTcLq6ti', 3, '2024-10-27 19:34:45'),
(13, 'sankar123@gmail.com', 'Haitomnsroha', '$2y$10$erKgCBO1AmX2QMTV8iP.7.M4fXxU8/gKUxzIhaI9GEKqAdGTdihi2', 3, '2024-10-27 22:48:00'),
(14, 'ashish@gmail.com', 'ashishgupta', '$2y$10$mUa9dksz3aG.Cqiv6NGUAu/dq3tNl/Mnp8ihg22597DsdtOI5bWhi', 3, '2024-10-27 23:02:52'),
(15, 'shyam123@gmail.com', 'Shyambabu', '$2y$10$jjr/VYmQ8N7CLjV6eeox7uEf226BJLWCosHZ7ybHEKZri6FaoNr2e', 3, '2024-10-28 16:41:36'),
(16, 'shyambabu234@gmail.com', 'mukesh', '$2y$10$1bVL3IQmfBKuEqerjGxQx.2RKYLqs8/CZLb1a1DKNf51.3doL87Dy', 3, '2024-12-08 11:15:47'),
(17, 'ariaeducation@gmail.com', 'ariaeducation', '$2y$10$RG5kcM22A2Hu8SOZKO5YEuE8e08f7ZjyHdjbo/X0LW0xIEzlUeJqO', 3, '2024-12-09 09:20:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feescollection`
--
ALTER TABLE `feescollection`
  ADD CONSTRAINT `StudentIDRef` FOREIGN KEY (`StudentID`) REFERENCES `addstudent` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
