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
	<p>Artistes
		<?php if(isLogged() && (isAdmin())): ?>
			<a href="addArtist.php"><img src="../../userContent/icon/add.svg" height="30"></img></a>
		<?php endif; ?>
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
				<!-- Si l'utilisateur est admin ET connecté il a accès à cette fonctionnalité -->
				<?php if(isLogged() && (isAdmin())): ?>
					<a href="deleteArtist.php?idArtist=<?= $artist["idArtist"]; ?>" onclick="return confirm('Êtes vous sûr de vouloir supprimer l\'artiste ? Toutes les musiques qui lui y sont associées seront par la même occasion supprimées.')"><img src="../../userContent/icon/trash.svg"></img></a>
				<?php endif; ?>
			</a>
		</div>
	<?php endforeach ?>			
</div>	
<?php require "footer.php"; ?>
