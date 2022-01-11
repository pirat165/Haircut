-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Czas generowania: 11 Sty 2022, 21:35
-- Wersja serwera: 5.7.26
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `Haircut`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `ID_ad` int(11) NOT NULL,
  `Nazwisko` text NOT NULL,
  `Imie` text NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Haslo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`ID_ad`, `Nazwisko`, `Imie`, `Mail`, `Haslo`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.pl', 'admin123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Archive`
--

CREATE TABLE `Archive` (
  `ID_arch` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Godzina` time NOT NULL,
  `ID_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Archive`
--

INSERT INTO `Archive` (`ID_arch`, `Data`, `Godzina`, `ID_emp`) VALUES
(2, '2022-01-05', '12:30:00', 0),
(3, '2021-12-29', '09:00:00', 0),
(4, '2022-01-18', '10:00:00', 0),
(5, '2022-01-29', '10:30:00', 0),
(6, '2022-01-18', '13:30:00', 4),
(7, '2022-01-18', '11:30:00', 2),
(8, '2022-01-18', '14:30:00', 2),
(9, '2022-01-18', '15:30:00', 2),
(10, '2022-01-18', '18:30:00', 2),
(11, '2022-01-18', '16:00:00', 4),
(12, '2022-01-19', '16:30:00', 4),
(13, '2022-01-20', '10:30:00', 3),
(14, '2022-01-18', '11:00:00', 4),
(15, '2022-01-18', '17:00:00', 2),
(16, '2022-01-18', '18:00:00', 2),
(17, '2022-01-20', '17:30:00', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Calendar`
--

CREATE TABLE `Calendar` (
  `ID_cal` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Godzina` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Calendar`
--

INSERT INTO `Calendar` (`ID_cal`, `Data`, `Godzina`) VALUES
(20, '2022-01-19', '09:00:00'),
(21, '2022-01-19', '09:30:00'),
(22, '2022-01-19', '10:00:00'),
(25, '2022-01-19', '11:30:00'),
(26, '2022-01-19', '12:00:00'),
(27, '2022-01-19', '12:30:00'),
(28, '2022-01-19', '13:00:00'),
(29, '2022-01-19', '13:30:00'),
(30, '2022-01-19', '14:00:00'),
(31, '2022-01-19', '14:30:00'),
(32, '2022-01-19', '15:00:00'),
(33, '2022-01-19', '15:30:00'),
(39, '2022-01-19', '18:30:00'),
(40, '2022-01-20', '09:00:00'),
(41, '2022-01-20', '09:30:00'),
(42, '2022-01-20', '10:00:00'),
(45, '2022-01-20', '11:30:00'),
(46, '2022-01-20', '12:00:00'),
(47, '2022-01-20', '12:30:00'),
(48, '2022-01-20', '13:00:00'),
(49, '2022-01-20', '13:30:00'),
(50, '2022-01-20', '14:00:00'),
(51, '2022-01-20', '14:30:00'),
(52, '2022-01-20', '15:00:00'),
(53, '2022-01-20', '15:30:00'),
(59, '2022-01-20', '18:30:00'),
(60, '2022-02-20', '09:00:00'),
(61, '2022-02-20', '09:30:00'),
(62, '2022-02-20', '10:00:00'),
(65, '2022-02-20', '11:30:00'),
(66, '2022-02-20', '12:00:00'),
(67, '2022-02-20', '12:30:00'),
(68, '2022-02-20', '13:00:00'),
(69, '2022-02-20', '13:30:00'),
(70, '2022-02-20', '14:00:00'),
(71, '2022-02-20', '14:30:00'),
(72, '2022-02-20', '15:00:00'),
(73, '2022-02-20', '15:30:00'),
(79, '2022-02-20', '18:30:00'),
(80, '2022-02-21', '09:00:00'),
(81, '2022-02-21', '09:30:00'),
(82, '2022-02-21', '10:00:00'),
(85, '2022-02-21', '11:30:00'),
(86, '2022-02-21', '12:00:00'),
(87, '2022-02-21', '12:30:00'),
(88, '2022-02-21', '13:00:00'),
(89, '2022-02-21', '13:30:00'),
(90, '2022-02-21', '14:00:00'),
(91, '2022-02-21', '14:30:00'),
(92, '2022-02-21', '15:00:00'),
(93, '2022-02-21', '15:30:00'),
(99, '2022-02-21', '18:30:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE `employee` (
  `ID_emp` int(11) NOT NULL,
  `Nazwisko` text NOT NULL,
  `Imie` text NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Telefon` text NOT NULL,
  `Haslo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `employee`
--

INSERT INTO `employee` (`ID_emp`, `Nazwisko`, `Imie`, `Mail`, `Telefon`, `Haslo`) VALUES
(2, 'Pracownik_testowy1', 'Adam', 'adi12@wp.pl', '332112442', '12345678'),
(3, 'Pracownik_testowy2', 'Mateusz', 'mateusz11@wp.pl', '123321231', '12345678'),
(4, 'Pracownik_testowy3', 'Sandra', 'sanderka98@gmail.com', '667876345', '12345678'),
(6, 'test', 'szybki', 'sztest@wp.pl', '123123123', '12345678');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Opinions`
--

CREATE TABLE `Opinions` (
  `ID_opini` int(11) NOT NULL,
  `ID_os` int(11) NOT NULL,
  `Ocena` int(11) NOT NULL,
  `Opinia` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Opinions`
--

INSERT INTO `Opinions` (`ID_opini`, `ID_os`, `Ocena`, `Opinia`) VALUES
(1, 2, 8, 'Piękne fryzury '),
(2, 2, 7, 'Było całkiem dobrze'),
(3, 2, 10, 'POLECAM'),
(4, 1, 10, 'Super ludzie, super lokal!'),
(5, 2, 1, 'Nie podobało mi się'),
(6, 2, 5, 'Fajny lokal'),
(7, 2, 9, 'Super'),
(8, 2, 10, 'Było super, polecam!'),
(9, 4, 10, 'Świetna obsługa, czysty lokal -> zadowolony klient');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservation`
--

CREATE TABLE `reservation` (
  `ID_reservation` int(11) NOT NULL,
  `ID_uslugi` int(11) NOT NULL,
  `ID_os` int(11) NOT NULL,
  `ID_emp` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Godzina` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `reservation`
--

INSERT INTO `reservation` (`ID_reservation`, `ID_uslugi`, `ID_os`, `ID_emp`, `Data`, `Godzina`) VALUES
(2, 1, 2, 2, '2021-12-15', '12:00:00'),
(3, 2, 2, 2, '2021-12-15', '12:00:00'),
(4, 2, 2, 2, '2021-12-15', '15:00:00'),
(27, 2, 3, 4, '2022-01-18', '13:30:00'),
(28, 1, 2, 2, '2022-01-18', '11:30:00'),
(29, 2, 2, 2, '2022-01-10', '18:00:00'),
(30, 4, 3, 4, '2021-12-15', '15:30:00'),
(31, 1, 2, 4, '2022-01-18', '16:00:00'),
(32, 2, 2, 4, '2022-01-19', '16:30:00'),
(33, 4, 2, 3, '2022-01-20', '10:30:00'),
(34, 5, 2, 4, '2022-01-18', '11:00:00'),
(35, 1, 2, 2, '2022-01-18', '17:00:00'),
(36, 3, 4, 2, '2022-01-18', '18:00:00'),
(37, 1, 5, 4, '2022-01-20', '17:30:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Todo`
--

CREATE TABLE `Todo` (
  `ID_todo` int(11) NOT NULL,
  `ID_emp` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Godzina` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Todo`
--

INSERT INTO `Todo` (`ID_todo`, `ID_emp`, `Data`, `Godzina`) VALUES
(1, 4, '2022-01-18', '13:30:00'),
(2, 2, '2022-01-18', '11:30:00'),
(3, 2, '2022-01-18', '14:30:00'),
(4, 2, '2022-01-18', '15:30:00'),
(5, 2, '2022-01-18', '18:30:00'),
(6, 3, '2022-01-18', '18:30:00'),
(7, 3, '2022-01-09', '09:30:00'),
(8, 4, '2022-01-30', '09:30:00'),
(9, 2, '2022-01-18', '16:30:00'),
(10, 2, '2022-01-18', '14:00:00'),
(11, 3, '2022-01-18', '13:00:00'),
(12, 3, '2022-01-18', '12:30:00'),
(13, 4, '2022-01-18', '16:00:00'),
(14, 4, '2022-01-19', '16:30:00'),
(15, 3, '2022-01-20', '10:30:00'),
(16, 4, '2022-01-18', '11:00:00'),
(17, 2, '2022-01-18', '17:00:00'),
(18, 2, '2022-01-18', '18:00:00'),
(19, 4, '2022-01-20', '17:30:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_os` int(11) NOT NULL,
  `Nazwisko` text NOT NULL,
  `Imie` text NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Telefon` text NOT NULL,
  `Haslo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_os`, `Nazwisko`, `Imie`, `Mail`, `Telefon`, `Haslo`) VALUES
(1, 'Testowy', 'Jan', 'test@test.pl', '888888888', ''),
(2, 'Kowalski', 'Zbyszek', 'zbyszek@wp.pl', '123321123', '12345678'),
(3, 'Janek', 'Jan', 'jan@jan.pl', '123123123', '12345678'),
(4, 'Moniuszko', 'Tadeusz', 'moniuszko@wp.pl', '123123123', '123123123'),
(5, 'Jarki', 'Piotr', 'pj@wp.pl', '883222334', '123123123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uslugi`
--

CREATE TABLE `uslugi` (
  `ID_uslugi` int(11) NOT NULL,
  `Usluga` text NOT NULL,
  `Cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uslugi`
--

INSERT INTO `uslugi` (`ID_uslugi`, `Usluga`, `Cena`) VALUES
(1, 'Strzyżenie', 60),
(2, 'Strzyżenie brody', 50),
(3, 'Strzyżenie maszynką', 40),
(4, 'Golenie', 30),
(5, 'Farbowanie', 80);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ad`);

--
-- Indeksy dla tabeli `Archive`
--
ALTER TABLE `Archive`
  ADD PRIMARY KEY (`ID_arch`),
  ADD KEY `ID_emp` (`ID_emp`);

--
-- Indeksy dla tabeli `Calendar`
--
ALTER TABLE `Calendar`
  ADD PRIMARY KEY (`ID_cal`);

--
-- Indeksy dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID_emp`);

--
-- Indeksy dla tabeli `Opinions`
--
ALTER TABLE `Opinions`
  ADD PRIMARY KEY (`ID_opini`),
  ADD KEY `ID_os` (`ID_os`);

--
-- Indeksy dla tabeli `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID_reservation`),
  ADD KEY `ID_uslugi` (`ID_uslugi`),
  ADD KEY `ID_os` (`ID_os`),
  ADD KEY `ID_emp` (`ID_emp`);

--
-- Indeksy dla tabeli `Todo`
--
ALTER TABLE `Todo`
  ADD PRIMARY KEY (`ID_todo`),
  ADD KEY `ID_os` (`ID_emp`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_os`);

--
-- Indeksy dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`ID_uslugi`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `Archive`
--
ALTER TABLE `Archive`
  MODIFY `ID_arch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `Calendar`
--
ALTER TABLE `Calendar`
  MODIFY `ID_cal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT dla tabeli `employee`
--
ALTER TABLE `employee`
  MODIFY `ID_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `Opinions`
--
ALTER TABLE `Opinions`
  MODIFY `ID_opini` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `Todo`
--
ALTER TABLE `Todo`
  MODIFY `ID_todo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_os` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Opinions`
--
ALTER TABLE `Opinions`
  ADD CONSTRAINT `opinions_ibfk_1` FOREIGN KEY (`ID_os`) REFERENCES `users` (`ID_os`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ID_os`) REFERENCES `users` (`ID_os`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`ID_uslugi`) REFERENCES `uslugi` (`ID_uslugi`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`ID_emp`) REFERENCES `employee` (`ID_emp`);

--
-- Ograniczenia dla tabeli `Todo`
--
ALTER TABLE `Todo`
  ADD CONSTRAINT `todo_ibfk_3` FOREIGN KEY (`ID_emp`) REFERENCES `employee` (`ID_emp`) ON DELETE NO ACTION ON UPDATE CASCADE;
