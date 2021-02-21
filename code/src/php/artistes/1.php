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
		<title>Oto - Travis scott</title>
		<link href="../../../resources/css/style.css" rel="stylesheet" type="text/css" />
		<script src="../js/toggleMenu.js" defer></script>
	</head>	
	<body>	
		<style>
			body {
			background-image: url('../../../userContent/img/artistes/travis2.jpg');
			}
		</style>
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
					<li class="logo"><a href="../accueil.php">Oto</a></li>
					<li><a href="../accueil.php"><img src="../../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li><a href="../recherche.php"><img src="../../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<li class="espace"><a href="../library.php"><img src="../../../userContent/logo/library.svg" alt="">Bibliothèque</a></li>
					<li class="border"><a  id="active" href="../artistes.php">Artistes</a></li>
					<li><a href="../playlists.php">Playlists</a></li>
					<li class="bottom"><a href="../about.php">about</a></li>
				</ul>
			</div>
		</div>
		<div class="ARPtitle">
			<img src="../../../userContent/img/artistes/travis.jpg" alt="a">
			<p>Travis scott</p>
		</div>	
		<div class="ARPmainBlock">
			<!-- 1	-->

			<div class="ARPblock1">
				<img src="../../../userContent/img/coverPlaylists/travisScott.jpg" alt="">
				<p>gossebumps</p>
				<p>-</p>
				<p>04:04</p>
				<a href="#">. . .</a>
			</div>
			<div class="ARPblock2">
				<img src="../../../userContent/img/coverPlaylists/stargazing.jpg" alt="">
				<p>STARGAZING</p>
				<p>-</p>
				<p>04:31</p>
			</div>
			<div class="ARPblock3">
				<img src="../../../userContent/img/coverPlaylists/rodeo.jpg" alt="">
				<p>Antidote</p>
				<p>-</p>
				<p>04:23</p>
			</div>


		</div>
		<footer>
		</footer>
	</body>
</html>