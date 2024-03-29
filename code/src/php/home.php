﻿<?php 
/**
* ETML
* Auteur      : Anthony Höhn / Younes Sayeh
* Date        : 01.02.2021
* Description : home page
**/

$title = 'Oto - Accueil'; 
require "template/header.php"; 

$artists = $db->getAllArtists();
$musics = $db->getAllTitle();

?>

<div class="title">
	<p>Artistes</p>
</div>	
<div class="ACmainBlock">	
	<?php foreach ( $artists as $artist): ?>		
		<a href="detailArtist.php?idArtist=<?= $artist["idArtist"]; ?>">
			<div class="ACblock">			
				<img src="<?= FILE_PATH_LOGO_ARTISTS, $artist["idArtist"]?>.jpg" alt="">
				<h1><?= $artist["artName"]; ?></h1>
				<p>Artiste</p>
			</div>
		</a>
	<?php endforeach ?>
</div>

<div class="title">
	<p>Musiques</p>
</div>

<div class="ACmainBlock">	
	<?php foreach ( $musics as $music): ?>
		<div class="ACblock">
			<h1><?= $music["musName"]; ?></h1>
			<img src="<?= FILE_PATH_COVER_MUSICS, $music["idMusic"] ?>.jpg" alt="">
			<p>Musique</p>
		</div>
	<?php endforeach ?>
</div>

<?php require "template/footer.php" ?>
