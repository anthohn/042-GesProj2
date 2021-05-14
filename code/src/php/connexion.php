<?php 
$title = 'Oto - Connexion';
require ('template/header.php');

if(isset($_POST["connexion"]))
{
    if(!empty($_POST["login"]) && (!empty($_POST["psw"])))
    {	
        $users = $db->getUsers();
        foreach($users as $user)
        {
            if($user['useLogin'] == $_POST['login'])
            {
                if(password_verify($_POST['psw'], $user['usePassword']))
                {
                    $_SESSION['idUser'] = $user['idUser'];
                    $_SESSION['username'] = $user['useLogin'];
                    $_SESSION['useIsAdmin'] = $user['useIsAdmin'];
                    header("Location:home.php");
                }                
            }  
            else
            {
                $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Nom d\'utilisateur ou mot de passe incorect</h4></div>'; 
            }          
        }
    }
    else
    {
        $error = '<div class="errorLoginContainer"><h4 class="errorLogin">Veuillez renseignez tous les champs !</h4></div>';
    }
}
?>

<?php if(!isLogged()): ?>
    <div class="connexionFormcontent">
        <form method="post">
            <h2>Se connecter</h2>
            <table>
                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <input type="text" placeholder="Nom d'utilisateur" name="login" id="login">
                    </td>
                </tr>
                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <input type="password" placeholder="Mot de passe" name="psw" id="psw">
                    </td>
                </tr>                       
            </table>
            <button type="submit" name="connexion">Connexion</button>
            <p id="noAccount">Pas de compte ? <a href="createAccount.php">Créez-en un</a></p>
        </form>
    </div>

<?php else :
    header('location:account.php');
endif; 


if(isset($error))
{
    echo $error;
}
elseif(isset($succes))
{
    echo $succes;
}
?>


