<?php
class DB{
    //Déclaration des variables de connection
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "p_db_042main";
    private $db;


    public function __construct($host = null, $username = null, $password = null, $database = null){
        if($host != null ){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        //Essaye de se connecter à la vase de données en utilisant les variables crées plus haut
        try{
          $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);
        //Si la connexion n'est pas établie un messaye d'erreur s'affiche
        }catch(PDOException $e){
            die("<h1>Impossible de se connecter à la base de données</h1>"); 
        }
    }

    public function query($sql, $data = array()){
        $req =$this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}
