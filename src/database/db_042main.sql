-- ETML
-- Auteur      : Anthony Höhn
-- Date        : 08.02.2021
-- Description : Base de données db_042main

--
-- Supression (si existe) de la table "db_market" puis création de la  table "db_market"
--

DROP DATABASE if EXISTS P_db_042main;
CREATE DATABASE P_db_042main;

-- --------------------------------------------------------

--
-- Structure de la table "t_artiste"
--

CREATE TABLE t_artiste (
  idArtiste INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ArtNom VARCHAR(50) NOT NULL,
  ArtOrigin VARCHAR(50) NOT NULL,
  ArtNaissance DATE NOT NULL
);

--
-- Déchargement des données de la table "t_artiste"
--

INSERT INTO t_artiste (idArtiste, ArtNom, ArtOrigin, ArtNaissance) VALUES
(1, 'Travis Scott', 'Etats-Unis', '1992-04-30'),
(2, 'Drake', 'Etats-Unis', '1986-10-24'),
(3, 'Ohmidz', 'Suisse', '2002-03-04'),
(4, 'Oboy', 'France', '1997-01-06'),
(5, 'Josman', 'France', '1995-04-15'),
(6, 'Tyler', 'Etats-unis', '1991-03-06'),
(7, 'Ateyaba', 'France', '1989-10-27'),
(8, 'Damso', 'Belgique', '1992-05-10'),
(9, 'Zola', 'France', '1999-11-16'),
(10, 'The Weeknd', 'Etats-unis', '1990-02-16'
);


-- --------------------------------------------------------

--
-- Structure de la table "t_musique"
--

CREATE TABLE t_musique (
  idMusique INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
  plaCreationDate DATE NOT NULL,
  idxMusique INT NOT NULL,
  CONSTRAINT fk_t_playlist_t_musique_idMusique FOREIGN KEY (idxMusique) REFERENCES t_musique(idMusique)
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
(1, "Hip-hop/Rap", 1), -- DONT KNOW WHAT TO PUT IN "idxMusique" -> ask to JONATHANNNNNNE
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
