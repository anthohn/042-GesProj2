<?php 
class like {
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION["liked"])){
            $_SESSION["liked"] = array(); //création d'un tableau vide (ou sera stocké les musique likées)
        }
    }

    
}