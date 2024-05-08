-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Počítač: md407.wedos.net:3306
-- Vygenerováno: Stř 08. kvě 2024, 12:40
-- Verze serveru: 10.4.31-MariaDB-log
-- Verze PHP: 5.4.23
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8 */;

--
-- Databáze: `d237642_main`
--
-- --------------------------------------------------------
--
-- Struktura tabulky `gamehub_private_alba_rosa`
--
CREATE TABLE
  IF NOT EXISTS `gamehub_private_alba_rosa` (
    `idgamehub` int (11) NOT NULL AUTO_INCREMENT,
    `icon` varchar(256) DEFAULT NULL,
    `name` varchar(256) DEFAULT NULL,
    `buttons` varchar(9999) DEFAULT NULL,
    `description` text DEFAULT NULL,
    PRIMARY KEY (`idgamehub`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci AUTO_INCREMENT = 6;

--
-- Vypisuji data pro tabulku `gamehub_private_alba_rosa`
--
INSERT INTO
  `gamehub_private_alba_rosa` (
    `idgamehub`,
    `icon`,
    `name`,
    `buttons`,
    `description`
  )
VALUES
  (
    4,
    '<i class="fa-solid fa-game-console-handheld"></i>',
    'Poppy Playtime! (All chapters)',
    '<button class="project-button" onclick="window.open(''../fanda/poppy-playtime.zip'', ''_blank'');"><i class="fa-solid fa-up-right-from-square"></i>ZIP</button><button class="project-button" onclick="window.open(''https://ko-fi.com/sn0wix'', ''_blank'');"><i class="fa-solid fa-sack-dollar"></i>Donate</button>',
    'Ever wanted to work at a toy factory? Well, now you can. But nothing comes without a catch...'
  ),
  (
    5,
    '<i class="fa-solid fa-game-console-handheld"></i>',
    'Choo-Choo Charles!',
    '<button class="project-button" onclick="window.open(''../fanda/choo-choo-charles.zip'', ''_blank'');"><i class="fa-solid fa-up-right-from-square"></i>ZIP</button><button class="project-button" onclick="window.open(''https://ko-fi.com/sn0wix'', ''_blank'');"><i class="fa-solid fa-sack-dollar"></i>Donate</button>',
    'A spider-like locomotive, that hunts you down across an island with a secret story, that you have to uncover yourself... \n'
  );

-- --------------------------------------------------------
--
-- Struktura tabulky `gamehub_public_alba_rosa`
--
CREATE TABLE
  IF NOT EXISTS `gamehub_public_alba_rosa` (
    `idgamehub` int (11) NOT NULL AUTO_INCREMENT,
    `icon` varchar(256) DEFAULT NULL,
    `name` varchar(256) DEFAULT NULL,
    `github` varchar(256) DEFAULT NULL,
    `web` varchar(256) DEFAULT NULL,
    `description` text DEFAULT NULL,
    PRIMARY KEY (`idgamehub`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci AUTO_INCREMENT = 4;

--
-- Vypisuji data pro tabulku `gamehub_public_alba_rosa`
--
INSERT INTO
  `gamehub_public_alba_rosa` (
    `idgamehub`,
    `icon`,
    `name`,
    `github`,
    `web`,
    `description`
  )
VALUES
  (
    1,
    '&#9839;',
    'Tic Tac Toe!',
    'https://github.com/matkolo1/tictactoe/',
    'https://matkolo1-tictactoe.glitch.me/',
    'Basic Tic Tac Toe game with changeable size of the grid.'
  ),
  (
    2,
    '<i class="far fa-square"></i>',
    'Purpix!',
    'https://github.com/matkolo1/purpix/',
    '../purpix/',
    'If you like semi-coding, you can try this one.'
  ),
  (
    3,
    '<i class="fa fa-hand-pointer-o"></i>',
    'Popclicker!',
    'https://github.com/pascaljura/poclicker/',
    '../popclicker/',
    'You know cookie clicker? Try this one with our own characters.'
  );

-- --------------------------------------------------------
--
-- Struktura tabulky `logins_alba_rosa_purpix`
--
CREATE TABLE
  IF NOT EXISTS `logins_alba_rosa_purpix` (
    `idlogins` int (11) NOT NULL AUTO_INCREMENT,
    `idusers` int (11) DEFAULT NULL,
    `time` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`idlogins`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci AUTO_INCREMENT = 3;

--
-- Vypisuji data pro tabulku `logins_alba_rosa_purpix`
--
INSERT INTO
  `logins_alba_rosa_purpix` (`idlogins`, `idusers`, `time`)
VALUES
  (1, 19, '2024-04-17 16:21:57'),
  (2, 17, '2024-05-05 12:38:22');

-- --------------------------------------------------------
--
-- Struktura tabulky `logouts_alba_rosa_purpix`
--
CREATE TABLE
  IF NOT EXISTS `logouts_alba_rosa_purpix` (
    `idlogouts` int (11) NOT NULL AUTO_INCREMENT,
    `idusers` int (11) DEFAULT NULL,
    `time` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`idlogouts`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci AUTO_INCREMENT = 1;

-- --------------------------------------------------------
--
-- Struktura tabulky `other_alba_rosa`
--
CREATE TABLE
  IF NOT EXISTS `other_alba_rosa` (
    `idother` int (11) NOT NULL AUTO_INCREMENT,
    `icon` varchar(256) DEFAULT NULL,
    `name` varchar(256) DEFAULT NULL,
    `github` varchar(256) DEFAULT NULL,
    `web` varchar(256) DEFAULT NULL,
    `description` text DEFAULT NULL,
    PRIMARY KEY (`idother`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci AUTO_INCREMENT = 5;

--
-- Vypisuji data pro tabulku `other_alba_rosa`
--
INSERT INTO
  `other_alba_rosa` (
    `idother`,
    `icon`,
    `name`,
    `github`,
    `web`,
    `description`
  )
VALUES
  (
    4,
    '<i class="fa-solid fa-qrcode"></i>',
    'Qr code!',
    'https://github.com/pascaljura/qr-code/',
    '../qr-code/',
    'A simple QR code generator for all of your needs.'
  );

-- --------------------------------------------------------
--
-- Struktura tabulky `school_alba_rosa`
--
CREATE TABLE
  IF NOT EXISTS `school_alba_rosa` (
    `idschool` int (11) NOT NULL AUTO_INCREMENT,
    `icon` varchar(256) DEFAULT NULL,
    `name` varchar(256) DEFAULT NULL,
    `github` varchar(256) DEFAULT NULL,
    `web` varchar(256) DEFAULT NULL,
    `description` text DEFAULT NULL,
    UNIQUE KEY `idschool` (`idschool`),
    KEY `idschool_2` (`idschool`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci AUTO_INCREMENT = 4;

--
-- Vypisuji data pro tabulku `school_alba_rosa`
--
INSERT INTO
  `school_alba_rosa` (
    `idschool`,
    `icon`,
    `name`,
    `github`,
    `web`,
    `description`
  )
VALUES
  (
    1,
    '<img src="https://icons.iconarchive.com/icons/fa-team/fontawesome/128/FontAwesome-Egg-icon.png" width="25" height="25">',
    'Egg Hunt!',
    'https://github.com/pascaljura/egg-hunt/',
    'https://velikonoce.sspbrno.cz/',
    'Programme for the Easter event at Purkiňka High School in Brno from the school Parliament'
  ),
  (
    2,
    '<i class="fa-solid fa-bezier-curve"></i>',
    'Bezier''s curve!',
    'https://github.com/matkolo1/bezier/',
    '../bezier/',
    'A simple program to calculate a bezier''s curve with unlimited points.'
  ),
  (
    3,
    '<i class="fa-solid fa-chalkboard-user"></i>',
    'Parlament!',
    'https://github.com/pascaljura/parlament',
    '../parlament/',
    'Exclusive site for our school parliament to store all records.'
  );

-- --------------------------------------------------------
--
-- Struktura tabulky `users_alba_rosa`
--
CREATE TABLE
  IF NOT EXISTS `users_alba_rosa` (
    `idusers` int (11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `school_access` int (11) NOT NULL DEFAULT 0,
    `other_access` int (11) NOT NULL DEFAULT 0,
    `gamehub_private_access` int (11) NOT NULL DEFAULT 0,
    `level_1` int (11) NOT NULL DEFAULT 96,
    `level_2` int (11) NOT NULL DEFAULT 69,
    `level_3` int (11) NOT NULL DEFAULT 69,
    `level_4` int (11) NOT NULL DEFAULT 69,
    `level_5` int (11) NOT NULL DEFAULT 69,
    `level_6` int (11) NOT NULL DEFAULT 69,
    `level_7` int (11) NOT NULL DEFAULT 69,
    `level_8` int (11) NOT NULL DEFAULT 69,
    `level_9` int (11) NOT NULL DEFAULT 69,
    PRIMARY KEY (`idusers`),
    UNIQUE KEY `email` (`email`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci AUTO_INCREMENT = 27;

--
-- Vypisuji data pro tabulku `users_alba_rosa`
--
INSERT INTO
  `users_alba_rosa` (
    `idusers`,
    `email`,
    `username`,
    `password`,
    `school_access`,
    `other_access`,
    `gamehub_private_access`,
    `level_1`,
    `level_2`,
    `level_3`,
    `level_4`,
    `level_5`,
    `level_6`,
    `level_7`,
    `level_8`,
    `level_9`
  )
VALUES
  (
    17,
    'boucnik.jiri@gmail.com',
    'Admin',
    '$2y$10$WPWG/zy0b8uTLZLoGudAXuHeWEeDkUQXP8PF0aObhi2/vdlaO5Wlu',
    1,
    1,
    1,
    96,
    69,
    69,
    69,
    69,
    69,
    69,
    69,
    69
  ),
  (
    18,
    'matej.kor@email.cz',
    'Hahah',
    '$2y$10$P4dHjcj9S5JJ7wF3A/GQhu2jGCKUDHbPo7NDZBuZ6J7NWQCyzywf.',
    1,
    1,
    1,
    96,
    69,
    69,
    69,
    69,
    69,
    69,
    69,
    69
  ),
  (
    22,
    'sn0wix@proton.me',
    'Sn0wix',
    '$2y$10$5TNMqF80fM//X4fl5ZoGhetkF/7c1HWa5xRIWrq0LwCcvIquNtZ56',
    0,
    0,
    0,
    96,
    69,
    69,
    69,
    69,
    69,
    69,
    69,
    69
  ),
  (
    23,
    'evitastrouth9963@outlook.com',
    'QXbBkuawmtypYiV',
    '$2y$10$pJJ7VQD0TPeSWeBybT.ZBuqDYqTvMgwlS.GgRFgx1xe/NoaXgAmjq',
    0,
    0,
    0,
    96,
    69,
    69,
    69,
    69,
    69,
    69,
    69,
    69
  ),
  (
    25,
    'matnipp8@gmail.com',
    'HevyHellcat ',
    '$2y$10$SYmlpl/tiyylX1ba2wdJEOEQBPcQHb1WMxGgBblHxORJnMMRNRJwG',
    0,
    0,
    0,
    96,
    69,
    69,
    69,
    69,
    69,
    69,
    69,
    69
  ),
  (
    26,
    'nonym2000@post.cz',
    'Honza',
    '$2y$10$nFNn67HMEQnlxukNVdMIE.WejimC3/yuVyI7NIBxf2wNQvIAgFMK.',
    0,
    0,
    0,
    96,
    69,
    69,
    69,
    69,
    69,
    69,
    69,
    69
  );

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;