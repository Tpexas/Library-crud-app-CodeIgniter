-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 09:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `autoriai`
--

CREATE TABLE `autoriai` (
  `id` smallint(6) NOT NULL,
  `vardas` varchar(16) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(16) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autoriai`
--

INSERT INTO `autoriai` (`id`, `vardas`, `pavarde`) VALUES
(1, 'Jonas', 'Biliūnas'),
(2, 'Juozas', 'Aputis'),
(3, 'Romualdas', 'Granauskas'),
(4, 'Kazys', 'Binkis'),
(17, 'Jonas', 'Basanavičius'),
(18, 'Kristijonas', 'Donelaitis');

-- --------------------------------------------------------

--
-- Table structure for table `knygos`
--

CREATE TABLE `knygos` (
  `id` smallint(6) NOT NULL,
  `autoriaus_id` smallint(6) NOT NULL,
  `pavadinimas` varchar(32) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `kategorija` varchar(32) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `metai` smallint(5) NOT NULL,
  `populiarumas` enum('didelis','vidutinis','mažas','') NOT NULL DEFAULT 'vidutinis',
  `likutis` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knygos`
--

INSERT INTO `knygos` (`id`, `autoriaus_id`, `pavadinimas`, `kategorija`, `metai`, `populiarumas`, `likutis`) VALUES
(1, 1, 'Ubagas', 'Fikcija', 1906, 'vidutinis', 8),
(27, 1, 'Vagis', 'Fikcija', 1959, 'didelis', 39),
(28, 2, 'Dvi apysakos', 'Novelė', 1996, 'mažas', 52),
(29, 3, 'Gyvenimas po klevu', 'Fikcija', 1988, 'didelis', 11),
(30, 3, 'Jaučio aukojimas', 'Fikcija', 1975, 'vidutinis', 35),
(31, 4, 'Kiškių sukilimas', 'Didaktinė poemėlė', 2005, 'mažas', 98),
(32, 18, 'Metai', 'Poema', 2021, 'didelis', 13);

-- --------------------------------------------------------

--
-- Table structure for table `nariai`
--

CREATE TABLE `nariai` (
  `id` smallint(6) NOT NULL,
  `vardas` varchar(16) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(16) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `el_pastas` varchar(32) NOT NULL,
  `tel_nr` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nariai`
--

INSERT INTO `nariai` (`id`, `vardas`, `pavarde`, `el_pastas`, `tel_nr`) VALUES
(1, 'Tomas', 'Kazlauskas', 'tomas@gmail.com', 370609458),
(9, 'Jokūbas', 'Mieliauskas', 'jok@gmail.com', 370684563),
(10, 'Gabija', 'Kostykė', 'qwerty@gmail.com', 370612453),
(11, 'Svetlana', 'Stakienė', 'stak@gmail.com', 370609347);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymai`
--

CREATE TABLE `uzsakymai` (
  `id` smallint(6) NOT NULL,
  `nario_id` smallint(6) NOT NULL,
  `knygos_id` smallint(6) NOT NULL,
  `isdavimo_data` date NOT NULL,
  `grazinti_iki` date NOT NULL,
  `busena` enum('išduota','grąžinta','grąžinta pavėluotai','') NOT NULL DEFAULT 'išduota',
  `grazinimo_data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uzsakymai`
--

INSERT INTO `uzsakymai` (`id`, `nario_id`, `knygos_id`, `isdavimo_data`, `grazinti_iki`, `busena`, `grazinimo_data`) VALUES
(1, 1, 1, '2021-11-12', '2021-11-19', 'grąžinta', '2021-12-05'),
(65, 1, 32, '2021-12-08', '2021-12-15', 'išduota', NULL),
(66, 10, 30, '2021-12-08', '2022-01-07', 'išduota', NULL),
(67, 10, 31, '2021-12-08', '2022-02-06', 'grąžinta', '2021-12-08'),
(68, 9, 27, '2021-12-08', '2021-12-15', 'grąžinta', '2021-12-08'),
(69, 9, 29, '2021-12-08', '2021-12-15', 'išduota', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoriai`
--
ALTER TABLE `autoriai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knygos`
--
ALTER TABLE `knygos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knygos_ibfk_1` (`autoriaus_id`);

--
-- Indexes for table `nariai`
--
ALTER TABLE `nariai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `el. paštas` (`el_pastas`),
  ADD UNIQUE KEY `telefono nr.` (`tel_nr`);

--
-- Indexes for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nario_id` (`nario_id`),
  ADD KEY `knygos_id` (`knygos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autoriai`
--
ALTER TABLE `autoriai`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `knygos`
--
ALTER TABLE `knygos`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nariai`
--
ALTER TABLE `nariai`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knygos`
--
ALTER TABLE `knygos`
  ADD CONSTRAINT `knygos_ibfk_1` FOREIGN KEY (`autoriaus_id`) REFERENCES `autoriai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  ADD CONSTRAINT `uzsakymai_ibfk_1` FOREIGN KEY (`nario_id`) REFERENCES `nariai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uzsakymai_ibfk_2` FOREIGN KEY (`knygos_id`) REFERENCES `knygos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
