-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 03:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
(6, 7, 5, 22, 3, 11, 1, 33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `Donate_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Hospital_ID` int(11) NOT NULL,
  `Appointment_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`Donate_ID`, `User_ID`, `Hospital_ID`, `Appointment_Date`) VALUES
(19, 5, 2, '1970-01-01 00:00:00'),
(20, 6, 2, '2021-06-23 00:00:00'),
(21, 6, 2, '1970-01-01 00:00:00'),
(22, 5, 2, '2021-06-25 00:00:00'),
(23, 5, 2, '2021-06-24 00:00:00'),
(24, 5, 2, '2021-06-24 00:00:00'),
(25, 6, 2, '2021-07-02 00:00:00'),
(26, 5, 2, '2021-06-25 00:00:00'),
(27, 5, 2, '2021-06-25 00:00:00'),
(28, 8, 2, '2021-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Hospital_ID` int(11) NOT NULL,
  `Hospital_Name` varchar(20) NOT NULL,
  `Hospital_Address` text NOT NULL,
  `Hospital_Contact_Number` int(7) NOT NULL,
  `Hospital_Password` varchar(15) NOT NULL,
  `Hospital_Email_Address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Hospital_ID`, `Hospital_Name`, `Hospital_Address`, `Hospital_Contact_Number`, `Hospital_Password`, `Hospital_Email_Address`) VALUES
(2, 'Westminster', 'London', 123, 'aaa', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Hospital_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Request_ID`, `User_ID`, `Hospital_ID`) VALUES
(23, 5, 2),
(24, 5, 2);

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
(2, 2, 6, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `User_Age` int(2) NOT NULL,
  `User_Address` text NOT NULL,
  `User_Contact_Number` int(9) NOT NULL,
  `User_Blood_Type` set('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `User_Password` varchar(16) NOT NULL,
  `User_Email_Address` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `User_Age`, `User_Address`, `User_Contact_Number`, `User_Blood_Type`, `User_Password`, `User_Email_Address`) VALUES
(5, 'Drew', 20, 'Davao', 165238050, 'A+', '123', 'drew'),
(6, 'Greg', 21, 'Koronadal', 222, 'B+', 'bbb', 'greg'),
(7, 'Ferd', 20, 'Davao', 333, 'B+', 'aaa', 'mmm'),
(8, 'Bea', 20, 'Davao', 444, 'O+', 'ddd', 'bea');

--
-- Indexes for dumped tables
--

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
  MODIFY `BloodGroups_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `Donate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Hospital_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `Stock_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
