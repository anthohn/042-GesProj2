<?php
require "header.php";
if(isLogged() && (isAdmin())):

$id = $_GET["idMusic"];
$deleteArtist = $DB->deleteOneMusic($id);
header('Location: alltitle.php');  


else :
    header('Location: 404.php'); 

endif; 
?>