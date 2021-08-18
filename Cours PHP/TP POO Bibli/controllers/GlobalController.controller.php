<?php
class GlobalController{
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
                move_uploaded_file($_FILES['picture']['tmp_name'], URL."/public/images/".$_POST['title'].".".$info['extension']);
            }
        }else{
            throw new Exception("Vous n'avez pas ajouté d'image de couverture.");
        }
    }
}