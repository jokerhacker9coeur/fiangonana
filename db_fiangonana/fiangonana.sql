-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 30 sep. 2024 à 13:26
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fiangonana`
--

-- --------------------------------------------------------

--
-- Structure de la table `adidy`
--

CREATE TABLE `adidy` (
  `id_adidy` int(11) NOT NULL,
  `id_kristianina` int(11) NOT NULL,
  `nom_adidy` varchar(255) NOT NULL,
  `date_adidy` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faritra`
--

CREATE TABLE `faritra` (
  `id_faritra` int(11) NOT NULL,
  `id_kristianina` int(11) NOT NULL,
  `nom_faritra` varchar(255) NOT NULL,
  `geo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fikambanana`
--

CREATE TABLE `fikambanana` (
  `id_fikambanana` int(11) NOT NULL,
  `id_kristianina` int(11) NOT NULL,
  `nom_fikambanana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `kristianina`
--

CREATE TABLE `kristianina` (
  `id_kristianina` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `nom_faritra` varchar(255) NOT NULL,
  `situation_geo` varchar(255) NOT NULL,
  `sakramenta` text NOT NULL,
  `nom_fikambanana` varchar(255) NOT NULL,
  `nom_vaomiera` varchar(255) NOT NULL,
  `pere` varchar(255) NOT NULL,
  `mere` varchar(255) NOT NULL,
  `nom_adidy` varchar(255) NOT NULL,
  `date_adidy` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vaomiera`
--

CREATE TABLE `vaomiera` (
  `id_vaomiera` int(11) NOT NULL,
  `id_kristianina` int(11) NOT NULL,
  `nom_vaomiera` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD PRIMARY KEY (`id_adidy`),
  ADD KEY `id_kristianiana` (`id_kristianina`);

--
-- Index pour la table `faritra`
--
ALTER TABLE `faritra`
  ADD PRIMARY KEY (`id_faritra`),
  ADD KEY `id_kristianiana` (`id_kristianina`);

--
-- Index pour la table `fikambanana`
--
ALTER TABLE `fikambanana`
  ADD PRIMARY KEY (`id_fikambanana`),
  ADD KEY `id_kristianiana` (`id_kristianina`);

--
-- Index pour la table `kristianina`
--
ALTER TABLE `kristianina`
  ADD PRIMARY KEY (`id_kristianina`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vaomiera`
--
ALTER TABLE `vaomiera`
  ADD PRIMARY KEY (`id_vaomiera`),
  ADD KEY `id_kristianiana` (`id_kristianina`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adidy`
--
ALTER TABLE `adidy`
  MODIFY `id_adidy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `faritra`
--
ALTER TABLE `faritra`
  MODIFY `id_faritra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `fikambanana`
--
ALTER TABLE `fikambanana`
  MODIFY `id_fikambanana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `kristianina`
--
ALTER TABLE `kristianina`
  MODIFY `id_kristianina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `vaomiera`
--
ALTER TABLE `vaomiera`
  MODIFY `id_vaomiera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adidy`
--
ALTER TABLE `adidy`
  ADD CONSTRAINT `adidy_ibfk_1` FOREIGN KEY (`id_kristianina`) REFERENCES `kristianina` (`id_kristianina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `faritra`
--
ALTER TABLE `faritra`
  ADD CONSTRAINT `faritra_ibfk_1` FOREIGN KEY (`id_kristianina`) REFERENCES `kristianina` (`id_kristianina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fikambanana`
--
ALTER TABLE `fikambanana`
  ADD CONSTRAINT `fikambanana_ibfk_1` FOREIGN KEY (`id_kristianina`) REFERENCES `kristianina` (`id_kristianina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vaomiera`
--
ALTER TABLE `vaomiera`
  ADD CONSTRAINT `vaomiera_ibfk_1` FOREIGN KEY (`id_kristianina`) REFERENCES `kristianina` (`id_kristianina`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
