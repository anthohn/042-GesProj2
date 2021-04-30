<?php
require "template/header.php";

if(isLogged()):
    
    $idMusic = $_GET["idMusic"];
    $idUser = ($_SESSION['idUser']);

    $addMusicLiked = $DB->addLikedMusic($idMusic, $idUser);
    header('Location: allTitle.php');  

else :
    header('Location: template/404.php'); 

endif; 
