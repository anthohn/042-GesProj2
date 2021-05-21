<?php require "template/header.php";

if(isLogged() && (isAdmin()))
{     
    // Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
    if(!isset($_GET['idArtist']) OR !is_numeric($_GET['idArtist']))
    {
        header('Location:404.php');
    }
    // Si tout est ok -> appelle les fonctions
    else
    {
        $idArtist = $_GET['idArtist'];
        $db->deleteOneArtist($idArtist);
        header('Location: allartists.php');    
    } 
}
else
{
    header('Location: template/404.php'); 
}
?>
