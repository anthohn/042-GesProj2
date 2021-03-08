<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : tkt
-->
<?php require "_header.php";
if(isset($_GET["idMusique"])){
    $liked = $DB->query("SELECT idMusique FROM t_musique WHERE idMusique=:idMusique", array("idMusique" => $_GET["idMusique"]));
    if(empty($liked)){
        die("Cette musique n'existe pas sur notre catalogue.");
    }
    $like->add($liked[0]->idMusique);
    var_dump($liked);    
}else {
    echo "<h1>fuck</h1>";
}

?>
		