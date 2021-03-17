<!--
ETML
Auteur      : Anthony Höhn
Date        : 15.03.2021
Description : controller
-->
<?php
class DB{
    //Déclaration des variables de connection
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "P_db_042main";
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
          $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);
        //Si la connexion n'est pas établie un messaye d'erreur s'affiche
        }catch(PDOException $e){
            die("<h1>Impossible de se connecter à la base de données</h1>"); 
        }
    }

    //fonction pour afficher tous les tites -> "alltitle.php"
    public function getAllTitle(){
        $query = "SELECT idMusic, musName, musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType;";
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

    //fonction pour la page chaque artiste suivant leur id -> "detailArtist.php"
    public function getAEachArtist(){
        $query = "SELECT idArtist, musName, musDuration, artName FROM t_music JOIN t_artist ON idxArtist = idArtist WHERE idArtist =" . $_GET["idArtist"];
        $reqExecuted = $this->queryExecute($query);
        $results = $this->formatData($reqExecuted);
        $this->unsetData($reqExecuted);
        return $results;
    }

    public function query($sql, $data = array()){
        $req =$this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    private function queryExecute($query){
        $req = $this->db->query($query);
        return $req;
    }

    private function formatData($req){

        $result = $req->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    private function unsetData($req){

        $req->closeCursor();
    }

    
}
