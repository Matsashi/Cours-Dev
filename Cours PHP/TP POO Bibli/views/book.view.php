<?php 
ob_start();
?>
<table class="table text-center">
    <tr class = "table-dark">
    <td class="align-middle"><img src="<?=URL?>/public/images/<?=$book->getCover()?>" alt="<?=$book->getTitle()?>" width="250px"></td>
    <td class="align-middle"><embed src="<?=URL?>/public/pdf/<?=$book->getTitle()?>.pdf" width=1000 height=750 type='application/pdf'/></td>
    </tr>
<?php
$titre = $book->getTitle();
$content = ob_get_clean();
require "template.php";