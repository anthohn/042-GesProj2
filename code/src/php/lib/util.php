<?php 
function isLogged() {
    if(isset($_SESSION['username'])) {
        return true;
    }
    return false;
}

function isAdmin() {
    if(isLogged()) {
        if(isset($_SESSION['username']) && $_SESSION['useIsAdmin'] == 1) {
            return true;
        }
    }
    return false;
}
?>