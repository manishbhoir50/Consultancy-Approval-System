-- Admin Details
CREATE TABLE `admin_details` (
 `username` varchar(10) NOT NULL PRIMARY KEY,
 `password` varchar(20) NOT NULL,
 `Email_id` varchar(100) NOT NULL,
 `phone_no` bigint(12) NOT NULL,
 `OTP` varchar(50) DEFAULT NULL);



-- Office Admin Table
CREATE TABLE `office` (
 `office` varchar(12) NOT NULL,
 `Password` varchar(18) NOT NULL,
 `username` varchar(12) NOT NULL PRIMARY KEY);



--  Faculty Table
CREATE TABLE `faculty` (
 `Sdrn` varchar(8) NOT NULL PRIMARY KEY,
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
 `OTP` varchar(20) DEFAULT NULL);


-- Student Record Table
CREATE TABLE `stu_record` (
 `Roll_no` varchar(12) NOT NULL,
 `Serial_no` int(11) NOT NULL PRIMARY KEY,
 `Last_name` varchar(12) DEFAULT NULL,
 `First_name` varchar(25) DEFAULT NULL,
 `Middle_name` varchar(25) DEFAULT NULL,
 `Year` varchar(5) DEFAULT NULL,
 `Division` varchar(5) DEFAULT NULL,
 `Batch` varchar(5) DEFAULT NULL,
 `Password` int(11) NOT NULL DEFAULT '12345',
 `Phone_no` bigint(12) NOT NULL,
 `emailid` varchar(100) NOT NULL,
 `OTP` varchar(20) NOT NULL,
 `EL_1` varchar(20) NOT NULL,
 `EL_2` varchar(15) NOT NULL,
 `sem` int(11) NOT NULL DEFAULT '0');


-- Student Authentication Table
CREATE TABLE `stu_record1` (
 `Roll_no` varchar(9) DEFAULT NULL ,
 `Password` varchar(18) DEFAULT '123');


-- Course Table
CREATE TABLE `course` (
 `Department` varchar(10) NOT NULL PRIMARY KEY,
 `Sem` varchar(5) NOT NULL,
 `Subject_code` varchar(15) NOT NULL,
 `Subject_name` varchar(50) NOT NULL,
 `Subject_shortname` varchar(6) NOT NULL,
 `Year` varchar(2) NOT NULL,
 `Elective` varchar(10) DEFAULT NULL);


-- Course Mapping
CREATE TABLE `coursemapping` (
 `Sdrn` varchar(8) NOT NULL PRIMARY KEY,
 `Subject_code` varchar(15) NOT NULL,
 `Year` varchar(2) NOT NULL,
 `Division` varchar(1) NOT NULL,
 `Lec_count` int(11) NOT NULL);