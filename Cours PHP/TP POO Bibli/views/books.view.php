<?php 
ob_start();
?>
<table class="table text-center">
    <tr class = "table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="3">Action</th>
    </tr>
    <?php
    foreach($newBook as $value): 
        // Livres à créer dans la DB
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?=$value->getCover()?>" alt="<?=$value->getTitle()?>" width="60px;">
        <td class="align-middle"><?=$value->getTitle()?></td>
        <td class="align-middle"><?=$value->getPages()?></td>
        <td class="align-middle"><a href="books/read/<?=$value->getId()?>" class="btn btn-success">Lire</a></td>
        <td class="align-middle"><a href="books/update/<?=$value->getId()?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="books/delete/<?=$value->getId()?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <?php endforeach?>
</table>
<a href="books/create" class="btn btn-success d-block">Ajouter</a>
<?php
// if(isset($_GET["error_message"])){
//     if($_GET["error_message"]=="existe"){
//         echo "<p>Le livre que vous avez essayé d'ajouter existe déjà.</p>";
//     }else if($_GET["error_message"]=="depasse"){
//         echo "<p>L'image que vous essayez d'ajouter dépasse les 1Mo.</p>"
//     }else if($_GET["error_message"]=="format"){
//         echo "<p>L'image que vous essayez d'ajouter n'est pas au bon format.</p>"
//     }
//     echo $_GET["error_message"];
// }
$titre = "Livres";
$content = ob_get_clean();
require "template.php";