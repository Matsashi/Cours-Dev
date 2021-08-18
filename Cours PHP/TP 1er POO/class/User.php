<?php
class User{
    private $login;
    private $password;
    private CONST CACA = "sale";
    function __construct($identifiant, $mdp){
        $this->login = $identifiant;
        $this->password=$mdp;
    }
    function getLogin(){
        echo self::CACA;
        return $this->login;
    }
}