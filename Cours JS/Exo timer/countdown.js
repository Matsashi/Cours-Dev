const button = document.querySelector("button");
button.addEventListener ("click", function (){
    this.remove();
});
let interval;
let number = 10;
function decompte (){
    if(number == 0){
        const chiffre = document.createElement("p");
        document.body.append(chiffre);
        chiffre.innerHTML = "BOUM !!!"
        number--;
        clearInterval(interval)
    }
    else if (number > 0){
        const chiffre = document.createElement("p");
        document.body.append(chiffre);
        chiffre.innerHTML = number;
        number--;
        
    }
}
function start (){
    interval = setInterval(decompte, 1000);
}
button.addEventListener ("click", start);