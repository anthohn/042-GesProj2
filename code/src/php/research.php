<!--
ETML
Auteur      : Younes Sayeh
Date        : 11.03.2021
Description : Recherche dynamique pour chaque nom d'artiste.
-->
<?php $title = 'Oto - Recherche';
require "template/header.php";

$musics = $db->getAllTitle();
$idUser = $_SESSION['idUser'];
$playlists = $db->getPlaylists($idUser);

if(isset($_GET['search']) && !empty($_GET['search']))
{
	$search = htmlspecialchars($_GET['search']);
	$searchResults = $db->getSearchedArtistsMusicsPlaylists($search);
	$musics = $db->getAllTitleSearched($search);
	$playlists = $db->getAllPlaylistSearched($search);
}
?>

<!-- barre de recherche--> 
<div class="searchBar">
	<div class="searchBarTitle">
		<h1>Rechercher</h1>
	</div>

	<form method="GET">
		<div class="searchBarInputContainer">
			<div class="searchIcon">
				<button class="icon" name="envoyer" type="submit"><svg id="icon" viewBox="0 0 24 24" fill="grey" width="36px" height="36px"><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>
			</div>
			<div class="searchBarInput">
				<input autocomplete="off" type="text" name="search" id="search" placeholder="Rechercher . . ."/>
			</div>
		</div>
	</form>

	<div class="result">
		<?php
		if(isset($_GET['search']) && !empty($_GET['search']))
		{
			if(count($searchResults) > 0)
			{
				echo '<pre>';
					print_r($_SESSION);
				echo '</pre>';
				// foreach($searchResults as $searchResult) {
				// 	echo '<pre>';
				// 	print_r($_SESSION);
				// echo '</pre>';
				// }
				echo "<h2>Résultat pour : $search</h2>";
			}
			else
			{
				echo "<h2>Aucun résultat pour : $search</h2>";
			}
		}
		?>
	</div>

	<div class="allTitleContainer">
		<?php foreach ($musics as $music):?>
			<div class="ARPblock1" id="ARPblock1Id">
				<img src="../../userContent/img/music/<?= $music["idMusic"] ?>.jpg" alt="">
				<p><?= $music["musName"]; ?></p>
				<p class="artName">-</p>			
				<p class="artName"><?= $music["artName"]; ?></p>
				<p class="musDuration">-</p>
				<p class="musDuration"><?= $music["musDuration"]; ?></p>
				<p class="typeName">-</p>
				<p class="typeName"><?= $music["typeName"]; ?></p>
				<div class="dropdown" style="float:right;">
					<a href=""><button class="dropbtn"><svg class="svg-icon svg-icon-options" focusable="false" height="20" width="20" viewBox="0 0 12 12" aria-hidden="true"><path d="M10.5 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM6 7.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm-4.5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></svg></button></a>
					<?php $idMusic = $music['idMusic']; ?>
					<?php $links = $db->getLinkEachMusics($idMusic); ?>
				
					<?php foreach ($links as $link): ?>
						<div class="dropdown-content">
							 <a href="<?= $link["linLink"]; ?>"><?= $link["typLiens"]; ?></a>
							<?php if(isLogged()): ?>
								<a class="a" id="heartBtnList" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><svg class="likeList" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16"><path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/></svg></a>
							<?php endif; ?>	
						</div>
					<?php endforeach; ?>	
				</div>
				<?php if(isLogged()): ?>
					<a class="a" id="heartBtn" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><svg role="img" height="30" width="30" viewBox="0 0 16 16" class="like"><path d="M13.764 2.727a4.057 4.057 0 00-5.488-.253.558.558 0 01-.31.112.531.531 0 01-.311-.112 4.054 4.054 0 00-5.487.253A4.05 4.05 0 00.974 5.61c0 1.089.424 2.113 1.168 2.855l4.462 5.223a1.791 1.791 0 002.726 0l4.435-5.195A4.052 4.052 0 0014.96 5.61a4.057 4.057 0 00-1.196-2.883zm-.722 5.098L8.58 13.048c-.307.36-.921.36-1.228 0L2.864 7.797a3.072 3.072 0 01-.905-2.187c0-.826.321-1.603.905-2.187a3.091 3.091 0 012.191-.913 3.05 3.05 0 011.957.709c.041.036.408.351.954.351.531 0 .906-.31.94-.34a3.075 3.075 0 014.161.192 3.1 3.1 0 01-.025 4.403z"></path></svg></a>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div> 

	<div class="PLmainBlock">
		<?php foreach ($playlists as $playlist): ?>
			<div class="PLblock1">
				<a href="detailPlaylist.php?idPlaylist=<?= $playlist['idPlaylist']; ?>">
					<div class="PLimgCover">
						<img src="../../userContent/img/playlists/cover/<?= $playlist["idPlaylist"]?>.jpg" alt="">
					</div>
					<div class="PLblockTitle">
						<p><?= $playlist['plaName']; ?></p>
					</div>
					<div class="PLblockText">
						<p><?= $playlist['plaCreationDate']; ?></p>
					</div>
				</a>
			</div>	
		<?php endforeach ?>
	</div>
	
</div>

<?php require "template/footer.php"; ?>