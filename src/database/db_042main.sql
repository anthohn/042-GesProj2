-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 02 fév. 2021 à 18:01
-- Version du serveur :  5.7.11
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_042main`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_artiste`
--

CREATE TABLE `t_artiste` (
  `idArtiste` int(11) NOT NULL,
  `ArtNom` varchar(50) NOT NULL,
  `ArtOrigin` char(50) NOT NULL,
  `ArtNaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_artiste`
--

INSERT INTO `t_artiste` (`idArtiste`, `ArtNom`, `ArtOrigin`, `ArtNaissance`) VALUES
(1, 'Travis Scott', 'Etats-Unis', '1992-04-30'),
(2, 'Drake', 'Etats-Unis', '1986-10-24'),
(3, 'Ohmidz', 'Suisse', '2002-03-04'),
(4, 'Oboy', 'France', '1997-01-06'),
(5, 'Josman', 'France', '1995-04-15'),
(6, 'Tyler', 'Etats-unis', '1991-03-06'),
(7, 'Ateyaba', 'France', '1989-10-27'),
(8, 'Damso', 'Belgique', '1992-05-10'),
(9, 'Zola', 'France', '1999-11-16'),
(10, 'The Weeknd', 'Etats-unis', '1990-02-16');

-- --------------------------------------------------------

--
-- Structure de la table `t_musique`
--

CREATE TABLE `t_musique` (
  `idMusique` int(11) DEFAULT NULL,
  `musNom` varchar(30) NOT NULL,
  `musGenre` varchar(20) NOT NULL,
  `musDuree` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_musique`
--

INSERT INTO `t_musique` (`idMusique`, `musNom`, `musGenre`, `musDuree`) VALUES
(1, 'gossebumps', 'Hip-hop/Rap', 404),
(2, 'STARGAZING', 'Hip-hop/Rap', 4.31);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_artiste`
--
ALTER TABLE `t_artiste`
  ADD PRIMARY KEY (`idArtiste`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_artiste`
--
ALTER TABLE `t_artiste`
  MODIFY `idArtiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
