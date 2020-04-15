-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 08:42
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ebayece`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `IDAch` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `numeroTel` varchar(255) NOT NULL,
  PRIMARY KEY (`IDAch`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`IDAch`, `nom`, `prenom`, `email`, `mdp`, `adresse1`, `adresse2`, `ville`, `codePostal`, `pays`, `numeroTel`) VALUES
(1, 'Sadoun', 'Benjamin', 'benji.sadoun@gmail.com', 'benjamin', '4 rue de Chatillon', '2 rue de Chatillon', 'Paris', 75014, 'France', '0614094682'),
(2, 'Partouche', 'Raphael', 'raphael.partouche@edu.ece.fr', 'raphael', '2 rue de l\'Abbe Carton ', '12 rue Yves Toudic', 'Paris', 75011, 'France', '0734627732'),
(3, 'Benslimane', 'Youssef', 'youssef.benslimane@edu.ece.fr', 'youssef', '3 rue des Plantes', '', 'Paris', 75017, 'France', '0678334374'),
(4, 'Chaouat', 'Celia', 'celia.chaouat@edu.ece.fr', 'celia', '121 rue Victor Hugo', '', 'Paris', 75016, 'France', '0692384467'),
(5, 'Cohen', 'Salomé', 'salome.cohen@edu.ece.fr', 'salome', '39 Bouvelard Voltaire', '', 'Paris', 75011, 'France', '0687939472'),
(6, 'Sadoun', 'Benjamin', 'benji.sadounnnnnnnnn@gmail.com', '', '4 rue de Chatillon', '2 rue de Chatillon', 'Paris', 75014, '', '0614094682'),
(7, 'Sadounnnnnnnnn', 'Benjamin', 'bennnnnnnnnn@gmail.com', '', '4 rue de Chatillon', '2 rue de Chatillon', 'Paris', 75014, '', '0614094682');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IDAdm` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`IDAdm`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IDAdm`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'Sadoun', 'Benjamin', 'benji.sadoun@gmail.com', 'benjamin'),
(2, 'Chauvet', 'Emma', 'emmachauvet@hotmail.fr', 'emma'),
(3, 'Ferret', 'Colin', 'colin.ferret@edu.ece.fr', 'colin');

-- --------------------------------------------------------

--
-- Structure de la table `cartebancaire`
--

DROP TABLE IF EXISTS `cartebancaire`;
CREATE TABLE IF NOT EXISTS `cartebancaire` (
  `IDCarte` int(11) NOT NULL AUTO_INCREMENT,
  `IDAch` int(11) NOT NULL,
  `typePayement` int(11) NOT NULL,
  `numCarte` varchar(255) NOT NULL,
  `nomCarte` varchar(255) NOT NULL,
  `dateExpi` date NOT NULL,
  `codeSecu` int(11) NOT NULL,
  PRIMARY KEY (`IDCarte`) USING BTREE,
  KEY `IDAch` (`IDAch`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cartebancaire`
--

INSERT INTO `cartebancaire` (`IDCarte`, `IDAch`, `typePayement`, `numCarte`, `nomCarte`, `dateExpi`, `codeSecu`) VALUES
(1, 1, 1, '10291293192301232', 'Carte professionelle', '2020-04-12', 3434),
(2, 2, 1, '1234123423453456', 'Carte shopping', '2021-06-01', 4566),
(3, 2, 2, '9999888877776666', 'carte commune', '2020-06-05', 3432);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `numID` int(11) NOT NULL AUTO_INCREMENT,
  `IDAch` int(11) NOT NULL,
  `IDAdm` int(11) NOT NULL,
  `IDVend` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `prixInitial` int(11) NOT NULL,
  `prixFinal` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `typeVente` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`numID`),
  KEY `IDAch` (`IDAch`),
  KEY `IDAdm` (`IDAdm`),
  KEY `IDVend` (`IDVend`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`numID`, `IDAch`, `IDAdm`, `IDVend`, `categorie`, `prixInitial`, `prixFinal`, `nom`, `description`, `typeVente`, `dateDebut`, `dateFin`) VALUES
(1, 1, 1, 3, 1, 30, 30, 'ceinture', 'ceinture symptoche', 1, '2020-04-15', '2021-04-04'),
(2, 2, 3, 1, 2, 15000, 15000, 'Rolex', 'Montre de mariage a vendre, c\'est la hess', 2, '2020-04-15', '2021-04-15');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `IDMedia` int(11) NOT NULL AUTO_INCREMENT,
  `numID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`IDMedia`),
  KEY `numID` (`numID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`IDMedia`, `numID`, `nom`, `description`) VALUES
(1, 1, 'Photo', 'Photo de la ceinture'),
(2, 2, 'Video', 'Video de la montre');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `IDTrans` int(11) NOT NULL AUTO_INCREMENT,
  `IDAch` int(11) NOT NULL,
  `IDVend` int(11) NOT NULL,
  `numID` int(11) NOT NULL,
  `enchere` tinyint(1) NOT NULL,
  `meilleureOffre` tinyint(1) NOT NULL,
  `achatImmediat` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDTrans`),
  KEY `IDAch` (`IDAch`),
  KEY `IDVend` (`IDVend`),
  KEY `numID` (`numID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`IDTrans`, `IDAch`, `IDVend`, `numID`, `enchere`, `meilleureOffre`, `achatImmediat`) VALUES
(1, 2, 3, 1, 0, 1, 0),
(2, 2, 1, 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `IDVend` int(11) NOT NULL AUTO_INCREMENT,
  `IDAdm` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `fondEcran` varchar(255) NOT NULL,
  `photoProfil` varchar(255) NOT NULL,
  PRIMARY KEY (`IDVend`),
  KEY `IDAdm` (`IDAdm`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`IDVend`, `IDAdm`, `nom`, `prenom`, `email`, `mdp`, `fondEcran`, `photoProfil`) VALUES
(1, 1, 'Itzkovitch', 'Jeremy', 'jeremy.itzkovitch@edu.ece.fr', 'jeremy', 'Paradis fiscal', 'photo1'),
(2, 2, 'Zhang', 'Franck', 'franck.zhang@edu.ece.fr', 'franck', 'singapour', 'photo1'),
(3, 1, 'Wang', 'David', 'david.wang@edu.ece.fr', 'david', 'cynthia', 'photoplage');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
