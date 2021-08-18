<?php 
session_start();
if(!empty($_SESSION['login'])){
    header ('location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Session</title>
</head>
<body>
    <form method="POST" action=connexion.php>
    <label>Identifiant : </label>
    <input type="text" name="identifiant" required>
    <label>Mot de passe : </label>
    <input type="password" name="mdp" required>
    <input type="submit" value="Connexion">
    </form>
</body>
</html>