<?php
session_start();
// session_destroy => Permet de supprimer toutes les sessions actives
session_destroy();
// header ("location: lien") => Permet de rediriger vers une autre page
header("location: index.php"); 
?>