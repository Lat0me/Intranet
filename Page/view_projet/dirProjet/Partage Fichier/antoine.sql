-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 16 Mai 2017 à 10:36
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

CREATE DATABASE antoine;
USE antoine;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `antoine`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `absence`
--

INSERT INTO `absence` (`id`, `id_user`, `nom`, `prenom`, `descr`, `date_debut`, `date_fin`, `statut`) VALUES
(2, 11, 'Cordier2', 'antoine2', 'Maladie', '2017-05-01', '2017-05-01', 'J'),
(3, 1, 'Cordier', 'antoine', 'maladie', '2017-05-17', '2017-05-19', 'J');

-- --------------------------------------------------------

--
-- Structure de la table `break`
--

CREATE TABLE `break` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `waiting` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `break`
--

INSERT INTO `break` (`id`, `id_user`, `Nom`, `prenom`, `date_debut`, `date_fin`, `waiting`) VALUES
(9, 11, 'Cordier2', 'antoine2', '2017-04-29', '2017-04-29', 'on'),
(10, 1, 'Cordier', 'antoine', '2017-06-26', '2017-03-31', 'on'),
(11, 1, 'Cordier', 'antoine', '2017-05-01', '2017-05-05', 'on'),
(12, 12, 'Boissel', 'Florian', '2017-05-18', '2017-05-31', 'on'),
(13, 1, 'Cordier', 'antoine', '2017-05-12', '2017-05-13', 'on'),
(14, 10, 'a', 'a', '2017-05-10', '2017-05-31', 'on'),
(15, 13, 'demo', 'demo', '2017-05-18', '2017-05-18', 'on'),
(16, 1, 'Cordier', 'antoine', '2017-05-17', '2017-05-18', 'on');

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `pseudo`, `message`, `date_message`) VALUES
(11, 'antoine', 'Mon message', '2017-04-20 10:15:12'),
(12, 'antoine', 'salut', '2017-04-20 15:18:06'),
(13, 'antoine', 'bonjour', '2017-04-20 15:18:49'),
(14, 'antoine', 'test', '2017-04-20 15:41:08'),
(15, 'antoine', 'test', '2017-04-20 15:41:58'),
(16, 'antoine', 'test', '2017-04-20 15:45:25'),
(17, 'antoine', 'antoine', '2017-04-20 15:45:35'),
(18, 'antoine', 'test', '2017-04-20 15:47:22'),
(19, 'antoine', 'test', '2017-04-20 15:49:38'),
(20, 'antoine', '', '2017-04-20 15:50:17'),
(21, 'antoine', 'ykdh', '2017-04-20 15:53:08'),
(22, 'antoine', 'test', '2017-04-20 16:10:19'),
(23, 'antoine', 'Salut info du jours : blablabla', '2017-04-20 21:16:11'),
(24, 'a', 'Bonjour', '2017-04-21 09:54:13'),
(25, 'antoine', 'test', '2017-04-21 20:11:21'),
(26, 'antoine', 'test6', '2017-04-24 07:44:43'),
(27, 'antoine', 'gycughijp', '2017-04-24 08:49:04'),
(28, 'antoine', 'erytgkhlkjm', '2017-04-24 10:28:29'),
(29, 'antoine', 'gvbjhklm', '2017-04-25 07:55:18'),
(30, 'antoine', 'hj,gnb', '2017-04-25 14:03:22'),
(31, 'antoine', 'kj', '2017-04-25 14:03:28'),
(32, 'antoine', 't', '2017-04-25 14:04:02'),
(33, 'antoine', 'test', '2017-04-26 15:45:12'),
(34, 'antoine', 'bonjour', '2017-04-27 21:07:34'),
(35, 'a', 'Bonjour Antoine', '2017-04-27 21:15:38'),
(36, 'antoine2', 'test', '2017-04-28 15:36:59'),
(37, 'antoine', 'salut', '2017-04-28 15:37:06'),
(38, 'antoine', 'tt', '2017-05-02 10:09:32'),
(39, 'antoine', 'salut', '2017-05-10 14:35:50'),
(40, 'a', 'Bonjour', '2017-05-10 14:41:16'),
(41, 'a', 'Bonjour', '2017-05-10 14:41:19'),
(42, 'antoine', 'ca va ?', '2017-05-10 14:41:45'),
(43, 'antoine', '', '2017-05-10 14:44:29'),
(44, 'antoine', '', '2017-05-10 14:44:54'),
(45, 'a', 'oui', '2017-05-10 14:45:23'),
(46, 'antoine', 'test', '2017-05-10 14:46:15'),
(47, 'demo', 'test', '2017-05-12 12:51:53'),
(48, 'antoine', 'tt', '2017-05-16 09:47:35');

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

CREATE TABLE `compagnie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compagnie`
--

INSERT INTO `compagnie` (`id`, `nom`, `Description`) VALUES
(2, 'Zip2', ' Ã©diteur d un logiciel de publication de contenu en ligne pour les informations des entreprises'),
(3, 'SpaceX', 'Space Exploration Technologies');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `phone`, `mail`, `company_id`) VALUES
(1, 'Cordier', 'Antoine', 679216177, 'antoine27cordier@gmail.com', 2),
(2, 'Boissel', 'Florian', 6746454, 'fb@gmail.com', 3);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `titre`, `date`) VALUES
(1, 'debut du Calendrier', '2017-04-15'),
(2, 'RÃ©union 16H30', '2017-04-30'),
(16, 'b', '2017-04-14'),
(17, 'test', '2017-04-29'),
(18, 'test', '2017-04-30'),
(19, 'test', '2017-04-27'),
(20, 'tg', '2017-04-28');

-- --------------------------------------------------------

--
-- Structure de la table `Projet`
--

CREATE TABLE `Projet` (
  `id` int(11) NOT NULL,
  `Titre` text NOT NULL,
  `Description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Projet`
--

INSERT INTO `Projet` (`id`, `Titre`, `Description`, `date_debut`, `date_fin`) VALUES
(25, 'Alpha', 'Alpha', '2017-05-03', '2017-06-15'),
(26, 'Omega', 'Omega', '2017-05-05', '2018-03-23'),
(27, 'Beta', 'Beta', '2017-05-12', '2017-05-12');

-- --------------------------------------------------------

--
-- Structure de la table `Projet_taches`
--

CREATE TABLE `Projet_taches` (
  `id` int(11) NOT NULL,
  `Titre` text NOT NULL,
  `Description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_projet` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Projet_taches`
--

INSERT INTO `Projet_taches` (`id`, `Titre`, `Description`, `date_debut`, `date_fin`, `id_projet`, `user`) VALUES
(3, 'tache projet 2', 'exemple', '2017-04-21', '2017-04-29', 3, 'antoine'),
(4, 'tzyeturiuo', 'retryui', '2017-04-24', '2017-04-20', 1, 'antoine'),
(7, 'test', 'test', '2017-04-25', '2017-04-29', 5, 'antoine'),
(8, 'tt', 'tt', '2017-05-02', '2017-05-27', 4, 'antoine'),
(9, 'finir machin', 'test', '2017-05-12', '2017-05-12', 27, 'antoine'),
(10, 'tt', 'tt', '2017-05-16', '2017-05-26', 26, 'antoine');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `fonction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `nom`, `profil`, `password`, `mail`, `date_creation`, `fonction`) VALUES
(1, 'antoine', 'Cordier', 'admin', 'e9be8c494058cb464cf6b11b021f9cef', 'me@antoine-hr.fr', '2017-04-06 10:30:30', ''),
(11, 'antoine2', 'Cordier2', 'rh', '0cc175b9c0f1b6a831c399e269772661', 'me@antoine-hr.fr', '2017-04-28 08:37:49', ''),
(12, 'Florian', 'Boissel', 'admin', 'e9be8c494058cb464cf6b11b021f9cef', 'fboissel@gmail.com', '2017-04-28 15:50:17', 'Administrateur systÃ¨me'),
(13, 'demo', 'demo', 'user', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@mail.fr', '2017-05-12 10:10:00', 'demo');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `break`
--
ALTER TABLE `break`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Projet`
--
ALTER TABLE `Projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Projet_taches`
--
ALTER TABLE `Projet_taches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `break`
--
ALTER TABLE `break`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `compagnie`
--
ALTER TABLE `compagnie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `Projet`
--
ALTER TABLE `Projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `Projet_taches`
--
ALTER TABLE `Projet_taches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
