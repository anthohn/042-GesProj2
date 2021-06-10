<!--
ETML
Auteur      : Anthony Höhn, Killian Good, Younes sayeh
Date        : 16.05.2021
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

    /**
     * Function to get all titles -> "alltitle.php"
     * @param $idArtist
     */
    public function getAllTitle(){
        $query = 'SELECT idArtist, idMusic, musName, DATE_FORMAT(musDuration, "%H:%i") AS musDuration, artName, typeName FROM t_music  JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType ORDER BY musName DESC';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to get one music from an artist
     * @param $idArtist
     */
    public function getMusic($idMusic){
        $query = 'SELECT idArtist, idMusic, musName, musDuration, artName, idType, typeName FROM t_music  JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType WHERE idMusic = :idMusic';
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

    /**
     * Function to get all artists -> "allartists.php"
     * @param $idArtist
     */
    public function getAllArtists(){
        $query = 'SELECT idArtist, artName, DATE_FORMAT(artBirth, "%d/%m/%Y") AS artBirth, couCountry FROM t_artist JOIN t_country ON idxCountry = idCountry';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to get one artist
     * @param $idArtist
     */
    public function getArtist($idArtist){
        $query = 'SELECT idArtist, artName, DATE_FORMAT(artBirth, "%d/%m/%Y") AS artBirth, idCountry, couCountry FROM t_artist  JOIN t_country ON idxCountry = idCountry WHERE idArtist = :idArtist';
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
     * Function to get the link for each musics
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

    /**
     * Function to update the artist's informations
     * @param $idArtist
     * @param $name
     * @param $date
     * @param $country
     */
    public function updateArtist($idArtist, $name, $date, $country){
        $query = 'UPDATE t_artist SET artName = :artName,  artBirth = :artBirth, idxCountry = :idxCountry WHERE idArtist = :idArtist';
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
            ),
            3 => array(
                'field' => ':idxCountry',
                'value' => $country,
                'type' => PDO::PARAM_INT
            )
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    } 

    /**
     * Function to update the music's informations
     * @param $idMusic
     * @param $name
     * @param $time
     * @param $artist
     * @param $type
     */
    public function updateMusic($idMusic, $name, $time, $artist, $type){
        // echo $time;
        // die();
        $query = 'UPDATE t_music SET musName = :musName,  musDuration = :musDuration, idxArtist = :idxArtist, idxType = :idxType WHERE idMusic = :idMusic';
        $binds = array(
            0 => array(
                'field' => ':idMusic',
                'value' => $idMusic,
                'type' => PDO::PARAM_INT
            ),
            1 => array(
                'field' => ':musName',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ),
            2 => array(
                'field' => ':musDuration',
                'value' => $time,
                'type' => PDO::PARAM_STR
            ),
            3 => array(
                'field' => ':idxArtist',
                'value' => $artist,
                'type' => PDO::PARAM_INT
            ),
            4 => array(
                'field' => ':idxType',
                'value' => $type,
                'type' => PDO::PARAM_INT
            )
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to delete one artist
     * @param $idArtist
     */
    public function deleteOneArtist($idArtist){
        $query = 'DELETE FROM t_artist WHERE idArtist = :idArtist';
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
     * Function to get the music for each artist
     * @param $idArtist
     */
    public function getMusicEachArtist($idArtist){
        $query = 'SELECT idMusic, musName, DATE_FORMAT(musDuration, "%H:%i") AS musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist  JOIN t_type ON idxType = idType WHERE idArtist = :idArtist';
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
     * Function to get the artist, music, playlist name compared to the user's research
     * @param $search
     */
    public function getSearchedArtistsMusicsPlaylists($search){
        $query = 'SELECT artName, musName, plaName, plaCreationDate FROM t_music JOIN t_artist ON t_music.idxArtist = t_artist.idArtist JOIN t_add ON t_add.idxMusic = t_music.idMusic JOIN t_playlist ON t_playlist.idPlaylist = t_add.idxPlaylist WHERE artName LIKE "%'.$search.'%" OR musName LIKE "%'.$search.'%" OR plaName LIKE "%'.$search.'%" ORDER BY artName ASC';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to get all the title searched
     * @param $search
     */
    public function getAllTitleSearched($search){
        $query = 'SELECT idArtist, idMusic, musName, DATE_FORMAT(musDuration, "%H:%i") AS musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType WHERE artName LIKE "%'.$search.'%" OR musName LIKE "%'.$search.'%" ORDER BY idArtist ASC';        
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to get all the public playlist searched
     * @param $search
     */
    public function getAllPublicPlaylistSearched($search){
        $query = 'SELECT DISTINCT idPlaylist, plaName, plaCreationDate FROM t_music JOIN t_artist ON t_music.idxArtist = t_artist.idArtist JOIN t_add ON t_add.idxMusic = t_music.idMusic JOIN t_playlist ON t_playlist.idPlaylist = t_add.idxPlaylist WHERE idxUser IS NULL AND plaName LIKE "%'.$search.'%" ORDER BY artName ASC';  
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to get all the private playlist searched
     * @param $search
     */
    public function getAllPlaylistSearchedUser($search){
        $query = 'SELECT DISTINCT idPlaylist, plaName, plaCreationDate FROM t_music JOIN t_artist ON t_music.idxArtist = t_artist.idArtist JOIN t_add ON t_add.idxMusic = t_music.idMusic JOIN t_playlist ON t_playlist.idPlaylist = t_add.idxPlaylist WHERE plaName LIKE "%'.$search.'%" ORDER BY artName ASC';  
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to get all the artist searched
     * @param $search
     */
    public function getAllArtistSearched($search){
        $query = 'SELECT idArtist, artName, DATE_FORMAT(artBirth, "%d/%m/%Y") AS artBirth, couCountry FROM t_artist JOIN t_country ON idxCountry = idCountry WHERE artName LIKE "%'.$search.'%"';  
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to delete one music
     * @param $idMusic
     */
    public function deleteOneMusic($idMusic){
        $query = "DELETE FROM t_music WHERE idMusic = :idMusic";
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

    /**
     * Function get all the kinds of music
     */
    public function getAllType(){
        $query = "SELECT idType, typeName FROM t_type";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function get all the countries
     */   
    public function getAllCountry(){
        $query = "SELECT idCountry, couCountry FROM t_country";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function get all the user's liked title(s)
     * @param $idUser
     */
    public function getLikedtitles($idUser){
        $query = 'SELECT idxMusic, idArtist, artName, idMusic, artName, musName, typeName, DATE_FORMAT(musDuration, "%H:%i") AS musDuration FROM t_liked JOIN t_user ON idxUser = idUser JOIN t_music ON idxMusic = idMusic JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType WHERE idUser = :idUser ORDER BY idLiked DESC';
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

    /**
     * Function add a title to the liked music
     * @param $idMusic
     * @param $idUser
     */
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
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function to delete a liked music
     * @param $idMusic
     * @param $idUser
     */
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

    /**
     * Function retrieves playlists (without necessarily the user being logged in)
     */
    public function getPlaylists(){
        $query = 'SELECT idPlaylist, plaName, DATE_FORMAT(plaCreationDate, "%d/%m/%Y") AS plaCreationDate FROM t_playlist WHERE idxUser is NULL';
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function get all the user's playlist(s)
     * @param $idUser
     */
    public function getPlaylistsUser($idUser){
        $query = 'SELECT idPlaylist, plaName, DATE_FORMAT(plaCreationDate, "%d/%m/%Y") AS plaCreationDate FROM t_playlist JOIN t_user ON idxUser = idUser WHERE idUser = :idUser';
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

    /**
     * Function get all the user's playlist(s) searched
     * @param $idUser
     * @param $search
     */
    public function getPlaylistsUserSearch($idUser, $search){
        $query = 'SELECT idPlaylist, plaName, DATE_FORMAT(plaCreationDate, "%d/%m/%Y") AS plaCreationDate FROM t_playlist JOIN t_user ON idxUser = idUser WHERE idUser = :idUser AND plaName LIKE "%'.$search.'%"';
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

    /**
     * Function get one playlist
     * @param $idPlaylist
     */
    public function getPlaylist($idPlaylist){
        $query = 'SELECT idPlaylist, plaName, DATE_FORMAT(plaCreationDate, "%d/%m/%Y") AS plaCreationDate FROM t_playlist WHERE idPlaylist = :idPlaylist';
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

    /**
     * Function to add a public playlist (admin access)
     * @param $playlistName
     */
    public function addPublicPlaylist($playlistName) {
        $query = 'INSERT INTO t_playlist (plaName, plaCreationDate, idxUser) VALUES (:plaName, now(), :idxUser)';
        $binds = array(
            0 => array(
                'field' => ':plaName',
                'value' => $playlistName,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':idxUser',
                'value' => NULL,
                'type' => PDO::PARAM_INT
            )                
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        
        $query2 = "SELECT LAST_INSERT_ID()";
        $results2 = $this->querySimpleExecute($query2);
        $results2 = $this->formatData($results2);

        return $results2[0]["LAST_INSERT_ID()"];
    }

    /**
     * Function to add a personnal user's playlist
     * @param $playlistName
     */
    public function addPersonnalPlaylist($playlistName, $idUser) {
        $query = 'INSERT INTO t_playlist (plaName, plaCreationDate, idxUser) VALUES (:plaName, now(), :idxUser)';
        $binds = array(
            0 => array(
                'field' => ':plaName',
                'value' => $playlistName,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':idxUser',
                'value' => $idUser,
                'type' => PDO::PARAM_INT
            )                
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        
        $query2 = "SELECT LAST_INSERT_ID()";
        $results2 = $this->querySimpleExecute($query2);
        $results2 = $this->formatData($results2);

        return $results2[0]["LAST_INSERT_ID()"];
    }

    /**
     * Function to add a music in a playlist
     * @param $newID
     * @param $checkedMusic
     */
    public function addMusicPlaylist($newID, $checkedMusic) {
        $query = 'INSERT INTO t_add (idxPlaylist, idxMusic) VALUES (:idxPlaylist, :idxMusic)';
        $binds = array(
            0 => array(
                'field' => ':idxPlaylist',
                'value' => $newID,
                'type' => PDO::PARAM_INT
            ),
            1 => array(
                'field' => ':idxMusic',
                'value' => $checkedMusic,
                'type' => PDO::PARAM_INT
            )                
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        
        $query2 = "SELECT LAST_INSERT_ID()";
        $results2 = $this->querySimpleExecute($query2);
        $results2 = $this->formatData($results2);

        return $results2[0]["LAST_INSERT_ID()"];
    }

    /**
     * Function add music in an existant playlist
     * @param $idPlaylist
     * @param $checkedMusic
     */
    public function editMusicPlaylist($idPlaylist, $checkedMusic) {
        $query = 'INSERT INTO t_add (idxPlaylist, idxMusic) VALUES (:idxPlaylist, :idxMusic)';
        $binds = array(
            0 => array(
                'field' => ':idxPlaylist',
                'value' => $idPlaylist,
                'type' => PDO::PARAM_INT
            ),
            1 => array(
                'field' => ':idxMusic',
                'value' => $checkedMusic,
                'type' => PDO::PARAM_INT
            )                
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function add musics in playlist
     * @param $idPlaylist
     * @param $checkedMusic
     */
    public function updatePlaylist($idPlaylist, $checkedMusic){
        $query = 'UPDATE t_add SET idxMusic = :idxMusic WHERE idxPlaylist = :idxPlaylist';
        $binds = array(
            0 => array(
                'field' => ':idxPlaylist',
                'value' => $idPlaylist,
                'type' => PDO::PARAM_INT
            ),
            1 => array(
                'field' => ':idxMusic',
                'value' => $checkedMusic,
                'type' => PDO::PARAM_INT
            )
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }
    
    /**
     * Function edit playlist name
     * @param $idPlaylist
     * @param $checkedMusic
     */
    public function updatePlaylistName($idPlaylist, $playlistName){
        $query = 'UPDATE t_playlist SET plaName = :plaName WHERE idPlaylist = :idPlaylist';
        $binds = array(
            0 => array(
                'field' => ':plaName',
                'value' => $playlistName,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
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

    /**
     * Function deleting a playlist
     * @param $idPlaylist
     */
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

    /**
     * Function to delete playlist
     * @param $idPlaylist
     */
    public function deleteMusicPlaylist($idPlaylist, $idMusic){
        $query = 'DELETE FROM t_add WHERE idxPlaylist = :idxPlaylist AND idAdd = :idAdd';
        $binds = array(
            0 => array(
                'field' => ':idxPlaylist',
                'value' => $idPlaylist,
                'type' => PDO::PARAM_INT
            ),
            1 => array(
                'field' => ':idAdd',
                'value' => $idMusic,
                'type' => PDO::PARAM_INT
            )
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function get all the playlist's music(s)
     * @param $idPlaylist
     */
    public function getMusicsPlaylist($idPlaylist){
        $query = 'SELECT idAdd, idPlaylist, idMusic, musName, typeName, DATE_FORMAT(musDuration, "%H:%i") AS musDuration, idArtist, artName FROM t_add JOIN t_music ON idxMusic = idMusic JOIN t_artist ON idxArtist = idArtist JOIN t_playlist ON idxPlaylist = idPlaylist JOIN t_type ON idxType = idType WHERE idPlaylist = :idPlaylist ORDER BY idAdd DESC';
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

    /**
     * Function add artist 
     * @param $name
     * @param $date
     * @param $country
     */
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
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);

        $query2 = "SELECT LAST_INSERT_ID()";
        $results2 = $this->querySimpleExecute($query2);
        $results2 = $this->formatData($results2);

        return $results2[0]["LAST_INSERT_ID()"];
    }

    /**
     * Function add music
     * @param $name
     * @param $duration
     */
    public function addMusic($name, $duration, $artist , $type){
        $query = 'INSERT INTO t_music (musName, musDuration, idxArtist, idxType) VALUES (:musName, :musDuration, :idxArtist, :idxType)';
        $binds = array(
            0 => array(
                'field' => ':musName',
                'value' => $name,
                'type' => PDO::PARAM_STR
            ),
            1 => array(
                'field' => ':musDuration',
                'value' => $duration,
                'type' => PDO::PARAM_STR
            ),
            2 => array(
                'field' => ':idxArtist',
                'value' => $artist,
                'type' => PDO::PARAM_INT 
            ),
            3 => array(
                'field' => ':idxType',
                'value' => $type,
                'type' => PDO::PARAM_INT 
            )
        );
        $reqExecuted = $this->queryPrepareExecute($query, $binds);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);

        //récupere le dernier ID (qui vient d'être inséré)
        $query2 = "SELECT LAST_INSERT_ID()";
        $results2 = $this->querySimpleExecute($query2);
        $results2 = $this->formatData($results2);

        return $results2[0]["LAST_INSERT_ID()"];
    }

    /**
     * Function get all the users
     */
    public function getUsers(){
        $query = "SELECT * FROM t_user";
        $reqExecuted = $this->querySimpleExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    /**
     * Function add user
     * @param $login
     * @param $psw
     */
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

    /**
     * Function delete user
     * @param $idUser
     */
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
