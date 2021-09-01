<?php
class GlobalController{
    public static function addImage(){
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
    public static function addPdf(){
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
    public function updateImage(){
        if(!empty($_FILES['picture']['name'])){
            $pictureToAdd = $_FILES['picture'];
        }else{
            $pictureToAdd="";
        }
        return $pictureToAdd;
    }
    public function updatePdf(){
        if(!empty($_FILES['pdf'])){
            $pdfToAdd = $_FILES['newPdf'];
        }else{
            $pdfToAdd = "";
        }
        return $pdfToAdd;
    }
}