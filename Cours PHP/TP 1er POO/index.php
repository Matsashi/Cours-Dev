<?php
class Stagiaire{
    public $nom; 
    public $prenom;
    function __construct($name, $firstname){
        $this->nom = $name;
        $this->prenom = $firstname;
    }
    public function hello(){
        echo "hello $this->prenom $this->nom";
    }
    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }
}

$matthew = new Stagiaire("Pottier", "Matthew");
// $matthew->nom = "Pottier";
// $matthew->prenom = "Matthew";
var_dump($matthew);