<?php 
session_start();
if(empty($_SESSION['login'])){
    header ('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zoo Adrar</title>
        <link href="index.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
        include("header.php");
        include("function.php");
        $data = getReadAnimal();
        foreach ($data as $cle => $valeur) {
            echo "<article id=".strtolower($valeur->animal_nom)."><div class='close'><span class='material-icons' id='".strtolower($valeur->animal_nom)."'>highlight_off</span></div>";
            echo "<h2>" . $valeur->animal_nom . "</h2>";
            echo "<section><img src=image/" . $valeur->animal_image . " alt=".$valeur->animal_nom." title=".$valeur->animal_nom."></section>";
            echo "<p>" . $valeur->animal_description . "</p></article>";
        }
        ?>
        <script src="ajax.js"></script>
    </body>
</html>
