<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : Toutes les playlists de l'utilisateur (session)
-->
<?php $title = 'Oto - Playlists';
require "template/header.php"; ?>

<?php $playlists = $db->getPlaylists(); ?>

<div class="title">
	<p>Playlists public : 
	<?php if(isLogged() && (isAdmin())): ?>
			<a class='addArtist' href="addPlaylistPublic.php"><img src="../../userContent/icon/add.svg" height="30"></img></a>
		<?php endif; ?></p>
</div>

<div class="PLmainBlock">
	<?php foreach ($playlists as $playlist): ?>
		<div class="PLblock1">
			<a href="detailPlaylist.php?idPlaylist=<?= $playlist['idPlaylist']; ?>">
				<div class="PLimgCover">
					<img src="../../userContent/img/playlists/cover/<?= $playlist["idPlaylist"]?>.jpg" alt="">
				</div>
				<div class="PLblockTitle">
					<p><?= $playlist['plaName']; ?></p>
				</div>
				<div class="PLblockText">
					<p><?= $playlist['plaCreationDate']; ?></p>
				</div>
				<!-- Si l'utilisateur est admin ET connecté il a accès à cette fonctionnalité -->
				<?php if(isLogged() && (isAdmin())): ?>
					<a href="deletePlaylist.php?idPlaylist=<?= $playlist["idPlaylist"]; ?>" onclick="return confirm('Êtes vous sûr de vouloir supprimer la playlist ?')"><img src="../../userContent/icon/trash.svg"></img></a>
				<?php endif; ?>
			</a>
		</div>	
	<?php endforeach ?>			
</div>	

<?php if(isLogged()): ?>

	<!-- récupere l'id du user -->
	<?php $idUser = ($_SESSION['idUser']) ?>
	<?php $playlists = $db->getPlaylistsUser($idUser); ?>
	
	<div class="title">
		<p>Playlists de <?= $_SESSION['username'];?> :</p>
	</div>

	<div class="PLmainBlock">
	<?php if(isLogged()): ?>
		<div class="playlistcreation">
			<p>Créer une playlist</p>
			<div class="playlistcreationBoutton">
				<a href="addPlaylist.php">+</a>
			</div>
		</div>
	<?php endif; ?>
		<?php foreach ($playlists as $playlist): ?>
			<div class="PLblock1">
				<a href="detailPlaylist.php?idPlaylist=<?= $playlist['idPlaylist']; ?>">
					<div class="PLimgCover">
						<img src="../../userContent/img/playlists/cover/<?= $playlist["idPlaylist"]?>.jpg" alt="">
					</div>
					<div class="PLblockTitle">
						<p><?= $playlist['plaName']; ?></p>
					</div>
					<div class="PLblockText">
						<p><?= $playlist['plaCreationDate']; ?></p>
					</div>
				</a>
			</div>	
		<?php endforeach ?>			
	</div>
		
<?php else :?>
	<div class="error">
		<h1>Connectez-vous pour visualiser vos playlists personnel !</h1>
	</div>	
<?php endif; ?>

<?php require "template/footer.php"; ?>