// Ajouter une image dans la div, après les paragraphes.
const newElement = document.createElement("img");
const myDiv = document.getElementById("myDiv");
newElement.src = "MHA.jpg";
myDiv.appendChild(newElement);


// Ajouter un petit titre avant le troisième paragraphe.
const newTitle = document.createElement("h2");
newTitle.innerHTML = "My Hero Academia";
const allMyT = document.getElementsByTagName("p");
myDiv.insertBefore(newTitle, allMyT[2]);

// Retirer le lien tout en bas de la page, et le placer avant la div.
const link = document.getElementsByTagName("a");
myDiv.parentElement.insertBefore(link[0], myDiv);

// Ajouter à la fin du body une liste dont les éléments sont les mots suivants : "Fraise", "Banane", "Kiwi", "Pomme", "Abricot" et "Prune".
// const newUl = document.createElement("ul");
// tab = ["Fraise", "Banane", "Kiwi", "Pomme", "Abricot", "Prune"];
// const newList = function (){
//     for(let i=0; i<tab.length; i++){
//         const   = document.createElement("li");

//     }
// }

// Ajouter juste après le tout premier titre une table représentant une pyramide :
// *
// *    *
// *    *    *
// *    *    *    *
// *    *    *    *    *

// Bonus : le code suivant a été chiffré en ROT13 (pour éviter de donner trop d'indices dans la question précédente !). Déchiffrez-le (à l'aide d'outils trouvés sur internet), et essayez de comprendre en quoi consiste le code.
/*
shapgvba perngrGnoyr(a,yriry) {
    pbafg gnoyr = qbphzrag.perngrRyrzrag("gnoyr");
    sbe(yrg v = 0 ; v < a ; v++) {
        pbafg ebj = qbphzrag.perngrRyrzrag("ge");
        sbe(yrg w = 0 ; w < v+1 ; w++) {
            pbafg pby = qbphzrag.perngrRyrzrag("gq");
            vs(yriry < 2) {
                pby.vaareUGZY = '*';
            } ryfr {
                pby.nccraqPuvyq(perngrGnoyr(a,yriry-1));
            }
            ebj.nccraqPuvyq(pby);
        }
        gnoyr.nccraqPuvyq(ebj);
    }
    erghea gnoyr;
}

qbphzrag.obql.nccraqPuvyq(perngrGnoyr(1,1)); // Irefvba 1
// qbphzrag.obql.nccraqPuvyq(perngrGnoyr(3,1)); // Irefvba 2
// qbphzrag.obql.nccraqPuvyq(perngrGnoyr(7,1)); // Irefvba 3
// qbphzrag.obql.nccraqPuvyq(perngrGnoyr(5,2)); // Irefvba 4
// qbphzrag.obql.nccraqPuvyq(perngrGnoyr(5,3)); // Irefvba 5
// qbphzrag.obql.nccraqPuvyq(perngrGnoyr(2,6)); // Irefvba 6
*/