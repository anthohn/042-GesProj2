<?php
require "template/header.php";

if(isLogged()):
    
    $idMusic = $_GET["idMusic"];
    $idUser = ($_SESSION['idUser']);

    $suppMusicLiked = $DB->suppLikedMusic($idMusic, $idUser);
    header('Location: likedTitle.php');  

else :
    header('Location: template/404.php'); 
endif; 