<?php
include_once "models/front/ApiManager.php";
class ApiController{
    private $APIManager;
    function __construct(){
        $this -> APIManager = new ApiManager;        
    }
    public function getAnimaux(){
        $data = $this -> APIManager -> getDBAnimaux();
        $array = [];
        // var_dump($data);
        foreach($data as $key => $value){
            if(array_key_exists($value->animal_nom,$array)){
                // $array[$value->animal_nom];
                $newContinent = [
                    "idContinent"=>$value->continent_id, 
                    "libelléContinent"=>$value->continent_libelle
                ];
                array_push($array[$value->animal_nom]["continents"], $newContinent);
            }else{
                $array[$value->animal_nom] = [                   
                    "id" => $value->animal_id,
                    "nom"=> $value->animal_nom, 
                    "description"=> $value->animal_description,
                    "image"=> $value->animal_image,
                    "famille" => [
                        "idFamille"=> $value->famille_id,
                        "libelléFamille"=>$value->famille_libelle,
                        "descriptionFamille"=>$value->famille_description
                    ],
                    "continents" => [[
                        "idContinent"=>$value->continent_id, 
                        "libelléContinent"=>$value->continent_libelle
                    ]]
                ];
            }
        }
        // var_dump($array);

        $this -> APIManager -> sendJson($array);
    }
    public function getAnimal($url){
        $data = $this -> APIManager ->getDBAnimal($url);
        $this -> APIManager -> sendJson($data);       
    }
    public function getContinents(){
        $data = $this -> APIManager -> getDBContinents();
        $this -> APIManager -> sendJson($data);
    }
    public function getFamilles(){
        $data = $this -> APIManager -> getDBFamilles();
        $this -> APIManager -> sendJson($data);
    }
}