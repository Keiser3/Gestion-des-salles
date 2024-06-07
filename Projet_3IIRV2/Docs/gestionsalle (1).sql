-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2024 at 10:12 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionsalle`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `id_Campus` int NOT NULL AUTO_INCREMENT,
  `labelC` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Campus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id_Campus`, `labelC`) VALUES
(1, 'EMSI Gueliz'),
(2, 'EMSI Centre');

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id_Groupe` int NOT NULL AUTO_INCREMENT,
  `labelG` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Groupe`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id_Groupe`, `labelG`) VALUES
(1, '3IIR1'),
(2, '3IIR2'),
(3, '3IIR3'),
(4, '3IIR4'),
(5, '3IIR5'),
(6, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `jours`
--

DROP TABLE IF EXISTS `jours`;
CREATE TABLE IF NOT EXISTS `jours` (
  `id_Jour` int NOT NULL AUTO_INCREMENT,
  `labelJ` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Jour`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jours`
--

INSERT INTO `jours` (`id_Jour`, `labelJ`) VALUES
(1, 'lundi'),
(2, 'mardi'),
(3, 'mercredi'),
(4, 'jeudi'),
(5, 'vendredi'),
(6, 'samedi');

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `id_Matiere` int NOT NULL AUTO_INCREMENT,
  `labelM` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matieres`
--

INSERT INTO `matieres` (`id_Matiere`, `labelM`) VALUES
(1, 'C.S.I'),
(2, 'BD PL/SQL'),
(3, 'P.O.O'),
(4, 'T.E.C'),
(5, 'ENG'),
(6, 'S.E'),
(7, 'L.S'),
(8, 'C.A'),
(9, 'G.E'),
(10, 'R.I'),
(11, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id_Personne` int NOT NULL AUTO_INCREMENT,
  `id_Type` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Personne`),
  KEY `FK_type` (`id_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`id_Personne`, `id_Type`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 1, 'john', 'doe', 'johndoe@email.com', '$2y$10$lFEe.lVZImrejpxLQ/n1POpVQ/1HEtTBqkmIS5WdT8nDcf21VLuCS'),
(2, 1, 'thomas', 'smith', 'thomassmith@email.com', '$2y$10$iLQjJpF.UcV0nGQ11Avg4.RwH8NG7WK0qhytdXXnHUMvylhDvU1hG'),
(3, 1, 'jane', 'doe', 'janedoe@email.com', '$2y$10$wJamfqgqdYLQWtLIZHrieubSlxh5iwuAV4UVNdrQgLaJZP09oicPm'),
(4, 1, 'joe', 'biden', 'joebiden@email.com', '$2y$10$jw4l3MOo0RGPcUabnEAJq.FFo9JS5BXoHeco5NxtPHZWq6RJYcMZC'),
(5, 1, 'barack', 'obama', 'barackobama@email.com', '$2y$10$jbXV8tobjFY/xQ4otGiMGuI/Zam.A.x07aZI4ulsPoJN/13u0gzj2'),
(6, 1, 'george', 'bush', 'georgebush@email.com', '$2y$10$DS1lLPZdVQ55FrSTN.RYauPqU/KOOxY0hn9EaybjapE0AFmNrLxVq'),
(7, 1, 'ronald', 'raegan', 'ronaldraegan@email.com', '$2y$10$x6YsvcnGdXDLoOAuMYpnw.crlMfKjGPETt.ORmW5fqeYgv0Tm3YXi'),
(8, 1, 'richard', 'nixon', 'richardnixon@email.com', '$2y$10$M2gwAB718T4wMJQl46PRjuDGf4BhTyn3Z8anvkhu41ox99C7DFhU6'),
(9, 1, 'mark', 'marquez', 'markmarquez@email.com', '$2y$10$KH/2ddSozEwSk7XqK6xkoOd/f.xJnO./lTGd2POuTspYGPoDZQvk6'),
(10, 1, 'linus', 'torvalds', 'linustorvalds@email.com', '$2y$10$4fPY5bsqYaPze5jCzoXoA.dxQoPhbHsvjc2inS2FxljCbJFCzYISi'),
(11, 2, 'walter', 'white', 'walterwhite@email.com', '$2y$10$JuBeKIPvPjWBrzGEYHsSAuK5G2Fr7hH7VEjeAUL2x1Rs.ZltxEuD.'),
(12, 2, 'franklin', 'saint', 'franklinsaint@email.com', '$2y$10$r5rU5sgOdrTVOc3b45ja6epphjNkI6prr6d5JliRmzhTzT82s8y/W'),
(13, 2, 'hannibal', 'lecter', 'hanniballecter@email.com', '$2y$10$ss7d1YBBbHUPa8dOMtZaGOyRETucgutpim0zBFzO8nRNjV4oBvl26'),
(15, 1, 'none', 'none', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `id_Salle` int NOT NULL AUTO_INCREMENT,
  `labelS` varchar(255) NOT NULL,
  `id_Campus` int NOT NULL,
  PRIMARY KEY (`id_Salle`),
  KEY `FK_campus` (`id_Campus`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `salles`
--

INSERT INTO `salles` (`id_Salle`, `labelS`, `id_Campus`) VALUES
(1, '101', 1),
(2, '102', 1),
(3, '103', 1),
(4, '104', 1),
(5, '105', 1),
(6, '201', 1),
(7, '202', 1),
(8, '203', 1),
(9, '204', 1),
(10, '205', 1),
(11, '301', 1),
(12, '302', 1),
(13, '303', 1),
(14, '304', 1),
(15, '305', 1),
(16, '401', 1),
(17, '402', 1),
(18, '403', 1),
(19, '404', 1),
(20, '405', 1),
(21, 'A1', 2),
(22, 'B1', 2),
(23, 'C1', 2),
(24, 'D1', 2),
(25, 'A2', 2),
(26, 'B2', 2),
(27, 'C2', 2),
(28, 'D2', 2),
(29, 'A3', 2),
(30, 'B3', 2),
(31, 'C3', 2),
(32, 'D3', 2),
(33, 'A4', 2),
(34, 'B4', 2),
(35, 'C4', 2),
(36, 'D4', 2),
(37, 'none1', 1),
(38, 'none2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `seances`
--

DROP TABLE IF EXISTS `seances`;
CREATE TABLE IF NOT EXISTS `seances` (
  `id_Seance` int NOT NULL AUTO_INCREMENT,
  `t_debut` time NOT NULL,
  `t_fin` time NOT NULL,
  `id_Personne` int DEFAULT NULL,
  `id_Salle` int DEFAULT NULL,
  `id_Groupe` int DEFAULT NULL,
  `id_Jour` int NOT NULL,
  `id_Matiere` int DEFAULT NULL,
  `id_Campus` int NOT NULL,
  PRIMARY KEY (`id_Seance`),
  KEY `FK_campus2` (`id_Campus`),
  KEY `FK_Personne` (`id_Personne`),
  KEY `FK_Salle` (`id_Salle`),
  KEY `FK_Groupe` (`id_Groupe`),
  KEY `FK_Jours` (`id_Jour`),
  KEY `FK_Matiere` (`id_Matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seances`
--

INSERT INTO `seances` (`id_Seance`, `t_debut`, `t_fin`, `id_Personne`, `id_Salle`, `id_Groupe`, `id_Jour`, `id_Matiere`, `id_Campus`) VALUES
(1, '08:30:00', '10:00:00', 1, 34, 5, 1, 2, 2),
(10, '10:15:00', '11:45:00', 15, 38, 5, 1, 11, 2),
(11, '14:30:00', '16:00:00', 2, 30, 5, 1, 3, 2),
(12, '16:15:00', '17:45:00', 15, 38, 5, 1, 11, 2),
(13, '08:30:00', '10:00:00', 15, 38, 5, 2, 11, 2),
(14, '10:15:00', '11:45:00', 3, 36, 5, 2, 9, 2),
(15, '14:30:00', '16:00:00', 4, 31, 5, 2, 6, 2),
(16, '16:00:00', '17:45:00', 4, 31, 5, 2, 6, 2),
(17, '08:30:00', '10:00:00', 5, 16, 5, 3, 4, 1),
(18, '10:15:00', '11:45:00', 6, 16, 5, 3, 5, 1),
(19, '14:30:00', '16:00:00', 15, 37, 5, 3, 11, 1),
(20, '16:15:00', '17:45:00', 15, 37, 5, 3, 11, 1),
(21, '08:30:00', '10:00:00', 15, 38, 5, 4, 11, 2),
(22, '10:15:00', '11:45:00', 15, 38, 5, 4, 11, 2),
(23, '14:30:00', '16:00:00', 7, 35, 5, 4, 1, 2),
(24, '16:00:00', '17:45:00', 7, 35, 5, 4, 1, 2),
(25, '08:30:00', '10:00:00', 15, 38, 5, 5, 11, 2),
(26, '10:15:00', '11:45:00', 8, 31, 5, 5, 7, 2),
(27, '14:30:00', '16:00:00', 9, 36, 5, 5, 8, 2),
(28, '16:15:00', '17:45:00', 15, 38, 5, 5, 11, 2),
(29, '08:30:00', '10:00:00', 10, 35, 5, 6, 10, 2),
(30, '10:15:00', '11:45:00', 10, 35, 5, 6, 10, 2),
(31, '14:30:00', '16:00:00', 15, 38, 5, 6, 11, 2),
(32, '16:00:00', '17:45:00', 15, 38, 5, 6, 11, 2),
(33, '10:15:00', '11:45:00', 1, 34, 3, 1, 2, 2),
(34, '08:30:00', '10:15:00', 1, 34, 1, 4, 2, 2),
(35, '16:15:00', '17:45:00', 1, 2, 2, 3, 2, 1),
(36, '14:30:00', '16:00:00', 1, 12, 4, 6, 2, 1),
(38, '16:15:00', '17:45:00', 1, 38, 6, 1, 11, 1),
(39, '08:30:00', '10:00:00', 1, 38, 6, 2, 11, 2),
(40, '10:15:00', '11:45:00', 1, 38, 6, 2, 11, 2),
(41, '14:30:00', '16:00:00', 1, 37, 6, 3, 11, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `timetable`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `timetable`;
CREATE TABLE IF NOT EXISTS `timetable` (
`Campus` varchar(255)
,`Course` varchar(255)
,`Day` varchar(255)
,`FirstName` varchar(255)
,`Groupe` varchar(255)
,`id_Seance` int
,`LastName` varchar(255)
,`Room` varchar(255)
,`TimeSlot` varchar(23)
);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id_Type` int NOT NULL AUTO_INCREMENT,
  `labelT` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id_Type`, `labelT`) VALUES
(1, 'enseignant'),
(2, 'surveillant');

-- --------------------------------------------------------

--
-- Structure for view `timetable`
--
DROP TABLE IF EXISTS `timetable`;

DROP VIEW IF EXISTS `timetable`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `timetable`  AS SELECT `seances`.`id_Seance` AS `id_Seance`, `jours`.`labelJ` AS `Day`, concat(`seances`.`t_debut`,' - ',`seances`.`t_fin`) AS `TimeSlot`, `salles`.`labelS` AS `Room`, `groupes`.`labelG` AS `Groupe`, `personnes`.`nom` AS `LastName`, `personnes`.`prenom` AS `FirstName`, `matieres`.`labelM` AS `Course`, `campus`.`labelC` AS `Campus` FROM ((((((`seances` join `jours` on((`seances`.`id_Jour` = `jours`.`id_Jour`))) left join `salles` on((`seances`.`id_Salle` = `salles`.`id_Salle`))) left join `groupes` on((`seances`.`id_Groupe` = `groupes`.`id_Groupe`))) left join `personnes` on((`seances`.`id_Personne` = `personnes`.`id_Personne`))) left join `matieres` on((`seances`.`id_Matiere` = `matieres`.`id_Matiere`))) left join `campus` on((`seances`.`id_Campus` = `campus`.`id_Campus`)))  ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `FK_type` FOREIGN KEY (`id_Type`) REFERENCES `types` (`id_Type`);

--
-- Constraints for table `salles`
--
ALTER TABLE `salles`
  ADD CONSTRAINT `FK_campus` FOREIGN KEY (`id_Campus`) REFERENCES `campus` (`id_Campus`);

--
-- Constraints for table `seances`
--
ALTER TABLE `seances`
  ADD CONSTRAINT `FK_campus2` FOREIGN KEY (`id_Campus`) REFERENCES `campus` (`id_Campus`),
  ADD CONSTRAINT `FK_Groupe` FOREIGN KEY (`id_Groupe`) REFERENCES `groupes` (`id_Groupe`),
  ADD CONSTRAINT `FK_Jours` FOREIGN KEY (`id_Jour`) REFERENCES `jours` (`id_Jour`),
  ADD CONSTRAINT `FK_Matiere` FOREIGN KEY (`id_Matiere`) REFERENCES `matieres` (`id_Matiere`),
  ADD CONSTRAINT `FK_Personne` FOREIGN KEY (`id_Personne`) REFERENCES `personnes` (`id_Personne`),
  ADD CONSTRAINT `FK_Salle` FOREIGN KEY (`id_Salle`) REFERENCES `salles` (`id_Salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
