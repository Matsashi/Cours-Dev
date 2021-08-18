<?php 
session_start();
if(!empty($_SESSION['login'])){
    header ('location: accueil.php');    
}
include('function.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>
    <form method="POST" action=traitement_connexion.php>
    <label>Identifiant : </label>
    <p>
        <input type="text" name="identifiant" required>
    </p>
    <label>Mot de passe : </label>
    <p>
        <input type="password" name="mdp" required>
    </p>
    <p>
        <a href="inscription.php">S'incrire</a>
    </p>
    <label>Se rappeler de moi</label>
    </br><input type="checkbox" name="remember_me">
    <p>
        <input type="submit" value="Connexion">
    </p>
    </form>
    <?php
    if(isset($_POST["remember_me"])){
        if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
        {
            $hour = time() + 365 * 24 * 60 * 60;
            setcookie('pseudo', $_POST["identifiant"], $hour);
        }
    }
    messageConnexion();
    ?>     
</body>
</html>