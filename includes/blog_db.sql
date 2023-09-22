-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 08:23 AM
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
-- Database: `blog_db`
--
create database `blog_db`;

-- --------------------------------------------------------

--
-- Table structure for table `blog_writing`
--

CREATE TABLE `blog_writing` (
  `authorname` varchar(80) NOT NULL,
  `articletitle` varchar(150) NOT NULL,
  `articletext` longtext NOT NULL,
  `publicationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_writing`
--

INSERT INTO `blog_writing` (`authorname`, `articletitle`, `articletext`, `publicationdate`, `article_id`) VALUES
('SHAMOONNN', 'BLAH BLAH BLAH', 'Donuts and Milkshake and Hafsah', '2023-09-20 13:37:34', 10),
('qwertyu', 'qwertyu', 'wertyuikjhgfdcxcvbn', '2023-09-20 17:15:06', 14);

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `name` varchar(80) NOT NULL,
  `email` varchar(200) NOT NULL,
  `authorpassword` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `authorusername` varchar(80) NOT NULL,
  `expiry_time` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`name`, `email`, `authorpassword`, `id`, `authorusername`, `expiry_time`, `token`, `registration_date`) VALUES
('Hafsah', 'hafsah.netiah@strathmore.edu', '$2y$10$hxdT1Ok7siZVNtCCmy/1YOWXicIV.d6/uNOUzUoTzqFvOG/ZRVDfi', 26, 'PD2', '2023-09-20 20:44:37', '3614449e86feff6c8eef1166531aa698', '2023-09-20 18:44:37'),
('Charles Maina', 'hsnhafsah@gmail.com', '$2y$10$VOodM/OICGuk23Ci8Hz2c.OGBOyJolA2kkgzsN8p2YQTGYhwdIf5K', 27, 'Charlie', '2023-09-20 20:45:41', '57b66dee9ee774c01eda2131a55553ee', '2023-09-20 18:45:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_writing`
--
ALTER TABLE `blog_writing`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_writing`
--
ALTER TABLE `blog_writing`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
