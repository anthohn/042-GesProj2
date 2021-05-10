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
?>