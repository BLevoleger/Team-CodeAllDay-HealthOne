-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 apr 2022 om 21:53
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `image`) VALUES
(1, 'Roeitrainer', '', 'roeitrainer.jpg'),
(2, 'Crosstrainer', '', 'crosstrainer.jpg'),
(3, 'Hometrainer', '', 'hometrainer.jpg'),
(4, 'Loopband', '', 'loopband.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `days`
--

INSERT INTO `days` (`id`, `name`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hours`
--

CREATE TABLE `hours` (
  `id` int(11) NOT NULL,
  `hour` varchar(255) NOT NULL,
  `dayId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `hours`
--

INSERT INTO `hours` (`id`, `hour`, `dayId`) VALUES
(1, 'Closed', 1),
(2, '9:00-22.00', 2),
(3, '09:00-22:00', 3),
(4, '09:00-22:00', 4),
(5, '09:00-22:00', 5),
(6, '09:00-23:30', 6),
(7, '14:00-23:30', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `picture`, `description`, `category_id`) VALUES
(1, 'NordicTrack RX800 Ergometer Roeitrainer', '/img/categories/roeitrainer/roeitrainer.jpg', 'Een nieuwe kijk op een old-school oefening. De NordicTrack RX800 Ergometer Roeitrainer geeft je een efficiënte manier om te fitnessen, waarbij je zowel je bovenlichaam als je onderlichaam aan het werk zet. Volg je energie verbruik op de wattage meter.', 1),
(2, 'roeitrainer - Sportstech RSX400', '/img/categories/roeitrainer/roeitrainer1.jpg', 'Het RSX400-roeitoestel is ongeëvenaard in zijn prijsklasse met zijn functionaliteit. Met app-functie en compatibiliteit met een hartslagmeter met borstband biedt de hometrainer verschillende trainingsopties voor een complete roeitraining.', 1),
(3, 'CAPITAL SPORTS Stream M1 Roeitrainer ', '/img/categories/roeitrainer/roeitrainer2.jpg', 'Train je het hele lichaam! Met de Capital SportsStream M1 roeimachine train je het hele lichaam efficiënt en zonder je gewrichten te overbelasten. Geschikt voor sporters tot 2 m lang en 150 kg in gewicht. De ideale manier om in conditie te blijven.', 1),
(4, 'Virtufit iConsole CTR 2.1 Crosstrainer', '/img/categories/crosstrainer/crosstrainer.jpg', 'Haal de beste prestaties uit jezelf met een fitnessapparaat dat vertrouwd en gemakkelijk te gebruiken is. Bijvoorbeeld met de VirtuFit iConsole CTR 2.1 Ergometer Crosstrainer. De crosstrainer bestaat uit materialen van de hoogste kwaliteit.', 2),
(5, 'Focus Fitness Fox 3 ', '/img/categories/crosstrainer/crosstrainer1.jpg', 'De Focus Fitness Fox 3 is de ideale crosstrainer voor de thuissporter. De Fox 3 is niet alleen stabiel en sterk maar ook nog eens geruisloos. De crosstrainer is zo ontworpen dat de voetpedalen in drie standen te verstellen zijn.', 2),
(6, 'Crosstrainer - VirtuFit CTR 1.1 ', '/img/categories/crosstrainer/crosstrainer2.jpg', 'De VirtuFit CTR 1.1 Crosstrainer gebruik je om in conditie te blijven in je eigen huis. Deze plaatsbesparende crosstrainer past ook gemakkelijk in minder grote woningen. Je gebruikt de wielen om hem gemakkelijk te verplaatsen en aan de kant te zetten na het trainen.', 2),
(7, 'Tunturi Cardio Fit B30 Hometrainer', '/img/categories/hometrainer/hometrainer.jpg', 'Blijf in beweging met deze hometrainer. De Tunturi Cardio Fit B30 is een instapmodel fitness fiets op maat van de beginnende of casual gebruiker. Thuis, in de sportschool of het revalidatiecentrum: met deze fiets train je met een lichte tot matige intensiteit.', 3),
(8, 'VirtuFit HTR 1.0 hometrainer ', '/img/categories/hometrainer/hometrainer1.jpg', 'De VirtuFit HTR 1.0 Hometrainer voelt net aan alsof je op je eigen fiets zit. De 8 kg roterende massa is een realistische benadering van een echte fiets. De vorm van het zadel, de omwenteling van de trappers en de zithouding zijn dan ook goed afgekeken.', 3),
(9, 'Tunturi Cardio Fit B35 Hometrainer', '/img/categories/hometrainer/hometrainer2.jpg', 'Wil je plezierig, effectief en veilig aan je conditie werken? Maak dan van de Cardio Fit B35 je vaste trainingspartner. Dit is de juiste fitness fiets om in conditie te blijven en ergonomisch te trainen. Kortom, de ideale hometrainer voor thuis.', 3),
(10, 'RS Sports Loopband Run 5', '/img/categories/loopband/loopband.jpg', 'Een zeer complete en compacte loopband van RS Sports de RUN 5. Vanuit huis je conditie op niveau houden of verbeteren, dat kan nu zeer gemakkelijk met de RS Sports RUN 5 loopband. Deze loopband is geschikt voor de beginnende loper.', 4),
(11, 'Loopband Focus Fitness Jet 2', '/img/categories/loopband/loopband1.jpg', 'De Focus Fitness Jet 2 is de ideale loopband voor de thuissporter. Deze compacte loopband beschikt over verschillende voorgeprogrammeerde programma\'s, heeft een stille motor en is handmatig verstelbaar in twee verschillende hoogtes.', 4),
(12, 'RS Sports Run Loopbanden 10\r\n', '/img/categories/loopband/loopband2.jpg', 'De Loopband RS Sports Run 10 is een zeer complete loopband voor gemiddeld gebruik. Denk hierbij aan 2 tot 3 keer per week lopen of rennen op je loopband, Met een elektrische motor met een piekvermogen 3 PK en een continu vermogen van 1,8 PK.', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `review`
--

INSERT INTO `review` (`id`, `description`, `stars`, `time`, `product_id`, `user_id`) VALUES
(2, 'goed', 3, '2021-12-11 09:53:13', 5, 11),
(8, 'Goed werkend apparaat!', 4, '2021-12-13 21:03:45', 5, 11);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `PfPic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) DEFAULT NULL,
  `memberSince` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `PfPic`, `email`, `password`, `role`, `memberSince`) VALUES
(11, 'BeauLev', '/img/uploads/bf542a0439b4cb4a88ea5d7ae27e2b68.jpg', 'blevoleger@gmail.com', '123qwe', 2, '2021-12-07 13:44:53'),
(12, 'John', '', 'johndoe@gmail.com', 'Doe', NULL, '2021-12-08 16:33:53'),
(13, 'Ampie04', '', 'amberschipper452@gmail.com', '12', NULL, '2021-12-11 10:00:53');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dayId` (`dayId`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexen voor tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `hours`
--
ALTER TABLE `hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `hours`
--
ALTER TABLE `hours`
  ADD CONSTRAINT `hours_ibfk_1` FOREIGN KEY (`dayId`) REFERENCES `days` (`id`);

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Beperkingen voor tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
