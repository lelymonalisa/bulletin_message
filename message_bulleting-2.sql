-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2023 at 03:46 PM
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
(68, 0, 'fsdfsdf', 'Black', '', '2023-09-17 01:35:24', 'tesusername'),
(69, 0, 'tesss', 'Black', '', '2023-09-17 01:36:34', 'tesusername'),
(70, 0, 'tes messageeeee', 'Black', '', '2023-09-17 01:36:51', 'tesusername'),
(71, -1, 'tessss', 'Black', '', '2023-09-17 02:20:14', 'tesusername'),
(72, -1, 'tes message lagi', 'Black', '', '2023-09-17 02:20:26', 'tesusername'),
(73, -1, 'sdfsdfsdfsdf', 'Black', '', '2023-09-17 02:25:26', 'tesss tanpa login'),
(74, -1, 'sdfdsfdsfsd', 'Black', '', '2023-09-17 02:41:16', 'ttes fullname keduaa'),
(75, 1, 'tsss dengan login', 'Black', '', '2023-09-17 02:42:00', 'tesusername'),
(76, -1, 'setsfdsfs', 'Black', 'CLOSE-131994911256789607.png', '2023-09-17 02:54:54', 'tess'),
(77, -1, 'fsdfsfds', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-17 02:55:06', 'esfsfsd'),
(78, -1, 'sfsdfsd', 'Black', 'CLOSE-131994911256789607.png', '2023-09-17 03:09:17', 'tesss'),
(79, -1, 'sdfsdf', 'Black', '', '2023-09-17 03:13:14', 'sdfsdf'),
(80, -1, 'asdasd', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-17 03:13:23', 'adasdas'),
(81, -1, 'teess post foto', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-17 03:14:26', 'teess post foto'),
(82, -1, 'teess post foto', 'Black', 'CLOSE-131994911256789607 (1).png', '2023-09-17 03:15:31', 'sfsdfteess post foto'),
(83, -1, 'sdfsdfsd', 'Black', 'coworking_time_miyuhyee.png', '2023-09-17 03:16:14', 'sdfsdf'),
(84, -1, 'ganti code', 'Black', '', '2023-09-17 03:17:17', 'ganti code'),
(85, -1, 'gfanti code', 'Black', 'CLOSE-131994911256789607.png', '2023-09-17 03:17:30', 'ganti code'),
(86, -1, 'stes', 'Black', 'Screen Shot 2023-09-15 at 05.46.45.png', '2023-09-17 03:26:05', 'tes'),
(87, -1, 'tesss', 'Black', '', '2023-09-17 10:50:17', 'tess'),
(88, -1, 'tess alert', 'Black', '', '2023-09-17 10:51:30', 'tess alert'),
(89, 6, 'tes message tinggal delete', 'Black', '', '2023-09-17 12:39:29', 'tinggal delte message'),
(90, 7, 'punya akun user baru', 'Black', '', '2023-09-17 13:35:25', 'TES USERBARU');

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
(5, 'tes456', 'tes tes', '$2y$10$lpI6cGtySIVrBZY98qmOyOFpjDlVkNVe.PK5flHT7qffDs3zs83Gy'),
(6, 'codefinalize', 'tinggal delte message', '$2y$10$mwdqMR3tDqXWqP54G5ZJNuPGNp9RymyREX.gzb78zNe2gFMOJUXkm'),
(7, 'userbaru', 'TES USERBARU', '$2y$10$uA0LluLWCGHLr5TD4St43exjBC7hYAbg4SemiaVLL..I9bjcxLWou');

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
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
