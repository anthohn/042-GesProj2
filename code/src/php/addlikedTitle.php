<?php
require "template/header.php";

if(isLogged())
{
    $idMusic = $_GET["idMusic"];
    $idUser = ($_SESSION['idUser']);
    $addMusicLiked = $db->addLikedMusic($idMusic, $idUser);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else
{
    header('Location: connexion.php');
}
