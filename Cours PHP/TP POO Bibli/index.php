<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "
https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
include "controllers/BookController.controller.php";
include "controllers/GlobalController.controller.php";
$globalController = new GlobalController;
$bookController = new BookController;
try{
    if(empty($_GET['page'])){
        require "views/accueil.view.php";
    }else{
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]){
            case 'accueil':
                require "views/accueil.view.php";
                break;
            case "books":
                if(isset($url[1])){
                    if($url[1]=="create"){
                        $bookController->addBook();
                        break;
                    }else if($url[1]=="validate"){
                        $globalController->addImage();
                        $globalController->addPdf();
                        $bookController->addBookValidate();
                        break;
                    }else if($url[1]=="read"){
                        $bookController->displayBook($url[2]);
                        break;
                    }else if($url[1]=="update"){
                        $bookController->updateBook($url[2]);
                        break;
                    }else if($url[1]=="confirm"){
                        $pictureToAdd = $globalController->updateImage($bookController, $url[2]);
                        var_dump($pictureToAdd);exit;
                        // $globalController->updatePdf();
                        $bookController->updateBookConfirm($url[2]);
                        $globalController->addImage($pictureToAdd);
                        // $globalController->addPdf();
                        break;
                    }else if($url[1]=="delete"){
                        $bookController->deleteBook($url[2]);
                        break;
                    }else{
                        throw new Exception("La page n'existe pas.");
                        break;
                    }
                }else{
                    $bookController->displayBooks();
                    break;
                }
            default :
                throw new Exception("La page n'existe pas.");
                
            // case "mdp":
            //     $message = "Les mots de passe ne sont pas identiques.";
            //     break;
            // default :
            //     $message = "Une erreur imprévue est survenue";
        }
        
    } 
}catch(Exception $e){
    $error =  $e->getMessage();
    require "views/error.view.php";
}