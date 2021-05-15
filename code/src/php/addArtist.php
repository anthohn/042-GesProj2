<?php 
$title = "Oto - Ajout d'artiste";

require "template/header.php";
if(isLogged() && (isAdmin())):

    $countries = $db->getAllCountry();
 
    if(isset($_POST['btnSubmit']))
    {
        if(empty($_POST['name']) || empty($_POST['date']) || $_POST['country'] == 0 || empty($_POST['printscreen']))
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseigner tous les champs !</h4></div>'; 
        }
        else
        {
            $newID = $db->addArtist($_POST['name'], $_POST['date'],  $_POST['country']);
            if($newID >= 0)
            {
                $source = $_FILES["printscreen"]["tmp_name"];
                $destination = "../../userContent/img/artists/logo/$newID.jpg";
                move_uploaded_file($source, $destination);
                $error = '<div class="succesLoginContainer"><h4 class="succesLogin">L\'artiste à bien été ajouté !</h4></div>'; 
            }      
            else
            {
                $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Erreur</h4></div>'; 
            } 
        }
                                                                      
    }
?>

    <div class="formcontent">
        <form method="POST" action="addArtist.php" enctype="multipart/form-data">
            <h1>Ajout d'un artiste</h1>
            <table>
                <tr>
                    <td>
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date :</label>
                        <input type="date" name="date">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Nationalité :</label>
                        <select name="country" id="country">
                        <option value="0">nationalité </option>

                            <?php foreach($countries as $country) : ?>
                                <option value="<?= $country["idCountry"]; ?>"><?= $country["couCountry"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="img">image :</label>
                        <input type="file" name="printscreen" id="printscreen" />
                    </td>
                </tr>
            </table>

            <button type="submit" name="btnSubmit">Ajouter</button>
            <button type="reset" id="btnDelete" name="btnDelete">Effacer</button>

            <div class="test">
                <a href="allartists.php"><img width="50px" src="../../userContent/icon/backArrow.svg"></img></a>
            </div>
        </form>
        
    </div>

<?php else :
    header('Location:404.php'); 
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
