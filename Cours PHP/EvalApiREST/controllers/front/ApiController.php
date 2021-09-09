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
        foreach($data as $value){
            $arrayAnimal = [];
            $arrayFamille = [];
            $arrayContinent = [];
            $previousValue = null;
            // var_dump($value);
            if($previousValue)
            foreach($value as $key => $value2){
                // var_dump($value2);
                // var_dump($key);
                if(str_starts_with($key, "famille")){
                    array_push($arrayFamille, $value2);
                    // var_dump($arrayFamille);
                }else if(str_starts_with($key, "continent")){
                    array_push($arrayContinent, $value2);
                    // var_dump($arrayContinent);
                }else if($value2 == $previousValue){
                    array_push($arrayAnimal, $value2);
                    $previousValue;
                }
            }
            array_push($arrayAnimal, $arrayFamille);
            array_push($arrayAnimal, $arrayContinent);
            // var_dump($arrayAnimal);
            array_push($array, $arrayAnimal);
            var_dump($array);
        }
        $this -> APIManager -> sendJson($data);
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