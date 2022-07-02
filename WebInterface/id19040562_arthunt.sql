-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost:3306
-- Χρόνος δημιουργίας: 19 Ιουν 2022 στις 18:26:04
-- Έκδοση διακομιστή: 10.5.12-MariaDB
-- Έκδοση PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `id19040562_arthunt`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `creates_team`
--

CREATE TABLE `creates_team` (
  `id_user` int(11) NOT NULL,
  `id_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `creates_team`
--

INSERT INTO `creates_team` (`id_user`, `id_team`) VALUES
(1, 1),
(2, 2),
(5, 3),
(6, 4),
(9, 5),
(7, 6),
(8, 7);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `creates_treasure_hunt`
--

CREATE TABLE `creates_treasure_hunt` (
  `id_user` int(11) NOT NULL,
  `id_thunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `creates_treasure_hunt`
--

INSERT INTO `creates_treasure_hunt` (`id_user`, `id_thunt`) VALUES
(3, 1),
(2, 2),
(5, 3),
(5, 4),
(1, 5),
(5, 6),
(5, 7),
(2, 8),
(2, 9),
(7, 10),
(7, 11),
(7, 12),
(9, 13),
(5, 14);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `has`
--

CREATE TABLE `has` (
  `id_thunt` int(11) NOT NULL,
  `id_riddle` int(11) NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `has`
--

INSERT INTO `has` (`id_thunt`, `id_riddle`, `qrcode`) VALUES
(1, 3, 'qrcodes/riddle_t1_r1.png'),
(1, 2, 'qrcodes/riddle_t1_r2.png'),
(1, 1, 'qrcodes/riddle_t1_r3.png'),
(2, 1, 'qrcodes/riddle_t2_r1.png'),
(2, 2, 'qrcodes/riddle_t2_r2.png'),
(2, 3, 'qrcodes/riddle_t2_r3.png'),
(5, 1, 'not defined'),
(5, 2, 'not defined'),
(5, 3, 'not defined'),
(7, 3, 'qrcodes/riddle_t7_r1.png'),
(2, 4, 'qrcodes/riddle_t2_r4.png'),
(9, 2, 'qrcodes/riddle_t9_r2.png'),
(9, 2, 'qrcodes/riddle_t9_r2.png'),
(9, 4, 'qrcodes/riddle_t9_r3.png'),
(10, 2, 'qrcodes/riddle_t10_r1.png'),
(10, 3, 'qrcodes/riddle_t10_r2.png'),
(11, 1, 'qrcodes/riddle_t11_r1.png'),
(11, 2, 'qrcodes/riddle_t11_r2.png'),
(11, 4, 'qrcodes/riddle_t11_r3.png'),
(12, 1, 'qrcodes/riddle_t12_r1.png'),
(12, 4, 'qrcodes/riddle_t12_r2.png'),
(12, 3, 'qrcodes/riddle_t12_r3.png'),
(13, 5, 'qrcodes/riddle_t13_r1.png'),
(13, 2, 'qrcodes/riddle_t13_r2.png'),
(13, 1, 'qrcodes/riddle_t13_r3.png'),
(14, 1, 'qrcodes/riddle_t14_r1.png'),
(14, 2, 'qrcodes/riddle_t14_r2.png');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `is_member`
--

CREATE TABLE `is_member` (
  `id_user` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `is_member`
--

INSERT INTO `is_member` (`id_user`, `id_team`, `role`) VALUES
(1, 1, 'leader'),
(2, 1, 'simplePlayer'),
(2, 2, 'leader'),
(5, 3, 'leader'),
(6, 4, 'leader'),
(9, 5, 'leader'),
(7, 6, 'leader'),
(8, 7, 'leader');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `participate`
--

CREATE TABLE `participate` (
  `id_team` int(11) NOT NULL,
  `id_thunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `participate`
--

INSERT INTO `participate` (`id_team`, `id_thunt`) VALUES
(2, 1),
(4, 7),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(2, 13),
(3, 13),
(2, 14),
(4, 14),
(6, 14),
(1, 14),
(7, 14);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `produce`
--

CREATE TABLE `produce` (
  `id_user` int(11) NOT NULL,
  `id_riddle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `produce`
--

INSERT INTO `produce` (`id_user`, `id_riddle`) VALUES
(1, 1),
(3, 2),
(3, 0),
(3, 3),
(5, 0),
(5, 4),
(1, 0),
(9, 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `riddle`
--

CREATE TABLE `riddle` (
  `id_riddle` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `location_solution` varchar(255) NOT NULL,
  `infotext` text NOT NULL,
  `points` float NOT NULL,
  `riddle_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `riddle`
--

INSERT INTO `riddle` (`id_riddle`, `text`, `location_solution`, `infotext`, `points`, `riddle_link`) VALUES
(1, 'A square named after a Cretan statesman...\r\n      ', 'Eleftheriou Venizelou Square ', 'Eleftheriou Venizelou Square (Greek: Πλατεία Ελευθερίου Βενιζέλου) is a square in the city of Heraklion in Crete, named after the Cretan statesman Eleftherios Venizelos. It dates back to the Venetian era and is more commonly known as Lions Square (Greek: Πλατεία Λεόντων) or Leonton Square (genitive).', 10, 'https://arthunt.000webhostapp.com/Solved.php?r=1'),
(2, 'A fountain with four lions with water gushing from their mouths...\r\n      ', 'Fontana Morosini', 'Everyone who has grown up in Heraklion knows that the square of the Morosini Fountain is the Lions Square. However, our municipal authorities decided to make our lives difficult by naming it Eleftheriou Venizelou Square, honouring the Cretan statesman and later Prime Minister of Greece who played a leading role in the struggle for the Union of Crete with Greece.\r\n      ', 25, 'https://arthunt.000webhostapp.com/Solved.php?r=2'),
(3, 'Celebrated on the 11 November', 'Agios Minas ', 'The first chapel of Agios Minas, the small Agios Minas as the locals call it, was built in 1735 and hosted -for the first time after the Turkish occupation- the Cretan cathedral. Agios Minas was rendered as the saint to protect the town of Heraklion during the Turkish occupation.', 20, 'https://arthunt.000webhostapp.com/Solved.php?r=3'),
(4, 'Another riddle', 'Another riddle', 'Another riddle', 6, 'https://arthunt.000webhostapp.com/Solved.php?r=4'),
(5, 'This is a sample riddle for demo purposes. Is about Agios Titos church', 'Agios Titos', 'The original church of Agios Titos on this location was probably built in 961 A.D. by the Byzantine Emperor Nicephorus Phokas, who liberated Crete from the Arabs and made it again part of the Byzantine Empire. To strengthen the Christian faith in Crete, who had weakened from the Arabs, the emperor constructed this Orthodox church and dedicated it to Agios Titos, a disciple of Apostle Paul and first Bishop of Crete.\r\n', 8, 'https://arthunt.000webhostapp.com/Solved.php?r=5');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `solve`
--

CREATE TABLE `solve` (
  `id_team` int(11) NOT NULL,
  `id_riddle` int(11) NOT NULL,
  `id_thunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `numberPlayers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `team`
--

INSERT INTO `team` (`id_team`, `name`, `numberPlayers`) VALUES
(1, 'First Team', 4),
(2, 'Annoulas Team', 6),
(3, 'First name', 4),
(4, 'Panos Team', 4),
(5, 'Demo Team', 3),
(6, 'My team', 1),
(7, 'Jojo team', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `treasure_hunt`
--

CREATE TABLE `treasure_hunt` (
  `id_thunt` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `treasure_hunt`
--

INSERT INTO `treasure_hunt` (`id_thunt`, `status`, `name`, `datetime`) VALUES
(1, 'Created', 'The first Treasure Hunt', '2022-08-07 22:30:00'),
(2, 'Created', 'Second Thunt', '2022-07-01 18:47:00'),
(3, 'Created', 'New game', '2022-06-23 19:03:00'),
(4, 'Created', 'Another game', '2022-06-27 19:05:00'),
(5, 'Created', 'this i my treasure hunt', '2022-07-01 19:08:00'),
(6, 'Created', 'thrid', '2022-06-29 19:09:00'),
(7, 'Created', 'test gksepr,gd;fgs', '2022-06-30 20:36:00'),
(8, 'Created', 'New try', '2022-07-01 16:21:00'),
(9, 'Created', 'New try', '2022-07-01 16:21:00'),
(10, 'Created', 'Nick 1', '2022-07-06 22:00:00'),
(11, 'Created', 'Nick II', '2022-06-30 23:59:00'),
(12, 'Created', 'Nick III', '2022-07-10 18:59:00'),
(13, 'Created', 'Demo Treasure Hunt', '2022-07-12 18:51:00'),
(14, 'Created', 'Demo 2', '2022-07-07 19:36:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `birth` datetime NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`id_user`, `birth`, `username`, `password`, `fullname`, `email`) VALUES
(1, '1999-07-22 00:00:00', 'kate', 'katerina', 'Katerina Gerakianaki', 'katerinagerak99@gmail.com'),
(2, '2001-04-21 00:00:00', 'Anna', 'annoula', 'Anna Annoula', 'anna@gmail.com'),
(3, '1996-06-20 00:00:00', 'Maria', 'maraki', 'Maria Maraki', 'maraki@gmail.com'),
(4, '2022-04-18 00:00:00', 'minikate', 'minikate', 'Mini Kate', 'minikate@gmail.com'),
(5, '1996-02-23 00:00:00', 'yynakar', 'test12', 'Ioanna Kartsonaki', 'joafwnn@gmail.com'),
(6, '1998-10-29 00:00:00', 'Panos', 'panos', 'Panos Pan', 'panos@gmail.com'),
(7, '1997-01-18 00:00:00', 'Nikos', 'nikolis', 'nikos', 'nikos@gmial.com'),
(8, '2000-06-21 21:12:01', 'jojo', 'testla', 'Ioanna Kartsonaki', 'yynakar.io@gmail.com'),
(9, '2000-03-21 00:00:00', 'iokar', 'test12', 'Ioanna K', 'joafwn@hotmail.com');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `riddle`
--
ALTER TABLE `riddle`
  ADD PRIMARY KEY (`id_riddle`);

--
-- Ευρετήρια για πίνακα `solve`
--
ALTER TABLE `solve`
  ADD UNIQUE KEY `id_team` (`id_team`,`id_riddle`,`id_thunt`);

--
-- Ευρετήρια για πίνακα `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Ευρετήρια για πίνακα `treasure_hunt`
--
ALTER TABLE `treasure_hunt`
  ADD PRIMARY KEY (`id_thunt`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `riddle`
--
ALTER TABLE `riddle`
  MODIFY `id_riddle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT για πίνακα `treasure_hunt`
--
ALTER TABLE `treasure_hunt`
  MODIFY `id_thunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
