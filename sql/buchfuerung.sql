-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2023 at 08:18 AM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buchfuerung`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `number`) VALUES
(1, 90),
(2, 16),
(3, 3),
(4, 13),
(5, 3),
(6, 3),
(7, 77),
(8, 66);

-- --------------------------------------------------------

--
-- Table structure for table `activa`
--

CREATE TABLE `activa` (
  `activa_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `balance_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activa`
--

INSERT INTO `activa` (`activa_id`, `number`, `value`, `balance_id`, `account_id`) VALUES
(18, 16, 9000, 1, NULL),
(20, 13, 400, 2, NULL),
(23, 16, 7000, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`balance_id`, `type`) VALUES
(1, 'start'),
(2, 'end'),
(14, 'start'),
(15, 'end'),
(16, 'start'),
(17, 'end');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `description`) VALUES
(0, 'Aufwendungen für das Ingangsetzen und Erweitern eines Betriebs'),
(1, 'Immaterielle Vermögensgegenstände'),
(2, 'Grundstücke'),
(3, 'grundstücksgleiche Rechte, einschließlich der Bauten auf fremden Grund'),
(4, 'Technische Anlagen'),
(5, 'Technische Anlagen und Maschinen'),
(6, 'Andere Anlagen, Betriebs- und Geschäftsausstattung'),
(7, 'Geleistete Anzahlungen und Anlagen in Bau'),
(8, 'Finanzanlagen'),
(9, ''),
(10, 'Bezugsverrechnung'),
(11, 'Rohstoffe'),
(12, 'Bezogene Teile'),
(13, 'Hilfstoffe, Betriebsstoffe'),
(14, 'Unfertige Erzeugnisse'),
(15, 'Fertige Erzeugnisse'),
(16, 'Waren'),
(17, 'Noch nicht abrechenbare Leistungen'),
(18, 'Geleistete Anzahlungen'),
(19, 'Wertberichtigungen'),
(20, 'Forderungen'),
(21, 'Forderungen aus Lieferungen und Leistungen'),
(22, 'Forderungen gegenüber verbundenen Unternehmen'),
(23, 'Sonstige Forderungen'),
(24, 'und Vermögensgegenstände'),
(25, 'Forderungen aus der Abgabensverrechnung'),
(26, 'Wertpapiere und Anteile'),
(27, 'Kassenbestand'),
(28, 'Schecks, Guthaben bei Kreditinstituten'),
(29, 'Rechnungsabgrenzungsposten'),
(30, 'Rückstellungen'),
(31, 'Anleihen, Verbindlichkeiten gegenüber Kreditinstituten'),
(32, 'Erhaltene Anzahlungen auf Bestellungen'),
(33, 'Verbindlichkeiten aus Lieferungen und Leistungen'),
(34, 'Verbindlichkeiten gegenüber verbundener Unternehmen'),
(35, 'Verbindlichkeiten aus Steuern'),
(36, 'Verbindlichkeiten im Rahmen der sozialen Sicherheit'),
(37, 'Übrige sonstige Verbindlichkeiten'),
(38, 'Übrige sonstige Verbindlichkeiten'),
(39, 'Rechnungsabgrenzungsposten'),
(40, 'Brutto-Umsatzerlöse'),
(41, 'Brutto-Umsatzerlöse und Erlösschmälerungen'),
(43, 'Brutto-Umsatzerlöse und Erlösschmälerungen'),
(44, 'Brutto-Umsatzerlöse und Erlösschmälerungen'),
(45, 'Bestandsveränderungen und aktivierte Eigenleistungen'),
(46, 'Sonstige betriebliche Ertäge'),
(47, 'Sonstige betriebliche Ertäge'),
(48, 'Sonstige betriebliche Ertäge'),
(49, 'Sonstige betriebliche Ertäge'),
(50, 'Wareneinsatz'),
(51, 'Verbrauch von Rohstoffen'),
(52, 'Verbrauch von bezogenen Fertig- und Einzelteilen'),
(53, 'Verbrauch von Hilfestoffen'),
(54, 'Verbrauch von Betriebsstoffen'),
(55, 'Verbrauch von Werkzeugen und anderen Erzeugungshilfsmitteln'),
(56, 'Verbrauch von Brenn- und Treibstoffen, Energie und Wasser'),
(57, 'Sonstige bezogene Herstellungsleistungen'),
(58, 'Skontoerträge auf Materialaufwand sowie auf sonstige bezogene Leistungen'),
(59, 'Aufwandsstellenrechnung'),
(60, 'Löhne'),
(61, 'Löhne'),
(62, 'Gehälter'),
(63, 'Gehälter'),
(64, 'Aufwendungen für Abfertigungen, Aufwendungen für Altersversorgung'),
(65, 'Gesetzlicher Sozialaufwand Arbeiter und Angestellte'),
(66, 'Lohn- und gehaltsabhängige Abgaben und Pflichtbeiträge'),
(67, 'Sonstige Sozialaufwendungen'),
(68, 'Sonstige Sozialaufwendungen'),
(69, 'Aufwandstellenrechnung'),
(70, 'Abschreibungen'),
(71, 'Sonstige Steuern'),
(72, 'Instandhaltung und Reinigung durch Dritte, Entsorgung, Beleuchtung'),
(73, 'Transport-, Reise- und Fahrtaufwand, Nachrichtenaufwand'),
(74, 'Miet-, Pracht-, Leasing- und Lizenzaufwand'),
(75, 'Aufwendungen für beigestelltes Personal, Provisionen an Dritte, Aufsichtsratsvergütungen'),
(76, 'Büro-, Werbe- und Repräsentationsaufwand'),
(77, 'Versicherungen'),
(78, 'Übrige Aufwendungen'),
(79, 'Konten für das Umsatzkostenverfahren'),
(80, 'Finanzerträge'),
(81, 'Finanzerträge und Finanzaufwendungen'),
(82, 'Finanzerträge und Finanzaufwendungen'),
(83, 'Finanzerträge und Finanzaufwendungen'),
(84, 'Außerordentliche Erträge und außerordentliche Aufwendungen'),
(85, 'Steuern vom Einkommen und Ertrag'),
(86, 'Rücklagenbewegung'),
(87, 'Ergebnisüberrechnung'),
(88, ''),
(89, ''),
(90, 'Gezeichnetes bzw gewidmetes Kapital, nicht eingeforderte austehende Einlagen'),
(91, 'Gezeichnetes bzw gewidmetes Kapital, nicht eingeforderte austehende Einlagen'),
(92, 'Kapitalrücklagen'),
(93, 'Gewinnrücklagen, Bilanzgewinn, Bilanzverlust'),
(94, 'Bewertungsreserven und sonstige unversteuerte Rücklagen'),
(95, 'Bewertungsreserven und sonstige unversteuerte Rücklagen'),
(96, 'Privat- und Verrechnungskonten bei Einzelunternehmen und Personengesellschaften'),
(97, 'Einlagen Stiller Gesellschafter'),
(98, 'Eröffnungsbilanz, Schlussbilanz, Gewinn- und Verlustrechnung'),
(99, 'Evidenzkonten');

-- --------------------------------------------------------

--
-- Table structure for table `passiva`
--

CREATE TABLE `passiva` (
  `passiva_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `balance_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passiva`
--

INSERT INTO `passiva` (`passiva_id`, `number`, `value`, `balance_id`, `account_id`) VALUES
(13, 91, 90000, 1, NULL),
(15, 98, 90000, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `user_year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `user_year_id`) VALUES
(1, 'leon', '1234', NULL),
(2, 'john', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_years`
--

CREATE TABLE `user_years` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_years`
--

INSERT INTO `user_years` (`id`, `user_id`, `year_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `year_id` int(11) NOT NULL,
  `year` date DEFAULT NULL,
  `start_balance` int(11) DEFAULT NULL,
  `end_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`year_id`, `year`, `start_balance`, `end_balance`) VALUES
(1, '2021-01-01', 1, 2),
(2, '2022-01-01', NULL, NULL),
(3, '2022-01-01', NULL, NULL),
(4, '2023-05-01', 14, 15),
(5, '2023-05-01', 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `years_accounts`
--

CREATE TABLE `years_accounts` (
  `years_accounts_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years_accounts`
--

INSERT INTO `years_accounts` (`years_accounts_id`, `account_id`, `year_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 6, 1),
(4, 7, 1),
(5, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `activa`
--
ALTER TABLE `activa`
  ADD PRIMARY KEY (`activa_id`),
  ADD KEY `number` (`number`),
  ADD KEY `balance_id` (`balance_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `passiva`
--
ALTER TABLE `passiva`
  ADD PRIMARY KEY (`passiva_id`),
  ADD KEY `number` (`number`),
  ADD KEY `balance_id` (`balance_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `year_id` (`user_year_id`);

--
-- Indexes for table `user_years`
--
ALTER TABLE `user_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`year_id`),
  ADD KEY `start_balance` (`start_balance`),
  ADD KEY `end_balance` (`end_balance`);

--
-- Indexes for table `years_accounts`
--
ALTER TABLE `years_accounts`
  ADD PRIMARY KEY (`years_accounts_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `year_id` (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `activa`
--
ALTER TABLE `activa`
  MODIFY `activa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `passiva`
--
ALTER TABLE `passiva`
  MODIFY `passiva_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_years`
--
ALTER TABLE `user_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `years_accounts`
--
ALTER TABLE `years_accounts`
  MODIFY `years_accounts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activa`
--
ALTER TABLE `activa`
  ADD CONSTRAINT `activa_ibfk_1` FOREIGN KEY (`number`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `activa_ibfk_2` FOREIGN KEY (`balance_id`) REFERENCES `balance` (`balance_id`),
  ADD CONSTRAINT `activa_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE;

--
-- Constraints for table `passiva`
--
ALTER TABLE `passiva`
  ADD CONSTRAINT `passiva_ibfk_1` FOREIGN KEY (`number`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `passiva_ibfk_2` FOREIGN KEY (`balance_id`) REFERENCES `balance` (`balance_id`),
  ADD CONSTRAINT `passiva_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_years`
--
ALTER TABLE `user_years`
  ADD CONSTRAINT `user_years_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_years_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `years` (`year_id`);

--
-- Constraints for table `years`
--
ALTER TABLE `years`
  ADD CONSTRAINT `years_ibfk_1` FOREIGN KEY (`start_balance`) REFERENCES `balance` (`balance_id`),
  ADD CONSTRAINT `years_ibfk_2` FOREIGN KEY (`end_balance`) REFERENCES `balance` (`balance_id`);

--
-- Constraints for table `years_accounts`
--
ALTER TABLE `years_accounts`
  ADD CONSTRAINT `years_accounts_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `years_accounts_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `years` (`year_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
