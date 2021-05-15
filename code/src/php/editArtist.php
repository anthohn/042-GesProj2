<?php

$title = "Oto - Modification d'une musique";
require "template/header.php";
// Vérifie si l'utilisateur est loggé ET admin
if(isLogged() && (isAdmin())):

    // Vérifie que le get n'est pas vite, vérifie si le get est bien numérqiue -> rejete le code html et php (+ sécurisé)
    if(!isset($_GET['idArtist']) OR !is_numeric($_GET['idArtist']))
    {
        header('Location:404.php');
    }
    else
    {
        $idArtist = $_GET["idArtist"];
        $artists = $db->getArtist($idArtist); 
        $countries = $db->getAllCountry();       
    }
    ?>

    <?php 
    if(isset($_POST['btnSubmit']))
    {
        if(empty($_POST['name']) || empty($_POST['date']))
        {
            $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseigner tous les champs !</h4></div>';  
        } 
        else
        {   
            $db->updateArtist($idArtist, $_POST['name'], $_POST['date'], $_POST['country']);
            $error = '<div class="succesLoginContainer"><h4 class="succesLogin">Modifications effectuées avec succès !</h4></div>'; 
        }
    }
    ?>


    <div class="formcontent"> 

        <form method="POST" action="editArtist.php?idArtist=<?= $idArtist ?>" enctype="multipart/form-data">
        <?php foreach($artists as $artist): ?> 
            <h2>Modification d'un artiste</h2>
            <table>
                <tr>
                    <td>
                        <img src="../../userContent/img/artists/logo/<?= $artist["idArtist"]?>.jpg" alt="">
                    </td>    
                </tr>
                <tr>               
                    <td>
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" value='<?= $artist["artName"] ?>'>
                    </td>    
                </tr>
                <tr>
                    <td>
                        <label for="date">Date :</label>
                        <?php $newDate = date("Y-m-d", strtotime($artist["artBirth"]));?>  
                        <input type="date" name="date" value="<?= $newDate;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="date">Nationalité :</label>
                    <select name="country" id="country">
                        <option value='0'><?= $artist["couCountry"]?></option>
                        <?php foreach($countries as $country) : ?>
                            <option value="<?= $country["idCountry"]; ?>"><?= $country["couCountry"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        <label for="img">Cover :</label>
                        <input type="file" name="img" id="printscreen"/>
                    </td>
                </tr> -->
            </table>    
            <button type="submit" name="btnSubmit">Modifier</button>
            <div class="test">
                <a href="allArtists.php"><img width="50px" src="../../userContent/icon/backArrow.svg"></img></a>
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
