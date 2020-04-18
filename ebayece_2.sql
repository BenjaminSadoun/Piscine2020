-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 avr. 2020 à 20:38
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`IDAch`, `nom`, `prenom`, `email`, `mdp`, `adresse1`, `adresse2`, `ville`, `codePostal`, `pays`, `numeroTel`) VALUES
(1, 'Sadoun', 'Benjamin', 'benji.sadoun@gmail.com', 'benjamin', '4 rue de Chatillon', '2 rue de Chatillon', 'Paris', 75014, 'France', '0614094682'),
(2, 'Partouche', 'Raphael', 'raphael.partouche@edu.ece.fr', 'raphael', '2 rue de l\'Abbe Carton ', '12 rue Yves Toudic', 'Paris', 75011, 'France', '0734627732'),
(3, 'Benslimane', 'Youssef', 'youssef.benslimane@edu.ece.fr', 'youssef', '3 rue des Plantes', '', 'Paris', 75017, 'France', '0678334374'),
(4, 'Chaouat', 'Celia', 'celia.chaouat@edu.ece.fr', 'celia', '121 rue Victor Hugo', '', 'Paris', 75016, 'France', '0692384467'),
(5, 'Cohen', 'Salomé', 'salome.cohen@edu.ece.fr', 'salome', '39 Bouvelard Voltaire', '', 'Paris', 75011, 'France', '0687939472'),
(24, 'Anbari', 'Jade', 'jade.anbari@edu.ece.fr', 'jade', '3 rue des Plantes', '17 rue Saint Michel', 'Paris', 75007, 'Pays', '0789657876'),
(25, 'Wang', 'david', 'david.wang@edu.ece.fr', 'david', '4 rue de Chatillon', '17 rue Saint Michel', 'Paris', 75014, 'France', '0614094682'),
(23, 'Benarouche', 'Ephraim', 'ephraimigdal@gmail.com', 'ephraim', '12 rue de l\'abbÃ© carton', '4 rue des Plantes', 'Paris', 75015, 'France', '0634353637'),
(26, 'Guisnet', 'Valentin', 'valentin.guisnet@edu.ece.fr', 'valentin', '7 rue des lilas', '13 rue Henri Strauss', 'Paris', 75014, 'France', '0614094682'),
(27, 'Benchetrit', 'Ilan', 'ilan.benchetrit@gmail.com', 'ilan', '3 rue du faubourg saint michel', '3 rue de creteil', 'creteil', 94120, 'France', '0614094682');

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
  `typePayement` varchar(11) NOT NULL,
  `numCarte` varchar(255) NOT NULL,
  `nomCarte` varchar(255) NOT NULL,
  `dateExpi` date NOT NULL,
  `codeSecu` int(11) NOT NULL,
  PRIMARY KEY (`IDCarte`) USING BTREE,
  KEY `IDAch` (`IDAch`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cartebancaire`
--

INSERT INTO `cartebancaire` (`IDCarte`, `IDAch`, `typePayement`, `numCarte`, `nomCarte`, `dateExpi`, `codeSecu`) VALUES
(4, 27, 'Master Card', '1234 2345 3456 4567', 'M. Ilan Benchetrit', '2020-04-19', 679);

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
  `vignette` varchar(255) NOT NULL,
  PRIMARY KEY (`numID`),
  KEY `IDAch` (`IDAch`),
  KEY `IDAdm` (`IDAdm`),
  KEY `IDVend` (`IDVend`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`numID`, `IDAch`, `IDAdm`, `IDVend`, `categorie`, `prixInitial`, `prixFinal`, `nom`, `description`, `typeVente`, `dateDebut`, `dateFin`, `vignette`) VALUES
(69, 0, 0, 3, 0, 35, 35, 'Lanterne', 'Petite lanterne d\'Ã©poque', 2, '2020-04-17', '2020-04-17', 'lanterne.jpg'),
(68, 0, 0, 3, 1, 420000, 420000, 'La nuit', 'Tableau de Van Gogh', 0, '2020-04-17', '2020-04-17', 'la_nuit.jpg'),
(67, 0, 0, 2, 2, 800, 800, 'Iphone 11', 'Nouvel Iphone 11 comme neuf', 0, '2020-04-17', '2020-04-17', 'iphone11.jpg'),
(66, 0, 0, 2, 2, 900, 900, 'Ipad pro', 'Nouvel ipad pro', 0, '2020-04-17', '2020-04-17', 'ipad_pro.jpg'),
(65, 0, 0, 2, 1, 138000, 138000, 'Foulard en soie carre', 'Tableau de Monet', 2, '2020-04-17', '2020-04-17', 'foulard_en_soie_carre.jpg'),
(64, 0, 0, 1, 0, 300, 300, 'Bureau', 'Bureau d\'Ã©poque en bois de frene', 0, '2020-04-17', '2020-04-17', 'bureau.jpg'),
(63, 0, 0, 1, 2, 34000, 34000, 'Bague Dior', 'Magnifique bague dior', 1, '2020-04-17', '2020-04-17', 'bague_dior.jpg'),
(77, 0, 0, 10, 2, 35000, 35000, 'Rolex en or', 'Montre en or indÃ©modable', 2, '2020-04-17', '2020-04-17', 'rolex_or.jpg'),
(78, 0, 0, 10, 1, 20000, 20000, 'Violons de la guerre', 'Anciens violons datant de la seconde guerre mondiale', 0, '2020-04-17', '2020-04-17', 'violons_anciens.png'),
(76, 0, 0, 10, 2, 29000, 29000, 'Rolex argent', 'Rolex en argent de premiere categorie', 1, '2020-04-17', '2020-04-17', 'rolex_argent.jpg'),
(75, 0, 0, 5, 0, 3000, 3000, 'Piano trÃ¨s ancien', 'Superbe piano Ã  restaurer', 2, '2020-04-17', '2020-04-17', 'piano_ancien.jpg'),
(74, 0, 0, 5, 0, 160, 160, 'Machine a ecrire', 'machine de mon grand pere', 0, '2020-04-17', '2020-04-17', 'machine_a_ecrire.jpg'),
(73, 0, 0, 5, 0, 80, 80, 'Machine a coudre', 'machine de ma grand mere', 0, '2020-04-17', '2020-04-17', 'machine_a_coudre.jpg'),
(70, 0, 0, 4, 1, 239000, 239000, 'Le dejeuner des canotiers', 'Oeuvre de Renoir recemment retrouvee', 0, '2020-04-17', '2020-04-17', 'le_dejeuner_des_canotiers.jpg'),
(71, 0, 0, 4, 1, 550000, 550000, 'Le repos', 'Tableau de Manet', 1, '2020-04-17', '2020-04-17', 'le_repos.jpg'),
(72, 0, 0, 4, 1, 8900000, 8900000, 'les_tournesols.jpg', 'Tableau de Van Gogh authentique', 1, '2020-04-17', '2020-04-17', 'les_tournesols.jpg');

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

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`IDMedia`, `numID`, `nom`, `description`) VALUES
(47, 75, 'piano_ancien.jpg', ''),
(46, 74, 'machine_a_ecrire.jpg', ''),
(45, 73, 'machine_a_coudre.jpg', ''),
(44, 72, 'les_tournesols.jpg', ''),
(43, 71, 'le_repos.jpg', ''),
(42, 70, 'le_dejeuner_des_canotiers.jpg', ''),
(41, 69, 'lanterne.jpg', ''),
(40, 68, 'la_nuit.jpg', ''),
(39, 67, 'iphone11.jpg', ''),
(38, 66, 'ipad_pro.jpg', ''),
(37, 65, 'foulard_en_soie_carre.jpg', ''),
(36, 64, 'bureau.jpg', ''),
(35, 63, 'bague_dior.jpg', ''),
(48, 76, 'rolex_argent.jpg', ''),
(49, 77, 'rolex_or.jpg', ''),
(50, 78, 'violons_anciens.png', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`IDVend`, `IDAdm`, `nom`, `prenom`, `email`, `mdp`, `fondEcran`, `photoProfil`) VALUES
(1, 1, 'Itzkovitch', 'Jeremy', 'jeremy.itzkovitch@edu.ece.fr', 'jeremy', 'Paradis fiscal', 'photo1'),
(2, 2, 'Zhang', 'Franck', 'franck.zhang@edu.ece.fr', 'franck', '2019_11_18_11_37_IMG_2613.JPG', '2019_11_18_11_04_IMG_2615.JPG'),
(3, 1, 'Wang', 'David', 'david.wang@edu.ece.fr', 'david', 'cynthia', 'photoplage'),
(4, 0, 'Haccoun', 'Solene', 'solene.haccoun@edu.ece.fr', 'solene', '', ''),
(5, 0, 'Bouhnik', 'Raphael', 'raphael.bouhnik@edu.ece.fr', 'raphael', '', ''),
(10, 1, 'emma', 'chauvet', 'emma@hotmail.fr', 'emma', 'fox-snow-qi-2048x1152.jpg', 'integration_ingÃ©.jpg'),
(18, 0, 'Creno', 'Danny', 'danny.creno@gmail.com', 'danny', 'bague_dior.jpg', 'bague_cartier.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
