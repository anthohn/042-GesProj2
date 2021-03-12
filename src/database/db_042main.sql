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

INSERT INTO t_country (couCountry) VALUES
('Etats-Unis'),
('Suisse'),
('France'),
('Belgique'),
('Espagne'),
('Portugal'),
('Bulgarie'),
('Maroc'),
('Apropos'),
('Allemagne'
);

--
-- Structure de la table "t_genre"
--
CREATE TABLE t_type (
  idType INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  typeName VARCHAR(255)
);

--
-- Déchargement des données de la table "t_genre"
--
INSERT INTO t_type (typeName) VALUES
("Hip-hop/Rap"),
("Rap"),
("Synth-pop"),
("RnB"
);

CREATE TABLE t_artist (
  idArtist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  artName VARCHAR(50) NOT NULL,
  artBirth DATE NOT NULL,
  idxCountry INT NOT NULL,
  CONSTRAINT fk_t_artist_t_country_idCountry FOREIGN KEY (idxCountry) REFERENCES t_country(idCountry)
);

--
-- Déchargement des données de la table "t_artiste"
--

INSERT INTO t_artist (artName, artBirth, idxCountry) VALUES
('Travis Scott', '1992-04-30', 1),
('Drake', '1986-10-24', 1),
('Ohmidz', '2002-03-04', 2),
('Oboy', '1997-01-06', 3),
('Josman', '1995-04-15', 3),
('Tyler', '1991-03-06', 1),
('Ateyaba', '1989-10-27', 3),
('Damso', '1992-05-10', 4),
('Zola', '1999-11-16', 3),
('The Weeknd', '1990-02-16', 1
);

-- --------------------------------------------------------

--
-- Structure de la table "t_musique"
--
CREATE TABLE t_music (
  idMusic INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  musName VARCHAR(50) NOT NULL,
  musDuration FLOAT NOT NULL,
  idxArtist INT NOT NULL,
  idxType INT NOT NULL,
  CONSTRAINT fk_t_music_t_artist_idArtist FOREIGN KEY (idxArtist) REFERENCES t_artist(idArtist),
  CONSTRAINT fk_t_music_t_type_idType FOREIGN KEY (idxType) REFERENCES t_type(idType)
);

--
-- Déchargement des données de la table "t_musique"
--
INSERT INTO t_music (musName, musDuration, idxArtist, idxType) VALUES
('gossebumps', 4.04, 1, 1),
('STARGAZING', 4.31, 1, 1),
('Antidote', 4.23, 1, 1),
('Passionfruit', 4.59, 2, 1),
('Controlla', 4.05, 2, 1),
('Feel No Ways', 4.01, 2, 1),
('Gelato', 3.14, 3, 1),
(' ', 0.00, 3, 1),
(' ', 0.00, 3, 1),
('Cabeza', 2.28, 4, 1),
('Avec Toi', 3.14, 4, 1),
('Rien à fêter', 2.45, 4, 1),
('J`aime Bien!', 3.12, 5, 1),
('Au Bout', 4.01, 5, 1),
('XS', 3.26, 5 ,1),
('EARFQUAKE', 3.10, 6, 1),
('See You Again', 3.10, 6, 1),
('BEST INTEREST', 2.07, 6, 1),
('Menace', 3.12, 7, 1),
('Venus', 3.37, 7, 1),
('Casino', 4.50, 7, 1),
('Macarena', 3.26, 8, 1),
('911', 2.52, 8, 1),
('Amnésie', 3.33, 8, 1),
('Ouais Ouais', 2.54, 9, 1),
('Zolabeille', 2.34, 9, 1),
('California Girl', 3.07, 9, 1),
('Blinding Lights', 3.20, 10, 1),
('In your Eyes', 3.58, 10, 3),
('Starboy', 3.50, 10, 4
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
