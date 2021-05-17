<!--
ETML
Auteur      : Anthony Höhn
Date        : 16.05.2021
Description : Création de playlist personnelle.
-->
<?php
$title = 'Oto - Modifier playlist'; 
require "template/header.php";

// Vérifie si l'utilisateur est loggé
if(isLogged()): 
    // Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
    // if(!isset($_GET['idPlaylist']) OR !is_numeric($_GET['idPlaylist']))
    // {
        // header('Location:404.php');
    // }
    // Si tout est ok -> appelle les fonctions
    // else
    // {
        $idPlaylist = $_GET["idPlaylist"];
        $musics = $db->getAllTitle();
        $playlistInfos = $db->getPlaylist($idPlaylist);
    // }

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

            $source = $_FILES["printscreen"]["tmp_name"];
            $destination = "../../userContent/img/playlists/cover/$idPlaylist.jpg";
            move_uploaded_file($source, $destination);
            $error = '<div class="succesLoginContainer"><h4 class="succesLogin">La playlist a bien été ajouté !</h4></div>';  
            
        }
    }
    ?>

    <form action="editPlaylist.php?idPlaylist=<?= $idPlaylist?>" method="post" enctype="multipart/form-data">
    <?php foreach($playlistInfos as $playlistInfo): ?> 
        <div class="plalistCreaTitle">
            <p>Modification de <?= $playlistInfo['plaName']; ?></p>
        </div>
        <div class='formCreation'>
            <label for="playlistName">Nom de la playlist:</label>
            <input type="text" id="playlistName" name="playlistName" value="<?= $playlistInfo['plaName']; ?>"><br>
            <label for="img">Cover :</label>
            <input type="file" id="printscreen" name="printscreen"/>
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Ajouter" /> 
        </div>
    <?php endforeach; ?>    
        <?php 
        if(isset($error))
        {
            echo $error;
        }
        elseif(isset($succes))
        {
            echo $succes;
        }?>       
        <div class="playlistCreaBlock">
            <?php foreach ( $musics as $music):?>
                <div class="ARPblock1">
                    <input type="checkbox" name="checkMusic[]" value="<?= $music["idMusic"] ?>"  />
                    <img src="../../userContent/img/music/<?= $music["idMusic"] ?>.jpg" alt="">
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
<?php else :

    header('Location: template/404.php'); 

endif;

require "template/footer.php"; ?>
