<?php

require "template/header.php";

if(isLogged() && (isAdmin()))
{
    $id = $_GET["idMusic"];
    $deleteArtist = $DB->deleteOneMusic($id);
    header('Location: alltitle.php');  
}
else
{
    header('Location: template/404.php'); 
} 
?>