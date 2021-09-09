<?php
abstract class Model{
    private $pdo;
    private function setDB(){
        $this->pdo = new PDO("mysql:host=localhost; dbname=animaux;charset=utf8", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    protected function getDB(){
        if($this->pdo == null){
            $this->setDB();
        }
        return $this->pdo;
    }
    public static function sendJson($data){
        $json = json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        header("Access-Control-Allow-Origin: * ");
        header("Content-Type: application/json");
        echo $json;
    }
}