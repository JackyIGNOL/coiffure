-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 déc. 2020 à 14:39
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saloncoiffure`
--

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

DROP TABLE IF EXISTS `semaine`;
CREATE TABLE IF NOT EXISTS `semaine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horaire` json DEFAULT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `semaine`
--

INSERT INTO `semaine` (`id`, `jour`, `horaire`) VALUES
(1, 'Monday', '[\"10\", \"11\", \"6\", \"8\", \"9\", \"12\", \"7\"]'),
(2, 'Tuesday', '[\"6\", \"19\", \"7\", \"8\", \"9\", \"10\", \"11\", \"12\", \"13\"]'),
(3, 'Wednesday', '{\"1\": \"15\", \"2\": \"11\", \"3\": \"10\", \"4\": \"9\", \"5\": \"8\", \"6\": \"12\"}'),
(4, 'Thursday', '{\"0\": \"8\", \"3\": \"9\"}'),
(5, 'Friday', '[\"7\"]'),
(6, 'Saturday', '[\"10\"]'),
(7, 'Sunday', '[\"9\", \"10\"]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
