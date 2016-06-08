-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Janvier 2016 à 22:10
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `abonnerutilisateur_table`
--

INSERT INTO `abonnerutilisateur_table` (`ID_AbonnementUtilisateur`, `ID_UtilisateurAbonne`, `ID_UtilisateurCible`) VALUES
(1, 2, 1);

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
  `Note_Evenement` decimal(3,0) NOT NULL,
  `LienSiteWeb_Evenement` varchar(500) NOT NULL,
  `ID_Evenement` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_Evenement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Contenu de la table `evenement_table`
--

INSERT INTO `evenement_table` (`Nom_Evenement`, `Organisateur_Evenement`, `Image_Evenement`, `JourDebut_Evenement`, `JourFin_Evenement`, `HeureDebut_Evenement`, `HeureFin_Evenement`, `Description_Evenement`, `Sponsors_Evenement`, `NbMaxParticipants_Evenement`, `Categorie_Evenement`, `Cibles_Evenement`, `NomLieu_Evenement`, `AdresseRue_Evenement`, `AdressePostal_Evenement`, `AdresseVille_Evenement`, `AdresseDepartement_Evenement`, `AdresseRegion_Evenement`, `Payant_Evenement`, `Note_Evenement`, `LienSiteWeb_Evenement`, `ID_Evenement`) VALUES
('Concert Tame Impala', 'Laeti', '1.jpg', '2016-12-05', '2016-12-05', '19:30:00', '23:00:00', 'Concert du Groupe de Rock australien\nNouvel album : Currents\n', '', 0, 'ConfÃ©rences', 'Adultes ', 'Zenith de Paris', '', '75019', '', '', '', 'non', '0', 'http://', 1),
('Course au Jardin du Luxembourg', 'Laeti', '2.jpg', '2015-12-29', '2015-12-30', '10:30:00', '12:00:00', 'La 21 eme edition des 21km du Luxembourg\nN hesitez pas a vous inscrire !\n', '', 0, 'Manifestations', 'Enfants ', 'Jardin du Luxembourg', '', '75019', '', '', '', 'non', '2', 'http://', 2),
('Soiree Raclette', 'Laeti', '3.jpg', '2016-01-10', '2016-01-10', '20:00:00', '23:00:00', 'Soiree a la salle des fetes du XVIIIeme.\r\nVenez nombreux !\r\n', 'Tefal', 150, 'Repas/Banquets', 'Enfants Ados Adultes Seniors ', 'Salle des fetes du XVIIIe', '2 rue de Paris', '75018', 'Paris', '75-Paris', 'Ile-de-France', 'non', '4', 'http://', 3);

-- --------------------------------------------------------

--
-- Structure de la table `forum_table`
--

CREATE TABLE IF NOT EXISTS `forum_table` (
  `ID_Topic` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` int(11) NOT NULL,
  `Admin_Utilisateur` varchar(3) NOT NULL,
  `Titre_Topic` varchar(50) NOT NULL,
  `PseudoAuteur_Topic` varchar(255) NOT NULL,
  `NB_MSG` int(11) NOT NULL,
  `Dernier_MSG` datetime NOT NULL,
  PRIMARY KEY (`ID_Topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `forum_table`
--

INSERT INTO `forum_table` (`ID_Topic`, `ID_Utilisateur`, `Admin_Utilisateur`, `Titre_Topic`, `PseudoAuteur_Topic`, `NB_MSG`, `Dernier_MSG`) VALUES
(5, 2, 'non', 'Topic numÃ©ro 1', 'Laeti', 1, '2016-01-17 22:08:43');

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
(2, 3, 3),
(2, 2, 2),
(1, 3, 5);

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
(2, 3, 0),
(2, 1, 0),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `topic_table`
--

CREATE TABLE IF NOT EXISTS `topic_table` (
  `ID_Topic` int(11) NOT NULL,
  `ID_MSG` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo_MSG` varchar(255) NOT NULL,
  `Admin_Utilisateur` varchar(3) NOT NULL,
  `Date_MSG` datetime NOT NULL,
  `Contenu_MSG` text NOT NULL,
  PRIMARY KEY (`ID_MSG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `topic_table`
--

INSERT INTO `topic_table` (`ID_Topic`, `ID_MSG`, `Pseudo_MSG`, `Admin_Utilisateur`, `Date_MSG`, `Contenu_MSG`) VALUES
(5, 1, 'Laeti', 'non', '2016-01-17 22:08:24', 'Ceci est le premier message.'),
(5, 2, 'Laeti', 'non', '2016-01-17 22:08:43', 'Ceci est la premiÃ¨re rÃ©ponse au premier message.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_table`
--

CREATE TABLE IF NOT EXISTS `utilisateur_table` (
  `Pseudo_Utilisateur` varchar(32) NOT NULL,
  `MDP_Utilisateur` varchar(255) NOT NULL,
  `Nom_Utilisateur` varchar(32) NOT NULL,
  `Prenom_Utilisateur` varchar(32) NOT NULL,
  `Avatar_Utilisateur` varchar(255) NOT NULL,
  `Description_Utilisateur` text NOT NULL,
  `Adresse_Utilisateur` int(5) NOT NULL,
  `Mail_Utilisateur` varchar(100) NOT NULL,
  `Genre_Utilisateur` varchar(5) NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Categorie_Favorite` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `utilisateur_table`
--

INSERT INTO `utilisateur_table` (`Pseudo_Utilisateur`, `MDP_Utilisateur`, `Nom_Utilisateur`, `Prenom_Utilisateur`, `Avatar_Utilisateur`, `Description_Utilisateur`, `Adresse_Utilisateur`, `Mail_Utilisateur`, `Genre_Utilisateur`, `Date_Naissance`, `Categorie_Favorite`, `Date_Inscription`, `Admin_Utilisateur`, `OKadresse_Utilisateur`, `OKmail_Utilisateur`, `OKNomPrenom_Utilisateur`, `OKplanning_Utilisateur`, `OKAlertesEvenements_Utilisateur`, `OKAlertesAbonnements_Utilisateur`, `ID_Utilisateur`) VALUES
('test', '51abb9636078defbf888d8457a7c76f85c8f114c', 'test', 'test', 'profil.jpg', 'Ceci est ma prÃ©sentation.     ', 75019, 'test@test', 'Homme', '1965-01-13', 'Manifestations ', '2015-12-01', 'oui', 'non', 'non', 'non', 'non', 'non', 'non', 1),
('Laeti', '402f4fd96a9a59001e9661d71f28aa3053d2915e', 'BOUVIER', 'Laetitia', '2.jpg', 'Je fais partie du staff de La Connexion Gauloise !            ', 95400, 'laetitia.bouvier@gmail.com', 'Femme', '1995-05-12', 'Festivals Repas/Banquets Concerts Brocantes/MarchÃ©s ', '2016-01-06', 'non', 'oui', 'oui', 'oui', 'oui', 'non', 'non', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
