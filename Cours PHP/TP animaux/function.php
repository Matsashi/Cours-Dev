<?php
function connexion_BD()
{
    try 
    {
        $db = new PDO("mysql:host=localhost;dbname=zoo;charset=utf8", "root", "");
        return $db;
    } 
    catch (Exception $e) 
    {
        die($e->getMessage());
        return $e;
    }
}
function requete_lire_table_animal()
{
    return "SELECT * FROM animal";
}
function requete_lire_table_user()
{
    return "SELECT * FROM user";
}

function requete_lire_nom_animal()
{
    return "SELECT animal_nom FROM animal ORDER BY animal_id";
}
function getReadAnimal(){
    $db = connexion_BD();
    $sql = requete_lire_table_animal();
    $req = $db->query($sql);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function addAnimal(){
    $db = connexion_BD();
    if(!empty($_FILES['picture'])){
        $info = pathinfo($_FILES['picture']['name']);
        $message_resultat = null;
        if($message_resultat==null)
        {
            $sql = requete_lire_nom_animal();
            $req = $db->prepare($sql);
            $result = $req->execute();    
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $valeur) {
                if(ucfirst(mb_strtolower($_POST["nom"])) == $valeur->animal_nom){
                    $message_resultat = "existe";
                }
            }     
        }
        if($message_resultat==null)
        {
            if($_FILES['picture']['size'] > 1000000){
                $message_resultat .= "depasse";
            }
            if( ($info['extension']!="jpg") && ($info['extension']!="png") && ($info['extension']!="jpeg") ){
                $message_resultat.="format";
            }
        }
        if($message_resultat == null)
        {
            move_uploaded_file($_FILES['picture']['tmp_name'], "image/".$_POST['nom'].".".$info['extension']);
            $sql = "INSERT INTO animal (animal_nom,animal_description,animal_image) VALUES (:animal_nom, :animal_description, :animal_image)";
            $req = $db->prepare($sql);
            $result = $req->execute([":animal_nom"=>ucfirst(mb_strtolower($_POST['nom'])), ":animal_description"=>ucfirst(mb_strtolower($_POST['description'])), ":animal_image"=>$_POST['nom'].".".$info['extension']]); 
            $message_resultat.="OK";
            if (!$result)
            {
                $message_resultat.="Erreur";
            }
        }
    }
    else
    {
        $message_resultat = "Problème";
    }
    header("location: ajouterAnimal.php?message_resultat=".htmlspecialchars($message_resultat));
}
function deleteAnimal(){
    $db = connexion_BD();
    if(!empty($_POST['monAnimal'])){
        $message_resultat = null;
        if($message_resultat==null){
            $sql = requete_lire_nom_animal();
            $req = $db->prepare($sql);
            $result = $req->execute();    
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $valeur) {
                if(ucfirst(mb_strtolower($_POST["monAnimal"])) !== $valeur->animal_nom){
                    $message_resultat = "existe";
                }else{
                    $message_resultat = null;
                    break;
                }
            }     
        }
        if($message_resultat == null)
        {
            $sql = "DELETE FROM animal WHERE animal_nom = :animal_nom";
            $req = $db->prepare($sql);
            $result = $req->execute([
                ":animal_nom"=>$_POST["monAnimal"]
            ]); 
            $message_resultat="OK";
            if (!$result)
            {
                $message_resultat="Erreur";
            }
        }
    }
    else
    {
        $message_resultat = "Vide";
    }
    header("location: supprimerAnimal.php?message_resultat=".htmlspecialchars($message_resultat));
}
function messageDelete(){
    if (!empty($_GET["message_resultat"]))
    {
        $message = NULL;
        switch ($_GET["message_resultat"]) 
        {
            case "existe":
                $message = "L'animal n'existe pas.";
                break;
            case "Erreur":
                $message = "Erreur de suppression dans la base de données.";
                break;
            case "Vide":
                $message = "Vous n'avez pas renseigné d'animal.";
                break;
            case "OK":
                $message = "Suppression OK dans la base de données.";
                break;
            default :
                $message = "Une erreur imprévue est survenue";
        }
        echo "<small>".htmlspecialchars($message)."</small>";
    }
}
function messageAdd(){
    if (!empty($_GET["message_resultat"]))
    {
        $message = NULL;
        switch ($_GET["message_resultat"]) 
        {
            case "existe":
                $message = "L'animal existe déjà.";
                break;
            case "depasse":
                $message = "Le fichier ne doit pas dépasser les 1 Mo";
                break;
            case "format":
                $message = "Le fichier doit être un .jpg, un .jpeg ou un .png";
                break;
            case "depasseformat":
                $message = "Le fichier ne doit pas dépasser les 1 Mo et le fichier doit être un .jpg, un .jpeg ou un .png";
                break;
            case "Erreur":
                $message = "Erreur d'ajout dans la BDD.";
                break;
            case "Problème":
                $message = "Problème  avec l'envoie.";
                break;
            case "OK":
                $message = "Ajout OK dans la BDD.";
                break;
            default :
                $message = "Une erreur imprévue est survenue";
        }
        echo "<small>".htmlspecialchars($message)."</small>";
    }
}
function connexionUser(){
    $db = connexion_BD();
    if(!empty($_POST['identifiant']) && !empty($_POST['mdp'])){
        $message_resultat = null;
        if($message_resultat==null){
            $sql = requete_lire_table_user();
            $req = $db->prepare($sql);
            $result = $req->execute();    
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $valeur) {
                if($_POST["identifiant"] == $valeur->pseudo){
                    if(password_verify($_POST["mdp"], $valeur->password)){
                        $message_resultat="OK";
                    }else{
                        $message_resultat = "mdp";
                    }
                    break;
                }else{
                    $message_resultat = "existe";
                }
            }     
        }
        if (!$result)
        {
            $message_resultat="Erreur";
        }
    }
    if($message_resultat == "OK"){
        $login = $_POST["identifiant"];
        $_SESSION["login"]= $login;
        header("location: accueil.php");
    }else{
    header("location: index.php?message_resultat=".htmlspecialchars($message_resultat));
    }
}
function messageConnexion(){
    if (!empty($_GET["message_resultat"]))
    {
        $message = NULL;
        switch ($_GET["message_resultat"]) 
        {
            case 'existe':
                $message = "L'utilisateur n'existe pas.";
                break;
            case "OK":
                $message = "Le compte a bien été créé.";
                break;
            case "Erreur":
                $message = "Erreur de connexion depuis la base de données.";
                break;
            case "mdp":
                $message = "Le mot de passe est incorrect.";
                break;
            default :
                $message = "Une erreur imprévue est survenue";
        }
        echo "<small>".htmlspecialchars($message)."</small>";
    }
}
function linkDisconnect(){
    header("location: traitement_deconnexion.php");
}
function addUser(){
    $db = connexion_BD();
    if(!empty($_POST["pseudo"]) && !empty($_POST["mdp"]) && !empty($_POST["mail"])){
        $message_resultat = null;
        if($_POST["mdp"] == $_POST["mdp2"]){
            if($message_resultat==null)
            {
                $sql = requete_lire_table_user();
                $req = $db->prepare($sql);
                $result = $req->execute();    
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                foreach ($data as $valeur) {
                    if($_POST["pseudo"] == $valeur->pseudo){
                        $message_resultat = "existeP";
                    }else if($_POST["mail"] == $valeur->mail){
                        $message_resultat = "existeM";
                    }
                }     
            }
            if($message_resultat == null)
            {
                $sql = "INSERT INTO user (pseudo,password,mail) VALUES (:pseudo, :password, :mail)";
                $req = $db->prepare($sql);
                $result = $req->execute([":pseudo"=>$_POST['pseudo'], ":password"=>password_hash($_POST['mdp'], PASSWORD_DEFAULT), ":mail"=>$_POST['mail']]); 
                $message_resultat="OK";
                if (!$result)
                {
                    $message_resultat="Erreur";
                }
            }
        }else{
            $message_resultat = "mdp";
        }
    }
    else
    {
        $message_resultat = "Problème";
    }
    if($message_resultat == "OK"){
        $login = $_POST["pseudo"];
        $_SESSION["login"]= $login;
        header("location: accueil.php");
    }else{
    header("location: inscription.php?message_resultat=".htmlspecialchars($message_resultat));
    }
}
function messageInscription(){
    if (!empty($_GET["message_resultat"]))
    {
        $message = NULL;
        switch ($_GET["message_resultat"]) 
        {
            case 'existeP':
                $message = "L'utilisateur (pseudo) existe déjà.";
                break;
            case "existeM":
                $message = "L'utilisateur (mail) existe déjà.";
                break;
            case "Erreur":
                $message = "Erreur d'importation dans la base de données.";
                break;
            case "mdp":
                $message = "Les mots de passe ne sont pas identiques.";
                break;
            default :
                $message = "Une erreur imprévue est survenue";
        }
        echo "<small>".htmlspecialchars($message)."</small>";
    }
}
function crossDelete(){
    $db = connexion_BD();
    $sql = "DELETE FROM animal WHERE animal_nom = :animal_nom";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":animal_nom"=>$_GET["crossId"]
    ]);
}