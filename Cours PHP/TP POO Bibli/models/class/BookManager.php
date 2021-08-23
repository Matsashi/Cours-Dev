<?php
require "models/class/Model.php";
class BookManager extends Model{
    private $bookList;
    public function getTable(){
        $sql = "SELECT * FROM livres";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        return $data;
    }
    public function addBook($newBook){
        $this->bookList[] = $newBook;
    }
    public function addBookDB(){
        $info = pathinfo($_FILES['picture']['name']);
        $sql = "INSERT INTO livres (nom, nbPages, image) VALUES (:livre_nom, :livre_pages, :livre_image)";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([":livre_nom"=>$_POST['title'], ":livre_pages"=>$_POST['nbPages'], ":livre_image"=>$_POST['title'].".".$info['extension']]);
    }
    public function getBooks()
    {
        return $this->bookList;
    }
    public function loadingBooks(){
        $books = $this->getTable();
        foreach($books as $book){
            $add = new Livre($book->idLivre, $book->nom, $book->nbPages, $book->image);
            $this->addBook($add);
        }
    }
    public function getBookById($id){
        foreach($this->bookList as $value){
            if($id == $value->getId()){
                return $value;
                break;
            }
        }
    }
    public function updateBookDB($id){
        $info = pathinfo($_FILES['picture']['name']);
        $sql = "UPDATE livres SET  nom=(:livre_nom), nbPages=(:livre_pages), image=(:livre_image) WHERE idLivre=$id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([":livre_nom"=>$_POST['title'], ":livre_pages"=>$_POST['nbPages'], ":livre_image"=>$_POST['title'].".".$info['extension']]);
    }
    public function deleteBookDB($id){
        $sql = "DELETE FROM livres WHERE idLivre = :id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([":id"=>$id]);
    }
}