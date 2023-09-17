-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2023 at 07:29 PM
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
  `username` varchar(128) NOT NULL,
  `message` varchar(100) NOT NULL,
  `messagecolor` enum('Black','Red','Green','Blue','Yellow') NOT NULL,
  `image` varchar(255) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `username`, `message`, `messagecolor`, `image`, `postdate`) VALUES
(1, 'username', 'testttttttttt', 'Black', '877932.png', '2023-09-15 02:03:04'),
(2, 'username', 'testttttttttt', 'Black', '877932.png', '2023-09-15 02:04:14'),
(36, 'tesss', 'sdfk;slkf;lsdf', 'Black', '877932.png', '2023-09-15 09:15:40'),
(37, 'tesss', 'teslagii', 'Black', '', '2023-09-15 09:34:14'),
(38, 'tess', 'tewfsfdsf', 'Red', '877932.png', '2023-09-15 10:23:01'),
(39, 'tess', 'sdfsdfsd', 'Red', 'admin_editboard.png', '2023-09-15 10:24:06'),
(40, 'tessdd', 'adkmfalkmfa', 'Black', '877932.png', '2023-09-15 10:27:34'),
(41, 'dasdas', 'asdasd', 'Black', '877932.png', '2023-09-15 10:28:07'),
(42, 'sdfsd', 'sdfds', 'Red', '877932.png', '2023-09-15 10:46:07'),
(43, 'dfsdf', 'sdfsd', 'Green', '877932.png', '2023-09-15 10:48:25'),
(44, 'sdfsd', 'dsfdsf', 'Red', '877932.png', '2023-09-15 10:49:06'),
(45, 'dfd', 'dfdf', 'Black', '877932.png', '2023-09-15 10:51:20'),
(46, 'sdfds', 'dsfsdf', 'Black', '877932.png', '2023-09-15 10:52:02'),
(47, 'asdasdas', 'asdasdas', 'Black', '877932.png', '2023-09-15 15:03:49'),
(48, 'adasdas', 'asdasdas', 'Black', '877932.png', '2023-09-15 15:05:23'),
(49, 'sdfsdf', 'sdfsdf', 'Blue', '877932.png', '2023-09-15 15:09:20'),
(50, 'sfsfds', 'dsfsdf', 'Yellow', '877932.png', '2023-09-15 15:09:32'),
(51, 'sdfsdf', 'sdfsdfsd', 'Red', '', '2023-09-15 15:18:50'),
(52, 'sdfsdf', 'afsdfsdfsd', 'Red', '877932.png', '2023-09-15 15:35:21'),
(53, 'sdfsd', 'sdfsdf', 'Black', '877932.png', '2023-09-15 15:35:52'),
(54, 'sdfsd', 'sdfsd', 'Green', '877932.png', '2023-09-15 15:38:24'),
(55, 'sdcsd', 'csdcds', 'Black', 'uploaded_img/coworking_time_miyuhyee.png', '2023-09-15 15:50:47'),
(56, 'asdas', 'fafas', 'Black', 'coworking_time_miyuhyee.png', '2023-09-15 16:08:32'),
(57, 'sadasd', 'adasd', 'Black', 'uploaded_img/coworking_time_miyuhyee.png', '2023-09-15 16:10:40'),
(58, 'dfsd', 'fsdfd', 'Black', 'uploaded_img/coworking_time_miyuhyee.png', '2023-09-15 16:14:02'),
(59, 'sdfsd', 'sdfsdf', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-15 16:15:46'),
(60, 'fsdfsd', 'dsfsdf', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-15 16:16:20'),
(61, 'fsdfds', 'dsfdsfds', 'Black', 'CLOSE-131994911256789607.png', '2023-09-15 16:24:22'),
(62, 'faf', 'sdfsd', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-15 16:26:23'),
(63, 'adasd', 'asdasd', 'Black', 'uploaded_img/CLOSE-131994911256789607 (1).png', '2023-09-15 16:39:24'),
(64, 'fsdfsadf', 'asdfsfa', 'Black', 'uploaded_img/CLOSE-131994911256789607.png', '2023-09-15 16:41:57'),
(65, 'sdf', 'fasf', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-15 17:04:44');

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
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
