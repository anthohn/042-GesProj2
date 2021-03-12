<html>
	<head> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/ossn.default.css" />
	</head>

	<body>
		<div class="widget ">
		<div class="widget-heading">Connexion</div>
		<div class="widget-contents">
			<form id="authenticate" action="authenticate.php" class="form" method="post"  enctype='multipart/form-data'><fieldset>  
        <div>
			<label>Nom d'utilisateur</label>
    		<input type="text" name="username" />
		</div>
		<div>
			<label>Mot de passe</label>
    		<input type="password" name="password" />
		</div>
		<div>		
    		<input type="submit" value="Connexion" class="btn btn-primary"/>
   		</div>
		</fieldset></form>	</div>
		</div>             
	</body>
</html>
