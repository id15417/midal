-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 11:13 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `facilityName` varchar(50) NOT NULL,
  `buildingName` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) DEFAULT NULL,
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `facilityName`, `buildingName`, `regDate`, `status`, `lastUpdationDate`) VALUES
(3, 'Platform', 'Campus Building', '2018-01-21 04:41:41', 'closed', '2018-05-24 04:43:28'),
(4, 'Platform', 'Campus Building', '2018-01-21 04:41:41', 'in process', '2018-05-24 16:01:23'),
(5, 'Platform', 'Campus Building', '2018-01-21 04:41:41', 'in process', '2018-06-10 10:55:37'),
(6, 'Platform', 'Campus Building', '2018-01-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(7, 'Platform', 'Campus Building', '2018-01-21 04:41:41', 'in process', '2018-05-23 05:25:17'),
(8, 'Platform', 'Campus Building', '2018-01-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(9, 'Platform', 'Campus Building', '2018-01-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(10, 'Platform', 'Campus Building', '2018-01-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(11, 'Platform', 'Campus Building', '2018-02-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(12, 'Platform', 'Campus Building', '2018-02-21 04:41:41', 'in process', '2018-05-23 05:26:05'),
(13, 'Platform', 'Campus Building', '2018-02-21 04:41:41', 'in process', '2018-05-24 04:49:34'),
(14, 'Platform', 'Campus Building', '2018-02-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(15, 'Platform', 'Campus Building', '2018-02-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(16, 'Platform', 'Campus Building', '2018-02-21 04:41:41', 'in process', '2018-06-04 20:28:52'),
(17, 'Platform', 'Campus Building', '2018-02-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(18, 'Platform', 'Campus Building', '2018-02-21 04:41:41', 'in process', '2018-06-10 01:27:33'),
(19, 'Platform', 'Campus Building', '2018-02-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(20, 'Platform', 'Campus Building', '2018-02-21 04:41:41', 'closed', '2018-06-10 10:56:37'),
(21, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(22, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(24, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(25, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(26, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(27, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(28, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(29, 'Platform', 'Campus Building', '2018-03-21 04:41:41', NULL, '0000-00-00 00:00:00'),
(30, 'Proyektor', 'Campus Building', '2018-03-21 04:41:41', NULL, '2018-11-04 09:53:02'),
(31, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(32, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(33, 'Proyektor', 'Campus Building', '2018-04-10 04:41:41', 'in process', '2018-11-04 09:52:50'),
(34, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(35, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(36, 'Proyektor', 'Campus Building', '2018-04-10 04:41:41', NULL, '2018-11-04 09:52:53'),
(37, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(38, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(39, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(40, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(41, 'Proyektor', 'Campus Building', '2018-04-10 04:41:41', NULL, '2018-11-04 09:52:56'),
(42, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(43, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(44, 'Proyektor', 'Campus Building', '2018-04-10 04:41:41', NULL, '2018-11-04 09:52:59'),
(45, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(46, 'Platform', 'Campus Building', '2018-04-10 04:41:41', NULL, '0000-00-00 00:00:00'),
(47, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(48, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(49, 'Platform', 'Campus Building', '2018-05-20 04:41:41', 'in process', '2018-05-24 04:50:52'),
(50, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(51, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(52, 'Proyektor', 'Campus Building', '2018-05-20 04:41:41', NULL, '2018-11-04 09:47:49'),
(53, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(54, 'Platform', 'Campus Building', '2018-05-20 04:41:41', 'in process', '2018-07-03 13:32:25'),
(55, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(56, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(57, 'Proyektor', 'Campus Building', '2018-05-20 04:41:41', NULL, '2018-11-04 09:47:52'),
(58, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(59, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(60, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(61, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(62, 'Platform', 'Campus Building', '2018-05-20 04:41:41', NULL, '0000-00-00 00:00:00'),
(63, 'Window', 'Campus Building', '2018-05-24 04:52:08', NULL, '0000-00-00 00:00:00'),
(64, 'Window', 'Campus Building', '2018-05-26 17:09:55', NULL, '0000-00-00 00:00:00'),
(65, 'Window', 'Rectorat Building', '2018-05-26 17:27:34', NULL, '0000-00-00 00:00:00'),
(66, 'Proyektor', 'Campus Building', '2018-05-26 17:27:55', NULL, '0000-00-00 00:00:00'),
(67, 'Platform', 'Campus Building', '2018-05-31 21:41:41', NULL, '0000-00-00 00:00:00'),
(68, 'Platform', 'Campus Building', '2018-05-31 21:41:41', NULL, '0000-00-00 00:00:00'),
(69, 'Platform', 'Campus Building', '2018-05-31 21:41:41', NULL, '0000-00-00 00:00:00'),
(70, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(71, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(72, 'Platform', 'Campus Building', '2018-06-01 21:41:41', 'in process', '2018-05-23 21:50:52'),
(73, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(74, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(75, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(76, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(77, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(78, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(79, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(80, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(81, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(82, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(83, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(84, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(85, 'Platform', 'Campus Building', '2018-06-01 21:41:41', NULL, '0000-00-00 00:00:00'),
(86, 'Window', 'Campus Building', '2018-06-02 21:52:08', NULL, '0000-00-00 00:00:00'),
(87, 'Window', 'Campus Building', '2018-06-04 10:09:55', NULL, '0000-00-00 00:00:00'),
(88, 'Window', 'Rectorat Building', '2018-06-26 10:27:05', NULL, '0000-00-00 00:00:00'),
(89, 'Proyektor', 'Campus Building', '2018-06-05 10:27:55', NULL, '0000-00-00 00:00:00'),
(91, 'Platform', 'Campus Building', '2018-06-13 02:13:13', NULL, '0000-00-00 00:00:00'),
(92, 'Window', 'Campus Building', '2018-06-13 03:11:12', NULL, '0000-00-00 00:00:00'),
(93, 'Select Facility Name', 'Select Building Name', '2018-06-13 03:11:23', NULL, '0000-00-00 00:00:00'),
(94, 'Amplifier', 'Campus Building', '2018-06-13 03:11:34', NULL, '0000-00-00 00:00:00'),
(95, 'Proyektor', 'Rectorat Building', '2018-06-13 03:13:30', NULL, '0000-00-00 00:00:00'),
(96, 'Proyektor', 'Rectorat Building', '2018-06-13 03:17:07', NULL, '0000-00-00 00:00:00'),
(97, 'Window', 'Campus Building', '2018-06-20 14:52:08', NULL, '0000-00-00 00:00:00'),
(98, 'Window', 'Campus Building', '2018-06-21 03:09:55', NULL, '0000-00-00 00:00:00'),
(99, 'Window', 'Rectorat Building', '2018-06-22 03:27:05', NULL, '0000-00-00 00:00:00'),
(100, 'Proyektor', 'Campus Building', '2018-06-23 03:27:55', NULL, '0000-00-00 00:00:00'),
(101, 'Platform', 'Campus Building', '2018-06-23 19:13:13', NULL, '0000-00-00 00:00:00'),
(102, 'Window', 'Campus Building', '2018-06-24 20:11:12', NULL, '0000-00-00 00:00:00'),
(103, 'Select Facility Name', 'Select Building Name', '2018-06-24 20:11:23', NULL, '0000-00-00 00:00:00'),
(104, 'Amplifier', 'Campus Building', '2018-06-24 20:11:34', NULL, '0000-00-00 00:00:00'),
(105, 'Proyektor', 'Rectorat Building', '2018-06-25 20:13:30', NULL, '0000-00-00 00:00:00'),
(106, 'Proyektor', 'Rectorat Building', '2018-06-25 20:17:07', NULL, '0000-00-00 00:00:00'),
(107, 'Window', 'Campus Building', '2018-06-20 14:52:08', NULL, '0000-00-00 00:00:00'),
(108, 'Window', 'Campus Building', '2018-06-21 03:09:55', NULL, '0000-00-00 00:00:00'),
(109, 'Window', 'Rectorat Building', '2018-06-22 03:27:05', NULL, '0000-00-00 00:00:00'),
(110, 'Proyektor', 'Campus Building', '2018-06-23 03:27:55', NULL, '0000-00-00 00:00:00'),
(111, 'Platform', 'Campus Building', '2018-06-23 19:13:13', NULL, '0000-00-00 00:00:00'),
(112, 'Window', 'Campus Building', '2018-06-24 20:11:12', NULL, '0000-00-00 00:00:00'),
(113, 'Select Facility Name', 'Select Building Name', '2018-06-24 20:11:23', NULL, '0000-00-00 00:00:00'),
(114, 'Amplifier', 'Campus Building', '2018-06-24 20:11:34', NULL, '0000-00-00 00:00:00'),
(115, 'Proyektor', 'Rectorat Building', '2018-06-25 20:13:30', NULL, '0000-00-00 00:00:00'),
(116, 'Proyektor', 'Rectorat Building', '2018-06-25 20:17:07', NULL, '0000-00-00 00:00:00'),
(117, 'Platform', 'Campus Building', '2018-07-01 14:41:41', 'in process', '2018-07-23 14:50:52'),
(118, 'Proyektor', 'Campus Building', '2018-07-01 14:41:41', 'in process', '2018-11-04 09:48:09'),
(119, 'Proyektor', 'Campus Building', '2018-07-01 14:41:41', 'in process', '2018-11-04 09:48:13'),
(120, 'Proyektor', 'Campus Building', '2018-07-01 14:41:41', 'in process', '2018-11-04 09:48:17'),
(121, 'Platform', 'Campus Building', '2018-07-01 14:41:41', 'in process', '2018-07-23 14:50:52'),
(122, 'Platform', 'Campus Building', '2018-08-01 14:41:41', 'closed', '2018-08-23 14:50:52'),
(123, 'Platform', 'Campus Building', '2018-08-01 14:41:41', 'closed', '2018-08-23 14:50:52'),
(124, 'Platform', 'Campus Building', '2018-08-01 14:41:41', 'closed', '2018-08-23 14:50:52'),
(125, 'Platform', 'Campus Building', '2018-08-01 14:41:41', 'closed', '2018-08-23 14:50:52'),
(126, 'Platform', 'Campus Building', '2018-08-01 14:41:41', 'closed', '2018-08-23 14:50:52'),
(127, 'Platform', 'Campus Building', '2018-10-01 14:41:41', 'closed', '2018-10-23 14:50:52'),
(128, 'Platform', 'Campus Building', '2018-10-01 14:41:41', 'closed', '2018-10-23 14:50:52'),
(129, 'Platform', 'Campus Building', '2018-10-01 14:41:41', 'closed', '2018-10-23 14:50:52'),
(130, 'Platform', 'Campus Building', '2018-10-01 14:41:41', 'closed', '2018-10-23 14:50:52'),
(131, 'Platform', 'Campus Building', '2018-10-01 14:41:41', 'closed', '2018-10-23 14:50:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
