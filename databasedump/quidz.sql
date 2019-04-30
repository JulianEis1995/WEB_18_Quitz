-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Apr 2019 um 13:12
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `quitz`
CREATE DATABASE IF NOT EXISTS QUITZ;

-- Datenbank: 'quitz' verwenden
USE QUITZ;
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tdifficulty`
--

CREATE TABLE `tdifficulty` (
  `SID` int(11) NOT NULL,
  `description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tdifficulty`
--

INSERT INTO `tdifficulty` (`SID`, `description`) VALUES
(1, 'Leicht'),
(2, 'Mittel'),
(3, 'Schwer');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tplayer`
--

CREATE TABLE `tplayer` (
  `PID` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `vname` varchar(150) DEFAULT NULL,
  `nname` varchar(150) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tplayer`
--

-- Passwort: "Passwort"
INSERT INTO `tplayer` (`PID`, `username`, `vname`, `nname`, `mail`, `pwd`) VALUES
(1, 'test', 'test', 'test', 'test.ak@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(2, 'wsw', 'Wendy', 'Swinger', 'wswinger@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(3, 'hme', 'Hans', 'Meier', 'wswinger@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(4, 'pkl', 'Peter', 'Klein', 'pkl@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(5, 'jel', 'Josef', 'Ellinger', 'jell@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(6, 'mma', 'Michael', 'Mayer', 'mem@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(7, 'jli', 'Jessica', 'Liebherr', 'jlie@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(8, 'mme', 'Markus', 'Meister', 'mame@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(9, 'mem', 'Matthias', 'Emil', 'maem@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112'),
(10, 'che', 'Christian', 'Hell', 'che@hotmail.com', '3e45af4ca27ea2b03fc6183af40ea112');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tquestions`
--

CREATE TABLE `tquestions` (
  `FID` int(11) NOT NULL,
  `question` varchar(150) DEFAULT NULL,
  `a1` varchar(150) DEFAULT NULL,
  `a2` varchar(150) DEFAULT NULL,
  `a3` varchar(150) DEFAULT NULL,
  `a4` varchar(150) DEFAULT NULL,
  `ra` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tquestions`
--

INSERT INTO `tquestions` (`FID`, `question`, `a1`, `a2`, `a3`, `a4`, `ra`, `SID`) VALUES
(1, 'Was trägt man eher unfreiwillig?', 'Halskette', 'Armreif', 'Augenringe', 'Piercing', 3, 1),
(2, 'Wer war Kurfürst von Sachsen und König von Polen?', 'November der Große', 'Februar der Fromme', 'Juni der Schöne', 'August der Starke', 4, 3),
(3, 'In welcher Einheit gibt man die Größe von Bildschirmen oder Disketten an?', 'Zoll', 'Polizei', 'Rettung', 'Feuerwehr', 1, 1),
(4, 'Wie heißt eine Kulturart des Lauchs?', 'Brigidde', 'Schalotte', 'Schantall', 'Dschenniffa', 2, 3),
(5, 'Gegen das Zu-Wasser-Lassen einer Ente wehrt sich in einem Loriot-Sketch Herr ...?', 'Maier-Leverkuhsen', 'Müller-Lüdenscheidt', 'Weber-Magdeburch', 'Schröder-Düsseldoof', 2, 2),
(6, 'Kommt in Filmen ein Defibrillator zum Einsatz, heißt es oft: ??\r\n', 'Ab ins Bett!', 'Füße vom Stuhl!', 'Vor die Tür!', 'Weg vom Tisch!', 4, 2),
(7, 'Wer oder was ist im Jahre 79 n.Chr. ausgebrochen?', 'Schweinegrippe', 'Pablo Escobar', 'Vesuv', 'Vogelgrippe', 3, 2),
(8, 'ine von Sehnsucht und Melancholie geprägte portugiesische Musikrichtung ist der ...?', 'Monotono', 'Tristo', 'Fado', 'Ödo', 3, 2),
(9, 'Auf dem Weg zwischen welchen Metropolen muss man zwangsläufig ein Meer überqueren?', 'Moskau - New York', 'Madrid - Oslo', 'Peking - Kapstadt', 'Montevideo - Montreal', 1, 2),
(10, 'Glaubt man der Wortherkunft, so teilte man mit seinen \"Kumpanen\" ursprünglich ...?', 'das Brot', 'den Beruf', 'die Beute', 'die Geliebte', 1, 1),
(11, 'Charles de Gaulle wird mit dem Satz zitiert: \"Es ist schwer, ein Volk zu regieren, das ...\"?', 'einen König will', 'von Obelix abstammt', '246 Sorten Käse hat', 'von Asterix abstammt', 3, 1),
(12, 'Was ist die Kleine Rheinländerin?\r\n', 'inaktiver Vulkan', 'beliebte Erbsensorte', 'lieblicher Rotwein', 'Walzer von Strauß', 2, 3),
(13, 'Wer war einer der Helden von Bern?', 'Heinrich Heyne', 'Karl Mai', 'Bert Brächt', 'Günter Graß', 2, 3),
(14, 'Wer steht auf der \"Roten Liste\" gefährdeter Tiere Deutschlands?', 'Hausschaf', 'Hausratte', 'Haushund', 'Hauskatze', 2, 1),
(15, 'Nicht nur Literaturfreunde lieben es, in der Silvesternacht zu ...?', 'grassern', 'böllern', 'jagen', 'springen', 2, 1),
(16, 'Was heute ganz schick \"Cocooning\" genannt wird, war schon immer die Lieblingsbeschäftigung der ...?', 'Stubenhocker', 'Wandervögel', 'Sportskanonen', 'Discomäuschen', 1, 3),
(17, 'Was vereinte im Sommer die Massen vor der Großbildleinwand?', 'J.R. Viewing', 'Miss Ellie Viewing', 'Bobby Viewing', 'Public Viewing', 4, 1),
(18, 'Was ist als Anrede für eines der begehrtesten Models der Welt vollkommen angemessen?', 'Tachalte', 'Eytante', 'Himutti', 'Naomi', 4, 1),
(19, 'Welcher \"Fisch\" wurde erst 1985 in London \"entdeckt\"?', 'Müller-Forelle', 'Schulze-Scholle', 'Becker-Hecht', 'Maier-Barsch', 3, 2),
(20, 'Den Discohit \"Follow Me\" sang mit tiefer Stimme Amanda ??', 'Hamlet', 'Othello', 'Lear', 'Macbeth', 3, 2),
(21, 'In der Fußballbundesliga kann es durchaus vorkommen, dass ...?', 'Erna Westfalen haut', 'Frieda Hessen prügelt', 'Rita Friesen versohlt', 'Hertha Bayern schlägt', 4, 2),
(22, 'Was haben die Comicfiguren Homer Simpson, Micky Maus und Fred Feuerstein gemeinsam?', 'kein Haupthaar', 'unverheiratet', 'Sprachfehler', 'vier Finger pro Hand', 4, 1),
(23, 'Wer war der erste SPD-Vorsitzende nach dem Zweiten Weltkrieg?', 'Schumacher', 'Frentzen', 'Heidfeld', 'Rosberg', 1, 2),
(24, 'Was sind aufschauender Hund, halbe Heuschrecke, sitzender Held und schlafende Schildkröte?', 'Sternbilder', 'Yoga-Übungen', 'Dachziegel', 'Indianer bei Karl May', 2, 1),
(25, 'Welches berühmte New Yorker Bauwerk schuf der Architekt Frank Lloyd Wright?', 'Guggenheim Museum', 'Freiheitsstatue', 'Empire State Building', 'Brooklyn Bridge', 1, 3),
(26, 'Welche berühmte Figur heißt mit Vornamen John?', 'Dr. Kimble', 'Dr. Dolittle', 'Dr. Jekyll', 'Dr. Jekyll', 2, 3),
(27, 'Wo findet man Isohypsen?', 'Powerdrinks', 'Integralgleichungen', 'Landkarten', 'Turnhallen', 3, 2),
(28, 'Wofür steht das \"Sint\" in Sintflut?', 'Strafe', 'immerwährend', 'siebente', 'Gott', 2, 3),
(29, 'Die aus Ostasien stammende Staude Zingiber officinalis ist hierzulande bekannt als ...?', 'Zitrone', 'Ingwer', 'Melone', 'Orange', 2, 3),
(30, 'Was spielt eine gewichtige Rolle in der nordischen Mythologie?', 'Odins Inbusschlüssel', 'Lokis Zollstock', 'Thors Hammer', 'Freyjas Bohrmaschine', 3, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tscoreboard`
--

CREATE TABLE `tscoreboard` (
  `PID` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tscoreboard`
--
INSERT INTO `tscoreboard`(`PID`, `time`, `price`) VALUES
(1, '00:08:20', 500),
(2, '01:03:20', 32000),
(3, '04:02:00', 128000),
(4, '00:30:20', 64000),
(5, '00:24:03', 8000),
(6, '00:21:00', 9000),
(7, '00:31:00', 128000),
(8, '01:32:11', 32000),
(9, '02:32:10', 64000),
(10, '00:00:45', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tdifficulty`
--
ALTER TABLE `tdifficulty`
  ADD PRIMARY KEY (`SID`);

--
-- Indizes für die Tabelle `tplayer`
--
ALTER TABLE `tplayer`
  ADD PRIMARY KEY (`PID`);

--
-- Indizes für die Tabelle `tquestions`
--
ALTER TABLE `tquestions`
  ADD PRIMARY KEY (`FID`),
  ADD KEY `SID` (`SID`);

--
-- Indizes für die Tabelle `tscoreboard`
--
ALTER TABLE `tscoreboard`
  ADD PRIMARY KEY (`PID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tdifficulty`
--
ALTER TABLE `tdifficulty`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tplayer`
--
ALTER TABLE `tplayer`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `tquestions`
--
ALTER TABLE `tquestions`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT für Tabelle `tscoreboard`
--
ALTER TABLE `tscoreboard`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tquestions`
--
ALTER TABLE `tquestions`
  ADD CONSTRAINT `tquestions_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `tdifficulty` (`SID`);

--
-- Constraints der Tabelle `tscoreboard`
--
ALTER TABLE `tscoreboard`
  ADD CONSTRAINT `tscoreboard_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `tplayer` (`PID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

