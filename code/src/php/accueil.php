<!DOCTYPE html>
<html lang="fr">
	<head>
		<!--
		ETML
		Auteur      : Anthony Höhn
		Date        : 02.02.2021
		Description : Page accueil site
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
					<li><a href="recherche.php"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<li><a id="active" href="accueil.php"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li class="espace"><a href="library.php"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li>
					<li class="border"><a href="artistes.php">Artistes</a></li>
					<li><a href="playlists.php">Playlists</a></li>
				</ul>
			</div>
		</div>

		<footer>
			<div class="leftFooter">
			<img src="userContent/img/vii.jpg" alt="">
				<div class="LeftFooterTxt">
					<p><b>La C</b></p>
					<p>Koba LaD</p>				
				</div>
			</div>	

			<div class="midFooter">
				<p>a</p>
			</div>

			<div class="rightFooter">
				<p>a</p>
			</div>	
		</footer>
	</body>
</html>