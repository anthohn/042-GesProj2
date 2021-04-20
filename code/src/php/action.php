<?php require "header.php"; 
$id = $_GET["idMusic"];

if(isset($_GET['t'], $_GET['idMusic']) && !empty($_GET['t']) && !empty($_GET['idMusic']))
{
    // print_r($id);
    $test = $DB->checkMusic($id);



}
