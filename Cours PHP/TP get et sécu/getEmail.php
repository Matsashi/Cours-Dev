<?php
// htmlspecialchars => Permet de convertir les caractères spéciaux dans les GET et POST
echo "Bonjour monsieur ". htmlspecialchars($_GET["prenom"]) ." ". htmlspecialchars($_GET["nom"]);