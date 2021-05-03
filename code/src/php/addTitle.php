<?php 
$title = "Oto - Ajout d'une musique";

require "template/header.php";
if(isLogged() && (isAdmin())):

$artists = $DB->getAllArtists();
 ?>
<div class="tableContainer">
            <h1>Ajout d'une musiques</h1>
            <form method="POST" action="addArtist.php" enctype="multipart/form-data">
                <div class="inputName input">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="selectCountry input">
                    <label for="name">Artiste :</label>
                    <select name="country" id="country">
                        <option value="0">Artiste </option>
                        <?php foreach($artists as $artist) : ?>
                            <option value="<?= $artist["idArtist"]; ?>"><?= $artist["artName"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <p>
                    <label for="img">logo de l'artiste :</label>
                    <input type="file" name="printscreen" id="printscreen" />
                </p>
               
                <div class="button">
                    <div class="btnAdding">
                        <input type="submit" id="btnSubmit" name="btnSubmit" value="Ajouter" />
                    </div>
                    <div class="btnDeleting">
                        <button type="reset" id="btnDelete" name="btnDelete">Effacer</button>
                    </div>
                </div>
                <div class="test">
                    <a href="allartists.php"><img width="100px" src="../../userContent/icon/backArrow.svg"></img></a>
                </div>
            </form>
            <?php 
                if(isset($_POST['btnSubmit'])) {
                    if(!(isset($_POST['name'])) || empty($_POST['date']) || $_POST['country'] == 0/* || empty($_POST['printscreen'])*/)
                     {
                        echo '<h2 id="errorMessage">Veuillez renseignez tout les champs.</h2>';
                    }
                    else {
                        $newID = $DB->addTitle($_POST['name'], $_POST['date'],  $_POST['country']);
                        if($newID >= 0){
                            $source = $_FILES["printscreen"]["tmp_name"];
                            $destination = "../../userContent/img/artists/logo/$newID.jpg";
                            move_uploaded_file($source, $destination);
                            echo '<h1 id="validationMessage">L\'artiste à bien été ajouté.</h1>';
                        }      
                        else
                        {
                            echo '<h1> failed </h1>';
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
