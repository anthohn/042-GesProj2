<?php 
require "header.php";
$countries = $DB->getAllCountry();
 ?>
<div class="tableContainer">
            <h1>Ajout d'un artiste</h1>
            <form method="POST" action="addArtist.php">
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
                    if(!(isset($_POST['name'])) || empty($_POST['date']) || $_POST['country'] == 0)
                     {
                        echo '<h2 id="errorMessage">Veuillez renseignez tout les champs.</h2>';
                    }
                    else {
                        $DB->addArtist($_POST['name'], $_POST['date'],  $_POST['country']);
                        echo '<h1 id="validationMessage">L\'artiste à bien été ajouté.</h1>';
                    }
                }
            ?>
        </div>

<?php














if(isset($_POST["submit"]))
{
    if(empty($_POST["gender"]) || empty($_POST["name"]) || empty($_POST["surname"]) || empty($_POST["nickname"]) || empty($_POST["origin"]))
    {
        echo "Veuillez renseignez tous les champs.";
    } 
    else {
        $teachers = $db->getAllTeachers();

        $db->addTeacher($_POST['gender'], $_POST['name'], $_POST['surname'], $_POST['nickname'], $_POST['origin']);
        // $db->addTeacherSection($section['idSection'], max($teachers['idTeachers']) + 1);
        echo "<h1>L'enseigant a bien été ajouté</h1>";
        // header('Location: index.php');
    }
}
?>
<?php require "footer.php";?>
