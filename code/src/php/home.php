<?php $title = 'Oto - Accueil'; ?>
<?php require "template/header.php"; 
$artists = $DB->getAllArtists();
$musics = $DB->getAllTitle();
?>
<div class="title">
	<p>Artistes écoutés récemment</p>
</div>	
<div class="ACmainBlock">	
	<?php foreach ( $artists as $artist): ?>		
		<a href="detailArtist.php?idArtist=<?= $artist["idArtist"]; ?>">
		<div class="ACblock">			
			<img src="../../userContent/img/artists/logo/<?= $artist["idArtist"]?>.jpg" alt="">
			<h1><?= $artist["artName"]; ?></h1>
			<p>Artiste</p>
		</div>
		</a>

	<?php endforeach ?>
</div>
<div class="title">
	<p>Écoutés récemment</p>
</div>
<div class="ACmainBlock">	
	<?php foreach ( $musics as $music): ?>
	<?php $idMusic = $music['idMusic']; ?>
	<?php $links = $DB->getLinkEachMusics($idMusic); ?>		
	<?php foreach ($links as $link): ?>	
		<div class="ACblock">
			<a href="<?= $link["linLink"]; ?>"target="_blank"><?= $link["typLiens"]; ?>

			<h1><?= $music["musName"]; ?></h1>
			<img src="../../userContent/img/music/<?= $music["idMusic"] ?>.jpg" alt="">
			<p>Musique</p>
		</div>
		
		</a>
		<?php endforeach; ?>	
	<?php endforeach ?>
</div>
<?php require "template/footer.php" ?>
