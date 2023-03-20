-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2023 at 03:35 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_no` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pin_code` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `dob`, `email`, `phone_no`, `city`, `state`, `pin_code`, `country`) VALUES
(1, 'admin', 'admin', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_registration`
--

DROP TABLE IF EXISTS `blood_bank_registration`;
CREATE TABLE IF NOT EXISTS `blood_bank_registration` (
  `id` int NOT NULL,
  `blood_bank_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` varchar(30) NOT NULL,
  `joining_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blood_bank_registration`
--

INSERT INTO `blood_bank_registration` (`id`, `blood_bank_name`, `email`, `password`, `address`, `city`, `pincode`, `joining_date`) VALUES
(0, 'MMM', 'MM@gmail.com', '123', 'lllll', 'kkkk', '41562', '2023-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_registration`
--

DROP TABLE IF EXISTS `doctor_registration`;
CREATE TABLE IF NOT EXISTS `doctor_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `education` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `joining_date` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO UPDATE',
  `reg_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO UPDATE',
  `fees` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO UPDATE',
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_registration`
--

INSERT INTO `doctor_registration` (`id`, `name`, `email`, `department`, `password`, `gender`, `education`, `address`, `city`, `pincode`, `joining_date`, `phone_no`, `reg_no`, `fees`, `image`) VALUES
(16, 'DEBASIS MAJUMDAR', 'deb@gmail.com', 'NEUROLOGIST', '789', 'Male', 'MBBS', 'BAGHMUNDI', 'PURULIA', '756210', '2023-05-02', '98452110', 'M12', '1200', 'T2.jpg'),
(15, 'BHUMIKA GHOSH', 'bhumi@gmail.com', 'DENTIST', '123', 'Female', 'MBBS', 'NANDAKUMAR', 'TAMLUK', '741235', '2022-06-13', 'NO UPDATE', 'NO UPDATE', 'NO UPDATE', ''),
(13, 'ADITYA ROY ', 'adi@gmail.com', 'GYNOCOLOGIST', '123', 'Male', 'MD', 'SECTOR-V', 'KOLKATA', '781201', '2023-01-15', 'NO UPDATE', 'NO UPDATE', 'NO UPDATE', ''),
(17, 'ANURADHA BISWAS', 'anu@gmail.com', 'CARDIOLOGIST', '456', 'Female', 'MBBS', 'DUILLYA', 'ANDUL', '711302', '2022-05-25', 'NO UPDATE', 'NO UPDATE', 'NO UPDATE', ''),
(18, 'SHUBHAM PAL', 'shu@gmail.com', 'UROLOGIST', '123', 'Male', 'MBBS', 'SANKRAIL', 'HOWRAH', '711302', '2022-10-12', 'NO UPDATE', 'NO UPDATE', 'NO UPDATE', '');

-- --------------------------------------------------------

--
-- Table structure for table `lab_registration`
--

DROP TABLE IF EXISTS `lab_registration`;
CREATE TABLE IF NOT EXISTS `lab_registration` (
  `id` int NOT NULL,
  `lab_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `joining_date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lab_registration`
--

INSERT INTO `lab_registration` (`id`, `lab_name`, `email`, `password`, `address`, `city`, `pincode`, `joining_date`) VALUES
(14, 'you', 'you@gmail.com', '125', 'howrah', 'andul', '1200', '2023-01-27'),
(0, 'mandira', 'mm@gmail.com', '456', 'howrah', 'kolkata', '1456', '2023-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `patient_registration`
--

DROP TABLE IF EXISTS `patient_registration`;
CREATE TABLE IF NOT EXISTS `patient_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `confirm_password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NO UPDATE',
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_registration`
--

INSERT INTO `patient_registration` (`id`, `name`, `email`, `gender`, `age`, `location`, `pincode`, `password`, `confirm_password`, `phone_no`, `image`) VALUES
(2, 'mandira', 'mandira@gmail.com', 'female', 22, 'howrah', '711302', '123', '456', '9239412412', 'T1.jpg'),
(3, 'bristy', 'bristy@gmail.com', 'female', 23, 'kolkata', '784512', '789', '789', '', ''),
(4, 'kanika mandal', 'kanika@gmail.com', 'female', 45, 'howrah', '711302', '963', '963', '', ''),
(5, 'ROHAN MAITI', 'rohan@gmail.com', 'male', 22, 'howrah', '711302', '123', '123', '', ''),
(6, 'mm', 'mm@gmail.com', 'f', 21, 'kolk', '1245', '123', '123', '', ''),
(7, 'aditya', 'adi@gmail.com', 'male', 0, '', '700005', '789', '123', '123', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
