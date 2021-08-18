<?php 
function compteur(){
    $file = fopen("compteur.txt", "r+");
    $nbVisitor = fgets($file);
    $nbVisitor++;
    fseek($file,0);
    fputs($file,$nbVisitor);
    echo "Nombre de visiteurs : ". $nbVisitor;
    fclose($file);
}
compteur();