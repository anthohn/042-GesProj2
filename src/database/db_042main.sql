-- ETML
-- Auteur      : Anthony Höhn, Killian Good
-- Date        : 07.03.2021
-- Description : Base de données P_db_042main

--
-- Supression (si existe) de la table "P_db_042main" puis création de la  table "P_db_042main"
--
DROP DATABASE if EXISTS P_db_042main;
CREATE DATABASE P_db_042main;
USE P_db_042main;
-- --------------------------------------------------------

--
-- Structure de la table "t_country"
--
CREATE TABLE t_country (
  idCountry INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  couCountry VARCHAR(50) NOT NULL
)engine=innodb character set utf8 collate utf8_general_ci;

--
-- Déchargement des données de la table "t_country"
--
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
-- Structure de la table "t_type"
--
CREATE TABLE t_type (
  idType INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  typeName VARCHAR(255)
)engine=innodb character set utf8 collate utf8_general_ci;

--
-- Déchargement des données de la table "typeName"
--
INSERT INTO t_type (typeName) VALUES
("Hip-hop/Rap"),
("Rap"),
("Synth-pop"),
("RnB"
);

--
-- Structure de la table "t_artist"
--
CREATE TABLE t_artist (
  idArtist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  artName VARCHAR(50) NOT NULL,
  artBirth DATE NOT NULL,
  idxCountry INT NOT NULL,
  CONSTRAINT fk_t_artist_t_country_idCountry FOREIGN KEY (idxCountry) REFERENCES t_country(idCountry)
)engine=innodb character set utf8 collate utf8_general_ci;

--
-- Déchargement des données de la table "t_artist"
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

--
-- Structure de la table "t_music"
--
CREATE TABLE t_music (
  idMusic INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  musName VARCHAR(50) NOT NULL,
  musDuration TIME NOT NULL,
  idxArtist INT NOT NULL,
  idxType INT NOT NULL,
  CONSTRAINT fk_t_music_t_artist_idArtist FOREIGN KEY (idxArtist) REFERENCES t_artist(idArtist),
  CONSTRAINT fk_t_music_t_type_idType FOREIGN KEY (idxType) REFERENCES t_type(idType)
)engine=innodb character set utf8 collate utf8_general_ci;

--
-- Déchargement des données de la table "t_music"
--
INSERT INTO t_music (musName, musDuration, idxArtist, idxType) VALUES
('gossebumps', '00:04:04', 1, 1),
('STARGAZING', '000:04:31', 1, 1),
('Antidote', '000:04:23', 1, 1),
('Passionfruit', '000:04:59', 2, 1),
('Controlla', '000:04:05', 2, 1),
('Feel No Ways', '000:04:01', 2, 1),
('Gelato', '000:03:14', 3, 1),
(' ', '000:00:00', 3, 1),
(' ', '000:00:00', 3, 1),
('Cabeza', '000:02:28', 4, 1),
('Avec Toi', '000:03:14', 4, 1),
('Rien à fêter', '000:02:45', 4, 1),
('J`aime Bien!', '000:03:12', 5, 1),
('Au Bout', '000:04:01', 5, 1),
('XS', '000:03:26', 5 ,1),
('EARFQUAKE', '000:03:10', 6, 1),
('See You Again', '000:03:10', 6, 1),
('BEST INTEREST', '000:02:07', 6, 1),
('Menace', '000:03:12', 7, 1),
('Venus', '000:03:37', 7, 1),
('Casino', '000:04:50', 7, 1),
('Macarena', '000:03:26', 8, 1),
('911', '000:02:52', 8, 1),
('Amnésie', '000:03:33', 8, 1),
('Ouais Ouais', '000:02:54', 9, 1),
('Zolabeille', '000:02:34', 9, 1),
('California Girl', '000:03:07', 9, 1),
('Blinding Lights', '000:03:20', 10, 1),
('In your Eyes', '000:03:58', 10, 3),
('Starboy', '000:03:50', 10, 4
);

--
-- Structure de la table "t_playlist"
--
CREATE TABLE t_playlist (
  idPlaylist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  plaName VARCHAR(255) NOT NULL,
  plaCreationDate DATE NOT NULL
)engine=innodb character set utf8 collate utf8_general_ci;

--
-- Structure de la table "t_add"
--
CREATE TABLE t_add (
  idxMusic INT NOT NULL,
  idxPlaylist INT NOT NULL,
  ajoOrder INT NOT NULL,
  CONSTRAINT fk_t_add_t_musix_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic),
  CONSTRAINT fk_t_add_t_playlist_idPlaylist FOREIGN KEY (idxPlaylist) REFERENCES t_playlist(idPlaylist)
)engine=innodb character set utf8 collate utf8_general_ci;

-- 
-- Structure de la table "t_link"
--
CREATE TABLE t_link (
  idLink INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  linLink VARCHAR(255),
  idxMusic INT NOT NULL,
  CONSTRAINT fk_t_link_t_music_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic)
)engine=innodb character set utf8 collate utf8_general_ci;

--
-- Structure de la table "t_typeLink"
--
CREATE TABLE t_typeLink (
  idTypeLink INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idxLink INT NOT NULL,
  CONSTRAINT fk_t_typeLink_t_link_idLink FOREIGN KEY (idxLink) REFERENCES t_link(idLink)
)engine=innodb character set utf8 collate utf8_general_ci;


--
-- TABLE DE LOGIN 
--
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
