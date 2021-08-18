<?php ob_start();?>
<p>Ça marche pas</p>
<?php
$titre = "Accueil";
$content = ob_get_clean();
require "template.php";