<?php
require "template/header.php";

if(isLogged())
{
    $idMusic = $_GET["idMusic"];
    $idUser = ($_SESSION['idUser']);

    $suppMusicLiked = $db->suppLikedMusic($idMusic, $idUser);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else
{
    header('Location: template/404.php'); 
} 