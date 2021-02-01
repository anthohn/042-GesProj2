-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Mon Feb  1 13:43:29 2021 
-- * LUN file: C:\Users\julcartier\Desktop\042_Ges-Proj.lun 
-- * Schema: gesproj/mld 
-- ********************************************* 


-- Database Section
-- ________________ 

create database gesproj;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table t_morceau (
     idMorceau char(1) not null,
     morNom char(1) not null,
     musGenre char(1) not null,
     musDuree char(1) not null,
     constraint ID_t_morceau_ID primary key (idMorceau));

create table t_artiste (
     idArtiste char(1) not null,
     artNom -- Compound attribute -- not null,
     artOrigin char(1) not null,
     artNaissance char(1) not null,
     constraint ID_t_artiste_ID primary key (idArtiste));

create table t_jouer (
     idArtiste char(1) not null,
     idMorceau char(1) not null,
     constraint ID_t_jouer_ID primary key (idMorceau, idArtiste));


-- Constraints Section
-- ___________________ 

alter table t_morceau add constraint ID_t_morceau_CHK
     check(exists(select * from t_jouer
                  where t_jouer.idMorceau = idMorceau)); 

alter table t_artiste add constraint ID_t_artiste_CHK
     check(exists(select * from t_jouer
                  where t_jouer.idArtiste = idArtiste)); 

alter table t_jouer add constraint FKt_j_t_m
     foreign key (idMorceau)
     references t_morceau;

alter table t_jouer add constraint FKt_j_t_a_FK
     foreign key (idArtiste)
     references t_artiste;


-- Index Section
-- _____________ 

create unique index ID_t_morceau_IND
     on t_morceau (idMorceau);

create unique index ID_t_artiste_IND
     on t_artiste (idArtiste);

create unique index ID_t_jouer_IND
     on t_jouer (idMorceau, idArtiste);

create index FKt_j_t_a_IND
     on t_jouer (idArtiste);

