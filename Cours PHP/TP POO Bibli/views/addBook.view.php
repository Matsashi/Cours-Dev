<?php 
ob_start();
?>
<form method="POST" action="<?=URL?>/books/validate" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
      <label for="title" class="form-label mt-4">Titre</label>
      <input type="text" class="form-control" id="title" placeholder="Entrer le titre du livre" name="title" required>
    </div>
    <div class="form-group">
      <label for="nbPage" class="form-label mt-4">Nombre de pages</label>
      <input type="number" class="form-control" id="nbPages" placeholder="Entrer le nombre de pages" name="nbPages" required>
    </div>
    <div class="form-group">
      <label for="file" class="form-label mt-4">Image de couverture</label>
      <input class="form-control" type="file" id="file" aria-describedby="imgHelp" name="picture" required>
      <small id="imgHelp" class="form-text text-muted">L'image doit être au format .jpg .png ou .jpeg et le fichier doit peser moins de 1Mo</small>
    </div>
    <div class="form-group">
      <label for="pdfFile" class="form-label mt-4">Fichier PDF</label>
      <input class="form-control" type="file" id="pdfFile" aria-describedby="pdfHelp" name="pdf" required>
      <small id="pdfHelp" class="form-text text-muted">L'ajout du pdf du livre est obligatoire, il facilite la lecture de ce dernier</small>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </fieldset>
</form>
<?php
$titre = "Ajouter un livre";
$content = ob_get_clean();
require "template.php";
?>