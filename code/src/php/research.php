<!--
ETML
Auteur      : Younes Sayeh / Anthony Höhn
Date        : 11.03.2021
Description : Tous les titres de la base de données rescencé ici grace à un foreach qui va chercher dans la table t_musique
-->
<?php require "header.php" ?>
<?php 
	$bdd = new PDO('mysql:host=localhost;dbname=p_db_042main;', 'root', 'root');
	$artists = $bdd->query('SELECT * FROM t_artist');
	if(isset($_GET['search']) && !empty($_GET['search'])) {
		$search = htmlspecialchars($_GET['search']);
		$artists = $bdd->query('SELECT artName FROM t_artist WHERE artName LIKE "%'.$search.'%" ORDER BY idArtist ASC');
	}
	// echo "<pre style=\"margin:0 0 0 25%;color:white;\">";
	// print_r($artists);
	// echo "</pre>";
?>
<!-- barre de recherche--> 
<div class="searchBar">
	<div class="searchBarTitle">
		<h1>Rechercher</h1>
	</div>

	<form method="GET">
		<div class="searchBarInputContainer">
			<div class="searchIcon">
				<button class="icon" name="envoyer" type="submit"><svg id="icon" viewBox="0 0 24 24" fill="grey" width="36px" height="36px"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
			</div>
			<div class="searchBarInput">
				<input autocomplete="off" type="search" name="search" id="search" placeholder="Rechercher un titre avec son titre, son auteur . . ."/>
			</div>
		</div>
	</form>
	<div class="result">
		<?php 
		
			if($artists->rowCount() > 0) {
				foreach($artists as $artist) {

				}
				if(isset($_GET['search']) && !empty($_GET['search'])) {
					echo "<h2>Résultat pour : $search</h2>";
				}
				
			}
			else {
				echo "<h2>Aucun résultat pour : $search</h2>";
			}
		
		?>
	</div>
	<div class="allTitleContainer">
		<?php 
			$musics = $DB->query('SELECT idMusic, musName, musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType;');
			if(isset($_GET['search']) && !empty($_GET['search'])) {
				$musics = $DB->query('SELECT idMusic, musName, musDuration, artName, typeName FROM t_music JOIN t_artist ON idxArtist = idArtist JOIN t_type ON idxType = idType WHERE artName LIKE "%'.$search.'%" ORDER BY idArtist ASC;');
			}
		?>
		<?php foreach ($musics as $music):?>
			<div class="titleContainer">
				<img src="../../userContent/img/music/<?php echo $music->idMusic ?>.jpg" alt="">
				<p><?php echo $music->musName; ?></p>
				<p>-</p>			
				<p><?php echo $music->artName; ?></p>
				<p>-</p>
				<p><?php echo $music->musDuration; ?></p>
				<p>-</p>
				<p><?php echo $music->typeName; ?></p>
				<div class="dropdown" style="float:right;">
					<a href=""><button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button></a>
					<div class="dropdown-content">
						<a href="https://open.spotify.com/track/6gBFPUFcJLzWGx4lenP6h2?si=c8d3f37866504b46" target="_blank">Spotify</a>
						<a href="https://music.apple.com/fr/album/goosebumps/1150135681?i=1150135924"target="_blank">Apple Music</a>
						<a href="https://deezer.page.link/v8oPg9tyRbygcbvg6" target="_blank">Deezer</a>
					</div>
				</div>
				<a class="a" href="addlikedtitle.php?idMusic=<?= $music->idMusic; ?>"><svg role="img" height="30" width="30" viewBox="0 0 16 16" class="like"><path d="M13.764 2.727a4.057 4.057 0 00-5.488-.253.558.558 0 01-.31.112.531.531 0 01-.311-.112 4.054 4.054 0 00-5.487.253A4.05 4.05 0 00.974 5.61c0 1.089.424 2.113 1.168 2.855l4.462 5.223a1.791 1.791 0 002.726 0l4.435-5.195A4.052 4.052 0 0014.96 5.61a4.057 4.057 0 00-1.196-2.883zm-.722 5.098L8.58 13.048c-.307.36-.921.36-1.228 0L2.864 7.797a3.072 3.072 0 01-.905-2.187c0-.826.321-1.603.905-2.187a3.091 3.091 0 012.191-.913 3.05 3.05 0 011.957.709c.041.036.408.351.954.351.531 0 .906-.31.94-.34a3.075 3.075 0 014.161.192 3.1 3.1 0 01-.025 4.403z"></path></svg></a>
			</div>
		<?php endforeach; ?>
	</div> 
	
</div>
<?php require "footer.php"; ?>