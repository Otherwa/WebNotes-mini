-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 01:20 PM
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
(1, 1, 'P TAG', 'Sure, here\'s a brief explanation of the HTML `<p>` tag and how to use it:\n\nThe HTML `<p>` tag is used to define a paragraph of text in a web page. It is a block-level element that creates a new paragraph and automatically adds spacing before and after the content it encloses. Paragraphs are often used to structure text content on a web page, making it more readable and organized.\n\nHere\'s an example of how to use the `<p>` tag in an HTML document:\n\n```html\n<p>This is a simple example of a paragraph. It can contain text, images, links, and other HTML elements. Paragraphs help to break up content and make it more visually appealing.</p>\n```\n\nIn the example, the text \"This is a simple example of a paragraph...\" is enclosed within the `<p>` tags. You can customize the appearance of paragraphs using CSS to control properties like font size, color, and margin.\n\nFeel free to use `<p>` tags to structure your content and make it more readable for your website\'s visitors.', '2023-11-06 11:55:51', '2023-11-06 11:55:51'),
(2, 3, '.btn', '1. `.btn`: Standard button style.<br>\n2. `.btn-sm`: Small button.\n3. `.btn-lg`: Large button.\n4. `.btn-block`: Full-width button.', '2023-11-07 10:43:57', '2023-11-07 10:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `context`
--

CREATE TABLE `context` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `context`
--

INSERT INTO `context` (`id`, `Name`, `Created_at`, `Updated_at`) VALUES
(1, 'HTML', '2023-11-06 11:54:08', '2023-11-06 11:54:08'),
(2, 'CSS', '2023-11-06 11:54:15', '2023-11-06 11:54:15'),
(3, 'BOOTSTRAP', '2023-11-06 11:54:24', '2023-11-06 11:54:24'),
(4, 'ANGULAR', '2023-11-07 11:57:10', '2023-11-07 11:57:10'),
(5, 'PHP', '2023-11-07 11:57:10', '2023-11-07 11:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

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
  ADD PRIMARY KEY (`id`,`Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
