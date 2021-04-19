<!--
ETML
Auteur      : Anthony Höhn / Killian Good / Younes sayeh / julien il connnait pas encore ca 
Date        : 15.03.2021
Description : controller
-->
<?php
class DB{
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
        //Essaye de se connecter à la base de données en utilisant les variables crées plus haut
        try{
        $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->database.";charset=utf8", $this->username, $this->password);
        //Si la connexion n'est pas établie un messaye d'erreur s'affiche
        }catch(PDOException $e)
        {
            die("<h1>La connexion à la base de données est impossible.</h1>"); 
        }
    }
    private function querySimpleExecute($query){

        $req = $this->connector->query($query);
        return $req;
    }

    private function queryPrepareExecute($query, $binds){
        $req = $this->db->prepare($query);
        foreach($binds as $bind){
            $req->bindValue($bind['field'], $bind['value'], $bind['type']);
        }
        $req->execute();
        return $req;
    }

    //fonction pour afficher tous les tites -> "alltitle.php"
    public function getAllTitle(){
        $query = "SELECT idMusic, musName, musDuration, artName, typeName FROM t_music  JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType; ";
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //fonction pour afficher tous les artistes -> "allartists.php"
    public function getAllArtists(){
        $query = "SELECT idArtist, artName, artBirth, couCountry FROM t_artist JOIN t_country ON idxCountry = idCountry";
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    public function getAllLink(){
        $query = "SELECT linLink FROM t_link";
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //fonction qui va chercher les musiques de chaque artiste + sécurisé qu'avant 
    public function getAEachArtist($id){
        $query = "SELECT idArtist, artName FROM t_artist WHERE idArtist = :id";
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
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }
    
    //fonction qui va chercher le nom de l'utilisateur -> Killian Good
    public function getUserAccount(){
        $query = "SELECT username FROM accounts";
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }


    public function getSearchedArtistsMusics($search){
        $query = 'SELECT artName, musName FROM t_music JOIN t_artist ON t_music.idxArtist = t_artist.idArtist WHERE artName LIKE "%'.$search.'%" OR musName LIKE "%'.$search.'%" ORDER BY artName ASC';
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);

        $this->unsetData($reqExecuted);
        return $results;
    }

    //relier au dessus
    public function getAllTitleSearched($search){
        $query = 'SELECT idMusic, musName, musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType WHERE artName LIKE "%'.$search.'%" OR musName LIKE "%'.$search.'%" ORDER BY idArtist ASC;';
        $reqExecuted = $this->queryExecute($query);
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

    private function queryExecute($query){
        $req = $this->db->query($query);
        return $req;
    }

    //récupérer tous les genres de musique
    public function getAllType(){
        $query = "SELECT idType, typeName FROM t_type";
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    //récupérer tous les pays
    public function getAllCountry(){
        $query = "SELECT idCountry, couCountry FROM t_country";
        $reqExecuted = $this->queryExecute($query);
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
        return $results;
    }
    public function query($sql, $data = array()){
        $req =$this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    private function formatData($req){

        $result = $req->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    private function unsetData($req){

        $req->closeCursor();
    }    
}
