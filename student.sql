-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 19, 2023 la 09:33 AM
-- Versiune server: 10.4.25-MariaDB
-- Versiune PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `student`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `history`
--

CREATE TABLE `history` (
  `id_task` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` time NOT NULL,
  `end_event` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `history`
--

INSERT INTO `history` (`id_task`, `title`, `start_event`, `end_event`, `date`) VALUES
(3, 'scriu', '10:14:00', '11:15:00', '2022-10-08'),
(56, 'relaxare', '17:21:00', '18:21:00', '2022-10-23');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `lectii`
--

CREATE TABLE `lectii` (
  `id_lectie` int(11) NOT NULL,
  `ziua` varchar(255) NOT NULL,
  `lectia` varchar(255) NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `lectii`
--

INSERT INTO `lectii` (`id_lectie`, `ziua`, `lectia`, `start_hour`, `end_hour`) VALUES
(4, 'Luni', 'curs SBC', '13:30:00', '15:00:00'),
(6, 'Marți', 'sem Antrep', '09:45:00', '11:15:00'),
(17, 'Miercuri', 'curs APSI', '09:45:00', '11:15:00'),
(19, 'Vineri', 'curs DAW', '15:15:00', '16:45:00'),
(21, 'Miercuri', 'curs MP', '11:30:00', '13:00:00'),
(38, 'Joi', 'lab DAW', '08:00:00', '09:30:00'),
(63, 'Marți', 'curs SIA', '11:30:00', '13:00:00'),
(64, 'Luni', 'curs Antreprenoriat', '11:30:00', '13:00:00'),
(65, 'Luni', 'sem APSI', '15:15:00', '16:45:00'),
(66, 'Marți', 'lab SIA', '13:30:00', '15:00:00'),
(67, 'Miercuri', 'lab SBC', '13:30:00', '15:00:00'),
(68, 'Joi', 'lab MP', '09:45:00', '11:15:00'),
(69, 'Joi', 'curs SBC', '11:30:00', '13:00:00'),
(70, 'Vineri', 'curs DAW', '17:00:00', '18:30:00'),
(82, 'Luni', 'curs Antreprenoriat', '09:45:00', '11:15:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `student_feedback`
--

CREATE TABLE `student_feedback` (
  `id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` time NOT NULL,
  `end_event` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `tasks`
--

INSERT INTO `tasks` (`id_task`, `title`, `start_event`, `end_event`, `date`) VALUES
(30, 'dansez', '17:42:00', '17:44:00', '2022-10-06'),
(34, 'invat', '10:16:00', '10:17:00', '2022-10-06'),
(42, 'scriu', '09:31:00', '09:35:00', '2022-10-06'),
(46, 'citescs', '09:41:00', '09:44:00', '2022-10-06'),
(47, 'desenez', '15:33:00', '16:33:00', '2022-10-27'),
(48, 'cânt', '14:01:00', '15:01:00', '2022-10-27'),
(54, 'odihnă', '17:20:00', '17:25:00', '2022-10-25'),
(55, 'relaxare', '14:21:00', '16:21:00', '2022-10-23'),
(58, 'plimbare', '14:34:00', '14:36:00', '2022-11-05'),
(59, 'sport', '14:39:00', '14:42:00', '2022-11-05'),
(60, 'gătit', '14:45:00', '14:46:00', '2022-11-05'),
(61, 'dans', '15:45:00', '15:46:00', '2022-11-05'),
(65, 'teme', '09:03:00', '09:07:00', '2023-01-20');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(3, 'ela', '202cb962ac59075b964b07152d234b70', 'Ela'),
(4, 'elias', '202cb962ac59075b964b07152d234b70', 'elias'),
(5, 'kiwijuice', '563535712b98300c2bc6adbea5b81ade', 'Alex'),
(6, 'dondon', '92aaca0a62039d9355429e9fe5175d80', 'Don'),
(7, 'mada', '2e456fdbaadea50686a5809d9c540243', 'Madalina'),
(8, 'mada123', '0a3690772d88f2918b22a51de58555ba', 'Madalina'),
(9, 'madalina', '143585abf6fcc8c2f0d8d2fb64dab4cf', 'Mad');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexuri pentru tabele `lectii`
--
ALTER TABLE `lectii`
  ADD PRIMARY KEY (`id_lectie`);

--
-- Indexuri pentru tabele `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `history`
--
ALTER TABLE `history`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pentru tabele `lectii`
--
ALTER TABLE `lectii`
  MODIFY `id_lectie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pentru tabele `student_feedback`
--
ALTER TABLE `student_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
