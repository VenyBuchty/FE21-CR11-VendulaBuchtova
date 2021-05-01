-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 01. Mai 2021 um 12:10
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_petadoption_VendulaBuchtova`
--
CREATE DATABASE IF NOT EXISTS `cr11_petadoption_VendulaBuchtova` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_petadoption_VendulaBuchtova`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`id`, `breed`, `name`, `image`, `description`, `location`, `hobbies`, `age`, `size`) VALUES
(1, 'Dog', 'Jimmy', '608bd9ecec570.jpg', 'Very nice Staffordshire terrier, he loves to play a lot outside. Very teachable', 'Doggo World, Lerchenfelder Straße 3, 1070 WIEN', 'Give me a bone and I will have fun for 3 hours at least', 8, 'large'),
(2, 'Cat', 'Mittens', '608beb5e7cd85.jpg', 'Large Main Coon cat, he loves to cuddle. Weighs 8 kg and loves sunbathing', 'Purry Home, Troststraße 134, 1100 WIEN', 'Spend 25 hours/day sleeping', 3, 'large'),
(3, 'Dog', 'Jessie', '608beb6e20184.jpg', 'Family-frendly Border Collie, she loves to spend time outside', 'TierQuarTier, Süßenbrunner Straße 101, 1220 WIEN', 'Loves to catch frisbee', 4, 'large'),
(4, 'Dog', 'Kerry', '608beb7bec63d.jpg', 'Shepherd dog in senior age, not so active anymore but will give you his love', 'TierQuarTier, Süßenbrunner Straße 101, 1220 WIEN', 'Spending time anywhere but with his owner', 12, 'large'),
(5, 'Dog', 'Ricky', '608beb871937b.jpg', 'Lazy pug, spending whole day only laying. Maybe is he cat in soul? Who knows', 'Doggo World, Lerchenfelder Straße 3, 1070 WIEN', 'Loves to chew his red ball with jingle bell inside', 3, 'small'),
(6, 'Cat', 'Tinkerbell', '608be2053b447.jpg', 'Sweet fluffy lovely young cat with light green eyes.', 'Purry Home, Troststraße 134, 1100 WIEN', 'Like to catch anything what is moving', 1, 'small'),
(7, 'Dog', 'Pikaboo', '608be291b797d.jpg', 'Lovely small Pomeranian, she likes to bark on anything what is moving', 'TierQuarTier, Süßenbrunner Straße 101, 1220 WIEN', 'Loves to be cared in his owner\'s bag or hands', 5, 'small'),
(8, 'Dog', 'Steffy', '608be308e6f1f.jpg', 'Older boxer in brown color. Extreamly family friendly', 'TierQuarTier, Süßenbrunner Straße 101, 1220 WIEN', 'Likes to play with kids and ball', 11, 'large'),
(9, 'Dog', 'Hachiko', '608be38569969.jpg', 'Still baby but already stubborn Akita-Inu doggo. ', 'Doggo World, Lerchenfelder Straße 3, 1070 WIEN', 'Any toy which makes some noises while chewing', 1, 'small'),
(10, 'Dog', 'Caesar', '608be44c9d7b1.jpg', 'An older husky dog, he spent his whole life in a dog sled ', 'TierQuarTier, Süßenbrunner Straße 101, 1220 WIEN', 'Loves to spend some time outside at -30 Grades and play with snow', 10, 'large'),
(11, 'Cat', 'Fatima', '608be4df7aff4.jpg', ' Our oldest and also the most arrogant cat. She loves human company but not other cats.', 'Purry Home, Troststraße 134, 1100 WIEN', 'Loves to have control over the situation from the highest place in the room', 11, 'small'),
(12, 'Cat', 'Mniauk', '608be5524c7fd.jpg', 'Grey coloured British cat, he meows a lot but can also pur really loud. Love to cuddle', 'Purry Home, Troststraße 134, 1100 WIEN', 'Just beeing pet - a lot', 2, 'small');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`) VALUES
(1, 'Martin', 'Österreich', 'd0b72d6a09c6e7e3053709905655e2c43210262667af3b20466a040a4e23f2e8', '1988-04-20', 'mar@ost.at', 'user.png', 'user'),
(2, 'Jana', 'Cerna', 'd0b72d6a09c6e7e3053709905655e2c43210262667af3b20466a040a4e23f2e8', '1996-09-06', 'jan@cer.at', '608c1b3744a40.jpg', 'user'),
(3, 'Tom', 'Hardy', 'd0b72d6a09c6e7e3053709905655e2c43210262667af3b20466a040a4e23f2e8', '2002-10-22', 'tom@har.com', '608c1bcfacc45.jpg', 'user'),
(4, 'Vendula', 'Buchta', 'd0b72d6a09c6e7e3053709905655e2c43210262667af3b20466a040a4e23f2e8', '1992-02-12', 'ven@buch.com', 'user.png', 'adm');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
