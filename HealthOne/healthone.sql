-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 okt 2019 om 00:00
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Tabelstructuur voor tabel `arts`
--

CREATE TABLE `arts` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `specialisatie` varchar(45) DEFAULT NULL,
  `adres` varchar(255) NOT NULL,
  `telefoon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `arts`
--

INSERT INTO `arts` (`id`, `naam`, `specialisatie`, `adres`, `telefoon`) VALUES
(4, 'Artemas Genney', 'Quisque erat eros, viverra eget, congue eget,', '73195 Lukken Center', '534543'),
(5, 'Kipp Jenkerson', 'Cum sociis natoque penatibus et magnis dis pa', '6511 Hallows Lane', '5345432'),
(6, 'Lilah Craiker', 'Maecenas ut massa quis augue luctus tincidunt', '56 Farragut Place', '12321'),
(7, 'Elane Gresty', 'Nulla ut erat id mauris vulputate elementum. ', '9119 Ridge Oak Crossing', '543543'),
(8, 'Thayne Sertin', 'Vestibulum rutrum rutrum neque. Aenean auctor', '57 Hintze Terrace', '2353661'),
(9, 'Boyd Milligan', 'Nulla ut erat id mauris vulputate elementum. ', '78 Rieder Avenue', '2131534'),
(10, 'Raynell Speaks', 'Lorem ipsum dolor sit amet, consectetuer adip', '09675 Onsgard Circle', ''),
(11, 'Edgard Giannazzi', 'In blandit ultrices enim. Lorem ipsum dolor s', '8556 Declaration Circle', ''),
(12, 'Katie Mawne', 'Nullam molestie nibh in lectus. Pellentesque ', '76 Superior Drive', ''),
(13, 'Yehudi Tomanek', 'Mauris lacinia sapien quis libero. Nullam sit', '27 Mayer Alley', ''),
(14, 'Fredra Baitman', 'Nullam varius. Nulla facilisi.', '9684 Red Cloud Plaza', ''),
(15, 'Roze Gleeton', 'Proin eu mi. Nulla ac enim.', '4 Spenser Parkway', ''),
(16, 'Tamra Arnaudin', 'Ut tellus. Nulla ut erat id mauris vulputate ', '40 Jana Court', ''),
(17, 'Helyn Willerstone', 'Aenean auctor gravida sem. Praesent id massa ', '42849 Pepper Wood Parkway', ''),
(18, 'Thibaut Woodger', 'Quisque ut erat. Curabitur gravida nisi at ni', '9339 Dahle Junction', ''),
(19, 'Svend Blazdell', 'Praesent lectus. Vestibulum quam sapien, vari', '6234 Cordelia Way', ''),
(20, 'Dewitt Kop', 'Aliquam quis turpis eget elit sodales sceleri', '195 Brown Parkway', ''),
(21, 'Rozanne Smeed', 'Aliquam augue quam, sollicitudin vitae, conse', '64148 Westridge Road', ''),
(22, 'Yancy Chinge', 'Nulla tempus. Vivamus in felis eu sapien curs', '341 Prairie Rose Alley', ''),
(23, 'Asa Axtens', 'Morbi sem mauris, laoreet ut, rhoncus aliquet', '3 Maple Wood Point', ''),
(24, 'Christin Peacher', 'Suspendisse accumsan tortor quis turpis. Sed ', '63 Goodland Pass', ''),
(25, 'Trace Cotta', 'Sed accumsan felis. Ut at dolor quis odio con', '34 Maywood Point', ''),
(26, 'Noland Pellman', 'Duis bibendum, felis sed interdum venenatis, ', '41038 Vidon Hill', ''),
(27, 'Christiano Allison', 'In tempor, turpis nec euismod scelerisque, qu', '4581 Ridge Oak Place', ''),
(28, 'Kori Oaker', 'Nulla suscipit ligula in lacus. Curabitur at ', '9 Ruskin Junction', ''),
(29, 'Ev Kopf', 'Praesent blandit. Nam nulla. Integer pede jus', '665 Saint Paul Alley', ''),
(30, 'Elke Sappy', 'Nulla mollis molestie lorem. Quisque ut erat.', '15611 7th Lane', ''),
(31, 'Tait Rawsen', 'Proin at turpis a pede posuere nonummy. Integ', '92 Rusk Drive', ''),
(32, 'Sherwin Chapellow', 'Maecenas ut massa quis augue luctus tincidunt', '2 Oneill Parkway', ''),
(33, 'Lee Camis', 'Curabitur convallis. Duis consequat dui nec n', '20 Arapahoe Road', ''),
(34, 'Dorri Arter', 'Mauris lacinia sapien quis libero. Nullam sit', '516 Esch Hill', ''),
(35, 'Cherise Bucknall', 'Nulla ut erat id mauris vulputate elementum. ', '66706 Vera Circle', ''),
(36, 'Lawton Eagle', 'Etiam vel augue. Vestibulum rutrum rutrum neq', '78582 Lukken Avenue', ''),
(37, 'Big Brackin', 'asdasda ', 'fsfasd 2', '068722222');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijn`
--

CREATE TABLE `medicijn` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) DEFAULT NULL,
  `fabrikant` varchar(50) DEFAULT NULL,
  `vergoeding` tinyint(1) NOT NULL DEFAULT 0,
  `bijwerkingen` varchar(255) DEFAULT NULL,
  `effect` varchar(255) DEFAULT NULL,
  `prijs` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medicijn`
--

INSERT INTO `medicijn` (`id`, `naam`, `fabrikant`, `vergoeding`, `bijwerkingen`, `effect`, `prijs`) VALUES
(25, 'Anticonceptiepil', 'A-Medical', 0, 'Kans op griep.', 'De hormonen in de pil zorgen dat er geen eicel vrij komen.', 1.00),
(27, 'Maalox', 'C-Bedrijf', 1, 'Maagdarmklachten', 'Algeldraat en magnesiumzouten binden maagzuur. Dit maakt de maaginhoud minder zuur.', 20.02),
(28, 'Paracetemol', 'A-Medical', 1, 'Medicijnafhankelijke hoofdpijn', 'Paracetamol stilt pijn en verlaagt koorts', 5.99);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoon` varchar(255) NOT NULL,
  `geboortedatum` date NOT NULL,
  `adres` varchar(255) NOT NULL,
  `verzekeringnummer` int(255) NOT NULL,
  `arts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `patient`
--

INSERT INTO `patient` (`patient_id`, `naam`, `email`, `telefoon`, `geboortedatum`, `adres`, `verzekeringnummer`, `arts_id`) VALUES
(81, 'Harriott Spincks', 'hspincks0@thetimes.co.uk', '0644444444', '2018-10-02', '810 Goodland Road', 8990021, 21),
(82, 'Christoper Austing', 'causting1@tmall.com', '660926943', '2019-04-11', '834 Hintze Lane', 27223, 0),
(83, 'Chicky Febvre', 'cfebvre2@ihg.com', '387518550', '2019-02-19', '89 Ilene Street', 74491, 0),
(84, 'Francoise Dancey', 'fdancey3@joomla.org', '476992352', '2019-01-08', '68 Anthes Circle', 48593, 0),
(85, 'Belita Joder', 'bjoder4@google.com', '616319129', '2019-09-15', '56 Sloan Street', 76634, 0),
(86, 'Allin Dalston', 'adalston5@github.io', '555520869', '2019-09-26', '72968 Monterey Park', 71552, 0),
(87, 'Alika Connock', 'aconnock6@simplemachines.org', '274443363', '2018-11-07', '837 Heffernan Terrace', 83548, 0),
(88, 'Frederick Test', 'ftest7@wired.com', '160962353', '2019-06-23', '8 Fallview Lane', 62277, 0),
(89, 'Mildrid Arckoll', 'marckoll8@addtoany.com', '450676988', '2019-02-08', '9 Hudson Parkway', 30125, 0),
(90, 'Bobina Glanvill', 'bglanvill9@myspace.com', '852686098', '2019-03-23', '07 Dahle Parkway', 71024, 0),
(91, 'Red Magner', 'rmagnera@nhs.uk', '400281288', '2019-05-05', '05 Donald Park', 44684, 0),
(92, 'Bendix Washbrook', 'bwashbrookb@chron.com', '414595726', '2019-06-27', '022 Rockefeller Park', 23108, 0),
(93, 'Estevan Norley', 'enorleyc@parallels.com', '219282134', '2019-05-25', '04638 Bluejay Trail', 30842, 0),
(94, 'Horst Pinks', 'hpinksd@mail.ru', '554384954', '2018-12-01', '01556 Mayer Center', 44362, 0),
(95, 'Sigismund Farnill', 'sfarnille@chronoengine.com', '780342790', '2019-06-13', '85384 Judy Parkway', 86519, 0),
(96, 'Ransom Stout', 'rstoutf@economist.com', '486745233', '2018-12-02', '2 Longview Road', 50465, 0),
(97, 'Vic Hayward', 'vhaywardg@earthlink.net', '490754627', '2019-08-13', '865 Sugar Way', 11093, 0),
(98, 'Susannah Varcoe', 'svarcoeh@webs.com', '215221102', '2019-08-12', '258 Oakridge Trail', 37297, 0),
(99, 'Anni Careless', 'acarelessi@amazon.co.uk', '343063750', '2018-10-31', '02107 Alpine Avenue', 44991, 0),
(100, 'Jarid McKiernan', 'jmckiernanj@redcross.org', '140718859', '2019-02-03', '1233 Thackeray Junction', 47378, 0),
(101, 'Ellswerth Ygoe', 'eygoek@xing.com', '419197780', '2019-04-06', '1 Helena Pass', 44919, 0),
(102, 'Mommy Laidler', 'mlaidlerl@networkadvertising.org', '779285456', '2018-12-02', '46352 Paget Circle', 10696, 0),
(103, 'Clare Farlamb', 'cfarlambm@networksolutions.com', '168739587', '2018-10-21', '28088 Messerschmidt Terrace', 68259, 0),
(104, 'Jillene Dreinan', 'jdreinann@usatoday.com', '265828252', '2019-03-25', '47199 Aberg Terrace', 54533, 0),
(105, 'Elwyn Fearney', 'efearneyo@clickbank.net', '307150313', '2019-05-16', '1 Glacier Hill Parkway', 15585, 0),
(106, 'Shayne Sandford', 'ssandfordp@microsoft.com', '751441498', '2018-10-29', '73010 Ludington Street', 24640, 0),
(107, 'Mollee Fabler', 'mfablerq@zdnet.com', '198300725', '2019-03-08', '22 East Parkway', 87133, 0),
(108, 'Beverlie MacDonald', 'bmacdonaldr@bravesites.com', '775358915', '2019-02-01', '87033 Emmet Terrace', 41692, 0),
(109, 'Mirna Durbin', 'mdurbins@noaa.gov', '160280684', '2018-12-18', '6401 Jana Drive', 55030, 0),
(110, 'Olva Ambrogetti', 'oambrogettit@ucla.edu', '447504976', '2019-09-12', '669 Southridge Plaza', 25353, 0),
(111, 'Shelba Dumphrey', 'sdumphreyu@usatoday.com', '111040723', '2019-07-26', '95633 Southridge Lane', 20091, 0),
(112, 'Donnell Learmount', 'dlearmountv@theatlantic.com', '153554114', '2018-12-01', '04502 Knutson Terrace', 29241, 0),
(113, 'Alain Rangeley', 'arangeleyw@reddit.com', '168589450', '2019-06-14', '34223 Glendale Pass', 35882, 0),
(114, 'Minne Benzing', 'mbenzingx@hibu.com', '794571441', '2019-04-02', '28845 Graedel Junction', 85115, 0),
(115, 'Caril Licciardiello', 'clicciardielloy@irs.gov', '234425042', '2019-03-15', '3222 Browning Point', 33677, 0),
(116, 'Philippine Peffer', 'ppefferz@wikispaces.com', '263891945', '2019-06-03', '29762 Marcy Hill', 40531, 0),
(117, 'Alameda Clewett', 'aclewett10@fc2.com', '643214859', '2019-07-13', '36 Forest Dale Junction', 71038, 0),
(118, 'Bernice Whisson', 'bwhisson11@parallels.com', '831454036', '2019-02-09', '21590 Emmet Road', 23622, 0),
(119, 'Jermaine Bacher', 'jbacher12@meetup.com', '623934899', '2019-05-04', '15 Acker Drive', 81297, 0),
(120, 'Allyn Pickthorne', 'apickthorne13@sina.com.cn', '221526006', '2019-08-30', '163 Colorado Place', 74272, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patient_notities`
--

CREATE TABLE `patient_notities` (
  `patient_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `notities` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recept`
--

CREATE TABLE `recept` (
  `recept_id` int(11) UNSIGNED NOT NULL,
  `patient_id` int(45) UNSIGNED NOT NULL,
  `dosis` varchar(45) DEFAULT NULL,
  `herhalingsrecept` tinyint(4) DEFAULT NULL,
  `medicijn_id` int(11) UNSIGNED NOT NULL,
  `commentaar` text NOT NULL,
  `datum` text NOT NULL,
  `afgehandeld` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `functie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `functie`) VALUES
(5, 'abc', '589c22335a381f122d129225f5c0ba3056ed5811', 'apotheker');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medicijn`
--
ALTER TABLE `medicijn`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexen voor tabel `patient_notities`
--
ALTER TABLE `patient_notities`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `recept`
--
ALTER TABLE `recept`
  ADD PRIMARY KEY (`recept_id`,`medicijn_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT voor een tabel `medicijn`
--
ALTER TABLE `medicijn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT voor een tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT voor een tabel `patient_notities`
--
ALTER TABLE `patient_notities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `recept`
--
ALTER TABLE `recept`
  MODIFY `recept_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
