-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2017 at 12:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `prod_type_id` int(11) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `prod_type_id`, `SKU`, `quantity`, `section_id`, `location_id`) VALUES
(1, 1, '999', 29, 1, 1),
(2, 1, '1234', 12, 1, 1),
(19, 2, '1223', 24, 3, 2),
(23, 2, '234', 23, 1, 1),
(24, 2, '45', 34, 3, 1),
(26, 2, '12', 12, 4, 2),
(27, 2, '45', 45, 4, 2),
(28, 1, '999', 53, 2, 1),
(29, 1, '999', 2, 2, 1),
(30, 1, '999', 3, 4, 2),
(31, 2, '8888', 888, 1, 1),
(32, 1, '1111', 111, 1, 1),
(33, 1, '2', 2, 4, 2),
(34, 1, '1', 1, 1, 1),
(35, 1, '2', 2, 1, 1),
(36, 1, '12', 12, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_type_id` (`prod_type_id`),
  ADD KEY `section` (`section_id`),
  ADD KEY `location_id` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`prod_type_id`) REFERENCES `prod_types` (`id`),
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `inventory_ibfk_4` FOREIGN KEY (`location_id`) REFERENCES `sections` (`location_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
