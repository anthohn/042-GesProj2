<?php
/**
* ETML
* Auteur      : Anthony Höhn
* Date        : 01.02.2021
* Description : add a liked music
**/

require 'template/header.php';

// Check the user's privilege
if(isLogged())
{
    $idMusic = $_GET['idMusic'];
    $idUser = $_SESSION['idUser'];
    $likedTitles = $db->getLikedtitles($idUser);

    // Check if the music is already liked
    if(!empty($likedTitles))
    {
        $notLiked = true;

        foreach($likedTitles as $likedTitle)
        { 
            if($idMusic == $likedTitle['idxMusic'])
            {
                $notLiked = false;  
                break;              
            }
        }
        if($notLiked)
        {
            $addMusicLiked = $db->addLikedMusic($idMusic, $idUser);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;     
        }        
        else
        {   
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;   
        }
    }
    else
    {
        $addMusicLiked = $db->addLikedMusic($idMusic, $idUser);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
else
{
    header('Location: connexion.php');
}
