<?php
session_start();
include("../class/User.php");
if(isset($_GET['pseudo'])){
    session_destroy();
    header("location: ../view/connexion.php");
}else{
    if(!empty($_POST['pseudo'] && !empty($_POST['password']))){
        $user = new User($_POST['pseudo'], $_POST['password']);
        $_SESSION['login']= $user->getLogin();
        var_dump($_SESSION);
        header("location: ../view/connexion.php");
    }else{
        echo "<p>Vous n'avez pas renseigné tous les champs nécessaires</p>";
        echo "<a href='../view/connexion.php'><button type='submit' class='btn btn-primary'>Retour à la page de connexion</button></a>";
    }
}