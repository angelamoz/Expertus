-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creation time: 25 Jan 2016, 02:12
-- Server version: 5.5.25
-- PHP version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Data base: `questionnaire`
--

-- --------------------------------------------------------

--
-- Structure of the table `expertus`
--

CREATE TABLE IF NOT EXISTS `expertus` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` text COLLATE utf8_lithuanian_ci NOT NULL,
  `Birthday` date NOT NULL,
  `Gender` text COLLATE utf8_lithuanian_ci NOT NULL,
  `Programming` text COLLATE utf8_lithuanian_ci NOT NULL,
  `Languages` text COLLATE utf8_lithuanian_ci NOT NULL,
  `Image` longblob NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=183 ;

--
-- Content of the table `expertus`
--

INSERT INTO `expertus` (`Id`, `Name`, `Birthday`, `Gender`, `Programming`, `Languages`, `Image`) VALUES
(161, 'Asta', '1992-08-04', 'moteris', 'ne', '', ''),
(162, 'Irena', '1980-09-07', 'moteris', 'taip', ' Nemoku nė vienos', 0x4972656e612e6a7067),
(169, 'Milda', '1973-03-08', 'moteris', 'taip', ' PHP', 0x4d696c64612e6a7067),
(181, 'Robertas', '1994-09-07', 'vyras', 'taip', ' HTML Java', 0x494d475f323138322e4a5047),
(182, 'Egidijus', '1950-01-01', 'vyras', 'taip', ' Nemoku nė vienos', 0x323031332d30352d32312d303133382e6a7067);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
