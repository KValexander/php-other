-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 04 2021 г., 18:57
-- Версия сервера: 5.7.29
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_music`
--
CREATE DATABASE IF NOT EXISTS `db_music` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_music`;

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` year(4) NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 NOT NULL,
  `id_team` int(11) NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Очистить таблицу перед добавлением данных `album`
--

TRUNCATE TABLE `album`;
--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id_album`, `title`, `date`, `country`, `id_team`) VALUES
(1, 'The Dark Side of the Moon', 1973, 'Великобритания', 2),
(2, 'Wish You Were Here', 1975, 'Великобритания', 2),
(3, 'Greatest Hits', 1999, 'США', 2),
(4, 'Abbey Road', 1969, 'Великобритания', 3),
(5, 'A Hard Day\'s Night', 1964, 'Великобритания', 3),
(6, 'Back in Black', 1980, 'США', 4),
(7, 'Highway to Hell', 1979, 'Австралия', 4),
(8, 'The Razors Edge', 1990, 'Австралия', 4),
(9, 'Let There Be Rock', 1977, 'ФРГ', 4),
(10, 'Rocks', 1982, 'Великобритания', 1),
(11, 'Strange Days', 1967, 'США', 0),
(12, 'L.A. Woman', 1971, 'США', 0),
(13, 'Greatest Hits', 1978, 'США', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id_team` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date` year(4) NOT NULL,
  `style` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Очистить таблицу перед добавлением данных `team`
--

TRUNCATE TABLE `team`;
--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id_team`, `name`, `country`, `date`, `style`) VALUES
(1, 'Aerosmith', 'США', 1970, 'хард-рок'),
(2, 'Pink Floyd', 'Великобритания', 1965, 'психоделический-рок'),
(3, 'The Beatles', 'Великобритания', 1960, 'рок-н-ролл'),
(4, 'AC/DC', 'Австралия', 1973, 'хард-блюз-рок'),
(5, 'Scorpions', 'ФРГ', 1965, 'хард-рок');

-- --------------------------------------------------------

--
-- Структура таблицы `total`
--

DROP TABLE IF EXISTS `total`;
CREATE TABLE IF NOT EXISTS `total` (
  `team` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `track` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Очистить таблицу перед добавлением данных `total`
--

TRUNCATE TABLE `total`;
--
-- Дамп данных таблицы `total`
--

INSERT INTO `total` (`team`, `album`, `track`) VALUES
(0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `track`
--

DROP TABLE IF EXISTS `track`;
CREATE TABLE IF NOT EXISTS `track` (
  `id_track` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `note` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_album` int(11) NOT NULL,
  PRIMARY KEY (`id_track`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Очистить таблицу перед добавлением данных `track`
--

TRUNCATE TABLE `track`;
--
-- Дамп данных таблицы `track`
--

INSERT INTO `track` (`id_track`, `name`, `note`, `id_album`) VALUES
(1, 'Back in the Saddle', '', 10),
(2, 'Last Child', '', 10),
(3, 'Rats in the Cellar', '', 10),
(4, 'Combination', '', 10),
(5, 'Sick As a Dog', '', 10),
(6, 'Come Together', '', 10),
(7, 'Get the Lead Out', '', 10),
(8, 'Lick and a Promise', '', 10),
(9, 'Home Tonight', '', 10),
(10, 'Come Together', '', 4),
(11, 'Something', '', 4),
(12, 'Maxwell\'s Silver Hammer', '', 4),
(13, 'Oh! Darling', '', 4),
(14, 'Octopus\'s Garden', '', 4),
(15, 'I Want You (She\'s So Heavy)', '', 4),
(16, 'Here Comes The Sun', '', 4),
(17, 'Because', '', 4),
(18, 'You Never Give Me Your Money', '', 4),
(19, 'Sun King', '', 4),
(20, 'Mean Mr Mustard', '', 4),
(21, 'Polythene Pam', '', 4),
(22, 'Shine On You Crazy Diamond (Part One)', '', 2),
(23, 'Welcome to the Machine', '', 2),
(24, 'Have a Cigar', '', 2),
(25, 'Wish You Were Here', '', 2),
(26, 'Shine On You Crazy Diamond (Part Two)', '', 2),
(27, 'Speak to Me', '', 1),
(28, 'Breathe (In the Air)', '', 1),
(29, 'On the Run', '', 1),
(30, 'Time', '', 1),
(31, 'The Great Gig in the Sky', '', 1),
(32, 'Money', '', 1),
(33, 'Us and Them', '', 1),
(34, 'Any Colour You Like', '', 1),
(35, 'Brain Damage', '', 1),
(36, 'Eclipse', '', 1),
(37, 'Hells Bells', '', 6),
(38, 'Shoot to Thrill', '', 6),
(39, 'What Do You Do for Money Honey', '', 6),
(40, 'Given the Dog a Bone', '', 6),
(41, 'Let Me Put My Love Into You', '', 6),
(42, 'Back in Black', '', 6),
(43, 'You Shook Me All Night Long', '', 6),
(44, 'Have a Drink on Me', '', 6),
(45, 'Shake a Leg', '', 6),
(46, 'Rock and Roll Ain\'t Noise Pollution', '', 6),
(47, 'Strange Days', '', 11),
(48, 'You\'re Lost Little Girl', '', 11),
(49, 'Love Me Two Times', '', 11),
(50, 'Unhappy Girl', '', 11),
(51, 'Horse Latitudes', '', 11),
(52, 'Moonlight Drive', '', 11),
(53, 'People Are Strange', '', 11),
(54, 'My Eyes Have Seen You', '', 11),
(55, 'I Can\'t See Your Face in My Mind', '', 11),
(56, 'When the Music\'s Over', '', 11);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
