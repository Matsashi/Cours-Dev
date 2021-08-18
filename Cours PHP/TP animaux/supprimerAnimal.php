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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un animal</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        include("header.php");
        include("function.php");
        $data = getReadAnimal();
    ?>
    <div class=container_section>
        <section class="container_form">
            <form method="POST" action="traitement_suppr_animal">
                <label>Animal :</label>
                <input list="animaux" name="monAnimal">
                <datalist id="animaux">
                    <?php
                    foreach($data as $cle => $valeur){
                    echo "<option value=".$valeur->animal_nom.">".$valeur->animal_description."</option>";
                    }
                    ?>
                </datalist>
                <input type="submit" value="Supprimer">
            </form>
        </section>
    </div>
    <?php
    messageDelete();
    ?> 
</body>
</html>