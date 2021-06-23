-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 09:10 AM
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
(1, 'admin@gmail.com', '123admin', 'Miguel asdasd');

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
(1, 10, 5, 19, 3, 11, 1, 32, 2),
(6, 26, 6, 7, 20, 11, 14, 2, 5);

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
(1, 'Hentai Hospital', 'hentai', 911, 'savelives', 'drewzy@gmail.com'),
(2, 'Westminster', 'Unahan sa Agdao', 69, 'hotdog', 'hot@dog');

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
(3, 2, 6, 'Available');

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
(5, '', 0, 'sdf', '0', 'A+', 'sdf', 'sdf@sfgd', ''),
(6, 'Ferdi Gadorskie', 0, 'Davao City', '2147483647', 'A+', '12345hentai', 'ferdi@yahoo.com', ''),
(7, 'Nani Oppa', 0, 'Korea City', '2147483647', 'O+', '12345jettmain', 'nani@oppa.com', ''),
(8, 'sdf', 0, 'sdf', '123123', 'A+', '3242341', '123@sdf', ''),
(9, 'dasd', 0, 'asdas', '2147483647', 'A+', '126666sdffg', 'asdasd@gmail.com', ''),
(10, 'ferd', 0, 'Davao Del Sur', '666', 'A+', '12345hentai', 'ferd@gmail.com', ''),
(12, 'Ferd', 21, 'Davao City', '2147483647', 'A+', '12345hef', 'feerdi@gmail.cpm', ''),
(13, 'asd asdas', 35, 'asdas wqe', '2147483647', 'A+', '12345hentai', 'iidrefpulga@gmail.co', ''),
(14, 'sad', 13, 'dase', '12341', 'A+', '12345genitalia', 'asdasd@gmail.com', ''),
(15, 'saad asfaq', 69, 'Afghanistan', '2147483647', 'A+', 'inshallah911', 'halal@aljazeera.com', ''),
(16, 'oli yikes', 23, 'London', '9123423123', 'A+', '12345jungkook', 'oli@london.com', ''),
(17, 'mmbabbee', 34, 'Paris', '09302728676', 'A+', '12345neymarass', 'psg@suck.com', ''),
(18, 'ferdinand gador', 21, 'sa puso mo', '09302728676', 'A+', '12345hentai', 'ferdi@yahoo.com', ''),
(19, 'Ferdinand Gador II', 21, 'Davao City', '09302728676', 'A+', '12345nani0ppa', 'lordvaderstrange@gma', ''),
(20, 'sdfg', 12, 'qweasd sad', '123', 'A+', 'asdasdasda', 'ergerger@lolo.cls', ''),
(22, 'mitch harper', 21, 'Davao City', '09122312341', 'A+', 'steelseries', 'mitchharper@gmail.com', ''),
(23, 'hentai', 31, 'davaop', '0123123', 'A+', '12345', 'hent@ai', ''),
(24, 'oni cahn', 21, 'davao cirt', '012938123', 'A+', '12345', 'oni@chan', 'Male');

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
  MODIFY `BloodGroups_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `Donate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Hospital_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `Stock_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
