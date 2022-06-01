-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 01, 2022 alle 01:57
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rchat`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggio`
--

CREATE TABLE `messaggio` (
  `ID_messaggio` int(11) NOT NULL,
  `nickName` varchar(23) DEFAULT NULL,
  `messageContent` mediumtext NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `nomeTopic` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `topic`
--

CREATE TABLE `topic` (
  `nomeTopic` varchar(23) NOT NULL,
  `password` varchar(23) NOT NULL,
  `host` varchar(23) NOT NULL,
  `nMaxUtenti` int(23) DEFAULT NULL,
  `privato` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `topic`
--

INSERT INTO `topic` (`nomeTopic`, `password`, `host`, `nMaxUtenti`, `privato`) VALUES
('provatopic1', 'password', 'hostprova', 6, b'1'),
('provatopic2', 'pippo', 'hostprova', 23, b'1'),
('provatopic3', 'pippo', 'hostprova', 8, b'1'),
('provatopic4', 'pippo', 'user1', 6, b'1');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `nickName` varchar(23) NOT NULL,
  `userPassword` varchar(23) NOT NULL,
  `statusTopic` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`nickName`, `userPassword`, `statusTopic`) VALUES
('user1', 'pippo', NULL),
('user2', 'pippo', NULL),
('user3', 'password', NULL),
('user4', 'pippo', NULL),
('user5', 'pippo', NULL),
('user6', 'pippo', NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `messaggio`
--
ALTER TABLE `messaggio`
  ADD PRIMARY KEY (`ID_messaggio`),
  ADD KEY `nickName` (`nickName`),
  ADD KEY `nomeTopic` (`nomeTopic`);

--
-- Indici per le tabelle `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`nomeTopic`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`nickName`),
  ADD KEY `statusTopic` (`statusTopic`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `messaggio`
--
ALTER TABLE `messaggio`
  MODIFY `ID_messaggio` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `messaggio`
--
ALTER TABLE `messaggio`
  ADD CONSTRAINT `messaggio_ibfk_1` FOREIGN KEY (`nickName`) REFERENCES `utente` (`nickName`),
  ADD CONSTRAINT `messaggio_ibfk_2` FOREIGN KEY (`nomeTopic`) REFERENCES `topic` (`nomeTopic`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`statusTopic`) REFERENCES `topic` (`nomeTopic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
