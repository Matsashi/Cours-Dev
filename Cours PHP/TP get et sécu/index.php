<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP get</title>
</head>
<body>
    <form action="getEmail.php" method="GET">
        <label>Nom :</label>
        <input attribut="name" type="text" name="nom">
        <label>Prénom :</label>
        <input attribut="surname" type="text" name="prenom">
        <input type="submit" value="Envoyer"></a>
    </form>
    <?php
    if(!empty($_GET["name"]) && !empty($_GET["surname"])){
        echo "<a href=getEmail.php?name=". $_GET["name"] ."&surname=". $_GET["surname"]."></a>";
    }
    ?>
</body>
</html>