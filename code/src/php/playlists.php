<?php require "template/header.php"; ?>
<?php if(isLogged()): ?>
	<!-- récupere lid du user -->
	<?php $idUser = ($_SESSION['idUser']) ?>

	<?php $playlists = $DB->getPlaylists($idUser); ?>

			<div class="title">
				<p>Playlists de <?= $_SESSION['username']; ?></p>
			</div>
			<div class="PLmainBlock">
			
				<div class="playlistcreation">
					<p>Créer une playlist</p>
					<div class="playlistcreationBoutton">
						<a href="#">+</a>
					</div>
				</div>
				<?php foreach ( $playlists as $playlist): ?>



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
	<h1 class="notlogplaylist">Connectez-vous pour visualiser vos playlists.</h1>
<?php endif; ?>

<?php require "template/footer.php"; ?>