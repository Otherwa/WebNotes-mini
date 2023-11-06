-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 01:59 PM
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
-- Database: `webnote`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `Id` int(11) NOT NULL,
  `Context_id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`Id`, `Context_id`, `Name`, `Description`, `Created_at`, `Updated_at`) VALUES
(1, 1, 'P TAG', 'The HTML `<p>` tag is used for creating paragraphs of text. It automatically adds spacing before and after the content. Here\'s a concise example:\r\n\r\n```html\r\n<p>This is a paragraph of text. It\'s used for structuring content in HTML.</p>\r\n```\r\n\r\nYou can use `<p>` tags to create readable content and add links, images, and other elements within paragraphs to enhance your web page.', '2023-11-06 11:55:51', '2023-11-06 11:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `context`
--

CREATE TABLE `context` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `context`
--

INSERT INTO `context` (`id`, `name`, `Created_at`, `Updated_at`) VALUES
(1, 'HTML', '2023-11-06 11:54:08', '2023-11-06 11:54:08'),
(2, 'CSS', '2023-11-06 11:54:15', '2023-11-06 11:54:15'),
(3, 'BOOTSTRAP', '2023-11-06 11:54:24', '2023-11-06 11:54:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`Id`,`Context_id`),
  ADD KEY `content_context_fk` (`Context_id`);

--
-- Indexes for table `context`
--
ALTER TABLE `context`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_context_fk` FOREIGN KEY (`Context_id`) REFERENCES `context` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
