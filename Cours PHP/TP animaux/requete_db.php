<?php
function requete_lire_table_animal()
{
    return "SELECT * FROM animal";
}

function requete_lire_nom_animal()
{
    return "SELECT animal_nom FROM animal ORDER BY animal_id";
}