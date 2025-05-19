-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 07:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `agencie_id` int(11) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `agencie_id`, `admin_name`, `email`, `password`, `created_at`) VALUES
(1, 1, 'IZERIMANA Adeline', 'izerimanaadeline2@gmail.com', '$2y$10$x8CMGKpM8bSOilH.gmMi1.w.qNMOAGIeV6UothwDnF5aVfgQGHLpi', '2025-05-17 18:44:01'),
(2, 7, 'Mukundwa Anne ', 'mukundwaane7@gmail.com', '$2y$10$mG5/b1wb.cI92hFarbEX9.YH6QlGXjMVCG98RU/3R8PbbXJWH5gte', '2025-05-18 07:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agencie_id` int(11) NOT NULL,
  `agencie_name` varchar(100) NOT NULL,
  `agencie_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agencie_id`, `agencie_name`, `agencie_email`) VALUES
(1, 'RTDA', 'rtda@gmail.com'),
(2, 'RNP', 'rnp@gmail.com'),
(3, 'kicukio district', 'kicukiro@gmail.com'),
(4, 'RBA', 'rba@gmail.com'),
(5, 'Health Ministry', 'moh@gmail.com'),
(6, 'Water Board', 'wasac@gmail.com'),
(7, 'Education Office', 'reb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `citizen_id` int(11) NOT NULL,
  `citizen_full_name` varchar(100) NOT NULL,
  `citizen_email` varchar(100) NOT NULL,
  `citizen_phone_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`citizen_id`, `citizen_full_name`, `citizen_email`, `citizen_phone_number`) VALUES
(1, 'Mukundwa Anne ', 'izerimanaad', '0795153451'),
(2, 'ISHIMWE Aline', 'ishimwealin', '0783354789'),
(3, 'TUYISHIME Angelique', 'tuyishimeange69@gmail.com', '0788595595');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaints_id` int(11) NOT NULL,
  `citizen_id` int(11) DEFAULT NULL,
  `agencie_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status_id` varchar(100) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaints_id`, `citizen_id`, `agencie_id`, `description`, `status_id`, `submission_date`, `last_updated`) VALUES
(1, 1, 7, 'Language and Literacy Barriers. at public school.', 'pending', '2025-05-18', '2025-05-18 07:39:09'),
(2, 2, 6, 'in gahogo village nyamabuye sector since last moth there is no clean water ', 'pending', '2025-05-18', '2025-05-18 07:51:17'),
(3, 3, 1, 'damaged road', 'In progress', '2025-05-18', '2025-05-18 09:14:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `agencie_id` (`agencie_id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agencie_id`);

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`citizen_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaints_id`),
  ADD KEY `citizen_id` (`citizen_id`),
  ADD KEY `agencie_id` (`agencie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agencie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `citizens`
--
ALTER TABLE `citizens`
  MODIFY `citizen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaints_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`agencie_id`) REFERENCES `agencies` (`agencie_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`citizen_id`) REFERENCES `citizens` (`citizen_id`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`agencie_id`) REFERENCES `agencies` (`agencie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
