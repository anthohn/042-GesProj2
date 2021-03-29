<?php
require "header.php";
$id = $_GET["idArtist"];
$deleteArtist = $DB->deleteOneArtist($id);
header('Location: allartists.php');  
?>