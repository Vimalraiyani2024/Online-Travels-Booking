-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 10:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_detail`
--

CREATE TABLE `bus_detail` (
  `busId` int(4) NOT NULL,
  `busType` varchar(2) NOT NULL COMMENT 'SL or ST',
  `busCapacity` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bus_detail`
--

INSERT INTO `bus_detail` (`busId`, `busType`, `busCapacity`) VALUES
(111, 'SL', 50),
(222, 'ST', 50);

-- --------------------------------------------------------

--
-- Table structure for table `freq_detail`
--

CREATE TABLE `freq_detail` (
  `freqId` int(4) NOT NULL,
  `Mon` tinyint(1) NOT NULL,
  `Tue` tinyint(1) NOT NULL,
  `Wed` tinyint(1) NOT NULL,
  `Thu` tinyint(1) NOT NULL,
  `Fri` tinyint(1) NOT NULL,
  `Sat` tinyint(1) NOT NULL,
  `Sun` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `freq_detail`
--

INSERT INTO `freq_detail` (`freqId`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `Sun`) VALUES
(101, 1, 1, 1, 1, 1, 1, 1),
(102, 1, 0, 1, 0, 1, 0, 1),
(103, 1, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_detail`
--

CREATE TABLE `reservation_detail` (
  `res_id` varchar(50) NOT NULL,
  `travelId` varchar(50) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `resDateTime` datetime NOT NULL,
  `resSeat` int(3) NOT NULL,
  `resAmt` float(10,2) NOT NULL,
  `confirm` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservation_detail`
--

INSERT INTO `reservation_detail` (`res_id`, `travelId`, `user_id`, `resDateTime`, `resSeat`, `resAmt`, `confirm`) VALUES
('10226440', '300914AhmeBhav1', '9725515191', '2014-09-29 11:54:50', 20, 450.00, 'N'),
('41485595', '300914AhmeBhav1', '9725515191', '2014-09-29 11:46:01', 25, 450.00, 'N'),
('43978881', '081014AhmeBhav7', '9979797979', '2014-10-01 07:23:31', 3, 300.00, 'N'),
('43978881', '081014AhmeBhav7', '9979797979', '2014-10-01 07:23:31', 4, 300.00, 'N'),
('53918457', '300914AhmeBhav1', '9725515191', '2014-09-29 13:08:28', 4, 450.00, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `route_details`
--

CREATE TABLE `route_details` (
  `routeId` int(10) NOT NULL,
  `busId` int(4) NOT NULL,
  `fromcity` varchar(50) NOT NULL,
  `tocity` varchar(50) NOT NULL,
  `routeDistance` int(8) NOT NULL,
  `deptTime` time NOT NULL,
  `arrTime` time NOT NULL,
  `days` int(5) NOT NULL,
  `fare` float(10,2) NOT NULL,
  `freqId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `route_details`
--

INSERT INTO `route_details` (`routeId`, `busId`, `fromcity`, `tocity`, `routeDistance`, `deptTime`, `arrTime`, `days`, `fare`, `freqId`) VALUES
(1, 111, 'Bhavnagar', 'Ahmedabad', 100, '12:00:00', '03:00:00', 1, 450.00, 101),
(2, 222, 'Bhavnagar', 'Mumbai', 400, '01:00:00', '07:00:00', 2, 1000.00, 102),
(3, 111, 'Bhavnagar', 'Baroda', 100, '03:00:00', '07:00:00', 1, 300.00, 103),
(4, 222, 'Ahmedabad', 'Bhavnagar', 100, '08:00:00', '12:00:00', 1, 300.00, 103),
(5, 111, 'Baroda', 'Bhavnagar', 100, '12:00:00', '04:00:00', 1, 450.00, 101),
(6, 222, 'Mumbai', 'Bhavnagar', 450, '08:00:00', '03:00:00', 2, 1000.00, 101),
(7, 111, 'Bhavnagar', 'Ahmedabad', 100, '03:00:00', '07:00:00', 1, 300.00, 102),
(8, 222, 'Bhavnagar', 'Ahmedabad', 100, '01:00:00', '04:00:00', 1, 450.00, 102);

-- --------------------------------------------------------

--
-- Table structure for table `travel_detail`
--

CREATE TABLE `travel_detail` (
  `travelId` varchar(50) NOT NULL,
  `routeId` int(10) NOT NULL,
  `deptDateTime` datetime NOT NULL,
  `arrDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `travel_detail`
--

INSERT INTO `travel_detail` (`travelId`, `routeId`, `deptDateTime`, `arrDateTime`) VALUES
('090514AhmeBhav1', 1, '2014-09-05 12:00:00', '2014-09-05 03:00:00'),
('090614AhmeBhav1', 1, '2014-09-06 12:00:00', '2014-09-06 03:00:00'),
('090714AhmeBhav1', 1, '2014-09-07 12:00:00', '2014-09-07 03:00:00'),
('090714AhmeBhav7', 7, '2014-09-07 03:00:00', '2014-09-07 07:00:00'),
('090714AhmeBhav8', 8, '2014-09-07 01:00:00', '2014-09-07 04:00:00'),
('090914AhmeBhav1', 1, '2014-09-09 12:00:00', '2014-09-09 03:00:00'),
('091014AhmeBhav1', 1, '2014-09-10 12:00:00', '2014-09-10 03:00:00'),
('091014AhmeBhav7', 7, '2014-09-10 03:00:00', '2014-09-10 07:00:00'),
('091014AhmeBhav8', 8, '2014-09-10 01:00:00', '2014-09-10 04:00:00'),
('091014BhavMumb6', 6, '2014-09-10 08:00:00', '2014-09-10 03:00:00'),
('090914BhavAhme4', 4, '2014-09-09 08:00:00', '2014-09-09 12:00:00'),
('091114AhmeBhav1', 1, '2014-09-11 12:00:00', '2014-09-11 03:00:00'),
('110914AhmeBhav1', 1, '2014-11-09 12:00:00', '2014-11-09 03:00:00'),
('110914AhmeBhav7', 7, '2014-11-09 03:00:00', '2014-11-09 07:00:00'),
('110914AhmeBhav8', 8, '2014-11-09 01:00:00', '2014-11-09 04:00:00'),
('120914AhmeBhav1', 1, '2014-12-09 12:00:00', '2014-12-09 03:00:00'),
('240914AhmeBhav1', 1, '2014-09-24 12:00:00', '2014-09-24 03:00:00'),
('240914AhmeBhav7', 7, '2014-09-24 03:00:00', '2014-09-24 07:00:00'),
('240914AhmeBhav8', 8, '2014-09-24 01:00:00', '2014-09-24 04:00:00'),
('240914BaroBhav3', 3, '2014-09-24 03:00:00', '2014-09-24 07:00:00'),
('140914AhmeBhav1', 1, '2014-09-14 12:00:00', '2014-09-14 03:00:00'),
('140914AhmeBhav7', 7, '2014-09-14 03:00:00', '2014-09-14 07:00:00'),
('140914AhmeBhav8', 8, '2014-09-14 01:00:00', '2014-09-14 04:00:00'),
('220914AhmeBhav7', 7, '2014-09-22 03:00:00', '2014-09-22 07:00:00'),
('220914AhmeBhav8', 8, '2014-09-22 01:00:00', '2014-09-22 04:00:00'),
('190914AhmeBhav7', 7, '2014-09-19 03:00:00', '2014-09-19 07:00:00'),
('190914AhmeBhav8', 8, '2014-09-19 01:00:00', '2014-09-19 04:00:00'),
('250914AhmeBhav1', 1, '2014-09-25 12:00:00', '2014-09-25 03:00:00'),
('260914AhmeBhav1', 1, '2014-09-26 12:00:00', '2014-09-26 03:00:00'),
('260914AhmeBhav7', 7, '2014-09-26 03:00:00', '2014-09-26 07:00:00'),
('260914AhmeBhav8', 8, '2014-09-26 01:00:00', '2014-09-26 04:00:00'),
('280914AhmeBhav1', 1, '2014-09-28 12:00:00', '2014-09-28 03:00:00'),
('280914AhmeBhav7', 7, '2014-09-28 03:00:00', '2014-09-28 07:00:00'),
('280914AhmeBhav8', 8, '2014-09-28 01:00:00', '2014-09-28 04:00:00'),
('DDMMAhmeBhav1', 1, '1970-01-01 05:30:00', '1970-01-01 05:30:00'),
('300914AhmeBhav1', 1, '2014-09-30 12:00:00', '2014-09-30 03:00:00'),
('081014AhmeBhav1', 1, '2014-10-08 12:00:00', '2014-10-08 03:00:00'),
('081014AhmeBhav7', 7, '2014-10-08 03:00:00', '2014-10-08 07:00:00'),
('081014AhmeBhav8', 8, '2014-10-08 01:00:00', '2014-10-08 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_id` varchar(10) NOT NULL,
  `user_type` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(25) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='This table get the user detail and store it';

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `user_type`, `name`, `gender`, `address`, `city`, `mobile`, `email`, `password`) VALUES
('7777777777', 3, 'TESTINGq', 'm', 'Ahmedabad', 'Ahmedbabad', '7777777777', 'c@c.com', '123'),
('8888888888', 2, 'BCA', 'F', 'Baroda', 'Baroda', '8888888888', 'b@b.com', '123'),
('9999999999', 1, 'ABC', 'M', 'Bhavnagar', 'Bhavnagar', '9999999999', 'a@a.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_detail`
--
ALTER TABLE `bus_detail`
  ADD PRIMARY KEY (`busId`);

--
-- Indexes for table `freq_detail`
--
ALTER TABLE `freq_detail`
  ADD PRIMARY KEY (`freqId`);

--
-- Indexes for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  ADD PRIMARY KEY (`res_id`,`resSeat`);

--
-- Indexes for table `route_details`
--
ALTER TABLE `route_details`
  ADD PRIMARY KEY (`routeId`),
  ADD KEY `routeId` (`routeId`),
  ADD KEY `freqId` (`freqId`),
  ADD KEY `busId` (`busId`);

--
-- Indexes for table `travel_detail`
--
ALTER TABLE `travel_detail`
  ADD KEY `routeId` (`routeId`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `route_details`
--
ALTER TABLE `route_details`
  ADD CONSTRAINT `route_details_ibfk_1` FOREIGN KEY (`busId`) REFERENCES `bus_detail` (`busId`),
  ADD CONSTRAINT `route_details_ibfk_2` FOREIGN KEY (`freqId`) REFERENCES `freq_detail` (`freqId`);

--
-- Constraints for table `travel_detail`
--
ALTER TABLE `travel_detail`
  ADD CONSTRAINT `travel_detail_ibfk_1` FOREIGN KEY (`routeId`) REFERENCES `route_details` (`routeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
