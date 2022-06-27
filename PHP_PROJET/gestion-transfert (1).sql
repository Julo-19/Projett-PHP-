-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 12 déc. 2021 à 15:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion-transfert`
--

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

DROP TABLE IF EXISTS `transfert`;
CREATE TABLE IF NOT EXISTS `transfert` (
  `ID_TRANSFERT` int(11) NOT NULL AUTO_INCREMENT,
  `MONTANT_TRANSFERT` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `EMMETEUR` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `RECEPTEUR` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `FRAIS_TRANSFERT` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `DATE_ENVOIE` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `CODE` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID_TRANSFERT`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `transfert`
--

INSERT INTO `transfert` (`ID_TRANSFERT`, `MONTANT_TRANSFERT`, `EMMETEUR`, `RECEPTEUR`, `FRAIS_TRANSFERT`, `DATE_ENVOIE`, `CODE`) VALUES
(26, '7000', 'WALY', 'MOUSTAPHA', ' 300', ' 2021-12-09 ', '0007'),
(28, '60.00', 'Khadija', 'Babacar', ' 400', ' 2021-12-09 ', '1234'),
(36, '100.000', 'Souleymane', 'Abdou', ' 1000', ' 2021-12-14 ', '1423'),
(39, '45000', 'Moussa', 'Fatima', ' 250', ' 2020-12-14 ', '1997');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `PRENOM` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `TEL` int(11) NOT NULL,
  `EMAIL` text COLLATE latin1_general_ci NOT NULL,
  `MDP` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `NOM`, `PRENOM`, `TEL`, `EMAIL`, `MDP`) VALUES
(79, 'BARRO', 'Souleymane', 774560983, 'souleymanekeitabarro@gmail.com', '5751474cce8e0ed569028dc288e676374a196a92'),
(80, 'Souleymane', 'BARRO', 770983938, 'souleymanekeitabarro@gmail.com', 'd1d398678d74a802e7546697a969010013f59348');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
