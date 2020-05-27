-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 mei 2020 om 12:35
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manege`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `horses`
--

CREATE TABLE `horses` (
  `HorseID` int(11) NOT NULL,
  `type` text NOT NULL,
  `HorseName` text NOT NULL,
  `ras` text NOT NULL,
  `schofthoogte` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `horses`
--

INSERT INTO `horses` (`HorseID`, `type`, `HorseName`, `ras`, `schofthoogte`) VALUES
(1, 'Paard', 'Steelix', 'Quarter Horse', 1.67),
(2, 'Pony', 'Klaas', 'Shetlandpony', 1.46),
(3, 'Pony', 'Maartje', 'HogeVuursePony', 1.55),
(4, 'Paard', 'Kees', 'Quarterback Horse', 1.58),
(5, 'Pony', 'Karel', 'HogeVuursePony', 1.32),
(6, 'Paard', 'Eros', 'frieslander', 1.5),
(7, 'Paard', 'Henk', 'Test', 3),
(8, 'Pony', 'Lady', 'Shetland', 1.47);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `Horse_id` int(11) NOT NULL,
  `Rider_id` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `planning`
--

INSERT INTO `planning` (`id`, `start_time`, `end_time`, `Horse_id`, `Rider_id`, `Date`) VALUES
(35, '09:00:00', '10:00:00', 1, 1, '2020-01-27'),
(36, '14:00:00', '15:00:00', 1, 1, '2020-01-26'),
(37, '12:00:00', '13:00:00', 1, 1, '2020-01-27'),
(38, '13:00:00', '14:00:00', 2, 3, '2020-01-27'),
(40, '13:00:00', '14:00:00', 8, 2, '2020-01-28'),
(41, '09:00:00', '12:00:00', 5, 6, '2020-01-29');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `riders`
--

CREATE TABLE `riders` (
  `RiderID` int(11) NOT NULL,
  `RiderName` text NOT NULL,
  `adress` text NOT NULL,
  `phonenumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `riders`
--

INSERT INTO `riders` (`RiderID`, `RiderName`, `adress`, `phonenumber`) VALUES
(1, 'Nick versluis', '2351643adf', '234567732'),
(2, 'Gideon Van den Herik', 'sliedrecht', '09876543'),
(3, 'Jochem', 'nieuweweg 19', '0613328069'),
(4, 'Henk Garretsen', 'nieuweweg 19', '0612345678'),
(5, 'Peter snoek', 'Mollenburgseweg 82', '0612345678'),
(6, 'Joël', 'Mollenburgseweg 82', '0612345678');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `horses`
--
ALTER TABLE `horses`
  ADD PRIMARY KEY (`HorseID`);

--
-- Indexen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`RiderID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `horses`
--
ALTER TABLE `horses`
  MODIFY `HorseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT voor een tabel `riders`
--
ALTER TABLE `riders`
  MODIFY `RiderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
