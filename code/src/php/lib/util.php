<?php 
//Vérifie si l'utilisateur est connecté ou non
function isLogged() {
    if(isset($_SESSION['username'])) {
        return true;
    }
    return false;
}

//Vérifie si l'utilisateur est admin ou non
function isAdmin() {
    if(isLogged()) {
        if(isset($_SESSION['username']) && $_SESSION['useIsAdmin'] == 1) {
            return true;
        }
    }
    return false;
}

// Fonction qui récupere l'heure est en fonction d'elle affiche bon matin, bon après-mid ou bonsoir 
function welcome()
{
    if(date('H') < 12)
    {
        return 'bon matin';  
    }
    elseif(date('H') > 11 && date('H') < 18)
    {
        return 'bon après-midi';
    }
    elseif(date('H') > 17)
    {
        return 'bonsoir';
    } 
} 
?>