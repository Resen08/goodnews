-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 27. Jan 2026 um 10:43
-- Server-Version: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- PHP-Version: 8.1.2-1ubuntu2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bg24c_u005`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userDB`
--

CREATE TABLE `userDB` (
  `uid` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `userDB`
--

INSERT INTO `userDB` (`uid`, `user`, `pass`, `lastlogin`) VALUES
(1, 'admin', '$2y$10$Yhgr7YycX.ymfOb1/n1WzeP2zB7/9hhME6GbxIKDlqFAxHUZUcdma', '2026-01-20 10:52:05');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `userDB`
--
ALTER TABLE `userDB`
  ADD PRIMARY KEY (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
