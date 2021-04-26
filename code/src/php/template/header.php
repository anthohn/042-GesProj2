<?php
session_start();
require "lib/util.php";
require "lib/db.class.php";
require "config/dbconfig.cfg";
$DB = new DB (Config::$host, Config::$username, Config::$password, Config::$database);
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
		<div class="main" id="mainAbout">
			<!-- Hamburger menu -->
			<a href="#" class="toggleButton" id="toggleButtonID">
				<span class="bar" id="topBar"></span>
				<span class="bar" id="middleBar"></span>
				<span class="bar" id="bottomBar"></span>
			</a>
			<!-- Bar de navigation -->
			<div class="leftnav">
				<ul class="navBarLink">
					<li class="logo"><a id="active" href="home.php">Oto</a></li>
					<li class="home"><a href="home.php"><img src="../../userContent/logo/home.svg" alt="">Accueil</a></li>
					<li class="research"><a href="research.php"><img src="../../userContent/logo/search.svg" alt="">Recherche</a></li>
					<!-- <li ><a href="library.php"><img src="../../userContent/logo/library.svg" alt="">Bibliothèque</a></li> -->
					<li class="allArtists"><a href="allartists.php">Artistes</a></li>
					<li class="playlists"><a href="playlists.php">Playlists</a></li>
					<li class="allTitle"><a href="alltitle.php">Tous les titres</a></li>
					<li class="likedTitle"><a href="likedtitle.php">Titres likés</a></li>
					<li class="about"><a href="about.php">À propos</a></li>
					<div class="login-container">
                   		<?php if(!isLogged()): ?>
						<form method="post" action="home.php">
							<input type="text" placeholder="Nom d'utilisateur" name="login" id="login">
							<input type="password" placeholder="Mot de passe" name="psw" id="psw">
							<button type="submit" name="forminscription">Se Connecter</button>
						</form>
						<?php else: ?>
							<div class="notlog">
								<a href="home.php?auth=logout">Se deconnecter</a>
							</div>
						<?php endif; ?>
					</div>
                </div>
				</ul>	
			</div>
		</div>

<?php
if(isset($_GET['auth']) && !empty($_GET['auth']) && $_GET['auth'] == "logout") 
{
	session_unset();
	session_destroy();
	header("Location:home.php");
}

if(isset($_POST["forminscription"]))
{
    if(!empty($_POST["login"]) || (!empty($_POST["psw"])))
    {	
        $users = $DB->getUsers();
        foreach($users as $user)
        {
            if($user['useLogin'] == $_POST['login'])
            {
                if(password_verify($_POST['psw'], $user['usePassword']))
                {
                    $_SESSION['username'] = $user['useLogin'];
                    $_SESSION['isAdmin'] = $user['useIsAdmin'];
                    header("Location:home.php");
                }
            }
        }
    }
    else
    {
        $erreur = "Veuillez renseignez tous les champs !";
        echo $erreur;
    }
}
?>