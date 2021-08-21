<?php
session_start();
// session_destroy => Permet de supprimer toutes les sessions actives
session_destroy();
// setcookie => Permet de paramétrer un cookie (dans ce cas le temps est mis a 1 pour le détruire) 
setcookie('pseudo',"",1);
setcookie('role',"",1);
// header ("location: lien") => Permet de rediriger vers une autre page
header("location: ../mythologie.php"); 
?>