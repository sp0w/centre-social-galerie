-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 27 nov. 2019 à 15:40
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `csm-galerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `secteur_adulte`
--

CREATE TABLE `secteur_adulte` (
  `id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mois` varchar(255) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur_adulte`
--

INSERT INTO `secteur_adulte` (`id`, `texte`, `image`, `mois`, `year`) VALUES
(3, 'TEST', 'img/creche-collective.jpg', 'Février', 2019),
(4, 'TEST', 'img/fotolia_46222853__yanlev!_709x514!_3!_0x0!_0!_FFFFFF.jpg', 'Février', 2019),
(5, 'test Omar', '../csm-admin/img/74464553_431936021035143_7768595441796513792_n.jpg', 'Février', 2018);

-- --------------------------------------------------------

--
-- Structure de la table `secteur_enfant`
--

CREATE TABLE `secteur_enfant` (
  `id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mois` varchar(255) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur_enfant`
--

INSERT INTO `secteur_enfant` (`id`, `texte`, `image`, `mois`, `year`) VALUES
(14, 'TEST CORRECTIFS', '../csm-admin/img/creche-collective.jpg', 'Juillet', 2016),
(15, 'TEST CORRECTIFS', '../csm-admin/img/fotolia_46222853__yanlev!_709x514!_3!_0x0!_0!_FFFFFF.jpg', 'Juillet', 2017),
(16, 'TEST CORRECTIFS', '../csm-admin/img/creche-collective.jpg', 'Juillet', 2018),
(17, 'TEST CORRECTIFS', '../csm-admin/img/fotolia_46222853__yanlev!_709x514!_3!_0x0!_0!_FFFFFF.jpg', 'Juillet', 2019),
(18, 'TEST CORRECTIFS', '../csm-admin/img/creche-collective.jpg', 'Juillet', 2020),
(19, 'TEST CORRECTIFS', '../csm-admin/img/fotolia_46222853__yanlev!_709x514!_3!_0x0!_0!_FFFFFF.jpg', 'Juillet', 2021),
(21, 'TEST', '../csm-admin/img/creche-collective.jpg', 'Septembre', 2020),
(22, 'TEST', '../csm-admin/img/fotolia_46222853__yanlev!_709x514!_3!_0x0!_0!_FFFFFF.jpg', 'Mai', 2020),
(23, 'TEST Omar', '../csm-admin/img/74464553_431936021035143_7768595441796513792_n.jpg', 'Juin', 2018);

-- --------------------------------------------------------

--
-- Structure de la table `secteur_jeune`
--

CREATE TABLE `secteur_jeune` (
  `id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mois` varchar(255) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur_jeune`
--

INSERT INTO `secteur_jeune` (`id`, `texte`, `image`, `mois`, `year`) VALUES
(1, 'smile', 'https://www.leaetleo.com/wp-content/uploads/2016/03/img_illustration.png', 'Septembre', 2025),
(3, 'le Groupe', 'https://www.leaetleo.com/wp-content/uploads/2016/03/img_illustration.png', 'Mai', 2018),
(4, 'red', 'https://www.leaetleo.com/wp-content/uploads/2016/03/img_illustration.png', 'Mai', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'TEST', '$2y$12$ePxU5UO3/hCXeZneB6JKX.1gqyeKbyEEalVK7ZzTnuu.rIWGLSkSO'),
(2, 'Mathieu', '$2y$12$cJouSgyaYHyDrDSg3r38Tu1Jix0fPKMYd/gbZeIxza7X8DqhxxTeu'),
(3, 'Testz', '$2y$12$2vDXyjHVkw2gsPdEiazC4Oi5efvV.f5trbZ501hfRIwgbRoPrpR/2'),
(4, 'yoni', '$2y$12$rfo.gL9EzuEZt7tDARoKren3haKgtaCmChx7jSBC46KnbJm64kmYq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `secteur_adulte`
--
ALTER TABLE `secteur_adulte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `secteur_enfant`
--
ALTER TABLE `secteur_enfant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `secteur_jeune`
--
ALTER TABLE `secteur_jeune`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `secteur_adulte`
--
ALTER TABLE `secteur_adulte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `secteur_enfant`
--
ALTER TABLE `secteur_enfant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `secteur_jeune`
--
ALTER TABLE `secteur_jeune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
