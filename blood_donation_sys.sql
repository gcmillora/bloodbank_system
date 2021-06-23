-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2021 at 10:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Email_Address` varchar(35) NOT NULL,
  `Admin_Password` varchar(16) NOT NULL,
  `Admin_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Email_Address`, `Admin_Password`, `Admin_Name`) VALUES
(1, 'admin@gmail.com', 'admin', 'Sir Migz');

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `BloodGroups_ID` int(11) NOT NULL,
  `A+` int(9) NOT NULL,
  `A-` int(11) NOT NULL,
  `B+` int(9) NOT NULL,
  `B-` int(11) NOT NULL,
  `AB+` int(9) NOT NULL,
  `AB-` int(11) NOT NULL,
  `O+` int(9) NOT NULL,
  `O-` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`BloodGroups_ID`, `A+`, `A-`, `B+`, `B-`, `AB+`, `AB-`, `O+`, `O-`) VALUES
(1, 12, 5, 12, 9, 12, 18, 23, 22),
(2, 26, 6, 7, 20, 11, 14, 2, 5),
(3, 10, 5, 19, 3, 11, 1, 32, 2),
(4, 12, 35, 34, 11, 2, 3, 53, 33),
(5, 12, 35, 14, 2, 9, 34, 35, 8),
(6, 7, 53, 39, 8, 9, 14, 18, 29);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `Donate_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Hospital_ID` int(11) NOT NULL,
  `Appointment_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`Donate_ID`, `User_ID`, `Hospital_ID`, `Appointment_Date`) VALUES
(1, 22, 0, '2021-06-25'),
(2, 22, 2, '2021-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Hospital_ID` int(11) NOT NULL,
  `Hospital_Name` varchar(50) NOT NULL,
  `Hospital_Address` text NOT NULL,
  `Hospital_Contact_Number` int(7) NOT NULL,
  `Hospital_Password` varchar(15) NOT NULL,
  `Hospital_Email_Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Hospital_ID`, `Hospital_Name`, `Hospital_Address`, `Hospital_Contact_Number`, `Hospital_Password`, `Hospital_Email_Address`) VALUES
(1, 'Southern Philippines Medical Center', 'J.P. Laurel Ave, Bajada, Davao City', 2272731, '12345', 'spmc@gmail.com'),
(2, 'Davao Doctors Hospital', '118 Elpidio Quirino Ave, Poblacion District, Davao City', 2228000, '12345', 'davaodoc@gmail.com'),
(3, 'Brokenshire Integrated Health Ministries, Inc.', 'Brokenshire Heights, A. Pichon St, Armau, Davao City', 3053170, '12345', 'brokenshire@gmail.com'),
(4, 'Allah Valley Medical Specialists\' Center, Inc.', 'Gensan Drive, Koronadal City', 2283350, '12345', 'allahvalley@gmail.com'),
(5, 'South Cotabato Provincial Hospital', '640 Osmena, Poblacion, Koronadal City', 2282919, '12345', 'scph@gmail.com'),
(6, 'General Santos Doctors Hospital, Inc.', 'South Cotabato PH, Pan-Philippine Hwy, General Santos City', 2502777, '12345', 'gensandoc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Hospital_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `Stock_ID` int(11) NOT NULL,
  `Hospital_ID` int(11) NOT NULL,
  `BloodGroups_ID` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`Stock_ID`, `Hospital_ID`, `BloodGroups_ID`, `Status`) VALUES
(2, 1, 1, 'Available'),
(3, 2, 2, 'Available'),
(4, 3, 3, 'Available'),
(5, 4, 4, 'Available'),
(6, 5, 5, 'Available'),
(7, 6, 6, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `User_Age` int(2) NOT NULL,
  `User_Address` text NOT NULL,
  `User_Contact_Number` varchar(11) NOT NULL,
  `User_Blood_Type` set('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `User_Password` varchar(16) NOT NULL,
  `User_Email_Address` varchar(35) NOT NULL,
  `User_Sex` set('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Age`, `User_Address`, `User_Contact_Number`, `User_Blood_Type`, `User_Password`, `User_Email_Address`, `User_Sex`) VALUES
(1, 'Greg Norman Millora', 21, 'Vergara Subdivision, Koronadal City, South Cotabato', '09989585070', 'AB+', '12345', 'greg@gmail.com', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`BloodGroups_ID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`Donate_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Hospital_ID` (`Hospital_ID`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Hospital_ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`Stock_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `BloodGroups_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `Donate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Hospital_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `Stock_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
