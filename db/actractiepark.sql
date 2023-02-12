-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mariadb-crud-php-pdo-opdracht03:3306
-- Generation Time: Feb 12, 2023 at 09:23 PM
-- Server version: 10.7.6-MariaDB-1:10.7.6+maria~ubu2004
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actractiepark`
--

-- --------------------------------------------------------

--
-- Table structure for table `achtbaan`
--

CREATE TABLE `achtbaan` (
  `id` int(11) NOT NULL,
  `naamAchtbaan` varchar(255) NOT NULL,
  `naamPretpark` varchar(255) NOT NULL,
  `land` varchar(255) NOT NULL,
  `topsnelheid` int(11) NOT NULL,
  `hoogte` int(11) NOT NULL,
  `datum` date NOT NULL,
  `cijfer` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achtbaan`
--

INSERT INTO `achtbaan` (`id`, `naamAchtbaan`, `naamPretpark`, `land`, `topsnelheid`, `hoogte`, `datum`, `cijfer`) VALUES
(2, 'Red Force', 'Ferrari Land', 'Spanje', 192, 112, '1968-03-02', '9.2'),
(3, 'Ring Racer', 'Circuit Nürnberg', 'Duitslang', 160, 110, '1974-08-01', '8.7'),
(4, 'Hyperion', 'EnergyLandia', 'Polen', 141, 77, '2009-09-09', '6.3'),
(5, 'Furios Baco', 'PortAventura', 'Spanje', 138, 23, '2018-06-06', '5.6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achtbaan`
--
ALTER TABLE `achtbaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achtbaan`
--
ALTER TABLE `achtbaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
