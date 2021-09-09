<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "
https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
include_once "controllers/front/ApiController.php";
$apiController = new ApiController;
try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas.");
    }else{
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]){
            case "Front":
                if(isset($url[1])){
                    if($url[1]=="Animaux"){
                        $apiController -> getAnimaux();
                        break;
                    }else if($url[1]=="Animal"){
                        $apiController -> getAnimal($url[2]);
                        break;
                    }else if($url[1]=="Continents"){
                        $apiController -> getContinents();
                        break;
                    }else if($url[1]=="Familles"){
                        $apiController -> getFamilles();
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
        }
        
    } 
}catch(Exception $e){
    $error =  $e->getMessage();
    echo $error;
}