<?php
/**
* ETML
* Auteur      : Anthony Höhn
* Date        : 01.02.2021
* Description : add a public playlist
**/

$title = 'Oto - Ajouter une playlist public';
require "template/header.php"; ?>

<?php 
    // Check the user's privilege
    if(isLogged() && (isAdmin())): 
?>

<?php 
    $musics = $db->getAllTitle();

    // Check if the button is submited
    if(isset($_POST['btnSubmit'])) 
    {
        // Check the forms content
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
            $newID = $db->addPublicPlaylist($_POST['playlistName']);

            if($newID >= 0)
            {
                foreach($_POST['checkMusic'] as $key => $value)
                {
                    
                    $checkedMusic = $_POST['checkMusic'][$key];
                    $db->addMusicPlaylist($newID, $checkedMusic);
                }

                $source = $_FILES["printscreen"]["tmp_name"];
                $destination = "../../userContent/img/playlists/cover/$newID.jpg";
                move_uploaded_file($source, $destination);
                $error = '<div class="succesLoginContainer"><h4 class="succesLogin">La playlist a bien été ajouté !</h4></div>';  
            }
            else
            {
                $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Erreur</h4></div>'; 
            }  
        }
    }
?>

    <form action="addPlaylistPublic.php" method="post" enctype="multipart/form-data">
        <div class="plalistCreaTitle">
            <p>Créer une playlist public</p>
        </div>
        <div class='formCreation'>
            <label for="playlistName">Nom de la playlist:</label>
            <input type="text" id="playlistName" name="playlistName"><br>
            <label for="img">Cover :</label>
            <input type="file" id="printscreen" name="printscreen" accept=".jpg"/>
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Ajouter" /> 
        </div>
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
<?php else :

    header('Location: template/404.php'); 

endif;

require "template/footer.php"; ?>
