<!--
ETML
Auteur      : Anthony Höhn, Killian Good, Younes sayeh
Date        : 11.05.2021
Description : database.php fichier où se trouve les fonctions pour le fonctionnement du site
-->
<?php

/**
 * Class Database to connect on the database
 */
class db{
    //Déclaration des variables de connection
    private $host;
    private $username;
    private $password;
    private $database;
    private $db;

    public function __construct($host = null, $username = null, $password = null, $database = null){
        if($host != null ){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        /**
         * Try to open the connection on the database
         * If catch a PDOException -> show the error
         */ 
        try
        {
        $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->database.";charset=utf8", $this->username, $this->password);
        }
        catch(PDOException $e)
        {
            die("<h1>La connexion à la base de données est impossible.</h1>"); 
        }
    }

    /**
     * Function querySimpleExecute to execute a SQL query without WHERE
     * @param $query
     */
    private function querySimpleExecute($query){
        $req = $this->db->query($query);
        return $req;
    }

    /**
     * Function queryPrepareExecute to execute a SQL query with WHERE and avoid SQL injections
     * @param $query
     * @param $binds
     */
    private function queryPrepareExecute($query, $binds){
        $req = $this->db->prepare($query);
        foreach($binds as $bind){
            $req->bindValue($bind['field'], $bind['value'], $bind['type']);
        }
        $req->execute();
        return $req;
    }

    /**
     * Function query
     * @param $sql
     * @param $data
     */
    public function query($sql, $data = array()){
        $req =$this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }


    /**
     * Function formatData to get the result of the SQL query in an associative array
     * @param $req
     */
    private function formatData($req){
        $results = $req->fetchALL(PDO::FETCH_ASSOC);
        return $results;
    }

    /**
     * Function unsetData to empty the record set
     * @param $req
     */
    private function unsetData($req){
        $req->closeCursor();
    }    

    //fonction pour afficher tous les tites -> "alltitle.php"
    public function getAllTitle(){
        $query = 'SELECT idMusic, musName, musDuration, artName, typeName FROM t_music  JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType ORDER BY idMusic';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //fonction pour afficher tous les artistes -> "allartists.php"
    public function getAllArtists(){
        $query = "SELECT idArtist, artName, artBirth, couCountry FROM t_artist JOIN t_country ON idxCountry = idCountry";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function 
     * @param $idMusic
     */
    public function getLinkEachMusics($idMusic){
        $query = 'SELECT * FROM t_link JOIN t_music ON idxMusic = idMusic JOIN t_typelink ON idxTypelink = idTypelink WHERE idMusic = :idMusic';
        $binds = array(
            0 => array(
                'field' => ':idMusic',
                'value' => $idMusic,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //fonction qui va chercher les musiques de chaque artiste + sécurisé qu'avant 
    public function getArtist($idArtist){
        $query = "SELECT idArtist, artName, artBirth, couCountry FROM t_artist  JOIN t_country ON idxCountry = idCountry WHERE idArtist = :idArtist";
        $binds = array(
            0 => array(
                'field' => ':idArtist',
                'value' => $idArtist,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function modification d'un artiste
     * @param $req
     */
    public function updateArtist($idArtist, $name, $date){
        $query = 'UPDATE t_artist SET artName = :artName,  artBirth = :artBirth WHERE idArtist = :idArtist';
        $binds = array(
            0 => array(
                'field' => ':idArtist',
                'value' => $idArtist,
                'type' => PDO::PARAM_INT
            ),
            1 => array(
                'field' => ':artName',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ),
            2 => array(
                'field' => ':artBirth',
                'value' => $date,
                'type' => PDO::PARAM_STR
            )
        );
        $results = $this->queryPrepareExecute($query, $binds);
        return $results;
    } 


    //Suppression d'un artistes dans la bdd 
    public function deleteOneArtist($id){
        $query = "DELETE FROM t_artist WHERE idArtist = :id";
        $binds = array(
            0 => array(
                'field' => ':id',
                'value' => $id,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //fonction qui va chercher les musiques de chaque artiste
    public function getMusicEachArtist(){
        $query = "SELECT idMusic, musName, musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist  JOIN t_type ON idxType = idType WHERE idArtist =" . $_GET["idArtist"];
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //
    public function getSearchedArtistsMusicsPlaylists($search){
        $query = 'SELECT artName, musName, plaName, plaCreationDate FROM t_music JOIN t_artist ON t_music.idxArtist = t_artist.idArtist JOIN t_add ON t_add.idxMusic = t_music.idMusic JOIN t_playlist ON t_playlist.idPlaylist = t_add.idxPlaylist WHERE artName LIKE "%'.$search.'%" OR musName LIKE "%'.$search.'%" OR plaName LIKE "%'.$search.'%" ORDER BY artName ASC';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);

        $this->unsetData($reqExecuted);
        return $results;
    }

    //relier au dessus
    public function getAllTitleSearched($search){
        $query = 'SELECT idMusic, musName, musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType WHERE artName LIKE "%'.$search.'%" OR musName LIKE "%'.$search.'%" ORDER BY idArtist ASC';        
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //relier au dessus
    public function getAllPlaylistSearched($search){
        $query = 'SELECT * FROM t_music JOIN t_artist ON t_music.idxArtist = t_artist.idArtist JOIN t_add ON t_add.idxMusic = t_music.idMusic JOIN t_playlist ON t_playlist.idPlaylist = t_add.idxPlaylist WHERE artName LIKE "%'.$search.'%" OR musName LIKE "%'.$search.'%" OR plaName LIKE "%'.$search.'%" ORDER BY artName ASC';       
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //Ajouter une musique 
    public function addTeacher($surname, $firstname, $gender , $nickname, $origin){
        $query = "INSERT INTO t_music (teaFirstname, teaName, teaGender, teaNickname, teaOrigin) VALUES (:surname, :firstname, :gender, :nickname, :origin)";
        $binds = array(
            0 => array(
                'field' => ':surname',
                'value' => $surname,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':firstname',
                'value' => $firstname,
                'type' => PDO::PARAM_STR
            ),
            2 => array(
                'field' => ':gender',
                'value' => $gender,
                'type' => PDO::PARAM_STR
            ),
            3 => array(
                'field' => ':nickname',
                'value' => $nickname,
                'type' => PDO::PARAM_STR
            ),
            4 => array(
                'field' => ':origin',
                'value' => $origin,
                'type' => PDO::PARAM_STR
            )
        );
        $results = $this->queryPrepareExecute($query, $binds);
        return $results;
    }

    //Suppression d'une musique dans la bdd 
    public function deleteOneMusic($id){
        $query = "DELETE FROM t_music WHERE idMusic = :id";
        $binds = array(
            0 => array(
                'field' => ':id',
                'value' => $id,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupérer tous les genres de musique
    public function getAllType(){
        $query = "SELECT idType, typeName FROM t_type";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupérer tous les pays
    public function getAllCountry(){
        $query = "SELECT idCountry, couCountry FROM t_country";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupere les titres likés d'un utilisateur 
    public function getLikedtitles($idUser){
        $query = 'SELECT * FROM t_liked JOIN t_user ON idxUser = idUser JOIN t_music ON idxMusic = idMusic JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType WHERE idUser = :idUser';
        $binds = array(
            0 => array(
                'field' => ':idUser',
                'value' => $idUser,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //permet d'ajouter un titre dans sa liste de titre likés
    public function addLikedMusic($idMusic, $idUser) {
        $query = "INSERT INTO t_liked (idxMusic, idxUser) VALUES (:idMusic, :idUser)";
        $binds = array(
            0 => array(
                'field' => ':idMusic',
                'value' => $idMusic,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':idUser',
                'value' => $idUser,
                'type' => PDO::PARAM_STR
            )     
        );
        $results = $this->queryPrepareExecute($query, $binds);
        return $results;
    }

    //Permet de supprimer un titre likés
    public function suppLikedMusic($idMusic, $idUser){
        $query = 'DELETE FROM t_liked WHERE idxMusic = :idMusic AND idxUser = :idUser';
        $binds = array(
            0 => array(
                'field' => ':idMusic',
                'value' => $idMusic,
                'type' => PDO::PARAM_INT
            ),
            1 => array(
                'field' => ':idUser',
                'value' => $idUser,
                'type' => PDO::PARAM_INT
            )     
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupere les playlists (sans forcément que l'utilisateur soit connecté)
    public function getPlaylists(){
        $query = 'SELECT * FROM t_playlist WHERE idxUser is NULL';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupere les playlists d'UN utilisateur
    public function getPlaylistsUser($idUser){
        $query = 'SELECT * FROM t_playlist JOIN t_user ON idxUser = idUser WHERE idUser = :idUser';
        $binds = array(
            0 => array(
                'field' => ':idUser',
                'value' => $idUser,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupere une playlist
    public function getPlaylist($idPlaylist){
        $query = 'SELECT * FROM t_playlist WHERE idPlaylist = :idPlaylist';
        $binds = array(
            0 => array(
                'field' => ':idPlaylist',
                'value' => $idPlaylist,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //Suppression d'une playlist
    public function deleteOnePlaylist($idPlaylist){
        $query = 'DELETE FROM t_playlist WHERE idPlaylist = :idPlaylist';
        $binds = array(
            0 => array(
                'field' => ':idPlaylist',
                'value' => $idPlaylist,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupere les music contenu dans la playlist 
    public function getMusicsPlaylist($idPlaylist){
        $query = 'SELECT * FROM t_add JOIN t_music ON idxMusic = idMusic JOIN t_playlist ON idxPlaylist = idPlaylist JOIN t_type ON idxType = idType WHERE idPlaylist = :idPlaylist';
        $binds = array(
            0 => array(
                'field' => ':idPlaylist',
                'value' => $idPlaylist,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    // fonction pour ajouter un artistes dans la bdd
    public function addArtist($name, $date, $country){
        $query = "INSERT INTO t_artist (artName, artBirth, idxCountry) VALUES (:artName, :artBirth, :idxCountry)";
        $binds = array(
            0 => array(
                'field' => ':artName',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':artBirth',
                'value' => $date,
                'type' => PDO::PARAM_STR //https://stackoverflow.com/questions/2374631/pdoparam-for-dates
            ),
            2 => array(
                'field' => ':idxCountry',
                'value' => $country,
                'type' => PDO::PARAM_STR
            )
        );
        $results = $this->queryPrepareExecute($query, $binds);

        $query2 = "SELECT LAST_INSERT_ID()";
        $results2 = $this->querySimpleExecute($query2);
        $results2 = $this->formatData($results2);

        return $results2[0]["LAST_INSERT_ID()"];
    }

    // fonction pour ajouter une musique dans la bdd
    public function addTitle($name, $duration){
        $query = 'INSERT INTO t_music (musName, musDuration) VALUES (:musName, :musDuration)';
        $binds = array(
            0 => array(
                'field' => ':musName',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':musDuration',
                'value' => $duration,
                'type' => PDO::PARAM_INT 
            )
        );
        $results = $this->queryPrepareExecute($query, $binds);

        //récupere le dernier ID (qui vient d'être inséré)
        $query2 = "SELECT LAST_INSERT_ID()";
        $results2 = $this->querySimpleExecute($query2);
        $results2 = $this->formatData($results2);

        return $results2[0]["LAST_INSERT_ID()"];
    }

    //Connexion d'un utilisateur à la bdd
    public function getUsers(){
        $query = "SELECT * FROM t_user";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //ajout d'un utilisateur dans la bdd 
    public function addUser($login, $psw){
        $query = "INSERT INTO t_user (useLogin, usePassword) VALUES (:useLogin, :usePassword)";
        $binds = array(
            0 => array(
                'field' => ':useLogin',
                'value' => $login,
                'type' => PDO::PARAM_STR
            ),  
            1 => array(
                'field' => ':usePassword',
                'value' => $psw,
                'type' => PDO::PARAM_STR
            )
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    // Suppression d'untilisateur dans la bdd
    public function deleteUser($idUser){
        $query = "DELETE FROM t_user WHERE idUser = :id";
        $binds = array(
            0 => array(
                'field' => ':id',
                'value' => $idUser,
                'type' => PDO::PARAM_INT
            )    
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }  
}
