<!--
ETML
Auteur      : Younes Sayeh
Date        : 21.05.2021
Description : Recherche dynamique 
-->
<?php $title = 'Oto - Recherche';
require "template/header.php";

$musics = $db->getAllTitle();
$playlists = $db->getPlaylists();

if(isset($_SESSION['idUser']))
{
	$idUser = $_SESSION['idUser'];
	$userPlaylists = $db->getPlaylistsUser($idUser);
}

if(isset($_GET['search']) && !empty($_GET['search']))
{
	$search = htmlspecialchars($_GET['search']);
	$searchResults = $db->getSearchedArtistsMusicsPlaylists($search);
	$musics = $db->getAllTitleSearched($search);
	$playlists = $db->getAllPublicPlaylistSearched($search);
	if(isLogged()) {
		$playlists = $db->getAllPlaylistSearchedUser($search);
		// $playlists = $db->getAllPublicPlaylistSearched($search);
	}
	$artists = $db->getAllArtistSearched($search);
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
				// echo '<pre>';
				// 	print_r($searchResults);
				// echo '</pre>';
				echo "<h2>Résultat pour : $search</h2>";
			}
			else
			{
				echo "<h2>Aucun résultat pour : $search</h2>";
			}
		}
		?>
	</div>

	<?php if(!isLogged()): ?>
	<div class="playlistContainer">
		<?php foreach ($playlists as $playlist): ?>
			<div class="playlistBlock">
				<a href="detailPlaylist.php?idPlaylist=<?= $playlist['idPlaylist']; ?>">
					<div class="playlistImg">
						<img src="../../userContent/img/playlists/cover/<?= $playlist["idPlaylist"]?>.jpg" alt="">
					</div>
					<div class="playlistTitleDateContainer">
						<div class="playlistTitle">
							<p><?= $playlist['plaName']; ?></p>
						</div>
						<div class="playlistCreationDate">
							<p><?= $playlist['plaCreationDate']; ?></p>
						</div>
					</div>
				</a>
			</div>	
		<?php endforeach ?>
	</div>
	<?php endif; ?>

	<?php if(isLogged()): ?>
		<div class="playlistContainer">
			<?php foreach ($playlists as $playlist): ?>
				<div class="playlistBlock">
					<a href="detailPlaylist.php?idPlaylist=<?= $playlist['idPlaylist']; ?>">
						<div class="playlistImg">
							<img src="../../userContent/img/playlists/cover/<?= $playlist["idPlaylist"]?>.jpg" alt="">
						</div>
						<div class="playlistTitleDateContainer">
							<div class="playlistTitle">
								<p><?= $playlist['plaName']; ?></p>
							</div>
							<div class="playlistCreationDate">
								<p><?= $playlist['plaCreationDate']; ?></p>
							</div>
						</div>
					</a>
				</div>	
			<?php endforeach ?>
		</div>

		<div class="playlistContainer">
			<?php foreach ($userPlaylists as $userPlaylist): ?>
				<div class="playlistBlock">
					<a href="detailPlaylist.php?idPlaylist=<?= $userPlaylist['idPlaylist']; ?>">
						<div class="playlistImg">
							<img src="../../userContent/img/playlists/cover/<?= $userPlaylist["idPlaylist"]; ?>.jpg" alt="">
						</div>
						<div class="playlistTitleDateContainer">
							<div class="playlistTitle">
								<p><?= $userPlaylist['plaName']; ?></p>
							</div>
							<div class="playlistCreationDate">
								<p><?= $userPlaylist['plaCreationDate']; ?></p>
							</div>
						</div>
					</a>
				</div>	
			<?php endforeach ?>
		</div>
	<?php endif; ?>

	<?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
		<div class="ARmainBlockResearch">
			<?php foreach ($artists as $artist): ?>			
				<div class="ARblock">
					<a href="detailArtist.php?idArtist=<?= $artist["idArtist"]; ?>">
						<div class="ARimgCover">
							<img src="<?= FILE_PATH_LOGO_ARTISTS, $artist["idArtist"]; ?>.jpg" alt="">
						</div>
						<div class="ARblockTitle">
							<p><?= $artist["artName"]; ?></p>
						</div>
						<div class="ARblockText">
							<p><?= $artist["artBirth"]; ?></p>
							<p><?= $artist["couCountry"]; ?></p>
						</div>
						<!-- Si l'utilisateur est admin ET connecté il a accès à cette fonctionnalité -->
						<?php if(isLogged() && (isAdmin())): ?>
							<a href="deleteArtist.php?idArtist=<?= $artist["idArtist"]; ?>" onclick="return confirm('Êtes vous sûr de vouloir supprimer l\'artiste ? Toutes les musiques qui lui y sont associées seront par la même occasion supprimées.')"><img src="../../userContent/icon/trash.svg"></img></a>
							<a href="editArtist.php?idArtist=<?= $artist["idArtist"]; ?>"><img src="../../userContent/icon/edit.svg"></img></a>
						<?php endif; ?>
					</a>
				</div>
			<?php endforeach ?>			
		</div>
	<?php endif; ?>

	<div class="allTitleContainer">
		<?php foreach ($musics as $music):?>
			<div class="ARPblock1" id="ARPblock1Id">
				<img src="<?= FILE_PATH_COVER_MUSICS, $music["idMusic"] ?>.jpg" alt="">
				<p><?= $music["musName"]; ?></p>
				<p class="artName">-</p>			
				<p><a class="artName" href="detailArtist.php?idArtist=<?= $music["idArtist"]; ?>"><?= $music["artName"]; ?></a></p>
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
							<a class="a" id="heartBtnList" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><?= SVG_LIKE_LIST; ?></a>
						</div>
					<?php endforeach; ?>	
				</div>
				<a class="a" id="heartBtn" href="addlikedtitle.php?idMusic=<?= $music["idMusic"]; ?>"><?= SVG_LIKE; ?></a>
			</div>
		<?php endforeach; ?>
	</div> 	
</div>

<?php require "template/footer.php"; ?>