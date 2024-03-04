-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Počítač: md75.wedos.net:3306
-- Vygenerováno: Pon 04. bře 2024, 19:05
-- Verze serveru: 10.1.37-MariaDB
-- Verze PHP: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `d237642_alba`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `purpix`
--

CREATE TABLE IF NOT EXISTS `purpix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` varchar(255) NOT NULL,
  `level_1` int(11) NOT NULL DEFAULT '96',
  `level_2` int(11) NOT NULL DEFAULT '69',
  `level_3` int(11) NOT NULL DEFAULT '69',
  `level_4` int(11) NOT NULL DEFAULT '69',
  `level_5` int(11) NOT NULL DEFAULT '69',
  `level_6` int(11) NOT NULL DEFAULT '69',
  `level_7` int(11) NOT NULL DEFAULT '69',
  `level_8` int(11) NOT NULL DEFAULT '69',
  `level_9` int(11) NOT NULL DEFAULT '69',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
