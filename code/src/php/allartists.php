<!--
ETML
Auteur      : Anthony Höhn
Date        : 17.03.2021
Description : Tous les artistes de la base de données rescencé ici grâce à un foreach qui va chercher dans la table t_artiste
(s'affiche dynamiquement)
-->
<?php 
	$title = 'Oto - Artistes'; 
	require "template/header.php";
	$artists = $db->getAllArtists();
?>


<div class="title">
	<p>Artistes
		<?php if(isLogged() && (isAdmin())): ?>
			<a class='addArtist' href="addArtist.php"><img src="../../userContent/icon/add.svg" height="30"></img></a>
		<?php endif; ?>
	</p>
</div>		

<div class="ARmainBlock">
	<?php foreach ($artists as $artist): ?>			
		<div class="ARblock1">
			<a href="detailArtist.php?idArtist=<?= $artist["idArtist"]; ?>">
				<div class="ARimgCover">
					<img src="<?= FILE_PATH_LOGO_ARTISTS, $artist["idArtist"]; ?>.jpg" alt="">
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
					<a href="editArtist.php?idArtist=<?= $artist["idArtist"]; ?>"><img src="../../userContent/icon/edit.svg"></img></a>
				<?php endif; ?>
			</a>
		</div>
	<?php endforeach ?>			
</div>

<?php require "template/footer.php"; ?>
