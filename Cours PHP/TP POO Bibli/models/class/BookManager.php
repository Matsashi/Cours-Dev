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
    //     if(!empty($_FILES['picture'])){
            $info = pathinfo($_FILES['picture']['name']);
    //         $error_message = null;
    //         if($error_message==null)
    //         {
    //             $sql = "SELECT * FROM livres";
    //             $req = $this->getDB()->prepare($sql);
    //             $result = $req->execute();    
    //             $data = $req->fetchAll(PDO::FETCH_OBJ);
    //             // iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $string); ==> Fonction qui remplace les lettres avec accent par les lettres correspondantes sans accent
    //             foreach ($data as $valeur) {
    //                 if(iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',str_replace(" ","",mb_strtolower($_POST["title"]))) == iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE',str_replace(" ","",mb_strtolower($valeur->nom)))){
    //                     $error_message = "existe";
    //                 }
    //             }     
    //         }
    //         if($error_message==null)
    //         {
    //             if($_FILES['picture']['size'] > 1000000){
    //                 $error_message .= "depasse";
    //             }
    //             if( ($info['extension']!="jpg") && ($info['extension']!="png") && ($info['extension']!="jpeg") ){
    //                 $error_message.="format";
    //             }
    //         }
    //         if($error_message == null)
    //         {
    //             move_uploaded_file($_FILES['picture']['tmp_name'], URL."/public/images/".$_POST['title'].".".$info['extension']);
                $sql = "INSERT INTO livres (nom, nbPages, image) VALUES (:livre_nom, :livre_pages, :livre_image)";
                $req = $this->getDB()->prepare($sql);
                $result = $req->execute([":livre_nom"=>$_POST['title'], ":livre_pages"=>$_POST['nbPages'], ":animal_image"=>$_POST['title'].".".$info['extension']]);
    //             $error_message.="OK";
    //             if (!$result)
    //             {
    //                 $error_message.="Erreur";
    //             }
    //         }
    //     }else{
    //         $error_message = "Problème";
    //     }
    //     header("location: ".URL."/books?error_message=".htmlspecialchars($error_message));
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
}