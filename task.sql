-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 10:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `punchTime` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `lastUpdate` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_code`, `punchTime`, `address`, `city`, `lastUpdate`) VALUES
(1, 'EMP-002', '13:51:01', '57, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Sharifabad Rajapur', '02-04-2020'),
(2, 'EMP-003', '17:31:02,17:31:17,17:37:31', 'Jharoda Majra Burari,Jharoda Majra Burari,Jharoda Majra Burari', 'Delhi,Delhi,Mazda', '04-04-2020'),
(3, 'EMP-004', '17:46:46', 'Subzi Mandi Colony', 'Karnal', '04-04-2020'),
(4, 'EMP-002', '10:08:03,10:08:13', 'Subzi Mandi Colony,Subzi Mandi Colony', 'Karnal,Karnal', '06-04-2020'),
(5, 'EMP-002', '10:52:32', 'Ramesh Nagar', 'Karnal', '07-04-2020'),
(6, 'EMP-003', '16:11:49', '5 D 170, Surender Colony Part 1, Surender Colony, Jharoda, Jharoda Majra Burari, Mazda, Delhi 110084, India', '5 D 170', '07-04-2020'),
(7, 'EMP-003', '10:48:20,10:50:20', 'Jharoda Majra Burari', 'Mazda', '08-04-2020'),
(8, 'EMP-002', '10:49:54', 'Subzi Mandi Colony', 'Karnal', '08-04-2020'),
(9, 'EMP-002', '10:03:35,10:03:42', 'Subzi Mandi Colony,Subzi Mandi Colony', 'Karnal,Karnal', '09-04-2020'),
(10, 'EMP-001', '14:46:41,14:50:26', 'Sangam Vihar,Sangam Vihar', 'New Delhi,New Delhi', '09-04-2020'),
(11, 'EMP-001', '16:48:40', 'Unnamed Road, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Unnamed Road', '10-04-2020'),
(12, 'EMP-002', '18:04:40,19:04:09', 'Subzi Mandi Colony,Sector 16', 'Karnal,Karnal', '10-04-2020'),
(13, 'EMP-002', '09:45:38', 'Subzi Mandi Colony', 'Karnal', '13-04-2020'),
(14, 'EMP-001', '12:05:33', 'Palam', 'New Delhi', '13-04-2020'),
(15, 'EMP-001', '16:30:11,20:51:04', 'Unnamed Road, Sharifabad Rajapur, Uttar Pradesh 201003, India,57, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Unnamed Road,Sharifabad Rajapur', '14-04-2020'),
(16, 'EMP-001', '21:55:18', '57, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Sharifabad Rajapur', '21-04-2020'),
(17, 'EMP-001', '17:43:34,17:43:54', '57, Sharifabad Rajapur, Uttar Pradesh 201003, India,57, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Sharifabad Rajapur,Sharifabad Rajapur', '22-04-2020'),
(18, 'EMP-001', '14:58:27,17:29:01', 'Unnamed Road, Sharifabad Rajapur, Uttar Pradesh 201003, India,Unnamed Road, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Unnamed Road,Unnamed Road', '28-04-2020'),
(19, 'EMP-001', '18:08:07', '57, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Sharifabad Rajapur', '29-04-2020'),
(20, 'EMP-001', '12:56:58', 'Unnamed Road, Sharifabad Rajapur, Uttar Pradesh 201003, India', 'Unnamed Road', '30-04-2020');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined_date` date NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_code`, `name`, `joined_date`, `status`) VALUES
(1, 'EMP-001', 'Ram', '2020-04-19', 'Active'),
(2, 'EMP-002', 'Shyam', '2020-04-18', 'Active'),
(3, 'EMP-003', 'Vijay Lakshmi', '2020-04-20', 'Active'),
(4, 'EMP-004', 'Anushka', '2020-04-19', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182847;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
