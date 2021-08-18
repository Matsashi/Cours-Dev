// Changer la couleur de fond du premier paragraphe lorsque l'on clique dessus.
const firstP = document.getElementsByTagName("p")[0];
function backgroundChange (event){
    this.style.backgroundColor = "red";
}
firstP.addEventListener("click", backgroundChange);

// Ajouter/enlever la classe "important" d'un paragraphe à chaque fois que l'on clique dessus.
const allP = document.getElementsByTagName("p");
function toggleClass (event){
    this.classList.toggle("important");
}
allP[0].addEventListener("click", toggleClass);
allP[1].addEventListener("click", toggleClass);
allP[2].addEventListener("click", toggleClass);
allP[3].addEventListener("click", toggleClass);
allP[4].addEventListener("click", toggleClass);

// Ajouter un input text au-dessus de la première div. À chaque fois que l'utilisateur modifie la valeur dans l'input, cette valeur va remplacer ce qu'il y a dans le premier titre h2.
const myDiv = document.getElementById("myDiv");
const input = document.createElement("input");
input.type = "text";
document.body.insertBefore(input, myDiv);
function changeH2 (event){
    myDiv.children[0].innerHTML = input.value;
}
input.addEventListener("input", changeH2);

// Bonus : Ajouter un bouton quelque part dans la page html, en position fixe. À chaque fois que la souris rentre dans le bouton, celui se déplace autre part sur la page.