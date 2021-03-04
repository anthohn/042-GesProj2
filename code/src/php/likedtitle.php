<?php require "_header.php";
if(isset($_GET["id"])){
    $musique = $DB->query("SELECT id FROM t_musique WHERE id=:id", array("id" => $_GET["id"]));
    var_dump($musique);
}else{
    die("<h1>Vous n'avez pas de titres likées</h1>");
}
?>
		