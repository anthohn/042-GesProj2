<?php 
$title = "Oto - Ajout d'artiste";

require "template/header.php";
if(isLogged() && (isAdmin())):

$countries = $db->getAllCountry();

?>


<!-- A corriger -->
<div class="formcontent">
    <h1>Ajout d'un artiste</h1>
    <form method="POST" action="addArtist.php" enctype="multipart/form-data">
        <div class="inputName input">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="inputDate input">
            <label for="date">Date :</label>
            <input type="date" name="date">
        </div>

        <div class="selectCountry input">
            <select name="country" id="country">
                <option value="0">nationalité </option>
                <?php foreach($countries as $country) : ?>
                    <option value="<?= $country["idCountry"]; ?>"><?= $country["couCountry"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <p>
            <label for="img">image :</label>
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
                $newID = $db->addArtist($_POST['name'], $_POST['date'],  $_POST['country']);
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
    header('Location:404.php'); 
endif; 
?>
<?php require "template/footer.php";?>
