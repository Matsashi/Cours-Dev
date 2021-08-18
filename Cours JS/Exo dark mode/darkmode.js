const button = document.querySelector("#mode");
const span = document.querySelector("span");
localStorage.getItem("Pam");
if(localStorage.getItem("Pam")=="dark"){
    document.body.classList.add("dark");
    button.classList.add("dark");
    span.innerHTML = "Thème clair";
};
function storage(){
    document.body.classList.toggle("dark");
    button.classList.toggle("dark");    
    if(localStorage.getItem("Pam")=="light"){
        localStorage.setItem("Pam","dark");
        span.innerHTML = "Thème clair";       
    }else{
        localStorage.setItem("Pam","light");
        span.innerHTML = "Thème sombre";        
    }
}
button.addEventListener("click", storage);