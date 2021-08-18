<?php
include ("request_db.php");
function getArticles(){
    $db = connexion_BD();
    $sql = read_article();
    $req = $db->query($sql);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function getUsers(){
    $db = connexion_BD();
    $sql = read_user();
    $req = $db->query($sql);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function addUser(){
    $db = connexion_BD();
    if(!empty($_POST["pseudo"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp2"])){
        $result_message = null;
        if($_POST["mdp"] == $_POST["mdp2"]){
            if($result_message==null)
            {
                $sql = read_user();
                $req = $db->prepare($sql);
                $result = $req->execute();    
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                foreach ($data as $valeur) {
                    if($_POST["pseudo"] == $valeur->pseudo){
                        $result_message = "existeP";
                    }
                }     
            }
            if($result_message == null)
            {
                $sql = "INSERT INTO user (pseudo,password,id_role) VALUES (:pseudo, :password, :role)";
                $req = $db->prepare($sql);
                $result = $req->execute([":pseudo"=>$_POST['pseudo'], ":password"=>password_hash($_POST['mdp'], PASSWORD_DEFAULT), ":role"=>"4"]); 
                $result_message="OK";
                if (!$result)
                {
                    $result_message="Erreur";
                }
            }
        }else{
            $result_message = "mdp";
        }
    }
    else
    {
        $result_message = "Problème";
    }
    if($result_message == "OK"){
        $login = $_POST["pseudo"];
        $_SESSION["login"]= $login;
        header("location: ../index.php");
    }else{
    header("location: ../accountManagement/register.php?result_message=".htmlspecialchars($result_message));
    }
}
function registerMessage(){
    if (!empty($_GET["result_message"]))
    {
        $message = NULL;
        switch ($_GET["result_message"]) 
        {
            case 'existeP':
                $message = "L'utilisateur (pseudo) existe déjà.";
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
function connexionUser(){
    $db = connexion_BD();
    $role = null;
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        $result_message = null;
        if($result_message==null){
            $sql = read_user();
            $req = $db->prepare($sql);
            $result = $req->execute();    
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $valeur) {
                if($_POST["pseudo"] == $valeur->pseudo){
                    if(password_verify($_POST["mdp"], $valeur->password)){
                        $result_message="OK";
                        $role = $valeur->id_role;
                    }else{
                        $result_message = "mdp";
                    }
                    break;
                }else{
                    $result_message = "existe";
                }
            }     
        }
        if (!$result)
        {
            $result_message="Erreur";
        }
    }
    if($result_message == "OK"){
        $login = $_POST["pseudo"];
        if(isset($_POST['remember'])){
            setcookie('pseudo',$login,time()+31556926,null,null,true,true);
            setcookie('role',$role,time()+31556926,null,null,true,true);
        }
        $_SESSION["role"]=$role;
        $_SESSION["pseudo"]= $login;
        header("location: ../index.php");
    }else{
    header("location: ../accountManagement/connexion.php?result_message=".htmlspecialchars($result_message));
    }
}
function connexionMessage(){
    if (!empty($_GET["result_message"]))
    {
        $message = NULL;
        switch ($_GET["result_message"]) 
        {
            case 'existe':
                $message = "L'utilisateur n'existe pas.";
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
function addArticle(){
    $db = connexion_BD();
    if(!empty($_FILES['picture'])){
        $info = pathinfo($_FILES['picture']['name']);
        $result_message = null;
        if($result_message==null)
        {
            $sql = read_article();
            $req = $db->prepare($sql);
            $result = $req->execute();    
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $valeur) {
                if($_POST["title"] == $valeur->title){
                    $result_message = "existe";
                }
            }     
        }
        if(strlen($_POST['content'])<99){
            $result_message = "enough";
        }
        if($result_message==null)
        {
            if($_FILES['picture']['size'] > 1000000){
                $result_message = "depasse";
            }
            if( ($info['extension']!="jpg") && ($info['extension']!="png") && ($info['extension']!="jpeg") ){
                $result_message .="format";
            }
        }
        if($result_message == null)
        {
            move_uploaded_file($_FILES['picture']['tmp_name'], "../images/".$_FILES['picture']['name']);
            $sql = "INSERT INTO article (title, content, image, id_user) VALUES (:title, :content, :image, :user)";
            $req = $db->prepare($sql);
            $result = $req->execute([":title"=>$_POST['title'], ":content"=>$_POST['content'], ":image"=>$_FILES['picture']['name'], ":user"=>"6"]); 
            $result_message ="OK";
            if (!$result)
            {
                $result_message ="Erreur";
            }
        }
    }
    else
    {
        $result_message = "Problème";
    }
    header("location: ../articles/add_article.php?result_message=".htmlspecialchars($result_message));
}
function addMessage(){
    if (!empty($_GET["result_message"]))
    {
        $message = NULL;
        switch ($_GET["result_message"]) 
        {
            case "existe":
                $message = "L'article existe déjà.";
                break;
            case "enough":
                $message = "Le contenu de l'article n'est pas assez long (il doit contenir minimum 100 caractères).";
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
                $message = "Erreur d'ajout dans la base de données.";
                break;
            case "Problème":
                $message = "Problème  avec l'envoie.";
                break;
            case "OK":
                $message = "Ajout OK dans la base de données.";
                break;
            default :
                $message = "Une erreur imprévue est survenue";
        }
        echo "<small>".htmlspecialchars($message)."</small>";
    }
}
function deleteArticle(){
    $db = connexion_BD();
    if(!empty($_GET['articleID'])){
        $result_message = null;
        if($result_message==null){
            $sql = read_article();
            $req = $db->prepare($sql);
            $result = $req->execute();    
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $valeur) {
                if($_GET['articleID'] !== $valeur->id_article){
                    $result_message = "existe";
                }else{
                    $result_message = null;
                    break;
                }
            }     
        }
        if($result_message == null)
        {
            $sql = "DELETE FROM article WHERE id_article = :ref";
            $req = $db->prepare($sql);
            $result = $req->execute([
                ":ref"=>$_GET["articleID"]
            ]); 
            $result_message="OK";
            if (!$result)
            {
                $result_message="Erreur";
            }
        }
    }
    else
    {
        $result_message = "Vide";
    }
    if($result_message=="OK"){
        header("location: ../index.php?result_message=".htmlspecialchars($result_message));
    }else{
        header("location: ../articles/articlesPage.php?result_message=".htmlspecialchars($result_message));
    }
}
function deleteMessage(){
    if (!empty($_GET["result_message"]))
    {
        $message = NULL;
        switch ($_GET["result_message"]) 
        {
            case "existe":
                $message = "L'article n'existe pas.";
                break;
            case "Erreur":
                $message = "Erreur de suppression dans la base de données.";
                break;
            case "Vide":
                $message = "Vous n'avez pas renseigné d'article.";
                break;
            case "OK":
                $message = "Suppression OK de l'article dans la base de données.";
                break;
            default :
                $message = "Une erreur imprévue est survenue";
        }
        echo "<small>".htmlspecialchars($message)."</small>";
    }
}