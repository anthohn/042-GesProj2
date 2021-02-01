﻿<!DOCTYPE html>
<html lang="fr">
	<head>
		<!--
		ETML
		Auteur      : Anthony Höhn
		Date        : 26.01.2021
		Description : Page artistes site
		-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Logo onglet-->
		<link rel="icon" href="../../userContent/logoOnglet.png" />
		<title>Aritistes</title>
		<link href="../../resources/css/style.css" rel="stylesheet" type="text/css" />
		<script src="../js/toggleMenu.js" defer></script>
	</head>	
	<body>
	
	<?php
	$user = "root";
	$pass = "root";

	try
	{
		$db = new PDO ("mysql:host=localhost;dbname=042-gesproj2;charset=utf8", $user, $pass);
	} 
	catch (PDOException $e)
	{
		echo "Erreur :" .$e->getMessage() . "<br/>";
		die;
	}

	$requete = $db->query("SELECT * FROM t_artiste");
	

	$resultat = $requete->fetch();

	// while($resultat = $requete->fetch())
	// {
	
	// }
	?>
	
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
					<li><a href="recherche.html"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<li><a href="../../index.html"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li class="espace"><a href="library.html"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li>
					<li class="border"><a id="active" href="artistes.html">Artistes</a></li>
					<li><a href="../html/playlists.html">Playlists</a></li>
				</ul>
			</div>	
		</div>	
		<div class="title">
			<p>Artistes</p>
		</div>		
		<div class="ARmainBlock">			
			<div class="ARblock1">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/travis.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p><?php echo $resultat["ArtNom"];?></p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
		
			<div class="ARblock2">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/drake.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>Drake</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock3">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/ohmidz.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>ohmidz</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock4">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/oboy.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>Oboy</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock5">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/josman.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>Josman</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock6">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/tyler.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>Tyler</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock7">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/ateyaba.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>Ateyaba</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock8">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/damso.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>Damso</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock9">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/zola.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>Zola</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>
			<div class="ARblock10">
				<div class="ARimgCover">
					<img src="../../userContent/img/artistes/theweeknd.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p>The Weeknd</p>
				</div>
				<div class="ARblockText">
					<p>Artiste</p>
				</div>
				<div class="plus">
					<a href="#">+</a>
				</div>
			</div>			
		</div>	

		<footer>
		</footer>
	</body>
</html>