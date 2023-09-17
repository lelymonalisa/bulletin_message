-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2023 at 03:45 AM
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
  `message` varchar(100) NOT NULL,
  `messagecolor` enum('Black','Red','Green','Blue','Yellow') NOT NULL,
  `image` varchar(255) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fullname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message`, `messagecolor`, `image`, `postdate`, `fullname`) VALUES
(68, 'fsdfsdf', 'Black', '', '2023-09-17 01:35:24', 'tesusername'),
(69, 'tesss', 'Black', '', '2023-09-17 01:36:34', 'tesusername'),
(70, 'tes messageeeee', 'Black', '', '2023-09-17 01:36:51', 'tesusername');

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
(1, 'tes', 'tesusername', '$2y$10$82XMq0p1AA1ODwC90FkqueJV6mxYaziAqOjAykH0f3eZy8gUATzQm'),
(2, 'tes123', 'tess', '$2y$10$PknslF7l75Qzph38w3mygub5yKNX751oaVcPr9XsqFhT9Vt1LGpiK'),
(3, '123', 'tess', '$2y$10$agFi7/8VxkxSsx.AhPLMFu3McNIQMVDHApF6BHddJaRs4h/Snj.tG'),
(4, 'lely', 'teslely', '$2y$10$n3Px/r3D0giGMC7y7pz6xOlhQJA2Vy.QcUKlw/rXFUOlbrxQx1M.W'),
(5, 'tes456', 'tes tes', '$2y$10$lpI6cGtySIVrBZY98qmOyOFpjDlVkNVe.PK5flHT7qffDs3zs83Gy');

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
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
