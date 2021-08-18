const button = document.querySelector("input");
let articleId = document.querySelector(".behindHeader");
articleId = articleId.innerHTML;
function confirmBox(){
    if(confirm("Êtes-vous sûr(e) de vouloir supprimer cet article ?")){
        window.location.href ="../treatment/deleteArticleTreatment.php?articleID=" + articleId;
    }
}
button.addEventListener("click", confirmBox);