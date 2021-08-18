const allP = document.querySelectorAll("p");
let test;

allP.forEach(function(p) {
    p.addEventListener("click", function(event){
        if(!test){
            allP.forEach(p =>{
                p.style.color="red";
                p.style.fontSize="larger";
                p.style.textDecoration="underline";
                })
                test=true;
        }
        else{
            allP.forEach(p =>{
                p.style.color="black";
                p.style.fontSize="medium";
                p.style.textDecoration="none";
                })
                test=false;
        }
    })
} );

let classe = ['benjamin','laurent','nicolas'];

classe.forEach(function(prenom){

    console.log("bonjour "+prenom)

})