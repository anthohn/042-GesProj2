<?php
session_start();
require "_header.php";
require "util.php";

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
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
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
					<li class="bottom"></li>
					<div class="login-container">
                    <?php if(!isLogged()): ?>
                    <form method="post" action="">
                        <label>Surnom des enseignants</label>
                        <input type="text" placeholder="Login" name="login">
                        <input type="password" placeholder="Mot de passe" name="psw">
                        <button type="submit" name="forminscription">Se Connecter</button>
                    </form>
                    <?php else: ?>
                        <a href="home.php?auth=logout">Se deconnecter</a>
                    <?php endif; ?>
                </div>
				</ul>	
			</div>
		</div>

<?php
if(isset($_GET['auth']) && !empty($_GET['auth']) && $_GET['auth'] == "logout") 
{
	session_unset();
	session_destroy();
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
                    echo '<pre>';
                    print_r($_SESSION);
                    echo '</pre>';
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