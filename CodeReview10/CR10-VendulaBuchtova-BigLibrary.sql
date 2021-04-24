-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 24. Apr 2021 um 11:27
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
-- Datenbank: `CR10-VendulaBuchtova-BigLibrary`
--
CREATE DATABASE IF NOT EXISTS `CR10-VendulaBuchtova-BigLibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `CR10-VendulaBuchtova-BigLibrary`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Media`
--

CREATE TABLE `Media` (
  `ISBN_code` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `author_first_name` varchar(255) NOT NULL,
  `author_last_name` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `publisher_address` varchar(255) NOT NULL,
  `publisher_size` varchar(255) NOT NULL,
  `availability` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Media`
--

INSERT INTO `Media` (`ISBN_code`, `title`, `image`, `short_description`, `media_type`, `author_first_name`, `author_last_name`, `publish_date`, `publisher_name`, `publisher_address`, `publisher_size`, `availability`) VALUES
(1354100, 'Dept of Speculation', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/19b98ea12fd3/sub-buzz-3442-1576199068-11.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'The New York Times book review', 'Book', 'Jenny', 'Offill', '2014-01-10', 'Schmilos', '353 Scoville Park, New York', 'big', 'available'),
(1635578, 'Tenet', 'https://static.kino.de/wp-content/uploads/2019/05/Tenet-Poster-2020-1.jpg', 'With only one word to past and future', 'DVD', 'Christopher', 'Nolan', '2013-01-07', 'Hara-Boyer', '4061 Cambridge Street, London', 'small', 'reserved'),
(1680456, 'Conversations With Friends', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/394e3f399441/sub-buzz-3400-1576199161-2.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'How often smart young people can over-intellectualize themselves', 'Book', 'Sally', 'Rooney', '2011-01-30', 'Pollich LLC', '56846 Stephen Way, Prague', 'medium', 'available'),
(1820594, 'Hellboy', 'https://media.pitchfork.com/photos/5d728a08fd34990009cf8999/master/w_1280%2Cc_limit/Lil-Peep-Hellboy.jpg', 'The mixtape is focused on pain and how he hoped his might dissipate', 'CD', 'Lil', 'Peep', '2015-08-16', 'Kuphal', '81118 Stephen Place, Las Vegas', 'big', 'available'),
(2219437, 'The Argonauts', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/17cfd2c826d6/sub-buzz-3434-1576199086-7.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'Strange book which moves and shapes you completely', 'Book', 'Maggie', 'Nelson', '2019-07-09', 'Barton', '924 Manley Drive, Stockholm', 'small', 'reserved'),
(2319843, 'Bill & Ted Face the Music', 'https://m.media-amazon.com/images/M/MV5BOTRiNzFhNjAtNTdhMS00ZjViLWFhNTUtMWJlMTJkMGM1YzM4XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'American science fiction comedy film', 'DVD', 'Dean', 'Parisot', '2013-06-07', 'Ryanos', '78 Union Street, Paris', 'medium', 'available'),
(2374323, 'Lala Belu', 'https://media.pitchfork.com/photos/5d728ea02073fe00084eb105/master/w_1280%2Cc_limit/Hailu-Mergia.jpg', 'Reissues of obscure albums ran rampant this decade', 'CD', 'Hailu', 'Mergia', '2014-10-04', 'Kutch', '3149 Steensland Court, Vienna', 'big', 'available'),
(2707796, 'The Warmth Of Other Suns', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/48a544e91a96/sub-buzz-3426-1576198920-1.jpg?downsize=700%3A%2A&output-quality=auto&output-format=auto', 'The epic story of great migration', 'Book', 'Isabel', 'Wilkerson', '2018-07-21', 'Koepp', '2 Sutteridge Trail, Los Angeles', 'small', 'reserved'),
(4153013, 'Freshwater', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/c9fa35b7d9ce/sub-buzz-3488-1576199141-1.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'About moody young girl who contains ogbanje', 'Book', 'Akwaeke', 'Emezi', '2012-05-20', 'Dach Group', '25087 Brentwood Parkway, Paris', 'small', 'reserved'),
(4381943, 'All American Made', 'https://media.pitchfork.com/photos/5d72a75153e80c0008f43715/master/w_1280%2Cc_limit/Margo-Price-All-American-Made.jpg', 'Income disparity blues in flourishes of accordion ', 'CD', 'Margo', 'Price', '2014-03-25', 'Kiehn', '4 Roth Road, Istanbul', 'bigL', 'available'),
(4404720, 'Annihilation', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/12/22/asset/2a8276b0e0ca/sub-buzz-3324-1576188911-2.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'Book 1 of the southern reach trilogy', 'Book', 'Jeff', 'Vandermeer', '2013-02-25', 'Moen-Effertz', '1117 Clemons Lane, New York', 'big', 'available'),
(4942255, 'Fishermans Friends', 'https://m.media-amazon.com/images/M/MV5BNDljZmIxOWQtYmFiZS00ODE4LTg1ODgtMmFlOTlkOTZmMTdiXkEyXkFqcGdeQXVyMjkyNzYwMw@@._V1_.jpg', 'British romantic comedy film', 'DVD', 'Chris', 'Foggin', '2019-10-29', 'Stanton Inc', '28 Eagle Crest Hill, Paris', 'big', 'available'),
(5333453, 'Soul', 'https://www.kino-zeit.de/sites/default/files/2020-10/Soul_Plakat_3.jpg', 'American computer-animated fantasy comedy-drama film', 'DVD', 'Pete', 'Docter', '2013-08-15', 'Hessel LLC', '351 Morning Place, Chicago', 'medium', 'available'),
(5349394, 'Genre-Specific Xperience', 'https://media.pitchfork.com/photos/5d727c772073fe00084eb0fa/master/w_1280%2Cc_limit/Fatima-Al-Qadiri-Genre-Specific-Xperience.jpg', 'Few documents of global music this decade', 'CD', 'Fatima', 'Al Quadiri', '2014-07-19', 'Huel Inc', '839 Waxwing Point, London', 'big', 'available'),
(5377744, 'Far From The Tree', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/17/asset/aa5f9cea2a5e/sub-buzz-4381-1576256489-3.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'Parents, children, and the search for identity', 'Book', 'Andrew', 'Solomon', '2015-08-19', 'Bashirian Group', '60295 Service Trail, Madrid', 'big', 'available'),
(5427423, 'One of Us', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/27483a10eda9/sub-buzz-3469-1576199123-1.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'The story of a massacre in Norway', 'Book', 'Asne', 'Seierstad', '2013-07-21', 'Wuckert LLC', '560 Buell Drive, Oslo', 'big', 'available'),
(5653326, 'Station Eleven', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/eec966409719/sub-buzz-3409-1576199050-1.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'Life before the flu pandemic and life afterward', 'Book', 'Emily', 'John-Mandel', '2018-12-27', 'Tremblay', '83351 Superior Avenue, London', 'small', 'reserved'),
(5903057, 'My Year of Rest and Relaxation', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/ff1bd9b08763/sub-buzz-3476-1576199155-16.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'A novel by the author of Eileen', 'Book', 'Ottessa', 'Moshfegh', '2017-08-25', 'Harber Inc', '1758 Del Mar Circle, Hamburg', 'medium', 'reserved'),
(7387567, 'Building Stories', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/566d5b4e883e/sub-buzz-3457-1576199480-1.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'Book filled with pamphlets and hardcovers', 'Book', 'Chris', 'Ware', '2017-04-09', 'Lowe and Sons', '2nd Plaza, New York', 'small', 'reserved'),
(7470887, 'Life With Dog', 'https://m.media-amazon.com/images/M/MV5BNzU4MDRiNDctZDQyMS00NzcyLWE3ZjAtYWU4NDQ3ZjNmOTY3XkEyXkFqcGdeQXVyMjY2NDc0OTQ@._V1_.jpg', 'Joe begins a fast descent into the dark abyss of uncertainty', 'DVD', 'Corbin', 'Bernsen', '2019-01-21', 'VonRueden', '10 Jenna Terrace, Milano', 'big', 'available'),
(7704492, 'A Little Life', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/17cfd2c826d6/sub-buzz-3429-1576199101-2.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'Novel broke in the most beautiful way', 'Book', 'Hanya', 'Yanagihara', '2015-10-20', 'Aufderhar', '61037 Fairfield Trail, Manchester', 'big', 'reserved'),
(8386985, 'Less', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-12/13/1/asset/ff1bd9b08763/sub-buzz-3480-1576199132-6.jpg?downsize=800:*&output-format=auto&output-quality=auto', 'Arthur is running away from his much younger ex’s wedding', 'Book', 'Sean', 'Greer', '2014-09-30', 'Graham', '4300 Nova Hill, Berlin', 'small', 'available'),
(8426515, 'The Monitor', 'https://media.pitchfork.com/photos/5d7289062073fe00084eb0ff/master/w_1280%2Cc_limit/Titus-Andronicus-The-Monitor.jpg', 'Throw together the Civil War', 'CD', 'Titus', 'Andronicus', '2021-01-06', 'Kozey LLC', '898 Rockefeller Trail, Washington', 'medium', 'available'),
(8552267, 'The Weight of These Wings', 'https://media.pitchfork.com/photos/5d728c582073fe00084eb103/master/w_1280%2Cc_limit/Miranda-Lambert-Weight-of-These-Wings.jpg', 'Miranda Lambert was a country superstar with a string of radio hits', 'CD', 'Miranda', 'Lambert', '2014-06-12', 'Dickens LLC', '9034 South Alley, Vienna', 'medium', 'reserved'),
(9066613, 'Joker', 'https://images-na.ssl-images-amazon.com/images/I/81YdUDaMiWL._SL1500_.jpg', 'Arthur Fleck is disregarded and mistreated by society', 'DVD', 'Todd', 'Phillips', '2017-10-18', 'Brown LLC', '9678 Acker Point, New Mexico', 'small', 'available');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Media`
--
ALTER TABLE `Media`
  ADD PRIMARY KEY (`ISBN_code`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Media`
--
ALTER TABLE `Media`
  MODIFY `ISBN_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9066636;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
