-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 08:04 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `four_wheeler`
--

CREATE TABLE `four_wheeler` (
  `regno` varchar(16) NOT NULL,
  `class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `four_wheeler`
--

INSERT INTO `four_wheeler` (`regno`, `class`) VALUES
('GJ46 28 32', 'SUV'),
('JK 102 AY', 'Standard'),
('KL 105 AZ', 'Economy'),
('MH 2051', 'Standard'),
('TN 88 1034', 'Economy'),
('WB ABC 102', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('arnabfromjec05', '10101010'),
('lav@gabri', 'gabri1998');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `regno` varchar(16) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`regno`, `name`, `phone_no`, `email`) VALUES
('AP 31 AY 6429', 'Sumeet', 2147483647, 'sum@yahoo.in'),
('ASD 23', 'subh', 2147483647, 'asdaasd@gmail.com'),
('ASD892', 'akash', 2147483647, 'am@yahoo.com'),
('GJ46 28 32', 'Sameer ', 2147483647, 'sameer@hotmail.in'),
('HP AS21', 'jatin', 2147483647, 'jatin@gmail.com'),
('JK 102 AY', 'Jackie', 7755566664, 'jack@gmail.com'),
('KL 1020', 'abhishek', 9966889966, 'abhi@gmail.com'),
('KL 105 AZ', 'aashish', 8846464464, 'as@gmail.com'),
('KT 1045', 'akash', 2147483647, 'aks@yahoomail.in'),
('MH 101', 'Lav Gabri', 8888888811, 'lav1988@gmail.com'),
('MH 2051', 'arnab', 2147483647, 'aj@gmail.com'),
('MP 44 2944', 'akhilesh', 9919919919, 'akh@yahoomail.com'),
('TN 88 1034', 'Mukund', 8765432284, 'mukund@gmail.com'),
('WB ABC 102', 'akj', 2147483647, 'akj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_no` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `slot_type` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_no`, `floor`, `slot_type`, `status`) VALUES
('S001', 'F01', 2, 0),
('S001', 'F02', 2, 1),
('S001', 'F03', 2, 0),
('S002', 'F01', 2, 1),
('S002', 'F02', 2, 0),
('S002', 'F03', 2, 0),
('S003', 'F01', 2, 0),
('S003', 'F02', 2, 0),
('S003', 'F03', 2, 0),
('S004', 'F01', 2, 0),
('S004', 'F02', 2, 0),
('S004', 'F03', 2, 0),
('S005', 'F01', 2, 0),
('S005', 'F02', 2, 0),
('S005', 'F03', 2, 0),
('S006', 'F01', 2, 0),
('S006', 'F02', 2, 0),
('S006', 'F03', 2, 0),
('S007', 'F01', 2, 0),
('S007', 'F02', 2, 0),
('S007', 'F03', 2, 0),
('S008', 'F01', 2, 0),
('S008', 'F02', 2, 0),
('S008', 'F03', 2, 0),
('S009', 'F01', 2, 0),
('S009', 'F02', 2, 0),
('S009', 'F03', 2, 0),
('S010', 'F01', 2, 0),
('S010', 'F02', 2, 0),
('S010', 'F03', 2, 0),
('S011', 'F01', 2, 0),
('S011', 'F02', 2, 0),
('S011', 'F03', 2, 0),
('S012', 'F01', 2, 0),
('S012', 'F02', 2, 0),
('S012', 'F03', 2, 0),
('S013', 'F01', 2, 0),
('S013', 'F02', 2, 0),
('S013', 'F03', 2, 0),
('S014', 'F01', 2, 0),
('S014', 'F02', 2, 0),
('S014', 'F03', 2, 0),
('S015', 'F01', 2, 0),
('S015', 'F02', 2, 0),
('S015', 'F03', 2, 0),
('S016', 'F01', 2, 0),
('S016', 'F02', 2, 0),
('S016', 'F03', 2, 0),
('S017', 'F01', 2, 0),
('S017', 'F02', 2, 0),
('S017', 'F03', 2, 0),
('S018', 'F01', 2, 0),
('S018', 'F02', 2, 0),
('S018', 'F03', 2, 0),
('S019', 'F01', 2, 0),
('S019', 'F02', 2, 0),
('S019', 'F03', 2, 0),
('S020', 'F01', 2, 0),
('S020', 'F02', 2, 0),
('S020', 'F03', 2, 0),
('S021', 'F01', 2, 0),
('S021', 'F02', 2, 0),
('S021', 'F03', 2, 0),
('S022', 'F01', 2, 0),
('S022', 'F02', 2, 0),
('S022', 'F03', 2, 0),
('S023', 'F01', 2, 0),
('S023', 'F02', 2, 0),
('S023', 'F03', 2, 0),
('S024', 'F01', 2, 0),
('S024', 'F02', 2, 0),
('S024', 'F03', 2, 0),
('S025', 'F01', 2, 0),
('S025', 'F02', 2, 0),
('S025', 'F03', 2, 0),
('S026', 'F01', 2, 0),
('S026', 'F02', 2, 0),
('S026', 'F03', 2, 0),
('S027', 'F01', 2, 0),
('S027', 'F02', 2, 0),
('S027', 'F03', 2, 0),
('S028', 'F01', 2, 0),
('S028', 'F02', 2, 0),
('S028', 'F03', 2, 0),
('S029', 'F01', 2, 0),
('S029', 'F02', 2, 0),
('S029', 'F03', 2, 0),
('S030', 'F01', 2, 0),
('S030', 'F02', 2, 0),
('S030', 'F03', 2, 0),
('S031', 'F01', 2, 0),
('S031', 'F02', 2, 0),
('S031', 'F03', 2, 0),
('S032', 'F01', 2, 0),
('S032', 'F02', 2, 0),
('S032', 'F03', 2, 0),
('S033', 'F01', 2, 0),
('S033', 'F02', 2, 0),
('S033', 'F03', 2, 0),
('S034', 'F01', 2, 0),
('S034', 'F02', 2, 0),
('S034', 'F03', 2, 0),
('S035', 'F01', 2, 0),
('S035', 'F02', 2, 0),
('S035', 'F03', 2, 0),
('S036', 'F01', 2, 0),
('S036', 'F02', 2, 0),
('S036', 'F03', 2, 0),
('S037', 'F01', 2, 0),
('S037', 'F02', 2, 0),
('S037', 'F03', 2, 0),
('S038', 'F01', 2, 0),
('S038', 'F02', 2, 0),
('S038', 'F03', 2, 0),
('S039', 'F01', 2, 0),
('S039', 'F02', 2, 0),
('S039', 'F03', 2, 0),
('S040', 'F01', 2, 0),
('S040', 'F02', 2, 0),
('S040', 'F03', 2, 0),
('S041', 'F01', 2, 0),
('S041', 'F02', 2, 0),
('S041', 'F03', 2, 0),
('S042', 'F01', 2, 0),
('S042', 'F02', 2, 0),
('S042', 'F03', 2, 0),
('S043', 'F01', 2, 0),
('S043', 'F02', 2, 0),
('S043', 'F03', 2, 0),
('S044', 'F01', 2, 0),
('S044', 'F02', 2, 0),
('S044', 'F03', 2, 0),
('S045', 'F01', 2, 0),
('S045', 'F02', 2, 0),
('S045', 'F03', 2, 0),
('S046', 'F01', 2, 0),
('S046', 'F02', 2, 0),
('S046', 'F03', 2, 0),
('S047', 'F01', 2, 0),
('S047', 'F02', 2, 0),
('S047', 'F03', 2, 0),
('S048', 'F01', 2, 0),
('S048', 'F02', 2, 0),
('S048', 'F03', 2, 0),
('S049', 'F01', 2, 0),
('S049', 'F02', 2, 0),
('S049', 'F03', 2, 0),
('S050', 'F01', 2, 0),
('S050', 'F02', 2, 0),
('S050', 'F03', 2, 0),
('S051', 'F01', 4, 0),
('S051', 'F02', 4, 0),
('S051', 'F03', 4, 1),
('S052', 'F01', 4, 1),
('S052', 'F02', 4, 1),
('S052', 'F03', 4, 0),
('S053', 'F01', 4, 0),
('S053', 'F02', 4, 0),
('S053', 'F03', 4, 0),
('S054', 'F01', 4, 0),
('S054', 'F02', 4, 0),
('S054', 'F03', 4, 0),
('S055', 'F01', 4, 0),
('S055', 'F02', 4, 0),
('S055', 'F03', 4, 0),
('S056', 'F01', 4, 0),
('S056', 'F02', 4, 0),
('S056', 'F03', 4, 0),
('S057', 'F01', 4, 0),
('S057', 'F02', 4, 0),
('S057', 'F03', 4, 0),
('S058', 'F01', 4, 0),
('S058', 'F02', 4, 0),
('S058', 'F03', 4, 0),
('S059', 'F01', 4, 0),
('S059', 'F02', 4, 0),
('S059', 'F03', 4, 0),
('S060', 'F01', 4, 0),
('S060', 'F02', 4, 0),
('S060', 'F03', 4, 0),
('S061', 'F01', 4, 0),
('S061', 'F02', 4, 0),
('S061', 'F03', 4, 0),
('S062', 'F01', 4, 0),
('S062', 'F02', 4, 0),
('S062', 'F03', 4, 0),
('S063', 'F01', 4, 0),
('S063', 'F02', 4, 0),
('S063', 'F03', 4, 0),
('S064', 'F01', 4, 0),
('S064', 'F02', 4, 0),
('S064', 'F03', 4, 0),
('S065', 'F01', 4, 0),
('S065', 'F02', 4, 0),
('S065', 'F03', 4, 0),
('S066', 'F01', 4, 0),
('S066', 'F02', 4, 0),
('S066', 'F03', 4, 0),
('S067', 'F01', 4, 0),
('S067', 'F02', 4, 0),
('S067', 'F03', 4, 0),
('S068', 'F01', 4, 0),
('S068', 'F02', 4, 0),
('S068', 'F03', 4, 0),
('S069', 'F01', 4, 0),
('S069', 'F02', 4, 0),
('S069', 'F03', 4, 0),
('S070', 'F01', 4, 0),
('S070', 'F02', 4, 0),
('S070', 'F03', 4, 0),
('S071', 'F01', 4, 0),
('S071', 'F02', 4, 0),
('S071', 'F03', 4, 0),
('S072', 'F01', 4, 0),
('S072', 'F02', 4, 0),
('S072', 'F03', 4, 0),
('S073', 'F01', 4, 0),
('S073', 'F02', 4, 0),
('S073', 'F03', 4, 0),
('S074', 'F01', 4, 0),
('S074', 'F02', 4, 0),
('S074', 'F03', 4, 0),
('S075', 'F01', 4, 0),
('S075', 'F02', 4, 0),
('S075', 'F03', 4, 0),
('S076', 'F01', 4, 0),
('S076', 'F02', 4, 0),
('S076', 'F03', 4, 0),
('S077', 'F01', 4, 0),
('S077', 'F02', 4, 0),
('S077', 'F03', 4, 0),
('S078', 'F01', 4, 0),
('S078', 'F02', 4, 0),
('S078', 'F03', 4, 0),
('S079', 'F01', 4, 0),
('S079', 'F02', 4, 0),
('S079', 'F03', 4, 0),
('S080', 'F01', 4, 0),
('S080', 'F02', 4, 0),
('S080', 'F03', 4, 0),
('S081', 'F01', 4, 0),
('S081', 'F02', 4, 0),
('S081', 'F03', 4, 0),
('S082', 'F01', 4, 0),
('S082', 'F02', 4, 0),
('S082', 'F03', 4, 0),
('S083', 'F01', 4, 0),
('S083', 'F02', 4, 0),
('S083', 'F03', 4, 0),
('S084', 'F01', 4, 0),
('S084', 'F02', 4, 0),
('S084', 'F03', 4, 0),
('S085', 'F01', 4, 0),
('S085', 'F02', 4, 0),
('S085', 'F03', 4, 0),
('S086', 'F01', 4, 0),
('S086', 'F02', 4, 0),
('S086', 'F03', 4, 0),
('S087', 'F01', 4, 0),
('S087', 'F02', 4, 0),
('S087', 'F03', 4, 0),
('S088', 'F01', 4, 0),
('S088', 'F02', 4, 0),
('S088', 'F03', 4, 0),
('S089', 'F01', 4, 0),
('S089', 'F02', 4, 0),
('S089', 'F03', 4, 0),
('S090', 'F01', 4, 0),
('S090', 'F02', 4, 0),
('S090', 'F03', 4, 0),
('S091', 'F01', 4, 0),
('S091', 'F02', 4, 0),
('S091', 'F03', 4, 0),
('S092', 'F01', 4, 0),
('S092', 'F02', 4, 0),
('S092', 'F03', 4, 0),
('S093', 'F01', 4, 0),
('S093', 'F02', 4, 0),
('S093', 'F03', 4, 0),
('S094', 'F01', 4, 0),
('S094', 'F02', 4, 0),
('S094', 'F03', 4, 0),
('S095', 'F01', 4, 0),
('S095', 'F02', 4, 0),
('S095', 'F03', 4, 0),
('S096', 'F01', 4, 0),
('S096', 'F02', 4, 0),
('S096', 'F03', 4, 0),
('S097', 'F01', 4, 0),
('S097', 'F02', 4, 0),
('S097', 'F03', 4, 0),
('S098', 'F01', 4, 0),
('S098', 'F02', 4, 0),
('S098', 'F03', 4, 0),
('S099', 'F01', 4, 0),
('S099', 'F02', 4, 0),
('S099', 'F03', 4, 0),
('S100', 'F01', 4, 0),
('S100', 'F02', 4, 0),
('S100', 'F03', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `role` varchar(30) NOT NULL,
  `floor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `phone_no`, `address`, `role`, `floor`) VALUES
('W1', 'Arnab', 8844666884, 'b1,301,BDA Complex', 'Manager', 1),
('W2', 'Lav', 7788991345, 'Homeless', 'Manager', 2),
('W3', 'Kunal', 7855638101, 'Maheshwari Hostel', 'Manager', 3),
('W4', 'Amit', 7899654321, 'Basudi colony,Bangalore', 'Cleaner', 1),
('W5', 'Kaju', 8884646551, 'Kaju colony,Bangalore', 'Cleaner', 2),
('W6', 'Gujju', 7754632145, 'Gujral colony,Bangalore', 'Cleaner', 3),
('W7', 'aashish jerua', 9456208200, 'southend circle,bangalore', 'Cleaner', 1),
('W8', 'sekhar', 9946546321, 'Amrita station', 'Cleaner', 3),
('W9', 'Sambit', 8865478954, 'abc road,mg galli,bangalore', 'Cleaner', 2);

-- --------------------------------------------------------

--
-- Table structure for table `timing_in`
--

CREATE TABLE `timing_in` (
  `slot_no` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `regno` varchar(16) NOT NULL,
  `arrival_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exit_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timing_in`
--

INSERT INTO `timing_in` (`slot_no`, `floor`, `regno`, `arrival_time`, `exit_time`) VALUES
('S001', 'F01', 'ASD 23', '2019-03-19 21:20:32', '2019-03-31 16:01:15'),
('S001', 'F02', 'KT 1045', '2019-03-20 18:48:23', '2019-03-20 19:00:14'),
('S051', 'F01', 'MH 2051', '2019-03-20 18:51:18', '2019-03-22 09:10:52'),
('S001', 'F02', 'ASD892', '2019-03-22 09:06:10', '2019-03-26 19:47:29'),
('S051', 'F01', 'WB ABC 102', '2019-03-23 09:15:37', '2019-03-31 16:54:20'),
('S001', 'F03', 'AP 31 AY 6429', '2019-03-25 06:51:00', '2019-03-31 16:56:11'),
('S002', 'F01', 'HP AS21', '2019-03-26 09:55:47', NULL),
('S051', 'F02', 'GJ46 28 32', '2019-03-26 17:57:24', '2019-03-31 16:30:16'),
('S051', 'F03', 'JK 102 AY', '2019-03-26 18:29:14', NULL),
('S002', 'F02', 'KL 1020', '2019-03-26 19:04:05', '2019-03-31 17:02:02'),
('S052', 'F01', 'KL 105 AZ', '2019-03-27 04:59:11', NULL),
('S001', 'F02', 'MH 101', '2019-03-29 07:40:25', NULL),
('S052', 'F02', 'TN 88 1034', '2019-03-31 15:21:31', NULL),
('S001', 'F01', 'MP 44 2944', '2019-03-31 16:23:54', '2019-03-31 17:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `two_wheeler`
--

CREATE TABLE `two_wheeler` (
  `regno` varchar(16) NOT NULL,
  `class` varchar(20) NOT NULL,
  `cc` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `two_wheeler`
--

INSERT INTO `two_wheeler` (`regno`, `class`, `cc`) VALUES
('AP 31 AY 6429', 'Motorcycle', 200),
('ASD 23', 'Motorcycle', 200),
('ASD892', 'Motorcycle', 120),
('HP AS21', 'Motorcycle', 150),
('KL 1020', 'Motorcycle', 200),
('KT 1045', 'Motorcycle', 90),
('MH 101', 'Motorcycle', 250),
('MP 44 2944', 'Motorcycle', 250);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `regno` varchar(16) NOT NULL,
  `company` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`regno`, `company`, `model`, `color`, `type`) VALUES
('AP 31 AY 6429', 'Bajaj Pulsar', 'A01', 'Blue', 2),
('ASD 23', 'suzuki', 'delux101', 'red', 2),
('ASD892', 'hero', '800', 'red', 2),
('GJ46 28 32', 'Volkswagen', 'Vento', 'Black', 4),
('HP AS21', 'Bajaj', 'Discover', 'black', 2),
('JK 102 AY', 'Renault', 'EV', 'blue', 4),
('KL 1020', 'Royal Enfield', '200', 'Blue', 2),
('KL 105 AZ', 'Renault', 'Dustar 10', 'blue', 4),
('KT 1045', 'Hero Splender', 'Pro 101', 'blue', 2),
('MH 101', 'Bajaj', 'Avenger', 'Red', 2),
('MH 2051', 'Mercedes', 'Benz 102', 'red', 4),
('MP 44 2944', 'Karizma ZMR', '101', 'white', 2),
('TN 88 1034', 'Skoda', 'fabia', 'green', 4),
('WB ABC 102', 'Bugati Veyron', '102', 'black', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `four_wheeler`
--
ALTER TABLE `four_wheeler`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_no`,`floor`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `timing_in`
--
ALTER TABLE `timing_in`
  ADD KEY `regno` (`regno`),
  ADD KEY `slot_no` (`slot_no`),
  ADD KEY `floor` (`floor`),
  ADD KEY `foreign2` (`slot_no`,`floor`);

--
-- Indexes for table `two_wheeler`
--
ALTER TABLE `two_wheeler`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`regno`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `four_wheeler`
--
ALTER TABLE `four_wheeler`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`regno`) REFERENCES `vehicle` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `foreign1` FOREIGN KEY (`regno`) REFERENCES `vehicle` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timing_in`
--
ALTER TABLE `timing_in`
  ADD CONSTRAINT `foreign2` FOREIGN KEY (`slot_no`,`floor`) REFERENCES `slot` (`slot_no`, `floor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign3` FOREIGN KEY (`regno`) REFERENCES `vehicle` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `two_wheeler`
--
ALTER TABLE `two_wheeler`
  ADD CONSTRAINT `foreign10` FOREIGN KEY (`regno`) REFERENCES `vehicle` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
