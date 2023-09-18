-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2023 at 06:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `message_bulleting`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `messagecolor` enum('Black','Red','Green','Blue','Yellow') NOT NULL,
  `image` varchar(255) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fullname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `userid`, `message`, `messagecolor`, `image`, `postdate`, `fullname`) VALUES
(159, 12, 'Lorem ipsum dolor sit amet. Et repellendus iste ut quaerat rerum sit enim veritatis et asperiore', 'Black', 'Screen Shot 2023-09-15 at 05.46.45.png', '2023-09-18 16:24:25', 'JOHN DOE'),
(160, -1, 'Good morning, world!', 'Green', '', '2023-09-18 16:30:57', 'Jane Smith'),
(161, -1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Blue', 'hello-world.png', '2023-09-18 16:33:21', 'Sophia Lewis'),
(162, 12, 'Lorem ipsum dolor sit amet. Et repellendus iste ut quaerat rerum sit enim veritatis et asperiore', 'Red', '', '2023-09-18 16:36:03', 'JOHN DOE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`) VALUES
(12, 'superadmin', 'JOHN DOE', '$2y$10$YtcSf3dzjRJr155utqNPIe5kgGDJltT4NAM4/xibtg1Ke.yLn/nAu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
