-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 10:33 AM
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
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Email_id` varchar(100) NOT NULL,
  `phone_no` bigint(12) NOT NULL,
  `OTP` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`username`, `password`, `Email_id`, `phone_no`, `OTP`, `role`) VALUES
('cshod', '1234', 'computerhodrait@gmail.com', 1234, '123', 'hod'),
('Dean', '1234', 'deanrait@gmail.com', 1234, '123', 'Dean'),
('princi', '1234', 'principalrait189@gmail.com', 1234, '123', 'principal'),
('shubham', '1234', 'shubhampatil65@gmail.com', 1234, '123', 'hod');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `acceptance` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `internship_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`acceptance`, `payment`, `internship_id`) VALUES
('../files/400/1/Untitled document.pdf', '../files/400/1/Untitled document.pdf', 1),
('../files/401/5/Most popular spoken english words.pdf', '../files/401/5/Most popular spoken english words.pdf', 5),
('../files/401/19/ChetanKhairnar_InternshalaResume.pdf', '../files/401/19/ChetanKhairnar_InternshalaResume.pdf', 19);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Sdrn` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Middle_name` varchar(20) DEFAULT NULL,
  `Last_name` varchar(20) DEFAULT NULL,
  `DOB` date NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Contact_no` bigint(10) NOT NULL,
  `Addr` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Doj` date NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `Desig` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `OTP` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Sdrn`, `First_name`, `Middle_name`, `Last_name`, `DOB`, `Department`, `Contact_no`, `Addr`, `Email`, `Doj`, `Qualification`, `Desig`, `Password`, `OTP`) VALUES
(0, 'sf', 'f', 'h', '2016-01-07', 'CE', 1234567890, '-', '@', '2016-01-12', 'ME pursuing', 'ap', '123', '1225dbb4'),
(7, 'test', NULL, NULL, '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', 'hncqx5d61o'),
(8, 'cshod', NULL, NULL, '0000-00-00', 'computer', 1234567890, '-', 'computerhodrait@gmail.com', '0000-00-00', '', '', '1234', 'hncqx5d61o'),
(150, 'Leena', NULL, 'Ragha', '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', NULL),
(197, 'Snehal', '', 'Gaikwad', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', '', '', '123', NULL),
(248, 'Arpita', 'Goutam', 'Palchoudhury', '1967-06-21', 'COMP', 1234567890, '-', '@', '2001-09-10', 'Ph.D  ( English Literature)', ' Associate Professor', '123', NULL),
(295, 'Vanita', NULL, 'Mane', '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', NULL),
(330, 'Namita', 'Damodar', 'Pulgam', '1983-09-10', 'COMP', 1234567890, '-', '@', '2005-12-23', 'M.E. Computer', 'A.P.', '123', 'bb9cad60'),
(374, 'Aditi', 'Sunil', 'Chhabria', '1984-07-23', 'COMP', 1234567890, '-', '@', '2006-07-17', 'M.E. Computers', 'Assistant Professor', '123', '362394c6'),
(377, 'Vaishali', 'Satish', 'Jadhav', '1971-09-17', 'COMP', 1234567890, '-', '@', '2007-07-13', 'Pursuing Ph.D.', 'Assistant Professor', '123', NULL),
(381, 'Narendrakumar ', 'Ramchandra', 'Dasre', '1980-08-01', 'COMP', 1234567890, '-', '@', '2007-07-23', 'Ph. D.', ' Professor', '123', '3cde8181'),
(383, 'Shital', 'Sunil', 'Mali', '1979-05-16', 'COMPS', 1234567890, '-', '@', '2007-07-09', 'Ph,D, pursing', 'Associate Professor', '123', NULL),
(393, 'Dr. Amarsinh', 'V.', 'Vidhate', '1974-05-21', 'COMP', 1234567890, '-', '@', '2007-07-17', 'Ph.D.(Computer Engineering), M.Tech. (Computer Eng', 'Professor', '123', 'ZxpgBY'),
(396, 'Puja', '', 'Padiya', '1979-09-09', 'COMP', 1234567890, '-', '@', '2007-01-08', 'Ph.D. Pursuing', 'Assistant Professor', '123', NULL),
(400, 'shivam', 'balaji', 'kendre', '2001-01-01', 'computer', 1234, 'abc', 'shivamkendre78@gmail.com', '0000-00-00', 'computer engineer', 'front-end', '1234', '123'),
(401, 'chetan', 'abc', 'khairnar', '2001-01-01', 'computer', 1234, 'abc', 'chetankhairnar28@gmail.com', '0000-00-00', 'computer engineer', 'back-end', '1234', '123'),
(402, 'aditya', 'xyz', 'desai', '2001-01-01', 'IT', 1234, 'abc', 'computerhodrait@gmail.com', '0000-00-00', 'computer engineer', 'database', '1234', '123'),
(403, 'shubham', 'pqr', 'patil', '2000-01-01', 'IT', 1234, 'abc', 'shubhampatil65@gmail.com', '0000-00-00', 'phd', 'scientist', '1234', '123'),
(407, 'Rajshree', NULL, 'Shedge', '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', NULL),
(411, 'TUSHAR ', 'HINDURAO', 'GHORPADE ', '1979-02-03', 'COMP', 1234567890, '-', '@', '2008-01-18', 'ME in Computer Engineering', 'Assistant Professor', '123', 'ec71de5a'),
(419, 'Sheetal', NULL, 'Ahir', '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', '2MYHy6'),
(482, 'Smita', '', 'Patil-Bhoir', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', '', '', '123', 'JQ76CN'),
(526, 'Vilas', 'Janardan', 'Rane', '1986-11-11', 'COMP', 1234567890, '-', '@', '2011-02-03', 'M.Sc.', 'Assistant Professor', '123', NULL),
(528, 'Swarupa', NULL, 'Bodhe', '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', NULL),
(536, 'nilam', 'sangram', 'patil', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'ME electronics', 'Assistant professor', '123', NULL),
(566, 'Pramod', 'Jagannath', 'Bide', '1989-01-25', 'COMP', 1234567890, '-', '@', '2012-08-16', 'M.E', 'AP', '123', 'NULL'),
(570, 'ASHWINI ', 'ANIL', 'RAORANE', '1990-04-23', 'COMP', 1234567890, '-', '@', '2012-08-16', 'ME (Electronics)', 'Lecturer', '123', NULL),
(576, 'Smita', 'dinesh', 'Bharne', '1982-06-14', 'COMP', 1234567890, '-', '@', '2012-09-13', 'M.Tech', 'Assistant Professor', '123', 'a22bc9ae'),
(583, 'Snehal', NULL, 'Mumbailkar', '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', 'RKfwZg'),
(586, 'Vijaylaxmi', 'S', 'Bittal', '1984-07-31', 'COMP', 1234567890, '-', '@', '2013-01-10', 'M.Tech', 'assistant professor', '123', NULL),
(587, 'Trupti', 'prashant', 'Patil', '1984-07-08', 'COMP', 1234567890, '-', '@', '2013-01-07', 'ME (copmuter)', 'Assistant Professor', '123', NULL),
(593, 'Prathmesh', 'Narayan', 'Gunjgur', '1988-10-18', 'COMP', 1234567890, '-', '@', '2013-01-24', 'M.E Computer Engineering', 'Assistant Professor', '123', NULL),
(601, 'Kriti', '', 'Karnam', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'B.E.,Mtech', 'Assistant Professor', '123', 'e7fa430d'),
(603, 'Harsha', '', 'Saxena', '1990-11-06', 'COMP', 1234567890, '-', '@', '2013-07-01', 'mtech', 'assistant proffesor', '123', '2ff22efa'),
(609, 'Nazia', '', 'S', '1982-01-02', 'COMP', 1234567890, '-', '@', '2013-07-08', 'M.Tech', 'Asst Professor', '123', NULL),
(615, 'Shilpa', 'Tushar', 'Bhangale', '1976-07-27', 'CE', 1234567890, '-', '@', '2013-07-15', 'MPHIL- SET', 'assistant professor', '123', NULL),
(618, 'Rubi', '', 'Mandal', '1986-01-19', 'COMP', 1234567890, '-', '@', '2013-07-25', 'Mtech', 'Lecturer', '123', NULL),
(627, 'Apurva', 'Swapnil', 'Shinde', '1991-12-18', 'COMP', 1234567890, '-', '@', '2013-08-13', 'M.E. (Computers)', 'Assistant Professor', '123', '8023ed41'),
(631, 'Savita', 'Kiran', 'Sawant', '1983-12-15', 'COMP', 1234567890, '-', '@', '2016-01-02', 'M.Tech in Computer Engg', 'Assistant Professor', '123', 'd2367116'),
(638, 'Ekta', NULL, 'Sarda', '0000-00-00', '', 1234567890, '-', '@', '0000-00-00', '', '', '123', NULL),
(650, 'Bhavana', 'Bhimsen', 'Turorikar', '1983-07-03', 'COMP', 1234567890, '-', '@', '2014-08-07', 'ME(Computer Networks)', 'Assistant Professor', '123', '694a090f'),
(654, 'MANSI', 'BHUSHAN', 'JAWALE', '1991-10-31', 'COMP', 1234567890, '-', '@', '2014-06-15', 'M.A.', 'Lecturer', '123', NULL),
(657, 'KHUSHBOO', 'SHIVKUMAR', 'PICHHODE', '1989-12-03', 'COMPS', 1234567890, '-', '@', '2014-07-16', 'M.E', 'Assistant Professor', '123', NULL),
(663, 'Shilpa', 'Vilas', 'Mahagaonkar', '1984-05-24', 'COMP', 1234567890, '-', '@', '2014-07-16', 'ME', 'Assistant Professor', '123', NULL),
(672, 'Pallavi', 'H.', 'Chitte', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.E.Computer Engineering', 'Assistant Professor', '123', '41fd65ae'),
(677, 'kamlesh', 'lekhraj', 'nenwani', '1987-04-04', 'CE', 1234567890, '-', '@', '2014-08-01', 'M.E.', 'Lecturer', '123', NULL),
(679, 'Dhanashri', 'Ashok', 'Bhosale', '1989-03-10', 'COMP', 1234567890, '-', '@', '2013-02-09', 'ME', 'lecturer', '123', '8aa5381f'),
(687, 'Sumithra', '', 'T.V', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.TECH', '', '123', NULL),
(693, 'vishvas', 'hasuram', 'patil', '1986-01-15', 'COMP', 1234567890, '-', '@', '2015-07-01', 'M.sc.', 'Lecturer', '123', '703141b6'),
(696, 'varsha', 'ramesh', 'patil', '0091-04-29', 'COMP', 1234567890, '-', '@', '2015-06-17', 'M.E.Computer Engineering', 'Assistant Professor', '123', NULL),
(699, 'Preet Chandan', '', 'Kaur', '1989-02-09', 'COMP', 1234567890, '-', '@', '2015-07-15', 'M.E.Computer Engineering', 'Assistant professor', '123', 'CZtPQs'),
(700, 'Pranali', 'Mohan', 'Yadav', '1990-12-18', 'CE', 1234567890, '-', '@', '2015-06-15', 'BE, ME (persuing)', 'Teaching Assistant', '123', NULL),
(711, 'PRAMOD ', 'HARIBHAU', 'KACHARE', '1991-04-24', 'COMP', 1234567890, '-', '@', '2015-07-07', 'M.Tech.', 'Assistant Professor', '123', '536de3d5'),
(712, 'DIAMBAR', 'VITTHALBUWA', 'PURI', '1990-09-29', 'COMP', 1234567890, '-', '@', '2015-07-07', 'M.Tech.', 'Assistant Professor', '123', '4241a33d'),
(717, 'SWARALI', 'PRASHANT', 'SHETH', '1985-01-24', 'COMP', 1234567890, '-', '@', '2015-07-23', 'M.Tech.', 'Lecturer', '123', 'a862f9af'),
(719, 'CHANDRAKANT', 'JAGANNATH', 'GAIKWAD', '1972-08-02', 'COMP', 1234567890, '-', '@', '2015-08-10', 'Ph.D.', 'Professor', '123', '36ed2611'),
(721, 'Nivedita', 'Elan', 'Shekhar', '1992-04-28', 'COMPS', 1234567890, '-', '@', '2015-08-11', 'M.E.Computer Engineering', 'Assitance Professor', '123', NULL),
(726, 'Krupi', 'Pranav', 'Saraf', '1989-07-19', 'COMPS', 1234567890, '-', '@', '2016-01-06', 'ME', 'Assistant Professor', '123', NULL),
(728, 'saguna', 'kailas', 'ingle', '1983-08-05', 'COMP', 1234567890, '-', '@', '2016-12-03', 'M.E.(IT)', 'Assistant Professor', '123', NULL),
(752, 'Shilpa', 'Gulabrao', 'Kolte', '1977-06-17', 'COMP', 1234567890, '-', '@', '2016-06-22', 'M.E.', 'A.P.', '123', '0bf3ade3'),
(765, 'Pornima', 'Kailas', 'Gidhe', '1993-04-06', 'COMP', 1234567890, '-', '@', '2016-07-12', 'M.E.Computer Engineering', 'Assistant professor', '123', NULL),
(767, 'Bijal', 'Chandubhai', 'Panchal', '1989-12-11', 'COMP', 1234567890, '-', '@', '2016-07-12', 'M.E', 'Assistant Professor', '123', '3acb890f'),
(769, 'SAYALI', 'ASHOK', 'SAPKAL', '1989-05-08', 'COMP', 1234567890, '-', '@', '2016-07-13', 'M.E', 'Lecturer', '123', NULL),
(770, 'Siddhi', 'Nikhil', 'Kadu', '1989-12-01', 'COMP', 1234567890, '-', '@', '2016-07-12', 'M.E', 'Assistant Professor', '123', '5b6a61d0'),
(772, 'SAMEER', 'SHAMRAO', 'CHIKANE', '1993-09-03', 'COMPS', 1234567890, '-', '@', '2016-07-13', 'ME', 'ASSISTANT PROFESSOR', '123', NULL),
(785, 'Snehal', 'Shashikant', 'Bhoir', '1992-08-15', 'COMP', 1234567890, '-', '@', '2016-07-21', 'M.E.Computer Engineering', 'Assistant Professor', '123', NULL),
(786, 'JYOTI', 'VINAYAK', 'DEOGIRIKAR', '1994-01-14', 'COMP', 1234567890, '-', '@', '2016-08-01', 'ME', 'Assistant professor', '123', NULL),
(787, 'SHRADDHA', 'ANANT', 'NARHARI', '1989-07-31', 'COMP', 1234567890, '-', '@', '2017-12-15', 'ME', 'Assitant Professor', '123', NULL),
(800, 'Prof. Prashant', 's', 'Lokhande', '1974-06-16', 'COMP', 1234567890, '-', '@', '2017-01-16', 'ME IT', 'Associate Professor', '123', NULL),
(802, 'PAYAL', 'FATEHLAL', 'SANCHETI', '1994-04-02', 'COMP', 1234567890, '-', '@', '2017-01-23', 'B.E', 'LAB INSTRUCTOR', '123', NULL),
(803, 'Snehal', 'Suresh', 'Nikalje', '1992-10-27', 'COMP', 1234567890, '-', '@', '2017-02-01', 'BE', 'Lab Instructor', '123', NULL),
(804, 'roshni', 'satish', 'singh', '1993-06-18', 'COMP', 1234567890, '-', '@', '2017-02-01', 'BE', 'lab instructor', '123', NULL),
(806, 'Sathya', ' ', 'Arumugam', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'Ph.D', 'Assistant Professor', '123', NULL),
(807, 'vishwanath', 'subhaschandra', 'chikkareddi', '1988-02-24', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.TECH( COMPUTER SCIENCE AND ENGG), PhD(pursuing)', 'Assistant Professor', '123', NULL),
(811, 'Rashmi', 'Amol', 'Dhumal', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.E.Computer Engineering', 'Associate Professor', '123', NULL),
(812, 'Tabassum', 'Altaf', 'Maktum', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.E.Computer Engineering', 'Assistant Professor', '123', NULL),
(817, 'PRACHI', 'DEEPAK', 'JUNWALE', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.TECH( COMPUTER SCIENCE AND ENGG)', 'ASSISTANT PROFESSOR', '123', NULL),
(821, 'NEERAJ', 'KUMAR', 'SHARMA', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'PhD', 'PROFESSOR', '123', NULL),
(826, 'Ida', 'Hector', 'Lionel', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.Tech(Information Technology)', 'Assistant Professor', '123', 'NULL'),
(827, 'PRIYANKA', 'RAMRAO', 'GUTTE', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.Tech(Control system)', 'Asst. Professor', '123', NULL),
(829, 'Himani', 'Mohan', 'Jawale', '0000-00-00', 'COMP', 1234567890, '-', '@', '0000-00-00', 'M.TECH( COMPUTER ENGG)', 'Assistant Professor', '123', NULL),
(840, 'Dr. Dhiraj', 'B', 'Magare', '1981-02-02', 'COMP', 1234567890, '-', '@', '2017-11-20', 'Doctor', 'Associate Professor', '123', NULL),
(842, 'Suchita', 'Suresh', 'Dange', '1993-04-26', 'COMP', 1234567890, '-', '@', '2017-12-04', 'M.TECH( COMPUTER ENGG)', 'Assistant Professor', '123', NULL),
(848, 'Rohini', 'Lakhanlal', 'Damahe', '1988-02-03', 'COMP', 1234567890, '-', '@', '2017-11-12', 'ME(Computer Engineering)', 'Assistant Professor', '123', NULL),
(858, 'SHITAL', 'HARIBHAU', 'GADE', '1983-06-06', 'COMP', 1234567890, '-', '@', '2018-01-02', 'M.E.Computer Engineering', 'ASSISTANT PROFESSOR', '123', NULL),
(874, 'AMIT', 'KAILASH', 'BARVE', '1985-08-26', 'COMP', 1234567890, '-', '@', '2018-02-16', 'Phd', 'Assiciate Professor', '123', NULL),
(876, 'BHARTI', 'VISHANDAS', 'NATHWANI', '1984-07-27', 'COMPS', 1234567890, '-', '@', '2018-02-20', 'Ph.D.', 'Assistant Professor', '123', NULL),
(878, 'Bharti', 'A', 'Joshi', '1970-04-25', 'COMPS', 1234567890, '-', '@', '2018-03-01', 'Phd', 'Professor', '123', 'bHhwYV'),
(888, 'Dr Dhananjay', 'Manohar', 'Dakhane', '1972-04-06', 'COMP', 1234567890, '-', '@', '1972-04-06', 'PhD', 'Professor', '123', 'hDvgGJ'),
(892, 'Dr. Yogita ', 'Dhanraj', 'Mistry', '1979-07-26', 'COMP', 1234567890, '-', '@', '2018-12-17', 'Ph. D.', 'Associate Professor', '123', 'euFpRr'),
(894, 'B', 'J', 'Gorad', '1988-04-04', 'COMP', 1234567890, '-', '@', '2018-12-24', 'M.Tech CST,  PhD Pursuing', 'Assistant Professor', '123', NULL),
(896, 'SANGITA', 'SANTOSH', 'CHAUDHARI', '1977-06-10', 'COMP', 1234567890, '-', '@', '2019-01-01', 'PhD', 'professor', '123', '4GoHWM'),
(897, 'R', 'D', 'Suryawanshi', '1986-05-12', 'COMP', 1234567890, '-', '@', '2019-01-01', 'Msc, Net,Phd Persuing', 'Assistant Professor', '123', 'D7qHRm'),
(898, 'vaibhav', 'Eknath', 'Narawade', '1977-08-08', 'COMP', 1234567890, '-', '@', '2019-01-03', 'PhD Computer Enggineering', 'Professor', '123', 'uWzgp2'),
(999, 'a', 'a', 'a', '0000-00-00', 'INSTR', 1234567890, '-', '@', '0000-00-00', 'a', 'a', '123', 'dd867ff4');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `dept` varchar(255) NOT NULL,
  `Sdrn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`dept`, `Sdrn`) VALUES
('computer', 8),
('electronics', 403);

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
(1, '400', 'Nerul', 'RAIT authentication system', 'I', NULL, 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2020-01-01', 'no required', '2001-01-01', 900, 0, 'zero charges for one year', '1 month', 1, 1, 1, '', 'approved', NULL, 1, 1, 0),
(2, '400', 'Thane', 'MU RRC system', 'O', 'Microsoft Organization', 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/09', 0, 0, 0),
(3, '400', '', 'Internship Approval', 'I', NULL, 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(4, '400', '', 'Fake news', 'O', 'Rait', 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2001-01-01', 'phd', '2001-01-01', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', NULL, 0, 0, 0),
(5, '401', 'Thane', 'RAIT authentication system', 'I', 'Samsung', 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', 1200, 5, 'zero charges for three year', '5 months', 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/10', 1, 1, 0),
(6, '401', 'Amravati', 'MU RRC system', 'O', NULL, 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 1, 0, 0, '', 'approved by hod', NULL, 0, 0, 0),
(7, '401', 'Thane', 'Internship Approval', 'I', 'Samsung', 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/05', 0, 0, 0),
(8, '401', '', 'Fake news', 'O', NULL, 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2001-01-01', 'phd', '2001-01-01', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'vedit', 0, 0, 0),
(9, '402', '', 'RAIT authentication system', 'I', NULL, 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(10, '402', '', 'MU RRC system', 'O', NULL, 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(11, '402', '', 'Internship Approval', 'I', NULL, 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(12, '402', '', 'Fake news', 'O', NULL, 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2001-01-01', 'phd', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(13, '403', 'H 201,SHREE GURUDATTA CHS, AIROLI SEC 8A', 'RAIT authentication system', 'I', NULL, 1000, '../files/18CE1009/sample.pdf', 7, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/IT/SDG-RAIT/2021-22/01', 0, 0, 0),
(14, '403', '', 'MU RRC system', 'O', NULL, 5000, '../files/18CE1009/sample.pdf', 10, '2001-01-01', '2001-01-01', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(15, '403', '', 'Internship Approval', 'I', NULL, 2000, '../files/18CE1009/sample.pdf', 8, '2001-01-01', '2020-03-23', 'no required', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(16, '403', '', 'Fake news', 'O', NULL, 10000, '../files/18CE1009/sample.pdf', 11, '2001-01-01', '2020-01-01', 'phd', '2001-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(17, '401', 'Nerul', 'machine learning new project', 'I', 'RAIT', 122, '../files/401/Form.pdf', 11, '2020-12-31', '2021-03-11', 'html', '2021-03-21', 10000, 12, 'zero charges for one year', 'one month', 1, 1, 1, '', 'approved', '4', 1, 0, 0),
(18, '401', 'H 201,SHREE GURUDATTA CHS, AIROLI SEC 8A', 'Android Developmemt', 'I', 'Apple', 122, '../files/401/Form.pdf', 2, '2021-03-09', '2021-03-31', 'html', '2021-03-22', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/06', 0, 0, 0),
(19, '401', 'abcf', 'Internship Ml', 'I', 'RAIT', 10000, '../files/401/Form.pdf', 2, '2021-03-16', '2021-03-31', 'html', '2021-03-22', 900, 18, 'zero charges for one year', '3 months', 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/07', 1, 1, 0),
(20, '400', 'nerul, Navi Mumbai', 'Stock Prediction using ML', 'I', 'RAIT', 10000, '../files/400/2021 Scholarship form.pdf', 4, '2021-04-06', '2021-05-06', 'sql,html', '2021-04-14', NULL, NULL, NULL, NULL, 1, 1, 1, '', 'approved', 'RAIT/computer/SDG-RAIT/2021-22/08', 0, 0, 0),
(21, '401', 'h201, Airoli,Navi Mumbai', 'E-locker document management', 'O', 'RAIT', 1000, '../files/401/Experiment 1(DWM).pdf', 2, '2021-04-08', '2021-04-29', 'html', '2021-04-17', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(22, '401', 'Seattle', 'Inventory Management System', 'I', 'Apple', 1000, '../files/401/Most popular spoken english words.pdf', 9, '2021-06-09', '2021-09-23', 'sql,html', '2021-08-16', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0),
(23, '401', 'Korea', 'Github', 'I', 'Samsung', 19000, '../files/401/Most popular spoken english words.pdf', 3, '2021-07-08', '2021-08-27', 'sql,html', '2021-08-17', NULL, NULL, NULL, NULL, 0, 0, 0, '', 'pending', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verifier`
--

CREATE TABLE `verifier` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email_id` varchar(50) NOT NULL,
  `Phone_no` bigint(12) NOT NULL,
  `OTP` varchar(50) DEFAULT NULL,
  `Department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifier`
--

INSERT INTO `verifier` (`Username`, `Password`, `Email_id`, `Phone_no`, `OTP`, `Department`) VALUES
('compverifier', '1234', 'compverify@gmail.com', 1234, '34', 'computer'),
('Itverifier', '1234', 'itverify@gmail.com', 1234, '2', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`Email_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD UNIQUE KEY `internship_id` (`internship_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Sdrn`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`Sdrn`),
  ADD UNIQUE KEY `dept` (`dept`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`internship_id`),
  ADD KEY `form_fk1` (`Sdrn`);

--
-- Indexes for table `verifier`
--
ALTER TABLE `verifier`
  ADD PRIMARY KEY (`Email_id`);

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
