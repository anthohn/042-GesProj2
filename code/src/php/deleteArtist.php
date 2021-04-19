<?php
require "header.php";

if(isLogged() && (isAdmin())):
    
$id = $_GET["idArtist"];
$deleteArtist = $DB->deleteOneArtist($id);
header('Location: allartists.php');  

else :
    header('Location: 404.php'); 

endif; 

?>
