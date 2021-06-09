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
if(isLogged()): 
    // Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
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

    //Déconnexion de l'utilisateur en détruisant sa session puis une redirection sur la page de connexion
    if(isset($_GET['del']) && !empty($_GET['del']) && $_GET['del'] == "deleteMusic") 
    {
        $idMusic = $_GET['idMusic'];
        $idPlaylist = $_GET['idPlaylist'];
        $db->deleteMusicPlaylist($idPlaylist, $idMusic);
        header("Location:editPlaylist.php?idPlaylist=$idPlaylist");
    }

    if(isset($_POST['btnSubmit'])) 
    {
        if(empty($_POST['playlistName']))
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseigner le nom de la playlist !</h4></div>';
        }
        elseif(empty($_POST['checkMusic']))
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez sélectionnez au moins une musique !</h4></div>';
        }
        else
        {
            foreach($_POST['checkMusic'] as $key => $value)
            {
                $checkedMusic = $_POST['checkMusic'][$key];
                $db->updatePlaylist($idPlaylist, $checkedMusic);
            }
            
        }
    }?>

    <form action="editPlaylist.php?idPlaylist=<?= $idPlaylist?>" method="post" enctype="multipart/form-data">
        <div class="Playlisttitle">
            <img src="../../userContent/img/playlists/cover/<?= $playlistInfos[0]["idPlaylist"]; ?>.jpg" alt="">
            <p>Modification de <?= $playlistInfos[0]['plaName']; ?></p>
            <div class='formCreation'>
                <label for="playlistName">Nom de la playlist:</label>
                <input type="text" id="playlistName" name="playlistName" value="<?= $playlistInfos[0]['plaName']; ?>"><br>
                <label for="img">Cover :</label>
                <input type="file" id="printscreen" name="printscreen"/>
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
        <!-- <h1 id="addTitlePlaylist">Titres présents :</h1> -->
        <button class="open-button" onclick="openForm1()">Ajouter des titres</button>

            <?php foreach ($playlistMusics as $playlistMusic):?>
                <div class="ARPblock1">
                    <a href="editPlaylist.php?idPlaylist=<?= $playlistMusic["idPlaylist"]; ?>&idMusic=<?= $playlistMusic["idMusic"]; ?>&del=deleteMusic" onclick="return confirm('Êtes vous sûr de vouloir supprimer cette musique de cette playlist ?')"><img width="20px" src="../../userContent/icon/trash.svg"></img></a>
                    <img src="<?= FILE_PATH_COVER_MUSICS, $playlistMusic["idMusic"] ?>.jpg" alt="">
                    <p><?= $playlistMusic["musName"]; ?></p>
                    <p class="artName">-</p>			
                    <p class="artName"><?= $playlistMusic["artName"]; ?></p>
                    <p class="musDuration">-</p>
                    <p class="musDuration"><?= $playlistMusic["musDuration"]; ?></p>
                    <p class="typeName">-</p>
                    <p class="typeName"><?= $playlistMusic["typeName"]; ?></p>
                </div>
            <?php endforeach; ?>
                
            <div class="form-popup" id="myForm">
                <form method='POST' action="" class="form-container">
                    <div class="tileButton">
                        <h1>Ajouter des titres</h1>
                        <button type="button" id="btncancel" onclick="closeForm1()"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></button>
                    </div>
                    <div class="playlistCreaBlock" id="playlistpopUp">
                        <?php foreach ( $musics as $music):?>
                            <div class="ARPblock1">
                                <input type="checkbox" name="checkMusic[]" value="<?= $music["idMusic"] ?>" />
                                <img src="<?= FILE_PATH_COVER_MUSICS, $music["idMusic"]; ?>.jpg" alt="">
                                <p><?= $music["musName"]; ?></p>
                                <p class="artName">-</p>			
                                <p class="artName"><?= $music["artName"]; ?></p>
                                <p class="musDuration">-</p>
                                <p class="musDuration"><?= $music["musDuration"]; ?></p>
                                <p class="typeName">-</p>
                                <p class="typeName"><?= $music["typeName"]; ?></p>	
                            </div>
                        <?php endforeach; ?>	
                    </div>
                 </form>    
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
    </div>  
<?php else :

    header('Location: template/404.php'); 

endif;

require "template/footer.php"; ?>
