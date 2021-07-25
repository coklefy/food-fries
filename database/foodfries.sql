-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 19, 2019 alle 18:07
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfries`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`name`, `surname`, `email`, `password`) VALUES
('test', 'user', 'test@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE `notifica` (
  `id_notifica` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  `id_cliente` varchar(255) NOT NULL,
  `id_ristorante` int(5) NOT NULL,
  `testo` varchar(255) NOT NULL,
  `stato` int(11) NOT NULL,
  `orario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id_ordine` int(11) NOT NULL,
  `id_cliente` varchar(255) NOT NULL,
  `id_pietanza` int(11) NOT NULL,
  `id_ristorante` int(5) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `quantita` int(11) NOT NULL,
  `prezzo` decimal(15,2) NOT NULL,
  `via` varchar(255) NOT NULL,
  `civico` int(11) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `pietanza`
--

CREATE TABLE `pietanza` (
  `id_pietanza` int(11) NOT NULL,
  `id_ristorante` int(5) NOT NULL,
  `nome_pietanza` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `prezzo` decimal(15,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pietanza`
--

INSERT INTO `pietanza` (`id_pietanza`, `id_ristorante`, `nome_pietanza`, `descrizione`, `prezzo`, `image`) VALUES
(1, 12345, 'bigmac', 'bigmac ', '2.00', 'bigmac_2018_small.png'),
(2, 12345, 'tendercrisp', 'american tendercrisp', '3.00', '640x340_american_tendercrisp_02.png'),
(3, 12345, 'hamburger', 'hamburger ', '1.00', '640x340_hamburger_2.png'),
(4, 12345, 'whopper', 'whopper ', '3.00', 'angrywhopper_prod.png'),
(5, 12345, 'cheesburger', 'cheesburger', '1.00', 'cheeseburger_prod.png'),
(6, 12345, 'double cheese', 'double ', '2.00', 'doublecheesebaconxxl_prod.png'),
(7, 21345, 'woopper', 'woopper ', '1.00', 'doublewhopper_prod.png'),
(8, 21345, 'coca', 'coca cola ', '2.00', 'coca.png'),
(9, 21345, 'cheese', 'cheese bacon ', '3.00', 'doublecheesebaconxxl_prod.png'),
(10, 21345, 'royal', 'royal', '4.00', 'chicken_royal_cheesebacon.png'),
(11, 21345, 'american ', 'american', '8.00', '640x340_american_tendercrisp_02.png'),
(12, 21345, 'cheesburger', 'cheeseeburger ', '3.00', 'cheeseburger_prod.png'),
(13, 23456, 'pollo Croc', 'pollo croccante', '16.00', 'menu-buckets.jpg'),
(14, 23456, 'bucket', 'menu bucket', '14.00', 'KFC_eComm_thumb_eComm_PopcornChicken_0.jpg'),
(15, 23456, 'thumb', 'thumb ', '10.00', 'KFC_eComm_thumb_eComm_MenuZinger.jpg'),
(16, 23456, 'gnammy', 'gnammy ', '8.00', '01_gnammy-bollo.jpg'),
(17, 23456, 'naswhile', 'naswhile chicken ', '9.00', 'kfc-nashville-hot-chicken.jpg'),
(18, 23456, 'cesto', 'cesto', '5.00', 'pop-star-box.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `ristorante`
--

CREATE TABLE `ristorante` (
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `civico` int(11) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `piva` int(5) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ristorante`
--

INSERT INTO `ristorante` (`email`, `nome`, `indirizzo`, `civico`, `telefono`, `piva`, `password`, `image`) VALUES
('mc@donald.com', 'MC Donalds', 'via Donald', 32, '0543365589', 12345, '12345', 'mcdonalds_PNG9.png'),
('king@gmail.com', 'Burger King', 'via king', 32, '0543458976', 21345, '12345', 'burgerking.jpg'),
('kfc@gmail.com', 'KFC', 'via kfc', 10, '054334556', 23456, '12345', 'kfc.jpg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`email`);

--
-- Indici per le tabelle `notifica`
--
ALTER TABLE `notifica`
  ADD PRIMARY KEY (`id_notifica`),
  ADD KEY `id_ordine` (`id_ordine`),
  ADD KEY `id_ristorante` (`id_ristorante`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id_ordine`,`id_pietanza`),
  ADD KEY `id_pietanza` (`id_pietanza`),
  ADD KEY `id_ristorante` (`id_ristorante`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `pietanza`
--
ALTER TABLE `pietanza`
  ADD PRIMARY KEY (`id_pietanza`),
  ADD KEY `id_ristorante` (`id_ristorante`);

--
-- Indici per le tabelle `ristorante`
--
ALTER TABLE `ristorante`
  ADD PRIMARY KEY (`piva`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `notifica`
--
ALTER TABLE `notifica`
  MODIFY `id_notifica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `pietanza`
--
ALTER TABLE `pietanza`
  MODIFY `id_pietanza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `notifica`
--
ALTER TABLE `notifica`
  ADD CONSTRAINT `notifica_ibfk_1` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id_ordine`),
  ADD CONSTRAINT `notifica_ibfk_2` FOREIGN KEY (`id_ristorante`) REFERENCES `ristorante` (`piva`),
  ADD CONSTRAINT `notifica_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`email`);

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`id_pietanza`) REFERENCES `pietanza` (`id_pietanza`),
  ADD CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`id_ristorante`) REFERENCES `ristorante` (`piva`),
  ADD CONSTRAINT `ordine_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`email`);

--
-- Limiti per la tabella `pietanza`
--
ALTER TABLE `pietanza`
  ADD CONSTRAINT `pietanza_ibfk_1` FOREIGN KEY (`id_ristorante`) REFERENCES `ristorante` (`piva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
