<?php
include_once("models/class/Book.php");
include_once("models/class/BookManager.php");
class BookController{
    private $bookManager;
    function __construct(){        
        $this->bookManager = new BookManager;
        $this->bookManager -> loadingBooks();        
    }
    public function displayBooks(){
        $newBook = $this->bookManager->getBooks();
        require "views/books.view.php";
    }
    public function displayBook($id){
        $book = $this->bookManager->getBookById($id);
        require "views/book.view.php";
    }
    public function addBook(){
        require "views/addBook.view.php";
    }
    public function addBookValidate(){
        if(!empty($_POST)){
            $error_message = null;
            if($error_message==null)
            {
                $data = $this->bookManager->getTable();
                foreach ($data as $valeur) {
                    if(iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',str_replace(" ","",mb_strtolower($_POST["title"]))) == iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',str_replace(" ","",mb_strtolower($valeur->nom)))){
                        throw new Exception("Le livre existe déjà.");
                    }
                }     
            }
        }
        $validateBook = $this->bookManager->addBookDB();
        // throw new Exception("Erreur formulaire");
    }
}
?>