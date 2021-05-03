<?php

// Permet d'ajouter du contenu dans l'onglet
$title = "Oto - Ajout d'une musique";

require "template/header.php";

// Vérifie si l'utilisateur est loggé ET admin
if(isLogged() && (isAdmin())):

// Récupere tous les artistes dans la variable '$artists'
$artists = $DB->getAllArtists(); 
$types = $DB->getAllType(); 
?>


<div class="formcontent">   
    <form method="POST" action="addTitle.php" enctype="multipart/form-data">
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
                    <label for="img">Cover :</label>
                    <input type="file" name="img" id="printscreen"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="duration">Durée :</label>
                    <input id="duration" type="time" name='duration'>
                </td>
            </tr>
        </table>    
        <button type="submit" name="btnSubmit">Ajouter</button>
        <button type="reset" id="btnDelete" name="btnDelete">Effacer</button>  
        <div class="test">
            <a href="alltitle.php"><img width="100px" src="../../userContent/icon/backArrow.svg"></img></a>
        </div>        
    </form>
</div>
<!-- (!empty($_POST['name'])) || $_POST['artist'] == 0 || $_POST['type'] == 0 || (!empty($_POST['img'])) || (!empty($_POST['duration'])) -->
<div class="erreurrr">
<?php 
    if(isset($_POST['btnSubmit'])) {
        if(0 == 1)
        {
            echo '<div class="errorLoginContainer">
            <h3 class="errorLogin">Veuillez renseignez tous les champs !</h3>
            </div>';
        }
        else {
            $newID = $DB->addTitle($_POST['name'], $_POST['artist'],  $_POST['type'], $_POST['duration']);
            if($newID >= 0){
                $source = $_FILES["printscreen"]["tmp_name"];
                $destination = "../../userContent/img/artists/music/$newID.jpg";
                move_uploaded_file($source, $destination);
                echo '<h1 id="validationMessage">La musique a bien été ajouté.</h1>';
            }      
            else
            {
                
            }                                              
        }
    }
?>
</div>
   

<?php else :
    header('Location: template/404.php'); 
endif; 
?>
<?php require "template/footer.php";?>
