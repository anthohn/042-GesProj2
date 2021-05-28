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
}


foreach ($getPlaylists as $getPlaylist): ?>	
    <div class="Playlisttitle">
        <img src="<?= FILE_PATH_COVER_PLAYLISTS, $getPlaylist["idPlaylist"];?>.jpg" alt="">
        <p><?= $getPlaylist["plaName"]; ?></p>
        <h4>Date de création : <?= $getPlaylist["plaCreationDate"]; ?></h4>
    </div>
<?php endforeach ?>			
	
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
                <a href=""><button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button></a>
                <?php $idMusic = $playlistMusic['idMusic']; ?>
                <?php $links = $db->getLinkEachMusics($idMusic); ?>
                
                <?php foreach ($links as $link): ?>
                    <div class="dropdown-content">
                        <a href="<?= $link["linLink"]; ?>"target="_blank"><?= $link["typLiens"]; ?></a>
                        <a class="a" id="heartBtnList" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><?= SVG_LIKE_LIST; ?></a>
                    </div>
                <?php endforeach; ?>	
			</div>
            <a class="a" id="heartBtn" href="addlikedtitle.php?idMusic=<?= $playlistMusic["idMusic"]; ?>"><?= SVG_LIKE; ?></a>
        </div>	
	<?php endforeach ?>			
</div>

<?php require "template/footer.php" ?>