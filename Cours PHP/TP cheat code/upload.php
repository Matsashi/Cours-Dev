<?php
$folder = "fichiers/";
// strtoupper() => Transforme tous les caractères en majuscule
// strtolowwer() => Transforme tous les caractères en minuscule
$target_file = strtolower(str_replace(" ", "_", ($folder . basename($_FILES["file_send"]["name"]))));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file_send"]["tmp_name"]);
  if($check) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Désolé, le fichier est déjà existant.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file_send"]["size"] > 1000000) {
    echo "Désolé, le fichier est trop lourd (maximum 1Mo).";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "txt") {
  echo "Désolé, seuls les fichiers en .txt sont acceptés.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "</br> <p>Désolé, votre fichier n'a pas été transféré.</p>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["file_send"]["tmp_name"], $target_file)) {
      echo "Le fichier ". htmlspecialchars( basename( $_FILES["file_send"]["name"])). " a été transféré.";
    } else {
      echo "Désolé, une erreur est survenue lors du transfert de fichier.";
    }
  }
?>