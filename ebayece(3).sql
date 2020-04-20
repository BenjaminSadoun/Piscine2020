-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 20:47
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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`IDAch`, `nom`, `prenom`, `email`, `mdp`, `adresse1`, `adresse2`, `ville`, `codePostal`, `pays`, `numeroTel`) VALUES
(1, 'Partouche', 'Raphael', 'raphael.partouche@edu.ece.fr', 'raphael', '2 rue de l\'Abbe Carton ', '12 rue Yves Toudic', 'Paris', 75011, 'France', '0734627732'),
(2, 'Benslimane', 'Youssef', 'youssef.benslimane@edu.ece.fr', 'youssef', '3 rue des Plantes', '7 rue des Chaussees', 'Paris', 75017, 'France', '0678334374'),
(3, 'Chaouat', 'Celia', 'celia.chaouat@edu.ece.fr', 'celia', '121 rue Victor Hugo', '123 avenue des Bretelles', 'Paris', 75016, 'France', '0692384467'),
(4, 'Anbari', 'Jade', 'jade.anbari@edu.ece.fr', 'jade', '3 rue des Plantes', '17 rue Saint Michel', 'Paris', 75007, 'Pays', '0789657876'),
(5, 'Wang', 'david', 'david.wang@edu.ece.fr', 'david', '4 rue de Chatillon', '18 rue des Abondances', 'Paris', 75014, 'France', '0614094682'),
(6, 'Guisnet', 'Valentin', 'valentin.guisnet@edu.ece.fr', 'valentin', '7 rue des lilas', '13 rue Henri Strauss', 'Paris', 75014, 'France', '0614094682'),
(7, 'Tang', 'Sandra', 'sandra.tang@edu.ece.fr', 'sandra', '18 Rue des ficelles', '15 avenue de Longchamps', 'Paris', 75010, 'France', '0635746288');

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
(1, 'Sadoun', 'Benjamin', 'benjamin.sadoun@edu.ece.fr', 'benjamin'),
(2, 'Chauvet', 'Emma', 'emma.chauvet@edu.ece.fr', 'emma'),
(3, 'Ferret', 'Colin', 'colin.ferret@edu.ece.fr', 'colin');

-- --------------------------------------------------------

--
-- Structure de la table `cartebancaire`
--

DROP TABLE IF EXISTS `cartebancaire`;
CREATE TABLE IF NOT EXISTS `cartebancaire` (
  `IDCarte` int(11) NOT NULL AUTO_INCREMENT,
  `IDAch` int(11) NOT NULL,
  `typePayement` varchar(255) NOT NULL,
  `numCarte` varchar(255) NOT NULL,
  `nomCarte` varchar(255) NOT NULL,
  `dateExpi` date NOT NULL,
  `codeSecu` int(11) NOT NULL,
  `solde` bigint(250) NOT NULL,
  PRIMARY KEY (`IDCarte`) USING BTREE,
  KEY `IDAch` (`IDAch`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cartebancaire`
--

INSERT INTO `cartebancaire` (`IDCarte`, `IDAch`, `typePayement`, `numCarte`, `nomCarte`, `dateExpi`, `codeSecu`, `solde`) VALUES
(1, 1, 'Master Card', '1234 2345 3456 4567', 'M. Raphael Partouche', '2020-07-19', 679, 7000),
(5, 7, 'American Express', '2938 2837 4664 4343', 'Mme Sandra Tang', '2021-09-02', 562, 300000),
(3, 3, 'Master Card', '1925 7463 8760 9832', 'Mme Celia Chaouat', '2021-07-16', 123, 150000),
(4, 4, 'VISA', '0394 8495 9384 9304', 'Mme Jade Anbari', '2020-09-18', 946, 2500000),
(2, 2, 'VISA', '1010 2020 3030 4040', 'M. Benslimane Youssef', '2020-07-08', 123, 100000000),
(6, 5, 'Paypal', '9837 4859 2637 0438', 'M. David Wang', '2020-10-15', 239, 50),
(7, 6, 'American Express', '2340 5745 0495 3849', 'M. Valentin Guisnet', '2021-07-22', 793, 555);

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
  `description` text NOT NULL,
  `typeVente` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `vignette` varchar(255) NOT NULL,
  PRIMARY KEY (`numID`),
  KEY `IDAch` (`IDAch`),
  KEY `IDAdm` (`IDAdm`),
  KEY `IDVend` (`IDVend`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`numID`, `IDAch`, `IDAdm`, `IDVend`, `categorie`, `prixInitial`, `prixFinal`, `nom`, `description`, `typeVente`, `dateDebut`, `dateFin`, `vignette`) VALUES
(1, 0, 0, 3, 0, 35, 35, 'Lanterne', 'Petite lanterne d\'epoque', 2, '2020-04-17', '2020-04-17', 'lanterne.jpg'),
(2, 0, 0, 7, 1, 400000, 400000, 'La nuit', 'Tableau de Van Gogh', 1, '2020-04-17', '2020-04-17', 'la_nuit.jpg'),
(3, 0, 0, 2, 2, 800, 800, 'Iphone 11', 'Nouvel Iphone 11 neuf', 2, '2020-04-17', '2020-04-17', 'iphone11.jpg'),
(4, 0, 0, 2, 2, 900, 900, 'Ipad pro', 'Nouvel ipad pro', 2, '2020-04-17', '2020-04-17', 'ipad_pro.jpg'),
(5, 0, 0, 2, 1, 120000, 120000, 'Foulard en soie carre', 'Tableau de Monet', 2, '2020-04-17', '2020-04-17', 'foulard_en_soie_carre.jpg'),
(6, 0, 0, 1, 0, 300, 300, 'Bureau', 'Bureau d\'epoque en bois de frene', 0, '2020-04-17', '2020-04-17', 'bureau.jpg'),
(7, 0, 0, 1, 2, 34000, 34000, 'Bague Dior', 'Magnifique bague dior', 1, '2020-04-17', '2020-04-17', 'baguedior.jpg'),
(8, 0, 0, 5, 2, 35000, 35000, 'Rolex en or', 'Montre en or indemodable', 2, '2020-04-17', '2020-04-17', 'rolex_or.jpg'),
(9, 0, 0, 6, 1, 700, 700, 'Violons de la guerre', 'Violons de la guerre', 1, '2020-04-17', '2020-04-17', 'violons_anciens.png'),
(10, 0, 0, 6, 2, 29000, 29000, 'Rolex argent', 'Rolex en argent de premiere categorie', 1, '2020-04-17', '2020-04-17', 'montrerolex.jpg'),
(11, 0, 0, 4, 0, 700, 700, 'Piano tres ancien', 'Superbe piano ', 2, '2020-04-17', '2020-04-17', 'piano_ancien.jpg'),
(12, 0, 0, 4, 0, 160, 160, 'Machine a ecrire', 'machine de mon grand pere', 0, '2020-04-17', '2020-04-17', 'machine_a_ecrire.jpg'),
(13, 0, 0, 5, 0, 120, 120, 'Machine a coudre', 'machine de ma grand mere', 0, '2020-04-17', '2020-04-17', 'machineacoudre.jpg'),
(14, 0, 0, 3, 1, 90000, 90000, 'Le dejeuner des canotiers', 'Oeuvre de Renoir recemment retrouvee', 1, '2020-04-17', '2020-04-17', 'le_dejeuner_des_canotiers.jpg'),
(15, 0, 0, 7, 1, 330000, 330000, 'Le repos', 'Tableau de Manet', 1, '2020-04-17', '2020-04-17', 'le_repos.jpg'),
(16, 0, 0, 4, 1, 637000, 637000, 'Les tournesols', 'Tableau de Van Gogh authentique', 1, '2020-04-17', '2020-04-17', 'les_tournesols.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

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
  `offre` int(11) NOT NULL,
  `contreOffre` int(11) NOT NULL,
  `compteur` int(11) NOT NULL,
  PRIMARY KEY (`IDTrans`),
  KEY `IDAch` (`IDAch`),
  KEY `IDVend` (`IDVend`),
  KEY `numID` (`numID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`IDVend`, `IDAdm`, `nom`, `prenom`, `email`, `mdp`, `fondEcran`, `photoProfil`) VALUES
(1, 1, 'Itzkovitch', 'Jeremy', 'jeremy.itzkovitch@edu.ece.fr', 'jeremy', 'fd1.jpg', 'pp1.jpg'),
(2, 1, 'Zhang', 'Franck', 'franck.zhang@edu.ece.fr', 'franck', 'fd2.jpg', 'pp2.jpg'),
(4, 1, 'Haccoun', 'Solene', 'solene.haccoun@edu.ece.fr', 'solene', 'fd3.jpg', 'pp3.jpg'),
(5, 1, 'Bouhnik', 'Raphael', 'raphael.bouhnik@edu.ece.fr', 'raphael', 'fd4.jpg', 'pp4.jpg'),
(6, 1, 'Creno', 'Danny', 'danny.creno@edu.ece.com', 'danny', 'fd5.jpg', 'pp5.jpg'),
(3, 1, 'Gnenago', 'Grace', 'grace.gnenago@edu.ece.fr', 'grace', 'fd6.jpg', 'pp6.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
