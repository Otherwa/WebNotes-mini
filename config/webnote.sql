-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql105.infinityfree.com
-- Generation Time: Dec 19, 2023 at 05:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35374573_webnote`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`Id`, `Context_id`, `Name`, `Description`, `Created_at`, `Updated_at`) VALUES
(2, 3, '.btn', '1. `.btn`: Standard button style.<br>\r\n2. `.btn-sm`: Small button.\r\n3. `.btn-lg`: Large button.\r\n4. `.btn-block`: Full-width button.', '2023-11-08 11:25:11', '2023-11-20 06:11:58'),
(5, 2, 'Id', '<style>\r\n #First {\r\n            font: 1em sans-serif;\r\n		  text-decoration: underline;\r\n        }\r\n</style>\r\n', '2023-11-08 11:44:50', '2023-11-08 11:44:50'),
(6, 2, 'Class', '<style>\r\n.First {\r\n    text-align: center;\r\n}\r\n</style>\r\n', '2023-11-08 11:45:08', '2023-11-09 04:48:46'),
(7, 1, 'accesskeys', ' <label for=\"label\">Alt + q for shortcut key for the below input   field</label> <br />\r\n <!-- ? Input tags -->\r\n <!-- * accesskey shortcut alt key tag -->\r\n <input type=\"text\" accesskey=\"q\" tabindex=\"1\"> <br />\r\n', '2023-11-08 11:45:31', '2023-11-08 13:19:30'),
(8, 1, 'tabindex', '<span>\r\n tabindex shortcut alt+keypressed\r\n</span>\r\n     <!-- * tab shortcut focus3 -->\r\n<input type=\"text\" tabindex=\"2\">\r\n<input type=\"text\" tabindex=\"1\">\r\n<input type=\"text\" tabindex=\"3\">\r\n', '2023-11-08 11:46:17', '2023-11-08 11:46:17'),
(9, 1, 'data-', '<pre data-=\"tempData\" hidden=\"true\">\r\n                    Lorem ipsum dolor sit amet consectetur\r\n                    adipisicing elit. Dignissimos cupiditate ex suscipit,\r\n                    quia ut error modi minima perspiciatis vero asperiores\r\n                    hic eligendi aliquam aut at obcaecati nostrum tempora!\r\n                    Labore, veritatis!\r\n            </pre>\r\n', '2023-11-08 11:48:09', '2023-11-08 11:48:09'),
(10, 1, 'hidden', '   <pre hidden=\"true\">\r\n                    Lorem ipsum dolor sit amet consectetur\r\n                    adipisicing elit. Dignissimos cupiditate ex suscipit,\r\n            </pre>\r\n', '2023-11-08 11:48:23', '2023-11-08 11:48:23'),
(11, 1, 'style', '<span style=\"text-decoration: underline;\">Noraml text</span>\r\n', '2023-11-08 11:48:42', '2023-11-08 11:48:42'),
(12, 1, 'draggable', '<strong draggable=\"true\"> Strong text</strong>', '2023-11-08 11:48:55', '2023-11-08 11:48:55'),
(13, 1, 'contenteditable', '<blockquote contenteditable=\"true\">BlockQuote Text Lorem ipsum dolor sit, amet consectetur adipisicing elit.\r\n                Minima, deleniti\r\n                exercitationem quis commodi velit rerum laudantium. Ab consequatur placeat magni aperiam magnam\r\n                necessitatibus, fugit explicabo ipsa? Aliquam praesentium quidem sapiente!</blockquote> <br>', '2023-11-08 11:49:13', '2023-11-08 11:49:13'),
(14, 1, 'dropzone', '            <pre hidden=\"true\" dropzone=\"copy\">\r\n                    Lorem ipsum dolor sit amet consectetur\r\n                    adipisicing elit. Dignissimos cupiditate ex suscipit,\r\n            </pre>', '2023-11-08 11:49:30', '2023-11-08 11:49:30'),
(15, 1, 'spellcheck', ' <label for=\"myText\">myText1</label>\r\n            <input type=\"text\" name=\"myText1\" id=\"myText1\" spellcheck=\"true\">', '2023-11-08 11:49:41', '2023-11-08 11:49:41'),
(16, 1, 'dir', '<label for=\"myText2\">myText2</label>\r\n            <input type=\"text\" name=\"myText2\" id=\"myText2\" dir=\"rtl\">\r\nOutput: \r\n', '2023-11-08 11:49:56', '2023-11-08 11:49:56'),
(17, 1, 'ul', '<h1>UL</h1>\r\n            <ul type=\"circle\" style=\"list-style-type:decimal-leading-zero;\">\r\n                <li>This is a paragraph 1</li>\r\n                <li>This is a paragraph 2</li>\r\n                <li>This is a paragraph 3</li>\r\n                <li>\r\n                    This is a paragraph 4 with sub-nested list\r\n                    <ol>\r\n                        <li>This is a sub paragraph 1</li>\r\n                        <li>This is a sub paragaqph 2</li>\r\n                        <li>This is a sub paragaqph 3</li>\r\n                        <li>This is a sub paragaqph 4</li>\r\n                    </ol>\r\n                </li>\r\n            </ul>', '2023-11-08 11:50:10', '2023-11-08 11:52:54'),
(18, 1, 'ol', '<h1>OL</h1>\r\n            <ol type=\"I\" style=\"list-style-type: lower-roman;\">\r\n                <li>This is a paragrph 1</li>\r\n                <li>This is a paragrph 2</li>\r\n                <li>This is a paragrph 3</li>\r\n                <li>This is a paragrph 4\r\n                    <ul>\r\n                        <li>This is a sub nested 1</li>\r\n                        <li>This is a sub nested 2</li>\r\n                        <li>This is a sub nested 3</li>\r\n                    </ul>\r\n                </li>\r\n            </ol>\r\n', '2023-11-08 11:50:25', '2023-11-08 13:07:33'),
(19, 1, 'dl', '<h1>Dl</h1>\r\n            <dt type=\"I\" style=\"list-style-type: georgian;\">\r\n            <dd>\r\n                LOL 1\r\n            </dd>\r\n            <dl>This is a paragraph 1</dl>\r\n            <dl>This is a paragraph 2</dl>\r\n            <dd>\r\n                LOL 2\r\n            </dd>\r\n            <dl>This is a paragraph 3</dl>\r\n            <dl>This is a paragraph 4</dl>\r\n            </dt>\r\n\r\n\r\n', '2023-11-08 11:50:40', '2023-11-08 11:53:22'),
(20, 1, 'Input - text', '<input type=\"text\" id=\"\" name=\"\" placeholder=\"Enter your Department\" required> <br><br>', '2023-11-08 11:50:58', '2023-11-08 11:50:58'),
(22, 1, 'Input - password', '<input type=\"password\" id=\"\" name=\"\" placeholder=\"Password\" required> <br><br>', '2023-11-08 11:51:18', '2023-11-08 11:51:18'),
(23, 1, 'Input - color', ' <input type=\"color\" id=\"\" name=\"\" value=\"#fedada\"> <br><br>', '2023-11-08 11:51:30', '2023-11-08 11:51:30'),
(24, 1, 'Input-date', '<input type=\"date\" id=\"\" name=\"\"> <br><br>', '2023-11-08 11:51:40', '2023-11-08 11:51:40'),
(25, 4, 'BoilerPlate', '	`<div class=\"container p-5\" ng-app=\"\">\r\n        <div class=\"container-fluid\" data-ng-init=\"name=\'Atharv Desai\' ;uni=\'KJSIM\';age=21\">\r\n            <!-- ? angular expression {{exp...}}  -->\r\n            <h1>Name : <code>{{name}}</code></h1>\r\n            <h1>University : <code>{{uni}}</code></h1>\r\n            <h1>Age : <code>{{age}}</code></h1>\r\n            <!-- ? concat -->\r\n            <h2>{{\"Welcome \"+ name +\"you are from \" + uni}}</h2>\r\n	</div>`', '2023-11-08 11:59:32', '2023-11-08 11:59:32'),
(26, 4, 'Arrays', '                     <h1>Angular Js Arrays</h1>\r\n            <div class=\"container-fluid\" id=\"array\" data-ng-init=\"subjects=[1,\'DBMS\',\'mobile app dev\']\">\r\n                <code>\r\n               Array => {{subjects}}\r\n                </code>\r\n                <br>\r\n                <br>\r\n                <p>Sub1 = {{subjects[0]}}</p>\r\n                <p>Sub2 ={{subjects[1]}}</p>\r\n                <p>Sub3 = {{subjects[2]}}</p>\r\n            </div>', '2023-11-08 12:00:26', '2023-11-08 12:00:26'),
(27, 1, 'Frameset', '<!-- ! independet Tag instead of body for use (Depretatied) -->\r\n<frameset rows=\"15%,75%,15%\">\r\n    <frame src=\"./header.html\">\r\n        <frame src=\"./form.html\">\r\n            <frame src=\"./footer.html\">\r\n</frameset>', '2023-11-08 12:01:03', '2023-11-08 12:01:03'),
(28, 1, 'Object', '<body>\r\n    <object data=\"https://www.youtube.com/embed/D28ntCyODmE\" type=\"\" height=\"150px\" width=\"150px\"></object>\r\n</body>', '2023-11-08 12:01:25', '2023-11-08 12:01:25'),
(29, 5, 'PHP Simple Program', '<!-- !PHP-->\r\n<?php\r\n\r\n\r\n//? php tags\r\necho \"<h1 style=\'color:red\'>Welcome to the PHP</h1>\";\r\necho \'<h1 style=\"color:red\">Welcome to the PHP</h1>\';\r\n\r\n\r\n\r\n\r\n// ? . is allowed in PHP (objs,functions or classname)\r\n// ? , is also allowed (echo)\r\n// ! + is not allowed\r\n\r\n\r\n$college = \"KJSIM\";\r\n// ? print() -> prints e.g echo $var1 | str | int | any ^ array\r\n// ? echo -> prints e.g echo $var1 | str | int | any ^ array;\r\nprint($college . \" LOl<br>\");\r\necho $college . \" LOl<br>\"; // ? eCHO $college, \" LOl\"; works\r\necho $college, \" LOl<br>\"; // ? ECHO $college, \" LOl\"; works\r\n\r\n\r\n\r\n\r\necho \'$college <br>\'; // * (literal str) -> will print the content as it is\r\necho \"$college <br>\"; // * (illiteral str) -> will look for the var or obj reference and replace it\r\n\r\n\r\n// ? info comments can also be put within buisness logic i.e emmeding comments inside the code\r\n', '2023-11-08 12:01:57', '2023-11-08 12:01:57'),
(30, 6, 'Node Boilerplate', 'const express = require(\'express\')\r\nconst app = express()\r\nconst port = 3000\r\n\r\napp.get(\'/\', (req, res) => {\r\n  res.send(\'Hello World!\')\r\n})\r\n\r\napp.listen(port, () => {\r\n  console.log(`Example app listening on port ${port}`)\r\n})', '2023-11-17 10:36:56', '2023-11-17 10:36:56'),
(31, 6, 'Middleware', 'const express = require(\'express\')\r\nconst app = express()\r\n\r\napp.use((req, res, next) => {\r\n  console.log(\'Time:\', Date.now())\r\n  next()\r\n})\r\n// or\r\napp.use(\'/user/:id\', (req, res, next) => {\r\n  console.log(\'Request URL:\', req.originalUrl)\r\n  next()\r\n}, (req, res, next) => {\r\n  console.log(\'Request Type:\', req.method)\r\n  next()\r\n})\r\n\r\n// or\r\nfunction logOriginalUrl (req, res, next) {\r\n  console.log(\'Request URL:\', req.originalUrl)\r\n  next()\r\n}\r\n\r\nfunction logMethod (req, res, next) {\r\n  console.log(\'Request Type:\', req.method)\r\n  next()\r\n}\r\n\r\nconst logStuff = [logOriginalUrl, logMethod]\r\napp.get(\'/user/:id\', logStuff, (req, res, next) => {\r\n  res.send(\'User Info\')\r\n})', '2023-11-18 15:36:35', '2023-11-18 15:36:35'),
(32, 7, 'LOL', 'LOLOLOLOLOLOLOOLOLOLOLOLOðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡ðŸ¤¡', '2023-11-19 13:15:33', '2023-11-19 13:15:33'),
(34, 8, 'BoilerPlate', '# lib/downloader.rb\r\nrequire \'faraday\'\r\n\r\nmodule Downloader\r\n  extend self\r\n\r\n  def perform(url:)\r\n    Faraday.get(url)\r\n  end\r\nend', '2023-11-27 08:30:25', '2023-11-27 08:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `context`
--

CREATE TABLE `context` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `context`
--

INSERT INTO `context` (`id`, `Name`, `Created_at`, `Updated_at`) VALUES
(1, 'Html', '2023-11-08 12:20:41', '2023-11-08 12:20:41'),
(2, 'Css', '2023-11-08 12:20:56', '2023-11-08 12:20:56'),
(3, 'Bootstrap', '2023-11-08 12:21:05', '2023-11-08 12:21:05'),
(4, 'Angular', '2023-11-08 12:21:15', '2023-11-08 12:21:15'),
(5, 'Php', '2023-11-08 12:21:28', '2023-11-08 12:21:28'),
(6, 'Node', '2023-11-17 10:36:41', '2023-11-17 10:36:41'),
(8, 'Ruby', '2023-11-27 08:16:52', '2023-11-27 08:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `context`
--
ALTER TABLE `context`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
