-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 09:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `opis` text DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `naziv`, `opis`, `cena`) VALUES
(1, 'Igračka za pse', 'Igračka za zabavu pasa', 20.00),
(2, 'Krevet za mačke', 'Krevet za udobnost mačaka', 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `klijenti`
--

CREATE TABLE `klijenti` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adresa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klijenti`
--

INSERT INTO `klijenti` (`id`, `ime`, `prezime`, `telefon`, `email`, `adresa`) VALUES
(1, 'Jovan', 'Jovanović', '555-123-456', 'jovan.novi@gmail.com', 'Ulica 1, Grad'),
(2, 'Marija', 'Marković', '555-654-321', 'marija.nova@gmail.com', 'Ulica 2, Grad'),
(3, 'Jovan', 'Jovanović', NULL, 'jovan.novi@gmail.com', NULL),
(4, 'fdf', 'dfd', NULL, 'dg@fgf.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ljubimci`
--

CREATE TABLE `ljubimci` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `vrsta` varchar(100) DEFAULT NULL,
  `rasa` varchar(100) DEFAULT NULL,
  `starost` int(11) DEFAULT NULL,
  `klijent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ljubimci`
--

INSERT INTO `ljubimci` (`id`, `ime`, `vrsta`, `rasa`, `starost`, `klijent_id`) VALUES
(1, 'Bani', 'Pas', 'Labrador', 3, 1),
(2, 'Micka', 'Mačka', 'Persijska', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `type`, `age`) VALUES
(1, 'Rex', 'Pas', 5),
(2, 'Whiskers', 'Mačka', 3),
(3, 'Tweety', 'Ptica', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klijenti`
--
ALTER TABLE `klijenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ljubimci`
--
ALTER TABLE `ljubimci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klijent_id` (`klijent_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klijenti`
--
ALTER TABLE `klijenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ljubimci`
--
ALTER TABLE `ljubimci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ljubimci`
--
ALTER TABLE `ljubimci`
  ADD CONSTRAINT `ljubimci_ibfk_1` FOREIGN KEY (`klijent_id`) REFERENCES `klijenti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
