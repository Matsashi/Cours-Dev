<?php
// echo "<p>Hello World</p>";
// $int = 12;
// define("JV", "https://www.jeuxvideo.com");
// $bool = true;
// $null = null;
// $string = "Kafrine Kafrine quelle est la couleur ?";
// $float = 22.22;
// var_dump($string, $bool, $null, $int, $float);

// $a = 10;
// $b = 2;
// $a = $a + $b;
// $b = $a - $b;
// $a = $a - $b;
// var_dump($a/$b);


function check($array){
    if(is_array($array) && !(empty($array))){
        $bigger = 0;
        foreach($array as $key => $value){
            if($value>$bigger){
                $bigger = $value;
            }
        }
        echo "La valeur la plus grande du tableau est " . $bigger . "</br>";
    }else if(is_array($array) & empty($array)){
        echo "<p>Vous n'avez pas renseigné de valeurs !</p>";
    }else{
        echo "<p>Vous n'avez pas renseigné de tableau !</p>";
    }
}
$tabNum = array(1,65,2,848,3,484,3,778,121,88,2121,654,001,65);
$tabNoValue = array();
$NotAnArray = "Pas un tableau";
check($tabNum);
?>