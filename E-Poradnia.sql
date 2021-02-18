-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2021 at 08:15 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `E-Poradnia`
--

-- --------------------------------------------------------

--
-- Table structure for table `Patiens`
--

CREATE TABLE `Patiens` (
  `IdPatient` int NOT NULL,
  `FirstName` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `SecondName` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Locality` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Pesel` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `PhoneNumber` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `HashPassword` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `Patiens`
--

INSERT INTO `Patiens` (`IdPatient`, `FirstName`, `SecondName`, `DateOfBirth`, `Locality`, `Email`, `Pesel`, `PhoneNumber`, `HashPassword`) VALUES
(1, 'Adam', 'Nowak', '1978-02-14', 'Warszawa', 'adam.nowak@gmail.com', '12345678910', '123456789', 'qwerty123'),
(2, 'Katarzyna', 'Nowak', '1994-06-13', 'Krakow', 'katarzyna123@gmail.com', '15698741234', '459874123', 'qwerty123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Patiens`
--
ALTER TABLE `Patiens`
  ADD PRIMARY KEY (`IdPatient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Patiens`
--
ALTER TABLE `Patiens`
  MODIFY `IdPatient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
