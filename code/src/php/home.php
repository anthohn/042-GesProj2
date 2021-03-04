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
					<li class="logo"><a href="home.php">Oto</a></li>
					<li><a id="active" href="home.php"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li><a href="research.php"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<li class="espace"><a href="library.php"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li>
					<li class="border"><a href="artists.php">Artistes</a></li>
					<li><a href="playlists.php">Playlists</a></li>
					<li><a href="alltitle.php">Tous les titres</a></li>
					<li><a href="likedtitle.php">Titres likés</a></li>
					<li class="bottom"><a href="about.php">about</a></li>
				</ul>
			</div>
		</div>
		<div class="title">
			<p>Écoutés récemment</p>
		</div>	
		<div class="ACmainBlock">			
			<div class="ACblock1">
				<div class="ACimgCover">
					<img src="../../userContent/img/coverPlaylists/recent.jpg" alt="">
				</div>
				<div class="ACblockTitle">
					<p>track1</p>
				</div>
				<div class="plus">
					<a href="#"><img src="../../userContent/logo/play.svg" alt=""></a>
				</div>
			</div>
		
			<div class="ACblock1">
				<div class="ACimgCover">
					<img src="../../userContent/img/artistes/travis.jpg" alt="">
				</div>
				<div class="ACblockTitle">
					<p>test</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ACblock1">
				<div class="ACimgCover">
					<img src="../../userContent/img/artistes/travis.jpg" alt="">
				</div>
				<div class="ACblockTitle">
					<p>test</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ACblock1">
				<div class="ACimgCover">
					<img src="../../userContent/img/artistes/travis.jpg" alt="">
				</div>
				<div class="ACblockTitle">
					<p>test</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ACblock1">
				<div class="ACimgCover">
					<img src="../../userContent/img/artistes/travis.jpg" alt="">
				</div>
				<div class="ACblockTitle">
					<p>test</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>	
		</div>	



		<footer>
			<div class="leftFooter">
			<img src="../../userContent/img/vii.jpg" alt="">
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