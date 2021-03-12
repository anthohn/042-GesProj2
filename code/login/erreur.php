<!--
ETML
Auteur      : Killian Good
Date        : 01.03.2021
Description : Erreur dans le login  
-->
<html lang="fr">
	<head> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/erreur.css" />
	</head>

	<body>
		<div class="widget ">
		<div class="widget-heading">Réessayer</div>
		<div class="widget-contents">
			<form id="authenticate" action="authenticate.php" class="form" method="post"  enctype='multipart/form-data'><fieldset>  
        <div>
		<div class="form">
			<label>Nom d'utilisateur</label>
    		<input type="text" name="username" 
            placeholder="Veuillez entrer un nom valide">
		</div>
		<div>
			<label>Mot de passe</label>
    		<input type="password" name="password" 
            placeholder="Veuillez entrer un mot de passe valide">
		</div>
		<div>		
    		<input type="submit" value="Connexion" class="btn btn-primary"/>
   		</div>
		</fieldset></form>	</div>
		</div>             
	</body>
</html>
