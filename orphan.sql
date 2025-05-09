-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2025 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orphan`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `cid` int(50) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cdob` date NOT NULL,
  `cyoe` year(4) NOT NULL,
  `cclass` int(3) NOT NULL,
  `cstory` text NOT NULL,
  `cphoto` text NOT NULL,
  `sponsored` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`cid`, `cname`, `cdob`, `cyoe`, `cclass`, `cstory`, `cphoto`, `sponsored`) VALUES
(7, 'mala', '2006-12-20', '2009', 8, '', '', 1),
(8, 'kamal', '2005-06-15', '2007', 11, '', '', 0),
(9, 'seetha', '2006-06-14', '2008', 2, '', '', 0),
(11, 'Upul', '2005-04-08', '2009', 3, '', '', 0),
(13, 'umesh', '2007-06-14', '2010', 8, '', '', 0),
(16, 'Amith', '1998-12-23', '2004', 2, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `d_id` int(3) NOT NULL,
  `program` varchar(20) NOT NULL,
  `amount` int(30) NOT NULL,
  `checkno` varchar(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `d_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`d_id`, `program`, `amount`, `checkno`, `bank_name`, `place`, `d_name`, `email`, `phone`, `d_address`) VALUES
(1, 'P1', 10000, '42f213', 'BOC', 'Kurunegala', 'malani', 'malani@gmail.com', 55555444, '309 .  Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(3) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `full_address` text NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL,
  `cid` int(50) NOT NULL,
  `gift_type` varchar(20) NOT NULL,
  `sending_date` date NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `sender_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `cid`, `gift_type`, `sending_date`, `sender_name`, `email`, `phone`, `sender_address`) VALUES
(1, 8, 'dress', '2025-03-26', 'lak', 'lak@gmail.com', 687698675, 'hiripitiya');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`user_id`, `username`, `password`, `join_date`, `first_name`, `last_name`, `gender`, `birthdate`, `city`, `state`, `picture`) VALUES
(3, 'lakmini', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '2025-03-26 18:41:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `n_id` int(3) NOT NULL,
  `n_issue` varchar(40) NOT NULL,
  `n_story` text NOT NULL,
  `n_month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(3) NOT NULL,
  `program_title` varchar(30) NOT NULL,
  `program_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_title`, `program_desc`) VALUES
(1, 'P1', ''),
(2, 'P2', ''),
(3, 'P3', ''),
(4, 'P4', '');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorer`
--

CREATE TABLE `sponsorer` (
  `spn_id` int(3) NOT NULL,
  `spn_firstname` varchar(30) NOT NULL,
  `spn_lastname` varchar(30) DEFAULT NULL,
  `spnd_date` date NOT NULL,
  `spn_noofyears` int(2) NOT NULL,
  `spn_email` varchar(30) NOT NULL,
  `spn_phone` int(20) NOT NULL,
  `spn_bill_address` text NOT NULL,
  `spn_amount` int(5) NOT NULL,
  `spn_checkno` varchar(20) NOT NULL,
  `cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sponsorer`
--

INSERT INTO `sponsorer` (`spn_id`, `spn_firstname`, `spn_lastname`, `spnd_date`, `spn_noofyears`, `spn_email`, `spn_phone`, `spn_bill_address`, `spn_amount`, `spn_checkno`, `cid`) VALUES
(18, 'Raneesha', 'chandrani', '2018-11-23', 2, 'chandrani@gmail.com', 22222222, 'kurunegala', 40000, '2w3e4r5t', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `sponsorer`
--
ALTER TABLE `sponsorer`
  ADD PRIMARY KEY (`spn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `d_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `n_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sponsorer`
--
ALTER TABLE `sponsorer`
  MODIFY `spn_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
