const url = 'https://blockchain.info/ticker';

function actualiseBitcoin(){
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
                let euro = response.EUR.last +" " + response.EUR.symbol ;
                document.querySelector("p").textContent = euro;
                console.log(response);
            }
            else {
                console.log("erreur lors de la requête à l'API");
            }
        }
    }
}

setInterval(actualiseBitcoin,1000);