<?php
session_start();
include("../treatment/functions.php");
if(!empty($_SESSION['pseudo']) || !empty($_COOKIE['pseudo'])){
    header ('location: ../index.php');  
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Mythologie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../index.css">

</head>
<body>
    <?php
    include("../component/header.php");
    ?>
    <div class="container">
        <form method="POST" action="../treatment/registerTreatment.php">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Pseudo :</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Votre pseudo" name="pseudo" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Votre mot de passe" name="mdp" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Répéter le mot de passe :</label>
                <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Votre mot de passe" name="mdp2" required>
            </div>
            <button type="submit" class="btn btn-success">S'inscrire</button>
        </form>
        <?php
        registerMessage();
        ?> 
    </div>   
</body>
</html>