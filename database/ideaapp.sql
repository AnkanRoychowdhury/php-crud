-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 09:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideaapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `sno` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `tstamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`sno`, `title`, `description`, `tstamp`) VALUES
(1, 'Test Idea', 'Test Idea Desc', '0000-00-00 00:00:00'),
(2, 'Test Idea 1', 'Test Idea Desc 1', '0000-00-00 00:00:00'),
(12, 'Test Idea 2', 'Test Idea Desc 2', '0000-00-00 00:00:00'),
(15, 'Test Idea 3', 'Test Idea Desc 3', '0000-00-00 00:00:00'),
(16, 'Test Idea 4', 'Test Idea Desc 4', '0000-00-00 00:00:00'),
(17, 'Test Idea 5', 'Test Idea Desc 5', '0000-00-00 00:00:00'),
(18, 'Lorem Ipsum 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '0000-00-00 00:00:00'),
(19, 'Lorem Ipsum 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '0000-00-00 00:00:00'),
(20, 'Lorem Ipsum 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(13) NOT NULL,
  `username` varchar(26) NOT NULL,
  `password` varchar(26) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'user', '$2y$10$6rvK.DmlfekyybXgsaY', '0000-00-00 00:00:00'),
(2, 'test', '123456', '0000-00-00 00:00:00'),
(3, 'Ankan', '123456', '0000-00-00 00:00:00'),
(4, 'admin', '$2y$10$wIkqauCxSRlgbicfYUI', '0000-00-00 00:00:00'),
(5, 'test1', '$2y$10$rhutBdjF8UH2489.Sm0', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
