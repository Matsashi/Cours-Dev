const input = document.querySelector("input");
const label = document.querySelector("label");
const text = document.createElement("p");
input.style.display ="none";
function bouton (){
    if(input.checked){
        input.type ="checkbox";
        label.innerHTML="Cacher";
        text.innerHTML = "Ethan Winters était mort depuis le début de Resident Evil 7";
        document.body.append(text);
    }
    else{
        input.type ="checkbox";
        label.innerHTML="Afficher";
        text.remove();
    }
}
input.addEventListener ("click", bouton);