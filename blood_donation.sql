-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 08:29 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptors`
--

CREATE TABLE `acceptors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bloodgroup` varchar(4) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `thana` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sample` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acceptors`
--

INSERT INTO `acceptors` (`id`, `name`, `username`, `email`, `password`, `gender`, `bloodgroup`, `dob`, `mobile`, `address`, `thana`, `district`, `zip`, `status`, `sample`) VALUES
(1, 'Sohana Afrin', 'sohana', 'sohana@gmail.com', '1234', 'female', 'B+', '1995-02-06', '02715857515', 'Bheramara', 'Bheramara', 'KUSHTIA', '7040', 0, NULL),
(2, 'Maria Anee', 'maria', 'maria@gmail.com', '1234', 'female', 'A+', '1994-01-01', '01715857515', 'Kazipara', 'Mirpur', 'DHAKA', '1216', 0, NULL),
(3, 'Hasib', 'hasib2', 'hasib@gmail.com', '1234', 'male', 'B+', '1994-10-27', '01588879555', 'Dhaka', 'Gulshan', 'DHAKA', '1212', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `division` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `req_id` int(11) DEFAULT NULL,
  `ddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `req_id`, `ddate`) VALUES
(2, 1, '2021-12-06 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(17) NOT NULL,
  `address` varchar(100) NOT NULL,
  `thana` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `lastdonationdate` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `username`, `email`, `password`, `gender`, `bloodgroup`, `dob`, `mobile`, `address`, `thana`, `district`, `zip`, `lastdonationdate`, `status`) VALUES
(1, 'Lamia A', 'aa', 'a@a.com', '12', 'female', 'AB+', '2019-12-31', '54847848', 'Dhaka', 'ad a', 'MADARIPUR', '8878', '2019-01-01', 0),
(2, 'Lamia Afrin', 'lamiaafrin', 'b4lamia@gmail.com', '1234', 'female', 'B+', '1994-02-25', '01711188920', 'Kushtia', 'Kushtia', 'KUSHTIA', '7040', '2018-08-25', 0),
(3, 'Mahanaz Ahmed', 'mahanaz', 'mahanaz@gmail.com', '1234', 'female', 'A+', '1995-05-05', '01728787645', 'Dhaka', 'Mirpur', 'DHAKA', '1216', '2018-12-01', 0),
(4, 'Marina Sultana Anee', 'anee', 'anee@gmail.com', '1234', 'female', 'B+', '1994-01-06', '01781548463', 'Kazipara', 'Mirpur', 'DHAKA', '1216', '2019-01-01', 0),
(6, 'Hasib', 'hasib', 'hasib@gmail.com', '1234', 'male', 'B+', '1994-11-27', '017555555555', 'Dhaka', 'Gulshan', 'DHAKA', '1212', '2021-07-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `details` varchar(2000) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `ReportByRole` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `req_id`, `date`, `title`, `details`, `status`, `ReportByRole`, `created_at`) VALUES
(1, 4, '2021-09-30', 'Bad', '', 0, 'acceptor', '2021-10-29 05:25:06'),
(2, 4, '2021-10-15', 'gg', 'gggggggggg', 0, 'acceptor', '2021-10-29 05:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `acceptor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `disease` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `bloodbag` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `donor_id`, `acceptor_id`, `date`, `disease`, `location`, `bloodbag`, `status`, `created_at`) VALUES
(1, 1, 1, '2021-11-12', 'Blood related', '0', 1, 2, '2021-10-11 02:12:13'),
(4, 1, 1, '2021-10-30', 'Test 2', 'Badda, Dhaka', 2, 1, '2021-10-29 03:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `distid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptors`
--
ALTER TABLE `acceptors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptors`
--
ALTER TABLE `acceptors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
