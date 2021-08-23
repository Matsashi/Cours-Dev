<?php
abstract class GlobalController{
    public function addImage(){
        if(!empty($_FILES['picture'])){
            $info = pathinfo($_FILES['picture']['name']);
            $error_message = null;
            if($error_message==null)
            {
                if($_FILES['picture']['size'] > 1000000){
                    $error_message .= "depasse";
                }
                if( ($info['extension']!="jpg") && ($info['extension']!="png") && ($info['extension']!="jpeg") ){
                    $error_message.="format";
                }
            }
            if($error_message == null)
            {
                move_uploaded_file($_FILES['picture']['tmp_name'], "public/images/".$_POST['title'].".".$info['extension']);
            }
        }else{
            throw new Exception("Vous n'avez pas ajouté d'image de couverture.");
        }
    }
    public function addPdf(){
        if(!empty($_FILES['pdf'])){
            $info = pathinfo($_FILES['pdf']['name']);
            $error_message = null;
            if($error_message==null)
            {
                if($_FILES['pdf']['size'] > 1000000){
                    $error_message .= "depasse";
                }
                if($info['extension']!="pdf"){
                    $error_message.="format";
                }
            }
            if($error_message == null)
            {
                move_uploaded_file($_FILES['pdf']['tmp_name'], "public/pdf/".$_POST['title'].".".$info['extension']);
            }
        }
    }
    public function updateImage($controller, $id){
        if(!empty($_FILES['newPicture']['name'])){
            $pictureToAdd = $_FILES['newPicture'];
        }else{
            $pictureToAdd = $controller->bookManager->getBookById($id)->getCover();
        }
        return $pictureToAdd;
    }
    public function updatePdf(){
        if(!empty($_FILES['newPdf'])){
            $_FILES['pdf'] = $_FILES['newPdf'];
        }
    }
}