<?php 
/**
* ETML
* Auteur      : Anthony Höhn / Younes Sayeh 
* Date        : 01.02.2021
* Description : add an artist page
**/

$title = "Oto - Ajout d'artiste";
require "template/header.php";

// Check the user's privilege
if(isLogged() && (isAdmin())):

    $countries = $db->getAllCountry();
 
    // Check if the button is submited
    if(isset($_POST['btnSubmit']))
    {
        // Check the forms content
        if(empty($_POST['name']) || empty($_POST['date']) || $_POST['country'] == 0)
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
                                                                      
    }?>

    <div class="formcontent">
        <form method="POST" action="addArtist.php" enctype="multipart/form-data">
            <h1>Ajout d'un artiste</h1>
            <table>
                <tr>
                    <td>
                        <label for="name">Nom :</label>
                        <input type="text" class="nameArtistEdit" id="name" name="name">
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
                        <label for="img">Image :</label>
                        <input type="file" name="printscreen" id="printscreen" accept=".jpg"/>
                    </td>
                </tr>
            </table>

            <div class="btnAdd">
                <button type="submit" name="btnSubmit">Ajouter</button>
                <button type="reset" id="btnDelete" name="btnDelete">Effacer</button>
            </div>

            <div class="return">
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
