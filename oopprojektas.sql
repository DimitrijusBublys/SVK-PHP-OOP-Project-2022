-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 02:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oopprojektas`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `users_name` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `users_name`, `date`, `comment`) VALUES
(28, 'Dimitrijus', '2022-01-13 00:27:46', 'komentuoju'),
(29, 'test', '2022-01-13 00:28:34', 'sveiki');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `users_name` tinytext NOT NULL,
  `success_login` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `users_name`, `success_login`, `date`, `ip`) VALUES
(1, 'Dimitrijus', 'false', '2022-01-13 02:23:29', '::1'),
(2, 'Dimitrijus', 'false', '2022-01-13 02:23:42', '::1'),
(3, 'Dimitrijus', 'false', '2022-01-13 02:24:20', '::1'),
(4, 'Dimitrijus', 'true', '2022-01-13 02:24:22', '::1'),
(5, 'test444', 'false', '2022-01-13 02:25:34', '::1'),
(6, 'test444', 'true', '2022-01-13 02:25:38', '::1'),
(7, 'Dimitrijus', 'true', '2022-01-13 02:27:10', '::1'),
(8, 'Dimitrijus', 'false', '2022-01-13 02:27:52', '::1'),
(9, 'test', 'false', '2022-01-13 02:27:58', '::1'),
(10, 'test', 'true', '2022-01-13 02:28:03', '::1'),
(11, 'Dimitrijus', 'true', '2022-01-13 08:53:12', '::1'),
(12, 'Dimitrijus', 'true', '2022-01-13 08:57:08', '::1'),
(13, 'Dimitrijus', 'true', '2022-01-13 09:53:40', '::1'),
(14, 'test1234', 'true', '2022-01-13 09:59:20', '::1'),
(15, 'test1234', 'true', '2022-01-13 09:59:57', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` tinytext NOT NULL,
  `users_password` longtext NOT NULL,
  `users_email` tinytext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IP` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_password`, `users_email`, `date`, `IP`) VALUES
(1, 'Dimitrijus', '$2y$10$sSTV6MDhWSF8BT3vd1Oc0evGfwZj5vmC9lawK.kL2SPS.OXfWsx2m', 'dimitrijus.bublys@stud.svako.lt', '2022-01-13 00:12:20', ''),
(2, 'test', '$2y$10$IYmN6rp2t3J8Zvp4GS11E.3H2FKBWt9uIRiGCT/Fzxt.3VGWHXcae', 'test@gmail.com', '2022-01-13 00:09:07', ''),
(14, 'test1111', '$2y$10$5UIogsJmLmpnBbXom2xtwOtApmChAeUkiUwodGUyxRp5Cwlmz5U9O', 'test123@gmail.com', '2022-01-13 08:58:42', '::1'),
(15, 'test1234', '$2y$10$fTF0QTVCjuVx9wdwH1yAOucQxRL5jadycNxwj6bm3oJp2GYS.cH/m', 'test1234@gmail.com', '2022-01-13 08:59:47', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
