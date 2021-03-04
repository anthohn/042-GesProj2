<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : Tous les titres de la base de données rescencé ici grace à un foreach qui va chercher dans la table t_musique
-->
<?php require "header.php" ?>
<div class="alltitle">
	<p>Tous les titres</p>
</div>	
<div class="alltitlemainBlock">
	<?php $musiques = $DB->query("SELECT * FROM t_musique"); ?>
	<?php foreach ( $musiques as $musique): ?>
		<div class="ARPblock1">
			<img src="../../userContent/img/coverPlaylists/travisScott.jpg" alt="">
			<p><?php echo $musique->musNom; ?></p>
			<p>-</p>
			<p><?php echo $musique->musDuree; ?></p>
			<div class="dropdown" style="float:right;">
				<a href=""><button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button></a>
				<div class="dropdown-content">
					<a href="https://open.spotify.com/track/6gBFPUFcJLzWGx4lenP6h2?si=c8d3f37866504b46" target="_blank">Spotify</a>
					<a href="https://music.apple.com/fr/album/goosebumps/1150135681?i=1150135924"target="_blank">Apple Music</a>
					<a href="https://deezer.page.link/v8oPg9tyRbygcbvg6" target="_blank">Deezer</a>
				</div>
			</div>
			<a class="a" href="likedtitle.php?id=<?= $musique->id; ?>"><svg role="img" height="30" width="30" viewBox="0 0 16 16" class="like"><path d="M13.764 2.727a4.057 4.057 0 00-5.488-.253.558.558 0 01-.31.112.531.531 0 01-.311-.112 4.054 4.054 0 00-5.487.253A4.05 4.05 0 00.974 5.61c0 1.089.424 2.113 1.168 2.855l4.462 5.223a1.791 1.791 0 002.726 0l4.435-5.195A4.052 4.052 0 0014.96 5.61a4.057 4.057 0 00-1.196-2.883zm-.722 5.098L8.58 13.048c-.307.36-.921.36-1.228 0L2.864 7.797a3.072 3.072 0 01-.905-2.187c0-.826.321-1.603.905-2.187a3.091 3.091 0 012.191-.913 3.05 3.05 0 011.957.709c.041.036.408.351.954.351.531 0 .906-.31.94-.34a3.075 3.075 0 014.161.192 3.1 3.1 0 01-.025 4.403z"></path></svg></a>
		</div>
	<?php endforeach ?>
</div> 
<?php require "footer.php"; ?>
		