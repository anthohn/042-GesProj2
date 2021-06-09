<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : Tous les titres de la base de données rescencé ici grace à un foreach qui va chercher dans la table t_musique
-->
<?php $title = 'Oto - Titres';
require "template/header.php";
$musics = $db->getAllTitle();




?>
<style>
	body {
	background-image: url('../../userContent/img/artists/background/4.jpg');
	background-size: 1950px 400px;
	background-position: top;
	}
</style>

<div class="alltitle">
	<p>Tous les titres</p>
</div>	

<div class="alltitlemainBlock">
	<?php if(isLogged() && (isAdmin())): ?>
		<a class='addTitle' href="addMusic.php"><img src="../../userContent/icon/add.svg" height="30"></img></a>
	<?php endif; ?>

	<?php foreach ($musics as $music): ?>
		<div class="ARPblock1">
			<img src="<?= FILE_PATH_COVER_MUSICS, $music["idMusic"]; ?>.jpg" alt="">
			<p><?= $music["musName"]; ?></p>
			<p class="artName">-</p>
			<p><a class="artName" href="detailArtist.php?idArtist=<?= $music["idArtist"]; ?>"><?= $music["artName"]; ?></a></p>
			<p class="musDuration">-</p>
			<p class="musDuration"><?= $music["musDuration"]; ?></p>
			<p class="typeName">-</p>
			<p class="typeName"><?= $music["typeName"]; ?></p>
			<?php if(isLogged() && (isAdmin())): ?>
				<div class="testtest">
					<a href="deleteMusic.php?idMusic=<?= $music["idMusic"]; ?>" onclick="return confirm('Êtes vous sûr de vouloir supprimer la musique ?')"><img width="20px" src="../../userContent/icon/trash.svg"></img></a>
					<a href="editMusic.php?idMusic=<?= $music["idMusic"]; ?>"><img class='justTesting' width="20px" src="../../userContent/icon/edit.svg"></img></a>
				</div>
			<?php endif; ?>
			<div class="dropdown" style="float:right;">
				<button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button>
				<?php $idMusic = $music['idMusic']; ?>
				<?php $links = $db->getLinkEachMusics($idMusic); ?>
				
				<?php foreach ($links as $link): ?>
					<div class="dropdown-content">
						<a href="<?= $link["linLink"]; ?>"target="_blank"><?= $link["typLiens"]; ?></a>
						<a class="a" id="heartBtnList" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><?= SVG_LIKE_LIST; ?></a>
					</div>
				<?php endforeach; ?>	
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
	<?php endforeach; ?>	
</div> 

<?php require "template/footer.php"; ?>
