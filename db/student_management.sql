-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 06:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `class` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `datetime`) VALUES
(1, 'Md Robel', 234678, '10', 'Ctg', '01222222444', '234678.jpg', '2019-11-09 15:45:16'),
(2, 'Sahid', 55434, '9', 'Chattogram', '01576553435', '55434.jpg', '2019-11-09 21:30:36'),
(3, 'Reduana masum', 1406276, '5', 'Dhaka', '01234567786', '1406276.jpg', '2019-11-09 21:33:25'),
(4, 'Salma ', 264678, '3', 'Ctg', '01555534534', '264678.jpg', '2019-11-09 21:37:26'),
(5, 'Minhaz', 34644, '5', 'Ctg', '01234456666', '34644.jpg', '2019-11-10 14:01:55'),
(7, 'Md Arman Uddin', 1406204, '4', 'Chattogram', '01854456546', '1406204.jpg', '2019-11-11 21:22:02'),
(8, 'r', 12, '7', 'sd', '674574', '12.jpg', '2020-05-05 00:59:55'),
(9, 'robiul', 42, '3', 'ctg', '01824359745', '42.png', '2021-01-08 20:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'Md Robel', 'r@gmail.com', 'Robel', '81dc9bdb52d04dc20036dbd8313ed055', 'robel.jpg', 'active', '2019-11-09 17:49:20'),
(2, 'minhaz', 'm@mail.com', 'minu', '81dc9bdb52d04dc20036dbd8313ed055', 'minu.jpg', 'inactive', '2019-11-09 17:49:20'),
(3, 'sahid', 's@mail.com', 'sahid1', '09d96c1b725828c5754e14dfcd897e81', 'sahid1.jpg', 'active', '2019-11-09 17:49:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
