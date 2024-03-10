-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 10. bře 2024, 21:02
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `alba`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `gamehub`
--

CREATE TABLE `gamehub` (
  `id` int(11) NOT NULL,
  `icon` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `github` varchar(256) DEFAULT NULL,
  `web` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `gamehub`
--

INSERT INTO `gamehub` (`id`, `icon`, `name`, `github`, `web`, `description`) VALUES
(0, '&#9839;', 'Tic Tac Toe!', 'https://github.com/matkolo1/tictactoe/', '../tictactoe/', 'Basic Tic Tac Toe game with changeable size of grid.'),
(0, '<i class=\"far fa-square\"></i>', 'Purpix!', 'https://github.com/matkolo1/purpix/', '../purpix/', 'If you like semi-coding you can try this one.'),
(0, '<i class=\"fa fa-hand-pointer-o\"></i>', 'Popclicker!', 'https://github.com/pascaljura/poclicker/', '../popclicker/', 'You know cookie clicker? Try this one with our own characters.');

-- --------------------------------------------------------

--
-- Struktura tabulky `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `icon` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `github` varchar(256) DEFAULT NULL,
  `web` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `projects`
--

INSERT INTO `projects` (`id`, `icon`, `name`, `github`, `web`, `description`) VALUES
(1, '<i class=\"fa-solid fa-bezier-curve\"></i>', 'Bezier\'s curve!', 'https://github.com/matkolo1/bezier/', '../bezier/', 'A simple program to calculate a bezier\'s curve with unlimited points.'),
(2, '<i class=\"fa-solid fa-chalkboard-user\"></i>', 'Parlament!', 'https://github.com/pascaljura/parlament', '../parlament/', 'Exclusive site for our school parliament to store all records.'),
(3, '<i class=\"fa-solid fa-qrcode\"></i>', 'Qr code!', 'https://github.com/pascaljura/qr-code/', '../qr-code/', 'A simple QR code generator for all of your needs.');

-- --------------------------------------------------------

--
-- Struktura tabulky `purpix`
--

CREATE TABLE `purpix` (
  `id` int(11) NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `level_1` int(11) NOT NULL DEFAULT 96,
  `level_2` int(11) NOT NULL DEFAULT 69,
  `level_3` int(11) NOT NULL DEFAULT 69,
  `level_4` int(11) NOT NULL DEFAULT 69,
  `level_5` int(11) NOT NULL DEFAULT 69,
  `level_6` int(11) NOT NULL DEFAULT 69,
  `level_7` int(11) NOT NULL DEFAULT 69,
  `level_8` int(11) NOT NULL DEFAULT 69,
  `level_9` int(11) NOT NULL DEFAULT 69
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `project_access` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `purpix`
--
ALTER TABLE `purpix`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `purpix`
--
ALTER TABLE `purpix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
