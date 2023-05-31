-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 mai 2023 à 10:31
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conservatoireefrei`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(32) NOT NULL,
  `mdp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `mdp`) VALUES
('login', 'mdp'),
('a', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `IDELEVE` int(11) NOT NULL,
  `NIVEAU` int(11) NOT NULL,
  `BOURSE` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDELEVE`),
  KEY `I_FK_ELEVE_NIVEAU` (`NIVEAU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`IDELEVE`, `NIVEAU`, `BOURSE`) VALUES
(6, 1, NULL),
(34, 1, NULL),
(35, 1, NULL),
(39, 1, NULL),
(84, 1, NULL),
(85, 1, NULL),
(86, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

DROP TABLE IF EXISTS `heure`;
CREATE TABLE IF NOT EXISTS `heure` (
  `TRANCHE` varchar(32) NOT NULL,
  PRIMARY KEY (`TRANCHE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `heure`
--

INSERT INTO `heure` (`TRANCHE`) VALUES
('11H'),
('13h'),
('15h'),
('17H'),
('19h'),
('21h'),
('9h');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `IDPROF` int(11) NOT NULL,
  `IDELEVE` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `DATEINSCRIPTION` varchar(11) DEFAULT '00/00/2022',
  PRIMARY KEY (`IDPROF`,`IDELEVE`,`NUMSEANCE`),
  KEY `I_FK_INSCRIPTION_ELEVE` (`IDELEVE`),
  KEY `I_FK_INSCRIPTION_SEANCE` (`IDPROF`,`NUMSEANCE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`IDPROF`, `IDELEVE`, `NUMSEANCE`, `DATEINSCRIPTION`) VALUES
(3, 34, 9, '2023-05-30'),
(3, 35, 9, '2023-05-30'),
(3, 35, 13, '2023-05-30'),
(3, 39, 9, '2023-05-30'),
(3, 39, 13, '2023-05-30'),
(3, 85, 13, '2023-05-30');

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `REF` varchar(32) NOT NULL,
  `LIBELLE` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`REF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`REF`, `LIBELLE`) VALUES
('Accordéon', NULL),
('Basse', NULL),
('Batterie', NULL),
('Flûte traversière', NULL),
('Guitare électrique', NULL),
('Harpe', NULL),
('Piano', NULL),
('Saxophone', NULL),
('Trompette', NULL),
('Violon', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

DROP TABLE IF EXISTS `jour`;
CREATE TABLE IF NOT EXISTS `jour` (
  `JOUR` varchar(32) NOT NULL,
  PRIMARY KEY (`JOUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`JOUR`) VALUES
('Jeudi'),
('Lundi'),
('Mardi'),
('Mercredi'),
('Samedi'),
('Vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `NIVEAU` int(11) NOT NULL,
  PRIMARY KEY (`NIVEAU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`NIVEAU`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Structure de la table `payer`
--

DROP TABLE IF EXISTS `payer`;
CREATE TABLE IF NOT EXISTS `payer` (
  `IDPROF` int(11) NOT NULL,
  `IDELEVE` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `LIBELLE` varchar(32) NOT NULL,
  `PAYE` tinyint(1) DEFAULT NULL,
  `DATEPAYEMENT` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`IDPROF`,`IDELEVE`,`NUMSEANCE`,`LIBELLE`),
  KEY `I_FK_PAYER_INSCRIPTION` (`IDPROF`,`IDELEVE`,`NUMSEANCE`),
  KEY `I_FK_PAYER_TRIM` (`LIBELLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(32) DEFAULT NULL,
  `PRENOM` varchar(32) DEFAULT NULL,
  `TEL` varchar(32) DEFAULT NULL,
  `MAIL` varchar(32) DEFAULT NULL,
  `ADRESSE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`ID`, `NOM`, `PRENOM`, `TEL`, `MAIL`, `ADRESSE`) VALUES
(2, 'nomProf2', 'prenomProf2', 'telProf2', 'mailProf2', 'adresseProf2'),
(3, 'nomProf33', 'prenomProf3', 'telProf3', 'mailProf3', 'adresseProf3'),
(4, 'nomProf4', 'prenomProf4', 'telProf4', 'mailProf4', 'adresseProf4'),
(5, 'p5', 'prenomProf5', 'mailProf5', 'telProf5', 'adresseProf5'),
(6, 'nom', 'prenom', 'telEle', 'mailEleve6', 'adresseEleve6'),
(8, 'nomEleve8', 'prenomEleve8', 'telEleve8', 'mailEleve8', 'adresseEleve8'),
(9, 'nomEleve9', 'prenomEleve9', 'telEleve9', 'mailEleve9', 'adresseEleve9'),
(24, 'fffffff', 'ddddddd', 'rrrrrr', 'éééé', 'zzzz'),
(25, 'a', 'z', 'f', 'v', 'd'),
(26, 'a', 'r', 'd', 'f', 'e'),
(27, 'z', 'e', 'f', 'a', 'r'),
(28, 'frere', 'jacques', 'pse', 'koo', 'eee'),
(29, 'knkakd', 'azeef', 'wcccc', 'qqqsdd', 'dddd'),
(31, 'abb', 'tba', 'telProf', 'mailProf', 'adresseProf'),
(32, 'moha', 'med', 'telou', 'mail', 'abe pierre'),
(33, 'mehidi', 'aya', '0810', 'caca', 'poubelle'),
(34, 'ahmed', 'diara', 'telo', 'mailo', 'rue du balais'),
(35, 'aa', 'vvv', 'eee', 'd', 'bbb'),
(36, 'aa', 'aaaaa', 'eee', 'aaa', 'eeee'),
(39, 'azerty', 'azer', 'O1', 'mail', '11 rue'),
(45, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(46, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(47, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(48, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(49, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(50, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(51, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(52, 'nom', 'prenom', 'tel', 'mail', 'adresse'),
(53, 'bb', 'nnn', 'aaa', 'c@com', 'aaaa'),
(54, 'bb', 'nnn', 'aaa', 'c@com', 'aaaa'),
(55, 'bb', 'nnn', 'aaa', 'c@com', 'aaaa'),
(56, 'bb', 'nnn', 'aaa', 'c@com', 'aaaa'),
(57, 'bb', 'nnn', 'hhh', 'c@com', 'aaaa'),
(58, 'c', 'b', 'nnn', 'c@com', 'aaaa'),
(59, 'c', 'b', 'nnn', 'c@com', 'aaaa'),
(60, 'c', 'b', 'nnn', 'c@com', 'aaaa'),
(61, 'c', 'b', 'nnn', 'c@com', 'aaaa'),
(62, 'c', 'b', 'nnn', 'c@com', 'aaaa'),
(63, 'c', 'b', 'nnn', 'c@com', 'aaaa'),
(64, 'c', 'b', 'aaa', 'c@com', 'aaaa'),
(65, 'c', 'b', 'aaa', 'c@com', 'aaaa'),
(68, 'asaad', 'aaa', 'aaa', 'vvc@com', 'sss'),
(70, 'bb', 'nnn', '', 'c@com', 'aaaa'),
(74, 'bb', 'nnn', '', 'c@com', 'aaaa'),
(81, 'bb', 'nnn', 'aaa', 'c@com', 'aaaa'),
(82, 'bb', 'nnn', 'aaa', 'c@com', 'aaaa'),
(84, 'sullyvan', 'allamelou', 'aaa', 'c@com', 'aaaa'),
(85, 'nomEleve6', 'prenomEleve6', 'telEleve6', 'mailEleve6', 'adresseEleve6'),
(86, 'nomEleve6', 'prenom6', 'telEleve6', 'mailEleve6', 'adresseEleve6');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `IDPROF` int(11) NOT NULL,
  `REF` varchar(32) NOT NULL,
  `SALAIRE` float DEFAULT NULL,
  PRIMARY KEY (`IDPROF`),
  KEY `I_FK_PROF_INSTRUMENT` (`REF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`IDPROF`, `REF`, `SALAIRE`) VALUES
(3, 'Batterie', 1111),
(31, 'Flûte traversière', 120),
(36, 'Accordéon', NULL),
(74, 'Accordéon', 1113);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `IDPROF` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `TRANCHE` varchar(32) NOT NULL,
  `JOUR` varchar(32) NOT NULL,
  `NIVEAU` int(11) NOT NULL,
  `CAPACITE` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPROF`,`NUMSEANCE`),
  KEY `I_FK_SEANCE_HEURE` (`TRANCHE`),
  KEY `I_FK_SEANCE_JOUR` (`JOUR`),
  KEY `I_FK_SEANCE_NIVEAU` (`NIVEAU`),
  KEY `I_FK_SEANCE_PROF` (`IDPROF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`IDPROF`, `NUMSEANCE`, `TRANCHE`, `JOUR`, `NIVEAU`, `CAPACITE`) VALUES
(3, 9, '11H', 'Jeudi', 1, 3),
(3, 13, '19h', 'Samedi', 2, 6),
(31, 11, '11H', 'Jeudi', 1, 1),
(31, 14, '11H', 'Mercredi', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `trim`
--

DROP TABLE IF EXISTS `trim`;
CREATE TABLE IF NOT EXISTS `trim` (
  `LIBELLE` varchar(32) NOT NULL,
  `DATEFIN` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`LIBELLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trim`
--

INSERT INTO `trim` (`LIBELLE`, `DATEFIN`) VALUES
('Trim 1 - 2021', '01/04/2021'),
('Trim 1 - 2022', '01/04/2022'),
('Trim 1 - 2023', '01/04/2023'),
('Trim 1 - 2024', '01/04/2024'),
('Trim 1 - 2025', '01/04/2025'),
('Trim 2 - 2021', '01/08/2021'),
('Trim 2 - 2022', '01/08/2022'),
('Trim 2 - 2023', '01/08/2023'),
('Trim 2 - 2024', '01/08/2024'),
('Trim 2 - 2025', '01/08/2025'),
('Trim 3 - 2021', '01/12/2021'),
('Trim 3 - 2022', '01/12/2022'),
('Trim 3 - 2023', '01/12/2023'),
('Trim 3 - 2024', '01/12/2024'),
('Trim 3 - 2025', '01/12/2025');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`NIVEAU`) REFERENCES `niveau` (`NIVEAU`),
  ADD CONSTRAINT `eleve_ibfk_2` FOREIGN KEY (`IDELEVE`) REFERENCES `personne` (`ID`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`IDELEVE`) REFERENCES `eleve` (`IDELEVE`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`IDPROF`,`NUMSEANCE`) REFERENCES `seance` (`IDPROF`, `NUMSEANCE`);

--
-- Contraintes pour la table `payer`
--
ALTER TABLE `payer`
  ADD CONSTRAINT `payer_ibfk_1` FOREIGN KEY (`IDPROF`,`IDELEVE`,`NUMSEANCE`) REFERENCES `inscription` (`IDPROF`, `IDELEVE`, `NUMSEANCE`),
  ADD CONSTRAINT `payer_ibfk_2` FOREIGN KEY (`LIBELLE`) REFERENCES `trim` (`LIBELLE`);

--
-- Contraintes pour la table `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `prof_ibfk_1` FOREIGN KEY (`REF`) REFERENCES `instrument` (`REF`),
  ADD CONSTRAINT `prof_ibfk_2` FOREIGN KEY (`IDPROF`) REFERENCES `personne` (`ID`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`TRANCHE`) REFERENCES `heure` (`TRANCHE`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`JOUR`) REFERENCES `jour` (`JOUR`),
  ADD CONSTRAINT `seance_ibfk_4` FOREIGN KEY (`IDPROF`) REFERENCES `prof` (`IDPROF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
