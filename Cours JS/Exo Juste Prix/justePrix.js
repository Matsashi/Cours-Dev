const randomNumber =  Math.floor(Math.random() *300);
const button = document.querySelector("button");
const form = document.querySelector("form");
const error = document.querySelector("small");
let coups = 0;
error.style.display ="none";
form.addEventListener("submit",function (event) {
    event.preventDefault();
})
button.addEventListener("click",function (event){
    coups++;
    const input = document.querySelector("input");
    const instruction = document.querySelector("#instructions");
    const newP = document.createElement("p");
    instruction.prepend(newP);
    if(input.value==randomNumber){
        newP.innerHTML = "#" + coups + " ( " + nombre + ") Félicitation, vous êtes le grand vainqueur !";
        newP.className = "victory";
        input.disabled = true;
    }
    else if(input.value<randomNumber){
        newP.innerHTML = "#" + coups + " ( " + nombre + ") C'est plus !";
        newP.className = "lower";
        input.value = "";
    }
    else{
        newP.innerHTML = "#" + coups + " ( " + nombre + ") C'est moins !";
        newP.className = "higher";
        input.value = "";
    }
});