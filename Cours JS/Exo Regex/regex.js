let login = document.getElementById("login");
let password = document.getElementById("password");
let invalid = document.getElementById("invalid");
let submit = document.querySelector("#submit");
let form = document.querySelector("form");
form.style.display = "flex";
let regex1 = /^[a-z0-9._-]+@+[a-z]+\.[a-z]{2,5}$/;
let regex2= /^(?=.*[a-zA-Z])(?=.*[\d])(?=.*[$&@!])[a-zA-Z\d$&@!]{6,8}$/;
let regex3 = /[a-z]+/;
let regex4 = /[0-9]+/;
let regex5 = /[$&@!]+/;
login.addEventListener("input", function (event){
    if(login.value.match(regex1)){
        invalid.innerHTML ="";
        login.style.backgroundColor="green";
    }else{
        invalid.innerHTML = "Vous devez renseigner une adresse avec au moins un @ et un ."
        login.style.backgroundColor="red";
    }
});
password.addEventListener("input", function (event){
    if(password.value.match(regex2)){
        invalid.innerHTML ="Votre mot de passe est valide (gg).";
        password.style.backgroundColor="green";
    }else{
        if(!password.value.match(regex3)){
            invalid.innerHTML = "Vous devez renseigner un mot de passe contenant au moins une lettre !";
            password.style.backgroundColor="red";
        }else if(!password.value.match(regex4)){
            invalid.innerHTML = "Vous devez renseigner un mot de passe contenant au moins un chiffre !";
            password.style.backgroundColor="red";
        }else if(!password.value.match(regex5)){
            invalid.innerHTML = "Vous devez renseigner un mot de passe contenant au moins un caractère spécial ($,@,& ou !)";
            password.style.backgroundColor="red";
        }else{
            invalid.innerHTML = "Vous devez renseigner un mot de passe contenant entre 6 et 8 caractères !";
            password.style.backgroundColor="red";
        }
    }
});