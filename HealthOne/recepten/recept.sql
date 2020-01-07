-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 okt 2019 om 12:44
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recept`
--

CREATE TABLE `recept` (
  `recept_id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(45) UNSIGNED NOT NULL,
  `dosis` varchar(45) DEFAULT NULL,
  `herhalingsrecept` tinyint(4) DEFAULT NULL,
  `medicijn_id` int(11) UNSIGNED NOT NULL,
  `commentaar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `recept`
--
ALTER TABLE `recept`
  ADD PRIMARY KEY (`recept_id`,`medicijn_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `recept`
--
ALTER TABLE `recept`
  MODIFY `recept_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
