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
		<title>Accueil</title>
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
					<li class="logo"><a href="home.php">Oto</a></li>				
					<li><a href="home.php"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li><a href="research.php"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<li class="espace"><a href="library.php"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li>
					<li class="border"><a href="artists.php">Artistes</a></li>
					<li><a href="playlists.php">Playlists</a></li>
					<li class="bottom"><a id="active2" href="about.php">about</a></li>
				</ul>
			</div>
		</div>
		<div class="contenu">
			<div class="contenutext">
				<p>Oto est un site web développé par une petite équipe d’informaticien de l’ETML en apprentisssge. 
				Il permet notament, grâce plusieurs bases de données, de pouvoir gérer différentes liste de lecture 
				ainsi que de rajouter ou supprimer des artistes. Grâce à ce site, tu peux sans souci répertorier les 
				différents morceaux préférer de tes artistes préféré dans différentes listes de lecture, afin de mettre de 
				l’ordre dans tes sons favoris !</p>
			</div>
		</div>

		<footer>
		</footer>
	</body>
</html>