﻿<?php
/**
* ETML
* Auteur      : Anthony Höhn / Younes Sayeh / Killian Good / Julien Cartier
* Date        : 04.03.2021
* Description : All the titles of the database rescenced here thanks to a foreach which will search in the t_musique table
**/

$title = 'Oto - Titres';
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
				<a href="deleteMusic.php?idMusic=<?= $music["idMusic"]; ?>" onclick="return confirm('Êtes vous sûr de vouloir supprimer la musique ?')"><img class="adminIcon" width="20px" src="../../userContent/icon/trash.svg"></img></a>
				<a href="editMusic.php?idMusic=<?= $music["idMusic"]; ?>"><img id="editTitleIcon" width="20px" src="../../userContent/icon/edit.svg"></img></a>
			<?php endif; ?>
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
				<?php if(isLogged()){
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
