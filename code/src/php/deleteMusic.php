<?php
require "header.php";
$id = $_GET["idMusic"];
$deleteArtist = $DB->deleteOneMusic($id);
header('Location: alltitle.php');  
?>