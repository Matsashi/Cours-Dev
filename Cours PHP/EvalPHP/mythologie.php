<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil Mythologie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="mythologie.css">
    </head>
    <body>
        <?php
            include("component/header.php");
            include("treatment/functions.php");
            echo "<div class='behindHeader'></div>";
            $data = getArticles();
            deleteMessage();
            foreach ($data as $cle => $valeur) {
                echo "<a href='articles/articlesPage.php?articleID=". $valeur->id_article ."'>";
                echo "<article id=article".str_replace(" ","",ucwords($valeur->title))."><div class='close'><span class='material-icons' id='".lcfirst(str_replace(" ","",ucwords($valeur->title)))."'></span></div>";
                echo "<section><h2>" . $valeur->title . "</h2>";
                echo "<img src=images/" . $valeur->image . " alt=".str_replace(" ","",ucwords($valeur->title))." title=".str_replace(" ","",ucwords($valeur->title))."></section></article></a>";
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </body>
</html>