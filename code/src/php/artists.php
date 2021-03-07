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
	<?php $artistes = $DB->query("SELECT * FROM t_artiste"); ?>
	<?php foreach ( $artistes as $artiste): ?>			
		<div class="ARblock1">
			<div class="ARimgCover">
				<p><?php echo $artiste->idxImageArtiste; ?></p>
			</div>
			<div class="ARblockTitle">
				<p><?php echo $artiste->ArtNom; ?></p>
			</div>
			<div class="ARblockText">
				<p>Artistes</p>
			</div>
			<div class="plus">
				<a href="artists/1.php">+</a>
			</div>
		</div>
	<?php endforeach ?>			
</div>	
<?php require "footer.php"; ?>
