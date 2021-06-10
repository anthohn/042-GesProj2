<?php 
/**
* ETML
* Auteur      : Anthony Höhn
* Date        : 04.03.2021
* Description : delete a music
**/

require "template/header.php";

// Check the user's privilege
if(isLogged() && (isAdmin()))
{
    // Check that the get is not fast, check if the get is numeric -> reject the html and php code (+ secure)
    if(!isset($_GET['idMusic']) OR !is_numeric($_GET['idMusic']))
    {
        header('Location:404.php');
    }
    else
    {
        $idMusic = $_GET['idMusic'];
        $db->deleteOneMusic($idMusic);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } 
}
else
{
    header('Location: template/404.php'); 
} 
?>