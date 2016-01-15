-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 15 Janvier 2016 à 14:13
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `connexion_gauloise`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum_table`
--

CREATE TABLE `forum_table` (
  `ID_Topic` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL,
  `Admin_Utilisateur` varchar(3) NOT NULL,
  `Titre_Topic` varchar(50) NOT NULL,
  `PseudoAuteur_Topic` varchar(255) NOT NULL,
  `NB_MSG` int(11) NOT NULL,
  `Dernier_MSG` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `forum_table`
--
ALTER TABLE `forum_table`
  ADD PRIMARY KEY (`ID_Topic`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `forum_table`
--
ALTER TABLE `forum_table`
  MODIFY `ID_Topic` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
