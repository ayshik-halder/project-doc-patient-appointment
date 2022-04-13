-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 03:56 AM
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
  `schedule_id` int(5) UNSIGNED NOT NULL,
  `date_time` datetime NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `approval_status` enum('PENDING','APPROVED','DECLINE','EXPIRE') NOT NULL DEFAULT 'PENDING',
  `clinic_name` varchar(100) NOT NULL,
  `clinic_address` varchar(200) NOT NULL,
  `clinic_pin` int(6) UNSIGNED NOT NULL,
  `problem` varchar(100) DEFAULT NULL,
  `doctor_massage` varchar(100) DEFAULT NULL,
  `doctor_fee` int(4) UNSIGNED NOT NULL,
  `doctor_appointment_slip` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_test`
--

CREATE TABLE `book_test` (
  `ticket_no` int(5) UNSIGNED NOT NULL,
  `test_id` int(4) UNSIGNED NOT NULL,
  `patient_id` int(5) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED NOT NULL,
  `reffered` enum('YES','NO') NOT NULL,
  `doctor_id` int(4) UNSIGNED DEFAULT NULL,
  `patient_name` varchar(50) NOT NULL,
  `test_type` varchar(50) NOT NULL,
  `doctor_name` varchar(50) DEFAULT NULL,
  `clinic_name` varchar(100) NOT NULL,
  `clinic_address` varchar(200) NOT NULL,
  `clinic_pin` int(6) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `approval_status` enum('PENDING','APPROVED','DECLINE','EXPIRE') NOT NULL DEFAULT 'PENDING',
  `test_fee` int(4) UNSIGNED NOT NULL,
  `test_appointment_slip` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(4) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) UNSIGNED NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER') NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `degree_proof` mediumblob DEFAULT NULL,
  `experience` int(2) UNSIGNED NOT NULL,
  `phn_no` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `fee` int(4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doc_appointment_schedule`
--

CREATE TABLE `doc_appointment_schedule` (
  `id` int(5) UNSIGNED NOT NULL,
  `doctor_id` int(4) UNSIGNED NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(2) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phn_no` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `clinic_id`, `username`, `password`, `first_name`, `last_name`, `phn_no`, `email`) VALUES
(25, 6, 'user1', 123, 'Dolon', 'Roy', 4294967295, 'rdolon321@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
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

INSERT INTO `patient` (`id`, `username`, `password`, `first_name`, `last_name`, `dob`, `age`, `gender`, `marital_status`, `phn_no`, `email`, `address`, `city`, `pin_code`, `allergic`) VALUES
(50, 'rdolon', 12345, 'Dolon', 'Roy', '2002-02-12', 0, 'FEMALE', 'UNMARRIED', 4294967295, 'rdolon321@gmail.com', 'Vill. - Maheshdanga Camp, Post - Maheshdanga, district - Purba Bardhaman, pin - 713151', 'Memari', 713151, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_document`
--

CREATE TABLE `patient_document` (
  `patient_id` int(5) UNSIGNED NOT NULL,
  `report` mediumblob NOT NULL,
  `report_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(4) UNSIGNED NOT NULL,
  `clinic_id` int(4) UNSIGNED DEFAULT NULL,
  `test_type` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `fee` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `clinic_id` (`clinic_id`),
  ADD KEY `doctor_id` (`doctor_id`);

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
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_id` (`clinic_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_document`
--
ALTER TABLE `patient_document`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_test`
--
ALTER TABLE `book_test`
  MODIFY `ticket_no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `feedback_no` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `doc_appointment_schedule`
--
ALTER TABLE `doc_appointment_schedule`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `book_appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_appointment_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_appointment_ibfk_4` FOREIGN KEY (`schedule_id`) REFERENCES `doc_appointment_schedule` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `book_test`
--
ALTER TABLE `book_test`
  ADD CONSTRAINT `book_test_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_test_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_test_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_test_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `doc_appointment_schedule_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `management`
--
ALTER TABLE `management`
  ADD CONSTRAINT `management_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `patient_document`
--
ALTER TABLE `patient_document`
  ADD CONSTRAINT `patient_document_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `test_reports_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test_reports_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test_reports_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test_reports_ibfk_5` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
