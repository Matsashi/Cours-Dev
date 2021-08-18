var url = 'https://api.openweathermap.org/data/2.5/weather?q=montpellier&appid=a59a0a32e186d10881b70a23f26d8487&units=metric';
let keyID = "a59a0a32e186d10881b70a23f26d8487";
let units = "metric";
let temp;

function actualiseMeteo(){
    //Requete GET
    let requete = new XMLHttpRequest(); //creation de l'objet

    requete.open("GET", url); // requete POST ou GET, url

    requete.responseType = "json"; // réponse attendu : JSON

    requete.send(); // Envoi de la requete 

    // Dès que l'on reçoit une réponse on va executer cette fonction anonyme
    requete.onload = function () {
        if (requete.readyState === XMLHttpRequest.DONE) {
            if (requete.status === 200) {
                let response = requete.response; // stockage de la réponse
                let ville = response.name;
                let temperature = response.main.temp;
                temp = temperature;
                let today = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                document.querySelector("#ville").textContent = ville;
                document.querySelector("#heure").textContent = " Le " + today.toLocaleString("fr-FR",options) + " à " + today.toLocaleTimeString();
                document.querySelector("#temperature_label").textContent = temperature;
            }
            else {
                console.log("erreur lors de la requête à l'API");
                newVille();
            }
        }
    }
}
class MyApiMeteo{
    constructor(ville){
        this.key = keyID;
        this.ville = ville;
        this.temperature = temp;
        this.unit = units;
        this.url = "https://api.openweathermap.org/data/2.5/weather?q=" + this.ville + "&appid=" + this.key + "&units=" + this.unit;
    }
}
actualiseMeteo();
const button = document.querySelector("#changer");
function newVille(){
    let input = prompt("Renseignez une ville");
    let api = new MyApiMeteo(input);
    url = api.url;
    // url = "https://api.openweathermap.org/data/2.5/weather?q=" + input + "&appid=a59a0a32e186d10881b70a23f26d8487&units=metric";
    actualiseMeteo();
}
button.addEventListener("click", newVille);