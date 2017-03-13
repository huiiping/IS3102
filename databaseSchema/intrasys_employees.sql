-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 10:34 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intrasysdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `intrasys_employees`
--

CREATE TABLE `intrasys_employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `activation_status` varchar(100) DEFAULT NULL,
  `activation_token` varchar(100) DEFAULT NULL,
  `recovery_status` varchar(100) DEFAULT NULL,
  `recovery_token` varchar(100) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intrasys_employees`
--

INSERT INTO `intrasys_employees` (`id`, `first_name`, `last_name`, `activation_status`, `activation_token`, `recovery_status`, `recovery_token`, `username`, `email`, `password`, `address`, `contact`, `created`, `modified`) VALUES
(4, 'Gwen', 'Tan', 'activated', NULL, NULL, NULL, 'gwen', 'gwen.tan@hotmail.com', '$2y$10$1iaQ0UGmD90.r1JJCkRSeeMwZ1SpJGEm040sqQcJXPbjctorWIC5G', 'UNS', '4', '2017-02-26 05:02:36', '2017-03-01 08:53:07'),
(5, 'mama', 'mama', 'Activated', NULL, NULL, NULL, 'mama', 'mama@hotmail.com', '$2y$10$yjmLo.f65iRlCeevEDKh6ezwFObJqOwcmQVm8KQdyBux/iKD1aYjS', 'NTU', '56', '2017-02-26 09:26:19', '2017-02-26 09:26:19'),
(6, 'mama2', 'mama2', 'Activated', NULL, NULL, NULL, 'mama2', 'mama2@hotmail.com', '$2y$10$kwJVZ8/Z56zBg8QZlGLlf.sV4kPryqi3t5otLLJRwzHO2hQQMUsDG', 'NTU', '3', '2017-03-01 05:21:52', '2017-03-01 05:21:52'),
(7, 'gwen2', 'gwen2', 'Activated', NULL, NULL, NULL, 'gwen2', 'gwen2@Hotmail.com', '$2y$10$VFnUpfeJmEGmdBaqGSjiEuRlicGVI/IlBYHsvQxiyaE5BfAABnB9i', '4', '4', '2017-03-06 06:13:44', '2017-03-06 06:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intrasys_employees`
--
ALTER TABLE `intrasys_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intrasys_employees`
--
ALTER TABLE `intrasys_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
