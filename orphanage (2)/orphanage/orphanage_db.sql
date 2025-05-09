-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2025 at 12:16 PM
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
-- Database: `orphanage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `health_status` text DEFAULT NULL,
  `admission_date` date NOT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_contact` varchar(20) DEFAULT NULL,
  `adoption_status` enum('Not Adopted','Adopted') DEFAULT 'Not Adopted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `name`, `age`, `gender`, `health_status`, `admission_date`, `guardian_name`, `guardian_contact`, `adoption_status`, `created_at`) VALUES
(1, 'John Doe M', 8, 'Male', 'Healthy, no known medical issues', '2024-03-10', 'Jane Doe', '0771234567', 'Not Adopted', '2025-03-20 04:46:25'),
(2, 'Kumaran', 2, 'Male', 'Good', '2025-01-01', 'Subas', '0735676538', 'Not Adopted', '2025-05-08 07:32:48'),
(3, 'Mathavi', 6, 'Female', 'Good', '2024-10-07', 'Manoharan', '0719424674', 'Adopted', '2025-05-08 07:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('Successful','Pending','Refund Requested','Refunded') DEFAULT 'Successful',
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_id`, `child_id`, `amount`, `status`, `date`) VALUES
(1, 1, 1, 4000.00, 'Successful', '2025-05-08 12:59:51'),
(2, 2, 1, 10000.00, 'Refund Requested', '2025-05-08 12:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Ayesha Perera', 'ayesha@example.com', '2ee4fb160945b17a31dbf73621d7cede2a1cb833', '2025-05-08 07:12:21'),
(2, 'Nimal Fernando', 'nimal@example.com', 'bf5436cd16c1d9e5e3380ef8203652a92a6d1e0b', '2025-05-08 07:12:21'),
(3, 'Ruwan Silva', 'ruwan@example.com', '07f48d9852731eeab668b97d18c7a6f7a9787cd3', '2025-05-08 07:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `donor_child`
--

CREATE TABLE `donor_child` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `child_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_child`
--

INSERT INTO `donor_child` (`id`, `donor_id`, `child_id`, `created_at`) VALUES
(1, 1, 1, '2025-05-08 07:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `education_records`
--

CREATE TABLE `education_records` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_records`
--

CREATE TABLE `health_records` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `medical_history` text DEFAULT NULL,
  `vaccination_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `donor_child`
--
ALTER TABLE `donor_child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `education_records`
--
ALTER TABLE `education_records`
  ADD KEY `education_records_ibfk_1` (`child_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor_child`
--
ALTER TABLE `donor_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donor_child`
--
ALTER TABLE `donor_child`
  ADD CONSTRAINT `donor_child_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donor_child_ibfk_2` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education_records`
--
ALTER TABLE `education_records`
  ADD CONSTRAINT `education_records_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
