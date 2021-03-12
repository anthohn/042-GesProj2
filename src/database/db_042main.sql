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


CREATE TABLE t_country (
  idCountry INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  couCountry VARCHAR(50) NOT NULL
);

INSERT INTO t_country (idCountry, couCountry) VALUES
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


CREATE TABLE t_artist (
  idArtist INT NOT NULL PRIMARY KEY,
  artName VARCHAR(50) NOT NULL,
  artBirth DATE NOT NULL,
  idxCountry INT NOT NULL,
  CONSTRAINT fk_t_artist_t_country_idCountry FOREIGN KEY (idxCountry) REFERENCES t_country(idCountry)
);

--
-- Déchargement des données de la table "t_artiste"
--

INSERT INTO t_artist (idArtist, artName, artBirth, idxCountry) VALUES
(1, 'Travis Scott', '1992-04-30', 1),
(2, 'Drake', '1986-10-24', 1),
(3, 'Ohmidz', '2002-03-04', 2),
(4, 'Oboy', '1997-01-06', 3),
(5, 'Josman', '1995-04-15', 3),
(6, 'Tyler', '1991-03-06', 1),
(7, 'Ateyaba', '1989-10-27', 3),
(8, 'Damso', '1992-05-10', 4),
(9, 'Zola', '1999-11-16', 3),
(10, 'The Weeknd', '1990-02-16', 1
);


-- --------------------------------------------------------

--
-- Structure de la table "t_musique"
--
CREATE TABLE t_music (
  idMusic INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  musName VARCHAR(50) NOT NULL,
  musType VARCHAR(50) NOT NULL,
  musDuration FLOAT NOT NULL,
  idxArtist INT NOT NULL,
  CONSTRAINT fk_t_music_t_artist_idArtist FOREIGN KEY (idxArtist) REFERENCES t_artist(idArtist)
);

--
-- Déchargement des données de la table "t_musique"
--
INSERT INTO t_music (idMusic, musName, musType, musDuration, idxArtist) VALUES
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
(17, 'See You Again', 'Hip-hop/Rap', 3.10, 6),
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
  plaName VARCHAR(255) NOT NULL,
  plaCreationDate DATE NOT NULL
);

-- Structure de la table "t_ajouter"
--
CREATE TABLE t_add (
  idxMusic INT NOT NULL,
  idxPlaylist INT NOT NULL,
  ajoOrder INT NOT NULL,
  CONSTRAINT fk_t_add_t_musix_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic),
  CONSTRAINT fk_t_add_t_playlist_idPlaylist FOREIGN KEY (idxPlaylist) REFERENCES t_playlist(idPlaylist)
);

--
-- Structure de la table "t_genre"
--
CREATE TABLE t_type (
  idType INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  typeName VARCHAR(255),
  idxMusic INT NOT NULL,
  CONSTRAINT fk_t_type_t_music_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic)
);

--
-- Déchargement des données de la table "t_genre"
--
INSERT INTO t_type (idType, typeName, idxMusic) VALUES
(1, "Hip-hop/Rap", 1), -- DONT KNOW WHAT TO PUT IN "idxMusique"
(2, "Rap", 1),
(3, "Synth-pop", 1),
(4, "RnB" ,1
);

-- 
-- Structure de la table "t_lien"
--
CREATE TABLE t_link (
  idLink INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  linLink VARCHAR(255),
  idxMusic INT NOT NULL,
  CONSTRAINT fk_t_link_t_music_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic)
);

--
-- Structure de la table "t_typeLien"
--
CREATE TABLE t_typeLink (
  idTypeLink INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idxLink INT NOT NULL,
  CONSTRAINT fk_t_typeLink_t_link_idLink FOREIGN KEY (idxLink) REFERENCES t_link(idLink)
);


--
-- TABLE DE LOGIN 
--
CREATE TABLE IF NOT EXISTS `accounts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES (1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com')
