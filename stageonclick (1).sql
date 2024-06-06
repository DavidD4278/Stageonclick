-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 05 juin 2024 à 13:54
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stageonclick`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `date_parution` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_entreprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `domaine` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nom_gerant` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_postal` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero_tel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `domaine`, `nom_gerant`, `adresse`, `code_postal`, `ville`, `numero_tel`, `mail`, `pass`) VALUES
(7, 'Actes Formation', 'formations', 'Monsieur Vincent Rouyer', '18, impasse du soleil', '76350', 'OISSEL', '06 95 39 59 09', 'v.rouyer@actesformation.com', '$2y$10$hhuZzg/ooy0F1BCHYZaDvORmdmIS70Rev8J8dSTYOS5y3c8BoG4ju');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero_tel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pass` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `pseudo`, `date_naissance`, `mail`, `numero_tel`, `date_inscription`, `pass`) VALUES
(6, 'David', 'Delahaye', 'david7842', '1978-12-30', 'david.delahaye06@gmail.com', '06.19.71.94.42', '2024-03-18 00:00:00', '$2y$10$gSQTkBr4S.mZ4WJsxBCet.2LMPiupZxM.TrUngfHNoE6QJbJEi7Lq'),
(7, 'Julien', 'villette', 'ju', '1981-05-19', 'villettejulien@gmail.com', '0678899663', '2024-03-22 00:00:00', '$2y$10$sxZJ5f5dklihPpTkvJ1bwutIVgrqHiVYkhaaBWpe2JvOE7XzGWET.'),
(8, 'Adel', 'Medouar', 'adellevrai', '1995-12-21', 'adel@gmail.com', '0665569698', '2024-03-25 00:00:00', '$2y$10$.25vFrfVCQKxzyDHwk1tLeGVUvGSTjQjTTKT5IHWTDIXghrmGS16a'),
(9, 'marine', 'derose', 'ibey', '1993-09-09', 'derose.marine@gmail.com', '0614121212', '2024-03-25 00:00:00', '$2y$10$4/4RyhVreWZ4MJwpcyX5xOta0poxZ4qQXDyWHnbKFKTRIb80.gu7G'),
(11, 'Vincent', 'Rouyer', 'Vince', '1984-11-14', 'v.rouyer@gmail.com', '0698789878', '2024-03-30 00:00:00', '$2y$10$SaLbwY2NeMmSuaIZRAibGem8xLEvncmf2Zji6UY04pUZHxsDxxB/O'),
(13, 'Mario', 'Morkos', 'Mariodwwm', '1998-08-28', 'mariomorkos98@gmail.com', '0781286308', '2024-05-02 00:00:00', '$2y$10$epREeGeBX0FxDsL3uL4IdukrGMqJBhq7nR4TxMSTs8k/hORnl6PY6'),
(14, 'Adrien', 'Ray', 'Adriendwwm', '0082-04-19', 'adrienray1982@gmail.com', '0652146544', '2024-05-02 00:00:00', '$2y$10$tBzWaEnnfYzT8gG9wZ3yCerUdufFNpiAv22N36oJBN/RFK97P2ccG'),
(21, 'atlantes', 'kin', 'antagonist', '1980-05-07', 'antagonist.34@yahoo.fr', '0625872511', '2024-05-24 09:24:38', '$2y$10$jXipziplgAySuP4Pfa58ouvPekexiU5HZAXlxCz5JdBWzQ1VjfXa2'),
(22, 'Christine', 'Payan', 'kriss', '1974-11-17', 'etoilyne1000@yahoo.fr', '0636219886', '2024-05-24 10:57:10', '$2y$10$T1QuvSEBI9mt75hS2zh59uSw6bkF78z.foI4pXmOJuJezDTi3yMv.'),
(24, 'Matthieu', 'Idjellidaine', 'Civiere', '1995-01-13', 'matthieuidjellidaine@gmail.com', '0612698271', '2024-05-28 15:39:00', '$2y$10$ilHQCDpeKqgNlSBZQ80OYOs0Yfi5yqaCn76r0E9YXMgfxRjcou0rK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
