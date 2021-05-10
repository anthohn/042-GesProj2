<?php 
$title = 'Oto - Connexion';
require ('template/header.php');

if(isLogged()): 

//Déconnexion de l'utilisateur en détruisant sa session puis une redirection sur la page d'accueil
if(isset($_GET['auth']) && !empty($_GET['auth']) && $_GET['auth'] == "logout") 
{
	session_unset();
	session_destroy();
	header("Location:home.php");
}

//Déconnexion de l'utilisateur en détruisant sa session puis une redirection sur la page d'accueil
if(isset($_GET['auth']) && !empty($_GET['auth']) && $_GET['auth'] == "deleteAccount") 
{
    $idUser = $_SESSION['idUser'];
    print_r($idUser);
    $DB->deleteUser($idUser);
	session_unset();
	session_destroy();
	header("Location:home.php");
}
?>

<div class="accountFormcontent">
    <form method="post">
        <h2>Compte</h2>
        <table>
            <tr>
                <td>
                    <div class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </div>    
                    <p>Utilisateur : <?= $_SESSION['username']; ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="logout">
                        <a href="account.php?auth=logout">Déconnexion</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="deleteAccount">
                        <a href="account.php?auth=deleteAccount" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.')">Supprimer mon compte</a>
                    </div>  
                </td>
            </tr>  
        </table>
    </form>
</div>   

<?php endif; ?>

<?php require ('template/footer.php'); ?>