-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 03:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `try_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'vbb', 'cc4f941f4c7d909c56a32b370e1feeb5', 'vbb'),
(2, 'ooo', 'e47ca7a09cf6781e29634502345930a7', 'ooo'),
(3, 'bbb', '08f8e0260c64418510cefb2b06eee5cd', 'bbb'),
(4, 'John', '202cb962ac59075b964b07152d234b70', 'John'),
(5, 'Thoo', '4bbde07660e5eff90873642cfae9a8dd', 'Thoo'),
(6, 'jii', '5417eb11da483c24937329d4b6c56cce', 'jii'),
(7, 'Choco', '8373543e896091cf563d064dd977dade', 'Choco'),
(8, 'Bonita', '8b5d2f121caf35d8bac7b781cd475133', 'Bonita'),
(9, 'Alex', '8644edc3dacd5dc0c955d077f342c51e', 'Alex'),
(10, 'Nik', '659397ed118f865708abe8b430467eae', 'Nik'),
(11, 'Boo Bo', '39c403e27debe551a612dbf3c4cbdea0', 'Boo'),
(12, '111', '8b5d2f121caf35d8bac7b781cd475133', '111'),
(13, 'qqq', 'b2ca678b4c936f905fb82f2733f5297f', 'o0011'),
(14, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa'),
(15, 'Su00', '698d51a19d8a121ce581499d7b701668', 'Su'),
(16, 'www', 'ad57484016654da87125db86f4227ea3', 'ww'),
(17, 'qq', '6a1636df95837e36f7682889fb3ab3d0', 'qq'),
(18, 'Lin', '53274eaab13276acb667602e5da3ecc6', 'qqq'),
(19, 'Vde11', 'a9a1b9807ce0a3825e7af1e6fdf2e364', 'David'),
(20, 'Mich', '4ea87a999c60e96ab60230cb4ac34413', 'Michael'),
(21, 'Kyle', '$2y$10$0LfqFnf21BQ.JqMC0rtTa.MSK7.o0vIc2VmAJ72GgGC56RkPKUrwC', 'Kyle k'),
(22, 'Myat', '$2y$10$KRrJKU981DEEDz7Cxe5QOOYRBi.hAkpmPOLK/H7eaLzl2k.ddSFc2', 'Myat Su'),
(23, 'Nay', '$2y$10$pNLViMuixzmKOzZ6Gf81f.ow9RsY56NrICmgfQ0nrkCKqqTLwXm6a', 'Nay Chi'),
(24, 'Kit', '$2y$10$QMLOmPZSyRumbwtYDhb9eOBbONKWpJvJ8BxL6R36m0DuU6EQPatWS', 'KIt Kit'),
(25, 'Ju', '$2y$10$2WFmMtJHdB3blg9Ao9llZ.NdrNtd4MuQXkEF81Ilzml./zo0TOe2m', 'Ju Ju'),
(26, 'Nann', '$2y$10$jXTk4nxh6KNaDsMC2Bb73.08gujGEOQh/VhLYMVU48qRz.SXke4hW', 'Nann Nann'),
(27, 'Ki', '$2y$10$XFLoYFyhA3sR92X7TEQUOuSFpXW1p1qmI18xdUUM6JnPDXKY50iZC', 'Ki Ki'),
(28, 'Min', '$2y$10$lx3T9L7T0ZrcxtPuohrkhezD7BfCrxtoKU/9uq0i05LzQiC4WdN7y', 'Min Min'),
(29, 'Gu', '$2y$10$MZ4kxfTBWZRxgg8Apzt4D.pbJaMtRSEccUvhlONcxqxFrDGFKWhs.', 'Gu Gu'),
(30, 'Deee', '$2y$10$CRFW/xXN0qF/JQ2KXuWk9ez8Ol/wOAlwdIkeHe.zwvT4a89usqQ9e', 'Dee Dee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
