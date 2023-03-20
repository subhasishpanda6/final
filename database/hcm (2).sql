-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 03:31 PM
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
-- Database: `hcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin_code` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `dob`, `email`, `phone_no`, `city`, `state`, `pin_code`, `country`) VALUES
(1, 'admin', 'admin', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_booking`
--

CREATE TABLE `appoinment_booking` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `booking_time` varchar(100) NOT NULL,
  `doc_phno` varchar(100) NOT NULL,
  `patient_phno` varchar(100) NOT NULL,
  `doc_mail` varchar(100) NOT NULL,
  `patient_mail` varchar(100) NOT NULL,
  `medical_condition` varchar(200) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_blood_group` varchar(10) NOT NULL,
  `patient_gender` varchar(10) NOT NULL,
  `doc_img` varchar(100) NOT NULL,
  `patient_img` varchar(100) NOT NULL,
  `doc_department` varchar(100) NOT NULL,
  `doc_fees` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `patient_booking_time` datetime NOT NULL DEFAULT current_timestamp(),
  `patient_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `payment_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appoinment_booking`
--

INSERT INTO `appoinment_booking` (`id`, `doc_id`, `patient_id`, `doc_name`, `patient_name`, `booking_date`, `booking_time`, `doc_phno`, `patient_phno`, `doc_mail`, `patient_mail`, `medical_condition`, `patient_age`, `patient_blood_group`, `patient_gender`, `doc_img`, `patient_img`, `doc_department`, `doc_fees`, `payment_mode`, `patient_booking_time`, `patient_status`, `payment_status`) VALUES
(35, 16, 7, 'DEBASIS MAJUMDAR', 'aditya', '2023-01-23', '02:46', '9239412412', '78451', 'deb@gmail.com', 'adi@gmail.com', 'headache', 54, 'A+', 'male', 'T2.jpg', 'T2.jpg', 'NEUROLOGIST', 1200, 'offline', '2023-01-21 00:50:45', 'reject', 'payment complete'),
(34, 16, 2, 'DEBASIS MAJUMDAR', 'mandira', '2023-01-25', '19:46', '9239412412', '9239412412', 'deb@gmail.com', 'mandira@gmail.com', 'cough and cold', 22, 'A+', 'female', 'T2.jpg', 'T2.jpg', 'NEUROLOGIST', 1200, 'online', '2023-01-21 00:50:45', 'accept', ''),
(33, 15, 7, 'BHUMIKA GHOSH', 'aditya', '2023-01-05', '17:28', '945001256', '78451', 'bhumi@gmail.com', 'adi@gmail.com', 'fever', 54, 'A+', 'male', 'T1.jpg', 'T1.jpg', 'DENTIST', 1200, 'offline', '2023-01-21 00:50:45', 'reject', ''),
(36, 16, 4, 'DEBASIS MAJUMDAR', 'kanika mandal', '2023-01-11', '03:55', '9239412412', '', 'deb@gmail.com', 'kanika@gmail.com', 'headache', 45, 'A+', 'female', 'T2.jpg', 'T2.jpg', 'NEUROLOGIST', 1200, 'online', '2023-01-21 00:52:05', 'done', ''),
(37, 15, 2, 'BHUMIKA GHOSH', 'mandira', '2023-01-05', '09:03', '945001256', '9239412412', 'bhumi@gmail.com', 'mandira@gmail.com', 'toothache', 22, 'A+', 'female', 'T1.jpg', 'T1.jpg', 'DENTIST', 1200, 'online', '2023-01-21 19:09:06', 'done', ''),
(38, 16, 7, 'DEBASIS MAJUMDAR', 'aditya', '2023-01-13', '21:20', '9239781245', '78451', 'deb@gmail.com', 'adi@gmail.com', 'headache', 54, 'A+', 'male', 'T5.jpg', 'T5.jpg', 'NEUROLOGIST', 1200, 'offline', '2023-01-21 21:16:39', 'Pending', ''),
(39, 15, 9, 'BHUMIKA GHOSH', 'Ronit Chaterjee', '2023-01-19', '01:14', '945001256', '990123852', 'bhumi@gmail.com', 'roni@gmail.com', 'Tooth Cavity', 25, 'B+', 'Male', 'T1.jpg', 'T1.jpg', 'DENTIST', 1200, 'online', '2023-01-22 22:47:17', 'done', '');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_registration`
--

CREATE TABLE `blood_bank_registration` (
  `blood_bank_id` int(11) NOT NULL,
  `blood_bank_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` varchar(30) NOT NULL,
  `img` varchar(200) NOT NULL DEFAULT 'no-profile.jpg',
  `joining_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_registration`
--

INSERT INTO `blood_bank_registration` (`blood_bank_id`, `blood_bank_name`, `email`, `password`, `phone`, `address`, `city`, `pincode`, `img`, `joining_date`) VALUES
(1, 'A.R Group Blood Bank', 'A.Roy30@gmail.com', 'Ar123', '', 'Andul', 'Andul', '711302', 'no-profile.jpg', '2023-01-14'),
(2, 'General Blood Bank', 'gbb@gmail.com', '456', '7894561239', 'Howrah', 'Andul', '45123', 'patient12.jpg', '2023-01-17'),
(3, 'All in one', 'aio@gmail.com', '123', '7894561235', 'howrah', 'andul', '789456', 'doctor-thumb-01.jpg', '2023-01-25'),
(5, 'fg', 'fg@gmail.com', '123', '', 'kol', 'salt lake', '789456', 'no-profile.jpg', '2023-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_stock`
--

CREATE TABLE `blood_bank_stock` (
  `b_stock_id` int(11) NOT NULL,
  `blood_group_id` int(11) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank_stock`
--

INSERT INTO `blood_bank_stock` (`b_stock_id`, `blood_group_id`, `stock`, `user_id`) VALUES
(15, 8, '9', 2),
(16, 2, '25', 2),
(17, 4, '10', 2),
(18, 5, '90', 2),
(19, 6, '45', 2),
(22, 4, '4', 1),
(23, 3, '50', 1),
(24, 1, '9', 5),
(25, 2, '5', 5),
(26, 4, '25', 5),
(27, 5, '0', 5),
(28, 6, '78', 5),
(29, 7, '5', 5),
(30, 8, '89', 5),
(31, 7, '12', 2),
(32, 1, '78', 2);

-- --------------------------------------------------------

--
-- Table structure for table `blood_donate`
--

CREATE TABLE `blood_donate` (
  `donate_id` int(11) NOT NULL,
  `donar_id` int(11) NOT NULL,
  `no_of_unit` int(11) NOT NULL,
  `donate_date` varchar(20) NOT NULL,
  `blood_bank` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `disease` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_donate`
--

INSERT INTO `blood_donate` (`donate_id`, `donar_id`, `no_of_unit`, `donate_date`, `blood_bank`, `blood_group`, `disease`, `status`, `created_at`) VALUES
(1, 1, 5, '2023-03-15', 'A.R Group Blood Bank', 'B+', 'fgh', 'accept', '2023-03-16 17:43:52'),
(2, 2, 5, '2023-03-14', 'General Blood Bank', 'AB+', 'no', 'accept', '2023-03-18 09:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `blood_group_id` int(11) NOT NULL,
  `blood_group_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`blood_group_id`, `blood_group_name`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_registration`
--

CREATE TABLE `doctor_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `education` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `joining_date` varchar(200) NOT NULL,
  `phone_no` varchar(100) NOT NULL DEFAULT 'NO UPDATE',
  `reg_no` varchar(100) NOT NULL DEFAULT 'NO UPDATE',
  `fees` varchar(100) NOT NULL DEFAULT 'NO UPDATE',
  `image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Decline',
  `payment_details` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_registration`
--

INSERT INTO `doctor_registration` (`id`, `name`, `email`, `department`, `password`, `gender`, `education`, `address`, `city`, `pincode`, `joining_date`, `phone_no`, `reg_no`, `fees`, `image`, `status`, `payment_details`) VALUES
(16, 'DEBASIS MAJUMDAR', 'deb@gmail.com', 'NEUROLOGIST', '789', 'Male', 'MBBS', 'BAGHMUNDI', 'PURULIA', '756210', '2023-05-02', '9239781245', 'm13', '1200', 'T5.jpg', 'active', 'Gpay:9239412412'),
(15, 'BHUMIKA GHOSH', 'bhumi@gmail.com', 'DENTIST', '789', 'Female', 'MBBS', 'NANDAKUMAR', 'TAMLUK', '741235', '2022-06-13', '945001256', 'u8hh', '1200', 'T1.jpg', 'active', 'gpay: 990124585'),
(13, 'ADITYA ROY ', 'adi@gmail.com', 'GYNOCOLOGIST', '123', 'Male', 'MD', 'SECTOR-V', 'KOLKATA', '781201', '2023-01-15', '7003114530', 'M12', '4000', 'T5.jpg', '', ''),
(17, 'ANURADHA BISWAS', 'anu@gmail.com', 'CARDIOLOGIST', '456', 'Female', 'MBBS', 'DUILLYA', 'ANDUL', '711302', '2022-05-25', '9433210056', 'B45', '2500', '', '', ''),
(18, 'SHUBHAM PAL', 'shu@gmail.com', 'UROLOGIST', '123', 'Male', 'MBBS', 'SANKRAIL', 'HOWRAH', '711302', '2022-10-12', 'NO UPDATE', 'NO UPDATE', 'NONE', '', 'decline', '');

-- --------------------------------------------------------

--
-- Table structure for table `donar`
--

CREATE TABLE `donar` (
  `donar_id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  `donar_name` varchar(150) NOT NULL,
  `donar_email` varchar(150) NOT NULL,
  `donar_gender` varchar(10) NOT NULL,
  `donar_dob` varchar(12) NOT NULL,
  `donar_location` varchar(50) NOT NULL,
  `donar_phone` varchar(12) NOT NULL,
  `donar_pincode` varchar(10) NOT NULL,
  `donar_address` varchar(250) NOT NULL,
  `donar_blood_group` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donar`
--

INSERT INTO `donar` (`donar_id`, `register_id`, `donar_name`, `donar_email`, `donar_gender`, `donar_dob`, `donar_location`, `donar_phone`, `donar_pincode`, `donar_address`, `donar_blood_group`, `created_at`) VALUES
(1, 7, 'aditya', 'adi@gmail.com', 'female', '2022-03-03', 'howrah', '123', '700005', 'gfg', 'B+', '2023-03-16 06:57:43'),
(2, 5, 'ROHAN MAITI', 'rohan@gmail.com', 'male', '2023-03-29', 'howrah', '123', '711302', 'dfgf', 'AB+', '2023-03-16 14:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `lab_registration`
--

CREATE TABLE `lab_registration` (
  `id` int(11) NOT NULL,
  `lab_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `joining_date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_registration`
--

INSERT INTO `lab_registration` (`id`, `lab_name`, `email`, `password`, `address`, `city`, `pincode`, `joining_date`) VALUES
(13, 'yc', 'yc@gmail.com', '123', 'kol', 'salt lake 5', '', '2023-01-13'),
(14, 'you', 'you@gmail.com', '125', 'howrah', 'andul', '12888', '2023-01-27'),
(15, 'ury', 'th@gmail.com', '123', 'andul', 'andul', '1255', '2023-01-11'),
(16, 'sp lab', 'sp@gmail.com', '123', 'Kolkata', 'Salt Lake v', '457896', '2023-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `need_blood`
--

CREATE TABLE `need_blood` (
  `request_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `blood_group` int(11) NOT NULL,
  `blood_bank` int(11) NOT NULL,
  `no_of_unit` int(11) NOT NULL,
  `delivery_date` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `request_status` varchar(150) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `need_blood`
--

INSERT INTO `need_blood` (`request_id`, `patient_id`, `blood_group`, `blood_bank`, `no_of_unit`, `delivery_date`, `location`, `pincode`, `address`, `reason`, `created_at`, `request_status`) VALUES
(13, 2, 4, 1, 105, '2023-03-08', 'Mukundapur', '721442', 'Kushboni', 'for feaver', '2023-03-19 09:42:11', 'reject'),
(15, 2, 2, 1, 78, '2023-03-07', 'sdfdsf', 'sdfdf', 'dfs', 'sfd', '2023-03-19 09:42:02', 'accept'),
(16, 7, 1, 1, 4545, '2023-03-06', '45646', '4545', '4545', '454', '2023-03-19 09:42:15', 'cancel'),
(17, 7, 3, 2, 445, '2023-03-15', 'gjhgj', 'srf', 'sdfd', 'dsf', '2023-03-19 10:38:23', 'pending'),
(18, 7, 4, 2, 45, '2023-03-24', 'fgfh', 'sfds', 'dsds', 'sdf', '2023-03-19 10:15:21', 'accept'),
(19, 7, 5, 2, 10, '2023-03-14', 'chalti', '721442', 'saraswatiput', 'sdfds', '2023-03-19 11:27:48', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `patient_registration`
--

CREATE TABLE `patient_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirm_password` varchar(200) NOT NULL,
  `phone_no` varchar(100) NOT NULL DEFAULT 'NO UPDATE',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_registration`
--

INSERT INTO `patient_registration` (`id`, `name`, `email`, `gender`, `age`, `location`, `pincode`, `password`, `confirm_password`, `phone_no`, `image`) VALUES
(2, 'mandira', 'mandira@gmail.com', 'female', 22, 'howrah', '711302', '123', '456', '9239412412', 'T1.jpg'),
(3, 'bristy', 'bristy@gmail.com', 'female', 23, 'kolkata', '784512', '789', '789', '', ''),
(4, 'kanika mandal', 'kanika@gmail.com', 'female', 45, 'howrah', '711302', '963', '963', '', ''),
(5, 'ROHAN MAITI', 'rohan@gmail.com', 'male', 22, 'howrah', '711302', '123', '123', '123', ''),
(6, 'mm', 'mm@gmail.com', 'f', 21, 'kolk', '1245', '123', '123', '', ''),
(7, 'aditya', 'adi@gmail.com', 'male', 0, 'howrah', '700005', '789', '123', '123', 'T4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoinment_booking`
--
ALTER TABLE `appoinment_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_bank_registration`
--
ALTER TABLE `blood_bank_registration`
  ADD PRIMARY KEY (`blood_bank_id`);

--
-- Indexes for table `blood_bank_stock`
--
ALTER TABLE `blood_bank_stock`
  ADD PRIMARY KEY (`b_stock_id`),
  ADD KEY `blood_bank_stock_ibfk_1` (`blood_group_id`),
  ADD KEY `blood_bank_stock_ibfk_2` (`user_id`);

--
-- Indexes for table `blood_donate`
--
ALTER TABLE `blood_donate`
  ADD PRIMARY KEY (`donate_id`),
  ADD KEY `donar_id` (`donar_id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`blood_group_id`);

--
-- Indexes for table `doctor_registration`
--
ALTER TABLE `doctor_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donar`
--
ALTER TABLE `donar`
  ADD PRIMARY KEY (`donar_id`),
  ADD KEY `register_id` (`register_id`);

--
-- Indexes for table `lab_registration`
--
ALTER TABLE `lab_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need_blood`
--
ALTER TABLE `need_blood`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_registration`
--
ALTER TABLE `patient_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appoinment_booking`
--
ALTER TABLE `appoinment_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `blood_bank_registration`
--
ALTER TABLE `blood_bank_registration`
  MODIFY `blood_bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_bank_stock`
--
ALTER TABLE `blood_bank_stock`
  MODIFY `b_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `blood_donate`
--
ALTER TABLE `blood_donate`
  MODIFY `donate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `blood_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_registration`
--
ALTER TABLE `doctor_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donar`
--
ALTER TABLE `donar`
  MODIFY `donar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_registration`
--
ALTER TABLE `lab_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `need_blood`
--
ALTER TABLE `need_blood`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patient_registration`
--
ALTER TABLE `patient_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_bank_stock`
--
ALTER TABLE `blood_bank_stock`
  ADD CONSTRAINT `blood_bank_stock_ibfk_1` FOREIGN KEY (`blood_group_id`) REFERENCES `blood_group` (`blood_group_id`),
  ADD CONSTRAINT `blood_bank_stock_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `blood_bank_registration` (`blood_bank_id`);

--
-- Constraints for table `blood_donate`
--
ALTER TABLE `blood_donate`
  ADD CONSTRAINT `blood_donate_ibfk_1` FOREIGN KEY (`donar_id`) REFERENCES `donar` (`donar_id`);

--
-- Constraints for table `donar`
--
ALTER TABLE `donar`
  ADD CONSTRAINT `donar_ibfk_1` FOREIGN KEY (`register_id`) REFERENCES `patient_registration` (`id`);

--
-- Constraints for table `need_blood`
--
ALTER TABLE `need_blood`
  ADD CONSTRAINT `need_blood_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_registration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
