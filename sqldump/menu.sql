-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 06:47 PM
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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_no` int(3) NOT NULL,
  `menu_name` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` int(3) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `stock` enum('มีอยู่','หมด') DEFAULT 'หมด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_no`, `menu_name`, `description`, `price`, `image`, `stock`) VALUES
(101, 'เบอร์เกอร์เนื้อ', 'เบอร์เกอร์เนื้อ 1 ชิ้น', 69, NULL, 'มีอยู่'),
(102, 'เบอร์เกอร์หมู', 'เบอร์เกอร์หมู 1 ชิ้น', 59, NULL, 'มีอยู่'),
(103, 'เบอร์เกอร์ชีส', 'เบอร์เกอร์ชีส 1 ชิ้น', 79, NULL, 'มีอยู่'),
(104, 'เบอร์เกอร์ดับเบิ้ลชีส', 'เบอร์เกอร์ดับเบิ้ลชีส 1 ชิ้น', 89, NULL, 'มีอยู่'),
(105, 'เบอร์เกอร์เบคอน', 'เบอร์เกอร์เบคอน 1 ชิ้น', 59, NULL, 'มีอยู่'),
(106, 'เบอร์เกอร์ไก่', 'เบอร์เกอร์ไก่ 1 ชิ้น', 49, NULL, 'มีอยู่'),
(107, 'เบอร์เกอร์ปลา', 'เบอร์เกอร์ปลา 1 ชิ้น', 49, NULL, 'มีอยู่'),
(108, 'เบอร์เกอร์ฮาวายเอี้ยน', 'เบอร์เกอร์ฮาวายเอี้ยน 1 ชิ้น', 59, NULL, 'มีอยู่'),
(109, 'เบอร์เกอร์ไส้กรอก', 'เบอร์เกอร์ไส้กรอก 1 ชิ้น', 49, NULL, 'มีอยู่'),
(301, 'พิซซ่าเปปเปอโรนี', 'พิซซ่าเปปเปอโรนี 1 ถาด', 279, NULL, 'มีอยู่'),
(302, 'พิซซ่าฮาวายเอี้ยน', 'พิซซ่าฮาวายเอี้ยน 1 ถาด', 289, NULL, 'มีอยู่'),
(303, 'พิซซ่าซุปเปอร์ซูพรีม', 'พิซซ่าซุปเปอร์ซูพรีม 1 ถาด', 329, NULL, 'มีอยู่'),
(304, 'พิซซ่าแฮมชีส', ' พิซซ่าแฮมชีส 1 ถาด', 299, NULL, 'มีอยู่'),
(305, 'พิซซ่าซีฟู้ด', 'พิซซ่าซีฟู้ด 1 ถาด', 349, NULL, 'มีอยู่'),
(306, 'พิซซ่าผักโขม', 'พิซซ่าผักโขม 1 ถาด', 259, NULL, 'มีอยู่'),
(307, 'พิซซ่าไส้กรอกขอบชีส', 'พิซซ่าไส้กรอกขอบชีส 1 ถาด', 319, NULL, 'มีอยู่'),
(308, 'พิซซ่าไก่นิวออร์ลีน', 'พิซซ่าไก่นิวออร์ลีน 1 ถาด', 299, NULL, 'มีอยู่'),
(309, 'พิซซ่าคาโบนาร่า', 'พิซซ่าคาโบนาร่า 1 ถาด', 319, NULL, 'มีอยู่');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
