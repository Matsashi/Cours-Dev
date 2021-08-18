<?php 
ob_start();
?>
<p><?=$error?></p>
<?php
$titre = "Page d'erreur";
$content = ob_get_clean();
require "template.php";
?>