<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : Tous les titres likés de l'utilisateur (session)
-->

<?php $title = 'Oto - Titres Likés';
require "template/header.php"; 

// Si l'utilisateur est connecté
if(isLogged()): ?>

	<!-- récupere l'id du user -->
	<?php $idUser = ($_SESSION['idUser']);
	$likedTitles = $db->getLikedtitles($idUser);?>


	<!-- Titre de la page -->
	<div class="alltitle">
		<p>Titres likés</p>
	</div>

	<!-- Si le tableau est vide -> message erreur si non affiche les musique likées de l'utilisateur  -->
	<?php if(empty($likedTitles)) : ?>
		<div class="errorLoginContainer"><h1 class="errorNoSong">Vous ne possédez encore, aucun titre liké.</h1></div>
	<?php else : ?>
	
		<div class="alltitlemainBlock">
			<?php foreach ( $likedTitles as $likedTitle):?>
				<div class="ARPblock1">
					<img src="<?= FILE_PATH_COVER_MUSICS, $likedTitle["idMusic"] ?>.jpg" alt="">
					<p><?= $likedTitle["musName"]; ?></p>
					<p class="artName">-</p>			
					<p><a class="artName" href="detailArtist.php?idArtist=<?= $likedTitle["idArtist"]; ?>"><?= $likedTitle["artName"]; ?></a></p>
					<p class="musDuration">-</p>
					<p class="musDuration"><?= $likedTitle["musDuration"]; ?></p>
					<p class="typeName">-</p>
					<p class="typeName"><?= $likedTitle["typeName"]; ?></p>
					
					<div class="dropdown" style="float:right;">
						<a href=""><button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button></a>						
						<?php $idMusic = $likedTitle['idMusic']; ?>
						<?php $links = $db->getLinkEachMusics($idMusic); ?>

						<?php foreach ( $links as $link): ?>
							<div class="dropdown-content">
								<a href="<?= $link["linLink"]; ?>"><?= $link["typLiens"]; ?></a>
								<a class="a" id="heartBtnList" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><?= SVG_LIKE_LIST; ?></a>	
							</div>
						<?php endforeach; ?>
							
					</div>
						<a class="a" id="heartBtn" href="supplikedTitle.php?idMusic=<?= $likedTitle["idMusic"]; ?>"><?= SVG_LIKE; ?></a>					
				</div>	
			<?php endforeach; ?>				
		</div> 
	<?php endif; ?>	

<?php else :?>
	<?php header("Location:connexion.php"); ?>
<?php endif; ?>

<?php require "template/footer.php"; ?>