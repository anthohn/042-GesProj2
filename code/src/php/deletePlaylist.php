<?php
require "template/header.php";

// Vérifie que l'utilisateur soit admin
if(isLogged() && (isAdmin()))
{  
    // Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
    if(!isset($_GET['idPlaylist']) OR !is_numeric($_GET['idPlaylist']))
    {
        header('Location:404.php');
    }
    // Si tout est ok -> appelle les fonctions
    else
    {
        $idPlaylist = $_GET["idPlaylist"];
        $db->deleteOnePlaylist($idPlaylist);
        header('Location: allPlaylists.php');  
    }  
}
else
{
    header('Location: template/404.php'); 
}
?>
