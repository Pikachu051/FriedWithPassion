-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 03:41 PM
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
(10101, 'เฟเธอรีน', 'ออกัสตัส ออโรร่า', 'ญ', 'FAAurora@fwp.com', '0814569875', 'ผู้จัดการ'),
(10102, 'ดกจา', 'คิม', 'ช', 'DKim@fwp.com', '0937864288', 'ผู้จัดการ'),
(10103, 'แบทเลอร์', 'อุชิโระมิยะ', 'ช', 'BUshiromiya@fwp.com', '0867442312', 'ผู้จัดการ'),
(10201, 'ดาไซ', 'โอซามุ', 'ช', 'DOsamu@fwp.com', '0826753421', 'พนักงาน'),
(10202, 'แอร์เฌแบ็ต', 'บาโตรี', 'ญ', 'EBathori@fwp.com', '0985673488', 'พนักงาน'),
(10203, 'ซาคุยะ', 'อิซาโยอิ', 'ญ', 'SIzayoi@fwp.com', '0934872126', 'พนักงาน'),
(10204, 'โบรเนีย', 'รันด์', 'ญ', 'BRand@fwp.com', '0826643829', 'พนักงาน'),
(10205, 'เกพาร์ด', 'ลันเดา', 'ช', 'GLandau@fwp.com', '0867732118', 'พนักงาน'),
(10206, 'จุงฮยอก', 'ยู', 'ช', 'JYoo@fwp.com', '0812934856', 'พนักงาน'),
(10207, 'โกโจ', 'ซาโตรุ', 'ช', 'GSatoru@fwp.com', '0854723411', 'พนักงาน');

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
