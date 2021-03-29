<?php
require "_header.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Logo onglet-->
		<link rel="icon" href="../../userContent/logoOnglet.png" />
		<title>Oto</title>
		<link href="../../resources/css/style.css" rel="stylesheet" type="text/css" />
		<script src="../js/toggleMenu.js" defer></script>
	</head>	
	<body>
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
					<li class="logo"><a id="active" href="home.php">Oto</a></li>
					<li><a href="home.php"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li class="espace"><a href="research.php"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<!-- <li ><a href="library.php"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li> -->
					<li class="border"><a href="allartists.php">Artistes</a></li>
					<li><a href="playlists.php">Playlists</a></li>
					<li><a href="alltitle.php">Tous les titres</a></li>
					<li><a href="likedtitle.php">Titres likés</a></li>
					<li><a href="about.php">À propos</a></li>
					<li class="bottom"><a href="#">
					<?php if(isset($_SESSION["loggedin"]) == true)
					{
						echo "Bienvenue" . " " . $_SESSION["username"];
						echo "<li><a href='../../login/logout.php'>Se déconnecter</a></li>";
					}
					else 
					{
						echo "<li><a href='about.php'>À propos</a></li>";
					}
					?>
				</ul>	
			</div>
		</div>