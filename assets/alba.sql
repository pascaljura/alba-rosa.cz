SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `project_access` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

ALTER TABLE `purpix`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `purpix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
