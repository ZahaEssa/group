-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 01:19 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorname` varchar(80) NOT NULL,
  `authoremail` varchar(200) NOT NULL,
  `authorpassword` varchar(60) NOT NULL,
  `authorconfirmpassword` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `authorusername` int(80) NOT NULL,
  `expiry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorname`, `authoremail`, `authorpassword`, `authorconfirmpassword`, `id`, `authorusername`, `expiry_time`, `token`) VALUES
('Netiah Hafsah', 'h@gmail.com', '$2y$10$seNlGREY1jEDNByW0zKisuhu6uwj26wFQX636nkxoBV2MlehucGja', '$2y$10$HehELG/gO7STeeF7NKitf.ILaRywlFRxfwRpFplOtZLWKfEpZaeLC', 1, 0, '2023-09-17 11:13:27', ''),
('hetul', 'hetulntank01@gmail.com', '$2y$10$WhXsPejp.DPaIuWPh1PsiOzN7JFazylUNwuWahOoXFf/0DgIWUALe', '$2y$10$mygKky8p0.A.lIZuvr0siecmPBcWzKJefdw2aBnxHUWxfgnQ1UYlC', 2, 0, '2023-09-17 11:13:27', ''),
('Niisha Mbaruku', 'niisha@gmail.com', '$2y$10$qDhDPrn0RRVqTQJ8eZmPvOrx2RWJvhnWNc.wR/wMlsCGkDFgmF70e', '$2y$10$kMzMnFto4ryQpzlIW1rhseKNFHHlnbzH.BqtZEGE7SlXFxmi6nrvK', 3, 0, '2023-09-17 11:13:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `blog_writing`
--

CREATE TABLE `blog_writing` (
  `authorname` varchar(80) NOT NULL,
  `articletitle` varchar(150) NOT NULL,
  `articletext` longtext NOT NULL,
  `publicationdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_writing`
--

INSERT INTO `blog_writing` (`authorname`, `articletitle`, `articletext`, `publicationdate`, `article_id`) VALUES
('Hafsah Siti', 'Hello', 'writing area', '2023-09-17 12:23:37', 5),
('Ted M', 'HIMYMMMMMM', 'funny showwwwwww', '2023-09-17 13:37:33', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`authoremail`);

--
-- Indexes for table `blog_writing`
--
ALTER TABLE `blog_writing`
  ADD PRIMARY KEY (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_writing`
--
ALTER TABLE `blog_writing`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
