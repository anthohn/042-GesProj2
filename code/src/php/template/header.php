<?php
session_start();
require "lib/util.php";
require "lib/db.class.php";
require "config/dbconfig.cfg";
$db = new db (Config::$host, Config::$username, Config::$password, Config::$database);
$activePage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Logo onglet-->
		<link rel="icon" href="../../userContent/logo/oto.png" />
		<title><?= $title ?></title>
		<link href="../../resources/css/style.css" rel="stylesheet" type="text/css" />
		<script src="../js/toggleMenu.js" defer></script>
		<script src="../js/profileCard.js" defer></script>
	</head>	
	<body>
		<div class="main" id="mainAbout">
			<!-- Hamburger menu -->
			<a href="#" class="toggleButton" id="toggleButtonID">
				<span class="bar" id="topBar"></span>
				<span class="bar" id="middleBar"></span>
				<span class="bar" id="bottomBar"></span>
			</a>
		</div>	
			<!-- Bar de navigation -->
		<div class="leftnav">
			<ul class="navBarLink">
				<li class="logo"><a href="home.php">Oto</a></li>

				<?php if($activePage == 'home.php') : ?>
					<li class="home">
						<a id="active" href="home.php">
							<img src="../../userContent/logo/home.svg" alt="">Accueil
						</a>
					</li>
				<?php else : ?>
					<li class="home">
						<a href="home.php">
							<img src="../../userContent/logo/home.svg" alt="">Accueil
						</a>
					</li>
				<?php endif; ?>

				<?php if($activePage == 'research.php') : ?>
					<li class="research">
						<a id="active" href="research.php">
							<img src="../../userContent/logo/search.svg" alt="">Recherche
						</a>
					</li>
				<?php else : ?>
					<li class="research">
						<a href="research.php">
							<img src="../../userContent/logo/search.svg" alt="">Recherche
						</a>
					</li>
				<?php endif; ?>

				<?php if($activePage == 'allArtists.php') : ?>
					<li class="allArtists">
						<a id="active" href="allArtists.php">Artistes</a>
					</li>
				<?php else : ?>
					<li class="allArtists"
						><a href="allArtists.php">Artistes</a>
					</li>
				<?php endif; ?>

				<?php if($activePage == 'allPlaylists.php') : ?>
					<li class="playlists">
						<a id="active" href="allPlaylists.php">Playlists</a>
					</li>
				<?php else : ?>
					<li class="playlists">
						<a href="allPlaylists.php">Playlists</a>
					</li>
				<?php endif; ?>

				<?php if($activePage == 'allTitle.php') : ?>
					<li class="allTitle">
						<a id="active" href="allTitle.php">Tous les titres</a>
					</li>
				<?php else : ?>
					<li class="allTitle">
						<a href="allTitle.php">Tous les titres</a>
					</li>
				<?php endif; ?>

				<?php if($activePage == 'likedTitle.php') : ?>
					<li class="likedTitle">
						<a id="active" href="likedTitle.php">Titres likés</a>
					</li>
				<?php else : ?>
					<li class="likedTitle">
						<a href="likedTitle.php">Titres likés</a>
					</li>
				<?php endif; ?>

				<?php if($activePage == 'about.php') : ?>
					<li class="about">
						<a id="active" href="about.php">À propos</a>
					</li>
				<?php else : ?>
					<li class="about">
						<a href="about.php">À propos</a>
					</li>
				<?php endif; ?>

				<div class="login-container">
					<?php if(!isLogged()): ?>
						<div class="inputContainer">
							<a href="connexion.php">Connexion</a>
						</div>
					<?php else: ?>
						<div class="notlog">
							<p><?=  welcome(). ' ' . $_SESSION['username']; ?></p>
							<a href="account.php">Mon compte</a>
						</div>
					<?php endif; ?>
				</div>
			</ul>		
		</div>
		<div class='mainContent'>
