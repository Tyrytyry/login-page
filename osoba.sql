-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lip 2021, 22:05
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sggw`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoba`
--

CREATE TABLE `osoba` (
  `IDOSOBY` int(11) NOT NULL,
  `NRALBUMU` int(11) NOT NULL,
  `HASLO` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `IMIE` text COLLATE utf8_polish_ci NOT NULL,
  `NAZWISKO` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `osoba`
--

INSERT INTO `osoba` (`IDOSOBY`, `NRALBUMU`, `HASLO`, `IMIE`, `NAZWISKO`) VALUES
(1, 201111, 'haslo', 'Adam', 'Kwiatkowski'),
(2, 203781, 'qwerty', 'Łukasz', 'Macierzyński'),
(3, 202222, 'asdfgh', 'Krzysztof', 'Brzęczyszczykiewicz'),
(4, 204444, 'maslo', 'Patrycja', 'Patrycja'),
(5, 111111, 'qqqqqq', 'qqqqqq', 'qqqqqq'),
(6, 222222, 'qqqqqq', 'qqqqqq', 'qqqqqq'),
(7, 202256, 'mojehaslo', 'Artur', 'Ziołowski'),
(8, 200910, '123abc', 'Natalia', 'XYZ'),
(9, 123321, 'haslojakkazdeinne', 'Ambroży', 'Ziołowski');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`IDOSOBY`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `osoba`
--
ALTER TABLE `osoba`
  MODIFY `IDOSOBY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
