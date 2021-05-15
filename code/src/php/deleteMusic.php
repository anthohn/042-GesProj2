<?php

require "template/header.php";

if(isLogged() && (isAdmin()))
{
    $idMusic = $_GET["idMusic"];
    $deleteArtist = $db->deleteOneMusic($idMusic);
    header('Location: alltitle.php');  
}
else
{
    header('Location: template/404.php'); 
} 
?>