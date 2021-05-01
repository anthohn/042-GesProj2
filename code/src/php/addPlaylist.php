<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : Tous les titres de la base de données rescencé ici grace à un foreach qui va chercher dans la table t_musique
-->
<?php require "template/header.php"; ?>
<?php if(isLogged()): ?>
<?php $musics = $DB->getAllTitle();


?>
<style>
	body {
	/* background-image: url('../../userContent/img/artists/background/4.jpg'); */
	background-size: 1950px 400px;
	background-position: top;
	}
</style>


<form action="addPlaylist.php" method="post">

    <div class="plalistCreaTitle">
        <p>Créer votre playlist</p>
    </div>
    <div class='formCreation'>
        <label for="playlistName">Nom de la playlist:</label>
        <input type="text" id="playlistName[]" name="playlistName">
        <input type="submit" id="btnSubmit" name="btnSubmit" value="Ajouter" />

    </div>
    <div class="playlistCreaBlock">
        <?php foreach ( $musics as $music):?>
            <div class="ARPblock1">
                <input type="checkbox" name="music" value="<?= $music["idMusic"] ?>" />
                <img src="../../userContent/img/music/<?= $music["idMusic"] ?>.jpg" alt="">
                <p><?= $music["musName"]; ?></p>
                <p class="artName">-</p>			
                <p class="artName"><?= $music["artName"]; ?></p>
                <p class="musDuration">-</p>
                <p class="musDuration"><?= $music["musDuration"]; ?></p>
                <p class="typeName">-</p>
                <p class="typeName"><?= $music["typeName"]; ?></p>	
            </div>
        <?php endforeach; ?>	
    </div> 
    
</form>
<?php 
    if(isset($_POST['btnSubmit'])) {
        if(empty($_POST['playlistName']))
            {
            echo '<h2 id="errorMessage">Veuillez renseignez tout les champs.</h2>';
        }
        else {
            $DB->addArtist($_POST['name'], $_POST['date'],  $_POST['country']);
            echo '<h1 id="validationMessage">L\'artiste à bien été ajouté.</h1>';
        }
    }
?>

<?php else :?>
	<div class="error">
		<h1>Connectez-vous pour pouvoir créer vos playlists.</h1>
	</div>	
<?php endif; ?>

<?php require "template/footer.php"; ?>
