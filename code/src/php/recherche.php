﻿<!DOCTYPE html>
<html lang="fr">
	<head>
		<!--
		ETML
		Auteur      : Anthony Höhn
		Date        : 02.02.2021
		Description : Page recherche site
		-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Logo onglet-->
		<link rel="icon" href="../../userContent/logoOnglet.png" />
		<title>Recherche</title>
		<link href="../../resources/css/style.css" rel="stylesheet" type="text/css" />
		<script src="../js/toggleMenu.js" defer></script>
	</head>	
	<body>	
		<div class="main">
			<!-- Hamburger menu -->
			<a href="#" class="toggleButton" id="toggleButtonID">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</a>
			<!-- Bar de navigation -->
			<div class="leftnav">
				<ul class="navBarLink">
					<li><a id="active" href="recherche.php"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<li><a href="accueil.php"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li class="espace"><a href="library.php"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li>
					<li class="border"><a href="artistes.php">Artistes</a></li>
					<li><a href="playlists.php">Playlists</a></li>
				</ul>
			</div>	
		</div>	
		<!-- barre de recherche-->
		<div class="searchBar">
			<div class="test">
				<form method="GET" action="">
					<input type="text" name="search" id="search" placeholder="Recherche . . ."/>
				</form>
			</div>
		</div>
		
		<footer>

		</footer>
	</body>
</html>