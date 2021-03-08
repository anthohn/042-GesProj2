<!DOCTYPE html>
<html lang="fr">
	<head>
		<!--
		ETML
		Auteur      : Anthony Höhn
		Date        : 02.02.2021
		Description : Page à propos
		-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Logo onglet-->
		<link rel="icon" href="../../userContent/logoOnglet.png" />
		<link href="../../resources/css/style.css" rel="stylesheet" type="text/css" />
		<title>À propos</title>
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
					<li class="logo"><a href="accueil.php">Oto</a></li>				
					<li><a href="accueil.php"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li><a href="recherche.php"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<li class="espace"><a href="library.php"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li>
					<li class="border"><a href="artistes.php">Artistes</a></li>
					<li><a href="playlists.php">Playlists</a></li>
					<li class="bottom"><a id="active2" href="about.php">À propos</a></li>
				</ul>
			</div>
		</div>
		<style>
			body {
			background-image: url(' ../../userContent/about/image.png');
			}
		</style>
		<div class="contenu">
			<div class="contenutext">
				<p>Oto est un site web développé par une petite équipe d’informaticien de l’ETML en apprentisssge. 
				Il permet notament, grâce à base de données, de pouvoir gérer différentes listes de lecture 
				ainsi que de rajouter ou supprimer des artistes. Sur ce site, tu peux sans souci répertorier les 
				différents morceaux de tes artistes préférés, afin de mettre de 
				l’ordre dans tes sons favoris !</p>
			</div>
		</div>
		
		<div class="resContenu">
		<p>Nos réseaux sociaux :</p>
		</div>
		<a class="resSVG" href=https://instagram.com><img src="../../userContent/logo/insta.svg" alt="Insta" target="_blank"></a>
		<footer>
		</footer>
	</body>
</html>