-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 04:57 PM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(9) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `emp_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `pass`, `emp_id`) VALUES
('fwp10101', '$2y$10$3NH8VLX58c6CPlddzHDju.Lmv05kLbO0xGqHiXz3okh0LcDnEe2/K', 10101),
('fwp10102', '$2y$10$PmweRQrvZrNgOCoNrNxk7O/6UkIEnsK68tlYrjUIrTuV6JDcPRVay', 10102),
('fwp10103', '$2y$10$J4Vbd1PiEBqznrVQpOs3Ke94z3v.nvebeX9vNQJafrnXUXX04ULr6', 10103),
('fwp10201', '$2y$10$6DUZlrYAjWk/z.sON3XEsuB6Fir3HjXdug/CEMd9X2twzXA5MVjXO', 10201),
('fwp10202', '$2y$10$8aPY25yhds4PIGfFBAA3rOhWqw/L7GJpGPGiwV2P6erwGxKj6uIFi', 10202),
('fwp10203', '$2y$10$zuMLNAB8tkKjMpULzl8n2.hJGyJQkkUUZS.cLLM5fAq.YHhhK/Ih2', 10203),
('fwp10204', '$2y$10$xOO26pe8e48DVrXGfr7mdeSRuu0SNuE/5OnLEn.BshREr/4.FTsrK', 10204),
('fwp10205', '$2y$10$8sog/vHtf9Kvn9mU2ESmUOiNK46Rvy2aGD1cffZMCtG9Z0PG0O6C.', 10205),
('fwp10206', '$2y$10$3SCpCXlCcMh6cYhJpTYdeOV7NrMW5y4njuKs5hq.ZfDgMZPq1tJDS', 10206),
('fwp10207', '$2y$10$Wgl1hsMU3R8SzDbvzd7gq.CDYRQoqFzluYDrqZHuNSWnoHxySQ/tu', 10207);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
