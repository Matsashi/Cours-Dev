<?php
require "models/front/Model.php";
class ApiManager extends Model{
    public function getDBAnimaux(){
        $sql = "SELECT * FROM animal INNER JOIN famille ON animal.famille_id = famille.famille_id INNER JOIN animal_continent ON animal.animal_id = animal_continent.animal_id INNER JOIN continent ON continent.continent_id = animal_continent.continent_id";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        return $data;
    }
    public function getDBAnimal($id){
        $sql = "SELECT * FROM animal INNER JOIN famille ON animal.famille_id = famille.famille_id INNER JOIN animal_continent ON animal.animal_id = animal_continent.animal_id INNER JOIN continent ON continent.continent_id = animal_continent.continent_id WHERE animal.animal_id = $id";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        return $data;
    }
    public function getDBContinents(){
        $sql = "SELECT * FROM continent";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        return $data;
    }
    public function getDBFamilles(){
        $sql = "SELECT * FROM famille";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        return $data;
    }
}