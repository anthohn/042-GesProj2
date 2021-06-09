<?php
// Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
if(!isset($_GET['idArtist']) OR !is_numeric($_GET['idArtist']))
{
    header('Location:404.php');
}
// Si tout est ok -> appelle les fonctions
else
{
    $title = 'Oto - Détails artiste';
	require "template/header.php";
	$idArtist = $_GET["idArtist"];
	$artists = $db->getArtist($idArtist);
	$musics = $db->getMusicEachArtist($idArtist);
}


?>

<!-- <style>body{background-image: url('../../userContent/img/artists/background/<?= $artists[0]["idArtist"];?>.jpg');}</style> -->
<div class="ARPtitle">
	<img src="<?= FILE_PATH_LOGO_ARTISTS, $artists[0]["idArtist"];?>.jpg" alt="">
	<p><?= $artists[0]["artName"]; ?></p>
</div>

<?php 
if(empty($musics)) : ?>

	<div class="errorLoginContainer"><h1 class="errorNoSong">Malheureusement, aucune musique de <?= $artists[0]['artName']; ?> n'est disponible.</h1></div>

<?php else : ?>

	<div class="ARPmainBlock">
		<?php foreach ($musics as $music): ?>
			<div class="ARPblock1">
				<img src="<?= FILE_PATH_COVER_MUSICS, $music["idMusic"] ?>.jpg" alt="">
				<p><?= $music["musName"]; ?></p>
				<p>-</p>
				<p><?= $music["musDuration"]; ?></p>
				<p>-</p>
				<p><?= $music["typeName"]; ?></p>
				<div class="dropdown" style="float:right;">
				<button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button>
				<?php $idMusic = $music['idMusic']; ?>
				<?php $links = $db->getLinkEachMusics($idMusic); ?>
				
				<div class="dropdown-content">
					<?php foreach ($links as $link): ?>
						<a href="<?= $link["linLink"]; ?>"target="_blank"><?= $link["typLiens"]; ?></a>
					<?php endforeach; ?>
					<div class="heartBtnContainer">
						<?php if(isLogged()){
			
							$notLiked = true;

							foreach($likedTitles as $likedTitle)
							{ 
								if($idMusic == $likedTitle['idxMusic'])
								{
									?>
									<a class="a" id="heartBtnList" href="supplikedTitle.php?idMusic=<?= $likedTitle["idMusic"]; ?>"><?= SVG_LIKE_FILL; ?></a>					
									<?php
									$notLiked = false;  
									break;              
								}
							}
							if($notLiked)
							{
								?>
								<a class="a" id="heartBtnList" href="addLikedTitle.php?idMusic=<?= $music["idMusic"]; ?>"><?= SVG_LIKE; ?></a>
								<?php				
							}
						}
						else
						{
							?>
							<a class="a" id="heartBtnList" href="connexion.php"><?= SVG_LIKE; ?></a>
							<?php
						}
						?>
						</div>
					</div>
				</div>
				<div class="heartBtnContainer">
					<?php
					if(isLogged()){
						$notLiked = true;

						foreach($likedTitles as $likedTitle)
						{ 
							if($idMusic == $likedTitle['idxMusic'])
							{
								?>
								<a class="a" id="heartBtn" href="supplikedTitle.php?idMusic=<?= $likedTitle["idMusic"]; ?>"><?= SVG_LIKE_FILL; ?></a>					
								<?php
								$notLiked = false;  
								break;              
							}
						}
						if($notLiked)
						{
							?>
							<a class="a" id="heartBtn" href="addLikedTitle.php?idMusic=<?= $music["idMusic"]; ?>"><?= SVG_LIKE; ?></a>
							<?php				
						}
					}
					else{
						?>
						<a class="a" id="heartBtn" href="connexion.php"><?= SVG_LIKE; ?></a>
						<?php
					}
					?>

				</div>	
			</div>
		<?php endforeach ?>	
	</div>	

<?php endif; ?>

<?php require "template/footer.php" ?>