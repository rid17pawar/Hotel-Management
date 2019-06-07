-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 09:28 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `dine_book`
--

CREATE TABLE `dine_book` (
  `User_Id` int(11) NOT NULL,
  `Table_name` varchar(20) NOT NULL,
  `Guest` tinyint(4) NOT NULL,
  `Event_date` date NOT NULL,
  `Event_time` time NOT NULL,
  `Request` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dine_book`
--

INSERT INTO `dine_book` (`User_Id`, `Table_name`, `Guest`, `Event_date`, `Event_time`, `Request`) VALUES
(1, 'After Dark', 4, '2020-04-08', '17:41:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `event_book`
--

CREATE TABLE `event_book` (
  `User_Id` int(11) NOT NULL,
  `Hall_name` varchar(30) NOT NULL,
  `Event_name` text NOT NULL,
  `Guest` tinyint(4) NOT NULL,
  `Event_date` text NOT NULL,
  `Start_time` time NOT NULL,
  `End_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_book`
--

INSERT INTO `event_book` (`User_Id`, `Hall_name`, `Event_name`, `Guest`, `Event_date`, `Start_time`, `End_time`) VALUES
(1, 'Symphony Banquets, Events & Co', 'Cocktail Party', 127, '12/2/22222', '17:35:00', '19:35:00'),
(1, 'Symphony Banquets, Events & Co', 'Cocktail Party', 127, '12/2/22222', '17:35:00', '19:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `User_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Mob_no` bigint(12) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Age` int(11) NOT NULL,
  `Country` varchar(5) NOT NULL,
  `State` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Locality` varchar(20) NOT NULL,
  `Birth_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`User_Id`, `Name`, `Gender`, `Mob_no`, `Email`, `Password`, `Age`, `Country`, `State`, `City`, `Locality`, `Birth_date`) VALUES
(1, 'Riddhi Pawar', 'Female', 9689338693, 'abc@gmail.com', 'neel123456', 19, 'India', 'maharashtra', 'nashik', 'indira nagar', '24-10-2018');

-- --------------------------------------------------------

--
-- Table structure for table `room_book`
--

CREATE TABLE `room_book` (
  `User_Id` int(11) NOT NULL,
  `Room_name` varchar(30) NOT NULL,
  `Arrival` text NOT NULL,
  `Departure` text NOT NULL,
  `Rooms` tinyint(4) NOT NULL,
  `Adults` tinyint(4) NOT NULL,
  `Children` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_book`
--

INSERT INTO `room_book` (`User_Id`, `Room_name`, `Arrival`, `Departure`, `Rooms`, `Adults`, `Children`) VALUES
(1, 'Signature Suite', '0000-00-00', '0000-00-00', 2, 4, 4),
(1, 'Signature Suite', '90/0987654', '09/90/8907', 2, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
