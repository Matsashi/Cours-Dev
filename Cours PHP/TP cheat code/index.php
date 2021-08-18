<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheat codes</title>
</head>
<body>
    <!-- enctype="multipart/form-data" => Permet de spécifier que c'est un formulaire d'envoie de fichier-->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file"name="file_send">
        <input type="submit"value="Envoyer">    
    </form>
    <form action="download.php" method="POST">
        <label for="cheatMenu">Choississez un cheat code : </label>   
        <select name="cheatMenu">
        <?php 
        // scandir() => scan le dossier spécifié
        $folder = scandir("fichiers");
        for($i=2; $i<count($folder); $i++){
            // ucwords() => Ajoute une majuscule à chaque début de mot
            // ucfirst() => Ajoute une majuscule au début du premier mot
            //str_replace("mot à remplacer", "mot qui remplace", "zone dans laquelle la modification va être faite") => Remplace des mots par d'autres
            $name = ucwords(str_replace("_", " ", str_replace(".txt", "", $folder[$i])));
            echo "<option value='".$name."'>".$name."</option>";
        };
        ?>
        </select>
        <input type="submit" value="Télécharger">
    </form>
</body>
</html>