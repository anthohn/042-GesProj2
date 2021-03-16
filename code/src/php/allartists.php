<!--
ETML
Auteur      : Anthony Höhn
Date        : 07.03.2021
Description : Tous les artistes de la base de données rescencé ici grâce à un foreach qui va chercher dans la table t_artiste
(s'affiche dynamiquement)
-->
<?php require "header.php" ?>
<div class="title">
	<p>Artistes</p>
</div>		
<div class="ARmainBlock">
	<?php $artists = $DB->query("SELECT idArtist, artName, artBirth, couCountry FROM t_artist JOIN t_country ON idxCountry = idCountry"); ?>
	<?php foreach ( $artists as $artist): ?>			
		<div class="ARblock1">
			<div class="ARimgCover">
				<img src="../../userContent/img/artists/logo/<?php echo $artist->idArtist?>.jpg" alt="">
			</div>
			<div class="ARblockTitle">
				<p><?php echo $artist->artName; ?></p>
			</div>
			<div class="ARblockText">
				<p><?php echo $artist->artBirth; ?></p>
			</div>
			<div class="ARblockText">
				<p><?php echo $artist->couCountry; ?></p>
			</div>
			<div class="plus">
				<a href="detailArtist.php?idArtist=<?= $artist->idArtist; ?>">+</a>
			</div>
		</div>
	<?php endforeach ?>			
</div>	
<?php require "footer.php"; ?>
