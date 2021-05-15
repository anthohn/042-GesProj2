<?php
require "template/header.php";

if(isLogged() && (isAdmin()))
{   
    $idArtist = $_GET["idArtist"];
    $deleteArtist = $db->deleteOneArtist($idArtist);
    header('Location: allartists.php');  
}
else
{
    header('Location: template/404.php'); 
}
?>
