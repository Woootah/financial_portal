-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2024 at 07:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `student_id` int(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `roles` enum('user','admin') DEFAULT 'user',
  `balance` decimal(10,2) DEFAULT 10000.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`student_id`, `name`, `username`, `password`, `roles`, `balance`) VALUES
(0, 'admin', 'admin', '$2y$10$lDjBUivb0YrL91FlSt/YtecZJ1ZPce.s8j1lcYufD/0MXXJC4bh4y', 'admin', 0.00),
(5, 'user5', 'user5', '$2y$10$LULjvXtYYZC7MzpdD0VGnu6NcQnUMJ7YfFbh0c3A38kHf13Z/lERC', 'user', 9997.00),
(1111, 'user1', 'user1', '$2y$10$iQGrN6G8aHj/Y7OCDHBX6.jdDA5DVR4UmYy7VX2ckibJTy3BFG9wi', 'user', 9800.00),
(2222, 'user2', 'user2', '$2y$10$W1H/ojEYd59L1lRkYjuqXu6y.fi/tbbFcMraxRQkL50Z5iIvtw3/W', 'user', 10000.00),
(3333, 'user3', 'user3', '$2y$10$ftx.KK/sX.49ICgPRf35xOZi8M5nl1Znzvo1AzdBeAKZmlrs6Huoy', 'user', 10000.00),
(4444, 'user4', 'user4', '$2y$10$SK22pd8jRYOjlH7uON3RC.OwH9n9HpErm7XjM1aWlIF7m5Bojiq22', 'user', 10000.00),
(6666, 'user6', 'user6', '$2y$10$ZGqtnKGas42clUyvrAJK2.EuhtXvChxIVBOhiggbt1X0uWbdEnUYe', 'user', 9000.00),
(7777, 'user7', 'user7', '$2y$10$ob5Ux4W3tO4Bzo/M9dj/WOP5ToCBRycsMlVs.SNLkL.704GXwMcVy', 'user', 10000.00),
(8888, 'user8', 'user8', '$2y$10$xZTrZ3Fb2DEaSsbGshnkY.HK5k9eT1OuGU1REJfh6A4Bi5eDuiqSi', 'user', 9000.00),
(9999, 'user9', 'user9', '$2y$10$Xt8cVsfNiaRJt46jFJsayO03uVVBb04zZTlLhl79DDEtUKKb.fbr.', 'user', 10000.00),
(101010, 'user10', 'user10', '$2y$10$x7D27oc0u1vjo37CAcgjLOXMWrKYe0KkMWXXwKWwYfVfZ70YJXNyW', 'user', 1000.00),
(111111, 'user11', 'user11', '$2y$10$g.NlNXng/Pm/4Wcyvqj8nuhaGpv.qEnAxWO7x.28Yuung9zL44xRy', 'user', 100000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
