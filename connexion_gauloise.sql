-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Décembre 2015 à 14:55
-- Version du serveur :  5.6.27-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `connexion_gauloise`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnercategorie_table`
--

CREATE TABLE IF NOT EXISTS `abonnercategorie_table` (
  `ID_AbonnementCategorie` int(10) NOT NULL AUTO_INCREMENT,
  `ID_UtilisateurAbonne` int(10) NOT NULL,
  `ID_CategorieCible` int(10) NOT NULL,
  PRIMARY KEY (`ID_AbonnementCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `abonnerutilisateur_table`
--

CREATE TABLE IF NOT EXISTS `abonnerutilisateur_table` (
  `ID_AbonnementUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
  `ID_UtilisateurAbonne` int(10) NOT NULL,
  `ID_UtilisateurCible` int(10) NOT NULL,
  PRIMARY KEY (`ID_AbonnementUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `abonner_table`
--

CREATE TABLE IF NOT EXISTS `abonner_table` (
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Categorie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_table`
--

CREATE TABLE IF NOT EXISTS `categorie_table` (
  `ID_Categorie` int(10) NOT NULL,
  `Nom_Categorie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cibler_table`
--

CREATE TABLE IF NOT EXISTS `cibler_table` (
  `ID_Cible` int(11) NOT NULL,
  `ID_Evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cible_table`
--

CREATE TABLE IF NOT EXISTS `cible_table` (
  `ID_Cible` int(11) NOT NULL,
  `BasAge_Cible` int(11) NOT NULL,
  `Enfant_Cible` int(11) NOT NULL,
  `Ados_Cible` int(11) NOT NULL,
  `Adulte_Cible` int(11) NOT NULL,
  `Senior_Cible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `date_table`
--

CREATE TABLE IF NOT EXISTS `date_table` (
  `ID_Date` int(11) NOT NULL,
  `JourDebut_Date` date NOT NULL,
  `JourFin_Date` date NOT NULL,
  `HeureDebut_Date` int(11) NOT NULL,
  `HeureFin_Date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement_table`
--

CREATE TABLE IF NOT EXISTS `evenement_table` (
  `Nom_Evenement` varchar(32) NOT NULL,
  `Organisateur_Evenement` varchar(32) NOT NULL,
  `Image_Evenement` blob NOT NULL,
  `Video_Evenement` blob NOT NULL,
  `JourDebut_Evenement` date NOT NULL,
  `JourFin_Evenement` date NOT NULL,
  `HeureDebut_Evenement` time NOT NULL,
  `HeureFin_Evenement` time NOT NULL,
  `Description_Evenement` varchar(500) NOT NULL,
  `NbMaxParticipants_Evenement` int(8) NOT NULL,
  `Categorie_Evenement` varchar(32) NOT NULL,
  `Cibles_Evenement` varchar(255) NOT NULL,
  `NomLieu_Evenement` varchar(32) NOT NULL,
  `AdresseRue_Evenement` varchar(255) NOT NULL,
  `AdressePostal_Evenement` varchar(5) NOT NULL,
  `AdresseVille_Evenement` varchar(32) NOT NULL,
  `AdresseDepartement_Evenement` varchar(32) NOT NULL,
  `AdresseRegion_Evenement` varchar(32) NOT NULL,
  `Payant_Evenement` varchar(3) NOT NULL,
  `LienSiteWeb_Evenement` varchar(500) NOT NULL,
  `ID_Evenement` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_Evenement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `evenement_table`
--

INSERT INTO `evenement_table` (`Nom_Evenement`, `Organisateur_Evenement`, `Image_Evenement`, `Video_Evenement`, `JourDebut_Evenement`, `JourFin_Evenement`, `HeureDebut_Evenement`, `HeureFin_Evenement`, `Description_Evenement`, `NbMaxParticipants_Evenement`, `Categorie_Evenement`, `Cibles_Evenement`, `NomLieu_Evenement`, `AdresseRue_Evenement`, `AdressePostal_Evenement`, `AdresseVille_Evenement`, `AdresseDepartement_Evenement`, `AdresseRegion_Evenement`, `Payant_Evenement`, `LienSiteWeb_Evenement`, `ID_Evenement`) VALUES
('test', '', 0x5374c3a97068616e652e4a5047, '', '1993-01-22', '1993-01-22', '22:00:00', '23:30:00', 'test', 20, 'Repas/Banquets', 'Bas-âge Enfants ', 'test', '666', '78200', 'Paris', '', '', '0', 'http://google.com', 1),
('test', '', 0x5374c3a97068616e652e4a5047, '', '1993-01-22', '1993-01-22', '19:00:00', '22:00:00', 'test', 20, 'Soirées', 'Bas-âge Enfants ', 'test', '666', '78200', 'Paris', '', '', '0', 'http://google.com', 2),
('testX', 'test', 0x6275675f667265655f636f64652e6a7067, '', '2015-12-18', '2015-12-19', '18:00:00', '20:00:00', 'testX testX testX ', 20, 'Soirées', 'Adultes ', 'Chez Pierre Philippe', '666', '78200', 'Paris', '', '', '\0', 'http://google.com', 3),
('testOui', 'test', 0x6275675f667265655f636f64652e6a7067, '', '1993-01-22', '1993-01-22', '12:00:00', '12:00:00', 'tfusdgZDBOzdhlnsxj', 20, 'Soirées', 'Adultes ', 'Chez Pierre Philippe', '666', '78200', 'Magnanville', '', '', '\0', 'http://google.com', 4),
('testNON', 'test', 0x6275675f667265655f636f64652e6a7067, '', '1993-01-22', '1993-01-22', '12:00:00', '12:00:00', 'izudksc', 22, 'Soirées', 'Adultes ', 'Chez Pierre Philippe', '666', '78200', 'Magnanville', '', '', '\0', 'http://google.com', 5),
('testOUI', 'test', 0x6275675f667265655f636f64652e6a7067, '', '1993-01-22', '1993-01-22', '12:00:00', '12:00:00', 'pirusdcnpzfnsd', 23, 'Soirées', 'Adultes ', 'Chez Pierre Philippe', '666', '78200', 'Magnanville', '', '', '\0', 'http://google.com', 6),
('testbisOUI', 'test', 0x6275675f667265655f636f64652e6a7067, '', '1993-01-22', '1993-01-22', '12:00:00', '12:00:00', 'khbcqkhsdn', 1, 'Soirées', 'Adultes ', 'Chez Pierre Philippe', '666', '78200', 'Magnanville', '', '', '', 'http://google.com', 7),
('testbisbisOUI', 'test', 0x6275675f667265655f636f64652e6a7067, '', '1993-01-22', '1993-01-22', '12:00:00', '12:00:00', 'kdhnscm', 111, 'Soirées', 'Adultes ', 'Chez Pierre Philippe', '666', '78200', 'Magnanville', '', '', 'non', 'http://google.com', 8),
('sfxc', 'test', 0x6275675f667265655f636f64652e6a7067, '', '1993-01-12', '1993-01-12', '23:43:00', '03:23:00', 'sdc', 20, 'Soirées', 'Bas-âge Seniors ', 'sdcx', 'sdc', '78200', '', '', '', '', 'http://google.com', 9),
('ezudxb', 'test', 0x6275675f667265655f636f64652e6a7067, '', '1993-01-22', '1993-01-22', '22:22:00', '22:22:00', 'ierdnj', 22, 'Concerts', 'Ados ', 'ersd', '666', '78200', 'Magnanville', '', '', '', 'http://google.com', 10),
('ibhk', 'test', 0x6275675f667265655f636f64652e6a7067, '', '2022-02-22', '2022-02-22', '22:22:00', '22:22:00', 'rdedsqrcdsx', 22, 'Soirées', 'Adultes ', 'efcefc', '666', '78200', 'Magnanville', '', '', 'oui', 'http://google.com', 11);

-- --------------------------------------------------------

--
-- Structure de la table `lieu_table`
--

CREATE TABLE IF NOT EXISTS `lieu_table` (
  `ID_Lieu` int(10) NOT NULL,
  `CodePostal_Lieu` int(5) NOT NULL,
  `Region_Lieu` varchar(255) NOT NULL,
  `Departement_Lieu` varchar(255) NOT NULL,
  `Ville_Lieu` varchar(255) NOT NULL,
  `Salle_Lieu` varchar(255) NOT NULL,
  `NumeroRue_Lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `localiser_table`
--

CREATE TABLE IF NOT EXISTS `localiser_table` (
  `ID_Evenement` int(10) NOT NULL,
  `ID_Lieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `media_table`
--

CREATE TABLE IF NOT EXISTS `media_table` (
  `ID_Media` int(10) NOT NULL,
  `URL_Media` varchar(255) NOT NULL,
  `Fichier_Media` blob NOT NULL,
  `Type_Media` varchar(255) NOT NULL,
  `ID_Evenement` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message_table`
--

CREATE TABLE IF NOT EXISTS `message_table` (
  `ID_Message` int(10) NOT NULL,
  `ID_Utilisateur` int(10) NOT NULL,
  `Sujet_Message` varchar(255) NOT NULL,
  `DatePublication_Message` date NOT NULL,
  `PseudoAuteur_Message` varchar(255) NOT NULL,
  `Contenu_Message` varchar(255) NOT NULL,
  `ID_Evenement` int(10) NOT NULL,
  `ID_Topic` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `noter_table`
--

CREATE TABLE IF NOT EXISTS `noter_table` (
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Evenement` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `organiser_table`
--

CREATE TABLE IF NOT EXISTS `organiser_table` (
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Evenement` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participation_table`
--

CREATE TABLE IF NOT EXISTS `participation_table` (
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Evenement` int(10) NOT NULL,
  `NbReservations_Participation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `topic_table`
--

CREATE TABLE IF NOT EXISTS `topic_table` (
  `ID_Topic` int(10) NOT NULL,
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Message` int(10) NOT NULL,
  `Titre_Topic` varchar(255) NOT NULL,
  `DateCreation_Topic` date NOT NULL,
  `PseudoAuteur_Topic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_table`
--

CREATE TABLE IF NOT EXISTS `utilisateur_table` (
  `Pseudo_Utilisateur` varchar(32) NOT NULL,
  `MDP_Utilisateur` varchar(32) NOT NULL,
  `Nom_Utilisateur` varchar(32) NOT NULL,
  `Prenom_Utilisateur` varchar(32) NOT NULL,
  `Avatar_Utilisateur` blob NOT NULL,
  `Description_Utilisateur` text NOT NULL,
  `Adresse_Utilisateur` int(5) NOT NULL,
  `Mail_Utilisateur` varchar(100) NOT NULL,
  `Genre_Utilisateur` char(1) NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Categorie_Favorite` varchar(32) DEFAULT NULL,
  `Date_Inscription` date NOT NULL,
  `Admin_Utilisateur` varchar(3) NOT NULL,
  `OKadresse_Utilisateur` varchar(3) NOT NULL,
  `OKmail_Utilisateur` varchar(3) NOT NULL,
  `OKNomPrenom_Utilisateur` varchar(3) NOT NULL,
  `OKplanning_Utilisateur` varchar(3) NOT NULL,
  `OKAlertesEvenements_Utilisateur` varchar(3) NOT NULL,
  `OKAlertesAbonnements_Utilisateur` varchar(3) NOT NULL,
  `ID_Utilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_Utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `utilisateur_table`
--

INSERT INTO `utilisateur_table` (`Pseudo_Utilisateur`, `MDP_Utilisateur`, `Nom_Utilisateur`, `Prenom_Utilisateur`, `Avatar_Utilisateur`, `Description_Utilisateur`, `Adresse_Utilisateur`, `Mail_Utilisateur`, `Genre_Utilisateur`, `Date_Naissance`, `Categorie_Favorite`, `Date_Inscription`, `Admin_Utilisateur`, `OKadresse_Utilisateur`, `OKmail_Utilisateur`, `OKNomPrenom_Utilisateur`, `OKplanning_Utilisateur`, `OKAlertesEvenements_Utilisateur`, `OKAlertesAbonnements_Utilisateur`, `ID_Utilisateur`) VALUES
('test', 'testtest', 'test', 'test', '', 'test', 78200, 'test@test', '', '1993-01-22', 'Festivals Concerts Soirées ', '2015-12-01', '0', '\0', '\0', '\0', '\0', '1', '\0', 33),
('testX', 'testtest', 'testX', 'testX', '', 'test test test   ', 78200, 'test@test', 'H', '1993-01-22', 'Festivals Concerts ', '2015-12-17', '0', '\0', '\0', '\0', '\0', '1', '1', 34),
('testS', 'testtest', 'testS', 'testS', 0x6275675f667265655f636f64652e6a7067, 'testS testS testS', 78200, 'test@test', 'H', '1993-01-22', 'Festivals Concerts ', '2015-12-17', '0', '\0', '\0', '\0', '\0', '1', '1', 35),
('minute', 'testtest', 'minute', 'minute', '', '  minute minute minute !', 78200, 'test@test', 'H', '1993-01-22', 'Festivals Concerts ', '2015-12-18', '0', 'non', 'oui', 'oui', 'non', 'oui', 'non', 36);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
