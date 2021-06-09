<!--
ETML
Auteur      : Anthony Höhn
Date        : 16.05.2021
Description : détail des playlist
-->

<?php
// Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
if(!isset($_GET['idPlaylist']) OR !is_numeric($_GET['idPlaylist']))
{
    header('Location:404.php');
}
// Si tout est ok -> appelle les fonctions
else
{
    $title = 'Oto - Détails playlist'; 
    require "template/header.php";
    $idPlaylist = $_GET["idPlaylist"];
    $getPlaylists = $db->getPlaylist($idPlaylist);
    $playlistMusics = $db->getMusicsPlaylist($idPlaylist);
}?>


<div class="Playlisttitle">
    <img src="<?= FILE_PATH_COVER_PLAYLISTS, $getPlaylists[0]["idPlaylist"];?>.jpg" alt="">
    <p><?= $getPlaylists[0]["plaName"]; ?></p>
    <h4>Date de création : <?= $getPlaylists[0]["plaCreationDate"]; ?></h4>
</div>
	
<div class="ListMusicsMainBlock">
    <?php foreach ( $playlistMusics as $playlistMusic): ?>	
        <div class="ARPblock1">
            <img src="<?= FILE_PATH_COVER_MUSICS, $playlistMusic["idMusic"] ?>.jpg" alt="">
            <p><?= $playlistMusic["musName"]; ?></p>
            <p>-</p>
			<p><a class="artName" href="detailArtist.php?idArtist=<?= $playlistMusic["idArtist"]; ?>"><?= $playlistMusic["artName"]; ?></a></p>
            <p>-</p>
            <p><?= $playlistMusic["musDuration"]; ?></p>
            <p>-</p>
            <p><?= $playlistMusic["typeName"]; ?></p>
            <div class="dropdown" style="float:right;">
				<button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button>
				<?php $idMusic = $playlistMusic['idMusic']; ?>
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
							<a class="a" id="heartBtn" href="addLikedTitle.php?idMusic=<?= $playlistMusic["idMusic"]; ?>"><?= SVG_LIKE; ?></a>
							<?php				
						}
					}
					else{
						?>
						<a class="a" id="heartBtn" href="connexion.php"><?= SVG_LIKE; ?></a>
						<?php
					}
					?>

				</div>        </div>	
	<?php endforeach ?>			
</div>

<?php require "template/footer.php" ?>