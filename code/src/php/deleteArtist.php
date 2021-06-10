<?php 
/**
* ETML
* Auteur      : Anthony Höhn
* Date        : 04.03.2021
* Description : delete an artist
**/

require "template/header.php";

if(isLogged() && (isAdmin()))
{     
    // Check that the get is not fast, check if the get is numeric -> reject the html and php code (+ secure)
    if(!isset($_GET['idArtist']) OR !is_numeric($_GET['idArtist']))
    {
        header('Location:404.php');
    }
    else
    {
        $idArtist = $_GET['idArtist'];
        $db->deleteOneArtist($idArtist);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } 
}
else
{
    header('Location: template/404.php'); 
}
?>
