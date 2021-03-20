<?php require "header.php"; 
$artists = $DB->getAllArtists();
$musics = $DB->getAllTitle();
?>
<div class="title">
	<p>Artistes écoutés récemment</p>
</div>
	
<div class="ACmainBlock">	
	<?php foreach ( $artists as $artist): ?>			
		<div class="ACblock">
			<a href="detailArtist.php?idArtist=<?= $artist["idArtist"]; ?>">
			<h1><?= $artist["artName"]; ?></h1>
			<img src="../../userContent/img/artists/logo/<?= $artist["idArtist"]?>.jpg" alt="">
			<p>testtestsetest</p>
		</div>
		</a>
	<?php endforeach ?>
</div>



<div class="title">
	<p>Écoutés récemment</p>
</div>
<div class="ACmainBlock">	
	<?php foreach ( $musics as $music): ?>			
		<div class="ACblock">
			<!-- <a href="detailArtist.php?idArtist=<?= $artist["idArtist"]; ?>"> -->
			<h1><?= $music["musName"]; ?></h1>
			<img src="../../userContent/img/music/<?= $music["idMusic"] ?>.jpg" alt="">
			<p>testtestsetest</p>
		</div>
		</a>
	<?php endforeach ?>
</div>
<?php require "footer.php" ?>








































<!-- <div class="ACblock1">
		<div class="ACimgCover">
			<img src="../../userContent/img/artistes/travis.jpg" alt="">
		</div>
		<div class="ACblockTitle">
			<p>test</p>
		</div>
		<div class="plus">
			<a href="#">+</a>
		</div>
	</div> -->