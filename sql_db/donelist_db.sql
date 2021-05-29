-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 09:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donelist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donelist`
--

CREATE TABLE `donelist` (
  `list_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `task_data` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donelist`
--

INSERT INTO `donelist` (`list_id`, `user_id`, `task_data`, `date`) VALUES
(1, 1, 'creating project', '2021-05-28 14:52:46'),
(2, 1, 'thing to do', '2021-05-27 13:56:36'),
(3, 1, 'Test3', '2021-05-28 18:12:27'),
(4, 1, 'Test4', '2021-05-28 18:14:08'),
(5, 1, 'Uji Ke 5', '2021-05-28 18:15:30'),
(6, 5, 'do something', '2021-05-29 04:59:32'),
(7, 5, 'Edward Teach (alternatively spelled Edward Thatch, c. 1680 – 22 November 1718), better known as Blackbeard, was an English pirate who operated around the West Indies and the eastern coast of Britain\'s North American colonies. Little is known about hi', '2021-05-29 05:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `token`, `uname`, `password`, `email`) VALUES
(4, '66ad6b3d2f2567870b73d5e4c014e947', 'user1', 'qwerty', 'user1@mail.com'),
(5, 'fd1b0024188835f6c528c23c3abcca9c', 'user2', 'password21', 'user2@mail.com'),
(6, '04366a4f0df4210be1707b9b48298e43', 'user2', 'password21', 'user2@mail.com'),
(7, '6f83883f51104340c30c37c4080f59aa', 'user4', 'qwerty', 'user4@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donelist`
--
ALTER TABLE `donelist`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donelist`
--
ALTER TABLE `donelist`
  MODIFY `list_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
