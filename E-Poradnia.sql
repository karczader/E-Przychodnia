-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 27 Kwi 2021, 10:48
-- Wersja serwera: 8.0.23-0ubuntu0.20.04.1
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `E-Poradnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Doctors`
--

CREATE TABLE `Doctors` (
  `NrDoctor` int NOT NULL,
  `FirsName` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `SecondName` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Specialization` int NOT NULL,
  `HashPassword` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `DaysForVacation` int NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Doctors`
--

INSERT INTO `Doctors` (`NrDoctor`, `FirsName`, `SecondName`, `Specialization`, `HashPassword`, `DaysForVacation`) VALUES
(12345, 'Magdalena', 'Cyrańska', 1, '$2y$10$WYd45eaWW7kvSzDgmaqYi.G2y3b7IYGyYPF/YO22ILX5yaPyfkBxu', 0),
(54321, 'Karolina', 'Czader', 2, '$2y$10$WYd45eaWW7kvSzDgmaqYi.G2y3b7IYGyYPF/YO22ILX5yaPyfkBxu', 15),
(98765, 'Dominika', 'Lawasz', 1, 'Alamakota', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `FreeDays`
--

CREATE TABLE `FreeDays` (
  `IdFreeDays` int NOT NULL,
  `NrDoctor` int NOT NULL,
  `Type` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Beginning` date NOT NULL,
  `End` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `FreeDays`
--

INSERT INTO `FreeDays` (`IdFreeDays`, `NrDoctor`, `Type`, `Beginning`, `End`) VALUES
(52, 12345, 'L4', '2021-03-09', '2021-03-12'),
(53, 12345, 'L4', '2021-03-21', '2021-03-23'),
(54, 12345, 'wakacje', '2021-03-22', '2021-03-24'),
(55, 12345, 'L4', '2021-04-07', '2021-04-08'),
(56, 12345, 'L4', '2021-03-14', '2021-03-17'),
(57, 12345, 'L4', '2021-03-14', '2021-03-17'),
(58, 12345, 'L4', '2021-03-09', '2021-03-12'),
(59, 12345, 'L4', '2021-03-09', '2021-03-12'),
(60, 12345, 'L4', '2021-03-09', '2021-03-12'),
(61, 12345, 'L4', '2021-03-09', '2021-03-12'),
(62, 12345, 'L4', '2021-03-09', '2021-03-12'),
(63, 12345, 'L4', '2021-03-09', '2021-03-12'),
(64, 12345, 'L4', '2021-03-09', '2021-03-12'),
(65, 12345, 'L4', '2021-03-09', '2021-03-12'),
(66, 12345, 'L4', '2021-03-09', '2021-03-12'),
(67, 12345, 'L4', '2021-03-09', '2021-03-12'),
(68, 12345, 'L4', '2021-03-09', '2021-03-12'),
(69, 12345, 'L4', '2021-03-09', '2021-03-12'),
(70, 12345, 'L4', '2021-03-09', '2021-03-12'),
(71, 12345, 'L4', '2021-03-09', '2021-03-12'),
(72, 12345, 'L4', '2021-03-09', '2021-03-12'),
(73, 12345, 'L4', '2021-03-09', '2021-03-12'),
(74, 12345, 'wakacje', '2021-03-10', '2021-03-13'),
(75, 12345, 'wakacje', '2021-03-10', '2021-03-13'),
(76, 12345, 'wakacje', '2021-03-10', '2021-03-13'),
(77, 12345, 'wakacje', '2021-03-10', '2021-03-13'),
(78, 12345, 'L4', '2021-03-09', '2021-03-13'),
(79, 12345, 'L4', '2021-03-09', '2021-03-13'),
(80, 12345, 'L4', '2021-03-10', '2021-03-13'),
(81, 12345, 'L4', '2021-03-09', '2021-03-13'),
(82, 12345, 'L4', '2021-03-09', '2021-03-13'),
(83, 12345, 'L4', '2021-03-10', '2021-03-10'),
(84, 12345, 'L4', '2021-03-10', '2021-03-10'),
(85, 12345, 'L4', '2021-03-10', '2021-03-10'),
(86, 12345, 'L4', '2021-03-09', '2021-03-12'),
(87, 12345, 'L4', '2021-03-08', '2021-03-08'),
(88, 12345, 'L4', '2021-03-08', '2021-03-08'),
(89, 12345, 'L4', '2021-04-21', '2021-04-22'),
(90, 12345, 'L4', '2021-03-09', '2021-03-09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Illness`
--

CREATE TABLE `Illness` (
  `IdIllnes` int NOT NULL,
  `Beginning` date NOT NULL,
  `End` date DEFAULT NULL,
  `IdPatient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Illness`
--

INSERT INTO `Illness` (`IdIllnes`, `Beginning`, `End`, `IdPatient`) VALUES
(1, '2021-01-12', '2021-03-03', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ListOfPatients`
--

CREATE TABLE `ListOfPatients` (
  `IdListOfPatients` int NOT NULL,
  `NrDoctor` int NOT NULL,
  `IdPatient` int NOT NULL,
  `Type` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ListOfPatients`
--

INSERT INTO `ListOfPatients` (`IdListOfPatients`, `NrDoctor`, `IdPatient`, `Type`) VALUES
(1, 12345, 1, 'chory'),
(2, 12345, 2, 'zdrowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Medicines`
--

CREATE TABLE `Medicines` (
  `IdMedicines` int NOT NULL,
  `Name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Description` text CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  `Dosage` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Medicines`
--

INSERT INTO `Medicines` (`IdMedicines`, `Name`, `Description`, `Dosage`) VALUES
(1, 'ibuprom', 'działa', '2 na dzień'),
(2, 'gripex', 'też działa', 'co 3 godziny'),
(3, 'nuforem', 'podobno działa', 'max 1 na dzień'),
(4, 'nospa', 'okres', 'wedle uznania'),
(5, 'choliinex', 'gardło', 'nie częściej niż co 3 godziny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `MedicinesVisits`
--

CREATE TABLE `MedicinesVisits` (
  `IdMedicinesVisits` int NOT NULL,
  `IdMedicines` int NOT NULL,
  `IdSummaryVisits` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `MedicinesVisits`
--

INSERT INTO `MedicinesVisits` (`IdMedicinesVisits`, `IdMedicines`, `IdSummaryVisits`) VALUES
(1, 1, 1),
(2, 4, 2),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Message`
--

CREATE TABLE `Message` (
  `IdMessage` int NOT NULL,
  `IdPatient` int NOT NULL,
  `IdDoctor` int NOT NULL,
  `Text` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `IfRead` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Message`
--

INSERT INTO `Message` (`IdMessage`, `IdPatient`, `IdDoctor`, `Text`, `IfRead`) VALUES
(2, 1, 12345, 'Twoja wizyta w dniu 10-03-2021 została niestety odwołania, prosimy umów się ponownie', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Patiens`
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
-- Zrzut danych tabeli `Patiens`
--

INSERT INTO `Patiens` (`IdPatient`, `FirstName`, `SecondName`, `DateOfBirth`, `Locality`, `Email`, `Pesel`, `PhoneNumber`, `HashPassword`) VALUES
(1, 'Adam', 'Nowak', '1978-04-11', 'Warszawa', 'adam.nowak@gmail.com', '11111111111', '145698745', '$2y$10$WYd45eaWW7kvSzDgmaqYi.G2y3b7IYGyYPF/YO22ILX5yaPyfkBxu'),
(2, 'Katarzyna', 'Nowak', '1994-06-13', 'Krakow', 'katarzyna123@gmail.com', '15698741234', '459874123', '$2y$10$WYd45eaWW7kvSzDgmaqYi.G2y3b7IYGyYPF/YO22ILX5yaPyfkBxu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Specialization`
--

CREATE TABLE `Specialization` (
  `IdSpecialization` int NOT NULL,
  `Name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Specialization`
--

INSERT INTO `Specialization` (`IdSpecialization`, `Name`) VALUES
(1, 'ginekolog'),
(2, 'pediatra');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `SummaryVisits`
--

CREATE TABLE `SummaryVisits` (
  `IdSummary` int NOT NULL,
  `IdIllnes` int NOT NULL,
  `IdPatient` int NOT NULL,
  `NrDoctor` int NOT NULL,
  `IfNext` int NOT NULL,
  `Recommendations` text COLLATE utf8_polish_ci NOT NULL,
  `IdVisits` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `SummaryVisits`
--

INSERT INTO `SummaryVisits` (`IdSummary`, `IdIllnes`, `IdPatient`, `NrDoctor`, `IfNext`, `Recommendations`, `IdVisits`) VALUES
(1, 1, 1, 12345, 1, '', 3),
(2, 1, 1, 12345, 1, '', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Symptoms`
--

CREATE TABLE `Symptoms` (
  `IdSymptoms` int NOT NULL,
  `Name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `HowLong` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Symptoms`
--

INSERT INTO `Symptoms` (`IdSymptoms`, `Name`, `Description`, `HowLong`) VALUES
(1, 'ból głowy', 'boli głowa', 'dzień');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `SymptomsVisits`
--

CREATE TABLE `SymptomsVisits` (
  `IdSymptomsVisits` int NOT NULL,
  `IdSymptoms` int NOT NULL,
  `IdSummaryVisits` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `SymptomsVisits`
--

INSERT INTO `SymptomsVisits` (`IdSymptomsVisits`, `IdSymptoms`, `IdSummaryVisits`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Visits`
--

CREATE TABLE `Visits` (
  `IdVisit` int NOT NULL,
  `IdPatient` int DEFAULT NULL,
  `NrDoctor` int DEFAULT NULL,
  `Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Visits`
--

INSERT INTO `Visits` (`IdVisit`, `IdPatient`, `NrDoctor`, `Time`) VALUES
(3, 1, 12345, '2021-07-08 12:15:00'),
(5, 1, 54321, '2021-03-10 12:40:46'),
(7, 2, 12345, '2021-03-10 14:27:03');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`NrDoctor`),
  ADD KEY `Specialization` (`Specialization`);

--
-- Indeksy dla tabeli `FreeDays`
--
ALTER TABLE `FreeDays`
  ADD PRIMARY KEY (`IdFreeDays`),
  ADD KEY `NrDoctor` (`NrDoctor`);

--
-- Indeksy dla tabeli `Illness`
--
ALTER TABLE `Illness`
  ADD PRIMARY KEY (`IdIllnes`),
  ADD KEY `IdPatient` (`IdPatient`);

--
-- Indeksy dla tabeli `ListOfPatients`
--
ALTER TABLE `ListOfPatients`
  ADD PRIMARY KEY (`IdListOfPatients`),
  ADD KEY `NrDoctor` (`NrDoctor`),
  ADD KEY `IdPatient` (`IdPatient`);

--
-- Indeksy dla tabeli `Medicines`
--
ALTER TABLE `Medicines`
  ADD PRIMARY KEY (`IdMedicines`);

--
-- Indeksy dla tabeli `MedicinesVisits`
--
ALTER TABLE `MedicinesVisits`
  ADD PRIMARY KEY (`IdMedicinesVisits`),
  ADD KEY `IdMedicines` (`IdMedicines`),
  ADD KEY `IdSummaryVisits` (`IdSummaryVisits`);

--
-- Indeksy dla tabeli `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`IdMessage`),
  ADD KEY `IdPatient` (`IdPatient`),
  ADD KEY `IdDoctor` (`IdDoctor`);

--
-- Indeksy dla tabeli `Patiens`
--
ALTER TABLE `Patiens`
  ADD PRIMARY KEY (`IdPatient`);

--
-- Indeksy dla tabeli `Specialization`
--
ALTER TABLE `Specialization`
  ADD PRIMARY KEY (`IdSpecialization`);

--
-- Indeksy dla tabeli `SummaryVisits`
--
ALTER TABLE `SummaryVisits`
  ADD PRIMARY KEY (`IdSummary`),
  ADD KEY `IdIllnes` (`IdIllnes`),
  ADD KEY `IdPatient` (`IdPatient`),
  ADD KEY `NrDoctor` (`NrDoctor`),
  ADD KEY `IdVisits` (`IdVisits`);

--
-- Indeksy dla tabeli `Symptoms`
--
ALTER TABLE `Symptoms`
  ADD PRIMARY KEY (`IdSymptoms`);

--
-- Indeksy dla tabeli `SymptomsVisits`
--
ALTER TABLE `SymptomsVisits`
  ADD PRIMARY KEY (`IdSymptomsVisits`),
  ADD KEY `IdSymptoms` (`IdSymptoms`),
  ADD KEY `IdSummaryVisits` (`IdSummaryVisits`);

--
-- Indeksy dla tabeli `Visits`
--
ALTER TABLE `Visits`
  ADD PRIMARY KEY (`IdVisit`),
  ADD KEY `IdPatient` (`IdPatient`),
  ADD KEY `NrDoctor` (`NrDoctor`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `FreeDays`
--
ALTER TABLE `FreeDays`
  MODIFY `IdFreeDays` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT dla tabeli `Illness`
--
ALTER TABLE `Illness`
  MODIFY `IdIllnes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `ListOfPatients`
--
ALTER TABLE `ListOfPatients`
  MODIFY `IdListOfPatients` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `Medicines`
--
ALTER TABLE `Medicines`
  MODIFY `IdMedicines` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `MedicinesVisits`
--
ALTER TABLE `MedicinesVisits`
  MODIFY `IdMedicinesVisits` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `Message`
--
ALTER TABLE `Message`
  MODIFY `IdMessage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `Patiens`
--
ALTER TABLE `Patiens`
  MODIFY `IdPatient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `Specialization`
--
ALTER TABLE `Specialization`
  MODIFY `IdSpecialization` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `SummaryVisits`
--
ALTER TABLE `SummaryVisits`
  MODIFY `IdSummary` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `Symptoms`
--
ALTER TABLE `Symptoms`
  MODIFY `IdSymptoms` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `SymptomsVisits`
--
ALTER TABLE `SymptomsVisits`
  MODIFY `IdSymptomsVisits` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `Visits`
--
ALTER TABLE `Visits`
  MODIFY `IdVisit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Doctors`
--
ALTER TABLE `Doctors`
  ADD CONSTRAINT `Doctors_ibfk_1` FOREIGN KEY (`Specialization`) REFERENCES `Specialization` (`IdSpecialization`);

--
-- Ograniczenia dla tabeli `FreeDays`
--
ALTER TABLE `FreeDays`
  ADD CONSTRAINT `FreeDays_ibfk_1` FOREIGN KEY (`NrDoctor`) REFERENCES `Doctors` (`NrDoctor`);

--
-- Ograniczenia dla tabeli `Illness`
--
ALTER TABLE `Illness`
  ADD CONSTRAINT `Illness_ibfk_1` FOREIGN KEY (`IdPatient`) REFERENCES `Patiens` (`IdPatient`);

--
-- Ograniczenia dla tabeli `ListOfPatients`
--
ALTER TABLE `ListOfPatients`
  ADD CONSTRAINT `ListOfPatients_ibfk_1` FOREIGN KEY (`NrDoctor`) REFERENCES `Doctors` (`NrDoctor`),
  ADD CONSTRAINT `ListOfPatients_ibfk_2` FOREIGN KEY (`IdPatient`) REFERENCES `Patiens` (`IdPatient`);

--
-- Ograniczenia dla tabeli `MedicinesVisits`
--
ALTER TABLE `MedicinesVisits`
  ADD CONSTRAINT `MedicinesVisits_ibfk_1` FOREIGN KEY (`IdMedicines`) REFERENCES `Medicines` (`IdMedicines`),
  ADD CONSTRAINT `MedicinesVisits_ibfk_2` FOREIGN KEY (`IdMedicines`) REFERENCES `Medicines` (`IdMedicines`),
  ADD CONSTRAINT `MedicinesVisits_ibfk_3` FOREIGN KEY (`IdSummaryVisits`) REFERENCES `SummaryVisits` (`IdSummary`);

--
-- Ograniczenia dla tabeli `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`IdPatient`) REFERENCES `Patiens` (`IdPatient`),
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`IdDoctor`) REFERENCES `Doctors` (`NrDoctor`);

--
-- Ograniczenia dla tabeli `SummaryVisits`
--
ALTER TABLE `SummaryVisits`
  ADD CONSTRAINT `SummaryVisits_ibfk_1` FOREIGN KEY (`IdIllnes`) REFERENCES `Illness` (`IdIllnes`),
  ADD CONSTRAINT `SummaryVisits_ibfk_2` FOREIGN KEY (`IdPatient`) REFERENCES `Patiens` (`IdPatient`),
  ADD CONSTRAINT `SummaryVisits_ibfk_3` FOREIGN KEY (`NrDoctor`) REFERENCES `Doctors` (`NrDoctor`),
  ADD CONSTRAINT `SummaryVisits_ibfk_4` FOREIGN KEY (`IdVisits`) REFERENCES `Visits` (`IdVisit`);

--
-- Ograniczenia dla tabeli `SymptomsVisits`
--
ALTER TABLE `SymptomsVisits`
  ADD CONSTRAINT `SymptomsVisits_ibfk_1` FOREIGN KEY (`IdSymptoms`) REFERENCES `Symptoms` (`IdSymptoms`),
  ADD CONSTRAINT `SymptomsVisits_ibfk_2` FOREIGN KEY (`IdSummaryVisits`) REFERENCES `SummaryVisits` (`IdSummary`);

--
-- Ograniczenia dla tabeli `Visits`
--
ALTER TABLE `Visits`
  ADD CONSTRAINT `Visits_ibfk_1` FOREIGN KEY (`IdPatient`) REFERENCES `Patiens` (`IdPatient`),
  ADD CONSTRAINT `Visits_ibfk_2` FOREIGN KEY (`NrDoctor`) REFERENCES `Doctors` (`NrDoctor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
