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
    $getPlaylists = $DB->getPlaylist($idPlaylist);
    $playlistMusics = $DB->getMusicsPlaylist($idPlaylist);
}


foreach ( $getPlaylists as $getPlaylist): ?>	
    <div class="Playlisttitle">
        <img src="../../userContent/img/playlists/cover/<?= $getPlaylist["idPlaylist"];?>.jpg" alt="">
        <p><?= $getPlaylist["plaName"]; ?></p>
    </div>
<?php endforeach ?>			
	
<div class="ListMusicsMainBlock">
    <?php foreach ( $playlistMusics as $playlistMusic): ?>	
        <div class="ARPblock1">
            <img src="../../userContent/img/music/<?= $playlistMusic["idMusic"] ?>.jpg" alt="">
            <p><?= $playlistMusic["musName"]; ?></p>
            <p>-</p>
            <p><?= $playlistMusic["musDuration"]; ?></p>
            <p>-</p>
            <p><?= $playlistMusic["typeName"]; ?></p>
            <div class="dropdown" style="float:right;">
                <a href=""><button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button></a>
                <?php $idMusic = $playlistMusic['idMusic']; ?>
                <?php $links = $DB->getLinkEachMusics($idMusic); ?>
                
                <?php foreach ($links as $link): ?>
                    <div class="dropdown-content">
                        <a href="<?= $link["linLink"]; ?>"target="_blank"><?= $link["typLiens"]; ?></a>
                        <?php if(isLogged()): ?>
                            <a class="a" id="heartBtnList" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><svg class="likeList" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16"><path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/></svg></a>
                        <?php endif; ?>	
                    </div>
                <?php endforeach; ?>	
			</div>
            <?php if(isLogged()): ?>
                <a href="#"><svg role="img" height="30" width="30" viewBox="0 0 16 16" class="like"><path d="M13.764 2.727a4.057 4.057 0 00-5.488-.253.558.558 0 01-.31.112.531.531 0 01-.311-.112 4.054 4.054 0 00-5.487.253A4.05 4.05 0 00.974 5.61c0 1.089.424 2.113 1.168 2.855l4.462 5.223a1.791 1.791 0 002.726 0l4.435-5.195A4.052 4.052 0 0014.96 5.61a4.057 4.057 0 00-1.196-2.883zm-.722 5.098L8.58 13.048c-.307.36-.921.36-1.228 0L2.864 7.797a3.072 3.072 0 01-.905-2.187c0-.826.321-1.603.905-2.187a3.091 3.091 0 012.191-.913 3.05 3.05 0 011.957.709c.041.036.408.351.954.351.531 0 .906-.31.94-.34a3.075 3.075 0 014.161.192 3.1 3.1 0 01-.025 4.403z"></path></svg></a>
            <?php endif; ?>
        </div>	
	<?php endforeach ?>			
</div>

<?php require "template/footer.php" ?>