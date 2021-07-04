-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 juil. 2021 à 18:15
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nbr_livresempr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id`, `nom`, `prenom`, `nbr_livresempr`) VALUES
(1, 'Rameaux', 'Jean', 3),
(2, 'Dubois', 'Olivier', 0),
(3, 'Reyes', 'Luciela', 0),
(4, 'Munn', 'Gregory', 0),
(5, 'Perth', 'Constance', 0),
(6, 'Atlas', 'Viquel', 0),
(7, 'Jobs', 'Steve', 0);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_adherent` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retourmax` date NOT NULL,
  `date_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `id_livre`, `id_adherent`, `date_emprunt`, `date_retourmax`, `date_retour`) VALUES
(10, 4, 1, '2021-07-02', '2021-07-16', '2021-07-06'),
(11, 2, 1, '2021-06-28', '2021-07-12', '2021-07-05'),
(12, 1, 1, '2021-06-25', '2021-07-09', '2021-07-09');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `id_rayon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `auteur`, `disponible`, `id_rayon`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', 0, 1),
(2, 'Ça', 'Stephen King', 0, 2),
(3, 'L\'Attaque des Titans', 'Hajime Isayama', 1, 3),
(4, 'L\'Astronomie Pour les Nuls', 'Stephen P. Maran', 0, 4),
(5, 'Histoire de France', 'Jacques Bainville', 1, 5),
(9, 'Le Seigneur des Anneaux', 'J. R. R. Tolkien', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE `rayon` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `reference` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rayon`
--

INSERT INTO `rayon` (`id`, `nom`, `reference`) VALUES
(1, 'Fantastique', 'FAN'),
(2, 'Horreur', 'HOR'),
(3, 'Manga', 'MAN'),
(4, 'Sciences', 'SCI'),
(5, 'Histoire', 'HIS');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom_utilisateur`, `mdp`) VALUES
(1, 'Mika', 'm123'),
(2, 'Biblio', 'azerty');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livreempr` (`id_livre`),
  ADD KEY `adhempr` (`id_adherent`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livreray` (`id_rayon`);

--
-- Index pour la table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `adhempr` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id`),
  ADD CONSTRAINT `livreempr` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livreray` FOREIGN KEY (`id_rayon`) REFERENCES `rayon` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
