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
        <title>Ajouter animal</title>
        <link href="index.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include("header.php");
        include("function.php");
        ?>
        <div class=container_section>
            <section class="container_form">
                <form class="ajout_form" action="traitement_ajout_animal.php" method="POST"  enctype="multipart/form-data">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" required>        
                    <label for="description">Description :</label>
                    <textarea type="text" name="description" required rows="5" cols="33"></textarea>
                    <input type="file"name="picture" required>
                    <input type="submit" value="Ajouter">
                </form>
            </section>
        </div>
    <?php
    messageAdd();
    ?>
    </body>
</html>