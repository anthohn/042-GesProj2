-- ETML
-- Auteur      : Anthony Höhn
-- Date        : 05.02.2021
-- Description : Base de données db_042main

--
-- Supression (si existe) de la table "db_market" puis création de la  table "db_market"
--

DROP DATABASE if EXISTS P_db_042main;
CREATE DATABASE P_db_042main;

-- --------------------------------------------------------

--
-- Structure de la table `t_artiste`
--

CREATE TABLE t_artiste (
  idArtiste INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ArtNom VARCHAR(50) NOT NULL,
  ArtOrigin VARCHAR(50) NOT NULL,
  ArtNaissance DATE NOT NULL
);

--
-- Déchargement des données de la table `t_artiste`
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
-- Structure de la table `t_musique`
--

CREATE TABLE t_musique (
  idMusique INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  musNom VARCHAR(50) NOT NULL,
  musGenre VARCHAR(50) NOT NULL,
  musDuree FLOAT NOT NULL
);

--
-- Déchargement des données de la table `t_musique`
--

INSERT INTO t_musique (idMusique, musNom, musGenre, musDuree) VALUES
(1, 'gossebumps', 'Hip-hop/Rap', 4.04),
(2, 'STARGAZING', 'Hip-hop/Rap', 4.31),
(3, 'Antidote', 'Hip-hop/Rap', 4.23),
(4, 'Passionfruit', 'Hip-hop/Rap', 4.59),
(5, 'Controlla', 'Hip-hop/Rap', 4.05),
(6, 'Feel No Ways', 'Hip-hop/Rap', 4.01),
(7, 'Gelato', 'Hip-hop/Rap', 3.14),
(8, ' ', ' ', 0.00),
(9, ' ', ' ', 0.00),
(10, 'Cabeza', 'Hip-hop/Rap', 2.28),
(11, 'Avec Toi', 'Hip-hop/Rap', 3.14),
(12, 'Rien à fêter', 'Rap', 2.45),
(13, 'J`aime Bien!', 'Hip-hop/Rap', 3.12),
(14, 'Au Bout', 'Hip-hop/Rap', 4.01),
(15, 'XS', 'Hip-hop/Rap', 3.26),
(16, 'EARFQUAKE', 'Hip-hop/Rap', 3.10),
(17, 'See Yop Again', 'Hip-hop/Rap', 3.10),
(18, 'BEST INTEREST', 'Hip-hop/Rap', 2.07),
(19, 'Menace', 'Hip-hop/Rap', 3.12),
(20, 'Venus', 'Hip-hop/Rap', 3.37),
(21, 'Casino', 'Hip-hop/Rap', 4.50),
(22, 'Θ. Macarena', 'Hip-hop/Rap', 3.26),
(23, '911', 'Hip-hop/Rap', 2.52),
(24, 'Amnésie', 'Hip-hop/Rap', 3.33),
(25, 'Ouais Ouais', 'Hip-hop/Rap', 2.54),
(26, 'Zolabeille', 'Hip-hop/Rap', 2.34),
(27, 'California Girl', 'Hip-hop/Rap', 3.07),
(28, 'Blinding Lights', 'Hip-hop/Rap', 3.20),
(29, 'In your Eyes', 'Synth-pop', 3.58),
(30, 'Starboy', 'RnB', 3.50
);
