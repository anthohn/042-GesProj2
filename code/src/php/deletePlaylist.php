<?php
require "template/header.php";


if(isLogged() && (isAdmin()))
{   
   
    $idPlaylist = $_GET["idPlaylist"];
    $db->deleteOnePlaylist($idPlaylist);
    header('Location: playlists.php');  
}
else
{
    header('Location: template/404.php'); 
}
?>
