<!--
ETML
Auteur      : Anthony Höhn
Date        : 17.03.2021
Description : Tous les artistes de la base de données rescencé ici grâce à un foreach qui va chercher dans la table t_artiste
(s'affiche dynamiquement)
-->
<?php require "header.php";
$artists = $DB->getAllArtists();
?>
<div class="title">
	<p>Artistes<a href="addArtist.php"><img src="../../userContent/icon/add.svg" height="30"></img></a>
</p>
</div>		
<div class="ARmainBlock">
	<?php foreach ( $artists as $artist): ?>			
		<div class="ARblock1">
			<a href="detailArtist.php?idArtist=<?= $artist["idArtist"]; ?>">
				<div class="ARimgCover">
					<img src="../../userContent/img/artists/logo/<?= $artist["idArtist"]?>.jpg" alt="">
				</div>
				<div class="ARblockTitle">
					<p><?= $artist["artName"]; ?></p>
				</div>
				<div class="ARblockText">
					<p><?= $artist["artBirth"]; ?></p>
					<p><?= $artist["couCountry"]; ?></p>
				</div>
				<a href="deleteArtist.php?idArtist=<?= $artist["idArtist"]; ?>" onclick="return confirm('Êtes vous sûr de voiloir supprimer l\'artiste ?')"><img src="../../userContent/icon/trash.svg"></img></a>
			</a>
		</div>
	<?php endforeach ?>			
</div>	
<?php require "footer.php"; ?>
