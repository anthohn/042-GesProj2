<?php

$title = "Oto - Modification d'une musique";
require "template/header.php";

// Vérifie si l'utilisateur est loggé ET admin
if(isLogged() && (isAdmin())):

    // Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
    if(!isset($_GET['idMusic']) OR !is_numeric($_GET['idMusic']))
    {
        header('Location:404.php');
    }
    else
    {
        $idMusic = $_GET["idMusic"];
        $musics = $db->getMusic($idMusic);        
        $artists = $db->getAllArtists();
        $types = $db->getAllType();
    }
    ?>

    <?php 
    if(isset($_POST['btnSubmit']))
    {
        if(empty($_POST['name']) || empty($_POST['time']))
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseigner tous les champs !</h4></div>';  
        } 
        else
        {   
            $db->updateMusic($idMusic, $_POST['name'], $_POST['time'], $_POST['artist'], $_POST['type']);
            $error = '<div class="succesLoginContainer"><h4 class="succesLogin">Modifications effectuées avec succès !</h4></div>'; 
        }
    }
    ?>

    <div class="formcontent"> 

        <form method="POST" action="editMusic.php?idMusic=<?= $idMusic ?>" enctype="multipart/form-data">
        <?php foreach($musics as $music): ?> 
            <h2>Modification d'une musique</h2>
            <table>
                <tr>
                    <td>
                        <img src="../../userContent/img/music/<?= $music["idMusic"]?>.jpg" alt="">
                    </td>    
                </tr>
                <tr>               
                    <td>
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" value='<?= $music['musName'] ?>'>
                    </td>    
                </tr>
                <tr>
                    <td>
                        <label for="time">Durée :</label>
                        <input type="time" name="time" value="<?= $music['musDuration'];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="artist">Artiste :</label>
                        <select name="artist" id="artist">
                            <option value='<?= $music["idArtist"];?>'><?= $music["artName"];?></option>                       
                            <?php foreach($artists as $artist) : ?>
                                <option value="<?= $artist["idArtist"]; ?>"><?= $artist["artName"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                <td>
                    <label for="type">Genre :</label>
                    <select name="type" id="type">
                        <option value='<?= $music["idType"];?>'><?= $music["typeName"];?></option>
                        <?php foreach($types as $type) : ?>
                            <option value="<?= $type["idType"]; ?>"><?= $type["typeName"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                </tr>
            </table>    
            <button type="submit" name="btnSubmit">Modifier</button>
            <div class="test">
                <a href="allTitle.php"><img width="50px" src="../../userContent/icon/backArrow.svg"></img></a>
            </div>
        <?php endforeach; ?>      
        </form>

    </div>

    
    

<?php else :
    header('Location: template/404.php'); 
endif; 

if(isset($error))
{
    echo $error;
}
elseif(isset($succes))
{
    echo $succes;
}


require "template/footer.php";?>
