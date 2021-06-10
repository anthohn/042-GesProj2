<?php 
/**
* ETML
* Auteur      : Anthony Höhn
* Date        : 04.03.2021
* Description : delete a playlist
**/

require "template/header.php";

// Check the user's privilege
if(isLogged() && (isAdmin()))
{  
    // Check that the get is not fast, check if the get is numeric -> reject the html and php code (+ secure)
    if(!isset($_GET['idPlaylist']) OR !is_numeric($_GET['idPlaylist']))
    {
        header('Location:404.php');
    }
    else
    {
        $idPlaylist = $_GET['idPlaylist'];
        $db->deleteOnePlaylist($idPlaylist);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }  
}
else
{
    header('Location: template/404.php'); 
}
?>
