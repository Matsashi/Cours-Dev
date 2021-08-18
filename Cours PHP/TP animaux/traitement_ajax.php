<?php 
include("function.php");
$data = crossDelete();
// $tata = ["matt"=>"pastop"]; TRÈS UTILE ÇA MERCI BENJAMIN !!!
$tab = json_encode($data);
echo $tab;