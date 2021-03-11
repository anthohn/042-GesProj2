<!--
ETML
Auteur      : Younes Sayeh / Anthony Höhn
Date        : 11.03.2021
Description : Tous les titres de la base de données rescencé ici grace à un foreach qui va chercher dans la table t_musique
-->
<?php require "header.php" ?>
<?php
$allartists = $DB->query("SELECT * FROM t_artist"); 
if(isset($_GET["s"]) && !empty($_GET["s"])){
	$search = htmlspecialchars($_GET["s"]);
	$allartists = $DB->query("SELECT artName FROM t_artist WHERE artName = '$search'"
);
}
?>
<!-- barre de recherche--> 
<div class="searchBar">
	<form method="GET">
		<div class="searchBarInputContainer">
			<div class="searchIcon">
				<button class="icon" name="envoyer" type="submit"><svg id="icon" viewBox="0 0 24 24" fill="grey" width="36px" height="36px"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
			</div>
			<div class="searchBarInput">
				<input autocomplete="off" type="search" name="s" id="search" placeholder="Rechercher un artiste, un titre . . ."/>
			</div>
		</div>
	</form>

	<div class="result">
		<?php 

		if($allartists->rowCount() > 0){
			while($artists = $allartists->fetch()){
				echo $artists["artName"];
			}
		}else{
			echo "<h1>Aucun artiste trouvé</h1>";
		}
		?>
	</div>
</div>
<?php require "footer.php"; ?>