-- ETML
-- Auteur      : Anthony Höhn, Killian Good, Julien Cartier
-- Date        : 29.03.2021
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
);

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
('Allemagne');

--
-- Structure de la table "t_type"
--
CREATE TABLE t_type (
  idType INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  typeName VARCHAR(255)
);

--
-- Déchargement des données de la table "typeName"
--
INSERT INTO t_type (typeName) VALUES
('Hip-hop/Rap'),
('Rap'),
('Synth-pop'),
('RnB');

--
-- Structure de la table "t_artist"
--
CREATE TABLE t_artist (
  idArtist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  artName VARCHAR(50) NOT NULL,
  artBirth DATE NOT NULL,
  idxCountry INT NOT NULL,
  CONSTRAINT fk_t_artist_t_country_idCountry FOREIGN KEY (idxCountry) REFERENCES t_country(idCountry) 
);

--
-- Déchargement des données de la table "t_artist"
--
INSERT INTO t_artist (artName, artBirth, idxCountry) VALUES
('Travis Scott', '1992-04-30', 1),
('Drake', '1986-10-24', 1),
('Koba LaD', '2000-04-03', 3),
('Oboy', '1997-01-06', 3),
('Josman', '1995-04-15', 3),
('Tyler', '1991-03-06', 1),
('Ateyaba', '1989-10-27', 3),
('Damso', '1992-05-10', 4),
('Zola', '1999-11-16', 3),
('The Weeknd', '1990-02-16', 1);

--
-- Structure de la table "t_music"
--
CREATE TABLE t_music (
  idMusic INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  musName VARCHAR(50) NOT NULL,
  musDuration TIME NOT NULL,
  idxArtist INT NOT NULL,
  idxType INT NOT NULL,
  CONSTRAINT fk_t_music_t_artist_idArtist FOREIGN KEY (idxArtist) REFERENCES t_artist(idArtist) ON DELETE CASCADE,
  CONSTRAINT fk_t_music_t_type_idType FOREIGN KEY (idxType) REFERENCES t_type(idType) ON DELETE CASCADE
);

--
-- Déchargement des données de la table "t_music"
--
INSERT INTO t_music (musName, musDuration, idxArtist, idxType) VALUES
('goosebumps', '00:04:04', 1, 1),
('STARGAZING', '000:04:31', 1, 1),
('Antidote', '000:04:23', 1, 1),
('Passionfruit', '000:04:59', 2, 1),
('Controlla', '000:04:05', 2, 1),
('Feel No Ways', '000:04:01', 2, 1),
('Cellophané', '000:03:21', 3, 2),
('La C', '000:03:07', 3, 2),
('Coffre plein', '000:03:40', 3, 2),
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
('Starboy', '000:03:50', 10, 4);


--
-- TABLE DE LOGIN 
--
CREATE TABLE t_user(
  idUser INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  useLogin varchar(50) NOT NULL,
  usePassword varchar(255) NOT NULL,
  useIsAdmin BOOLEAN NOT NULL DEFAULT 0,
  useLikedTitle INT
);

INSERT INTO t_user (useLogin, usePassword, useIsAdmin) VALUES 
('admin', "$2y$10$ebINd1FQ518pmgmdagSBzeoSS3Ps5NEucIASl0DVnqJt4jD9oXV1a", 1),
('anthohn', '$2y$10$/nJCUqu0g8LO4uIDoCDIE.GLvXJUGomTiiCak6e7MyjPunXIGhdPq', 0),
('julcartier', '$2y$10$/nJCUqu0g8LO4uIDoCDIE.GLvXJUGomTiiCak6e7MyjPunXIGhdPq', 0),
('yousayeh', '$2y$10$/nJCUqu0g8LO4uIDoCDIE.GLvXJUGomTiiCak6e7MyjPunXIGhdPq', 0),
('kilgood', '$2y$10$/nJCUqu0g8LO4uIDoCDIE.GLvXJUGomTiiCak6e7MyjPunXIGhdPq', 0);

--
-- Structure de la table "t_playlist"
--
CREATE TABLE t_playlist (
  idPlaylist INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  plaName VARCHAR(255) NOT NULL,
  plaCreationDate DATE NOT NULL,
  idxUser INT,
  CONSTRAINT fk_t_playlist_t_user_idUser FOREIGN KEY (idxUser) REFERENCES t_user (idUser) ON DELETE CASCADE
);

INSERT INTO t_playlist (plaName, plaCreationDate, idxUser) VALUES
('Noice 2.0', '2020-01-14', NULL),
('Party Playlist', '2021-04-26', NULL),
('ZolaSki', '2015-04-26', 2),
('Viral Hits', '2018-08-02', 5),
('OG dkzop', '2018-05-12', 2),
('Top 50 : Mondial', '2019-10-30', 5),
('Party songs', '2021-12-09', 3);

--
-- Structure de la table "t_add"
--
CREATE TABLE t_add (
  idxPlaylist INT NOT NULL,
  idxMusic INT NOT NULL,
  CONSTRAINT fk_t_add_t_musix_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic) ON DELETE CASCADE,
  CONSTRAINT fk_t_add_t_playlist_idPlaylist FOREIGN KEY (idxPlaylist) REFERENCES t_playlist(idPlaylist) ON DELETE CASCADE
);

-- 
-- Déchargement des données de la table "t_add"
--
INSERT INTO t_add (idxPlaylist, idxMusic) VALUES
(1, 2),
(1, 7),
(1, 5),
(1, 12),
(1, 8),
(2, 15),
(2, 14),
(2, 11),
(2, 9),
(2, 5),
(2, 2);

--
-- Structure de la table "t_typeLink"
--
CREATE TABLE t_typeLink (
  idTypeLink INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  typLiens VARCHAR(15) NOT NULL
);
-- 
-- Déchargement des données de la table "t_link"
--
INSERT INTO t_typeLink (typLiens) VALUES
('Spotify'),
('Apple Music'),
('YouTube');


-- 
-- Structure de la table "t_link"
--
CREATE TABLE t_link (
  idxMusic INT NOT NULL,
  idxTypelink INT NOT NULL,
  linLink VARCHAR(255),
  CONSTRAINT fk_t_link_t_music_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic) ON DELETE CASCADE,
  CONSTRAINT fk_t_link_t_typeLink_idTypeLink FOREIGN KEY (idxTypelink) REFERENCES t_typeLink(idTypeLink) ON DELETE CASCADE
);

-- 
-- Déchargement des données de la table "t_link"
--
INSERT INTO t_link (idxMusic, idxTypelink, linLink) VALUES
(1,1,"https://open.spotify.com/track/6gBFPUFcJLzWGx4lenP6h2?si=a3c3212d89fd4b8d"),
(1,2,"https://music.apple.com/us/music-video/goosebumps-feat-kendrick-lamar/1222098930"),
(1,3,"https://youtu.be/Dst9gZkq1a8"),
(2,1,"https://open.spotify.com/track/7wBJfHzpfI3032CSD7CE2m?si=3ceb51ee1a5a42ee"),
(2,2,"https://music.apple.com/ca/album/stargazing/1421658111?i=1421658117"),
(2,3,"https://youtu.be/2a8PgqWrc_4"),
(3,1,"https://open.spotify.com/track/1wHZx0LgzFHyeIZkUydNXq?si=2556726199f647fc"),
(3,2,"https://music.apple.com/ca/album/antidote/1456176981?i=1456177234"),
(3,3,"https://youtu.be/KnZ8h3MRuYg"),
(4,1,"https://open.spotify.com/track/5mCPDVBb16L4XQwDdbRUpz?si=153942b27151495b"),
(4,2,"https://music.apple.com/ca/album/passionfruit/1440890708?i=1440891494"),
(4,3,"https://youtu.be/COz9lDCFHjw"),
(5,1,"https://open.spotify.com/track/3O8NlPh2LByMU9lSRSHedm?si=33752d2f51f04a13"),
(5,2,"https://music.apple.com/ca/album/controlla/1440841363?i=1440841382"),
(5,3,"https://youtu.be/Mg-QZCp1v1c"),
(6,1,"https://open.spotify.com/track/3cjF2OFRmip8spwZYQRKxP?si=917921365a4045c7"),
(6,2,"https://music.apple.com/ca/album/feel-no-ways/1440841363?i=1440841371"),
(6,3,"https://www.youtube.com/watch?v=pMaogWC5TEQ&ab_channel=Drake-Topic"),
(7,1,"https://open.spotify.com/track/41Rp0dMSgO2QeguHANPsCD?si=2084b361f7f24ba2"),
(7,2,"https://music.apple.com/us/album/cellophan%C3%A9/1459575532?i=1459575787"),
(7,3,"https://youtu.be/6LITCu0Jvkw"),
(8,1,"https://open.spotify.com/track/5PtFV78R0DRvzsTqk1S0Vt?si=50b372de43ca4c83"),
(8,2,"https://music.apple.com/us/album/la-c/1435581675?i=1435581733"),
(8,3,"https://youtu.be/PXNfg73vqn4"),
(9,1,"https://open.spotify.com/track/70pkwEEG7nDTXBFqoGQkH0?si=6bab5437ec9a4310"),
(9,2,"https://music.apple.com/us/album/coffre-plein-feat-maes-zed/1533984508?i=1533985302"),
(9,3,"https://youtu.be/0V7MdrBMSu0"),
(10,1,"https://open.spotify.com/track/66tNDqYNR2S6Svwgm3BMi9?si=2405e982900c41bf"),
(10,2,"https://music.apple.com/ca/album/cabeza/1518975690?i=1518975831"),
(10,3,"https://youtu.be/lEfkziQSmZI"),
(11,1,"https://open.spotify.com/track/656vbT8JKkVx7g1yG12L89?si=d185b4a2392e4eb6"),
(11,2,"https://music.apple.com/ca/album/avec-toi/1467379875?i=1467380154"),
(11,3,"https://youtu.be/PjjRd03jmJY"),
(12,1,"https://open.spotify.com/track/2qmCcm2ceHKQNyO3x4Jlof?si=f3dbb075154f4072"),
(12,2,"https://music.apple.com/ca/album/rien-%C3%A0-f%C3%AAter/1467379875?i=1467380382"),
(12,3,"https://youtu.be/l0m6kMRkmzI"),
(13,1,"https://open.spotify.com/track/7bg469g8qRoMwFQf6Vleh3?si=c9ee41a8a7e249c2"),
(13,2,"https://music.apple.com/ca/album/jaime-bien/1408802489?i=1408805995"),
(13,3,"https://youtu.be/_KxWL_YB1Ik"),
(14,1,"https://open.spotify.com/track/3BiOpT9LiASPNc7Z6JYYde?si=61a0ef2c3bfd4860"),
(14,2,"https://music.apple.com/ca/album/au-bout/1440514073?i=1440514458"),
(14,3,"https://youtu.be/hRGotyhU4fY"),
(15,1,"https://open.spotify.com/track/6hK9rzweEnK3kQEGFUW7Im?si=934529f4204a4383"),
(15,2,"https://music.apple.com/ca/album/xs/1408802489?i=1408805523"),
(15,3,"https://youtu.be/MzLOAEyF3Bk"),
(16,1,"https://open.spotify.com/track/5hVghJ4KaYES3BFUATCYn0?si=d5129bde39434e0e"),
(16,2,"https://music.apple.com/ca/album/earfquake/1463409338?i=1463409350"),
(16,3,"https://youtu.be/HmAsUQEFYGI"),
(17,1,"https://open.spotify.com/track/7KA4W4McWYRpgf0fWsJZWB?si=5be4e44a27f24f34"),
(17,2,"https://music.apple.com/ca/album/see-you-again-feat-kali-uchis/1254572564?i=1254572572"),
(17,3,"https://youtu.be/TGgcC5xg9YI"),
(18,1,"https://open.spotify.com/track/3jHdKaLCkuNEkWcLVmQPCX?si=94f0132d442045a8"),
(18,2,"https://music.apple.com/ca/album/best-interest-single/1496259436"),
(18,3,"https://youtu.be/NkMTKGM-efw"),
(19,1,"https://open.spotify.com/track/0EewDLYCINTBqEAEvmoQNx?si=68acae330cb24b88"),
(19,2,"https://music.apple.com/ca/album/menace/1443753968?i=1443754492"),
(19,3,"https://youtu.be/KHxAxaWR5vc"),
(20,1,"https://open.spotify.com/track/0Aku40bfcW03gPURCFPWnb?si=49c97c2d9ba54636"),
(20,2,"https://music.apple.com/ca/album/venus/1443753968?i=1443754798"),
(20,3,"https://youtu.be/LsmyPjahk20"),
(21,1,"https://open.spotify.com/track/4SIcGSJqTXg5zL9atiSYRL?si=29bb8cdd5052428a"),
(21,2,"https://music.apple.com/ca/album/casino/1443753968?i=1443754969"),
(21,3,"https://youtu.be/EtnYiNpK74s"),
(22,1,"https://open.spotify.com/track/2ewjMyCbNv2X1dB2qIDCwD?si=58dca9b032134bab"),
(22,2,"https://music.apple.com/ca/album/%CE%B8-macarena/1440888455?i=1440888904"),
(22,3,"https://youtu.be/GGhKPm18E48"),
(23,1,"https://open.spotify.com/track/2chIkORxBLpPVgruGiMY8k?si=3550f764b6134505"),
(23,2,"https://music.apple.com/ca/album/911/1532027611?i=1532028230"),
(23,3,"https://youtu.be/56STvMBKYdw"),
(24,1,"https://open.spotify.com/track/2BYiWgDk243sjYEDjs2agc?si=7532d1a52fd3447f"),
(24,2,"Indispo"),
(24,3,"https://youtu.be/6f7-Mj2PSDQ"),
(25,1,"https://open.spotify.com/track/7pTCGpz43p0txphdsvWBNV?si=1155886dbc254711"),
(25,2,"https://music.apple.com/ca/album/ouais-ouais/1457391938?i=1457392034"),
(25,3,"https://youtu.be/ZKnUrhbKL6g"),
(26,1,"https://open.spotify.com/track/3jGpGXoSwhyTNGew06h1NH?si=e115129917134375"),
(26,2,"https://music.apple.com/ca/album/zolabeille/1457391938?i=1457392210"),
(26,3,"https://youtu.be/itVrblcm5ss"),
(27,1,"https://open.spotify.com/track/2CdwW0Zz3dQlX9cHzsC83y?si=846be733e2ce443d"),
(27,2,"https://music.apple.com/ca/album/california-girl/1363899192?i=1363899744"),
(27,3,"https://youtu.be/A2PMldDoKaQ"),
(28,1,"https://open.spotify.com/track/0VjIjW4GlUZAMYd2vXMi3b?si=6cdd5a907b3c4f72"),
(28,2,"https://music.apple.com/ca/album/blinding-lights/1488408555?i=1488408568"),
(28,3,"https://youtu.be/fHI8X4OXluQ"),
(29,1,"https://open.spotify.com/track/7szuecWAPwGoV1e5vGu8tl?si=0b2c261ba9cf4dad"),
(29,2,"https://music.apple.com/ca/album/in-your-eyes/1499378108?i=1499378612"),
(29,3,"https://youtu.be/E3QiD99jPAg"),
(30,1,"https://open.spotify.com/track/7MXVkk9YMctZqd1Srtv4MB?si=708d87084d5f4b6e"),
(30,2,"https://music.apple.com/ca/album/starboy-feat-daft-punk/1440871397?i=1440871420"),
(30,3,"https://youtu.be/34Na4j8AVgA");

CREATE TABLE t_liked(
  idxMusic INT NOT NULL,
  idxUser INT NOT NULL,
  CONSTRAINT fk_t_liked_t_music_idMusic FOREIGN KEY (idxMusic) REFERENCES t_music(idMusic) ON DELETE CASCADE,
  CONSTRAINT fk_t_liked_t_user_idUser FOREIGN KEY (idxUser) REFERENCES t_user(idUser) ON DELETE CASCADE
);

INSERT INTO t_liked (idxMusic, idxUser) VALUES 
(2, 2),
(10, 2),
(4, 2),
(7, 2),
(20, 2),
(1, 2),
(16, 2);
