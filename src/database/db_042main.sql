-- ETML
-- Auteur      : Anthony Höhn, Killian Good
-- Date        : 07.03.2021
-- Description : Base de données P_db_042main

--
-- Supression (si existe) de la table "P_db_042main" puis création de la  table "P_db_042main"
--

DROP DATABASE if EXISTS P_db_042main;
CREATE DATABASE P_db_042main;

-- --------------------------------------------------------

--
-- Structure de la table "t_artiste"
--


CREATE TABLE t_pays (
  idPays INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  payPays VARCHAR(50) NOT NULL
);

INSERT INTO t_pays (idPays, payPays) VALUES
(1, 'Etats-Unis'),
(2, 'Suisse'),
(3, 'France'),
(4, 'Belgique'),
(5, 'Espagne'),
(6, 'Portugal'),
(7, 'Bulgarie'),
(8, 'Maroc'),
(9, 'Apropos'),
(10, 'Allemagne'
);

CREATE TABLE t_imageArtiste (
  idImageArtiste INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  imaNom VARCHAR(100) NOT NULL,
  imaLien TEXT NOT NULL
  -- imaType VARCHAR(20) NOT NULL,
  -- imaBin LONGBLOB NOT NULL
);


INSERT INTO t_imageArtiste (idImageArtiste, imaNom, imaLien) VALUES
(1, "test", "../../code/userContent/img/artists/neighbourhood.jpg"
);

CREATE TABLE t_artiste (
  idArtiste INT NOT NULL PRIMARY KEY,
  ArtNom VARCHAR(50) NOT NULL,
  ArtNaissance DATE NOT NULL,
  idxPays INT NOT NULL,
  idxImageArtiste INT NOT NULL,
  CONSTRAINT fk_t_artiste_t_imageArtiste_idImageArtiste FOREIGN KEY (idxImageArtiste) REFERENCES t_imageArtiste (idImageArtiste),
  CONSTRAINT fk_t_artiste_t_pays_idPays FOREIGN KEY (idxPays) REFERENCES t_pays(idPays)
);


--
-- Déchargement des données de la table "t_artiste"
--

INSERT INTO t_artiste (idArtiste, ArtNom, ArtNaissance, idxPays, idxImageArtiste) VALUES
(1, 'Travis Scott', '1992-04-30', 1 , 1),
(2, 'Drake', '1986-10-24', 1, 1),
(3, 'Ohmidz', '2002-03-04', 2, 1),
(4, 'Oboy', '1997-01-06', 3,  1),
(5, 'Josman', '1995-04-15', 3, 1),
(6, 'Tyler', '1991-03-06', 1, 1),
(7, 'Ateyaba', '1989-10-27', 3, 1),
(8, 'Damso', '1992-05-10', 4, 1),
(9, 'Zola', '1999-11-16', 3, 1),
(10, 'The Weeknd', '1990-02-16', 1, 1
);


-- --------------------------------------------------------

--
-- Structure de la table "t_musique"
--
CREATE TABLE t_musique (
  idMusique INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  musNom VARCHAR(50) NOT NULL,
  musGenre VARCHAR(50) NOT NULL,
  musDuree FLOAT NOT NULL,
  idxArtiste INT NOT NULL,
  CONSTRAINT fk_t_musique_t_artiste_idArtiste FOREIGN KEY (idxArtiste) REFERENCES t_artiste(idArtiste)
);

--
-- Déchargement des données de la table "t_musique"
--
INSERT INTO t_musique (idMusique, musNom, musGenre, musDuree, idxArtiste) VALUES
(1, 'gossebumps', 'Hip-hop/Rap', 4.04, 1),
(2, 'STARGAZING', 'Hip-hop/Rap', 4.31, 1),
(3, 'Antidote', 'Hip-hop/Rap', 4.23, 1),
(4, 'Passionfruit', 'Hip-hop/Rap', 4.59, 2),
(5, 'Controlla', 'Hip-hop/Rap', 4.05, 2),
(6, 'Feel No Ways', 'Hip-hop/Rap', 4.01, 2),
(7, 'Gelato', 'Hip-hop/Rap', 3.14, 3),
(8, ' ', ' ', 0.00, 3),
(9, ' ', ' ', 0.00, 3),
(10, 'Cabeza', 'Hip-hop/Rap', 2.28, 4),
(11, 'Avec Toi', 'Hip-hop/Rap', 3.14, 4),
(12, 'Rien à fêter', 'Rap', 2.45, 4),
(13, 'J`aime Bien!', 'Hip-hop/Rap', 3.12, 5),
(14, 'Au Bout', 'Hip-hop/Rap', 4.01, 5),
(15, 'XS', 'Hip-hop/Rap', 3.26, 5),
(16, 'EARFQUAKE', 'Hip-hop/Rap', 3.10, 6),
(17, 'See Yop Again', 'Hip-hop/Rap', 3.10, 6),
(18, 'BEST INTEREST', 'Hip-hop/Rap', 2.07, 6),
(19, 'Menace', 'Hip-hop/Rap', 3.12, 7),
(20, 'Venus', 'Hip-hop/Rap', 3.37, 7),
(21, 'Casino', 'Hip-hop/Rap', 4.50, 7),
(22, 'Macarena', 'Hip-hop/Rap', 3.26, 8),
(23, '911', 'Hip-hop/Rap', 2.52, 8),
(24, 'Amnésie', 'Hip-hop/Rap', 3.33, 8),
(25, 'Ouais Ouais', 'Hip-hop/Rap', 2.54, 9),
(26, 'Zolabeille', 'Hip-hop/Rap', 2.34, 9),
(27, 'California Girl', 'Hip-hop/Rap', 3.07, 9),
(28, 'Blinding Lights', 'Hip-hop/Rap', 3.20, 10),
(29, 'In your Eyes', 'Synth-pop', 3.58, 10),
(30, 'Starboy', 'RnB', 3.50, 10
);

--
-- Structure de la table "t_playlist"
--
CREATE TABLE t_playlist (
  idPlaylist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  plaNom VARCHAR(255) NOT NULL,
  plaCreationDate DATE NOT NULL
);

-- Structure de la table "t_ajouter"
--
CREATE TABLE t_ajouter (
  idxMusique INT NOT NULL,
  idxPlaylist INT NOT NULL,
  ajoOrder INT NOT NULL,
  CONSTRAINT fk_t_ajouter_t_musique_idMusique FOREIGN KEY (idxMusique) REFERENCES t_musique(idMusique),
  CONSTRAINT fk_t_ajouter_t_playlist_idPlaylist FOREIGN KEY (idxPlaylist) REFERENCES t_playlist(idPlaylist)
);

--
-- Structure de la table "t_genre"
--
CREATE TABLE t_genre (
  idGenre INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  GenreNom VARCHAR(255),
  idxMusique INT NOT NULL,
  CONSTRAINT fk_t_genre_t_musique_idMusique FOREIGN KEY (idxMusique) REFERENCES t_musique(idMusique)
);

--
-- Déchargement des données de la table "t_genre"
--
INSERT INTO t_genre (idGenre, GenreNom, idxMusique) VALUES
(1, "Hip-hop/Rap", 1), -- DONT KNOW WHAT TO PUT IN "idxMusique"
(2, "Rap", 1),
(3, "Synth-pop", 1),
(4, "RnB" ,1
);

-- 
-- Structure de la table "t_lien"
--
CREATE TABLE t_lien (
  idLien INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  lieLien VARCHAR(255),
  idxMusique INT NOT NULL,
  CONSTRAINT fk_t_lien_t_musique_idMusique FOREIGN KEY (idxMusique) REFERENCES t_musique(idMusique)
);

--
-- Structure de la table "t_typeLien"
--
CREATE TABLE t_typeLien (
  idTypeLien INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idxLien INT NOT NULL,
  CONSTRAINT fk_t_typeLien_t_lien_idLien FOREIGN KEY (idxLien) REFERENCES t_lien(idLien)
);

-- KILLIAN (Vérifie avant de compiler pas sur a 100% que ca fonctionne) 

--
-- TABLE DE LOGIN 
-- 
-- Killian Good
-- version 01.03.2021
-- 
--
-- Host: 127.0.0.1 (local)
-- Temps de generation : Oct 09, 2017 at 06:09 AM
-- Version du serveur : 10.1.10-MariaDB
-- Version PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnée: `login`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data pour la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', 'pass');

--
-- Indexes pour les tables 'dumped'
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;