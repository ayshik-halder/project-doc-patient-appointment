-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 07:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doceasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phn_no` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `full_name`, `phn_no`, `email`) VALUES
(1, 'user1', 'user1', 'Admin', 1234567890, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `book_appointment`
--

CREATE TABLE `book_appointment` (
  `id` int(5) NOT NULL,
  `patient_id` int(5) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED NOT NULL,
  `doctor_id` int(4) UNSIGNED NOT NULL,
  `schedule_id` int(5) UNSIGNED DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `approval_status` enum('PENDING','APPROVED','DECLINE','EXPIRE') NOT NULL DEFAULT 'PENDING',
  `problem` varchar(100) DEFAULT NULL,
  `doctor_appointment_slip` mediumblob DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_test`
--

CREATE TABLE `book_test` (
  `ticket_no` int(5) UNSIGNED NOT NULL,
  `test_id` int(4) UNSIGNED NOT NULL,
  `patient_id` int(5) UNSIGNED DEFAULT NULL,
  `clinic_id` int(4) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `approval_status` enum('PENDING','APPROVED','DECLINE','EXPIRE') NOT NULL DEFAULT 'PENDING',
  `test_appointment_slip` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_test`
--

INSERT INTO `book_test` (`ticket_no`, `test_id`, `patient_id`, `clinic_id`, `date`, `approval_status`, `test_appointment_slip`) VALUES
(33, 27, 53, 8, '2022-05-11', 'APPROVED', NULL),
(34, 27, 53, 8, '2022-05-10', 'APPROVED', NULL),
(35, 29, 53, 8, '2022-05-10', 'APPROVED', NULL),
(36, 30, 55, 8, '2022-05-12', 'APPROVED', NULL),
(37, 30, 55, 8, '2022-05-12', 'APPROVED', NULL),
(38, 27, 55, 8, '2022-05-08', 'APPROVED', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(4) UNSIGNED NOT NULL,
  `clinic_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin_code` int(6) UNSIGNED NOT NULL,
  `contact_no` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `clinic_upi_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `clinic_name`, `address`, `city`, `pin_code`, `contact_no`, `email`, `clinic_upi_id`) VALUES
(8, 'Burdwan Medical College And Hospital', 'Khosbagan, Burdwan, West Bengal 713104', 'Burdwan', 713104, 3427962200, 'burdwanHospital@gmail.com', 'burdwanHospital@oksbi'),
(9, 'Bengal Faith Hospital', 'Health City, Goda, Burdwan, West Bengal 713102', 'Burdwan', 713102, 8420382000, 'bengalfaithhospital@gmail.com', 'bengalFaithHospital@okaxis'),
(10, 'Kisholoy Children Hospital', '69, Grand Trunk Road, Purbachal, Sripally, Kanainatsal, Burdwan, West Bengal 713103', 'Burdwan', 713103, 6296055055, 'kisholoyHospital@gmail.com', 'kisholoyHospital@okaxis'),
(11, 'Apollo Nursing Home', 'Shyamlal Colony, Khosbagan, Burdwan, West Bengal 713101', 'Burdwan', 713101, 9501032383, 'apolloNursingHome@gmail.com', 'apolloNursinghome@oksbi');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_feedback`
--

CREATE TABLE `clinic_feedback` (
  `id` int(5) NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `date_time` varchar(50) NOT NULL,
  `user_type` enum('DOCTOR','PATIENT') NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message_type` enum('FEEDBACK','COMPLAIN','QUERY','') NOT NULL,
  `message` varchar(500) NOT NULL,
  `attach_file` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_feedback`
--

INSERT INTO `clinic_feedback` (`id`, `clinic_id`, `date_time`, `user_type`, `name`, `email`, `message_type`, `message`, `attach_file`) VALUES
(3, 8, '07-05-2022 10:26:17', 'PATIENT', 'Rimi', 'rimi22@gmail.com', 'QUERY', 'can i cancel appointment from here?', ''),
(4, 8, '07-05-2022 10:27:10', 'PATIENT', 'Rimi', 'rimi22@gmail.com', 'QUERY', 'Can i cancel appointment anytime from here?', '');

-- --------------------------------------------------------

--
-- Table structure for table `doceasy_feedback`
--

CREATE TABLE `doceasy_feedback` (
  `feedback_no` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doceasy_feedback`
--

INSERT INTO `doceasy_feedback` (`feedback_no`, `name`, `email`, `message`, `date_time`) VALUES
(4, 'Rupa Roy', 'rupa321@gmail.com', 'This is a very good website', '07-05-2022 10:20:04'),
(5, 'Rimi Mondal', 'rimi22@gmail.com', 'Please give more clinic to your website', '07-05-2022 10:21:04'),
(6, 'Anubhav ', 'anuvab1982@gmail.com', 'This is a useful website for booking appointment.', '07-05-2022 10:22:30'),
(7, 'Rupa', 'rupa21@gmail.com', 'This is a very good website', '07-05-2022 10:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(4) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `mci_no` int(9) UNSIGNED NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) UNSIGNED NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER') NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `degree_proof` mediumblob DEFAULT NULL,
  `experience` int(2) UNSIGNED NOT NULL,
  `phn_no` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `fee` int(4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `clinic_id`, `username`, `password`, `full_name`, `mci_no`, `dob`, `age`, `gender`, `specialization`, `degree`, `degree_proof`, `experience`, `phn_no`, `email`, `start_time`, `end_time`, `fee`) VALUES
(34, 8, 'anuvab7', 34210, 'Anubhav Roy', 314765420, '1985-05-12', 37, 'MALE', 'Cardiology', NULL, NULL, 7, 7895421110, 'anuvab1985@gmail.com', NULL, NULL, NULL),
(35, 8, 'maya32', 1254, 'Maya Sen', 498765200, '1990-02-14', 32, 'FEMALE', 'Gynaecology', NULL, NULL, 5, 9862349978, 'maya1990@gmail.com', NULL, NULL, NULL),
(36, 9, 'tulsi9', 59870, 'Tulsi Kumar Sen', 198776549, '1980-11-23', 42, 'MALE', 'Neurology', NULL, NULL, 9, 8546922177, 'tulsi80@gmail.com', NULL, NULL, NULL),
(37, 10, 'sandeep9', 12345, 'Sandeep Dey', 199878546, '1982-08-25', 40, 'MALE', 'Immunology', NULL, NULL, 9, 7986285460, 'sandeep82@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `m_id` int(2) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phn_no` bigint(10) UNSIGNED NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`m_id`, `clinic_id`, `username`, `password`, `full_name`, `phn_no`, `Email`) VALUES
(27, 8, 'mayank21', 34210, 'Mayank Kumar', 9544310780, 'mayank21@gmail.com'),
(28, 10, 'aditya1', 12345, 'Aditya Biswas', 6423819701, 'aditya123@gmail.com'),
(29, 11, 'sucheta34', 78965, 'Sucheta Sen', 7444566241, 'sucheta34@gmail.com'),
(30, 9, 'koushik9', 1230, 'Koushik Sarkar', 8975411340, 'koushik1992@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(5) UNSIGNED NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `aadhar_no` bigint(12) UNSIGNED NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) UNSIGNED NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER') NOT NULL,
  `marital_status` enum('MARRIED','UNMARRIED') NOT NULL,
  `phn_no` bigint(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin_code` int(6) UNSIGNED NOT NULL,
  `allergic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `username`, `password`, `full_name`, `aadhar_no`, `dob`, `age`, `gender`, `marital_status`, `phn_no`, `email`, `address`, `city`, `pin_code`, `allergic`) VALUES
(53, 'rimi24', 34210, 'Rimi Mondal', 254465419870, '1998-11-19', 24, 'FEMALE', 'UNMARRIED', 9876549874, 'rimi98@gmail.com', 'Khosbagan, Burdwan, West Bengal', 'Burdwan', 713101, 'Egg'),
(54, 'arun22', 4560, 'Arun Saha', 598621436557, '2000-02-13', 22, 'MALE', 'UNMARRIED', 8854921504, 'arun57@gmail.com', 'Police Line Bazar, Burdwan , West Bengal', 'Burdwan', 713103, NULL),
(55, 'biplab90', 123456, 'Biplab Biswas', 985234217894, '1990-05-29', 32, 'MALE', 'MARRIED', 9877765542, 'biplab1990@gmail.com', 'Memari, Burdwan, West Bengal', 'Burdwan', 713153, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_document`
--

CREATE TABLE `patient_document` (
  `id` int(5) NOT NULL,
  `patient_id` int(5) UNSIGNED NOT NULL,
  `report_type` varchar(50) NOT NULL,
  `report` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `t_id` int(4) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `test_type` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `minimum_fee` int(4) UNSIGNED NOT NULL,
  `maximum_fee` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`t_id`, `clinic_id`, `test_type`, `start_time`, `end_time`, `minimum_fee`, `maximum_fee`) VALUES
(27, 8, 'Blood Test', '05:00:00', '20:00:00', 300, 3000),
(28, 8, 'CT Scan', '07:30:00', '16:00:00', 2000, 7000),
(29, 8, 'Urine Test', '08:00:00', '14:00:00', 100, 350),
(30, 8, 'X-rays', '06:00:00', '16:30:00', 200, 4000),
(31, 8, 'Ultrasonography', '07:00:00', '15:00:00', 800, 2500),
(32, 8, 'Blood Test', '05:00:00', '20:00:00', 300, 2000),
(33, 10, 'Blood Test', '06:00:00', '13:00:00', 300, 2000),
(34, 10, 'Blood Test', '06:00:00', '13:00:00', 300, 2000),
(35, 10, 'Urine Test', '06:00:00', '13:00:00', 100, 200),
(36, 10, 'X-rays', '06:00:00', '15:00:00', 400, 1000),
(37, 11, 'ECG', '08:00:00', '15:00:00', 150, 500),
(39, 11, 'CT Scan', '07:30:00', '16:00:00', 2500, 7000),
(40, 11, 'Blood Test', '06:00:00', '16:30:00', 250, 2500),
(41, 11, 'Blood Test', '07:30:00', '16:00:00', 250, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `test_report`
--

CREATE TABLE `test_report` (
  `report_no` int(5) NOT NULL,
  `ticket_no` int(5) UNSIGNED NOT NULL,
  `report` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_appointment`
--
ALTER TABLE `book_appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `book_test`
--
ALTER TABLE `book_test`
  ADD PRIMARY KEY (`ticket_no`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic_feedback`
--
ALTER TABLE `clinic_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `doceasy_feedback`
--
ALTER TABLE `doceasy_feedback`
  ADD PRIMARY KEY (`feedback_no`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `patient_document`
--
ALTER TABLE `patient_document`
  ADD PRIMARY KEY (`id`,`patient_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `test_report`
--
ALTER TABLE `test_report`
  ADD PRIMARY KEY (`report_no`),
  ADD UNIQUE KEY `report` (`report`) USING HASH,
  ADD KEY `ticket_no` (`ticket_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_appointment`
--
ALTER TABLE `book_appointment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `book_test`
--
ALTER TABLE `book_test`
  MODIFY `ticket_no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clinic_feedback`
--
ALTER TABLE `clinic_feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doceasy_feedback`
--
ALTER TABLE `doceasy_feedback`
  MODIFY `feedback_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `m_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `patient_document`
--
ALTER TABLE `patient_document`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `t_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `test_report`
--
ALTER TABLE `test_report`
  MODIFY `report_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_appointment`
--
ALTER TABLE `book_appointment`
  ADD CONSTRAINT `book_appointment_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`p_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_appointment_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`d_id`) ON UPDATE CASCADE;

--
-- Constraints for table `book_test`
--
ALTER TABLE `book_test`
  ADD CONSTRAINT `book_test_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_test_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`p_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_test_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `test` (`t_id`) ON UPDATE CASCADE;

--
-- Constraints for table `clinic_feedback`
--
ALTER TABLE `clinic_feedback`
  ADD CONSTRAINT `clinic_feedback_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `management`
--
ALTER TABLE `management`
  ADD CONSTRAINT `management_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `patient_document`
--
ALTER TABLE `patient_document`
  ADD CONSTRAINT `patient_document_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`p_id`) ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `test_report`
--
ALTER TABLE `test_report`
  ADD CONSTRAINT `test_report_ibfk_1` FOREIGN KEY (`ticket_no`) REFERENCES `book_test` (`ticket_no`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
