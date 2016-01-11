-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Janvier 2016 à 15:33
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `connexion_gauloise`
--

-- --------------------------------------------------------

--
-- Structure de la table `topic_table`
--

CREATE TABLE `topic_table` (
  `ID_Topic` int(11) NOT NULL,
  `ID_MSG` int(11) NOT NULL,
  `Pseudo_MSG` varchar(255) NOT NULL,
  `Date_MSG` datetime NOT NULL,
  `Contenu_MSG` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `topic_table`
--
ALTER TABLE `topic_table`
  ADD PRIMARY KEY (`ID_MSG`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `topic_table`
--
ALTER TABLE `topic_table`
  MODIFY `ID_MSG` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=205;
