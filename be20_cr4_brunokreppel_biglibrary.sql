-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Nov 2023 um 13:18
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be20_cr4_brunokreppel_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isbn_code` varchar(13) NOT NULL,
  `short_description` text DEFAULT NULL,
  `type` enum('book','CD','DVD') NOT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `publisher_address` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`id`, `title`, `image`, `isbn_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(1, 'The Great Gatsby', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQkSGm9Ky-17e9HcG016uEisw5jtnq-B-mRKqsByXCB5bAKIOS_', '979-3-16-1484', 'A novel about the American Dream', 'book', 'F. Scott', 'Fitzgerald', 'Scribner', '123 Main St, New York', '1925-04-10', 'reserved'),
(2, 'The Catcher in the Rye', 'https://m.media-amazon.com/images/I/515o+3oBm0L._SY445_SX342_.jpg', '978-0-316-769', 'A classic coming-of-age novel', 'book', 'J.D.', 'Salinger', 'Little, Brown and Company', '456 Broadway, Boston', '1951-07-16', 'available '),
(3, 'The Dark Side of the Moon', 'https://images.thalia.media/00/-/d1638ffdbe14410d828fa18b306b2c24/die-dunkle-seite-des-mondes-taschenbuch-martin-suter.jpeg', '978-0-631-042', 'Progressive rock masterpiece', 'CD', 'Pink', 'Floyd', 'EMI', '789 Music Lane, London', '1973-03-01', 'reserved'),
(4, 'Inception', 'https://image.film.at/images/original/2966421/img.jpg', '978-1-4029-08', 'Mind-bending sci-fi thriller', 'DVD', 'Christopher', 'Nolan', 'Warner Bros.', '555 Film Blvd, Los Angeles', '2010-07-16', 'available '),
(5, 'To Kill a Mockingbird', 'https://images.thalia.media/00/-/adeacabd7ccc4161b091234c02509396/to-kill-a-mockingbird-taschenbuch-harper-lee-englisch.jpeg', '978-0-06-1120', 'A novel addressing racial injustice', 'book', 'Harper', 'Lee', 'J.B. Lippincott & Co.', '789 Library Lane, Philadelphia', '1960-07-11', 'reserved'),
(6, 'Abbey Road', 'https://m.media-amazon.com/images/I/81sBKBIcwvL._UF894,1000_QL80_.jpg', '978-1-62634-9', 'Iconic Beatles album  wow cool.', 'CD', 'The', 'Beatles', 'Apple Records', '876 Abbey Road, London', '1969-09-26', 'reserved'),
(7, 'The Shawshank Redemption', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5wzXEvc7tAxOBGK5uMOgDN_LC4NsKVz2oU0lcLRO4tHE14oTq', '978-0-79-0779', 'Classic prison drama film. Very nice.', 'DVD', 'Frank', 'Darabont', 'Columbia Pictures', '321 Film Street, Hollywood', '1994-09-10', 'available '),
(8, '1984', 'https://m.media-amazon.com/images/I/31EPb8dAFOL._SY445_SX342_.jpg', '978-0-452-284', 'Dystopian novel by George Orwell', 'book', 'George', 'Orwell', 'Secker & Warburg', '456 Surveillance Lane, London', '1949-06-08', 'reserved'),
(9, 'The Godfather', 'https://upload.wikimedia.org/wikipedia/en/1/1c/Godfather_ver1.jpg', '978-0-399-503', 'Epic crime novel by Mario Puzo', 'book', 'Mario', 'Puzo', 'G.P. Putnam\'s Sons', '123 Mafia Street, New York', '1969-03-10', 'available '),
(19, 'The Hunger Games', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/39/The_Hunger_Games_cover.jpg/220px-The_Hunger_Games_cover.jpg', '979-3-16-1483', 'An Absolute Classic', 'book', 'Suzanne', 'Collins', 'Scholastic', 'America', '2014-09-24', NULL),
(22, 'Big Swiss', 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781982153083/big-swiss-9781982153083_lg.jpg', '979-3-16-1486', 'I have no Idea', 'book', 'Jen', ' Beagin', 'Scribner', 'Whatever.street', '1977-05-18', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
