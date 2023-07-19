-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 19, 2023 alle 14:35
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`id`, `userId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `hotel_name` varchar(30) NOT NULL,
  `people` int(11) NOT NULL,
  `book_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `booking`
--

INSERT INTO `booking` (`id`, `userId`, `hotel_name`, `people`, `book_date`) VALUES
(1, 11, 'Residence Galielo Galilei', 1, '2024-07-01'),
(5, 11, 'Hotel Excelsior', 2, '2027-08-25'),
(6, 11, 'Hotel Dejavù', 2, '2028-02-25'),
(7, 11, 'Hotel Galate', 4, '2023-05-25'),
(8, 11, 'Hotel Galate', 4, '2023-05-25'),
(9, 11, 'Hotel Galate', 4, '2023-05-25'),
(10, 11, 'Hotel Galate', 4, '2023-05-25'),
(11, 11, 'Hotel Galate', 4, '2023-05-25'),
(12, 11, 'Hotel Galate', 4, '2023-05-25'),
(13, 11, 'Hotel Galate', 4, '2023-05-25'),
(14, 11, 'Hotel Galate', 4, '2023-05-25'),
(16, 3, 'Hotel San Vincenzo', 5, '2028-08-24');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `reg_date`) VALUES
(1, 'root', 'root', 'root@gmail.com', '$2y$10$yJ599gRcwSxYoDseX/YEYuWrzHaESE31tcs32TPb6CFWjfglGOiji', '2023-07-02 19:52:01'),
(3, 'vincenzo', 'caliendo', 'vincenzo@gmail.com', '$2y$10$2GaF/XvyStJ1lQa5Dee0Zuxg3P5RgfUO/Z3dGY14VhmFAqvb9tFDO', '2023-07-02 20:58:06'),
(11, 'Marco', 'Visone', 'marco@gmail.com', '$2y$10$WNC7sFOjD9HUJRMrCL6Ql.1pGU92gg7lyS/MLRGtkuM013RPLooUm', '2023-07-02 22:19:19'),
(16, 'stefano', 'oriolo', 'stefano@gmail.com', '$2y$10$p8ivfIsFgLJE2OwE2cAoe.olynfKPTz.DHJkVlxQxPNXW8bCPjCYq', '2023-07-12 01:13:10'),
(17, 'test', 'test', 'test@gmail.com', '$2y$10$7Fj3vKdcdckOMh48rAdC2ehqgAI2SzXoq4VqrAr2fX2rbEY9usHnG', '2023-07-12 01:24:11');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indici per le tabelle `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Limiti per la tabella `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
