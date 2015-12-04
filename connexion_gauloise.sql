-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Décembre 2015 à 11:02
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
  `Admin_Utilisateur` binary(1) NOT NULL,
  `OKadresse_Utilisateur` binary(1) NOT NULL,
  `OKmail_Utilisateur` binary(1) NOT NULL,
  `OKNomPrenom_Utilisateur` binary(1) NOT NULL,
  `OKplanning_Utilisateur` binary(1) NOT NULL,
  `OKAlertesEvenements_Utilisateur` binary(1) NOT NULL,
  `OKAlertesAbonnements_Utilisateur` binary(1) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `utilisateur_table`
--

INSERT INTO `utilisateur_table` (`Pseudo_Utilisateur`, `MDP_Utilisateur`, `Nom_Utilisateur`, `Prenom_Utilisateur`, `Avatar_Utilisateur`, `Description_Utilisateur`, `Adresse_Utilisateur`, `Mail_Utilisateur`, `Genre_Utilisateur`, `Date_Naissance`, `Categorie_Favorite`, `Date_Inscription`, `Admin_Utilisateur`, `OKadresse_Utilisateur`, `OKmail_Utilisateur`, `OKNomPrenom_Utilisateur`, `OKplanning_Utilisateur`, `OKAlertesEvenements_Utilisateur`, `OKAlertesAbonnements_Utilisateur`, `id`) VALUES
('test', 'testtest', 'test', 'test', '', 'test', 78200, 'test@test', '', '1993-01-22', 'Festivals Concerts Soirées ', '2015-12-01', '0', '\0', '\0', '\0', '\0', '1', '\0', 33);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
