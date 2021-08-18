<?php 
function superList($string, $array){
    echo "<h1>" . $string . "</h1><ul>";
    foreach($array as $key => $value){
        echo "<li>" . $value . "</li>";
    }
    echo "</ul>";
}
$textFormateur = "Formateurs";
$tabNoms = ["Benjamin","Ophélie","Julien"];
echo superlist ($textFormateur, $tabNoms);
?>