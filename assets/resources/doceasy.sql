-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2022 at 08:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `phn_no` int(10) UNSIGNED NOT NULL,
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
  `doctor_message` varchar(100) DEFAULT NULL,
  `doctor_appointment_slip` mediumblob DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_appointment`
--

INSERT INTO `book_appointment` (`id`, `patient_id`, `clinic_id`, `doctor_id`, `schedule_id`, `date`, `approval_status`, `problem`, `doctor_message`, `doctor_appointment_slip`, `transaction_id`) VALUES
(4, 51, 6, 30, NULL, '2022-04-23', 'APPROVED', 'PCOD', NULL, NULL, NULL),
(15, 51, 7, 29, NULL, '2022-04-27', 'APPROVED', '', NULL, NULL, 'cfgcgcf');

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
(7, 25, 51, 6, '2022-04-23', 'PENDING', NULL),
(8, 25, 51, 6, '2022-04-23', 'PENDING', NULL),
(9, 25, 51, 6, '2022-04-24', 'PENDING', NULL);

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
  `contact_no` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `clinic_upi_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `clinic_name`, `address`, `city`, `pin_code`, `contact_no`, `email`, `clinic_upi_id`) VALUES
(6, 'Burdwan Hospital', 'Burdwan Medical College and Hospital, West Bengal', 'Burdwan', 713101, 1234567890, 'burdwanHospital@gmail.com', 'something@oksbi'),
(7, 'Kolkata Nursing Home', 'Rajarhat Main Road, Atghara, Newtown, Kolkata, West Bengal', 'Newtown', 700136, 4294967295, 'KolkataHospital@gmail.com', 'anything@oksbi');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_feedback`
--

CREATE TABLE `clinic_feedback` (
  `id` int(5) NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message_type` enum('FEEDBACK','COMPLAIN','QUERY','') NOT NULL,
  `message` varchar(500) NOT NULL,
  `attach_file` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Dolon Roy', 'rdolon321@gmail.com', 'hii\r\n', '15-04-2022 14:30:02');

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
  `dob` date NOT NULL,
  `age` int(2) UNSIGNED NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER') NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `degree_proof` mediumblob DEFAULT NULL,
  `experience` int(2) UNSIGNED NOT NULL,
  `phn_no` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `fee` int(4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `clinic_id`, `username`, `password`, `full_name`, `dob`, `age`, `gender`, `specialization`, `degree`, `degree_proof`, `experience`, `phn_no`, `email`, `start_time`, `end_time`, `fee`) VALUES
(29, 7, 'anuvab5', 123654, 'Anuvab Roy', '1990-03-23', 32, 'MALE', 'Cardiology', NULL, NULL, 5, 4294967295, 'anuvab1990@gmail.com', '09:00:01', '13:30:00', 300),
(30, 6, 'chitra3', 2580, 'Chitra Mondal', '1993-10-02', 29, 'FEMALE', 'Gynaecology', NULL, NULL, 3, 4294967295, 'chitra93@gmail.com', '10:30:00', '12:30:00', 250),
(31, 6, 'maya31', 78965, 'Maya Sen', '1990-02-03', 32, 'FEMALE', 'Cardiology', 'MBBS', 0x4c5347455f535445502b5f576970726f2e706466, 5, 4294967295, 'maya91@gmail.com', '11:00:00', '00:00:00', 300),
(32, 6, 'rupa27', 1234, 'Rupa Biswas', '1995-02-12', 27, 'FEMALE', 'Cardiology', NULL, NULL, 1, 4294967295, 'rupa27@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doc_appointment_schedule`
--

CREATE TABLE `doc_appointment_schedule` (
  `id` int(5) UNSIGNED NOT NULL,
  `doctor_id` int(4) UNSIGNED NOT NULL,
  `date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `phn_no` int(10) UNSIGNED NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`m_id`, `clinic_id`, `username`, `password`, `full_name`, `phn_no`, `Email`) VALUES
(26, 6, 'mayank21', 34210, 'Mayank kumar', 4294967295, 'mayank21@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(5) UNSIGNED NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) UNSIGNED NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER') NOT NULL,
  `marital_status` enum('MARRIED','UNMARRIED') NOT NULL,
  `phn_no` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin_code` int(6) UNSIGNED NOT NULL,
  `allergic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `username`, `password`, `full_name`, `dob`, `age`, `gender`, `marital_status`, `phn_no`, `email`, `address`, `city`, `pin_code`, `allergic`) VALUES
(51, 'rimi22', 34210, 'Rimi Mondol', '2000-05-20', 22, 'FEMALE', 'UNMARRIED', 4294967295, 'rimi22@gmail.com', 'Khosbagan, Burdwan, West bengal', 'Burdwan', 713103, ''),
(52, 'rdolon', 25896, 'Dolon Roy', '2002-02-12', 20, 'FEMALE', 'UNMARRIED', 4294967295, 'rdolon321@gmail.com', 'Vill. - Maheshdanga Camp, Post - Maheshdanga, district - Purba Bardhaman, pin - 713151', 'Memari', 713151, NULL);

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
(25, 6, 'Blood Test', '06:00:00', '20:00:00', 500, 3000),
(26, 6, 'ECG', '07:00:00', '16:00:00', 800, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `test_reports`
--

CREATE TABLE `test_reports` (
  `report_no` int(5) NOT NULL,
  `ticket_no` int(5) UNSIGNED NOT NULL,
  `test_id` int(4) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED NOT NULL,
  `patient_id` int(5) UNSIGNED NOT NULL,
  `doctor_id` int(4) UNSIGNED DEFAULT NULL,
  `report` mediumblob NOT NULL,
  `report_type` varchar(50) NOT NULL
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
-- Indexes for table `doc_appointment_schedule`
--
ALTER TABLE `doc_appointment_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`,`date_time`);

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
-- Indexes for table `test_reports`
--
ALTER TABLE `test_reports`
  ADD PRIMARY KEY (`report_no`),
  ADD KEY `ticket_no` (`ticket_no`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `book_test`
--
ALTER TABLE `book_test`
  MODIFY `ticket_no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clinic_feedback`
--
ALTER TABLE `clinic_feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doceasy_feedback`
--
ALTER TABLE `doceasy_feedback`
  MODIFY `feedback_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `doc_appointment_schedule`
--
ALTER TABLE `doc_appointment_schedule`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `m_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `patient_document`
--
ALTER TABLE `patient_document`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `t_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `test_reports`
--
ALTER TABLE `test_reports`
  MODIFY `report_no` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_appointment`
--
ALTER TABLE `book_appointment`
  ADD CONSTRAINT `book_appointment_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`p_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_appointment_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`d_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_appointment_ibfk_4` FOREIGN KEY (`schedule_id`) REFERENCES `doc_appointment_schedule` (`id`) ON UPDATE CASCADE;

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
-- Constraints for table `doc_appointment_schedule`
--
ALTER TABLE `doc_appointment_schedule`
  ADD CONSTRAINT `doc_appointment_schedule_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`d_id`) ON UPDATE CASCADE;

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
-- Constraints for table `test_reports`
--
ALTER TABLE `test_reports`
  ADD CONSTRAINT `test_reports_ibfk_1` FOREIGN KEY (`ticket_no`) REFERENCES `book_test` (`ticket_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test_reports_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`t_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test_reports_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`p_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test_reports_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`d_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test_reports_ibfk_5` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
