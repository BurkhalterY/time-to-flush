-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 27 mars 2021 à 18:45
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `time2flush`
--

-- --------------------------------------------------------

--
-- Structure de la table `matters`
--

CREATE TABLE `matters` (
  `id` int(11) NOT NULL,
  `matter` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matters`
--

INSERT INTO `matters` (`id`, `matter`, `day`, `start`, `end`) VALUES
(1, 'i145', 3, '08:45:00', '09:30:00'),
(2, 'i239', 3, '09:45:00', '10:30:00'),
(3, 'i300', 3, '10:30:00', '11:15:00'),
(4, 'i157', 3, '12:00:00', '12:45:00'),
(5, 'i182', 3, '12:45:00', '13:30:00'),
(6, 'Math', 3, '14:30:00', '15:15:00'),
(7, 'Sciences', 3, '15:15:00', '16:00:00'),
(8, 'i182', 3, '13:45:00', '14:30:00'),
(9, 'i141', 4, '08:00:00', '08:45:00'),
(10, 'Économie', 4, '08:45:00', '09:30:00'),
(11, 'Économie', 4, '09:45:00', '10:30:00'),
(12, 'ECG', 4, '10:30:00', '11:15:00'),
(13, 'ECG', 4, '11:15:00', '12:00:00'),
(14, 'ECG', 4, '12:45:00', '13:30:00'),
(15, 'Anglais', 4, '13:45:00', '14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `fk_matter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `records`
--

INSERT INTO `records` (`id`, `start_time`, `end_time`, `fk_matter`) VALUES
(3, '2021-03-26 23:25:37', '2021-03-26 23:25:41', NULL),
(4, '2021-03-26 23:55:14', '2021-03-26 23:55:18', NULL),
(5, '2021-03-27 00:51:47', '2021-03-27 00:51:53', NULL),
(6, '2021-03-27 00:55:47', '2021-03-27 00:55:59', NULL),
(7, '2021-03-17 09:30:02', '2021-03-17 09:39:11', 1),
(8, '2021-03-27 02:14:58', '2021-03-27 02:15:03', NULL),
(9, '2021-03-27 02:18:42', '2021-03-27 03:18:52', NULL),
(10, '2021-03-27 18:40:09', '2021-03-27 18:40:20', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `matters`
--
ALTER TABLE `matters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matter` (`fk_matter`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matters`
--
ALTER TABLE `matters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`fk_matter`) REFERENCES `matters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
