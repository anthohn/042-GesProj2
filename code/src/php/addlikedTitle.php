<?php
require 'template/header.php';

if(isLogged())
{
    $idMusic = $_GET['idMusic'];
    $idUser = $_SESSION['idUser'];
    $likedTitles = $db->getLikedtitles($idUser);

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
