<?php
require "header.php";
$pdo = null;
// $pdo->query("SET NAMES UTF8"); // encode en  UTF8

if(isset($_POST["submit"])){     //si le bouton a été enclenché
    if(isset($_POST["nom"], $_POST["genre"], $_POST["duree"])){

        $nom = $_POST["nom"];
        $genre = $_POST["genre"];
        $duree = $_POST["duree"];

        $insertion = "INSERT INTO t_musique (musNom, musGenre, musDuree) VALUES($nom, $genre, $duree)";

        $execute = $pdo->query($insertion); //

        if ($execute == true){
            $msgSuccess = "Information enregistrées avec succès";
        } else {
            $msgError = "L'enregistrement n'a pas pu être été éffectuà";
        }
    }
}
?>
<div>
    <?php
        if(isset($msgError)){
            echo $msgError;
            
        } elseif(isset($msgSuccess)) {
            echo $msgSuccess;
        }
    ?>
</div>

<!-- formulaire -->
<div class="formulaire">
    <form action="formulaire.php" method="POST">
        <input type="text" name="nom" placeholder="Nom de la musique"><br> 
        <input type="text" name="genre" placeholder="Genre"><br>
        <input type="text" name="duree" placeholder="Durée de la musique"><br>
        <button type="submit" id="submit">Valider</boutton>
    </form>
</div>