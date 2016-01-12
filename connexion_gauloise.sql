-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Janvier 2016 à 10:30
-- Version du serveur :  5.6.17
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
-- Structure de la table `abonnerutilisateur_table`
--

CREATE TABLE IF NOT EXISTS `abonnerutilisateur_table` (
  `ID_AbonnementUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
  `ID_UtilisateurAbonne` int(10) NOT NULL,
  `ID_UtilisateurCible` int(10) NOT NULL,
  PRIMARY KEY (`ID_AbonnementUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `abonnerutilisateur_table`
--

INSERT INTO `abonnerutilisateur_table` (`ID_AbonnementUtilisateur`, `ID_UtilisateurAbonne`, `ID_UtilisateurCible`) VALUES
(6, 33, 33),
(8, 39, 33);

-- --------------------------------------------------------

--
-- Structure de la table `evenement_table`
--

CREATE TABLE IF NOT EXISTS `evenement_table` (
  `Nom_Evenement` varchar(32) NOT NULL,
  `Organisateur_Evenement` varchar(32) NOT NULL,
  `Image_Evenement` varchar(255) NOT NULL,
  `JourDebut_Evenement` date NOT NULL,
  `JourFin_Evenement` date NOT NULL,
  `HeureDebut_Evenement` time NOT NULL,
  `HeureFin_Evenement` time NOT NULL,
  `Description_Evenement` varchar(500) NOT NULL,
  `Sponsors_Evenement` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `evenement_table`
--

INSERT INTO `evenement_table` (`Nom_Evenement`, `Organisateur_Evenement`, `Image_Evenement`, `JourDebut_Evenement`, `JourFin_Evenement`, `HeureDebut_Evenement`, `HeureFin_Evenement`, `Description_Evenement`, `Sponsors_Evenement`, `NbMaxParticipants_Evenement`, `Categorie_Evenement`, `Cibles_Evenement`, `NomLieu_Evenement`, `AdresseRue_Evenement`, `AdressePostal_Evenement`, `AdresseVille_Evenement`, `AdresseDepartement_Evenement`, `AdresseRegion_Evenement`, `Payant_Evenement`, `LienSiteWeb_Evenement`, `ID_Evenement`) VALUES
('lolp', 'test', '45.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'te', '', 0, 'Festivals', 'Enfants ', 'Paris', '', '75019', '', '', '', 'oui', 'http://', 45),
('aaaaaa', 'test', '46.jpg', '2016-01-06', '2016-01-06', '21:16:00', '21:16:00', 'test', '', 23, 'Festivals', 'Bas-Ã¢ge ', 'par', 'afafz', '95400', '', '', '', 'non', 'http://google.com', 46),
('zej', 'Laeti', '47.jpg', '2016-01-06', '2016-01-06', '21:18:00', '17:18:00', 'ye', '', 0, 'Manifestations', 'Bas-Ã¢ge ', 'par', '', '95400', '', '', '', 'non', 'http://', 47),
('Concert Tame Impala', 'Laeti', '52.jpg', '2016-11-02', '2016-11-02', '19:30:00', '23:00:00', 'Concert du Groupe de Rock australien\nNouvel album : Currents\n', '', 0, 'ConfÃ©rences', 'Adultes ', 'Zenith de Paris', '', '75019', '', '', '', 'non', 'http://', 52),
('Course au Jardin du Luxembourg', 'Laeti', '53.jpeg', '2016-05-24', '2016-05-24', '10:30:00', '12:00:00', 'La 21 eme edition des 21km du Luxembourg\nN hesitez pas a vous inscrire !\n', '', 0, 'Manifestations', 'Enfants ', 'Jardin du Luxembourg', '', '75019', '', '', '', 'non', 'http://', 53),
('Soiree Raclette', 'Laeti', '54.jpg', '2016-10-23', '2016-10-23', '20:00:00', '23:00:00', 'Soiree a la salle des fetes du XVIIIeme.\r\nVenez nombreux !\r\n', 'Tefal', 150, 'Repas/Banquets', 'Enfants Ados Adultes Seniors ', 'Salle des fetes du XVIIIe', '2 rue de Paris', '75018', 'Paris', '75-Paris', 'Ile-de-France', 'non', 'http://www.google.com', 54);

-- --------------------------------------------------------

--
-- Structure de la table `forum_table`
--

CREATE TABLE IF NOT EXISTS `forum_table` (
  `ID_Topic` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int(11) NOT NULL,
  `Titre_Topic` varchar(50) NOT NULL,
  `PseudoAuteur_Topic` varchar(255) NOT NULL,
  `NB_MSG` int(11) NOT NULL,
  `Dernier_MSG` datetime NOT NULL,
  PRIMARY KEY (`ID_Topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `forum_table`
--

INSERT INTO `forum_table` (`ID_Topic`, `ID_Utilisateur`, `Titre_Topic`, `PseudoAuteur_Topic`, `NB_MSG`, `Dernier_MSG`) VALUES
(1, 0, 'ESSAI', 'Laeti', 2, '2016-01-11 17:22:15');

-- --------------------------------------------------------

--
-- Structure de la table `noter_table`
--

CREATE TABLE IF NOT EXISTS `noter_table` (
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Evenement` int(10) NOT NULL,
  `Note` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `noter_table`
--

INSERT INTO `noter_table` (`ID_Utilisateur`, `ID_Evenement`, `Note`) VALUES
(39, 52, 4);

-- --------------------------------------------------------

--
-- Structure de la table `participation_table`
--

CREATE TABLE IF NOT EXISTS `participation_table` (
  `ID_Utilisateur` int(10) NOT NULL,
  `ID_Evenement` int(10) NOT NULL,
  `NbReservations_Participation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participation_table`
--

INSERT INTO `participation_table` (`ID_Utilisateur`, `ID_Evenement`, `NbReservations_Participation`) VALUES
(39, 54, 0);

-- --------------------------------------------------------

--
-- Structure de la table `topic_table`
--

CREATE TABLE IF NOT EXISTS `topic_table` (
  `ID_Topic` int(11) NOT NULL,
  `ID_MSG` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo_MSG` varchar(255) NOT NULL,
  `Date_MSG` datetime NOT NULL,
  `Contenu_MSG` text NOT NULL,
  PRIMARY KEY (`ID_MSG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=208 ;

--
-- Contenu de la table `topic_table`
--

INSERT INTO `topic_table` (`ID_Topic`, `ID_MSG`, `Pseudo_MSG`, `Date_MSG`, `Contenu_MSG`) VALUES
(1, 205, 'Laeti', '2016-01-11 17:18:38', 'Ceci est un essai. J''essaie.'),
(1, 206, 'Laeti', '2016-01-11 17:19:02', 'JE me reponds'),
(1, 207, 'test', '2016-01-11 17:22:15', 'Allez\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_table`
--

CREATE TABLE IF NOT EXISTS `utilisateur_table` (
  `Pseudo_Utilisateur` varchar(32) NOT NULL,
  `MDP_Utilisateur` varchar(32) NOT NULL,
  `Nom_Utilisateur` varchar(32) NOT NULL,
  `Prenom_Utilisateur` varchar(32) NOT NULL,
  `Avatar_Utilisateur` varchar(255) NOT NULL,
  `Description_Utilisateur` text NOT NULL,
  `Adresse_Utilisateur` int(5) NOT NULL,
  `Mail_Utilisateur` varchar(100) NOT NULL,
  `Genre_Utilisateur` varchar(5) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `utilisateur_table`
--

INSERT INTO `utilisateur_table` (`Pseudo_Utilisateur`, `MDP_Utilisateur`, `Nom_Utilisateur`, `Prenom_Utilisateur`, `Avatar_Utilisateur`, `Description_Utilisateur`, `Adresse_Utilisateur`, `Mail_Utilisateur`, `Genre_Utilisateur`, `Date_Naissance`, `Categorie_Favorite`, `Date_Inscription`, `Admin_Utilisateur`, `OKadresse_Utilisateur`, `OKmail_Utilisateur`, `OKNomPrenom_Utilisateur`, `OKplanning_Utilisateur`, `OKAlertesEvenements_Utilisateur`, `OKAlertesAbonnements_Utilisateur`, `ID_Utilisateur`) VALUES
('test', 'testtest', 'test', 'test', '33.jpg', 'Ceci est ma prÃ©sentation.', 78200, 'test@test', '', '1993-01-22', 'Festivals Concerts ', '2015-12-01', 'oui', 'non', 'non', 'non', 'non', 'non', 'non', 33),
('Laeti', 'laetitia', 'BOUVIER', 'Laetitia', '39.jpg', 'Je fais partie du staff de La Connexion Gauloise !', 95400, 'laetitia.bouvier@isep.fr', 'F', '1995-05-12', 'Festivals Brocantes/MarchÃ©s ', '2016-01-06', '0', 'o', 'n', 'o', 'n', 'o', 'n', 39),
('KIKI12', 'laetitia', 'KIKI', 'KIKI', '49.jpg', '  azertyuio', 34576, 'laetitia.bouvier@isep.fr', 'Homme', '0002-05-12', 'Festivals Repas/Banquets Concert', '2016-01-11', '0', 'non', 'oui', 'oui', 'oui', 'oui', 'non', 49);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
