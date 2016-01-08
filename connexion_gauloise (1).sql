-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Janvier 2016 à 16:17
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
  `Image_Evenement` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Contenu de la table `evenement_table`
--

INSERT INTO `evenement_table` (`Nom_Evenement`, `Organisateur_Evenement`, `Image_Evenement`, `JourDebut_Evenement`, `JourFin_Evenement`, `HeureDebut_Evenement`, `HeureFin_Evenement`, `Description_Evenement`, `NbMaxParticipants_Evenement`, `Categorie_Evenement`, `Cibles_Evenement`, `NomLieu_Evenement`, `AdresseRue_Evenement`, `AdressePostal_Evenement`, `AdresseVille_Evenement`, `AdresseDepartement_Evenement`, `AdresseRegion_Evenement`, `Payant_Evenement`, `LienSiteWeb_Evenement`, `ID_Evenement`) VALUES
('test', '', 'event.jpg', '1993-01-22', '1993-01-22', '22:00:00', '23:30:00', 'test', 20, 'Repas/Banquets', 'Bas-âge Enfants ', 'test', '666', '78200', 'Paris', '', '', '0', 'http://google.com', 1),
('test', '', 'event.jpg', '1993-01-22', '1993-01-22', '19:00:00', '22:00:00', 'test', 20, 'Soirées', 'Bas-âge Enfants ', 'test', '666', '78200', 'Paris', '', '', '0', 'http://google.com', 2),
('lolp', '', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'te', 0, 'Festivals', 'Enfants ', 'Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 45),
('aaaaaa', '', 'event.jpg', '2016-01-06', '2016-01-06', '21:16:00', '21:16:00', 'test', 23, 'Festivals', 'Bas-Ã¢ge ', 'par', 'afafz', '95400', 'da', '12-Aveyron', 'Bretagne', 'non', 'http://google.com', 46),
('zej', 'Laeti', '47.png', '2016-01-06', '2016-01-06', '21:18:00', '17:18:00', 'ye', 0, 'Manifestations', 'Bas-Ã¢ge ', 'par', '', '95400', '', 'Selectionner', 'Selectionner', 'non', 'http://', 47),
('Vide Grenier', '', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'azga', 0, 'Festivals', 'Ados ', 'Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 48),
('Vide Grenier', '', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'qddf', 0, 'Festivals', 'Enfants ', 'Paris', '', '12321', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 49),
('MERDE', '', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'lol', 0, 'Manifestations', 'Bas-Ã¢ge ', 'zer', '', '75019', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 50),
('PRIONS', '', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', '123', 0, 'Concerts', 'Adultes ', 'Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'non', 'http://', 51),
('Concert Tame Impala', 'Laeti', 'tameimpala.jpg', '2016-11-02', '2016-11-02', '19:30:00', '23:00:00', 'Concert du Groupe de Rock australien\nNouvel album : Currents\n', 0, 'ConfÃ©rences', 'Adultes ', 'Zenith de Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'non', 'http://', 52),
('Course au Jardin du Luxembourg', 'Laeti', 'course.jpeg', '2016-05-24', '2016-05-24', '10:30:00', '12:00:00', 'La 21 eme edition des 21km du Luxembourg\nN hesitez pas a vous inscrire !\n', 0, 'Manifestations', 'Enfants ', 'Jardin du Luxembourg', '', '75019', '', 'Selectionner', 'Selectionner', 'non', 'http://', 53),
('Soiree Raclette', 'Laeti', 'raclette.jpg', '2016-10-23', '2016-10-23', '20:00:00', '23:00:00', 'Soiree a la salle des fetes du XVIIIeme.\nVenez nombreux !\n', 150, 'Repas/Banquets', 'Ados ', 'Salle des fêtes du XVIIIè', '2 rue de Paris', '75018', '', 'Selectionner', 'Selectionner', 'non', 'http://', 54),
('allez', 'Laeti', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'ssss', 0, 'Festivals', 'Enfants ', 'zer', '', '75019', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 55),
('kekette', '', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'ugfd', 0, 'Festivals', 'Ados ', 'Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'non', 'http://', 56),
('kekette2', 'Laeti', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'oiuy', 0, 'Festivals', 'Ados ', 'Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'non', 'http://', 57),
('Vide Grenier', 'Laeti', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'desc', 0, 'Humanitaires', 'Ados ', 'Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'non', 'http://', 58),
('kekette1000', 'Laeti', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'zeee', 0, 'Concerts', 'Enfants ', 'Salle des fÃªtes du XVIIIÃ¨', '', '75019', '', 'Selectionner', 'Alsace', 'oui', 'http://', 59),
('Event', 'Laeti', 'event.jpg', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'Event', 0, 'Festivals', 'Ados ', 'Salle des fÃªtes du XVIII', '', '12321', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 60),
('mlkjhgfd', 'Laeti', 'event.jpg', '2016-10-23', '2016-10-23', '00:00:00', '00:00:00', 'wcvbjkl', 0, 'Concerts', 'Adultes ', 'zer', '', '12321', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 61),
('zouuuuu', 'Laeti', '62.png', '2015-12-05', '2015-12-25', '00:00:00', '00:00:00', 'azerty', 0, 'Festivals', 'Enfants ', 'Paris', '', '75019', '', 'Selectionner', 'Selectionner', 'oui', 'http://', 62);

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

--
-- Contenu de la table `participation_table`
--

INSERT INTO `participation_table` (`ID_Utilisateur`, `ID_Evenement`, `NbReservations_Participation`) VALUES
(39, 62, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `utilisateur_table`
--

INSERT INTO `utilisateur_table` (`Pseudo_Utilisateur`, `MDP_Utilisateur`, `Nom_Utilisateur`, `Prenom_Utilisateur`, `Avatar_Utilisateur`, `Description_Utilisateur`, `Adresse_Utilisateur`, `Mail_Utilisateur`, `Genre_Utilisateur`, `Date_Naissance`, `Categorie_Favorite`, `Date_Inscription`, `Admin_Utilisateur`, `OKadresse_Utilisateur`, `OKmail_Utilisateur`, `OKNomPrenom_Utilisateur`, `OKplanning_Utilisateur`, `OKAlertesEvenements_Utilisateur`, `OKAlertesAbonnements_Utilisateur`, `ID_Utilisateur`) VALUES
('test', 'testtest', 'test', 'test', '', 'test', 78200, 'test@test', '', '1993-01-22', 'Festivals Concerts Soirées ', '2015-12-01', '0', '\0', '\0', '\0', '\0', '1', '\0', 33),
('AAA', 'AAAAAA', 'AAA', 'AAA', 0x31323333393437335f3939343539343734303631303930305f353037353730303334333332363835303734365f6f2e6a7067, '  ', 12122, 'laetitia.bouvier@isep.fr', '', '1212-12-12', '', '2015-12-18', '0', '\0', '\0', '\0', '\0', '1', '1', 35),
('LOLLOL', 'LOLLOL', 'LOL', 'LOL', 0x31323333393437335f3939343539343734303631303930305f353037353730303334333332363835303734365f6f2e6a7067, '  ', 11111, 'laetitia.bouvier@isep.fr', '', '0011-11-11', '', '2015-12-18', '0', '\0', '\0', '\0', '\0', '1', '1', 36),
('LOLLAA', 'lollol', 'LOL', 'LOL', 0x31323333393437335f3939343539343734303631303930305f353037353730303334333332363835303734365f6f2e6a7067, '  ', 11111, 'laetitia.bouvier@isep.fr', '', '0011-11-11', '', '2015-12-18', '0', '\0', '\0', '\0', '\0', '1', '1', 37),
('AZERTY', 'AAAAAA', 'aaaa', 'aaaa', '', '    ', 12345, 'a@gmail.com', '', '0000-00-00', '', '2016-01-05', '0', '\0', '\0', '\0', '\0', '\0', '\0', 38),
('Laeti', 'laetitia', 'BOUVIER', 'Laetitia', '', 'Je fais partie du staff de La Connexion Gauloise !', 95400, 'laetitia.bouvier@isep.fr', 'F', '1995-05-12', 'Festivals Brocantes/MarchÃ©s ', '2016-01-06', '0', 'o', 'n', 'o', 'n', 'o', 'n', 39);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
