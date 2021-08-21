<?php 
session_start();
if(isset($_SESSION["role"])){
    if($_SESSION["role"]!=="3"){
        header ('location: ../mythologie.php');
    }
}elseif(isset($_COOKIE["role"])){
    if($_COOKIE["role"]!=="3"){
        header ('location: ../mythologie.php');
    }
}else{
    header ('location: ../mythologie.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau article Mythologie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../mythologie.css">
</head>
<body>
    <?php
    include ("../component/header.php");
    include("../treatment/functions.php");
    echo "<div class='behindHeader'></div>";
    ?>
    <div class="container">
        <form method="POST" action="../treatment/addArticleTreatment.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Titre de l'article :</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="title" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Contenu de l'article :</label>
                <textarea type="text" class="form-control" id="formGroupExampleInput2" rows="10" minlength="100" name="content" placeholder="100 caractères minimum" required></textarea>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="picture" required>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <div id="divButton">
                <button type="submit" class="btn btn-success">Créer</button>
            </div>
        </form>
        <?php
        addMessage();
        ?> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>