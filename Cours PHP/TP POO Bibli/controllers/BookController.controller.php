<?php
include_once("models/class/Book.php");
include_once("models/class/BookManager.php");
// include_once("controllers/GlobalController.controller.php");
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
                    // if(iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',str_replace(" ","",mb_strtolower($_POST["title"]))) == iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',str_replace(" ","",mb_strtolower($valeur->nom)))){
                    //     throw new Exception("Le livre existe déjà.");
                    // }  <== conditions pour vérifier si le livre existe déjà
                }     
            }
        }
        // $globalC->addImage();
        //add pdf
        $validateBook = $this->bookManager->addBookDB();
        header ('location:' .URL.'books');
    }
    public function updateBook($id){
        $book = $this->bookManager->getBookById($id);
        require "views/updateBook.view.php";
    }
    public function updateBookConfirm($pictureToAdd, $pdfToAdd, $id){
        $info = pathinfo($_FILES['picture']['name']);
        $cover = $this->bookManager->getBookById($id)->getCover();
        if($pictureToAdd != ""){
            unlink("public/images/".$cover.$info['extension']);
            GlobalController::addImage();
        }
        if($pdfToAdd != ""){
            unlink("public/pdf/".$cover.".pdf");
            GlobalController::addPdf();
        }
        $confirmBook = $this->bookManager->updateBookDB($id);
        header ('location:' .URL.'books');

    }
    public function deleteBook($id){
        $cover = $this->bookManager->getBookById($id)->getCover();
        $title = $this->bookManager->getBookById($id)->getTitle();
        $this->bookManager -> deleteBookDB($id);
        unlink("public/images/".$cover);
        unlink("public/pdf/".$title.".pdf");
        header ('location:' .URL.'books');
    }
}
?>