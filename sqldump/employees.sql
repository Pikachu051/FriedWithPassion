-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 03:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fwp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(5) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `sex` varchar(3) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `first_name`, `last_name`, `sex`, `email`, `phone`, `position`) VALUES
(10101, 'Sarah', 'Tanner', 'F', 'STanner@fwp.com', '0814569875', 'Manager'),
(10102, 'Joanne', 'Middleton', 'F', 'JMiddleton@fwp.com', '0937864288', 'Manager'),
(10103, 'Conner', 'Goodwin', 'M', 'CGoodwin@fwp.com', '0867442312', 'Manager'),
(10201, 'Isha', 'Atkins', 'F', 'IAtkins@fwp.com', '0826753421', 'Staff'),
(10202, 'Taylor', 'White', 'M', 'TWhite@fwp.com', '0985673488', 'Staff'),
(10203, 'Nellie', 'Newton', 'F', 'NNewton@fwp.com', '0934872126', 'Staff'),
(10204, 'Anna', 'Sampson', 'F', 'ASampson@fwp.com', '0826643829', 'Staff'),
(10205, 'Frank', 'Douglas', 'M', 'FDouglas@fwp.com', '0867732118', 'Staff'),
(10206, 'Livia', 'Vincent', 'F', 'LVincent@fwp.com', '0812934856', 'Staff'),
(10207, 'Robert ', 'Crane', 'M', 'RCrane@fwp.com', '0854723411', 'Staff'),
(55555, 'Abcde', 'Fghijkl', 'Q', 'AF@test.com', '0801234567', 'Dummy'),
(66666, 'Qwerty', 'Asdfg', 'W', 'QA@test.com', '0909876543', 'Dummy'),
(77777, 'Ken', 'Klopp', 'L', 'KKlopp@test.com', '0851236789', 'Dummy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
