-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 09:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`USERNAME`, `PASSWORD`) VALUES
('admin', 'bangtan');

-- --------------------------------------------------------

--
-- Table structure for table `apply_leave`
--

CREATE TABLE `apply_leave` (
  `EMP_ID` int(10) DEFAULT NULL,
  `NO_OF_DAYS` int(2) DEFAULT NULL,
  `APPLICATION_DATE` date DEFAULT NULL,
  `FROM_DATE` date DEFAULT NULL,
  `TO_DATE` date DEFAULT NULL,
  `LEAVE_TYPE` varchar(30) DEFAULT NULL,
  `REASON` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `apply_leave`
--
DELIMITER $$
CREATE TRIGGER `LEAVE_DEDUCTION` AFTER INSERT ON `apply_leave` FOR EACH ROW UPDATE PAYSLIP SET
MONTHLY_ALLOWANCE=MONTHLY_ALLOWANCE-((MONTHLY_ALLOWANCE/26)*NEW.NO_OF_DAYS),
TOTAL_EARNINGS=MONTHLY_ALLOWANCE+BASIC_PAY+DA+CA+HRA+FOOD_ALLOWANCE+BONUS,
NET_PAY=TOTAL_EARNINGS-DEDUCTIONS
WHERE NEW.EMP_ID= PAYSLIP.EMP_ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMP_ID` int(10) NOT NULL,
  `ENAME` varchar(30) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `GENDER` char(1) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `CONTACT` int(10) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `DEPARTMENT` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `CONFIRM_PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `INTO_PROFILE` AFTER INSERT ON `employee` FOR EACH ROW INSERT INTO PROFILE(EMP_ID,ENAME,DOB,GENDER,ADDRESS,CONTACT,EMAIL,DOJ,DEPARTMENT) 
VALUES (NEW.EMP_ID,NEW.ENAME,NEW.DOB,NEW.GENDER,NEW.ADDRESS,NEW.CONTACT,NEW.EMAIL,NEW.DOJ,NEW.DEPARTMENT)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE `payslip` (
  `EMP_ID` int(10) DEFAULT NULL,
  `MONTHLY_ALLOWANCE` int(10) DEFAULT NULL,
  `BASIC_PAY` int(10) DEFAULT NULL,
  `DA` int(10) DEFAULT NULL,
  `CA` int(10) DEFAULT NULL,
  `HRA` int(10) DEFAULT NULL,
  `FOOD_ALLOWANCE` int(10) DEFAULT NULL,
  `BONUS` int(10) DEFAULT NULL,
  `PROVISIONAL_TAX` int(10) DEFAULT NULL,
  `PROVIDENT_FUND` int(10) DEFAULT NULL,
  `INSURANCE` int(10) DEFAULT NULL,
  `TOTAL_EARNINGS` int(10) DEFAULT NULL,
  `DEDUCTIONS` int(10) DEFAULT NULL,
  `NET_PAY` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `EMP_ID` int(10) DEFAULT NULL,
  `ENAME` varchar(30) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `GENDER` char(1) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `CONTACT` int(10) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `DEPARTMENT` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `EMP_ID` int(10) DEFAULT NULL,
  `MONTHLY_ALLOWANCE` int(10) DEFAULT NULL,
  `BASIC_PAY` int(10) DEFAULT NULL,
  `DA` int(10) DEFAULT NULL,
  `CA` int(10) DEFAULT NULL,
  `HRA` int(10) DEFAULT NULL,
  `FOOD_ALLOWANCE` int(10) DEFAULT NULL,
  `BONUS` int(10) DEFAULT NULL,
  `PROVISIONAL_TAX` int(10) DEFAULT NULL,
  `PROVIDENT_FUND` int(10) DEFAULT NULL,
  `INSURANCE` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `salary`
--
DELIMITER $$
CREATE TRIGGER `INTO_PAYSLIP_SALARY` AFTER INSERT ON `salary` FOR EACH ROW INSERT INTO PAYSLIP
(EMP_ID,MONTHLY_ALLOWANCE,BASIC_PAY,DA,CA,HRA,FOOD_ALLOWANCE,BONUS,PROVISIONAL_TAX,PROVIDENT_FUND,INSURANCE) VALUES 
(NEW.EMP_ID,NEW.MONTHLY_ALLOWANCE,NEW.BASIC_PAY,NEW.DA,NEW.CA,NEW.HRA,NEW.FOOD_ALLOWANCE,NEW.BONUS,NEW.PROVISIONAL_TAX,NEW.PROVIDENT_FUND,NEW.INSURANCE)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATE_PAYSLIP` AFTER INSERT ON `salary` FOR EACH ROW UPDATE PAYSLIP SET
TOTAL_EARNINGS=NEW.MONTHLY_ALLOWANCE+NEW.BASIC_PAY+NEW.DA+NEW.CA+NEW.HRA+NEW.FOOD_ALLOWANCE+NEW.BONUS,
DEDUCTIONS=NEW.PROVISIONAL_TAX+NEW.PROVIDENT_FUND+NEW.INSURANCE,
NET_PAY=TOTAL_EARNINGS-DEDUCTIONS
WHERE NEW.EMP_ID=PAYSLIP.EMP_ID
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indexes for table `apply_leave`
--
ALTER TABLE `apply_leave`
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `payslip`
--
ALTER TABLE `payslip`
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_leave`
--
ALTER TABLE `apply_leave`
  ADD CONSTRAINT `apply_leave_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`) ON DELETE CASCADE;

--
-- Constraints for table `payslip`
--
ALTER TABLE `payslip`
  ADD CONSTRAINT `payslip_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`) ON DELETE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
