<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : tkt
-->
<?php require "_header.php";
if(isset($_GET["idMusic"])){
    $liked = $DB->query("SELECT idMusic FROM t_music WHERE idMusic=:idMusic", array("idMusic" => $_GET["idMusic"]));
    if(empty($liked)){
        die("Cette musique n'existe pas sur notre catalogue.");
    }
    $like->add($liked[0]->idMusic);
    var_dump($liked);    
}else {
    echo "<h1>fuck</h1>";
}

?>
		