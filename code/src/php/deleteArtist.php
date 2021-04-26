<?php
require "template/header.php";

if(isLogged() && (isAdmin())):
    
$id = $_GET["idArtist"];
$deleteArtist = $DB->deleteOneArtist($id);
header('Location: allartists.php');  

else :
    header('Location: template/404.php'); 

endif; 

?>
