SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `doceasy`
--
--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(2) UNSIGNED NOT NULL,
  `User_Name` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phn_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_ID` int(6) UNSIGNED NOT NULL,
  `Patient_ID` int(6) UNSIGNED NOT NULL,
  `Doctor_ID` int(5) UNSIGNED NOT NULL,
  `Clinic_ID` tinyint(2) UNSIGNED NOT NULL,
  `Patient_Name` varchar(25) NOT NULL,
  `Doctor_Name` varchar(25) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Approved_OR_Not` bit(1) NOT NULL,
  `Clinic_Address` varchar(200) NOT NULL,
  `Clinic_Name` varchar(30) NOT NULL,
  `Pin_Code` int(6) UNSIGNED NOT NULL,
  `Problem` varchar(200) NOT NULL,
  `Massage` varchar(200) DEFAULT NULL,
  `Fees` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `Clinic_ID` tinyint(2) UNSIGNED NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(15) NOT NULL,
  `Pin_Code` int(6) UNSIGNED NOT NULL,
  `Contact_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_Id` int(5) UNSIGNED NOT NULL,
  `Clinic_ID` tinyint(2) UNSIGNED NOT NULL,
  `User_Name` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Age` tinyint(2) UNSIGNED NOT NULL,
  `Gender` tinytext NOT NULL,
  `Specialization` varchar(30) NOT NULL,
  `Degree` text NOT NULL,
  `Experience` tinyint(2) UNSIGNED NOT NULL,
  `Phn_No` int(10) UNSIGNED NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Clinic_Name` varchar(20) NOT NULL,
  `Clinic_Address` varchar(200) NOT NULL,
  `Pin_Code` int(6) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Fees` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Name` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Massage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `User_Id` int(6) NOT NULL,
  `User_Name` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Age` tinyint(4) NOT NULL,
  `Gender` tinytext NOT NULL,
  `Phn_No` bigint(10) UNSIGNED NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Pin_Code` int(6) UNSIGNED NOT NULL,
  `Allergic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Doctor_ID` int(5) UNSIGNED NOT NULL,
  `Date_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD UNIQUE KEY `Patient_ID` (`Patient_ID`),
  ADD UNIQUE KEY `Doctor_ID` (`Doctor_ID`),
  ADD UNIQUE KEY `Clinic_ID` (`Clinic_ID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`Clinic_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doctor_Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`),
  ADD UNIQUE KEY `Clinic_ID` (`Clinic_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Doctor_ID`,`Date_Time`);
COMMIT;

