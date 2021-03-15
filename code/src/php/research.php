<!--
ETML
Auteur      : Younes Sayeh / Anthony Höhn
Date        : 11.03.2021
Description : Tous les titres de la base de données rescencé ici grace à un foreach qui va chercher dans la table t_musique
-->
<?php require "header.php" ?>
<?php
// $allArtists = $DB->query("SELECT * FROM t_artist"); 
// if(isset($_GET["s"]) && !empty($_GET["s"])){
// 	$search = htmlspecialchars($_GET["s"]);
// 	$allArtists = $DB->query("SELECT artName FROM t_artist WHERE artName = '$search'");
// }
$artists = $DB->getAllArtists();
echo "<pre style=\"margin:0 0 0 25%;color:white;\">";
print_r($artists);
echo "</pre>";
?>
<!-- barre de recherche--> 
<div class="searchBar">
	<form method="GET">
		<div class="searchBarInputContainer">
			<div class="searchIcon">
				<button class="icon" name="envoyer" type="submit"><svg id="icon" viewBox="0 0 24 24" fill="grey" width="36px" height="36px"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
			</div>
			<div class="searchBarInput">
				<input autocomplete="off" type="search" name="search" id="search" placeholder="Rechercher un titre avec son titre, son auteur, . . ."/>
			</div>
		</div>
	</form>

	<div class="result">
		<?php 
		if(isset($_GET['search'])) {
			$search = $_GET['search'];
		}
		
		

		foreach($artists as $artist) {
			$artName = $artist['artName'];
			echo "<p style=color:white;><br> $artName</p>";
		}
		// if($allArtists->rowCount() > 0){
		// 	while($artists = $allArtists->fetch()){
		// 		echo $artists["artName"];
		// 	}
		// }
		// else{
		// 	echo "<h1>Aucun artiste trouvé</h1>";
		// }
		?>
	</div>
</div>
<?php require "footer.php"; ?>