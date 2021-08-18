<?php
// session_start => Obligatoire dès lors qu'on manipule une session
session_start();
if(!empty($_POST['identifiant'])){
    $login = $_POST["identifiant"];
    // $_SESSION["string"] => Permet de créer une session (C'est un tableau de valeurs)
    $_SESSION["login"]= $login;
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
    <?php
    echo "Bonjour ". htmlspecialchars($_SESSION["login"]);
    echo '</br><a href="deconnexion.php">Déconnexion</a>';
    ?>
</body>
</html>