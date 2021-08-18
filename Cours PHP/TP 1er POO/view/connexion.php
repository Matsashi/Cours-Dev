<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php
        if(!empty($_SESSION)){
            echo "<p>Bienvenue ". $_SESSION["login"]."</p>";
            echo "<a href='../treatment/connexionTreatment.php?pseudo=".$_SESSION["login"]."'><button type='submit' class='btn btn-primary'>Se déconnecter</button></a>";
        }else{
            echo "<form method='POST' action='../treatment/connexionTreatment.php'>
            <div class='mb-3'>
                <label for='pseudo' class='form-label'>Pseudo</label>
                <input type='text' class='form-control' id='pseudoForm' aria-describedby='emailHelp' name='pseudo' required>
            </div>
            <div class= 'mb-3'>
                <label for='password' class='form-label'>Mot de passe</label>
                <input type='password' class='form-control' id='passwordForm' name='password' required>
            </div>
            <div class='mb-3 form-check'>
                <input type='checkbox' class='form-check-input' id='checkBox'>
                <label class='form-check-label' for='exampleCheck1' name='remember'>Se rappeler de moi</label>
            </div>
            <button type='submit' class='btn btn-primary'>Se connecter</button>
        </form>";
        }
        ?>       
    </body>
</html>