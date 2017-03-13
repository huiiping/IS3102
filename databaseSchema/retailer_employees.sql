-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 10:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retailerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `retailer_employees`
--

CREATE TABLE `retailer_employees` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `activation_status` varchar(100) DEFAULT NULL,
  `activation_token` varchar(100) DEFAULT NULL,
  `recovery_status` varchar(100) DEFAULT NULL,
  `recovery_token` varchar(100) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_employees`
--

INSERT INTO `retailer_employees` (`id`, `username`, `password`, `email`, `address`, `contact`, `created`, `modified`, `first_name`, `last_name`, `activation_status`, `activation_token`, `recovery_status`, `recovery_token`, `location_id`) VALUES
(1, 'g', '$2y$10$MKiAH/6g1.v6lCkX2D6owOBPKr/18b8zMtKPda/D//y70cPkoR2XS', 'g@hotmail.com', 'g', '5', '2017-02-23 06:40:14', '2017-02-23 06:40:14', 'g', 'g', '', '', '', '', NULL),
(2, 'chao', '$2y$10$iYUov6xe6XHdSwf1x/OZ6.7bdyMFbot1Bum14qi2UWlpdcUMZyiKO', 'chao@hotmail.com', 'NUS', '8', '2017-02-26 08:21:24', '2017-02-26 08:53:19', 'Chao', 'Lim', '', NULL, NULL, NULL, NULL),
(3, 'retailer5', '123', '', '', '', NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `retailer_employees`
--
ALTER TABLE `retailer_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `location_id` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `retailer_employees`
--
ALTER TABLE `retailer_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `retailer_employees`
--
ALTER TABLE `retailer_employees`
  ADD CONSTRAINT `retailer_employees_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
