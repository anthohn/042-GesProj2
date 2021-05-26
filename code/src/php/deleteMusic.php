<?php require "template/header.php";

if(isLogged() && (isAdmin()))
{
    // Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
    if(!isset($_GET['idMusic']) OR !is_numeric($_GET['idMusic']))
    {
        header('Location:404.php');
    }
    // Si tout est ok -> appelle les fonctions
    else
    {
        $idMusic = $_GET['idMusic'];
        $deleteArtist = $db->deleteOneMusic($idMusic);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } 
}
else
{
    header('Location: template/404.php'); 
} 
?>