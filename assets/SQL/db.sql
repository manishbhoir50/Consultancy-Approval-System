-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 08:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship_approval`
--

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `internship_id` int(11) NOT NULL,
  `Sdrn` varchar(15) NOT NULL,
  `location` varchar(100) NOT NULL,
  `Topic` varchar(100) NOT NULL,
  `Consultancy_Type` char(1) NOT NULL,
  `Company_Name` varchar(255) DEFAULT NULL,
  `Tentative_Amount` float NOT NULL,
  `Abstract` varchar(255) NOT NULL,
  `Members_Count` int(11) NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Date_submission` date NOT NULL,
  `development_cost` int(11) DEFAULT NULL,
  `taxes` int(11) DEFAULT NULL,
  `maintenance` varchar(255) DEFAULT NULL,
  `delivery_time` varchar(255) DEFAULT NULL,
  `HOD_Approval` tinyint(1) NOT NULL,
  `DC_Approval` tinyint(1) NOT NULL,
  `Principal_Approval` tinyint(1) NOT NULL,
  `Rejection_Reason` varchar(255) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `Outward_Number` varchar(70) DEFAULT NULL,
  `quotation` tinyint(1) NOT NULL DEFAULT 0,
  `consultancy_upload` tinyint(1) DEFAULT 0,
  `ongoing` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`internship_id`, `Sdrn`, `location`, `Topic`, `Consultancy_Type`, `Company_Name`, `Tentative_Amount`, `Abstract`, `Members_Count`, `From_Date`, `To_Date`, `Skills`, `Date_submission`, `development_cost`, `taxes`, `maintenance`, `delivery_time`, `HOD_Approval`, `DC_Approval`, `Principal_Approval`, `Rejection_Reason`, `status`, `Outward_Number`, `quotation`, `consultancy_upload`, `ongoing`) VALUES
(1, '400', 'Nerul', 'RAIT authentication system', 'I', NULL, 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2020-01-01', 'no required', '2001-01-01', 900, 0, 'zero charges for one year', '1 month', 1, 1, 1, '', 'completed', NULL, 1, 1, 1),
(2, '400', 'Thane', 'MU RRC system', 'O', 'Microsoft Organization', 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/09', 0, 0, 0),
(3, '400', '', 'Internship Approval', 'I', NULL, 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(4, '400', 'USA', 'Fake news', 'O', 'Rait', 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2001-01-01', 'phd', '2001-01-01', 6700, 7, 'zero charges for one year', '2 months', 1, 1, 1, '', 'approved', NULL, 1, 0, 0),
(5, '401', 'Thane', 'RAIT authentication system', 'I', 'Samsung', 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', 1200, 5, 'zero charges for three year', '5 months', 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/10', 1, 0, 0),
(6, '401', 'Amravati', 'MU RRC system', 'O', NULL, 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 1, 0, 0, '', 'approved by hod', NULL, 0, 0, 0),
(7, '401', 'Thane', 'Internship Approval', 'I', 'Samsung', 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', 890, 2, 'zero charges for one year', '2 month', 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/05', 1, 0, 0),
(8, '401', '', 'Fake news', 'O', NULL, 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2001-01-01', 'phd', '2001-01-01', 189, 19, '3', '2 months', 1, 1, 1, '', 'completed', 'vedit', 1, 1, 1),
(9, '402', '', 'RAIT authentication system', 'I', NULL, 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(10, '402', '', 'MU RRC system', 'O', NULL, 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(11, '402', '', 'Internship Approval', 'I', NULL, 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(12, '402', '', 'Fake news', 'O', NULL, 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2001-01-01', 'phd', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(13, '403', 'H 201,SHREE GURUDATTA CHS, AIROLI SEC 8A', 'RAIT authentication system', 'I', NULL, 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/IT/SDG-RAIT/2021-22/01', 0, 0, 0),
(14, '403', '', 'MU RRC system', 'O', NULL, 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(15, '403', '', 'Internship Approval', 'I', NULL, 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2020-03-23', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(16, '403', '', 'Fake news', 'O', NULL, 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2020-01-01', 'phd', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(17, '401', 'Nerul', 'machine learning new project', 'I', 'RAIT', 122, '../files/401/Form.pdf', 11, '2020-12-31', '2021-03-11', 'html', '2021-03-21', 10000, 12, 'zero charges for one year', 'one month', 1, 1, 1, '', 'approved', '4', 1, 0, 0),
(18, '401', 'H 201,SHREE GURUDATTA CHS, AIROLI SEC 8A', 'Android Developmemt', 'I', 'Apple', 122, '../files/401/Form.pdf', 2, '2021-03-09', '2021-03-31', 'html', '2021-03-22', 899, 8, 'zero charges for one year', '2 month', 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/06', 1, 0, 0),
(19, '401', 'abcf', 'Internship Ml', 'I', 'RAIT', 10000, '../files/401/Form.pdf', 2, '2021-03-16', '2021-03-31', 'html', '2021-03-22', 900, 18, 'zero charges for one year', '3 months', 1, 1, 1, '', 'completed', 'RAIT/computer/SDG-RAIT/2021-22/07', 1, 1, 1),
(20, '400', 'nerul, Navi Mumbai', 'Stock Prediction using ML', 'I', 'RAIT', 10000, '../files/400/2021 Scholarship form.pdf', 4, '2021-04-06', '2021-05-06', 'sql,html', '2021-04-14', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/08', 0, 0, 0),
(21, '401', 'h201, Airoli,Navi Mumbai', 'E-locker document management', 'O', 'RAIT', 1000, '../files/401/Experiment 1(DWM).pdf', 2, '2021-04-08', '2021-04-29', 'html', '2021-04-17', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(22, '401', 'Seattle', 'Inventory Management System', 'I', 'Apple', 1000, '../files/401/Most popular spoken english words.pdf', 9, '2021-06-09', '2021-09-23', 'sql,html', '2021-08-16', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(23, '401', 'Korea', 'Github', 'I', 'Samsung', 19000, '../files/401/Most popular spoken english words.pdf', 3, '2021-07-08', '2021-08-27', 'sql,html', '2021-08-17', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`internship_id`),
  ADD KEY `form_fk1` (`Sdrn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `internship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
