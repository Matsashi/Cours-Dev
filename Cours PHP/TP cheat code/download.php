<?php
// var_dump($_POST);exit; => exit arrête tout 
$test = strtolower(str_replace(" ", "_", $_POST["cheatMenu"].".txt")) ;

// Vous voulez afficher un txt
header('Content-Type: text/plain');

// Changer le nom du fichier téléchargé
header("Content-Disposition: attachment; filename=cheatCode.txt");

// Lire le contenu du fichier cible
readfile("fichiers/" . $test);
?> 