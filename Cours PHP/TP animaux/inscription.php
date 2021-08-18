<?php
include("function.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <form method="POST" action="traitement_inscription.php">
        <label>Pseudo :</label>
        <p>
            <input type="text" name="pseudo" required>
        </p>
        <label>Mot de passe :</label>
        <p><input type="password" name="mdp" required>
        </p>
        <label>Confirmer le mot de passe :</label>
        <p><input type="password" name="mdp2" required>
        </p>
        <label>Adresse email :</label>
        <p>
            <input type="mail" name="mail" required>
        </p>
        <input type="submit">
    </form>
    <?php
    messageInscription();
    ?>    
</body>
</html>