<!--
ETML
Auteur      : Anthony Höhn
Date        : 16.05.2021
Description : Modifications playlists
-->
<?php
$title = 'Oto - Modifier playlist'; 
require "template/header.php";

// Verifiy if the user is log
if(isLogged() && isAdmin()): 
    // Check that the get is not empty, check if the get is numeric -> reject the html and php code (+ secure)
    if(!isset($_GET['idPlaylist']) OR !is_numeric($_GET['idPlaylist']))
    {
        header('Location:404.php');
    }
    else
    {
        $idPlaylist = $_GET['idPlaylist'];
        $playlistMusics = $db->getMusicsPlaylist($idPlaylist);
        $musics = $db->getAllTitle();
        $playlistInfos = $db->getPlaylist($idPlaylist);
    }

    if(isset($_GET['del']) && !empty($_GET['del']) && $_GET['del'] == "deleteMusic") 
    {
        $idMusic = $_GET['idAdd'];
        $idPlaylist = $_GET['idPlaylist'];
        $db->deleteMusicPlaylist($idPlaylist, $idMusic);
        header("Location:editPlaylist.php?idPlaylist=$idPlaylist");
    }

    if(isset($_POST['btnSubmitAdd'])) 
    {
        foreach($_POST['checkMusic'] as $key => $value)
        { 
            $checkedMusic = $_POST['checkMusic'][$key];
            $db->editMusicPlaylist($idPlaylist, $checkedMusic);
        }
        header("location: editPlaylist.php?idPlaylist=$idPlaylist");
    }

    if(isset($_POST['btnSubmit'])) 
    {
        if(empty($_POST['playlistName']))
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseigner le nom de la playlist !</h4></div>';
        }
        else
        {
            foreach($_POST['checkMusic'] as $key => $value)
            {
                $checkedMusic = $_POST['checkMusic'][$key];
                $db->updatePlaylist($idPlaylist, $checkedMusic);
            }
            
        }
    }

    if(isset($_POST['btnSubmitEditName']))
    {
        echo 'tes';
        if(empty($_POST['playlistName']))
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseigner tous les champs !</h4></div>';  
        } 
        else
        {   
            $db->updatePlaylistName($idPlaylist, $_POST['playlistName']);
            header("location: editPlaylist.php?idPlaylist=$idPlaylist");
        }
    }
    ?>

    <form action="editPlaylist.php?idPlaylist=<?= $idPlaylist?>" method="post" enctype="multipart/form-data">
        <div class="Playlisttitle">
            <img src="../../userContent/img/playlists/cover/<?= $playlistInfos[0]["idPlaylist"]; ?>.jpg" alt="">
            <p>Modification de <?= $playlistInfos[0]['plaName']; ?></p>
            <div class='formCreation'>
                <label for="playlistName">Nom de la playlist:</label>
                <input type="text" id="playlistName" name="playlistName" value="<?= $playlistInfos[0]['plaName']; ?>"><br>
                <label for="img">Cover :</label>
                <input type="file" id="printscreen" name="printscreen" accept=".jpg" />
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Modifier" /> 
            </div>
        </div>    
    </form>   

    <?php if(isset($error))
    {
        echo $error;
    }
    elseif(isset($succes))
    {
        echo $succes;
    }?>    

    <div class="playlistCreaBlock">
        <button class="open-button" onclick="openForm1()">Ajouter des titres</button>

        <?php foreach ($playlistMusics as $playlistMusic):?>
            <div class="ARPblock1">
                <a href="editPlaylist.php?idPlaylist=<?= $playlistMusic["idPlaylist"]; ?>&idAdd=<?= $playlistMusic["idAdd"]; ?>&del=deleteMusic" onclick="return confirm('Êtes vous sûr de vouloir supprimer cette musique de cette playlist ?')"><img width="20px" src="../../userContent/icon/trash.svg"></img></a>
                <img src="<?= FILE_PATH_COVER_MUSICS, $playlistMusic["idMusic"] ?>.jpg" alt="">
                <p><?= $playlistMusic["musName"]; ?></p>
                <p class="artName">-</p>			
                <p><a class="artName" href="detailArtist.php?idArtist=<?= $playlistMusic["idArtist"]; ?>"><?= $playlistMusic["artName"]; ?></a></p>
                <p class="musDuration">-</p>
                <p class="musDuration"><?= $playlistMusic["musDuration"]; ?></p>
                <p class="typeName">-</p>
                <p class="typeName"><?= $playlistMusic["typeName"]; ?></p>
            </div>
        <?php endforeach; ?>
                
        <div class="form-popup" id="myForm">
            <form method='POST' action="editPlaylist.php?idPlaylist=<?= $idPlaylist?>" class="form-container">
                <div class="tileButton">
                    <h1>Ajouter des titres</h1>
                    <button type="button" id="btncancel" onclick="closeForm1()"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                </div>
                <div class="playlistCreaBlock" id="playlistpopUp">
                    <?php foreach ($musics as $music):?>
                        <div class="ARPblock1">
                            <input type="checkbox" name="checkMusic[]" value="<?= $music["idMusic"] ?>" />
                            <img src="<?= FILE_PATH_COVER_MUSICS, $music["idMusic"]; ?>.jpg" alt="">
                            <p><?= $music["musName"]; ?></p>
                            <p><a class="artName" href="detailArtist.php?idArtist=<?= $music["idArtist"]; ?>"><?= $music["artName"]; ?></a></p>
                            <p class="musDuration">-</p>
                            <p class="musDuration"><?= $music["musDuration"]; ?></p>
                            <p class="typeName">-</p>
                            <p class="typeName"><?= $music["typeName"]; ?></p>	
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <button type="submit" id="btnSubmitPopUp" name="btnSubmitAdd"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></button>


                <!-- <a class='addSongPopUp' href="editPlaylist.php?idPlaylist=<?= $playlistMusic["idPlaylist"]; ?>&add=addMusic"><img src="../../userContent/icon/add.svg" height="30"></img></a> -->

            </form>    
        </div>       
    </div>

    <!-- Script for the pop-up -->
    <script>
        function openForm1() {
            document.getElementById("myForm").style.display = "block";
            document.getElementById("html").style.overflow = "hidden";
        }

        function closeForm1() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("html").style.overflow = "auto";
        }
    </script>

<?php else :

    header('Location: template/404.php'); 

endif;



require "template/footer.php"; ?>
