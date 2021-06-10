<?php
/**
* ETML
* Auteur      : Anthony Höhn
* Date        : 01.02.2021
* Description : delete a liked music
**/

require "template/header.php";

if(isLogged())
{
    $idMusic = $_GET["idMusic"];
    $idUser = $_SESSION['idUser'];

    $db->suppLikedMusic($idMusic, $idUser);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else
{
    header('Location: template/404.php'); 
} 