-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2022 at 03:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` text COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`) VALUES
(1, 9, 'a:1:{i:0;s:5:\"Item1\";}'),
(2, 9, 'a:1:{i:0;s:5:\"Item2\";}');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(150) COLLATE utf8_croatian_ci NOT NULL,
  `type` varchar(11) COLLATE utf8_croatian_ci NOT NULL DEFAULT 'text',
  `survey_id` int(11) NOT NULL,
  `input_values` varchar(1000) COLLATE utf8_croatian_ci DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_id` (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `type`, `survey_id`, `input_values`, `min`, `max`) VALUES
(12, 'Spol', 'radio', 7, 'a:3:{i:0;s:6:\"MuÅ¡ko\";i:1;s:7:\"Å½ensko\";i:2;s:6:\"Ostalo\";}', NULL, NULL),
(13, 'Koje proizvode kupujete na dnevnoj bazi?', 'checkbox', 7, 'a:3:{i:0;s:4:\"Kruh\";i:1;s:7:\"Mlijeko\";i:2;s:6:\"Jabuke\";}', NULL, NULL),
(14, 'OpiÅ¡ite kako provodite svoje jutro. ', 'text', 7, NULL, NULL, NULL),
(15, 'Spol', 'radio', 1, 'a:3:{i:0;s:6:\"MuÅ¡ko\";i:1;s:7:\"Å½ensko\";i:2;s:6:\"Ostalo\";}', NULL, NULL),
(16, 'Koje namirnice kupujete svaki dan?', 'checkbox', 1, 'a:4:{i:0;s:7:\"Mlijeko\";i:1;s:4:\"Kruh\";i:2;s:4:\"Piva\";i:3;s:6:\"Jabuke\";}', NULL, NULL),
(17, 'Broj noge', 'num', 1, NULL, 34, 48),
(18, 'OpiÅ¡ite vaÅ¡ neradni dan', 'text', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_info`
--

DROP TABLE IF EXISTS `survey_info`;
CREATE TABLE IF NOT EXISTS `survey_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `survey_info`
--

INSERT INTO `survey_info` (`id`, `name`, `user_id`) VALUES
(1, 'Anketa 1', 1),
(2, 'Anketa 2', 1),
(3, 'Anketa 3', 1),
(4, 'Anketa 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `mail` varchar(40) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `surname`, `username`, `mail`, `password`) VALUES
(1, 'Pero', 'Peric', 'Dallas', 'pperic@gmail.com', 'x2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey_info` (`id`);

--
-- Constraints for table `survey_info`
--
ALTER TABLE `survey_info`
  ADD CONSTRAINT `survey_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
