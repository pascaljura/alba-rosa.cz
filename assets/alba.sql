SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `icon` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `github` varchar(256) DEFAULT NULL,
  `web` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `gamehub` (
  `id` int(11) NOT NULL,
  `icon` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `github` varchar(256) DEFAULT NULL,
  `web` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `gamehub` (`id`, `icon`, `name`, `github`, `web`, `description`)
VALUES
  (1, '&#9839;', 'Tic Tac Toe!', 'https://github.com/matkolo1/tictactoe/', '../tictactoe/', 'Basic Tic Tac Toe game with changeable size of the grid.'),
  (2, '<i class=\"far fa-square\"></i>', 'Purpix!', 'https://github.com/matkolo1/purpix/', '../purpix/', 'If you like semi-coding, you can try this one.'),
  (3, '<i class=\"fa fa-hand-pointer-o\"></i>', 'Popclicker!', 'https://github.com/pascaljura/poclicker/', '../popclicker/', 'You know cookie clicker? Try this one with our own characters.');

CREATE TABLE `other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `github` varchar(256) DEFAULT NULL,
  `web` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `other` (`icon`, `name`, `github`, `web`, `description`)
VALUES
  ('<i class=\"fa-solid fa-bezier-curve\"></i>', 'Bezier\'s curve!', 'https://github.com/matkolo1/bezier/', '../bezier/', 'A simple program to calculate a bezier\'s curve with unlimited points.'),
  ('<i class=\"fa-solid fa-chalkboard-user\"></i>', 'Parlament!', 'https://github.com/pascaljura/parlament', '../parlament/', 'Exclusive site for our school parliament to store all records.'),
  ('<i class=\"fa-solid fa-qrcode\"></i>', 'Qr code!', 'https://github.com/pascaljura/qr-code/', '../qr-code/', 'A simple QR code generator for all of your needs.');

CREATE TABLE `purpix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` varchar(255) NOT NULL,
  `level_1` int(11) NOT NULL DEFAULT 96,
  `level_2` int(11) NOT NULL DEFAULT 69,
  `level_3` int(11) NOT NULL DEFAULT 69,
  `level_4` int(11) NOT NULL DEFAULT 69,
  `level_5` int(11) NOT NULL DEFAULT 69,
  `level_6` int(11) NOT NULL DEFAULT 69,
  `level_7` int(11) NOT NULL DEFAULT 69,
  `level_8` int(11) NOT NULL DEFAULT 69,
  `level_9` int(11) NOT NULL DEFAULT 69,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school_access` int(11) NOT NULL DEFAULT 0,
  `other_access` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

COMMIT;
