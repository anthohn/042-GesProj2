<?php


require "header.php";

$bddPDO = new PDO("mysql:host=localhost;dbname=p_db_042main", "root", "root");



if(isset($_POST["submit"])){
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $genre = $_POST["genre"];
    $duree = $_POST["duree"];
    // $idx = $_POST["idx"];

    if(!empty($id) && !empty($nom) && !empty($genre) && !empty($duree)){
        $requete = $bddPDO->prepare("INSERT INTO t_musique (idMusique, musNom, musGenre, musDuree) VALUES(:id, :nom, :genre, :duree)");

        $requete->bindvalue(":id", $id);
        $requete->bindvalue(":nom", $nom);
        $requete->bindvalue(":genre", $genre);
        $requete->bindvalue(":duree", $duree);
        // $requete->bindvalue(":idx", $idx);


        $requete->execute();

        if(!$result){
            echo "<h1>Erreur lors de l'insertion</h1>";
        }
        else{
            echo "<h1>Tous les champs sont requis</h1>";
        }
    }else
    {
        echo "Tous les champs sont recquis";
    }    
}
?>
<!-- formulaire -->
<div class="formulaire">
    <h1>Ajouter une musique</h1>
    <form action="formulaire.php" method="post">
       <p>
            <label for="id">id</label>
            <input id="id" type="text" name="id">
        </p>
        <p>
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom">
        </p>
        <p>
            <label for="genre">Genre</label>
            <input id="genre" type="text" name="genre">
        </p>
        <p>
            <label for="duree">Durée</label>
            <input id="duree" type="text" name="duree">
        </p>  
        <!-- <p>
            <label for="idx">idx</label>
            <input id="idx" type="text" name="idx">
        </p>       -->
        <button type="submit" id="submit" name="submit">Enregistrer</boutton>
    </form>
</div>
