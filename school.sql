-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 02:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `C_ID` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`C_ID`, `name`) VALUES
('12A', '12 - A'),
('12B', '12 - B'),
('12C', '12 - C'),
('13A', '13 - A'),
('13B', '13 - B'),
('13C', '13 - C');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `S_ID` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `class` varchar(255) NOT NULL,
  `Tele` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`S_ID`, `Name`, `DOB`, `City`, `class`, `Tele`) VALUES
('1', 'Kavindu Perera', '2005-01-01', 'Colombo', '12A', '0712345678'),
('10', 'Sachintha Perera', '2005-10-10', 'Anuradhapura', '13A', '0701234567'),
('11', 'Hass Er', '2023-11-21', 'cinko', '13A', '4435443545'),
('13', 'hasitha', '2023-11-24', 'Kiribathgoda ', '12C', '4435443545'),
('14', 'nimal', '2023-12-01', 'Kiribathgoda ', '12C', '4435443545'),
('15', 'HasithX ', '2023-11-24', 'Kiribathgoda ', '12C', '4435443545'),
('2', 'Nimasha Fernando', '2005-02-02', 'Gampaha', '12B', '0723456789'),
('3', 'Lakshan Jayasuriya', '2005-03-03', 'Kalutara', '12C', '0734567890'),
('4', 'Tharushi Silva', '2005-04-04', 'Kandy', '13A', '0745678901'),
('5', 'Rashmi Gunawardena', '2005-05-05', 'Matale', '13B', '0756789012'),
('6', 'Dinuka Rajapaksa', '2005-06-06', 'Nuwara Eliya', '13C', '0767890123'),
('7', 'Sanduni Wijesekara', '2005-07-07', 'Galle', '12A', '0778901234'),
('8', 'Chamod Karunaratne', '2005-08-08', 'Matara', '12B', '0789012345'),
('9', 'Nipuni De Silva', '2005-09-09', 'Hambantota', '12C', '0790123456');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `name`) VALUES
('sub1', 'SFT'),
('sub2', 'ET'),
('sub3', 'ICT'),
('sub4', 'BST'),
('sub5', 'AGRY');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `T_ID` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `tele` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`T_ID`, `name`, `dob`, `subject`, `tele`) VALUES
('1', 'A.P Silva', '1965-11-16', 'sub1', '0781270908'),
('10', 'J.S De Silva', '1984-07-03', 'sub1', '0789012345'),
('12', 'hasitha', '2023-11-22', 'sub3', '0727349348'),
('13', 'eranga', '2023-11-24', 'sub3', '4235436565'),
('14', 'karoli', '2023-11-24', 'sub4', '0727349348'),
('2', 'B.K Perera', '1970-05-23', 'sub2', '0712345678'),
('3', 'C.L Fernando', '1968-08-12', 'sub3', '0765432190'),
('31232', 'thenne', '2023-11-29', 'sub3', '1876876237'),
('4', 'D.M Jayawardena', '1972-03-15', 'sub1', '0777894561'),
('5', 'E.N Wijesinghe', '1974-06-18', 'sub2', '0756789456'),
('6', 'F.O Gunasekara', '1976-09-21', 'sub3', '0723456789'),
('7', 'G.P Kumara', '1978-12-24', 'sub1', '0798765432'),
('8', 'H.Q Dias', '1980-01-27', 'sub2', '0745678901'),
('9', 'I.R Rajapaksa', '1982-04-30', 'sub3', '0734567890');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `time_table_id` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `teacher` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`time_table_id`, `class`, `date`, `subject`, `teacher`, `time`) VALUES
(1, '12A', 'Monday', 'sub1', '1', 'period1'),
(2, '12A', 'Monday', 'sub3', '3', 'period2'),
(3, '12A', 'Monday', 'sub2', '2', 'period3'),
(4, '12A', 'Monday', 'sub4', '4', 'period4'),
(5, '12A', 'Monday', 'sub5', '5', 'period5'),
(6, '12A', 'Monday', 'sub1', '1', 'period6'),
(7, '12A', 'Monday', 'sub3', '3', 'period7'),
(8, '12A', 'Monday', 'sub2', '2', 'period8'),
(9, '12A', 'Tuesday', 'sub3', '3', 'period1'),
(10, '12A', 'Tuesday', 'sub2', '2', 'period2'),
(11, '12A', 'Tuesday', 'sub1', '1', 'period3'),
(12, '12A', 'Tuesday', 'sub5', '5', 'period4'),
(13, '12A', 'Tuesday', 'sub4', '4', 'period5'),
(14, '12A', 'Tuesday', 'sub3', '3', 'period6'),
(15, '12A', 'Tuesday', 'sub2', '2', 'period7'),
(16, '12A', 'Tuesday', 'sub1', '1', 'period8'),
(17, '12A', 'Wednesday', 'sub2', '2', 'period1'),
(18, '12A', 'Wednesday', 'sub4', '4', 'period2'),
(19, '12A', 'Wednesday', 'sub5', '5', 'period3'),
(20, '12A', 'Wednesday', 'sub3', '3', 'period4'),
(21, '12A', 'Wednesday', 'sub1', '1', 'period5'),
(22, '12A', 'Wednesday', 'sub4', '4', 'period6'),
(23, '12A', 'Wednesday', 'sub5', '5', 'period7'),
(24, '12A', 'Wednesday', 'sub2', '2', 'period8'),
(25, '12A', 'Thursday', 'sub4', '4', 'period1'),
(26, '12A', 'Thursday', 'sub1', '1', 'period2'),
(27, '12A', 'Thursday', 'sub3', '3', 'period3'),
(28, '12A', 'Thursday', 'sub2', '2', 'period4'),
(29, '12A', 'Thursday', 'sub4', '4', 'period5'),
(30, '12A', 'Thursday', 'sub5', '5', 'period6'),
(31, '12A', 'Thursday', 'sub3', '3', 'period7'),
(32, '12A', 'Thursday', 'sub1', '1', 'period8'),
(33, '12A', 'Friday', 'sub1', '1', 'period1'),
(34, '12A', 'Friday', 'sub3', '3', 'period2'),
(35, '12A', 'Friday', 'sub2', '2', 'period3'),
(36, '12A', 'Friday', 'sub4', '4', 'period4'),
(37, '12A', 'Friday', 'sub5', '5', 'period5'),
(38, '12A', 'Friday', 'sub1', '1', 'period6'),
(39, '12A', 'Friday', 'sub3', '3', 'period7'),
(40, '12A', 'Friday', 'sub2', '2', 'period8'),
(41, '12B', 'Monday', 'sub1', '1', 'period1'),
(42, '12B', 'Monday', 'sub3', '3', 'period2'),
(43, '12B', 'Monday', 'sub2', '2', 'period3'),
(44, '12B', 'Monday', 'sub4', '4', 'period4'),
(45, '12B', 'Monday', 'sub5', '5', 'period5'),
(46, '12B', 'Monday', 'sub1', '1', 'period6'),
(47, '12B', 'Monday', 'sub3', '3', 'period7'),
(48, '12B', 'Monday', 'sub2', '2', 'period8'),
(49, '12B', 'Tuesday', 'sub3', '3', 'period1'),
(50, '12B', 'Tuesday', 'sub2', '2', 'period2'),
(51, '12B', 'Tuesday', 'sub1', '1', 'period3'),
(52, '12B', 'Tuesday', 'sub5', '5', 'period4'),
(53, '12B', 'Tuesday', 'sub4', '4', 'period5'),
(54, '12B', 'Tuesday', 'sub3', '3', 'period6'),
(55, '12B', 'Tuesday', 'sub2', '2', 'period7'),
(56, '12B', 'Tuesday', 'sub1', '1', 'period8'),
(57, '12B', 'Wednesday', 'sub2', '2', 'period1'),
(58, '12B', 'Wednesday', 'sub4', '4', 'period2'),
(59, '12B', 'Wednesday', 'sub5', '5', 'period3'),
(60, '12B', 'Wednesday', 'sub3', '3', 'period4'),
(61, '12B', 'Wednesday', 'sub1', '1', 'period5'),
(62, '12B', 'Wednesday', 'sub4', '4', 'period6'),
(63, '12B', 'Wednesday', 'sub5', '5', 'period7'),
(64, '12B', 'Wednesday', 'sub2', '2', 'period8'),
(65, '12B', 'Thursday', 'sub4', '4', 'period1'),
(66, '12B', 'Thursday', 'sub1', '1', 'period2'),
(67, '12B', 'Thursday', 'sub3', '3', 'period3'),
(68, '12B', 'Thursday', 'sub2', '2', 'period4'),
(69, '12B', 'Thursday', 'sub4', '4', 'period5'),
(70, '12B', 'Thursday', 'sub5', '5', 'period6'),
(71, '12B', 'Thursday', 'sub3', '3', 'period7'),
(72, '12B', 'Thursday', 'sub1', '1', 'period8'),
(73, '12B', 'Friday', 'sub1', '1', 'period1'),
(74, '12B', 'Friday', 'sub3', '3', 'period2'),
(75, '12B', 'Friday', 'sub2', '2', 'period3'),
(76, '12B', 'Friday', 'sub4', '4', 'period4'),
(77, '12B', 'Friday', 'sub5', '5', 'period5'),
(78, '12B', 'Friday', 'sub1', '1', 'period6'),
(79, '12B', 'Friday', 'sub3', '3', 'period7'),
(80, '12B', 'Friday', 'sub2', '2', 'period8'),
(81, '12C', 'Monday', 'sub3', '3', 'period1'),
(82, '12C', 'Monday', 'sub2', '2', 'period2'),
(83, '12C', 'Monday', 'sub4', '4', 'period3'),
(84, '12C', 'Monday', 'sub1', '1', 'period4'),
(85, '12C', 'Monday', 'sub5', '5', 'period5'),
(86, '12C', 'Monday', 'sub3', '3', 'period6'),
(87, '12C', 'Monday', 'sub2', '2', 'period7'),
(88, '12C', 'Monday', 'sub4', '4', 'period8'),
(89, '12C', 'Tuesday', 'sub2', '2', 'period1'),
(90, '12C', 'Tuesday', 'sub4', '4', 'period2'),
(91, '12C', 'Tuesday', 'sub5', '5', 'period3'),
(92, '12C', 'Tuesday', 'sub3', '3', 'period4'),
(93, '12C', 'Tuesday', 'sub1', '1', 'period5'),
(94, '12C', 'Tuesday', 'sub4', '4', 'period6'),
(95, '12C', 'Tuesday', 'sub5', '5', 'period7'),
(96, '12C', 'Tuesday', 'sub2', '2', 'period8'),
(97, '12C', 'Wednesday', 'sub4', '4', 'period1'),
(98, '12C', 'Wednesday', 'sub1', '1', 'period2'),
(99, '12C', 'Wednesday', 'sub3', '3', 'period3'),
(100, '12C', 'Wednesday', 'sub2', '2', 'period4'),
(101, '12C', 'Wednesday', 'sub5', '5', 'period5'),
(102, '12C', 'Wednesday', 'sub1', '1', 'period6'),
(103, '12C', 'Wednesday', 'sub4', '4', 'period7'),
(104, '12C', 'Wednesday', 'sub3', '3', 'period8'),
(105, '12C', 'Thursday', 'sub1', '1', 'period1'),
(106, '12C', 'Thursday', 'sub5', '5', 'period2'),
(107, '12C', 'Thursday', 'sub3', '3', 'period3'),
(108, '12C', 'Thursday', 'sub2', '2', 'period4'),
(109, '12C', 'Thursday', 'sub4', '4', 'period5'),
(110, '12C', 'Thursday', 'sub5', '5', 'period6'),
(111, '12C', 'Thursday', 'sub1', '1', 'period7'),
(112, '12C', 'Thursday', 'sub3', '3', 'period8'),
(113, '12C', 'Friday', 'sub3', '3', 'period1'),
(114, '12C', 'Friday', 'sub2', '2', 'period2'),
(115, '12C', 'Friday', 'sub4', '4', 'period3'),
(116, '12C', 'Friday', 'sub1', '1', 'period4'),
(117, '12C', 'Friday', 'sub5', '5', 'period5'),
(118, '12C', 'Friday', 'sub3', '3', 'period6'),
(119, '12C', 'Friday', 'sub2', '2', 'period7'),
(120, '12C', 'Friday', 'sub4', '4', 'period8'),
(121, '13A', 'Monday', 'sub4', '4', 'period1'),
(122, '13A', 'Monday', 'sub1', '1', 'period2'),
(123, '13A', 'Monday', 'sub5', '5', 'period3'),
(124, '13A', 'Monday', 'sub2', '2', 'period4'),
(125, '13A', 'Monday', 'sub3', '3', 'period5'),
(126, '13A', 'Monday', 'sub1', '1', 'period6'),
(127, '13A', 'Monday', 'sub4', '4', 'period7'),
(128, '13A', 'Monday', 'sub5', '5', 'period8'),
(129, '13A', 'Tuesday', 'sub1', '1', 'period1'),
(130, '13A', 'Tuesday', 'sub5', '5', 'period2'),
(131, '13A', 'Tuesday', 'sub2', '2', 'period3'),
(132, '13A', 'Tuesday', 'sub4', '4', 'period4'),
(133, '13A', 'Tuesday', 'sub3', '3', 'period5'),
(134, '13A', 'Tuesday', 'sub5', '5', 'period6'),
(135, '13A', 'Tuesday', 'sub1', '1', 'period7'),
(136, '13A', 'Tuesday', 'sub2', '2', 'period8'),
(137, '13A', 'Wednesday', 'sub5', '5', 'period1'),
(138, '13A', 'Wednesday', 'sub3', '3', 'period2'),
(139, '13A', 'Wednesday', 'sub1', '1', 'period3'),
(140, '13A', 'Wednesday', 'sub4', '4', 'period4'),
(141, '13A', 'Wednesday', 'sub2', '2', 'period5'),
(142, '13A', 'Wednesday', 'sub3', '3', 'period6'),
(143, '13A', 'Wednesday', 'sub1', '1', 'period7'),
(144, '13A', 'Wednesday', 'sub5', '5', 'period8'),
(145, '13A', 'Thursday', 'sub2', '2', 'period1'),
(146, '13A', 'Thursday', 'sub4', '4', 'period2'),
(147, '13A', 'Thursday', 'sub3', '3', 'period3'),
(148, '13A', 'Thursday', 'sub5', '5', 'period4'),
(149, '13A', 'Thursday', 'sub1', '1', 'period5'),
(150, '13A', 'Thursday', 'sub4', '4', 'period6'),
(151, '13A', 'Thursday', 'sub3', '3', 'period7'),
(152, '13A', 'Thursday', 'sub2', '2', 'period8'),
(153, '13A', 'Friday', 'sub3', '3', 'period1'),
(154, '13A', 'Friday', 'sub1', '1', 'period2'),
(155, '13A', 'Friday', 'sub5', '5', 'period3'),
(156, '13A', 'Friday', 'sub4', '4', 'period4'),
(157, '13A', 'Friday', 'sub2', '2', 'period5'),
(158, '13A', 'Friday', 'sub1', '1', 'period6'),
(159, '13A', 'Friday', 'sub4', '4', 'period7'),
(160, '13A', 'Friday', 'sub3', '3', 'period8'),
(161, '13B', 'Monday', 'sub5', '5', 'period1'),
(162, '13B', 'Monday', 'sub3', '3', 'period2'),
(163, '13B', 'Monday', 'sub1', '1', 'period3'),
(164, '13B', 'Monday', 'sub4', '4', 'period4'),
(165, '13B', 'Monday', 'sub2', '2', 'period5'),
(166, '13B', 'Monday', 'sub1', '1', 'period6'),
(167, '13B', 'Monday', 'sub5', '5', 'period7'),
(168, '13B', 'Monday', 'sub3', '3', 'period8'),
(169, '13B', 'Tuesday', 'sub3', '3', 'period1'),
(170, '13B', 'Tuesday', 'sub2', '2', 'period2'),
(171, '13B', 'Tuesday', 'sub4', '4', 'period3'),
(172, '13B', 'Tuesday', 'sub1', '1', 'period4'),
(173, '13B', 'Tuesday', 'sub5', '5', 'period5'),
(174, '13B', 'Tuesday', 'sub3', '3', 'period6'),
(175, '13B', 'Tuesday', 'sub2', '2', 'period7'),
(176, '13B', 'Tuesday', 'sub4', '4', 'period8'),
(177, '13B', 'Wednesday', 'sub1', '1', 'period1'),
(178, '13B', 'Wednesday', 'sub5', '5', 'period2'),
(179, '13B', 'Wednesday', 'sub3', '3', 'period3'),
(180, '13B', 'Wednesday', 'sub2', '2', 'period4'),
(181, '13B', 'Wednesday', 'sub4', '4', 'period5'),
(182, '13B', 'Wednesday', 'sub5', '5', 'period6'),
(183, '13B', 'Wednesday', 'sub1', '1', 'period7'),
(184, '13B', 'Wednesday', 'sub3', '3', 'period8'),
(185, '13B', 'Thursday', 'sub4', '4', 'period1'),
(186, '13B', 'Thursday', 'sub1', '1', 'period2'),
(187, '13B', 'Thursday', 'sub5', '5', 'period3'),
(188, '13B', 'Thursday', 'sub3', '3', 'period4'),
(189, '13B', 'Thursday', 'sub2', '2', 'period5'),
(190, '13B', 'Thursday', 'sub4', '4', 'period6'),
(191, '13B', 'Thursday', 'sub5', '5', 'period7'),
(192, '13B', 'Thursday', 'sub1', '1', 'period8'),
(193, '13B', 'Friday', 'sub3', '3', 'period1'),
(194, '13B', 'Friday', 'sub2', '2', 'period2'),
(195, '13B', 'Friday', 'sub4', '4', 'period3'),
(196, '13B', 'Friday', 'sub1', '1', 'period4'),
(197, '13B', 'Friday', 'sub5', '5', 'period5'),
(198, '13B', 'Friday', 'sub3', '3', 'period6'),
(199, '13B', 'Friday', 'sub2', '2', 'period7'),
(200, '13B', 'Friday', 'sub4', '4', 'period8'),
(201, '13C', 'Monday', 'sub2', '2', 'period1'),
(202, '13C', 'Monday', 'sub4', '4', 'period2'),
(203, '13C', 'Monday', 'sub5', '5', 'period3'),
(204, '13C', 'Monday', 'sub3', '3', 'period4'),
(205, '13C', 'Monday', 'sub1', '1', 'period5'),
(206, '13C', 'Monday', 'sub4', '4', 'period6'),
(207, '13C', 'Monday', 'sub5', '5', 'period7'),
(208, '13C', 'Monday', 'sub2', '2', 'period8'),
(209, '13C', 'Tuesday', 'sub1', '1', 'period1'),
(210, '13C', 'Tuesday', 'sub3', '3', 'period2'),
(211, '13C', 'Tuesday', 'sub2', '2', 'period3'),
(212, '13C', 'Tuesday', 'sub4', '4', 'period4'),
(213, '13C', 'Tuesday', 'sub5', '5', 'period5'),
(214, '13C', 'Tuesday', 'sub1', '1', 'period6'),
(215, '13C', 'Tuesday', 'sub3', '3', 'period7'),
(216, '13C', 'Tuesday', 'sub2', '2', 'period8'),
(217, '13C', 'Wednesday', 'sub3', '3', 'period1'),
(218, '13C', 'Wednesday', 'sub1', '1', 'period2'),
(219, '13C', 'Wednesday', 'sub4', '4', 'period3'),
(220, '13C', 'Wednesday', 'sub5', '5', 'period4'),
(221, '13C', 'Wednesday', 'sub2', '2', 'period5'),
(222, '13C', 'Wednesday', 'sub1', '1', 'period6'),
(223, '13C', 'Wednesday', 'sub3', '3', 'period7'),
(224, '13C', 'Wednesday', 'sub4', '4', 'period8'),
(225, '13C', 'Thursday', 'sub1', '1', 'period1'),
(226, '13C', 'Thursday', 'sub5', '5', 'period2'),
(227, '13C', 'Thursday', 'sub2', '2', 'period3'),
(228, '13C', 'Thursday', 'sub4', '4', 'period4'),
(229, '13C', 'Thursday', 'sub3', '3', 'period5'),
(230, '13C', 'Thursday', 'sub5', '5', 'period6'),
(231, '13C', 'Thursday', 'sub1', '1', 'period7'),
(232, '13C', 'Thursday', 'sub3', '3', 'period8'),
(233, '13C', 'Friday', 'sub4', '4', 'period1'),
(234, '13C', 'Friday', 'sub1', '1', 'period2'),
(235, '13C', 'Friday', 'sub5', '5', 'period3'),
(236, '13C', 'Friday', 'sub2', '2', 'period4'),
(237, '13C', 'Friday', 'sub3', '3', 'period5'),
(238, '13C', 'Friday', 'sub4', '4', 'period6'),
(239, '13C', 'Friday', 'sub5', '5', 'period7'),
(240, '13C', 'Friday', 'sub1', '1', 'period8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`T_ID`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`time_table_id`),
  ADD KEY `class` (`class`),
  ADD KEY `subject` (`subject`),
  ADD KEY `teacher` (`teacher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `time_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`C_ID`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subject` (`sub_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`C_ID`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subject` (`sub_id`),
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`teacher`) REFERENCES `teachers` (`T_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
