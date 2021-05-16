<?php

// Permet d'ajouter du contenu dans l'onglet
$title = "Oto - Ajout d'une musique";

require "template/header.php";

// Vérifie si l'utilisateur est loggé ET admin
if(isLogged() && (isAdmin())):
    // Récupere tous les artistes dans la variable '$artists'
    $artists = $db->getAllArtists(); 
    $types = $db->getAllType(); 

    if(isset($_POST['btnSubmit'])) 
    {
        if(empty($_POST['name']) || empty($_POST['duration']) || $_POST['artist'] == 0 || $_POST['type'] == 0)
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseigner tous les champs !</h4></div>';
        }
        else
        {
            $newID = $db->addMusic($_POST['name'], $_POST['duration'], $_POST['artist'], $_POST['type']);
            
            if($newID >= 0)
            {
                $source = $_FILES["printscreen"]["tmp_name"];
                $destination = "../../userContent/img/music/$newID.jpg";
                move_uploaded_file($source, $destination);
                $error = '<div class="succesLoginContainer"><h4 class="succesLogin">La musique a bien été ajouté !</h4></div>';  
            }
            else
            {
                $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Erreur</h4></div>'; 
            }                                              
        }
    }
?>


    <div class="formcontent">   
        <form method="POST" action="addMusic.php" enctype="multipart/form-data">
            <h1>Ajout d'une musique</h1>
            <table>
                <tr>
                    <td>
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name">
                    </td>    
                </tr>
                <tr>
                    <td>
                        <label for="artist">Artiste :</label>
                        <select name="artist" id="artist">
                            <option value="0">Artiste </option>
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
                            <option value="0">Type </option>
                            <?php foreach($types as $type) : ?>
                                <option value="<?= $type["idType"]; ?>"><?= $type["typeName"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="duration">Durée :</label>
                        <input id="duration" type="time" name='duration'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="img">Cover :</label>
                        <input type="file" name="printscreen" id="printscreen"/>
                    </td>
                </tr>
            </table>    
            <button type="submit" name="btnSubmit">Ajouter</button>
            <button type="reset" id="btnDelete" name="btnDelete">Effacer</button>  
            <div class="test">
                <a href="allTitle.php"><img width="50px" src="../../userContent/icon/backArrow.svg"></img></a>
            </div>        
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
